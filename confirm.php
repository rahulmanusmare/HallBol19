<?php
session_start();
require_once('keyset.php');

$error = FALSE;
if(isset($_GET['email'])
  && isset($_GET['code'])){
  $email = $_GET['email'];
  $rollno= $_GET['rollno'];
  $fullname= $_GET['fullname'];
  
  $hashcode = md5("hallabol18".$email."saltedItem");
  if($_GET['code']==$hashcode){

    $query = "UPDATE  `user` SET  `confirm` =  '$hashcode' WHERE  `email` =  '$email'";
    $result = mysql_query($query);
    
    
    
    // $resultx = run_query("INSERT INTO `registrations` (`roll_no`, `name`) VALUES ('$rollno', '$fullname')");
    // Override
    $resultNewRegistration = "SELECT * FROM registrations WHERE roll_no='". $rollno. "'";
    $resultNewRegistrationQuery = mysql_fetch_array(mysql_query($resultNewRegistration));
        
        
        
    if($resultNewRegistrationQuery == false){
    	 $resultx = run_query("INSERT INTO `registrations` (`roll_no`, `name`) VALUES ('$rollno', '$fullname')");
    }
    
    
    
    
    
    
    if(!$result){
      if($debug) die("Database access failed: ".mysql_error());
      else die();
    }else{
      $result = run_query("INSERT INTO `standings` (`email`, `score`) VALUES ('$email', '10000')");
      header('Location: ./login.php');
    }
  } else{
    $error = TRUE;
  }
}
else{
  $error = FALSE;
}

require_once('navigation.php');
?>



<div class="parallax-container logueo">
      	<div class="parallax"><img src="img/game_cover.jpg"></div>
      	<div class="row"><br>
      		<div class="col m8 s12 offset-m2 center">
      			<h4 class="bg-card-user">
      				<img src="img/favicon.png" alt="" class="circle responsive-img card" style="background: #fff; padding: 1%; border-radius: 100px;">
					  <div class="row login">
					  	<h4>Email Confirmation</h4>
					  	<h6>Please Check your mail for confirmation code.</h6>
			  	
<?php  if ($error) { ?>
					  	<h6 class="red-text">Invalid Email or confirmation code!</h6>
<?php } ?>					  	
				  	
					    <form class="col s12" role="form" method="get" action="./confirm.php">
					        
					      <div class="row" style="margin-bottom:0px;">
					         <div class="input-field col m12 s12">
					          <i class="material-icons iconis prefix">account_box</i>
					          <input type="text" class="validate" id="email" name="email">
					          <label for="email">Email</label>
					        </div>
					      </div>
					      
					      <div class="row" style="margin-bottom:0px;">
					         <div class="input-field col m12 s12">
					          <i class="material-icons iconis prefix">vpn_key</i>
					          <input type="text" class="form-control"  id="code" name="code">
					          <label for="code">Confirmation Code</label>
					        </div>
					      </div>
					      
					
					      
					      
     
					      
                        
					      <div class="row">
					      	<button class="btn waves-effect waves-light" type="submit" name="action">Confirm</button>
					      </div>
					      <div class="row">
                              <div class="col m12 s12">
                                  <div style="padding-top:7px; font-size:14px;" >
                                      Already have an account? 
                                      <a href="./login.php">
                                          Login Here
                                      </a>
                                  </div>
                              </div>
                          </div>
					    </form>
					  </div>
      			</h4>
		   	  </div>
	    	</div>
</div>



<div hidden="true" class="container" ng-app="insertEvents" ng-controller="insertEventsController">
  <div class="row">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-7 col-sm-offset-3">                    
      <div class="panel panel-info" >

        <div class="panel-heading">
          <div class="panel-title">Email Confirmation</div>
          <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
        </div>
        
        <div style="padding-top:30px" class="panel-body" >
        <div class="alert alert-success alert-dismissable" id="error_message">
         <button type="button" class="close" data-dismiss="alert" 
            aria-hidden="true">
            &times;
         </button>
         <span id="error_msg">Please Check your mail for confirmation code.</span>
      </div>
        <?php
          if ($error) {
            echo '<div style="color:red;" id="login-alert" class="alert alert-danger col-sm-12" >
                <p>Invalid Email or confirmation code!</p>
            </div>';                     
          } 
        ?>

        <form class="form-inline" method="get" action="./confirm.php">
          <input type="text" class="form-control" placeholder="Email" id="email" name="email">
          <input type="text" class="form-control" placeholder="Confirmation Code" id="code" name="code">
          <button type="submit" class="btn btn-primary">Confirm</button>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    <style>
    /* LOGIN */
.logueo {/* PARALLAX */
    height: 800px!important;
}
i.iconis {
    font-size: 1em!important;
    margin-top: 8px;
}
.login {
    border: 1px solid #FFF;
    width: 92%;
    margin: 0 auto;
    background-color: rgba(255,255,255,.7);
    padding: 20px;
}
</style>

<script>
    	$(document).ready(function(){
    		$('.button-collapse').sideNav({
		      menuWidth: 300, // Default is 300
		      edge: 'left', // Choose the horizontal origin
		      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
		      draggable: true, // Choose whether you can drag to open on touch screens,
		      onOpen: function(el) { /* Do Stuff*/ }, // A function to be called when sideNav is opened
		      onClose: function(el) { /* Do Stuff*/ }, // A function to be called when sideNav is closed
		    }
		  );
      		$('.parallax').parallax();
    	});
</script>
<?php
require_once('footer.php');
?>