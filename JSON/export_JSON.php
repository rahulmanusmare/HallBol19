<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once '../keyset.php';
$query = "SELECT team_id, game, team_name, team_members FROM teams";
if (isset($_GET['game'])) {
	$game = $_GET['game'];
	if ($game == 0)
	    $query = "SELECT email, firstname, lastname, contact FROM user";
	else {
	    $query .= " WHERE game='$game'";
        $query .= " ORDER BY registration_time DESC";	    
	}
} else {
    $query .= " ORDER BY registration_time DESC";
}

$result = mysql_query($query);
if(!$result) die("Database access failed: ".mysql_error());

//$outp = "[";
while($row = mysql_fetch_row($result)) {
    if ($outp != "[") {$outp .= ",";}
    echo(trim("\"{$row[0]}\",\"{$row[1]}\",\"{$row[2]}\",\"{$row[3]}")."\"\n"); 
}

mysql_close($db_server);

?>