<?php
session_start();
require_once('navigation.php');
?>
<div class="container">
	<div class="row">
        <div class="col-lg-12">
			<h1 class="page-header">Predictor
				<small>Gambling unleashed</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="index.html">Home</a></li>
				<li class="active">Predictor</li>
			</ol>
		</div>
    </div>
<div class="row">
		<div class="col-md-12">
			<div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="#tab_default_1" data-toggle="tab">
							Ranking </a>
						</li>
						<li>
							<a href="#tab_default_2" data-toggle="tab">
							Predict </a>
						</li>
					</ul>
					<div class="tab-content">

<!-- Content of Tab 1 -->
						<div class="tab-pane active" id="tab_default_1">
							<div class="container" ng-app="teams" ng-controller="teamsController">
								<!-- Page Heading/Breadcrumbs -->
								<div class="row">
									<div class="col-lg-12">
										<h3 class="page-header">Current Standings
											<small></small>
										</h3>
									</div>
								</div>
								<!-- /.row -->
								<div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3">
									<table class="table table-striped" data-effect="fade" id="data_teams">
										<thead>
											<tr>
												<th class="col-md-1">Rank</th>
												<th>Name</th>
												<th>Score</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<tr ng-repeat="x in teamsForm.events">
												<td>{{ x.rank }}</td>
												<td><a href="./profile.php?email={{x.email}}">{{ x.name }}</a></td>
												<td>{{ x.score }}</td>
											</tr>
										</tbody>
									</table>          
								</div>
							</div>
						</div>
<!-- Content of Tab 1 -->
<!-- Content of Tab 2 -->
						<div class="tab-pane" id="tab_default_2">
							<br>
<?php
	if(!isset($_SESSION['email'])){
		print('<div class="container">
	<br>
	<div id="login_message">
		<h3>Please login to continue...</h3>
	</div>
	</div>');
	} else{
		require_once('./comp_predict.php');
	}
?>							
						</div>
<!-- Content of Tab 2 -->
<!-- Content of Tab 3 -->
					</div>
				</div>
			</div>
			</div>
			</div>
</div>
<script>
  angular.module("teams", [])
  .controller("teamsController", function($scope, $http) {
   $scope.teamsForm = {};
   $('#data_teams').hide();
   $http.get("./JSON/predictor_rankings_JSON.php")
   .success(function(response) {$scope.teamsForm.events = response;$('#data_teams').show();});
});

</script>
<?php
require_once('footer.php');
?>