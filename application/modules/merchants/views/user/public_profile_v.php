<?php 
 // print_r($currency);
 // exit();
$last = $this->uri->segment(2);

?>
    

    <!-- SECTION HEADLINE -->
    <div class="section-headline-wrap section-headline-main">
        <div class="container">
            <div class="section-headline row">
                <div class="col-sm-6">
                    <h2>User's Profile</h2>
                </div>
                <div class="col-sm-6 s">
                    <p>Home<span class="separator">/</span><span class="current-section">User's Profile</span></p>
                </div>
            </div>
        </div>
    </div>
    <!-- /SECTION HEADLINE -->

    <!-- AUTHOR PROFILE BANNER -->
    <!-- <div class="author-profile-banner"></div> -->

    <div class="author-profile-meta-wrap">
            <div class="author-profile-meta container">
                <!-- AUTHOR PROFILE INFO -->
                <div class="author-profile-info">
                    <!-- AUTHOR PROFILE INFO ITEM -->
                    <div class="author-profile-info-item">
                        <p class="text-header">Member Since:</p>
                        <p><?php echo date("F dS, Y", strtotime(substr($userData['created_at'],0,10)))?></p>
                    </div>
                    <!-- /AUTHOR PROFILE INFO ITEM -->

                    <!-- AUTHOR PROFILE INFO ITEM -->
                    <div class="author-profile-info-item">
                        <p class="text-header">Total Closed Deals:</p>
                        <p>820</p>
                    </div>
                    <!-- /AUTHOR PROFILE INFO ITEM -->

                    <!-- AUTHOR PROFILE INFO ITEM -->
                    <div class="author-profile-info-item">
                        <p class="text-header">User Type:</p>
                        <p><?=$userData['type']?></p>
                    </div>
                    <!-- /AUTHOR PROFILE INFO ITEM -->

                    <input type="hidden" name="user_id_hidden" id="user_id_hidden" value="<?=$userData['id']?>">

                    <!-- AUTHOR PROFILE INFO ITEM -->
                    <div class="author-profile-info-item">
                        <p class="text-header">Website:</p>
                        <p><a href="<?=$userData['website_url']?>" class="primary"><?=$userData['website_url']?></a></p>
                    </div>
                    <!-- /AUTHOR PROFILE INFO ITEM -->
                </div>
                <!-- /AUTHOR PROFILE INFO -->
            </div>
        </div>
    <!-- /AUTHOR PROFILE BANNER -->
    <div class="container">
        <!-- AUTHOR PROFILE META -->
        
        <!-- /AUTHOR PROFILE META -->

        <!-- SECTION -->
        <div class="section-wrap">
            <div class="section overflowable">
                <div class="row">
                    <!-- SIDEBAR -->
                    <div class="sidebar left author-profile col-lg-3 sidebar-profile-cs">
                        <!-- SIDEBAR ITEM -->
                        <div class="sidebar-item author-bio">
                            <!-- USER AVATAR -->
                            <a href="user-profile.html" class="user-avatar-wrap medium">
                                <figure class="user-avatar medium">
                                    <?php if(isset($userData['profile_picture']) && !empty($userData['profile_picture'])){ ?>
                                
                                        <img src="<?= $resources_path . "users/profile_picture/" . $userData['profile_picture'] ?>" alt="profile-default-image">
                                    <?php } else{ ?>
                                        <img src="<?= $resources_path . "users/profile_picture/not-available.jpg" ?>" alt="profile-default-image">
                                    <?php } ?>
                                </figure>
                            </a>
                            <!-- /USER AVATAR -->
                            <p class="text-header"><?=$userData['first_name'].' '.$userData['last_name']?></p>
                            <p class="text-oneline"><br><?=$city['name'].','.$country['name']?></p>
                            <!-- SHARE LINKS -->
                            <ul class="share-links">
                                <li><a href="<?=$userData['facebook_link']?>" target="_blank" class="fb"></a></li>
                                <li><a href="<?=$userData['twitter_link']?>"  target="_blank" class="twt"></a></li>
                                <li><a href="<?=$userData['google_link']?>"  target="_blank" class="db"></a></li>
                            </ul>
                            <!-- /SHARE LINKS -->
                            <a id="follow_status" href="<?php
                            if (isset($following[0]['id']) && !empty($following[0]['id'])) {
                                echo "javascript:Unfollow(".$userData['id'].")";
                            }
                            else{
                                echo "javascript:follow(".$userData['id'].")";
                            }?>" class="button mid dark spaced"><span class="primary"><?php
                            if (isset($following[0]['id']) && !empty($following[0]['id'])) {
                                echo "Following";
                            }
                            else{
                                echo "Follow";
                            }

                                ?></span></a>
                            <!-- <a href="#" class="button mid dark-light">Send a Private Message</a> -->
                        </div>
                        <!-- /SIDEBAR ITEM -->

                        <!-- DROPDOWN -->
                        <ul class="dropdown hover-effect">

                            <li class="dropdown-item <?php if ($last=="user") {echo "active"; } else  {echo "";}?>">
                                <a href="<?=base_url()?><?=$userData['slug']?>/user">Profile Page</a>
                            </li>
                            <li class="dropdown-item <?php if ($last=="buying_posts") {echo "active"; } else  {echo "";}?>">
                                <a href="<?=base_url()?><?=$userData['slug']?>/buying_posts">Buyer Requests (103)</a>
                            </li>
                            <li class="dropdown-item <?php if ($last=="selling_posts") {echo "active"; } else  {echo "";}?>">
                                <a href="<?=base_url()?><?=$userData['slug']?>/selling_posts">Selling Auctions (93)</a>
                            </li>
                            <!-- <li class="dropdown-item">
                                <a href="author-profile-messages.html">Message Board</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="author-profile-reviews.html">Customer Reviews (42)</a>
                            </li> -->
                            <li class="dropdown-item <?php if ($last=="followers") {echo "active"; } else  {echo "";}?>">
                                <a href="<?=base_url()?><?=$userData['slug']?>/followers">Followers (5)</a>
                            </li>
                            <li class="dropdown-item <?php if ($last=="following") {echo "active"; } else  {echo "";}?>">
                                <a href="<?=base_url()?><?=$userData['slug']?>/following">Following (2)</a>
                            </li>
                            
                        </ul>
                        <!-- /DROPDOWN -->

                        <!-- SIDEBAR ITEM -->
                        <div class="sidebar-item author-reputation full">
                            <h4>Author's Reputation</h4>
                            <hr class="line-separator">
                            <!-- PIE CHART -->
                            <div class="pie-chart pie-chart1">
                                <p class="text-header percent">86<span>%</span></p>
                                <p class="text-header percent-info">Recommended</p>
                                <!-- RATING -->
                                <ul class="rating">
                                    <li class="rating-item">
                                        <!-- SVG STAR -->
                                        <svg class="svg-star">
                                            <use xlink:href="#svg-star"></use>
                                        </svg>
                                        <!-- /SVG STAR -->
                                    </li>
                                    <li class="rating-item">
                                        <!-- SVG STAR -->
                                        <svg class="svg-star">
                                            <use xlink:href="#svg-star"></use>
                                        </svg>
                                        <!-- /SVG STAR -->
                                    </li>
                                    <li class="rating-item">
                                        <!-- SVG STAR -->
                                        <svg class="svg-star">
                                            <use xlink:href="#svg-star"></use>
                                        </svg>
                                        <!-- /SVG STAR -->
                                    </li>
                                    <li class="rating-item">
                                        <!-- SVG STAR -->
                                        <svg class="svg-star">
                                            <use xlink:href="#svg-star"></use>
                                        </svg>
                                        <!-- /SVG STAR -->
                                    </li>
                                    <li class="rating-item empty">
                                        <!-- SVG STAR -->
                                        <svg class="svg-star">
                                            <use xlink:href="#svg-star"></use>
                                        </svg>
                                        <!-- /SVG STAR -->
                                    </li>
                                </ul>
                                <!-- /RATING -->
                            </div>
                            <!-- /PIE CHART -->
                            <a href="#" class="button mid dark-light">Read all the Customer Reviews</a>
                        </div>
                        <!-- /SIDEBAR ITEM -->
                    </div>
                    <!-- /SIDEBAR -->

                    <!-- CONTENT -->
                    <?php if ($last == "user") { ?>
                    <div class="content right col-12 col-lg-9">
                        <!-- HEADLINE -->
                        <div class="headline buttons primary">
                            <h4>Buying Requests</h4>
                            <a href="<?=base_url()?><?=$userData['slug']?>/buying_posts" class="button mid-short dark-light">See all Buying Requests</a>
                        </div>
                        <!-- /HEADLINE -->

                        <!-- PRODUCT LIST -->
                        <div class="tab-content-cs">
                            <div>
                                <div class="product-list grid row">
                                    <!-- PRODUCT ITEM -->
                                    
                                    <!-- /PRODUCT ITEM -->

                                    <!-- PRODUCT ITEM -->
                                    
                                    <!-- /PRODUCT ITEM -->

                                    <!-- PRODUCT ITEM -->
                                    <?php if(isset($buyingAuctions) && !empty($buyingAuctions)) {
                                        $i = 0;

                                        foreach (array_reverse($buyingAuctions) as $key => $buyingAuction) {
                                            //print_r($buyingAuction);

                                            $image = 'image_sm_' . $buyingAuction['display_image'];
                                            $startAt = explode(' ', $buyingAuction['starts_at']);
                                            $expiresAt = explode(' ', $buyingAuction['expires_at']);

                                            $type = $buyingAuction['type'];
                                            $bidType = $buyingAuction['bid_type'];
                                            $amount = $buyingAuction['amount'];
                                            $currentPrice = $buyingAuction['current_price'];
                                            $currency = $buyingAuction['currency'];
                                            $price = $currency.' '.$amount;
                                            
                                     ?>
                                     
                                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                                        <div class="product-item column">
                                            <!-- PRODUCT PREVIEW ACTIONS -->
                                            <div class="product-preview-actions">
                                                <!-- PRODUCT PREVIEW IMAGE -->
                                                <figure class="product-preview-image">
                                                    <div style='height: 150px; width: 320px; background-color: white'>
                                                        <img style='height: 100%; width: 100%; object-fit: contain' src="<?= $resources_path."images/auctions/".$buyingAuction[$image] ?>" alt="product-image">
                                                    </div>
                                                </figure>
                                                <!-- /PRODUCT PREVIEW IMAGE -->

                                                <!-- PREVIEW ACTIONS -->
                                                <div class="preview-actions">
                                                    <div class="inner-wrapper">
                                                        <!-- PREVIEW ACTION -->
                                                        <div class="preview-action">
                                                            <a href="<?= base_url($buyingAuction['slug'].'/auction') ?>">
                                                                <div class="circle tiny primary">
                                                                    <span class="icon-tag"></span>
                                                                </div>
                                                            </a>
                                                            <a href="<?= base_url($buyingAuction['slug'].'/auction') ?>">
                                                                <p>Go to Item</p>
                                                            </a>
                                                        </div>
                                                        <!-- /PREVIEW ACTION -->

                                                        <!-- PREVIEW ACTION -->
                                                        <div class="preview-action">
                                                            <a href="javascript:deactive_tiptip(<?= $buyingAuction['id'] ?>);">
                                                                <div class="circle tiny secondary">
                                                                    <span class="icon-heart"></span>
                                                                </div>
                                                            </a>
                                                            <a href="javascript:deactive_tiptip(<?= $buyingAuction['id'] ?>);">
                                                                <p>Favourites +</p>
                                                            </a>
                                                        </div>
                                                        <!-- /PREVIEW ACTION -->
                                                    </div>
                                                </div>
                                                <!-- /PREVIEW ACTIONS -->
                                            </div>
                                            <!-- /PRODUCT PREVIEW ACTIONS -->

                                            <div class="info-wrapper-cs">
                                                <div class="product-info">
                                                    <a href="<?= base_url($buyingAuction['slug'].'/auction') ?>">
                                                        <p class="text-header"><?php
                                                        $string = strip_tags($buyingAuction['name']);
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
                                                    $string = strip_tags($buyingAuction['description']);
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
                                                    <a href="<?=base_url()?><?=$buyingAuction['cat_slug']?>/category3">
                                                        <p class="category primary"><?php 
                                                        $string = strip_tags($buyingAuction['cat_name']);
                                                    if (strlen($string) > 20) {

                                                        // truncate string
                                                        $stringCut = substr($string, 0, 20);
                                                        $endPoint = strrpos($stringCut, ' ');

                                                        //if the string doesn't contain any space then it will cut without word basis.
                                                        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                        $string .= " (...)";
                                                    }
                                                    echo $string;

                                                        ?></p>
                                                    </a>
                                                    <p class="price" style="display: none;"><span><?=$buyingAuction['currency']?></span> <?=$buyingAuction['amount']?></p>
                                                </div>
                                                <!-- /PRODUCT INFO -->
                                                <hr class="line-separator">

                                                <!-- USER RATING -->
                                                <div class="user-rating">
                                                    <a href="#">
                                                        <figure class="user-avatar small">
                                                            <?php if(isset($userData['profile_picture']) && !empty($userData['profile_picture'])){ ?>
                                
                                                                <img src="<?= $resources_path . "users/profile_picture/" . $userData['profile_picture'] ?>" alt="user-avatar">
                                                            <?php } else{ ?>
                                                                <img src="<?= $resources_path . "users/profile_picture/not-available.jpg" ?>" alt="user-avatar">
                                                            <?php } ?>
                                                        </figure>
                                                    </a>
                                                    <a href="<?=base_url()?><?=$userData['slug']?>/user">
                                                        <p class="text-header tiny"><?=$userData['first_name']?></p>
                                                    </a>

                                                    <ul class="rating tooltip" title="Author's Reputation">
                                                        <?php 
                                                        $total_rating = $buyingAuction['average_rating'];
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
                                            </div>
                                        </div>
                                    </div>

                                <?php  if ($key == 2) {break;} 
                                    } 
                                } ?>
                                    <!-- /PRODUCT ITEM -->
                                </div>
                            </div>
                        </div>
                        <!-- /PRODUCT LIST -->

                        <!-- HEADLINE -->
                        <div class="headline buttons primary">
                            <h4>Selling Auctions</h4>
                            <a href="<?=base_url()?><?=$userData['slug']?>/selling_posts" class="button mid-short dark-light">See all Selling Auctions</a>
                        </div>
                        <!-- /HEADLINE -->

                        <!-- PRODUCT LIST -->
                        <div class="tab-content-cs">
                            <div>
                                <div class="product-list grid row">
                                    <!-- PRODUCT ITEM -->
                                    <?php if(isset($sellingAuctions) && !empty($sellingAuctions)) {
                                    $i = 0; 
                                        foreach (array_reverse($sellingAuctions) as $key => $sellingAuction) {
                                            $image = 'image_sm_' . $sellingAuction['display_image'];
                                            $startAt = explode(' ', $sellingAuction['starts_at']);
                                            $expiresAt = explode(' ', $sellingAuction['expires_at']);

                                            $type = $sellingAuction['type'];
                                            $bidType = $sellingAuction['bid_type'];
                                            $amount = $sellingAuction['amount'];
                                            $currentPrice = $sellingAuction['current_price'];
                                            $currency = $sellingAuction['currency'];
                                            $price = $currency.' '.$amount;

                                        ?>
                                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                                        <div class="product-item column">
                                            <!-- PRODUCT PREVIEW ACTIONS -->
                                            <div class="product-preview-actions">
                                                <!-- PRODUCT PREVIEW IMAGE -->
                                                <figure class="product-preview-image">
                                                    <div style='height: 150px; width: 320px; background-color: white'>
                                                        <img style='height: 100%; width: 100%; object-fit: contain' src="<?= $resources_path."images/auctions/".$sellingAuction[$image] ?>" alt="product-image">
                                                    </div>
                                                </figure>
                                                <!-- /PRODUCT PREVIEW IMAGE -->

                                                <!-- PREVIEW ACTIONS -->
                                                <div class="preview-actions">
                                                    <div class="inner-wrapper">
                                                        <!-- PREVIEW ACTION -->
                                                        <div class="preview-action">
                                                            <a href="<?= base_url($sellingAuction['slug'].'/auction') ?>">
                                                                <div class="circle tiny primary">
                                                                    <span class="icon-tag"></span>
                                                                </div>
                                                            </a>
                                                            <a href="<?= base_url($sellingAuction['slug'].'/auction') ?>">
                                                                <p>Go to Item</p>
                                                            </a>
                                                        </div>
                                                        <!-- /PREVIEW ACTION -->

                                                        <!-- PREVIEW ACTION -->
                                                        <div class="preview-action">
                                                            <a href="javascript:deactive_tiptip(<?= $sellingAuction['id'] ?>);">
                                                                <div class="circle tiny secondary">
                                                                    <span class="icon-heart"></span>
                                                                </div>
                                                            </a>
                                                            <a href="javascript:deactive_tiptip(<?= $sellingAuction['id'] ?>);">
                                                                <p>Favourites +</p>
                                                            </a>
                                                        </div>
                                                        <!-- /PREVIEW ACTION -->
                                                    </div>
                                                </div>
                                                <!-- /PREVIEW ACTIONS -->
                                            </div>
                                            <!-- /PRODUCT PREVIEW ACTIONS -->

                                            <div class="info-wrapper-cs">
                                                <div class="product-info">
                                                    <a href="<?= base_url('auction/'.$sellingAuction['slug']) ?>">
                                                        <p class="text-header"><?php 
                                                        $string = strip_tags($sellingAuction['name']);
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
                                                    $string = strip_tags($sellingAuction['description']);
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
                                                    <a href="<?= $sellingAuction['cat_slug']?>/category3">
                                                        <p class="category primary"><?php
                                                        $string = strip_tags($sellingAuction['cat_name']);
                                                    if (strlen($string) > 20) {

                                                        // truncate string
                                                        $stringCut = substr($string, 0, 20);
                                                        $endPoint = strrpos($stringCut, ' ');

                                                        //if the string doesn't contain any space then it will cut without word basis.
                                                        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                        $string .= " (...)";
                                                    }
                                                    echo $string;
                                                        ?></p>
                                                    </a>
                                                    <p class="price"><span><?= $sellingAuction['currency'] ?></span> <?= $sellingAuction['amount'] ?></p>
                                                </div>
                                                <!-- /PRODUCT INFO -->
                                                <hr class="line-separator">

                                                <!-- USER RATING -->
                                                <div class="user-rating">
                                                    <a href="#">
                                                        <figure class="user-avatar small">
                                                            <?php if(isset($userData['profile_picture']) && !empty($userData['profile_picture'])){ ?>
                                
                                                                <img src="<?= $resources_path . "users/profile_picture/" . $userData['profile_picture'] ?>" alt="user-avatar">
                                                            <?php } else{ ?>
                                                                <img src="<?= $resources_path . "users/profile_picture/not-available.jpg" ?>" alt="user-avatar">
                                                            <?php } ?>
                                                        </figure>
                                                    </a>
                                                    <a href="<?=base_url()?><?=$userData['slug']?>/user">
                                                        <p class="text-header tiny"><?=$userData['first_name']?></p>
                                                    </a>
                                                    <ul class="rating tooltip" title="Author's Reputation">
                                                        <?php 
                                                        $total_rating = $sellingAuction['average_rating'];
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
                                            </div>
                                        </div>
                                    </div>
                                    <?php  if ($key == 2) {break;} 
                                    } 
                                } ?>
                                    <!-- /PRODUCT ITEM -->

                                    <!-- PRODUCT ITEM -->
                                    
                                    <!-- /PRODUCT ITEM -->

                                    <!-- PRODUCT ITEM -->
                                    <!-- /PRODUCT ITEM -->
                                </div>
                            </div>
                        </div>
                        <!-- /PRODUCT LIST -->

                        <div class="clearfix"></div>

                        <!-- HEADLINE -->
                        <!-- <div class="headline buttons primary">
                            <h4>Customer Reviews</h4>
                            <a href="author-profile-messages.html" class="button mid-short dark-light">See all Reviews</a>
                        </div> -->
                        <!-- /HEADLINE -->

                        <!-- COMMENTS -->
                        <div class="comment-list" style="display: none;">
                            <!-- COMMENT -->
                            <div class="comment-wrap">
                                <!-- USER AVATAR -->
                                <a href="user-profile.html">
                                    <figure class="user-avatar medium">
                                        <img src="<?= base_url("assets_u/images/avatars/avatar_02.jpg")?>" alt="">
                                    </figure>
                                </a>
                                <!-- /USER AVATAR -->
                                <div class="comment">
                                    <p class="text-header">MeganV.</p>
                                    <!-- PIN -->
                                    <span class="pin greyed">Purchased</span>
                                    <!-- /PIN -->
                                    <p class="timestamp">5 Hours Ago</p>
                                    <a href="#" class="report">Report</a>
                                    <p>I’ve recently bought your theme and let me say it’s fantastic! I have a small question regarding the main files and how to install the theme. Could you help me? Thanks!</p>
                                </div>
                            </div>
                            <!-- /COMMENT -->

                            <!-- LINE SEPARATOR -->
                            <hr class="line-separator">
                            <!-- /LINE SEPARATOR -->

                            <!-- COMMENT -->
                            <div class="comment-wrap">
                                <!-- USER AVATAR -->
                                <a href="user-profile.html">
                                    <figure class="user-avatar medium">
                                        <img src="<?= base_url("assets_u/images/avatars/avatar_19.jpg")?>" alt="">
                                    </figure>
                                </a>
                                <!-- /USER AVATAR -->
                                <div class="comment">
                                    <p class="text-header">Cloud Templates</p>
                                    <p class="timestamp">8 Hours Ago</p>
                                    <a href="#" class="report">Report</a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magnada. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                </div>
                            </div>
                            <!-- /COMMENT -->
                        </div>
                        <!-- /COMMENTS -->
                    </div>
                    <!-- CONTENT -->
                <?php }
                if ($last == "buying_posts") { ?>
                                <!-- CONTENT -->
                <div class="content right col-12 col-lg-9">
                    <!-- HEADLINE -->
                    <div class="headline primary">
                        <div class="row">
                            <div class="col-md-3">
                                <h4 id="buyer_requests"></h4>
                            </div>
                            <div class="col-md-9">
                                <!-- VIEW SELECTORS -->
                                <!-- <div class="view-selectors">
                                    <a href="author-profile-items.html" class="view-selector grid active"></a>
                                    <a href="author-profile-items-listview.html" class="view-selector list"></a>
                                </div> -->
                                <!-- /VIEW SELECTORS -->
                                <form id="shop_filter_form" name="shop_filter_form">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-4 box">
                                            <label for="price_filter" class="select-block">
                                                <select name="price_filter" id="input-sort" class="select-block">
                                                    <?php foreach ($sort_private AS $key => $item){
                                                        $selected = ($key == 0) ? "selected" : "" ;
                                                        if($key == 2 || $key == 3){
                                                            continue;
                                                            ?>

                                                            <option value="<?=$key+1 ?>" <?= $selected ?> ><?= $item['text']?></option>
                                                        <?php } else { ?>
                                                            <option value="<?=$key+1 ?>" <?= $selected ?> ><?= $item['text']?></option>
                                                        <?php  } }?>
                                                </select>
                                                <!-- SVG ARROW -->
                                                <svg class="svg-arrow">
                                                    <use xlink:href="#svg-arrow"></use>
                                                </svg>
                                                <!-- /SVG ARROW -->
                                            </label>
                                        </div>

                                        <div class="col-lg-6 col-md-4 box">
                                            <label for="itemspp_filter" class="select-block"
                                                   style="margin-right: 28px;">
                                                <input type="hidden" name="itemspp_filter" id="input-limit" value="12">
                                                <select name="itemspp_filter" id="input-currency" class="select-block"> 
                                                    <option selected disabled>select currency</option>
                                                    <?php foreach ($currency AS $key => $item){
                                                        $selected = ($key == 0) ? "selected" : "" ;
                                                        ?>

                                                        <option value="<?=$item['name'] ?>"><?= $item['name']?></option>
                                                    <?php }?>
                                                </select>
                                                <!-- SVG ARROW -->
                                                <svg class="svg-arrow">
                                                    <use xlink:href="#svg-arrow"></use>
                                                </svg>
                                                <!-- /SVG ARROW -->
                                            </label>
                                        </div>
                                    </div>
                                </form>
                                <div class="clearfix"></div>
                            </div>

                        </div>


                    </div>
                    <!-- /HEADLINE -->

                    <!-- PRODUCT LIST -->

                    <div class="product-showcase tabbed">
                            <!-- PRODUCT LIST -->
                            <div class="product-list grid buy-auctions-list">

                            </div>
                            <!-- /PRODUCT LIST -->
                        </div>
                    <!-- /PRODUCT LIST -->

                    <!-- PAGER -->
                    <div class="pager primary pagination" id="buyPagination">

    <!--                     <div class="pager-item"><p>1</p></div>
                        <div class="pager-item active"><p>2</p></div>
                        <div class="pager-item"><p>3</p></div>
                        <div class="pager-item"><p>...</p></div>
                        <div class="pager-item"><p>17</p></div> -->
                    </div>
                    <div class="col-sm-6 text-right buy-pagination-details"></div>
                    <!-- /PAGER -->
                </div>
                <!-- CONTENT -->
                <?php } if ($last == "selling_posts") { ?>

                    <div class="content right col-12 col-lg-9">
                <!-- HEADLINE -->
                <div class="headline primary">
                    <h4 id="selling_auctions"></h4>
                    <!-- VIEW SELECTORS -->
                    <!-- <div class="view-selectors">
                        <a href="author-profile-items.html" class="view-selector grid active"></a>
                        <a href="author-profile-items-listview.html" class="view-selector list"></a>
                    </div> -->
                    <!-- /VIEW SELECTORS -->
                    <form id="shop_filter_form" name="shop_filter_form">
                        <div class="row">
                            <div class="col-lg-6 col-md-4 box">
                                <label for="price_filter" class="select-block">
                                    <select name="price_filter" id="sell_input-sort" class="select-block">
                                        <?php foreach ($sort_private AS $key => $item) {
                                            $selected = ($key == 0) ? "selected" : "";
                                            if ($key == 2 || $key == 3) {
                                                continue;
                                                ?>

                                                <option value="<?= $key + 1 ?>" <?= $selected ?> ><?= $item['text'] ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $key + 1 ?>" <?= $selected ?> ><?= $item['text'] ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </label>
                            </div>
                            <div class="col-lg-6 col-md-4 box">
                                <label for="itemspp_filter" class="select-block" style="margin-right: 28px;">
                                    <input type="hidden" name="itemspp_filter" id="sell_input-limit" value="12">
                                    <select name="itemspp_filter" id="sell_input-currency" class="select-block">
                                        <option selected disabled>select currency</option>
                                        <?php foreach ($currency AS $key => $item) {
                                            $selected = ($key == 0) ? "selected" : "";
                                            ?>

                                            <option value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </label>
                            </div>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
                <!-- /HEADLINE -->

                <!-- PRODUCT LIST -->
                <div class="product-list grid column3-4-wrap sell-auctions-list">

                </div>
                <!-- /PRODUCT LIST -->

                <div class="clearfix"></div>

                <!-- PAGER -->
                <div class="pager primary pagination" id="sellPagination">
                    
<!--                     <div class="pager-item"><p>1</p></div>
                    <div class="pager-item active"><p>2</p></div>
                    <div class="pager-item"><p>3</p></div>
                    <div class="pager-item"><p>...</p></div>
                    <div class="pager-item"><p>17</p></div> -->
                </div>
                <div class="col-sm-6 text-right sell-pagination-details"></div>
                <!-- /PAGER -->
            </div>
            <!-- CONTENT -->

                <?php } if ($last == "followers") {  ?>
                    <!-- CONTENT -->
            <div class="content right">
                <!-- HEADLINE -->
                <div class="headline simple primary">
                    <h4>Followers (5)</h4>
                </div>
                <!-- /HEADLINE -->

                <!-- FOLLOW LIST -->
                <div class="follow-list">
                    <?php foreach ($followers_list as $key => $followers) {
                    ?>
                    <!-- FOLLOW LIST ITEM -->
                    <div class="follow-list-item">
                        <a href="author-profile.html">
                            <figure class="user-avatar medium liquid">
                                <?php if(isset($followers['profile_picture']) && !empty($followers['profile_picture'])){ ?>
                                
                                        <img src="<?= $resources_path . "users/profile_picture/" . $followers['profile_picture'] ?>" alt="profile-default-image">
                                    <?php } else{ ?>
                                        <img src="<?= $resources_path . "users/profile_picture/not-available.jpg" ?>" alt="profile-default-image">
                                    <?php } ?>
                            </figure>

                        </a>

                        <!-- FL ITEM INFO -->
                        <div class="fl-item-info fl-description">
                            <p class="text-header"><a href="author-profile.html"><?=$followers['first_name'].' '.$followers['last_name']?></a></p>
                            <p>Member since <?php echo date("F dS, Y", strtotime(substr($followers['created_at'],0,10)))?></p>
                            <p><?=$followers['name']?></p>
                        </div>
                        <!-- /FL ITEM INFO -->

                        <!-- FL ITEM INFO -->
                        <div class="fl-item-info fl-reputation">
                            <p class="text-header">Reputation</p>
                            <!-- RATING -->
                            <ul class="rating">
                                <li class="rating-item">
                                    <!-- SVG STAR -->
                                    <svg class="svg-star">
                                        <use xlink:href="#svg-star"></use>
                                    </svg>
                                    <!-- /SVG STAR -->
                                </li>
                                <li class="rating-item">
                                    <!-- SVG STAR -->
                                    <svg class="svg-star">
                                        <use xlink:href="#svg-star"></use>
                                    </svg>
                                    <!-- /SVG STAR -->
                                </li>
                                <li class="rating-item">
                                    <!-- SVG STAR -->
                                    <svg class="svg-star">
                                        <use xlink:href="#svg-star"></use>
                                    </svg>
                                    <!-- /SVG STAR -->
                                </li>
                                <li class="rating-item">
                                    <!-- SVG STAR -->
                                    <svg class="svg-star">
                                        <use xlink:href="#svg-star"></use>
                                    </svg>
                                    <!-- /SVG STAR -->
                                </li>
                                <li class="rating-item empty">
                                    <!-- SVG STAR -->
                                    <svg class="svg-star">
                                        <use xlink:href="#svg-star"></use>
                                    </svg>
                                    <!-- /SVG STAR -->
                                </li>
                            </ul>
                            <!-- /RATING -->
                        </div>
                        <!-- /FL ITEM INFO -->

                        <!-- FL ITEM INFO -->
                        <div class="fl-item-info fl-product-items">
                            <a href="item-v1.html">
                                <figure class="product-preview-image small">
                                    <img src="images/items/westeros_s.jpg" alt="">
                                </figure>
                            </a>

                            <a href="item-v1.html">
                                <figure class="product-preview-image small">
                                    <img src="images/items/flat_s.jpg" alt="">
                                </figure>
                            </a>

                            <a href="item-v1.html">
                                <figure class="product-preview-image small">
                                    <img src="images/items/pixel_s.jpg" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- /FL ITEM INFO -->

                        <!-- FL ITEM INFO -->
                        <?php //follower_id
                        if(in_array($followers['follower_id'], array_column($getVisitorfollowing, 'following_id'))) { // search value in the array
                                //echo "FOUND"; ?>
                                <!-- FL ITEM INFO -->
                        <div class="fl-item-info fl-button">
                            <a href="javascript:Unfollow(<?=$followers['follower_id']?>)" class="button mid-short primary follow-btn sub_follow">Following</a>
                        </div>
                        <!-- /FL ITEM INFO -->
                        <?php    } else{ ?>
                        <div class="fl-item-info fl-button">
                            <a href="javascript:follow(<?=$followers['follower_id']?>)" class="button mid-short dark sub_follow"><span class="primary">Follow</span></a>
                        </div>
                        <?php }

                        ?>
                       
                        
                        <!-- /FL ITEM INFO -->
                    </div>
                    <!-- /FOLLOW LIST ITEM -->
                <?php } ?>
                   
                </div>
                <!-- /FOLLOW LIST -->
            </div>
            <!-- CONTENT -->

<?php } if ($last == "following") { ?>
                <div class="content right">
                <!-- HEADLINE -->
                <div class="headline simple primary">
                    <h4>Following (5)</h4>
                </div>
                <!-- /HEADLINE -->

                <!-- FOLLOW LIST -->
                <div class="follow-list">
                   <?php foreach ($following_list as $key => $followers) {
                    ?>
                    <!-- FOLLOW LIST ITEM -->
                    <div class="follow-list-item">
                        <a href="author-profile.html">
                            <figure class="user-avatar medium liquid">
                                <?php if(isset($followers['profile_picture']) && !empty($followers['profile_picture'])){ ?>
                                
                                        <img src="<?= $resources_path . "users/profile_picture/" . $followers['profile_picture'] ?>" alt="profile-default-image">
                                    <?php } else{ ?>
                                        <img src="<?= $resources_path . "users/profile_picture/not-available.jpg" ?>" alt="profile-default-image">
                                    <?php } ?>
                            </figure>

                        </a>

                        <!-- FL ITEM INFO -->
                        <div class="fl-item-info fl-description">
                            <p class="text-header"><a href="author-profile.html"><?=$followers['first_name'].' '.$followers['last_name']?></a></p>
                            <p>Member since <?php echo date("F dS, Y", strtotime(substr($followers['created_at'],0,10)))?></p>
                            <p><?=$followers['name']?></p>
                        </div>
                        <!-- /FL ITEM INFO -->

                        <!-- FL ITEM INFO -->
                        <div class="fl-item-info fl-reputation">
                            <p class="text-header">Reputation</p>
                            <!-- RATING -->
                            <ul class="rating">
                                <li class="rating-item">
                                    <!-- SVG STAR -->
                                    <svg class="svg-star">
                                        <use xlink:href="#svg-star"></use>
                                    </svg>
                                    <!-- /SVG STAR -->
                                </li>
                                <li class="rating-item">
                                    <!-- SVG STAR -->
                                    <svg class="svg-star">
                                        <use xlink:href="#svg-star"></use>
                                    </svg>
                                    <!-- /SVG STAR -->
                                </li>
                                <li class="rating-item">
                                    <!-- SVG STAR -->
                                    <svg class="svg-star">
                                        <use xlink:href="#svg-star"></use>
                                    </svg>
                                    <!-- /SVG STAR -->
                                </li>
                                <li class="rating-item">
                                    <!-- SVG STAR -->
                                    <svg class="svg-star">
                                        <use xlink:href="#svg-star"></use>
                                    </svg>
                                    <!-- /SVG STAR -->
                                </li>
                                <li class="rating-item empty">
                                    <!-- SVG STAR -->
                                    <svg class="svg-star">
                                        <use xlink:href="#svg-star"></use>
                                    </svg>
                                    <!-- /SVG STAR -->
                                </li>
                            </ul>
                            <!-- /RATING -->
                        </div>
                        <!-- /FL ITEM INFO -->

                        <!-- FL ITEM INFO -->
                        <div class="fl-item-info fl-product-items">
                            <a href="item-v1.html">
                                <figure class="product-preview-image small">
                                    <img src="images/items/westeros_s.jpg" alt="">
                                </figure>
                            </a>

                            <a href="item-v1.html">
                                <figure class="product-preview-image small">
                                    <img src="images/items/flat_s.jpg" alt="">
                                </figure>
                            </a>

                            <a href="item-v1.html">
                                <figure class="product-preview-image small">
                                    <img src="images/items/pixel_s.jpg" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- /FL ITEM INFO -->

                        <!-- FL ITEM INFO -->
                        <?php //follower_id
                        if(in_array($followers['following_id'], array_column($getVisitorfollowing, 'following_id'))) { // search value in the array
                                //echo "FOUND"; ?>
                                <!-- FL ITEM INFO -->
                        <div class="fl-item-info fl-button">
                            <a href="javascript:Unfollow(<?=$followers['following_id']?>)" class="button mid-short primary follow-btn sub_follow">Following</a>
                        </div>
                        <!-- /FL ITEM INFO -->
                        <?php    } else{ ?>
                        <div class="fl-item-info fl-button">
                            <a href="javascript:follow(<?=$followers['following_id']?>)" class="button mid-short dark sub_follow"><span class="primary">Follow</span></a>
                        </div>
                        <?php }

                        ?>
                       
                        
                        <!-- /FL ITEM INFO -->
                    </div>
                    <!-- /FOLLOW LIST ITEM -->
                <?php } ?>
                    
                </div>
                <!-- /FOLLOW LIST -->
            </div>
            <!-- CONTENT -->


<?php } ?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- /SECTION -->
    </div>

    