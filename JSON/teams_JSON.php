<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once '../keyset.php';


// $query = "SELECT * FROM teams";

$query = "SELECT teams.registration_time, teams.email, teams.team_id, teams.game, teams.team_name, teams.team_members, user.contact FROM teams";
$query .= " INNER JOIN user ON teams.email=user.email";
if (isset($_GET['game'])) {
	$game = $_GET['game'];
	if ($game != '99')
	    $query .= " WHERE teams.game='$game'";
} else{
	$query .= " WHERE teams.game='1'";
}



// $query .= " ORDER BY registration_time DESC";
$result = mysql_query($query);
if(!$result) die("Database access failed: ".mysql_error());




$emails = "";
$outp = "[";
while($row = mysql_fetch_row($result)) {
    
    // echo(json_encode($row));
    
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"email":"'			.$row[1]	.'",';
    $outp .= '"team_id":"'			.$row[2]	.'",';
    $outp .= '"game":"'				.$row[3]	.'",';
    $outp .= '"team_name":"'		.$row[4]	.'",';
    $outp .= '"team_members":"'		.$row[5]	.'",';
    $outp .= '"contact":"'		    .$row[6]	.'"}';
    
    $emails .= $row[1] . ',';
}
$outp .="]";



echo($outp);

mysql_close($db_server);

?>
