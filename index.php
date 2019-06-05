<?php 
require_once './bootstrap.php';
if(isset($_POST['submit'])) { 
    $language = htmlentities(trim($_POST['language']));
    if(( $language == 'fr')||($language == 'en')){ 
    $cookie_name = "language";
    $cookie_value = $language;
    setcookie($cookie_name,  $language, time() + 3600, '/');
    header("Refresh:0");
    }
}


// JKETTE01
// Building Web Applications using MySQL and PHP











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
