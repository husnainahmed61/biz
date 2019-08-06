<?php
// echo "<pre>";
//  print_r($quick_menu);
//  exit();
function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
 ?>
<!-- FORM POPUP -->
<div id="login-popup" class="form-popup login mfp-hide">
    <!-- FORM POPUP CONTENT -->
    <div class="form-popup-content">
        <h4 class="popup-title">Login to your Account</h4>
        <!-- LINE SEPARATOR -->
        <hr class="line-separator">
        <!-- /LINE SEPARATOR -->
        <form id="login-form" action="<?= base_url('login/authenticate_user') ?>"  method="post" accept-charset="UTF-8" role="form" class="form login_form">
            <label for="login_email" class="rl-label">Email Address</label>
            <input type="email" id="login_email" name="login_email" placeholder="Enter your email here..." required>
            <label for="login_password" class="rl-label">Password</label>
            <input type="password" id="login_password" name="login_password" placeholder="Enter your password here..." required>
            <!-- CHECKBOX -->
            <input type="checkbox" id="checkbox1" name="remember" checked>
            <label for="remember" class="label-check">
                <span class="checkbox primary primary"><span></span></span>
                Remember username and password
            </label>
            <!-- /CHECKBOX -->
            <p>Forgot your password? <a href="<?= base_url('password/forget') ?>" class="primary">Click here!</a></p>
            <p>New User? <a href="<?= base_url('sign-up') ?>" class="primary">SignUp here!</a></p>
            <button class="button mid dark" type="submit">Login <span class="primary">Now!</span></button>
        </form>
        <!-- LINE SEPARATOR -->
        <hr class="line-separator double">
        <!-- /LINE SEPARATOR -->
        <a href="<?php echo $this->facebook->login_url(array('public_profile','email')); ?>" class="button mid fb half" style="color: white;">Login with Facebook</a>
        <a href="<?php echo $this->google->get_login_url(); ?>" class="button mid gplus half" style="background-color: #E53935; color: white;">Login with Google</a>
    </div>
    <!-- /FORM POPUP CONTENT -->
</div>
<!-- /FORM POPUP -->


