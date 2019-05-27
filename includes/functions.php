<?php 
/* HELPER FUNCTIONS */

/*This function takes an array of values from templates ,the replacements from the Database and an html file as parameters. It 
replaces template values with data  */
function printTemplateArray($values, $replacements, $file){
  
    $new_message = '';
 
    foreach($replacements as $replacement) {
        /* I'm using array_map here to create a new 'escaped' array of database values */
        $replacement = array_map('htmlentities', $replacement);
        $new_message .= str_replace($values, $replacement, $file);
    }
    return $new_message;

}


function changeTime($replacements){

    $newArray;
    foreach($replacements as $replacement) {
        // change duration to mm:ss time format
        $replacement['duration'] = gmdate("i:s", $replacement['duration']);
        $newArray [] = $replacement;     
    }
    return $newArray;
}
     


?>