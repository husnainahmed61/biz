<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline simple primary col-sm-12">
        <h4><?=isset($user_data[0]['id']) && !empty($user_data[0]['id']) ? 'Update' : 'Add'?> User</h4>
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
                            <form id="addUser_form" class="row create-auction-form" method="POST" action="<?= base_url('company/storeUser')?>" enctype="multipart/form-data">
                                <!-- INPUT CONTAINER -->
                                
                               
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="item_name" class="rl-label required">First Name</label>
                                    <input type="text" id="input-title" placeholder="First Name" name="first_name" required value="<?=isset($user_data[0]['first_name']) && !empty($user_data[0]['first_name']) ? $user_data[0]['first_name'] : ''?>">
                                </div>
                                <!-- /INPUT CONTAINER -->
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="item_name" class="rl-label required">Last Name</label>
                                    <input type="text" id="input-title" placeholder="Last Name" name="last_name" required value="<?=isset($user_data[0]['last_name']) && !empty($user_data[0]['last_name']) ? $user_data[0]['last_name'] : ''?>">
                                </div> 
                                <!-- /INPUT CONTAINER -->
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="item_name" class="rl-label required">Official E-mail</label>
                                    <input type="Email" id="input-title" placeholder="E-mail" name="Email" required <?=isset($user_data[0]['email']) && !empty($user_data[0]['email']) ? 'readonly' : ''?> value="<?=isset($user_data[0]['email']) && !empty($user_data[0]['email']) ? $user_data[0]['email'] : ''?>">
                                </div>
                                <!-- /INPUT CONTAINER -->
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="item_name" class="rl-label required">Contact Number</label>
                                    <input type="Phone" id="input-title" placeholder="Phone" name="number" required value="<?=isset($user_data[0]['phone']) && !empty($user_data[0]['phone']) ? $user_data[0]['phone'] : ''?>">
                                </div>
                                <input type="hidden" name="id" value="<?=isset($user_data[0]['id']) && !empty($user_data[0]['id']) ? $user_data[0]['id'] : ''?>">
                                
                               
                                <hr class="line-separator">
                                <div class=" col-xs-12">
                                    <button type="Submit" class="button big dark"><?=isset($user_data[0]['id']) && !empty($user_data[0]['id']) ? 'Update' : 'Add'?> <span class="primary">User</span></button>
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