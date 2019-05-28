<?php
require_once './includes/config.php';
require_once './database/database.php';

/*Model class is a sub class of the database. The controller calls the methods in the Model class to connect to the database and
retrieve the relevant data.  */

class Model extends Database
{
    // get all songs in db with artist name and duration
    protected function getAllSongs()
    {
        $sql = "SELECT title, name, duration
        FROM song
        JOIN artist
        ON song.artist_id = artist.id
        ORDER by artist.name, song.title ASC";
        $data;
        $results = $this->connect()->query($sql);

        if ($results === false) {
            echo $this->errors['error_data'];
        } else {
            
            while ($row = $results->fetch_assoc()) {
                $data[] = $row;
            }
            mysqli_free_result($results);
            
            return $data;
        }
    }
    // get all artists with name and count title
    protected function getArtists()
    {
        $sql = "SELECT name, COUNT(title) AS number 
        FROM artist
        JOIN song
        ON song.artist_id = artist.id
        GROUP by name";
        $data;
        $results = $this->connect()->query($sql);

        if ($results === false) {
            echo $this->errors['error_data'];
        } else {
           
            while ($row = $results->fetch_assoc()) {
                $data[] = $row;
            }
            mysqli_free_result($results);
            return $data;
        }
    }

    // get number of songs and artists. Use right join to ensure null values in artist remain in table. 
    protected function getCount()
    {   
        $sql = "SELECT  COUNT(artist.id) AS artists, COUNT(song.id) as songs
        FROM artist
        RIGHT JOIN song
        ON artist.id = song.id";
        $data;
        $results = $this->connect()->query($sql);

        if ($results === false) {
            echo errors['error_data'];;
        } else {
            while ($row = $results->fetch_assoc()) {
                $data[] = $row;
            }
            mysqli_free_result($results);
            return $data;
        }
    }
}
?>
