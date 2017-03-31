<?php
include("../connect.php");

$action = $_POST['action'];
switch($action)
{
	case "new_home_content":
	
	$title = $_POST['title'];
	$content = $_POST['descri'];

	$date=date('Y-m-d H:i:s');

	$cp = explode(".",$_FILES["img"]["name"]);

	$cover_photo_name = substr(md5(time()),0,10). '.' .end($cp);

	
	    $a=$con->prepare("INSERT into home_content set  title=?, descri=?,datecreated=?");
		$a->bindParam(1, $title);
		$a->bindParam(2, $content);
		$a->bindParam(3, $date);

		if(!$a->execute())
		{
			print_r($a->errorInfo());
		}
		else
		{

	
	    $lastId = $con->lastInsertId();
		if(move_uploaded_file($_FILES["img"]["tmp_name"], "../uploads/home/" . $cover_photo_name))
		{
			$p=$con->prepare("UPDATE  home_content set  homeimg=? where id=?");
			$p->bindParam(1, $cover_photo_name);
			$p->bindParam(2, $lastId);

			if(!$p->execute())
			{
				print_r($p->errorInfo());
			}
			
			  
		}
   }
	
		
			
	header("location:../?pg=home_content&v=all");

	
	break;
	
	case "edit_home_content":
	 
	
	$id =  $_POST['id'];
	$title = $_POST['title'];
	$content = $_POST['descri'];
	$cp = explode(".",$_FILES["img"]["name"]);

	$cover_photo_name = substr(md5(time()),0,10). '.' .end($cp);

	
	$a=$con->prepare("update home_content set  title=?, descri=? where id=?");
		$a->bindParam(1, $title);
		$a->bindParam(2, $content);
		$a->bindParam(3, $id);

		if(!$a->execute())
		{
			print_r($a->errorInfo());
		}

		$lastId = $id;
		if(move_uploaded_file($_FILES["img"]["tmp_name"], "../uploads/home/" . $cover_photo_name))
		{
			$p=$con->prepare("UPDATE  home_content set  homeimg=? where id=?");
			$p->bindParam(1, $cover_photo_name);
			$p->bindParam(2, $lastId);

			if(!$p->execute())
			{
				print_r($p->errorInfo());
			}
			
			  
		}
			 
		  header("location:../?pg=home_content&v=all");
	
	
	
	break;
	
	
	
	case "delete_home_content":
	$id = $_POST['id'];	
	$del = $con->prepare("delete from home_content where id='$id'");
	$del->execute();
	
	header("location:../?pg=home_content&v=all");
	break;
}
/*

*/
?>