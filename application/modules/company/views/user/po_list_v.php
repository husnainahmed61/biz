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
                <h4>Inventory List</h4>
            </div>
    </div>
    
       <div class="col-xs-12">
            <div class="btn pull-right">
                <a href="<?=base_url('company/add_supplier')?>"><button type="Submit" class="button small dark" >Add <span class="primary">Inventory</span></button></a>
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
            <div class="col-xs-2">
                <p class="text-header small">Item Title</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small">Selected Suppliers</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small">Bid Amount with Currency & UoM</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">Select Warehouse</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">Enter Delivery Date</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">Shipment Details (description)</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small text-center">Action</p>
            </div>
            
        </div>
        <!-- /PURCHASES LIST HEADER -->
        <!-- PURCHASE ITEM -->
       
        <div class="purchase-item row">
           
            <div class="col-xs-1">
                <p><1</p>
            </div>
           
            <div class="col-xs-2 visible-lg">
                <a href="#"><p class="category primary">Nut Bolt 4.3mm</p></a>
            </div>
             <div class="col-xs-2 visible-lg">
                <a href="#"><p class="category primary">Robert Bosch GmbH</p></a>
            </div>

            <div class="col-xs-2">
                 <p>PKR 1000 each</p>
            </div>
            <div class="col-xs-1">
                 <p>Korangi Warehouse</p>
            </div>
            <div class="col-xs-1">
                 <p>09/30/2019</p>
            </div>
            <div class="col-xs-1">
                 <p>Air Shipment</p>
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
        
        <!-- /PAGER -->
    </div>
    <!-- /PURCHASES LIST -->

</div>
<!-- DASHBOARD CONTENT -->