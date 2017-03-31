<?php
include("connect.php");
?>

<div id="wrapper">
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="adjust-nav">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="#" style="color:#7ea94b; "> </a> </div>
      <span class="logout-spn" style="color:#fff; font-size:12px" >
      	Welcome <?php echo ucwords($_SESSION['iebc_fullnames']); ?>
       | <a href="./?pg=profile" style="color:#fff; font-size:12px">Profile&nbsp;<i class="fa fa-user"></i></a> 
       | <a href="actions/logout.php" style="color:#fff; font-size:12px">Logout&nbsp;<i class="fa fa-sign-out"></i></a> 
       
       </span> </div>
  </div>
  <!-- /. NAV TOP  -->
  <nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
      <ul class="nav" id="main-menu">
                
   
        <li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="home_content") {echo "active-link"; } else {} ?>"> <a href="./?pg=home_content&v=all" ><i class="fa fa-arrow-circle-right "></i>Home Content </a> </li>
        <li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="wherewework") {echo "active-link"; } else {} ?>"> <a href="./?pg=wherewework&v=all" ><i class="fa fa-arrow-circle-right "></i>Where We Work </a> </li>
<li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="aboutus") {echo "active-link"; } else {} ?>"> <a href="./?pg=aboutus&v=all" ><i class="fa fa-arrow-circle-right "></i>About Us </a> </li>
 <li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="blog") {echo "active-link"; } else {} ?>"> <a href="./?pg=blog&v=all" ><i class="fa fa-arrow-circle-right "></i>Blog </a> </li>
 <li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="resources") {echo "active-link"; } else {} ?>"> <a href="./?pg=resources&v=all" ><i class="fa fa-arrow-circle-right "></i>Resources </a> </li>
        
        <?php /*?>

        
        <li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="home_video") {echo "active-link"; } else {} ?>"> <a href="./?pg=home_video&v=all" ><i class="fa fa-arrow-circle-right "></i>Home Video </a> </li>
        <li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="vo_edu") {echo "active-link"; } else {} ?>"> <a href="./?pg=vo_edu&v=all" ><i class="fa fa-arrow-circle-right "></i>Voter Education </a> </li>
        <li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="diaspora") {echo "active-link"; } else {} ?>"> <a href="./?pg=diaspora&v=all" ><i class="fa fa-arrow-circle-right "></i>Diaspora </a> </li>
        <li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="prisons") {echo "active-link"; } else {} ?>"> <a href="./?pg=prisons&v=all" ><i class="fa fa-arrow-circle-right "></i>Prisons</a> </li>
        <!--<li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="settings") {echo "active-link"; } else {} ?>"> <a href="./?pg=settings&v=type" ><i class="fa fa-arrow-circle-right "></i>Settings </a> </li>-->
        <li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="news") {echo "active-link"; } else {} ?>"> <a href="./?pg=news&v=all" ><i class="fa fa-arrow-circle-right "></i>News </a> </li>

        <li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="blog") {echo "active-link"; } else {} ?>"> <a href="./?pg=blog&v=all" ><i class="fa fa-arrow-circle-right "></i>Blog </a> </li>
        <li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="resources") {echo "active-link"; } else {} ?>"> <a href="./?pg=resources&v=all" ><i class="fa fa-arrow-circle-right "></i>Resources </a> </li>
        <!-- 
        <li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="blog") {echo "active-link"; } else {} ?>"> <a href="./?pg=blog&v=all" ><i class="fa fa-arrow-circle-right "></i>Blog </a> </li>
        -->
        <li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="faq") {echo "active-link"; } else {} ?>"> <a href="./?pg=faq&v=all" ><i class="fa fa-arrow-circle-right "></i>FAQs </a> </li>
        
        <li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="tenders") {echo "active-link"; } else {} ?>"> <a href="./?pg=tenders&v=all" ><i class="fa fa-arrow-circle-right "></i>Tenders </a> </li>
        <li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="gallery") {echo "active-link"; } else {} ?>"> <a href="./?pg=gallery&v=all" ><i class="fa fa-arrow-circle-right "></i>Gallery </a> </li>
        <li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="aspirant") {echo "active-link"; } else {} ?>"> <a href="./?pg=aspirant&v=all" ><i class="fa fa-arrow-circle-right "></i>Aspirant Requirements </a> </li><li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="commissioners") {echo "active-link"; } else {} ?>"> <a href="./?pg=commissioners&v=all" ><i class="fa fa-arrow-circle-right "></i>Commissioners </a> </li>
        <!--
        <li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="locations") {echo "active-link"; } else {} ?>"> <a href="./?pg=locations&v=county" ><i class="fa fa-arrow-circle-right "></i>Locations </a> </li>
        <li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="candidates") {echo "active-link"; } else {} ?>"> <a href="./?pg=candidates&v=new" ><i class="fa fa-arrow-circle-right "></i>Candidates </a> </li>
       <!-- <li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="parties") {echo "active-link"; } else {} ?>"> <a href="./?pg=parties&v=all" ><i class="fa fa-arrow-circle-right "></i>Political parties </a> </li>
        <li class="<?php if(isset($_GET['pg']) && $_GET['pg']=="elections") {echo "active-link"; } else {} ?>"> <a href="./?pg=elections&v=all" ><i class="fa fa-arrow-circle-right "></i>Elections </a> </li>
        -->

        <?php */
        ?>

       </ul>
      </ul>
    </div>
  </nav>
  <!-- /. NAV SIDE  -->
  <div id="page-wrapper" >
    <div id="page-inner">
      <div class="row">
        <div class="col-md-12">
          <?php
			if(isset($_GET['pg']))
			{
				$pg = $_GET['pg'];
				switch($pg)
				{
					
					
          case "home_content":
						include("pages/home_content.php");
					break;

          case "wherewework":
            include("pages/wherewework.php");
          break;

          case "aboutus":
            include("pages/aboutus.php");
          break;
          case "blog":
            include("pages/blog.php");
          break;
          case "resources":
         
            include("pages/kiwash_resources.php");
          break;
/*
          case "vo_edu":
						include("pages/vo_edu.php");
					break;

          case "home_video":
						include("pages/home_video.php");
					break;

          case "diaspora":
						include("pages/diaspora.php");
					break;

          case "prisons":
						include("pages/prisons.php");
					break;
					
					
					
					case "faq":
						include("pages/faq.php");
					break;
          
          case "commissioners":
						include("pages/commissioners.php");
					break;

          case "aspirant":
						include("pages/aspirant.php");
					break;

					case "jobs":
						include("pages/jobs.php");
					break;
					
					case "locations":
						include("pages/locations.php");
					break;
					
					
					case "tenders":
						include("pages/tenders.php");
					break;
					case "gallery":
						include("pages/gallery.php");
					break;
					
					case "candidates":
						include("pages/candidates.php");
					break;
					*/
					
					
				}
			}
			else
			{
				?>
				 
				<div class="row">
					<div class="col-md-12">
					<h2>Welcome to admin dashboard - Kiwash admin</h2>
					<?php 
					
					//include("pages/stats.php"); ?>
					</div>
					
					
				</div>
				<?php
			}
		?>
        </div>
      </div>
   
      <!-- /. ROW  -->
     
      <!-- /. ROW  -->
    </div>

    <!-- /. PAGE INNER  -->
  </div>
  <!-- /. PAGE WRAPPER  -->
