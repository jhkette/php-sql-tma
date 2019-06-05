<?php require_once './bootstrap.php';
if(isset($_POST['submit'])) { 
    $language = htmlentities(trim($_POST['language']));
    $cookie_name = "language";
    $cookie_value = $language;
    setcookie($cookie_name,  $language, time() + 3600);
    header("Refresh:0");
}


// JKETTE01
// Building Web Applications using MySQL and PHP
// $lang = array(
//     "language" => "en"
// );





require_once './lang/'.$lang['language'].'.php';




// if($language_ == 'en'){
//     $lang = array(
//         "language" => "en"
//     );
// }
// if($language_ == 'fr'){
//     $lang = array(
//         "language" => "fr"
//     );
// }


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
