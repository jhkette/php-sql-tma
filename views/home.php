<?php

// $db = new Database($errors);
// $db->connect();


$home = new Controller($errors, $config);

$home->displayIndex();


?>


