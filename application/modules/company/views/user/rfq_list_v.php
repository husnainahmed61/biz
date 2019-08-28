<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 11/27/2018
 * Time: 12:44 AM
 */
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
      margin-left: 7px;
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
  width: 26px;
  height: 24px;
  font-size: 12px;
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
                <p class="text-header small">Item Detail</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small text-center ">Expiry Date</p>
            </div>
            <div class="col-xs-3">
                <p class="text-header small text-center">Suggested Suppliers</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small text-center">Image</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small text-center">Attach Document</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small text-center">Email</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small text-center">Currency</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small text-center">Approval</p>
            </div>
            
        </div>
        <!-- /PURCHASES LIST HEADER -->
       
        <div class="purchase-item row">
            <div class="row" style="margin-right: 0px; margin-left: 0px;">
              <div class="col-xs-6">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;">
                </div>
                </div>
                <div class="col-xs-6">
                    <p>1</p>
                </div>  
            </div>
            
           
            <div class="purchase-item-info col-xs-2 visible-lg">
               
                    <p class="text-header">47515-KODIF</p>
                    <p class="description">Nut Bolt 4.3mm</p>
                
            </div>
             <div class="purchase-item-info col-xs-2">
                <input class="form-control" type="date" id="example-date-input">
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg ">
               <label class="radio-inline">
                  <input type="radio" name="optradio1" style="display: block;" class="public_div" checked>Public
                </label>
                <label class="radio-inline">
                  <input type="radio" name="optradio1" style="display: block;" class="follower_div">Suppliers
                </label>
                <a href="#message-popup" id="message-pop" data-mfp-src="#message-popup" class="titleee">
                    </a>
                  
            </div>
            <div class="col-xs-2">
                 <div id="image-preview1" class="image-preview">
                  <label for="image-upload1" id="image-label1" class="image-label">+</label>
                  <input type="file" name="image0" id="image-upload1" class="image-upload" style="width: 0px;"/>
                </div>
            </div>
            <div class="col-xs-1">
                 <button type="button" class="btn btn-info">
                    <span class="glyphicon glyphicon-cloud-upload"></span>
                </button>
            </div>
            <div class="col-xs-1">
                 <button type="button" class="btn btn-info email_pop">
                    <span class="glyphicon glyphicon-edit"></span>
                </button>
                <a href="#email-popup" id="email-pop" data-mfp-src="#email-popup" class="email-pop">
                    </a>
            </div>
            <div class="col-xs-1">
              <select class="form-control" id="sel1">
                <option value="AUD">AUD</option>
                <option value="CAD">CAD</option>
                <option value="EUR">EUR</option>
                <option value="JPY">JPY</option>
                <option value="GBP">GBP</option>
                <option value="USD">USD</option>
                <option value="CNY">CNY</option>
                <option value="SAR">SAR</option>
                <option value="PKR" selected="">PKR</option>
              </select>
                
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

        <!-- /PURCHASE ITEM -->
        <!-- /PURCHASES LIST HEADER -->
       
        <div class="purchase-item row">
            <div class="row" style="margin-right: 0px; margin-left: 0px;">
              <div class="col-xs-6">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;">
                </div>
                </div>
                <div class="col-xs-6">
                    <p>2</p>
                </div>  
            </div>
            
           
            <div class="purchase-item-info col-xs-2 visible-lg">
               
                    <p class="text-header">47532-PLFDD</p>
                    <p class="description">Shoes 7"</p>
                
            </div>
             <div class="purchase-item-info col-xs-2">
                <input class="form-control" type="date" id="example-date-input">
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg ">
               <label class="radio-inline">
                  <input type="radio" name="optradio2" style="display: block;" class="public_div" checked>Public
                </label>
                <label class="radio-inline">
                  <input type="radio" name="optradio2" style="display: block;" class="follower_div2">Suppliers
                </label>
                <a href="#message-popup2" id="message-pop2" data-mfp-src="#message-popup2" class="titleee2">
                    </a>
                  
            </div>
            <div class="col-xs-2">
                 <div id="image-preview1" class="image-preview">
                  <label for="image-upload1" id="image-label1" class="image-label">+</label>
                  <input type="file" name="image0" id="image-upload1" class="image-upload" style="width: 0px;"/>
                </div>
            </div>
            <div class="col-xs-1">
                 <button type="button" class="btn btn-info">
                    <span class="glyphicon glyphicon-cloud-upload"></span>
                </button>
            </div>
            <div class="col-xs-1">
                 <button type="button" class="btn btn-info email_pop">
                    <span class="glyphicon glyphicon-edit"></span>
                </button>
                <a href="#email-popup" id="email-pop" data-mfp-src="#email-popup" class="email-pop">
                    </a>
            </div>
            <div class="col-xs-1">
              <select class="form-control" id="sel1">
                <option value="AUD">AUD</option>
                <option value="CAD">CAD</option>
                <option value="EUR">EUR</option>
                <option value="JPY">JPY</option>
                <option value="GBP">GBP</option>
                <option value="USD">USD</option>
                <option value="CNY">CNY</option>
                <option value="SAR">SAR</option>
                <option value="PKR" selected="">PKR</option>
              </select>
                
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

        <!-- /PURCHASE ITEM -->
        <!-- /PURCHASES LIST HEADER -->
       
        <div class="purchase-item row">
            <div class="row" style="margin-right: 0px; margin-left: 0px;">
              <div class="col-xs-6">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;">
                </div>
                </div>
                <div class="col-xs-6">
                    <p>3</p>
                </div>  
            </div>
            
           
            <div class="purchase-item-info col-xs-2 visible-lg">
               
                    <p class="text-header">47549-QWEQE</p>
                    <p class="description">CNC machining parts</p>
                
            </div>
             <div class="purchase-item-info col-xs-2">
                <input class="form-control" type="date" id="example-date-input">
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg ">
               <label class="radio-inline">
                  <input type="radio" name="optradio3" style="display: block;" class="public_div" checked>Public
                </label>
                <label class="radio-inline">
                  <input type="radio" name="optradio3" style="display: block;" class="follower_div3">Suppliers
                </label>
                <a href="#message-popup3" id="message-pop3" data-mfp-src="#message-popup3" class="titleee3">
                    </a>
                  
            </div>
            <div class="col-xs-2">
                 <div id="image-preview1" class="image-preview">
                  <label for="image-upload1" id="image-label1" class="image-label">+</label>
                  <input type="file" name="image0" id="image-upload1" class="image-upload" style="width: 0px;"/>
                </div>
            </div>
            <div class="col-xs-1">
                 <button type="button" class="btn btn-info">
                    <span class="glyphicon glyphicon-cloud-upload"></span>
                </button>
            </div>
            <div class="col-xs-1">
                 <button type="button" class="btn btn-info email_pop">
                    <span class="glyphicon glyphicon-edit"></span>
                </button>
                <a href="#email-popup" id="email-pop" data-mfp-src="#email-popup" class="email-pop">
                    </a>
            </div>
            <div class="col-xs-1">
              <select class="form-control" id="sel1">
                <option value="AUD">AUD</option>
                <option value="CAD">CAD</option>
                <option value="EUR">EUR</option>
                <option value="JPY">JPY</option>
                <option value="GBP">GBP</option>
                <option value="USD">USD</option>
                <option value="CNY">CNY</option>
                <option value="SAR">SAR</option>
                <option value="PKR" selected="">PKR</option>
              </select>
                
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

        <!-- /PURCHASE ITEM -->
        <!-- /PURCHASES LIST HEADER -->
       
        <div class="purchase-item row">
            <div class="row" style="margin-right: 0px; margin-left: 0px;">
              <div class="col-xs-6">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;">
                </div>
                </div>
                <div class="col-xs-6">
                    <p>4</p>
                </div>  
            </div>
            
           
            <div class="purchase-item-info col-xs-2 visible-lg">
               
                    <p class="text-header">47566-TRRGR</p>
                    <p class="description">knuckles</p>
                
            </div>
             <div class="purchase-item-info col-xs-2">
                <input class="form-control" type="date" id="example-date-input">
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg ">
               <label class="radio-inline">
                  <input type="radio" name="optradio4" style="display: block;" class="public_div" checked>Public
                </label>
                <label class="radio-inline">
                  <input type="radio" name="optradio4" style="display: block;" class="follower_div4">Suppliers
                </label>
                <a href="#message-popup4" id="message-pop4" data-mfp-src="#message-popup4" class="titleee4">
                    </a>
                  
            </div>
            <div class="col-xs-2">
                 <div id="image-preview1" class="image-preview">
                  <label for="image-upload1" id="image-label1" class="image-label">+</label>
                  <input type="file" name="image0" id="image-upload1" class="image-upload" style="width: 0px;"/>
                </div>
            </div>
            <div class="col-xs-1">
                 <button type="button" class="btn btn-info">
                    <span class="glyphicon glyphicon-cloud-upload"></span>
                </button>
            </div>
            <div class="col-xs-1">
                 <button type="button" class="btn btn-info email_pop">
                    <span class="glyphicon glyphicon-edit"></span>
                </button>
                <a href="#email-popup" id="email-pop" data-mfp-src="#email-popup" class="email-pop">
                    </a>
            </div>
            <div class="col-xs-1">
              <select class="form-control" id="sel1">
                <option value="AUD">AUD</option>
                <option value="CAD">CAD</option>
                <option value="EUR">EUR</option>
                <option value="JPY">JPY</option>
                <option value="GBP">GBP</option>
                <option value="USD">USD</option>
                <option value="CNY">CNY</option>
                <option value="SAR">SAR</option>
                <option value="PKR" selected="">PKR</option>
              </select>
                
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

        <!-- /PURCHASE ITEM -->
        <!-- /PURCHASES LIST HEADER -->
       
        <div class="purchase-item row">
            <div class="row" style="margin-right: 0px; margin-left: 0px;">
              <div class="col-xs-6">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" style="display: block;">
                </div>
                </div>
                <div class="col-xs-6">
                    <p>5</p>
                </div>  
            </div>
            
           
            <div class="purchase-item-info col-xs-2 visible-lg">
               
                    <p class="text-header">47583-IUIYY</p>
                    <p class="description">Lubricant</p>
                
            </div>
             <div class="purchase-item-info col-xs-2">
                <input class="form-control" type="date" id="example-date-input">
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg ">
               <label class="radio-inline">
                  <input type="radio" name="optradio5" style="display: block;" class="public_div" checked>Public
                </label>
                <label class="radio-inline">
                  <input type="radio" name="optradio5" style="display: block;" class="follower_div5">Suppliers
                </label>
                <a href="#message-popup5" id="message-pop5" data-mfp-src="#message-popup5" class="titleee5">
                    </a>
                  
            </div>
            <div class="col-xs-2">
                 <div id="image-preview1" class="image-preview">
                  <label for="image-upload1" id="image-label1" class="image-label">+</label>
                  <input type="file" name="image0" id="image-upload1" class="image-upload" style="width: 0px;"/>
                </div>
            </div>
            <div class="col-xs-1">
                 <button type="button" class="btn btn-info">
                    <span class="glyphicon glyphicon-cloud-upload"></span>
                </button>
            </div>
            <div class="col-xs-1">
                 <button type="button" class="btn btn-info email_pop">
                    <span class="glyphicon glyphicon-edit"></span>
                </button>
                <a href="#email-popup" id="email-pop" data-mfp-src="#email-popup" class="email-pop">
                    </a>
            </div>
            <div class="col-xs-1">
              <select class="form-control" id="sel1">
                <option value="AUD">AUD</option>
                <option value="CAD">CAD</option>
                <option value="EUR">EUR</option>
                <option value="JPY">JPY</option>
                <option value="GBP">GBP</option>
                <option value="USD">USD</option>
                <option value="CNY">CNY</option>
                <option value="SAR">SAR</option>
                <option value="PKR" selected="">PKR</option>
              </select>
                
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

        <!-- /PURCHASE ITEM -->
        
        <!-- /PAGER -->
    </div>
    <!-- /PURCHASES LIST -->

