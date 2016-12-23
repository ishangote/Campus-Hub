<?php
	session_start();
	require_once 'Dbconnect.php';

	$title=$_POST['title'];
	$desc=$_POST['desc'];
	$content=$_POST['content'];
	$date=date('Y-m-d ');
	$user=$_SESSION['userId'];
	
	$query = "Insert into blog_posts (blogUserId,blogTitle,blogDesc,blogContent,blogDate) values ('$user','$title','$desc','$content','$date')";
		 $req = $DBcon->query($query);
		 header('location:addpost.php');
?>