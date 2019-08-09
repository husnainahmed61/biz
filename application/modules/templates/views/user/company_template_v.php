<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->load->view('templates/user/head_template_v', isset($head) ? $head : array()); ?>
</head>
<body>

<?php
if (!empty($content_view) ) {
    $this->load->view($content_view, $this->data);
} else {
    $this->load->view('templates/user/404_template_v', $this->data);
} ?>

<?= $this->load->view('templates/user/footer_template_v', isset($footer) ? $footer : array()); ?>

<!-- /SVG PLUS -->
<?= $this->load->view('templates/user/foot_template_v', isset($foot) ? $foot : array()); ?>
<?php
if (isset($page_js) && !empty($page_js)) {
    $this->load->view($page_js, $this->data);
} ?>
</body>
</html>