<!-- HEADER -->
<div class="header-wrap">
    <header class="container">
        <div class="row">
            <!-- LOGO -->
            <a href="<?=base_url()?>" class="col-sm-3">
                <figure class="logo">
                    <img src="<?= base_url("assets_u/images/logo.png");?>" alt="logo">
                </figure>
            </a>
            <!-- /LOGO -->

            <!-- MOBILE MENU HANDLER -->
            <div class="mobile-menu-handler left primary">
                <img src="<?= base_url("assets_u/images/pull-icon.png");?>" alt="pull-icon">
            </div>
            <!-- /MOBILE MENU HANDLER -->

            <!-- LOGO MOBILE -->
            <a href="index.html">
                <figure class="logo-mobile">
                    <img src="<?= base_url("assets_u/images/logo_mobile.png");?>" alt="logo-mobile">
                </figure>
            </a>
            <!-- /LOGO MOBILE -->

            <!-- MOBILE ACCOUNT OPTIONS HANDLER -->
            <div class="mobile-account-options-handler right secondary">
                <span class="icon-user"></span>
            </div>
            <!-- /MOBILE ACCOUNT OPTIONS HANDLER -->

            <!-- USER BOARD -->
            <div class="user-board col-sm-9">

                <?php
                if(!empty($user_login)){
                    ?>
                    <!-- USER QUICKVIEW -->
                    <div class="user-quickview">
                        <!-- USER AVATAR -->
                        <a href="author-profile.html">
                            <div class="outer-ring">
                                <div class="inner-ring"></div>
                                <figure class="user-avatar">
                                    <?php if (isset($user_login['profile_image']) && !empty($user_login['profile_image'])) {
                                        if (isset($base_resources_url_user) && !empty($base_resources_url_user)) {
                                            ?>
                                            <img src="<?= $base_resources_url_user . '' . $user_login['profile_image'] ?>"
                                                 alt="avatar">
                                        <?php }
                                    } else { ?>
                                        <img src="<?= base_url("assets_u/images/avatars/avatar_01.jpg"); ?>"
                                             alt="avatar">
                                    <?php } ?>

                                </figure>
                            </div>
                        </a>
                        <!-- /USER AVATAR -->

                        <!-- USER INFORMATION -->

                        <p class="user-name"><?=$user_login['firstname'].' '.$user_login['lastname']?></p>

                        <!-- SVG ARROW -->
                        <svg class="svg-arrow">
                            <use xlink:href="#svg-arrow"></use>
                        </svg>
                        <!-- /SVG ARROW -->
                        <p class="user-money"></p>

                        <!-- /USER INFORMATION -->

                        <!-- DROPDOWN -->
                        <ul class="dropdown small hover-effect closed">
                            <li class="dropdown-item">
                                <div class="dropdown-triangle"></div>
                                <a href="<?=base_url()?><?=$user_login['slug']?>/user" >
                                    Profile Page
                                </a>
                            </li>
                            <li class="dropdown-item">
                                <a href="<?=base_url('profile') ?>">User Dashboard</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="<?=base_url('inbox') ?>">Messages</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="<?=base_url('auctions') ?>">My Ads</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="<?=base_url('bids') ?>">My Bids</a>
                            </li>
                        </ul>
                        <!-- /DROPDOWN -->
                    </div>
                    <!-- /USER QUICKVIEW -->

                    <!-- ACCOUNT INFORMATION -->
                    <div class="account-information">
                        <a href="<?= base_url("My-favourites") ?>">
                            <div class="account-wishlist-quickview">
                                <span class="icon-heart"></span>
                            </div>
                        </a>
                        <div class="account-cart-quickview">
						<span class="icon-present">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
                            <!-- /SVG ARROW -->
						</span>

                            <!-- PIN -->
                            <span class="pin soft-edged secondary">7</span>
                            <!-- /PIN -->

                            <!-- DROPDOWN CART -->
                            <ul class="dropdown cart closed">
                               <?php if (isset($alerts) && !empty($alerts)) { 
                                $i = 0;
                                foreach (array_reverse($alerts) as $key => $value) {
                                ?>
                                <!-- DROPDOWN ITEM -->
                                <li class="dropdown-item">
                                    <a href="<?= base_url($value['slug'] . '/auction') ?>" class="link-to"></a>
                                    <!-- SVG PLUS -->
                                    <svg class="svg-plus">
                                        <use xlink:href="#svg-plus"></use>
                                    </svg>
                                    <!-- /SVG PLUS -->
                                    <figure class="product-preview-image tiny">
                                        <img src="<?= $base_resources_url . $value['image_sm_1'] ?>" alt="">
                                    </figure>
                                    <p class="text-header tiny"><?=$value['name']?></p>
                                    <p class="category tiny primary"><?=$value['cat_name']?></p>
                                    <?php if ($value['type'] == "sell") { ?>
                                       <p class="price tiny"><span><?=$value['currency']?> </span><?=$value['amount']?></p>
                                    <?php } else { ?>
                                        <p class="price tiny"><span>Quotation Required</span></p>
                                    <?php } ?>    
                                    
                                </li>
                                <!-- /DROPDOWN ITEM -->
                                 <?php if (++$i == 3) break; ?>   
                               <?php } }
                                ?>

                                <a href="<?=base_url("auction-alerts")?>" class="button primary" style="width:auto">View all Alerts</a>
                            </ul>
                            <!-- /DROPDOWN CART -->
                        </div>
                        <div class="account-email-quickview">
						<span class="icon-envelope">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
                            <!-- /SVG ARROW -->
						</span>

                            <!-- PIN -->
                            <span class="pin soft-edged secondary">!</span>
                            <!-- /PIN -->

                            <!-- DROPDOWN NOTIFICATIONS -->
                            <ul class="dropdown notifications closed">
                                <?php if (isset($conversations) && !empty($conversations)) {
                                $i = 0;
                                 foreach (array_reverse($conversations) as $key => $convo) { ?>
                                <!-- DROPDOWN ITEM -->
                                <li class="dropdown-item">
                                    <div class="dropdown-triangle"></div>
                                    <a href="<?=base_url('inbox') ?>" class="link-to"></a>
                                    <figure class="user-avatar">
                                        <img src="<?= base_url("assets_u/images/avatars/avatar_06.jpg");?>" alt="">
                                    </figure>
                                    <p class="text-header tiny"><span><?php if ($user_login['id'] == $convo['auctioneer_id'])  { echo $convo['user_name']; }
                                    else {
                                        echo $convo['auctioneer_name'];
                                    } ?></span></p>
                                    <p class="subject"><a href="<?=base_url().''.$convo['auction_slug']?>/auction"><?=$convo['auction_name']?></a></p>
                                    <p class="timestamp"><?php echo date("F dS, Y", strtotime(substr($convo['created_at'],0,10)))?></p>
                                    <span class="notification-type secondary-new icon-envelope"></span>
                                </li>
                                <!-- /DROPDOWN ITEM -->
                                <?php if (++$i == 4) break; ?>
                            <?php }?> 
                                <a href="<?=base_url('inbox') ?>" class="button secondary" style="width: auto;">View all Messages</a>
                        <?php } else {  ?>
                                <a href="#" class="button secondary" style="width: auto;">No Messages</a>
                            <?php } ?>
                            </ul>
                            <!-- /DROPDOWN NOTIFICATIONS -->
                        </div>
                        <div class="account-settings-quickview">
						<span class="icon-settings">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
                            <!-- /SVG ARROW -->
						</span>
                            <?php
                            if ($noti_count >= 1) { ?>
                                 <!-- PIN -->
                                <span class="pin soft-edged primary"><?=$noti_count?></span> 
                            <!-- /PIN -->
                            <?php } ?>

                            <!-- DROPDOWN NOTIFICATIONS -->
                            <ul class="dropdown notifications no-hover closed">
                                <!-- DROPDOWN ITEM -->
                                <?php if (isset($notifications) && !empty($notifications)) {
                                    $i = 0;
                                    foreach (array_reverse($notifications) as $key => $noti) {
                                 ?>
                                 <?php if ($noti['notification_type_id'] == 1) {
                                 ?>
                                <li class="dropdown-item">
                                    <div class="dropdown-triangle"></div>
                                    <a href="author-profile.html">
                                        <figure class="user-avatar">
                                            <img src="<?= base_url("assets_u/images/avatars/avatar_02.jpg");?>" alt="">
                                        </figure>
                                    </a>
                                    <p class="title">
                                        <a href="<?=base_url().''.$noti['source_slug']?>/user"><span><?=$noti['UserName']?></span></a> added
                                        <a href="<?=base_url().''.$noti['slug']?>/auction"><span><?=$noti['name']?></span></a> to favourites
                                    </p>
                                    <p class="timestamp"><?php

                                        echo time_elapsed_string($noti['created_at']);
                                        ?></p>
                                    <span class="notification-type primary-new icon-heart"></span>
                                </li>
                                <!-- /DROPDOWN ITEM -->
                                 <?php } if($noti['notification_type_id'] == 2) {?>
                                <!-- DROPDOWN ITEM -->
                                <li class="dropdown-item">
                                    <a href="author-profile.html">
                                        <figure class="user-avatar">
                                            <img src="<?= base_url("assets_u/images/avatars/avatar_03.jpg");?>" alt="">
                                        </figure>
                                    </a>
                                    <p class="title">
                                        <a href="<?=base_url().''.$noti['source_slug']?>/user"><span><?=$noti['UserName']?></span></a> commented on
                                        <a href="<?=base_url().''.$noti['slug']?>/auction"><span><?=$noti['name']?></span></a>
                                    </p>
                                    <p class="timestamp"><?php echo time_elapsed_string($noti['created_at']); ?></p>
                                    <span class="notification-type icon-bubble"></span>
                                </li>
                                <!-- /DROPDOWN ITEM -->
                                 <?php } if($noti['notification_type_id'] == 3) {?>
                                <!-- DROPDOWN ITEM -->
                                <li class="dropdown-item">
                                    <a href="author-profile.html">
                                        <figure class="user-avatar">
                                            <img src="<?= base_url("assets_u/images/avatars/avatar_04.jpg");?>" alt="">
                                        </figure>
                                    </a>
                                    <p class="title">
                                        <a href="<?=base_url().''.$noti['source_slug']?>/user"><span><?=$noti['UserName']?></span></a> bid on
                                        <a href="<?=base_url()?>bids/biddetail/?auction=<?php echo $this->my_encrypt->encode($noti['target_id']); ?>"><span><?=$noti['name'] ?></span></a>
                                    </p>
                                    <p class="timestamp"><?php
                                        echo time_elapsed_string($noti['created_at']);
                                        ?></p>
                                    <span class="notification-type primary-new icon-tag"></span>
                                </li>
                                <!-- /DROPDOWN ITEM -->
                                 <?php } if($noti['notification_type_id'] == 4) {?>
                                <!-- DROPDOWN ITEM -->
                                <li class="dropdown-item">
                                    <a href="author-profile.html">
                                        <figure class="user-avatar">
                                            <img src="<?= base_url("assets_u/images/avatars/avatar_05.jpg");?>" alt="">
                                        </figure>
                                    </a>
                                    <p class="title">
                                        <a href="<?=base_url().''.$noti['source_slug']?>/user"><span><?=$noti['UserName']?></span></a> Followed you
                                    </p>
                                    <p class="timestamp"><?php

                                        echo time_elapsed_string($noti['created_at']);
                                        ?></p>
                                    <span class="notification-type icon-star"></span>
                                </li>
                                <!-- /DROPDOWN ITEM -->
                                 <?php } if (++$i == 4) break; ?>
                            <?php } ?>

                                <a href="<?=base_url("Notifications")?>" class="button primary" style="width:auto">View all Notifications</a>
                             <?php } else { ?>
                                    <a href="#" class="button primary" style="width:auto">No Notifications</a>

                                <?php }
                            ?>
                           
                                    
                                
                            </ul>
                            <!-- /DROPDOWN NOTIFICATIONS -->
                        </div>
                    </div>
                    <!-- /ACCOUNT INFORMATION -->

                    <!-- ACCOUNT ACTIONS -->
                    <div class="account-actions">
                        <a href="<?=base_url()?>auction/create" class="button primary">Create Ad</a>
                        <a href="<?= base_url('merchant/logout?'.$return_url)?>" class="button secondary">Logout</a>
                    </div>
                    <!-- /ACCOUNT ACTIONS -->
                    <?php
                }
                else {
                    ?>
                    <!-- ACCOUNT ACTIONS -->
                    <div class="account-actions">
                        <a href="#login-popup" id="login-pop" data-mfp-src="#login-popup" class="button secondary button mid-short secondary login-popup">Login</a>
                    </div>
                    <!-- /ACCOUNT ACTIONS -->
                    <?php
                }
                ?>

            </div>
            <!-- /USER BOARD -->
        </div>
    </header>
