<?php

class DataBase{

    public $connection;
    protected $database;

    protected $host;
    protected $username;
    protected $password;
    protected $dbname;

    // Connect to DataBase
    //public function __construct($host = 'localhost', $username = 'k_oleh', $password = 'korn123', $dbname = 'php_1_01_data_base'){
    public function __construct($host, $username, $password, $dbname){
        $this->connection = TRUE;
        try {                       //Sets parameters of database and error handling
            $this->database = new PDO("mysql:host={$host}; dbname={$dbname}", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
            $this->database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);     //Sets the sampling mode is the default and returns an array indexed by column names of the result
        }catch (PDOException $e){       //exception handling
            throw new Exception($e->getMessage());  //error message
        }
    }

    // Implement __destruct() method.
    public function __destruct()
    {
        $this->database = NULL;       // Null database
        $this->connection = NULL;      //Close connection
    }

    // SELECT
    public function selectRow($query, $parameters = []){
        try{
            $stmt = $this->database->prepare($query);   //Prepares the query to perform and returns the associated object
            $stmt->execute($parameters);        //Starts a query to perform
            return $stmt->fetch();  //Select one row
        } catch (PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    // SELECT All
    public function selectRows($query, $parameters = []){
        try{
            $stmt = $this->database->prepare($query);
            $stmt->execute($parameters);
            return $stmt->fetchAll();   //Select all rows
        } catch (PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    // INSERT
    public function insertRow($query, $parameters = []){
        try{
            $stmt = $this->database->prepare($query);
            $stmt->execute($parameters);
            return TRUE;
        } catch (PDOException $e){
            throw new Exception($e->getMessage());
        }

    }

    // UPDATE
    public function updateRow($query, $parameters = []){
        $this->insertRow($query, $parameters);
    }

    // DELETE
    public function deleteRow($query, $parameters = []){
        $this->insertRow($query, $parameters);
    }
}

?>