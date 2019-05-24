<?php


require_once './includes/config.php';
require_once './controller/songs.php';

// Code to detect whether index.php has been requested without query string goes here

$content = '';
if (!isset($_GET['page'])) {
	$id = 'home'; // display home page
   } else {
	$id = $_GET['page']; // else requested page
   }

   switch ($id) {
	case 'home' :
    include 'views/home.php';
   }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

</body>
</html>