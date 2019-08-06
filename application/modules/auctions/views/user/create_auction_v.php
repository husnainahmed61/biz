<style type="text/css">
    input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}

</style>
<style type="text/css">
.image-preview {
      margin: 5px;
    width: 100px;
    height: 100px;
  position: relative;
  overflow: hidden;
  background-color: #ffffff;
  color: #ecf0f1;
    border: 1px solid #9dadb6;
   cursor: pointer;
}
.image-preview input {
  /*line-height: 200px;
  font-size: 200px;*/
  position: absolute;
  opacity: 0;
  z-index: 10;
}
.image-preview label {
color: white;
  position: absolute;
  z-index: 5;
  opacity: 0.8;
  cursor: pointer;
  background-color: #00d7b3;
  width: 80px;
  height: 30px;
  font-size: 12px;
  line-height: 30px;
  text-transform: uppercase;
  font-family: "Titillium Web", sans-serif;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  text-align: center;
}
.btn-delete {
   position: absolute;
   cursor: pointer;
   right: 2px;
   top: 2px;

}

</style>
<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline simple primary col-sm-12">
        <h4>Create Ad</h4>
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
                                    <!-- RADIO -->
                                    <input type="radio" id="paypal" name="ad_type" value="sa" checked>
                                    <label for="paypal">
                                        <span class="radio primary"><span></span></span>
                                        Selling Auction
                                    </label>
                                    <!-- /RADIO -->

                                    <!-- RADIO -->
                                    <input type="radio" id="skrill" name="ad_type" value="bp">
                                    <label for="skrill">
                                        <span class="radio primary"><span></span></span>
                                        Buying Post
                                    </label>
                                    <!-- /RADIO -->
                                </div>
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="category" class="rl-label required">Category </label>
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
                                <div class="input-container col-xs-12">
                                    <label for="item_description" class="rl-label required">Item Description</label>
                                    <textarea id="confirm_comment" name="description" placeholder="Enter item description here..."></textarea>
                                </div>
                                <!-- /INPUT CONTAINER -->
                                <div class="input-container col-xs-12 radio-btn-cs">
                                    <label class="rl-label required">Condition</label>
                                    <!-- RADIO -->
                                    <input type="radio" id="input-new" name="condition" value="new" >
                                    <label for="input-new">
                                        <span class="radio primary"><span></span></span>
                                        New
                                    </label>
                                    <!-- /RADIO -->

                                    <!-- RADIO -->
                                    <input type="radio" id="input-used" name="condition" value="used" checked>
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
                                    <input type="number" id="input-quantity" name="quantity" placeholder="Enter item quantity here..." required min="1" value="1">
                                </div>
                                <!-- /INPUT CONTAINER -->
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="vr" class="rl-label required">Post Currency</label>
                                    <label for="vr" class="select-block">
                                        <select id="input-post_currency" name="post_currency">
                                           <?php if(!empty($currencies)){
                                                foreach($currencies as $currency){
                                                 $selected = '';
                                                 if ($currency['name'] == 'PKR') {
                                                        $selected = 'selected';
                                                    }   
                                              ?>
                                                <option value="<?=$currency['name']?>" <?=$selected?>><?=$currency['name']?></option>
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
                                    <input type="radio" id="r3" name="bidder_type" value="all" checked>
                                    <label for="r3">
                                        <span class="radio primary"><span></span></span>
                                        All
                                    </label>
                                    <!-- /RADIO -->

                                    <!-- RADIO -->
                                    <input type="radio" id="r1" name="bidder_type" value="individual">
                                    <label for="r1">
                                        <span class="radio primary"><span></span></span>
                                        Individual
                                    </label>
                                    <!-- /RADIO -->
                                    <!-- RADIO -->
                                    <input type="radio" id="r2" name="bidder_type" value="business">
                                    <label for="r2">
                                        <span class="radio primary"><span></span></span>
                                        Business
                                    </label>
                                    <!-- /RADIO -->

                                </div>

                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="files_included" class="rl-label required">Starts At</label>
                                    <input type="datetime-local"  id="input-starts" value="<?= $serverDateTime->format('Y-m-d').'T'.Date("H:i")?>" name="starts_at">
                                </div>
                                <!-- /INPUT CONTAINER -->

                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="files_included" class="rl-label required">Expires At</label>
                                    <input type="datetime-local" id="input-lastname" name="expires_at" value="<?php
                                        $time = strtotime($serverDateTime->format('Y-m-d'));
                                        $final = date("Y-m-d", strtotime("+1 month", $time));
                                     echo $final.'T'.Date("H:i"); ?>" name="starts_at">
                                </div>
                                <!-- /INPUT CONTAINER -->

                                                                    <!-- /INPUT CONTAINER -->

                                <div class="input-container col-xs-12 radio-btn-cs">
                                    <label class="rl-label required">Bidding Method</label>
                                    <div>
                                    <!-- RADIO -->
                                    <input type="radio" id="input-free" name="bid_method" value="free" checked>
                                    <label for="input-free">
                                        <span class="radio primary"><span></span></span>
                                        Free
                                    </label>
                                    <!-- /RADIO -->
                                    </div>
                                    <div class="bp_hide">
                                    <!-- RADIO -->
                                    <input type="radio" id="input-current" name="bid_method" value="incremental">
                                    <label for="input-current">
                                        <span class="radio primary"><span></span></span>
                                        Incremental
                                    </label>
                                    <!-- /RADIO -->
                                    </div>
                                    <div>
                                    <!-- RADIO -->
                                    <input type="radio" id="input-range" name="bid_method" value="range">
                                    <label for="input-range">
                                        <span class="radio primary"><span></span></span>
                                        Range
                                    </label>
                                    <!-- /RADIO -->
                                    </div>

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
                                    <input type="number" id="input-base_price" name="base_price" placeholder="Enter Item Base Price here..." >
                                </div>
                                <!-- /INPUT CONTAINER -->

                                                                    <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="vr" class="rl-label required">Warranty case</label>
                                    <label for="vr" class="select-block">
                                        <select name="warranty_case" id="">
                                            <option value="Cash back">Cash back</option>
                                            <option value="Item Change">Item Change</option>
                                            <option value="No warranty" selected>No warranty</option>
                                        </select>
                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </label>
                                </div>
                                


                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12">
                                    <label class="rl-label">Item Images (Max 5) </label>
                                    <!-- UPLOAD FILE -->
                                    <!-- <div class="upload-file row">
                                        <div class="upload-file-actions col-12">
                                            <input class="button dark-light" type="file" id="post_images" name="files[]" accept="image/*" multiple>
                                        </div>

                                    </div> -->
                                    <!-- UPLOAD FILE -->

                                    <!-- UPLOAD FILE -->
                                    <!-- <div class="upload-file multiupload row ">

                                        <div class="upload-file-progress col-12 gallery">
                                            

                                        </div>
                                    </div> -->
                                    <!-- UPLOAD FILE -->
                                    <div class="col-xl-3 col-xs-12">
                                    <div id="image-preview1" class="image-preview col-xs-2">
                                      <label for="image-upload1" id="image-label1" class="image-label">Choose File</label>
                                      <input type="file" name="image0" id="image-upload1" class="image-upload" style="width: 0px;"/>
                                    </div>
                                    <div id="image-preview2" class="image-preview col-xs-2">
                                      <label for="image-upload2" id="image-label2" class="image-label">Choose File</label>
                                      <input type="file" name="image1" id="image-upload2" class="image-upload" style="width: 0px;"/>
                                    </div>
                                    <div id="image-preview3" class="image-preview col-xs-2">
                                      <label for="image-upload3" id="image-label3" class="image-label">Choose File</label>
                                      <input type="file" name="image2" id="image-upload3" class="image-upload" style="width: 0px;"/>
                                    </div>
                                    <div id="image-preview4" class="image-preview col-xs-2">
                                      <label for="image-upload4" id="image-label4" class="image-label">Choose File</label>
                                      <input type="file" name="image3" id="image-upload4" class="image-upload" style="width: 0px;"/>
                                    </div>
                                    <div id="image-preview5" class="image-preview col-xs-2">
                                      <label for="image-upload5" id="image-label5" class="image-label">Choose File</label>
                                      <input type="file" name="image4" id="image-upload5" class="image-upload" style="width: 0px;"/>
                                    </div>
                                    </div>
                                    
                                </div>
                                <!-- /INPUT CONTAINER -->
                                 <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 radio-btn-cs">
                                    <label class="rl-label required">Ad Viewers :</label>

                                    <!-- RADIO -->
                                    <input type="radio" id="av1" name="ad_viewer" value="public" checked class="public_div"> 
                                    <label for="av1">
                                        <span class="radio primary"><span></span></span>
                                        Public
                                    </label>
                                    <!-- /RADIO -->
                                    <!-- RADIO -->
                                    <input type="radio" id="av2" name="ad_viewer" value="followers" class="follower_div">
                                    <label for="av2">
                                        <span class="radio primary"><span></span></span>
                                        Followers
                                    </label>
                                    <!-- /RADIO -->

                                </div>
                                <!-- INPUT CONTAINER -->
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6 follower_list" style="display: none;">
                                    <label for="vr" class="rl-label required">Followers List</label>
                                        <label for="vr" class="select-block">
                                        <select name="followers_list[]" class="followers_list" multiple>
                                            <?php if (isset($user_followers) && !empty($user_followers)) {
                                                foreach ($user_followers as $key => $value) {
                                                   ?>
                                                   <option value="<?=$value['follower_id']?>"><?=$value['first_name'].' '.$value['last_name']?></option>
                                                <?php }
                                                
                                            } ?>
                                            
                                        </select>
                                       
                                    </label>
                                    
                                </div>
                                <hr class="line-separator">
                                <!-- FORM BOX ITEMS -->
                                <div class="col-xl-3 col-xs-12">
                                    <div class="form-box-items right full-width">
                                        <!-- FORM BOX ITEM -->
                                        <div class="form-box-item full">
                                            <h4>Item Attributes</h4>
                                            <hr class="line-separator">
                                            <fieldset id="post-attributes">
                                            </fieldset>
                                        </div>
                                        <!-- /FORM BOX ITEM -->

                                        <!-- /FORM BOX ITEM -->
                                    </div>
                                </div>
                                <hr class="line-separator">
                                <div class=" col-xs-12">
                                    <button type="Submit" class="button big dark">Submit Item <span class="primary">for Review</span></button>
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