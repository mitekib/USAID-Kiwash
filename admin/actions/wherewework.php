<?php
include("../connect.php");

$action = $_POST['action'];
switch($action)
{
	case "new_home_content":
	
	$block = $_POST['block'];
	$region = $_POST['region'];
	$title = $_POST['title'];
	$content = $_POST['descri'];

	$date=date('Y-m-d H:i:s');

	//$cp = explode(".",$_FILES["img"]["name"]);

	//$cover_photo_name = substr(md5(time()),0,10). '.' .end($cp);

	
	    $a=$con->prepare("INSERT into wherewework set  title=?, descri=?,datecreated=?,w_block=?,w_region=?");
		$a->bindParam(1, $title);
		$a->bindParam(2, $content);
		$a->bindParam(3, $date);
		$a->bindParam(4, $block);
		$a->bindParam(5, $region);

		if(!$a->execute())
		{
			print_r($a->errorInfo());
		}
		else
		{

	
	    $lastId = $con->lastInsertId();
		/*if(move_uploaded_file($_FILES["img"]["tmp_name"], "../uploads/home/" . $cover_photo_name))
		{
			$p=$con->prepare("UPDATE  wherewework set  homeimg=? where id=?");
			$p->bindParam(1, $cover_photo_name);
			$p->bindParam(2, $lastId);

			if(!$p->execute())
			{
				print_r($p->errorInfo());
			}
			
			  
		}
		*/
   }
	
		
			
	header("location:../?pg=wherewework&v=all");

	
	break;
	
	case "edit_home_content":
	 
	
	$id =  $_POST['id'];
	$block = $_POST['block'];
	$region = $_POST['region'];
	$title = $_POST['title'];
	$content = $_POST['descri'];
	//$cp = explode(".",$_FILES["img"]["name"]);

	//$cover_photo_name = substr(md5(time()),0,10). '.' .end($cp);

	
	$a=$con->prepare("UPDATE wherewework set  title=?, descri=?, w_block=?,w_region=? where id=?");
		$a->bindParam(1, $title);
		$a->bindParam(2, $content);
		$a->bindParam(3, $block);
		$a->bindParam(4, $region);
		$a->bindParam(5, $id);

		if(!$a->execute())
		{
			print_r($a->errorInfo());
		}

		$lastId = $id;
		/*
		if(move_uploaded_file($_FILES["img"]["tmp_name"], "../uploads/home/" . $cover_photo_name))
		{
			$p=$con->prepare("UPDATE  wherewework set  homeimg=? where id=?");
			$p->bindParam(1, $cover_photo_name);
			$p->bindParam(2, $lastId);

			if(!$p->execute())
			{
				print_r($p->errorInfo());
			}
			
			  
		}
		*/
			 
		  header("location:../?pg=wherewework&v=all");
	
	
	
	break;
		
	case "delete_home_content":
	$id = $_POST['id'];	
	$del = $con->prepare("DELETE from wherewework where id='$id'");
	$del->execute();
	
	header("location:../?pg=wherewework&v=all");
	break;
}
/*

*/
?>