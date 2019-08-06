                            <div class="row" id="response">
                            <?php
                            if (isset($auctions) && !empty($auctions)) {
                                foreach ($auctions AS $auction) {
                                    $image = 'image_sm_' . $auction['display_image'];
                                    $startAT = explode(' ', $auction['starts_at']);
                                    $expiresAT = explode(' ', $auction['expires_at']);

                                    $type = $auction['type'];
                                    $bidType = $auction['bid_type'];
                                    $amount = $auction['amount'];
                                    $currentPrice = $auction['current_price'];
                                    $currency = $auction['currency'];
                                    $cat_name = $auction['cat3name'];
                                    //cat_name

                                    if (/*$currentDate <= $auction['expires_at']*/
                                    1) {

                                        if ($type == 'sell') {
                                            if ($bidType == 'free' || $bidType == 'range') {
                                                $price = $amount;

                                            } else if ($bidType == 'incremental') {
                                                $price = $currentPrice;
                                            }
                                        } else {
                                            $price = '';
                                        }
                                        ?>
                                        <div class="col-12 col-md-6 col-lg-3 col-xl-3 ">
                                            <div class="product-item column">
                                                <!-- PRODUCT PREVIEW ACTIONS -->
                                                <div class="product-preview-actions">
                                                    <!-- PRODUCT PREVIEW IMAGE -->
                                                    <figure class="product-preview-image">
                                                        <div class="white_space" style='height: 115px; background-color: white'>
                                                            <img style='height: 100%; width: 100%; object-fit: contain'
                                                                 src="<?= $base_resources_url . $auction[$image] ?>">
                                                        </div>
                                                    </figure>
                                                    <!-- /PRODUCT PREVIEW IMAGE -->

                                                    <!-- PREVIEW ACTIONS -->
                                                    <div class="preview-actions">
                                                        <!-- PREVIEW ACTION -->
                                                        <div class="preview-action">
                                                            <a href="<?= base_url($auction['slug'] . '/auction') ?>">
                                                                <div class="circle tiny primary">
                                                                    <span class="icon-tag"></span>
                                                                </div>
                                                            </a>
                                                            <a href="#">
                                                                <p>Go to Item</p>
                                                            </a>
                                                        </div>
                                                        <!-- /PREVIEW ACTION -->

                                                        <!-- PREVIEW ACTION -->
                                                        <div class="preview-action">
                                                            <a href="javascript:deactive_tiptip(<?= $auction['id'] ?>);">
                                                                <div class="circle tiny secondary">
                                                                    <span class="icon-heart"></span>
                                                                </div>
                                                            </a>
                                                            <a href="javascript:deactive_tiptip(<?= $auction['id'] ?>);">
                                                                <p>Favourites +</p>
                                                            </a>
                                                        </div>
                                                        <!-- /PREVIEW ACTION -->
                                                    </div>
                                                    <!-- /PREVIEW ACTIONS -->
                                                </div>
                                                <!-- /PRODUCT PREVIEW ACTIONS -->
                                                <div class="info-wrapper-cs">
                                                    <!-- PRODUCT INFO -->
                                                    <div class="product-info">
                                                        <a href="<?= base_url($auction['slug'] . '/auction') ?>">
                                                            <p class="text-header"><?php
                                                                $string = strip_tags($auction['name']);
                                                        if (strlen($string) > 30) {

                                                            // truncate string
                                                            $stringCut = substr($string, 0, 30);
                                                            $endPoint = strrpos($stringCut, ' ');

                                                            //if the string doesn't contain any space then it will cut without word basis.
                                                            $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                            $string .= " (...)";
                                                        }
                                                        echo $string;?></p>
                                                        </a>
                                                        <p class="product-description"><?php
                                                            $string = strip_tags($auction['description']);
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
                                                        <a href="<?= base_url() ?><?= $auction['cat3slug'] ?>/category3">
                                                            <p class="category primary"><?php if (isset($cat_name)) {
                                                                    $string = strip_tags($cat_name);
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
                                                        <?php if ($type == "sell") { ?>


                                                            <p class="price"><span><?= $currency ?> </span><?php if (isset($price)) {
                                                                    echo $price;
                                                                } ?></p>
                                                        <?php } else { ?>
                                                            <p class="price"><span>Quotation Required</span></p>
                                                        <?php } ?>
                                                    </div>
                                                    <!-- /PRODUCT INFO -->
                                                    <hr class="line-separator">

                                                    <!-- USER RATING -->
                                                    <div class="user-rating">
                                                        <a href="<?= base_url(); ?><?= $auction['user_slug'] ?>/user">
                                                            <figure class="user-avatar small">
                                                                <?php if (isset($auction['profile_picture']) && !empty($auction['profile_picture'])) { ?>
                                                                    <img src="<?= $base_resources_url_user . '' . $auction['profile_picture'] ?>"
                                                                         alt="user-avatar">
                                                                <?php } else { ?>
                                                                    <img src="<?= base_url() ?>assets_u/images/avatars/avatar_01.jpg"
                                                                         alt="user-avatar">
                                                                <?php } ?>
                                                            </figure>
                                                        </a>
                                                        <a href="<?= base_url(); ?><?= $auction['user_slug'] ?>/user">
                                                            <p class="text-header tiny"><?= $auction['first_name']?></p>
                                                        </a>
                                                        <ul class="rating tooltip" title="Author's Reputation" style="position: inherit;opacity: 1;">
                            <?php 
                            $total_rating = $auction['average_rating'];
                            $empty_total_rating = 5-$total_rating ; 
                            for ($i=0; $i < $total_rating ; $i++) { 
                            ?>
                            <li class="rating-item">
                                <!-- SVG STAR -->
                                <svg class="svg-star">
                                    <use xlink:href="#svg-star"></use>
                                </svg>
                                <!-- /SVG STAR -->
                            </li>
                            <?php } for ($i=0; $i < $empty_total_rating ; $i++) { ?>
                            <li class="rating-item empty">
                                <!-- SVG STAR -->
                                <svg class="svg-star">
                                    <use xlink:href="#svg-star"></use>
                                </svg>
                                <!-- /SVG STAR -->
                            </li>
                            <?php } ?>
                        </ul>
                                                        
                                                    </div>
                                                    <!-- /USER RATING -->
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div>
