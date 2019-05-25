<?php


require_once './includes/config.php';
require_once './controller/controller.php';
?>


<?php 

$artists = new Controller;
$artists -> displayArtistHtml();

?>