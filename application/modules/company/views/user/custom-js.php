<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 11/27/2018
 * Time: 12:44 AM
 */
?>
<script type='text/javascript'>
    var dataURL;
    var dataID;
    $(document).ready(function(){

    $('.openPopup').on('click',function(){
        dataURL = $(this).attr('data-href');
        // alert(dataURL);
        // return;
        
        $('#modal-body').load(dataURL,function(){
            $('#myModal').modal({
                show:true
            });
        });
    });
    $('.specPop').on('click',function(){
        dataID = $(this).attr('data-href');
        //$('.pr_id_dynamic').val(dataID); 
        // alert(dataID);
        // return;
        $('#spec_modal').load(dataID,function(){
            $('#myModalNorm').modal({
                show:true
            });
        });
        
        
    }); 
    $('.emailPop').on('click',function(){
        dataID = $(this).attr('data-href');
        $('.pr_id_dynamic').val(dataID); 
        // alert(dataID);
        // return;
        $('#email_modal').load(dataID,function(){
            $('#emailPop').modal({
                show:true
            });
        });
        
    }); 

    
    
    
  });  
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
        var $itemInput = $("select[name='items_list']");
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
        getItems();
        function getCategories3() {
            var selectedValue = $("#input-category3").attr("selected-value");
            var selectedValueSupplier = $("#input-category3").attr("data-supplier-id");
            // alert(selectedValueSupplier);
            // return;
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
                        placeholder: "Please select category"
                    });
                    if(selectedValue !== null) {
                        $cat3Input.val(selectedValue); // Select the option with a value of '1'
                        $cat3Input.trigger('change');
                    }
                    if(selectedValueSupplier !== null) {
                        $cat3Input.val(selectedValueSupplier); // Select the option with a value of '1'
                        $cat3Input.trigger('change');
                    }
                     // Notify any JS components that the value changed
                    //return;
                    

                },
                error: function () {
                    console.log("ajax failed");
                },

            });
        }
        function getItems() {
            //var selectedValue = $("#input-category3").attr("selected-value");
            //var selectedValueSupplier = $("#input-category3").attr("data-supplier-id");
            // alert(selectedValueSupplier);
            // return;
            //var seletedCat2 = $(this).val();
            // $postAttributes.empty();
            $itemInput.empty();
            $.ajax({
                url: base_url + "company/getAllItems",
                method: "GET",
                dataType: "JSON",
                success: function (response) {
                    $itemInput.empty();
                    $.each(response.data, function (i, item) {
                        $itemInput.append('<option value="' + item.id + '">'+ item.item_number+' - ' + item.item_name.substring(0,45)+'</option>');

                        /*console.log(i + ': ' + item.c3_id + ': ' + item.categories);*/
                    });
                    $itemInput.select2({
                        placeholder: "Please select Item"
                    });

                    // if(selectedValue !== null) {
                    //     $itemInput.val(selectedValue); // Select the option with a value of '1'
                    //     $itemInput.trigger('change');
                    // }
                    
                     // Notify any JS components that the value changed
                    //return;
                    

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
    
 $(document).ready(function() {
    var id ='';
    $('.photo_add').on('change', function() {
        id = $(this).attr("data-id");
        readURL(this);
        //alert(id);
        // return;
        //function_name(id);
        //return;
    });

function readURL(input) {
    //alert(id);
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#image-preview'+id).attr('src', e.target.result);
            $('#image-preview'+id).css("background-image", "url("+e.target.result+")");
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}    
// function_name(id);
// function function_name(id) {

//     if (id === null || id === undefined || id =='') {
//         //alert(id);
//            // $.uploadPreview({
//            //      input_field: ".image-upload",
//            //      preview_box: ".image-preview",
//            //      label_field: ".image-label"
//            //      });  
     
//   }
//   else{
//     alert(" i m  define");
//      $.uploadPreview({
//             input_field: "#image-upload"+id,
//             preview_box: "#image-preview"+id,
//             label_field: "#image-label"+id
//           });
//   }
// }

    
  
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
$(document).ready(function () {
    $('.supplier_list').SumoSelect(
        {
            search: true, 
            searchText: 'Enter here.',
            okCancelInMulti: true, 
            selectAll: true,
            triggerChangeCombined: true,
            forceCustomRendering: true,
            
        });
    $('.follower_div').click(function () {
        //alert();
        // $( ".follower_div" ).prop( "checked", true );
        // $( ".public_div" ).prop( "checked", false );
        $('a.titleee').trigger('click');
        
            //$('#exampleModalCenter').modal('show'); 

       });
    
    $('.email_pop').click(function () {
        //alert();
        // $( ".follower_div" ).prop( "checked", true );
        // $( ".public_div" ).prop( "checked", false );
        
        $('a.email-pop').trigger('click');
        
            //$('#exampleModalCenter').modal('show'); 

       });
    $('.public_div').click(function () {
            $('.supplier_list_div').hide(500);
       });
});
(function($){
        console.log("DOC READY");
        /*-----------------------
            NEW MESSAGE POPUP
        -----------------------*/
        $('#message-pop').magnificPopup({
            type: 'inline',
            removalDelay: 300,
            mainClass: 'mfp-fade',
            closeMarkup: '<div class="close-btn mfp-close"><svg class="svg-plus"><use xlink:href="#svg-plus"></use></svg></div>'
        });
        
    })(jQuery);
    
    (function($){
        console.log("DOC READY");
        /*-----------------------
            NEW MESSAGE POPUP
        -----------------------*/
        $('#email-pop').magnificPopup({
            type: 'inline',
            removalDelay: 300,
            mainClass: 'mfp-fade',
            closeMarkup: '<div class="close-btn mfp-close"><svg class="svg-plus"><use xlink:href="#svg-plus"></use></svg></div>'
        });
    })(jQuery);
</script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
 $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });


 var loadCountries = function () {

            var $countryInput = $('select[name="country_id"]');
            var country = $countryInput.attr("country-id");

            // alert(country);
            // return;
            $.ajax({
                url: base_url + "register/getCountries",
                method: "GET",
                /*data: {csrf_token: getCSRF()},*/
                dataType: "JSON",
                success: function (response) {
                    //console.log(response);
                    //resetCSRF(response.csrf_token);
                    $.each(response.countries,function(i, item){
                        $countryInput.append('<option value="'+item.id+'">'+item.name+ '</option>');

                       // console.log (i+ ': '+item.id+ ': '+item.name);
                    });
                    $countryInput.select2({
                        placeholder: "Select a Country",
                        allowClear: true
                    });
                    if(country !== null) {
                        $countryInput.val(country); // Select the option with a value of '1'
                        $countryInput.trigger('change');
                    }
                    
                },

            });
            //console.log($countryInput);
        };
        loadCountries();

        $('select[name="country_id"]').on('change',function(){
            var $stateInput = $('select[name="state_id"]');
            var state = $stateInput.attr("state-id");

            var seletedCountry = $(this).val();
           $.ajax({
               url: base_url + "register/getStates/"+seletedCountry,
               method: "GET",
               /*data: {csrf_token: getCSRF()},*/
               dataType: "JSON",
               success: function (response) {
                   console.log(response);
                   $stateInput.empty();
                   /*resetCSRF(response.csrf_token);*/
                   $.each(response.states,function(i, item){
                       $stateInput.append('<option value="'+item.id+'">'+item.name+ '</option>');

                       //console.log (i+ ': '+item.id+ ': '+item.name);
                   });
                   $stateInput.select2();
                   if(state !== null) {
                        $stateInput.val(state); // Select the option with a value of '1'
                        $stateInput.trigger('change');
                    }
               }
           });
        });

        $('select[name="state_id"]').on('change',function(){
            var $cityInput = $('select[name="city_id"]');
            var city = $cityInput.attr("city-id");
            var seletedstate = $(this).val();
            $.ajax({
                url: base_url + "register/getCities/"+seletedstate,
                method: "GET",
                /*data: {csrf_token: getCSRF()},*/
                dataType: "JSON",
                success: function (response) {
                    console.log(response);
                    $cityInput.empty();
                    /*resetCSRF(response.csrf_token);*/
                    $.each(response.cities,function(i, item){
                        $cityInput.append('<option value="'+item.id+'">'+item.name+ '</option>');

                       // console.log (i+ ': '+item.id+ ': '+item.name);
                    });
                    $cityInput.select2();
                    if(city !== null) {
                        $cityInput.val(city); // Select the option with a value of '1'
                        $cityInput.trigger('change');
                    }
                }
            });

        });
</script>
<script type="text/javascript">
    //adding form values
    $( "#tax_form" ).submit(function( event ) {
      event.preventDefault();
      //alert( "Handler for .submit() called." );
            // Get form
            var $loginForm = $("#tax_form");

            data = $loginForm.serialize();
                 
            $.ajax({
                url: $("#tax_form").attr('action'),
                type: "POST",
                data: data,
                dataType: 'json',
                timeout: 600000,
                success: function (response) {
                    // console.log(response);
                    // return;
                    var type = '';
                    var message = response.message;
                    if (response.status) {
                        
                        showstatusMessage('messageSuccess',response.title, message , 4000);
                            setTimeout(function () {
                                window.location.href = base_url +"company/tax_Settings";
                            },1500);
                    } else if (response.status === false) {
                        showstatusMessage('messageError', response.title, message, 3000);
                        setTimeout(function () {
                                window.location.href = base_url +"company/add_tax";
                            },1500);
                    }
                }
            });
    });
    $(document).ready(function() {
        $(".deleteTax").click(function() {
            var id = $(this).attr("data-id");
           
            $.ajax({
                url: base_url+'company/delete_tax/?tax='+id,
                type: "GET",
                dataType: 'json',
                timeout: 600000,
                success: function (response) {
                    // console.log(response);
                    // return;
                    var type = '';
                    var message = response.message;
                    if (response.status) {
                        
                        showstatusMessage('messageSuccess',response.title, message , 4000);
                            setTimeout(function () {
                                window.location.href = base_url +"company/tax_Settings";
                            },1500);
                    } else if (response.status === false) {
                        showstatusMessage('messageError', response.title, message, 3000);
                        setTimeout(function () {
                                window.location.href = base_url +"company/tax_Settings";
                            },1500);
                    }
                }
            });
        });

    });
    $( "#addUser_form" ).submit(function( event ) {
      event.preventDefault();
      //alert( "Handler for .submit() called." );
            // Get form
            var $userForm = $("#addUser_form");

            data = $userForm.serialize();
            // console.log(data);
            // return;     
            $.ajax({
                url: $("#addUser_form").attr('action'),
                type: "POST",
                data: data,
                dataType: 'json',
                timeout: 600000,
                success: function (response) {
                    // console.log(response);
                    // return;
                    var type = '';
                    var message = response.message;
                    if (response.status) {
                        
                        showstatusMessage('messageSuccess',response.title, message , 4000);
                            setTimeout(function () {
                                window.location.href = base_url +"company/user_managment";
                            },1500);
                    } else if (response.status === false) {
                        showstatusMessage('messageError', response.title, message, 3000);
                        setTimeout(function () {
                                window.location.href = base_url +"company/add_user";
                            },1500);
                    }
                }
            });
    });
    $( "#updateUser_form" ).submit(function( event ) {
      event.preventDefault();
      //alert( "Handler for .submit() called." );
            // Get form
            var $userForm = $("#updateUser_form");

            data = $userForm.serialize();
            // console.log(data);
            // return;     
            $.ajax({
                url: $("#updateUser_form").attr('action'),
                type: "POST",
                data: data,
                dataType: 'json',
                timeout: 600000,
                success: function (response) {
                    // console.log(response);
                    // return;
                    var type = '';
                    var message = response.message;
                    if (response.status) {
                        
                        showstatusMessage('messageSuccess',response.title, message , 4000);
                            setTimeout(function () {
                                window.location.href = base_url +"company/user_settings";
                            },1500);
                    } else if (response.status === false) {
                        showstatusMessage('messageError', response.title, message, 3000);
                        setTimeout(function () {
                                window.location.href = base_url +"company/user_settings";
                            },1500);
                    }
                }
            });
    });
    $(".updateUserRole").click(function() {
            var id = $(this).attr("data-id");
            var user_id = $(this).attr("data-user-id");
           var roles_selected = [];
            $.each($("input[name='role_"+id+"']:checked"), function(){            
                roles_selected.push($(this).val());
            });
            $.ajax({
                url: base_url+'company/updateUserRole/?user_id='+user_id+'&roles='+roles_selected,
                type: "GET",
                dataType: 'json',
                timeout: 600000,
                success: function (response) {
                    var type = '';
                    var message = response.message;
                    if (response.status) {
                        
                        showstatusMessage('messageSuccess',response.title, message , 4000);
                            setTimeout(function () {
                                window.location.href = base_url +"company/user_managment";
                            },1500);
                    } else if (response.status === false) {
                        showstatusMessage('messageError', response.title, message, 3000);
                        setTimeout(function () {
                                window.location.href = base_url +"company/user_managment";
                            },1500);
                    }
                }
            });
        });
    $(".deleteUser").click(function() {
            var id = $(this).attr("data-id");
            var user_id = $(this).attr("data-user-id");
            bootbox.confirm({
                message: "Are you sure , to delete this user?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result === true) {
                        console.log('This was logged in the callback: ' + result);
                        $.ajax({
                        url: base_url+'company/deleteUser/?user_id='+user_id,
                        type: "GET",
                        dataType: 'json',
                        timeout: 600000,
                        success: function (response) {
                            var type = '';
                            var message = response.message;
                            if (response.status) {
                                
                                showstatusMessage('messageSuccess',response.title, message , 4000);
                                    setTimeout(function () {
                                        window.location.href = base_url +"company/user_managment";
                                    },1500);
                            } else if (response.status === false) {
                                showstatusMessage('messageError', response.title, message, 3000);
                                setTimeout(function () {
                                        window.location.href = base_url +"company/user_managment";
                                    },1500);
                            }
                        }
                    });

                    }
                    else{
                        console.log('This was logged in the callback: ' + result);
                    }
                    
                }
            });
           // alert(user_id);
           // return;
    });
    $( "#warehouse_form" ).submit(function( event ) {
      event.preventDefault();
      //alert( "Handler for .submit() called." );
            // Get form
            var $loginForm = $("#warehouse_form");

            data = $loginForm.serialize();
                 
            $.ajax({
                url: $("#warehouse_form").attr('action'),
                type: "POST",
                data: data,
                dataType: 'json',
                timeout: 600000,
                success: function (response) {
                    // console.log(response);
                    // return;
                    var type = '';
                    var message = response.message;
                    if (response.status) {
                        
                        showstatusMessage('messageSuccess',response.title, message , 4000);
                            setTimeout(function () {
                                window.location.href = base_url +"company/location_managment";
                            },1500);
                    } else if (response.status === false) {
                        showstatusMessage('messageError', response.title, message, 3000);
                        setTimeout(function () {
                                window.location.href = base_url +"company/add_warehouse";
                            },1500);
                    }
                }
            });
    });
    $(".deleteLocation").click(function() {
            var id = $(this).attr("data-id");
            //var user_id = $(this).attr("data-user-id");
            bootbox.confirm({
                message: "Are you sure , to delete this Location?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result === true) {
                        console.log('This was logged in the callback: ' + result);
                        $.ajax({
                        url: base_url+'company/deleteLocation/?location_id='+id,
                        type: "GET",
                        dataType: 'json',
                        timeout: 600000,
                        success: function (response) {
                            var type = '';
                            var message = response.message;
                            if (response.status) {
                                
                                showstatusMessage('messageSuccess',response.title, message , 4000);
                                    setTimeout(function () {
                                        window.location.href = base_url +"company/location_managment";
                                    },1500);
                            } else if (response.status === false) {
                                showstatusMessage('messageError', response.title, message, 3000);
                                setTimeout(function () {
                                        window.location.href = base_url +"company/location_managment";
                                    },1500);
                            }
                        }
                    });

                    }
                    else{
                        console.log('This was logged in the callback: ' + result);
                    }
                    
                }
            });
           // alert(user_id);
           // return;
    });
    $( "#item_form" ).submit(function( event ) {
      event.preventDefault();
      //alert( "Handler for .submit() called." );
            // Get form
            var $loginForm = $("#item_form");

            data = $loginForm.serialize();
            // console.log(data);
            // return;
                 
            $.ajax({
                url: $("#item_form").attr('action'),
                type: "POST",
                data: data,
                dataType: 'json',
                timeout: 600000,
                success: function (response) {
                    // console.log(response);
                    // return;
                    var type = '';
                    var message = response.message;
                    if (response.status) {
                        
                        showstatusMessage('messageSuccess',response.title, message , 4000);
                            setTimeout(function () {
                                window.location.href = base_url +"company/inventory_list";
                            },1500);
                    } else if (response.status === false) {
                        showstatusMessage('messageError', response.title, message, 3000);
                        setTimeout(function () {
                                window.location.href = base_url +"company/add_inventory";
                            },1500);
                    }
                }
            });
    });
    $(".deleteItem").click(function() {
            var id = $(this).attr("data-id");
            //var user_id = $(this).attr("data-user-id");
            bootbox.confirm({
                message: "Are you sure , to delete this Item?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result === true) {
                        console.log('This was logged in the callback: ' + result);
                        $.ajax({
                        url: base_url+'company/deleteItem/?item_id='+id,
                        type: "GET",
                        dataType: 'json',
                        timeout: 600000,
                        success: function (response) {
                            var type = '';
                            var message = response.message;
                            if (response.status) {
                                
                                showstatusMessage('messageSuccess',response.title, message , 4000);
                                    setTimeout(function () {
                                        window.location.href = base_url +"company/inventory_list";
                                    },1500);
                            } else if (response.status === false) {
                                showstatusMessage('messageError', response.title, message, 3000);
                                setTimeout(function () {
                                        window.location.href = base_url +"company/inventory_list";
                                    },1500);
                            }
                        }
                    });

                    }
                    else{
                        console.log('This was logged in the callback: ' + result);
                    }
                    
                }
            });
           // alert(user_id);
           // return;
    });
    $( "#supplier_form" ).submit(function( event ) {
      event.preventDefault();
      //alert( "Handler for .submit() called." );
            // Get form
            var $loginForm = $("#supplier_form");

            data = $loginForm.serialize();
            // console.log(data);
            // return;
                 
            $.ajax({
                url: $("#supplier_form").attr('action'),
                type: "POST",
                data: data,
                dataType: 'json',
                timeout: 600000,
                success: function (response) {
                    // console.log(response);
                    // return;
                    var type = '';
                    var message = response.message;
                    if (response.status) {
                        showstatusMessage('messageSuccess',response.title, message , 4000);
                            setTimeout(function () {
                                window.location.href = base_url +"company/supplier_list";
                            },1500);
                    } else if (response.status === false) {
                        showstatusMessage('messageError', response.title, message, 3000);
                        setTimeout(function () {
                                window.location.href = base_url +"company/add_supplier";
                            },1500);
                    }
                }
            });
    });
    $(".deleteSupplier").click(function() {
            var id = $(this).attr("data-id");
            //var user_id = $(this).attr("data-user-id");
            bootbox.confirm({
                message: "Are you sure , to delete this Supplier?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result === true) {
                        console.log('This was logged in the callback: ' + result);
                        $.ajax({
                        url: base_url+'company/deleteSupplier/?supplier_id='+id,
                        type: "GET",
                        dataType: 'json',
                        timeout: 600000,
                        success: function (response) {
                            var type = '';
                            var message = response.message;
                            if (response.status) {
                                
                                showstatusMessage('messageSuccess',response.title, message , 4000);
                                    setTimeout(function () {
                                        window.location.href = base_url +"company/inventory_list";
                                    },1500);
                            } else if (response.status === false) {
                                showstatusMessage('messageError', response.title, message, 3000);
                                setTimeout(function () {
                                        window.location.href = base_url +"company/inventory_list";
                                    },1500);
                            }
                        }
                    });

                    }
                    else{
                        console.log('This was logged in the callback: ' + result);
                    }
                    
                }
            });
           // alert(user_id);
           // return;
    });
    $( "#pr_form" ).submit(function( event ) {
      event.preventDefault();
      //alert( "Handler for .submit() called." );
            // Get form
            var $loginForm = $("#pr_form");

            data = $loginForm.serialize();
                 
            $.ajax({
                url: $("#pr_form").attr('action'),
                type: "POST",
                data: data,
                dataType: 'json',
                timeout: 600000,
                success: function (response) {
                    // console.log(response);
                    // return;
                    var type = '';
                    var message = response.message;
                    if (response.status) {
                        
                        showstatusMessage('messageSuccess',response.title, message , 4000);
                            setTimeout(function () {
                                window.location.href = base_url +"company/pr_list";
                            },1500);
                    } else if (response.status === false) {
                        showstatusMessage('messageError', response.title, message, 3000);
                        setTimeout(function () {
                                window.location.href = base_url +"company/create_pr";
                            },1500);
                    }
                }
            });
    });
