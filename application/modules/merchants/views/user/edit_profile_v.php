<?php
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 29-Aug-18
 * Time: 12:58 AM
 */
?>


<div class="container">
    <!-- Breadcrumb Start-->
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
    </ul>
    <!-- Breadcrumb End-->
    <div class="row">
        <!--Middle Part Start-->
        <div class="col-sm-12" id="content">
            <h1 class="title">Edit Profile</h1>
            <p>Edit your profile details</p>
            <?//=  form_open(base_url('sign-up/store'),'class="form-horizontal" id="form_step_0"') ?>
            <form class="form-horizontal" id="form_step_0" action="<?= base_url("profile/update")?>" method="post" >
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="row">
                    <div class="col-md-12">
                        <fieldset id="account">

                            <div class="row">
                                <div class="col-md-6 ">
                                    <legend>Your Personal Details</legend>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Customer Type</label>
                                        <div class="col-sm-9">
                                            <div class="radio radio-primary radio-inline">
                                                <input id="r1" type="radio" name="user_type" checked value="individual" />
                                                <label for="r1">Individual</label>
                                            </div>
                                            <div class="radio radio-primary radio-inline">
                                                <input id="r2" type="radio" name="user_type" value="business">
                                                <label for="r2">Business</label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="slug" value="<?= $userDetails['slug'] ?>">
                                    <div class="form-group required">
                                        <label for="input-firstname" class="col-sm-3 control-label">First
                                            Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="input-firstname"
                                                   placeholder="First Name" value="<?= $userDetails['first_name'] ?>" name="firstname" required/>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-lastname" class="col-sm-3 control-label">Last
                                            Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="input-lastname"
                                                   placeholder="Last Name" value="<?= $userDetails['last_name'] ?>" name="lastname" required/>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-telephone"
                                               class="col-sm-3 control-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="tel" class="form-control" id="input-telephone"
                                                   placeholder="Phone" value="<?= $userDetails['phone'] ?>" name="phone">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-country" class="col-sm-3 control-label">Country</label>
                                        <div class="col-sm-9">
                                            <select class="form-control selectpicker" id="input-country" name="country_id" title="- Select Country -" data-live-search="true">
                                                <?php foreach ($countries AS $item){
                                                    $selected = ($item['id'] == $userDetails['country_id'] ) ?  "selected" : "";  ?>
                                                    <option value="<?= $item['id'] ?>"  <?= $selected ?>><?= $item['name'] ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-state" class="col-sm-3 control-label">Region / State</label>
                                        <div class="col-sm-9">
                                            <select class="form-control selectpicker" id="input-state" name="state_id" title="- Select State -" data-live-search="true">
                                                <?php foreach ($states AS $item){
                                                    $selected = ($item['id'] == $userDetails['state_id'] ) ?  "selected" : "";  ?>
                                                    <option value="<?= $item['id'] ?>"  <?= $selected ?>><?= $item['name'] ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="input-city" class="col-sm-3 control-label">City</label>
                                        <div class="col-sm-9">
                                            <select class="form-control selectpicker" id="input-city" name="city_id" title="- Select City -" data-live-search="true">
                                                <?php foreach ($cities AS $item){
                                                    $selected = ($item['id'] == $userDetails['city_id'] ) ?  "selected" : "";  ?>
                                                    <option value="<?= $item['id'] ?>"  <?= $selected ?>><?= $item['name'] ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="business_detail">
                                        <div class="form-group required">
                                            <label for="input-business-name" class="col-sm-3 control-label">Business Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="input-business-name"
                                                       placeholder="Business Name"
                                                       value="" name="business_name">
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-business-description" class="col-sm-3 control-label">Business Description</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" rows="3" data-plugin-textarea-autosize="" id="input-business-description" placeholder="Business Description"  name="business_description" style="overflow: hidden; word-wrap: break-word; resize: none; height: 74px;"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-tax" class="col-sm-3 control-label">Tax Number</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="input-tax"
                                                       placeholder="Tax Number"
                                                       value="" name="tax_number">
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-reg-address" class="col-sm-3 control-label">Registered Address</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="input-reg-address"
                                                       placeholder="Registered Address"
                                                       value="" name="registered_address">
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-web-url" class="col-sm-3 control-label">Website URL</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="input-web-url"
                                                       placeholder="Website URL"
                                                       value="" name="website_url">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="buttons">
                                            <div class="pull-right">

                                                <input id="submit_register" type="submit" class="btn btn-primary" value="Save" >
                                                <div id="error_agree"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </fieldset>
                    </div>
                </div>
            </form>

        </div>
        <!--Middle Part End -->
    </div>
</div>
