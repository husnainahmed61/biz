<?php
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 31-Mar-18
 * Time: 6:09 PM
 */
?>
<!-- Page JS Start-->
<script type="text/javascript">
    (function($){
        console.log("DOC READY");
        /*-----------------------
            NEW MESSAGE POPUP
        -----------------------*/
        $('#filter-pop').magnificPopup({
            type: 'inline',
            removalDelay: 300,
            mainClass: 'mfp-fade',
            closeMarkup: '<div class="close-btn mfp-close"><svg class="svg-plus"><use xlink:href="#svg-plus"></use></svg></div>'
        });
    })(jQuery);
    $(document).ready(function () {

        var $quickBidModal = $('#quick-bid');
        var modalContentUrl = "";
        $(".buy-now").on("click",function(e){
            modalContentUrl = $(this).data('load-url');

            //e.preventDefault();

            var options = {

            };
           $('#quick-bid').modal();
        });

        $quickBidModal.on('show.bs.modal',function(){
            // $(this).find('.modal-body').load(modalContentUrl);
        });

        var values = {};
        $('.filter-list li.attributes input[type="checkbox"]').each(function (i,el) {
            //console.log("filter-list");
            values[this.name] = new Array();

        });
        //console.log(values);

        $('.filter-list li.attributes input[type="checkbox"]').on('click',function () {
            var arr = new Array();
            if($(this).is(":checked")){
                //console.log("checked");
                //console.log("filter-list: "+ this.name +","+$(this).val());
                values[this.name].push($(this).val());
            }
            else{
                //console.log("unchecked");
                //values[this.name].push($(this).val());
                var index = values[this.name].indexOf($(this).val());
                values[this.name].splice(index,1);
            }
            /*console.log("VALUES : ");
           console.log(values);*/
        });


        

    });
</script>
<script type="text/javascript">
$(document).ready(function () {
    var getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = window.location.search.substring(1),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                }
            }
        };

    var search  = getUrlParameter('search');
    if (search == undefined) {
        search ='';
    }
    
    var allVals = [];
    var sort = $('#input-sort').val();
    var currency = $('#input-currency').val();
    var post_type = $('#input_post_type').val();
    var price_range = '';
    var price_range_array;

    //var pageNo = "";
    $("li.attributes input[type='checkbox']").change(function () {

        if (this.checked) {

            allVals.push($(this).val());
            var sort = $("#input-sort option:selected").val();
            

        }
        else {
            var index = allVals.indexOf($(this).val());
            allVals.splice(index,1);
        }
    });

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
    $('#input_post_type').on('change', function() {
            post_type = this.value;
            ///processForm(allVals,sort,pageNo);
            filterProducts();
        });

    $('#input-currency').on('change', function() {
            currency = this.value;
            ///processForm(allVals,sort,pageNo);
            filterProducts();
        });
    // end currency change function
    $('#input-sort').on('change', function() {
       sort = this.value;
        ///processForm(allVals,sort,pageNo);
        filterProducts();
    });
    
    $( ".filter_search" ).click(function() {

            price_range = $('.price-range-slider').val();

            //price_range_array = price_range.split(',');
            // console.log(array);
            // return;
         filterProducts();
        });
    var serverResponse;
    //filterProducts();

    function filterProducts (){
        console.log("allVals");
        var segments = window.location.href.split( '/' );
    var n = segments.length;
    var cat = segments[n-1];
    
    var slug = segments[n-2];
    console.log(cat);
    if (cat === "category3" || cat === "category2" || cat === "category1" ) {
        cat = segments[n-1];
        slug = segments[n-2];
    }
    else{
        cat = segments[n-2];
        slug = segments[n-3];
    }
    console.log(cat);
    console.log(slug);

        var url = base_url + '' + cat + "/getFilteredProducts/?currency=" + currency + "&slug=" + slug + "&sort=" + sort + "&all=" + allVals+"&type="+post_type+"&price_range="+price_range+"&search="+search;

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

            ulClassName: "pager",
            // className: "pager-item",
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

                var $pages = $(pagination.el).find('.paginationjs-page');


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
    $('#input-sort').change(function() {
        //var value = $("#input-sort option:selected").val();
        //alert(value);
        });
</script>

<script type="text/javascript">

    $(document).ready(function () {
        var vis = 5;
        var max = 1;
        var more = '';
        var filter_name = '';

        $('.filters-list').each(function () {
            var max = 1;
            // console.log($(this).find('.filter').length);
            more = $(this).find('.filter').length - max - 1;
            // console.log(more);

            filter_name = $(this).parent().prev().html();
            if ($(this).find('.filter').length > max + 1) {
                $(this).find('.filter:gt(' + max + ')').hide().end().append('<li class="sub_accordian"><a><span class="show_more">Show More</span></a></li>');
            }
        });

        $('.sub_accordian').click(function () {
            more = $(this).closest('.filters-list').find('.filter').length;
            console.log(more);
            if ($(this).hasClass('showless')) {
                $(this).removeClass('showless');
                $(this).closest('.filters-list').find('.filter:gt(' + max + ')').hide();
                $(this).text('Show More');
            } else {
                $(this).closest('.filters-list').find('.filter').css("display", "block");
                $(this).addClass('showless');
                $(this).text('Show Less');
            }


        });

    });
</script>
