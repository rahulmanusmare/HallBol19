<?php
require_once('../keyset.php');

$file = fopen("students.csv","r");
while(! feof($file)){
	$row = fgetcsv($file);
	$roll_no = $row[0];
	$name = $row[1];
	$details = $row[2]." ".$row[3];
	$query = "INSERT INTO `registrations` (`roll_no`, `name`, `details`,`reg_in`) VALUES ('$roll_no', '$name', '$details','0')";
	if($row[0]!=" " && $row[0]!=""){run_query($query);}
}
fclose($file);
?>
