<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once('./keyset.php'); ?>
<?php require_once('./navigation.php'); ?>
<title>Admin Interface</title>
</head>

<body>
  <div class="container" ng-app="insertEvents" ng-controller="insertEventsController">
  
  <h2>Events Insertion Form</h2>
  <p>Events are the games to be played with a self generated unique Match Id.</p>
  <div class="row">
    <form class="form-inline">
      <input type="text" style="max-width:100px;" class="form-control" placeholder="Match Id" id="match_id" ng-model="eventsForm.match_id" ng-length="6">
      <input type="date" style="max-width:160px;" class="form-control" placeholder="Time" id="date" ng-model="eventsForm.date">
      <input type="time" style="max-width:140px;" class="form-control" placeholder="Time" id="time" ng-model="eventsForm.time">
      <input type="text" style="max-width:100px;" class="form-control" placeholder="Sport Id" id="game" ng-model="eventsForm.game">
      <input type="text" style="max-width:100px;" class="form-control" placeholder="Team 1 Id" id="team_1" ng-model="eventsForm.team_1" ng-length="6">
      <input type="text" style="max-width:100px;" class="form-control" placeholder="Team 2 Id" id="team_2" ng-model="eventsForm.team_2" ng-length="6">
      <input type="text" style="max-width:100px;" class="form-control" placeholder="Max Bid" id="max_bid" ng-model="eventsForm.max_bid">
      <button style="max-width:100px;" class="btn btn-primary" ng-click="eventsForm.submitForm()">Insert</button>
    </form>
    {{eventsForm.date+eventsForm.time}}
  </div>
    <h2>Latest Inserted Events</h2>
    <div>
            <table class="table table-striped" data-effect="fade">
              <thead>
                <tr>
                  <th>Match Id</th>
                  <th>Time</th>
                  <th>Game</th>
                  <th>Team 1</th>
                  <th>Team 2</th>
                  <th>Max Bid</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="x in eventsForm.events">
                  <td>{{ x.match_id }}</td>
                  <td>{{ x.event_time }}</td>
                  <td>{{ x.game }}</td>
                  <td>{{ x.team_1 }}</td>
                  <td>{{ x.team_2 }}</td>
                  <td>{{ x.max_bid }}</td>
                  <td><button style="max-width:100px;" class="btn btn-primary" ng-click="eventsForm.deleteEvent(this)">Delete</button></td>
                </tr>
              </tbody>
            </table>          
          </div>
  </div>
<script>
  angular.module("insertEvents", [])
  .controller("insertEventsController", function($scope, $http) {
   $scope.eventsForm = {};
   $scope.eventsForm.match_id = "";
   $scope.eventsForm.game  = "";
   $scope.eventsForm.event_time = $scope.eventsForm.date +" "+ $scope.eventsForm.time+":00";
   $http.get("./JSON/events_JSON.php?order=event_time")
   .success(function(response) {$scope.eventsForm.events = response;});

   $scope.eventsForm.deleteEvent = function(item, event) {
    var responsePromise = $http({
      method: 'GET',
      url: "./insertevents_back.php?delete="+item.x.match_id,
      data: $.param({}),
      headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    });
    responsePromise.success(function(dataFromServer, status, headers, config) {
      console.log("Deleted item: "+item.x.match_id);
      $http.get("./JSON/events_JSON.php?order=event_time")
      .success(function(response) {$scope.eventsForm.events = response;});
    });
    responsePromise.error(function(data, status, headers, config) {
      alert("Submitting form failed!");
    });
  }

  $scope.eventsForm.submitForm = function(item, event) {
   var dataObject = {
    match_id : $scope.eventsForm.match_id
    , event_time : $scope.eventsForm.date +" "+ $scope.eventsForm.time+":00"
    , game  : $scope.eventsForm.game
    , team_1  : $scope.eventsForm.team_1
    , team_2  : $scope.eventsForm.team_2
    , max_bid  : $scope.eventsForm.max_bid
  };

  var responsePromise = $http({
    method: 'POST',
    url: './insertevents_back.php',
    data: $.param(dataObject),
    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
  });
  responsePromise.success(function(dataFromServer, status, headers, config) {
    console.log(dataFromServer);
    $http.get("./JSON/events_JSON.php?order=event_time")
    .success(function(response) {$scope.eventsForm.events = response;});
  });
  responsePromise.error(function(data, status, headers, config) {
    alert("Submitting form failed!");
  });
}
});

</script>
</body>
</html>

