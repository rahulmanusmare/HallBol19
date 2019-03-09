<?php
session_start();
require_once('navigation.php');
?>

<div class="parallax-container logueo">
      	<div class="parallax"><img src="img/game_cover.jpg"></div>
      	<div class="row"><br>
      		<div class="col m8 s12 offset-m2 center">
      			<h4 class="bg-card-user">
      				<img src="img/favicon.png" alt="" class="circle responsive-img card" style="background: #fff; padding: 1%; border-radius: 100px;">
					  <div class="row login">
					  	<h4>Signup</h4>
					  	
<?php  if (isset($_SESSION['signup_error'])) { ?>
					  	<h6 class="red-text"><?php echo $_SESSION['signup_error']; ?></h6>
<?php } ?>					  	
				  	
					    <form class="col s12" role="form" method="post" action="signup_back.php" onsubmit="return validate(this)">
					      <div class="row" style="margin-bottom:0px;">
					         <div class="input-field col m12 s12">
					          <i class="material-icons iconis prefix">account_box</i>
					          <input id="icon_prefix" type="text" name="email" class="validate">
					          <label for="icon_prefix">Email</label>
					        </div>
					      </div>
					      
					      <div class="row" style="margin-bottom:0px;">
					        <div class="input-field col m12 s12">
					          <i class="material-icons iconis prefix">description</i>
					          <input id="rollno" type="number" name="rollno" class="validate">
					          <label for="rollno">Roll Number</label>
					        </div>
					      </div>
					      
					      <div class="row" style="margin-bottom:0px;">
					        <div class="input-field col m6 s6">
					          <i class="material-icons iconis prefix">info</i>
					          <input style="text-transform:capitalize"  id="firstname" type="text" name="firstname" class="validate">
					          <label style="text-transform:capitalize"  for="firstname">First Name</label>
					        </div>
					        <div class="input-field col m6 s6">
					          <input id="lastname" type="text" name="lastname" class="validate">
					          <label for="lastname">Last Name</label>
					        </div>
					      </div>
					      
				
					      
					      
					      <div class="row" style="margin-bottom:0px;">
					        <div class="input-field col m12 s12">
					          <i class="material-icons iconis prefix">call</i>
					          <input type="number" name="contact" id="contact" min="6000000000" max="9999999999" class="validate">
					          <label for="contact">Mobile Number</label>
					        </div>
					      </div>
					      
					      <div class="row" style="margin-bottom:0px;">
					        <div class="input-field col m12 s12">
					          <i class="material-icons iconis prefix">lock</i>
					          <input id="password" type="password" name="password" class="validate">
					          <label for="password">Password</label>
					        </div>
					      </div>
					      
					      <div class="row" style="margin-bottom:0px;">
					        <div class="input-field col m12 s12">
					          <i class="material-icons iconis prefix">enhanced_encryption</i>
					          <input id="password_confirmation" type="password" name="password_confirmation" class="validate">
					          <label for="password_confirmation">Confirm Password</label>
					        </div>
					      </div>
					      
					      <div class="row left-align" style="margin-bottom:17px; padding-left: 24px;">
                                <h6>I am</h6>
					            <input checked name="gender" type="radio" id="g1" value="M" />
                                <label for="g1">Male</label>
                                
                                <input name="gender" type="radio" id="g2" value="F" />
                                <label for="g2">Female</label>
                                
                                <input name="gender" type="radio" id="g3" value="O" />
                                <label for="g3">Other</label>
					      </div>
					      
					    
					      <div class="row left-align" style="margin-bottom:0px; padding-left: 24px;">
					          <h6>Degree</h6>
					          <select  class="validate" name="degree" id="degree">
                                  <option selected value="B">B.Tech</option>
                                  <option value="M">M.Tech</option>
                                  <option value="P">PhD</option>
                                  <option value="S">M.Sc</option>
                                  <option value="A">MASC</option>
                                  <option value="D">PGDIIT</option>
                                  <option value="O">Other</option>
                              </select>
					      </div>
					      

					      
					      
					      
					      
     
					      
                        
					      <div class="row">
					      	<button class="btn waves-effect waves-light" type="submit" name="action">Signup</button>
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


  <div hidden="true" class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <form role="form" class="simple-form" name="form" method="post" action="signup_back.php" onsubmit="return validate(this)">
          <h2>Please Sign Up <small>It's free and always will be.</small></h2>
          <hr class="colorgraph">
          <?php
            if (isset($_SESSION['signup_error'])) {
              echo '<div id="login-alert" class="alert alert-danger col-sm-12" >
                  <p>'.$_SESSION['signup_error'].'</p>
              </div>';                     
            } 
          ?>
          <div class="form-group">
            <input type="email" name="email" id="email"  class="form-control input-lg" placeholder="Email Address" tabindex="4" required>
          </div>
          <div class="form-group">
            <input type="text" name="rollno" id="rollno"  class="form-control input-lg" placeholder="Roll No" tabindex="4" required>
          </div>
          
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="text" name="firstname" id="firstname" style="text-transform:capitalize" style="text-transform:capitalize"class="form-control input-lg" placeholder="First Name" tabindex="1" required>
              </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="text" name="lastname" id="lastname" style="text-transform:capitalize" class="form-control input-lg" placeholder="Last Name" tabindex="2" required>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <input type="number" name="contact" id="contact" min="6000000000" max="9999999999" length=10 class="form-control input-lg" placeholder="10 Digit Mobile Number" tabindex="3" required>
          </div>

          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5" required>
              </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6" required>
              </div>
            </div>
          </div>

          <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <label for="gender">I am</label>
            <br>
            <div class="btn-group" data-toggle="buttons" data-effect="fall">
              <label class="btn btn-primary active">
                <input type="radio" name="gender" value="M" checked> Male
              </label>
              <label class="btn btn-primary">
                <input type="radio" name="gender" value="F"> Female
              </label>
              <label class="btn btn-primary">
                <input type="radio" name="gender" value="O"> Other
              </label>
            </div>
          </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                <label for="degree">Degree</label>
                <select class="form-control" name="degree" id="degree">
                  <option value="B">B.Tech</option>
                  <option value="M">M.Tech</option>
                  <option value="P">PhD</option>
                  <option value="S">M.Sc</option>
                  <option value="A">MASC</option>
                  <option value="D">PGDIIT</option>
                  <option value="O">Other</option>
                </select>
              </div>
            </div>
          </div>

         <hr class="colorgraph">
         <div class="row">
          <div class="col-xs-6 col-md-6"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
          <div class="col-xs-6 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg">Sign In</a></div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
