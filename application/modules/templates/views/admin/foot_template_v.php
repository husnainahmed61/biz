<!--[if lt IE 9]> -->
<script src="<?= base_url('assets/global/plugins/respond.min.js'); ?>"></script>
<script src="<?= base_url('assets/global/plugins/excanvas.min.js'); ?>"></script>
<script src="<?= base_url('assets/global/plugins/ie8.fix.min.js'); ?>"></script>
<!-- [endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="<?= base_url('assets/global/plugins/jquery.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/global/plugins/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/global/plugins/js.cookie.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/global/plugins/jquery.blockui.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'); ?>"
        type="text/javascript"></script>
<!-- END CORE PLUGINS -->


<script src="<?= base_url('assets/global/plugins/jquery-ui/jquery-ui.min.js') ?>" type="text/javascript"></script>

<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?= base_url('assets/global/scripts/app.min.js'); ?>" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?= base_url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js'); ?> "
        type="text/javascript"></script>
<script src="<?= base_url('assets/global/plugins/jquery-validation/js/additional-methods.min.js'); ?> "
        type="text/javascript"></script>

<script type="text/javascript">
    (function ($) {
        $.fn.closest_descendent = function (filter) {
            var $found = $(),
                $currentSet = this; // Current place
            while ($currentSet.length) {
                $found = $currentSet.filter(filter);
                if ($found.length) break; // At least one match: break loop
                // Get all children of the current set
                $currentSet = $currentSet.children();
            }
            return $found.first(); // Return first match of the collection
        }
    })(jQuery);
</script>
<?php
if (isset($pageLevelPlugins['js'])) {
    foreach ($pageLevelPlugins['js'] AS $js) {
        $this->load->view('scripts/js/' . $js . '.php');
    }
}
?>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= base_url('assets/pages/scripts/ui-modals.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/global/plugins/bootstrap-growl/jquery.bootstrap-growl.min.js') ?>"
        type="text/javascript"></script>
<script src="<?= base_url('assets/pages/scripts/ui-bootstrap-growl.min.js') ?>" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?= base_url('assets/layouts/layout/scripts/layout.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/layouts/layout/scripts/demo.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/layouts/global/scripts/quick-sidebar.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/layouts/global/scripts/quick-nav.min.js'); ?>" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->

<div class="modal fade" id="delete_modal" data-record-id="" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal Title 11</h4>
            </div>
            <div class="modal-body"> Modal body goes here</div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn green delete">Delete</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="detail_modal" data-record-id="" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal Title 11</h4>
            </div>
            <div class="modal-body"> Modal body goes here</div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn green delete">Delete</button>-->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade " id="image_modal" data-record-id="" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Preview</h4>
            </div>
            <div class="modal-body text-center">
                <img class="img-responsive inline-block" src="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn green delete">Delete</button>-->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>


<script type="text/javascript">

    function showstatusMessage(type, heading, text) {
        $.bootstrapGrowl('<h3 class="sbold text-uppercase mt-none">' + heading + '</h3> ' + text, {
            ele: 'body', // which element to append to
            type: type, // (null, 'info', 'danger', 'success', 'warning')
            offset: {
                from: 'bottom',
                amount: 50
            }, // 'top', or 'bottom'
            align: 'right', // ('left', 'right', or 'center')
            width: parseInt(300), // (integer, or 'auto')
            delay: 5000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
            allow_dismiss: true, // If true then will display a cross to close the popup.
            stackup_spacing: 10 // spacing between consecutively stacked growls.
        });
    }

    function startPace() {
        // console.log("Pace: Start");
        Pace.restart();
    }

    function stopPace() {
        // console.log("Pace: Stop");
        Pace.stop();
    }

    $(document).ajaxStart(function () {
        startPace();
    });

    $(document).ajaxStop(function () {
        stopPace();
    });

    $(document).ready(function () {
        /*Table Image Preview*/
        $('.img_preview').click(function () {

            /*Getting Data*/
            var imageLink = $(this).find('img').attr('src');
            var designName = $(this).closest("tr").find('.detail').text();

            /*Setting up Modal*/
            var $imageModal = $('#image_modal');
            $imageModal.find(".modal-dialog").addClass("modal-lg");
            var $modalTitle = $imageModal.find(".modal-title");
            var $modalBody = $imageModal.find(".modal-body");

            /*Setting Data*/
            var $title = designName === undefined ? designName : 'Preview';
            $modalTitle.text($title);
            $modalBody.find('img').attr('src', imageLink);

            /*Deploying Modal*/
            $imageModal.modal('show');
        });
    });
</script>