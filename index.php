<?php
require_once dirname(__FILE__).'/includes/config.php';
require_once $dir['app_dir'].'/lang/'.$lang['language'].'.php';
require_once $dir['app_dir'].'/classes/Controller.php';




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
}

?>
