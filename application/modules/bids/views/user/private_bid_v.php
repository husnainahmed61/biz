<!-- DASHBOARD CONTENT -->
<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline statement primary">
        <h4>Bids Detail</h4>
      
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
                <p class="text-header small">Bidder Type</p>
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
        <div id="auction_bids_list" class="bids_list">
            
        </div>
        <!-- PAGER -->
        <div class="pager-wrap">
            <ul class="pager primary pagination" id="bidsPagination">
                <!-- <div class="pager-item"><p>1</p></div>
                <div class="pager-item active"><p>2</p></div> -->
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
                    <canvas class="lines-graph-chart2"></canvas>
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
                <br>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Supplier Name</th>
                <?php foreach ($item_spec as $key => $value) { ?>
                   <th><?=$value['criteria']?> : <?=$value['measurement']?></th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach ($supplierSpec as $key => $value) { ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$value['first_name'].' '.$value['last_name']?> </td>
                <?php foreach ($value['supplier_spec'] as $key => $val) { ?>
                <td><?=$val['user_data']?></td>
                <?php } ?>
            </tr>
            <?php $i++; } ?>
            
            
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Supplier Name</th>
                <?php foreach ($item_spec as $key => $value) { ?>
                   <th><?=$value['criteria']?> : <?=$value['measurement']?></th>
                <?php } ?>
            </tr>
        </tfoot>
    </table>
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