//approve all pr
$(".approveAllPr").click(function() {
    bootbox.confirm({
                message: "Are you sure , to Approve All PR?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result === true) {
                         $.each($("input[name='prs']:checked"), function(){
                            var id = $(this).val();
                            //var user_id = $(this).attr("data-user-id");
                           var qty = $(".Quantity_"+id+"").val();
                           var qty_unit = $(".qty_unit_"+id+"").find(":selected").val();
                           var condition = $(".condition_"+id+"").find(":selected").val();
                           $.ajax({
                                url: base_url+'company/updatePrStatus/?pr_id='+id+'&qty='+qty+'&qty_unit='+qty_unit+'&condition='+condition,
                                type: "GET",
                                dataType: 'json',
                                timeout: 600000,
                                success: function (response) {
                                    var type = '';
                                    var message = response.message;
                                    if (response.status) {
                                        
                                        showstatusMessage('messageSuccess',response.title, message , 4000);
                                            // setTimeout(function () {
                                            //     window.location.href = base_url +"company/pr_list";
                                            // },1500);
                                    } else if (response.status === false) {
                                        showstatusMessage('messageError', response.title, message, 3000);
                                        // setTimeout(function () {
                                        //         window.location.href = base_url +"company/pr_list";
                                        //     },1500);
                                    }
                                }
                            });
                        });
                         setTimeout(function () {
                            window.location.href = base_url +"company/pr_list";
                        },1500);
                    }
                    else{
                        console.log('This was logged in the callback: ' + result);
                    }
                    
                }
            });
});    
//approve - disapprove pr
    $(".approvePr").click(function() {
            var id = $(this).attr("data-id");
            //var user_id = $(this).attr("data-user-id");
           var qty = $(".Quantity_"+id+"").val();
           var qty_unit = $(".qty_unit_"+id+"").find(":selected").val();
           var condition = $(".condition_"+id+"").find(":selected").val();
           // alert(condition);
           // return;
           bootbox.confirm({
                message: "Are you sure , to Approve this PR?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result === true) {
                        $.ajax({
                            url: base_url+'company/updatePrStatus/?pr_id='+id+'&qty='+qty+'&qty_unit='+qty_unit+'&condition='+condition,
                            type: "GET",
                            dataType: 'json',
                            timeout: 600000,
                            success: function (response) {
                                var type = '';
                                var message = response.message;
                                if (response.status) {
                                    
                                    showstatusMessage('messageSuccess',response.title, message , 4000);
                                        setTimeout(function () {
                                            window.location.href = base_url +"company/pr_list";
                                        },1500);
                                } else if (response.status === false) {
                                    showstatusMessage('messageError', response.title, message, 3000);
                                    setTimeout(function () {
                                            window.location.href = base_url +"company/pr_list";
                                        },1500);
                                }
                            }
                        });
                                        }
                    else{
                        console.log('This was logged in the callback: ' + result);
                    }
                    
                }
            });
        });
    $(".disApprovePr").click(function() {
            var id = $(this).attr("data-id");
            //var user_id = $(this).attr("data-user-id");
           // var qty = $(".Quantity_"+id+"").val();
           // var qty_unit = $(".qty_unit_"+id+"").find(":selected").val();
           // var condition = $(".condition_"+id+"").find(":selected").val()
           // alert(id);
           // return;
           bootbox.confirm({
                message: "Are you sure , to DisApprove this PR?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result === true) {
                        $.ajax({
                            url: base_url+'company/updatePrStatusdisApprovePr/?pr_id='+id,
                            type: "GET",
                            dataType: 'json',
                            timeout: 600000,
                            success: function (response) {
                                var type = '';
                                var message = response.message;
                                if (response.status) {
                                    
                                    showstatusMessage('messageSuccess',response.title, message , 4000);
                                        setTimeout(function () {
                                            window.location.href = base_url +"company/pr_list";
                                        },1500);
                                } else if (response.status === false) {
                                    showstatusMessage('messageError', response.title, message, 3000);
                                    setTimeout(function () {
                                            window.location.href = base_url +"company/pr_list";
                                        },1500);
                                }
                            }
                        });
                                        }
                    else{
                        console.log('This was logged in the callback: ' + result);
                    }
                    
                }
            });
            
        });
