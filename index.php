<?php
require_once './includes/config.php';
require_once './lang/en.php';
require_once './controller/controller.php';



// Code to detect whether index.php has been requested without query string goes here

$content = '';
if (!isset($_GET['page'])) {
    $id = 'home'; // display home page
} else {
    $id = $_GET['page']; // else requested page
}

switch ($id) {
    case 'home':
        include 'views/home.php';
        break;
    case 'songs':
        include 'views/songs.php';
        break;
    case 'artists':
        include 'views/artists.php';
        break;
    default:
       include 'views/404.php';    
}

?>
