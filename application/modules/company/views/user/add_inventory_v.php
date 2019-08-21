
<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline simple primary col-sm-12">
        <h4>Add Inventory</h4>
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
                            <form id="upload_form" class="row create-auction-form" method="POST" action="<?= base_url('auction/storeAuction')?>" enctype="multipart/form-data">
                                <!-- INPUT CONTAINER -->
                                
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="category" class="rl-label required">Select Category </label>
                                    <label for="category" class="select-block">
                                        <select data-live-search="true" id="input-category3" name="category_3" class="form-control">

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
                                    <input type="text" id="input-title" placeholder="Item Title" name="title">
                                </div>
                                <!-- /INPUT CONTAINER -->
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="item_name" class="rl-label required">Item Number (Max 40 Characters)</label>
                                    <input type="text" id="input-title" placeholder="Item Number" name="title">
                                </div>
                                <!-- /INPUT CONTAINER -->
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
                                <div class="input-container col-xs-12">
                                    <label for="item_description" class="rl-label required">Item Description</label>
                                    <textarea id="confirm_comment" name="description" placeholder="Enter item description here..."></textarea>
                                </div>
                               

                                                            
                              
                                <hr class="line-separator">
                                <div class=" col-xs-12">
                                    <button type="Submit" class="button big dark">Add <span class="primary">Item</span></button>
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