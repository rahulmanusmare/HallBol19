<?php
require_once('../keyset.php');
$file = fopen("btech.csv","r");

while(! feof($file)){
	$row = fgetcsv($file);
	$roll_no = $row[1];
	$name = $row[2];
	$details = $row[3]." ".$row[4];
	$query = "INSERT INTO `registrations` (`roll_no`, `name`, `details`,`reg_in`) VALUES ('$roll_no', '$name', '$details','0')";
	if($row[0]!=" " && $row[0]!=""){run_query($query);}
}
fclose($file);
$file = fopen("pg.csv","r");
while(! feof($file)){
	$row = fgetcsv($file);
	$roll_no = $row[1];
	$name = $row[2];
	$details = $row[3]." ".$row[4];
	$query = "INSERT INTO `registrations` (`roll_no`, `name`, `details`,`reg_in`) VALUES ('$roll_no', '$name', '$details','0')";
	if($row[0]!=" " && $row[0]!=""){run_query($query);}
}
fclose($file);
?>
