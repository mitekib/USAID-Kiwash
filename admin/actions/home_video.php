<?php
include("../connect.php");

$action = $_POST['action'];
switch($action)
{
	case "new_home_video":
	
	$title = $_POST['title'];
	$descri = $_POST['descri'];

	if ($descri==""){
		$descri="#";
	}
	

	$a=$con->prepare("insert into home_video set  title=?,  descri=?");
	$a->bindParam(1, $title);
	$a->bindParam(2, $descri);

	if(!$a->execute())
	{
		print_r($a->errorInfo());
	}
	
	header("location:../?pg=home_video&v=all");
	
	
	
	break;
	
	case "edit_home_video":
	 
	
	$id =  $_POST['id'];
	$title = $_POST['title'];
	$descri = $_POST['descri'];

	$a=$con->prepare("update home_video set  title=?, descri=? where id=?");
		$a->bindParam(1, $title);
		$a->bindParam(2, $descri);
		$a->bindParam(3, $id);

		if(!$a->execute())
		{
			print_r($a->errorInfo());
		}
	
			 
		  header("location:../?pg=home_video&v=all");
	
	
	
	break;
	
	
	
	case "delete_home_video":
	$id = $_POST['id'];

	$del = $con->prepare("delete from home_video where id='$id'");
	$del->execute();
	
	header("location:../?pg=home_video&v=all");
	break;
}
/*

*/
?>