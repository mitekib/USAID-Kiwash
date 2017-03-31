<?php

?>
<!-- Modal Dialog -->
<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Delete Parmanently</h4>
      </div>
      <div class="modal-body">
        <p>
        
        </p>
        <div id="modal_msg"></div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirm">Yes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="edits" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Delete Parmanently</h4>
      </div>
      <div class="modal-body">
        <p>
        
        </p>
        <div id="edit_modal_msg"></div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        
      </div>
    </div>
  </div>
</div>





<!-- Modal -->
<div class="modal fade" id="send_faq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ask a question</h4>
      </div>
      <div class="modal-body">
        <form  id="send_q_form" method="post" class="row">
        	<div class="form-group col-lg-12">
            	<label>Your question</label>
                <textarea class="form-control" name="question"></textarea>
            </div>
            <div class="form-group col-lg-6">
            	<label>Your name (optional)</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group col-lg-6">
            	<label>Your email (optional)</label>
            	<input type="text" class="form-control" name="email">
            </div>
            <div class="form-group col-lg-4">
            	<button type="button" id="send_q_btn" class="btn btn-flat btn-colored btn-theme-colored ">Send question&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
            </div>
            <div class="form-group col-lg-8" id="send_q_msg">
            
            </div>
        
        </form>
         <script type="text/javascript">
			
			
					$("#send_q_btn").click(function(){
						var fom = document.getElementById("send_q_form");
						var formdata = $(fom).serialize();
						
						$.ajax({
							url:'send_question.php',
							data:formdata,
							method:'POST',
							success: function(html)
							{
								
								
								if(html=="true")
								{
									fom.reset();
									$("#send_q_msg").css('color','green');
									$("#send_q_msg").html("<i class='fa fa-check'></i>&nbsp;Question has been send.");	
									setTimeout(function(){
									  $('#send_faq').modal('hide')
									}, 2000);
								}
								else
								{
									$("#send_q_msg").css('color','red');
									$("#send_q_msg").html("<i class='fa fa-exclamation-triangle'></i>&nbsp;"+html);	
								}
							
							},
							beforeSend: function()
							{
								$("#send_q_msg").css('color','black');
								$("#send_q_msg").html("<i class='fa fa-spinner fa-spin'></i>&nbsp;Sending ...");
							}
						});
					});
			
			</script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="jobs" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Job Description</h4>
      </div>
      <div class="modal-body">
        <p>
        
        </p>
        <div id="job_descri"></div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        
      </div>
    </div>
  </div>
</div>