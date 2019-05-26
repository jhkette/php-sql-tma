<?php 
/* HELPER FUNCTIONS */




function printTemplateArray($values, $replacements, $file, $song = false){
    if(!$song){
    $new_message = '';
 
    foreach($replacements as $key => $replacement) {
        /* I'm using array_map here to create a new 'escaped' array of database values */
        $replacement = array_map('htmlentities', $replacement);
        $new_message .= str_replace($values, $replacement, $file);
    }
    return $new_message;
}
else{
    $new_message = '';
 
    foreach($replacements as $key => $replacement) {
        $replacement['duration'] = gmdate("i:s", $replacement['duration']);
        $replacement = array_map('htmlentities', $replacement);
        $new_message .= str_replace($values, $replacement, $file);
    }
    return $new_message;

}
}
     


?>