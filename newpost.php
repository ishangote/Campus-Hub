<?php
session_start();
require_once 'Dbconnect.php';
?>
<!doctype html>
  <html>
  <head>
 <<meta charset="utf-8">
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

  </head>
  <body class="backgroundc">
     <nav class="navbar navbar-inverse" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-COMP-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
     				 </button>
					<a class="navbar-brand" href="#"><img src="campushub3.gif" height="120px" width="350px";  style="padding-bottom: 48px;"/></a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-COMP-navbar-collapse-1">
					<ul class="nav navbar-nav" style="margin-left:350px" >
						<li ><a href="main.php"><h3>Home</h3></a></li>
						<li class="active"><a href="addpost.php"><h3>Blogs</h3></a></li>
						<li ><a href="search.php"><h3>Chat Forum</h3></a></li>				
					<li>
					<div class="navbar-right" style="padding-left:300px;padding-top: 20px;">
						<div style="font-size: 270%;">
						<?php
						$mail=$_SESSION['userSession'];
						$namequery = "SELECT username from tbl_users where email='$mail'";
						$reqchat = $DBcon->query($namequery);
						while($row = $reqchat->fetch_assoc()) {
        				$Username=$row["username"];}?>
 							<span style="color: white;">Hi</span> 
 						<span style="color:#19B9E7"><?php echo $Username."!"; ?></span></div>
 					</div></li>
 					<li><form class="navbar-form navbar-right" method="post" action="logout.php">
								<div  style="padding-left:100px;padding-top: 20px;">
									<button type="submit" class="btn btn-info">logout</button>
        						</div>
        				</form></li></ul>
				</div>
			</div>
		</nav>

    <div class="container" >
      <div class="row">
        <div class="col-lg-8">
          <div class="container-fluid">
          	<br /><br /><br />
          	<form method="post" action="savepost.php">
          		<label style="color: #19B9E7;font-size: 40px;padding-top: 20px;padding-right: 430px;">Title:</label><br />
          		<input type="text" name="title" style="height:50px;width: 800px;margin-left: 100px;"/><br /><br />
          		<label style="color: #19B9E7;font-size: 40px;padding-top: 20px;padding-right: 320px;">Description:</label><br />
          		<textarea name="desc" style="height:100px;width: 800px;margin-left: 100px;"></textarea><br /><br />
          		<label style="color: #19B9E7;font-size: 40px;padding-top: 20px;padding-right: 378px;">Content:</label><br />
          		<textarea name="content" style="height:200px;width: 800px;margin-left: 100px;"></textarea><br /><br />
          		<button type="submit" class="btn btn-primary button" id="ChatTextSubmit" style="margin-top: 10px;margin-left: 250px;width: 500px;font-size: 30px;"><strong>POST!</strong></button>
          	</form>
           
          </div>
        </div>

		</div>
    
    </div>

  

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
  </html>
		
