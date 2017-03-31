<?php
include("../connect.php");
include("../../site.php");
$action = $_POST['action'];

switch($action)
{
	
	case "edit_blog_pic_descri":
	$id = $_POST['id'];
	$e = $con->prepare("select descri from blog_pics where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
     <div class="row">
         <form  method="post" action="actions/blog_posts.php">
         	<input type="hidden" name="action" value="edit_blog_pic_descri">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        	<div class="form-group col-lg-12">
            	<label>Description</label>
                <input type="text" name="descri" value="<?php echo $er['descri']; ?>" class="form-control">
            </div>
            
          
            <div class="clearfix"></div>
            <div class="form-group col-lg-3">
            	
                <button type="submit" class="btn-primary btn"  id="edit_pa_btn">Update&nbsp;<i class="fa fa-arrow-right"></i></button>
            </div>
           
            
          </form>
          <?php
	
	break;
	
	case "edit_gallery_pic_descri":
	$id = $_POST['id'];
	$e = $con->prepare("select descri, code from gallery_pics where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
     <div class="row">
         <form  method="post" action="actions/gallery.php">
         	<input type="hidden" name="action" value="edit_gallery_pic_descri">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="code" value="<?php echo $er['code']; ?>">
        	<div class="form-group col-lg-12">
            	<label>Description</label>
                <input type="text" name="descri" value="<?php echo $er['descri']; ?>" class="form-control">
            </div>
            
          
            <div class="clearfix"></div>
            <div class="form-group col-lg-3">
            	
                <button type="submit" class="btn-primary btn"  id="edit_pa_btn">Update&nbsp;<i class="fa fa-arrow-right"></i></button>
            </div>
           
            
          </form>
          <?php
	
	break;
	
	case "delete_blog":
	$id = $_POST['id'];
	$e = $con->prepare("select * from blog where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
    Are you sure you want to delete <b><?php echo $er['title']; ?></b>?<br>
    <form action="actions/blog_posts.php" method="post">
    <input type="hidden" name="action" value="delete_post">
     <input type="hidden" value="<?php echo $id; ?>" name="id">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;
	
	case "delete_comment":
	$id = $_POST['id'];
	
	?>
    Are you sure you want to delete the comment?<br>
    <form action="actions/blog_posts.php" method="post">
    <input type="hidden" name="action" value="delete_comment">
     <input type="hidden" value="<?php echo $id; ?>" name="id">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;
	case "approve_comment":
	$id = $_POST['id'];
	
	?>
    Are you sure you want to approve the comment?<br>
    <form action="actions/blog_posts.php" method="post">
    <input type="hidden" name="action" value="approve_comment">
     <input type="hidden" value="<?php echo $id; ?>" name="id">
    <button type="submit" class="btn btn-success btn-sm">Yes</button>
    </form>
    <?php
	break;
	
	case "delete_blog_pic":
	$id = $_POST['id'];
	$e = $con->prepare("select * from blog_posts where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
    Are you sure you want to delete this image?<br>
    <form action="actions/blog_posts.php" method="post">
    <input type="hidden" name="action" value="delete_blog_pic">
     <input type="hidden" value="<?php echo $id; ?>" name="id">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;
	
	case "delete_gallery_pic":
	$id = $_POST['id'];
	$e = $con->prepare("select * from gallery_pics where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
    Are you sure you want to delete this image?<br>
    <form action="actions/gallery.php" method="post">
    <input type="hidden" name="action" value="delete_gallery_pic">
     <input type="hidden" value="<?php echo $id; ?>" name="id">
      <input type="hidden" value="<?php echo $er['picloc']; ?>" name="picurl">
       <input type="hidden" value="<?php echo $er['code']; ?>" name="code">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;
	
	
	case "delete_album":
	$id = $_POST['id'];
	$e = $con->prepare("select * from gallery where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
    Are you sure you want to delete <b><?php echo $er['title']; ?></b>?<br>
    <form action="actions/gallery.php" method="post">
    <input type="hidden" name="action" value="delete_album">
     <input type="hidden" value="<?php echo $er['code']; ?>" name="id">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;
	
	case "edit_resource_type":
	$id = $_POST['id'];
	$e = $con->prepare("select * from resources where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
     <div class="row">
         <form  method="post" action="actions/resources.php">
         	<input type="hidden" name="action" value="edit_resource_type">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        	<div class="form-group col-lg-12">
            	<label>Name</label>
                <input type="text" name="name" value="<?php echo $er['name']; ?>" class="form-control">
            </div>
            
          
            <div class="clearfix"></div>
            <div class="form-group col-lg-3">
            	
                <button type="submit" class="btn-primary btn"  id="edit_pa_btn">Update&nbsp;<i class="fa fa-arrow-right"></i></button>
            </div>
           
            
          </form>
          <?php
	
	break;
	
	case "edit_region":
	$id = $_POST['id'];
	$e = $con->prepare("select * from regions where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
     <div class="row">
         <form  method="post" action="actions/locations.php">
         	<input type="hidden" name="action" value="edit_region">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        	<div class="form-group col-lg-6">
            	<label>Name</label>
                <input type="text" name="name" value="<?php echo $er['name']; ?>" class="form-control">
            </div>
            
           
            
          
            <div class="clearfix"></div>
            <div class="form-group col-lg-3">
            	
                <button type="submit" class="btn-primary btn"  id="edit_pa_btn">Update&nbsp;<i class="fa fa-arrow-right"></i></button>
            </div>
           
            
          </form>
          <?php
	
	break;
	
	case "edit_const":
	$id = $_POST['id'];
	$e = $con->prepare("select * from constituencies where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
     <div class="row">
         <form  method="post" action="actions/locations.php">
         	<input type="hidden" name="action" value="edit_const">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        	<div class="form-group col-lg-6">
            	<label>Name</label>
                <input type="text" name="const" value="<?php echo $er['CONSTITUENCY']; ?>" class="form-control">
            </div>
            
            <div class="form-group col-lg-6">
            	<label>County Code</label>
                <input type="text" name="cid" value="<?php echo $er['COUNTY_CODE']; ?>" class="form-control">
            </div>
            
          
            <div class="clearfix"></div>
            <div class="form-group col-lg-3">
            	
                <button type="submit" class="btn-primary btn"  id="edit_pa_btn">Update&nbsp;<i class="fa fa-arrow-right"></i></button>
            </div>
           
            
          </form>
          <?php
	
	break;
	
	case "edit_faq":
	$rand= rand(12123,90900);
	$id = $_POST['id'];
	$e = $con->prepare("select * from faq where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
     <div class="row">
         <form  method="post" action="actions/faq.php">
         	<input type="hidden" name="action" value="edit_faq">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        	<div class="form-group col-lg-12">
            	<label>Question</label>
                <input type="text" name="question" value="<?php echo $er['question']; ?>" class="form-control">
            </div>
            
            <div class="form-group col-lg-12">
            	<label>Answer</label>
                <textarea  name="answer" id="conte<?=$rand;?>" class="form-control"><?php echo $er['answer']; ?></textarea>
            </div>
            
          
            <div class="clearfix"></div>
            <div class="form-group col-lg-3">
            	
                <button type="submit" class="btn-primary btn"  id="edit_pa_btn">Update&nbsp;<i class="fa fa-arrow-right"></i></button>
            </div>
           
            
          </form>
          <script type="text/javascript">
tinymce.init({
    /*selector: "textarea#conte",*/
	selector: "textarea#conte<?=$rand;?>",
    theme: "modern",
	setup: function (editor) {
        editor.on('change', function () {
            editor.save();
        });
    },
    plugins: [
        " autolink lists link  charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
	/*
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",*/
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>
          <?php
	
	break;
	
	case "edit_job":
	$rand= rand(12123,90900);
	$id = $_POST['id'];
	$e = $con->prepare("select * from jobs where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
     <div class="row">
         <form  method="post" action="actions/jobs.php">
         	<input type="hidden" name="action" value="edit_job">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        	<div class="form-group col-lg-6">
            	<label>Title</label>
                <input type="text" name="title" value="<?php echo $er['title']; ?>" class="form-control">
            </div>
            <div class="form-group col-lg-6">
            	<label>Deadline</label>
                <input type="text" name="deadline" id="future_date" value="<?php echo $er['deadline']; ?>" class="form-control">
            </div>
            
            <div class="form-group col-lg-12">
            	<label>Job description</label>
                <textarea  name="descri" id="conte<?=$rand;?>" class="form-control"><?php echo $er['descri']; ?></textarea>
            </div>
            
          
            <div class="clearfix"></div>
            <div class="form-group col-lg-3">
            	
                <button type="submit" class="btn-primary btn"  id="edit_pa_btn">Update&nbsp;<i class="fa fa-arrow-right"></i></button>
            </div>
           
            
          </form>
          <script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	
	
	
	$('#future_date').datepicker({
		
		minDate:1,
		dateFormat:'yy-mm-dd'
	
	});
	
	
	
});

</script>
          <script type="text/javascript">
tinymce.init({
    /*selector: "textarea#conte",*/
	selector: "textarea#conte<?=$rand;?>",
    theme: "modern",
	setup: function (editor) {
        editor.on('change', function () {
            editor.save();
        });
    },
    plugins: [
        " autolink lists link  charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
	/*
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",*/
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>
          <?php
	
	break;
    
    //************************************ Edit Position***********************************
    case "edit_position":
    $rand= rand(12123,90900);

    $id = $_REQUEST['id'];
	$n = $con->prepare("select * FROM aspirant where id='$id'");
	$n->execute();
	$nr = $n->fetch();
	?>
    	<div class="row">
         <form action="actions/aspirant.php" method="post">
            <input type="hidden" value="<?php echo $nr['id']; ?>" name="id">
            <input type="hidden" value="<?php echo $nr['position']; ?>" name="position">
         	<input type="hidden" name="action" value="edit_position">
        	<div class="form-group col-lg-12">
            	<label>Position</label>
                        <?php
                        $position =$nr['position'];
						$c = $con->prepare("SELECT `pos_code`,`pos_name` FROM `aspirant_positions` WHERE pos_code= ?");
                        $c->bindParam(1, $position);
						$c->execute();
						$cr = $c->fetch(PDO::FETCH_ASSOC);
						?>
						
                <input type="text" name="position" value="<?php echo $cr['pos_name']; ?>" class="form-control" disabled>
            </div>
            <div class="form-group col-lg-12">
            	<label>Qualification</label>
                <textarea name="qualification" id="conte<?=$rand;?>"  class="form-control"><?php echo $nr['qualification']; ?>" </textarea>
            </div>
            
            <div class="form-group col-lg-12">
            	<label>Requirements</label>
                <textarea name="requirement" id="conte<?=$rand;?>"  class="form-control"><?php echo $nr['requirement']; ?></textarea>
            </div>
			<div class="form-group col-lg-12">
            	<label>Additional requirements for Independent Candidates</label>
                <textarea name="addition_reqs" id="conte<?=$rand;?>"  class="form-control"><?php echo $nr['addition_reqs']; ?></textarea>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-3">
            	
                <button type="submit" class="btn-primary btn"  id="edit_pa_btn">Update&nbsp;<i class="fa fa-arrow-right"></i></button>
            </div>
            
            <div class="form-group col-lg-4" id="msg">
            
            </div>
            
          </form>
          <script type="text/javascript">
            tinymce.init({
                /*selector: "textarea#conte",*/
                selector: "textarea#conte<?=$rand;?>",
                theme: "modern",
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                },
                plugins: [
                    " autolink lists link  charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern"
                ],
                /*
                toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                toolbar2: "print preview media | forecolor backcolor emoticons",*/
                image_advtab: true,
                templates: [
                    {title: 'Test template 1', content: 'Test 1'},
                    {title: 'Test template 2', content: 'Test 2'}
                ]
            });
        </script>
        </div>
        <?php
        break;
            //***************************** End of position Edit************************************
	
	case "delete_job":
	$id = $_POST['id'];
	$e = $con->prepare("select * from jobs where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
    Are you sure you want to delete <b><?php echo $er['title']; ?></b>?<br>
    <form action="actions/jobs.php" method="post">
    <input type="hidden" name="action" value="delete_job">
     <input type="hidden" value="<?php echo $id; ?>" name="id">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;
	case "remove_const":
	$id = $_POST['id'];
	$e = $con->prepare("select constituencies.CONSTITUENCY from constituencies where CONST_CODE='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
    Are you sure you want to remove <b><?php echo $er['CONSTITUENCY']; ?></b>?<br>
    <form action="actions/locations.php" method="post">
    <input type="hidden" name="action" value="remove_const">
     <input type="hidden" value="<?php echo $id; ?>" name="id">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;

    //***********************************Delete Position******************
    case "delete_position":
        $id = $_POST['id'];
        $e = $con->prepare("SELECT aspirant.*,aspirant_positions.pos_name  FROM `aspirant`,aspirant_positions WHERE aspirant_positions.pos_code=aspirant.position and aspirant.id='$id'");
        $e->execute();
        $er = $e->fetch();
        ?>
        Are you sure you want to delete <b><?php echo $er['pos_name']; ?></b>?<br>
        <form action="actions/aspirant.php" method="post">
        <input type="hidden" name="action" value="delete_position">
        <input type="hidden" value="<?php echo $id; ?>" name="id">
        <button type="submit" class="btn btn-primary btn-sm">Yes</button>
        </form>
        
        <?php
	break;
    //***********************************End position Delete************** 
	
	case "delete_region":
	$id = $_POST['id'];
	$e = $con->prepare("select * from regions where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
    Are you sure you want to delete <b><?php echo $er['name']; ?></b>?<br>
    <form action="actions/locations.php" method="post">
    <input type="hidden" name="action" value="delete_region">
     <input type="hidden" value="<?php echo $id; ?>" name="id">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;
	
	case "delete_resource_type":
	$id = $_POST['id'];
	$e = $con->prepare("select * from resources where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
    Are you sure you want to delete <b><?php echo $er['name']; ?></b>?<br>
    <form action="actions/resources.php" method="post">
    <input type="hidden" name="action" value="delete_resource_type">
     <input type="hidden" value="<?php echo $id; ?>" name="id">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;
	
	case "delete_faq":
	$id = $_POST['id'];
	$e = $con->prepare("select * from faq where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
    Are you sure you want to delete <b><?php echo $er['question']; ?></b>?<br>
    <form action="actions/faq.php" method="post">
    <input type="hidden" name="action" value="delete_faq">
     <input type="hidden" value="<?php echo $id; ?>" name="id">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;
	
	
	case "edit_rf":
	$id = $_POST['id'];
	$e = $con->prepare("select * from resource_files where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
     <div class="row">
        <form action="actions/resources.php" method="post" enctype="multipart/form-data">
         	<input type="hidden" name="action" value="edit_resource_file">
            <input type="hidden" name="id" value="<?=$id;?>">
        	<div class="form-group col-lg-6">
            	<label>Title</label>
                <input type="text" name="title" value="<?=$er['title'];?>"  class="form-control" required>
                <label>Resource type</label>
                <select name="r_type"  class="form-control" required>
                 <option value="">-Choose-</option>
                 <?php
				 $r = $con->prepare("select name, id from resources order by id desc");
				 $r->execute();
				 while($rr = $r->fetch(PDO::FETCH_ASSOC)):
				 ?>
                 <option value="<?php echo $rr['id']; ?>" <?php if($rr['id']==$er['resource_type']) {echo "selected=selected";} ?>><?php echo $rr['name']; ?></option>
                 <?php
				 endwhile;
				 ?>
                </select>
                <label>Change File</label>
                <input type="file" name="myfile"  class="form-control">
            </div>
            
            <div class="form-group col-lg-6">
            	<label>Resoruce file desription</label>
                <textarea name="descri" rows="7"class="form-control"><?=$er['file_descri'];?></textarea>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-4">
            	
            </div>
            
            
            
            <div class="clearfix"></div>
            <div class="form-group col-lg-6">
            	
                <button type="submit" class="btn-primary btn"  >Update&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
            </div>
           
            <div class="form-group col-lg-4" id="usermsg">
            
            </div>
           
          </form>
        </div>
          <?php
	
	break;
	
	
	
	case "delete_rf":
	$id = $_POST['id'];
	$e = $con->prepare("select title, file_loc from resource_files where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
    Are you sure you want to delete <b><?php echo $er['title']; ?></b>?<br>
    <form action="actions/resources.php" method="post">
    <input type="hidden" name="action" value="delete_resource_file">
     <input type="hidden" value="<?php echo $id; ?>" name="id">
     <input type="hidden" value="<?php echo $er['file_loc']; ?>" name="fileurl">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;
	
	
	case "edit_e":
	$id = $_POST['id'];
	$e = $con->prepare("select name from elections where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
     <div class="row">
         <form  method="post" action="actions/elections.php">
         	<input type="hidden" name="action" value="edit_e">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        	<div class="form-group col-lg-12">
            	<label>Name</label>
                <input type="text" name="name" value="<?php echo $er['name']; ?>" class="form-control">
            </div>
            
          
            <div class="clearfix"></div>
            <div class="form-group col-lg-3">
            	
                <button type="submit" class="btn-primary btn"  id="edit_pa_btn">Update&nbsp;<i class="fa fa-arrow-right"></i></button>
            </div>
           
            
          </form>
          <?php
	
	break;
	
	
	
	case "delete_e":
	$id = $_POST['id'];
	$e = $con->prepare("select * from elections where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
    Are you sure you want to delete <b><?php echo $er['name']; ?></b>?<br>
    <form action="actions/elections.php" method="post">
    <input type="hidden" name="action" value="delete_e">
    
     <input type="hidden" value="<?php echo $id; ?>" name="id">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;
	
	case "delete_news":
	$id = $_POST['id'];
	$e = $con->prepare("select title, cover_pic from news where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
    Are you sure you want to delete <b><?php echo $er['title']; ?></b>?<br>
    <form action="actions/news.php" method="post">
    <input type="hidden" name="action" value="delete_news">
    <input type="hidden" name="picurl" value="<?=$er['cover_pic']; ?>">
     <input type="hidden" value="<?php echo $id; ?>" name="id">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;

    //*********************** Deleting Home Image***************************
    case "delete_slider":
	$id = $_POST['id'];
	$e = $con->prepare("select title, home_img from slider where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
    Are you sure you want to delete <b><?php echo $er['title']; ?></b>?<br>
    <form action="actions/slider.php" method="post">
    <input type="hidden" name="action" value="delete_slider">
    <input type="hidden" name="picurl" value="<?=$er['cover_pic']; ?>">
     <input type="hidden" value="<?php echo $id; ?>" name="id">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;
    //*********************** Deleting Voter Education Details***************************
    case "delete_vo_edu":
	$id = $_POST['id'];
	$e = $con->prepare("SELECT title, descri FROM voter_education where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
    Are you sure you want to delete <b><?php echo $er['title']; ?></b>?<br>
    <form action="actions/vo_edu.php" method="post">
    <input type="hidden" name="action" value="delete_vo_edu">
    <input type="hidden" value="<?php echo $id; ?>" name="id">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;

     //*********************** Deleting Voter Home Content Details***************************
    case "delete_home_content":
	$id = $_POST['id'];
	$e = $con->prepare("SELECT title, descri FROM home_content where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
    Are you sure you want to delete <b><?php echo $er['title']; ?></b>?<br>
    <form action="actions/home_content.php" method="post">
    <input type="hidden" name="action" value="delete_home_content">
    <input type="hidden" value="<?php echo $id; ?>" name="id">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;

     //*********************** Deleting home_video Details***************************
    case "delete_home_video":
	$id = $_POST['id'];
	$e = $con->prepare("SELECT title, descri FROM home_video where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
    Are you sure you want to delete <b><?php echo $er['title']; ?></b>?<br>
    <form action="actions/home_video.php" method="post">
    <input type="hidden" name="action" value="delete_home_video">
    <input type="hidden" value="<?php echo $id; ?>" name="id">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;

    //*********************** Deleting Diaspora Content***************************
    case "delete_diaspora":
	$id = $_POST['id'];
	$e = $con->prepare("SELECT `id`, `title`, `content` FROM `diaspora` where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
    Are you sure you want to delete <b><?php echo $er['title']; ?></b>?<br>
    <form action="actions/diaspora.php" method="post">
    <input type="hidden" name="action" value="delete_diaspora">
    <input type="hidden" value="<?php echo $id; ?>" name="id">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;

     //*********************** Deleting Commisioner***************************
    case "delete_commissioner":
	$id = $_POST['id'];
	$e = $con->prepare("SELECT `id`, `level`, `fname`, `lname`, `surname`, `bio`, `img` FROM `commission` where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
    Are you sure you want to delete <b><?php echo $er['level']; ?> <?php echo $er['surname']; ?></b>?<br>
    <form action="actions/commissioners.php" method="post">
    <input type="hidden" name="action" value="delete_commissioner">
    <input type="hidden" value="<?php echo $id; ?>" name="id">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;

         //*********************** Deleting Prison Content***************************
    case "delete_prisons":
	$id = $_POST['id'];
	$e = $con->prepare("SELECT `id`, `title`, `content` FROM `prisons` where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
    Are you sure you want to delete <b><?php echo $er['title']; ?></b>?<br>
    <form action="actions/prisons.php" method="post">
    <input type="hidden" name="action" value="delete_prisons">
    <input type="hidden" value="<?php echo $id; ?>" name="id">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;
	
	case "edit_tender":
	$id = $_POST['id'];
	$e = $con->prepare("select * from tenders where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	
	$('#first_dt').DataTable();
	
	
	$('#future_date').datepicker({
		
		minDate:1,
		dateFormat:'yy-mm-dd'
	
	});
	
	
	
	
});

</script>
    <form action="actions/tenders.php" class="row" method="post" enctype="multipart/form-data">
         	<input type="hidden" name="action" value="edit_tender">
            <input type="hidden" name="id" value="<?=$id;?>">
        	<div class="form-group col-lg-12">
            <label>Title</label>
                <input type="text" name="title" value="<?=$er['title'];?>"  class="form-control" required>
            </div>
            <div class="clearfix"></div>
            
           
             <div class="col-lg-4">
            	<label>Tender Number</label>
                <input type="text" name="tno"  value="<?=$er['tender_no'];?>"  class="form-control" required>
            </div>
            <div class="col-lg-4">
                <label>Deadline date</label>
                <input type="text" name="deadline"  value="<?=$er['deadline'];?>" id="future_date"  class="form-control" required>
             </div>
             <div class="col-lg-4">
                <label>File</label>
                <input type="file" name="myfile"  class="form-control">
            </div>
           
            <div class="clearfix"></div>
            <div class="form-group col-lg-2">
            	<br>
                <button type="submit" class="btn-primary btn"  >Update&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
            </div>
           
            <div class="form-group col-lg-4" id="usermsg">
            
            </div>
           
          </form>
 
    
    <?php
	break;
	
	case "delete_tender":
	$id = $_POST['id'];
	$e = $con->prepare("select title, tender_file from tenders where id='$id'");
	$e->execute();
	$er = $e->fetch();
	?>
    Are you sure you want to delete <b><?php echo $er['title']; ?></b>?<br>
    <form action="actions/tenders.php" method="post">
    <input type="hidden" name="action" value="delete_tender">
    <input type="hidden" name="fileurl" value="<?=$er['tender_file']; ?>">
     <input type="hidden" value="<?php echo $id; ?>" name="id">
    <button type="submit" class="btn btn-primary btn-sm">Yes</button>
    </form>
    <?php
	break;
	
	
	

}	

?>

