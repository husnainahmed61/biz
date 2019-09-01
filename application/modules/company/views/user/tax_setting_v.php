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
        <div class="btn pull-right">
                <a href="<?=base_url('company/add_tax')?>"><button type="Submit" class="button small dark" >Add <span class="primary">Tax</span></button></a>
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
            <div class="col-xs-4">
                <p class="text-header small">Tax (%)</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small text-center">Action</p>
            </div>
            
        </div>
        <!-- /PURCHASES LIST HEADER -->
        <?php $i= 1;
         foreach ($all_taxes as $key => $value) { ?>
            <!-- PURCHASE ITEM -->
        <div class="purchase-item row">
            <div class="purchase-item-date col-lg-1 col-xs-2">
                <p><?=$i?></p>
            </div>
           
            <div class="purchase-item-info col-xs-4 visible-lg">
                <a href="#"><p class="category primary"><?=$value['name']?></p></a>

                <!-- <p><span class="light">License:</span> Standard</p>
                <p><span class="light">Author:</span> Odin_Design</p>
                <p class="text-header tiny">Check Invoice</p> -->
            </div>

            <div class="purchase-item-download col-xs-4">
                 <p><?=$value['tax_percentage']?></p>
            </div>
            
            <div class="purchase-item-recommend col-xs-2">
               <div class="recommendation-wrap">
                    <a href="<?=base_url() ?>company/add_tax/?tax=<?=$value['id']?>" class="recommendation good hoverable open-recommendation-form">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="#" class="recommendation bad hoverable open-recommendation-form deleteTax" data-id="<?=$value['id']?>">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </div>
            </div>
            
        </div>
        <!-- /PURCHASE ITEM -->
        <?php $i++;
    } ?>
    
        <!-- /PAGER -->
    </div>
    <!-- /PURCHASES LIST -->

</div>
<!-- DASHBOARD CONTENT -->