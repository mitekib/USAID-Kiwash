<?php
$pg = $_GET['pg'];
$v = isset($_GET['v']) ? $_GET['v'] : '';
?>

<h2>Home Section Content </h2>
<div class="col-lg-12">

<a href="./?pg=<?php echo $pg; ?>&v=all" class=" btn btn-sm btn-<?php if($v=="all") {echo "default";} else { echo "primary";}; ?>">
	All Contents
</a>
<a href="./?pg=<?php echo $pg; ?>&v=new" class=" btn btn-sm btn-<?php if($v=="new") {echo "default";} else { echo "primary";}; ?>">
	New Contents
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
         <th>Content</th>
          <th>Image</th>
         <th>Action</th>
         </tr>
        </thead>
        <?php
			$n=1;
			$u= $con->prepare("SELECT * from home_content order by id desc");
			$u->execute();
			while($ur = $u->fetch(PDO::FETCH_ASSOC)):
			?>
            <tr>
             <td><?php echo $n++; ?></td>
             <td><?php echo $ur['title']; ?></td>
             <td><?php echo $ur['descri']; ?></td>
             <td><img src="uploads/home/<?php echo $ur['homeimg']; ?>" class="img-responsive" style="height: 100px;width:100px"></td>
             <td>
              <a href="./?pg=home_content&v=edit&id=<?php echo $ur['id']; ?>">
                <button class="btn btn-sm btn-default" type="button" > <i class="fa fa-edit"></i> Edit </button>
                </a>
                <br>
                <br>                
                <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" accesskey="<?=$ur['id']; ?>" name="delete_home_content" data-target="#edits" data-title="Delete Content" > <i class="glyphicon glyphicon-trash"></i> Delete </button>
             
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
         <form action="actions/home_content.php" enctype="multipart/form-data" method="post">
         	<input type="hidden" name="action" value="new_home_content">
        	<div class="form-group col-lg-8">
            	<label>Title</label>
                 <input name="title" id="conte" value="" class="form-control" >
                <br>

            </div>
            
                       
            <div class="clearfix"></div>
            <div class="form-group col-lg-8">
            	<label>Content</label>
                <textarea name="descri" id="conte" class="form-control"></textarea>
            </div>

                <div class="form-group col-lg-8">
                
                <br>
                <label>Image</label>
                <input type="file" name="img" class="form-control" required>
                                
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-4">
            	<input type="submit" value="Add Content"   class="btn btn-primary pull-left btn-md">
            </div>
            
            <div class="clearfix"></div>
            
        <div class="clearfix"></div>
            
          
          </form>
         
        </div>
    <?php
	break;
	
	
	case "edit":
	$id = $_GET['id'];
	$c = $con->prepare("select * from home_content where id='$id'");
	$c->execute();
	$cr = $c->fetch();
	
	?>

       
    
            <form action="actions/home_content.php" enctype="multipart/form-data" method="post">
         	<input type="hidden" name="action" value="edit_home_content">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        	<div class="form-group col-lg-8">
            	<label>Title</label>
                <!--<input type="text" name="title" value="<?=$cr['title'];?>" class="form-control" required>-->
                <input  name="title" id="conte" class="form-control" value="<?=$cr['title'];?>">
                <br>
            </div>
                        
            <div class="clearfix"></div>
            <div class="form-group col-lg-8">
            	<label>Full content</label>
                <textarea name="descri" id="conte" class="form-control"><?=$cr['descri'];?></textarea>
            </div>
             <div class="form-group col-lg-8">
                
                <br>
                <label>Image</label>
                <input type="file" name="img" class="form-control" required>
                                
            </div>
           
            <div class="clearfix"></div>
            <div class="form-group col-lg-4">
            	<input type="submit" value="Update Content"   class="btn btn-primary pull-left btn-md">
            </div>
            
            
        <div class="clearfix"></div>
            
          
          </form>
    
     
         

    <?php
	break;
	
	
}
?>
</div>
