<!-- DASHBOARD CONTENT -->
<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline statement primary">
        <h4>Bids Detail (47515-KODIF)</h4>
      
        <form id="statement_filter_form" name="statement_filter_form" class="statement-form">
            <div style="display: none;">
            <!-- DATEPICKER -->
            <div class="datepicker-wrap">
                <input type="text" id="date_from" name="date_from" class="datepicker" value="02/22/2016">
                <span class="icon-calendar"></span>
            </div>
            <!-- /DATEPICKER -->
            <label>to:</label>
            <!-- DATEPICKER -->
            <div class="datepicker-wrap">
                <input type="text" id="date_to" name="date_to" class="datepicker" value="02/22/2017">
                <span class="icon-calendar"></span>
            </div>
            <!-- /DATEPICKER -->
            </div>
            <label for="ss_filter" class="select-block">
                <select name="ss_filter" id="input-sort">
                    <?php foreach ($sort AS $key => $item){
                        $selected = ($key == 0) ? "selected" : "" ;
                            ?>
                            <option value="<?=$key+1 ?>" <?= $selected ?>><?= $item['text']?></option>
                    <?php   }?>
                </select>
                <!-- SVG ARROW -->
                <svg class="svg-arrow">
                    <use xlink:href="#svg-arrow"></use>
                </svg>
                <!-- /SVG ARROW -->
            </label>
        </form>
    </div>
    <!-- /HEADLINE -->

    <!-- TRANSACTION LIST -->
    <div class="transaction-list bid-details-table">
        <!-- TRANSACTION LIST HEADER -->
        <div class="transaction-list-header">
            <div class="transaction-list-header-date">
                <p class="text-header small">No</p>
            </div>
            <div class="transaction-list-header-author">
                <p class="text-header small">Bidder Name</p>
            </div>
            <div class="transaction-list-header-item">
                <p class="text-header small">User Rating</p>
            </div>
            <div class="transaction-list-header-detail">
                <p class="text-header small">Location</p>
            </div>
            <div class="transaction-list-header-code">
                <p class="text-header small">Submission date</p>
            </div>
            <div class="transaction-list-header-price">
                <p class="text-header small">Bid Code</p>
            </div>
            <div class="transaction-list-header-cut">
                <p class="text-header small">Bid Amount</p>
            </div>
            <div class="transaction-list-header-earnings">
                <p class="text-header small">Actions</p>
            </div>
        </div>
        <!-- /TRANSACTION LIST HEADER -->

        <!-- TRANSACTION LIST ITEM -->

        <div class="transaction-list-item">
            <div class="transaction-list-item-date">
                <p>1</p>
            </div>
            <div class="transaction-list-item-author">
                <p class="text-header"><a href="#">Robert Bosch GmbH</a></p>
            </div>
            <div class="transaction-list-item-item">
                <div class="user-rating">
                    <ul class="rating tooltip" title="Author's Reputation" style="position: inherit;opacity: 1;">
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                    </ul>
                </div>
            </div>
            <div class="transaction-list-item-detail">
                <p>Saudi Arabia</p>
            </div>
            <div class="transaction-list-item-code">
                <p>
                    <span class="light">1st aug,2019</span>
                </p>
            </div>
            <div class="transaction-list-item-price">
                <p>ABC-0000001-001</p>
            </div>
            <div class="transaction-list-item-cut">
                <p><span class="light">1000</span></p>
            </div>
            <div class="transaction-list-item-earnings">
                <div class="recommendation-wrap bid_actions">
                    <a href="#" class="recommendation good hoverable open-recommendation-form icon-dectick action"
                       style="" data-method="accept" data-id="">
                        <span class="tick-icon">✓</span>
                    </a>
                    <a href="#" class="recommendation bad hoverable open-recommendation-form icon-dectick action "
                    style="" data-method="cancel" data-id="" >
                        <span class="close-icon">✕</span>
                    </a>
                </div>
            </div>
            <div class="transaction-list-item-icon">
                <div class="transaction-icon primary">
                    <!-- SVG PLUS -->
                    <svg class="svg-plus">
                        <use xlink:href="#svg-plus"></use>
                    </svg>
                    <!-- /SVG PLUS -->
                </div>
            </div>
        </div>
        <!-- /TRANSACTION LIST ITEM -->
         <!-- TRANSACTION LIST ITEM -->

        <div class="transaction-list-item">
            <div class="transaction-list-item-date">
                <p>1</p>
            </div>
            <div class="transaction-list-item-author">
                <p class="text-header"><a href="#">Denso Corp</a></p>
            </div>
            <div class="transaction-list-item-item">
                <div class="user-rating">
                    <ul class="rating tooltip" title="Author's Reputation" style="position: inherit;opacity: 1;">
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                    </ul>
                </div>
            </div>
            <div class="transaction-list-item-detail">
                <p>Iran</p>
            </div>
            <div class="transaction-list-item-code">
                <p>
                    <span class="light">2nd aug,2019</span>
                </p>
            </div>
            <div class="transaction-list-item-price">
                <p>ABC-0000001-002</p>
            </div>
            <div class="transaction-list-item-cut">
                <p><span class="light">2000</span></p>
            </div>
            <div class="transaction-list-item-earnings">
                <div class="recommendation-wrap bid_actions">
                    <a href="#" class="recommendation good hoverable open-recommendation-form icon-dectick action"
                       style="" data-method="accept" data-id="">
                        <span class="tick-icon">✓</span>
                    </a>
                    <a href="#" class="recommendation bad hoverable open-recommendation-form icon-dectick action "
                    style="" data-method="cancel" data-id="" >
                        <span class="close-icon">✕</span>
                    </a>
                </div>
            </div>
            <div class="transaction-list-item-icon">
                <div class="transaction-icon primary">
                    <!-- SVG PLUS -->
                    <svg class="svg-plus">
                        <use xlink:href="#svg-plus"></use>
                    </svg>
                    <!-- /SVG PLUS -->
                </div>
            </div>
        </div>
        <!-- /TRANSACTION LIST ITEM -->
         <!-- TRANSACTION LIST ITEM -->

        <div class="transaction-list-item">
            <div class="transaction-list-item-date">
                <p>1</p>
            </div>
            <div class="transaction-list-item-author">
                <p class="text-header"><a href="#">Magna International Inc</a></p>
            </div>
            <div class="transaction-list-item-item">
                <div class="user-rating">
                    <ul class="rating tooltip" title="Author's Reputation" style="position: inherit;opacity: 1;">
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                        <li class="rating-item">
                            <!-- SVG STAR -->
                            <svg class="svg-star">
                                <use xlink:href="#svg-star"></use>
                            </svg>
                            <!-- /SVG STAR -->
                        </li>
                    </ul>
                </div>
            </div>
            <div class="transaction-list-item-detail">
                <p>Armenia</p>
            </div>
            <div class="transaction-list-item-code">
                <p>
                    <span class="light">1st aug,2019</span>
                </p>
            </div>
            <div class="transaction-list-item-price">
                <p>ABC-0000001-003</p>
            </div>
            <div class="transaction-list-item-cut">
                <p><span class="light">3000</span></p>
            </div>
            <div class="transaction-list-item-earnings">
                <div class="recommendation-wrap bid_actions">
                    <a href="#" class="recommendation good hoverable open-recommendation-form icon-dectick action"
                       style="" data-method="accept" data-id="">
                        <span class="tick-icon">✓</span>
                    </a>
                    <a href="#" class="recommendation bad hoverable open-recommendation-form icon-dectick action "
                    style="" data-method="cancel" data-id="" >
                        <span class="close-icon">✕</span>
                    </a>
                </div>
            </div>
            <div class="transaction-list-item-icon">
                <div class="transaction-icon primary">
                    <!-- SVG PLUS -->
                    <svg class="svg-plus">
                        <use xlink:href="#svg-plus"></use>
                    </svg>
                    <!-- /SVG PLUS -->
                </div>
            </div>
        </div>
        <!-- /TRANSACTION LIST ITEM -->
        <!-- PAGER -->
        <div class="pager-wrap">
            <ul class="pager primary pagination" id="bidsPagination">
                <div class="pager-item"><p>1</p></div>
                <div class="pager-item active"><p>2</p></div>
            </ul>
        </div>
        <!-- /PAGER -->
    </div>
    <!-- /TRANSACTION LIST -->
     <!-- FORM BOX ITEM -->
     <br>
                <div class="form-box-item full has-chart-filter-full">
                    <h4>Bids Graphic Representation</h4>
                    <hr class="line-separator">
                    <canvas class="lines-graph-chart"></canvas>
                    <!-- CHART FILTERS -->
                    <div class="chart-filters">
                        <!-- CHART FILTER -->
                        <div class="chart-filter">
                            <form>
                                <label for="period4" class="select-block">
                                    <select name="period4" id="period4">
                                        <option value="0">This Month</option>
                                        <option value="1">This Year</option>
                                    </select>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </label>
                            </form>
                        </div>
                        <!-- /CHART FILTER -->
                    </div>
                    <!-- /CHART FILTERS -->
                </div>
                <!-- /FORM BOX ITEM -->
