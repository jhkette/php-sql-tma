<?php 

/* DB variables */


$config['DB_HOST'] = 'mysqlsrv.dcs.bbk.ac.uk';
$config['DB_NAME'] = 'jkette01db';
$config['DB_USER'] = 'jkette01';
$config['DB_PASS'] = 'bbkmysql';

/* Set the default timezone ;*/
date_default_timezone_set('Europe/London');

// Set MYSQLI error reporting 

// MYSQLI_REPORT_ERROR	- Report errors from mysqli function calls
// MYSQLI_REPORT_STRICT	- Report warnings from mysqli function calls
// NB - this isn't supressing - errors ! Just ensuring they appear correctly.
// http://www.nusphere.com/kb/phpmanual/function.mysqli-report.htm


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


$dir['app_dir'] = dirname(dirname(__FILE__));

/* Set defualt language */
$lang = array(
    "language" => "en"
);



?>