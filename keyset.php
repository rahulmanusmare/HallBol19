<?php
/*$db_hostname = '127.0.0.1';
$db_database = 'hallabol';
$db_username = 'root';
$db_password = '';
*/
$db_hostname = 'localhost';
$db_database = 'students_test';
$db_username = 'students_test';
$db_password = 'secret';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) die("Unable to connect to MySQL: ".mysql_error());
mysql_select_db($db_database) or die("Unable to select database: ".mysql_error());

function run_query($query){
/*	if(isset($db_server)){
	$db_hostname = 'localhost';
	$db_database = 'students_test';
	$db_username = 'students_test';
	$db_password = 'secret';

	$db_server = mysql_connect($db_hostname, $db_username, $db_password);
	if(!$db_server) die("Unable to connect to MySQL: ".mysql_error());
	mysql_select_db($db_database) or die("Unable to select database: ".mysql_error());
	}
*/
	$result = mysql_query($query);
	if(!$result) die("Database access failed: ".mysql_error());
	return $result;
}
?>
