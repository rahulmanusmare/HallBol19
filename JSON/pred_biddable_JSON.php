<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once('../keyset.php');
$result = run_query("select * from events where CURRENT_TIMESTAMP < DATE_SUB(event_time, INTERVAL 1 HOUR) AND winner=0 ORDER BY event_time");
$outp = "{";
while($row = mysql_fetch_row($result)) {
    if ($outp != "{") {$outp .= ",";}
    $outp .= '"'.$row[0].'":';
    $outp .= '{"event_time":"'		.$row[1]	.'",';
    $outp .= '"game":"'		.$row[2]	.'",';
    $outp .= '"team_1":"'		.$row[3]	.'",';
    $outp .= '"team_2":"'		.$row[4]	.'",';
    $outp .= '"max_bid":"'		.$row[5]	.'",';
    $outp .= '"winner":"'		.$row[6]	.'"}';
}
$outp .="}";
echo $outp;
?>