</div>
<!-- DASHBOARD CONTENT -->
<!-- FORM POPUP -->
<div id="message-popup" class="form-popup mfp-hide">
    

    <!-- FORM POPUP CONTENT -->
    <div class="form-popup-content">
        <h4 class="popup-title">Select suppliers</h4>
        <!-- LINE SEPARATOR -->
        <hr class="line-separator short">
        <!-- /LINE SEPARATOR -->
        <p class="spaced"></p>

  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <div id="table-wrapper">
    <div id="table-scroll">
       <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Suppliers List</th>
        
      </tr>
    </thead>
    <tbody id="myTable">
      <tr>
        <td>
            <div class="funkyradio-info">    
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" checked />Robert Bosch GmbH</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" checked />Denso Corp</label>
            </div></td>
       
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" checked />Magna International Inc</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Continental AG</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>ZF Friedrichshafen AG</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Aisin Seiki Co.</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Hyundai Mobis</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Lear Corp</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Valeo SA</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Yazaki Corp.</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Panasonic Automotive Co</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Sumitomo Electric Industries</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Thyssenkrupp AG</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>BASF SE</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Autoliv Inc.</label>
            </div></td>
        
      </tr>
    </tbody>
  </table>
    </div>
  </div>
 
       
        <hr class="line-separator short">
        <!-- /LINE SEPARATOR -->
        <div id="restore-pwd-form">
            <input type="hidden" name="auctioneer_id" value="" id="auctioneer_id_message">
            <input type="hidden" name="auction_id" value="" id="auction_id_message">
            <button class="button mid dark no-space send_message">Save <span class="primary">Now</span></button>
        </div>
    </div>
    <!-- /FORM POPUP CONTENT -->
