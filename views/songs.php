<?php


require_once './includes/config.php';
require_once './controller/controller.php';
?>


<?php 

$songs = new Controller;
$songs -> displaySongHtml();

?>


