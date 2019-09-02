
<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline simple primary col-sm-12">
        <h4>Create PR</h4>
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
                            <form id="pr_form" class="row create-auction-form" method="POST" action="<?= base_url('company/storePr')?>" enctype="multipart/form-data">
                                <!-- INPUT CONTAINER -->
                                
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="category" class="rl-label required">Select Item </label>
                                    <label for="category" class="select-block">
                                        <select data-live-search="true" id="input-items" name="items_list" class="form-control">

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
                                    <input type="text" id="input-title" placeholder="Item Title" name="item_name">
                                </div>
                                <!-- /INPUT CONTAINER -->

                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12">
                                    <label for="item_description" class="rl-label required">Item Description</label>
                                    <textarea id="confirm_comment" name="item_description" placeholder="Enter item description here..."></textarea>
                                </div>
                                <!-- /INPUT CONTAINER -->
                                <div class="input-container col-xs-12 radio-btn-cs">
                                    <label class="rl-label required">Condition</label>
                                    <!-- RADIO -->
                                    <input type="radio" id="input-new" name="item_condition" value="new" checked>
                                    <label for="input-new">
                                        <span class="radio primary"><span></span></span>
                                        New
                                    </label>
                                    <!-- /RADIO -->

                                    <!-- RADIO -->
                                    <input type="radio" id="input-used" name="item_condition" value="used" >
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
                                            <option value="each">Each</option>
                                            <option value="kg">Kilogram</option>
                                            <option value="ltr">Litres</option>
                                            <option value="meter">Meters</option>
                                            <option value="dozen">Dozens</option>
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
                                    <input type="number" id="input-quantity" name="item_quantity" placeholder="Enter item quantity here..." required min="1" value="1">
                                </div>
                                <!-- /INPUT CONTAINER -->
                              
                              
                                <hr class="line-separator">
                                <div class=" col-xs-12">
                                    <button type="Submit" class="button big dark">Submit <span class="primary">PR</span></button>
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