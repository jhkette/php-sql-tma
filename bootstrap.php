<?php


require_once './includes/config.php';
require_once './lang/'.$lang['language'].'.php';

// autoload classes
function autoloader($class){
  
    require_once './classes/'.$class.'.php';
}

spl_autoload_register('autoloader');



?>