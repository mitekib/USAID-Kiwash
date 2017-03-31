<?php 
/*
session_start();

$user = $_SESSION['gk_admin'];
$usertou = $_SESSION['gk_tou'];
$userfullname = $_SESSION['gk_fullnames'];

include("../browser.php");*/
include("../connect.php");

$action = $_POST['action'];
switch($action)
{
	case "delete_user":
		$id =  $_POST['user_id'];
		$s = $con->prepare("delete from users where id = '$id'");
		$s->execute();
		
		//audit trail
		$detail = "Deleted a user";
		$d = time();
		$au = $con->prepare("insert into audit_trail set user=?, fullnames=?, usertype=?, action_perfomed=?, date_posted=?, ip_address=?");
		$au->bindParam(1,$user);
		$au->bindParam(2,$userfullname);
		$au->bindParam(3,$usertou);
		$au->bindParam(4,$detail);
		$au->bindParam(5,$d);
		$au->bindParam(6,$it_ip);
		$au->execute();
		
		echo 'true';
	break;
	case "delete_currency":
		$id =  $_POST['id'];
		$s = $con->prepare("delete from currencies where id = '$id'");
		$s->execute();
		
		//audit trail
		$detail = "Deleted a currency";
		$d = time();
		$au = $con->prepare("insert into audit_trail set user=?, fullnames=?, usertype=?, action_perfomed=?, date_posted=?, ip_address=?");
		$au->bindParam(1,$user);
		$au->bindParam(2,$userfullname);
		$au->bindParam(3,$usertou);
		$au->bindParam(4,$detail);
		$au->bindParam(5,$d);
		$au->bindParam(6,$it_ip);
		$au->execute();
		echo 'true';
	break;
	
	case "delete_category":
		$id =  $_POST['id'];
		$s = $con->prepare("delete from categories where id = '$id'");
		$s->execute();
		
		//audit trail
		$detail = "Deleted a category";
		$d = time();
		$au = $con->prepare("insert into audit_trail set user=?, fullnames=?, usertype=?, action_perfomed=?, date_posted=?, ip_address=?");
		$au->bindParam(1,$user);
		$au->bindParam(2,$userfullname);
		$au->bindParam(3,$usertou);
		$au->bindParam(4,$detail);
		$au->bindParam(5,$d);
		$au->bindParam(6,$it_ip);
		$au->execute();
		echo 'true';
	break;
	
	case "delete_size":
		$id =  $_POST['id'];
		$s = $con->prepare("delete from sizes where id = '$id'");
		$s->execute();
		
		//audit trail
		$detail = "Deleted a size";
		$d = time();
		$au = $con->prepare("insert into audit_trail set user=?, fullnames=?, usertype=?, action_perfomed=?, date_posted=?, ip_address=?");
		$au->bindParam(1,$user);
		$au->bindParam(2,$userfullname);
		$au->bindParam(3,$usertou);
		$au->bindParam(4,$detail);
		$au->bindParam(5,$d);
		$au->bindParam(6,$it_ip);
		$au->execute();
		echo 'true';
	break;
	
	default:
		echo "Invalid URL";
	break;
}
?>