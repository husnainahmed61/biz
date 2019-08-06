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
    $(document).ready(function () {
        /*Cancel Bid Starts*/
        var $cancelForm = $('#bid-cancel-form');


        $cancelForm.submit(function (e) {
            e.preventDefault();
            /*console.log("action = " + $form.attr('action'));
             console.log("method = " + $form.attr('method'));*/
            var $confirm = confirm("Are you sure to cancel this bid, if you click 'Ok' then it can.");

            if ($confirm == true) {
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
                        if (response.status) {
                            type = 'messageSuccess';
                        }
                        else {
                            type = 'messageError';

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
                        window.setTimeout(function () {
                            location.reload()
                        }, 3000);
                    },
                    error: function (response) {
                        showstatusMessage('messageError', "Error", "Can't Perform Any Action", 7000);
                    }

                });
            }
        });
        /*Cancel Bid Ends*/

        /* Update Bid Starts */
        var $form = $('.bid-form');
        var $formInputs = $(".bid-form :input");

        var $amountField = $form.find('input[name="amount"]');

        $amountField.on('keypress', function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });

        $form.submit(function (e) {
            // alert();
            // return;
            e.preventDefault();
            /*console.log("action = " + $form.attr('action'));
             console.log("method = " + $form.attr('method'));*/

            //console.log($form.serialize());

            var $confirm = confirm("Are you sure?");

            if ($confirm == true) {
                $.ajax({
                    url: $form.attr('action'),
                    type: $form.attr('method'),
                    data: $form.serialize(),
                    dataType: 'json',
                    success: function (response) {
                        console.log('i m response');
                        console.log(response);
                        resetCSRF(response.csrf_token);
                        var type = '';
                        var message = response.message;
                        if (response.status) {
                            type = 'messageSuccess';
                            $formInputs.prop("disabled", true);
                        }
                        else {
                            type = 'messageError';
                            if (response.hasOwnProperty('error_array')) {
                                message += '<ul class="simple-ul">';
                                response.error_array.forEach(function (el) {
                                    message += "<li>" + el + "</li>";
                                });
                                message += '</ul>';
                            }
                        }
//                    console.log(response.code);
                        showstatusMessage(type, response.title, message, 7000);

                        if (type == 'messageSuccess') {
                            window.setTimeout(function () {
                                location.reload()
                            }, 3000);
                        }
                    },
                    error: function (response) {
                        showstatusMessage('messageError', "Error", "Can't Update", 7000);
                    }
                });
            }
        });
        /* Update Bid Ends */

        /*pagination on bid detail page*/


    });
    $(document).ready(function () {
// getting auction id param 
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

        var auction_id = getUrlParameter('auction');

        console.log(auction_id);
//end getting param


        var sort = $('#input-sort').val();

        $('#input-sort').on('change', function () {
            ///processForm(allVals,sort,pageNo);
            sort = this.value;
            console.log(sort);
            filterProducts();
        });

        console.log(sort);

        var serverResponse;
        filterProducts();

        //sellfilterProducts();

        function filterProducts() {

            console.log("filterProducts");
            //console.log($("#input-limit").val());

            var url = base_url + "bids/getFilteredProducts/?sort=" + sort + "&auction_id=" + auction_id;
//console.log(url);
            $('#auction_bids_list').pagination({
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
                showNavigator: true,
                showPrevious: false,
                showNext: false,
                formatNavigator: function (currentPage, totalPage, totalNumber) {
                    console.log("formatNavigator");
                    //$('.buy-pagination-details').html("Showing page "+currentPage+" of "+totalPage+" pages ("+totalNumber+" record(s))");

                },

                callback: function (data, pagination) {
                    // template method of yourself
                    console.log('i am buy');
                    //console.log(serverResponse);
                    if (serverResponse.totalNumber > 0) {
                        $("#auction_bids_list").html('');
                        $("#auction_bids_list").html(serverResponse.html);
                        //$('.buy-pagination-details').closest('.row').show();
                    }
                    else {
                        $("#auction_bids_list").html('<div class="col-sm-12 text-center pt-xlg"> <h3 class="title">No Bids... Found</h3></div>');
                        //$('.buy-pagination-details').closest('.row').hide();
                    }

                    /*var html = template(data);
                    dataContainer.html(html);*/
                }
            });
        }
    });

    $(document).ready(function () {
        // alert('custom js');
//end getting param


        var type = $('#input-type-private').val();
        var currency = $('#input-currency').val();
        var sort = $('#input-sort-bids').val();
        var $bidActions = $('.bids_list .action');

        $('#input-type-private').on('change', function () {
            ///processForm(allVals,sort,pageNo);
            type = this.value;
            console.log(type);
            getUserBids();
        });
        $('#input-currency').on('change', function () {
            ///processForm(allVals,sort,pageNo);
            currency = this.value;
            console.log(currency);
            getUserBids();
        });
        $('#input-sort-bids').on('change', function () {
            ///processForm(allVals,sort,pageNo);
            sort = this.value;
            console.log(currency);
            getUserBids();
        });
        console.log(type);

        var serverResponse;
        getUserBids();
        function getUserBids() {

            console.log("filterProducts");
            //console.log($("#input-limit").val()); input-currency

            var url = base_url + "bids/getFilteredBidsOfUser/?type=" + type + "&currency=" + currency + "&sort=" + sort;
//console.log(url);
            $('.bids_list').pagination({
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
                showNavigator: true,
                showPrevious: false,
                showNext: false,
                formatNavigator: function (currentPage, totalPage, totalNumber) {
                    console.log("formatNavigator");
                    //$('.buy-pagination-details').html("Showing page "+currentPage+" of "+totalPage+" pages ("+totalNumber+" record(s))");

                },

                callback: function (data, pagination) {
                    // template method of yourself
                    console.log('i am buy');
                    //console.log(serverResponse);
                    if (serverResponse.totalNumber > 0) {
                        $(".bids_list").html('');
                        $(".bids_list").html(serverResponse.html);
                        //$('.buy-pagination-details').closest('.row').show();
                    }
                    else {
                        $(".bids_list").html('<div class="col-sm-12 text-center pt-xlg"> <h3 class="title">No Bids Found</h3></div>');
                        //$('.buy-pagination-details').closest('.row').hide();
                    }

                    /*var html = template(data);
                    dataContainer.html(html);*/
                }
            });
        }

        $('.bids_list ').on('click','a.action',function(e){
            // alert('bids_list action');
            e.preventDefault();
            console.log('clicked');
            var method = $(this).data('method');
            var bid_id = $(this).data('id');

            var links = $(this).closest('.bid_actions').find('a.action');
            var selectedLink = $(this);

            if(selectedLink.hasClass('selected') ){
                showstatusMessage('messageInfo','Oops !', 'Option already selected' , 4000);
                return false;
            }

            //console.log($(this).css('background-color','#e61852'));
            $.ajax({
                url: base_url + "bids/"+method+"_bid/"+bid_id,
                type: 'post',
                data: bid_id,
                dataType:"JSON",
                success: function (data) {
                    //console.log(data);
                    console.log('clicked');
                    links.removeClass('selected');
                    links.css('background-color' , "");
                    if (data.status === true) {
                        showstatusMessage('messageSuccess',data.title, data.message , 4000);
                        // selectedLink.css('background-color','#00d7b3');
                        selectedLink.addClass('selected');
                        if(method == 'accept'){
                            selectedLink.css('background-color','#00d7b3');
                            console.log('acceptColor');
                        } else if(method == 'cancel'){
                            selectedLink.css('background-color','#e61852');
                            console.log('cancelColor');
                        }else{
                            selectedLink.css('background-color',"");
                            console.log('false');
                        }

                    }
                    else{
                        showstatusMessage('messageError', data.title, data.message, 4000);
                    }
                    //window.setTimeout(function(){location.reload()},3000);
                }
            });
        });


        // alert("CHECK");
        $('.bids_list ').on('click','.pvt_bid_actions .delete',function () {
            //
            alert("AA");
            var $bidRow = $(this).closest('.bid_row');
            var id = $bidRow.data('row-id');
            $.ajax({
                url: base_url+'bids/delete_bid',
                type: 'POST',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function (response) {
                    if(response.status){
                        type = 'messageSuccess';
                        $bidRow.hide();
                    }else{
                        type = 'messageError';
                    }
                    showstatusMessage(type, response.title, response.message, 7000);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    var status = '<b>'+xhr.status+'</b>';
                    showstatusMessage('messageError','Error',status+': '+thrownError , 5000);

                }
            });
        });
    });
