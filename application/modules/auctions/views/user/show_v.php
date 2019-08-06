<?php



$user_id = $this->session->userdata("user_login");
$user_id = $user_id['id'];
//echo $user_id;
if (!empty($user_id)) {
    $user_id = $user_id;
} else {
    $user_id = '';

}
$expire_countdown = explode( ' ', $post['expires_at']);
$expire_countdown = str_replace('-', ',', $expire_countdown);
// echo "<pre>";
// print_r($auctionReview);
// exit;
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

?>
<style type="text/css">
    
</style>
<input type="hidden" value="<?=$expire_countdown[0] ?>" name="expire_countdown" id="txt_name">
    <!-- SECTION HEADLINE -->
    <div class="section-headline-wrap v2 section-headline-main">
        <div class="container">
            <div class="section-headline row">
                <div class="col-sm-6">
                    <h2><?=ucfirst($post['name'])?> (<?=ucfirst($post['condition']);?>)</h2>
                </div>
                <div class="col-sm-6 s">
                    <p>Home
                        <span class="separator">/</span><?=$breadCrumbs[0]['title']?>
                        <span class="separator">/</span>
                        <span class="current-section"><?=$breadCrumbs[1]['title']?></span>
                        <span class="separator">/</span>
                        <span class="current-section"><?=$breadCrumbs[2]['title']?></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- /SECTION HEADLINE -->

    <!-- SECTION -->
    <div class="section-wrap article-section-cs">
        <div class="section container">
            <!-- SIDEBAR -->
            <div class="row" style="display: contents;">
                <div class="sidebar right col-xs-12 col-lg-3 sidebar-cs visible-lg">
                    <!-- SIDEBAR ITEM -->
                    <div class="sidebar-item void buttons">
                        <a href="#" class="button big dark purchase bid">
                          <?php if ($post['type'] == 'sell') {
                         ?>
                        
                            
                                <?php if(isset($post['currency']) && !empty($post['currency'])): echo $post['currency']; endif;?> 
                                <?php if(isset($post['current_price']) && !empty($post['current_price'])): echo $post['current_price']; endif;?>
                        
                        <?php }  else { ?>
                            <span class="" style="font-size: 20px;">Quotation Requested</span>
                        
                        <?php } ?>  
                        </a>
                        <form id="bid-form" class="bid-form" action="<?= base_url("bids/store")?>" method="POST">
                            
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="hidden" id="id" name="id" value="<?= $auctionId ?>">
                            <?php if ($hasOwnAuction == 0) { ?>
                            <input type="number" placeholder="<?=ucfirst($post['currency']);?>" min="1" step="1" id="amount"  name="amount" value="<?php if(isset($bidAmount) && !empty($bidAmount)): echo $bidAmount; endif;?>" <?php if(isset($readonly) && !empty($readonly)): echo $readonly; endif;?> >
                            <?php  } else { ?>
                                <input type="number" placeholder="<?=ucfirst($post['currency']);?>" min="1" step="1" id="amount"  name="amount" value="<?php if(isset($bidAmount) && !empty($bidAmount)): echo $bidAmount; endif;?>" disabled>
                             <?php } ?>   

                            <input type="hidden" class="form-control" id="expires-at" name="expires_at" value="1" >
                            <input type="hidden" id="description" name="description" value="description">
                            <input type="hidden" value="1" class="validate required" id="confirm_agree" name="confirm agree">
                            <?php if ($hasOwnAuction == 0) { ?>
                                <button id="button_bid" class="button mid tertiary bid" type="submit" <?php if(isset($disabled) && !empty($disabled)): echo $disabled; endif;?> >Bid</button>
                            <?php  } else { ?>
                                <button id="" class="button mid tertiary bid" type="button" <?php if(isset($disabled) && !empty($disabled)): echo $disabled; endif; ?> >Bid</button>
                            <?php } ?>

                        </form>
                        <div class="clearfix"></div>
                        <a href="javascript:deactive_tiptip(<?=$post['id']?>);" class="button big secondary wfav">
                            <span class="icon-heart"></span>
                            <span class="fav-count"><?=$post['favourite_count']?></span> <!-- favourite_count -->
                            Add to Favourites
                        </a>
                    </div>
                    <!-- /SIDEBAR ITEM -->

                    <!-- SIDEBAR ITEM -->
                    <div class="sidebar-item">
                        <h4>Auction Time</h4>
                        <hr class="line-separator">
                        <div class="bid-countdown bid-countdown-desktop">
                            <span class="colon">:</span>
                            <span class="colon">:</span>
                            <span class="colon">:</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /SIDEBAR ITEM -->

                    <!-- SIDEBAR ITEM -->
                    <div class="sidebar-item author-bio">
                        <h4>Product Seller</h4>
                        <hr class="line-separator">
                        <!-- USER AVATAR -->
                        <?php if (isset($auctioneerDetail[0]['profile_picture']) && !empty($auctioneerDetail[0]['profile_picture'])) { ?>
                            <a href="user-profile.html" class="user-avatar-wrap medium">
                                <figure class="user-avatar medium">
                                    <img src="<?= $resources_path . "users/profile_picture/" . $auctioneerDetail[0]['profile_picture'] ?>"
                                 alt="Not available">
                                </figure>
                            </a>
                            
                        <?php } else { ?>
                            <a href="user-profile.html" class="user-avatar-wrap medium">
                                <figure class="user-avatar medium">
                                    <img src="<?=base_url('images/avatars/avatar_17.jpg')?>">
                                </figure>
                            </a>

                        <?php } ?>
                        <!-- /USER AVATAR -->
                        <p class="text-header"><?php if (isset($auctioneerDetail[0]['first_name']) && isset($auctioneerDetail[0]['last_name'])) { 
                            echo $auctioneerDetail[0]['first_name'] . ' ' . $auctioneerDetail[0]['last_name'];
                            }
                            ?></p>
                        <p class="text-oneline"><?=$auctioneerDetail[0]['city_name']?>,<?=$auctioneerDetail[0]['country_name']?><br></p>
                        <!-- SHARE LINKS -->
                        <ul class="share-links">
                            <li><a href="<?php echo isset($auctioneerDetail[0]['facebook_link']) ? $auctioneerDetail[0]['facebook_link'] : "#"  ?>" class="fb"></a></li>
                            <li><a href="<?php echo isset($auctioneerDetail[0]['twitter_link']) ? $auctioneerDetail[0]['twitter_link'] : "#"  ?>" class="twt"></a></li>
                            <li><a href="<?php echo isset($auctioneerDetail[0]['google_link']) ? $auctioneerDetail[0]['google_link'] : "#"  ?>" class="db"></a></li>
                        </ul>
                        <!-- /SHARE LINKS -->
                        <a href="<?= base_url(). '' .$auctioneerDetail[0]['slug']. '/user' ?>" class="button mid dark spaced">Go to Profile Page</a>

                        <?php if ($hasOwnAuction == 0) { ?>
                        <a href="#message-popup" id="message-pop" data-mfp-src="#message-popup" class="button mid dark-light">Send a Private Message</a>
                        <?php } else { ?>
                            <a href="#" class="button mid dark-light">Send a Private Message</a>
                        <?php } ?>
                    </div>
                    <!-- /SIDEBAR ITEM -->

                    <!-- SIDEBAR ITEM -->
                    <div class="sidebar-item product-info">
                        <h4>Product Information</h4>
                        <hr class="line-separator">
                        <!-- INFORMATION LAYOUT -->
                        <div class="information-layout">
                            <!-- INFORMATION LAYOUT ITEM -->
                            <div class="information-layout-item">
                                <p class="text-header">Upload Date:</p>
                                <p><?php $date = explode(" ", $post['created_at']);
                                        $newDate = date("F dS, Y", strtotime($date[0]));
                                        echo $newDate;
                                ?></p>
                            </div>
                            <!-- /INFORMATION LAYOUT ITEM -->

                            <!-- INFORMATION LAYOUT ITEM -->
                            <div class="information-layout-item">
                                <p class="text-header">Item Condition:</p>
                                <p><?=ucfirst($post['condition']);?></p>
                            </div>
                            <!-- /INFORMATION LAYOUT ITEM -->

                            <!-- INFORMATION LAYOUT ITEM -->
                            <div class="information-layout-item">
                                <p class="text-header">Author's Country:</p>
                                <p><?php echo isset($auctioneerDetail[0]['country_name']) ? $auctioneerDetail[0]['country_name'] : "-"  ?></p>
                            </div>
                            <!-- /INFORMATION LAYOUT ITEM -->

                            <!-- INFORMATION LAYOUT ITEM -->
                            <div class="information-layout-item">
                                <p class="text-header">Quantity:</p>
                                <p><?=($post['qty'].' '.$post['qty_unit']);?></p>
                            </div>
                            <!-- /INFORMATION LAYOUT ITEM -->

                            <!-- INFORMATION LAYOUT ITEM -->
                            <div class="information-layout-item">
                                <p class="text-header">Returns:</p>
                                <p><?=ucwords($post['warranty_case']);?></p>
                            </div>
                            <!-- /INFORMATION LAYOUT ITEM -->
                        </div>
                        <!-- INFORMATION LAYOUT -->
                    </div>
                    <!-- /SIDEBAR ITEM -->

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

                    <!-- SIDEBAR ITEM -->
                    <?php if (isset($another_user_post) && !empty($another_user_post)) { ?>
                    <div class="sidebar-item author-items tab-content-cs">
                        <h4>More User's Items</h4>
                        <!-- PRODUCT LIST -->
                        <div class="product-list grid">
                            <!-- PRODUCT ITEM -->
                            <div class="inner-wrapper">
                                <div class="product-item column col-12">
                                    <!-- PRODUCT PREVIEW ACTIONS -->
                                    <div class="product-preview-actions">
                                        
                                        <figure class="product-preview-image">
                                            <div class="white_space" style='height: 115px; background-color: white'>
                                                <img style='height: 100%; width: 100%; object-fit: contain'
                                                     src="<?= $resources_path . "images/auctions/" . $another_user_post['image_sm_1'] ?>"
                                                     alt="product-image">
                                            </div>
                                        </figure>
                                        <!-- PREVIEW ACTIONS -->
                                        <div class="preview-actions">
                                            <!-- PREVIEW ACTION -->
                                            <div class="preview-action">
                                                <a href="<?=base_url().''.$another_user_post['slug']?>/auction">
                                                    <div class="circle tiny primary">
                                                        <span class="icon-tag"></span>
                                                    </div>
                                                </a>
                                                <a href="<?=base_url().''.$another_user_post['slug']?>/auction">
                                                    <p>Go to Item</p>
                                                </a>
                                            </div>
                                            <!-- /PREVIEW ACTION -->

                                            <!-- PREVIEW ACTION -->
                                            <div class="preview-action">
                                                <a href="javascript:deactive_tiptip(<?=$another_user_post['id']?>);">
                                                    <div class="circle tiny secondary">
                                                        <span class="icon-heart"></span>
                                                    </div>
                                                </a>
                                                <a href="javascript:deactive_tiptip(<?=$another_user_post['id']?>);">
                                                    <p>Favourites +</p>
                                                </a>
                                            </div>
                                            <!-- /PREVIEW ACTION -->
                                        </div>
                                        <!-- /PREVIEW ACTIONS -->
                                    </div>
                                    <!-- /PRODUCT PREVIEW ACTIONS -->

                                    <!-- PRODUCT INFO -->
                                    <div class="info-wrapper-cs">
                                        <div class="product-info">
                                            <a href="<?=base_url().''.$another_user_post['slug']?>/auction">
                                                <p class="text-header"><?php echo isset($another_user_post['name']) ? $another_user_post['name'] : "-"  ?></p>
                                            </a>
                                            <p class="product-description"><?php echo isset($another_user_post['description']) ? $another_user_post['description'] : "-"  ?></p>
                                            <a href="<?=base_url().''.$another_user_post['cat_slug']?>/category3">
                                                <p class="category tertiary"><?php echo isset($another_user_post['cat_name']) ? $another_user_post['cat_name'] : "-"  ?></p>
                                            </a>
                                            <p class="price"><span><?php echo isset($another_user_post['currency']) ? $another_user_post['currency'] : "-"  ?></span><?php echo isset($another_user_post['amount']) ? $another_user_post['amount'] : "-"  ?></p>
                                        </div>
                                    
                                    <!-- /PRODUCT INFO -->
                                        <hr class="line-separator">

                                        <!-- USER RATING -->
                                        <div class="user-rating">
                                            <?php if (isset($auctioneerDetail[0]['profile_picture']) && !empty($auctioneerDetail[0]['profile_picture'])) { ?>
                                                    <a href="#">
                                                        <figure class="user-avatar small">
                                                            <img src="<?= $resources_path . "users/profile_picture/" . $auctioneerDetail[0]['profile_picture'] ?>"
                                                         alt="Not available">
                                                        </figure>
                                                    </a>
                                                    
                                                <?php } else { ?>
                                                    <a href="#">
                                                        <figure class="user-avatar small">
                                                            <img src="<?=base_url('images/avatars/avatar_17.jpg')?>">
                                                        </figure>
                                                    </a>

                                                <?php } ?>

                                            <a href="<?= base_url(). '' .$auctioneerDetail[0]['slug']. '/user' ?>">
                                                <p class="text-header tiny"><?php if (isset($auctioneerDetail[0]['first_name']) && isset($auctioneerDetail[0]['last_name'])) { 
                            echo $auctioneerDetail[0]['first_name'] . ' ' . $auctioneerDetail[0]['last_name'];
                            }
                            ?></p>
                                            </a>
                                            <ul class="rating tooltip" title="Author's Reputation">
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
                                                <li class="rating-item empty">
                                                    <!-- SVG STAR -->
                                                    <svg class="svg-star">
                                                        <use xlink:href="#svg-star"></use>
                                                    </svg>
                                                    <!-- /SVG STAR -->
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /USER RATING -->
                                    </div>
                                </div>
                            </div>

                            <!-- /PRODUCT ITEM -->
                        </div>
                        <!-- /PRODUCT LIST -->
                        <div class="clearfix"></div>
                    </div>
                <?php } ?>
                    <!-- /SIDEBAR ITEM -->
                </div>
                <!-- /SIDEBAR -->

                <!-- CONTENT -->
                <div class="content left col-xs-12 col-lg-9 content-article-cs">
                    <!-- POST -->
                    <article class="post">
                        <!-- POST IMAGE -->
                        <div class="post-image">
                            <figure class="product-preview-image large liquid">
                                <img src="<?= $resources_path . "images/auctions/" . $images['image_md_1'] ?>" alt="">
                            </figure>
                            <!-- IMAGE OVERLAY -->
                            <div class="image-overlay img-gallery">
                                <div class="clickable-icon tertiary">
                                    <!-- SVG PLUS -->
                                    <svg class="svg-plus">
                                        <use xlink:href="#svg-plus"></use>
                                    </svg>
                                    <!-- /SVG PLUS -->
                                </div>
                                <!-- GALLERY ITEMS -->
                                <div class="gallery-items">
                                    <?php
                                    for ($i = 1; $i <= 5; $i++):
                                        if (isset($images['image_lg_' . $i . '']) && !empty($images['image_md_' . $i . ''])):
                                            ?>
                                            <span data-mfp-src="<?= $resources_path . "images/auctions/" . $images['image_lg_' . $i . ''] ?>"></span>
                                        <?php
                                        endif;
                                    endfor;
                                    ?>
                                </div>
                                <!-- /GALLERY ITEMS -->
                            </div>
                            <!-- /IMAGE OVERLAY -->
                        </div>
                        <!-- /POST IMAGE -->

                        <!-- POST CONTENT -->
                        <div class="post-content">
                            <!-- POST PARAGRAPH -->
                            <div class="post-paragraph">
                                <h3 class="post-title"><?=$post['name']?></h3>
                                <p><?=$post['description']?></p>
                            </div>
                            <!-- /POST PARAGRAPH -->

                            <a href="#">
                                <figure class="post-banner liquid">
                                    <img src="images/items/shop_ad.jpg" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- /POST CONTENT -->

                        <hr class="line-separator">

                        <!-- SHARE -->
                        <div class="share-links-wrap">
                            <p class="text-header small">Share this:</p>
                            <!-- SHARE LINKS -->
                            <ul class="share-links hoverable">
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?=$actual_link?>" class="fb" target="_blank"></a></li>
                                <li><a href="#" class="twt"></a></li>
                                <li><a href="#" class="db"></a></li>
                                <li><a href="#" class="rss"></a></li>
                                <li><a href="#" class="gplus"></a></li>
                            </ul>
                            <!-- /SHARE LINKS -->
                        </div>
                        <!-- /SHARE -->
                    </article>
                    <!-- /POST -->
                <div class="sidebar right sidebar-cs hidden-lg">
                    <!-- SIDEBAR ITEM -->
                    <div class="sidebar-item void buttons">
                        <?php if ($post['type'] == 'sell') {
                         ?>
                        <a href="#" class="button big dark purchase bid">
                            
                                <?php if(isset($post['currency']) && !empty($post['currency'])): echo $post['currency']; endif;?> 
                                <?php if(isset($post['current_price']) && !empty($post['current_price'])): echo $post['current_price']; endif;?>
                        </a>
                        <?php }  else { ?>

                        <a href="#" class="button big dark purchase bid">
                            <span class="" style="font-size: 20px;">Quotation Requested</span>
                        </a>
                        <?php } ?> 
                        <form id="bid-form-mobiles" class="bid-form" action="<?= base_url("bids/store")?>" method="POST">
                            
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="hidden" id="id" name="id" value="<?= $auctionId ?>">
                            <?php if ($hasOwnAuction == 0) { ?>
                            <input type="number" placeholder="<?=ucfirst($post['currency']);?>" min="1" step="1" id="amount"  name="amount" value="<?php if(isset($bidAmount) && !empty($bidAmount)): echo $bidAmount; endif;?>" <?php if(isset($readonly) && !empty($readonly)): echo $readonly; endif;?> >
                            <?php  } else { ?>
                                <input type="number" placeholder="<?=ucfirst($post['currency']);?>" min="1" step="1" id="amount"  name="amount" value="<?php if(isset($bidAmount) && !empty($bidAmount)): echo $bidAmount; endif;?>" disabled>
                             <?php } ?>   

                            <input type="hidden" class="form-control" id="expires-at" name="expires_at" value="1" >
                            <input type="hidden" id="description" name="description" value="description">
                            <input type="hidden" value="1" class="validate required" id="confirm_agree" name="confirm agree">
                            <?php if ($hasOwnAuction == 0) { ?>
                                <button id="button_bid" class="button mid tertiary bid" type="submit" <?php if(isset($disabled) && !empty($disabled)): echo $disabled; endif;?> >Bid</button>
                            <?php  } else { ?>
                                <button id="" class="button mid tertiary bid" type="button" <?php if(isset($disabled) && !empty($disabled)): echo $disabled; endif; ?> >Bid</button>
                            <?php } ?>

                        </form>
                        <div class="clearfix"></div>
                        <a href="javascript:deactive_tiptip(<?=$post['id']?>);" class="button big secondary wfav">
                            <span class="icon-heart"></span>
                            <span class="fav-count"><?=$post['favourite_count']?></span> <!-- favourite_count -->
                            Add to Favourites
                        </a>
                    </div>
                    <!-- /SIDEBAR ITEM -->

                    <!-- SIDEBAR ITEM -->
                    <div class="sidebar-item">
                        <h4>Auction Time</h4>
                        <hr class="line-separator">
                        <div class="bid-countdown bid-countdownmob">
                            <span class="colon">:</span>
                            <span class="colon">:</span>
                            <span class="colon">:</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /SIDEBAR ITEM -->

                    <!-- SIDEBAR ITEM -->
                    <div class="sidebar-item author-bio">
                        <h4>Product Seller</h4>
                        <hr class="line-separator">
                        <!-- USER AVATAR -->
                        <?php if (isset($auctioneerDetail[0]['profile_picture']) && !empty($auctioneerDetail[0]['profile_picture'])) { ?>
                            <a href="user-profile.html" class="user-avatar-wrap medium">
                                <figure class="user-avatar medium">
                                    <img src="<?= $resources_path . "users/profile_picture/" . $auctioneerDetail[0]['profile_picture'] ?>"
                                 alt="Not available">
                                </figure>
                            </a>
                            
                        <?php } else { ?>
                            <a href="user-profile.html" class="user-avatar-wrap medium">
                                <figure class="user-avatar medium">
                                    <img src="<?=base_url('images/avatars/avatar_17.jpg')?>">
                                </figure>
                            </a>

                        <?php } ?>
                        <!-- /USER AVATAR -->
                        <p class="text-header"><?php if (isset($auctioneerDetail[0]['first_name']) && isset($auctioneerDetail[0]['last_name'])) { 
                            echo $auctioneerDetail[0]['first_name'] . ' ' . $auctioneerDetail[0]['last_name'];
                            }
                            ?></p>
                       
                        <!-- SHARE LINKS -->
                        <ul class="share-links">
                            <li><a href="<?php echo isset($auctioneerDetail[0]['facebook_link']) ? $auctioneerDetail[0]['facebook_link'] : "#"  ?>" class="fb"></a></li>
                            <li><a href="<?php echo isset($auctioneerDetail[0]['twitter_link']) ? $auctioneerDetail[0]['twitter_link'] : "#"  ?>" class="twt"></a></li>
                            <li><a href="<?php echo isset($auctioneerDetail[0]['google_link']) ? $auctioneerDetail[0]['google_link'] : "#"  ?>" class="db"></a></li>
                        </ul>
                        <!-- /SHARE LINKS -->
                        <a href="<?= base_url(). '' .$auctioneerDetail[0]['slug']. '/user' ?>" class="button mid dark spaced">Go to Profile Page</a>
                        <?php if ($hasOwnAuction == 0) { ?>
                        <a href="#message-popup" id="message-pop" data-mfp-src="#message-popup" class="button mid dark-light">Send a Private Message</a>
                        <?php } else { ?>
                            <a href="#" class="button mid dark-light">Send a Private Message</a>
                        <?php } ?>
                    </div>
                    <!-- /SIDEBAR ITEM -->

                    <!-- SIDEBAR ITEM -->
                    <div class="sidebar-item product-info">
                        <h4>Product Information</h4>
                        <hr class="line-separator">
                        <!-- INFORMATION LAYOUT -->
                        <div class="information-layout">
                            <!-- INFORMATION LAYOUT ITEM -->
                            <div class="information-layout-item">
                                <p class="text-header">Upload Date:</p>
                                <p><?php $date = explode(" ", $post['created_at']);
                                        $newDate = date("F dS, Y", strtotime($date[0]));
                                        echo $newDate;
                                ?></p>
                            </div>
                            <!-- /INFORMATION LAYOUT ITEM -->

                            <!-- INFORMATION LAYOUT ITEM -->
                            <div class="information-layout-item">
                                <p class="text-header">Item Condition:</p>
                                <p><?=ucfirst($post['condition']);?></p>
                            </div>
                            <!-- /INFORMATION LAYOUT ITEM -->

                            <!-- INFORMATION LAYOUT ITEM -->
                            <div class="information-layout-item">
                                <p class="text-header">Author's Country:</p>
                                 <p><?php echo isset($auctioneerDetail[0]['country_name']) ? $auctioneerDetail[0]['country_name'] : "-"  ?></p>
                            </div>
                            <!-- /INFORMATION LAYOUT ITEM -->

                            <!-- INFORMATION LAYOUT ITEM -->
                            <div class="information-layout-item">
                                <p class="text-header">Quantity:</p>
                                <p><?=($post['qty'].' '.$post['qty_unit']);?></p>
                            </div>
                            <!-- /INFORMATION LAYOUT ITEM -->

                            <!-- INFORMATION LAYOUT ITEM -->
                            <div class="information-layout-item">
                                <p class="text-header">Returns:</p>
                                <p><?=ucwords($post['warranty_case']);?></p>
                            </div>
                            <!-- /INFORMATION LAYOUT ITEM -->
                        </div>
                        <!-- INFORMATION LAYOUT -->
                    </div>
                    <!-- /SIDEBAR ITEM -->

                    <!-- SIDEBAR ITEM -->
                <div class="sidebar-item author-reputation full">
                    <h4>Author's Reputation</h4>
                    <hr class="line-separator">
                    <!-- PIE CHART -->
                    <div class="pie-chart pie-chart1-mobile">
                        <p class="text-header percent">24<span>%</span></p>
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

                    <!-- SIDEBAR ITEM -->
                    <?php if (isset($another_user_post) && !empty($another_user_post)) { ?>
                    <div class="sidebar-item author-items tab-content-cs">
                        <h4>More User's Items</h4>
                        <!-- PRODUCT LIST -->
                        <div class="product-list grid">
                            <!-- PRODUCT ITEM -->
                            <div class="inner-wrapper">
                                <div class="product-item column col-12">
                                    <!-- PRODUCT PREVIEW ACTIONS -->
                                    <div class="product-preview-actions">
                                        <!-- PRODUCT PREVIEW IMAGE -->
                                        
                                        <figure class="product-preview-image">
                                            <div class="white_space" style='height: 115px; background-color: white'>
                                                <img style='height: 287px; width: 100%; object-fit: contain'
                                                     src="<?= $resources_path . "images/auctions/" . $another_user_post['image_sm_1'] ?>"
                                                     alt="product-image">
                                            </div>
                                        </figure>
                                        <!-- /PRODUCT PREVIEW IMAGE -->

                                        <!-- PREVIEW ACTIONS -->
                                        <div class="preview-actions">
                                            <!-- PREVIEW ACTION -->
                                            <div class="preview-action">
                                                <a href="<?=base_url().''.$another_user_post['slug']?>/auction">
                                                    <div class="circle tiny primary">
                                                        <span class="icon-tag"></span>
                                                    </div>
                                                </a>
                                                <a href="<?=base_url().''.$another_user_post['slug']?>/auction">
                                                    <p>Go to Item</p>
                                                </a>
                                            </div>
                                            <!-- /PREVIEW ACTION -->

                                            <!-- PREVIEW ACTION -->
                                            <div class="preview-action">
                                                <a href="javascript:deactive_tiptip(<?=$another_user_post['id']?>);">
                                                    <div class="circle tiny secondary">
                                                        <span class="icon-heart"></span>
                                                    </div>
                                                </a>
                                                <a href="javascript:deactive_tiptip(<?=$another_user_post['id']?>);">
                                                    <p>Favourites +</p>
                                                </a>
                                            </div>
                                            <!-- /PREVIEW ACTION -->
                                        </div>
                                        <!-- /PREVIEW ACTIONS -->
                                    </div>
                                    <!-- /PRODUCT PREVIEW ACTIONS -->

                                    <!-- PRODUCT INFO -->
                                    <div class="info-wrapper-cs">
                                        <div class="product-info">
                                            <a href="<?=base_url().''.$another_user_post['slug']?>/auction">
                                                <p class="text-header"><?php echo isset($another_user_post['name']) ? $another_user_post['name'] : "-"  ?></p>
                                            </a>
                                            <p class="product-description"><?php echo isset($another_user_post['description']) ? $another_user_post['description'] : "-"  ?></p>
                                            <a href="<?=base_url().''.$another_user_post['cat_slug']?>/category3">
                                                <p class="category tertiary"><?php echo isset($another_user_post['cat_name']) ? $another_user_post['cat_name'] : "-"  ?></p>
                                            </a>
                                            <p class="price"><span><?php echo isset($another_user_post['currency']) ? $another_user_post['currency'] : "-"  ?></span><?php echo isset($another_user_post['amount']) ? $another_user_post['amount'] : "-"  ?></p>
                                        </div>
                                    
                                    <!-- /PRODUCT INFO -->
                                        <hr class="line-separator">

                                        <!-- USER RATING -->
                                        <div class="user-rating">
                                            <?php if (isset($auctioneerDetail[0]['profile_picture']) && !empty($auctioneerDetail[0]['profile_picture'])) { ?>
                                                    <a href="#">
                                                        <figure class="user-avatar small">
                                                            <img src="<?= $resources_path . "users/profile_picture/" . $auctioneerDetail[0]['profile_picture'] ?>"
                                                         alt="Not available">
                                                        </figure>
                                                    </a>
                                                    
                                                <?php } else { ?>
                                                    <a href="#">
                                                        <figure class="user-avatar small">
                                                            <img src="<?=base_url('images/avatars/avatar_17.jpg')?>">
                                                        </figure>
                                                    </a>

                                                <?php } ?>

                                            <a href="<?= base_url(). '' .$auctioneerDetail[0]['slug']. '/user' ?>">
                                                <p class="text-header tiny"><?php if (isset($auctioneerDetail[0]['first_name']) && isset($auctioneerDetail[0]['last_name'])) { 
                            echo $auctioneerDetail[0]['first_name'] . ' ' . $auctioneerDetail[0]['last_name'];
                            }
                            ?></p>
                                            </a>
                                            <ul class="rating tooltip" title="Author's Reputation">
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
                                                <li class="rating-item empty">
                                                    <!-- SVG STAR -->
                                                    <svg class="svg-star">
                                                        <use xlink:href="#svg-star"></use>
                                                    </svg>
                                                    <!-- /SVG STAR -->
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /USER RATING -->
                                    </div>
                                </div>
                            </div>
                            <!-- /PRODUCT ITEM -->
                        </div>
                        <!-- /PRODUCT LIST -->
                        <div class="clearfix"></div>
                    </div>
                <?php } ?>
                    <!-- /SIDEBAR ITEM -->
                </div>
                <!-- /SIDEBAR -->
                    <!-- POST TAB -->
                    <div class="post-tab">
                        <!-- TAB HEADER -->
                        <div class="tab-header tertiary">
                            <!-- TAB ITEM -->
                            <div class="tab-item selected">
                                <p class="text-header">Comments (<?=count($auctionReview);?>)</p>
                            </div>
                            <!-- /TAB ITEM -->

                            <!-- TAB ITEM -->
                            <div class="tab-item" style="display: none;">
                                <p class="text-header">Buyers Corner</p>
                            </div>
                            <!-- /TAB ITEM -->

                            <!-- TAB ITEM -->
                            <div class="tab-item" style="display: none;">
                                <p class="text-header">Item FAQs</p>
                            </div>
                            <!-- /TAB ITEM -->
                        </div>
                        <!-- /TAB HEADER -->

                        <!-- TAB CONTENT -->
                        <div class="tab-content void">
                            <!-- COMMENTS -->
                            <div class="comment-list">
                                <!-- COMMENT -->
                                <div class="comment-wrap" style="display: none;">
                                    <!-- USER AVATAR -->
                                    <a href="user-profile.html">
                                        <figure class="user-avatar medium">
                                            <img src="images/avatars/avatar_06.jpg" alt="">
                                        </figure>
                                    </a>
                                    <!-- /USER AVATAR -->
                                    <div class="comment">
                                        <p class="text-header">View as Customer</p>
                                        <!-- PIN -->
                                        <span class="pin greyed">Purchased</span>
                                        <!-- /PIN -->
                                        <p class="timestamp">5 Hours Ago</p>
                                        <a href="#" class="report">Report</a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magnada. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    </div>
                                </div>
                                <!-- /COMMENT -->

                                <!-- LINE SEPARATOR -->
