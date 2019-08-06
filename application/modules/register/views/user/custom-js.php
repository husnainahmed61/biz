<?php
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 26-Apr-18
 * Time: 1:34 AM
 */
?>
<!--CUSTOM-JS -->
<script type="text/javascript">
    $('.agree').on("click", function (e) {

 });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.select2').select2();
       /* $("#form_step_0").validate({
            rules: {
                user_type: "required",
                firstname: "required",
                lastname: "required",
                email: "required",
                phone: "required",
                country_id: "required",
                state_id: "required",
                city_id: "required",
                business_name:"required",
                tax_number: "required",
                registered_address: "required",
                password:{
                    required: true,
                    minlength : 6,
                },
                confirm_password : {
                    required: true,
                    minlength : 6,
                    equalTo : "#input-password"
                },
                agreement: "required",

            },
            errorPlacement: function(error, element) {

                if(element.attr("name") == "agreement"){
                    error.appendTo('#error_agree');
                    return;
                }else {
                    error.insertAfter(element);
                }
            },
            tooltip_options: {
                placement: 'left',
                html: true,
                trigger: 'focus'
            }
        });*/

        /*$("#form_step_0").attr('action')*/
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
                            //message += '<ul class="simple-ul">';
                            response.error_array.forEach(function(el){
                                message += "<p>" + el + "</p>";
                            });
                            //message += '</ul>';
                            console.log(message);
                        }
                    }
                    showstatusMessage(type,response.title, message , 7000);
                    if(type == 'messageSuccess')
                    {
                        window.setTimeout(function(){location.assign(base_url )},4000);
                    }
                    resetCSRF(response.csrf.csrf_token);
                    
                },
                error: function (response) {
                    showstatusMessage('messageError',"Error", "JS Request Failed", 7000);
                    //window.setTimeout(function(){location.reload()},3000);
                    //resetCSRF(response.csrf.csrf_token);
                }
            });
        });



        var customerTypeForm = function (customerType){

            if (customerType === "individual") {
                console.log (customerType);
                $(".business_detail").find(".input-container").hide();
                $(".business_detail").find(".input-container").find('input').attr('disabled',true);
            }
            else if (customerType === "business") {
                console.log (customerType);
                $(".business_detail").find(".input-container").show();
                $(".business_detail").find(".input-container").find('input').attr('disabled',false);
            }
        };

        customerTypeForm($("input[name='user_type']").val());

        $("input[name='user_type']").on("change",function(){
            var customerType = $(this).val();
            customerTypeForm(customerType);
        });

        $("input[name='username']").on("input",function(){
            var username = $(this).val();
            if(username != ''){
                $("a.check_username").show();
                $("span.username_message").empty();
            }
            else{
                $("a.check_username").hide();
            }
        });

        $("input[name='username']").on("focusout",function(){
            checkUsername();
        });

        $("a.check_username").on("click",function(){
            //checkUsername();
        });

        var checkUsername = function (){
            var username = $("input[name='username']").val();
            if(username != ''){
                $.ajax({
                    url: base_url + "register/getUsername",
                    method: "GET",
                    data: {username: username},
                    dataType: "JSON",
                    success: function (response) {

                        var $userMsg = $("span.username_message");
                        var msg = "";
                        if(response.status){
                            msg = response.title+' <i class="fa fa-check"></i>';
                            $userMsg.removeClass("text-danger");
                            $userMsg.addClass("text-success");
                            $userMsg.html(msg);
                        }
                        else{
                            msg = response.title+' <i class="fa fa-times"></i>';
                            $userMsg.removeClass("text-success");
                            $userMsg.addClass("text-danger");
                            $userMsg.html(msg);
                        }
                        $("a.check_username").hide();
                    }
                });
            }
        };




        $('#smartwizard').smartWizard({
            selected: 0,
            theme: "arrows",
            showStepURLhash: false,
            toolbarSettings: {
                toolbarPosition: 'bottom', // none, top, bottom, both
                toolbarButtonPosition: 'right', // left, right
                showNextButton: true, // show/hide a Next button
                showPreviousButton: true, // show/hide a Previous button
                /*toolbarExtraButtons: [
                 $('<button></button>').text('Finish')
                 .addClass('btn btn-info')
                 .on('click', function(){
                 alert('Finsih button click');
                 }),
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

            // stepDirection === 'forward' :- this condition allows to do the form validation
            // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
            console.log("LeaveStep = " + stepNumber);

            if (stepDirection === 'forward' && $form) {
                return $form.valid();
            }
            return false;
        });


        $('#smartwizard button').on("click", function (e) {
            //e.preventDefault();
            //$(this).scrollTop();
            //$('html, body').scrollTop(parseInt($('#smartwizard').offset().top)  - 50);
        });

        //$('.selectpicker').selectpicker();

        var loadCountries = function () {
            var $countryInput = $('select[name="country_id"]');
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
                    
                },

            });
            //console.log($countryInput);
        };
        loadCountries();

        $('select[name="country_id"]').on('change',function(){
            var $stateInput = $('select[name="state_id"]');
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
               }
           });
        });

        $('select[name="state_id"]').on('change',function(){
            var $cityInput = $('select[name="city_id"]');
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
                }
            });

        });

    });




</script>
