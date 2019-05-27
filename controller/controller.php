<?php
require_once './model/model.php';
require_once './includes/functions.php';

class Controller extends SongsArtistsData
{
    // Function to get index page information
    protected function getIndex()
    {
        $content = '';
        $header = './templates/header.html';
        $content .= file_get_contents($header);
        $content .= $this->getSongArtistCount();
        $lorem = './templates/lorem.html';
        $content .= file_get_contents($lorem);
        $footer = './templates/footer.html';
        $content .= file_get_contents($footer);

        return $content;
    }

    protected function get404()
    {
        $content = '';
        $header = './templates/header.html';
        $content .= file_get_contents($header);
        $content .= $this->getSongArtistCount();
        $lorem = './templates/404.html';
        $content .= file_get_contents($lorem);
        $footer = './templates/footer.html';
        $content .= file_get_contents($footer);

        return $content;
    }

     // Function to get index page information
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

    protected function showAllSongs()
    {
        $datas = $this->getAllSongs();
        $content = '';
        $header = './templates/header.html';
        $content .= file_get_contents($header);
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
        $content = '';
        $header = './templates/header.html';
        $content .= file_get_contents($header);

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
