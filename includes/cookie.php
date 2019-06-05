<?php
if(!isset($_COOKIE['language'])) {
    $lang = array(
        "language" => "en"
    );
    
} else {
   
        if (($_COOKIE['language'] == 'fr') ||  ($_COOKIE['language'] == 'en')){ 
            $lang = array(      
        "language" => htmlentities($_COOKIE['language'])

    );
}
}
?>