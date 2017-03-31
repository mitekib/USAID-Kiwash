<?php
$pg = $_GET['pg'];
$v = isset($_GET['v']) ? $_GET['v'] : '';
?>

<h2>Locations</h2>
<div class="col-lg-12">
<a href="./?pg=<?php echo $pg; ?>&v=county" class=" btn btn-sm btn-<?php if($v=="county") {echo "default";} else { echo "primary";}; ?>">
	Counties&nbsp;<!--<span class="badge"><?php echo $or['c']; ?></span>-->
</a>

<a href="./?pg=<?php echo $pg; ?>&v=const" class=" btn btn-sm btn-<?php if($v=="const") {echo "default";} else { echo "primary";}; ?>">
	Constituencies&nbsp;<!--<span class="badge"><?php echo $or['c']; ?></span>-->
</a>

<a href="./?pg=<?php echo $pg; ?>&v=wards" class=" btn btn-sm btn-<?php if($v=="wards") {echo "default";} else { echo "primary";}; ?>">
	Wards&nbsp;<!--<span class="badge"><?php echo $or['c']; ?></span>-->
</a>

<a href="./?pg=<?php echo $pg; ?>&v=regions" class=" btn btn-sm btn-<?php if($v=="regions") {echo "default";} else { echo "primary";}; ?>">
	Regions&nbsp;<!--<span class="badge"><?php echo $or['c']; ?></span>-->
</a>

<hr>
</div>

