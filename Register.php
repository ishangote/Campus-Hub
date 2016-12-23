<?php
session_start();

require_once 'Dbconnect.php';

if(isset($_POST['btn-signup'])) {
 
 $fname1 = strip_tags($_POST['fname1']);
 $emailaddr1 = strip_tags($_POST['emailaddr1']);
 $password1 = strip_tags($_POST['password1']);
 $profession = strip_tags($_POST['profession']);
 
 $fname1 = $DBcon->real_escape_string($fname1);
 $emailaddr1 = $DBcon->real_escape_string($emailaddr1);
 $password1 = $DBcon->real_escape_string($password1);
 $profession = $DBcon->real_escape_string($profession);
 
 ///$hashed_password = password_hash($password1, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
 
 $check_email = $DBcon->query("SELECT email FROM tbl_users WHERE email='$emailaddr1'");
 $count=$check_email->num_rows;
 
 if ($count==0) {
  
  $query = "INSERT INTO tbl_users(username,email,password,profession) VALUES('$fname1','$emailaddr1','$password1','$profession')";

  if ($DBcon->query($query)) {
  	header('location:Index.php');
    ?>
   <div class='alert alert-success'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
     </div><?php 
  }else {
   ?>
   <div class='alert alert-danger'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
   </div><?php
  }
  
 } else {
    
  ?><div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
  </div><?php
   
 }
 
 $DBcon->close();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student signup</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="dropdown.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<link href="matches.css" rel="stylesheet">





<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>





  <script src="js/jquery-1.8.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){ 
    $("#myTab li:eq(1) a").tab('show');
});
</script>
<style>
.error {color: #FF0000;}
</style>
  </head>
  <body class="backgroundc">
   		

<!---Sign up-->
<div class="container" id=wrap style="padding-top: 100px;">
<div class="row">
<br><br><br>
<div class="col-lg-4"></div>
<div class="col-lg-4"><div class="panel panel-default">
<div class="panel-body" id=panel>
<div class="form-group">
<h3 id="signup">Sign up</h3>
<?php


$fnameErr1  = $emailaddrErr1 =  $passwordErr1 = $pass2Err1 =  $professionErr= "";
$fname1  = $emailaddr1 =  $password1 = $pass21 = $profession ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["fname1"]))
 {
    $fnameErr1 = "Name is required";
  } 
 else 
 {
    $fname1 = test_input($_POST["fname1"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$fname1)) 
    {
      $fnameErr1 = "Only letters and white space allowed";
 
    }
  }
  
  if (empty($_POST["emailaddr1"])) 
 {
    $emailaddrErr1 = "Email is required";

  } else
  {
    $emailaddr1 = test_input($_POST["emailaddr1"]);
    // check if e-mail address is well-formed
    if (!filter_var($emailaddr1, FILTER_VALIDATE_EMAIL)) {
      $emailaddrErr1 = "Invalid email format";
   
    }
  }

  if (empty($_POST["password1"]))
  {
    $passwordErr1 = "Password required!";

  } else
  {
    //$password = test_input($_POST["password"]);
 
    if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $password1))
   {
      $passwordErr1 = "Minimum 8 characters required.Atleast one capital letter & one number.";
     
    }
  }
  
  if (empty($_POST["pass21"]))
  {
    $pass2Err1 = "Confirm your password.";
  }else 
  {
    //$pass2 = test_input($_POST["pass2"]);
         if(($_POST["password1"])!=($_POST["pass21"])){
    echo"Oops! Password did not match! Try again.";

	}
	}
  
   if (empty($_POST["profession"])) {
    $professionErr = "Profession is required";
  } else {
    $profession = test_input($_POST["profession"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<!---First name-->
<span class="error">*<?php echo $fnameErr1;?></span>
<label for="Firstname">Name</label>
<input type="text" id="Firstname"placeholder="Enter your first name" name="fname1" value="<?php echo $fname1;?>"><br>
<br><br>
<!--Email address-->
<span class="error">*<?php echo $emailaddrErr1;?></span>
<span class="glyphicon glyphicon-user"></span><label for="mail">Email Address</label>  
<input type="email" class="form-control"id="mail" placeholder="Enter your email" name="emailaddr1" value="<?php echo $emailaddr1;?>"><br>
<br>

<!---Password-->
<span class="error">*<?php echo $passwordErr1;?></span>
<span class="glyphicon glyphicon-pencil"></span><label for="password">Password</label>
<input type="password" id="password" placeholder="Enter your password" name="password1" value="<?php echo $password1;?>"><br>
<br><br>
<!--Confirm password-->
<span class="glyphicon glyphicon-pencil"></span><label for="pwd">Confirm password</label>
<input type="password" id="pwd" placeholder="Confirm password" name="pass21" value="<?php echo $pass21;?>"><br>
<span class="error"><?php echo $pass2Err1;?></span><br><br>
<!--radio buttons-->
<span class="error">* <?php echo $professionErr;?></span>
<span class="glyphicon glyphicon-education"></span><label for="profession">You are?</label><br/>
<input type="radio" name="profession"  <?php if (isset($profession) && $profession=="teacher") echo "checked";?> value="teacher"><label for="teacher">Teacher</label>
<br><br>
<input type="radio" name="profession" <?php if (isset($profession) && $profession=="student") echo "checked";?> value="student"><label for="Student">Student</label>
<br><br>
<div class="row"><div class="col-lg-12">
  <button type="submit" class="btn btn-info btn-block" name="btn-signup">Create My Account</button></div>
<p><span class="error" style="padding-left: 120px;padding-top: 35px;">*Required field.</span></p>
<span style="padding-left: 130px;color: blue;"><strong>Let's</strong></span>
<a href="index.php" style="padding-left: 5px;"><u><strong>Login</strong></u></a><br />
<span style="padding-left: 120px;color: blue;"><strong>Happy Learning!</strong></span>
</form>
</div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


