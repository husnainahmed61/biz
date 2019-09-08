<?php
//print_r($pr_selected_emailBody);
?>
<form method="post" id="rfq_email_form" action="<?=base_url()?>company/<?=((isset($pr_selected_emailBody[0]['email_body'])) && !empty($pr_selected_emailBody[0]['email_body'])) ? 'updaterfqEmail' : 'storerfqEmail'?>">
	<textarea name="email_body"><?=$pr_selected_emailBody[0]['email_body']?></textarea>
    <input type="hidden" name="pr_id" value="<?=$pr_id?>" class="pr_id_dynamic">
    <button type="submit" class="btn btn-default" ><?=((isset($pr_selected_emailBody[0]['email_body'])) && !empty($pr_selected_emailBody[0]['email_body'])) ? 'Update' : 'Save'?></button>
</form>
<script type="text/javascript">
	$( "#rfq_email_form" ).submit(function( event ) {
      event.preventDefault();
      //alert( "Handler for .submit() called." );
            // Get form
            var $userForm = $("#rfq_email_form");

            data = $userForm.serialize();
            // console.log(data);
            // return;     
            $.ajax({
                url: $("#rfq_email_form").attr('action'),
                type: "POST",
                data: data,
                dataType: 'json',
                timeout: 600000,
                success: function (response) {
                    // console.log(response);
                    // return;
                    var type = '';
                    var message = response.message;
                    if (response.status) {
                        //alert(message);
                        showstatusMessage('messageSuccess',response.title, message , 4000);
                           $("#emailPop .close").click()
                    } else if (response.status === false) {
                        //alert(message);
                        showstatusMessage('messageError', response.title, message, 3000);
                        
                    }
                }
            });
    });
</script>