<div class="col-lg-12">
<?php
switch($v)
{
	case "const":

	
	?>
    <table class="table table-hover" id="first_dt">
    	<thead>
        <tr>
         <th>#</th>
         <th>Constituecy </th>
         <th>County </th>
         <th>Action</th>
         </tr>
        </thead>
        <?php
			$n=1;
			$u= $con->prepare("select * from constituencies order by id desc");
			$u->execute();
			while($ur = $u->fetch(PDO::FETCH_ASSOC)):
			?>
            <tr>
             <td><?php echo $n++; ?></td>
             <td><?php echo $ur['CONSTITUENCY']; ?></td>
             <td>
             <?php
			 $ccod =$ur['COUNTY_CODE'];
			 $co = $con->prepare("select COUNTY_NAME from counties where COUNTY_CODE='$ccod'");
			 $co->execute();
			 $cor = $co->fetch();
			 echo $cor['COUNTY_NAME'];
             ?>
             </td>
             <td>
             
				<button class="btn btn-sm btn-default" type="button" accesskey="<?=$ur['id'];?>" data-toggle="modal" data-target="#edits" data-title="Edit Constituency" name="edit_const"> <i class="fa fa-edit"></i> Edit </button>
               <!-- 
                <button class="btn btn-sm btn-danger" type="button" accesskey="<?=$ur['id'];?>" data-toggle="modal" data-target="#edits" data-title="Delete job" name="delete_job"> <i class="glyphicon glyphicon-trash"></i> Delete </button>
                -->
             </td>
             </tr>
             
            <?php
			endwhile;
		?>
    </table>
   
    <?php
	break;	
	
	case "regions":
	?>
    <div class="container tabs-wrap">
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"> <a href="#p1" aria-controls="billing" role="tab" data-toggle="tab" aria-expanded="true">All regions</a> </li>
    <li> <a href="#p2" aria-controls="shipping" role="tab" data-toggle="tab" aria-expanded="false">New region</a> </li>
    <li> <a href="#p3" aria-controls="shipping" role="tab" data-toggle="tab" aria-expanded="false">Add constituencies to a region</a> </li>
    <li> <a href="#p4" aria-controls="shipping" role="tab" data-toggle="tab" aria-expanded="false">Constituencies in a region</a> </li>
  </ul>
  <div class="tab-content">
  
    <div role="tabpanel" class="tab-pane fade in active" id="p1">
      <h3 class=""></h3>
      <p>
      <table class="table table-hover" id="first_dt">
    	<thead>
        <tr>
         <th>#</th>
         <th>Name </th>
         
         <th>Action</th>
         </tr>
        </thead>
        <?php
			$n=1;
			$u= $con->prepare("select * from regions order by name asc");
			$u->execute();
			while($ur = $u->fetch(PDO::FETCH_ASSOC)):
			?>
            <tr>
             <td><?php echo $n++; ?></td>
             <td><?php echo $ur['name']; ?></td>
             
             <td>
             
				<button class="btn btn-sm btn-default" type="button" accesskey="<?=$ur['id'];?>" data-toggle="modal" data-target="#edits" data-title="Edit Region" name="edit_region"> <i class="fa fa-edit"></i> Edit </button>
               
                <button class="btn btn-sm btn-danger" type="button" accesskey="<?=$ur['id'];?>" data-toggle="modal" data-target="#edits" data-title="Delete Region" name="delete_region"> <i class="glyphicon glyphicon-trash"></i> Delete </button>
                
             </td>
             </tr>
             
            <?php
			endwhile;
		?>
    </table>
      </p>
      
    </div>
    
     <div role="tabpanel" class="tab-pane fade in " id="p4">
      <h3 class=""></h3>
      <p>
      <div class="form-group col-lg-4">
            	<label>Region </label>
                <select name="r_id" id="show_const_data" class="form-control">
                	<option value="">-Choose-</option>
                    <?php
						$r = $con->prepare("select name, id from regions ");
						$r->execute();
						while($rr = $r->fetch(PDO::FETCH_ASSOC)):
						?>
                        <option value="<?=$rr['id'];?>"><?=$rr['name'];?></option>
                        <?php
						endwhile;
					?>
                </select>
            </div>
       <div class="clearfix"></div>
       <script>
	   $("#show_const_data").change(function(){
	    var r_id = $(this).val();
			$.post('pages/show_const_data.php',{ r_id:r_id},function(data)
				{
					$('#show_const').html(data);
					$("#loading").hide();
				});	   
		});
	   </script>
       <div class="col-lg-8" id="show_const">
       
       </div>
      
      </p>
      
    </div>
      
      
      <div role="tabpanel" class="tab-pane fade in " id="p2">
      <h3 class=""></h3>
      <p>
      <form id="new_region" method="post">
         	<input type="hidden" name="action" value="new_region">
        	<div class="form-group col-lg-4">
            	<label>Region name</label>
                <input type="text" name="name" class="form-control">
            </div>
            
            <div class="clearfix"></div>
            <div class="form-group col-lg-1">
            	
                <button type="button" class="btn-default btn"  id="add">Add&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
            </div>
            <!--
            <label for="cname">Name (required, at least 2 characters)</label>
			<input id="cname" name="name" minlength="2" type="text" required>
            -->
            <div class="form-group col-lg-4" id="msg">
            
            </div>
            <script type="text/javascript">
			
				$(document).ready(function(){
						
					
					$("#add").click(function(){
						var fom = document.getElementById("new_region");
						var formdata = $(fom).serialize();
						
						
						//alert(formdata);
						$.ajax({
							url:'actions/locations.php',
							data:formdata,
							method:'POST',
							success: function(html)
							{
								
								
								if(html=="true")
								{
									fom.reset();
									$("#msg").css("color","green");
									$("#msg").html("<i class='fa fa-check'></i>&nbsp;Region has been posted.");	
								}
								else
								{
									$("#msg").css("color","red");
									$("#msg").html("<i class='fa fa-exclamation-triangle'></i>&nbsp;"+html);	
								}
							
							},
							beforeSend: function()
							{
								$("#msg").css("color","grey");
								$("#msg").html("<i class='fa fa-spinner fa-spin'></i>&nbsp;Adding ...");
							}
						});
						
					});
				});
			</script>
          </form>
      </p>
      
    </div>
    
    <div role="tabpanel" class="tab-pane fade in" id="p3">
      <h3 class=""></h3>
      <p>
      <form id="new_region_const" method="post">
         	<input type="hidden" name="action" value="new_region_const">
        	<div class="form-group col-lg-4">
            	<label>Region </label>
                <select name="r_id" class="form-control">
                	<option value="">-Choose-</option>
                    <?php
						$r = $con->prepare("select name, id from regions ");
						$r->execute();
						while($rr = $r->fetch(PDO::FETCH_ASSOC)):
						?>
                        <option value="<?=$rr['id'];?>"><?=$rr['name'];?></option>
                        <?php
						endwhile;
					?>
                </select>
            </div>
            <div class="col-lg-4">
            	<label>Search a constituency </label>
            <input type="text" id="search" class="form-control">
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-12" style="max-height:300px; overflow:scroll; overflow-x:hidden; margin-top:5px; margin-bottom:15px">
            
            	<table id="table1">
                <tbody>
                <tr>
                <td>
             <?php
			$sel = $con->prepare("select * from constituencies where  CONST_CODE not in(select const_id from r_const) order by CONSTITUENCY asc");
			$sel->execute();
			 while($rwc = $sel->fetch(PDO::FETCH_ASSOC)):
			 	?>
                
               <div style="width:50%; float:left">
               <input type="checkbox" name="w[]" id="<?php echo $rwc['CONST_CODE']; ?>" value="<?php echo $rwc['CONST_CODE']; ?>">
               <span style="width:140px;">&nbsp;<label for="<?php echo $rwc['CONST_CODE']; ?>" ><?php echo $rwc['CONSTITUENCY']; ?></label></span></div>
               
                <?php
			 endwhile;
			?>
            </td>
            </tr>
            </tbody>
            </table>
            <script>
			// Write on keyup event of keyword input element
			$("#search").keyup(function(){
				_this = this;
				// Show only matching TR, hide rest of them
				//alert('ssdf');
				$.each($("#table1 tbody").find("div"), function() {
					console.log($(this).text());
					if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
					   $(this).hide();
					else
						 $(this).show(); 
						 //$('#table').paging({limit:20});               
				});
			}); 
			</script>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-1">
            	
                <button type="button" class="btn-default btn"  id="add2">Add&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
            </div>
            <!--
            <label for="cname">Name (required, at least 2 characters)</label>
			<input id="cname" name="name" minlength="2" type="text" required>
            -->
            <div class="form-group col-lg-4" id="msg2">
            
            </div>
            <script type="text/javascript">
			
				$(document).ready(function(){
						
					
					$("#add2").click(function(){
						var fom = document.getElementById("new_region_const");
						var formdata = $(fom).serialize();
						
						
						//alert(formdata);
						$.ajax({
							url:'actions/locations.php',
							data:formdata,
							method:'POST',
							success: function(html)
							{
								
								
								if(html=="true")
								{
									fom.reset();
									$("#msg2").css("color","green");
									$("#msg2").html("<i class='fa fa-check'></i>&nbsp;Region constituencies have been added.");	
								}
								else
								{
									$("#msg2").css("color","red");
									$("#msg2").html("<i class='fa fa-exclamation-triangle'></i>&nbsp;"+html);	
								}
							
							},
							beforeSend: function()
							{
								$("#msg2").css("color","grey");
								$("#msg2").html("<i class='fa fa-spinner fa-spin'></i>&nbsp;Adding ...");
							}
						});
						
					});
				});
			</script>
          </form>
      </p>
      
    </div>
   
    
  </div>
</div>
    	
         
         
       
    <?php
	break;
	
	
}
?>
</div>

