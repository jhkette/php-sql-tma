<?php



require_once './includes/config.php';
require_once './lang/'.$lang['language'].'.php';

// autoload classes
function myAutoloader($class){
  
    require_once './classes/'.$class.'.php';
    }
    // Register the function with PHP...
    spl_autoload_register('myAutoloader');



?>