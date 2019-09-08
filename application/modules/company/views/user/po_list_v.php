<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 11/27/2018
 * Time: 12:44 AM
 */ 
//echo "<pre>";
//print_r($all_pos);
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
            <div class="col-xs-2">
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
            <div class="col-xs-2">
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
        <?php $i=1; foreach ($all_pos as $key => $value) { ?>
            <!-- PURCHASE ITEM -->
       
            <div class="purchase-item row">
               <div class="col-xs-1">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;">
                </div>
                <div class="col-xs-1">
                    <p><?=$i?></p>
                </div>
                <div class="col-xs-2">
                    <p class="category primary"><?=$value['item_name']?></p>
                </div>
                <div class="col-xs-2">
                    <p class="category primary"><?=$value['first_name'].' '.$value['last_name']?></p>
                </div>
                <input type="hidden" class="supplier_id_<?=$value['auction_id']?>" name="supplier_id_<?=$value['auction_id']?>" value="<?=$value['supplier_id']?>">
                <div class="col-xs-2">
                     <p><?=$value['cur'].' '.$value['amount'].' '.$value['qty_unit']?></p>
                </div>
                <div class="col-xs-2">
                    <select class="form-control warehouse_<?=$value['auction_id']?>" id="sel1" name="warehouse_<?=$value['auction_id']?>" >
                        <?php foreach ($all_warehouses as $key => $val) { ?>
                            <option value="<?=$val['id']?>"><?=$val['name']?></option>
                        <?php } ?>
                      </select>
                </div>
                <div class="col-xs-2">
                     <input class="form-control d_date_<?=$value['auction_id']?>" type="date" id="example-date-input" name="d_date_<?=$value['auction_id']?>">
                </div>
                <div class="col-xs-2">
                    <input type="text" name="Shipment_<?=$value['auction_id']?>" class="Shipment_<?=$value['auction_id']?>" placeholder="Air Shipment">
                </div>
                <div class="recommendation-wrap bid_actions col-xs-1">
                       
                    <a href="#" class="recommendation good hoverable open-recommendation-form icon-dectick action <?=(($value['rfq_status'] == "1") || ($value['rfq_status'] == "0"))  ? '' : 'approvePO'?>" style="<?=($value['rfq_status'] == "1") ? 'background-color: #00d7b3' : ''?>" data-method="accept" data-id="<?=$value['auction_id']?>" >
                        <span class="tick-icon">✓</span>
                    </a>
                    <a href="#" class="recommendation bad hoverable open-recommendation-form icon-dectick action <?=(($value['rfq_status'] == "0") || ($value['rfq_status'] == "1")) ? '' : 'disapprovePO'?> "
                    style="<?=($value['rfq_status'] == "0") ? 'background-color: #e61852' : ''?>" data-method="cancel" data-id="<?=$value['auction_id']?>" >
                        <span class="close-icon">✕</span>
                    </a>
                </div>
                
            </div>
        <?php $i++; } ?> 
        
        
        <!-- /PAGER -->
    </div>
    <!-- /PURCHASES LIST -->


</div>
<!-- DASHBOARD CONTENT -->