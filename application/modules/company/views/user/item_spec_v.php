<?php 
//echo "<pre>";
//print_r($pr_selected_spec);
$rows_ins = count($pr_selected_spec);
$rem_rows = 10 - $rows_ins;
//echo $rem_rows;
?>    
    <form role="form" class="" id="item_spec_form" method="post" action="<?=base_url()?>company/<?=($rows_ins >= 1) ? 'updateItemSpec' : 'storeItemSpec'?>">
      <?php foreach ($pr_selected_spec as $key => $value) { ?>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
          <label for="exampleInputEmail1">Criteria</label>
            <input type="text" class="form-control"
            id="exampleInputEmail1" name="criteria[]" value="<?=$value['criteria']?>" />
          </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
          <label for="exampleInputEmail1">Measurement</label>
            <input type="text" class="form-control"
            id="exampleInputEmail1" name="measurement[]" value="<?=$value['measurement']?>"/>
          </div>
          </div>
        </div>
      <?php  } ?>
      <?php for ($i=1; $i <= $rem_rows ; $i++) { ?>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
            <input type="text" class="form-control"
            id="exampleInputEmail1" name="criteria[]"/>
          </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
            <input type="text" class="form-control"
            id="exampleInputEmail1" name="measurement[]"/>
          </div>
          </div>
        </div>
      <?php } ?>
      

      <input type="hidden" name="pr_id" value="<?=$pr_id?>" class="pr_id_dynamic">
      
      
      <button type="submit" class="btn btn-default"><?=($rows_ins >= 1) ? 'Update' : 'Submit'?></button>
    </form>
    <script type="text/javascript">
      $( "#item_spec_form" ).submit(function( event ) {
      event.preventDefault();
      //alert( "Handler for .submit() called." );
            // Get form
            var $userForm = $("#item_spec_form");

            data = $userForm.serialize();
            // console.log(data);
            // return;     
            $.ajax({
                url: $("#item_spec_form").attr('action'),
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
                           $("#myModalNorm .close").click()
                    } else if (response.status === false) {
                        //alert(message);
                        showstatusMessage('messageError', response.title, message, 3000);
                        
                    }
                }
            });
    });
    </script>
    
   