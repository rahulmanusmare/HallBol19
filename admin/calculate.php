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

$result = run_query("UPDATE  `standings` SET  `score` =  '10000'");

$result = run_query("select * from bids where winner!=0");
while($row = mysql_fetch_row($result)) {
	$bid = abs($row[4]);
	$email = $row[1];
	$match_id = $row[2];
	if($bid>getMaxBid($match_id)){
		continue;
	}
	if($row[3]==$row[5]){
		$result_i = run_query("update standings set score=score+$bid where email='$email'");
	} else{
		$result_i = run_query("update standings set score=score-$bid where email='$email'");
	}
}

echo "Query successfully processed.";
?>
