<?php
// print_r($single_tax);
// exit();
?>
<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline simple primary col-sm-12">
        <h4><?=isset($single_tax[0]['id']) && !empty($single_tax[0]['id']) ? 'Update' : 'Add'?> Tax</h4>
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
                            <form id="tax_form" class="row create-auction-form" method="POST" action="<?= base_url('company/storeTax')?>" enctype="multipart/form-data">
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="item_name" class="rl-label required">Name</label>
                                    <input type="text" id="input-title" required placeholder="Name" name="name" 
                                    value="<?=isset($single_tax[0]['name']) && !empty($single_tax[0]['name']) ? $single_tax[0]['name'] : ''?>">
                                </div>
                                <!-- /INPUT CONTAINER -->
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="item_name" class="rl-label required">Tax (%)</label>
                                    <input type="Number" id="input-title" required placeholder="Tax %" name="tax" min="1" value="<?=isset($single_tax[0]['tax_percentage']) && !empty($single_tax[0]['tax_percentage']) ? $single_tax[0]['tax_percentage'] : '1'?>">
                                </div>
                                <input type="hidden" name="id" value="<?=isset($single_tax[0]['id']) && !empty($single_tax[0]['id']) ? $single_tax[0]['id'] : ''?>">
                                <!-- /INPUT CONTAINER -->
                                <hr class="line-separator">
                                <div class=" col-xs-12">
                                    <button type="Submit" class="button big dark"><?=isset($single_tax[0]['id']) && !empty($single_tax[0]['id']) ? 'Update' : 'Add'?> <span class="primary">Tax</span></button>
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