//end
//approve all rfq
$(".approveAllrfq").click(function() {
    bootbox.confirm({
                message: "Are you sure , to Approve All RFQ?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result === true) {
                     $.each($("input[name='rfqs']:checked"), function(){
                        var id = $(this).val();
                        // $( "#rfq_form_"+id ).submit(function( event ) {
                        //   event.preventDefault();
                          //alert( "Handler for .submit() called." );
                                // Get form+
                                var form = $("#rfq_form_"+id)[0];
                                var data = new FormData(form);
                                var $loginForm = $("#rfq_form_"+id);

                                //data = $loginForm.serialize();
                                     
                                $.ajax({
                                    url: $("#rfq_form_"+id).attr('action'),
                                    type: "POST",
                                    data: data,
                                    dataType: 'json',
                                    timeout: 600000,
                                    enctype: 'multipart/form-data',
                                    processData: false,  // Important!
                                    contentType: false,
                                    cache: false,
                                    success: function (response) {
                                         console.log(response);
                                        // return;
                                        var type = '';
                                        var message = response.message;
                                        if (response.status) {
                                            
                                            showstatusMessage('messageSuccess',response.title, message , 4000);
                                                // setTimeout(function () {
                                                //     window.location.href = base_url +"company/rfq_list";
                                                // },1500);
                                        } else if (response.status === false) {
                                            showstatusMessage('messageError', response.title, message, 3000);
                                            // setTimeout(function () {
                                            //         window.location.href = base_url +"company/rfq_list";
                                            //     },1500);
                                        }
                                    }
                                });
                            //});
                        });
                     setTimeout(function () {
                        window.location.href = base_url +"company/rfq_list";
                    },1500);
                    }
                    else{
                        console.log('This was logged in the callback: ' + result);
                    }
                    
                }
            });
   
});
//end approve all rfq  
//rffq submit
$(".submitRFQ").click(function() {
    var id = $(this).attr("data-id");
    bootbox.confirm({
                message: "Are you sure , to Submit RFQ?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result === true) {
                        //alert(id);
                        //$( "#rfq_form_"+id ).submit(function( event ) {
                          //event.preventDefault();
                          //alert( "Handler for .submit() called." );
                                // Get form+
                                var form = $("#rfq_form_"+id)[0];

                                var data = new FormData(form);
                                var $loginForm = $("#rfq_form_"+id);


                                //data = $loginForm.serialize();
                                     
                                $.ajax({
                                    url: $("#rfq_form_"+id).attr('action'),
                                    type: "POST",
                                    data: data,
                                    dataType: 'json',
                                    timeout: 600000,
                                    enctype: 'multipart/form-data',
                                    processData: false,  // Important!
                                    contentType: false,
                                    cache: false,
                                    success: function (response) {
                                        // console.log(response);
                                        // return;
                                        var type = '';
                                        var message = response.message;
                                        if (response.status) {
                                            
                                            showstatusMessage('messageSuccess',response.title, message , 4000);
                                                setTimeout(function () {
                                                    window.location.href = base_url +"company/rfq_list";
                                                },1500);
                                        } else if (response.status === false) {
                                            showstatusMessage('messageError', response.title, message, 3000);
                                            setTimeout(function () {
                                                    window.location.href = base_url +"company/rfq_list";
                                                },1500);
                                        }
                                    }
                                });
                        //});
                                        }
                    else{
                        console.log('This was logged in the callback: ' + result);
                    }
                    
                }
            });
    
});
$(".disaproveRFQ").click(function() {
            var id = $(this).attr("data-id");
            //var user_id = $(this).attr("data-user-id");
           // var qty = $(".Quantity_"+id+"").val();
           // var qty_unit = $(".qty_unit_"+id+"").find(":selected").val();
           // var condition = $(".condition_"+id+"").find(":selected").val()
           // alert(id);
           // return;
           bootbox.confirm({
                message: "Are you sure , to DisApprove RFQ?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result === true) {
                        $.ajax({
                            url: base_url+'company/disaproveRFQ/?pr_id='+id,
                            type: "GET",
                            dataType: 'json',
                            timeout: 600000,
                            success: function (response) {
                                var type = '';
                                var message = response.message;
                                if (response.status) {
                                    
                                    showstatusMessage('messageSuccess',response.title, message , 4000);
                                        setTimeout(function () {
                                            window.location.href = base_url +"company/rfq_list";
                                        },1500);
                                } else if (response.status === false) {
                                    showstatusMessage('messageError', response.title, message, 3000);
                                    setTimeout(function () {
                                            window.location.href = base_url +"company/rfq_list";
                                        },1500);
                                }
                            }
                        });
                    }
                    else{
                        console.log('This was logged in the callback: ' + result);
                    }
                    
                }
            });
            
        });
