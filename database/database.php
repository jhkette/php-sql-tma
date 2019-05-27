<?php
/* This class connects to the database. The errors in the appropriate language are passed into 
the __construct function when the class is instantitated. They are also accessible in the model and controller class 
- as they extend the database class. I'm using a try, catch block to connect and 'catch' exceptions if there are any. 
*/
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
            exit();
        }
    }
}
?>