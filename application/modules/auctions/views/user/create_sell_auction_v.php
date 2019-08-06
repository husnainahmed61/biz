<?php
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 20-May-18
 * Time: 11:31 AM
 */
?>
<div class="container">
    <!-- Breadcrumb Start-->
    <ul class="breadcrumb">
        <li><a href="<?= base_url(); ?>"><i class="fa fa-home"></i></a></li>
        <li>Create Auction</li>
    </ul>
    <!-- Breadcrumb End-->
    <!--start of wizard-->
    <?php //echo 'i m'; print_r($dataChecked); 
    if($dataChecked==1) {
     ?>
    <div class="row">
        <!--Middle Part Start-->
        <div class="col-sm-12" id="content">
            <h1 class="title"><?= !empty($pageHeader) ? $pageHeader : 'No Title' ?></h1>
            <form class="form-horizontal" id="post_add" action="<?= base_url('myposts/store')?>" method="POST" enctype="multipart/form-data">

            </form>


            <div id="smartwizard" style="/*display: none;*/z-index: 0;">
                <ul>
                    <li><a href="#step-0">Details<br/>
<!--                            <small>Step description</small>-->
                        </a></li>
                    <li><a href="#step-1">Attributes<br/>
<!--                            <small>Step description</small>-->
                        </a></li>
                    <li><a href="#step-2">Images<br/>
<!--                            <small>Step description</small>-->
                        </a></li>
                </ul>
                <div>
                    <div id="step-0" class="p-md">
                        <form id="form_step_0"  class="form-horizontal">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset id="post-details">
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <legend>Auction Details</legend>
                                                <div class="form-group required mb-lg">
                                                    <label for="input-category1" class="col-sm-3 control-label">Category 1</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control selectpicker" id="input-category1"
                                                                name="category_1" style="" data-live-search="true" title="Select Category 1">

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group required mb-lg">
                                                    <label for="input-category2 " class="col-sm-3 control-label">Category 2</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control selectpicker" data-live-search="true" id="input-category2" name="category_2"
                                                                title="Select Category 2">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group required mb-lg">
                                                    <label for="input-category3" class="col-sm-3 control-label">Category 3</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control selectpicker" data-live-search="true"
                                                                id="input-category3" name="category_3"  title="Select Category 3">
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group required">
                                                    <label for="input-title" class="col-sm-3 control-label">Title</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="input-title"
                                                               placeholder="Post Title" value="Test Title" name="title" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Description</label>
                                                    <div class="col-sm-9">
                                                <textarea rows="4" class="form-control " id="confirm_comment"
                                                          style="resize: vertical; max-height: 400px;"
                                                          name="description">Test description</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Condition
                                                        <i class="fa fa-question-circle  pl-xs" data-toggle="tooltip" title="About the field"></i>
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <div class="radio radio-primary radio-inline" data-toggle="tooltip" title="">
                                                            <input id="input-new" type="radio" name="condition" value="new" checked>
                                                            <label for="input-new">New</label>
                                                        </div>
                                                        <div class="radio radio-primary radio-inline" data-toggle="tooltip" title="">
                                                            <input id="input-used" type="radio" name="condition" value="used">
                                                            <label for="input-used">Used</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <label for="input-quantity_unit" class="col-sm-3 control-label">Quantity Unit</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control selectpicker" id="input-quantity_unit" name="quantity_unit" data-live-search="true" title="Select Option">
                                                            <option value="each">Each</option>
                                                            <option value="kg">Kilogram</option>
                                                            <option value="ltr">Litres</option>
                                                            <option value="meter">Meters</option>
                                                            <option value="dozen">Dozens</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <label for="input-quantity" class="col-sm-3 control-label">Quantity</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="input-quantity"
                                                               placeholder="Quantity" value="5" name="quantity" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6 ">
                                                <legend>Auction Bidding Method</legend>
                                                <div class="form-group required">
                                                    <label for="input-post_currency" class="col-sm-3 control-label">Post Currency</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control selectpicker" id="input-post_currency"
                                                                name="post_currency" style="" data-live-search="true" title="Select Currency">
                                                                <?php
                                                    if(!empty($currencies)){
                                                        foreach($currencies as $currency){
                                                      ?>
                                                        <option value="<?=$currency['name']?>"><?=$currency['name']?></option>
                                                    <?php }} ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <label for="input-base_price" class="col-sm-3 control-label">Base Price</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" id="input-base_price"
                                                               placeholder="Base Price" value="100" name="base_price" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Bidder Type</label>
                                                    <div class="col-sm-9">

                                                        <div class="radio radio-primary radio-inline">
                                                            <input id="r3" type="radio" name="bidder_type" checked value="all">
                                                            <label for="r3">All</label>
                                                        </div>
                                                        <div class="radio radio-primary radio-inline">
                                                            <input id="r1" type="radio" name="bidder_type"  value="individual"/>
                                                            <label for="r1">Individual</label>
                                                        </div>
                                                        <div class="radio radio-primary radio-inline">
                                                            <input id="r2" type="radio" name="bidder_type" value="business">
                                                            <label for="r2">Business</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <label for="input-starts" class="col-sm-3 control-label">Starts At</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" id="input-starts"
                                                               value="<?= $serverDateTime->format('Y-m-d') ?>" name="starts_at" />
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <label for="input-lastname" class="col-sm-3 control-label">Expires At</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" id="input-lastname"
                                                               value="" name="expires_at" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Bidding Method
                                                        <i class="fa fa-question-circle  pl-xs" data-toggle="tooltip" title="About the field"></i>
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <div class="radio radio-primary radio-inline" data-toggle="tooltip" title="Any amount">
                                                            <input id="input-free" type="radio" name="bid_method" value="free" checked>
                                                            <label for="input-free">Free</label>
                                                        </div>
                                                        <div class="radio radio-primary radio-inline" data-toggle="tooltip" title="Higher than previous bid amount">
                                                            <input id="input-current" type="radio" name="bid_method" value="incremental">
                                                            <label for="input-current">Incremental</label>
                                                        </div>
                                                        <div class="radio radio-primary radio-inline" data-toggle="tooltip" title="Between the amount range">
                                                            <input id="input-range" type="radio" name="bid_method"  value="range"/>
                                                            <label for="input-range">Range</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="start-inputs" style="display: none;">
                                                    <div class="form-group required">
                                                        <label for="input-base_price" class="col-sm-3 control-label">Start Price</label>
                                                        <div class="col-sm-9">
                                                            <input type="number" min="0" class="form-control" id="input-base_price"
                                                                   placeholder="Start Price" value="" name="start_price" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="range-inputs" style="display: none;">
                                                    <div class="form-group required">
                                                        <label for="input-title" class="col-sm-3 control-label">Minimum
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <input type="number" min="0" class="form-control" id="input-minimum"
                                                                   placeholder="Minimum Bid Amount" value="" name="minimum" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group required">
                                                        <label for="input-title" class="col-sm-3 control-label">Maximum
                                                        </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="input-maximum"
                                                                   placeholder="Maximum Bid Amount" value="" name="maximum" />
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
                    <div id="step-1" class="">
                        <form id="form_step_1"  class="form-horizontal">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset id="post-attributes">
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="step-2" class="">
                        <form id="form_step_2"  method="GET" class="form-horizontal" action="<?= base_url('auction/storeAuction')?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset id="post-images">
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <fieldset>
                                                    <legend>Your Password</legend>

                                                    <div class="form-group required">
                                                        <label for="input-confirm" class="col-sm-3 control-label">Images</label>
                                                        <div class="col-sm-9" id="preview_container">

                                                            <div class="upload-drop-zone" id="drop_zone">
                                                                <span class="pr-md">Just drag and drop files here</span>
                                                                <span class="btn btn-success fileinput-button">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        <span>Add files...</span>
                                                                    <!-- The file input field used as target for the file upload widget -->
                                                        <input class="form-control" id="post_images" type="file" name="files[]" multiple>
                                                    </span>
                                                            </div>

                                                            <!-- The global progress bar -->
                                                            <div id="progress" class="progress">
                                                                <div class="progress-bar progress-bar-success"></div>
                                                            </div>
                                                            <!-- The container for the uploaded files -->

                                                        </div>

                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6 pt-xl">
                                                <div class="row files" id="files">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="step-3" class="">
                        Step Content 4
                    </div>
                </div>

            </div>
        </div>
        <!--Middle Part End -->
        <!--Right Part Start -->
        <!-- <aside id="column-right" class="col-sm-3 hidden-xs">
            <h3 class="subtitle">Account</h3>
            <div class="list-group">
                <ul class="list-item">
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                    <li><a href="#">Forgotten Password</a></li>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Address Books</a></li>
                    <li><a href="wishlist.html">Wish List</a></li>
                    <li><a href="#">Order History</a></li>
                    <li><a href="#">Downloads</a></li>
                    <li><a href="#">Reward Points</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="#">Transactions</a></li>
                    <li><a href="#">Newsletter</a></li>
                    <li><a href="#">Recurring payments</a></li>
                </ul>
            </div>
        </aside> -->
        <!--Right Part End -->
    </div>
    
    <?php } else { ?>
    <div class="modal show" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Before Auction creation</h4>
        </div>
        <div class="modal-body" style="min-height: 125px;">
          <h5>Please fill remaining account information <a href="<?=base_url();?>profile/edit">HERE</a></h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    <?php  } ?>
    <!--this is end-->
