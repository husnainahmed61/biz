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
                <h4>Purchase Order List</h4>
            </div>
    </div>
    
      <div class="col-xs-12">
            
            <div class="btn pull-left">
                <a href="<?=base_url('company/create_pr')?>"><button type="Submit" class="button small dark" style="background-color: #00d7b3 !important;">Approve all<span class="primary"></span></button></a>
            </div>
        </div>
   
    
    <!-- /HEADLINE -->

    <!-- PURCHASES LIST -->
    <div class="purchases-list col-sm-12 purchase-lst-cs">
        <!-- PURCHASES LIST HEADER -->
        <div class="purchases-list-header row">
            <div class="col-xs-1">
                <input class="form-check-input" type="checkbox" id="checkAll" value="option1" style="display: block;">
            </div>
            <div class="col-xs-1">
                <p class="text-header small">#</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">Item Title</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small">Selected Suppliers</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small">Bid Amount</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small">Warehouse</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">Delivery Date</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small">Shipment Details</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small text-center">Action</p>
            </div>
            
        </div>
        <!-- /PURCHASES LIST HEADER -->
        <!-- PURCHASE ITEM -->
       
        <div class="purchase-item row">
           <div class="col-xs-1">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;">
                </div>
            </div>
            <div class="col-xs-1">
                <p>1</p>
            </div>
            <div class="col-xs-1 visible-lg">
                <a href="#"><p class="category primary">Nut Bolt 4.3mm</p></a>
            </div>
            <div class="col-xs-2 visible-lg">
                <a href="#"><p class="category primary">Robert Bosch GmbH</p></a>
            </div>

            <div class="col-xs-2">
                 <p>PKR 1000 each</p>
            </div>
            <div class="col-xs-2">
                <select class="form-control" id="sel1">
                    <option value="AUD" selected>Korangi Warehouse</option>
                    <option value="CAD">Headoffice</option>
                  </select>
            </div>
            <div class="col-xs-1">
                 <p>09/30/2019</p>
            </div>
            <div class="col-xs-2">
                <input type="text" name="" value="Air Shipment">
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
         <div class="purchase-item row">
           <div class="col-xs-1">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;">
                </div>
            </div>
            <div class="col-xs-1">
                <p>2</p>
            </div>
           
            <div class="col-xs-1 visible-lg">
                <a href="#"><p class="category primary">Shoes 7"</p></a>
            </div>
             <div class="col-xs-2 visible-lg">
                <a href="#"><p class="category primary">Continental AG</p></a>
            </div>

            <div class="col-xs-2">
                 <p>PKR 900 each</p>
            </div>
            <div class="col-xs-2">
                <select class="form-control" id="sel1">
                    <option value="AUD" >Korangi Warehouse</option>
                    <option value="CAD" selected>Headoffice</option>
                  </select>
            </div>
            <div class="col-xs-1">
                 <p>10/03/2019</p>
            </div>
            <div class="col-xs-2">
                <input type="text" name="" value="Sea Shipment">
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
         <div class="purchase-item row">
           <div class="col-xs-1">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;">
                </div>
            </div>
            <div class="col-xs-1">
                <p>3</p>
            </div>
           
            <div class="col-xs-1 visible-lg">
                <a href="#"><p class="category primary">CNC machining parts</p></a>
            </div>
             <div class="col-xs-2 visible-lg">
                <a href="#"><p class="category primary">Hyundai Mobis</p></a>
            </div>

            <div class="col-xs-2">
                 <p>PKR 6000 each</p>
            </div>
            <div class="col-xs-2">
                <select class="form-control" id="sel1">
                    <option value="AUD" selected>Korangi Warehouse</option>
                    <option value="CAD">Headoffice</option>
                  </select>
            </div>
            <div class="col-xs-1">
                 <p>10/06/2019</p>
            </div>
            <div class="col-xs-2">
                <input type="text" name="" value="Sea Shipment">
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
         <div class="purchase-item row">
           <div class="col-xs-1">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;">
                </div>
            </div>
            <div class="col-xs-1">
                <p>4</p>
            </div>
           
            <div class="col-xs-1 visible-lg">
                <a href="#"><p class="category primary">knuckles</p></a>
            </div>
             <div class="col-xs-2 visible-lg">
                <a href="#"><p class="category primary">Yazaki Corp.</p></a>
            </div>

            <div class="col-xs-2">
                 <p>PKR 500 each</p>
            </div>
            <div class="col-xs-2">
                <select class="form-control" id="sel1">
                    <option value="AUD" selected>Korangi Warehouse</option>
                    <option value="CAD">Headoffice</option>
                  </select>
            </div>
            <div class="col-xs-1">
                 <p>10/09/2019</p>
            </div>
            <div class="col-xs-2">
                <input type="text" name="" value="Sea Shipment">
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
         <div class="purchase-item row">
           <div class="col-xs-1">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;">
                </div>
            </div>
            <div class="col-xs-1">
                <p>5</p>
            </div>
           
            <div class="col-xs-1 visible-lg">
                <a href="#"><p class="category primary">Lubricant</p></a>
            </div>
             <div class="col-xs-2 visible-lg">
                <a href="#"><p class="category primary">Thyssenkrupp AG</p></a>
            </div>

            <div class="col-xs-2">
                 <p>PKR 1000 kg</p>
            </div>
            <div class="col-xs-2">
                <select class="form-control" id="sel1">
                    <option value="AUD" selected>Korangi Warehouse</option>
                    <option value="CAD">Headoffice</option>
                  </select>
            </div>
            <div class="col-xs-1">
                 <p>10/12/2019</p>
            </div>
            <div class="col-xs-2">
                <input type="text" name="" value="Sea Shipment">
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