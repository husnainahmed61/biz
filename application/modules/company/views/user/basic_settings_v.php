<?php 
// echo "<pre>";
// print_r($userDetails);
// exit();

?>
<style class="cp-pen-styles">
    .custom-file-upload {
        color: white;
        /* border: 1px solid #ed3b54; */
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
        margin: 5px;
        background-color: #535d5f;
        float: left;
        width: 120px;
        margin: 18px 0 0 80px;
    }
</style>
<!-- DASHBOARD CONTENT -->
<div class="dashboard-content dashboard-main-cs">
    <!-- HEADLINE -->
    <form class="form-horizontal" id="form_step_0" action="<?= base_url("profile/update") ?>" method="post">


        <div class="headline buttons primary col-sm-12">
            <h4>Basic Settings</h4>
            <input id="submit_register" type="submit" class="button mid-short primary" value="Save Changes">
            <div id="error_agree"></div><!--
                <button id="submit_register" type="submit" form="profile-info-form" class="button mid-short primary">Save Changes</button> -->
        </div>
        <!-- /HEADLINE -->

        <!-- FORM BOX ITEMS -->
        <div class="col-sm-12 no-padding">
            <div class="form-box-items row">
                <!-- FORM BOX ITEM -->
                <div class="col-md-6 dashboard-item-cs">
                    <div class="form-box-item">
                        <h4>Company Profile Information</h4>
                        <hr class="line-separator">
                        <!-- PROFILE IMAGE UPLOAD -->
                        <div class="profile-image">
                            <div class="profile-image-data">
                                <figure class="user-avatar medium">
                                    <?php if (isset($userDetails['profile_picture']) && !empty($userDetails['profile_picture'])) { ?>

                                        <img src="<?= $resources_path . "users/profile_picture/" . $userDetails['profile_picture'] ?>"
                                             alt="profile-default-image">
                                    <?php } else { ?>
                                        <img src="<?= $resources_path . "users/profile_picture/not-available.jpg" ?>"
                                             alt="profile-default-image">
                                    <?php } ?>

                                </figure>
                                <p class="text-header">Company Logo</p>
                                <p class="upload-details">Minimum size 70x70px</p>
                            </div>
                            <label class="custom-file-upload mid-short dark-light text-center">
                                <input type="file" name="upload_image" style="display: none;" id="upload_image"
                                       accept="image/*">
                                Upload Image...
                            </label>
                            <!-- <a href="#" class="button mid-short dark-light">Upload Image...</a> -->
                        </div>
                        <!-- PROFILE IMAGE UPLOAD -->

                        <form id="profile-info-form" class="row">
                            <div class="row">
                               

                                <div class="input-container col-sm-6">
                                    <label for="input-firstname" class="rl-label required">First Name</label>
                                    <input type="text" id="input-firstname" name="firstname"
                                           value="<?= $userDetails['first_name'] ?>"
                                           placeholder="Enter your first name here...">
                                </div>

                                <div class="input-container col-sm-6">
                                    <label for="input-lastname" class="rl-label required">Last Name</label>
                                    <input type="text" id="input-lastname" name="lastname"
                                           value="<?= $userDetails['last_name'] ?>"
                                           placeholder="Enter your last name here...">
                                </div>
                                <input type="hidden" name="slug" value="<?= $userDetails['slug'] ?>">

                                <!-- /INPUT CONTAINER -->

                                <!-- INPUT CONTAINER -->

                                <div class="input-container col-sm-12">
                                    <label for="input-telephone" class="rl-label">Phone</label>
                                    <input type="number" id="input-telephone" value="<?= $userDetails['phone'] ?>"
                                           name="phone" placeholder="Enter your telephone number here...">
                                </div>

                                <!-- /INPUT CONTAINER -->

                                <!-- INPUT CONTAINER -->
                                <!-- <div class="input-container col-sm-6">
                                    <label for="website_url" class="rl-label">Website</label>
                                    <input type="text" id="website_url" name="website_url" placeholder="Enter your website link here...">
                                </div> -->
                                <!-- /INPUT CONTAINER -->
                                <div class="input-container col-sm-6">
                                        <label for="input-reg-address" class="rl-label required">RFQ Expiry in Days (Standard)</label>
                                        <input type="number" min="1" id="input-reg-address"
                                               placeholder="RFQ Expiry in Days"
                                               value="<?php if(isset($userDetails['RFQ_expiry'])){
                                                echo $userDetails['RFQ_expiry'];
                                               }  ?>" name="rfq_expiry" required>

                                    </div>
                                <div class="input-container col-sm-12">
                                        <label for="input-business-description" class="rl-label required">Legal Address</label>

                                        <textarea rows="3" data-plugin-textarea-autosize=""
                                                  id="input-business-description" placeholder="Legal Address..."
                                                  name="legal_address"
                                                  style="overflow: hidden; word-wrap: break-word; resize: none; height: 74px;"
                                                  ><?php if(isset($userDetails['legal_address'])){
                                                echo $userDetails['legal_address'];
                                               }  ?></textarea>

                                    </div>
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-sm-6">
                                    <label for="country1" class="rl-label required">Currency Selection</label>
                                    <label for="country1" class="select-block">
                                        <select id="input-country" name="currency" title="- Select Country -"
                                                data-live-search="true" required>
                                            <?php foreach ($currencies AS $item) {
                                                $selected = ($item['id'] == $userDetails['currency_id']) ? "selected" : ""; ?>
                                                <option value="<?= $item['id'] ?>" <?= $selected ?>><?= $item['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </label>
                                </div>
                                
                                
                            </div>
                            <br>
                            <div class="business_detail" style="width: 100%; display: none;">
                                <div class="row">
                                    
                                </div>
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container col-sm-12" style="display: none;">
                                <label for="about" class="rl-label">About</label>
                                <input type="text" id="about" name="about"
                                       placeholder="This will appear bellow your avatar... (max 140 char)">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container col-sm-12" style="display: none;">
                                <label class="rl-label">Preferences</label>
                                <!-- CHECKBOX -->
                                <input type="checkbox" id="show_balance" name="show_balance" checked>
                                <label for="show_balance" class="label-check">
                                    <span class="checkbox primary"><span></span></span>
                                    Show account balance in the status bar
                                </label>
                                <!-- /CHECKBOX -->

                                <!-- CHECKBOX -->
                                <input type="checkbox" id="email_notif" name="email_notif">
                                <label for="email_notif" class="label-check">
                                    <span class="checkbox primary"><span></span></span>
                                    Send me email notifications
                                </label>
                                <!-- /CHECKBOX -->
                            </div>

                            <!-- /INPUT CONTAINER -->
                        
                        </form>
                    </div>

                </div>
                <!-- /FORM BOX ITEM -->

                

                <!-- FORM BOX ITEM -->

                <div class="col-xs-12 col-lg-6 dashboard-item-cs">
                    <form id="change_password" action="<?= base_url("password/update") ?>" method="POST">
                        <div class="form-box-item" style="width: inherit;">
                            <h4>Reset Password</h4>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                   value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="hidden" name="token" value="<?= $token ?>">
                            <hr class="line-separator">
                            <div class="row">
                                <div class="input-container col-sm-12">
                                    <label for="company_name2" class="rl-label">Current Password</label>
                                    <input type="password" id="old_password" name="current_password"
                                           placeholder="Enter your current password here..." required>
                                    <span class="text-danger" id="old_password_error" style="display: none;">Old Password doesn't match</span>
                                </div>
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-sm-6">
                                    <label for="first_name2" class="rl-label required">Password</label>
                                    <input type="password" id="password" name="password"
                                           placeholder="Enter your password here..." required>
                                    <span class="help-block"></span>
                                </div>
                                <!-- /INPUT CONTAINER -->

                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-sm-6">
                                    <label for="last_name2" class="rl-label required">Confrim Password</label>
                                    <input type="password" id="confirm-password" name="confirm_password"
                                           placeholder="Enter your password here again..." required>
                                    <span class="help-block"></span>
                                </div>

                                <!-- /INPUT CONTAINER -->
                            </div>
                        </div>
                        <div class="buttons form action">
                            <!-- <h4>Account Settings</h4> -->
                            <input type="submit" class="button mid-short primary" value="Reset Password">
                            <div id="error_agree"></div><!--
                            <button id="submit_register" type="submit" form="profile-info-form" class="button mid-short primary">Save Changes</button> -->
                        </div>
                    </form>
                </div>

                <!-- /FORM BOX ITEM -->

                <!-- FORM BOX ITEM -->
                <div class="col-xs-12 col-lg-6 dashboard-item-cs" style="display: none;">
                    <div class="form-box-item padded">
                        <h4>Shipping Information</h4>
                        <hr class="line-separator">
                        <div class="row">
                            <!-- INPUT CONTAINER -->
                            <div class="input-container col-sm-6">
                                <label for="first_name3" class="rl-label required">First Name</label>
                                <input type="text" form="profile-info-form" id="first_name3" name="first_name3"
                                       placeholder="Enter your first name here...">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container col-sm-6">
                                <label for="last_name3" class="rl-label required">Last Name</label>
                                <input type="text" form="profile-info-form" id="last_name3" name="last_name3"
                                       placeholder="Enter your last name here...">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container col-sm-12">
                                <label for="company_name3" class="rl-label">Company Name</label>
                                <input type="text" form="profile-info-form" id="company_name3" name="company_name3"
                                       placeholder="Enter your company name here...">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container col-sm-12">
                                <label for="email_address3" class="rl-label required">Email Address</label>
                                <input type="email" form="profile-info-form" id="email_address3" name="email_address3"
                                       placeholder="Enter your email address here...">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container col-sm-12">
                                <label for="country3" class="rl-label required">Country</label>
                                <label for="country3" class="select-block">
                                    <select form="profile-info-form" name="country3" id="country3">
                                        <option value="0">Select your Country...</option>
                                        <option value="1">United States</option>
                                        <option value="2">Argentina</option>
                                        <option value="3">Brasil</option>
                                        <option value="4">Japan</option>
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
                            <div class="input-container col-sm-6">
                                <label for="state_city3" class="rl-label required">State/City</label>
                                <label for="state_city3" class="select-block">
                                    <select form="profile-info-form" name="state_city3" id="state_city3">
                                        <option value="0">Select your State/City...</option>
                                        <option value="1">New York</option>
                                        <option value="2">Buenos Aires</option>
                                        <option value="3">Brasilia</option>
                                        <option value="4">Tokyo</option>
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
                            <div class="input-container col-sm-6">
                                <label for="zipcode3" class="rl-label required">Zip Code</label>
                                <input form="profile-info-form" type="text" id="zipcode3" name="zipcode3"
                                       placeholder="Enter your Zip Code here...">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container col-sm-12">
                                <label for="address3" class="rl-label required">Full Address</label>
                                <input form="profile-info-form" type="text" id="address3" name="address3"
                                       placeholder="Enter your address here...">
                            </div>
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container col-sm-12">
                                <label for="notes3" class="rl-label">Aditional Notes</label>
                                <textarea form="profile-info-form" id="notes3" name="notes3"
                                          placeholder="Enter aditional notes here..."></textarea>
                            </div>
                            <!-- /INPUT CONTAINER -->
                        </div>
                    </div>
                </div>
                <!-- /FORM BOX ITEM -->
            </div>
        </div>


        <!-- /FORM BOX -->
</div>
<!-- DASHBOARD CONTENT -->
<div class="modal fade pic-upload-cs" id="upload_profile_picture_modal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Change Picture</h4>

                <button type="button" class="btn btn-default close" data-dismiss="modal">✕</button>
            </div>
            <form class="form-horizontal" id="upload_profile_picture_form"
                  action="<?= base_url("profile/uploadProfilePicture") ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="profile-picture" class="control-label col-md-3">Upload & Crop Picture</label>
                            <div class="col-md-12">
                                <span class="help-block"></span>
                                <div id="image_demo"></div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            
            <div class="modal-footer">
                <!-- <button class="btn btn-success crop_image" >Change</button> -->
                <button class="button mid dark crop_image">Change <span class="primary">Now!</span></button>
                <!-- <button type="submit" class="btn btn-primary" >Change</button> -->
            </div>

        </div>
    </div>
</div> 