</div>
<!-- share modal -->
<div class="modal fade" id="share-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-left:250px; !important">
    <div class="modal-dialog modal-lg" role="document" style="width: 40%;">
        <div class="modal-content" style="max-width:600px;">
            <div class="modal-header">
                
                <h4 class="modal-title" id="myModalLabel">Congratulations, You have created Auction Post.</h4>
            </div>
            <div class="modal-body" style="min-height: 125px;">
                <div class="row">
                    <div class="col-md-12">
  <!--                       <div class="fb-share-button" data-href="" data-layout="button_count">-->
  <!--</div>-->
                       
                        <h5>Share with your friends, may be they want to Buy/Sell what you have just posted.</h5>
                        <div class="social-buttons">
                            <button type="button" class="btn btn-fb" style="color: white;background-color: #425faf;">
                                <i class="fab fa-facebook-f  pr-1"></i> 
                                <a class="fb_share" style="color: white;" href="" target="_blank">Facebook</a></button>
                            <!--<a href="" class="btn btn-fb fb_share" target="_blank">-->
                            <!--    <i class="fa fa-facebook"></i>-->
                            <!--    Facebook</a>-->
                            <!--<button type="button" class="btn btn-md btn-fb">
                                <i class="fab fa-facebook-f pr-1"></i>
                                <a class="" href="" target="_blank">Share on Facebook</a></button>
                            -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="close_button" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


