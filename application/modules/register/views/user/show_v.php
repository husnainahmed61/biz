<?php
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 26-Apr-18
 * Time: 1:34 AM
 */
?>

<div class="dashboard-content">
<div class="form-box-items">
    <form class="form-horizontal row account-register-main" id="form_step_0" action="<?= base_url("register/store")?>" method="post" >
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <!-- FORM BOX ITEM -->
            <div class="headline buttons primary col-sm-12">
                <h4>Account Registration</h4>
            </div>
            <div class="col-12 col-lg-6 dashboard-item-cs">
                <div class="form-box-item" style="width: auto;">
                    <h4>Your Personal Details</h4>
                    <hr class="line-separator">


                    
                        <div class="row">
                            <!-- INPUT CONTAINER -->
                            <div class="input-container col-sm-12">
                                <label for="acc_name" class="rl-label required">Customer Type</label>

                                <!-- RADIO -->
                                <div class="form-check-inline">
                                    <input type="radio" id="r1" name="user_type" checked
                                           value="individual">
                                    <label for="r1" class="linked-radio">
                                        <span class="radio primary"><span></span></span>
                                        Individual
                                    </label>
                                    <!--                                    <p class="pm-text input-individual">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor cididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>-->
                                </div>

                                <!-- /RADIO -->
                                <!-- RADIO -->
                                <div class="form-check-inline">
                                    <input type="radio" id="r2" name="user_type" value="business">
                                    <label for="r2" class="linked-radio">
                                        <span class="radio primary"><span></span></span>
                                        Business
                                    </label>
                                    <!--                                    <p class="pm-text input-business">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor cididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>-->
                                </div>
                                <!-- /RADIO -->


                            </div>

                            <div class="input-container col-sm-6">
                                <label for="input-firstname" class="rl-label required">First Name</label>
                                <input type="text" id="input-firstname" name="firstname" required placeholder="Enter your first name here...">
                            </div>

                            <div class="input-container col-sm-6">
                                <label for="input-lastname" class="rl-label required">Last Name</label>
                                <input type="text" id="input-lastname" name="lastname" placeholder="Enter your last name here..." required>
                            </div>

                            <!-- /INPUT CONTAINER -->
                            <div class="input-container col-sm-12">
                                <label for="input-email" class="rl-label required">Email</label>
                                <input type="email" id="input-email" name="email" placeholder="Enter your Email here..." required>
                            </div>    
                            <!-- INPUT CONTAINER -->

                            <div class="input-container col-sm-12">
                                <label for="input-telephone" class="rl-label">Phone</label>
                                <input type="number" id="input-telephone" 
                                       name="phone" placeholder="Enter your telephone number here..." required>
                            </div>

                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <!-- <div class="input-container col-sm-6">
                                <label for="website_url" class="rl-label">Website</label>
                                <input type="text" id="website_url" name="website_url" placeholder="Enter your website link here...">
                            </div> -->
                            <!-- /INPUT CONTAINER -->

                            <!-- INPUT CONTAINER -->
                            <div class="input-container col-sm-6">
                                <label for="country1" class="rl-label required">Country</label>
                                <label for="country1" class="select-block">
                                    <select id="input-country" name="country_id" title="- Select Country -" required>
                                            <option></option>    

                                            </select>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </label>
                            </div>
                            <div class="input-container col-sm-6">
                                <label for="country1" class="rl-label required">Region / State</label>
                                <label for="country1" class="select-block">
                                    <select id="input-state" name="state_id" title="- Select State -" data-live-search="true">

                                            </select>

                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </label>
                            </div>
                            <div class="input-container col-sm-12">
                                <label for="country1" class="rl-label required">City</label>
                                <label for="country1" class="select-block">
                                    <select id="input-city" name="city_id" title="- Select City -" data-live-search="true">

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
                        <div class="business_detail">
                            <div class="row">
                                <div class="input-container required col-sm-12">
                                    <label for="input-business-name" class="rl-label required">Business
                                        Name</label>
                                    <input type="text" id="input-business-name"
                                           placeholder="Business Name"
                                           value="" name="business_name">
                                </div>
                                <div class="required input-container col-sm-12">
                                    <label for="input-business-description" class="rl-label required">Business
                                        Description</label>

                                    <textarea rows="3" data-plugin-textarea-autosize=""
                                              id="input-business-description" placeholder="Business Description"
                                              name="business_description"
                                              style="overflow: hidden; word-wrap: break-word; resize: none; height: 74px;"
                                              ></textarea>

                                </div>
                                <div class="required input-container col-sm-6">
                                    <label for="input-reg-address" class="rl-label">Registered
                                        Address</label>
                                    <input type="text" id="input-reg-address"
                                           placeholder="Registered Address"
                                           value="" name="registered_address" required>

                                </div>
                                <div class="required input-container col-sm-6">
                                    <label for="input-web-url" class="rl-label">Website URL</label>
                                    <input type="text" id="input-web-url"
                                           placeholder="Website URL"
                                           value="" name="website_url">

                                </div>
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

                </div>

            </div>
            <!-- /FORM BOX ITEM -->

            <!-- FORM BOX ITEM -->
            <div class="col-12 col-lg-6 dashboard-item-cs">
                <div class="form-box-item spaced" style="width: inherit;">
                    <h4>Your Account Details</h4>
                    <hr class="line-separator">
                    <div class="row">
                        <!-- INPUT CONTAINER -->
                        <div class="input-container col-sm-12">
                            <label for="input-username" class="rl-label required">Username</label>
                            <input type="text" id="input-username" name="username" required placeholder="Enter your Username here..." autocomplete="off">
                            <div class="p-xs">
                                <a class="check_username" style="display: none;">Check</a>
                                <span class="username_message" style="/*display: none;*/"></span>
                            </div>
                        </div>
                        <!-- /INPUT CONTAINER -->

                        <!-- INPUT CONTAINER -->
                        <div class="input-container col-sm-12">
                            <label for="input-password" class="rl-label required">Password</label>
                            <input type="password" id="input-password" name="password" required placeholder="Enter your Password here..." autocomplete="new-password">
                        </div><!-- /INPUT CONTAINER -->

                        <!-- INPUT CONTAINER -->
                        <!-- INPUT CONTAINER -->
                        <div class="input-container col-sm-12">
                            <label for="input-confirm" class="rl-label required">Password Confirm</label>
                            <input type="password" id="input-confirm" name="confirm_password" required placeholder="Confrim Your Password...">
                        </div>                    <!-- /INPUT CONTAINER -->
                    </div>
                </div>
            </div>
            
            <div class="headline buttons primary col-sm-12 bootom-agree-account">
                <div class="checkbox checkbox-primary">
                    <input id="filter-checkbox1" type="checkbox" name="agreement" required checked />
                    <label for="brands_23">
                        <span class="checkbox primary primary" style="
    padding-top: 0px;
    min-height: 0px;
