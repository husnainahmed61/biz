<!-- DASHBOARD CONTENT -->
<div class="dashboard-content">
    <!-- HEADLINE -->
    <div class="headline statement primary">
        <h4>User Bids</h4>
        <form id="statement_filter_form" name="statement_filter_form" class="statement-form">
            <label for="ss_filter" class="select-block">
                <select name="ss_filter" id="input-type-private">
                    <option value="buy">Buying Posts</option>
                    <option value="sell">Selling Auctions</option>
                </select>
                <!-- SVG ARROW -->
                <svg class="svg-arrow">
                    <use xlink:href="#svg-arrow"></use>
                </svg>
                <!-- /SVG ARROW -->
            </label>
            <label for="ss_filter" class="select-block">
                <select name="date_filter" id="input-sort-bids">
                    <?php foreach ($sort AS $key => $item){
                        $selected = ($key == 0) ? "selected" : "" ;
                            ?>
                            <option value="<?=$key+1 ?>" <?= $selected ?> ><?= $item['text']?></option>
                    <?php   } ?>
                </select>
                <!-- SVG ARROW -->
                <svg class="svg-arrow">
                    <use xlink:href="#svg-arrow"></use>
                </svg>
                <!-- /SVG ARROW -->
            </label>
            <label for="ss_filter" class="select-block">
                <select name="date_filter" id="input-currency">
                    <option selected value="">- Select Currency -</option>
                        <?php foreach ($currency AS $key => $item){
                            //$selected = ($key == 0) ? "selected" : "" ;
                            ?>
                    <option value="<?=$item['name'] ?>"><?= $item['name']?></option>
                <?php } ?>
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

<div class="purchases-list col-sm-12 purchase-lst-cs">
        <!-- PURCHASES LIST HEADER -->
        <div class="purchases-list-header row">
            <div class="col-xs-1">
                <p class="text-header small">Date</p>
            </div>
            <div class="col-xs-4 purchase-item-details-list">
                <p class="text-header small">Ad Details</p>
            </div>
            <div class="col-xs-2 ">
                <p class="text-header small">Additional Info</p>
            </div>
            <div class="col-xs-1  ">
                <p class="text-header small text-center">Bid amount</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small text-center">Bid status</p>
            </div>
            <div class="col-xs-2">
                <p class="text-header small text-center">Ad Settings</p>
            </div>
        </div>
        <!-- /PURCHASES LIST HEADER -->
        
        <div class="bids_list">

        </div>
          

        <!-- PAGER -->
        <div class="pager-wrap">
            <div class="pager primary pagination" id="buyPagination">
                <div class="pager-item"><p>1</p></div>
                <div class="pager-item active"><p>2</p></div>
                <div class="pager-item"><p>3</p></div>
                <div class="pager-item"><p>...</p></div>
                <div class="pager-item"><p>17</p></div>
            </div>
        </div>
        <!-- /PAGER -->
    </div>
   
</div>
<!-- DASHBOARD CONTENT -->

