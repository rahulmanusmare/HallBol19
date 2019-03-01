<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once '../keyset.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if(!$db_server) die("Unable to connect to MySQL: ".mysql_error());

mysql_select_db($db_database) or die("Unable to select database: ".mysql_error());
if(isset($_GET['id'])) $user = $_GET['id'];
else $user = 'dhruvpancholi@iitgn.ac.in';
$query = "SELECT * FROM user WHERE email='$user'";
$result = mysql_query($query);
if(!$result) die("Database access failed: ".mysql_error());

$outp = "[";
while($row = mysql_fetch_row($result)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"email":"'			.$row[0]	.'",';
    $outp .= '"firstname":"'		.$row[1]	.'",';
    $outp .= '"lastname":"'			.$row[2]	.'",';
    $outp .= '"password":"'			.$row[3]	.'",';
    $outp .= '"designation":"'		.$row[4]	.'"}';
}
$outp .="]";

echo($outp);

mysql_close($db_server);

?>
