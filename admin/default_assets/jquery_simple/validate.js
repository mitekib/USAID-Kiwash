// JavaScript Document
$(function(){
		   
		  
			
	 $("#login_err").css('display', 'none', 'important');
	 

     $("#loginfxn").click(function(){   

			

          username=$("#inputEmail").val();

          password=$("#inputPassword").val();
		
	
          $.ajax({

           type: "POST",

           url: "php/clogin.php",

            data: "name="+username+"&pwd="+password,

           success: function(html){    

            if(html=='true')    {

             //$("#add_err").html("right username or password");

			 //$("#addlogin_err").css('display', 'inline', 'important');

            //$("#addlogin_err").html("<img src='img/tick.png' /> Loading...");

             window.location="./";

            }

            else    {

            $("#login_err").css('display', 'inline', 'important');

             $("#login_err").html("<span class='clientlogin_err'><i class='fa fa-exclamation'></i> Wrong username or password</span><br>");

            }

           },

           beforeSend:function()

           {

            $("#login_err").css('display', 'inline', 'important');

            $("#login_err").html("<i class='fa fa-circle-o-notch fa-spin'></i> Loading...<br>");

           }

          });

        return false;

  	  });
		   
			
		$("#new_s_a_err").css('display', 'none', 'important');	
		
		$("#new_s_a").click(function(){   
          fname=$("#fname").val();
		  lname=$("#lname").val();
		  nationality=$("#nationality").val();
		  email=$("#email").val();
		  national_id=$("#national_id").val();
		  tel=$("#tel").val();
	
			
          $.ajax({

           type: "POST",

           url: "php/adds.php?action=new_school_admin",

            data: "fname="+fname+"&lname="+lname+"&nationality="+nationality+"&email="+email+"&tel="+tel+"&nid="+national_id,

           success: function(html){    

            if(html=='true')    {
			/*
             $("#fname").val('');
			 $("#lname").val('');
			 $("#tel").val('');
			 $("#nationality").val('');
			 $("#national_id").val('');
			 $("#email").val('');
			 */

			 $("#new_s_a_err").css('display', 'inline', 'important');

				$("#new_s_a_err").html("<i class='fa fa-check'></i> Suceess<br>");
				$("#newschooladminform").css('display', 'none', 'important');
				
		        $("#new_s_a_err").html("Success!<br><br><i class='fa fa-check-circle fa-5x'></i><br> <br><a href='php/finish.php'> <button  class='btn btn-default btn-lg'>Click here to finish</button></a>");

             //window.location="./";

            }
			 if(html=='empty')    {

             

			 $("#new_s_a_err").css('display', 'inline', 'important');

            $("#new_s_a_err").html("<i class='fa fa-exclamation'></i> Error adding admin, Fill all fields<br>");

             //window.location="./";

            }

             if(html=='dub')     {

            $("#new_s_a_err").css('display', 'inline', 'important');

             $("#new_s_a_err").html("<i class='fa fa-exclamation'></i> Error adding admin, email address already in use<br>");

            }

           },

           beforeSend:function()

           {

            $("#new_s_a_err").css('display', 'inline', 'important');

            $("#new_s_a_err").html("<i class='fa fa-circle-o-notch fa-spin'></i> Loading...<br>");

           }

          });

        return false;

  	  });
		
		
		$("#new_class_err").css('display', 'none', 'important');	
		
		$("#addclassfxn").click(function(){   
          cname=$("#cname").val();
		  cstream=$("#cstream").val();
		  schoolid=$("#schoolid").val();
		  cap=$("#cap").val();
		
			
          $.ajax({

           type: "POST",

           url: "php/adds.php?action=new_class",

           data: "cname="+cname+"&cstream="+cstream+"&schoolid="+schoolid+"&cap="+cap,

           success: function(html){    

            if(html=='true')    {

             $("#cname").val('');
			 $("#cstream").val('');
			 $("#schoolid").val('');
			 $("#cap").val('');
			

			 //$("#new_class_err").css('display', 'inline', 'important');

           // $("#new_class_err").html("<i class='fa fa-check'></i> Suceess");

             window.location="./?page=classes";

            }
			 if(html=='empty')    {

             

			 $("#new_class_err").css('display', 'inline', 'important');

            $("#new_class_err").html("<i class='fa fa-exclamation'></i> Error adding class, Fill all fields<br>");

             //window.location="./";

            }

             if(html=='dub')     {

            $("#new_class_err").css('display', 'inline', 'important');

             $("#new_class_err").html("<i class='fa fa-exclamation'></i> Error adding class, dublicate name found<br>");

            }

           },

           beforeSend:function()

           {

            $("#new_class_err").css('display', 'inline', 'important');

            $("#new_class_err").html("<i class='fa fa-circle-o-notch fa-spin'></i> Loading...<br>");

           }

          });

        return false;

  	  });
	  
	  //creating a class
	  $("#new_class_err").css('display', 'none', 'important');	
		
		$("#addclassfxn").click(function(){   
          cname=$("#sub_name").val();
		 
		  schoolid=$("#schoolid").val();
		  
		
			
          $.ajax({

           type: "POST",

           url: "php/adds.php?action=newsubject",

           data: "sub_name="+cname+"&schoolid="+schoolid,

           success: function(html){    

            if(html=='true')    {

             $("#sub_name").val('');
			 
			 $("#schoolid").val('');
			 
			

			 //$("#new_class_err").css('display', 'inline', 'important');

           // $("#new_class_err").html("<i class='fa fa-check'></i> Suceess");

             window.location="./?page=subjects";

            }
			 if(html=='empty')    {

             

			 $("#new_class_err").css('display', 'inline', 'important');

            $("#new_class_err").html("<i class='fa fa-exclamation'></i> Error adding subject, Fill all fields<br>");

             //window.location="./";

            }

             if(html=='dub')     {

            $("#new_class_err").css('display', 'inline', 'important');

             $("#new_class_err").html("<i class='fa fa-exclamation'></i> Error adding subject, dublicate name found<br>");

            }

           },

           beforeSend:function()

           {

            $("#new_class_err").css('display', 'inline', 'important');

            $("#new_class_err").html("<i class='fa fa-circle-o-notch fa-spin'></i> Loading...<br>");

           }

          });

        return false;

  	  });
		// assigned teacher postings

$("#new_class_err").css('display', 'none', 'important');	
		
		$("#addclassfxn").click(function(){   
          mclass=$("#tclass").val();
		 
		  schoolid=$("#schoolid").val();
		  
		   tichaid=$("#tid").val();
		  
		
			
          $.ajax({

           type: "POST",

           url: "php/adds.php?action=assignclass",

           data: "tclass="+mclass+"&schoolid="+schoolid+"&tid="+tichaid,

           success: function(html){    

            if(html=='true')    {

             $("#tclass").val('');
			 
			 $("#tid").val('');
			 
			 $("#schoolid").val('');
			 
			

			 //$("#new_class_err").css('display', 'inline', 'important');

           // $("#new_class_err").html("<i class='fa fa-check'></i> Suceess");

             window.location="./?page=teachers_assigned";

            }
			 if(html=='empty')    {

             

			 $("#new_class_err").css('display', 'inline', 'important');

            $("#new_class_err").html("<i class='fa fa-exclamation'></i> Error assigning a teacher to a class, Fill all fields<br>");

             //window.location="./";

            }

             if(html=='dub')     {

            $("#new_class_err").css('display', 'inline', 'important');

             $("#new_class_err").html("<i class='fa fa-exclamation'></i> Error assigning a teacher to a class, dublicate record found<br>");

            }

           },

           beforeSend:function()

           {

            $("#new_class_err").css('display', 'inline', 'important');

            $("#new_class_err").html("<i class='fa fa-circle-o-notch fa-spin'></i> Loading...<br>");

           }

          });

        return false;

  	  });		
	  
	  
	  
	  	// assigned student-class postings

$("#new_class_err").css('display', 'none', 'important');	
		
		$("#addclassfxn").click(function(){   
         
		 studreg=$("#studreg").val();
		  
		  sclass=$("#tclass").val();
		  
		  acy=$("#acy").val();
		  
		  schoolid=$("#schoolid").val();
		  
		   studid=$("#tid").val();
		  
		
			
          $.ajax({

           type: "POST",

           url: "php/adds.php?action=studlist",

           data: "studreg="+studreg+"&tclass="+slass+"&acy="+acy+"&schoolid="+schoolid+"&tid="+tichaid,

           success: function(html){    

            if(html=='true')    {

			 $("#studreg").val('');
			 
			  $("#tclass").val('');
			  
             $("#acy").val('');
			 
			 $("#tid").val('');
			 
			 $("#schoolid").val('');
			 
			

			 //$("#new_class_err").css('display', 'inline', 'important');

           // $("#new_class_err").html("<i class='fa fa-check'></i> Suceess");

             window.location="./?page=students";

            }
			 if(html=='empty')    {

             

			 $("#new_class_err").css('display', 'inline', 'important');

            $("#new_class_err").html("<i class='fa fa-exclamation'></i> Error assigning a student to a class, Fill all fields<br>");

             //window.location="./";

            }

             if(html=='dub')     {

            $("#new_class_err").css('display', 'inline', 'important');

             $("#new_class_err").html("<i class='fa fa-exclamation'></i> Error assigning a student to a class, dublicate record found<br>");

            }

           },

           beforeSend:function()

           {

            $("#new_class_err").css('display', 'inline', 'important');

            $("#new_class_err").html("<i class='fa fa-circle-o-notch fa-spin'></i> Loading...<br>");

           }

          });

        return false;

  	  });
	  
	  
});

