<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once '../keyset.php';

$query = "SELECT email, firstname, lastname, score from standings natural join user order by score DESC";
$result = run_query($query);
$i=1;
$outp = "[";
while($row = mysql_fetch_row($result)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"rank":"'		.$i++	.'",';
    $outp .= '"email":"'		.$row[0]	.'",';
    $outp .= '"name":"'			.$row[1]." ".$row[2]	.'",';
    $outp .= '"score":"'		.$row[3]		.'"}'; 
}
$outp .="]";

echo($outp);

mysql_close($db_server);

?>
