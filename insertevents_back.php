<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once './keyset.php';
require_once './debug.php';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) 
	if($debug) die("Unable to connect to MySQL: ".mysql_error());
	else die();

mysql_select_db($db_database) or die("Unable to select database: ".mysql_error());

if(isset($_GET['delete'])) {
	$delete=$_GET['delete'];
	$query = "DELETE FROM `events` WHERE `match_id` = '$delete'";
	$result = mysql_query($query);
	die();
}

if(!(isset($_POST['match_id'])
	&& isset($_POST['game'])
	&& isset($_POST['team_1'])
	&& isset($_POST['team_2'])
	&& isset($_POST['max_bid'])
	&& isset($_POST['event_time']))){
		http_response_code(400);
	if ($debug) die("Post variables not set.");
	else die();
}
$match_id = $_POST['match_id'];
$game = $_POST['game'];
$team_1 = $_POST['team_1'];
$team_2 = $_POST['team_2'];
$max_bid = $_POST['max_bid'];
$event_time = $_POST['event_time'];

$query = "INSERT INTO `events` (`match_id`, `event_time`, `game`, `team_1`, `team_2`, `max_bid`) 
	VALUES ('$match_id', '$event_time', '$game', '$team_1', '$team_2', '$max_bid')";

$result = mysql_query($query);

if(!$result)
	if($debug) die("Database access failed: ".mysql_error());
	else die();

mysql_close($db_server);

?>
