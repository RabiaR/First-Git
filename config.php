<?php 

#MySQL Database Configration
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'blooddonation');

#Redirects to specified page 
function redirect($page) {
	header('Location: '.$page);
	exit();
} 



?>