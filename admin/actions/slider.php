<?php
include("../connect.php");

$action = $_POST['action'];
switch($action)
{
	case "new_slider":
	
	$title = $_POST['title'];
	$descri = $_POST['descri'];

	if ($descri==""){
		$descri="#";
	}
	
	$d = time();
	
	$cp = explode(".",$_FILES["home_img"]["name"]);
	$cover_photo_name = substr(md5(time()),0,10). '.' .end($cp);
	//attempt to craeate a directoty from the script

	$a=$con->prepare("insert into slider set  title=?,  descri=?, date_posted=?");
		$a->bindParam(1, $title);
		$a->bindParam(2, $descri);
		$a->bindParam(3, $d);

		if(!$a->execute())
		{
			print_r($a->errorInfo());
		}
	$lastId = $con->lastInsertId();
	if(move_uploaded_file($_FILES["home_img"]["tmp_name"], "../../uploads/slider/" . $cover_photo_name))
	{
		$p=$con->prepare("update  slider set   home_img=? where id=?");
		$p->bindParam(1, $cover_photo_name);
		$p->bindParam(2, $lastId);

		if(!$p->execute())
		{
			print_r($p->errorInfo());
		}
		
		  
	}
	
		
	header("location:../?pg=slider&v=all");
	
	
	
	break;
	
	case "edit_slider":
	 
	
	$id =  $_POST['id'];
	$title = $_POST['title'];
	$descri = $_POST['descri'];
	$picurl = $_POST['picurl'];
	
	$cp = explode(".",$_FILES["home_img"]["name"]);
	$cover_photo_name = substr(md5(time()),0,10). '.' .end($cp);
	
	$a=$con->prepare("update slider set  title=?, descri=? where id=?");
		$a->bindParam(1, $title);
		$a->bindParam(2, $descri);
		$a->bindParam(3, $id);

		if(!$a->execute())
		{
			print_r($a->errorInfo());
		}
	
	if(move_uploaded_file($_FILES["home_img"]["tmp_name"], "../../uploads/slider/" . $cover_photo_name))
	{
		unlink("../../uploads/slider/".$picurl);
		$a=$con->prepare("update  slider set   home_img=? where id=?");
		$a->bindParam(1, $cover_photo_name);
		$a->bindParam(2, $id);
		if(!$a->execute())
		{
			print_r($a->errorInfo());
		}
	}
		
		 
		  header("location:../?pg=slider&v=all");
	
	
	
	break;
	
	
	
	case "delete_slider":
	$id = $_POST['id'];
	$picurl = $_POST['picurl'];
	unlink("../../uploads/slider/".$picurl);
	
	$del = $con->prepare("delete from slider where id='$id'");
	$del->execute();
	
	header("location:../?pg=slider&v=all");
	break;
}
/*

*/
?>