<?php

include 'dbvars.php';
$events = array("3 a side Baddy","Seven Stones","Dodge Ball","Foot Volley","Futsal","Gully cricket(boys)","Gully cricket(girls)","Handball","Kho Kho","No Dribble Basky(Girls)","Tug of war","Ultimate Frisbee(boys)","Ultimate Frisbee(girls)","Carrom Wars","Handball (girls)");
$gameids = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
#$parts = array(7, 12, 9, 8, 7, 9, 7, 3, 6, 6, 5);
?>
<html>
<head>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
</head>
<body>
<form id='AddMatch'>
<table>
<tr><td>Enter Game : </td><td>Team 1</td><td>Team 2</td></tr>
<tr>
	<td>
	<select name='game' id='game'>
	<?php
		for($i=0;$i<count($events);$i++)
			echo "<option value='".($i+1)."'>".$events[$i]."</option>";
	?>
	</select>
	</td>

	<td id='o1'>
	<select name='team1' id='team1'></select>
	</td>

	<td id='o2'>
	<select name='team2' id='team2'></select>
	</td>
</tr>
<tr><td colspan=3><input type='submit' value='Add'/></td></tr>
</form>
</table>

<table>

<THEAD><tr><th colspan=10>Matches Scheduled</th></tr>
<tr><td>Event</td><td>Team 1</td><td>Team 2</td></tr>
</THEAD>

<TBODY id="Matches">

</TBODY>

<TFOOT>
<tr><td colspan=10 id='M_Alerts'>No Matches Scheduled</td></tr>
</TFOOT>

</table>

<button type='button' id='Check'> Check Clashes </button>
<button type='button' id='Clear'> Clear </button>

<table>

<THEAD>
<tr><th colspan=10>Clashes</th></tr>
<tr><td>S.No.</td><td>Clashing Match</td><td>Clashing Players</td></tr>
</THEAD>

<TBODY id='ShowClashes'>
<tr><td colspan=10>Nothing to Display</td></tr>
</TBODY>

</table>

</body>
</html>
<script type='text/javascript'>
$(document).ready(function() {

var M_Event=[], M_Team1=[], M_Team2=[];

function getteams(){
	$("#team1").html("Loading..");
	$("#team2").html("Loading..");
	    
  $.post('GetTeams.php',
		{'game':$("#game").val()},
		function (data, status){
			var i,j;
			for(i=1;i<=2;i++)
			{
				$("#team"+i).html("");
				for(j=0;j<data.length;j++)
					$("#team"+i).append("<option value='"+(j+1)+"'>"+data[j]+"</option>");
			}
		},
		"json"
	);
}
  /*  function remove(index){
		
		//var index=$(this).attr("value");

		M_Event.splice(index,1);
		M_Team1.splice(index,1);
		M_Team2.splice(index,1);
		
		$("#M_Alerts").html(" Match "+(index+1)+" Removed! ");
		$("#Match"+index).remove();

	}
*/
getteams();

$('#game').change(function(){
	getteams();
});

$("#AddMatch").submit(function(){

	M_Event.push($("#game option:selected").val());
	M_Team1.push($("#team1 option:selected").val());
	M_Team2.push($("#team2 option:selected").val());

	$("#M_Alerts").html(" Match"+M_Event.length+" Added! ");
	$("#Matches").append("<tr id='Match"+(M_Event.length-1)+"'>"
		+"<td> " + $("#game option:selected").text() + " </td>"
		+"<td> " + $("#team1 option:selected").text() + " </td>"
		+"<td> " + $("#team2 option:selected").text() + " </td>"
		//+"<td> <button type='button' onclick='remove("+(M_Event.length-1)+")'> Delete </button> </td>"
		+"</tr>");
		
	return false;
});
//onclick='remove("+(M_Event.length-1)+")'
$("#Check").click(function(){
	
	$("#ShowClashes").html(" Loading.. ");
	$.post('CheckClashes.php',
		{'Event[]':M_Event,'Team1[]':M_Team1,"Team2[]":M_Team2},
		function (data, status){$("#ShowClashes").html(data);}
	);

});

$("#Clear").click(function(){
	M_Event=[];
	M_Team1=[];
	M_Team2=[];
	
	$("#Matches").html("");
	$("#M_Alerts").html("All Matches Cleared");

});


});
</script>