//approve all po
$(".approveAllpo").click(function() {
    bootbox.confirm({
        message: "Are you sure , to Approve All PO?",
        buttons: {
            confirm: {
                label: 'Yes',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result === true) {
               $.each($("input[name='pos']:checked"), function(){
                   var id = $(this).val();
                   var supplier_id = $(".supplier_id_"+id+"").val();
                   var warehouse_id = $(".warehouse_"+id+"").find(":selected").val();
                   var tax_id = $(".tax_"+id+"").find(":selected").val();
                   var date = $(".d_date_"+id+"").val();
                   var shipment = $(".Shipment_"+id+"").val();

                   $.ajax({
                        url: base_url+'company/approvePO/?rfq_id='+id+'&supplier_id='+supplier_id+'&warehouse_id='+warehouse_id+'&tax_id='+tax_id+'&date='+date+'&shipment='+shipment,
                        type: "GET",
                        dataType: 'json',
                        timeout: 600000,
                        success: function (response) {
                            var type = '';
                            var message = response.message;
                            if (response.status) {                        
                                showstatusMessage('messageSuccess',response.title, message , 4000);
                                    // setTimeout(function () {
                                    //     window.location.href = base_url +"company/po_list";
                                    // },1500);
                            } else if (response.status === false) {
                                showstatusMessage('messageError', response.title, message, 3000);
                                // setTimeout(function () {
                                //         window.location.href = base_url +"company/po_list";
                                //     },1500);
                            }
                        }
                    });
                });
               setTimeout(function () {
                    window.location.href = base_url +"company/po_list";
                },1500);
            }
            else{
                console.log('This was logged in the callback: ' + result);
            }
            
        }
    });
});            

