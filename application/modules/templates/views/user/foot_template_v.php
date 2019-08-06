<!-- jQuery -->
<script src="<?= base_url('assets_u/js/vendor/jquery-3.1.0.min.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="<?= base_url('assets_u/vendors/bootstrap-3.3.7/js/bootstrap.min.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/bootstrap-select.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
<!-- Magnific Popup -->
<script src="<?= base_url('assets_u/js/vendor/jquery.magnific-popup.min.js');?>"></script>
<!-- XM Tab -->
<script src="<?= base_url('assets_u/js/vendor/jquery.xmtab.min.js');?>"></script>
<!-- XM Accordion -->
<script src="<?= base_url('assets_u/js/vendor/jquery.xmaccordion.min.js');?>"></script>
<!-- XM Pie Chart -->
<script src="<?= base_url('assets_u/js/vendor/jquery.xmpiechart.min.js');?>"></script>
<!-- XM Countdown -->
<script src="<?= base_url('assets_u/js/vendor/jquery.xmcountdown.min.js');?>"></script>
<!-- Auction Page -->
<!-- XM Pie Chart -->
<!-- xmAlert -->
<script src="<?= base_url('assets_u/js/vendor/jquery.xmalert.min.js');?>"></script>
<!-- Tooltipster -->
<script src="<?= base_url('assets_u/js/vendor/jquery.tooltipster.min.js');?>"></script>
<!-- Tweet -->
<script src="<?= base_url('assets_u/js/vendor/twitter/jquery.tweet.min.js');?>"></script>
<!-- JRange -->
<script src="<?= base_url('assets_u/js/vendor/jquery.range.min.js');?>"></script>
<!-- Side Menu -->

<script src="<?= base_url('assets_u/js/side-menu.js');?>"></script>
<!-- Radio Link -->
<script src="<?= base_url('assets_u/js/radio-link.js');?>"></script>
<!-- Tooltip -->
<script src="<?= base_url('assets_u/js/tooltip.js');?>"></script>
<!-- User Quickview Dropdown -->
<script src="<?= base_url('assets_u/js/user-board.js');?>"></script>
<script src="<?= base_url('assets_u/js/shop.js');?>"></script>
<!-- Home v2 -->
<script src="<?= base_url('assets_u/js/home-v2.js');?>"></script>
<script src="<?= base_url('assets_u/js/author-profile.js');?>"></script>
<!-- Sidebar Menu -->
<script src="<?= base_url('assets_u/js/sidebar-menu.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>

<!-- Footer -->
<script src="<?= base_url('assets_u/js/footer.js');?>"></script>
<script src="<?= base_url("assets_u/js/vendor/jquery.validate.min.js");?>"></script>
<script src="<?=base_url();?>assets_u/js/vendor/croppie.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?=base_url();?>assets_u/semantic/dist/semantic.min.js">"></script>
<!-- JS Part Start-->
<!--<script type="text/javascript" src="--><?//= base_url('assets_u/js/jquery.easing-1.3.min.js')?><!-- "></script>-->

<!--<script type="text/javascript" src="--><?//= base_url("assets_u/vendors/jquery-cookie/js.cookie.js");?><!--"></script>-->

<!--<script type="text/javascript" src="--><?//= base_url('assets_u/vendors/bootstrap-toggle/js/bootstrap-toggle.js')?><!-- "></script>-->
<!--<script type="text/javascript" src="--><?//= base_url('assets_u/vendors/jquery-loading-overlay/dist/loadingoverlay.min.js')?><!-- "></script>-->

<!--<script type="text/javascript" src="--><?//= base_url("assets_u/vendors/jquery-validation-1.17.0/dist/jquery.validate.js");?><!--"></script>-->
<!--<script type="text/javascript" src="--><?//= base_url("assets_u/vendors/jquery-validation-1.17.0/dist/additional-methods.js");?><!--"></script>-->
<!--<script type="text/javascript" src="<?/*= base_url("assets_u/vendors/jquery-validation-1.17.0/extension/jquery-validate.bootstrap-tooltip.js");*/?>"></script>-->
<!--<script type="text/javascript" src="--><?//= base_url("assets_u/vendors/moment/moment.min.js");?><!--"></script>-->

<script>
    paceOptions = {
        ajax: true,
        document: true,
        eventLag: true,
        restartOnPushState: true,
//        elements: {
//            selectors: ['.my-page']
//        }
    };
</script>
<script type="text/javascript" src="<?= base_url("assets_u/vendors/pace-1.0.2/pace.min.js");?>"></script>


<!-- JS Part End-->

<script>
//    function load(time){
//        var x = new XMLHttpRequest();
//        x.open('GET', "http://localhost:81/walter/" + time, true);
//        x.send();
//    }
//
//    load(20);
//    load(100);
//    load(500);
//    load(2000);
//    load(3000);
//
//    setTimeout(function(){
//        Pace.ignore(function(){
//            load(3100);
//        });
//    }, 4000);
//
//    Pace.on('hide', function(){
//        console.log('done');
//    });
</script>



<?php
if (isset($pageLevelPlugins['js'])) {
    foreach ($pageLevelPlugins['js'] AS $js) {
        $this->load->view('scripts/js/' . $js . '.php');
    }
}
?>

<script type="text/javascript">
    $(document).ajaxStart(function(event, jqxhr, settings){
        //$(".modal-body").LoadingOverlay("show",{color : "rgba(255, 255, 255, 0.5)"});
      Pace.restart();
    });
    $(document).ajaxComplete(function(event, jqxhr, settings){
        // $(".modal-body").LoadingOverlay("hide");
        // console.log(jqxhr);
       Pace.stop();
    });
</script>



<script type="text/javascript">
    (function($){
        console.log("DOC READY");
        /*-----------------------
            NEW MESSAGE POPUP
        -----------------------*/
        $('#login-pop').magnificPopup({
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
        $('#mobile-login-pop').magnificPopup({
            type: 'inline',
            removalDelay: 300,
            mainClass: 'mfp-fade',
            closeMarkup: '<div class="close-btn mfp-close"><svg class="svg-plus"><use xlink:href="#svg-plus"></use></svg></div>'
        });
    })(jQuery);

    $(document).ready(function () {

        //showstatusMessage('messageInfo','Document Ready','Your page is ready.','15000');
    });

$(document).ready(function () {
    var $loginForm = $("#login-form");
    $("#login-form").validate({
        rules: {
            login_email: "required",
            login_password: {
                required: true,
                minlength : 6
            }
        },
        /*errorPlacement: function(error, element) {

            // showstatusMessage('danger', 'title', 'message', 7000);

            /!*if(element.attr("name") == "agreement"){
                error.appendTo('#error_agree');
                return;
            }else {
                error.insertAfter(element);
            }*!/
        },
        error: function () {

        },
        invalidHandler: function (form, validator) {
            showstatusMessage('danger', 'title', 'message', 7000);
        }*/
    });
    var loginData;
    $loginForm.submit(function (e) {
        e.preventDefault();
        console.log("action = " + $loginForm.attr('action'));
        console.log("method = " + $loginForm.attr('method'));
        loginData = $loginForm.serialize();
        console.log($loginForm.serialize());
        $.ajax({
            url: $loginForm.attr('action'),
            type: $loginForm.attr('method'),
            data: loginData,
            dataType: 'json',
            success: function (response) {
                var type = '';
                var message = response.message;
                if (response.status) {

                    showstatusMessage('messageSuccess',response.title, message , 3000);

                    setTimeout(function () {
                        window.location.reload();
                    },1500);
                } else if (response.status === false) {
                    var dur = 1000;
                    dur = (response.type == 'nonVerified') ? 30000 : 3000;

                    showstatusMessage('messageError', response.title, message, dur);
                }
            }
        });
    });
});

function showstatusMessage(type, heading, text, delay) {
    $('body').xmalert({
        x: 'right',
        y: 'bottom',
        xOffset: 10,
        yOffset: 30,
        alertSpacing: 17,
        lifetime: delay,
        fadeDelay: 0.3,
        template: type, // messageInfo , messageError, messageSuccess
        title: heading,
        paragraph: text,
    });

}
function deactive_tiptip(auction_id) {
            //alert(auction_id);
            $.ajax({
                url: base_url + "Add_to_favourite/"+auction_id,
                type: 'post',
                data: auction_id,
                dataType:"JSON",
                success: function (data) {
                    console.log(data);
                    console.log(data.status);
                    //alert(data.status);
                    if (data.status === true) {

                        showstatusMessage('messageSuccess',data.title, data.message , 4000);
                    }
                    else{
                        showstatusMessage('messageError', data.title, data.message, 4000);
                    }

                }
            });


        }


</script>
<script>

// $('.prompt').keypress(function(event){
//     var keycode = (event.keyCode ? event.keyCode : event.which);
//     if(keycode == '13'){
//         alert('You pressed a "enter" key in textbox'); 
//     }
// });    
    
$(".ui.search").search({
    
    type: 'category',
    minCharacters: 3,
    apiSettings: {
        onResponse: function(serverResponse) {
            var response = {
                    results: {}
                };

            console.log(serverResponse);    
            //translate Server API response to work with search
            $.each(serverResponse.results, function(index, results) {
                //console.log(results);
                var topic = results.category_name || 'Unknown', maxResults = 2, maxCat = 8;

                //if(index >= maxCat) {return false;}
                if(response.results[topic] === undefined) {
                    response.results[topic] = {
                        name :  "<a href='"+base_url+""+results.cat_slug+"/category3/?search="+serverResponse.search_text+"'>"+results.category_name+"</a>",
                        results: []
                    };
                }
                //console.log(response.results[topic].name);
                if(response.results[topic].results.length >= maxResults){ return ;}
                //add result to category
                response.results[topic].results.push({
                    title       : results.name,
                    description : results.description,
                    url         : base_url +''+results.slug+'/auction',
                    image       : serverResponse.base_resources_url+''+results.image_sm_1,
                    price       : "For "+results.type
                });

                //console.log(response.results[topic]);
            });
            return response;
        },
        url: base_url + 'search/autoComplete?q={query}'
    }
});
//           var contents = [
//           {
//             "results": {
//     "category1": {
//       "name": "Category 1",
//       "results": [
//         {
//           "title": "Result Title",
//           "url": "/optional/url/on/click",
//           "image": "optional-image.jpg",
//           "price": "Optional Price",
//           "description": "Optional Description"
//         },
//         {
//           "title": "Result Title",
//           "url": "/optional/url/on/click",
//           "image": "optional-image.jpg",
//           "price": "Optional Price",
//           "description": "Optional Description"
//         }
//       ]
//     },
//     "category2": {
//       "name": "Category 2",
//       "results": [
//         {
//           "title": "Result Title",
//           "url": "/optional/url/on/click",
//           "image": "optional-image.jpg",
//           "price": "Optional Price",
//           "description": "Optional Description"
//         }
//       ]
//     }
//   },
  
//   "action": {
//     "url": "/path/to/results",
//     "text": "View all 202 results"
//   }
// }];
  // $( function() {
  //   var cache = {};
  //   var myObj, x, jsn,i;
    
  //   $( "#search_products" ).autocomplete({
  //     minLength: 3,
  //     source: function( request, response ) {
  //       var term = request.term;
        
 
  //       $.getJSON( base_url+"search/autoComplete", request, function( data, status, xhr ) {
  //         //response( data );

  //         console.log(data);
  //         var newArray = new Array(data.length);
  //         var i = 0;
  //         $.each(data, function(index,el) {
  //           console.log(el.name);
  //           //response(  );
  //           newArray[i] = el.name;
  //                   i++;
  //               // el = object in array
  //               // access attributes: el.Id, el.Name, etc
  //           });
  //         response( newArray );

  //         // console.log(data);
  //         // obj = JSON.parse(data);
  //         // console.log(obj);
  //       });
  //     }
  //   });
  // } );
// $('.ui.search').search({
//     type          : 'category',
//     minCharacters : 3,
//     apiSettings   : {
//       onResponse: function(githubResponse) {
//         var
//           response = {
//             results : {}
//           }
//         ;
//         // translate GitHub API response to work with search
//         $.each(githubResponse.items, function(index, item) {
//           var language   = item.language || 'Unknown', maxResults = 5;
//           if(index >= maxResults) {
//             return false;
//           }
//           // create new language category
//           if(response.results[language] === undefined) {
//             response.results[language] = {
//               name    : language,
//               results : []
//             };
//           }
//           // add result to category
//           response.results[language].results.push({
//             title       : item.name,
//             description : item.description,
//             url         : item.html_url
//           });
//         });
//         return response;
//       },
//       url: base_url + 'search/autoComplete?q={query}'
//     }
//   });

$( ".subcribe_submit" ).click(function(ev) {
    //preventDefault(ev);
  //console.log( "Handler for .click() called." );
  var email = $("input[name='subscribe_email']").val();
  //console.log( email );

  $.ajax({
                url: base_url+'merchant/addSubscriber',
                type: 'post',
                data: {email:email},
                dataType:"JSON",
                success: function (data) {
                    //console.log(data);
                    showstatusMessage(data.type,data.title, data.message , 4000);
                    $("input[name='subscribe_email']").val();
                    return;
                }
            });
});
  
            //alert(auction_id);
            
  </script>



