<?php


require_once './includes/config.php';
require_once './controller/artists.php';
?>


<?php 

$books = new displayArtists;
$books -> displayHtml();

?>