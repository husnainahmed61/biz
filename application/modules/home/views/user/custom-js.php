<?php
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 11-May-18
 * Time: 2:00 AM
 */
?>
<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
  location.reload();
}

function showPosition(position) {
 
document.cookie = "glo_lat="+position.coords.latitude;
document.cookie = "glo_long="+position.coords.longitude;
  //x.innerHTML = "Latitude: " + position.coords.latitude + 
  //"<br>Longitude: " + position.coords.longitude;
  console.log("Latitude: " + position.coords.latitude);
  console.log("Longitude: " + position.coords.longitude);
}
</script>
<script type="text/javascript">
    var ref_this;
    var mode;
    $(document).ready(function () {
        console.clear();
        var $loadMoreButton = $('.loadMore');
        var $categoryType = $(".categoryType");
        var $categoryMode = $(".categoryMode");
        var draw, type, mode, resEl;

        type = 'recent';
        mode = 'buy';
        resEl = '#producstListResponse';
        draw = 1;

        console.log(type);
        console.log(mode);
        $categoryType.on("click", function () {

            type = $(this).val();
            if (type == '') {
                $categoryType.removeClass('active');
                type = $(this).attr("value");
                $(this).addClass("value");
            }
            draw = 1;
            $(resEl).empty();
            getAuction(mode, type, draw, resEl);
        });

        $categoryMode.on("click", function () {
            mode = $(this).val();
            draw = 1;
            $(resEl).empty();
            getAuction(mode, type, draw, resEl);
        });
        getAuction(mode, type, draw, resEl);

        function getAuction(mode, type, auctionDraw, resEl) {

            // mode = 'sell';
            console.log("mode = " + mode);
            console.log("type = " + type);
            console.log("draw = " + auctionDraw);
            // var resSelector = '#'+type+'Response';

            $.ajax({
                url: base_url + "home/getMoreAuctions/?draw=" + auctionDraw + "&mode=" + mode + "&type=" + type,
                type: 'get',
                data: '',
                dataType: "JSON",
                success: function (data) {
                    console.log("ajax: success");
                    //debugger;

                    // 1000     >=  99 * 10
                    if (data.totalNumber >= (auctionDraw * data.pageSize)) {
                        console.log("Valid totalNumber: " + (auctionDraw * data.pageSize));
                        $(".loadMore").show();
                        console.log(resEl);
                        $(resEl).append(data.html);
                        // console.log(data.html);
                    }
                    else {
                        console.log("Not valid totalNumber" + (auctionDraw * data.pageSize));
                        $(".loadMore").hide();
                        console.log("i am no more auction");
                        console.log(resEl);
                        $(resEl).append(data.html);
                        //$(resEl).empty();
                    }
                    console.log(data.totalNumber + " >= ( " + auctionDraw + " * " + data.pageSize + ")");
                    console.log(data.totalNumber + " >= "+ (auctionDraw * data.pageSize));
                    draw++;

                },
                error: function () {
                    alert("Please check your internet !");
                    //draw++;
                }
            });
        }

        function getAuction_recent_in(mode) {
            console.log("GET AUCTION");
            $.ajax({
                url: base_url + "home/getMoreAuctions/?draw=1&type=" + mode + "&case=recent",
                type: 'get',
                data: '',
                dataType: "JSON",
                success: function (data) {
                    console.log(data);

                    // 1000     >=  99 * 10
                    if (data.totalNumber >= (draw * data.pageSize)) {
                        console.log(data.totalNumber + " >= ( " + draw + " * " + data.pageSize + ")");
                        // console.log (data.html);
                        $('#response').html('');
                        $('#response').append(data.html);
                        if (data.totalNumber == (draw * data.pageSize)) {
                            $(".loadMore").hide();
                        }
                    }
                    else {
                        $(".loadMore").hide();
                        $('#response').append(data.html);
                    }
                    //console.log (data.totalNumber+" >= ( "+draw+" * "+data.pageSize+")");
                    //recent_draw++;
                    //$('#response').html('<h2>here will be the template</h2>');
                }
            });
        }

        function getAuction_trending(mode) {
            console.log("GET AUCTION trending");
            $.ajax({
                url: base_url + "home/getMoreAuctions/?draw=" + trending_draw + "&type=" + mode + "&case=trending",
                type: 'get',
                data: '',
                dataType: "JSON",
                success: function (data) {
                    console.log(data);

                    // 1000     >=  99 * 10
                    if (data.totalNumber >= (trending_draw * data.pageSize)) {
                        console.log(data.totalNumber + " >= ( " + trending_draw + " * " + data.pageSize + ")");
                        // console.log (data.html);
                        $('#response_trending').append(data.html);
                        if (data.totalNumber == (trending_draw * data.pageSize)) {
                            $(".loadMore_trending").hide();
                        }
                    }
                    else {
                        $(".loadMore_trending").hide();
                        $('#response_trending').append(data.html);
                    }
                    //console.log (data.totalNumber+" >= ( "+draw+" * "+data.pageSize+")");
                    trending_draw++;


                    //$('#response').html('<h2>here will be the template</h2>');

                }
            });
        }

        function getAuction_trending_in(mode) {
            console.log("GET AUCTION trending");
            $.ajax({
                url: base_url + "home/getMoreAuctions/?draw=1&type=" + mode + "&case=trending",
                type: 'get',
                data: '',
                dataType: "JSON",
                success: function (data) {
                    console.log(data);

                    // 1000     >=  99 * 10
                    if (data.totalNumber >= (trending_draw * data.pageSize)) {
                        console.log(data.totalNumber + " >= ( " + trending_draw + " * " + data.pageSize + ")");
                        // console.log (data.html);
                        $('#response_trending').html('');
                        $('#response_trending').append(data.html);
                        if (data.totalNumber == (trending_draw * data.pageSize)) {
                            $(".loadMore_trending").hide();
                        }
                    }
                    else {
                        $(".loadMore_trending").hide();
                        $('#response_trending').append(data.html);
                    }
                    //console.log (data.totalNumber+" >= ( "+draw+" * "+data.pageSize+")");
                    //trending_draw++;


                    //$('#response').html('<h2>here will be the template</h2>');

                }
            });
        }

        // getAuction_recent(mode);
        //getAuction_trending();


        //console.log("$loadMoreButton");
        //console.log($loadMoreButton);

        $loadMoreButton.on('click', function () {
            console.log("loadMore click");
            getAuction(mode, type, draw,resEl);

        });

    });
</script>
