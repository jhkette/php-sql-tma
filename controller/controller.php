<?php
require_once './model/database.php';
require_once './includes/functions.php';

class Controller extends getdata
{


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


    protected function getSongArtistCount()
    {
        $datas = $this->getCount();
        $content = '';
        $file = './templates/countlist.html';

        $tpl = file_get_contents($file);

        $values =['[+song+]', '[+artist+]'];
    
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
      
        $content .= printTemplateArray($values, $datas, $tpl);

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
        foreach ($datas as $data) {
            $pass1 = str_replace('[+artist+]', htmlentities($data['name']),$tpl);
            $final = str_replace('[+count+]', htmlentities($data['number']),$pass1);
            $content .= $final;
        }

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
}

?>
