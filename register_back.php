<?php
session_start();
require_once('keyset.php');
if(!(isset($_POST['game']) && isset($_POST['team_name']) && isset($_POST['team_members']))){
	// 1 when things are not entered
	header('Location: ./register.php?error=1');
	die();
}

$game = fix_string($_POST['game']);
$team_name = fix_string($_POST['team_name']);
$team_members = fix_string($_POST['team_members']);
$rolls = fix_string($_POST['rolls']);

if($game<0 || $game>16){
	// 2 when game index not in range
	echo "Please select a valid game";
}
if($team_name==""){
	// 3 when team name is not valid
	echo "Please enter a valid team name";
}
if($team_members==""){
	// 4 when team name is not valid
	echo "Please enter valid team members";
}




$email = $_SESSION['email'];
$query = "INSERT INTO `teams` (`registration_time`, `email`, `team_id`, `game`, `team_name`, `team_members`) 
VALUES (CURRENT_TIMESTAMP, '$email', NULL, '$game', '$team_name', '$team_members')";
$result = run_query($query);




$roll_nos = split(',',$rolls);
for ($i=0; $i < sizeof($roll_nos); $i++) { 
	$roll = $roll_nos[$i];
	echo $roll;
	if($roll!='' && $roll!=' ' && $roll!='select'){
		$query = "select * from registrations where roll_no=$roll";
		$result = run_query($query);
		$row = mysql_fetch_row($result);
		$update = $row[3].",".$game;
		$query = "UPDATE `registrations` SET `reg_in`= '$update' WHERE  `roll_no` =  '$roll'";
		$result = run_query($query);
	}
	
}



if($result){
	echo "Team sucessfully registered with team ID";
}
else{
	die(mysql_error());
}
function fix_string($string){
	if(get_magic_quotes_gpc()) $string = stripslashes($string);
	return htmlentities($string);
}

?>
