<?php
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 10/9/2018
 * Time: 10:06 PM
 */
?>
<script type="text/javascript">
$(document).ready(function () {

    var searchTerm = $('#searchTerm').text();
    var sort = $('#input-sort').val();
    var currency = $('#input-currency').val();
    var post_type = $('#input_post_type').val();

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
    
    var serverResponse;
    //filterProducts();

    function filterProducts (){

        var url = base_url +"search/getFilteredProducts/?currency=" + currency + "&sort=" + sort + "&type="+post_type+"&search="+searchTerm;

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