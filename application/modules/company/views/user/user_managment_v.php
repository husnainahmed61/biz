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
                <h4>Uer Management</h4>
            </div>
    </div>
    
       <div class="col-xs-12">
            <div class="btn pull-right">
                <a href="<?=base_url('company/add_user')?>"><button type="Submit" class="button small dark" >Add <span class="primary">User</span></button></a>
            </div>
          <!--   <div class="btn pull-right">
                <a href="<?=base_url('company/create_pr')?>"><button type="Submit" class="button small dark" style="background-color: #1cbdf9 !important;">Import Inventory<span class="primary"></span></button></a>
            </div>
           
        </div> -->
   
    
    <!-- /HEADLINE -->

    <!-- PURCHASES LIST -->
    <div class="purchases-list col-sm-12 purchase-lst-cs">
        <!-- PURCHASES LIST HEADER -->
        <div class="purchases-list-header row">
            
            <div class="col-xs-1">
                <p class="text-header small">#</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small">Users</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">Dashboard View</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">Company Configuration</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">Add Item</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">Add supplier</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">Create PR</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">PR Approval</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">RFQ Approval</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">Purchase Order Approval</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">Reports</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small text-center">Action</p>
            </div>
            
        </div>
        <!-- /PURCHASES LIST HEADER -->
        <!-- PURCHASE ITEM -->
       
        <div class="purchase-item row">
           
           <div class="col-xs-1">
            <p >1</p>
            </div>
               
               
            <div class="col-xs-2 visible-lg">
                <a href="#"><p class="category primary">Hasnain <span class="glyphicon glyphicon-edit" style="color: #1cbdf9;top: 0px"></span></p></a>
            </div>
            <div class="col-xs-1 visible-lg">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;" checked>
                </div>
            </div>

            <div class="col-xs-1">
                 <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;" checked>
                </div>
            </div>
            <div class="col-xs-1">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;" checked>
                </div>
            </div>
            <div class="col-xs-1">
                 <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;">
                </div>
            </div>
            <div class="col-xs-1">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;">
                </div>
            </div>
            <div class="col-xs-1">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;">
                </div>
            </div>
            <div class="col-xs-1">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;">
                </div>
            </div>
            <div class="col-xs-1">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;">
                </div>
            </div>
            <div class="col-xs-1">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;">
                </div>
            </div>
            <div class="recommendation-wrap bid_actions col-xs-1">
                   
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