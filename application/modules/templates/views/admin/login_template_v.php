<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title><?= $site_name ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports"
          name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="<?= base_url('assets/global/plugins/font-awesome/css/font-awesome.min.css') ?> " rel="stylesheet"
          type="text/css"/>
    <link href="<?= base_url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?= base_url('assets/global/plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?= base_url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css ') ?>"
          rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->


    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href=" <?= base_url('assets/global/css/components-md.min.css') ?>" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="<?= base_url('assets/global/css/plugins-md.min.css') ?>" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?= base_url('assets/pages/css/login.min.css') ?>" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->

    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?= base_url('assets/layouts/layout/css/layout.min.css ') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('assets/layouts/layout/css/themes/darkblue.min.css ') ?>" rel="stylesheet" type="text/css"
          id="style_color"/>
    <link href="<?= base_url('assets/layouts/layout/css/custom.min.css ') ?>" rel="stylesheet" type="text/css"/>
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>

<body class="login">
<!-- BEGIN LOGO -->
<div class="logo" style="">
    <img style="width:304px; height: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"
         src="<?= base_url('assets/layouts/layout/img/saver/saver-logo5.png'); ?>" alt="logo" />
    <!--<img src="<?/*= base_url('assets/pages/img/logo-big.png'); */?>" alt=""/>-->
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <!-- BEGIN LOGIN FORM -->
<?= form_open(base_url('login/admin'), array('method' => "post", "class" => "login-form")); ?>
    <h3 class="form-title font-green">Sign In</h3>
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span> Enter any username and password. </span>
    </div>
    <?= validation_errors(); ?>
    <?php
    if (isset($authentication_message) && !empty($authentication_message)) {
        ?>
        <div class="alert alert-danger display-show">
            <button class="close" data-close="alert"></button>
            <span> <?= $authentication_message ?> </span>
        </div>
    <?php
        }
    ?>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Username</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off"
               placeholder="Email" name="email"/></div>


    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off"
               placeholder="Password" name="password"/></div>
    <div class="form-actions" style="    border-bottom: 0px solid;">
        <button type="submit" class="btn green uppercase" style="width: 100%    ">Login</button>
        <!--<label class="rememberme check mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="remember" value="1"/>Remember
            <span></span>
        </label>-->
        <!--<a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>-->
    </div>
    <?= form_close(); ?>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" action="index.html" method="post">
        <h3 class="font-green">Forget Password ?</h3>
        <p> Enter your e-mail address below to reset your password. </p>
        <div class="form-group">
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email"
                   name="email"/></div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
            <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->   
    <!-- BEGIN REGISTRATION FORM -->
    <!-- END REGISTRATION FORM -->
</div>
<div class="copyright"> 2018 © Saver Automotives Products Inc.</div>
<!--[if lt IE 9]>
<script src="<?= base_url('assets/global/plugins/respond.min.js'); ?>"></script>
<script src="<?= base_url('assets/global/plugins/excanvas.min.js'); ?>"></script>
<script src="<?= base_url('assets/global/plugins/ie8.fix.min.js'); ?>"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="<?= base_url('assets/global/plugins/jquery.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/global/plugins/bootstrap/js/bootstrap.min.js'); ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/global/plugins/js.cookie.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/global/plugins/jquery.blockui.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'); ?>"
        type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<?= $this->load->view('scripts/js/jq-validation.php') ?>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?= base_url('assets/global/scripts/app.min.js'); ?>" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= base_url('assets/pages/scripts/login.min.js'); ?>" type="text/javascript"></script>
<!-- Dashboard -->
</body>
</html>