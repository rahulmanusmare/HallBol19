<?php
session_start();
require_once('navigation.php');
?>
<div class="container" ng-app="teams" ng-controller="teamsController" ng-init="game_map={1:'3 a Side Baddy', 2:'7 Stones', 3:'Dodgeball', 4:'Foot Volley', 5:'Futsal', 6:'Gully Cricket(Boys)', 7:'Gully Cricket(Girls)', 8:'Handball', 9:'Kho-Kho', 10:'Throwball(Girls)', 11:'Tug Of War', 12:'Ultimate Frisbee(Boys)', 13:'Ultimate Frisbee (Girls)', 14:'Carrom Wars', 15: 'Handball (Girls)', 16: 'Street Hockey', 17: 'CrossFit Challenge'}">
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Registered Teams
                <small></small>
            </h1>
            <nav class="custom-breadcums">
                <div class="nav-wrapper">
                <div class="col s12">
                    <a href="index.php" class="breadcrumb">Home</a>
                    <a href="#!" class="breadcrumb">Teams</a>
                </div>
                </div>
            </nav>
            <p>Teams shown below are in the reverse order of their registration time. Bottom most people be ready for free stuff!</p>
        </div>
    </div>
    <!-- /.row -->

    <div class="chip">
    Changes in the teams are made as per the requirements of the organizer of the particular event. All the clashes and other validation are done by the organizer himself/herself. Web Developers have no role to play in any of these activities.
    <i class="close material-icons">close</i>
    </div>

    <div class="row">
        
        <div class="col m8 offset-m2 s8 offset-s1">
            <h3 class="page-header">Select Game</h3>
                
            <select class="form-control" name="select_game" id="select_game" ng-model="teamsForm.game" ng-change="teamsForm.loadTeams(this)" material-select>
                <option value="" disabled selected>Choose a game</option>
                <option data-team="4" data-link="crossfit_challenge" value="17">CrossFit Challenge</option>
                <option data-team="3" data-link="3_a_side_baddy" value="1" >3 A Side Baddy</option>
                <option data-team="9" data-link="7_stones" value="2">7 Stones</option>
                <option data-team="8" data-link="dodgeball" value="3">Dodgeball</option>
                <option data-team="7" data-link="foot_volley" value="4">Foot-Volley</option>
                <option data-team="7" data-link="futsal" value="5">Futsal</option>
                <option data-team="9" data-link="gully_cricket" value="6">Gully Cricket(Boys)</option>
                <option data-team="6" data-link="gully_cricket" value="7">Gully Cricket(Girls)</option>
                <option data-team="11" data-link="handball" value="8">Handball(Boys)</option>
                <option data-team="11" data-link="kho_kho" value="9">Kho-Kho</option>
                <!--<option data-team="5" data-link="no_dribble_basky" value="10">No Dribble Basky(Girls)</option>-->
                <option data-team="7" data-link="throwball" value="10">Throwball(Girls)</option>
                <option data-team="15" data-link="tug_of_war" value="11">Tug Of War</option>
                <option data-team="11" data-link="ultimate_frisbee" value="12">Ultimate Frisbee(Boys)</option>
                <option data-team="7" data-link="ultimate_frisbee" value="13">Ultimate Frisbee(Girls)</option>
                <option data-team="2" data-link="carrom" value="14">Carrom Wars</option>
                <option data-team="7" data-link="handball" value="15">Handball(Girls)</option>
                <option data-team="7" data-link="street_hockey" value="16">Street Hockey</option>
                <option value="99">All</option>
                                        
                    <!--
                    <option data-team="6" data-link="7_stones" value="2">7 Stones</option>
                    <option data-team="6" data-link="dodgeball" value="3">Dodgeball</option>
                    <option data-team="7" data-link="foot_volley" value="4">Foot-Volley</option>
                    <option data-team="7" data-link="futsal" value="5">Futsal</option>
                    <option data-team="7" data-link="gully_cricket" value="6">Gully Cricket(Boys)</option>
                    <option data-team="6" data-link="gully_cricket" value="7">Gully Cricket(Girls)</option>
                    <option data-team="9" data-link="handball" value="8">Handball(Boys)</option>
                    <option data-team="9" data-link="kho_kho" value="9">Kho-Kho</option>
                    <option data-team="5" data-link="no_dribble_basky" value="10">No Dribble Basky(Girls)</option>
                    <option data-team="15" data-link="tug_of_war" value="11">Tug Of War</option>
                    <option data-team="10" data-link="ultimate_frisbee" value="12">Ultimate Frisbee(Boys)</option>
                    <option data-team="7" data-link="ultimate_frisbee" value="13">Ultimate Frisbee(Girls)</option>
                    <option data-team="2" data-link="carrom" value="14">Carrom Wars</option>
                    <option data-team="7" data-link="carrom" value="15">Handball(Girls)</option>       
                    
                    -->
                        
            </select>
            <div class="col s12"><div class="col-xs-6">Search with a keyword &nbsp;<input class="form-control ng-pristine ng-valid browser-default" ng-model="searchKeyword" type="text"> </div></div>
            <br>
            <div>
                <br>
                <ul class="collection teams-view" data-effect="fade" id="data_teams">
                <li class="collection-item">
                    <div class="row team-table-header" >
                        <div class="col m2"><strong>Team ID</strong></div>
                        <div class="col m2"><strong>Game</strong></div>
                        <div class="col m2"><strong>Team Name</strong></div>
                        <div class="col m6"><strong>Team Members</strong></div>
                    </div>
                </li>

                <li ng-repeat="team in teamsForm.events  | filter: searchKeyword" class="collection-item">
                    <div class="row">
                        <div class="col m2">{{team.team_id}}</div>
                        <div class="col m2">{{ game_map[team.game] }}</div>
                        <div class="col m2">{{ team.team_name }} <br><a href="tel:{{team.contact}}" class="material-icons">call</a></div>
                        <div class="col m6">
                            <div ng-repeat="member in team.team_members.split(',')" ng-class="getMemberClass(member)" class="chip">{{member}}</div>
                        </div>
                    </div>
                </li>

            
                </ul>
                        
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
$scope.teamsForm.loadTeams = function(gameID) {
    console.log(gameID);
// $scope.teamsForm.game = event;
    $('#data_teams').show();
    $http.get("./JSON/teams_JSON.php?game="+ gameID)
    .success(function(response) {
        $scope.teamsForm.events = response;
        
    });
}
$("#select_game").on('change', function() {
    $scope.teamsForm.game = $("#select_game").val();
    $scope.teamsForm.loadTeams($("#select_game").val());
    
    });
$scope.getMemberClass = function(name) {
    var patn = /.*\(\d{8}\)\s*$/;
    return patn.test(name) ? "" : "tm-extra";
    }
});

function show_all_teams() {
    angular.element(document.getElementsByClassName("ng-scope")[0]).scope().teamsForm.loadTeams(99);
}

</script>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
require_once('footer.php');
?>