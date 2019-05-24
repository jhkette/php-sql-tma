<?php
require_once './model/database.php';


class Songs extends getdata
{
   

    protected function showAllSongs()
    {
        $data = $this-> getAllSongs();
        $content ='';
        $header = './templates/header.html';
        $content .= file_get_contents($header);
        $file = './templates/list.html';
        $tpl = file_get_contents($file);
        foreach ($data as $info) {
           
            $pass1 = str_replace('[+title+]', htmlentities($info['title']), $tpl);
            $pass2 = str_replace('[+name+]', htmlentities($info['name']), $pass1);
            $final = str_replace('[+duration+]', htmlentities($info['duration']), $pass2);  
            $content .= $final;
        }
        
        $footer = './templates/footer.html';
        $content .= file_get_contents($footer);
        return $content;
    }

    public function displayHtml(){
        $content = $this-> showAllSongs();
        
        echo $content;
    }
}

?>