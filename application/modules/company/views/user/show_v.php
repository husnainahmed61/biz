<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 11/27/2018
 * Time: 12:44 AM
 */
?>


<!-- DASHBOARD CONTENT -->
<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline purchases primary">
        <div class="row">
            <div class="col-lg-2 col-md-4">
                <h4>My Alerts</h4>
            </div>
            <form id="purchase_filter_form" name="purchase_filter_form" class="col-lg-10 form-auction-filter">
                <div class="">
                    <div class="col-lg-3 col-md-3 box">
                        <label for="itemspp_filter" class="select-block">
                            <select name="post_type" id="input_post_type">
                                <option value="sell" selected>Selling Alerts</option>
                                <option value="buy">Buying Alerts</option>
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
                            <select name="sort" id="input-sort">
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
                            <input type="text" class="rounded search" name="search" id="search_products" placeholder="Search alerts here...">
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
                <p class="text-header small">Date</p>
            </div>
            <div class="col-xs-4 purchase-item-details-list">
                <p class="text-header small">Title</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small">Additional Info</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small text-center">Bid Details</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small text-center">Status</p>
            </div>
            <div class="col-xs-1">
                <p class="text-header small text-center">Alert Settings</p>
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