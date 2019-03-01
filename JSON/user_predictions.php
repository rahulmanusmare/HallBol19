<?php
session_start();

$email = "";
if(isset($_GET['email'])){
	$email = $_GET['email'];
} else{
	if(isset($_SESSION['email'])){
		$email = $_SESSION['email'];
	} else{
		die("Cannot take email from session or get request");
	}
}

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once '../keyset.php';

$query = "SELECT * FROM bids WHERE email='$email' ORDER BY entry_at DESC";
$result = run_query($query);

$outp = "[";
while($row = mysql_fetch_row($result)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"match_id":"'			.$row[2]	.'",';
    if($row[5]==0){

    }elseif($row[3]==$row[5]){
    	
    }
    $outp .= '"game":"'			.$row[3]	.'",';
    $outp .= '"team_name":"'			.$row[4]	.'",';
    $outp .= '"team_members":"'		.$row[5]	.'"}';
}
$outp .="]";

echo($outp);

mysql_close($db_server);

?>
