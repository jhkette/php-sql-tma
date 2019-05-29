<?php
include './includes/config.php';
include './lang/'.$lang['language'].'.php';

function myAutoloader($class){
    // Construct path to the class file include 'classes/' . $class . '.php';
    require_once './classes/'.$class.'.php';
    }
    // Register the function with PHP...
    spl_autoload_register('myAutoloader');



?>