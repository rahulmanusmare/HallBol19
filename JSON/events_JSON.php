<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once '../keyset.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) die("Unable to connect to MySQL: ".mysql_error());

mysql_select_db($db_database) or die("Unable to select database: ".mysql_error());
$query = "SELECT * FROM events";
if (isset($_GET['game'])) {
	$game = $_GET['game'];
	$query .= " WHERE game='$game'";
}
if (isset($_GET['order'])) {
	$order = $_GET['order'];
	$query .= " ORDER BY $order DESC";
}
if (isset($_GET['limit'])) {
	$limit = $_GET['limit'];
	$query .= " LIMIT 0,$limit";
}

$result = mysql_query($query);
if(!$result) die("Database access failed: ".mysql_error());

$outp = "[";
while($row = mysql_fetch_row($result)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"match_id":"'			.$row[0]	.'",';
    $outp .= '"event_time":"'		.$row[1]	.'",';
    $outp .= '"game":"'			.$row[2]	.'",';
    $outp .= '"team_1":"'			.$row[3]	.'",';
    $outp .= '"team_2":"'			.$row[4]	.'",';
    $outp .= '"max_bid":"'			.$row[5]	.'"}';
}
$outp .="]";

echo($outp);

mysql_close($db_server);

?>
