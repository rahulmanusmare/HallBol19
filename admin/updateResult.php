<?php

/*
Way the file is supposed to be accessed
http://127.0.0.1/hallabol15/admin/updateResult.php?match_id=1&result=1
*/

require_once('../keyset.php');

function getMaxBid($m){
	$r = run_query("select max_bid from events where match_id=$m");
	$w = mysql_fetch_row($r);
	return $w[0];
}

if(!(isset($_GET['match_id'])
	&& isset($_GET['result']))){
	die("Invalid get request");
}

$match_id = $_GET['match_id'];
$winner = $_GET['result'];

if(!($winner==1 || $winner==2)){
	die("Invalid entry for result");
}

$result = run_query("UPDATE  `events` SET  `winner` =  '$winner' WHERE  `match_id` ='$match_id'");
$result = run_query("UPDATE  `bids` SET  `winner` =  '$winner' WHERE  `match_id` ='$match_id'");

$result = run_query("select * from bids where match_id='$match_id'");
while($row = mysql_fetch_row($result)) {
	$bid = abs($row[4]);
	$email = $row[1];
	if($bid>getMaxBid($match_id)){
		continue;
	}
	if($row[3]==$row[5]){
		$result_i = run_query("update standings set score=score+2*$bid where email='$email'");
	}
}

echo "Query successfully processed.";
?>
