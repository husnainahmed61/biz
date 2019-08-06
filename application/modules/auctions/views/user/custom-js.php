<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 6/26/2018
 * Time: 1:40 AM
 */
?>

<script type="text/javascript">
    $('.send_message').click(function(){
        var message = $("#message_box").val();
        var auction_id = $("#auction_id_message").val();
        var auctioneer_id = $("#auctioneer_id_message").val();

        if (message == '') {
            showstatusMessage('messageError',"Failed", "You Can Not Send Empty Message" , 4000);
            return;
        }
        //return;

        $.ajax({
                url: base_url + "profile/insertConvoAndMessage/?auction_id="+auction_id+"&auctioneer_id="+auctioneer_id+"&message="+message,
                type: 'get',
                data: '',
                dataType:"JSON",
                success: function (data) {
                 
                    console.log(data);
                    showstatusMessage(data.type,data.title, data.message , 4000);
                    //$('.info_messages').empty();
                    //$('.info_messages').html(data.html);
                    //$( ".info_messages" ).addClass( "convo_id_"+convo_id );
                    //$('input[name=message_box]').removeAttr("readonly");
                    //$('input[name=message_box]').attr("autofocus","true");
                    //$("#reply_button").attr("convo_id",convo_id);
                    //$("#check_messages").attr("convo_id",convo_id);
                    //$("#send_button").attr("reciever_id",convo_id);
                    //$('#response').html('<h2>here will be the template</h2>');

                },
                error: function (jqXhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
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
    
    (function($) {
        console.log("DOC READY");
        var target_countDown = $('#txt_name').val();
        //alert(target_countDown);
                /*-----------------------
            NEW MESSAGE POPUP
        -----------------------*/
        $('#biddetail-popup').magnificPopup({
            type: 'inline',
            removalDelay: 300,
            mainClass: 'mfp-fade',
            closeMarkup: '<div class="close-btn mfp-close"><svg class="svg-plus"><use xlink:href="#svg-plus"></use></svg></div>'
        });
        $( '.post-tab' ).xmtab({
            startOn: 1
        });

        $('.accordion').xmaccordion({
            startOn: 2,
            speed: 500
        });

        $('.pie-chart1').xmpiechart({
            width: 176,
            height: 176,
            percent: 24,
            fillWidth: 8,
            gradient: true,
            gradientColors: ['#ff6589', '#f92552'],
            speed: 2,
            outline: true,
            linkPercent: '.percent'
        });
        $('.pie-chart1-mobile').xmpiechart({
            width: 176,
            height: 176,
            percent: 24,
            fillWidth: 8,
            gradient: true,
            gradientColors: ['#ff6589', '#f92552'],
            speed: 2,
            outline: true,
            linkPercent: '.percent'
        });
        $('.img-gallery').on('click', function(){
            $('.gallery-items').magnificPopup('open');
        });

        $('.gallery-items').magnificPopup({
            delegate: 'span',
            type: 'image',
            removalDelay: 300,
            mainClass: 'mfp-fade',
            gallery: {
                enabled: true,
                arrowMarkup: '<div class="slide-control %dir% mfp-arrow-%dir%"><svg class="svg-arrow"><use xlink:href="#svg-arrow"></use></svg></div>'
            }
        });

        /*-----------------
            COUNTDOWN
        -----------------*/
        $('.bid-countdown-desktop').xmcountdown({
            width: 50,
            height: 50,
            fillWidth: 4,
            gradient: true,
            gradientColors: ['#f21c5e','#00dcdd'],
            targetDate: new Date(target_countDown),
            daysText: "Days",
            hoursText: "Hours",
            minutesText: "Mins",
            secondsText: "Secs",
            outline: true
        });
        $('.bid-countdownmob').xmcountdown({
            width: 50,
            height: 50,
            fillWidth: 4,
            gradient: true,
            gradientColors: ['#f21c5e','#00dcdd'],
            targetDate: new Date(target_countDown),
            daysText: "Days",
            hoursText: "Hours",
            minutesText: "Mins",
            secondsText: "Secs",
            outline: true
        });

    })(jQuery);


$(document).ready(function () {


    var $form = $('#bid-form');
    var $formInputs = $("#bid-form :input");

    var $amountField = $form.find('input[name="amount"]');

    $amountField.on('keypress', function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });



    $form.submit(function (e) {
        //alert();
        //return;

        e.preventDefault();
        /*console.log("action = " + $form.attr('action'));
        console.log("method = " + $form.attr('method'));*/

        //console.log($form.serialize());

        var $confirm = confirm("Are you sure?");

        if($confirm == true)
        {
            $.ajax({
                url: $form.attr('action'),
                type: $form.attr('method'),
                data: $( this ).serialize(),
                dataType: 'json',
                success: function (response) {
                    //console.log(response);
                    //resetCSRF(response.csrf_token);
                    var type = '';
                    var message = response.message;
                    if (response.status){
                        type = 'messageSuccess';
                        //alert("i m in");
                        //console.log("i m response");
                        console.log(response);

                        $formInputs.prop("disabled", true);
                        showstatusMessage('messageSuccess',response.title, message , 4000);
                    }
                    else {
                        type = 'messageError';
                        if (response.hasOwnProperty('error_array')) {
                            message += '<ul class="simple-ul">';
                            response.error_array.forEach(function(el){
                                message += "<li>" + el + "</li>";
                            });
                            message += '</ul>';
                        }
                        showstatusMessage('messageError',response.title, message , 4000);
                    }
                    //console.log(response.code);
                    
                    

                    if(response.code == '401')
                    {
                        $('#account-login').modal('show');
                    }

                    if(type == 'messageSuccess')
                    {
                        //window.setTimeout(function(){location.reload()},3000);
                    }
                },
                error: function (response) {
                    showstatusMessage('messageError',"Error", "Can't Bid", 7000);
                }
            });
        }
    });

    //bid form mobile
    var $form = $('#bid-form-mobiles');
    var $formInputs = $("#bid-form-mobiles :input");

    var $amountField = $form.find('input[name="amount"]');

    $amountField.on('keypress', function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });

    //alert($form);

    $form.submit(function (e) {
        //alert();
        //return;
        e.preventDefault();
        /*console.log("action = " + $form.attr('action'));
        console.log("method = " + $form.attr('method'));*/

        //console.log($form.serialize());

        var $confirm = confirm("Are you sure?");

        if($confirm == true)
        {
            $.ajax({
                url: $form.attr('action'),
                type: $form.attr('method'),
                data: $( this ).serialize(),
                dataType: 'json',
                success: function (response) {
                    //console.log(response);
                    //resetCSRF(response.csrf_token);
                    var type = '';
                    var message = response.message;
                    if (response.status){
                        type = 'messageSuccess';
                        //alert("i m in");
                        //console.log("i m response");
                        console.log(response);

                        $formInputs.prop("disabled", true);
                        showstatusMessage('messageSuccess',response.title, message , 4000);
                    }
                    else {
                        type = 'messageError';
                        if (response.hasOwnProperty('error_array')) {
                            message += '<ul class="simple-ul">';
                            response.error_array.forEach(function(el){
                                message += "<li>" + el + "</li>";
                            });
                            message += '</ul>';
                        }
                        showstatusMessage('messageError',response.title, message , 4000);
                    }
                    //console.log(response.code);
                    
                    

                    if(response.code == '401')
                    {
                        $('#account-login').modal('show');
                    }

                    if(type == 'messageSuccess')
                    {
                        //window.setTimeout(function(){location.reload()},3000);
                    }
                },
                error: function (response) {
                    showstatusMessage('messageError',"Error", "Can't Bid", 7000);
                }
            });
        }
    });



    var $quickBidModal = $('#recent-bids');
    var modalContentUrl = "";
    $(".tab-pane").on("click",".bid-now",function(e){

        modalContentUrl = $(this).data('load-url');

        //e.preventDefault();

        var options = {};
        $quickBidModal.modal();
    });

    $quickBidModal.on('show.bs.modal',function(){
        $(this).find('.modal-body').load(modalContentUrl);
    });

    var $bidDetailsModal = $('#bid-details');

    $(".bid-details").on("click",function(e){
        modalContentUrl = $(this).data('load-url');
        $bidDetailsModal.modal();
    });

    $(".recent-bid-details").on("click",function(e){
        modalContentUrl = $(this).data('load-url');
        $bidDetailsModal.modal();
    });

    $("#recent-bids").on("click",".recent-bid-details",function(e){
        modalContentUrl = $(this).data('load-url');
        $bidDetailsModal.modal();
    });

    $bidDetailsModal.on('show.bs.modal',function(){
        $(this).find('.modal-body').load(modalContentUrl);
    });

    /*UZair Work starts*/
    var $acceptForm = $('#bid-accept-form');
    var $cancelForm = $('#bid-cancel-form');

    /*Accept Bid Starts*/
    $("#recent-bids").on('submit', '#bid-accept-form' ,function (e) {
        e.preventDefault();
        /*console.log("action = " + $form.attr('action'));
         console.log("method = " + $form.attr('method'));*/
        var $confirm = confirm("Are you sure to accept this bid, if you click 'Ok' then you all bid can't accept only this bid accepted.");

        if($confirm == true)
        {
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    resetCSRF(response.csrf_token);
                    var type = '';
                    var message = response.message;
                    if (response.status){
                        type = 'success';
                    }
                    else {
                        type = 'danger';

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
                    window.setTimeout(function(){location.reload()},3000);
                },
                error: function (response) {
                    showstatusMessage('danger',"Error", "Can't Bid", 7000);
                }

            });
        }
    });
    /*Accept Bid Ends*/

    /*Cancel Bid Starts*/
    $cancelForm.submit(function (e) {
        e.preventDefault();
        /*console.log("action = " + $form.attr('action'));
         console.log("method = " + $form.attr('method'));*/
        var $confirm = confirm("Are you sure to cancel this bid, if you click 'Ok' then bid remove form this list.");

        if($confirm == true) {
            $.ajax({
                url: $cancelForm.attr('action'),
                type: $cancelForm.attr('method'),
                data: $cancelForm.serialize(),
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    resetCSRF(response.csrf_token);
                    var type = '';
                    var message = response.message;
                    if (response.status){
                        type = 'success';
                    }
                    else {
                        type = 'danger';

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
                    window.setTimeout(function(){location.reload()},3000);
                },
                error: function (response) {
                    showstatusMessage('danger',"Error", "Can't Perform Any Action", 7000);
                }

            });
        }
    });
    /*Cancel Bid Ends*/

    /*Forget Password Starts*/
    var $forgetPasswordForm = $('#forget_password');

    $forgetPasswordForm.submit(function (e) {
        e.preventDefault();

        /* console.log("action = " + $forgetPasswordForm.attr('action'));
         console.log("method = " + $forgetPasswordForm.attr('method'));*/

        $.ajax({
            url: $forgetPasswordForm.attr('action'),
            type: $forgetPasswordForm.attr('method'),
            data: $forgetPasswordForm.serialize(),
            dataType: 'json',
            success: function (response) {
                console.log(response);
                resetCSRF(response.csrf_token);
                var type = '';
                var message = response.message;
                if (response.status){
                    type = 'success';
                }
                else {
                    type = 'danger';

                    if (response.hasOwnProperty('error_array')) {
                        message += '<ul class="simple-ul">';
                        response.error_array.forEach(function(el){
                            message += "<li>" + el + "</li>";
                        });
                        message += '</ul>';
//                            console.log(message);
                    }
                }
                showstatusMessage(type,response.title, message , 7000);
                if(type == 'success')
                {
                    window.setTimeout(function(){location.reload()},3000);
                }

            },
            error: function (response) {
                showstatusMessage('danger',"Error", "Can't Send", 7000);
            }
        });
    });

    var $resetPasswordForm = $('#reset_password');

    $resetPasswordForm.submit(function (e) {
        e.preventDefault();

        /* console.log("action = " + $resetPasswordForm.attr('action'));
         console.log("method = " + $resetPasswordForm.attr('method'));*/

        $.ajax({
            url: $resetPasswordForm.attr('action'),
            type: $resetPasswordForm.attr('method'),
            data: $resetPasswordForm.serialize(),
            dataType: 'json',
            success: function (response) {
                console.log(response);
                resetCSRF(response.csrf_token);
                var type = '';
                var message = response.message;
                if (response.status){
                    type = 'success';
                }
                else {
                    type = 'danger';

                    if (response.hasOwnProperty('error_array')) {
                        message += '<ul class="simple-ul">';
                        response.error_array.forEach(function(el){
                            message += "<li>" + el + "</li>";
                        });
                        message += '</ul>';
//                            console.log(message);
                    }
                }
                showstatusMessage(type,response.title, message , 7000);
                if(type == 'success')
                {
                    window.setTimeout(function(){location.assign(base_url)},3000);
                }


            },
            error: function (response) {
                showstatusMessage('danger',"Error", "Can't Reset", 7000);
            }
        });
    });
    /*Forget Password Ends*/
    /*UZair Work ends*/
    /*hasnain work for review and rating*/
    jQuery.validator.setDefaults({
      debug: true,
      success: "valid"
    });


    var form = $( "#review_form" );
    form.validate();
    
    $("#button-review").on('click', function () {
        var description = $("#input-review").val();
        var rating = $("input[name='rating']").val();
        var auction_id = $("#auction_id").val();
        var user_id = $("#user_id").val();


        if (form.valid() == false) {
            showstatusMessage('messageError',"Error", "All fields are required", 2000);
            return;

        }
        if (description == '' || rating =='') {
            showstatusMessage('messageError',"Error", "All fields are required", 2000);
            return;
        }
        if (user_id == '') {
            showstatusMessage('messageError',"Error", "You have to Login First", 2000);
            return;
        }
        //alert(user_id);
        var submit = 'submit';
        jQuery.ajax({
            type: "POST",
            url: base_url + "auctions/addRatingReview",
            data: {
                description: description,
                rating: rating,
                auction_id: auction_id,
                user_id: user_id,
                submit1: submit
            },
            success: function (data) {
                console.log(data);
                var myObj = JSON.parse(data);
                showstatusMessage(myObj.type,myObj.title,myObj.message , 5000);

            },
            error: function (data) {
                showstatusMessage('messageError',"Error", "Can't Add Rating And Review", 7000);
            },
        });

    });

    var reply_form = $( "#comment_reply_form" );
    reply_form.validate();
    
    $("#comment_reply").on('click', function () {
        var description = $("#treply2").val();
        var review_id = $("#review_id").val();
        var auction_id = $("#auction_id").val();
        var user_id = $("#user_id").val();

        if (reply_form.valid() == false) {
            showstatusMessage('messageError',"Error", "Can't reply with empty message", 2000);
            return;

        }
        //alert(user_id);
        var submit = 'submit';
        jQuery.ajax({
            type: "POST",
            url: base_url + "auctions/addReviewReply",
            data: {
                description: description,
                review_id: review_id,
                auction_id: auction_id,
                user_id: user_id,
                submit1: submit
            },
            success: function (data) {
                console.log(data);
                var myObj = JSON.parse(data);
                showstatusMessage(myObj.type,myObj.title,myObj.message , 5000);

            },
            error: function (data) {
                showstatusMessage('messageError',"Error", "Can't Add Reply To Comment", 7000);
            },
        });

    });


    $("a[href='#tab-review']").on('click',function(){
        $('.nav-tabs a[href="#tab-review"]').tab('show');
    });

    $("a[href='#tab-review'], a[href='#review_form']").on('click', function (e) {
        var href = $(this).attr('href');
        console.log($(href).offset());
        console.log($(href).offset().top - 100);
        var scrollPosition = 0;
        if ($("nav#menu").hasClass("navbar-fixed-top")) {
            /*With Sticky NavBar (cuz nav isn't added to the page height)*/
            scrollPosition = $(href).offset().top - 120;
        } else {
            /*Without Sticky NavBar (cuz nav is added to the page height)*/
            scrollPosition = $(href).offset().top - 160;
        }
        $('html, body').animate({
            scrollTop: scrollPosition
        }, 'slow');
        e.preventDefault();
    });

});

</script>
<script type="text/javascript">
    $(document).ready(function(){
        var sort = $('#input-sort').val();
        var currency = $('#input-currency').val();
        var post_type = $('#input_post_type').val();

        $('#input-currency').on('change', function() {
            ///processForm(allVals,sort,pageNo);
            currency = this.value;
            buyfilterProducts();
        });

        $('#input-sort').on('change', function() {
            sort = this.value;
            ///processForm(allVals,sort,pageNo);
            buyfilterProducts();
        });
        $('#input_post_type').on('change', function() {
            ///processForm(allVals,sort,pageNo);
            post_type = this.value;
            buyfilterProducts();
        });

// console.log(sort);
// console.log(currency);
// console.log(post_type);
// return;

        var serverResponse;
        buyfilterProducts();
        //sellfilterProducts();

        function buyfilterProducts (){
            console.log("buyfilterProducts");
            //console.log($("#input-limit").val());

            var url = base_url +"auctions/getFilteredPrivateProducts/?sort="+sort+"&type="+post_type+"&currency="+currency;

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

                ulClassName: "pager",
                pageSize: 5,
                triggerPagingOnInit: true,
                locator: 'data',
                showNavigator: true,
                showPrevious: false,
                showNext: false,
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
                        //$(".buy-auctions-list").html('<div class="col-sm-12 text-center pt-xlg"> <h3 class="title">No Auction Found</h3></div>');
                        //$('.buy-pagination-details').closest('.row').hide();
                    }

                    /*var html = template(data);
                    dataContainer.html(html);*/
                }
            });
        }

        $(".buy-auctions-list ").on('click','.edit-auction',function (e) {
            console.log($(this).data('has_bids'));
            if($(this).data('has_bids') == 1 ){
                e.preventDefault();
                showstatusMessage('messageInfo','Can\'t edit auction','You can\'t edit an auction once it has receive bids.',5000);
            }
            return true;
        });

    });

