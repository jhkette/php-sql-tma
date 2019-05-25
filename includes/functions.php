<?php 
/* HELPER FUNCTIONS */

function printTemplate($values, $replacements, $file){
    $replacements = array_map('htmlentities', $replacements);
    $new_message = str_replace($values, $replacements, $file);
    return $new_message;
}

     


?>