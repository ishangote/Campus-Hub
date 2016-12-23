<?php
session_start();
include 'Dbconnect.php';
//include "classes.php";

$mail=$_POST['email'];
$pass=$_POST['password'];

$q = "SELECT password FROM tbl_users WHERE email='$mail' ";
$req = $DBcon->query($q);
while($row = $req->fetch_assoc()) {
        $checkPass=$row["password"];
    }
$q2 = "SELECT user_id FROM tbl_users WHERE email='$mail' ";
$req2 = $DBcon->query($q2);
while($row = $req2->fetch_assoc()) {
        $uid=$row["user_id"];
    }
echo $uid;
if($pass===$checkPass)
{
	$_SESSION['userSession']=$mail;	
	$_SESSION['userId']=$uid;	
	header('location:main.php');
}
else echo "Wrong password";
?>