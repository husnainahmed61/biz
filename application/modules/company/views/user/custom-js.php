<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 11/27/2018
 * Time: 12:44 AM
 */
?>
<script type='text/javascript'>
    <?php echo $this->session->flashdata('message_name');
    //print_r($rrr);
    //exit();
    ?>
</script>
<script type="text/javascript">
 $(document).ready(function () {

    var sort = $('#input-sort-view').val();
    var currency = $('#input-currency-view').val();
    var post_type = $('#input_post_type_view').val();
    console.log(sort);
    console.log(currency);
    console.log(post_type);
     // var currency = [];
    //currency onchange function
    // $(".filter-list li.currency input[type='checkbox']").change(function () {
    //     if (this.checked) {
    //         currency.push($(this).val());
    //         var sort = $("#input-sort option:selected").val();
    //     }
    //     else {
    //         var index = currency.indexOf($(this).val());
    //         currency.splice(index,1);
    //     }
    // });
    $('#input_post_type_view').on('change', function() {
            post_type = this.value;
            ///processForm(allVals,sort,pageNo);
            filterProducts();
        });

    $('#input-currency-view').on('change', function() {
            currency = this.value;
            ///processForm(allVals,sort,pageNo);
            filterProducts();
        });
    // end currency change function
    $('#input-sort-view').on('change', function() {
       sort = this.value;
        ///processForm(allVals,sort,pageNo);
        filterProducts();
    });
    
    var serverResponse;
    //filterProducts();

    function filterProducts (){

        var url = base_url +"alerts/getFilteredProducts/?currency=" + currency + "&sort=" + sort + "&type="+post_type;

        console.log(url);
        $('#pagination').pagination({
            dataSource: url,
            totalNumberLocator: function(response) {
                //console.log(response);
                // you can return totalNumber by analyzing response content
                serverResponse = response;
                //console.log(response);
                return response.totalNumber;
                //return Math.floor(Math.random() * (1000 - 100)) + 100;

            },
            ajax: {
                beforeSend: function () {
                    //dataContainer.html('Loading data from flickr.com ...');
                }
            },

            
            pageSize: 12,
            triggerPagingOnInit: true,
            locator: 'data',
            showPrevious: false,
            showNext: false,
            showNavigator: true,
            formatNavigator: function (currentPage, totalPage, totalNumber) {
                //console.log();
                $('.pagination_details').html("Showing page " + currentPage + " of " + totalPage + " pages (" + totalNumber + " records)");
                $(".total_products").html(totalNumber+' '+'Products Found');

            },

            callback: function (data, pagination) {
                // template method of yourself
                $(".auctions-list").html('');
                //

                $(".auctions-list").html(serverResponse.html);
                /*var html = template(data);
                dataContainer.html(html);*/
            }
        });
    }
    filterProducts();

    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var $alertAddForm = $('#alert_add');
        var $cat3Select = $alertAddForm.find('select[name="category_3"]');
        var $showAttributesDiv = $('#post-attributes');
        var $cat3Input = $("select[name='category_3']");
        var $postAttributes = $('fieldset#post-attributes');
        var sort = $("select[name='sort']").val();
        var post_type = $("select[name='post_type']").val();

        $cat3Select.on('change', function () {
            getAlertAttributes();
        });
        var getAlertAttributes = function () {
            var data = {
                category_3: $cat3Input.val()
            };
            console.log(data);
            $.ajax({
                url: base_url + "auctions/getAlertAttributesForm",
                method: "GET",
                data: data,
                dataType: "JSON",
                success: function (response) {
                    console.log(response.html);
                     // resetCSRF(response.csrf_token);
                    if (response.code == "500") {
                        $showAttributesDiv.empty();
                    }
                    $showAttributesDiv.html(response.html);
                    $('.selectpicker').selectpicker('refresh');
                }
            });
        };

        var $createForm = $("#alert_adda");
        $createForm.on('submit', function (e) {
            e.preventDefault();
            alert("submitted");
            console.log("action = " + $createForm.attr('action'));
            console.log("method = " + $createForm.attr('method'));

            $.ajax({
                url: $createForm.attr('action'),
                type: $createForm.attr('method'),
                data: $createForm.serialize(),
                dataType: 'json',
                success: function (response) {
                    var type = '';
                    var message = response.message;
                    if (response.status){
                        type = 'success';
                    }
                    else {
                        type = 'danger';
                        if (response.hasOwnProperty('error_array')) {
                            message += '<ul class="simple-ul">';
                            response.error_array.forEach(function (el) {
                                message += "<li>" + el + "</li>";
                            });
                            message += '</ul>';
                            console.log(message);
                        }
                    }

                    showstatusMessage(type, response.title, message, 7000);

                    resetCSRF(response.csrf.csrf_token);
                    if (type == 'success') {
                        window.setTimeout(function () {
                            location.assign(base_url + 'thank-you')
                        }, 3000);
                    }
                },
                error: function (response) {
                    showstatusMessage('danger', "Error", "JS Request Failed", 7000);
                    //window.setTimeout(function(){location.reload()},3000);
                    //resetCSRF(response.csrf.csrf_token);
                }
            });
        });

        getCategories3();
        function getCategories3() {

            //var seletedCat2 = $(this).val();
            // $postAttributes.empty();
            $cat3Input.empty();
            $.ajax({
                url: base_url + "category1/getAllCategories",
                method: "GET",
                dataType: "JSON",
                success: function (response) {
                    $cat3Input.empty();
                    $.each(response.data, function (i, item) {
                        $cat3Input.append('<option value="' + item.c3_id + '">' + item.categories + '</option>');

                        /*console.log(i + ': ' + item.c3_id + ': ' + item.categories);*/
                    });
                    $cat3Input.select2({
                        placeholder: "Please select category 1"
                    });

                },
                error: function () {
                    console.log("ajax failed");
                },

            });
        }


        $cat3Input.on('change',function(){
            getAlertAttributes();
        });

        $('#input-sort').on('change', function() {
            sort = this.value;
            console.log(sort);
            ///processForm(allVals,sort,pageNo);
            filterAlerts();
        });
        $('#input_post_type').on('change', function() {
            ///processForm(allVals,sort,pageNo);
            post_type = this.value;
            filterAlerts();
        });

        filterAlerts();
        //sellfilterProducts();

        function filterAlerts (){

            console.log("buyfilterProducts");
            //console.log($("#input-limit").val());

            var url = base_url +"alerts/getFilteredAlerts/?sort="+sort+"&type="+post_type;

            $('#buyPagination').pagination({
                dataSource: url,
                totalNumberLocator: function (response) {
                    // you can return totalNumber by analyzing response content
                    serverResponse = response;
                    console.log(response);
                    return response.totalNumber;
                    //return Math.floor(Math.random() * (1000 - 100)) + 100;
                },
                ajax: {
                    beforeSend: function () {
                        console.log("beforeSend");
                    }
                },

                ulClassName: "pagination",
                pageSize: 5,
                triggerPagingOnInit: true,
                locator: 'data',
                showPrevious: false,
                showNext: false,
                showNavigator: true,
                formatNavigator: function(currentPage, totalPage, totalNumber){
                    console.log("formatNavigator");
                    //$('.buy-pagination-details').html("Showing page "+currentPage+" of "+totalPage+" pages ("+totalNumber+" record(s))");

                },

                callback: function (data, pagination) {
                    // template method of yourself
                    console.log('i am buy');
                    //console.log(serverResponse);
                    if(serverResponse.totalNumber > 0 ){
                        $(".buy-auctions-list").html('');
                        $(".buy-auctions-list").html(serverResponse.html);
                        //$('.buy-pagination-details').closest('.row').show();
                    }
                    else{
                        $(".buy-auctions-list").html('<div class="col-sm-12 text-center pt-xlg"> <h3 class="title">No Alert Found</h3></div>');
                        //$('.buy-pagination-details').closest('.row').hide();
                    }

                    /*var html = template(data);
                    dataContainer.html(html);*/
                }
            });
        }

    });
