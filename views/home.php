<?php

require_once './includes/config.php';
require_once './controller/controller.php';
?>

<?php 

$books = new Controller;
$books -> displayIndex();

?>


