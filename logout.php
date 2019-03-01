<?php
session_start();
destroySession();
header('Location: ./');
function destroySession(){
	$_SESSION=array();
	session_destroy();
}
?>