</div>
<div class="footer">
  <div class="row">
    <div class="col-lg-12 text-center" > &copy; <?php echo date('Y'); ?> Kiwash | Powered by: <a href="http://lesane.co.ke" style="color:#fff;"  target="_blank"> Lesane LTD.</a> </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
						   
      $(".w_block").change( function(){

        $m=$('.w_block').val();

        if($m==='Western Kenya')
        {
          $(".w_region").html('<select name="region" required="true" class="form-control"> <option value="">Select</option> <option value="Busia">Busia</option><option value="Kakamega">Kakamega</option> <option value="Kisumu">Kisumu</option><option value="Migori">Migori</option> <option value="Nyamira">Nyamira</option><option value="Siaya">Siaya</option>   </select>'); 
        }
        else if ($m==="Eastern Kenya") 
        {
          $(".w_region").html('<select name="region" required="true" class="form-control"> <option value="">Select</option> <option value="Kitui">Kitui</option><option value="Makueni">Makueni</option> <option value="Nairobi">Nairobi</option>  </select>');
        }
        else
        {
          $(".w_region").html('');
        }



      }); 

   $('#edits').on('show.bs.modal', function (e) {
	  $(".modal-title").css('color', 'black', 'important');
	  $(".modal-title").css('font-weight', '600', 'important');
	  
      $id = $(e.relatedTarget).attr('accesskey');
      
	  $action = $(e.relatedTarget).attr('name');
    // Editing etc
		if($action==="edit_art")
		{
			$(this).find('.modal-dialog').addClass(".modal-lg");
      // $(this).find('.modal-body p').html($message);
      $title = $(e.relatedTarget).attr('data-title');
      $(this).find('.modal-title').text($title);
      //$("#loading").show();
      $.post('pages/edits.php',{ id:$id, action:$action},function(data)
        {
				$('#edit_modal_msg').html(data);
				$("#loading").hide();
			});
      // Editing pos
		}else if($action==="edit_position"){
      	$(this).find('.modal-dialog').addClass(".modal-lg");
         //$(this).find('.modal-body p').html($message);
        $title = $(e.relatedTarget).attr('data-title');
        $(this).find('.modal-title').text($title);
      //$("#loading").show();
      $.post('pages/edits.php',{ id:$id, action:$action},function(data)
        {
          $('#edit_modal_msg').html(data);
          $("#loading").hide();
        });
    }
    //end of editing pos
		else
		{
			$(this).find('.modal-dialog').addClass(".modal-md");	
		
      // $(this).find('.modal-body p').html($message);
      $title = $(e.relatedTarget).attr('data-title');
      $(this).find('.modal-title').text($title);
		//$("#loading").show();
		$.post('pages/edits.php',{ id:$id, action:$action},function(data)
			{
				$('#edit_modal_msg').html(data);
				$("#loading").hide();
			});
    }
  });

  
});
</script>
<script type="text/javascript" src="default_assets/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    /*selector: "textarea#conte",*/
	selector: "textarea#conte",
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

<?php require_once('actions/modals.php'); ?>