</script>
<script type="text/javascript">
    //upload & crop image
    $image_crop = $('#image_demo').croppie({
        enableExif : true,
        viewport : {
            width : 200,
            height : 200,
            type : 'square'
        },
        boundary : {
            width : 400,
            height : 400
        }

    });

    $("#upload_image").on('change',function(){
        var reader = new FileReader();

        reader.onload = function(event){
            $("#upload_profile_picture_modal").modal('show');
            rawImg = event.target.result;
        }
        reader.readAsDataURL(this.files[0]);
        
    });

    $('#upload_profile_picture_modal').on('shown.bs.modal', function(){
        // alert('Shown pop');
        $image_crop.croppie('bind',{
            url : rawImg
        }).then(function(){
            console.log("jquery bind complete");
        });
    });

    $('.crop_image').click(function(event){
        $image_crop.croppie('result',{
            type : 'canvas',
            size : 'viewport'
        }).then(function(response){
            console.log('i m uploaded');
            console.log(response);
            $.ajax({
                url : base_url+'profile/uploadProfilePicture',
                type : "POST",
                data : {"image" : response},
                success:function(data){
                    console.log("image uploaded success");
                    console.log(data);
                     showstatusMessage('messageSuccess','SuccessFull', 'Image changed Successfully' , 3000);
                     window.setTimeout(function(){location.reload()},3000);
                }
            });
        })
    });
