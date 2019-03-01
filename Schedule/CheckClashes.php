<?php
include 'dbvars.php';
$ok=1;

$parts = array(7, 12, 9, 8, 7, 9, 7, 3, 6, 6, 5);

$link=mysql_connect($host,$username,$pass);
mysql_select_db($db,$link);

	$Event=$_POST["Event"];
	$Team[1]=$_POST["Team1"];
	$Team[2]=$_POST["Team2"];
	

for($j=0;$j<count($Event);$j++)
{
	$k=0;
	for($tno=1;$tno<=2;$tno++)
	{
		$sql="SELECT * FROM event".$Event[$j]." LIMIT ".($Team[$tno][$j]-1).",1";
//		echo $sql."<br/>";
		$result=mysql_query($sql,$link);
		if($team=mysql_fetch_array($result))
		for($i=1;$i<=$parts[$Event[$j]-1];$i++)
		{
			$members[$j][$k]=$team["e".$Event[$j]."part".$i];
			$k++;
		}
	}
	//print_r($members[$j]);
	//print_r($members[$n]);
}
$cno=1;

for($j=0;($j<count($Event));$j++)
{
	for($n=0;$n<$j;$n++)
	{

		$arr=array_intersect($members[$j],$members[$n]);
		if(!empty($arr))
		{
			echo "<tr>"
				."<td>".$cno.".</td>"
				."<td> Conflict in Match ".($n+1)." and Match ".($j+1)."</td>";
			
			echo "<td>";
			$keys=array_keys($arr);
			for($i=0;$i<count($arr);$i++)
				echo $arr[$keys[$i]]."&nbsp; , &nbsp;";
			echo "</td>"
				."</tr>";
			$cno++;
			$ok=0;
		}
	}
}

if($ok) echo "<tr><td colspan=10> Success: No Clashes Found </td></tr>";

?>