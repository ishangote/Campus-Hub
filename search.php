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
					<a class="navbar-brand" href="#">
						<img src="campushub3.gif" height="120px" width="350px";  style="padding-bottom: 48px;"/>
						
					</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-COMP-navbar-collapse-1">
					<ul class="nav navbar-nav" style="margin-left:350px" >
						<li ><a href="main.php"><h3>Home</h3></a></li>
						<li><a href="addpost.php"><h3>Blogs</h3></a></li>
						<li class="active"><a href="search.php"><h3>Chat Forum</h3></a></li>
					</ul>	
					<div style="margin-left: 1350px;margin-top: 30px;">
					<div id="noti_Container">
			                <div id="noti_Counter">
			                	<?php
										$me=$_SESSION['userId'];
										$cntquery = "SELECT count(Distinct ChatUserId) as mycount from chats where (checkRead='0' AND ChatWithId='$me')group by ChatUserID";
											$reqnot = $DBcon->query($cntquery);
											while($row1 = $reqnot->fetch_assoc()) {
													$count=$row1['mycount'];
													echo $count;
											}
										?>
			                </div>   <!--SHOW NOTIFICATIONS COUNT.-->
			                
			                <!--A CIRCLE LIKE BUTTON TO DISPLAY NOTIFICATION DROPDOWN.-->
			                <div id="noti_Button">
			                	<span class="glyphicon glyphicon-envelope" aria-hidden="true" style="padding-left: 6px;"></span>
			                </div>    
			
			                <!--THE NOTIFICAIONS DROPDOWN BOX.-->
			                <div id="notifications" >
			                    <h3>Notifications</h3>
			                    <div style="height:100px;">
			                    	<?php
										$me=$_SESSION['userId'];
										$notquery = "SELECT Distinct ChatUserID from chats where checkRead='0' AND ChatWithId='$me'";
											$reqnot = $DBcon->query($notquery);
											while($row = $reqnot->fetch_assoc()) {
							        				$not=$row["ChatUserID"];
							        				
							        				
													$namequery = "SELECT username from tbl_users where user_id='$not'";
													$reqchat = $DBcon->query($namequery);
													while($row = $reqchat->fetch_assoc()) {
							        				$Username=$row["username"];
							        				echo "<br>".$Username."<br>";
													}
											}
										?>
										<script>
										    $(document).ready(function () {
										
										        // ANIMATEDLY DISPLAY THE NOTIFICATION COUNTER.
										        $('#noti_Counter')
										            .css({ opacity: 0 })
										            $('#noti_Counter')              // ADD DYNAMIC VALUE (YOU CAN EXTRACT DATA FROM DATABASE OR XML).
										            .css({ top: '-10px' })
										            .animate({ top: '-2px', opacity: 1 }, 500);
										
										        $('#noti_Button').click(function () {
										
										            // TOGGLE (SHOW OR HIDE) NOTIFICATION WINDOW.
										            $('#notifications').fadeToggle('fast', 'linear', function () {
										                if ($('#notifications').is(':hidden')) {
										                    $('#noti_Button').css('background-color', '#19B9E7');
										                }
										                else $('#noti_Button').css('background-color', '#FFF');        // CHANGE BACKGROUND COLOR OF THE BUTTON.
										            });
										
										            $('#noti_Counter').fadeOut('slow');                 // HIDE THE COUNTER.
										
										            return false;
										        });
										
										        // HIDE NOTIFICATIONS WHEN CLICKED ANYWHERE ON THE PAGE.
										        $(document).click(function () {
										            $('#notifications').hide();
										
										            // CHECK IF NOTIFICATION COUNTER IS HIDDEN.
										            if ($('#noti_Counter').is(':hidden')) {
										                // CHANGE BACKGROUND COLOR OF THE BUTTON.
										                $('#noti_Button').css('background-color', '#19B9E7');
										            }
										        });
										
										        $('#notifications').click(function () {
										            return false;       // DO NOTHING WHEN CONTAINER IS CLICKED.
										        });
										    });
									</script>
								</div>
			                </div>
           				 </div>
					</div>
					<div class="navbar-right" style="font-size: 200%;">
						<?php
						$mail=$_SESSION['userSession'];
						$namequery = "SELECT username from tbl_users where email='$mail'";
						$reqchat = $DBcon->query($namequery);
						while($row = $reqchat->fetch_assoc()) {
        				$Username=$row["username"];}?>
 							<span style="color: white;">Hi</span> 
 						<span style="color:#19B9E7"><?php echo $Username."!"; ?></span>
					</div>
				</div>
			</div>
		</nav>
		
		<div class="container-fluid">
			
			<form class="form" method="post" action="searchresult.php">
        		<div class="form-group">
         			<input type="text" class="search" placeholder="Search for users.."  style="margin-right:255px" name="searchBox">
        			<button type="submit" class="btn btn-primary button" style="margin-top: 100px;margin-left: 255px;font-size: 30px;">Search</button>
        		</div>
      		</form>
		</div>
		
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
	</html>