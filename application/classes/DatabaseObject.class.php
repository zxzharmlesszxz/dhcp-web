<?php

/**
* DatabaseObject Class
**/

abstract class DatabaseObject {

    private static $table_name;
    protected static $db_fields = array();

    final public function __get($key) {
     return $this->$key;
    }

    public static function find_all() {
        return self::find_by_sql("SELECT * FROM " . static::$table_name." ORDER BY ".static::$db_fields[0]." ASC");
    }

    public static function find_by_id($id = 0) {
        $result_array = self::find_by_sql("SELECT * FROM " . static::$table_name . " WHERE ".static::$db_fields[0]."=" . db()->escape_value($id) . " LIMIT 1");
        return !empty($result_array) ? $result_array[0] : false;
    }

    public static function find_by_scope($scopes) {
     $scope = array();
     foreach($scopes as $key => $value) {
      $scope[] = "$key = '".db()->escape_value($value)."'";
     }
     $scope = implode(' AND ', $scope);
     $result_array = self::find_by_sql("SELECT * FROM " . static::$table_name . " WHERE ".$scope);
     return !empty($result_array) ? $result_array : false;
    }

    public static function find_by_like($scopes) {
     $scope = array();
     foreach($scopes as $key => $value) {
      $scope[] = "$key LIKE '%".db()->escape_value($value)."%'";
     }
     $scope = implode(' AND ', $scope);
     $result_array = self::find_by_sql("SELECT * FROM " . static::$table_name . " WHERE ".$scope);
     return !empty($result_array) ? $result_array : false;
    }

    public static function find_by_sql($sql = "") {
        $result_set = db()->query($sql);
        $object_array = array();
        while ($row = db()->fetch_array($result_set)) {
            $object_array[] = self::instantiate($row);
        }
        return $object_array;
    }

    public static function count_all() {
        $sql = "SELECT COUNT(*) FROM " . static::$table_name;
        $result_set = db()->query($sql);
        $row = db()->fetch_array($result_set);
        return array_shift($row);
    }

    private static function instantiate($record) {
        $object = new static;
        foreach ($record as $attribute => $value) {
            if ($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;
    }

    private function has_attribute($attribute) {
        // We don't care about the value, we just want to know if the key exists
        // Will return true or false
        return array_key_exists($attribute, $this->attributes());
    }

    protected function attributes() {
        // return an array of attribute keys and their values
        $attributes = array();
        foreach (static::$db_fields as $field) {
            if (property_exists($this, $field)) {
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }

    protected function sanitized_attributes() {
        $clean_attributes = array();
        foreach ($this->attributes() as $key => $value) {
            if (is_array($value)) $value = implode(',', $value);
            $clean_attributes[$key] = db()->escape_value($value);
        }

        return $clean_attributes;
    }

    public function save() {
        // A new record won't have an id yet.
        $id = static::$db_fields[0];
        return isset($this->$id) ? $this->update() : $this->create();
    }

    public function create() {
    	$id = static::$db_fields[0];

        $attributes = $this->sanitized_attributes();
        array_shift($attributes);
        /* new style */
    	$attribute_pairs = array();
        foreach ($attributes as $key => $value) {
            if (is_int($value) or is_float($value)) {
                $attribute_pairs[] = "{$key}={$value}";
            } elseif (is_bool($value)) {
                $attribute_pairs[] = "{$key}=".(($value) ? "true" : "false");
            } else {
                $attribute_pairs[] = "{$key}=".((empty($value) && strlen($value) == 0 && $value != 'false') ? "NULL" : "'".$value."'");
            }

        }
        $sql = "INSERT INTO  " . static::$table_name . " SET ";
        $sql .= join(", ", $attribute_pairs);

        if (db()->query($sql)) {
            $this->$id = db()->insert_id();
            return true;
        } else {
            return false;
        }
    }

    public function update() {
        $id = static::$db_fields[0];

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
        $sql .= " WHERE ".static::$db_fields[0]."=" . db()->escape_value($this->$id);
        db()->query($sql);
        return (db()->affected_rows() == 1) ? true : false;
    }

    public function delete() {
    	$id = static::$db_fields[0];

        $sql = "DELETE FROM " . static::$table_name;
        $sql .= " WHERE ".static::$db_fields[0]."=" . db()->escape_value($this->$id);
        $sql .= " LIMIT 1";
        db()->query($sql);
        return (db()->affected_rows() == 1) ? true : false;
    }

}
