<?php
include 'dbvars.php';
$ok=1;

$parts = array(7, 12, 9, 8, 7, 9, 7, 3, 6, 6, 5);

$link=mysql_connect($host,$username,$pass);
mysql_select_db($db,$link);

for($j=0;$j<$MAX;$j++)
{
	$event[$j]=$_GET[$j."game"];
	$team1[$j]=$_GET[$j."team1"];
	$team2[$j]=$_GET[$j."team2"];
}

for($j=0;($j<$MAX);$j++)
{
	$k=0;
	for($tno=1;$tno<=2;$tno++)
	{
		$sql="SELECT * FROM event".$event[$j]." LIMIT ".($_GET[$j.'team'.$tno]-1).",1";
//		echo $sql."<br/>";
		$result=mysql_query($sql,$link);
		if($team=mysql_fetch_array($result))
		for($i=1;$i<=$parts[$event[$j]-1];$i++)
		{
			$members[$j][$k]=$team["e".$event[$j]."part".$i];
			$k++;
		}
	}
	//print_r($members[$j]);
	//print_r($members[$n]);
}

for($j=0;($j<$MAX);$j++)
{
	for($n=0;$n<$j;$n++)
	{

		$arr=array_intersect($members[$j],$members[$n]);
		if(!empty($arr))
		{
			echo "Conflict in Match ".($n+1)." and Match ".($j+1)."<br/>";
			echo "Conflicting Names : <br/>";
			$keys=array_keys($arr);
			for($i=0;$i<count($arr);$i++)
				echo $arr[$keys[$i]]."&nbsp; , &nbsp;";
			echo "<br/>";
			$ok=0;
		}
	}
}

if($ok) echo "ok!";

?>