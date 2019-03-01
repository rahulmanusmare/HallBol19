<?php
session_start();
require_once './keyset.php';
require_once './debug.php';

if(!(isset($_POST['email'])
	&& isset($_POST['firstname'])
	&& isset($_POST['lastname'])
	&& isset($_POST['password'])
	&& isset($_POST['password_confirmation'])
	&& isset($_POST['gender'])
	&& isset($_POST['degree'])
	&& isset($_POST['contact']))){
		http_response_code(400);
	if ($debug) die("Post variables not set.");
	else die();
}
$email = fix_string($_POST['email']);
$rollno = fix_string($_POST['rollno']);
$firstname = fix_string($_POST['firstname']);
$lastname = fix_string($_POST['lastname']);
$fullnameUser = $firstname ." " .$lastname ;
$password = fix_string($_POST['password']);
$password_confirmation = fix_string($_POST['password_confirmation']);
$gender = fix_string($_POST['gender']);
$degree = fix_string($_POST['degree']);
$contact = fix_string($_POST['contact']);

$fail = "";
$fail  = validate_email($email);
$fail  = validate_firstname($firstname);
$fail .= validate_lastname($lastname);
$fail .= validate_password($password);
$fail .= validate_password_confirmation($password_confirmation, $password);
$fail .= validate_gender($gender);
$fail .= validate_degree($degree);

$password = md5($password);

$query = "INSERT INTO `user` (`email`, `firstname`, `lastname`, `password`, `gender`, `degree`, `contact`, `confirm`) 
	VALUES ('$email', '$firstname', '$lastname', '$password', '$gender', '$degree', '$contact', '0')";

if ($fail!="") {
	$_SESSION['signup_error']=$fail;
	header('Location: ./signup.php');
}

$result = mysql_query($query);

if(!$result){
	if(mysql_errno()==1062){
		$_SESSION['signup_error']="Username already exists.";
	} else {
		$_SESSION['signup_error']="Database access failed: ".mysql_error();
	}
	header('Location: ./signup.php');
}


session_unset($_SESSION['signup_error']);

//$xml = file_get_contents('http://students.iitgn.ac.in/hallabol/mail_confirmation.php?email='.$email.'&rollno='.$rollno.'&fullname='.$fullnameUser);
header("Location: ./mail_confirmation.php?email=".$email."&rollno=".$rollno."&fullname=".$fullnameUser);
//header('Location: ./confirm.php');


function fix_string($string){
	if(get_magic_quotes_gpc()) $string = stripslashes($string);
	return htmlentities($string);
}
function validate_email($field) {
	if (strstr($field, '@')!="@iitgn.ac.in") return "Please enter valid IIT Gandhinagar email-id.<br />";
	return "";
}
function validate_firstname($field) {
	if ($field == "") return "No First Name was entered<br />";
	return "";
}

function validate_lastname($field) {
	if ($field == "") return "No Last Name was entered<br />";
	return "";
}

function validate_password($field) {
	if ($field == "") return "No Password was entered<br />";
	else if (strlen($field) < 6)
		return "Passwords must be at least 6 characters<br />";
	else if (strlen($field) > 20)
		return "Passwords can be atmost of 20 characters<br />";
	return "";
}

function validate_password_confirmation($field1, $field2) {
	if ($field1 == "") return "No confirmation password entered<br />";
	else if ($field1 != $field2)
		return "Make sure you are entering same passwords<br />";
	return "";
}

function validate_contact($field) {
	if ($field == "") return "No Contact number was entered<br />";
	else if(strlen($field)!=10) return "Please enter a valid mobile number";
	return "";
}
function validate_gender($field){
	if(!($field=='M' || $field=='F' || $field=='O')) return "Please don't try to play with gender, it may harm you";
	return "";
}
function validate_degree($field){
	if(!($field=='B' || $field=='M' || $field=='P' || $field=='S' || $field=='A' || $field=='D' || $field=='O')) return "B.Tech is more awesome than your entered degree";
	return "";
}

?>