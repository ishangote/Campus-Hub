<?php

session_start();

include 'classes.php';
if(isset($_POST['ChatText'])){
	$chat = new chat();
	$chat->setChatUserID($_SESSION['user_id']);
	$chat->setChatText($_POST['ChatText']);
	$chat->InsertChatMessage(); 
}

?>