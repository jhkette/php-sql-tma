<?php 

define('DB_HOST', 'mysqlsrv.dcs.bbk.ac.uk');
define('DB_NAME', 'jkette01db' );
define('DB_USER', 'jkette01'); 
define('DB_PASS', 'bbkmysql'); 

/**
 * Set the default timezone as we are using some date/time functions and the
 * server time zone may not be what we want/expect
 * To see what time zone the server uses: echo date_default_timezone_get();
 */
date_default_timezone_set('Europe/London');

// Set MYSQLI error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

/* Set defualt language */
define('language', 'en');



?>