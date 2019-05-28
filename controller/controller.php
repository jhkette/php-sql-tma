<?php
require_once './model/model.php';
require_once './includes/functions.php';

/* The controller fetches data from the model and html from template files and stores it in a variable - content. 
These are then displayed in the 'views'. */

class Controller extends Model
{
    // Function to get index page information
    protected function getIndex()
    {
       
        $headerhtml = './templates/header.html';
        $header = file_get_contents($headerhtml);
        $values = array('[+title+]', '[+heading+]');
        $replacements = array('Home', 'Welcome');
        $content = '';
        $content .= printTemplateArray($values, $replacements, $header);
        $content .= $this->getSongArtistCount();
        $lorem = './templates/lorem.html';
        $content .= file_get_contents($lorem);
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
        $values =[ '[+artist+]', '[+song+]'];
        $content = printTemplateArray($values, $datas, $tpl);

        return $content;
    }
    // Function to show all songs 
    protected function showAllSongs()
    {
        $datas = $this->getAllSongs();
        $headerhtml = './templates/header.html';
        $header = file_get_contents($headerhtml);
        $values = array('[+title+]', '[+heading+]');
        $replacements = array('Songs', 'All Songs');
        $content = '';
        $content .= printTemplateArray($values, $replacements, $header);
       
        $content .= $this->getSongArtistCount();
        $file = './templates/list.html';
        $tpl = file_get_contents($file);
        $values = ['[+title+]', '[+name+]', '[+duration+]'];
      
        $newData = changeTime($datas);
        $content .= printTemplateArray($values, $newData, $tpl);
        $footer = './templates/footer.html';
        $content .= file_get_contents($footer);
        return $content;
    }

    protected function getAllArtists()
    {
        $datas = $this->getArtists();
        $headerhtml = './templates/header.html';
        $header = file_get_contents($headerhtml);
        $values = array('[+title+]', '[+heading+]');
        $replacements = array('Artists', 'All Artists');
        $content = '';
        $content .= printTemplateArray($values, $replacements, $header);

        $content .= $this->getSongArtistCount();
        $file = './templates/artistlist.html';

        $tpl = file_get_contents($file);
        $values = ['[+artist+]', '[+count+]'];
        $content .= printTemplateArray($values, $datas, $tpl);
       

        $footer = './templates/footer.html';
        $content .= file_get_contents($footer);
        return $content;
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

    public function displayIndex(){
        $content = $this->getIndex();
        echo $content;

    }
    public function display404(){
        $content = $this->get404();
        echo $content;
    }
}

?>