//end approva all po
//approve po
$(".approvePO").click(function() {
            var id = $(this).attr("data-id");
            
            //var user_id = $(this).attr("data-user-id");
           var supplier_id = $(".supplier_id_"+id+"").val();
           var warehouse_id = $(".warehouse_"+id+"").find(":selected").val();
           var tax_id = $(".tax_"+id+"").find(":selected").val();
           var date = $(".d_date_"+id+"").val();
           var shipment = $(".Shipment_"+id+"").val();
           // alert("supplier "+supplier_id);
           // alert("warehouse_id "+warehouse_id);
           // alert("date "+date);
           // alert("shipment "+shipment);
           // return;
           bootbox.confirm({
                message: "Are you sure , to Approve PO?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result === true) {
                        $.ajax({
                        url: base_url+'company/approvePO/?rfq_id='+id+'&supplier_id='+supplier_id+'&warehouse_id='+warehouse_id+'&tax_id='+tax_id+'&date='+date+'&shipment='+shipment,
                        type: "GET",
                        dataType: 'json',
                        timeout: 600000,
                        success: function (response) {
                            var type = '';
                            var message = response.message;
                            if (response.status) {                        
                                showstatusMessage('messageSuccess',response.title, message , 4000);
                                    setTimeout(function () {
                                        window.location.href = base_url +"company/po_list";
                                    },1500);
                            } else if (response.status === false) {
                                showstatusMessage('messageError', response.title, message, 3000);
                                setTimeout(function () {
                                        window.location.href = base_url +"company/po_list";
                                    },1500);
                            }
                        }
                    });
                    }
                    else{
                        console.log('This was logged in the callback: ' + result);
                    }
                    
                }
            });
            
        });
