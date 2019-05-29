<?php
require_once './includes/config.php';
require_once 'Database.php';

/* Model class is a sub class of the database. The controller calls the methods in the Model class to connect to the database and
 retrieve the relevant data.  */

class Model extends Database
{
    // get all songs in db with artist name and duration
    protected function getAllSongs()
    {
        $this->connect();
        $sql = "SELECT title, name, duration
        FROM song
        JOIN artist
        ON song.artist_id = artist.id
        ORDER by artist.name, song.title ASC";
        $data;
        $results = $this->conn->query($sql);

        if ($results === false) {
            echo $this->errors['error_data'];
            $this->disconnect();
        } else {
            while ($row = $results->fetch_assoc()) {
                $data[] = $row;
            }
            mysqli_free_result($results);
            $this->disconnect();
            return $data;
        }
    }
    // get all artists with name and count title
    protected function getArtists()
    {
        $this->connect();
        $sql = "SELECT name, COUNT(title) AS number 
        FROM artist
        JOIN song
        ON song.artist_id = artist.id
        GROUP by name";
        $data;
        $results = $this->conn->query($sql);

        if ($results === false) {
            echo $this->errors['error_data'];
            $this->disconnect();
        } else {
            while ($row = $results->fetch_assoc()) {
                $data[] = $row;
            }
            mysqli_free_result($results);
            $this->disconnect();
            return $data;
        }
    }

    // get number of songs and artists. Use right join to ensure null values in artist remain in table.
    protected function getCount()
    {
        $this->connect();
        $sql = "SELECT  COUNT(artist.id) AS artists, COUNT(song.id) as songs
        FROM artist
        RIGHT JOIN song
        ON artist.id = song.id";
        $data;
        $results = $this->conn->query($sql);

        if ($results === false) {
            echo errors['error_data'];
            $this->disconnect();
        } else {
            while ($row = $results->fetch_assoc()) {
                $data[] = $row;
            }
            mysqli_free_result($results);
            $this->disconnect();
            return $data;
        }
    }
}
?>
