<div class="container">
	<br>
	<div id="loading" class="text-center">
		<img src="./img/load.gif" alt="Loading..." class="img-responsive center-block">
		<h4>Loading...</h4>
	</div>
	<table class="row table-striped" id="predict_table">
		<thead>
			<tr>
				<th class="col-md-1">Match ID</th>
				<th class="col-md-1">Game</th>
				<th class="col-md-3">Team 1</th>
				<th class="col-md-3">Team 2</th>
				<th class="col-md-1">Max Bid</th>
				<th class="col-md-1">Select Team</th>
				<th class="col-md-1">Bid Amount</th>
				<th class="col-md-1"></th>
			</tr>
		</thead>
		<tbody id="table_body">
			
		</tbody>
	</table>
</div>
<script>
function createForm(n, match_id, data, teams){
	game_map={1:'3 a Side Baddy', 2:'7 Stones', 3:'Dodgeball', 4:'Foot Volley', 5:'Futsal', 6:'Gully Cricket(Boys)', 7:'Gully Cricket(Girls)', 8:'Handball', 9:'Kho-Kho', 10:'No Dribble Basky(Girls)', 11:'Tug Of War', 12:'Ultimate Frisbee(Boys)', 13:'Ultimate Frisbee (Girls)', 14:'Carrom Wars', 15: 'Handball (Girls)'};
	return '\
	<tr>\
		<form name="form_'+n+'" id="form_'+n+'" member="'+n+'" match_id="'+match_id+'" class="fmr">\
		<td class="col-md-1">'+match_id+'</td>\
		<td class="col-md-1">'+game_map[data[match_id]['game']]+'</td>\
		<td class="col-md-3"><strong>'+teams[data[match_id]['team_1']]['team_name']+'</strong> : '+teams[data[match_id]['team_1']]['team_members']+'</td>\
		<td class="col-md-3"><strong>'+teams[data[match_id]['team_2']]['team_name']+'</strong> : '+teams[data[match_id]['team_2']]['team_members']+'</td>\
		<td class="col-md-1"><span id="max_bid_'+n+'" max_bid="'+data[match_id]['max_bid']+'">'+data[match_id]['max_bid']+'</span></td>\
		<td class="col-md-1">\
			<div class="btn-group" data-toggle="buttons" data-effect="fall">\
              <label class="btn btn-primary active">\
                <input type="radio" name="team_select_'+n+'" value="1" checked=""> 1\
              </label>\
              <label class="btn btn-primary">\
                <input type="radio" name="team_select_'+n+'" value="2"> 2\
              </label>\
            </div>\
		</td>\
		<td class="col-md-1">\
			<div class="form-group">\
			  <label class="control-label" for="bid_amount_'+n+'"></label>\
			  <div>\
			  <input id="bid_amount_'+n+'" name="bid_amount_'+n+'" type="text" placeholder="" class="form-control input-md">\
			  </div>\
			</div>\
		</td>\
		<td class="col-md-1">\
			<div class="form-group">\
			  <div>\
			    <button id="submit_'+n+'" name="submit_'+n+'" member="'+n+'" match_id="'+match_id+'" class="btn btn-primary">Submit</button>\
			  </div>\
			</div>\
		</td>\
		</form>\
	</tr>\
	';
}
function attachSubmit(m){
	$('#submit_'+m).on('click',function(e){
		e.preventDefault();
		member = $(this).attr('member');
		match_id = 	$(this).attr('match_id');
		bid = $('#bid_amount_'+member).val();
		bid_for = $("input[name=team_select_"+member+"]:checked").val();
		max_bid = parseInt($('#max_bid_'+member).attr('max_bid'));
		if(bid==""){
			alert("Please enter bidding value before submitting");
			return;
		}
		bid=parseInt(bid);
		if(isNaN(bid)){
			alert("Please enter a valid integer value");
			return;
		}
		if(bid>max_bid || bid<0){
			alert("Please enter bid from 0 to Max Bid Value");
			return;
		}
		$('#submit_'+member).prop('disabled', true);
		var getting = $.get("./admin/bid.php?bid="+bid+"&match_id="+match_id+"&bid_for="+bid_for, function(data) {
			console.log(data);
			$('#form_'+member).parent().empty();
		})
		.fail(function() {alert( "Connection error: Cannot Bid" );$('#submit_'+member).prop('disabled', false);});
	});
}
$(document).ready(function(){
	var teams;
	var biddable;
	var bidded;
	$('#predict_table').hide();
	$.when(getTeams(), getBiddable(), getBidded()).done(function(a1, a2, a3){
    	$('#loading').hide();
    	$('#predict_table').show();
    	i=1;
    	for(x in biddable){
    		if(!($.inArray(parseInt(x), bidded)>-1)){
    			$('#table_body').append(createForm(i, x, biddable, teams));
	    		attachSubmit(i);
	    		i++;
    		}
    	}
	});
	function getTeams(){
		return $.ajax({
		  type: 'GET',
		  url: "http://students.iitgn.ac.in/hallabol/JSON/pred_teams_JSON.php",
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
	function getBiddable(){
		return $.ajax({
		  type: 'GET',
		  url: "./JSON/pred_biddable_JSON.php",
		  data: '',
		  success: function(data){
		  	biddable = data;
		  },
		  error: function(e){
			alert(e.responseText);
		  },
		  dataType: "json"
		});
	}
	function getBidded(){
		return $.ajax({
		  type: 'GET',
		  url: "./JSON/pred_bidded_test_JSON.php",
		  data: '',
		  success: function(data){
		  	bidded = data;
		  },
		  error: function(e){
			alert(e.responseText);
		  },
		  dataType: "json"
		});
	}

});
</script>