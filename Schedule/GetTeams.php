<?php
#session_cache_limiter('nocache');
#header('Expires: ' . gmdate('r', 0));
#header('Content-type: application/json');

include 'dbvars.php';

#$link=mysql_connect($host,$username,$pass);
#mysql_select_db($db,$link);
#	$k=0;
	#$sql="SELECT team FROM event".$_POST['game'];
	#$result=mysql_query($sql,$link);
	#while($team=mysql_fetch_array($result))
#		$teams[$k++]=$team['team'];

#@mysql_close($link);
data = $games_teams[$gameids[array_search($_POST['game'],$events)]]
echo json_encode($data);

?>