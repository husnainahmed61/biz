<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 11/27/2018
 * Time: 12:44 AM
 */
// echo "<pre>";
// print_r($all_suppliers);
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
                <h4>Supplier List</h4>
            </div>
    </div>
    
       <div class="col-xs-12">
            <div class="btn pull-right">
                <a href="<?=base_url('company/add_supplier')?>"><button type="Submit" class="button small dark" >Add <span class="primary">Supplier</span></button></a>
            </div>
            <div class="btn pull-right">
                <a href="<?=base_url('company/create_pr')?>"><button type="Submit" class="button small dark" style="background-color: #1cbdf9 !important;">Import Supplier<span class="primary"></span></button></a>
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
            <div class="col-xs-2">
                <p class="text-header small">Category</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small">Company Name</p>
            </div>
            <div class="col-xs-3">
                <p class="text-header small">Contact Person</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small">Official Email</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">Contact Number</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small text-center">Action</p>
            </div>
            
        </div>
        <!-- /PURCHASES LIST HEADER -->
        <!-- PURCHASE ITEM -->
        <?php $i=1;
        foreach ($all_suppliers as $key => $value) { ?>

        
        <div class="purchase-item row">
           
            <div class="col-xs-1">
                <p><?=$i?></p>
            </div>
           
            <div class="col-xs-2 visible-lg">
                <a href="#"><p class="category primary"><?=$value['cat3name']?></p></a>
            </div>
             <div class="col-xs-2 visible-lg">
                <a href="#"><p class="category primary"><?=$value['supplier_company']?></p></a>
            </div>

            <div class="col-xs-3">
                 <p><?=$value['first_name'].' '.$value['last_name']?></p>
            </div>
            <div class="col-xs-2">
                 <p><?=$value['email']?></p>
            </div>
            <div class="col-xs-1">
                 <p><?=$value['phone']?></p>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-1">
                   
                    <div class="recommendation-wrap">
                    <a href="<?=base_url()?>company/add_supplier/?supplier=<?=$value['id']?>" class="recommendation good hoverable open-recommendation-form">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    
                </div>
                </div>
            
        </div>
         <?php $i++; } ?>     
        
        <!-- /PAGER -->
    </div>
    <!-- /PURCHASES LIST -->

</div>
<!-- DASHBOARD CONTENT -->