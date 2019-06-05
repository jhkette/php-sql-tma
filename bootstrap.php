<?php 
require_once './includes/config.php';
require_once './includes/cookie.php';
require_once './lang/'.$lang['language'].'.php';

// autoload classes
function autoloader($class){
    require_once './classes/'.$class.'.php';
}
// call autoloader function
spl_autoload_register('autoloader');

// This file is included on index.php. It loads all files that are needed for the 
// application to run. 

?>