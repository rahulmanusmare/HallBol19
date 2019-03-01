<?php
session_start();
require_once('keyset.php');
require_once('navigation.php');

function validate_email($field) {
	if (strstr($field, '@')!="@iitgn.ac.in") return "Please enter valid IIT Gandhinagar email-id.<br />";
	return "";
}
function fix_string($string){
	if(get_magic_quotes_gpc()) $string = stripslashes($string);
	return htmlentities($string);
}

if(isset($_GET['email'])){
	$email = fix_string($_GET['email']);
	if(validate_email($email)!="") die("Please enter valid IIT Gandhinagar email-id.<br />");
} else if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
} else{
	die("Please login to view your requested page");
}
$result = run_query("select * from user where email='$email'");
$row = mysql_fetch_row($result);
?>
<div class="container">
	<h3 class="page-header"><?php echo $row[1]." ".$row[2]; ?></h3>
	<div id="loading" class="text-center">
		<img src="./img/load.gif" alt="Loading..." class="img-responsive center-block">
		<h4>Loading...</h4>
	</div>
	<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-1">
	<table class="row table-striped" id="predict_table">
		<thead>
			<tr>
				<th class="col-md-2">Match ID</th>
				<th class="col-md-3">Bidded at</th>
				<th class="col-md-3">Bid Amount</th>
				<th class="col-md-2">Bidded for Team</th>
				<th class="col-md-2">Winning Team</th>
			</tr>
		</thead>
		<tbody id="table_body">
			
		</tbody>
	</table>
	</div>
</div>
<script>
function createForm(n, match_id, data, teams){
	game_map={1:'3 a Side Baddy', 2:'7 Stones', 3:'Dodgeball', 4:'Foot Volley', 5:'Futsal', 6:'Gully Cricket(Boys)', 7:'Gully Cricket(Girls)', 8:'Handball', 9:'Kho-Kho', 10:'No Dribble Basky(Girls)', 11:'Tug Of War', 12:'Ultimate Frisbee(Boys)', 13:'Ultimate Frisbee (Girls)', 14:'Carrom Wars', 15: 'Handball (Girls)'};
	return '\
	<tr>\
		<td class="col-md-1">'+match_id+'</td>\
		<td class="col-md-1">'+data[match_id]['entry_at']+'</td>\
		<td class="col-md-1">'+data[match_id]['bid_amount']+'</td>\
		<td class="col-md-1">'+data[match_id]['bid_for']+'</td>\
		<td class="col-md-1">'+data[match_id]['winner']+'</td>\
	</tr>\
	';
}
$(document).ready(function(){
	var teams;
	var mybids;
	$('#predict_table').hide();
	$.when(getTeams(), getMyBids()).done(function(a1, a2){
    	$('#loading').hide();
    	$('#predict_table').show();
    	i=1;
    	for(x in mybids){
    		$('#table_body').append(createForm(i, x, mybids, teams));
    		i++;
    	}
	});
	function getTeams(){
		return $.ajax({
		  type: 'GET',
		  url: "./JSON/pred_teams_JSON.php",
		  data: '',
		  success: function(data){
		  	teams = data;
		  },
		  error: function(e){
			alert("Failure in getting teams:"+e.responseText);
		  },
		  dataType: "json"
		});
	}
	function getMyBids(){
		return $.ajax({
		  type: 'GET',
		  url: "./JSON/pred_bidded_JSON.php?email=<?php echo $email;?>",
		  data: '',
		  success: function(data){
		  	mybids = data;
		  },
		  dataType: "json"
		});
	}

});
</script>
<?php
require_once('footer.php');
?>
