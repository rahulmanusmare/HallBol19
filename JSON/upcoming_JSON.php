<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once '../keyset.php';

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
    
    $team1_result = mysql_query("SELECT team_name,team_members FROM teams WHERE team_id=$row[3]");
    $team1_row = mysql_fetch_row($team1_result);
    $team2_result = mysql_query("SELECT team_name,team_members FROM teams WHERE team_id=$row[4]");
    $team2_row = mysql_fetch_row($team2_result);
    $outp .= '{"match_id":"'        .$row[0]	.'",';
    $outp .= '"event_time":"'       .$row[1]	.'",';
    $outp .= '"game":"'             .$row[2]	.'",';
    $outp .= '"team_1_name":"'      .$team1_row[0]	.'",';
    $outp .= '"team_1_members":"'	.$team1_row[1]	.'",';
    $outp .= '"team_2_name":"'      .$team2_row[0]  .'",';
    $outp .= '"team_2_members":"'   .$team2_row[1]  .'",';
    $outp .= '"max_bid":"'			.$row[5]	.'"}';
}
$outp .="]";

echo($outp);

mysql_close($db_server);

?>
