<?php


require_once './includes/config.php';
require_once './controller/songs.php';
?>


<?php 

$books = new Songs;
$books -> displayHtml();

?>


