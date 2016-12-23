<?php
session_start();
require_once 'Dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CampusHub Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="assets/font-awesome/css/style-images.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	    <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style1.css">
        <!-- Custom CSS -->
    	<link href="css/scrolling-nav.css" rel="stylesheet">
    	

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body class="backgroundc">

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row" id="toppage">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        	<img class="img-responsive center-block" src="campushub2.gif" height="350px" width="350px">
                            <br><br><br><br>
                    <h1>Welcome to <strong>CampusHub</strong></h1>
                            <div class="description">
                            	<p style="font-size: 150%">
	                            	This is a free website made for teachers and students for an easy and better communication.
	                            				<br><strong>Blogs  |  Chat Portal  |  Much more</strong> 
	                            	
                            	</p>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <a class="page-scroll smoothScroll" href="#scrollpage" id="scrollbtn"><i class="fa fa-chevron-circle-down fa-3x" ></i></a>
                    <br><br><br><br><br><br><br><br><br>
                    
                    <div class="row" id="scrollpage">
                       
                        <div class="container" id=wrap>
						<div class="row">
						<br><br><br>
						<div class="col-lg-4"></div>
						<div class="col-lg-4"><div class="panel panel-default">
						<div class="panel-body" id=panel>
						<div class="form-group">
						<h3 id="signup">Sign up</h3>
						<form method="POST" action="verify.php">
						<!--Email address-->
						
						<span class="glyphicon glyphicon-user"></span><label for="mail">Email Address</label>  
						<input type="email" class="form-control"id="mail" placeholder="Enter your email" name="email"><br>
						
						<!---Password-->
						<span class="glyphicon glyphicon-pencil"></span><label for="password">Password</label>
						<input type="password" class="form-control" id="password" placeholder="Enter your password" name="password"><br><br />
						
						  <button type="submit" class="btn btn-primary btn-block" name="btn-login">Log In</button></div>
						  
						  Not Registered yet?<a href="Register.php">Create Account!</a>
						</form>
						</div>
						</div>
				  					       
                    </div>
            </div>
        </div>
        

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p>Made for <strong>helping students.</strong> </p>
        			</div>
        			
        		</div>
        	</div>
        </footer>

         <!-- Javascript  -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
    

    </body> 

</html>
