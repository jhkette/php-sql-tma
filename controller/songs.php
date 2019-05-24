<?php
require_once './model/database.php';


class displayData extends getdata
{
    // public $datas;
    // public function __construct (){
    //     $this->data = $data;
    // }
  

    protected function showAllSongs()
    {
        $datas = $this->getAllSongs();
        $content ='';
        $file = './templates/list.html';
        $tpl = file_get_contents($file);
        foreach ($datas as $data) {
           
            $pass1 = str_replace('[+title+]', $data['title'], $tpl);
            $pass2 = str_replace('[+name+]', $data['name'], $pass1);
            $final = str_replace('[+duration+]', $data['duration'], $pass2);  
            $content .= $final;
        }
        

        return $content;
    }

    public function displayHtml(){
        $content = $this-> showAllSongs();
        
        echo $content;
    }
}

?>