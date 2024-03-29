<?php 
// print_r($single_warehouses);
?>
<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline simple primary col-sm-12">
        <h4><?=isset($single_warehouses[0]['id']) && !empty($single_warehouses[0]['id']) ? 'Update' : 'Add'?> Warehouse</h4>
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
                            <form id="warehouse_form" class="row create-auction-form" method="POST" action="<?= base_url('company/store_warehouse')?>" enctype="multipart/form-data">
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="item_name" class="rl-label required">Name</label>
                                    <input type="text" id="input-title" placeholder="Name" name="name" value="<?=isset($single_warehouses[0]['name']) && !empty($single_warehouses[0]['name']) ? $single_warehouses[0]['name'] : ''?>">
                                </div>
                                <!-- /INPUT CONTAINER -->
                                <div class="input-container col-xs-12">
                                    <label for="item_description" class="rl-label required">Address</label>
                                    <textarea id="confirm_comment" name="address" placeholder="Enter Address here..."><?=isset($single_warehouses[0]['address']) && !empty($single_warehouses[0]['address']) ? $single_warehouses[0]['address'] : ''?></textarea >
                                </div>
                                <input type="hidden" name="id" value="<?=isset($single_warehouses[0]['id']) && !empty($single_warehouses[0]['id']) ? $single_warehouses[0]['id'] : ''?>">
                                <hr class="line-separator">
                                <div class=" col-xs-12">
                                    <button type="Submit" class="button big dark"><?=isset($single_warehouses[0]['id']) && !empty($single_warehouses[0]['id']) ? 'Update' : 'Add'?> <span class="primary">Warehouse</span></button>
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