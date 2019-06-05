<?php 
/* nb I'm refreshing the page each time the page loads. I was having problems with cached pages displaying old
cookie data on the BBK titan server. If it were deployed it would probably be best just to reconfigure server settings */
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');



/* DB variables */
$config['DB_HOST'] = 'mysqlsrv.dcs.bbk.ac.uk';
$config['DB_NAME'] = 'jkette01db';
$config['DB_USER'] = 'jkette01';
$config['DB_PASS'] = 'bbkmysql';

/* Set the default timezone ;*/
date_default_timezone_set('Europe/London');




// $dir['app_dir'] = dirname(dirname(__FILE__));

/* Set defualt language - this is decided by the user at the moment */



?>