</div>
<!-- /FORM POPUP -->
<div id="message-popup2" class="form-popup mfp-hide">
    

    <!-- FORM POPUP CONTENT -->
    <div class="form-popup-content">
        <h4 class="popup-title">Select suppliers</h4>
        <!-- LINE SEPARATOR -->
        <hr class="line-separator short">
        <!-- /LINE SEPARATOR -->
        <p class="spaced"></p>

  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <div id="table-wrapper">
    <div id="table-scroll">
       <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Suppliers List</th>
        
      </tr>
    </thead>
    <tbody id="myTable">
      <tr>
        <td>
            <div class="funkyradio-info">    
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"  />Robert Bosch GmbH</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" />Denso Corp</label>
            </div></td>
       
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"  />Magna International Inc</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" checked/>Continental AG</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" checked/>ZF Friedrichshafen AG</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" checked/>Aisin Seiki Co.</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Hyundai Mobis</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Lear Corp</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Valeo SA</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Yazaki Corp.</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Panasonic Automotive Co</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Sumitomo Electric Industries</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Thyssenkrupp AG</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>BASF SE</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Autoliv Inc.</label>
            </div></td>
        
      </tr>
    </tbody>
  </table>
    </div>
  </div>
 
       
        <hr class="line-separator short">
        <!-- /LINE SEPARATOR -->
        <div id="restore-pwd-form">
            <input type="hidden" name="auctioneer_id" value="" id="auctioneer_id_message">
            <input type="hidden" name="auction_id" value="" id="auction_id_message">
            <button class="button mid dark no-space send_message">Save <span class="primary">Now</span></button>
        </div>
    </div>
    <!-- /FORM POPUP CONTENT -->
