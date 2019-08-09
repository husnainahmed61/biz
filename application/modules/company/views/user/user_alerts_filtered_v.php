<?php
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 10-May-19
 * Time: 1:20 AM
 */
?>
<?php if (isset($alerts) && !empty($alerts)) {
    $i = 0;

    foreach (array_reverse($alerts) AS $alert) {
        //print_r($buyingAuction);

        //$image = 'image_sm_' . $buyingAuction['display_image'];
//        $startAt = explode(' ', $buyingAuction['starts_at']);
//        $expiresAt = explode(' ', $buyingAuction['expires_at']);

        $type = $alert['type'];


        ?>
        <!-- PURCHASE ITEM -->
        <div class="purchase-item row">
            <div class="purchase-item-date col-lg-1 col-xs-2">
                <p><?php echo date("M dS, Y", strtotime(substr($alert['created_at'],0,10)))?></p>
            </div>
            <div class="purchase-item-details col-lg-4 col-xs-3">
                <!-- ITEM PREVIEW -->
                <div class="item-preview">
                    <!-- <figure class="product-preview-image small liquid">
                        <img src="http://localhost:81/resources/images/auctions/hand-made-basket-of-artificial-flowers-5c60210a2cdee-sm.jpg" alt="product-image">
                    </figure> -->
                    <p class="text-header"><?=$alert['name']?></p>
                </div>
                <!-- /ITEM PREVIEW -->
            </div>
            <div class="purchase-item-info col-xs-2 visible-lg">
                <a href="<?=base_url();?><?= $alert['cat_slug'] ?>/category3"><p class="category primary"><?= $alert['cat_name'] ?></p></a>

                <!-- <p><span class="light">License:</span> Standard</p>
                <p><span class="light">Author:</span> Odin_Design</p>
                <p class="text-header tiny">Check Invoice</p> -->
            </div>

            <div class="purchase-item-download col-md-2 col-xs-2">
                <a href="#" class="button dark-light">Alert Detail</a>
            </div>
            <div class="purchase-item-download col-md-2 col-xs-1 text-center">
                <?php if($alert['status'] == 1) {?>
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
                                <a href="<?= base_url('alerts/edit/'.$alert['id']); ?>">Edit Item</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="#">Duplicate</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="#">Share</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="<?= base_url('alerts/delete/'.$alert['id']); ?>">Delete</a>
                            </li>
                        </ul>
                        <!-- /DROPDOWN -->
                    </div>

                </div>
            </div>
        </div>
        <!-- /PURCHASE ITEM -->



    <?php }
} ?>
