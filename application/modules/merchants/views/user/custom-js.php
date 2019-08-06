<?php
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 12-May-18
 * Time: 12:09 PM
 */
?>
     <script>
        // alert();
            // var websocket;
            // var messages;

            // $(function() {
            //     messages = $('#messages');

            //     websocket = new WebSocket("ws://localhost:8080");

            //     websocket.onmessage = function(ev) {
            //         var data = JSON.parse(ev.data);

            //         messages.append("<p>[" + data.nickname + "] " + data.message + "</p>");
            //     };

            //     function sendMessage(ev) {
            //         var nickname = $('#fld-nickname').val();
            //         var message  = $('#fld-message').val();

            //         websocket.send(JSON.stringify({
            //             nickname: nickname,
            //             message:  message
            //         }));

            //         ev.preventDefault();

            //         return false;
            //     }

            //     $('#frm-send').on('submit', sendMessage);
            // });
        </script>
    <script>
        
        $(function () {
            $('#fileupload').fileupload({
                dataType: 'json',
                done: function (e, data) {
                console.log(data.result.fileName);
                $("#reply_button").attr("message_type","attach");
$('input[name=message_box]').val(data.result.fileName);
                    
                }
            });
        });
</script>
        <script type="text/javascript">

            function get_messages(convo_id) {
            //alert(auction_id);
                $.ajax({
                url: base_url + "profile/getMessagesByConvoId/?convo_id="+convo_id,
                type: 'get',
                data: '',
                dataType:"JSON",
                success: function (data) {
                 
                    //console.log(data.html);
                    $('.info_messages').empty();
                    $('.info_messages').html(data.html);
                    $( ".info_messages" ).addClass( "convo_id_"+convo_id );
                    //$('input[name=message_box]').removeAttr("readonly");
                    //$('input[name=message_box]').attr("autofocus","true");
                    $("#reply_button").attr("convo_id",convo_id);
                    //$("#check_messages").attr("convo_id",convo_id);
                    //$("#send_button").attr("reciever_id",convo_id);
                    //$('#response').html('<h2>here will be the template</h2>');

                },
                error: function (jqXhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });


            }
    $(document).ready(function() 
    {
        /*var websocket;
        websocket = new WebSocket("ws://localhost:8080");

            websocket.onopen = function(ev) { // connection is open 
            //$('#headline').append("<div class=\"system_msg\">Connected!</div>");
            console.log("web socket connected"); //notify user
            }*/

            $("#reply_button").click(function () {
            // alert("button");
            // return;
            var w;
            var convo_id = $("#reply_button").attr("convo_id");
            var message_box = $('input[name=message_box]').val();
            var message = '';
            var attachment = $("#reply_button").attr("message_type");
            if (message_box === '') {
                alert("You Can't Send Empty Message !");
                return;
            }
            if (convo_id === '') {
                alert("Please select a coversation to reply");
                return;
            }

            message_box = JSON.stringify(message_box);

                $.ajax({
                    url: base_url + "profile/insertMessagebyConvo/?convo_id=" + convo_id +"&type="+attachment+ "&message=" + message_box,
                    type: 'get',
                    data: '',
                    dataType: "JSON",
                    success: function (data) {
                        var msg = {
                            message: message_box,
                            convo_id: convo_id
                            };
                            //convert and send data to server
                            //websocket.send(JSON.stringify(msg));
                           //9showstatusMessage('messageSuccess','SuccessFull', 'message send Successfully' , 3000);

                    },
                    error: function (jqXhr, textStatus, errorThrown) {
                        console.log(errorThrown);
                    }
                });
                $("#reply_button").attr("message_type","");
            $('input[name=message_box]').val('');
                if(typeof(Worker)!=="undefined")            //check whether the user's browser supports it
                  {
                    // console.log(base_url);
                    // return;
                      w=new Worker(base_url+"web_worker/"+convo_id);          //creates a new web worker object and runs the code in "demo_workers.js"
                      //Add an "onmessage" event listener to the web worker
                      //When the web worker posts a message, the code within the event listener is executed. The data from the web worker
                      //is stored in event.data.
                      
                      w.onmessage = function (event) { 
                        //document.getElementById("result").innerHTML=event.data; 
                        $('.convo_id_'+convo_id).html('');
                        var data= event.data;
                        console.log(data);
                        console.log(typeof event.data);
                        $('.convo_id_'+convo_id).html(data);
                        // $.each( data, function( key, value ) {
                        //   alert( key + ": " + value );
                        // });


                    };
                  }
                else
                  {
                    console.log("Sorry, your browser does not support Web Workers...");
                    //document.getElementById("result").innerHTML="Sorry, your browser does not support Web Workers...";
                  }
                  
            });

            //#### Message received from server?
            /*websocket.onmessage = function(ev) {
                var msg = JSON.parse(ev.data); //PHP sends Json data
                console.log(msg);
                // var type = msg.type; //message type
                 var umsg = msg.message; //message text
                 var convo_id = msg.convo_id; //user name
                // var ucolor = msg.color; //color

                // if(type == 'usermsg') 
                // {
                     $('.convo_id_'+convo_id).append('<div class="message-preview"><figure class="user-avatar"><img src="<?php //echo base_url();?>assets_u/images/avatars/avatar_06.jpg" alt="user-avatar"></figure><p class="text-header">Sarah-Imaginarium</p><p class="timestamp">just now</p><p>'+umsg+'</p></div>');
                // }
                // if(type == 'system')
                // {
                //     $('#message_box').append("<div class=\"system_msg\">"+umsg+"</div>");
                // }
                
                 $('input[name=message_box]').val(''); //reset text
            };*/
    });
        </script>
<script type="text/javascript">
    $(document).ready(function() 
    {

    var segments = window.location.href.split( '/' );
    var n = segments.length;
    //alert(n);
    var auction_id = segments[n-1];
    //alert(cat);

    var chat = segments[n-2];
    //alert(auction_id);return;

        <?php
        $user_id = $this->session->userdata("user_login");
        $user_id = $user_id['id']; ?>
        if ($.isNumeric(auction_id)) {
            $("ul.usermenu li#overview").attr("class", "");
            $("ul.usermenu li#inbox").attr("class", "active");
            //var href = $("ul.usermenu li#inbox a").attr('href');
            $('a[href="#inbox"]').tab('show');

        }

        //return;

        var input = document.getElementById("message_box");
        if(input != null){
            input.addEventListener("keyup", function(event) {
            event.preventDefault();
            if (event.keyCode === 13) {
            document.getElementById("send_button").click();
            }
            });
        }
        $("#send_button").click(function () {
            //alert("button");
            var convo_id = $("#send_button").attr("convo_id");
            var message_box = $('input[name=message_box]').val();
            var message = '';
            if (message_box === '') {
                alert("You Can't Send Empty Message !");
                return;
            }
            message_box = JSON.stringify(message_box);

                var auctioneer_id = $("#send_button").attr("reciever_id");
                $.ajax({
                    url: base_url + "profile/insertMessagebyConvo/?convo_id=" + convo_id + "&message=" + message_box + "&auctioneer_id=" + auctioneer_id,
                    type: 'get',
                    data: '',
                    dataType: "JSON",
                    success: function (data) {
                            $('.messages').empty();
                        //console.log(data);
                        //alert("message inserted id =" + data);
                        $.ajax({
                            url: base_url + "profile/getMessagesByConvoId/?convo_id=" + convo_id,
                            type: 'get',
                            data: '',
                            dataType: "JSON",
                            success: function (data) {
                                console.log(data);


                            $('.info_messages').empty();
                            $('.info_messages').html(data.html);

                                $('input[name=message_box]').val("");

                            },
                            error: function (jqXhr, textStatus, errorThrown) {
                                console.log(errorThrown);
                            }
                        });

                    },
                    error: function (jqXhr, textStatus, errorThrown) {
                        console.log(errorThrown);
                    }
                });

        });


       $(document).on("click","ul.all_convo li",function(e) 
       { 
        //alert("i m clicked"); return;
        var convo_id = this.id;
        var message = '';

        //console.log(convo_id);
        //alert(convo_id); return;
        if (convo_id === '') {
            //alert();
            var auction_id = $('input[name=auction_id]').val();
            var auctioneer_id = $('input[name=auctioneer_id]').val();
            var user_id = $('input[name=user_id]').val();

            $("#send_button").attr("auction_id",auction_id);
            $("#send_button").attr("reciever_id",auctioneer_id);
            $("#send_button").attr("user_id",user_id);
            $('input[name=message_box]').removeAttr("readonly");
            //$('input[name=message_box]').attr("autofocus","true");
        }

        else
        {
            var auctioneer_id = $("#"+convo_id+" input[name=auctioneer_id]").attr("value");
            $("#send_button").attr("reciever_id",auctioneer_id);
            //alert(auctioneer_id); return;
        $.ajax({
            url: base_url + "profile/getMessagesByConvoId/?convo_id="+convo_id,
            type: 'get',
            data: '',
            dataType:"JSON",
            success: function (data) {
             
                            console.log(data.html);
                            $('.info_messages').empty();
                            $('.info_messages').html(data.html);
                            $('input[name=message_box]').removeAttr("readonly");
                            //$('input[name=message_box]').attr("autofocus","true");
                            $("#send_button").attr("convo_id",convo_id);
                            $("#check_messages").attr("convo_id",convo_id);
                            //$("#send_button").attr("reciever_id",convo_id);
                //$('#response').html('<h2>here will be the template</h2>');

            },
            error: function (jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        }); 
    }
       });
       });
       
       $("#check_messages").click(function () {
           var convo_id = $("#check_messages").attr('convo_id');
           var message = '';
           if($.isNumeric(convo_id)){
                //alert('i m clicked='+convo_id);    
                $.ajax({
                    url: base_url + "profile/getMessagesByConvoId/?convo_id="+convo_id,
                    type: 'get',
                    data: '',
                    dataType:"JSON",
                    success: function (data) {
                        console.log(data);
                        $('.info_messages').empty();
                        $(".info_messages").html(data.html);
               //console.log(message);
                                    $('.messages').html(message);
                                    $('input[name=message_box]').removeAttr("readonly");
                                    //$('input[name=message_box]').attr("autofocus","true");
                                    $("#send_button").attr("convo_id",convo_id);
                                    $("#check_messages").attr("convo_id",convo_id);
                                    //$("#send_button").attr("reciever_id",convo_id);
                        //$('#response').html('<h2>here will be the template</h2>');
            
                    },
                    error: function (jqXhr, textStatus, errorThrown) {
                        console.log(errorThrown);
                    }
                });
           }
           
       });
       
       $("#convos_refresh").click(function () {
           //alert('i m clicked');
           var message = '';
               $.ajax({
                        url: base_url + "profile/getUserConvo",
                        type: 'get',
                        data: '',
                        dataType:"JSON",
                        success: function (data) {
                            //console.log(data);
                            //return;
                
                            $('.all_convo').empty();
                            
                                        //message += '<ul >';
                                        data.forEach(function(el){
                                            message += '<li class="contact" id='+el.id+'>';
                                            message += '<input type="hidden" name="auctioneer_id" value='+el.auctioneer_id+'>';
                                            message += '<div class="wrap"><div class="meta">';
                                            message += '<p class="name">'+el.auctioneer_name+'</p>';
                                            message += '<p class="preview"><a href="'+base_url+''+el.auction_slug+'/auction">'+el.auction_name+'</a></p>';                
                                            
                                            
                                        });
                                        //message += '</ul>';
                                        console.log(message);
                                        $('.all_convo').html(message);
                                        //$('input[name=message_box]').removeAttr("readonly");
                                        //$('input[name=message_box]').attr("autofocus","true");
                                        //$("#send_button").attr("convo_id",convo_id);
                                        //$("#check_messages").attr("convo_id",convo_id);
                                        //$("#send_button").attr("reciever_id",convo_id);
                            //$('#response').html('<h2>here will be the template</h2>');
                
                        },
                        error: function (jqXhr, textStatus, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
       });
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

    // custom-js
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
                    setTimeout(function(){ window.location = base_url+'profile'; }, 2000);

                    console.log(resetCSRF(response.csrf.csrf_token));

                },
                error: function (response) {
                    showstatusMessage('messageError',"Error", "JS Request Failed", 7000);
                    console.log(resetCSRF(response.csrf.csrf_token));
                }
            });
        });

        var customerTypeForm = function (customerType){

            if (customerType === "individual") {
                console.log (customerType);
                $(".business_detail").find(".form-group").hide();
                $(".business_detail").find(".form-group").find('input').attr('disabled',true);
            }
            else if (customerType === "business") {
                console.log (customerType);
                $(".business_detail").find(".form-group").show();
                $(".business_detail").find(".form-group").find('input').attr('disabled',false);
            }
        };

        customerTypeForm($("input[name='user_type']").val());

        //$('select').select2();

        $("input[name='user_type']").on("change",function(){
            var customerType = $(this).val();
            customerTypeForm(customerType);
        });

        var loadCountries = function () {
            var $countryInput = $('select[name="country_id"]');
            if($countryInput.is(":empty")){
                $.ajax({
                    url: base_url + "register/getCountries",
                    method: "GET",
                    /*data: {csrf_token: getCSRF()},*/
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response);
                        resetCSRF(response.csrf_token);
                        $.each(response.countries,function(i, item){
                            $countryInput.append('<option value="'+item.id+'">'+item.name+ '</option>');

                            console.log (i+ ': '+item.id+ ': '+item.name);
                        });
                        $countryInput.select2();
                    },

                });
                console.log($countryInput);
            }
        };
        loadCountries();

        $('select[name="country_id"]').on('change',function(){
            var $stateInput = $('select[name="state_id"]');
            var $cityInput = $('select[name="city_id"]');
            var seletedCountry = $(this).val();
            console.log("Country changed: " + seletedCountry);
            $.ajax({
                url: base_url + "register/getStates/"+seletedCountry,
                method: "GET",
                /*data: {csrf_token: getCSRF()},*/
                dataType: "JSON",
                success: function (response) {
                    console.log(response);
                    $stateInput.empty();
                    $cityInput.empty();
                    /*resetCSRF(response.csrf_token);*/
                    $.each(response.states,function(i, item){
                        $stateInput.append('<option value="'+item.id+'">'+item.name+ '</option>');

                        console.log (i+ ': '+item.id+ ': '+item.name);
                    });
                    $stateInput.select2();
                    $cityInput.select2();
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

                        console.log (i+ ': '+item.id+ ': '+item.name);
                    });
                    $cityInput.select2();
                }
            });

        });


        $('#forget_password').submit(function(e){

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
                },
                error: function( jqXHR, textStatus, errorThrown){
                    console.log(textStatus);
                    showstatusMessage(msgType,response.title, response.message, 7000);
                }
            });
        });

        $('#reset_password').submit(function(e){

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

        /*UZair Work End*/



});
$(document).ready(function () {
    $('#social_fb_link').bind('keyup mouseup change',function() {
    inoutTopic =  $('#social_fb_link').val();
    //$('#topic').val(val);
    $('#facebook_link_hidden').val(inoutTopic);
    //console.log(val);
    });

    $('#social_twt_link').bind('keyup mouseup change',function() {
    inoutTopic =  $('#social_twt_link').val();
    //$('#topic').val(val);
    $('#twitter_link_hidden').val(inoutTopic);
    //console.log(val);
    });

    $('#social_gplus_link').bind('keyup mouseup change',function() {
    inoutTopic =  $('#social_gplus_link').val();
    //$('#topic').val(val);
    $('#google_link_hidden').val(inoutTopic);
    //console.log(val);
    });
});

