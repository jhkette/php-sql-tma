<?php 

function printTemplate($values, $replacements, $file){
    $new_message = str_replace($values, $replacements, $file);
    return $new_message;
}

     


?>