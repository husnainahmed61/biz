<?php
//print_r($single_item);
?>
<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline simple primary col-sm-12">
        <h4><?=isset($single_item[0]['id']) && !empty($single_item[0]['id']) ? 'Update' : 'Add'?> Item</h4>
    </div>
    <!-- /HEADLINE -->

    <!-- FORM BOX ITEMS -->
    <div class="upload-content-cs">
        <div class="">
            <div class="col-xl-9 col-12">
                <div class="form-box-items left full-width">
                    <!-- FORM BOX ITEM -->
                    <div class="form-box-item">
                        <div class="">
                            <form id="item_form" class="row create-auction-form" method="POST" action="<?= base_url('company/storeInventory')?>" enctype="multipart/form-data">
                                <!-- INPUT CONTAINER -->
                                
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="category" class="rl-label required">Select Category </label>
                                    <label for="category" class="select-block">
                                        <select data-live-search="true" id="input-category3" name="category_3" class="form-control" selected-value="<?=isset($single_item[0]['cat3_id']) && !empty($single_item[0]['cat3_id']) ? $single_item[0]['cat3_id'] : ''?>">

                                        </select>
                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </label>
                                </div>
                                <!-- /INPUT CONTAINER -->

                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="item_name" class="rl-label required">Name of the Item (Max 40 Characters)</label>
                                    <input type="text" id="input-title" placeholder="Item Title" name="title" value="<?=isset($single_item[0]['item_name']) && !empty($single_item[0]['item_name']) ? $single_item[0]['item_name'] : ''?>">
                                </div>
                                <!-- /INPUT CONTAINER -->
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="item_name" class="rl-label required">Item Number (Max 40 Characters)</label>
                                    <input type="text" id="input-title" placeholder="Item Number" name="item_number" value="<?=isset($single_item[0]['item_number']) && !empty($single_item[0]['item_number']) ? $single_item[0]['item_number'] : ''?>">
                                </div>
                                <!-- /INPUT CONTAINER -->
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="vr" class="rl-label required">Quantity Unit</label>
                                    <label for="vr" class="select-block">
                                        <select id="input-quantity_unit" name="quantity_unit">
                                            <option value="each" <?=isset($single_item[0]['qty_unit']) && !empty($single_item[0]['qty_unit']) && $single_item[0]['qty_unit'] == 'each' ? 'selected' : ''?>>Each</option>
                                            <option value="kg" <?=isset($single_item[0]['qty_unit']) && !empty($single_item[0]['qty_unit']) && $single_item[0]['qty_unit'] == 'kg' ? 'selected' : ''?>>Kilogram</option>
                                            <option value="ltr" <?=isset($single_item[0]['qty_unit']) && !empty($single_item[0]['qty_unit']) && $single_item[0]['qty_unit'] == 'ltr' ? 'selected' : ''?>>Litres</option>
                                            <option value="meter" <?=isset($single_item[0]['qty_unit']) && !empty($single_item[0]['qty_unit']) && $single_item[0]['qty_unit'] == 'meter' ? 'selected' : ''?>>Meters</option>
                                            <option value="dozen" <?=isset($single_item[0]['qty_unit']) && !empty($single_item[0]['qty_unit']) && $single_item[0]['qty_unit'] == 'dozen' ? 'selected' : ''?>>Dozens</option>
                                        </select>
                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </label>
                                </div>
                                <!-- /INPUT CONTAINER -->  
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12">
                                    <label for="item_description" class="rl-label required">Item Description</label>
                                    <textarea id="confirm_comment" name="description" placeholder="Enter item description here..."><?=isset($single_item[0]['item_desc']) && !empty($single_item[0]['item_desc']) ? $single_item[0]['item_desc'] : ''?></textarea>
                                </div>
                                <input type="hidden" name="id" value="<?=isset($single_item[0]['id']) && !empty($single_item[0]['id']) ? $single_item[0]['id'] : ''?>">
                               

                                                            
                              
                                <hr class="line-separator">
                                <div class=" col-xs-12">
                                    <button type="Submit" class="button big dark"><?=isset($single_item[0]['id']) && !empty($single_item[0]['id']) ? 'Update' : 'Add'?> <span class="primary">Item</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /FORM BOX ITEM -->
                </div>
            </div>
            <!-- /FORM BOX ITEMS -->
        </div>
    </div>
    <!-- /FORM BOX ITEMS -->

    <div class="clearfix"></div>
</div>