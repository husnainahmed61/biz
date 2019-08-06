<div class="modal fade" tabindex="-1" role="dialog" id="confirm_bid">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirm Bid</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want place your bid ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary">Yes, I'm Sure</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">
    $(document).ready(function () {
        // Elevate Zoom for Product Page image
        $("#zoom_01").elevateZoom({
            gallery: 'gallery_01',
            cursor: 'pointer',
            galleryActiveClass: 'active',
            imageCrossfade: true,
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 500,
            lensFadeIn: 500,
            lensFadeOut: 500,
            loadingIcon: 'image/progress.gif'
        });
        //////pass the images to swipebox
        $("#zoom_01").on("click", function (e) {
            var ez = $('#zoom_01').data('elevateZoom');

            console.log(ez.getGalleryList());
            $.swipebox(ez.getGalleryList());
            return false;
        });

        $("#button_bid").on("click", function () {

            $("#confirm_bid").modal('show');

        });
    });
</script>