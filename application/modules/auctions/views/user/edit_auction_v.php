<?php

// echo "i m edit";
?>

<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline simple primary col-sm-12">
        <h4>Edit Ad</h4>
    </div>
    <!-- /HEADLINE -->

    <!-- FORM BOX ITEMS -->
    <div class="upload-content-cs">
        <div class="">
            <div class="col-xl-9 col-12">
                <div class="form-box-items left full-width">
                    <!-- FORM BOX ITEM -->
                    <div class="form-box-item">
                        <h4>Item Specifications</h4>
                        <hr class="line-separator">
                        <div class="">
                            <form id="upload_form" class="row create-auction-form" method="POST" action="<?= base_url('auction/storeAuction')?>" enctype="multipart/form-data">
                                <!-- INPUT CONTAINER -->
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 radio-btn-cs">
                                    <label class="rl-label required">Ad Type </label>
                                    <input type="hidden" value="<?=$auction['id']?>" name="ad_id">
                                    
                                    <!-- RADIO -->
                                    <input type="radio" id="paypal" name="ad_type" value="sa" <?=($auction['type'] == "sell") ? "checked" : '' ?>>
                                    <label for="paypal">
                                        <span class="radio primary"><span></span></span>
                                        Selling Auction
                                    </label>
                                    <!-- /RADIO -->

                                    <!-- RADIO -->
                                    <input type="radio" id="skrill" name="ad_type" value="bp" <?=($auction['type'] == "buy") ? "checked" : '' ?>>
                                    <label for="skrill">
                                        <span class="radio primary"><span></span></span>
                                        Buying Post
                                    </label>
                                    <!-- /RADIO -->
                                </div>
                                <!-- /INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="category" class="rl-label required">Category 1</label>
                                    <label for="category" class="select-block">
                                        <select class="" id="input-category1" name="category_1" style="" data-live-search="true" title="Select Category 1">
                                        <option></option>
                                        <option value="<?=$auction['category1_id']?>" selected="selected"><?=$auction['cat1_name']?></option> 
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
                                    <label for="category" class="rl-label required">Category 2</label>
                                    <label for="category" class="select-block">
                                        <select id="input-category2" name="category_2" data-live-search="true" title="Select Category 2">
                                            <option></option>
                                            <option value="<?=$auction['category2_id']?>" selected="selected"><?=$auction['cat2_name']?></option>
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
                                    <label for="category" class="rl-label required">Category 3</label>
                                    <label for="category" class="select-block">
                                        <select data-live-search="true" id="input-category3" name="category_3"  title="Select Category 3">
                                            <option></option>
                                            <option value="<?=$auction['category3_id']?>" selected="selected"><?=$auction['cat3_name']?></option>
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
                                    <input type="text" id="input-title" placeholder="Item Title" name="title" value="<?=($auction['name']) ? $auction['name'] : '' ?>">
                                </div>
                                <!-- /INPUT CONTAINER -->

                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12">
                                    <label for="item_description" class="rl-label required">Item Description</label>
                                    <textarea id="confirm_comment" name="description" placeholder="Enter item description here..." ><?=($auction['description']) ? $auction['description'] : '' ?></textarea>
                                </div>
                                <!-- /INPUT CONTAINER -->
                                <div class="input-container col-xs-12 radio-btn-cs">
                                    <label class="rl-label required">Condition</label>
                                    <!-- RADIO -->
                                    <input type="radio" id="input-new" name="condition" value="new" <?=($auction['condition'] == "new") ? "checked" : '' ?>>
                                    <label for="input-new">
                                        <span class="radio primary"><span></span></span>
                                        New
                                    </label>
                                    <!-- /RADIO -->

                                    <!-- RADIO -->
                                    <input type="radio" id="input-used" name="condition" value="used" <?=($auction['condition'] == "used") ? "checked" : '' ?>>
                                    <label for="input-used">
                                        <span class="radio primary"><span></span></span>
                                        Used
                                    </label>
                                    <!-- /RADIO -->
                                </div>

                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="vr" class="rl-label required">Quantity Unit</label>
                                    <label for="vr" class="select-block">
                                        <select id="input-quantity_unit" name="quantity_unit">
                                            <option value="each" <?=($auction['qty_unit'] == "each") ? "selected" : '' ?>>Each</option>
                                            <option value="kg" <?=($auction['qty_unit'] == "kg") ? "selected" : '' ?>>Kilogram</option>
                                            <option value="ltr" <?=($auction['qty_unit'] == "ltr") ? "selected" : '' ?>>Litres</option>
                                            <option value="meter" <?=($auction['qty_unit'] == "meter") ? "selected" : '' ?>>Meters</option>
                                            <option value="dozen" <?=($auction['qty_unit'] == "dozen") ? "selected" : '' ?>>Dozens</option>
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
                                    <label for="files_included" class="rl-label required">Quantity</label>
                                    <input type="number" id="input-quantity" name="quantity" placeholder="Enter item quantity here..." required min="1" value="<?=($auction['qty']) ? $auction['qty'] : '' ?>">
                                </div>
                                <!-- /INPUT CONTAINER -->
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="vr" class="rl-label required">Post Currency</label>
                                    <label for="vr" class="select-block">
                                        <select id="input-post_currency" name="post_currency">
                                           <?php if(!empty($currencies)){
                                                foreach($currencies as $currency){
                                              ?>
                                                <option value="<?=$currency['name']?>" <?=($auction['currency'] == $currency['name']) ? "selected" : '' ?>><?=$currency['name']?></option>
                                            <?php }} ?>
                                        </select>
                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </label>
                                </div>
                                <!-- /INPUT CONTAINER -->

                                <div class="input-container col-xs-12 radio-btn-cs">
                                    <label class="rl-label required">Bidder Type</label>
                                    <!-- RADIO -->
                                    <input type="radio" id="r3" name="bidder_type" value="all" <?=($auction['bidder_type'] == "all") ? "checked" : '' ?>>
                                    <label for="r3">
                                        <span class="radio primary"><span></span></span>
                                        All
                                    </label>
                                    <!-- /RADIO -->

                                    <!-- RADIO -->
                                    <input type="radio" id="r1" name="bidder_type" value="individual" <?=($auction['bidder_type'] == "individual") ? "checked" : '' ?>>
                                    <label for="r1">
                                        <span class="radio primary"><span></span></span>
                                        Individual
                                    </label>
                                    <!-- /RADIO -->
                                    <!-- RADIO -->
                                    <input type="radio" id="r2" name="bidder_type" value="business" <?=($auction['bidder_type'] == "business") ? "checked" : '' ?>>
                                    <label for="r2">
                                        <span class="radio primary"><span></span></span>
                                        Business
                                    </label>
                                    <!-- /RADIO -->

                                </div>
                                <!-- INPUT CONTAINER -->

                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="files_included" class="rl-label required">Starts At</label>
                                    <input type="date"  id="input-starts" value="<?= $serverDateTime->format('Y-m-d') ?>" name="starts_at">
                                </div>
                                <!-- /INPUT CONTAINER -->

                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="files_included" class="rl-label required">Expires At</label>
                                    <input type="date" id="input-lastname" name="expires_at" value="<?php
                                        $time = strtotime($serverDateTime->format('Y-m-d'));
                                        $final = date("Y-m-d", strtotime("+1 month", $time));
                                     echo $final; ?>" name="starts_at">
                                </div>
                                <!-- /INPUT CONTAINER -->

                                                                    <!-- /INPUT CONTAINER -->

                                <div class="input-container col-xs-12 radio-btn-cs">
                                    <label class="rl-label required">Bidding Method</label>
                                    <!-- RADIO -->
                                    <input type="radio" id="input-free" name="bid_method" value="free" <?=($auction['bid_type'] == "free") ? "checked" : '' ?>>
                                    <label for="input-free">
                                        <span class="radio primary"><span></span></span>
                                        Free
                                    </label>
                                    <!-- /RADIO -->

                                    <!-- RADIO -->
                                    <input type="radio" id="input-current" name="bid_method" value="incremental" <?=($auction['bid_type'] == "incremental") ? "checked" : '' ?>>
                                    <label for="input-current">
                                        <span class="radio primary"><span></span></span>
                                        Incremental
                                    </label>
                                    <!-- /RADIO -->
                                    <!-- RADIO -->
                                    <input type="radio" id="input-range" name="bid_method" value="range" <?=($auction['bid_type'] == "range") ? "checked" : '' ?>>
                                    <label for="input-range">
                                        <span class="radio primary"><span></span></span>
                                        Range
                                    </label>
                                    <!-- /RADIO -->

                                </div>
                                <!-- INPUT CONTAINER -->
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6 range-inputs" style="display: none;">
                                    <label for="files_included" class="rl-label required">Minimum</label>
                                    <input type="number" id="input-base_price" min="0" name="minimum" placeholder="Enter Item Minimum Price here..." >
                                    <label for="files_included" class="rl-label required">Maximum</label>
                                    <input type="number" id="input-base_price" min="1" name="maximum" placeholder="Enter Item Maximum Price here..." >
                                </div>
                                <!-- /INPUT CONTAINER -->
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6 basePrice_inputs" >
                                    <label for="files_included" class="rl-label required">Bid Amount</label>
                                    <input type="number" id="input-base_price" value="<?=($auction['amount']) ? $auction['amount'] : '' ?>" name="base_price" placeholder="Enter Item Base Price here..." >
                                </div>
                                <!-- /INPUT CONTAINER -->

                                                                    <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="vr" class="rl-label required">Warranty case</label>
                                    <label for="vr" class="select-block">
                                        <select name="warranty_case" id="">
                                            <option value="Cash back" <?=($auction['warranty_case'] == "Cash back") ? "selected" : '' ?>>Cash back</option>
                                            <option value="Item Change" <?=($auction['warranty_case'] == "Item Change") ? "selected" : '' ?>>Item Change</option>
                                            <option value="No warranty" <?=($auction['warranty_case'] == "No warranty") ? "selected" : '' ?>>No warranty</option>
                                        </select>
                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </label>
                                </div>



                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label class="rl-label">Item Images (Max 5) </label>
                                    <!-- UPLOAD FILE -->
                                    <div class="upload-file row">
                                        <div class="upload-file-actions col-12 col-lg-6">
                                            <input class="button dark-light" type="file" id="post_images" name="files[]" accept="image/*" multiple>
                                        </div>

                                    </div>
                                    <!-- UPLOAD FILE -->

                                    <!-- UPLOAD FILE -->
                                    <div class="upload-file multiupload row ">

                                        <div class="upload-file-progress col-12 gallery">
                                            <!-- BADGE PROGRESS -->
                                            <?php if (isset($auction['image_sm_1']) && !empty($auction['image_sm_1'])) { ?>
                                            <figure class="product-preview-image small ">
                                                <img src="<?= $resourceUrl . "images/auctions/" . $auction['image_sm_1'] ?>">
                                            </figure>
                                            <?php }  if (isset($auction['image_sm_2']) && !empty($auction['image_sm_2'])) { ?>
                                            <figure class="product-preview-image small ">
                                                <img src="<?= $resourceUrl . "images/auctions/" . $auction['image_sm_2'] ?>">
                                            </figure>
                                            <?php }  if (isset($auction['image_sm_3']) && !empty($auction['image_sm_3'])) { ?>
                                            <figure class="product-preview-image small ">
                                                <img src="<?= $resourceUrl . "images/auctions/" . $auction['image_sm_3'] ?>">
                                            </figure>
                                            <?php }  if (isset($auction['image_sm_4']) && !empty($auction['image_sm_4'])) { ?>
                                            <figure class="product-preview-image small ">
                                                <img src="<?= $resourceUrl . "images/auctions/" . $auction['image_sm_4'] ?>">
                                            </figure>
                                            <?php }  if (isset($auction['image_sm_5']) && !empty($auction['image_sm_5'])) { ?>
                                            <figure class="product-preview-image small ">
                                                <img src="<?= $resourceUrl . "images/auctions/" . $auction['image_sm_5'] ?>">
                                            </figure>
                                        <?php } ?>

                                        </div>
                                    </div>
                                    <!-- UPLOAD FILE -->

                                </div>
                                <!-- /INPUT CONTAINER -->
                                <hr class="line-separator">
                                <!-- FORM BOX ITEMS -->
                                <div class="col-xl-3 col-xs-12">
                                    <div class="form-box-items right full-width">
                                        <!-- FORM BOX ITEM -->
                                        <div class="form-box-item full">
                                            <h4>Item Attributes</h4>
                                            <hr class="line-separator">
                                            <fieldset id="post-attributes">
                                             <?php if (isset($attributesForm) && !empty($attributesForm)) {
                                            echo $attributesForm;
                                             } ?>   
                                            </fieldset>
                                        </div>
                                        <!-- /FORM BOX ITEM -->

                                        <!-- /FORM BOX ITEM -->
                                    </div>
                                </div>
                                <hr class="line-separator">
                                <div class=" col-xs-12">
                                    <button type="Submit" class="button big dark">Update Item <span class="primary">for Review</span></button>
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