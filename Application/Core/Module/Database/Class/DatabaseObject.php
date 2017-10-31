<?php

namespace Core\Module\Database;

/**
 * Class DatabaseObject
 */
abstract class DatabaseObject
{
    /**
     * @var
     */
    private static $table_name;
    /**
     * @var array
     */
    protected static $db_fields = array();

    /**
     * @param $key
     * @return mixed
     */
    final public function __get($key)
    {
        return $this->$key;
    }

    /**
     * @return array
     */
    public static function find_all()
    {
        return self::find_by_sql("SELECT * FROM " . static::$table_name . " ORDER BY `id` ASC");
    }

    /**
     * @param int $id
     * @return bool|mixed
     */
    public static function find_by_id($id = 0)
    {
        $result_array = self::find_by_sql("SELECT * FROM " . static::$table_name . " WHERE `id` = " . db()->escape_value($id) . " LIMIT 1");
        return !empty($result_array) ? $result_array : false;
    }

    /**
     * @param $scopes
     * @return array|bool
     */
    public static function find_by_scope($scopes)
    {
        $scope = array();
        foreach ($scopes as $key => $value) {
            $scope[] = "$key = '" . db()->escape_value($value) . "'";
        }
        $scope = implode(' AND ', $scope);
        $result_array = self::find_by_sql("SELECT * FROM " . static::$table_name . " WHERE " . $scope);
        return !empty($result_array) ? $result_array : false;
    }

    /**
     * @param $scopes
     * @return array|bool
     */
    public static function find_by_like($scopes)
    {
        $scope = array();
        foreach ($scopes as $key => $value) {
            $scope[] = "$key LIKE '%" . db()->escape_value($value) . "%'";
        }
        $scope = implode(' AND ', $scope);
        $result_array = self::find_by_sql("SELECT * FROM " . static::$table_name . " WHERE " . $scope);
        return !empty($result_array) ? $result_array : false;
    }

    /**
     * @param string $sql
     * @return array
     */
    public static function find_by_sql($sql = "")
    {
        $result_set = db()->query($sql);
        $object_array = array();
        while ($row = db()->fetch_array($result_set)) {
            $object_array[] = self::instantiate($row);
        }
        return $object_array;
    }

    /**
     * @return mixed
     */
    public static function count_all()
    {
        $sql = "SELECT COUNT(*) FROM " . static::$table_name;
        $result_set = db()->query($sql);
        $row = db()->fetch_array($result_set);
        return array_shift($row);
    }

    /**
     * @param $record
     * @return static
     */
    private static function instantiate($record)
    {
        $object = new static;
        foreach ($record as $attribute => $value) {
            if ($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;
    }

    /**
     * @param $attribute
     * @return bool
     */
    private function has_attribute($attribute)
    {
        return array_key_exists($attribute, $this->attributes());
    }

    /**
     * @return array
     */
    protected function attributes()
    {
        $attributes = array();
        foreach (static::$db_fields as $field) {
            if (property_exists($this, $field)) {
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }

    /**
     * @return array
     */
    protected function sanitized_attributes()
    {
        $clean_attributes = array();
        foreach ($this->attributes() as $key => $value) {
            if (is_array($value)) $value = implode(',', $value);
            $clean_attributes[$key] = db()->escape_value($value);
        }

        return $clean_attributes;
    }

    /**
     * @return bool
     */
    public function save()
    {
        return isset($this->id) ? $this->update() : $this->create();
    }

    /**
     * @return bool
     */
    public function create()
    {
        $attributes = $this->sanitized_attributes();
        array_shift($attributes);
        $attribute_pairs = array();
        foreach ($attributes as $key => $value) {
            if (is_int($value) or is_float($value)) {
                $attribute_pairs[] = "{$key}={$value}";
            } elseif (is_bool($value)) {
                $attribute_pairs[] = "{$key}=" . (($value) ? "true" : "false");
            } else {
                $attribute_pairs[] = "{$key}=" . ((empty($value) && strlen($value) == 0 && $value != 'false') ? "NULL" : "'" . $value . "'");
            }

        }
        $sql = "INSERT INTO  " . static::$table_name . " SET ";
        $sql .= join(", ", $attribute_pairs);

        if (db()->query($sql)) {
            $this->id = db()->insert_id();
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function update()
    {
        $attributes = $this->sanitized_attributes();
        $attribute_pairs = array();
        foreach ($attributes as $key => $value) {
            $value = (string)$value;
            if (empty($value) AND strlen($value) == 0) {
                $attribute_pairs[] = "{$key}=NULL";
            } else {
                $attribute_pairs[] = "{$key}='{$value}'";
            }
        }
        $sql = "UPDATE " . static::$table_name . " SET ";
        $sql .= join(", ", $attribute_pairs);
        $sql .= " WHERE `id` = " . db()->escape_value($this->id);
        db()->query($sql);
        return (db()->affected_rows() == 1) ? true : false;
    }

    /**
     * @return bool
     */
    public function delete()
    {
        $sql = "DELETE FROM " . static::$table_name;
        $sql .= " WHERE `id` = " . db()->escape_value($this->id);
        $sql .= " LIMIT 1";
        db()->query($sql);
        return (db()->affected_rows() == 1) ? true : false;
    }
}
