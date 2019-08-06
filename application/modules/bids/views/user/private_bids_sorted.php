<?php if(isset($bids) && !empty($bids)) {
    $i = 0;
    foreach (array_reverse($bids) AS $bid) { ?>
<!-- PURCHASE ITEM -->
        <div class="purchase-item row bid_row" data-row-id="<?=$bid['id']?>">
            <div class="purchase-item-date col-xs-1">
                <p><?php echo date("M dS, Y", strtotime(substr($bid['auction_expire'],0,10)))?></p>
            </div>
            <div class="purchase-item-details col-xs-4">
                <!-- ITEM PREVIEW -->
                <div class="item-preview">
                    <!-- <figure class="product-preview-image small liquid">
                        <img src="http://localhost:81/bid/public_html/assets_u/images/items/westeros_s.jpg" alt="product-image">
                    </figure> -->
                    <a href="<?=base_url()?><?=$bid['auction_slug']?>/auction"><p class="text-header"><?=$bid['auction_name']?></p></a>
                    
                    <p class="description"><?php
                                $string = strip_tags($bid['auction_description']);
                                if (strlen($string) > 100) {

                                    // truncate string
                                    $stringCut = substr($string, 0, 100);
                                    $endPoint = strrpos($stringCut, ' ');

                                    //if the string doesn't contain any space then it will cut without word basis.
                                    $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                    $string .= " (...)";
                                }
                                echo $string;
                                ?></p>
                </div>
                <!-- /ITEM PREVIEW -->
            </div>
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="<?=base_url()?><?=$bid['cat_name']?>/category3"><p class="category primary"><?=$bid['cat_name']?></p></a>
                <div class="metadata">
                    <!-- META ITEM -->
                    <div class="meta-item">
                        <span class="icon-eye"></span>
                        <p><?=$bid['bid_count']?></p>
                    </div>
                    <!-- /META ITEM -->

                    <!-- META ITEM -->
                    <div class="meta-item">
                        <span class="icon-heart"></span>
                        <p><?=$bid['favourite_count']?></p>
                    </div>
                    <!-- /META ITEM -->
                </div>
                <!-- <p><span class="light">License:</span> Standard</p>
                <p><span class="light">Author:</span> Odin_Design</p>
                <p class="text-header tiny">Check Invoice</p> -->
            </div>
            <div class="purchase-item-price col-xs-1  ">
                <p class="price"><span><?=$bid['currency']?> </span><?=$bid['amount']?></p>
            </div>
            <div class="purchase-item-download col-md-2">
                <a href="#" class="button dark-light"><?=ucfirst($bid['status'])?></a>
            </div>
            <div class="purchase-item-recommend col-xs-2">
                <div class="recommendation-wrap">
                    <div class="dropdown-wrpapper-cs">
                    <!-- PRODUCT SETTINGS -->
                        <div class="product-settings dropdown-popup-btn">
                            <span class="sl-icon icon-settings"></span>
                        
                        </div>
                        <!-- /PRODUCT SETTINGS -->
                             <!-- DROPDOWN -->
                        <ul class="dropdown small hover-effect closed dropdown-popup-cs pvt_bid_actions">
                            <li class="dropdown-item">
                                <a href="#" class="delete">Delete</a>
                            </li>
                        </ul>
                        <!-- /DROPDOWN -->
                    </div>
                       
                </div>
            </div>
        </div>
        <!-- /PURCHASE ITEM -->

<?php $i++; } } ?>