//end upload and crop image
/*UZair Work Starts*/

        var changePasswordForm = $('#change_password');



        changePasswordForm.submit(function(e){

            e.preventDefault();
            var action = $(this).attr('action');
            var method = $(this).attr('method');
            var data  = $(this).serialize();
            $.ajax({
                url: action,
                method: method,
                data: data,
                dataType: "JSON",
                success: function (response) {
                    var msgType = "danger";
                    if(response.status){
                        msgType = 'messageSuccess';

                    }else{
                        msgType = 'messageError';
                    }
                    showstatusMessage(msgType,response.title, response.message, 7000);
                    if(msgType == 'messageSuccess')
                    {
                        window.setTimeout(function(){location.reload()},3000);
                    }
                },
                error: function( jqXHR, textStatus, errorThrown){
//                    console.log(textStatus);
                    showstatusMessage(msgType,response.title, response.message, 7000);
                }
            });
        });
         $(document).ready(function () {

        var $form = $("#form_step_0");

        $form.submit(function (e) {
            e.preventDefault();
            console.log("action = " + $form.attr('action'));
            console.log("method = " + $form.attr('method'));

            console.log($form.serialize());
            $.ajax({
                url: $form.attr('action'),
                type: $form.attr('method'),
                data: $form.serialize(),
                dataType: 'json',
                success: function (response) {
                    var type = '';
                    var message = response.message;
                    if (response.status){
                        type = 'messageSuccess';
                    }
                    else {
                        type = 'messageError';
                        if (response.hasOwnProperty('error_array')) {
                            message += '<ul class="simple-ul">';
                            response.error_array.forEach(function(el){
                                message += "<li>" + el + "</li>";
                            });
                            message += '</ul>';
                            console.log(message);
                        }
                    }
                    showstatusMessage(type,response.title, message , 7000);
                    setTimeout(function(){ window.location = base_url+'company/basic_settings'; }, 3000);

                    console.log(resetCSRF(response.csrf.csrf_token));

                },
                error: function (response) {
                    showstatusMessage('messageError',"Error", "JS Request Failed", 7000);
                    console.log(resetCSRF(response.csrf.csrf_token));
                }
            });
        });
});
        /*UZair Work End*/
</script>