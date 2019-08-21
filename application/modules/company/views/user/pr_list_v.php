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
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">47515-KODIF</p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary">Nut Bolt 4.3mm</p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" value="10000">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="each" selected>Each</option>
                    <option value="kg">Kilogram</option>
                    <option value="ltr">Litres</option>
                    <option value="meter">Meters</option>
                    <option value="dozen">Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="AUD" selected>New</option>
                    <option value="CAD">Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
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
            <div class="purchase-item-date col-lg-1 col-xs-1">
                <p>2</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">47532-PLFDD</p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary">Shoes 7"</p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" value="20">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="each" selected>Each</option>
                    <option value="kg">Kilogram</option>
                    <option value="ltr">Litres</option>
                    <option value="meter">Meters</option>
                    <option value="dozen">Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="AUD" selected>New</option>
                    <option value="CAD">Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
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
            <div class="purchase-item-date col-lg-1 col-xs-1">
                <p>3</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">47549-QWEQE</p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary">CNC machining parts</p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" value="10000">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="each" selected>Each</option>
                    <option value="kg">Kilogram</option>
                    <option value="ltr">Litres</option>
                    <option value="meter">Meters</option>
                    <option value="dozen">Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="AUD" selected>New</option>
                    <option value="CAD">Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
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
            <div class="purchase-item-date col-lg-1 col-xs-1">
                <p>4</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">47566-TRRGR</p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary">knuckles</p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" value="30">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="each" selected>Each</option>
                    <option value="kg">Kilogram</option>
                    <option value="ltr">Litres</option>
                    <option value="meter">Meters</option>
                    <option value="dozen">Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="AUD" selected>New</option>
                    <option value="CAD">Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
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
            <div class="purchase-item-date col-lg-1 col-xs-1">
                <p>5</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">47583-IUIYY</p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary">Lubricant</p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" value="10">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="each" >Each</option>
                    <option value="kg" selected>Kilogram</option>
                    <option value="ltr">Litres</option>
                    <option value="meter">Meters</option>
                    <option value="dozen">Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="AUD" selected>New</option>
                    <option value="CAD">Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
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
            <div class="purchase-item-date col-lg-1 col-xs-1">
                <p>6</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">47600-YUYHH</p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary">Grease</p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" value="5">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="each" >Each</option>
                    <option value="kg" selected>Kilogram</option>
                    <option value="ltr">Litres</option>
                    <option value="meter">Meters</option>
                    <option value="dozen">Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="AUD" selected>New</option>
                    <option value="CAD">Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
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
            <div class="purchase-item-date col-lg-1 col-xs-1">
                <p>7</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">47617-YTTRE</p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary">Coolant</p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" value="20">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="each">Each</option>
                    <option value="kg">Kilogram</option>
                    <option value="ltr" selected>Litres</option>
                    <option value="meter">Meters</option>
                    <option value="dozen">Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="AUD" selected>New</option>
                    <option value="CAD">Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
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
            <div class="purchase-item-date col-lg-1 col-xs-1">
                <p>8</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">47634-HGHGR</p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary">Ball bearing</p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" value="5000">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="each" selected>Each</option>
                    <option value="kg">Kilogram</option>
                    <option value="ltr">Litres</option>
                    <option value="meter">Meters</option>
                    <option value="dozen">Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="AUD" selected>New</option>
                    <option value="CAD">Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
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
            <div class="purchase-item-date col-lg-1 col-xs-1">
                <p>9</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">47651-TUTJT</p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary">Air Nozzle Button</p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" value="10">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="each" selected>Each</option>
                    <option value="kg">Kilogram</option>
                    <option value="ltr">Litres</option>
                    <option value="meter">Meters</option>
                    <option value="dozen">Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="AUD" selected>New</option>
                    <option value="CAD">Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
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
            <div class="purchase-item-date col-lg-1 col-xs-1">
                <p>10</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">47668-TYTYT</p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary">Metal Die Casting</p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" value="30">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="each" selected>Each</option>
                    <option value="kg">Kilogram</option>
                    <option value="ltr">Litres</option>
                    <option value="meter">Meters</option>
                    <option value="dozen">Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="AUD" selected>New</option>
                    <option value="CAD">Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
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
            <div class="purchase-item-date col-lg-1 col-xs-1">
                <p>11</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">47685-IUIU</p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary">disc liner</p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" value="50">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="each" selected>Each</option>
                    <option value="kg">Kilogram</option>
                    <option value="ltr">Litres</option>
                    <option value="meter">Meters</option>
                    <option value="dozen">Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="AUD" selected>New</option>
                    <option value="CAD">Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
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
            <div class="purchase-item-date col-lg-1 col-xs-1">
                <p>12</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">47702-ERERT</p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary">Hydraulic Breaker</p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" value="5">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="each" selected>Each</option>
                    <option value="kg">Kilogram</option>
                    <option value="ltr">Litres</option>
                    <option value="meter">Meters</option>
                    <option value="dozen">Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="AUD" selected>New</option>
                    <option value="CAD">Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
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
            <div class="purchase-item-date col-lg-1 col-xs-1">
                <p>13</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">47719-YTYTW</p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary">hydraulic rock breaker </p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" value="1">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="each" selected>Each</option>
                    <option value="kg">Kilogram</option>
                    <option value="ltr">Litres</option>
                    <option value="meter">Meters</option>
                    <option value="dozen">Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="AUD" selected>New</option>
                    <option value="CAD">Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
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
            <div class="purchase-item-date col-lg-1 col-xs-1">
                <p>14</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">47736-TRTNN</p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary">Hydraulic gearbox PC220-8</p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" value="5">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="each" selected>Each</option>
                    <option value="kg">Kilogram</option>
                    <option value="ltr">Litres</option>
                    <option value="meter">Meters</option>
                    <option value="dozen">Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="AUD" selected>New</option>
                    <option value="CAD">Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
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
            <div class="purchase-item-date col-lg-1 col-xs-1">
                <p>15</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">47753-MBBVV</p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary">Customized Water Pump</p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" value="5">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="each" selected>Each</option>
                    <option value="kg">Kilogram</option>
                    <option value="ltr">Litres</option>
                    <option value="meter">Meters</option>
                    <option value="dozen">Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="AUD" >New</option>
                    <option value="CAD" selected>Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
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
            <div class="purchase-item-date col-lg-1 col-xs-1">
                <p>16</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">47770-HYHIO</p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary">Zinc Die Casting</p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" value="20">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="each" selected>Each</option>
                    <option value="kg">Kilogram</option>
                    <option value="ltr">Litres</option>
                    <option value="meter">Meters</option>
                    <option value="dozen">Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="AUD" >New</option>
                    <option value="CAD" selected>Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
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
            <div class="purchase-item-date col-lg-1 col-xs-1">
                <p>17</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">47787-HHDDA</p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary">Milling Turning Parts</p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" value="10">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="each" selected>Each</option>
                    <option value="kg">Kilogram</option>
                    <option value="ltr">Litres</option>
                    <option value="meter">Meters</option>
                    <option value="dozen">Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="AUD" >New</option>
                    <option value="CAD" selected>Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
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
            <div class="purchase-item-date col-lg-1 col-xs-1">
                <p>18</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">47804-FEEWV</p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary">wallets</p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" value="100">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="each" selected>Each</option>
                    <option value="kg">Kilogram</option>
                    <option value="ltr">Litres</option>
                    <option value="meter">Meters</option>
                    <option value="dozen">Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="AUD" >New</option>
                    <option value="CAD" selected>Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
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
            <div class="purchase-item-date col-lg-1 col-xs-1">
                <p>19</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">47821-BGBGD</p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary">stepping motor Driver</p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" value="2">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="each" selected>Each</option>
                    <option value="kg">Kilogram</option>
                    <option value="ltr">Litres</option>
                    <option value="meter">Meters</option>
                    <option value="dozen">Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="AUD" selected>New</option>
                    <option value="CAD" >Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
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
            <div class="purchase-item-date col-lg-1 col-xs-1">
                <p>20</p>
            </div>
           
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="#"><p class="category primary">47838-BJGHG</p></a>
            </div>
             <div class="purchase-item-info col-xs-3 visible-lg">
                <a href="#"><p class="category primary">Modular Plastic Conveyor belt</p></a>
            </div>

            <div class="purchase-item-download col-xs-2">
                 <input type="number" name="Quantity" value="3">
            </div>
            <div class="purchase-item-download col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="each" selected>Each</option>
                    <option value="kg">Kilogram</option>
                    <option value="ltr">Litres</option>
                    <option value="meter">Meters</option>
                    <option value="dozen">Dozens</option>
                  </select>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-2">
                 <select class="form-control" id="sel1">
                    <option value="AUD" selected>New</option>
                    <option value="CAD" >Used</option>
                  </select>
            </div>
            
            <div class="recommendation-wrap bid_actions col-xs-2">
                   
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