<?php
require_once './model/database.php';
class Artists extends getdata
{
 

    protected function getAllArtists()
    {
        $datas = $this->getArtists();
        $content ='';
        $header = './templates/header.html';
        $content .= file_get_contents($header);
        $file = './templates/artistlist.html';
        $tpl = file_get_contents($file);
        foreach ($datas as $data) {
           
            $pass1 = str_replace('[+artist+]', htmlentities($data['name']), $tpl);
            $final = str_replace('[+count+]', htmlentities($data['number']), $pass1);
            $content .= $final;
        }
        
        $footer = './templates/footer.html';
        $content .= file_get_contents($footer);
        return $content;
    }

    public function displayHtml(){
        $content = $this-> getAllArtists();
        
        echo $content;
    }
}

?>