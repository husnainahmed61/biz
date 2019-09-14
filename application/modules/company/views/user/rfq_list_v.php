<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 11/27/2018
 * Time: 12:44 AM
 */
//echo "<pre>";
//print_r($all_rfq);
?>
<style type="text/css">
    input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}

</style>
<style type="text/css">
.image-preview {
  background-repeat: round;
    width: 65px;
    height: 65px;
  position: relative;
  overflow: hidden;
  background-color: #ffffff;
  color: #ecf0f1;
    border: 1px solid #9dadb6;
   cursor: pointer;
}
.image-preview input {
  /*line-height: 200px;
  font-size: 200px;*/
  position: absolute;
  opacity: 0;
  z-index: 10;
}
.image-preview label {
color: white;
  position: absolute;
  z-index: 5;
  opacity: 0.8;
  cursor: pointer;
  background-color: #00d7b3;
  width: 57px;
  height: 24px;
  font-size: 9px;
  line-height: 24px;
  text-transform: uppercase;
  font-family: "Titillium Web", sans-serif;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  text-align: center;
}
.btn-delete {
   position: absolute;
   cursor: pointer;
   right: 2px;
   top: 2px;

}
.glyphicon {
    color: #ffff;
    top: 0px;
    line-height: 1;

</style>
<style type="text/css">
    .glyphicon{
        color :#ffffff;
    }
    .funkyradio div {
  clear: both;
  overflow: hidden;
}

.funkyradio label {
  width: 100%;
  border-radius: 3px;
  border: 1px solid #D1D3D4;
  font-weight: normal;
}

.funkyradio input[type="radio"]:empty,
.funkyradio input[type="checkbox"]:empty {
  display: none;
}

.funkyradio input[type="radio"]:empty ~ label,
.funkyradio input[type="checkbox"]:empty ~ label {
  position: relative;
  line-height: 2.5em;
  text-indent: 3.25em;
  margin-top: 2em;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

.funkyradio input[type="radio"]:empty ~ label:before,
.funkyradio input[type="checkbox"]:empty ~ label:before {
  position: absolute;
  display: block;
  top: 0;
  bottom: 0;
  left: 0;
  content: '';
  width: 2.5em;
  background: #D1D3D4;
  border-radius: 3px 0 0 3px;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
  color: #888;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label:before,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #C2C2C2;
}

.funkyradio input[type="radio"]:checked ~ label,
.funkyradio input[type="checkbox"]:checked ~ label {
  color: #777;
}

.funkyradio input[type="radio"]:checked ~ label:before,
.funkyradio input[type="checkbox"]:checked ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #333;
  background-color: #ccc;
}

.funkyradio input[type="radio"]:focus ~ label:before,
.funkyradio input[type="checkbox"]:focus ~ label:before {
  box-shadow: 0 0 0 3px #999;
}

.funkyradio-default input[type="radio"]:checked ~ label:before,
.funkyradio-default input[type="checkbox"]:checked ~ label:before {
  color: #333;
  background-color: #ccc;
}

.funkyradio-primary input[type="radio"]:checked ~ label:before,
.funkyradio-primary input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #337ab7;
}

.funkyradio-success input[type="radio"]:checked ~ label:before,
.funkyradio-success input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5cb85c;
}

.funkyradio-danger input[type="radio"]:checked ~ label:before,
.funkyradio-danger input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #d9534f;
}

.funkyradio-warning input[type="radio"]:checked ~ label:before,
.funkyradio-warning input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #f0ad4e;
}

.funkyradio-info input[type="radio"]:checked ~ label:before,
.funkyradio-info input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5bc0de;
}
.headline {
        margin-bottom: 0px;
    }
    .form-control {
        font-size: 12px;
    }
</style>
<style type="text/css">
  #table-wrapper {
  position:relative;
}
#table-scroll {
  height:250px;
  overflow:auto;
}
#table-wrapper table {
  width:100%;

}

