<?php
/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 11-Oct-17
 * Time: 4:33 PM
 */
?>

<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.html">
<!--                <img style="width:86px; height: auto" src="--><?//= base_url('assets/layouts/layout/img/logo.png'); ?><!--" alt="logo" class="logo-default"/> </a>-->
            <img style="width:86px; height: auto" src="<?= base_url('assets/layouts/layout/img/saver/saver-logo1.png'); ?>" alt="logo" class="logo-default"/> </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <img alt="" class="img-circle"
                             src="<?= base_url('assets/layouts/layout/img/adminavatar2.png') ?>"/>
                        <span class="username username-hide-on-mobile"> Admin </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                       <!-- <li>
                            <a href="<?/*= base_url('admin/changepassword') */?>">
                                <i class="icon-key"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>-->
                        <li>
                            <a href="<?= base_url('admin/logout') ?>">
                                <i class="icon-logout"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->

<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
<!-- END HEADER & CONTENT DIVIDER -->