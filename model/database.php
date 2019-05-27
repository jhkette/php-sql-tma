<?php
require_once './includes/config.php';
class db
{
    private $host;
    private $username;
    private $password;
    private $db;
   
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
    }
    catch (mysqli_sql_exception $ex) {
        throw new Exception("Can't connect to the database! \n" . $ex);
    }
        
        
       
       
    }
}
class getdata extends db
{
    protected function getAllSongs()
    {
        $sql = "SELECT title, name, duration
        FROM song
        JOIN artist
        ON song.artist_id = artist.id
        ORDER by artist.name, song.title ASC";
        $results = $this->connect()->query($sql);
       
        if ($results === false) {
            echo 'error';
        } else {
            // result object has methods, e.g. fetch_assoc // and properties, e.g. num_rows
            while ($row = $results->fetch_assoc()) {
                $data[] = $row;
            }
            mysqli_free_result($results);
            return $data;
        }
    }
    protected function getArtists()
    {
        $sql = "SELECT name, COUNT(title) AS number 
        FROM artist
        JOIN song
        ON song.artist_id = artist.id
        GROUP by name";
        $results = $this->connect()->query($sql);
       
        if ($results === false) {
            echo 'error';
        } else {
            // result object has methods, e.g. fetch_assoc // and properties, e.g. num_rows
            while ($row = $results->fetch_assoc()) {
                $data[] = $row;
            }
            mysqli_free_result($results);
            return $data;
        }
    }
    protected function getCount()
    {
        $sql = "SELECT COUNT(name) AS name, COUNT(song.id) AS song
        FROM artist
        LEFT JOIN song
        ON song.artist_id = artist.id";
        $results = $this->connect()->query($sql);
       
        if ($results === false) {
            echo 'error';
        } else {
            // result object has methods, e.g. fetch_assoc // and properties, e.g. num_rows
            while ($row = $results->fetch_assoc()) {
                $data[] = $row;
            }
            mysqli_free_result($results);
            return $data;
        }
    }
}
?>