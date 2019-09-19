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
            <div class="col-xs-8">
                <p class="text-header small">Address</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small text-center">Action</p>
            </div>
            
        </div>
        <!-- /PURCHASES LIST HEADER -->
        <?php $i=1; 
        foreach ($all_warehouses as $key => $value) { ?>
            <!-- PURCHASE ITEM -->
            <div class="purchase-item row">
                <div class="purchase-item-date col-lg-1 col-xs-2">
                    <p><?=$i?></p>
                </div>
               
                <div class="purchase-item-info col-xs-2 visible-lg">
                    <a href="#"><p class="category primary"><?=$value['name']?></p></a>

                    <!-- <p><span class="light">License:</span> Standard</p>
                    <p><span class="light">Author:</span> Odin_Design</p>
                    <p class="text-header tiny">Check Invoice</p> -->
                </div>

                <div class="purchase-item-download col-xs-8">
                     <p><?=$value['address']?></p>
                </div>
                
                <div class="purchase-item-recommend col-xs-1">
                    <div class="recommendation-wrap">
                        <a href="<?=base_url()?>company/add_warehouse/?warehouse=<?=$value['id']?>" class="recommendation good hoverable open-recommendation-form" style="margin-right: 0px">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="#" class="recommendation bad hoverable open-recommendation-form icon-dectick action deleteLocation"  data-method="cancel" data-id="<?=$value['id']?>" style="width: 40px;
    height: 40px;" data-user-id=<?=$value['user_id']?>  >
                            <i class="fa fa-trash-o" style="margin-top: 11px; color: white;"></i>
                        </a>
                        <!-- <a href="#" class="recommendation bad hoverable open-recommendation-form">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a> -->
                    </div>
                </div>
                
            </div>
            <!-- /PURCHASE ITEM -->
        <?php $i++; } ?>
        
        
        <!-- /PAGER -->
    </div>
    <!-- /PURCHASES LIST -->

</div>
<!-- DASHBOARD CONTENT -->