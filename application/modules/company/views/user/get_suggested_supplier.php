<?php
// echo "<pre>";
// print_r($rfq_item_suppliers);
 ?>
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.18/fc-3.2.5/fh-3.1.4/r-2.2.2/sc-2.0.0/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.3.1/dt-1.10.18/fc-3.2.5/fh-3.1.4/r-2.2.2/sc-2.0.0/datatables.min.js"></script>

 <table id="example" class="example" class="display" style="width:100%">
        <thead>
            <tr>
            	<th></th>
                <th>#</th>
                <th>Name</th>
                
            </tr>
        </thead>
        <tbody>
        	<?php $i=1;  foreach ($rfq_item_suppliers as $key => $value) { ?>
            <tr>
            	<td><input type="checkbox" name="supplier_id[]" value="<?=$value['supplier_id']?>" style="display: block;"></td>
                <td><?=$i?></td>
                <td><?=$value['first_name']?></td>
                
            </tr> 
            <?php $i++; } ?>           
        </tbody>
        <tfoot>
            <tr>
            	<th></th>
                <th>#</th>
                <th>Name</th>
                
            </tr>
        </tfoot>
    </table>
    <input type="hidden" name="pr_id" value="<?=$pr_id?>">
    <script type="text/javascript">
    	$(document).ready(function() {
    $('#example').DataTable();
} );
    </script>