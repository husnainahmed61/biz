<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 11/27/2018
 * Time: 12:44 AM
 */
?>

<style type="text/css">
    .form-control {
        font-size: 12px;
    }
    .headline {
        margin-bottom: 0px;
    }

</style>
<style type="text/css">
 /*input type file css*/
.custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}
.custom-file-input::before {
  content: 'Import File';
  display: inline-block;
  background: linear-gradient(top, #f9f9f9, #e3e3e3);
  border-radius: 10px;
  padding: 0px 8px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  font-weight: 600;
  font-size: 10pt;
}
.custom-file-input:hover::before {
  border-color: black;
}
.custom-file-input:active::before {
  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
}
</style>
<!-- DASHBOARD CONTENT -->
<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline purchases primary">
           <div class="col-lg-8 col-md-8">
                <h4>Items List</h4>
            </div>
    </div>
    
       <div class="col-xs-12">
            <div class="btn pull-right">
                <a href="<?=base_url('company/add_inventory')?>"><button type="Submit" class="button small dark" >Add <span class="primary">Inventory</span></button></a>
            </div>
            <div class="btn pull-right">
                <form action="<?=base_url('company/import_items')?>" enctype="multipart/form-data" id="importItem">
                    <input type="file" id="importItems" class="custom-file-input button small dark" name="file1" style="width: 74px;color: white;height: 30px;   background-color: #1cbdf9 !important" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">  
                </form>
                             
            </div>
           
        </div>
   
    
    <!-- /HEADLINE -->

    <!-- PURCHASES LIST -->
    <div class="purchases-list col-sm-12 purchase-lst-cs">
        <!-- PURCHASES LIST HEADER -->
        <div class="purchases-list-header row">
            
            <div class="col-xs-1">
                <p class="text-header small">#</p>
            </div>
            <div class="col-xs-3">
                <p class="text-header small">Category</p>
            </div>
            <div class="col-xs-3">
                <p class="text-header small">Item Number</p>
            </div>
            <div class="col-xs-3">
                <p class="text-header small">Item Description</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">Quantity Unit</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small text-center">Action</p>
            </div>
            
        </div>
        <!-- /PURCHASES LIST HEADER -->
        <!-- PURCHASE ITEM -->
        <?php $i=1;
        foreach ($all_items as $key => $value) { ?>

        
        <div class="purchase-item row">
           
            <div class="col-xs-1">
                <p><?=$i?></p>
            </div>
           
            <div class="col-xs-3 visible-lg">
                <a href="#"><p class="category primary"><?=$value['cat_name']?></p></a>
            </div>
             <div class="col-xs-3 visible-lg">
                <a href="#"><p class="category primary"><?=$value['item_number']?></p></a>
            </div>

            <div class="col-xs-3">
                 <p><?=$value['item_desc']?></p>
            </div>
            <div class="col-xs-1">
                 <p><?=$value['qty_unit']?></p>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-1">
                  <div class="recommendation-wrap">
                    <a href="<?=base_url()?>company/add_inventory/?item=<?=$value['id']?>" class="recommendation good hoverable open-recommendation-form">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="#" class="recommendation bad hoverable open-recommendation-form icon-dectick action deleteItem"  data-method="cancel" data-id="<?=$value['id']?>" style="width: 40px;
    height: 40px;"  >
                            <i class="fa fa-trash-o" style="margin-top: 11px; color: white;"></i>
                        </a>
                </div>
                </div>
            
        </div>
         <?php $i++;
     } ?>     
        
        <!-- /PAGER -->
    </div>
    <!-- /PURCHASES LIST -->

</div>
<!-- DASHBOARD CONTENT -->