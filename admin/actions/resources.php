<?php
include("../connect.php");
$action = $_POST['action'];
switch($action)
{
	case "new_resource_type";
		$name = $_POST['name'];
		
		if($name=="")
		{
			echo "Name of resource type is required.";
			exit();
			
		}
		
		
			$u = $con->prepare("select * from  resources where name='$name' ");
			$u->execute();
			if($u->rowcount()>0)
			{
				echo "Name of resource type already exists";
				exit();
			}
			
			$m = $con->prepare("insert into resources set name=?");
			$m->bindParam(1, $name);

			
			$m->execute();
			echo "true";
		
	break;
	
	case "edit_resource_type":
		$name = $_POST['name'];	
		$id = $_POST['id'];
		$j = $con->prepare("update resources set name=? where id=?");
		$j->bindParam(1, $name);
		$j->bindParam(2, $id);
		$j->execute();
		//echo "true";
		header("location:../?pg=resources&v=a");
	break;
	
	case "delete_resource_type":
		
		$id = $_POST['id'];
		$j = $con->prepare("delete from resources where id=?");
		$j->bindParam(1, $id);

		$j->execute();
		header("location:../?pg=resources&v=a");
	break;
	
	
	case "new_resource_file";
		$title = $_POST['title'];
		$rtype = $_POST['r_type'];
		$descri = $_POST['descri'];
		$d = time();
		
		
		
		$r = $con->prepare("insert into resource_files set title=?, resource_type=?, file_descri=?, date_posted=?");
		$r->bindParam(1, $title);
		$r->bindParam(2, $rtype);
		$r->bindParam(3, $descri);
		$r->bindParam(4, $d);
		
		if(!$r->execute())
		{
			print_r($r->errorInfo());
		}
		
		$ra2 = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',5)),0,10);
		$cp = explode(".",$_FILES["myfile"]["name"]);
		$cover_photo_name = $ra2."". '.' .end($cp);
		
		$lastId = $con->LastInsertId();
		
		if(move_uploaded_file($_FILES["myfile"]["tmp_name"], "../uploads/resources/" . $cover_photo_name))
		{
			$f = $con->prepare("update resource_files set file_loc=? where id=?");
			$f->bindParam(1, $cover_photo_name);
			$f->bindParam(2, $lastId);
			$f->execute();
		}
		
		header("location:../?pg=resources&v=files");
		
		
	break;
	
	case "edit_resource_file":
		$title = $_POST['title'];	
		$id = $_POST['id'];
		$descri = $_POST['descri'];	
		$rtype = $_POST['r_type'];	
		$j = $con->prepare("update resource_files set title=?, file_descri=?, resource_type=? where id=?");
		$j->bindParam(1, $title);
		$j->bindParam(2, $descri);
		$j->bindParam(3, $rtype);
		$j->bindParam(4, $id);
		$j->execute();
		//echo "true";
		
		$ra2 = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',5)),0,10);
		$cp = explode(".",$_FILES["myfile"]["name"]);
		$cover_photo_name = $ra2."". '.' .end($cp);
		
		if(move_uploaded_file($_FILES["myfile"]["tmp_name"], "../uploads/resources/" . $cover_photo_name))
		{
			$d =$con->prepare("select file_loc from resource_files where id='$id'");
			$d->execute();
			$dr = $d->fetch();
			unlink("../uploads/resources/".$dr['file_loc']);
			$f = $con->prepare("update resource_files set file_loc=? where id=?");
			$f->bindParam(1, $cover_photo_name);
			$f->bindParam(2, $id);
			$f->execute();
		}
		header("location:../?pg=resources&v=files");
	break;
	
	case "delete_resource_file":
		
		$id = $_POST['id'];
		$fileurl = $_POST['fileurl'];
		$j = $con->prepare("delete from resource_files where id=?");
		$j->bindParam(1, $id);
		$j->execute();
		
		unlink("../uploads/resources/".$fileurl);
		header("location:../?pg=resources&v=files");
	break;
	
	
	
	case "new_loc";
		$name = $_POST['name'];
		
		if($name=="")
		{
			echo "Name of location is required.";
			exit();
			
		}
		
		
			$u = $con->prepare("select * from  loc where name='$name' ");
			$u->execute();
			if($u->rowcount()>0)
			{
				echo "Name of locaton already exists";
				exit();
			}
			
			$m = $con->prepare("insert into loc set name=?");
			$m->bindParam(1, $name);

			
			$m->execute();
			echo "true";
		
	break;
	
	case "edit_loc":
		$name = $_POST['name'];	
		$id = $_POST['id'];
		$j = $con->prepare("update loc set name=? where id=?");
		$j->bindParam(1, $name);
		$j->bindParam(2, $id);
		$j->execute();
		//echo "true";
		header("location:../?pg=settings&v=loc");
	break;
	
	case "delete_loc":
		
		$id = $_POST['id'];
		$j = $con->prepare("delete from loc where id=?");
		$j->bindParam(1, $id);

		$j->execute();
		header("location:../?pg=settings&v=loc");
	break;
	
	
	case "new_amenity";
		$name = $_POST['name'];
		
		if($name=="")
		{
			echo "Name of amenity is required.";
			exit();
			
		}
		
		
			$u = $con->prepare("select * from  amenities where name='$name' ");
			$u->execute();
			if($u->rowcount()>0)
			{
				echo "Amenity already exists";
				exit();
			}
			
			$m = $con->prepare("insert into amenities set name=?");
			$m->bindParam(1, $name);

			
			$m->execute();
			echo "true";
		
	break;
	
	case "edit_amenity":
		$name = $_POST['name'];	
		$id = $_POST['id'];
		$j = $con->prepare("update amenities set name=? where id=?");
		$j->bindParam(1, $name);
		$j->bindParam(2, $id);
		$j->execute();
		//echo "true";
		header("location:../?pg=settings&v=amenities");
	break;
	
	case "delete_amenity":
		
		$id = $_POST['id'];
		$j = $con->prepare("delete from amenities where id=?");
		$j->bindParam(1, $id);

		$j->execute();
		header("location:../?pg=settings&v=amenities");
	break;
}
/*

*/
?>