"><span></span></span>
                        I have read and agree to the<b>
                            <a href="#" data-toggle="modal" data-target="#ex1">Standard Policy</a></b>                                                   
                    </label>
                </div>
                <!-- <input id="filter-checkbox1" type="checkbox" name="agreement" required checked />
                        <label for="filter-checkbox1">
                            &nbsp;I have read and agree to the&nbsp;<b>
                            <a href="#" data-toggle="modal" data-target="#ex1">Standard Policy&nbsp;</a></b>
                        </label> -->
                <input id="submit_register" type="submit" class="button mid-short primary" value="Save Changes">
                <div id="error_agree"></div><!--
                    <button id="submit_register" type="submit" form="profile-info-form" class="button mid-short primary">Save Changes</button> -->
            </div>
    </form>        
</div>


</div>

    
    <!-- Breadcrumb End-->
   
 </div>

<!-- Modal -->
<!-- Modal HTML embedded directly into document -->
<div class="modal fade" id="ex1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="
    border: none;
    box-shadow: none;
">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Standard Policy</h4>
            </div>
            <div class="modal-body">
                <p>Vayzn has certain Auction/Bidding posting rules/policies, which needs to be followed: </p>
                  <ul style="
    color: #888;
    font-size: 0.775em;
    list-style: unset;
    font-family: "Titillium Web", sans-serif;
">
                      <li>The user shouldn’t auction that contains false, inaccurate, misleading, deceptive, defamatory, or libelous content.</li>
                      <li>Any auction posted more than once with the same content or Title in the same city and category would be considered as a Duplicate Ad. Duplicate ads will not be allowed for Better Content Quality.
                      </li>
                      <li>Spamming is forbidden as posting similar Ads indiscriminately in Bulk is not allowed.</li>
                      <li>The user shouldn’t manipulate the price of any item or interfere with any other user's listings.</li>
                      <li>Do not use Irrelevant/gibberish/vague Titles or Description.</li>
                      <li>Do not include obscene, fake or human images/content.</li>
                      <li>Ads relating to products intended for use in sexual activity are not permitted. Also, refrain from using title with graphic adult language, regardless of the item.</li>
                      <li>Auctions/Bids can be entertained from all over the world.</li>
                      <li>The users will not infringe any Intellectual Property Rights that belong to third parties affected by your use of the Services or post content that does not belong to you.</li>
                      <li>The users will not distribute viruses or any other technologies that may harm Vayzn or the interests or property of users</li>
                      <li>Vayzn allows only those Animals which are in accordance to the user’s national Wildlife Regulations.</li>
                      <li>The bidder will not bid two or more time on a single auction.</li>
                      <li>Vayzn will not allow multiple accounts to be created on one single phone number. Accounts with the same phone number will be deactivated except the one which is currently in use. All the ads on those accounts will be removed.</li>
                      <li>Kindly post auction Ads in respective category of the item.</li>
                      <li>Vayzn only plays a role of a marketplace (not a Buyer/Seller) that provides multiple users to do business; hence Vayzn will not be liable for any damage caused by fraudulent activity of Buyer/Seller or Auctioneer/Bidder. </li>
                      <li>Vayzn will not also guarantee warranty or returns on any transaction. Warranty or Returns is a matter of mutual agreement of the Auctioneer and Bidder.</li>
                      <li>The users must be above the age of 13 years.</li>
                      <li>In case of Selling Auction, we advise you to post real images of the item for sale.</li>
                  </ul>
                  <p>Kindly note that the user’s account can also be blocked depending upon the severity of the case.</p>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


