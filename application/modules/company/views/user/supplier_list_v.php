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
            <div class="col-xs-2">
                <p class="text-header small">Contact Person</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small">Official Email</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">Contact Number</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small text-center">Action</p>
            </div>
            
        </div>
        <!-- /PURCHASES LIST HEADER -->
        <!-- PURCHASE ITEM -->
        <?php foreach ($all_suppliers as $key => $value) { ?>

        
        <div class="purchase-item row">
           
            <div class="col-xs-1">
                <p><?=$value['id']?></p>
            </div>
           
            <div class="col-xs-2 visible-lg">
                <a href="#"><p class="category primary"><?=$value['category']?></p></a>
            </div>
             <div class="col-xs-2 visible-lg">
                <a href="#"><p class="category primary"><?=$value['company_name']?></p></a>
            </div>

            <div class="col-xs-2">
                 <p><?=$value['contact_person']?></p>
            </div>
            <div class="col-xs-2">
                 <p><?=$value['official_email']?></p>
            </div>
            <div class="col-xs-1">
                 <p><?=$value['contact_number']?></p>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
                    <a href="#" class="recommendation good hoverable open-recommendation-form icon-dectick action "
                       style="" data-method="accept" data-id="">
                        <span class="tick-icon">✓</span>
                    </a>
                    <a href="#" class="recommendation bad hoverable open-recommendation-form icon-dectick action "
                    style="" data-method="cancel" data-id="" >
                        <span class="close-icon">✕</span>
                    </a>
                </div>
            
        </div>
         <?php } ?>     
        
        <!-- /PAGER -->
    </div>
    <!-- /PURCHASES LIST -->

</div>
<!-- DASHBOARD CONTENT -->