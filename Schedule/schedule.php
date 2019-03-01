<?php

include 'dbvars.php';
$events = array("Gully cricket", "Tug of war","Ultimate Frisbee","Touch Rugby","Futsal", "Kho Kho", "Foot Volley", "3 a side Baddy", "Seven Stones", "Dodge Ball","No Dribble Basky(Girls)");
$parts = array(7, 12, 9, 8, 7, 9, 7, 3, 6, 6, 5);
?>
<html>
<head>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
</head>
<body>
<form method='get' action='AddSchedule.php'>
<table>
<tr><td>Enter Game : </td><td>Team 1</td><td>Team 2</td></tr>
<?php
for($j=0;$j<$MAX;$j++)
{ 
	echo "<tr>";
	
	echo "<td><select name='".$j."game' id='".$j."game'>";
	for($i=0;$i<count($events);$i++)
		echo "<option value='".($i+1)."'>".$events[$i]."</option>";	
	echo "</select></td>";

		echo " <td id='".$j."o1'><select name='".$j."team1' id='".$j."team1'>";	
		
		echo "</select></td>";

	echo "<td id='".$j."o2'><select name='".$j."team2' id='".$j."team2'>";
	echo "</select></td>";

	echo "</tr>";

} 
?>
<tr><td colspan=3><input type='submit' value='Check'/></td></tr>
</table>
</form>
</body>
</html>
<script type='text/javascript'>
var num=[0,1,2,3,4,5,6];
$.each(num,function(i,value){
	$('#'+value+'game').change(function(){
		getteams(value);
	});
});

for(var i=0;i<num.length;i++) getteams(i);

	function getteams(num){
		$("#"+num+"team1").html("Loading..");
		$("#"+num+"team2").html("Loading..");
		$.post('GetTeams.php',
				{'game':$("#"+num+"game").val()},
				function (data, status){
var i,j;
//alert("success"+data.length);
						for(i=1;i<=2;i++)
						{
							$("#"+num+"team"+i).html("");
							for(j=0;j<data.length;j++)
								$("#"+num+"team"+i).append("<option value='"+(j+1)+"'>"+data[j]+"</option>");
						}
				  },
			"json"
		);
	}
</script>