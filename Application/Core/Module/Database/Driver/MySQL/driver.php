<?php

namespace Core\Module\Database;

use Core\Interfaces\DataBaseInterface;

/**
 * Class MySQL_Database
 */
class MySQL_Database implements DataBaseInterface
{

    /**
     * @var
     */
    private $connection;

    /**
     * @var
     */
    private $sql;

    /**
     * @var
     */
    public $last_query;

    /**
     * @var int
     */
    private $magic_quotes_active;

    /**
     * @var bool
     */
    private $real_escape_string_exists;

    /**
     * @var array
     */
    public $config;

    /**
     * MySQL_Database constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->open_connection();
        $this->magic_quotes_active = get_magic_quotes_gpc();
        $this->real_escape_string_exists = function_exists("mysqli_real_escape_string");

    }

    /**
     *
     */
    public function open_connection()
    {
        $this->connection = new \mysqli($this->config['host'], $this->config['user'], $this->config['password'], $this->config['database']);
        if (!$this->connection) {
            throw new \Exception("Database connection failed: " . mysqli_error($this->connection));
        } else {
            $this->connection->set_charset($this->config['charset']);
        }
    }

    /**
     *
     */
    public function close_connection()
    {
        if (isset($this->connection)) {
            $this->connection->close();
            unset($this->connection);
        }
    }

    /**
     * @param $sql
     * @return bool|mysqli_result
     */
    public function query($sql)
    {
        $this->last_query = $sql;
        $this->sql = $this->connection->query($sql);
        $this->confirm_query($this->sql);

        return $this->sql;
    }

    /**
     * @param $value
     * @return string
     */
    public function escape_value($value)
    {
        // i.e. PHP >= v4.3.0
        $value = htmlspecialchars(trim($value));
        if ($this->real_escape_string_exists) { // PHP v4.3.0 or higher
            // undo any magic quote effects so mysqli_real_escape_string can do the work
            if ($this->magic_quotes_active) {
                $value = stripslashes($value);
            }
            $value = $this->connection->real_escape_string($value);
        } else { // before PHP v4.3.0
            // if magic quotes aren't already on then add slashes manualy
            if (!$this->magic_quotes_active) {
                $value = addslashes($value);
            }
            // if magic quotes are active, then the slashes already exist
        }
        return $value;
    }

    /**
     * @param $result_set
     * @return array|null
     */
    public function fetch_array($result_set)
    {
        return $result_set->fetch_array();
    }

    /**
     * @param $result_set
     * @return int
     */
    public function num_rows($result_set)
    {
        return $this->connection->num_rows;
    }

    /**
     * @return int|string
     */
    public function insert_id()
    {
        // get the last id inserted over the current db connection
        return $this->connection->insert_id;
    }

    /**
     * @return int
     */
    public function affected_rows()
    {
        return $this->connection->affected_rows;
    }

    /**
     * @param $result
     * @return string
     */
    final public function confirm_query($result)
    {
        if (!$result) {
            $output = "Database query failed: {$this->connection->error}<br />";
            $output .= "Last SQL query: {$this->last_query}<br />";
            return ($output);
        }
    }

}
