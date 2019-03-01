<?php
/*
Requires login and can be accessed at:
http://127.0.0.1/hallabol15/JSON/pred_bidded_test_JSON.php
*/
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once '../keyset.php';
session_start();
if(!isset($_SESSION['email'])){
	http_response_code(401);
    die("Please login to bid");
}
$email = $_SESSION['email'];
$result = run_query("SELECT match_id FROM bids where email='$email'");

$outp = "[";
while($row = mysql_fetch_row($result)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= $row[0];
}
$outp .="]";

echo($outp);


?>
