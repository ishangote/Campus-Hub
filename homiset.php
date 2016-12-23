<?php
session_start();
require_once 'Dbconnect.php';
$_SESSION['ChatWithId']=$_POST['ChatWithId'];
$user=$_SESSION['userId'];
$with=$_SESSION['ChatWithId'];
$tabquery="UPDATE chats SET checkRead='1' WHERE (ChatUserID='$with' AND ChatWithId='$user')";
$showchat = $DBcon->query($tabquery);
header('location:homie.php');

?>