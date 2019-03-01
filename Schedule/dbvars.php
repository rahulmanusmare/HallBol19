<?php
$host='localhost';
$username='students_test';
$pass='secret';
$db='students_test';
$MAX=7;

$json = file_get_contents('http://students.iitgn.ac.in/hallabol/Schedule/pred_teams_JSON2.php');

$obj = json_decode($json,true);
$games_teams = array("1" => array(),"2" => array(),"3" => array(),"4" => array(),"5" => array(),"6" => array(),"7" => array(),"8" => array(),"9" => array(),"10" => array(),"11" => array(),"12" => array(),"13" => array(),"14" => array(),"15" => array());
echo sizeof($obj);
print_r($json);

#foreach ($obj as $team_data)
#{
#    $temp = json_decode($obj[$team_data],true);
#    array_push($games_teams[$temp["game"]],$temp["team_name"]);
#}

?>