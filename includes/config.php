<?php 

/* DB variables */
define('DB_HOST', 'mysqlsrv.dcs.bbk.ac.uk');
define('DB_NAME', 'jkette01db');
define('DB_USER', 'jkette01'); 
define('DB_PASS', 'bbkmysql'); 

/* Set the default timezone ;*/
date_default_timezone_set('Europe/London');

// Set MYSQLI error reporting 

// MYSQLI_REPORT_ERROR	- Report errors from mysqli function calls
// MYSQLI_REPORT_STRICT	- Report warnings from mysqli function calls

// http://www.nusphere.com/kb/phpmanual/function.mysqli-report.htm

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

/* Set defualt language */
$lang = array(
    "language" => "en"
);



?>