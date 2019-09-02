<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 11/27/2018
 * Time: 12:44 AM
 */
//print_r($all_prs);
// exit;
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
                <h4>Purchase Requestion List</h4>
            </div>
    </div>
    
       <div class="col-xs-12">
            <div class="btn pull-right">
                <a href="<?=base_url('company/create_pr')?>"><button type="Submit" class="button small dark" >Create <span class="primary">PR</span></button></a>
            </div>
            <div class="btn pull-right">
                <a href="<?=base_url('company/create_pr')?>"><button type="Submit" class="button small dark" style="background-color: #1cbdf9 !important;">Import PR<span class="primary"></span></button></a>
            </div>
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
                <p class="text-header small">Item number</p>
            </div>
            <div class="col-xs-3">
                <p class="text-header small">Item Name</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small">Quantity</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small">Quantity Unit</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small">Condition</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small text-center">Action</p>
            </div>
            
        </div>
        <!-- /PURCHASES LIST HEADER -->
        <?php $i = 1;
         foreach ($all_prs as $key => $value) { ?>
        
        <!-- PURCHASE ITEM -->
        <div class="purchase-item row">
            <div class="col-xs-1">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;">
                </div>
            </div>
            <div class="col-xs-1">
                <p><?=$i?></p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary"><?=$value['item_number']?></p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary"><?=$value['item_name']?></p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" class="Quantity_<?=$value['id']?>" value="<?=$value['quantity']?>">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control qty_unit_<?=$value['id']?>" id="sel1" >
                    <option value="each" <?=isset($value['quantity_unit']) && !empty($value['quantity_unit']) && $value['quantity_unit'] == "each" ? 'selected' : '' ?>>Each</option>
                    <option value="kg" <?=isset($value['quantity_unit']) && !empty($value['quantity_unit']) && $value['quantity_unit'] == "kg" ? 'selected' : '' ?>>Kilogram</option>
                    <option value="ltr" <?=isset($value['quantity_unit']) && !empty($value['quantity_unit']) && $value['quantity_unit'] == "ltr" ? 'selected' : '' ?>>Litres</option>
                    <option value="meter" <?=isset($value['quantity_unit']) && !empty($value['quantity_unit']) && $value['quantity_unit'] == "meter" ? 'selected' : '' ?>>Meters</option>
                    <option value="dozen" <?=isset($value['quantity_unit']) && !empty($value['quantity_unit']) && $value['quantity_unit'] == "dozen" ? 'selected' : '' ?>>Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control condition_<?=$value['id']?>" id="sel1">
                    <option value="new" <?=isset($value['item_condition']) && !empty($value['item_condition']) && $value['item_condition'] == "new" ? 'selected' : '' ?>>New</option>
                    <option value="used" <?=isset($value['item_condition']) && !empty($value['item_condition']) && $value['item_condition'] == "used" ? 'selected' : '' ?>>Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                <?php if ($value['status'] == NULL) { ?>
                    <a href="#" class="recommendation good hoverable open-recommendation-form icon-dectick action approvePr" style="" data-method="accept" data-id="<?=$value['id']?>">
                    <span class="tick-icon">✓</span>
                    </a>
                    <a href="#" class="recommendation bad hoverable open-recommendation-form icon-dectick action disApprovePr"  data-method="cancel" data-id="<?=$value['id']?>" >
                        <span class="close-icon">✕</span>
                    </a>
                <?php } else { ?>
                
                    <a href="#" class="recommendation bad hoverable open-recommendation-form icon-dectick action"
                    style="background-color: #e61852;" data-method="cancel" data-id="<?=$value['id']?>" >
                        <span class="close-icon">✕</span>
                    </a>
                <?php } ?>
            </div>
            
        </div>
        <?php $i++; } ?>
        
        <!-- /PAGER -->
    </div>
    <!-- /PURCHASES LIST -->

</div>
<!-- DASHBOARD CONTENT -->