</script>
<script type="text/javascript">
(function($){
    function range(start, count) {
        return Array.apply(0, Array(count))
            .map(function (element, index) {
                if ( index < 9 ) {
                    return String( '0' + ( index + start ) );
                }
                return String(index + start);  
        });
    }

    Chart.defaults.global.defaultFontFamily = "'Titillium Web', sans-serif";
    Chart.defaults.global.defaultFontColor = "#888";
    Chart.defaults.global.defaultFontSize = 11;

    var ctx = $('.main-activity-chart'),
        data = {
            type: 'bar',
            data: {
                labels: range(1, 31),
                datasets: [
                    {
                        label: 'Sales',
                        data: [15, 9, 4, 7, 6, 8, 4, 0, 6, 5, 0, 0, 8, 9, 6, 7, 4, 3, 0, 10, 14, 8, 9, 7, 8, 3, 6, 7, 4, 6, 10],
                        backgroundColor: "#00d7b3"
                    }
                ]
            },
            options: {
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "#2b373a",
                    titleFontSize: 0,
                    titleSpacing: 0,
                    titleMarginBottom: -7,
                    bodyFontSize: 10,
                    bodyFontStyle: 'bold',
                    bodySpacing: 0,
                    cornerRadius: 2,
                    xPadding: 12,
                    yPadding: 14,
                    displayColors: false
                },
                scales: {
                    xAxes: [
                        {
                            stacked: true,
                            barThickness: 16,
                            gridLines: {
                                display:false,
                                color: "rgba(255,255,255,0)",
                            }
                        }
                    ],
                    yAxes: [
                        {
                            stacked: true,
                            gridLines: {
                                color: "rgba(235, 235, 235, .5)",
                                drawBorder: false,
                                drawTicks: false,
                                zeroLineColor: "rgba(235, 235, 235, .5)"
                            }
                        }
                    ]
                }
            }
        },
        mainActivityChart = new Chart(ctx, data);

    var ctx2 = $('.main-activity-pie-chart'),
        data2 = {
            type: 'doughnut',
            data: {
                datasets: [
                    {
                        data: [60, 30],
                        borderWidth: [ 0 , 0 ],
                        backgroundColor: [
                            "#03f1b6",
                            "#108fe9"
                        ],
                        hoverBackgroundColor: [
                            "#03f1b6",
                            "#108fe9"
                        ]
                    }
                ]
            },
            options: {
                legend: {
                    display: false
                },
                tooltips: {
                    enabled: false
                },
                cutoutPercentage: 70
            }
        },
        mainActivityPieChart = new Chart(ctx2, data2);

    var ctx3 = $('.colors-pie-chart'),
        data3 = {
            type: 'doughnut',
            data: {
                datasets: [
                    {
                        data: [37, 47, 16],
                        borderWidth: [ 0 , 0, 0 ],
                        backgroundColor: [
                            "#7c5ac2",
                            "#03f1b6",
                            "#108fe9"
                        ],
                        hoverBackgroundColor: [
                            "#7c5ac2",
                            "#03f1b6",
                            "#108fe9"
                        ]
                    }
                ]
            },
            options: {
                legend: {
                    display: false
                },
                tooltips: {
                    enabled: false
                },
                cutoutPercentage: 75
            }
        },
        colorsPieChart = new Chart(ctx3, data3);

    var lineBars = [
        { name: 'pg1', percent: 86 },
        { name: 'pg2', percent: 60 },
        { name: 'pg3', percent: 95 }
    ];

    lineBars.forEach(function( pg ){
        $('.' + pg.name).xmlinefill({
            percent: pg.percent,
            fillWidth: 10,
            gradient: true,
            gradientColors: ['#10fac0', '#1cbdf9'],
            speed: 2,
            outline: true,
            outlineColor: "#eff0f4",
            resizable: true
        });
    });
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
    //chart dynamic data
    var auction_id = getUrlParameter('auction');

        console.log(auction_id);
//end getting param
        gatBidInfo();
       
        //sellfilterProducts();

        function gatBidInfo() {
            
            console.log("filterProducts");
            //console.log($("#input-limit").val());
            $.ajax({
                url: base_url + "bids/getBidInfo/?auction_id=" + auction_id,
                type: 'post',
                data: auction_id,
                dataType:"JSON",
                success: function (data) {
                    console.log(data);
                    
                    //alert(data.status);
                    // if (data.status === true) {
                        endRange = data.Total_bids;
                        graphData = data.bidsAmount;   
                        console.log("range = "+endRange);
                        console.log(graphData);
        //console.log("data = "+ JSON.stringify(graphData));
        //graphData = JSON.stringify(graphData);
        //console.log(typeof graphData);

    var ctx6 = $('.lines-graph-chart'),
        data6 = {
            type: 'line',
            data: {
                labels: range(1, endRange),
                datasets: [
                    {
                        label: "Bid Amount",
                        data: graphData,
                        fill: true,
                        lineTension: 0,
                        backgroundColor: "rgba(16, 143, 233, .4)",
                        borderColor: "#108fe9",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'bevel',
                        pointBorderColor: "#fff",
                        pointBackgroundColor: "#108fe9",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "#2b373a",
                        pointHoverBorderWidth: 6,
                        pointRadius: 4,
                        pointHitRadius: 10
                    }
                ]
            },
            options: {
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "#2b373a",
                    titleFontSize: 0,
                    titleSpacing: 0,
                    titleMarginBottom: -7,
                    bodyFontSize: 10,
                    bodyFontStyle: 'bold',
                    bodySpacing: 0,
                    cornerRadius: 2,
                    xPadding: 12,
                    yPadding: 14,
                    displayColors: false
                },
                scales: {
                    xAxes: [
                        {
                            gridLines: {
                                display: false
                            }
                        }
                    ],
                    yAxes: [
                        {
                            gridLines: {
                                color: "#ebebeb",
                                borderDash: [ 7, 2 ],
                                drawBorder: false,
                                drawTicks: false,
                                zeroLineColor: "rgba(235, 235, 235, .5)"
                            }
                        }
                    ]
                }
            }
        },
        linesGraphChart = new Chart(ctx6, data6);
                    //     showstatusMessage('messageSuccess',data.title, data.message , 4000);
                    // }
                    // else{
                    //     showstatusMessage('messageError', data.title, data.message, 4000);
                    // }

                }
            });
             

        }
       

    //end chart dynamic data call

    
   
    

    

    $('.bounce-pie-chart').xmpiechart({
        width: 200,
        height: 200,
        percent: 68,
        color: "#7c5ac2",
        fillWidth: 8,
        speed: 2,
        outline: true,
        linkPercent: '.bounce-perc-link'
    });

    var countryPieCharts = [
            { name: 'cc1', percent: [55, 45] },
            { name: 'cc2', percent: [60, 40] },
            { name: 'cc3', percent: [70, 30] },
            { name: 'cc4', percent: [74, 26] },
            { name: 'cc5', percent: [76, 24] },
            { name: 'cc6', percent: [80, 20] },
            { name: 'cc7', percent: [85, 15] },
            { name: 'cc8', percent: [90, 10] }
        ],
        countryPieChartsData = {
            type: 'doughnut',
            data: {
                datasets: [
                    {
                        data: [],
                        borderWidth: [ 0 , 0 ],
                        backgroundColor: [
                            "#7c5ac2",
                            "#ffdc1b"
                        ],
                        hoverBackgroundColor: [
                            "#7c5ac2",
                            "#ffdc1b"
                        ]
                    }
                ]
            },
            options: {
                legend: {
                    display: false
                },
                tooltips: {
                    enabled: false
                },
                cutoutPercentage: 70
            }
        };

    countryPieCharts.forEach(function(item){
        countryPieChartsData.data.datasets[0].data = item.percent;
        var ctx = $('.'+item.name);
        new Chart(ctx, countryPieChartsData); 
    });

    $('.numbers-slider').bxSlider({
        controls: false,
        auto: true,
        pause: 2000,
        pagerCustom: '.slider-pager'
    });
})(jQuery);

</script>
<!-- Page JS End-->