</div>
<!-- /FORM POPUP -->
<div id="message-popup3" class="form-popup mfp-hide">
    

    <!-- FORM POPUP CONTENT -->
    <div class="form-popup-content">
        <h4 class="popup-title">Select suppliers</h4>
        <!-- LINE SEPARATOR -->
        <hr class="line-separator short">
        <!-- /LINE SEPARATOR -->
        <p class="spaced"></p>

  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <div id="table-wrapper">
    <div id="table-scroll">
       <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Suppliers List</th>
        
      </tr>
    </thead>
    <tbody id="myTable">
      <tr>
        <td>
            <div class="funkyradio-info">    
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"  />Robert Bosch GmbH</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" />Denso Corp</label>
            </div></td>
       
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"  />Magna International Inc</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" />Continental AG</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" />ZF Friedrichshafen AG</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" />Aisin Seiki Co.</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" checked/>Hyundai Mobis</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" checked/>Lear Corp</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" checked/>Valeo SA</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Yazaki Corp.</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Panasonic Automotive Co</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Sumitomo Electric Industries</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Thyssenkrupp AG</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>BASF SE</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Autoliv Inc.</label>
            </div></td>
        
      </tr>
    </tbody>
  </table>
    </div>
  </div>
 
       
        <hr class="line-separator short">
        <!-- /LINE SEPARATOR -->
        <div id="restore-pwd-form">
            <input type="hidden" name="auctioneer_id" value="" id="auctioneer_id_message">
            <input type="hidden" name="auction_id" value="" id="auction_id_message">
            <button class="button mid dark no-space send_message">Save <span class="primary">Now</span></button>
        </div>
    </div>
    <!-- /FORM POPUP CONTENT -->
