<?php
$pg = $_GET['pg'];
$v = isset($_GET['v']) ? $_GET['v'] : '';
?>


<div class="col-lg-12">
<h2>Resources</h2>
<?php /*
<a href="./?pg=<?php echo $pg; ?>&v=cat" class=" btn btn-sm btn-<?php if($v=="cat") {echo "default";} else { echo "primary";}; ?>">
	Property Categories&nbsp;<!--<span class="badge"><?php echo $or['c']; ?></span>-->
</a>
*/
?>
<a href="./?pg=<?php echo $pg; ?>&v=a" class=" btn btn-sm btn-<?php if($v=="a") {echo "default";} else { echo "primary";}; ?>">
	Resource types&nbsp;<!--<span class="badge"><?php echo $or['c']; ?></span>-->
</a>
<a href="./?pg=<?php echo $pg; ?>&v=files" class=" btn btn-sm btn-<?php if($v=="files") {echo "default";} else { echo "primary";}; ?>">
	Resources' files&nbsp;<!--<span class="badge"><?php echo $or['c']; ?></span>-->
</a>

<hr>
</div>

<div class="col-lg-12">
<?php
switch($v)
{
	case "a":
	?>
    <ul class="nav nav-pills btn-sm">
     <li class="active"><a href="#all"  data-toggle="tab">All resource types</a></li>
     <li><a href="#new"  data-toggle="tab">New resource type</a></li>
   </ul>
   <hr>
   <div class="tab-content">

    <div id="all" class="tab-pane fade in active">

         <table class="table table-hover" id="first_dt">
    	<thead>
        <tr>
         <th>#</th>
         <th>Name</th>
         
         <th>Action</th>
         </tr>
        </thead>
        <?php
			$n=1;
			$u= $con->prepare("select * from resources  order by id desc");
			$u->execute();
			while($ur = $u->fetch(PDO::FETCH_ASSOC)):
			?>
            <tr>
             <td><?php echo $n++; ?></td>
             <td><?php echo ucwords(str_replace('_',' ',$ur['name'])); ?></td>
             
             <td>
             
				<button class="btn btn-sm btn-default" type="button" accesskey="<?=$ur['id'];?>" data-toggle="modal" data-target="#edits" data-title="Edit resource type" name="edit_resource_type"> <i class="fa fa-edit"></i> Edit </button>
                
                <button class="btn btn-sm btn-danger" type="button" accesskey="<?=$ur['id'];?>" data-toggle="modal" data-target="#edits" data-title="Delete resource type" name="delete_resource_type"> <i class="glyphicon glyphicon-trash"></i> Delete </button>
             </td>
             </tr>
             
            <?php
			endwhile;
		?>
    </table>

    </div>
    
    <div id="new" class="tab-pane fade in ">
     <form id="nrf" method="post">
         	<input type="hidden" name="action" value="new_resource_type">
        	<div class="form-group col-lg-4">
            	<label>Name</label>
                <input type="text" name="name" placeholder="eg. Speeches, Forms, etc" class="form-control">
            </div>
            
            
            
            <div class="clearfix"></div>
            <div class="form-group col-lg-2">
            	
                <button type="button" class="btn-primary btn"  id="add">Add&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
            </div>
           
            <div class="form-group col-lg-4" id="usermsg">
            
            </div>
            <script type="text/javascript">
			
				$(document).ready(function(){
						
					
					$("#add").click(function(){
						var fom = document.getElementById("nrf");
						var formdata = $(fom).serialize();
						
						$.ajax({
							url:'actions/resources.php',
							data:formdata,
							method:'POST',
							success: function(html)
							{
								
								
								if(html=="true")
								{
									fom.reset();
									$("#usermsg").css('color','green');
									$("#usermsg").html("<i class='fa fa-check'></i>&nbsp;Resource type has been added.");	
								}
								else
								{
									$("#usermsg").css('color','red');
									$("#usermsg").html("<i class='fa fa-exclamation-triangle'></i>&nbsp;"+html);	
								}
							
							},
							beforeSend: function()
							{
								$("#usermsg").css('color','black');
								$("#usermsg").html("<i class='fa fa-spinner fa-spin'></i>&nbsp;Adding ...");
							}
						});
					});
				});
			</script>
          </form>
    </div>
   </div>
   
   
    <?php
	break;	
	
	
	case "files":
	?>
    <ul class="nav nav-pills btn-sm">
     <li class="active"><a href="#all"  data-toggle="tab">All resource files </a></li>
     <li><a href="#new"  data-toggle="tab">New resource file</a></li>
   </ul>
   <hr>
   <div class="tab-content">

    <div id="all" class="tab-pane fade in active">

         <table class="table table-hover" id="first_dt">
    	<thead>
        <tr>
         <th>#</th>
         <th>Title</th>
         <th>Resource type</th>
         <th>Action</th>
         </tr>
        </thead>
        <?php
			$n=1;
			$u= $con->prepare("select * from resource_files  order by id desc");
			$u->execute();
			while($ur = $u->fetch(PDO::FETCH_ASSOC)):
			?>
            <tr>
             <td><?php echo $n++; ?></td>
             <td><?php echo $ur['title']; ?></td>
             <td><?php 
			 $rtype = $ur['resource_type'];
			 $r = $con->prepare("select name from resources where id='$rtype'");
			 $r->execute();
			 $rr = $r->fetch();
			 echo $rr['name'];
			  ?></td>
             <td>
             
				<button class="btn btn-sm btn-default" type="button" accesskey="<?=$ur['id'];?>" data-toggle="modal" data-target="#edits" data-title="Edit resource file " name="edit_rf"> <i class="fa fa-edit"></i> Edit </button>
                
                <button class="btn btn-sm btn-danger" type="button" accesskey="<?=$ur['id'];?>" data-toggle="modal" data-target="#edits" data-title="Delete resource file " name="delete_rf"> <i class="glyphicon glyphicon-trash"></i> Delete </button>
             </td>
             </tr>
             
            <?php
			endwhile;
		?>
    </table>

    </div>
    
    <div id="new" class="tab-pane fade in ">
     <form action="actions/resources.php" method="post" enctype="multipart/form-data">
         	<input type="hidden" name="action" value="new_resource_file">
        	<div class="form-group col-lg-4">
            	<label>Title</label>
                <input type="text" name="title"  class="form-control" required>
                <label>Resource type</label>
                <select name="r_type"  class="form-control" required>
                 <option value="">-Choose-</option>
                 <?php
				 $r = $con->prepare("select name, id from resources order by id desc");
				 $r->execute();
				 while($rr = $r->fetch(PDO::FETCH_ASSOC)):
				 ?>
                 <option value="<?php echo $rr['id']; ?>"><?php echo $rr['name']; ?></option>
                 <?php
				 endwhile;
				 ?>
                </select>
                <label>File</label>
                <input type="file" name="myfile"  class="form-control">
            </div>
            
            <div class="form-group col-lg-4">
            	<label>Resource file desription</label>
                <textarea name="descri" rows="7" class="form-control"></textarea>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-4">
            	
            </div>
            
            
            
            <div class="clearfix"></div>
            <div class="form-group col-lg-2">
            	
                <button type="submit" class="btn-primary btn"  >Add&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
            </div>
           
            <div class="form-group col-lg-4" id="usermsg">
            
            </div>
           
          </form>
    </div>
   </div>
   
   
    <?php
	break;
	
	
	
	
	
}
?>
</div>
