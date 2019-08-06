<!-- DASHBOARD CONTENT -->
<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline purchases primary">
        <div class="row">
            <div class="col-lg-2 col-md-4">
                <h4>My Auctions Log</h4>
            </div>
            <form id="purchase_filter_form" name="purchase_filter_form" class="col-lg-10 form-auction-filter">
                <div class="">
                    <div class="col-lg-3 col-md-3 box">
                    <label for="itemspp_filter" class="select-block">
                        <select name="itemspp_filter" id="input_post_type">
                            <option value="sell" selected>Selling Auctions</option>
                            <option value="buy">Buying Posts</option>
                        </select>
                        <!-- SVG ARROW -->
                        <svg class="svg-arrow">
                            <use xlink:href="#svg-arrow"></use>
                        </svg>
                        <!-- /SVG ARROW -->
                    </label>
                    </div>
                     <div class="col-lg-3 col-md-3 box">
                    <label for="input-sort" class="select-block">
                        <select name="date_filter" id="input-sort">
                            <?php foreach ($sort_private AS $key => $item){
                                $selected = ($key == 0) ? "selected" : "" ;
                                    ?>
                                    <option value="<?=$key+1 ?>" <?= $selected ?> ><?= $item['text']?></option>
                            <?php   }?>
                        </select>
                        <!-- SVG ARROW -->
                        <svg class="svg-arrow">
                            <use xlink:href="#svg-arrow"></use>
                        </svg>
                        <!-- /SVG ARROW -->
                    </label>
                    </div>
                    <div class="col-lg-3 col-md-3 box">
                    <label for="date_filter" class="select-block">
                        <select name="date_filter" id="input-currency">
                            <option selected value="">- Select Currency -</option>
                                <?php foreach ($currencies AS $key => $item){
                                    //$selected = ($key == 0) ? "selected" : "" ;
                                    ?>
                            <option value="<?=$item['name'] ?>" <?= $selected ?> ><?= $item['name']?></option>
                        <?php } ?>
                        </select>
                        <!-- SVG ARROW -->
                        <svg class="svg-arrow">
                            <use xlink:href="#svg-arrow"></use>
                        </svg>
                        <!-- /SVG ARROW -->
                    </label>
                    </div>
                     <div class="col-lg-3 col-md-3 box">
                    <div class="search-form">
                        <input type="text" class="rounded search" name="search" id="search_products" placeholder="Search products here...">
                        <input type="image" src="<?= base_url('assets_u/images/search-icon-small.png')?>" alt="search-icon">
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /HEADLINE -->

    <!-- PURCHASES LIST -->
    <div class="purchases-list col-sm-12 purchase-lst-cs">
        <!-- PURCHASES LIST HEADER -->
        <div class="purchases-list-header row">
            <div class="col-xs-1">
                <p class="text-header small">Expiry Date</p>
            </div>
            <div class="col-xs-4 purchase-item-details-list">
                <p class="text-header small">Ad Details</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small">Additional Info</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small text-center">Price</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small text-center">Bid Details</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small text-center">Status</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small text-center">Ad Settings</p>
            </div>
        </div>
        <!-- /PURCHASES LIST HEADER --> 

        <div class="buy-auctions-list">

        </div>
    
        <!-- PAGER -->
        <div class="pager-wrap">
            <ul class="pager primary pagination" id="buyPagination">
                
            </ul>
        </div>
        <!-- /PAGER -->
    </div>
    <!-- /PURCHASES LIST -->

</div>
<!-- DASHBOARD CONTENT -->

<!-- Modal -->

<!-- FORM POPUP -->
<div id="biddetail-popup" class="form-popup mfp-hide">
    <!-- FORM POPUP CONTENT -->
    <div class="form-popup-content">
        <h4 class="popup-title">Login to your Account</h4>
        <!-- LINE SEPARATOR -->
        <hr class="line-separator">
        <!-- /LINE SEPARATOR -->
        <form id="login-form" action="<?= base_url('login/authenticate_user') ?>"  method="post" accept-charset="UTF-8" role="form" class="form login_form">
            <label for="login_email" class="rl-label">Username</label>
            <input type="email" id="login_email" name="login_email" placeholder="Enter your email here..." required>
            <label for="login_password" class="rl-label">Password</label>
            <input type="password" id="login_password" name="login_password" placeholder="Enter your password here..." required>
            <!-- CHECKBOX -->
            <input type="checkbox" id="checkbox1" name="remember" checked>
            <label for="remember" class="label-check">
                <span class="checkbox primary primary"><span></span></span>
                Remember username and password
            </label>
            <!-- /CHECKBOX -->
            <p>Forgot your password? <a href="<?= base_url('password/forget') ?>" class="primary">Click here!</a></p>
            <button class="button mid dark" type="submit">Login <span class="primary">Now!</span></button>
        </form>
        <!-- LINE SEPARATOR -->
        <hr class="line-separator double">
        <!-- /LINE SEPARATOR -->
        <a href="<?php echo $this->facebook->login_url(array('public_profile','email')); ?>" class="button mid fb half" style="color: white;">Login with Facebook</a>
        <a href="<?php echo $this->google->get_login_url(); ?>" class="button mid gplus half" style="background-color: #E53935; color: white;">Login with Google</a>
    </div>
    <!-- /FORM POPUP CONTENT -->
</div>
<!-- /FORM POPUP -->


<div class="modal fade" id="recent-bids" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Recent Bids</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="bid-details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Bid Description</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
