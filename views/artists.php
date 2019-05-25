<?php


require_once './includes/config.php';
require_once './controller/songs.php';
?>


<?php 

$artists = new Songs;
$artists -> displayArtistHtml();

?>