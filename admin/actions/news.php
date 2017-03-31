<?php
include("../connect.php");

$action = $_POST['action'];
switch($action)
{
	case "new_news":
	

	$content = $_POST['content'];
	
	$d = time();
	
		
	    $a=$con->prepare("INSERT into aboutus set  main_content=?, date_posted=?");
		$a->bindParam(1, $content);
		$a->bindParam(2, $d);

		if(!$a->execute())
		{
			print_r($a->errorInfo());
		}
	
		
	header("location:../?pg=aboutus&v=all");
	
	
	
	break;
	
	case "edit_news":
	 
	
	$id =  $_POST['id'];
	
	
	
	$content = $_POST['content'];
	
	
	$a=$con->prepare("UPDATE aboutus set  main_content=? where id=?");
	
		$a->bindParam(1, $content);
		$a->bindParam(2, $id);

		if(!$a->execute())
		{
			print_r($a->errorInfo());
		}
	
	
		
		 
		  header("location:../?pg=aboutus&v=all");
	
	
	
	break;
	
	
	
	case "delete_news":
	$id = $_POST['id'];
	
	
	$del = $con->prepare("delete from aboutus where id='$id'");
	$del->execute();
	
	header("location:../?pg=aboutus&v=all");
	break;
}

?>