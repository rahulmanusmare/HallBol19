<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once '../keyset.php';
$query = "SELECT * FROM bids";
if (isset($_GET['email'])) {
	$email = $_GET['email'];
	$query .= " WHERE email='$email' AND winner!=0";
} else{
	die('email in get required');
}

$result = run_query($query);

$outp = "{";
while($row = mysql_fetch_row($result)) {
    if ($outp != "{") {$outp .= ",";}
    $outp .= '"'.$row[2].'":';
    $outp .= '{"entry_at":"'		.$row[0]	.'",';
    $outp .= '"bid_for":"'		.$row[3]	.'",';
    $outp .= '"bid_amount":"'		.$row[4]	.'",';
    $outp .= '"winner":"'		.$row[5]	.'"}';
}
$outp .="}";

echo($outp);

mysql_close($db_server);

?>
