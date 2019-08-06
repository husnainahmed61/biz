<!-- SUBSCRIBE BANNER -->
<div id="subscribe-banner-wrap" class="newletter-main-cs">
    <div class="container">
        <!-- SUBSCRIBE CONTENT -->
        <div class="subscribe-content row">
            <!-- SUBSCRIBE HEADER -->
            <div class="d-none d-sm-block col-sm-2 col-lg-3 col-xl-1"></div>
            <div class=" col-sm-8 col-lg-6 col-xl-10">
                <div class="row">
                    <div class="subscribe-header col-lg-12 col-xl-6">
                        <div class="inner-wrapper">
                            <figure>
                                <img src="<?= base_url("assets_u/images/news_icon.png");?>" alt="subscribe-icon">
                            </figure>
                            <div class="content-cs">
                                <p class="subscribe-title">Subscribe to our Newsletter</p>
                                <p>And receive the latest news and offers</p>
                            </div>
                        </div>
                    </div>
                    <!-- /SUBSCRIBE HEADER -->

                    <!-- SUBSCRIBE FORM -->
                    <div class="subscribe-form col-lg-12 col-xl-6">
                        <input type="text" name="subscribe_email" id="subscribe_email" placeholder="Enter your email here..." value="">
                        <button class="button medium dark subcribe_submit">Subscribe!</button>
                    </div>
                </div>
            </div>
            <div class="d-none d-sm-block col-sm-2 col-lg-3 col-xl-1"></div>

            <!-- /SUBSCRIBE FORM -->
        </div>
        <!-- /SUBSCRIBE CONTENT -->
    </div>
</div>
<!-- /SUBSCRIBE BANNER -->

<!-- FOOTER -->
<footer>
    <!-- FOOTER TOP -->
    <div id="footer-top-wrap" class="footer-main-cs">
        <div id="footer-top" class="container">
            <div class="row">
            <!-- COMPANY INFO -->
            <div class="company-info col-sm-12 col-md-6 col-lg-6">
                <figure class="logo small">
                    <img src="https://www.vayzn.com/assets_u/images/logo.png" alt="logo-small">
                </figure>
                <p>Vayzn offers E-commerce platform with involvement of Auctions and Bids. It is a Marketplace where Auctioneers place Buying and Selling Auctions. The Bidders bid on the Auctions after reading the description of the Auction and User Profile. The Auctioneer can select from the list of Bidders and do the business transaction from B2B, B2C, & C2C.</p>
                <ul class="company-info-list">
                    <li class="company-info-item">
                        <span class="icon-present"></span>
                        <p><span><?=$foot['total_products']?></span> Products</p>
                    </li>
                    <li class="company-info-item">
                        <span class="icon-energy"></span>
                        <p><span><?=$foot['Individual']?></span> Individual Members</p>
                    </li>
                    <li class="company-info-item">
                        <span class="icon-user"></span>
                        <p><span><?=$foot['Business']?></span> Business Members</p>
                    </li>
                </ul>
                <!-- SOCIAL LINKS -->
                <ul class="social-links">
                    
                    <li class="social-link">
                        <a href="https://twitter.com/vayznofficial">
                            <i class="fa fa-twitter" style="color:white;padding: 5px;"></i>
                        </a>
                    </li>
                    <li class="social-link">
                        <a href="https://www.instagram.com/vayznofficial/">
                            <i class="fa fa-instagram" style="color:white;padding: 5px;"></i>
                        </a>
                    </li>
                    <li class="social-link">
                        <a href="https://web.facebook.com/vayznofficial/?modal=admin_todo_tour">
                            <i class="fa fa-facebook-square"style="color:white;padding: 5px;"></i>
                        </a>
                    </li>
                    <li class="social-link">
                        <a href="https://www.youtube.com/channel/UCGkNQO2wi8kFZh-Ah37tPQA">
                            <i class="fa fa-youtube"style="color:white;padding: 5px;"></i>
                        </a>
                    </li>
                </ul>
                <!-- /SOCIAL LINKS -->
            </div>
            <!-- /COMPANY INFO -->

            <!-- LINK INFO -->
            <div class="col-sm-12 col-md-3 col-lg-3 links-cs">
                <div class="row">
                    
                    <!-- LINK INFO -->
                    <div class="link-info col-12 col-md-4">
                        <p class="footer-title">Instagram Feed</p>
                        <ul class="link-list">
                        <?php
                        // use this instagram access token generator http://instagram.pixelunion.net/
                        $access_token="15388798696.1677ed0.90fae0bee88141ebb87840198a831ef6";
                        $photo_count=2;
                             
                        $json_link="https://api.instagram.com/v1/users/self/media/recent/?";
                        $json_link.="access_token={$access_token}&count={$photo_count}";
//https://api.instagram.com/v1/users/self/media/recent/?access_token=15388798696.1677ed0.90fae0bee88141ebb87840198a831ef6&count=5
                        $json = file_get_contents('https://api.instagram.com/v1/users/self/media/recent/?access_token=8589775864.1677ed0.5ab3338afdf048dd89a3c456b0b908c8&count=5');
                        $obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
                        foreach ($obj['data'] as $post) {
     
                            $pic_text=$post['caption']['text'];
                            $pic_link=$post['link'];
                            $pic_like_count=$post['likes']['count'];
                            $pic_comment_count=$post['comments']['count'];
                            $pic_src=str_replace("http://", "https://", $post['images']['thumbnail']['url']);
                            //$pic_created_time=date("Y-m-d", strtotime($post['caption']['created_time']));
                            $pic_created_time=gmdate("F dS, Y", $post['created_time']);
                             
                           ?> 
                       
                        
                        <!-- LINK LIST -->
                        
                            <li class="link-item">
                                <figure class="product-preview-image">
                                    <div class="white_space">
                                        <a href='<?=$pic_link?>' target='_blank'>
                                            <img src="<?=$pic_src?>" alt='<?=$pic_text?>'>
                                        </a>
                                    </div>
                                </figure>
                                <p class="feed-text"><?=$pic_text?></p><p class="feed-timestamp"><?=$pic_created_time?></p>
                            </li>
                            <?php 
                            } ?> 
                        </ul>
                        <!-- /LINK LIST -->
                    </div>
                    <!-- /LINK INFO -->


                </div>
            </div>
                        <!-- TWITTER FEED -->
            <div class="twitter-feed col-sm-12 col-md-3 col-lg-3">
                <p class="footer-title">Twitter Feed</p>
                <!-- TWEETS -->
                <ul class="tweets"></ul>
                <!-- /TWEETS -->
            </div>
            <!-- /TWITTER FEED -->
</div>
        </div>
    </div>
    <!-- /FOOTER TOP -->

    <!-- FOOTER BOTTOM -->
    <div id="footer-bottom-wrap" class="bottom-bar-cs">
        <div id="footer-bottom"  class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p>
                        <span>&copy;</span><a href="<?=base_url()?>">Vayzn </a> All Rights Reserved <?php echo date("Y"); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- /FOOTER BOTTOM -->
</footer>
<!-- /FOOTER -->