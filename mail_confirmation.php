<?php
if(!isset($_GET['email'])) die("Email ID not set");

$email = $_GET['email'];
$rollno= $_GET['rollno'];
$fullname= $_GET['fullname'];
$to  = $email;
$hashcode = md5("hallabol18".$email."saltedItem");

// subject
$subject = 'Hallabol\'19 Signup| Verification';

// message
$message = "
<html>
<head>
  <title>Hallabol Email Confirmation</title>
</head>
<body>
  <h2>Hallabol'19</h2>
  <p>Thanks for signing up!</p>
<p>Your account has been created, please click <a href='http://students.iitgn.ac.in/hallabol/confirm.php?email=$email&code=$hashcode&rollno=$rollno&fullname=$fullname'>here</a> to activate your account, or enter this code: <b>$hashcode</b> at the confirmation page.
  </p>
</body>
</html>
";

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'From: Hallabol <noreply-hallabol@iitgn.ac.in>' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);

header('Location: ./confirm.php');
?>