$(document).ready(function () {
    var segments = window.location.href.split( '/' );
    var n = segments.length;
    //alert(n);
    var post_type = segments[n-1];

        var sort = $('#input-sort').val();
        var sellSort = $('#sell_input-sort').val();
        var user_id = $('#user_id_hidden').val();


        var currency = '';
        var sellcurrency = '';        

        $('#sell_input-sort').on('change', function() {
            sellSort = this.value;
            ///processForm(allVals,sort,pageNo);
            sellfilterProducts();
        });
        $('#sell_input-limit').on('change', function() {
            ///processForm(allVals,sort,pageNo);
            sellfilterProducts();
        });
        $('#sell_input-currency').on('change', function() {
            sellcurrency = this.value;
            ///processForm(allVals,sort,pageNo);
            sellfilterProducts();
        });

        $('#input-sort').on('change', function() {
            sort = this.value;
            ///processForm(allVals,sort,pageNo);
            buyfilterProducts();
        });
        $('#input-limit').on('change', function() {
            ///processForm(allVals,sort,pageNo);
            buyfilterProducts();
        });
        $('#input-currency').on('change', function() {
            currency = this.value;
            ///processForm(allVals,sort,pageNo);
            buyfilterProducts();
        });

        var serverResponse;
        if (post_type == "buying_posts") {
        buyfilterProducts();
        }
        if (post_type == "selling_posts") {
        sellfilterProducts();
        }

        function buyfilterProducts (){

            console.log("buyfilterProducts");
            console.log($("#input-limit").val());
            console.log($("#input-currency").val());
            //alert(currency);
            //return;

            var url = base_url +"auctions/getFilteredProductsBuy/?sort="+sort+"&type=buy&currency="+currency+"&user_id="+user_id;
            console.log(url);

            $('#buyPagination').pagination({
                dataSource: url,
                totalNumberLocator: function (response) {
                    // you can return totalNumber by analyzing response content
                    serverResponse = response;
                    //console.log(response);
                    return response.totalNumber;
                    //return Math.floor(Math.random() * (1000 - 100)) + 100;
                },
                ajax: {
                    beforeSend: function () {
                        console.log("beforeSend");
                    }
                },

                ulClassName: "",
                pageSize: 12,
                triggerPagingOnInit: true,
                locator: 'data',
                showPrevious: false,
                showNext: false,
                showNavigator: true,
                formatNavigator: function(currentPage, totalPage, totalNumber){
                    //console.log("formatNavigator");
                    $('#buyer_requests').text(totalNumber +' Buyer Requests');
                    //$('.buy-pagination-details').html("Showing page "+currentPage+" of "+totalPage+" pages ("+totalNumber+" record(s))");

                },

                callback: function (data, pagination) {
                    // template method of yourself
                    console.log('i am buy');
                    console.log(serverResponse);
                    if(serverResponse.totalNumber > 0 ){
                        $(".buy-auctions-list").html('');
                        $(".buy-auctions-list").html(serverResponse.html);
                        $('.buy-pagination-details').closest('.row').show();
                    }
                    else{
                        $(".buy-auctions-list").html('<div class="col-sm-12 text-center pt-xlg"> <h3 class="title">No Auction Found</h3></div>');
                        //$('.buy-pagination-details').closest('.row').hide();
                    }

                    /*var html = template(data);
                    dataContainer.html(html);*/
                }
            });
        }

        var sellServerResponse;
        function sellfilterProducts (){
            console.log("sellfilterProducts");
            var url = base_url +"auctions/getFilteredProductsSell/?sort="+sellSort+"&type=sell&currency="+sellcurrency+"&user_id="+user_id;
            console.log(url);
            $('#sellPagination').pagination({
                dataSource:url,
                // [$('.auctions-list').find(".product-list").length]
                    
                totalNumberLocator: function(response) {
                    // you can return totalNumber by analyzing response content
                    sellServerResponse = response;
                    console.log(response) ;
                    return response.totalNumber;
                    //return Math.floor(Math.random() * (1000 - 100)) + 100;

                },
                ajax: {
                    beforeSend: function () {
                        //dataContainer.html('Loading data from flickr.com ...');
                    }
                },

                ulClassName: "",
                // ulClassName: "sellpagination",
                pageSize: 12,
                triggerPagingOnInit: true,
                locator: 'data',
                showPrevious: false,
                showNext: false,
                showNavigator: true,
                formatNavigator: function(currentPage, totalPage, totalNumber){
                    //console.log();
                    $('#selling_auctions').text(totalNumber +' Selling Auctions');
                    //$('.sell-pagination-details').html("Showing page "+currentPage+" of "+totalPage+" pages ("+totalNumber+" records)");

                },

                callback: function (data, pagination) {
                     //template method of yourself
                     console.log('i am sell');
                     console.log(sellServerResponse);
                    if(sellServerResponse.totalNumber > 0 ){
                        $(".sell-auctions-list").html('');
                        $(".sell-auctions-list").html(sellServerResponse.html);
                        $('.sell-pagination-details').closest('.row').show();
                    }
                    else{
                        $(".sell-auctions-list").html('<div class="col-sm-12 text-center pt-xlg"> <h3 class="title">No Auction Found</h3></div>');
                        //$('.sell-pagination-details').closest('.row').hide();
                    }
                    /*var html = template(data);
                    dataContainer.html(html);*/
                }
            });
        }
});        
var $links = $('#follow_status span').click(function () {
    $(this).addClass('clicked');
});
var $sub_links = $('.sub_follow').click(function () {
    $(this).addClass('clicked');
});
function follow(user_id) {
            
            $.ajax({
                url: base_url + "follow/"+user_id,
                type: 'post',
                data: user_id,
                dataType:"JSON",
                success: function (data) {
                    console.log(data);
                    console.log(data.status);
                    //alert(data.status);
                    if (data.status === true) {
                        if ($('#follow_status span').hasClass('clicked')) {
                            $('#follow_status span').text('Following');
                            $("#follow_status").attr("href", "javascript:Unfollow("+data.following_id+");")
                            $('#follow_status span').removeClass('clicked');
                            
                        }
                        if ($('.sub_follow').hasClass('clicked')) {
                            $('.sub_follow.clicked span').text('Following');
                            $(".sub_follow.clicked").attr("href", "javascript:Unfollow("+data.following_id+");")
                            $(".sub_follow.clicked").removeClass('dark clicked').addClass('primary follow-btn');
                        }
                        showstatusMessage('messageSuccess',data.title, data.message , 4000);
                    }
                    else{
                        showstatusMessage('messageError', data.title, data.message, 4000);
                    }

                }
            });


        }
        function Unfollow(user_id) {
            
            $.ajax({
                url: base_url + "unfollow/"+user_id,
                type: 'post',
                data: user_id,
                dataType:"JSON",
                success: function (data) {
                    console.log(data);
                    console.log(data.status);
                    //alert(data.status);
                    if (data.status === true) {
                        if ($('#follow_status span').hasClass('clicked')) {
                            $('#follow_status span').text('Follow');
                            $("#follow_status").attr("href", "javascript:follow("+data.following_id+");")
                            $('#follow_status span').removeClass('clicked');
                            
                        }
                        if ($('.sub_follow').hasClass('clicked')) {
                            $('.sub_follow.clicked span').text('Follow');
                            $(".sub_follow.clicked").attr("href", "javascript:follow("+data.following_id+");")
                            $(".sub_follow.clicked").removeClass('primary follow-btn clicked').addClass('dark');
                        }
                        
                        showstatusMessage('messageSuccess',data.title, data.message , 4000);
                    }
                    else{
                        showstatusMessage('messageError', data.title, data.message, 4000);
                    }

                }
            });


        }
        (function($){
        $('.follow-btn').on( 'mouseenter', unfollow );
        $('.follow-btn').on( 'mouseleave', follow );

        function unfollow() {
            var $this = $(this);

            $this.removeClass('primary');
            $this.addClass('tertiary');
            $this.text('Unfollow');
        }

        function follow() {
            var $this = $(this);

            $this.removeClass('tertiary');
            $this.addClass('primary');
            $this.text('Following');
        }
    })(jQuery);
