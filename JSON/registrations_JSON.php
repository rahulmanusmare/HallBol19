<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once '../keyset.php';
$query = "SELECT * FROM registrations ORDER BY name";

$result = mysql_query($query);
if(!$result) die("Database access failed: ".mysql_error());

$outp = "{";
while($row = mysql_fetch_row($result)) {
    if ($outp != "{") {$outp .= ",";}
    $outp .= '"'.fix_string($row[0]).'":{"name":"'			.fix_string($row[1])	.'",';
    $outp .= '"details":"'				.fix_string($row[2])	.'",';
    $outp .= '"reg_in":['		.fix_string($row[3])	.']}';
}
$outp .="}";

echo($outp);

mysql_close($db_server);
function fix_string($string){
	if(get_magic_quotes_gpc()) $string = stripslashes($string);
	return htmlentities($string);
}
?>