<!--                                 <hr class="line-separator"> -->
                                <!-- /LINE SEPARATOR -->

                                <!-- COMMENT -->
                                <div class="comment-wrap" style="display: none;">
                                    <!-- USER AVATAR -->
                                    <a href="user-profile.html">
                                        <figure class="user-avatar medium">
                                            <img src="images/avatars/avatar_11.jpg" alt="">
                                        </figure>
                                    </a>
                                    <!-- /USER AVATAR -->
                                    <div class="comment">
                                        <p class="text-header">View as Author (Reply Option)</p>
                                        <p class="timestamp">8 Hours Ago</p>
                                        <a href="#" class="report">Report</a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magnada. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                    </div>
                                </div>
                                <!-- /COMMENT -->

                                <!-- COMMENT REPLY -->
                                <div class="comment-wrap comment-reply" style="display: none;">
                                    <!-- USER AVATAR -->
                                    <a href="user-profile.html">
                                        <figure class="user-avatar medium">
                                            <img src="images/avatars/avatar_09.jpg" alt="">
                                        </figure>
                                    </a>
                                    <!-- /USER AVATAR -->

                                    <!-- COMMENT REPLY FORM -->
                                    <form class="comment-reply-form">
                                        <textarea name="treply1" placeholder="Write your comment here..."></textarea>
                                        <!-- CHECKBOX -->
                                        <input type="checkbox" id="notif1" name="notif1" checked>
                                        <label for="notif1" class="checkbox" class="checkbox-csa-csa">
                                            <span class="checkbox tertiary"><span></span></span>
                                            <label>Receive email notifications</label>
                                        </label>
                                        <!-- /CHECKBOX -->
                                        <button class="button tertiary">Post Comment</button>
                                    </form>
                                    <!-- /COMMENT REPLY FORM -->
                                </div>
                                <!-- /COMMENT REPLY -->

                                <!-- LINE SEPARATOR -->
                    <!--             <hr class="line-separator"> -->
                                <!-- /LINE SEPARATOR -->

                                <!-- COMMENT -->
                                <?php
                                if (isset($auctionReview) && !empty($auctionReview)) {
                               
                                foreach ($auctionReview as $key => $value) {
                                
                                 ?>
                                <div class="comment-wrap">
                                    <!-- USER AVATAR -->
                                    <a href="user-profile.html">
                                        <figure class="user-avatar medium">
                                            <img src="<?=base_url('images/avatars/avatar_17.jpg')?>" alt="">
                                        </figure>
                                    </a>
                                    <!-- /USER AVATAR -->
                                    <div class="comment">
                                        <p class="text-header"><?=$value['first_name'].' '.$value['last_name']?></p>
                                        <p class="timestamp"><?php
                                        echo time_elapsed_string($value['created_at']);
                                        ?></p>
                                        <a href="#" class="report">Report</a>
                                        <p><?=$value['description']?></p>
                                    </div>

                                    <!-- COMMENT -->
                                    <?php 
                                    if (isset($value['comments']) && !empty($value['comments'])) {
                                        
                                    foreach ($value['comments'] as $key => $comment_reply) {
                                     
                                     ?>
                                    <div class="comment-wrap">
                                        <!-- USER AVATAR -->
                                        <a href="user-profile.html">
                                            <figure class="user-avatar medium">
                                                <img src="images/avatars/avatar_09.jpg" alt="">
                                            </figure>
                                        </a>
                                        <!-- /USER AVATAR -->
                                        <div class="comment">
                                            <p class="text-header"><?=$comment_reply['first_name'].' '.$comment_reply['last_name']?></p>
                                            <!-- PIN -->
                                            <span class="pin">Author</span>
                                            <!-- /PIN -->
                                            <p class="timestamp"><?php echo time_elapsed_string($comment_reply['created_at']); ?></p>
                                            <a href="#" class="report">Report</a>
                                            <p><?=$comment_reply['comment']?></p>
                                        </div>
                                    </div>
                                    <!-- /COMMENT -->
                                    <?php }  }?>


                                    <!-- COMMENT REPLY -->
                                    <div class="comment-wrap comment-reply">
                                        <!-- USER AVATAR -->
                                        <a href="user-profile.html">
                                            <figure class="user-avatar medium">
                                                <img src="images/avatars/avatar_09.jpg" alt="">
                                            </figure>
                                        </a>
                                        <!-- /USER AVATAR -->

                                        <!-- COMMENT REPLY FORM -->
                                        <form class="comment-reply-form" id="comment_reply_form">
                                            <input type="hidden" name="review_id" id="review_id" value="<?= $value['id'] ?>">
                                            <textarea name="treply2" id="treply2" placeholder="Write your comment here..." required></textarea>
                                            <button class="button tertiary" id="comment_reply">Reply Comment</button>
                                        </form>
                                        <!-- /COMMENT REPLY FORM -->
                                    </div>
                                    <!-- /COMMENT REPLY -->
                                </div>
                                <!-- LINE SEPARATOR -->
                                <!-- <hr class="line-separator"> -->
                                <!-- /LINE SEPARATOR -->

                                <!-- PAGER -->
                                <!-- <div class="pager tertiary">
                                    <div class="pager-item"><p>1</p></div>
                                    <div class="pager-item active"><p>2</p></div>
                                    <div class="pager-item"><p>3</p></div>
                                    <div class="pager-item"><p>...</p></div>
                                    <div class="pager-item"><p>17</p></div>
                                </div> -->
                                <!-- /PAGER -->
                            <?php }   }?>
                                <!-- /COMMENT -->

                                <!-- LINE SEPARATOR -->
                                <!-- <hr class="line-separator"> -->
                                <!-- /LINE SEPARATOR -->

                                <!-- COMMENT -->
                                <div class="comment-wrap" style="display: none;">
                                    <!-- USER AVATAR -->
                                    <a href="user-profile.html">
                                        <figure class="user-avatar medium">
                                            <img src="images/avatars/avatar_03.jpg" alt="">
                                        </figure>
                                    </a>
                                    <!-- /USER AVATAR -->
                                    <div class="comment">
                                        <p class="text-header">View as Customer</p>
                                        <p class="timestamp">6 Days Ago</p>
                                        <a href="#" class="report">Report</a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magnada. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                                    </div>
                                </div>
                                <!-- /COMMENT -->

                                

                                <div class="clearfix"></div>

                                <!-- LINE SEPARATOR -->
                                <hr class="line-separator">
                                <!-- /LINE SEPARATOR -->

                                <h3>Leave a Comment</h3>

                                <!-- COMMENT REPLY -->
                                <div class="comment-wrap comment-reply">
                                    <!-- USER AVATAR -->
                                    <a href="user-profile.html">
                                        <figure class="user-avatar medium">
                                            <img src="images/avatars/avatar_09.jpg" alt="">
                                        </figure>
                                    </a>
                                    <!-- /USER AVATAR -->

                                    <!-- COMMENT REPLY FORM -->
                                    <form class="comment-reply-form" id="review_form">
                                        <textarea name="text" placeholder="Write your comment here..." id="input-review" required></textarea>
                                        <input type="hidden" name="auction_id" id="auction_id" value="<?= $post['id'] ?>">
                                        <input type="hidden" name="user_id" id="user_id" value="<?= $user_id ?>">
                                        <label class="rl-label">Rating :</label>
                                        

                                        
                                        <div class="container">
                                            <div class="row">
                                                <h2></h2>
                                            </div>
                                            <div class="row lead">
                                                <div id="stars" class="starrr"></div>
                                                
                                                <input type="hidden" id="count" name="rating" value="0">
                                            </div>
                                            
                                        </div>
                                        <button class="button tertiary" id="button-review">Post Comment</button>
                                    </form>
                                    <!-- /COMMENT REPLY FORM -->
                                </div>
                                <!-- /COMMENT REPLY -->
                            </div>
                            <!-- /COMMENTS -->
                        </div>
                        <!-- /TAB CONTENT -->

                        <!-- TAB CONTENT -->
                        <div class="tab-content void" style="display: none;">
                            <!-- COMMENTS -->
                            <div class="comment-list">
                                <!-- COMMENT -->
                                <div class="comment-wrap">
                                    <!-- USER AVATAR -->
                                    <a href="user-profile.html">
                                        <figure class="user-avatar medium">
                                            <img src="images/avatars/avatar_02.jpg" alt="">
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

                                <!-- COMMENT REPLY -->
                                <div class="comment-wrap comment-reply">
                                    <!-- USER AVATAR -->
                                    <a href="user-profile.html">
                                        <figure class="user-avatar medium">
                                            <img src="images/avatars/avatar_09.jpg" alt="">
                                        </figure>
                                    </a>
                                    <!-- /USER AVATAR -->

                                    <!-- COMMENT REPLY FORM -->
                                    <form class="comment-reply-form">
                                        <textarea name="treply10" placeholder="Write your comment here..."></textarea>
                                        <!-- CHECKBOX -->
                                        <input type="checkbox" id="notif10" name="notif10" checked>
                                        <label for="notif10" class="checkbox-csa">
                                            <span class="checkbox tertiary"><span></span></span>
                                            <label>Receive email notifications</label>
                                        </label>
                                        <!-- /CHECKBOX -->
                                        <button class="button tertiary">Post Comment</button>
                                    </form>
                                    <!-- /COMMENT REPLY FORM -->
                                </div>
                                <!-- /COMMENT REPLY -->

                                <!-- LINE SEPARATOR -->
                                <hr class="line-separator">
                                <!-- /LINE SEPARATOR -->

                                <!-- COMMENT -->
                                <div class="comment-wrap">
                                    <!-- USER AVATAR -->
                                    <a href="user-profile.html">
                                        <figure class="user-avatar medium">
                                            <img src="images/avatars/avatar_19.jpg" alt="">
                                        </figure>
                                    </a>
                                    <!-- /USER AVATAR -->
                                    <div class="comment">
                                        <p class="text-header">Cloud Templates</p>
                                        <!-- PIN -->
                                        <span class="pin greyed">Purchased</span>
                                        <!-- /PIN -->
                                        <p class="timestamp">8 Hours Ago</p>
                                        <a href="#" class="report">Report</a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magnada. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                    </div>
                                </div>
                                <!-- /COMMENT -->

                                <!-- COMMENT REPLY -->
                                <div class="comment-wrap comment-reply">
                                    <!-- USER AVATAR -->
                                    <a href="user-profile.html">
                                        <figure class="user-avatar medium">
                                            <img src="images/avatars/avatar_09.jpg" alt="">
                                        </figure>
                                    </a>
                                    <!-- /USER AVATAR -->

                                    <!-- COMMENT REPLY FORM -->
                                    <form class="comment-reply-form">
                                        <textarea name="treply20" placeholder="Write your comment here..."></textarea>
                                        <!-- CHECKBOX -->
                                        <input type="checkbox" id="notif20" name="notif20" checked>
                                        <label for="notif20" class="checkbox-csa">
                                            <span class="checkbox tertiary"><span></span></span>
                                            <label>Receive email notifications</label>
                                        </label>
                                        <!-- /CHECKBOX -->
                                        <button class="button tertiary">Post Comment</button>
                                    </form>
                                    <!-- /COMMENT REPLY FORM -->
                                </div>
                                <!-- /COMMENT REPLY -->

                                <!-- LINE SEPARATOR -->
                                <hr class="line-separator">
                                <!-- /LINE SEPARATOR -->

                                <!-- COMMENT -->
                                <div class="comment-wrap">
                                    <!-- USER AVATAR -->
                                    <a href="user-profile.html">
                                        <figure class="user-avatar medium">
                                            <img src="images/avatars/avatar_18.jpg" alt="">
                                        </figure>
                                    </a>
                                    <!-- /USER AVATAR -->
                                    <div class="comment">
                                        <p class="text-header">Lucy Diamond</p>
                                        <!-- PIN -->
                                        <span class="pin greyed">Purchased</span>
                                        <!-- /PIN -->
                                        <p class="timestamp">10 Hours Ago</p>
                                        <a href="#" class="report">Report</a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magnada. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                    </div>

                                    <!-- COMMENT -->
                                    <div class="comment-wrap">
                                        <!-- USER AVATAR -->
                                        <a href="user-profile.html">
                                            <figure class="user-avatar medium">
                                                <img src="images/avatars/avatar_09.jpg" alt="">
                                            </figure>
                                        </a>
                                        <!-- /USER AVATAR -->
                                        <div class="comment">
                                            <p class="text-header">Odin_Design</p>
                                            <!-- PIN -->
                                            <span class="pin">Author</span>
                                            <!-- /PIN -->
                                            <p class="timestamp">2 Hours Ago</p>
                                            <a href="#" class="report">Report</a>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magnada. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                        </div>
                                    </div>
                                    <!-- /COMMENT -->

                                    <!-- COMMENT -->
                                    <div class="comment-wrap">
                                        <!-- USER AVATAR -->
                                        <a href="user-profile.html">
                                            <figure class="user-avatar medium">
                                                <img src="images/avatars/avatar_18.jpg" alt="">
                                            </figure>
                                        </a>
                                        <!-- /USER AVATAR -->
                                        <div class="comment">
                                            <p class="text-header">Lucy Diamond</p>
                                            <!-- PIN -->
                                            <span class="pin greyed">Purchased</span>
                                            <!-- /PIN -->
                                            <p class="timestamp">2 Hours Ago</p>
                                            <a href="#" class="report">Report</a>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magnada. Ut enim ad minim veniam onsectetur elit.</p>
                                        </div>
                                    </div>
                                    <!-- /COMMENT -->

                                    <!-- COMMENT REPLY -->
                                    <div class="comment-wrap comment-reply">
                                        <!-- USER AVATAR -->
                                        <a href="user-profile.html">
                                            <figure class="user-avatar medium">
                                                <img src="images/avatars/avatar_09.jpg" alt="">
                                            </figure>
                                        </a>
                                        <!-- /USER AVATAR -->

                                        <!-- COMMENT REPLY FORM -->
                                        <form class="comment-reply-form">
                                            <textarea name="treply30" placeholder="Write your comment here..."></textarea>
                                            <!-- CHECKBOX -->
                                            <input type="checkbox" id="notif30" name="notif30" checked>
                                            <label for="notif30" class="checkbox-csa">
                                                <span class="checkbox tertiary"><span></span></span>
                                                <label>Receive email notifications</label>
                                            </label>
                                            <!-- /CHECKBOX -->
                                            <button class="button tertiary">Post Comment</button>
                                        </form>
                                        <!-- /COMMENT REPLY FORM -->
                                    </div>
                                    <!-- /COMMENT REPLY -->
                                </div>
                                <!-- /COMMENT -->

                                <!-- LINE SEPARATOR -->
                                <hr class="line-separator">
                                <!-- /LINE SEPARATOR -->

                                <!-- PAGER -->
                                <div class="pager tertiary">
                                    <div class="pager-item"><p>1</p></div>
                                    <div class="pager-item active"><p>2</p></div>
                                    <div class="pager-item"><p>3</p></div>
                                    <div class="pager-item"><p>...</p></div>
                                    <div class="pager-item"><p>17</p></div>
                                </div>
                                <!-- /PAGER -->

                                <div class="clearfix"></div>

                                <!-- LINE SEPARATOR -->
                                <hr class="line-separator">
                                <!-- /LINE SEPARATOR -->

                                <h3>Leave a Comment</h3>

                                <!-- COMMENT REPLY -->
                                <div class="comment-wrap comment-reply">
                                    <!-- USER AVATAR -->
                                    <a href="user-profile.html">
                                        <figure class="user-avatar medium">
                                            <img src="images/avatars/avatar_09.jpg" alt="">
                                        </figure>
                                    </a>
                                    <!-- /USER AVATAR -->

                                    <!-- COMMENT REPLY FORM -->
                                    <form class="comment-reply-form">
                                        <textarea name="treply100" placeholder="Write your comment here..."></textarea>
                                        <button class="button tertiary">Post Comment</button>
                                    </form>
                                    <!-- /COMMENT REPLY FORM -->
                                </div>
                                <!-- /COMMENT REPLY -->
                            </div>
                            <!-- /COMMENTS -->
                        </div>
                        <!-- /TAB CONTENT -->

                        <!-- TAB CONTENT -->
                        <div class="tab-content" style="display: none;">
                            <!-- ITEM-FAQ -->
                            <div class="accordion item-faq tertiary">
                                <!-- ACCORDION ITEM -->
                                <div class="accordion-item">
                                    <h6 class="accordion-item-header">Read Before Buying</h6>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                    <div class="accordion-item-content">
                                        <h4>Bidding for the First Time</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                        <h4>Winning the Auction</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                    </div>
                                </div>
                                <!-- /ACCORDION ITEM -->

                                <!-- ACCORDION ITEM -->
                                <div class="accordion-item">
                                    <h6 class="accordion-item-header">How Does Bidding Work?</h6>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                    <div class="accordion-item-content">
                                        <h4>Bidding for the First Time</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                        <h4>Winning the Auction</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                    </div>
                                </div>
                                <!-- /ACCORDION ITEM -->

                                <!-- ACCORDION ITEM -->
                                <div class="accordion-item">
                                    <h6 class="accordion-item-header">Our Return Policy</h6>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                    <div class="accordion-item-content">
                                        <h4>Bidding for the First Time</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                        <h4>Winning the Auction</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                    </div>
                                </div>
                                <!-- /ACCORDION ITEM -->

                                <!-- ACCORDION ITEM -->
                                <div class="accordion-item">
                                    <h6 class="accordion-item-header">Shipping and Delivery</h6>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                    <div class="accordion-item-content">
                                        <h4>Bidding for the First Time</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                        <h4>Winning the Auction</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                    </div>
                                </div>
                                <!-- /ACCORDION ITEM -->

                                <!-- ACCORDION ITEM -->
                                <div class="accordion-item">
                                    <h6 class="accordion-item-header">Quality Guarantee</h6>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                    <div class="accordion-item-content">
                                        <h4>Bidding for the First Time</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                        <h4>Winning the Auction</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                    </div>
                                </div>
                                <!-- /ACCORDION ITEM -->
                            </div>
                            <!-- /ITEM-FAQ -->
                        </div>
                        <!-- /TAB CONTENT -->
                    </div>
                    <!-- /POST TAB -->
                </div>
                <!-- CONTENT -->
            </div>
        </div>
    </div>
    <!-- /SECTION -->
<!-- FORM POPUP -->
<div id="message-popup" class="form-popup mfp-hide">
    

    <!-- FORM POPUP CONTENT -->
    <div class="form-popup-content">
        <h4 class="popup-title">Send Your Message</h4>
        <!-- LINE SEPARATOR -->
        <hr class="line-separator short">
        <!-- /LINE SEPARATOR -->
        <p class="spaced"></p>
        <div class="input-container">
                    <label for="message" class="rl-label b-label required">Your Message:</label>
                    <textarea id="message_box" name="message_box" placeholder="Write your message here..."></textarea>
                </div>
        <div id="restore-pwd-form">
            <input type="hidden" name="auctioneer_id" value="<?=$post['user_id']?>" id="auctioneer_id_message">
            <input type="hidden" name="auction_id" value="<?=$post['id']?>" id="auction_id_message">
            <button class="button mid dark no-space send_message">Send <span class="primary">Now</span></button>
        </div>
    </div>
    <!-- /FORM POPUP CONTENT -->
</div>
<!-- /FORM POPUP -->
