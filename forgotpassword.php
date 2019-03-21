<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hallabol'19</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Hallabol 19</h2>
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
     if($_POST['email']&&!empty($_POST['email'])){
         $email=htmlspecialchars(htmlentities($_POST['email']));
         $query="SELECT * FROM user WHERE email='$email'";
         $result = run_query($query);
        $row = mysql_fetch_row($result);
        
        if(mysql_num_rows($result)==0){
                echo "Email does not exist";
        }
        else {
            $to  = $email;
                $key_value = "BYNISHIKANT"; 
                $email=dec_enc('encrypt',$email);
                
                // subject
                $subject = 'Hallabol\'19 Password Reset';
                
                // message
                $message = "
                <html>
                <head>
                  <title>Hallabol Password Reset</title>
                </head>
                <body>
                  <h2>Hallabol'19</h2>
                  
                <p>Please click <b><a href='http://students.iitgn.ac.in/hallabol/resetpassword.php?code=$email'>here</a></b> to reset your password.</p>
                <br>
                <p>Note: Please don't share this link with anyone.</p>
                </body>
                </html>
                ";
                
                // To send HTML mail, the Content-type header must be set
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                
                // Additional headers
                $headers .= 'From: Hallabol <noreply-hallabol@iitgn.ac.in>' . "\r\n";
                
                // Mail it
                mail($to, $subject, $message, $headers);
                echo "<div class='alert alert-success'>Check your mail and follow the instructions.</div>";
        }
     }
  ?>
  <form action="#" method="POST">
    <div class="form-group">
      <label for="pwd">Enter your registered email ID:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Email" name="email">
    </div>
    <button type="submit" class="btn btn-success">Send Me Reset Link</button>
  </form>
</div>

</body>
</html>
