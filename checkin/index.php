<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>USAID</title>
<!-- BOOTSTRAP STYLES-->
<link href="../admin/assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="../admin/default_assets/fontawesome/css/font-awesome.css" rel="stylesheet" />
<!-- CUSTOM STYLES-->
<link href="../admin/assets/css/custom.css" rel="stylesheet" />
<link href="../css/buttons.css" rel="stylesheet" />
<!-- GOOGLE FONTS
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />-->
<!--<link rel="shortcut icon" href="../images/favicon.png">-->
<link href="../admin/default_assets/dt/css/jquery.dataTables.css" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="../admin/default_assets/dt/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../admin/default_assets/dt/css/dataTablesbuttons.css">
<link rel="stylesheet" href="../admin/default_assets/jquery_simple/jquery-ui.css">
<script src="../admin/assets/js/jquery-1.10.2.js"></script>
<script src="../admin/default_assets/jquery_simple/jquery-1.10.js"></script>
</head>


<body style="background-color: #000;background-image:    radial-gradient(   circle closest-side,      #e7e7e7,      #f5f8fd    );">

<!--; -->
<div id="loading"></div>

<div class="container">
<div class="row">
<!--
<h2 class="text-center">You need to log in first to access admin</h2>
<hr />
-->
<div class="col-sm-12 col-md-12 col-lg-12 text-center ">
<!--<img src="../images/favicon.png" class="img-responsive" style=" background:transparent;  padding:2%; border-radius:30px; margin:auto; display:block; max-height:235px; margin-top:5%;margin-bottom:0;">-->
</div>
<div class="col-sm-10 col-md-6 col-lg-4 ">

</div>
<div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3 col-lg-4  col-lg-offset-0">
<!--<button data-toggle="modal" class="btn btn-primary" data-target="#poper">Login</button>-->
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="text-center">Login</h3>
</div>
<div class="panel-body">
<form id="login" method="post" action="">
<div class="row">
<div class="form-group col-lg-12">
<div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
<input type="text" class="form-control" name="username" placeholder="Username">
</div>
</div>
<div class="form-group col-lg-12">
<div class="input-group"> <span class="input-group-addon"><i class="fa fa-key"></i></span>
<input type="password" class="form-control" name="password" placeholder="Password">
</div>
</div>
<div class="form-group col-lg-12" id="msg"> </div>
<div class="panel-footer">
<button type="submit" class="btn btn-primary btn-md round" id="btn" name="login">Login <i class="fa fa-sign-in"></i></button>
</div>
</div>
</form>
<?php
error_reporting(E_ERROR | E_PARSE);
include("../admin/connect.php");
if(isset($_POST['login']))
{

if(filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)===false)
{
echo '<span style="color:red;">Wrong username formart</span>';
exit();
}
$username = stripslashes($_POST['username']);
$password = stripslashes($_POST['password']);
$s = $con->prepare("SELECT * from users where user_name='$username' and user_password='$password'");
$s->execute();
$counter = $s->rowcount();

if($counter==0)
{
echo '<span style="color:red;">Wrong username or password</span>';
}
else
{
$sr = $s->fetch();
if(!isset($_SESSION)) 
{ 

session_start();

}
$_SESSION['kiwash_admin'] = $sr['user_name'];
$_SESSION['iebc_fullnames'] = $sr['fullnames'];
$_SESSION['iebc_tou'] = $sr['user_tou'];
echo '<span style="color:green;">Success</span>';

$redirect = '../admin?pg=home_content&v=all';



?>

<SCRIPT LANGUAGE="JavaScript">
redirTime = "550";
redirURL = "<?php echo $redirect ?>";
function redirTimer() { self.setTimeout("self.location.href = redirURL;",redirTime); }
</script>
<BODY onLoad="redirTimer()">
<?php


}

}
?>
</div>

</div>
</div>
</div>
<!--
<p class="text-center" style="color:#fff;"><a href="../" style="text-decoration:none; color:#ffffff;" ><i class="fa fa-home"></i>&nbsp; Back home</a> | Powered by <a href="http://www.lesane.co.ke" style="text-decoration:underline; color:#ffffff;" target="_blank">Lesane Ltd</a> </p>

-->
</div>


<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->

<!-- BOOTSTRAP SCRIPTS -->
<script src="../admin/assets/js/bootstrap.min.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="../admin/assets/js/custom.js"></script>

<script src="../admin/default_assets/dt/js/jquery.dataTables.js"></script>
<script src="../admin/default_assets/jquery_simple/jquery-ui.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js">
</script>
<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {

$('#first_dt').DataTable();
$('#date1').datepicker({

maxDate:1,
dateFormat:'yy-mm-dd'

});

$('#future_date').datepicker({

minDate:1,
dateFormat:'yy-mm-dd'

});


$('#overallstats').DataTable({
"order": [[ 2, "desc" ]]
});


});

</script>



</body>
</html>

<?php 

	//ob_end_flush();
	//ob_end(); 

	?>