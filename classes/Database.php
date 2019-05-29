<?php
/* 
This class connects to the database. The errors in the appropriate language are passed into 
the __construct function when the class is instantitated. They are also accessible in the model and controller class 
- as they are sub classes of the database class. I'm creating a connection to the database in this class. 
It can then be accessed using the protected connect() method in the model class, an extension of the Database class. 

I'm using a try, catch block to connect and 'catch' exceptions if there are any. 
*/
class Database
{
    private $host;
    private $username;
    private $password;
    private $db;
    public $conn;
    protected $errors;
    
    // contruct function takes errors as parameter
    public function __construct($errors)
    {
        $this->errors = $errors; 
    }
    // connect function
    public function connect()
    {   
        $this->host = DB_HOST;
        $this->username = DB_USER;
        $this->password = DB_PASS;
        $this->db = DB_NAME;
       
        try {
           $this->conn = new mysqli(
                $this->host,
                $this->username,
                $this->password,
                $this->db
            );

            return "connection succeeded";
        } catch (mysqli_sql_exception $ex) {
            echo $this->errors['error_db'];
            throw new Exception($ex);
            $ex -> getMessage();
            exit();
        }
    }

    public function disconnect(){
        $this->conn->close();
    }
}
?>