<?php
$pg = $_GET['pg'];
$v = isset($_GET['v']) ? $_GET['v'] : '';
?>

<h2>Resources </h2>
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
         
         <th>Type</th>
         <th>Title</th>
         <th>Content</th>
         <th>Resource File</th>
         <th>Action</th>
         </tr>
        </thead>
        <?php
			$n=1;
			$u= $con->prepare("SELECT * from tblresources order by id desc");
			$u->execute();
			while($ur = $u->fetch(PDO::FETCH_ASSOC)):
			?>
            <tr>
             <td><?php echo $n++; ?></td>
             
             <td><?php echo $ur['res_type']; ?></td>
             <td><?php echo $ur['title']; ?></td>
             <td><?php echo $ur['descri']; ?></td>
             <td>
             <?php

             $fileext=strtolower($ur['file_type']);

                if($fileext==='png')
                {
                    $cp='png';
                }
                if($fileext==='jpg')
                {
                    $cp='jpg';
                }
                if($fileext==='xls')
                {
                    $cp='xls';
                }
                if($fileext==='xlsx')
                {
                    $cp='xlsx';
                }
                if($fileext==='pdf')
                {
                    $cp='pdf';
                }
                if($fileext==='doc')
                {
                    $cp='doc';
                }
                if($fileext==='docs')
                {
                    $cp='docs';
                }

             ?>

             <img src="uploads/resources/<?php echo $ur['homeimg']; ?>" class="img-responsive" style="height: 100px;width:100px">



             </td>
             <td>
              <a href="./?pg=resources&v=edit&id=<?php echo $ur['id']; ?>">
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
         <form action="actions/kiwash_resources.php" enctype="multipart/form-data" method="post">
         	<input type="hidden" name="action" value="new_home_content">
            <div class="form-group col-lg-8">
                <label>Resources</label>
                 <select name="resources" required="true" class="form-control ">
                    <option value="">Select</option> 
                    <option value="Knowledge Center">Knowledge Center</option> 
                    <option value="Grants">Grants</option> 
                    <option value="Opportunities">Opportunities</option> 

                 </select> 
                <br>

            </div>
       
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
                <label>Resource File</label>
                <input type="file" name="img" class="form-control">
                                
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
	$c = $con->prepare("SELECT * from tblresources where id='$id'");
	$c->execute();
	$cr = $c->fetch();
	
	?>

       
    
            <form action="actions/kiwash_resources.php" enctype="multipart/form-data" method="post">
         	<input type="hidden" name="action" value="edit_home_content">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group col-lg-8">
                <label>Resources</label>
            
                <input  name="title" id="conte" class="form-control" value="<?=$cr['res_type'];?>" disabled>
                <br>
            </div>
           
        	<div class="form-group col-lg-8">
            	<label>Title</label>
                
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
                <label>Resource File</label>
                <input type="file" name="img" class="form-control">
                                
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
