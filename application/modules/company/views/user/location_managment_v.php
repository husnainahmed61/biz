<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 11/27/2018
 * Time: 12:44 AM
 */
?>
<style type="text/css">

</style>

<!-- DASHBOARD CONTENT -->
<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline purchases primary">
        <div class="row">
           <div class="col-lg-12 col-md-12">
                <h4>Location Management</h4>
            </div>
            
        </div>
        <div class="btn pull-right">
                <a href="<?=base_url('company/add_warehouse')?>"><button type="Submit" class="button small dark" >Add <span class="primary">Warehouse</span></button></a>
            </div>
        <hr>
        <br>
    </div>
    <!-- /HEADLINE -->

    <!-- PURCHASES LIST -->
    <div class="purchases-list col-sm-12 purchase-lst-cs">
        <!-- PURCHASES LIST HEADER -->
        <div class="purchases-list-header row">
            <div class="col-xs-1">
                <p class="text-header small">#</p>
            </div>
            <div class="col-xs-2 purchase-item-details-list">
                <p class="text-header small">Name</p>
            </div>
            <div class="col-xs-6">
                <p class="text-header small">Address</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small text-center">Action</p>
            </div>
            
        </div>
        <!-- /PURCHASES LIST HEADER -->
        <!-- PURCHASE ITEM -->
        <div class="purchase-item row">
            <div class="purchase-item-date col-lg-1 col-xs-2">
                <p>1</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">Korangi Warehouse</p></a>

                <!-- <p><span class="light">License:</span> Standard</p>
                <p><span class="light">Author:</span> Odin_Design</p>
                <p class="text-header tiny">Check Invoice</p> -->
            </div>

            <div class="purchase-item-download col-xs-6">
                 <p>Plot S1, Sector 02 CP & Berar Society Rd No. 4, Mehran Town, Korangi Industrial Area, Karachi, Sindh</p>
            </div>
            
            <div class="purchase-item-recommend col-xs-2">
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
        <!-- /PURCHASE ITEM -->
                <!-- PURCHASE ITEM -->
        <div class="purchase-item row">
            <div class="purchase-item-date col-lg-1 col-xs-2">
                <p>2</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">Headoffice</p></a>

                <!-- <p><span class="light">License:</span> Standard</p>
                <p><span class="light">Author:</span> Odin_Design</p>
                <p class="text-header tiny">Check Invoice</p> -->
            </div>

            <div class="purchase-item-download col-xs-6">
                 <p>3rd Floor, Dolmen Mall, Harbour Front, Sea View Rd, Block 4 Clifton, Karachi, Sindh</p>
            </div>
            
            <div class="purchase-item-recommend col-md-2 col-xs-2">
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
        <!-- /PURCHASE ITEM -->
        
        <!-- /PAGER -->
    </div>
    <!-- /PURCHASES LIST -->

</div>
<!-- DASHBOARD CONTENT -->