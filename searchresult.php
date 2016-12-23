<?php

	session_start();
	if(!isset($_SESSION['userSession']))
		header('location:logout.php');
	require_once 'Dbconnect.php';
?>

<!doctype html>
	<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Getting started</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="dropdown.css" rel="stylesheet">
	<link href="carousal.css" rel="stylesheet">
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
					<ul class="nav navbar-nav" style="margin-left:300px" >
						<li ><a href="main.php"><h3>Home</h3></a></li>
						<li><a href="addpost.php"><h3>Blogs</h3></a></li>
						<li class="active"><a href="search.php"><h3>Chat Forum</h3></a></li>				
 						<li><div style="padding-left:110px;padding-top: 40px;">
 						<form method="post" action="searchresult.php">
							<div class="input-group">
		                    	<input type="text"  placeholder="Search for users.." name="searchBox" />
		                    		<span class="input-group-btn">
		                      		<button type="submit" class="btn btn-default btn-secondary" style="height: 30px;width: 50px;">
		                        		 <span class="glyphicon glyphicon-search" ></span>
		                      		</button></span>
                  			</div>
                  			</form>
					</div></li>
					<li>
					<div class="navbar-right" style="padding-left:30px;padding-top: 10px;">
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
								<div  style="padding-left:100px;padding-top: 30px;">
									<button type="submit" class="btn btn-info">logout</button>
        						</div>
        				</form></li></ul>
				</div>
			</div>
		</nav>
		
		
			<div class="container-fluid">
				<?php
					$searchchat=$_POST['searchBox'];
					$chatquery = "SELECT user_id,username from tbl_users where username='$searchchat'";
					$reqchat = $DBcon->query($chatquery);
					while($row = $reqchat->fetch_assoc()) {
        				$CheckUser=$row["username"];
						$CheckUserId=$row["user_id"];
						if(!is_null($CheckUser))
						{
    				
				?>
				<span style="color: #19B9E7;font-size: 50px;padding-left: 100px;"><?php echo $CheckUser?></span>
				<span style="color: white;font-size: 50px;padding-left: 10px;">is ready to chat!</span>
				<form method="post" action="homiset.php">
							<input type="hidden" name="ChatWithId" value=<?php echo $CheckUserId; ?> >
							<button type="submit" class="btn btn-primary button" style="margin-top: 10px;margin-left: 100px;font-size: 30px;">ChatNow</button>
						</form>
				
				<?php
						}
					else echo "No user found!";
					}
					
				?>
			</div>
		

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
	</html>