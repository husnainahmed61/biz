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
                <a href="<?=base_url('company/create_pr')?>"><button type="Submit" class="button small dark" style="background-color: #1cbdf9 !important;">Import Inventory<span class="primary"></span></button></a>
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
            <div class="col-xs-2">
                <p class="text-header small">Item Number</p>
            </div>
            <div class="col-xs-3">
                <p class="text-header small">Item Description</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">Quantity Unit</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small text-center">Action</p>
            </div>
            
        </div>
        <!-- /PURCHASES LIST HEADER -->
        <!-- PURCHASE ITEM -->
        <?php foreach ($all_items as $key => $value) { ?>

        
        <div class="purchase-item row">
           
            <div class="col-xs-1">
                <p><?=$value['id']?></p>
            </div>
           
            <div class="col-xs-3 visible-lg">
                <a href="#"><p class="category primary"><?=$value['category']?></p></a>
            </div>
             <div class="col-xs-2 visible-lg">
                <a href="#"><p class="category primary"><?=$value['item_number']?></p></a>
            </div>

            <div class="col-xs-3">
                 <p><?=$value['item_desc']?></p>
            </div>
            <div class="col-xs-1">
                 <p><?=$value['quantity_unit']?></p>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                  <div class="recommendation-wrap">
                    <a href="#recommendation-popup" class="recommendation good hoverable open-recommendation-form">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="#recommendation-popup" class="recommendation bad hoverable open-recommendation-form">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </div>
                </div>
            
        </div>
         <?php } ?>     
        
        <!-- /PAGER -->
    </div>
    <!-- /PURCHASES LIST -->

</div>
<!-- DASHBOARD CONTENT -->