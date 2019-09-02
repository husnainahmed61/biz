<?php
// print_r($single_supplier);
?>
<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline simple primary col-sm-12">
        <h4><?=isset($single_supplier[0]['id']) && !empty($single_supplier[0]['id']) ? 'Update' : 'Add'?> Supplier</h4>
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
                            <form id="supplier_form" class="row create-auction-form" method="POST" action="<?= base_url('company/storeSupplier')?>" enctype="multipart/form-data">
                                <!-- INPUT CONTAINER -->
                                
                               <div class="input-container col-xs-12 col-md-6">
                                    <label for="category" class="rl-label required">Select Category </label>
                                    <label for="category" class="select-block">
                                        <select data-live-search="true" id="input-category3" name="category_3" class="form-control" data-supplier-id="<?=isset($single_supplier[0]['supplier_cat3']) && !empty($single_supplier[0]['supplier_cat3']) ? $single_supplier[0]['supplier_cat3'] : ''?>">

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
                                    <label for="item_name" class="rl-label required">Company Name</label>
                                    <input type="text" id="input-title" placeholder="Company Name" name="company_name" value="<?=isset($single_supplier[0]['supplier_company']) && !empty($single_supplier[0]['supplier_company']) ? $single_supplier[0]['supplier_company'] : ''?>">
                                </div>
                                <!-- /INPUT CONTAINER -->

                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="item_name" class="rl-label required">First Name</label>
                                    <input type="text" id="input-title" placeholder="First Name" name="first_name" value="<?=isset($single_supplier[0]['first_name']) && !empty($single_supplier[0]['first_name']) ? $single_supplier[0]['first_name'] : ''?>">
                                </div>
                                <!-- /INPUT CONTAINER -->
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="item_name" class="rl-label required">Last Name</label>
                                    <input type="text" id="input-title" placeholder="Last Name" name="last_name" value="<?=isset($single_supplier[0]['last_name']) && !empty($single_supplier[0]['last_name']) ? $single_supplier[0]['last_name'] : ''?>">
                                </div>
                                <!-- /INPUT CONTAINER -->
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="item_name" class="rl-label required">Official E-mail</label>
                                    <input type="email" id="input-title" placeholder="E-mail" name="email" value="<?=isset($single_supplier[0]['email']) && !empty($single_supplier[0]['email']) ? $single_supplier[0]['email'] : ''?>" <?=isset($single_supplier[0]['email']) && !empty($single_supplier[0]['email']) ? 'readonly' : ''?>>
                                </div>
                                <!-- /INPUT CONTAINER -->
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="item_name" class="rl-label required">Contact Number</label>
                                    <input type="text" id="input-title" placeholder="Phone" name="phone" value="<?=isset($single_supplier[0]['phone']) && !empty($single_supplier[0]['phone']) ? $single_supplier[0]['phone'] : ''?>">
                                </div>
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-sm-4">
                                    <label for="country1" class="rl-label required">Country</label>
                                    <label for="country1" class="select-block">
                                        <select id="input-country" name="country_id" title="- Select Country -" required country-id="<?=isset($single_supplier[0]['country_id']) && !empty($single_supplier[0]['country_id']) ? $single_supplier[0]['country_id'] : ''?>">
                                                <option></option>    

                                                </select>
                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </label>
                                </div>
                                <div class="input-container col-sm-4">
                                    <label for="country1" class="rl-label required">Region / State</label>
                                    <label for="country1" class="select-block">
                                        <select id="input-state" name="state_id" title="- Select State -" data-live-search="true" state-id="<?=isset($single_supplier[0]['state_id']) && !empty($single_supplier[0]['state_id']) ? $single_supplier[0]['state_id'] : ''?>">

                                                </select>

                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </label>
                                </div>
                                <div class="input-container col-sm-4">
                                    <label for="country1" class="rl-label required">City</label>
                                    <label for="country1" class="select-block">
                                        <select id="input-city" name="city_id" title="- Select City -" data-live-search="true" city-id="<?=isset($single_supplier[0]['city_id']) && !empty($single_supplier[0]['city_id']) ? $single_supplier[0]['city_id'] : ''?>">

                                                </select>
                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </label>
                                </div>
                               <div class="input-container col-xs-12">
                                    <label for="item_description" class="rl-label required">Address</label>
                                    <textarea id="confirm_comment" name="address" placeholder="Enter Address here..."><?=isset($single_supplier[0]['supplier_address']) && !empty($single_supplier[0]['supplier_address']) ? $single_supplier[0]['supplier_address'] : ''?></textarea>
                                </div>
                                <input type="hidden" name="id" value="<?=isset($single_supplier[0]['id']) && !empty($single_supplier[0]['id']) ? $single_supplier[0]['id'] : ''?>">
                                <hr class="line-separator">
                                <div class=" col-xs-12">
                                    <button type="Submit" class="button big dark"><?=isset($single_supplier[0]['id']) && !empty($single_supplier[0]['id']) ? 'Update' : 'Add'?> <span class="primary">Supplier</span></button>
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