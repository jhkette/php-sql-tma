<?php
require_once './includes/functions.php';

/* The control view class fetches data from the model and html from template files and stores it in a variable - content.
  I use various different templates in each function. A helper function (in includes) is used to replace values certain html elements
  with data from the database. The data is also 'escaped' there. Finally the content is sent to the relevant view
by a seperate function which echoes the content.  */
 

class Controlview extends Model
{
    // Function to get index page information
    protected function getIndex()
    {
        
        $headerhtml = './templates/header.php';
        $header = file_get_contents($headerhtml);
        $values = array('[+title+]', '[+heading+]', '[+1+]');
        $replacements = array($this->phrases['home_title'], $this->phrases['home_heading'], 'current');
        $content = '';
        $content .= printTemplate($values, $replacements, $header);
        $content .= $this->getSongArtistCount();
        $lorem = './templates/lorem.html';
        $content .= file_get_contents($lorem);
        $footer = './templates/footer.html';
        $content .= file_get_contents($footer);

        return $content;
    }
    protected function get404()
    {
        $headerhtml = './templates/header.php';
        $header = file_get_contents($headerhtml);
        $values = array('[+title+]', '[+heading+]');
        $replacements = array($this->phrases['404_title'], $this->phrases['404_heading']);
        $content = '';
        $content .= printTemplate($values, $replacements, $header);
        $content .= $this->getSongArtistCount();
        $fourofour = './templates/404.html';
        $content .= file_get_contents($fourofour);
        $footer = './templates/footer.html';
        $content .= file_get_contents($footer);
        return $content;
    }

    // Function to get song artist count information - displayed on each page
    protected function getSongArtistCount()
    {
        $datas = $this->getCount();
        $content = '';
        $file = './templates/countlist.html';
        $tpl = file_get_contents($file);
        $values = ['[+artist+]', '[+song+]'];
        $content = printTemplateArray($values, $datas, $tpl);

        return $content;
    }

    // Function to show all songs
    protected function showAllSongs()
    {
        $alldata = $this->getAllSongs();
        $headerhtml = './templates/header.php';
        $header = file_get_contents($headerhtml);
        $values = array('[+title+]', '[+heading+]', '[+2+]');
        $replacements = array($this->phrases['songs_title'], $this->phrases['songs_heading'], 'current');
        $content = '';
        $content .= printTemplate($values, $replacements, $header);

        $content .= $this->getSongArtistCount();
        $file = './templates/songlist.html';
        $tpl = file_get_contents($file);
        $values = ['[+title+]', '[+name+]', '[+duration+]'];

        $newData = changeTime($alldata);
        $content .= printTemplateArray($values, $newData, $tpl);
        $footer = './templates/footer.html';
        $content .= file_get_contents($footer);
        return $content;
    }
    // Function to get all artists
    protected function getAllArtists()
    {
        $alldata = $this->getArtists();
        $headerhtml = './templates/header.php';
        $header = file_get_contents($headerhtml);
        $values = array('[+title+]', '[+heading+]', '[+3+]');
        $replacements =  array($this->phrases['artists_title'], $this->phrases['artists_heading'], 'current');
        $content = '';
        $content .= printTemplate($values, $replacements, $header);

        $content .= $this->getSongArtistCount();
        $file = './templates/artistlist.html';

        $tpl = file_get_contents($file);
        $values = ['[+artist+]', '[+count+]'];
        $content .= printTemplateArray($values, $alldata, $tpl);

        $footer = './templates/footer.html';
        $content .= file_get_contents($footer);
        return $content;
    }

    // The following functions echo the content of the above functions and are called in the relevant view

    public function displayIndex()
    {
        $content = $this->getIndex();
        echo $content;
    }
    public function display404()
    {
        $content = $this->get404();
        echo $content;
    }

    public function displaySongHtml()
    {
        $content = $this->showAllSongs();
        echo $content;
    }

    public function displayArtistHtml()
    {
        $content = $this->getAllArtists();
        echo $content;
    }
}

?>
