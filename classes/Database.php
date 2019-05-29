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
    private $config;

    protected $conn;
    protected $language;

    // contruct function takes errors as parameter
    public function __construct($language, $config)
    {
        $this->language = $language;
        $this->config = $config;
    }
    // connect function
    public function connect()
    {
        $this->host = $this->config['DB_HOST'];
        $this->username = $this->config['DB_USER'];
        $this->password = $this->config['DB_PASS'];
        $this->db = $this->config['DB_NAME'];

        $this->conn = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->db
        );

        if ($this->conn->connect_errno) {
            echo $this->language['error_db'];
            exit($this->conn->connect_error);
        }
    }

    public function disconnect()
    {
        if (isset($this->conn)) {
            $this->conn->close();
        }
    }
}
?>
