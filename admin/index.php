<?php error_reporting(E_ERROR | E_PARSE);?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>USAID</title>
<!-- BOOTSTRAP STYLES-->
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="default_assets/fontawesome/css/font-awesome.css" rel="stylesheet" />
<!-- CUSTOM STYLES-->
<link href="assets/css/custom.css" rel="stylesheet" />
<link href="../css/buttons.css" rel="stylesheet" />
<!-- GOOGLE FONTS
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />-->
<!--<link rel="shortcut icon" href="../images/favicon.png">-->
<link href="default_assets/dt/css/jquery.dataTables.css" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="default_assets/dt/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="default_assets/dt/css/dataTablesbuttons.css">
<link rel="stylesheet" href="default_assets/jquery_simple/jquery-ui.css">
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="default_assets/jquery_simple/jquery-1.10.js"></script>
</head>


<body >

<!--; -->
<div id="loading"></div>

<?php 

session_start();

$tou = $_SESSION['iebc_tou'];

switch($tou)
{
case "admin":
include("admincontent.php");
break;

default:
?>
					<script type="text/javascript">
                   
                            window.location.href="actions/logout.php";
                            
                     
                    </script>
                    <?php
break;
}




?>

  <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
<script src="default_assets/dt/js/jquery.dataTables.js"></script>
<script src="default_assets/jquery_simple/jquery-ui.js"></script>
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