</div>
<!-- DASHBOARD CONTENT -->
<script type="text/javascript">
    function accept_bid(bid_id) {
        var $confirm = confirm("Are you sure to Accept this bid, if you click 'Ok' then it can.");
            // alert(bid_id);
            // return;
            if($confirm == true) {
            $.ajax({
                url: base_url + "bids/accept_bid/"+bid_id,
                type: 'post',
                data: bid_id,
                dataType:"JSON",
                success: function (data) {
                    console.log(data);
                    if (data.status === true) {
                        showstatusMessage('messageSuccess',data.title, data.message , 4000);
                    }
                    else{
                        showstatusMessage('messageError', data.title, data.message, 4000);
                    }
                    window.setTimeout(function(){location.reload()},3000);
                }
            });
        }

        }

    function cancel_bid(bid_id) {
        var $confirm = confirm("Are you sure to Declined this bid, if you click 'Ok' then it can.");
            // alert(bid_id);
            // return;
            if($confirm == true) {
            $.ajax({
                url: base_url + "bids/cancel_bid/"+bid_id,
                type: 'post',
                data: bid_id,
                dataType:"JSON",
                success: function (data) {
                    console.log(data);
                    if (data.status === true) {
                        showstatusMessage('messageSuccess',data.title, data.message , 4000);
                    }
                    else{
                        showstatusMessage('messageError', data.title, data.message, 4000);
                    }
                    window.setTimeout(function(){location.reload()},3000);
                }
            });
        }

        }    

</script>
