<?php
require_once('keyset.php');

if(isset($_POST['email']) && isset($_POST['password'])){


  $emailVal = ($_POST['email']);
  
  if (!filter_var($emailVal, FILTER_VALIDATE_EMAIL)) {
     $emailErr = true; 
  }
  else {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE email='$email'";
    $result = run_query($query);

    $row = mysql_fetch_row($result);
    $password = md5($password);

    if($password==$row[3]){
      if(strlen($row[7])!=32) header('Location: ./confirm.php');
      else{
         session_start();
         $_SESSION['email'] = $row[0];
         $_SESSION['firstname'] = $row[1];
         $_SESSION['lastname'] = $row[2];
         $_SESSION['gender'] = $row[4];
         $_SESSION['degree'] = $row[5];
         $_SESSION['contact'] = $row[6];
         header('Location: ./');
         die();
      }
    }
  }
}

require_once('navigation.php');
  require_once('./keyset.php');
  $sessionid = session_id();
  $addr = $_SERVER['REMOTE_ADDR'];
  $script = $_SERVER['SCRIPT_NAME'];
  $query = "INSERT INTO `visitors` (`visited_at`, `session_id`, `address`, `script`) 
  VALUES (CURRENT_TIMESTAMP, '$sessionid', '$addr', '$script')";
  run_query($query);
?>


<div class="parallax-container logueo">
      	<div class="parallax"><img src="img/game_cover.jpg"></div>
      	<div class="row"><br>
      		<div class="col m8 s12 offset-m2 center">
      			<h4 class="truncate bg-card-user">
      				<img src="img/favicon.png" alt="" class="circle responsive-img card" style="background: #fff; padding: 1%; border-radius: 100px;">
					  <div class="row login">
					  	<h4>Login</h4>
					  	
<?php  if (isset($_POST['email'])) { ?>
					  	<h6 class="red-text">Invalid Username or password!</h6>
<?php } if ($emailErr){ ?>					  	
					  	<h6 class="red-text">Oops! That doesn't look like a valid email addres.</h6>
<?php } ?>					  	
					    <form class="col s12" role="form" method="post" action="./login.php">
					      <div class="row">
					         <div class="input-field col m12 s12">
					          <i class="material-icons iconis prefix">account_box</i>
					          <input id="icon_prefix" type="text" name="email" class="validate">
					          <label for="icon_prefix">Email</label>
					        </div>
					      </div>
					      <div class="row" style="margin-bottom:0px;">
					        <div class="input-field col m12 s12">
					          <i class="material-icons iconis prefix">enhanced_encryption</i>
					          <input id="password" type="password" name="password" class="validate">
					          <label for="password">Password</label>
					        </div>
					      </div>
					      
                          <div class="row" style="margin-top:0px; padding-left:13px;">
					        <div class="left-align col m12 s12">
					            <input id="login-remember" type="checkbox" name="remember" value="1"> 
					            <label for="login-remember">Remember me</label>
					        </div>
					    
					      </div>
					      <div class="row">
					      	<button class="btn waves-effect waves-light" type="submit" name="action">Login</button>
					      </div>
					      <div class="row">
                              <div class="col m12 s12">
                                  <div style="border-top: 1px solid#888; padding-top:15px; font-size:14px;" >
                                      Don't have an account! 
                                      <a href="./signup.php">
                                          Sign Up Here
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


<div hidden="true" class="container">   

    

    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-7 col-sm-offset-3">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Sign In</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#" onclick="alert('Please contact admin!');">Forgot password?</a></div>
            </div>
            <?php
            if (isset($_POST['email'])) {
              echo '<div id="login-alert" class="alert alert-danger col-sm-12" >
              <p>Invalid Username or password!</p>
          </div>';                     
      } 
      
      	    if ($emailErr){
      	    	echo "<div id='login-alert' class='alert alert-danger col-sm-12' >
	              <p>That doesn't look like a valid email address.</p>
	          </div>";  
      	    }
      ?>
      <div style="padding-top:30px" class="panel-body" >

        <form id="loginform" class="form-horizontal" role="form" method="post" action="./login.php">

       
            <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="email" type="text" class="form-control" name="email" value="" placeholder="email">                                        
            </div>

            <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="password" type="password" class="form-control" name="password" placeholder="password">
            </div>



            <div class="input-group">
              <div class="checkbox">
                <label>
                  <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
              </label>
              </div>
            </div>


            <div style="margin-top:10px" class="form-group">
              <!-- Button -->

              <div class="col-sm-12 controls">
                <button type="submit" id="btn-login" class="btn btn-success">Login  </a>
                </div>
            </div>


            <div class="form-group">
              <div class="col-md-12 control">
                  <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                      Don't have an account! 
                      <a href="./signup.php">
                          Sign Up Here
                      </a>
                  </div>
              </div>
          </div>    
      </form>
    </div>                     
</div>  
</div>
</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<style>
    /* LOGIN */
.logueo {/* PARALLAX */
    height: 650px!important;
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
</body>
