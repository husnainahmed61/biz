<?php
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 06-May-19
 * Time: 11:50 PM
 */
?>

<!-- PURCHASE ITEM -->
<div class="purchase-item row">
    <div class="purchase-item-date col-lg-1 col-xs-2">
        <p><?php echo date("M dS, Y", strtotime(substr($buyingAuction['expires_at'],0,10)))?></p>
    </div>
    <div class="purchase-item-details col-lg-4 col-xs-3">
        <!-- ITEM PREVIEW -->
        <div class="item-preview">
            <!-- <figure class="product-preview-image small liquid">
                <img src="<?= $resources_path."images/auctions/".$buyingAuction[$image] ?>" alt="product-image">
            </figure> -->
            <p class="text-header"><?= $buyingAuction['name'] ?></p>
            <p class="description"><?php
                $string = strip_tags($buyingAuction['description']);
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
        <a href="<?=base_url();?><?= $buyingAuction['cat_slug'] ?>/category3"><p class="category primary"><?= $buyingAuction['cat_name'] ?></p></a>
        <div class="metadata">
            <!-- META ITEM -->
            <div class="meta-item">
                <span class="icon-eye"></span>
                <p><?= $buyingAuction['bid_count'] ?></p>
            </div>
            <!-- /META ITEM -->

            <!-- META ITEM -->
            <div class="meta-item">
                <span class="icon-heart"></span>
                <p><?= $buyingAuction['favourite_count'] ?></p>
            </div>
            <!-- /META ITEM -->
        </div>
        <!-- <p><span class="light">License:</span> Standard</p>
        <p><span class="light">Author:</span> Odin_Design</p>
        <p class="text-header tiny">Check Invoice</p> -->
    </div>
    <div class="purchase-item-price col-xs-1 visible-lg visible-md">
        <?php if ($type == "sell") { ?>
            <p class="price"><span><?=$currency?> </span><?=$buyingAuction['current_price']?></p>
        <?php } else { ?>
            <p class="price"><?php if (isset($buyingAuction['lowest_bid']) && !empty($buyingAuction['lowest_bid'])) { ?>
                    <span><?=$currency?> </span>
                    <?php
                    echo $buyingAuction['lowest_bid'];
                } else {
                    echo "--";
                } ?></p>
        <?php } ?>
    </div>
    <div class="purchase-item-download col-md-2 col-xs-2">
        <a href="<?=base_url();?>bids/biddetail/?auction=<?php echo $this->my_encrypt->encode($buyingAuction['id']); ?>" class="button dark-light">Bid Detail</a>
    </div>
    <div class="purchase-item-download col-md-2 col-xs-1 text-center">
        <?php if($buyingAuction['status'] == 1) {?>
            <p>Active</p>
        <?php } else { ?>
            <p>Inactive</p>
        <?php } ?>
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
                        <a href="#">Edit Item</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="#">Duplicate</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="#">Share</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="#">Delete</a>
                    </li>
                </ul>
                <!-- /DROPDOWN -->
            </div>

        </div>
    </div>
</div>
<!-- /PURCHASE ITEM -->
