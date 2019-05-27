<?php
require_once './includes/config.php';
require_once './database/database.php';


class SongsArtistsData extends Database
{
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
        $data;
        $results = $this->connect()->query($sql);

        if ($results === false) {
            echo $this->errors['error_data'];
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
        $data;
        $results = $this->connect()->query($sql);

        if ($results === false) {
            echo errors['error_data'];;
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
