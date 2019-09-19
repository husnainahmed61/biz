<?php
//echo "<pre>";
//print_r($pr_selected_suppliers);
//item suppliers
$all_sup = [];
foreach ($rfq_item_suppliers as $key => $value) {
    array_push($all_sup, $value['supplier_id']);
}
//selected item suppliers
$total_sup = [];
foreach ($pr_selected_suppliers as $key => $value) {
    array_push($total_sup, $value['supplier_id']);
}
// print_r($total_sup);
$sel_sup = count($total_sup);
 ?>
 <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.18/fc-3.2.5/fh-3.1.4/r-2.2.2/sc-2.0.0/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.18/fc-3.2.5/fh-3.1.4/r-2.2.2/sc-2.0.0/datatables.min.js"></script> -->
<style type="text/css">
    .input-sm{
            line-height: 21px !important;
    }
</style>
<form method="post" id="suggested_supplier_form" action="<?=base_url()?>company/<?=($sel_sup >= 1 ? 'updateSuggestedSuppliers' : 'storeSuggestedSuppliers')?>">
 <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            	<th>check</th>
                <th>#</th>
                <th>Name</th>
                
            </tr>
        </thead>
        <tbody>
        	<?php $i=1;  foreach ($all_suppliers as $key => $value) { ?>
            <tr>
            	<td><input type="checkbox" name="supplier_id[]" value="<?=$value['id']?>" style="display: block;" <?=(in_array($value['id'], $total_sup) || in_array($value['id'], $all_sup)) ? 'checked' : ''?>></td>
                <td><?=$i?></td>
                <td><?=$value['first_name'].' '.$value['last_name']?></td>
                
            </tr> 
            <?php $i++; } ?>           
        </tbody>
        <tfoot>
            <tr>
            	<th>check</th>
                <th>#</th>
                <th>Name</th>
                
            </tr>
        </tfoot>
    </table>
    <input type="hidden" name="pr_id" value="<?=$pr_id?>">
    <button type="submit" class="btn btn-default" ><?=($sel_sup >= 1 ? 'Update' : 'Save')?></button>
    </form>

    <script type="text/javascript">
    	$(document).ready(function() {
    $('#example').DataTable();
} );
        $( "#suggested_supplier_form" ).submit(function( event ) {
      event.preventDefault();
      //alert( "Handler for .submit() called." );
            // Get form
            var $userForm = $("#suggested_supplier_form");

            data = $userForm.serialize();
            // console.log(data);
            // return;     
            $.ajax({
                url: $("#suggested_supplier_form").attr('action'),
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
                        alert(message);
                        //showstatusMessage('messageSuccess',response.title, message , 4000);
                           $("#myModal .close").click()
                    } else if (response.status === false) {
                        alert(message);
                        //showstatusMessage('messageError', response.title, message, 3000);
                        
                    }
                }
            });
    });
    </script>