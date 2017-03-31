<?php

?>


<!-- JS | Custom script for all pages -->
<script src="<?=$site;?>js/custom.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
      (Load Extensions only on Local File Systems ! 
       The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="<?=$site;?>js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="<?=$site;?>js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="<?=$site;?>js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="<?=$site;?>js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="<?=$site;?>js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="<?=$site;?>js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="<?=$site;?>js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="<?=$site;?>js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="<?=$site;?>/admin/default_assets/dt/js/jquery.dataTables.js"></script>
<script src="<?=$site;?>/admin/default_assets/jquery_simple/jquery-ui.js"></script>
<!--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>-->

<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	
	$('#first_dt').DataTable();
	$('#date1').datepicker({
		
		maxDate:1,
		dateFormat:'yy-mm-dd'
	
	});
	
	
	$('#overallstats').DataTable({
        "order": [[ 2, "desc" ]]
    });
	
	
});

</script>
<!--<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>-->

<script type='text/javascript' data-cfasync='false' src='//dsms0mj1bbhn4.cloudfront.net/assets/pub/shareaholic.js' data-shr-siteid='6b5ff5195390019ffc8b26909d0fc2ee' async='async'></script>

<?php
//include("admin/actions/modals.php");
?>