</div>
<!-- /FORM POPUP -->
<div id="message-popup4" class="form-popup mfp-hide">
    

    <!-- FORM POPUP CONTENT -->
    <div class="form-popup-content">
        <h4 class="popup-title">Select suppliers</h4>
        <!-- LINE SEPARATOR -->
        <hr class="line-separator short">
        <!-- /LINE SEPARATOR -->
        <p class="spaced"></p>

  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <div id="table-wrapper">
    <div id="table-scroll">
       <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Suppliers List</th>
        
      </tr>
    </thead>
    <tbody id="myTable">
      <tr>
        <td>
            <div class="funkyradio-info">    
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"  />Robert Bosch GmbH</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" />Denso Corp</label>
            </div></td>
       
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"  />Magna International Inc</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" />Continental AG</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" />ZF Friedrichshafen AG</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" />Aisin Seiki Co.</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Hyundai Mobis</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Lear Corp</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Valeo SA</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" checked/>Yazaki Corp.</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" checked/>Panasonic Automotive Co</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" checked/>Sumitomo Electric Industries</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Thyssenkrupp AG</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>BASF SE</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Autoliv Inc.</label>
            </div></td>
        
      </tr>
    </tbody>
  </table>
    </div>
  </div>
 
       
        <hr class="line-separator short">
        <!-- /LINE SEPARATOR -->
        <div id="restore-pwd-form">
            <input type="hidden" name="auctioneer_id" value="" id="auctioneer_id_message">
            <input type="hidden" name="auction_id" value="" id="auction_id_message">
            <button class="button mid dark no-space send_message">Save <span class="primary">Now</span></button>
        </div>
    </div>
    <!-- /FORM POPUP CONTENT -->
</div>
<!-- /FORM POPUP -->
<!-- /FORM POPUP -->
<div id="message-popup5" class="form-popup mfp-hide">
    

    <!-- FORM POPUP CONTENT -->
    <div class="form-popup-content">
        <h4 class="popup-title">Select suppliers</h4>
        <!-- LINE SEPARATOR -->
        <hr class="line-separator short">
        <!-- /LINE SEPARATOR -->
        <p class="spaced"></p>

  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <div id="table-wrapper">
    <div id="table-scroll">
       <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Suppliers List</th>
        
      </tr>
    </thead>
    <tbody id="myTable">
      <tr>
        <td>
            <div class="funkyradio-info">    
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"  />Robert Bosch GmbH</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" />Denso Corp</label>
            </div></td>
       
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"  />Magna International Inc</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" />Continental AG</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" />ZF Friedrichshafen AG</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" />Aisin Seiki Co.</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Hyundai Mobis</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Lear Corp</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Valeo SA</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Yazaki Corp.</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Panasonic Automotive Co</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;"/>Sumitomo Electric Industries</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" checked/>Thyssenkrupp AG</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" checked/>BASF SE</label>
            </div></td>
        
      </tr>
      <tr>
        <td>
            <div class="funkyradio-info">
                <label for="checkbox1" class="checkbox-inline"><input type="checkbox" name="checkbox" id="checkbox1" style="display: block;" checked/>Autoliv Inc.</label>
            </div></td>
        
      </tr>
    </tbody>
  </table>
    </div>
  </div>
 
       
        <hr class="line-separator short">
        <!-- /LINE SEPARATOR -->
        <div id="restore-pwd-form">
            <input type="hidden" name="auctioneer_id" value="" id="auctioneer_id_message">
            <input type="hidden" name="auction_id" value="" id="auction_id_message">
            <button class="button mid dark no-space send_message">Save <span class="primary">Now</span></button>
        </div>
    </div>
    <!-- /FORM POPUP CONTENT -->
</div>
<!-- /FORM POPUP -->
<!-- FORM POPUP -->
<div id="email-popup" class="form-popup mfp-hide">
    

    <!-- FORM POPUP CONTENT -->
    <div class="form-popup-content">
        
        <!-- /LINE SEPARATOR -->
        <p class="spaced"></p>
        <div class="input-container">
                    <label for="message" class="rl-label b-label required">Your Email Text:</label>
                    <textarea id="message_box" name="message_box" placeholder="Write your message here..."></textarea>
                </div>
        <div id="restore-pwd-form">
            <input type="hidden" name="auctioneer_id" value="" id="auctioneer_id_message">
            <input type="hidden" name="auction_id" value="" id="auction_id_message">
            <button class="button mid dark no-space send_message">Save <span class="primary">Now</span></button>
        </div>
    </div>
    <!-- /FORM POPUP CONTENT -->
</div>
<!-- /FORM POPUP -->