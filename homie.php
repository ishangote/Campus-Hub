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
					<ul class="nav navbar-nav" style="margin-left:350px" >
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
					<div class="navbar-right" style="padding-left:80px;padding-top: 30px;">
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
		<br /><br /><br /><br /><br />
		<span style="color: white;font-size: 30px;padding-left: 300px;">"Change the conversation from what to you want to work for <br/><span style="padding-left: 550px;">to <span style="color: red;">what do I need to learn</span> to be able to do that!"</span></span><br /><br />
		<br /><br />
		<div id="ChatBig" >
			<div id="ChatMessages" style="overflow-y: scroll;overflow-x:hidden">
				<table name="chatBox" class="table ">
					<?php
						$user=$_SESSION['userId'];
						$with=$_SESSION['ChatWithId'];
						//echo $user."<br>".$with."<br>";
						$tabquery="SELECT ChatUserID,ChatWithId,ChatText from chats WHERE ((ChatUserID='$user' AND ChatWithId='$with') OR (ChatUserID='$with' AND ChatWithId='$user'))";
						$showchat = $DBcon->query($tabquery);
						while($row = $showchat->fetch_assoc())
						 {
        					$ChatUser=$row["ChatUserID"];
							$Chat=$row["ChatText"];
							$newtabquery="SELECT username from tbl_users WHERE (user_id='$ChatUser')";
							$showname=$DBcon->query($newtabquery);
							 while($row=$showname->fetch_assoc())
								 {
									 $ChatName=$row["username"]; 
								 
									if($ChatUser==$with)
									{
					?>
										<div >
										<tr style="text-align: left">
											<td>
												<span style="font-size: 30px;color: red;;"><?php	echo $ChatName."<br>"; ?></span>
												<span style="font-size: 20px;color:white;"><?php	echo $Chat."<br>"; ?></span>
											</td>
										</tr>
										</div
					<?php
										}
									else{
					?>
										<div >
											<tr style="text-align:right">
												<td style="padding-right:0px;">
													<span style="font-size: 30px;color: green;"><?php	echo $ChatName."<br>"; ?></span>
													<span style="font-size: 20px;color:white;"><?php	echo $Chat."<br>"; ?></span>
												</td>
											</tr>
										</div>
					<?php
									}
							}
					}
					?>
				</table>	
				
				<script>
					$("#ChatMessages").prop({scrollTop: $("#ChatMessages").prop("scrollHeight")});
				</script>
			</div>
			<form action="InsertMessage.php" method="POST">
				<textarea id="ChatText" name="ChatText" style="font-size: 20px;"></textarea>
				<button type="submit" class="btn btn-primary button" id="ChatTextSubmit" style="margin-top: 10px;margin-left: 4px;width: 500px;font-size: 30px;">Send</button>
			</form>
		</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
	</html>