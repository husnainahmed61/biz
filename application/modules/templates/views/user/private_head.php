<?php
if (!empty($fbShare)) {
    ?>
    <meta property="fb:app_id" content="2363063897042848"/>
    <meta property="og:url" content="<?= $fbShare['url'] ?>"/>
    <meta property="og:type" content="<?= $fbShare['type'] ?>"/>
    <meta property="og:title" content="<?= $fbShare['title'] ?>"/>
    <meta property="og:description" content="<?= $fbShare['description'] ?>"/>
    <meta property="og:image" content="<?= $fbShare['image'] ?>"/>

    <?php
}

?>


<meta name="google-signin-client_id" content="25991473033-ilpedkmjvs3rkvn6gf3v2enppe2p18e5.apps.googleusercontent.com">
<meta charset="UTF-8"/>
<meta name="format-detection" content="telephone=no"/>
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
<link href="<?= base_url('assets_u/image/vayzn-favicon.png') ?>" rel="icon"/>
<?php if (isset($page_title) && !empty($page_title)) {
    ?>
    <title><?= $page_title ?></title>
<?php } else {
    ?>
    <title>Vayzn - Buy and Sell globally with Vayzn Eprocurement Marketplace for Auctions</title>
<?php } ?>
<meta name="keywords"
      content="B2B, B2C & C2C Marketplace for Auctions & Bids of Cars, Fashion, Antique , Industrial products among Consumers, Manufacturers, Suppliers, Importers & Exporters around the world"/>
<meta name="description"
      content="B2B, B2C & C2C Marketplace for Auctions & Bids of Cars, Fashion, Antique , Industrial products among Consumers, Manufacturers, Suppliers, Importers & Exporters around the world">
<meta name="google-site-verification" content="_bRlDYZg_vK0HCpS9oCtx14aFYkJ9NupNL3IafxjgVI"/>

<link rel="stylesheet" href="<?= base_url(); ?>assets_u/css/vendor/simple-line-icons.css">
<link rel="stylesheet" href="<?= base_url('assets_u/css/vendor/magnific-popup.css')?> ">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?= base_url('assets_u/css/bootstrap3.min.css')?> " crossorigin="anonymous">
<!-- CSS Part Start-->
<link rel="stylesheet" href="<?= base_url(); ?>assets_u/vendors/bootstrap-select-1.13.7/css/bootstrap-select.min.css">

<link rel="stylesheet" href="<?= base_url(); ?>assets_u/vendors/select2/select2.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets_u/vendors/DataTables/jquery.dataTables.min.css">

<!-- updated erald css -->


<!-- <link rel="stylesheet" href="<?= base_url(); ?>assets_u/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="<?= base_url(); ?>assets_u/css/style.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets_u/css/style2.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets_u/css/vendor/croppie.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets_u/css/vendor/sumoselect.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets_u/css/vendor/bootstrap-datepicker3.standalone.min.css">
<!-- CSS Part End-->

<?php
if (isset($pageLevelPlugins['css'])) {
    foreach ($pageLevelPlugins['css'] AS $css) {

        // $this->load->view('scripts/css/' . $css . '.php');
    }
}
?>

<script>
    var base_url = '<?= base_url(); ?>';
    var please_login = <?= !empty($this->session->flashdata('please_login')) ? 'true' : 'false'; ?> ;
</script>


<?php
if (!empty($baseMode) && $baseMode === 'sell') {
    ?>
    <!--    <link id="skin_seller" rel="stylesheet" type="text/css" href="<?= base_url('assets_u/css/skin-seller.css') ?> "/> -->
    <?php

}
?>