$(".disapprovePO").click(function() {
            var id = $(this).attr("data-id");
            
            //var user_id = $(this).attr("data-user-id");
           var supplier_id = $(".supplier_id_"+id+"").val();
           var warehouse_id = $(".warehouse_"+id+"").find(":selected").val();
           var date = $(".d_date_"+id+"").val();
           var shipment = $(".Shipment_"+id+"").val();
           // alert("supplier "+supplier_id);
           // alert("warehouse_id "+warehouse_id);
           // alert("date "+date);
           // alert("shipment "+shipment);
           // return;
           bootbox.confirm({
                message: "Are you sure , to DisApprove PO?",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result === true) {
                        $.ajax({
                        url: base_url+'company/disapprovePO/?rfq_id='+id+'&supplier_id='+supplier_id+'&warehouse_id='+warehouse_id+'&date='+date+'&shipment='+shipment,
                        type: "GET",
                        dataType: 'json',
                        timeout: 600000,
                        success: function (response) {
                            var type = '';
                            var message = response.message;
                            if (response.status) {                        
                                showstatusMessage('messageSuccess',response.title, message , 4000);
                                    setTimeout(function () {
                                        window.location.href = base_url +"company/po_list";
                                    },1500);
                            } else if (response.status === false) {
                                showstatusMessage('messageError', response.title, message, 3000);
                                setTimeout(function () {
                                        window.location.href = base_url +"company/po_list";
                                    },1500);
                            }
                        }
                    });
                    }
                    else{
                        console.log('This was logged in the callback: ' + result);
                    }
                    
                }
            });
            
        });

