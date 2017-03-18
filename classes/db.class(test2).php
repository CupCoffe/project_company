<?php

class DataBase
{

    public $connection;
    protected $database;

    protected $host;
    protected $username;
    protected $password;
    protected $dbname;

    private $query_string = "";
    private $bindValues = array();
    


    public function __construct($host, $username, $password, $dbname)
    {
        $this->connection = TRUE;
        try {                       //Sets parameters of database and error handling
            $this->database = new PDO("mysql:host={$host}; dbname={$dbname}", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
            $this->database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);     //Sets the sampling mode is the default and returns an array indexed by column names of the result
        } catch (PDOException $e) {       //exception handling
            throw new Exception($e->getMessage());  //error message
        }
    }

    // Implement __destruct() method.
    public function __destruct()
    {
        $this->database = NULL;       // Null database
        $this->connection = NULL;      //Close connection
    }

    public function query($sql, $parameters = array()) {
        $this->error = false;

        if ($this->query = $this->database->prepare($sql)) {
            $i = 1;
            foreach ($parameters as $param) {
                $this->query->bindValue($i, $param);
                $i++;
            }
            if ($this->query->execute()) {
                $this->results = $this->query->fetchAll();
                $this->count = $this->query->rowCount();
                //$this->lastId = $this->query->InsertId();
            } else {
                $this->error = true;
            }
        }
        return $this;
    }


    public function select($fields)
    {
        $this->query_string = "";
        if (is_array($fields)) {
            $action = "SELECT ";
            for ($i = 0; $i < count($fields); $i++) {
                $action .= $fields[$i];
                if ($i != count($fields) - 1)
                    $action .= ', ';
            }
        } else {
            $action = "SELECT $fields ";
        }
        $this->query_string .= $action;
        return $this;
    }

    public function from($table) {
        $this->query_string .= " FROM {$table} ";
        return $this;
    }

    public function where($where = array()) {
        $keys = array_keys($where);
        $action = " WHERE ";
        for ($i = 0; $i < count($keys); $i++) {
            $action .= $keys[$i] . ' = ?';
            if ($i < count($keys) - 1)
                $action .= ' AND ';
            $this->bindValues[] = $where[$keys[$i]];
        }
        $this->query_string .= $action;
        return $this;
    }


    public function insert($table, array $fields, array $values) {

        $numFields = count($fields);
        $numValues = count($values);

        if($numFields === 0 or $numValues === 0)
            throw new Exception(PDO::ERRMODE_WARNING);
        if($numFields !== $numValues)
            throw new Exception(PDO::ERRMODE_WARNING);

        $fields = '`' . implode('`,`', $fields) . '`';
        $values = "'" . implode("','", $values) . "'";
        $sql = "INSERT INTO {$table} ($fields) VALUES($values)";

        return $this->database->prepare($sql) and $this->database->exec($sql) and $this->lastId = $this->database->lastInsertId($sql);
    }

    public function delete($table,$row,$id)
    {
        $sql = ("DELETE FROM $table WHERE $row=".$id);
        return $this->database->prepare($sql) and $this->database->exec($sql);
    }

    public function update( $table, $changes, $condition )
    {
        $update = "UPDATE " . $table . " SET ";
        foreach( $changes as $field => $value )
        {
            $update .= "`" . $field . "`='{$value}',";
        }

        $update = substr($update, 0, -1);
        if( $condition != '' )
        {
            $update .= "WHERE " . $condition;
        }

        $this->query( $update );

        return true;
    }


   public function execute()
    {
        if (!empty($this->query_string))
            $this->query($this->query_string, $this->bindValues);
        $this->bindValues = array();

    }





}
?>





