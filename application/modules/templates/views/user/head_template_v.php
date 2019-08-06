<?php
if(!empty($fbShare)){
    ?>
    <meta property="fb:app_id"          content="2363063897042848" />
    <meta property="og:url"             content="<?=$fbShare['url']?>" />
    <meta property="og:type"            content="<?=$fbShare['type']?>" />
    <meta property="og:title"           content="<?=$fbShare['title']?>" />
    <meta property="og:description"     content="<?=$fbShare['description']?>" />
    <meta property="og:image"           content="<?=$fbShare['image']?>" />

    <?php
}

?>
<meta name="google-signin-client_id" content="25991473033-ilpedkmjvs3rkvn6gf3v2enppe2p18e5.apps.googleusercontent.com">
<meta charset="UTF-8"/>
<meta name="format-detection" content="telephone=no"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="<?= base_url('assets_u/images/vayzn-favicon.png') ?>" rel="icon"/>
<?php if (isset($page_title) && !empty($page_title)) {
    ?>
    <title><?=$page_title?></title>
<?php }
else {
    ?>
    <title>Vayzn - Buy & Sell with Best Online Auction Website in Pakistan | Buy & Sell Globally</title>
<?php } ?>
<meta name="keywords" content="Online, Auction, Bid, RFQ, Pakistan, Chinese, American, US, Pakistani, Japanese, Korean, Marketplace, Classified, Buyer, Seller, Authorized, Dealers, Manufacturer, Supplier, Exporter, Importer, Product, Imported, B2B, B2C, C2C, Social, Network, Books, Collectibles, Antiques, Paintings, Vintage, Collection, Cars, Furniture, Ads, Procurement, Purchasing, Eprocurement, Industrial, equipments" />
<meta name="description" content="B2B, B2C & C2C Marketplace for Auctions & Bids of Cars, Fashion, Antique , Industrial products among Consumers, Manufacturers, Suppliers, Importers & Exporters around the world">
<meta name="google-site-verification" content="_bRlDYZg_vK0HCpS9oCtx14aFYkJ9NupNL3IafxjgVI" />

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<link rel="stylesheet" href="<?= base_url('assets_u/vendors/bootstrap-3.3.7/css/bootstrap.min.css')?> ">
<link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">
<link rel="stylesheet" href="<?= base_url('assets_u/css/vendor/simple-line-icons.css')?> ">

<link rel="stylesheet" href="<?= base_url('assets_u/css/vendor/magnific-popup.css')?> ">
<link rel="stylesheet" href="<?= base_url('assets_u/css/vendor/tooltipster.css')?> ">
<link rel="stylesheet" href="<?= base_url('assets_u/css/vendor/jquery.range.css')?> ">

<link rel="stylesheet" href="<?= base_url('assets_u/css/style.css')?> ">
<link rel="stylesheet" href="<?= base_url('assets_u/css/style2.css')?> ">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?= base_url('assets_u/vendors/pace-1.0.2/themes/white/pace-theme-minimal.css') ?> "/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets_u/semantic/dist/semantic.css')?> ">
<style>
  .ui-autocomplete-loading {
    background: white url("assets_u/images/loading.gif") right center no-repeat;
  }
  </style>

<!------------------------------>
<!-- pageLevelPlugins -->
<!------------------------------>
<?php
if (isset($pageLevelPlugins['css'])) {
    foreach ($pageLevelPlugins['css'] AS $css) {
         $this->load->view('scripts/css/' . $css . '.php');
    }
}
?>
<!------------------------------>
<!-- END pageLevelPlugins -->
<!------------------------------>

<script>
    var base_url = '<?= base_url(); ?>';
    var please_login = <?= !empty($this->session->flashdata('please_login')) ? 'true' : 'false'; ?> ;
</script>




