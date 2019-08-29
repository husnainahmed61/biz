
<!-- JS Part Start-->
<script src="<?=base_url();?>assets_u/js/vendor/jquery-3.1.0.min.js"></script>
<script src="<?= base_url('assets_u/vendors/jquery-ui-1.12.1/jquery-ui.min.js');?>"></script> 
<script src="<?= base_url('assets_u/js/popper.min.js');?>"></script>
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script> -->
<script src="<?=base_url();?>assets_u/js/bootstrap3.min.js"></script>
<script src="<?= base_url('assets_u/vendors/jquery-validation-1.17.0/dist/jquery.validate.min.js');?>"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="<?=base_url();?>assets_u/js/vendor/jquery.sumoselect.js"></script>
<script src="<?= base_url('assets_u/js/vendor/jquery.uploadPreview.js');?>"></script>
<!-- Magnific Popup -->
<script src="<?= base_url('assets_u/js/vendor/jquery.magnific-popup.min.js');?>"></script>
<script src="<?=base_url();?>assets_u/js/vendor/croppie.js"></script>
<script src="<?=base_url();?>assets_u/js/vendor/bootstrap-datepicker.min.js"></script>
<script src="<?=base_url();?>assets_u/js/vendor/jquery.sumoselect.js"></script>
<script src="<?=base_url();?>assets_u/js/vendor/jquery.xmlinefill.min.js"></script>
<!-- XM Pie Chart -->

<script src="<?=base_url();?>assets_u/js/vendor/jquery.xmpiechart.min.js"></script>
<script src="<?=base_url();?>assets_u/js/vendor/jquery.bxslider.min.js"></script>

<script src="<?=base_url();?>assets_u/js/vendor/jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>
<script src="<?=base_url();?>assets_u/js/vendor/jQuery-File-Upload/js/jquery.iframe-transport.js"></script>
<script src="<?=base_url();?>assets_u/js/vendor/jQuery-File-Upload/js/jquery.fileupload.js"></script>

<!-- xmAlert -->
<script src="<?= base_url('assets_u/js/vendor/jquery.xmalert.min.js');?>"></script>
<!-- Side Menu -->
<script src="<?=base_url();?>assets_u/js/side-menu.js"></script>
<script src="<?=base_url();?>assets_u/js/dashboard-statement.js"></script>

<script src="<?=base_url();?>assets_u/js/vendor/chart.min.js"></script>
<script src="<?=base_url();?>assets_u/js/dashboard-statistics.js"></script>
<!-- Radio Link -->
<script src="<?= base_url('assets_u/js/radio-link.js');?>"></script>
<!-- Dashboard Header -->
<script src="<?= base_url('assets_u/js/dashboard-inbox.js');?>"></script>
<script src="<?=base_url();?>assets_u/js/dashboard-header.js"></script>
<script src="<?=base_url();?>assets_u/js/dashboard-uploaditem.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets_u/vendors/select2/select2.min.js"></script>
<script src="http://localhost:81/bid/public_html/assets_u/js/author-profile.js"></script>
<?php
if (isset($pageLevelPlugins['js'])) {
    foreach ($pageLevelPlugins['js'] AS $js) {
        $this->load->view('scripts/js/' . $js . '.php');
    }
}
?>
<script type="text/javascript">
	// $("#upload_image").on('change',function(){
 //        var reader = new FileReader();

 //        reader.onload = function(event){
 //            $("#upload_profile_picture_modal").modal('show');
 //            rawImg = event.target.result;
 //        }
 //        reader.readAsDataURL(this.files[0]);
        
 //    });

    //upload & crop image
    // $image_crop = $('#image_demo').croppie({
    //     enableExif : true,
    //     viewport : {
    //         width : 200,
    //         height : 200,
    //         type : 'square'
    //     },
    //     boundary : {
    //         width : 400,
    //         height : 400
    //     }

    // });
    // $("#upload_image").on('change',function(){
    //     var reader = new FileReader();

    //     reader.onload = function(event){
    //         $("#upload_profile_picture_modal").modal('show');
    //         rawImg = event.target.result;
    //     }
    //     reader.readAsDataURL(this.files[0]);
        
    // });

    // $('#upload_profile_picture_modal').on('shown.bs.modal', function(){
    //     // alert('Shown pop');
    //     $image_crop.croppie('bind',{
    //         url : rawImg
    //     }).then(function(){
    //         console.log("jquery bind complete");
    //     });
    // });

    // $('.crop_image').click(function(event){
    //     $image_crop.croppie('result',{
    //         type : 'canvas',
    //         size : 'viewport'
    //     }).then(function(response){
    //         console.log('i m uploaded');
    //         console.log(response);
    //         $.ajax({
    //             url : base_url+'profile/uploadProfilePicture',
    //             type : "POST",
    //             data : {"image" : response},
    //             success:function(data){
    //                 console.log("image uploaded success");
    //                 console.log(data);
    //                  location.reload();
    //             }
    //         });
    //     })
    // });
//end upload and crop image

function showstatusMessage(type, heading, text, delay) {
    $('body').xmalert({
        x: 'right',
        y: 'bottom',
        xOffset: 30,
        yOffset: 30,
        alertSpacing: 17,
        lifetime: delay,
        fadeDelay: 0.3,
        template: type, // messageInfo , messageError, messageSuccess
        title: heading,
        paragraph: text,
    });

}
</script>
  <script type="text/javascript">
   $(document).ready(function() {
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
});
</script>