</div>
<!-- /HEADER -->

<!-- SIDE MENU -->
<div id="mobile-menu" class="side-menu left closed">
    <!-- SVG PLUS -->
    <svg class="svg-plus">
        <use xlink:href="#svg-plus"></use>
    </svg>
    <!-- /SVG PLUS -->

    <!-- SIDE MENU HEADER -->
    <div class="side-menu-header">
        <figure class="logo small">
            <img src="<?= base_url("assets_u/images/logo.png");?>" alt="logo">
        </figure>
    </div>
    <!-- /SIDE MENU HEADER -->

    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">Main Links</p>
    <!-- /SIDE MENU TITLE -->

    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect interactive">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="<?=base_url()?>">Home</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="http://www.vayzn.com/blog/" target="_blank">Blog</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <p class="side-menu-title">Categories</p>
        <!-- /DROPDOWN ITEM -->
        <?php foreach ($navbar AS $cat1) : ?>
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item categorie-mennu-cs">
            <a href="#">
                <?= $cat1['name'] ?>
                <!-- SVG ARROW -->
                <svg class="svg-arrow">
                    <use xlink:href="#svg-arrow"></use>
                </svg>
                <!-- /SVG ARROW -->
            </a>

            <!-- INNER DROPDOWN -->
            <ul class="inner-dropdown mobile-submenu-toggle">
                <!-- INNER DROPDOWN ITEM -->
                <?php foreach ($cat1['categories2'] AS $cat2): ?>
                <li class="dropdown-item">
                    <a><?= $cat2['name'] ?> <!--  href="<?= base_url($cat1['slug'].'/category1'); ?>" -->
                        <!-- SVG ARROW -->
                        <svg class="svg-arrow">
                            <use xlink:href="#svg-arrow"></use>
                        </svg>
                        <!-- /SVG ARROW -->
                    </a>                    
                    <ul class="sub-mobmenu-cs inner-dropdown">
                        <!-- INNER DROPDOWN ITEM -->
                        <?php foreach ($cat2['categories3'] AS $cat3): ?>
                        <li class="inner-dropdown-item">
                            <a href="<?= base_url($cat3['slug'].'/category3'); ?>"><?= $cat3['name'] ?></a>
                        </li>
                        <!-- /INNER DROPDOWN ITEM -->
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php endforeach; ?>
                
                <!-- /INNER DROPDOWN ITEM -->
            </ul>
        </li>
        <!-- /DROPDOWN ITEM -->
        <?php endforeach; ?>
        <p class="side-menu-title">Quick Menu</p>
        <!-- /DROPDOWN ITEM -->
        <?php foreach ($quick_menu AS $cat1) : ?>
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item categorie-mennu-cs">
            <a href="#">
                <?= ucfirst($cat1['name']) ?>
                <!-- SVG ARROW -->
                <svg class="svg-arrow">
                    <use xlink:href="#svg-arrow"></use>
                </svg>
                <!-- /SVG ARROW -->
            </a>

            <!-- INNER DROPDOWN -->
            <ul class="inner-dropdown mobile-submenu-toggle">
                <!-- INNER DROPDOWN ITEM -->
                <?php foreach ($cat1['quick_cat_sub'] AS $cat2): ?>
                <li class="dropdown-item">
                    <a href="<?= base_url($cat2['slug'].'/category3'); ?>"><?= ucfirst($cat2['name']) ?> <!--  " -->
                       
                    </a>                    
                    
                </li>
                <?php endforeach; ?>
                
                <!-- /INNER DROPDOWN ITEM -->
            </ul>
        </li>
        <!-- /DROPDOWN ITEM -->
        <?php endforeach; ?>
    </ul>
    <!-- /DROPDOWN -->
