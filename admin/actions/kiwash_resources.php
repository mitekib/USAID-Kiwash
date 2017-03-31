<?php
include("../connect.php");

$action = $_POST['action'];
switch($action)
{
	case "new_home_content":
	
	$resource = $_POST['resources'];
	$title = $_POST['title'];
	$content = $_POST['descri'];

	$date=date('Y-m-d H:i:s');

	$cp = explode(".",$_FILES["img"]["name"]);

	$fileext='-';//strtolower($cp);
/*
	if($fileext==='png')
	{
		$cp='png';
	}
	if($fileext==='jpg')
	{
		$cp='jpg';
	}
	if($fileext==='xls')
	{
		$cp='xls';
	}
	if($fileext==='xlsx')
	{
		$cp='xlsx';
	}
	if($fileext==='pdf')
	{
		$cp='pdf';
	}
	if($fileext==='doc')
	{
		$cp='doc';
	}
	if($fileext==='docs')
	{
		$cp='docs';
	}
	*/

	$cover_photo_name = substr(md5(time()),0,10). '.' .end($cp);



	
	    $a=$con->prepare("INSERT into tblresources set  title=?, descri=?,datecreated=?,res_type=?,file_type=?");
		$a->bindParam(1, $title);
		$a->bindParam(2, $content);
		$a->bindParam(3, $date);
		$a->bindParam(4, $resource);
		$a->bindParam(5, $cp);
		

		if(!$a->execute())
		{
			print_r($a->errorInfo());
		}
		else
		{

	
	    $lastId = $con->lastInsertId();
		if(move_uploaded_file($_FILES["img"]["tmp_name"], "../uploads/resources/" . $cover_photo_name))
		{
			$p=$con->prepare("UPDATE  tblresources set  homeimg=? where id=?");
			$p->bindParam(1, $cover_photo_name);
			$p->bindParam(2, $lastId);

			if(!$p->execute())
			{
				print_r($p->errorInfo());
			}
			
			  
		}
   }
	
		
			
	header("location:../?pg=resources&v=all");

	
	break;
	
	case "edit_home_content":
	 
	
	$id =  $_POST['id'];
	
	$resource = $_POST['resources'];
	$title = $_POST['title'];
	$content = $_POST['descri'];
	$cp = explode(".",$_FILES["img"]["name"]);

	$fileext='-';//strtolower($cp);
	
	/*
	if($fileext==='png')
	{
		$cp='png';
	}
	if($fileext==='jpg')
	{
		$cp='jpg';
	}
	if($fileext==='xls')
	{
		$cp='xls';
	}
	if($fileext==='xlsx')
	{
		$cp='xlsx';
	}
	if($fileext==='pdf')
	{
		$cp='pdf';
	}
	if($fileext==='doc')
	{
		$cp='doc';
	}
	if($fileext==='docs')
	{
		$cp='docs';
	}
*/
	$cover_photo_name = substr(md5(time()),0,10). '.' .end($cp);

	
	$a=$con->prepare("UPDATE tblresources set  title=?, descri=?, file_type=? where id=?");
		$a->bindParam(1, $title);
		$a->bindParam(2, $content);
		$a->bindParam(3, $cp);
		$a->bindParam(4, $id);

		if(!$a->execute())
		{
			print_r($a->errorInfo());
		}

		$lastId = $id;
		if(move_uploaded_file($_FILES["img"]["tmp_name"], "../uploads/resources/" . $cover_photo_name))
		{
			$p=$con->prepare("UPDATE  tblresources set  homeimg=? where id=?");
			$p->bindParam(1, $cover_photo_name);
			$p->bindParam(2, $lastId);

			if(!$p->execute())
			{
				print_r($p->errorInfo());
			}
			
			  
		}
			 
		  header("location:../?pg=resources&v=all");
	
	
	
	break;
		
	case "delete_home_content":
	$id = $_POST['id'];	
	$del = $con->prepare("DELETE from tblresources where id='$id'");
	$del->execute();
	
	header("location:../?pg=resources&v=all");
	break;
}
/*

*/
?>