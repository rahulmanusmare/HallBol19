<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once '../keyset.php';
$query = "SELECT * FROM teams";
if (isset($_GET['game'])) {
	$game = $_GET['game'];
	$query .= " WHERE game='$game'";
}

$query .= " ORDER BY registration_time DESC";
$result = run_query($query);

$outp = "{";
while($row = mysql_fetch_row($result)) {
    if ($outp != "{") {$outp .= ",";}
    $outp .= '"'.$row[2].'":';
    $outp .= '{"team_name":"'		.$row[4]	.'",';
    $outp .= '"team_members":"'		.$row[5]	.'"}';
}
$outp .="}";

echo($outp);

mysql_close($db_server);

?>
