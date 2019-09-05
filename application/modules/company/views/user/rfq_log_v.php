<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 11/27/2018
 * Time: 12:44 AM
 */
//echo "<pre>";
print_r($approved_rfq);

?>


<!-- DASHBOARD CONTENT -->
<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline purchases primary">
        <div class="row">
           <div class="col-lg-2 col-md-4">
                <h4>RFQ Log</h4>
            </div>
            
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
            <div class="col-xs-3 purchase-item-details-list">
                <p class="text-header small">Ad Details</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small">Additional Info</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small text-center">Lowest Bid</p>
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
        <?php foreach ($approved_rfq as $key => $value) {?> 
        <!-- PURCHASE ITEM -->
<div class="purchase-item row">
    <div class="purchase-item-date col-lg-1 col-xs-2">
        <p>12th dec,2019</p>
    </div>
    <div class="purchase-item-details col-lg-3 col-xs-3">
        <!-- ITEM PREVIEW -->
        <div class="item-preview">
            <!-- <figure class="product-preview-image small liquid">
                <img src="<?= $resources_path."images/auctions/".$buyingAuction[$image] ?>" alt="product-image">
            </figure> -->
            <a href=""><p class="text-header"><?=$value['item_number']?></p></a>
            <p class="description"><?=$value['item_name']?></p>
        </div>
        <!-- /ITEM PREVIEW -->
    </div>
    <div class="purchase-item-info col-xs-2 visible-lg">
        <a href=""><p class="category primary"><?=$value['cat3name']?></p></a>
    <div class="metadata">
            <!-- META ITEM -->
            <div class="meta-item" data-toggle="tooltip" data-placement="left" title="Total Bids">
                <span class="icon-eye"></span>
                <p><?=$value['bid_count']?></p>
            </div>
            <!-- /META ITEM -->

            <!-- META ITEM -->
            <div class="meta-item" data-toggle="tooltip" data-placement="right" title="favourites">
                <span class="icon-heart"></span>
                <p><?=$value['favourite_count']?></p>
            </div>
            <!-- /META ITEM -->
        </div>
    </div>
    <div class="purchase-item-price col-xs-2 visible-lg visible-md">
            <p class="price"><span><?=$value['currency_name']?>  </span><?=$value['lowest_bid']?></p>
    </div>
    <div class="purchase-item-download col-md-2 col-xs-2">
        <a href="<?=base_url();?>bids/biddetail/?auction=<?php echo $this->my_encrypt->encode($value['rfq_id']); ?>" class="button dark-light">Bids Detail</a>
    </div>
    <div class="purchase-item-download col-md-2 col-xs-1 text-center">
        <p>Active</p>
  
    </div>
    <div class="purchase-item-recommend col-xs-1">
        <div class="recommendation-wrap">
            <div class="dropdown-wrpapper-cs">
            <!-- PRODUCT SETTINGS -->
                <div class="product-settings dropdown-popup-btn">
                    <span class="sl-icon icon-settings"></span>

                </div>
                <!-- /PRODUCT SETTINGS -->
                     <!-- DROPDOWN -->
                <ul class="dropdown small hover-effect closed dropdown-popup-cs">
                    <li class="dropdown-item">
                        <!-- DP TRIANGLE -->
                        <div class="dp-triangle"></div>
                        <!-- DP TRIANGLE -->
                        <a class="edit-auction" data-has_bids="" href="<?=base_url()?>auctions/edit/">Edit Item</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="#">Duplicate</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="#">Share</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="javascript:delete_auction();">Delete</a>
                    </li>
                </ul>
                <!-- /DROPDOWN -->
            </div>

        </div>
    </div>
</div>
    <?php } ?>
        
        
        
        <!-- /PAGER -->
    </div>
    <!-- /PURCHASES LIST -->

</div>
<!-- DASHBOARD CONTENT -->