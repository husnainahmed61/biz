<script type="text/javascript">
     $(document).ready(function () {
    $('.followers_list').SumoSelect(
        {
            search: true, 
            searchText: 'Enter here.',
            okCancelInMulti: true, 
            selectAll: true,
            triggerChangeCombined: true,
            forceCustomRendering: true,
            
        });
});
    $('.follower_div').click(function () {
            $('.follower_list').show(1000);
       });
    $('.public_div').click(function () {
            $('.follower_list').hide(1000);
       });
</script>

<script type="text/javascript">
 $(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload1",
    preview_box: "#image-preview1",
    label_field: "#image-label1"
  });
  $.uploadPreview({
    input_field: "#image-upload2",
    preview_box: "#image-preview2",
    label_field: "#image-label2"
  });
  $.uploadPreview({
    input_field: "#image-upload3",
    preview_box: "#image-preview3",
    label_field: "#image-label3"
  });
  $.uploadPreview({
    input_field: "#image-upload4",
    preview_box: "#image-preview4",
    label_field: "#image-label4"
  });
  $.uploadPreview({
    input_field: "#image-upload5",
    preview_box: "#image-preview5",
    label_field: "#image-label5"
  });
});

 // $('.btn-delete').on('click',function(e){
 //        e.preventDefault();
 //        //imageID = $(this).closest('.image')[0].id;
 //         alert('Now deleting '); //css("background-image", "none");
        
 //    });
 $(document.body).on('click', '.btn-delete' ,function(){
var parent_id = ($(this).parent().attr('id'));
$('#'+parent_id).css("background-image", "none");
//$('.btn-delete').remove();
$(this).remove();
 });
//  $('.btn-delete').on('click',function(){
    
// })
</script>
<script type='text/javascript'>
    <?php echo $this->session->flashdata('message_name');
    //print_r($rrr);
    //exit();
    ?>
