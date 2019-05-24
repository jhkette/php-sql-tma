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
        $this->host = 'mysqlsrv.dcs.bbk.ac.uk';
        $this->username = 'jkette01';
        $this->password = 'bbkmysql';
        $this->db = 'jkette01db';

        $conn = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->db
        );

        return $conn;
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
        $numRows = $results;
        if ($numRows === false) {
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