function validate(form){
  fail="";
  fail+=validateEmail(form.email.value);
  fail+=validateFirstName(form.firstname.value);
  fail+=validateLastName(form.lastname.value);
  fail+=validateContact(form.contact.value);
  fail+=validatePassword(form.password.value);
  fail+=validatePasswordConfirmation(form.password_confirmation.value);
  if(fail=="") return true;
  else alert(fail);return false;
}
function validateEmail(val){
  if (val=="") {return "No Email was entered.\n";}
  else if(!/^[a-zA-Z0-9._]+@iitgn.ac.in$/.test(val)) {return "Please enter a valid iitgn email id.\n";} 
  else return "";
}
function validateFirstName(val){
  if (val=="") {return "No First Name entered.\n";}
  if (val.length<=3 && val.length>=20) {return "First name should be between 3 and 20 characters.\n";}
  if (!val.match(/^[A-Za-z]+$/)) {return "First name should only contain alphabets.\n";}
  else return "";
}
function validateLastName(val){
  if (val=="") {return "No Last Name entered.\n";}
  if (val.length<=3 && val.length>=20) {return "Last name should be between 3 and 20 characters.\n";}
  if (!val.match(/^[A-Za-z]+$/)) {return "Last name should only contain alphabets.\n";}
  else return "";
}
function validateContact(val){
  if (val.length!=10 || isNaN(val)) {return "Please enter a valid mobile number.\n";}
  else return "";
}
function validatePassword(val){
  if (val=="") {return "No Password was entered.\n";}
  else if(val.length < 6){return "Password must be atleast 6 characters.\n";}
  else if(val.length > 20) {return "Maximum number of characters in password is 20.";}
  else return "";
}
function validatePasswordConfirmation(val){
  if (val=="") {return "No Confirmation Password was entered.\n";}
  else if(val!=document.getElementById('password_confirmation').value){return "Passwords are not matching.\n";}
  else return "";
}

</script>
<style>
footer{border-top:1px solid #ddd;padding:30px;margin-top:50px}.container{max-width:90%}.btn-group{margin-bottom:10px}.form-inline input[type=password],.form-inline input[type=text],.form-inline select{width:180px}.input-group{margin-bottom:10px}.pagination{margin-top:0}
</style>

<style>
    /* LOGIN */
.logueo {/* PARALLAX */
    height: 1200px!important;
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
</html>