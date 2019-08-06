<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 11/28/2018
 * Time: 12:16 AM
 */
?>
<script type='text/javascript'>
    <?php echo $this->session->flashdata('message_name');
    //print_r($rrr);
    //exit();
    ?>
</script>
<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline simple primary col-sm-12">
        <h4>Edit Alert</h4>
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
                            <form id="alert_edit" class="row create-auction-form" method="POST" action="<?= base_url('alerts/update/').$alert['id']?>" enctype="multipart/form-data">
                                <!-- INPUT CONTAINER -->
                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 radio-btn-cs">
                                    <label class="rl-label required">Ad Type </label>
                                    <!-- RADIO -->

                                    <input type="radio" id="paypal" name="mode" value="sell"  <?= ($alert['type'] == 'sell') ? 'checked' : ''?> >
                                    <label for="paypal">
                                        <span class="radio primary"><span></span></span>
                                        Selling Auction
                                    </label>
                                    <!-- /RADIO -->

                                    <!-- RADIO -->
                                    <input type="radio" id="skrill" name="mode" value="buy" <?= ($alert['type'] == 'buy') ? 'checked' : ''?>>
                                    <label for="skrill">
                                        <span class="radio primary"><span></span></span>
                                        Buying Post
                                    </label>
                                    <!-- /RADIO -->
                                </div>


                                <!-- INPUT CONTAINER -->
                                <div class="input-container col-xs-12 col-md-6">
                                    <label for="category" class="rl-label required">Category</label>
                                    <label for="category" class="select-block">
                                        <select data-live-search="true" id="input-category3" name="category_3"  title="Select Category">
                                            <option></option>
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
                                    <input type="text" id="input-title" placeholder="Item Title" name="title" value="<?= $alert['name']?>">
                                </div>
                                <!-- /INPUT CONTAINER -->


                                <div class="input-container col-xs-12 radio-btn-cs">
                                    <label class="rl-label required">Bidder Type</label>
                                    <!-- RADIO -->
                                    <input type="checkbox" id="r3" name="type[]" value="email" <?= ($alert['email_alerts'] == 1) ? 'checked' : ''?> >
                                    <label for="r3">
                                        <span class="checkbox primary"><span></span></span>
                                        Email
                                    </label>
                                    <!-- /RADIO -->

                                    <!-- RADIO -->
                                    <input type="checkbox" id="r1" name="type[]" value="sms" <?= ($alert['sms_alerts'] == 1) ? 'checked' : ''?> >
                                    <label for="r1">
                                        <span class="checkbox primary"><span></span></span>
                                        SMS
                                    </label>
                                    <!-- /RADIO -->
                                </div>
                                <!-- INPUT CONTAINER -->
                                <hr class="line-separator">
                                <!-- FORM BOX ITEMS -->
                                <div class="col-xl-3 col-xs-12">
                                    <div class="form-box-items right full-width">
                                        <!-- FORM BOX ITEM -->
                                        <div class="form-box-item full">
                                            <h4>Item Attributes</h4>
                                            <hr class="line-separator">
                                            <fieldset id="post-attributes">
                                                <?= $attributes_view;?>
                                            </fieldset>
                                        </div>
                                        <!-- /FORM BOX ITEM -->

                                        <!-- /FORM BOX ITEM -->
                                    </div>
                                </div>
                                <hr>
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