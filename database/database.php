<?php

class Database
{
    private $host;
    private $username;
    private $password;
    private $db;
    protected $errors;
    

    public function __construct($errors)
    {
        $this->errors = $errors; 
    }

    protected function connect()
    {   
       
        $this->host = DB_HOST;
        $this->username = DB_USER;
        $this->password = DB_PASS;
        $this->db = DB_NAME;
       
        try {
            $conn = new mysqli(
                $this->host,
                $this->username,
                $this->password,
                $this->db
            );

            return $conn;
        } catch (mysqli_sql_exception $ex) {
            echo $this->errors['error_db'];
            throw new Exception($ex);
            $ex -> getMessage();
            // exit as application does not work without db connection. 
            exit();
        }
    }
}
?>