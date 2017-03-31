<?php
include("../connect.php");
$action = $_POST['action'];
switch($action)
{
	case "new_e";
		$name = $_POST['name'];
		
		if($name=="")
		{
			echo "Name of election is required.";
			exit();
			
		}
		
		
			$u = $con->prepare("select * from  elections where name='$name' ");
			$u->execute();
			if($u->rowcount()>0)
			{
				echo "Name of elections already exists";
				exit();
			}
			
			$m = $con->prepare("insert into elections set name=?");
			$m->bindParam(1, $name);

			
			$m->execute();
			echo "true";
		
	break;
	
	case "new_region";
		$name = $_POST['name'];
		
		if($name=="")
		{
			echo "Name of region is required.";
			exit();
			
		}
		
		
			$u = $con->prepare("select * from  regions where name='$name' ");
			$u->execute();
			if($u->rowcount()>0)
			{
				echo "Name of region already exists";
				exit();
			}
			
			$m = $con->prepare("insert into regions set name=?");
			$m->bindParam(1, $name);

			
			$m->execute();
			echo "true";
		
	break;
	
	case "new_region_const":
	if($_POST['r_id']=="")
	{
		echo "Select a region";
		exit();
	}
	if(empty($_POST['w']))
	{
		echo "Select atleast one constituency";
		exit();
	}
	$r_id = $_POST['r_id'];
	foreach($_POST['w'] as $val)
	{
		$m = $con->prepare("select * from r_const where const_id='$val' and r_id='$r_id'");
		$m->execute();
		if($m->rowcount()>0)
		{
			
		}
		else
		{
			$mm = $con->prepare("insert into r_const set r_id=?, const_id=? ");
			$mm->bindParam(1,$r_id);
			$mm->bindParam(2,$val);
			$mm->execute();
		}
	}
	echo 'true';
	break;
	
	case "edit_const":
		$name = $_POST['const'];	
		$id = $_POST['id'];
		$cid = $_POST['cid'];
		$const = $_POST['const'];
		$j = $con->prepare("update constituencies set COUNTY_CODE=?, CONSTITUENCY=? where id=?");
		$j->bindParam(1, $cid);
		$j->bindParam(2, $const);
		$j->bindParam(3, $id);
		$j->execute();
		header("location:../?pg=locations&v=const");
	break;
	
	case "delete_e":
		
		$id = $_POST['id'];
		$j = $con->prepare("delete from elections where id=?");
		$j->bindParam(1, $id);

		$j->execute();
		header("location:../?pg=elections&v=all");
	break;
	
	
	case "remove_const":
		
		$id = $_POST['id'];
		$j = $con->prepare("delete from r_const where const_id=?");
		$j->bindParam(1, $id);

		$j->execute();
		header("location:../?pg=locations&v=regions");
	break;
	case "edit_region":
		$name = $_POST['name'];	
		$id = $_POST['id'];	
		$j = $con->prepare("update regions set name=? where id=?");
		$j->bindParam(1, $name);
		$j->bindParam(2, $id);
		$j->execute();
		header("location:../?pg=locations&v=regions");
	break;
	
	case "delete_region":
		
		$id = $_POST['id'];
		$j = $con->prepare("delete from regions where id=?");
		$j->bindParam(1, $id);

		$j->execute();
		header("location:../?pg=locations&v=regions");
	break;
}
/*

*/
?>