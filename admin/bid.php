<?php

/*
Way the file is supposed to be accessed
http://127.0.0.1/hallabol15/admin/bid.php?bid=100&match_id=1&bid_for=1
*/

require_once('../keyset.php');
require_once('./responsefunction.php');
session_start();
if(!isset($_SESSION['email'])){
	die("Please login to bid");
}
$email = $_SESSION['email'];

if(!(isset($_GET['bid'])
	&& isset($_GET['match_id'])
	&& isset($_GET['bid_for']))){
	http_response_code(400);
	die("Invalid get request");
}
$match_id = $_GET['match_id'];
$bid = abs($_GET['bid']);
$bid_for = $_GET['bid_for'];
if(!($bid_for=='1' || $bid_for=='2')){
	http_response_code(403);
	die("Invalid bidding team");
}
$result = run_query("select * from events where match_id=$match_id");
if(mysql_num_rows($result)!=1){
	http_response_code(409);
	die("More than one rows for a given match ID");
}
$row = mysql_fetch_row($result); 
if(time() > (strtotime($row[1])-60*60)){
	http_response_code(406);
	die("Invalid request: Cannot predict");
}
if($bid>$row[5]){
	http_response_code(406);
	die("Invalid request: Trying to predict more");
}
$result = run_query("select * from bids where match_id=$match_id and email='$email'");
if(mysql_num_rows($result)>0){
	http_response_code(406);
	die("Already bidded");
}
$result = run_query("update standings set score=score-$bid where email='$email'");
$result = run_query("INSERT INTO `bids` (`entry_at`, `email`, `match_id`, `bid_for`, `bid_amount`, `winner`) 
	VALUES (CURRENT_TIMESTAMP, '$email', '$match_id', '$bid_for', '$bid', '0')");
if(!$result){
	http_response_code(500);
}
?>