<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 11/27/2018
 * Time: 12:44 AM
 */
// print_r($all_users);
// exit();
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
                <h4>User Management</h4>
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
            
            <div class="col-xs-2">
                <p class="text-header small">Users</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">Dashboard</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">Company Settings</p>
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
                <p class="text-header small">RFQ Approval</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">PO Approval</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">Reports</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small">Notifications</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small text-center">Action</p>
            </div>
            
        </div>
        <!-- /PURCHASES LIST HEADER -->
        <!-- PURCHASE ITEM -->
       <?php $i= 1;
        foreach ($all_users as $key => $value) { ?> 
      
        <div class="purchase-item row">
           
            <div class="col-xs-2 visible-lg">
                <a href="<?=base_url()?>company/add_user/?user=<?=$value['user_id']?>" class="edit_user" data-user-id=<?=$value['user_id']?>><p class="category primary"><?=$value['first_name'].' '.$value['last_name']?> <span class="glyphicon glyphicon-edit" style="color: #1cbdf9;top: 0px" ></span></p></a>
            </div>
            <div class="col-xs-1 visible-lg">
                <div class="form-check form-check-inline">
                  <input name="role_<?=$value['id']?>" class="form-check-input check_class_<?=$value['id']?>" type="checkbox" id="inlineCheckbox1" value="dashboard" style="display: block;" <?=($value['dashboard'] == 1) ? 'checked' : ''?>>
                </div>
            </div>

            <div class="col-xs-1">
                 <div class="form-check form-check-inline">
                  <input name="role_<?=$value['id']?>" class="form-check-input check_class_<?=$value['id']?>" type="checkbox" id="inlineCheckbox1" value="company_settings" style="display: block;" <?=($value['company_settings'] == 1) ? 'checked' : ''?>>
                </div>
            </div>
            <div class="col-xs-1">
                <div class="form-check form-check-inline">
                  <input name="role_<?=$value['id']?>" class="form-check-input check_class_<?=$value['id']?>" type="checkbox" id="inlineCheckbox1" value="add_items" style="display: block;" <?=($value['add_items'] == 1) ? 'checked' : ''?>>
                </div>
            </div>
            <div class="col-xs-1">
                 <div class="form-check form-check-inline">
                  <input name="role_<?=$value['id']?>" class="form-check-input check_class_<?=$value['id']?>" type="checkbox" id="inlineCheckbox1" value="add_supplier" style="display: block;" <?=($value['add_supplier'] == 1) ? 'checked' : ''?>>
                </div>
            </div>
            <div class="col-xs-1">
                <div class="form-check form-check-inline">
                  <input name="role_<?=$value['id']?>" class="form-check-input check_class_<?=$value['id']?>" type="checkbox" id="inlineCheckbox1" value="create_pr" style="display: block;" <?=($value['create_pr'] == 1) ? 'checked' : ''?>>
                </div>
            </div>
            <div class="col-xs-1">
                <div class="form-check form-check-inline">
                  <input name="role_<?=$value['id']?>" class="form-check-input check_class_<?=$value['id']?>" type="checkbox" id="inlineCheckbox1" value="rfq_approval" style="display: block;" <?=($value['rfq_approval'] == 1) ? 'checked' : ''?>>
                </div>
            </div>
            <div class="col-xs-1">
                <div class="form-check form-check-inline">
                  <input name="role_<?=$value['id']?>" class="form-check-input check_class_<?=$value['id']?>" type="checkbox" id="inlineCheckbox1" value="po_approval" style="display: block;" <?=($value['po_approval'] == 1) ? 'checked' : ''?>>
                </div>
            </div>
            <div class="col-xs-1">
                <div class="form-check form-check-inline">
                  <input name="role_<?=$value['id']?>" class="form-check-input check_class_<?=$value['id']?>" type="checkbox" id="inlineCheckbox1" value="reports" style="display: block;" <?=($value['reports'] == 1) ? 'checked' : ''?>>
                </div>
            </div>
            <div class="col-xs-1">
                <div class="form-check form-check-inline">
                  <input name="role_<?=$value['id']?>" class="form-check-input check_class_<?=$value['id']?>" type="checkbox" id="inlineCheckbox1" value="notifications" style="display: block;" <?=($value['notifications'] == 1) ? 'checked' : ''?>>
                </div>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-1">
                   
                <a href="#" class="recommendation good hoverable open-recommendation-form icon-dectick action updateUserRole"
                   style="" data-method="accept" data-id="<?=$value['id']?>" data-user-id=<?=$value['user_id']?>>
                    <span class="tick-icon">✓</span>
                </a>
                <a href="#" class="recommendation bad hoverable open-recommendation-form icon-dectick action deleteUser"  data-method="cancel" data-id="<?=$value['id']?>" >
                        <i class="fa fa-trash-o" style="margin-top: 6px; color: white;"></i>
                    </a>

            </div>
            
        </div>
         <?php $i++; } ?>
        <!-- /PAGER -->
    </div>
    <!-- /PURCHASES LIST -->


</div>
<!-- DASHBOARD CONTENT -->