#table-wrapper table thead th .text {
  position:absolute;   
  top:-20px;
  z-index:2;
  height:20px;
  width:35%;
  border:1px solid red;
}
/*input type file css*/
.custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}
.custom-file-input::before {
  content: 'file';
  display: inline-block;
  background: linear-gradient(top, #f9f9f9, #e3e3e3);
  border: 1px solid #999;
  border-radius: 3px;
  padding: 5px 8px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  text-shadow: 1px 1px #fff;
  font-weight: 700;
  font-size: 10pt;
}
.custom-file-input:hover::before {
  border-color: black;
}
.custom-file-input:active::before {
  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
}
</style>
<style type="text/css">
  .submitRFQ{
    width: 31px;
    height: 31px;
    border-radius: 50%;
    color: white;
  }
  .submitRFQ:hover{
    background-color: #00d7b3;
  }
</style>

<!-- DASHBOARD CONTENT -->
<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline purchases primary">
        
           <div class="col-lg-2 col-md-4">
                <h4>RFQ List</h4>
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
            <div class="row" style="margin-right: 0px; margin-left: 0px;">
               <div class="col-xs-6">
                    <input class="form-check-input" type="checkbox" id="checkAll" value="option1" style="display: block;">
                </div>
                <div class="col-xs-6">
                    <p class="text-header small" >#</p>
                </div> 
            </div>
            
            <div class="col-xs-2">
                <p class="text-header small text-center">Item Detail</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small text-center ">Expiry Date</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small text-center">Suppliers</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small text-center">Item Specs</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small text-center" >Image</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small text-center">Attach Docs</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small text-center">Other Info</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small text-center">Currency</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small text-center">Approval</p>
            </div>
            
        </div>
        <?php 
        $i=1;
        foreach ($all_rfq as $key => $value) { ?>
        
        <!-- /PURCHASES LIST HEADER -->
       <form method="post" action="<?=base_url()?>company/storerfq" id="rfq_form_<?=$value['id']?>" enctype="multipart/form-data">
        <div class="purchase-item row">
            <div class="row" style="margin-right: 0px; margin-left: 0px;">
              <div class="col-xs-6">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;">
                </div>
                </div>
                <div class="col-xs-6">
                    <p><?=$i?></p>
                </div>  
            </div>
            
           
            <div class="col-xs-2">
               
                    <p class="text-header"><?=$value['item_number']?></p>
                    <p class="description"><?=$value['item_name']?></p>
                
            </div>
             <div class="col-xs-2">
                <input class="form-control" name="expiry_date" type="date" id="example-date-input" value="<?php
                                        $time = strtotime($serverDateTime->format('Y-m-d'));
                                        $final = date("Y-m-d", strtotime("+".$company_settings[0]['RFQ_expiry']." days", $time));
                                     echo $final; ?>">
            </div>
             <div class="col-xs-2" >
               <label class="radio-inline">
                  <input type="radio" name="optradio1" value="public" style="display: block;" class="public_div" checked>Public</label>
                
                <a href="javascript:void(0);" data-href="<?=base_url()?>company/get_rfq_suppliers/?item_id=<?=$value['item_id']?>&pr_id=<?=$value['id']?>" class="openPopup"><label class="radio-inline">
                  <input type="radio" name="optradio1" value="followers" style="display: block;" class="follower_div">Suppliers</label></a>
                  
            </div>
            <div class="col-xs-1" style="padding-left: 13px;">
                
                 <a href="javascript:void(0);" class="btn btn-primary specPop" data-href="<?=base_url()?>company/get_item_spec/?pr_id=<?=$value['id']?>">
                    +
                </a>
            </div>
            <div class="col-xs-2" style="
    padding-left: 40px;
">
                 <div id="image-preview<?=$value['id']?>" class="image-preview">
                  <label for="image-upload<?=$value['id']?>" id="image-label<?=$value['id']?>" class="image-label">+</label>
                  <input type="file" name="image0" id="image-upload<?=$value['id']?>" data-id="<?=$value['id']?>" class="image-upload photo_add" style="width: 0px;"/>
                </div>
            </div>

            <div class="col-xs-1" >
                 <input type="file" class="custom-file-input" name="file1" style="width: 37px;height: 31px;" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, image/*">
            </div>
            <div class="col-xs-1" style="padding-right: 40px;">
              
                 <a href="javascript:void(0);" class="emailPop" data-toggle="modal" data-href="<?=base_url()?>company/get_rfq_email/?pr_id=<?=$value['id']?>">
                  <button type="button" class="btn btn-info email_pop">
                    <span class="glyphicon glyphicon-edit"></span>
                </button>
                </a>
            </div>
            <div class="col-xs-1">
              <select class="form-control" id="sel1" name="currency">
                <option value="1" <?=(isset($company_settings[0]['currency_id']) && !empty($company_settings[0]['currency_id']) && $company_settings[0]['currency_id'] == 1 ) ? 'selected' : ''?>>AUD</option>
                <option value="2" <?=isset($company_settings[0]['currency_id']) && !empty($company_settings[0]['currency_id']) && $company_settings[0]['currency_id'] == 2 ? 'selected' : ''?>>CAD</option>
                <option value="3" <?=isset($company_settings[0]['currency_id']) && !empty($company_settings[0]['currency_id']) && $company_settings[0]['currency_id'] == 3 ? 'selected' : ''?>>EUR</option>
                <option value="4" <?=isset($company_settings[0]['currency_id']) && !empty($company_settings[0]['currency_id']) && $company_settings[0]['currency_id'] == 4 ? 'selected' : ''?>>JPY</option>
                <option value="5" <?=isset($company_settings[0]['currency_id']) && !empty($company_settings[0]['currency_id']) && $company_settings[0]['currency_id'] == 5 ? 'selected' : ''?>>GBP</option>
                <option value="6" <?=isset($company_settings[0]['currency_id']) && !empty($company_settings[0]['currency_id']) && $company_settings[0]['currency_id'] == 6 ? 'selected' : ''?>>USD</option>
                <option value="7" <?=isset($company_settings[0]['currency_id']) && !empty($company_settings[0]['currency_id']) && $company_settings[0]['currency_id'] == 7 ? 'selected' : ''?>>CNY</option>
                <option value="8" <?=isset($company_settings[0]['currency_id']) && !empty($company_settings[0]['currency_id']) && $company_settings[0]['currency_id'] == 8 ? 'selected' : ''?>>SAR</option>
                <option value="9" <?=isset($company_settings[0]['currency_id']) && !empty($company_settings[0]['currency_id']) && $company_settings[0]['currency_id'] == 9 ? 'selected' : ''?>>PKR</option>
              </select>
                
            </div>
            <input type="hidden" name="pr_id" value="<?=$value['id']?>">
            <div class="recommendation-wrap bid_actions col-xs-1">
                    <button type="" data-id="<?=$value['id']?>" class="submitRFQ" >
                        <span class="tick-icon">✓</span></button>
                    <a href="#" class="recommendation bad hoverable open-recommendation-form icon-dectick action "
                    style="" data-method="cancel" data-id="" >
                        <span class="close-icon">✕</span>
                    </a>
                </div>
           
            
        </div>
        </form>
        <?php $i++; } ?>
        <!-- /PURCHASE ITEM -->
      
        
        <!-- /PAGER -->
    </div>
    <!-- /PURCHASES LIST -->

</div>
<!-- DASHBOARD CONTENT -->
<!-- Modal -->
<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="height: 500px;overflow-y: scroll;">
        <div class="modal-content" style="box-shadow: none;border: none;">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Item Specfications
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body" id="spec_modal">
 
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Close
                </button>
                
            </div>
        </div>
    </div>
</div>

<!-- FORM POPUP -->
<!-- Modal -->
<div class="modal fade" id="emailPop" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content" style="box-shadow: none;border: none;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Email Text</h4>
            </div>
            
            <div class="modal-body" id="email_modal">
              
            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            
        </div>
      
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg" >
    
        <!-- Modal content-->
        <div class="modal-content" style="box-shadow: none;border: none;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Suggested Suppliers</h4>
            </div>
            
            <div class="modal-body" id="modal-body">

            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            
        </div>
      
    </div>
</div>