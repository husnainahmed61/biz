<?php
if(isset($buyingAuctions) && !empty($buyingAuctions)) {
    foreach ($buyingAuctions AS $buyingAuctions) :
        $image = 'image_sm_' . $buyingAuctions['display_image'];
        $startAt = explode(' ', $buyingAuctions['starts_at']);
        $expiresAt = explode(' ', $buyingAuctions['expires_at']);

        $type = $buyingAuctions['type'];
        $bidType = $buyingAuctions['bid_type'];
        $amount = $buyingAuctions['amount'];
        $currentPrice = $buyingAuctions['current_price'];
        $currency = $buyingAuctions['currency'];
        $price = $currency.' '.$amount;

        ?>
        <div class="col-12 col-md-6 col-lg-4 col-xl-4 ">
        <div class="product-item column">
                        <!-- PRODUCT PREVIEW ACTIONS -->
                        <div class="product-preview-actions">
                            <!-- PRODUCT PREVIEW IMAGE -->
                            <figure class="product-preview-image">
                                <div class="white_space">
                                <img src="<?= $resources_path."images/auctions/".$buyingAuctions[$image] ?>" alt="product-image">
                            </div>
                            </figure>
                            <!-- /PRODUCT PREVIEW IMAGE -->

                            <!-- PREVIEW ACTIONS -->
                            <div class="preview-actions">
                                <div class="inner-wrapper">
                                    <!-- PREVIEW ACTION -->
                                    <div class="preview-action">
                                        <a href="<?= base_url($buyingAuctions['slug'].'/auction') ?>">
                                            <div class="circle tiny primary">
                                                <span class="icon-tag"></span>
                                            </div>
                                        </a>
                                        <a href="<?= base_url($buyingAuctions['slug'].'/auction') ?>">
                                            <p>Go to Item</p>
                                        </a>
                                    </div>
                                    <!-- /PREVIEW ACTION -->

                                    <!-- PREVIEW ACTION -->
                                    <div class="preview-action">
                                        <a href="#">
                                            <div class="circle tiny secondary">
                                                <span class="icon-heart"></span>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <p>Favourites +</p>
                                        </a>
                                    </div>
                                    <!-- /PREVIEW ACTION -->
                                </div>
                            </div>
                            <!-- /PREVIEW ACTIONS -->
                        </div>
                        <!-- /PRODUCT PREVIEW ACTIONS -->

                        <!-- PRODUCT INFO -->
                        <div class="product-info">
                            <a href="item-v1.html">
                                <p class="text-header"><?php
                                $string = strip_tags($buyingAuctions['name']);
                                    if (strlen($string) > 30) {

                                        // truncate string
                                        $stringCut = substr($string, 0, 30);
                                        $endPoint = strrpos($stringCut, ' ');

                                        //if the string doesn't contain any space then it will cut without word basis.
                                        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                        $string .= " (...)";
                                    }
                                    echo $string;
                                ?></p>
                            </a>
                            <p class="product-description"><?php
                                    $string = strip_tags($buyingAuctions['description']);
                                    if (strlen($string) > 45) {

                                        // truncate string
                                        $stringCut = substr($string, 0, 45);
                                        $endPoint = strrpos($stringCut, ' ');

                                        //if the string doesn't contain any space then it will cut without word basis.
                                        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                        $string .= " (...)";
                                    }
                                    echo $string;
                                    ?></p>
                            <a href="<?= base_url() ?><?= $buyingAuctions['cat_slug'] ?>/category3">
                                <p class="category primary"><?php if (isset($buyingAuctions['cat_name'])) {

                                            $string = strip_tags($buyingAuctions['cat_name']);
                                    if (strlen($string) > 20) {

                                        // truncate string
                                        $stringCut = substr($string, 0, 20);
                                        $endPoint = strrpos($stringCut, ' ');

                                        //if the string doesn't contain any space then it will cut without word basis.
                                        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                        $string .= " (...)";
                                    }
                                    echo $string;
                                        } ?></p>
                            </a>
                            
                            <p class="price"><span>Quotation Required</span></p>
                                
                        </div>
                        <!-- /PRODUCT INFO -->
                       
                    </div>
                    </div>
        <?php
    endforeach;
    ?>
                <?php } else {?>
                <div class="col-md-4 col-xs-12">
                    <span>No auction found.</span>
                </div>
            <?php } ?>