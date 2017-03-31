// JavaScript Document
$(function(){
		   
		  	$("#loading").hide();
			$('#login_link').click(function(){
					$('#loginpop').dialog('open');
					return false;
				});
			
			$('#loginpop').dialog({
					autoOpen: false,
					width: 440,
					modal:true,
					buttons: {
						
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
			
			$("#tabs").tabs();
		
			
			$("#new_school_admin_link").click(function(){
				$('#new_school_admin_pop').dialog('open');
					return false;
			});
			
			$('#new_school_admin_pop').dialog({
					autoOpen: false,
					width: 640,
					modal:true,
					buttons: {
						
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
			
			$("#new_school_link").click(function(){
				$('#new_school_pop').dialog('open');
					return false;
			});
			
			$('#new_school_pop').dialog({
					autoOpen: false,
					width: 640,
					modal:true,
					buttons: {
						
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
			
	
		
		$("#new_student_link").click(function(){
											
				$('#new_student_pop').dialog('open');
					return false;
			});
			
			$('#new_student_pop').dialog({
					autoOpen: false,
					width: 640,
					modal:true,
					buttons: {
						
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
			
			$("#new_class_link").click(function(){
											
				$('#new_class_pop').dialog('open');
					return false;
			});
			
			$('#new_class_pop').dialog({
					autoOpen: false,
					width: 640,
					modal:true,
					buttons: {
						
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
		   $("#new_parent_link").click(function(){
											
				$('#new_parent_pop').dialog('open');
					return false;
			});
			
			$('#new_parent_pop').dialog({
					autoOpen: false,
					width: 640,
					modal:true,
					buttons: {
						
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
			
			$("#new_teacher_link").click(function(){
											
				$('#new_teacher_pop').dialog('open');
					return false;
			});
			
			
			$('#new_teacher_pop').dialog({
					autoOpen: false,
					width: 640,
					modal:true,
					buttons: {
						
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
		   
		   
});

