<?php
	session_start();
	include 'Dbconnect.php';
	include "classes.php";
	/*if(isset($_POST['ChatText'])){
		$chat = new chat();
		$chat->setChatUserID($_SESSION['user_id']);
		$chat->setChatText($_POST['ChatText']);
		$chat->InsertChatMessage();
		}*/
	 header('location:homie.php');
	 $uid=$_SESSION['userId'];
	 $wid=$_SESSION['ChatWithId'];
	 //echo $uid;
	 $chat=$_POST['ChatText'];
	 
	 $q = "INSERT INTO chats(ChatUserID,ChatWithId,ChatText) VALUES('$uid','$wid','$chat')";
	 $req = $DBcon->query($q);
	 
?>