</script>
<script type="text/javascript">
 $('#importItems').change(function(){

        event.preventDefault();
        //alert( "Handler for .submit() called." );
        // Get form+
        var form = $("#importItem")[0];

        var data = new FormData(form);
        var $loginForm = $("#importItem");


        //data = $loginForm.serialize();
             
        $.ajax({
            url: $("#importItem").attr('action'),
            type: "POST",
            data: data,
            dataType: 'json',
            timeout: 600000,
            enctype: 'multipart/form-data',
            processData: false,  // Important!
            contentType: false,
            cache: false,
            success: function (response) {
                // console.log(response);
                // return;
                var type = '';
                var message = response.message;
                if (response.status) {
                    
                    showstatusMessage('messageSuccess',response.title, message , 4000);
                        setTimeout(function () {
                            window.location.href = base_url +"company/inventory_list";
                        },1500);
                } else if (response.status === false) {
                    showstatusMessage('messageError', response.title, message, 3000);
                    setTimeout(function () {
                            window.location.href = base_url +"company/inventory_list";
                        },1500);
                }
            }
        });
 }); 
  $('#importPR').change(function(){

        event.preventDefault();
        //alert( "Handler for .submit() called." );
        // Get form+
        var form = $("#importpr")[0];

        var data = new FormData(form);
        var $loginForm = $("#importpr");


        //data = $loginForm.serialize();
             
        $.ajax({
            url: $("#importpr").attr('action'),
            type: "POST",
            data: data,
            dataType: 'json',
            timeout: 600000,
            enctype: 'multipart/form-data',
            processData: false,  // Important!
            contentType: false,
            cache: false,
            success: function (response) {
                // console.log(response);
                // return;
                var type = '';
                var message = response.message;
                if (response.status) {
                    
                    showstatusMessage('messageSuccess',response.title, message , 4000);
                        setTimeout(function () {
                            window.location.href = base_url +"company/pr_list";
                        },1500);
                } else if (response.status === false) {
                    showstatusMessage('messageError', response.title, message, 3000);
                    setTimeout(function () {
                            window.location.href = base_url +"company/pr_list";
                        },1500);
                }
            }
        });
 });   
</script>
 
<script>
$(document).ready(function(){
  $("#prSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    console.log(value);
    $("#prSerachDiv .purchase-item").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  $("#rfqSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    console.log(value);
    $("#rfqSerachDiv .purchase-item").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  $("#poSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    console.log(value);
    $("#poSerachDiv .purchase-item").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>