<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 11/27/2018
 * Time: 12:44 AM
 */
?>


<!-- DASHBOARD CONTENT -->
<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline purchases primary">
        <div class="row">
           <div class="col-lg-2 col-md-4">
                <h4>Tax Settings</h4>
            </div>
            
        </div>
        <div class=" col-xs-12">
            <button type="Submit" class="button medium dark">Add <span class="primary">Tax</span></button>
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
            <div class="col-xs-4 purchase-item-details-list">
                <p class="text-header small">Name</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small">Tax (%)</p>
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
           
            <div class="purchase-item-info col-xs-4 visible-lg">
                <a href="#"><p class="category primary">VAT</p></a>

                <!-- <p><span class="light">License:</span> Standard</p>
                <p><span class="light">Author:</span> Odin_Design</p>
                <p class="text-header tiny">Check Invoice</p> -->
            </div>

            <div class="purchase-item-download col-md-2 col-xs-2">
                 <p>20</p>
            </div>
            
            <div class="purchase-item-recommend col-md-2 col-xs-2">
                <div class="recommendation-wrap">
                    <a href="#recommendation-popup" class="recommendation good hoverable open-recommendation-form">
                        <span class="icon-like"></span>
                    </a>
                    <a href="#recommendation-popup" class="recommendation bad hoverable open-recommendation-form">
                        <span class="icon-dislike"></span>
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
           
            <div class="purchase-item-info col-xs-4 visible-lg">
                <a href="#"><p class="category primary">GST</p></a>

                <!-- <p><span class="light">License:</span> Standard</p>
                <p><span class="light">Author:</span> Odin_Design</p>
                <p class="text-header tiny">Check Invoice</p> -->
            </div>

            <div class="purchase-item-download col-md-2 col-xs-2">
                 <p>10</p>
            </div>
            
            <div class="purchase-item-recommend col-md-2 col-xs-2">
                <div class="recommendation-wrap">
                    <a href="#recommendation-popup" class="recommendation good hoverable open-recommendation-form">
                        <span class="icon-like"></span>
                    </a>
                    <a href="#recommendation-popup" class="recommendation bad hoverable open-recommendation-form">
                        <span class="icon-dislike"></span>
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