</div>
<!-- /SIDE MENU -->

<!-- SIDE MENU -->
<?php
if(!empty($user_login)){
    ?>
<div id="account-options-menu" class="side-menu right closed">
    <!-- SVG PLUS -->
    <svg class="svg-plus">
        <use xlink:href="#svg-plus"></use>
    </svg>
    <!-- /SVG PLUS -->

    <!-- SIDE MENU HEADER -->
    <div class="side-menu-header">
        <!-- USER QUICKVIEW -->
        <div class="user-quickview">
            <!-- USER AVATAR -->
            <a href="author-profile.html">
                <div class="outer-ring">
                    <div class="inner-ring"></div>
                    <figure class="user-avatar">
                        <img src="<?= base_url("assets_u/images/avatars/avatar_01.jpg");?>" alt="avatar">
                    </figure>
                </div>
            </a>
            <!-- /USER AVATAR -->

            <!-- USER INFORMATION -->
            <p class="user-name"><?=$user_login['firstname'].' '.$user_login['lastname']?></p>
            <!-- /USER INFORMATION -->
        </div>
        <!-- /USER QUICKVIEW -->
    </div>
    <!-- /SIDE MENU HEADER -->


    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">Dashboard</p>
    <!-- /SIDE MENU TITLE -->

    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="author-profile.html">Profile Page</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="<?=base_url('profile') ?>">User Dashboard</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="<?=base_url('inbox') ?>">Messages</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="<?=base_url('auctions') ?>">My Ads</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="<?=base_url('bids') ?>">My Bids</a>
        </li>
        <!-- /DROPDOWN ITEM -->
    </ul>
    <!-- /DROPDOWN -->

    <a href="<?= base_url('merchant/logout?'.$return_url)?>" class="button medium secondary">Logout</a>
    <a href="<?=base_url()?>auction/create" class="button medium primary">Create Ad</a>
</div>
<!-- /SIDE MENU -->
<?php } else { ?>

    <div id="account-options-menu" class="side-menu right closed">
    <!-- SVG PLUS -->
    <svg class="svg-plus">
        <use xlink:href="#svg-plus"></use>
    </svg>
    <!-- /SVG PLUS -->
        <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">Your Account</p>
    <!-- /SIDE MENU TITLE -->


    <a href="#login-popup" id="mobile-login-pop" data-mfp-src="#login-popup" class="button medium secondary login-popup">Login</a>
</div>
<?php } ?>    