</script>
<script type="text/javascript">

    /* preview images before upload 
    function readURL(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#post_images").change(function() {
      readURL(this);
    });
     end preview images before upload*/
    /*multiple images preview*/
    // $(function () {
    //     // Multiple images preview in browser
    //     var imagesPreview = function (input, placeToInsertImagePreview) {

    //         if (input.files) {
    //             var filesAmount = input.files.length;

    //             for (i = 0; i < filesAmount; i++) {
    //                 var reader = new FileReader();

    //                 reader.onload = function (event) {
    //                     $($.parseHTML('<figure class="product-preview-image small "><img src=' + event.target.result + ' ></figure>')).appendTo(placeToInsertImagePreview)
    //                     //$($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
    //                 }
    //                 reader.readAsDataURL(input.files[i]);
    //             }
    //         }
    //     };

    //     $('#post_images').on('change', function () {
    //         imagesPreview(this, 'div.gallery');
    //     });
    // });

    /*multiple images preview and delete*/
    $(document).ready(function() {
        if (window.File && window.FileList && window.FileReader) {
        $("#post_images").on("change", function(e) {
            $(".pip").remove();
          var files = e.target.files,
            filesLength = files.length;
          for (var i = 0; i < filesLength; i++) {
            var f = files[i]
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
              var file = e.target;
              $("<span class=\"pip\">" +
                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                "<br/><span class=\"remove\">Remove image</span>" +
                "</span>").insertAfter("#post_images");
              $(".remove").click(function(){
                $(this).parent(".pip").remove();
              });
              
              // Old code here
              /*$("<img></img>", {
                class: "imageThumb",
                src: e.target.result,
                title: file.name + " | Click to remove"
              }).insertAfter("#files").click(function(){$(this).remove();});*/
              
            });
            fileReader.readAsDataURL(f);
          }
        });
        } else {
        alert("Your browser doesn't support to File API")
        }
        });
    /*end*/

    /* end preview multiple images*/


    /* Start: Show_v */
    $(document).ready(function () {
        //$('select').select2({width: 'resolve'});
        $('.cat1').select2({width: 'resolve'});
        $("#close_button").click(function () {
            //alert('clicked');
            window.location = base_url;

        });

        var $recentBidModal = $('#recent-bids');
        var modalContentUrl = "";

        $(".buy-now").on("click", function (e) {
            modalContentUrl = $(this).data('load-url');

            //e.preventDefault();

            var options = {};
            $('#recent-bids').modal(options, $(this));
        });

        $recentBidModal.on('show.bs.modal', function (e) {
            console.log(e.relatedTarget);
            $(this).find('.modal-title').text("Recent Bids");
            $(this).find('.modal-body').load(modalContentUrl);
        });

        var $bidDetailsModal = $("#bid-details-modal");

        $recentBidModal.on("click", ".modal-body .bid-details", function () {
            var options = {};
            $bidDetailsModal.modal(options, $(this));
        });

        $bidDetailsModal.on("show.bs.modal", function (e) {
            console.log("Bid Details == show.bs.modal");
            console.log(e.relatedTarget);
            var url = $(e.relatedTarget).data("load-url");
            var title = $(e.relatedTarget).data("title");

            console.log(url);
            $(this).find('.modal-title').text(title);
            $(this).find('.modal-body').load(url);
        });


        /*List Group Start*/

        $('.star').on('click', function () {
            $(this).toggleClass('star-checked');
        });

        $('.ckbox label').on('click', function () {
            $(this).parents('tr').toggleClass('selected');
        });

        $('.btn-filter').on('click', function () {
            var $target = $(this).data('target');
            if ($target != 'all') {
                $('.table tr').css('display', 'none');
                $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
            } else {
                $('.table tr').css('display', 'none').fadeIn('slow');
            }
        });
        //alert(base_url);


        /*List Group End*/
    });
    /* Start: End_v */

    /* Start: Create_v */
    $(document).ready(function () {
        console.log("READY");
        var $cat1Input = $("select[name='category_1']");
        var $cat2Input = $("select[name='category_2']");
        var $cat3Input = $("select[name='category_3']");
        var $postAttributes = $('fieldset#post-attributes');

        var loadCatgories1 = function () {
            $.ajax({
                url: base_url + "category1/getCategories",
                method: "GET",
                dataType: "JSON",
                success: function (response) {
                    $.each(response.categories1, function (i, item) {
                        $cat1Input.append('<option value="' + item.id + '">' + item.name + '</option>');

                        console.log(i + ': ' + item.id + ': ' + item.name);
                    });
                    $cat1Input.select2({
                        placeholder: "Please select category 1"
                    });
                },
                error: function () {
                    console.log("ajax failed");
                },
            });
        };

        var getAuctionAttributes = function () {
            if ($postAttributes.is(":empty")) {
                var data = {
                    category_1: $("select[name='category_1']").val(),
                    category_2: $("select[name='category_2']").val(),
                    category_3: $("select[name='category_3']").val()
                };
                console.log(data);
                $.ajax({
                    url: base_url + "auctions/getAuctionAttributesForm",
                    method: "GET",
                    data: data,
                    dataType: "JSON",
                    success: function (response) {
                        /*console.log(response);
                         resetCSRF(response.csrf_token);*/
                        if (response.code == "500") {
                            $postAttributes.empty();
                        }
                        $postAttributes.html(response.html);
                        //$('.select2').select2();
                    }
                });
            }
        };


        $("select[name='category_1']").on('change', function () {
            var seletedCat1 = $(this).val();
            $postAttributes.empty();
            $cat2Input.empty();
            $cat2Input.select2();
            $cat3Input.empty();
            $cat3Input.select2();
            $.ajax({
                url: base_url + "category2/getByCategory1Id/" + seletedCat1,
                method: "GET",
                dataType: "JSON",
                success: function (response) {
                    $cat2Input.empty();
                    $cat3Input.empty();
                    $.each(response.categories2, function (i, item) {
                        $cat2Input.append('<option value="' + item.id + '">' + item.name + '</option>');

                        console.log(i + ': ' + item.id + ': ' + item.name);
                    });
                    $cat2Input.select2();
                },
                error: function () {
                    console.log("ajax failed");
                },

            });
        });

        $("select[name='category_2']").on('change', function () {
            var seletedCat2 = $(this).val();
            $postAttributes.empty();
            $cat3Input.empty();
            $.ajax({
                url: base_url + "category3/getByCategory2Id/" + seletedCat2,
                method: "GET",
                dataType: "JSON",
                success: function (response) {
                    $cat3Input.empty();
                    $.each(response.categories3, function (i, item) {
                        $cat3Input.append('<option value="' + item.id + '">' + item.name + '</option>');

                        console.log(i + ': ' + item.id + ': ' + item.name);
                    });
                    $cat3Input.selectpicker('refresh');
                },
                error: function () {
                    console.log("ajax failed");
                },

            });
        });

        $("select[name='category_3']").on('change', function () {
            $postAttributes.empty();
            getAuctionAttributes();
        });



        getCategories3();

        function getCategories3() {

            //var seletedCat2 = $(this).val();
            // $postAttributes.empty();
            $cat3Input.append('<option></option>');
            // $cat3Input.select2({
            //     templateSelection: function (data) {
            //         if (data.id === '') { // adjust for custom placeholder values
            //             return 'Custom styled placeholder text';
            //         }
            //
            //         return data.text;
            //     }
            // });
            $.ajax({
                url: base_url + "category1/getAllCategories",
                method: "GET",
                dataType: "JSON",
                success: function (response) {
                    // $cat3Input.empty();

                    $.each(response.data, function (i, item) {
                        $cat3Input.append('<option value="' + item.c3_id + '">' + item.categories + '</option>');

                        /*console.log(i + ': ' + item.c3_id + ': ' + item.categories);*/
                    });
                    $cat3Input.select2({
                        placeholder: "Please select category"
                    });

                },
                error: function () {
                    console.log("ajax failed");
                },

            });
        }

        var availableTags = [
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
        ];

        $("#tags").autocomplete({
            source: availableTags
        });

        $('input[name="bid_method"]').on('click', function () {
            var selectedMethod = $(this).val();
            var $rangeInputs = $('.range-inputs');
            var $startInputs = $('.start-inputs');
            if (selectedMethod == 'range') {
                $rangeInputs.show();
                $startInputs.hide();
            }
            else if (selectedMethod == 'incremental') {
                $rangeInputs.hide();
                //$startInputs.show();
            }
            else {
                $rangeInputs.hide();
                $startInputs.hide();
            }
        });

        //changing add type
        $('input[name="ad_type"]').on('click', function () {
            var selectedMethod = $(this).val();
            var $basePrice_inputs = $('.basePrice_inputs');
            var $biddingMethod = $('.bp_hide');

            //var $startInputs = $('.start-inputs');
            if (selectedMethod == 'sa') {
                $basePrice_inputs.show();
                $biddingMethod.show();
                //$startInputs.hide();
            }
            else {
                $basePrice_inputs.hide();
                $biddingMethod.hide();
                //$startInputs.hide();
            }
        });
        //end changing post type

        $("#form_step_0").validate({
            rules: {
                category_1: "required",
                category_2: "required",
                category_3: "required",
                title: "required",
                description: "required",
                condition: "required",
                quantity_unit: "required",
                quantity: "required",
                post_currency: "required",
                bidder_type: "required",
                starts_at: "required",
                expires_at: "required",
                minimum: "required",
                maximum: "required",
            },
            /* errorPlacement: function (error, element) {

             if (element.attr("name") == "agreement") {
             error.appendTo('#error_agree');
             return;
             } else {
             error.insertAfter(element);
             }
             },*/
            /* tooltip_options: {
             placement: 'left',
             html: true,
             trigger: 'focus'
             }*/
        });

        $("#form_step_1").validate({
            rules: {
                category_1: "required",
                category_2: "required",
                category_3: "required",
                title: "required",
                description: "required",
                condition: "required",
                bidder_type: "required",
                starts_at: "required",
                expires_at: "required",
                minimum: "required",
                maximum: "required",
            },
            /* errorPlacement: function (error, element) {

             if (element.attr("name") == "agreement") {
             error.appendTo('#error_agree');
             return;
             } else {
             error.insertAfter(element);
             }
             },*/
            /* tooltip_options: {
             placement: 'left',
             html: true,
             trigger: 'focus'
             }*/
        });

        $('#smartwizard').smartWizard({
            selected: 0,
            theme: "arrows",
            keyNavigation: false,
            showStepURLhash: false,
            toolbarSettings: {
                toolbarPosition: 'bottom', // none, top, bottom, both
                toolbarButtonPosition: 'right', // left, right
                showNextButton: false, // show/hide a Next button
                showPreviousButton: false, // show/hide a Previous button

                onFinish: function () {
                    alert("wizard finish");
                },


                toolbarExtraButtons: [
                    $('<button></button>').text('Finish')
                        .addClass('btn btn-secondary sw-btn-finish').css('display', 'none')
                        .on('click', function () {
                            $('#form_step_2').submit();

                        }),
                ]
                /*
                 $('<button></button>').text('Cancel')
                 .addClass('btn btn-danger')
                 .on('click', function(){
                 alert('Cancel button click');
                 })
                 ]*/
            }
        });

        $("#smartwizard").on("leaveStep", function (e, anchorObject, stepNumber, stepDirection) {

            var $form = $("#form_step_" + stepNumber);
            ///alert(stepNumber);

            /*console.log("e");
            console.log(e);
            console.log("anchorObject");
            console.log(anchorObject);
            console.log("LeaveStep = " + stepNumber);*/

            // stepDirection === 'forward' :- this condition allows to do the form validation
            // only on forward navigation, that makes easy navigation on backwards still do the validation when going next


            if (stepDirection === 'forward' && $form) {

                if ((stepNumber + 1) == 1) {
                    getAuctionAttributes();
                    return $form.valid();
                }
                else if ((stepNumber + 1) == 2) {
                    $('.sw-btn-finish').show();
                    $('.sw-btn-group').hide();
                    return true;
                }
                else if ((stepNumber + 1) == 3) {
                    return true;
                }
                else {
                    return false;
                }
            }
            else {
                $('.sw-btn-finish').hide();
                $('.sw-btn-group').show();
                return true;
            }
        });

        $('#smartwizard button').on("click", function (e) {
            //e.preventDefault();
            //$(this).scrollTop();
            //$('html, body').scrollTop(parseInt($('#smartwizard').offset().top)  - 50);
        });

        var filesList = new Array();
        console.log(filesList);
        var url = window.location.hostname === 'blueimp.github.io' ?
            '//jquery-file-upload.appspot.com/' : 'server/php/';
        /**
         *  var uploadButton = $('<button/>')
         .addClass('btn btn-primary')
         .prop('disabled', true)
         .text('Processing...')
         .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });*/

        /*Start: fileupload */
        $(document).on('drop dragover', function (e) {
            e.preventDefault();
        });

        var $postImages = $('#form_step_2');

        $postImages.fileupload({
            autoUpload: false,
            replaceFileInput: false,
            /*acceptFileTypes: /(\.|\/)(gif|jpe?g|png|bmp)$/i,*/
            maxFileSize: 10000000,
            previewMaxWidth: 100,
            previewMaxHeight: 100,
            dropZone: $('#drop_zone'),
            /* formData: {
             example: $('#confirm_comment').val(),
             },*/


        })
            .on("fileuploadprocessalways", function (e, data) {
                console.log("fileuploadprocessalways callback");
                var index = data.index,
                    file = data.files[index],
                    node = $(data.context.children()[index]);
                if (file.preview) {
                    console.log("file.preview");
                    node
                        .prepend('<br>')
                        .prepend(file.preview);
                }
                if (file.error) {
                    console.log("file.error");
                    node
                        .append('<br>')
                        .append($('<span class="text-danger"/>').text(file.error));
                }
                if (index + 1 === data.files.length) {
                    console.log("file.length");
                    data.context.find('button')
                        .text('Upload')
                        .prop('disabled', !!data.files.error);
                }
            })
            .on("fileuploadadd", function (e, data) {
                console.log("fileuploadadd");

                var $fileEl = $('#files');
                var removeBtn = $fileEl.find('a.remove_btn').last();
                var imageIndex = removeBtn.length ? removeBtn.data('index') + 1 : 0;

                data.context = $('<div class="col-md-3 preview">').appendTo('#files');
                $.each(data.files, function (index, file) {

                    var node = $('<div class="thumbnail">')
                        .append(
                            $('<div class="caption">')/*.append(
                                $('<p class="m-none">').text(file.type)
                            )*/
                        );
                    // .append($('<span/>').text(file.name));
                    $(node).find('div.caption').append('<p class="m-none" style="word-wrap: break-word;"><a href="#" ' +
                        'class="btn btn-primary btn-xs btn-full remove_btn" data-index="' + imageIndex + '" role="button">Remove</a> </p>');
                    /*if (!index) {
                        node
                            .append('<br>')
                        /!*.append(uploadButton.clone(true).data(data));*!/
                    }*/
                    node.appendTo(data.context);
                    filesList.push(data.files[index]);
                });


                /*data.submit();*/
            })
            .on("fileuploadprogressall", function (e, data) {
                console.log("progressall callback");
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
            })
            .on("fileuploadsubmit", function (e, data) {
                console.log("fileuploadsubmit callback");

            })
            .on("fileuploaddone", function (result, textStatus) {
                console.log("Done callback Start");
                var serverResponse = textStatus._response.result;
                //console.log(result);
                //console.log(textStatus._response);
                serverResponse = $.parseJSON(serverResponse);
                //console.log(serverResponse);

                if (serverResponse.status) {
                    showstatusMessage("success", serverResponse.title, serverResponse.message);
                    //alert(base_url+'auction/'+serverResponse.slug);
                    //var url = base_url+''+serverResponse.slug+'/auction';
                    //var link = 'https://www.facebook.com/dialog/feed?app_id=2363063897042848&redirect_uri='+url+'&link='+url+'&picture=https://resources.vayzn.com/users/profile_picture/Harmain-Ali-11-1546154719-5c2872df2185e.jpg/500/500&caption=This%20is%20the%20caption&description=This%20is%20the%20description'
                    var link = 'https://www.facebook.com/sharer/sharer.php?u=' + base_url + '' + serverResponse.slug + '/auction';
                    // var fb = "window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(link) + '&t=' + encodeURIComponent(link)); return false;";
                    //$('.fb-share-button').attr('data-href',link);
                    //alert(link);
                    //fbshareCurrentPage(link);
                    $('.fb_share').attr('href', link);
                    $('#share-modal').modal('show');
                    //$('#share-modal').modal({backdrop:'static',keyboard:false, show:true});

                    // alert(link);
                    //$('.sw-btn-finish').prop("disabled", true);
                    //console.log("i m in");
                    //console.log(serverResponse);
                    //setTimeout(function(){ window.location = base_url; }, 5000);
                } else {
                    showstatusMessage("danger", serverResponse.title, serverResponse.message);
                }

                // console.log(serverResponse.csrf.csrf_token);
                resetCSRF(serverResponse.csrf.csrf_token);

                //console.log
                /// var  serverResponse.csrf;

                console.log("Done callback End");
            });

        $postImages.on('click', '.remove_btn', function (e) {
            e.preventDefault();
            var $btn = $(this);
            console.log("filesList:");
            console.log(filesList);
            console.log(filesList.length);
            var $imageIndex = $btn.data('index');
            $btn.closest('.preview').remove();
            filesList.splice($imageIndex, 1);
            if (filesList.length < 1) {
                $('input[name="files[]"]').val('');
            }
            console.log(filesList);
        });

        $postImages.submit(function (event) {
            event.preventDefault();
            console.log($postImages.attr('action'));

            if (filesList.length > 0) {
                console.log("Submit");
                console.log(filesList);
                var formData1 = new FormData($("#form_step_0")[0]);
                var formData2 = new FormData($("#form_step_1")[0]);

                //noinspection JSAnnotator
                for (let pair of formData2.entries()) {
                    // formData2.append(pair[0], pair[1]);
                    console.log("entries2 : ");
                    console.log(pair[0] + " = " + pair[1]);
                }

                console.log("entries start");
                //noinspection JSAnnotator
                for (let pair of formData1.entries()) {
                    formData2.append(pair[0], pair[1]);
                    console.log("entries");
                    console.log(pair[0] + " = " + pair[1]);
                }
                console.log("entries end");


                console.log(formData2);

                $postImages.fileupload({
                    formData: formData2
                });

                $postImages.fileupload('send', {
                    files: filesList,
                })
                /* .complete(function (result, textStatus) {
                     // window.location='back to view-page after submit?'

                     console.log(result);
                     console.log(textStatus._response);
                     console.log(textStatus._response.result);
                     var response = result.responseText;

                     console.log(response.status);
                     console.log(response.code);
                     console.log(result.responseText);
                     /!*console.log(textStatus);
                     console.log(jqXHR);*!/
                 });*/

            } else {
                // plain default submit
                console.log("Else submit");
            }
        });
        /*End: fileupload */

    });

    // function fbshareCurrentPage(link)
    //         {   
    //             window.open("https://www.facebook.com/sharer/sharer.php?u="+link+"&t="+document.title, '', 
    //             'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
    //               return false; 

    //         }
    /*End: Create_v */
</script>
