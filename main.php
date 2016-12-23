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


<!-- miine-->
	

	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="style.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.js"></script>
   

    <body>
    	<!--navbar-->
    	<nav class="navbar navbar-inverse" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-COMP-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
     				 </button>
	
					<div class="navbar-brand" style="font-size: 200%;padding-top: 30px;"><?php
						$mail=$_SESSION['userSession'];
						$namequery = "SELECT username from tbl_users where email='$mail'";
					$reqchat = $DBcon->query($namequery);
					while($row = $reqchat->fetch_assoc()) {
        				$Username=$row["username"];}?>
 							Hi <span style="color:#19B9E7"><?php echo $Username."!"; ?></span>
 					</div>  
				
				</div>
				
				<div class="collapse navbar-collapse navbar-right" id="bs-COMP-navbar-collapse-1">
					<ul class="nav navbar-nav" style="margin-left:350px" >
						<li class="active"><a href="main.php"><h3>Home</h3></a></li>
						<li><a href="addpost.php"><h3>Blogs</h3></a></li>
						<li ><a href="search.php"><h3>Chat Forum</h3></a></li>
					</ul>
				</div>
			</div>
		</nav>

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
