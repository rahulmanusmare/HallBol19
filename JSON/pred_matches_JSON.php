<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once '../keyset.php';
$query = "SELECT * FROM events";
if (isset($_GET['game'])) {
	$game = $_GET['game'];
	$query .= " WHERE game='$game'";
} else{
	$query .= " WHERE game='1'";
}
$query .= " AND winner=0";
$query .= " ORDER BY event_time DESC";
$result = run_query($query);

$outp = "{";
while($row = mysql_fetch_row($result)) {
    if ($outp != "{") {$outp .= ",";}
    $outp .= '"'.$row[0].'":';
    $outp .= '{"event_time":"'		.$row[1]	.'",';
    $outp .= '"team_1":"'		.$row[3]	.'",';
    $outp .= '"team_2":"'		.$row[4]	.'",';
    $outp .= '"max_bid":"'		.$row[5]	.'",';
    $outp .= '"winner":"'		.$row[6]	.'"}';
}
$outp .="}";


echo($outp);

mysql_close($db_server);

?>
