<?php

require_once './includes/config.php';
require_once './controller/controller.php';
?>

<?php 

$home = new Controller;
$home -> displayIndex();

?>


