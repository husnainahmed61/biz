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
            <a href=""><p class="text-header">47515-KODIF</p></a>
            <p class="description">Nut Bolt 4.3mm</p>
        </div>
        <!-- /ITEM PREVIEW -->
    </div>
    <div class="purchase-item-info col-xs-2 visible-lg">
        <a href=""><p class="category primary">Auto mobile Parts</p></a>
    <div class="metadata">
            <!-- META ITEM -->
            <div class="meta-item" data-toggle="tooltip" data-placement="left" title="Total Bids">
                <span class="icon-eye"></span>
                <p>05</p>
            </div>
            <!-- /META ITEM -->

            <!-- META ITEM -->
            <div class="meta-item" data-toggle="tooltip" data-placement="right" title="favourites">
                <span class="icon-heart"></span>
                <p>10</p>
            </div>
            <!-- /META ITEM -->
        </div>
    </div>
    <div class="purchase-item-price col-xs-2 visible-lg visible-md">
            <p class="price"><span>PKR </span>1000</p>
    </div>
    <div class="purchase-item-download col-md-2 col-xs-2">
        <a href="<?=base_url();?>bids/biddetail/?auction=1" class="button dark-light">Bid Detail</a>
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
<div class="purchase-item row">
    <div class="purchase-item-date col-lg-1 col-xs-2">
        <p>2nd sep,2019</p>
    </div>
    <div class="purchase-item-details col-lg-3 col-xs-3">
        <!-- ITEM PREVIEW -->
        <div class="item-preview">
            <!-- <figure class="product-preview-image small liquid">
                <img src="<?= $resources_path."images/auctions/".$buyingAuction[$image] ?>" alt="product-image">
            </figure> -->
            <a href=""><p class="text-header">47532-PLFDD</p></a>
            <p class="description">Shoes 7"</p>
        </div>
        <!-- /ITEM PREVIEW -->
    </div>
    <div class="purchase-item-info col-xs-2 visible-lg">
        <a href=""><p class="category primary">Plumbing Tools</p></a>
    <div class="metadata">
            <!-- META ITEM -->
            <div class="meta-item" data-toggle="tooltip" data-placement="left" title="Total Bids">
                <span class="icon-eye"></span>
                <p>15</p>
            </div>
            <!-- /META ITEM -->

            <!-- META ITEM -->
            <div class="meta-item" data-toggle="tooltip" data-placement="right" title="favourites">
                <span class="icon-heart"></span>
                <p>3</p>
            </div>
            <!-- /META ITEM -->
        </div>
    </div>
    <div class="purchase-item-price col-xs-2 visible-lg visible-md">
            <p class="price"><span>PKR </span>900</p>
    </div>
    <div class="purchase-item-download col-md-2 col-xs-2">
        <a href="<?=base_url();?>bids/biddetail/?auction=2" class="button dark-light">Bid Detail</a>
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
<div class="purchase-item row">
    <div class="purchase-item-date col-lg-1 col-xs-2">
        <p>1st dec,2019</p>
    </div>
    <div class="purchase-item-details col-lg-3 col-xs-3">
        <!-- ITEM PREVIEW -->
        <div class="item-preview">
            <!-- <figure class="product-preview-image small liquid">
                <img src="<?= $resources_path."images/auctions/".$buyingAuction[$image] ?>" alt="product-image">
            </figure> -->
            <a href=""><p class="text-header">47549-QWEQE</p></a>
            <p class="description">CNC machining parts</p>
        </div>
        <!-- /ITEM PREVIEW -->
    </div>
    <div class="purchase-item-info col-xs-2 visible-lg">
        <a href=""><p class="category primary">Woodwork Tools</p></a>
    <div class="metadata">
            <!-- META ITEM -->
            <div class="meta-item" data-toggle="tooltip" data-placement="left" title="Total Bids">
                <span class="icon-eye"></span>
                <p>12</p>
            </div>
            <!-- /META ITEM -->

            <!-- META ITEM -->
            <div class="meta-item" data-toggle="tooltip" data-placement="right" title="favourites">
                <span class="icon-heart"></span>
                <p>14</p>
            </div>
            <!-- /META ITEM -->
        </div>
    </div>
    <div class="purchase-item-price col-xs-2 visible-lg visible-md">
            <p class="price"><span>PKR </span>6000</p>
    </div>
    <div class="purchase-item-download col-md-2 col-xs-2">
        <a href="<?=base_url();?>bids/biddetail/?auction=3" class="button dark-light">Bid Detail</a>
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
<div class="purchase-item row">
    <div class="purchase-item-date col-lg-1 col-xs-2">
        <p>5th sep,2019</p>
    </div>
    <div class="purchase-item-details col-lg-3 col-xs-3">
        <!-- ITEM PREVIEW -->
        <div class="item-preview">
            <!-- <figure class="product-preview-image small liquid">
                <img src="<?= $resources_path."images/auctions/".$buyingAuction[$image] ?>" alt="product-image">
            </figure> -->
            <a href=""><p class="text-header">47566-TRRGR</p></a>
            <p class="description">knuckles</p>
        </div>
        <!-- /ITEM PREVIEW -->
    </div>
    <div class="purchase-item-info col-xs-2 visible-lg">
        <a href=""><p class="category primary">Electrical Equipments</p></a>
    <div class="metadata">
            <!-- META ITEM -->
            <div class="meta-item" data-toggle="tooltip" data-placement="left" title="Total Bids">
                <span class="icon-eye"></span>
                <p>55</p>
            </div>
            <!-- /META ITEM -->

            <!-- META ITEM -->
            <div class="meta-item" data-toggle="tooltip" data-placement="right" title="favourites">
                <span class="icon-heart"></span>
                <p>03</p>
            </div>
            <!-- /META ITEM -->
        </div>
    </div>
    <div class="purchase-item-price col-xs-2 visible-lg visible-md">
            <p class="price"><span>PKR </span>500</p>
    </div>
    <div class="purchase-item-download col-md-2 col-xs-2">
        <a href="<?=base_url();?>bids/biddetail/?auction=4" class="button dark-light">Bid Detail</a>
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
<div class="purchase-item row">
    <div class="purchase-item-date col-lg-1 col-xs-2">
        <p>15th sep,2019</p>
    </div>
    <div class="purchase-item-details col-lg-3 col-xs-3">
        <!-- ITEM PREVIEW -->
        <div class="item-preview">
            <!-- <figure class="product-preview-image small liquid">
                <img src="<?= $resources_path."images/auctions/".$buyingAuction[$image] ?>" alt="product-image">
            </figure> -->
            <a href=""><p class="text-header">47583-IUIYY</p></a>
            <p class="description">Lubricant</p>
        </div>
        <!-- /ITEM PREVIEW -->
    </div>
    <div class="purchase-item-info col-xs-2 visible-lg">
        <a href=""><p class="category primary">Plumbing</p></a>
    <div class="metadata">
            <!-- META ITEM -->
            <div class="meta-item" data-toggle="tooltip" data-placement="left" title="Total Bids">
                <span class="icon-eye"></span>
                <p>35</p>
            </div>
            <!-- /META ITEM -->

            <!-- META ITEM -->
            <div class="meta-item" data-toggle="tooltip" data-placement="right" title="favourites">
                <span class="icon-heart"></span>
                <p>03</p>
            </div>
            <!-- /META ITEM -->
        </div>
    </div>
    <div class="purchase-item-price col-xs-2 visible-lg visible-md">
            <p class="price"><span>USD </span>1000</p>
    </div>
    <div class="purchase-item-download col-md-2 col-xs-2">
        <a href="<?=base_url();?>bids/biddetail/?auction=5" class="button dark-light">Bid Detail</a>
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
<!-- /PURCHASE ITEM -->
        
        
        
        <!-- /PAGER -->
    </div>
    <!-- /PURCHASES LIST -->

</div>
<!-- DASHBOARD CONTENT -->