<!-- MAIN MENU -->
<div class="main-menu-wrap">
    <div class="menu-bar container">
        <div class="row">
            <nav class="db-inline col-md-9">

                <ul class="main-menu">
                    <!-- MENU ITEM -->

                        <li class="menu-item catgories-dropdown">
                        <a>Categories
                        <svg class="svg-arrow">
                            <use xlink:href="#svg-arrow"></use>
                        </svg>
                        </a>

                        <!-- DROPDOWN -->
                        <ul class="dropdown">
                            <?php foreach ($navbar AS $cat1) : ?>
                            <li class="dropdown-item">
                                <a href="<?= base_url($cat1['slug'].'/category1'); ?>"><?= $cat1['name'] ?>
                                <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </a>
                                <ul class="dropdown hover-effect closed panel-categories">
                                    <div class="row">
                                        <?php foreach ($cat1['categories2'] AS $cat2): ?>
                                        <li class="col-sm-3">
                                            <ul>
                                                
                                                <li class="sub-category-main"><a href="<?= base_url($cat2['slug'].'/category2'); ?>"><?= $cat2['name'] ?></a></li>
                                                    <?php foreach ($cat2['categories3'] AS $cat3): ?>
                                                        <li class="child-category"><a href="<?= base_url($cat3['slug'].'/category3'); ?>"><?= $cat3['name'] ?></a></li>
                                                    <?php endforeach; ?>
                                                
                                            </ul>
                                        </li>
                                        <?php endforeach; ?>
                                    </div>
                                </ul>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <!-- /DROPDOWN -->
                        </li>
                        
                        <!-- /MENU ITEM -->

                        <!-- MENU ITEM -->
                        <li class="menu-item">
                            <a href="http://www.vayzn.com/blog/" target="_blank">Blog</a>
                        </li>
                        <!-- /MENU ITEM -->
                        <!-- MENU ITEM -->
                    <li class="menu-item sub">
                        <a href="#">
                            Quick Menu
                            <!-- SVG ARROW -->
                            <svg class="svg-arrow">
                                <use xlink:href="#svg-arrow"></use>
                            </svg>
                            <!-- /SVG ARROW -->
                        </a>
                        <div class="content-dropdown" style="width: max-content;">
                            <!-- FEATURE LIST BLOCK -->
                            <?php for ($i = 0; $i < count($quick_menu); $i+=2) { ?>
                            <div class="feature-list-block">
                                <h6 class="feature-list-title"><?=$quick_menu[$i]['name']?></h6>
                                <hr class="line-separator">
                                <!-- FEATURE LIST -->
                                <ul class="feature-list spaced">
                                    <?php foreach ($quick_menu[$i]['quick_cat_sub'] as $key => $value) {
                                      ?>
                                    <!-- FEATURE LIST ITEM -->
                                    <li class="feature-list-item">
                                        <a href="<?= base_url($value['slug'].'/category3'); ?>"><?=$value['name']?></a>
                                    </li>
                                    <!-- /FEATURE LIST ITEM -->
                                    <?php } ?>
                                </ul>
                                <!-- /FEATURE LIST -->
                                
                                <div class="clearfix"></div>
                                
                                <h6 class="feature-list-title"><?=$quick_menu[$i + 1]['name']?></h6>
                                <hr class="line-separator">
                                <!-- FEATURE LIST -->
                                <ul class="feature-list">
                                     <?php foreach ($quick_menu[$i + 1]['quick_cat_sub'] as $key => $value) {
                                      ?>
                                    <!-- FEATURE LIST ITEM -->
                                    <li class="feature-list-item">
                                        <a href="<?= base_url($value['slug'].'/category3'); ?>"><?=$value['name']?></a>
                                    </li>
                                    <!-- /FEATURE LIST ITEM -->
                                    <?php } ?>
                                </ul>
                                <!-- /FEATURE LIST -->
                            </div>
                            <!-- /FEATURE LIST BLOCK -->
                            <?php } ?>
                            

                           
                            <!-- FEATURE LIST BLOCK -->
                            <div class="feature-list-block">
                                <!-- PRODUCT LIST -->
                                <div class="product-list grid column-wrap">
                                    <!-- PRODUCT ITEM -->
                                    <div class="product-item column">
                                        <!-- PRODUCT PREVIEW ACTIONS -->
                                        <div class="product-preview-actions">
                                            <!-- PRODUCT PREVIEW IMAGE -->
                                            <figure class="product-preview-image">
                                                <img src="<?=base_url("assets_u/images/items/tablet_m.jpg")?>" alt="product-image">
                                            </figure>
                                            <!-- /PRODUCT PREVIEW IMAGE -->

                                            <!-- PREVIEW ACTIONS -->
                                            <div class="preview-actions">
                                                <!-- PREVIEW ACTION -->
                                                <div class="preview-action">
                                                    <a href="product-page.html">
                                                        <div class="circle tiny primary">
                                                            <span class="icon-tag"></span>
                                                        </div>
                                                    </a>
                                                    <a href="product-page.html">
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
                                            <!-- /PREVIEW ACTIONS -->
                                        </div>
                                        <!-- /PRODUCT PREVIEW ACTIONS -->

                                        <!-- PRODUCT INFO -->
                                        <div class="product-info">
                                            <a href="product-page.html">
                                                <p class="text-header">Axcom Drawing Tablet (New)</p>
                                            </a>
                                            <p class="product-description">Lorem ipsum dolor sit urarde...</p>
                                            <a href="products.html">
                                                <p class="category tertiary">Tablets</p>
                                            </a>
                                            <p class="price"><span>$</span>380</p>
                                        </div>
                                        <!-- /PRODUCT INFO -->
                                        <hr class="line-separator">

                                        <!-- USER RATING -->
                                        <div class="user-rating">
                                            <a href="author-profile.html">
                                                <figure class="user-avatar small">
                                                    <img src="<?=base_url("assets_u/images/avatars/avatar_16.jpg")?>" alt="user-avatar">
                                                </figure>
                                            </a>
                                            <a href="author-profile.html">
                                                <p class="text-header tiny">Erika Thompson</p>
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
                                        </div>
                                        <!-- /USER RATING -->
                                    </div>
                                    <!-- /PRODUCT ITEM -->
                                </div>
                                <!-- /PRODUCT LIST -->
                            </div>
                            <!-- /FEATURE LIST BLOCK -->
                        </div>
                    </li>
                    <!-- /MENU ITEM -->
                        <!-- MENU ITEM -->
                        <li class="menu-item" style="display: none;">
                            <a href="services.html">Services    <!-- SVG ARROW -->
                            <svg class="svg-arrow">
                                <use xlink:href="#svg-arrow"></use>
                            </svg>
                            <!-- /SVG ARROW -->
                            </a>
                        <!-- DROPDOWN -->
                        <ul class="dropdown hover-effect closed">
                            <li class="dropdown-item">
                                <a href="#">Digital Graphics</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="#">Illustratation</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="#">
                                    Web Design
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </a>
                                <!-- DROPDOWN -->
                                <ul class="dropdown closed">
                                    <li class="dropdown-item">
                                        <a href="#">HTML and CSS</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="#">Wordpress</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="#">Shopify</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="#">PSD Templates</a>
                                    </li>
                                </ul>
                                <!-- /DROPDOWN -->
                            </li>
                        </ul>
                        <!-- /DROPDOWN -->
                        <!-- /MENU ITEM -->

                    </ul>
                </nav>
                <!-- <form class="search-form col-md-9 example" method="post" action="<?=base_url()?>search">
                    <input type="text" class="rounded" name="search" id="search_products" placeholder="Search products here...">

                    </div>
                </form> -->
                <!-- <div class="ui search">
                  <div class="ui icon input">
                    <input class="prompt" type="text" placeholder="Search GitHub">
                    <i class="circular search link icon"></i>
                  </div>
                </div> -->
                <form method="post" action="<?=base_url()?>search" class="search-form">
                <div class="ui right aligned category search">
                  <div class="ui icon input">
                    <input class="prompt" type="text" name="search" placeholder="Search Auctions...">
                    <i class="search icon"></i>
                  </div>
                  
                  <div class="results"></div>
                </div>
                </form>
                <!-- <div class="ui search search-form col-md-9">
                  <div class="ui left icon input">
                    <input class="prompt" type="text" placeholder="Search Auctions">
                    <i class="search icon"></i>
                    <button class="ui button">Follow</button>
                  </div>

                </div> -->
            </div>
        </div>
    </div>
    <!-- /MAIN MENU -->