</script>
<script>
    $(document).ready(function () {
        var serverResponse;

        function getNotifications(){

            var url = base_url +"getNotifications/";
            console.log(url);

            $('#pagination').pagination({
                dataSource: url,
                totalNumberLocator: function (response) {
                    // you can return totalNumber by analyzing response content
                    serverResponse = response;
                    //console.log(response);
                    return response.totalNumber;
                    //return Math.floor(Math.random() * (1000 - 100)) + 100;
                },
                ajax: {
                    beforeSend: function () {
                        console.log("beforeSend");
                    }
                },

                ulClassName: "",
                pageSize: 6,
                triggerPagingOnInit: true,
                locator: 'data',
                showPrevious: false,
                showNext: false,
                showNavigator: true,
                formatNavigator: function(currentPage, totalPage, totalNumber){
                    //console.log("formatNavigator");
                    //$('.pagination_details').text(totalNumber +' Buyer Requests');
                    //$('.pagination-details').html("Showing page "+currentPage+" of "+totalPage+" pages ("+totalNumber+" record(s))");

                },

                callback: function (data, pagination) {
                    // template method of yourself
                    console.log('i am buy');
                    console.log(serverResponse);
                    if(serverResponse.totalNumber > 0 ){
                        $(".notification_list").html('');
                        $(".notification_list").html(serverResponse.html);
                        $('.pagination-details').closest('.row').show();
                    }
                    else{
                        $(".notification_list").html('<div class="col-sm-12 text-center pt-xlg"> <h3 class="title">No Notifications Found</h3></div>');
                        //$('.buy-pagination-details').closest('.row').hide();
                    }

                    /*var html = template(data);
                    dataContainer.html(html);*/
                }
            });
        }
        getNotifications();
        
});        
</script>
