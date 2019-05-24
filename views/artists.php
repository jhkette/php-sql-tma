<?php


require_once './includes/config.php';
require_once './controller/artists.php';
?>


<?php 

$artists = new Artists;
$artists -> displayHtml();

?>