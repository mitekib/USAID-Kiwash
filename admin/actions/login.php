<?php
include("../connect.php");
if(filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)===false)
{
	echo "Wrong username formart";
	exit();
}
$username = stripslashes($_POST['username']);
$password = stripslashes($_POST['password']);
$s = $con->prepare("select * from users where user_name='$username' and user_password='$password'");
$s->execute();
$counter = $s->rowcount();

if($counter==0)
{
	echo "Wrong username or password";
}
else
{
	$sr = $s->fetch();
	session_start();
	$_SESSION['iebc_admin'] = $sr['user_name'];
	$_SESSION['iebc_fullnames'] = $sr['fullnames'];
	$_SESSION['iebc_tou'] = $sr['user_tou'];
	echo "true";
}
?>