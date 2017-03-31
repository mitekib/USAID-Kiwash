<?php
$pg = $_GET['pg'];
$v = isset($_GET['v']) ? $_GET['v'] : '';
?>

<h2>Home Image </h2>
<div class="col-lg-12">

<a href="./?pg=<?php echo $pg; ?>&v=all" class=" btn btn-sm btn-<?php if($v=="all") {echo "default";} else { echo "primary";}; ?>">
	All Images
</a>
<a href="./?pg=<?php echo $pg; ?>&v=new" class=" btn btn-sm btn-<?php if($v=="new") {echo "default";} else { echo "primary";}; ?>">
	New Image
</a>

<hr>
</div>

<div class="col-lg-12">
<?php
switch($v)
{
	case "all":
	?>
    <table class="table table-hover" id="first_dt">
    	<thead>
        <tr>
         <th>#</th>
         <th>Title</th>
         <th>Description</th>
         <th>Image</th>
         <th>Action</th>
         </tr>
        </thead>
        <?php
			$n=1;
			$u= $con->prepare("select * from slider order by id desc");
			$u->execute();
			while($ur = $u->fetch(PDO::FETCH_ASSOC)):
			?>
            <tr>
             <td><?php echo $n++; ?></td>
             <td><?php echo $ur['title']; ?></td>
             <td><?php echo $ur['descri']; ?></td>
             <td><img src="../uploads/slider/<?php echo $ur['home_img']; ?>" style="max-height:90px;" /></td>
             <td>
              <a href="./?pg=slider&v=edit&id=<?php echo $ur['id']; ?>">
                <button class="btn btn-sm btn-default" type="button" > <i class="fa fa-edit"></i> Edit </button>
                </a>
                
                <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" accesskey="<?=$ur['id']; ?>" name="delete_slider" data-target="#edits" data-title="Delete slider" > <i class="glyphicon glyphicon-trash"></i> Delete </button>
             
             </td>
             </tr>
             
            <?php
			endwhile;
		?>
    </table>
    <?php
	break;	
	
	case "new":
	?>
    	<div class="row">
         <form action="actions/slider.php" enctype="multipart/form-data" method="post">
         	<input type="hidden" name="action" value="new_slider">
        	<div class="form-group col-lg-4">
            	<label>Title</label>
                <input type="text" name="title" class="form-control" required>
                <br>
                <label>Home Image</label>
                <input type="file" name="home_img" class="form-control" required>
                
            </div>
            
            <div class="form-group col-lg-4">
            	<label>Url... for more details (else leave it blank)</label>
                <textarea name="descri" rows="7" class="form-control"></textarea>
                
            </div>            
            <div class="clearfix"></div>
            
            <div class="clearfix"></div>
            <div class="form-group col-lg-4">
            	<input type="submit" value="Add slider"   class="btn btn-primary pull-left btn-md">
            </div>
            
            <div class="clearfix"></div>
            
        <div class="clearfix"></div>
            
          
          </form>
         
        </div>
    <?php
	break;
	
	
	case "edit":
	$id = $_GET['id'];
	$c = $con->prepare("select * from slider where id='$id'");
	$c->execute();
	$cr = $c->fetch();
	
	?>
        <form action="actions/slider.php" enctype="multipart/form-data" method="post">
        <input type="hidden" name="action" value="edit_slider">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="picurl" value="<?php echo $cr['home_img']; ?>">
        <div class="form-group col-lg-4">
            	<label>Title</label>
                <input type="text" name="title" value="<?=$cr['title'];?>" class="form-control" required>
                <br>
                <label>Change Cover Picture</label>
                <input type="file" name="home_img" class="form-control" >
                 
                
            </div>
            
            <div class="form-group col-lg-4">
            	<label>slider headlines</label>
                <textarea name="descri" rows="7" class="form-control"><?=$cr['descri'];?></textarea>
                
            </div>
            
            <div class="clearfix"></div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-4">
            	<input type="submit" value="Update slider"   class="btn btn-primary pull-left btn-md">
            </div>
            
            
        <div class="clearfix"></div>
            
          
          </form>
    
    <?php
	break;
	
	
}
?>
</div>
