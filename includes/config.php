<?php 

/* DB variables */
define('DB_HOST', 'localhost');
define('DB_NAME', 'test3');
define('DB_USER', 'root'); 
define('DB_PASS', ''); 

/* Set the default timezone ;*/
date_default_timezone_set('Europe/London');

// Set MYSQLI error reporting 

// MYSQLI_REPORT_ERROR	- Report errors from mysqli function calls
// MYSQLI_REPORT_STRICT	- Report warnings from mysqli function calls
// NB - this isn't supressing - errors ! Just ensuring they appear correctly.
// http://www.nusphere.com/kb/phpmanual/function.mysqli-report.htm


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


$config['app_dir'] = dirname(dirname(__FILE__));

/* Set defualt language */
$lang = array(
    "language" => "en"
);



?>