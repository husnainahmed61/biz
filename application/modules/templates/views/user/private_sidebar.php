<?php
// echo "<pre>";
// print_r($user_roles);
// exit;
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
        <p class="side-menu-title" style="
    border: 1px solid #ebebeb;
">Your Account</p>
        <!-- /SIDE MENU TITLE -->

        <!-- DROPDOWN -->
        <ul class="dropdown dark hover-effect interactive">
             <!-- DROPDOWN ITEM -->
            <li class="dropdown-item">
                <a href="<?=base_url('company')?>">
                    <span class="sl-icon icon-wallet"></span>
                    Dashboard
                </a>
            </li>
            <?php if ($user_roles == "is_admin" || $user_roles[0]['company_settings'] == 1) { ?>
            <!-- DROPDOWN ITEM -->
            <li class="dropdown-item interactive">
                <a href="#">
                    <span class="sl-icon icon-settings"></span>
                    Company Settings
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
                        <a href="<?=base_url('company/tax_Settings')?>">Tax Settings</a>
                    </li>
                    <!-- /INNER DROPDOWN ITEM -->
                    <!-- INNER DROPDOWN ITEM -->
                    <li class="inner-dropdown-item">
                        <a href="<?= base_url()?>company/user_managment">User Management</a>
                    </li>
                    <!-- /INNER DROPDOWN ITEM -->
                    <!-- INNER DROPDOWN ITEM -->
                    <li class="inner-dropdown-item">
                        <a href="<?=base_url('company/location_managment')?>">Location Management</a>
                    </li>
                    <!-- /INNER DROPDOWN ITEM -->
                   
                </ul>
                <!-- INNER DROPDOWN -->
            

            </li>
            <?php } ?>
            <!-- /DROPDOWN ITEM -->
             <!-- DROPDOWN ITEM -->
             <?php if ($user_roles == "is_admin" || $user_roles[0]['add_items'] == 1) { ?>
                <li class="dropdown-item">
                    <a href="<?=base_url('company/inventory_list')?>">
                        <span class="sl-icon icon-layers"></span>
                        Item Management
                    </a>
                </li>    
            <?php } ?>
            <?php if ($user_roles == "is_admin" || $user_roles[0]['add_supplier'] == 1) { ?>
             <li class="dropdown-item">
                <a href="<?=base_url('company/supplier_list')?>">
                    <span class="sl-icon icon-folder-alt"></span>
                    Supplier Management
                </a>
            </li>
            <?php } ?>
            <?php if ($user_roles == "is_admin" || $user_roles[0]['create_pr'] == 1) { ?>
             <!-- DROPDOWN ITEM -->
            <li class="dropdown-item">
                <a href="<?=base_url('company/pr_list')?>">
                    <span class="sl-icon icon-arrow-up-circle"></span>
                    PR
                </a>
            </li>
            <!-- /DROPDOWN ITEM -->
            <?php } ?>
            <?php if ($user_roles == "is_admin" || $user_roles[0]['rfq_approval'] == 1) { ?>
            <!-- DROPDOWN ITEM -->
            <li class="dropdown-item interactive">
                <a href="#">
                    <span class="sl-icon icon-tag"></span>
                    RFQ
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
                        <a href="<?= base_url()?>company/rfq_list">RFQ List</a>
                    </li>
                    <!-- /INNER DROPDOWN ITEM -->
                    <!-- INNER DROPDOWN ITEM -->
                    <li class="inner-dropdown-item">
                        <a href="<?=base_url('company/rfq_log')?>">Approved RFQ</a>
                    </li>
                    <!-- /INNER DROPDOWN ITEM -->

                </ul>
                <!-- INNER DROPDOWN -->

            </li>
            <!-- /DROPDOWN ITEM -->
            <?php } ?>
            <?php if ($user_roles == "is_admin" || $user_roles[0]['po_approval'] == 1) { ?>
             <!-- DROPDOWN ITEM -->
            <li class="dropdown-item">
                <a href="<?=base_url('company/po_list')?>">
                    <span class="sl-icon icon-chart"></span>
                    PO
                </a>
            </li>
            <!-- /DROPDOWN ITEM -->
            <?php } ?>
            <?php if ($user_roles == "is_admin" || $user_roles[0]['reports'] == 1) { ?>
             <!-- DROPDOWN ITEM -->
            <li class="dropdown-item">
                <a href="<?=base_url('company/reports')?>">
                    <span class="sl-icon icon-graph"></span>
                    Reports
                </a>
               
            </li>
            <!-- /DROPDOWN ITEM -->
            <?php } ?>
            <?php if ($user_roles == "is_admin" || $user_roles[0]['notifications'] == 1) { ?>
              <!-- DROPDOWN ITEM -->
            <li class="dropdown-item">
                <a href="<?=base_url('Notifications')?>">
                    <span class="sl-icon icon-star"></span>
                    Notifications
                </a>
               
            </li>
            <!-- /DROPDOWN ITEM -->
             <?php } ?>
            <!-- DROPDOWN ITEM -->
            <li class="dropdown-item">
                <a href="<?=base_url('inbox')?>">
                    <span class="sl-icon icon-envelope"></span>
                    Messages
                </a>
                
            </li>
            <!-- /DROPDOWN ITEM -->
        </ul>
        <!-- /DROPDOWN -->





        <a href="<?= base_url('merchant/logout?'.$return_url)?>" class="button medium secondary">Logout</a>
    </div>