$( document ).ready(function() {
    //alert( "ready!" );
        // Elevate Zoom for Product Page image
    /*$("#zoom_01").elevateZoom({
        gallery:'gallery_01',
        cursor: 'pointer',
        galleryActiveClass: 'active',
        imageCrossfade: true,
        zoomWindowFadeIn: 500,
        zoomWindowFadeOut: 500,
        lensFadeIn: 500,
        lensFadeOut: 500,
        loadingIcon: base_url +'assets_u/image/progress.gif'
    });

//////pass the images to swipebox
    $("#zoom_01").bind("click", function(e) {
        var ez =   $('#zoom_01').data('elevateZoom');
        $.swipebox(ez.getGalleryList());
        return false;
    });*/
});
</script>
<script type="text/javascript">
    function delete_auction(auction_id) {
            //alert(auction_id);
                $.ajax({
                url: base_url + "auctions/deleteUserAuction/?auction_id="+auction_id,
                type: 'get',
                data: '',
                dataType:"JSON",
                success: function (data) {
                    // console.log(data);
                    // return;
                    
                    showstatusMessage(data.type,data.title,data.message,4000);
                    window.setTimeout(function(){location.reload()},3500);
                    //console.log(data.html);
                    //$('.info_messages').empty();
                    //$('.info_messages').html(data.html);
                    //$( ".info_messages" ).addClass( "convo_id_"+convo_id );
                    //$('input[name=message_box]').removeAttr("readonly");
                    //$('input[name=message_box]').attr("autofocus","true");
                    //$("#reply_button").attr("convo_id",convo_id);
                    //$("#check_messages").attr("convo_id",convo_id);
                    //$("#send_button").attr("reciever_id",convo_id);
                    //$('#response').html('<h2>here will be the template</h2>');

                },
                error: function (jqXhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });


            }
</script>
<script type="text/javascript">
    
</script>
<!-- JS Part End-->
  <script type="text/javascript">
      // Starrr plugin (https://github.com/dobtco/starrr)
var __slice = [].slice;

(function($, window) {
  var Starrr;

  Starrr = (function() {
    Starrr.prototype.defaults = {
      rating: void 0,
      numStars: 5,
      change: function(e, value) {}
    };

    function Starrr($el, options) {
      var i, _, _ref,
        _this = this;

      this.options = $.extend({}, this.defaults, options);
      this.$el = $el;
      _ref = this.defaults;
      for (i in _ref) {
        _ = _ref[i];
        if (this.$el.data(i) != null) {
          this.options[i] = this.$el.data(i);
        }
      }
      this.createStars();
      this.syncRating();
      this.$el.on('mouseover.starrr', 'span', function(e) {
        return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('mouseout.starrr', function() {
        return _this.syncRating();
      });
      this.$el.on('click.starrr', 'span', function(e) {
        return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('starrr:change', this.options.change);
    }

    Starrr.prototype.createStars = function() {
      var _i, _ref, _results;

      _results = [];
      for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
        _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
      }
      return _results;
    };

    Starrr.prototype.setRating = function(rating) {
      if (this.options.rating === rating) {
        rating = void 0;
      }
      this.options.rating = rating;
      this.syncRating();
      return this.$el.trigger('starrr:change', rating);
    };

    Starrr.prototype.syncRating = function(rating) {
      var i, _i, _j, _ref;

      rating || (rating = this.options.rating);
      if (rating) {
        for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
          this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        }
      }
      if (rating && rating < 5) {
        for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
          this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        }
      }
      if (!rating) {
        return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
      }
    };

    return Starrr;

  })();
  return $.fn.extend({
    starrr: function() {
      var args, option;

      option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
      return this.each(function() {
        var data;

        data = $(this).data('star-rating');
        if (!data) {
          $(this).data('star-rating', (data = new Starrr($(this), option)));
        }
        if (typeof option === 'string') {
          return data[option].apply(data, args);
        }
      });
    }
  });
})(window.jQuery, window);

$(function() {
  return $(".starrr").starrr();
});

$( document ).ready(function() {
      
  $('#stars').on('starrr:change', function(e, value){
    $('#count').val(value);
  });
  
  $('#stars-existing').on('starrr:change', function(e, value){
    $('#count-existing').html(value);
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
            FavouritefilterProducts();
        });

    $('#input-currency-view').on('change', function() {
            currency = this.value;
            ///processForm(allVals,sort,pageNo);
            FavouritefilterProducts();
        });
    // end currency change function
    $('#input-sort-view').on('change', function() {
       sort = this.value;
        ///processForm(allVals,sort,pageNo);
        FavouritefilterProducts();
    });
    
    var serverResponse;
    //filterProducts();

    function FavouritefilterProducts (){

        var url = base_url +"auctions/getMyFavouriteProducts/?currency=" + currency + "&sort=" + sort + "&type="+post_type;

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
    FavouritefilterProducts();

    });
</script>