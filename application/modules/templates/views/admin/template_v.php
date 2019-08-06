<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
    <?= $this->load->view('template/admin/head_template_v', isset($head) ? $head : array() ); ?>
</head>
<!-- END HEAD -->
<!-- page-sidebar-fixed - page-sidebar-closed-hide-logo -->
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-container-bg-solid page-sidebar-fixed page-md">

<div class="page-wrapper">
    <?= $this->load->view('template/admin/header_template_v', isset($header) ? $header : array() ); ?>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <?= $this->load->view('template/admin/sidebar_template_v', isset($sidebar) ? $sidebar : array() ); ?>
        <!-- BEGIN CONTENT -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->

                <!-- BEGIN PAGE BAR -->

                <!-- END PAGE BAR -->

                <!-- BEGIN PAGE TITLE-->
                <h1 class="page-title mt-none"> <?= isset($pageHeader) ? $pageHeader : 'No Page Header' ?>
                    <small><?= isset($pageDescription) ? $pageDescription : 'No Page Description' ?></small>
                </h1>
                <!-- END PAGE TITLE-->
                <!-- END PAGE HEADER-->
                <?php

                if (isset($content_view) && !empty($content_view)) {
                    $this->load->view($content_view, $this->data);
                } else {
                    // $this->data['asdasda'] = 404;
                    $this->load->view('template/admin/404_template_v', isset($footer) ? $footer : array());
                } ?>
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <?= $this->load->view('template/admin/footer_template_v', isset($footer) ? $footer : array()); ?>
</div>
<?= $this->load->view('template/admin/foot_template_v', isset($foot) ? $foot : array()); ?>

<?php
if (isset($page_js) && !empty($page_js)) {
    $this->load->view($page_js, $this->data);
} ?>
</body>

</html>