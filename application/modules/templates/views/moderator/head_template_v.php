<?php
/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 11-Oct-17
 * Time: 1:39 PM
 */
?>
<meta charset="utf-8"/>
<title><?= $site_name ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports"
      name="description"/>
<meta content="" name="author"/>
<!-- BEGIN PAGE FIRST SCRIPTS -->
<script src="<?= base_url('assets/global/plugins/pace/pace.min.js');?>" type="text/javascript"></script>
<!-- END PAGE FIRST SCRIPTS -->
<!-- BEGIN PAGE TOP STYLES -->
<link href="<?= base_url('assets/global/plugins/pace/themes/pace-theme-flash.min.css');?>" rel="stylesheet" type="text/css" />
<!-- END PAGE TOP STYLES -->
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
      type="text/css"/>
<link href="<?= base_url('assets/global/plugins/font-awesome/css/font-awesome.min.css') ?> " rel="stylesheet"
      type="text/css"/>
<link href="<?= base_url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') ?>" rel="stylesheet"
      type="text/css"/>
<link href="<?= base_url('assets/global/plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?= base_url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css ') ?>" rel="stylesheet"
      type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?= base_url('assets/pages/css/error.min.css')?>" rel="stylesheet" type="text/css" />

<?php
if (isset($pageLevelPlugins['css'])) {
    foreach ($pageLevelPlugins['css'] AS $css) {
        $this->load->view('scripts/css/' . $css . '.php');
    }
}
?>

<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN THEME GLOBAL STYLES -->
<link href=" <?= base_url('assets/global/css/components-md.min.css') ?>" rel="stylesheet" id="style_components"
      type="text/css"/>
<link href="<?= base_url('assets/global/css/plugins-md.min.css') ?>" rel="stylesheet" type="text/css"/>
<!-- END THEME GLOBAL STYLES -->


<!-- BEGIN THEME LAYOUT STYLES -->
<link href="<?= base_url('assets/layouts/layout/css/layout.min.css ') ?>" rel="stylesheet" type="text/css"/>
<link href="<?= base_url('assets/layouts/layout/css/themes/darkblue.min.css ') ?>" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?= base_url('assets/layouts/layout/css/custom.min.css ') ?>" rel="stylesheet" type="text/css"/>
<!-- END THEME LAYOUT STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<script type="text/javascript">
    var base_url = '<?= base_url(); ?>';
</script>




