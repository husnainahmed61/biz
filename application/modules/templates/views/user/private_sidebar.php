<?php

$user_login = $this->session->userdata("user_login");

?>
<!-- SIDE MENU -->
    <div id="dashboard-options-menu" class="side-menu dashboard left closed ">
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
                        <?php if (isset($user_login['profile_image']) && !empty($user_login['profile_image'])) { 
                            if (isset($base_resources_url_user) && !empty($base_resources_url_user)) {
                         ?>
                        <img src="<?=$base_resources_url_user.''.$user_login['profile_image']?>" alt="avatar">    
                        <?php } } else {?>
                        <img src="<?= base_url("assets_u/images/avatars/avatar_01.jpg");?>" alt="avatar">
                        <?php } ?>
                    </figure>
                </div>

                </a>
                <!-- /USER AVATAR -->

                <!-- USER INFORMATION -->
                <p class="user-name"><?=ucfirst($user_login['firstname']).' '.ucfirst($user_login['lastname'])?></p>
                <!-- /USER INFORMATION -->
            </div>
            <!-- /USER QUICKVIEW -->
        </div>
        <!-- /SIDE MENU HEADER -->

        <!-- SIDE MENU TITLE -->
        <p class="side-menu-title">Your Account</p>
        <!-- /SIDE MENU TITLE -->

        <!-- DROPDOWN -->
        <ul class="dropdown dark hover-effect interactive">
            <!-- DROPDOWN ITEM -->
            <li class="dropdown-item">
                <a href="<?=base_url('profile')?>">
                    <span class="sl-icon icon-settings"></span>
                    Account Settings
                </a>
            </li>
            <!-- /DROPDOWN ITEM -->
            <!-- DROPDOWN ITEM -->
            <li class="dropdown-item">
                <a href="<?=base_url('Notifications')?>">
                    <span class="sl-icon icon-star"></span>
                    Notifications
                </a>
                <!-- PIN -->
                <span class="pin soft-edged big primary">49</span>
                <!-- /PIN -->
            </li>
            <!-- /DROPDOWN ITEM -->
            <!-- DROPDOWN ITEM -->
            <li class="dropdown-item">
                <a href="<?=base_url('inbox')?>">
                    <span class="sl-icon icon-envelope"></span>
                    Messages
                </a>
                <!-- PIN -->
                <span class="pin soft-edged big secondary">!</span>
                <!-- /PIN -->
            </li>
            <!-- /DROPDOWN ITEM -->
            <!-- DROPDOWN ITEM -->
            <li class="dropdown-item interactive">
                <a href="#">
                    <span class="sl-icon icon-tag"></span>
                    Alerts
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </a>

                <!-- INNER DROPDOWN -->
                <ul class="inner-dropdown">
                    <!-- INNER DROPDOWN ITEM -->
                    <li class="inner-dropdown-item">
                        <a href="<?= base_url()?>alerts/create">Create Alert</a>
                    </li>
                    <!-- /INNER DROPDOWN ITEM -->
                    <!-- INNER DROPDOWN ITEM -->
                    <li class="inner-dropdown-item">
                        <a href="<?=base_url('alerts')?>">My Alerts</a>
                        <!-- PIN -->
                        <span class="pin soft-edged secondary">2</span>
                        <!-- /PIN -->
                    </li>
                    <!-- /INNER DROPDOWN ITEM -->

                    

                   
                </ul>
                <!-- INNER DROPDOWN -->

                <!-- PIN -->
                <span class="pin soft-edged big secondary">!</span>
                <!-- /PIN -->
            </li>
            <!-- /DROPDOWN ITEM -->
            <!-- DROPDOWN ITEM -->
            <li class="dropdown-item interactive">
                <a href="#">
                    <span class="sl-icon icon-tag"></span>
                    Company Configuration
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </a>

                <!-- INNER DROPDOWN -->
                <ul class="inner-dropdown">
                    <!-- INNER DROPDOWN ITEM -->
                    <li class="inner-dropdown-item">
                        <a href="<?= base_url()?>company/basic_settings">Basic Settings</a>
                    </li>
                    <!-- /INNER DROPDOWN ITEM -->
                    <!-- INNER DROPDOWN ITEM -->
                    <li class="inner-dropdown-item">
                        <a href="<?=base_url('alerts')?>">Tax Settings</a>
                    </li>
                    <!-- /INNER DROPDOWN ITEM -->
                    <!-- INNER DROPDOWN ITEM -->
                    <li class="inner-dropdown-item">
                        <a href="<?= base_url()?>company/user_managment">User Management</a>
                    </li>
                    <!-- /INNER DROPDOWN ITEM -->
                    <!-- INNER DROPDOWN ITEM -->
                    <li class="inner-dropdown-item">
                        <a href="<?=base_url('alerts')?>">Location Management</a>
                    </li>
                    <!-- /INNER DROPDOWN ITEM -->
                   
                </ul>
                <!-- INNER DROPDOWN -->

            </li>
            <!-- /DROPDOWN ITEM -->

        </ul>
        <!-- /DROPDOWN -->


         <!-- SIDE MENU TITLE -->
        <p class="side-menu-title">Author Tools</p>
        <!-- /SIDE MENU TITLE -->

        <!-- DROPDOWN -->
        <ul class="dropdown dark hover-effect">
            <!-- DROPDOWN ITEM -->
            <li class="dropdown-item">
                <a href="<?=base_url('auction/create')?>">
                    <span class="sl-icon icon-arrow-up-circle"></span>
                    Create Ad
                </a>
            </li>
            <!-- /DROPDOWN ITEM -->

            <!-- DROPDOWN ITEM -->
            <li class="dropdown-item">
                <a href="<?=base_url('auctions')?>">
                    <span class="sl-icon icon-folder-alt"></span>
                    My Ads
                </a>
            </li>
            <!-- /DROPDOWN ITEM -->
            <!-- DROPDOWN ITEM -->
            <li class="dropdown-item">
                <a href="<?=base_url('bids')?>">
                    <span class="sl-icon icon-chart"></span>
                    My Bids
                </a>
            </li>
            <!-- /DROPDOWN ITEM -->
           


        </ul>
        <!-- /DROPDOWN -->

        <a href="<?= base_url('merchant/logout?'.$return_url)?>" class="button medium secondary">Logout</a>
    </div>