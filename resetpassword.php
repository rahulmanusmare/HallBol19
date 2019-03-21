<?php

    //@ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hallabol'19 Password Reset</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Hallabol 19 Password Reset</h2>
  <?php 
  function dec_enc($action, $string) {
    $output = false;
 
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'This is my secret key';
    $secret_iv = 'This is my secret iv';
 
    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
 
    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
 
    return $output;
}
     require_once('keyset.php');
     
     if($_GET['code']&&!empty($_GET['code'])){
         $email_en=" ";
         $email_en=htmlspecialchars(htmlentities($_GET['code']));
         $email=dec_enc('decrypt',$email_en);
         //echo $email;
         $query="SELECT * FROM user WHERE email='$email'";
         $result = run_query($query);
         if(mysql_num_rows($result)==0){
             echo "Access Denied!";
             die();
         } 
        
     }
     else {
        echo "Please go to Login and click forgot password to reset your password. Thanks.";
        die();
     }
     if($_POST['password']&&!empty($_POST['password'])&&$_POST['password2']&&!empty($_POST['password2'])){
         $password=$_POST['password'];
         $password2=$_POST['password2'];
         if($password==$password2){
             $password=md5(htmlspecialchars(htmlentities($password)));
             $email_en=htmlspecialchars(htmlentities($_GET['code']));
            $email=dec_enc('decrypt',$email_en);
            
             $query="UPDATE user SET password='$password' WHERE email='$email'";
             $result=run_query($query);
             if($result==TRUE){
                 echo "You can now login with new password.";
                 die();
             }
             else {
                 echo "Access Denied";
             }
         }
         else {
             echo "Passwords didn't match";
         }
     }
  ?>
  <form action="resetpassword.php?code=<?php echo $email_en?>" method="POST">
    <div class="form-group">
      <label for="pwd">New Password</label>
      <input type="password" class="form-control" id="pwd" placeholder="New Password" name="password">
    </div>
    <div class="form-group">
      <label for="pwd">Confirm</label>
      <input type="password" class="form-control" id="pwd" placeholder="Confirm Password" name="password2">
    </div>
    <button type="submit" class="btn btn-success">Set New Password</button>
  </form>
</div>

</body>
</html>
