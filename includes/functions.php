<?php 
/* HELPER FUNCTIONS */




function printTemplateArray($values, $replacements, $file){
    $new_message = '';
 
    foreach($replacements as $key => $replacement) {
        $replacement = array_map('htmlentities', $replacement);
    $new_message .= str_replace($values, $replacement, $file);
    }
    return $new_message;
}
     


?>