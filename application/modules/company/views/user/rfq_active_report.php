<?php 
//echo "<pre>";
//print_r($active_rfq);
?>
<style type="text/css">
	.transaction-list-item p {
		line-height: 0px;
	}
</style>
<!-- DASHBOARD CONTENT -->
<div class="dashboard-content">
<!-- HEADLINE -->
<div class="headline statement primary">
    <h4>Reports</h4>
	
	
	<form id="statement_filter_form" name="statement_filter_form" class="statement-form" method="post" action="<?=base_url()?>company/reports">
		<button type="submit" class="button primary" name="excel" value="generateXLS" style="margin: 0px 15px 0 0;">Download in excel</button>
		<button form="statement_filter_form" class="button dark-light" style="margin: 0px 13px 0 0;">Refine Search</button>
		<!-- DATEPICKER -->
		<div class="datepicker-wrap">
			<input type="date" id="date_from" name="date_from" class="" required>
			<!-- <span class="icon-calendar"></span> -->
		</div>
		<!-- /DATEPICKER -->
		<label style="line-height: 24px;">to:</label>
		<!-- DATEPICKER -->
		<div class="datepicker-wrap">
			<input type="date" id="date_to" name="date_to" class="" required>
			<!-- <span class="icon-calendar"></span> -->
		</div>
		<!-- /DATEPICKER -->
		<label for="ss_filter" class="select-block">
			<select name="ss_filter" id="ss_filter">
				<option value="pr_pending">PR Pending</option>
				<option value="rfq_pending">RFQ Pending</option>
				<option value="rfq_active">RFQ Active</option>
				<option value="po_pending">PO Pending</option>
				<option value="po_approved">PO Approved</option>
				<option value="quatation_recieved">Quotation Received</option>
				<option value="">Total Purchase Value</option>
				<option value="">Total cost saving</option>
				<option value="">Case Closed</option>
				<option value="">Quotation per RFQ</option>
				<option value="">Hours Saved</option>
				<option value="">Avg Suppliers' Response Time</option>
				
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

<!-- SALE DATA -->
<div class="sale-data row" style="margin-right: 0px;margin-left: 0px">
	<!-- SALE DATA ITEM -->
	<div class="sale-data-item col-sm-3">
		<span class="sl-icon icon-present"></span>
		<p class="text-header big">3</p>
		<div class="sale-data-item-info">
			<p class="text-header">Quotation Received per RFQ 	</p>
			<p>In this Month</p>
		</div>
	</div>
	<!-- /SALE DATA ITEM-->

	<!-- SALE DATA ITEM -->
	<div class="sale-data-item col-sm-3">
		<span class="sl-icon icon-present"></span>
		<p class="text-header big">900</p>
		<div class="sale-data-item-info">
			<p class="text-header">Quotation Received</p>
			<p>In this Month</p>
		</div>
	</div>
	<!-- /SALE DATA ITEM-->

	<!-- SALE DATA ITEM -->
	<div class="sale-data-item col-sm-3">
		<span class="sl-icon icon-tag"></span>
		<p class="text-header big">3 hrs</p>
		<div class="sale-data-item-info">
			<p class="text-header">Suppliers Response Time</p>
			<p>In this Month</p>
		</div>
	</div>
	<!-- /SALE DATA ITEM-->

	<!-- SALE DATA ITEM -->
	<div class="sale-data-item col-sm-3">
		<span class="sl-icon icon-wallet"></span>
		<p class="text-header big">2 hrs</p>
		<div class="sale-data-item-info">
			<p class="text-header">Hours Saved</p>
			<p>In this Month</p>
		</div>
	</div>
	<!-- /SALE DATA ITEM-->
</div>
<!-- /SALE DATA -->

<!-- TRANSACTION LIST -->
<div class="transaction-list">
	<!-- TRANSACTION LIST HEADER -->
	<div class="transaction-list-header">
		<div class="transaction-list-header-date">
			<p class="text-header small">Expiry Date</p>
		</div>
		<div class="transaction-list-header-author">
			<p class="text-header small">Ad Details</p>
		</div>
		<div class="transaction-list-header-item">
			<p class="text-header small">Additional Info</p>
		</div>
		<div class="transaction-list-header-detail">
			<p class="text-header small">Lowest Bid</p>
		</div>
		<div class="transaction-list-header-code">
			<p class="text-header small">Status</p>
		</div>
		
		
	</div>
	<!-- /TRANSACTION LIST HEADER -->
	<?php foreach ($active_rfq as $key => $value) { ?>
	<!-- TRANSACTION LIST ITEM -->
	<div class="transaction-list-item">
		<div class="transaction-list-item-date">
			<p><?php $d=explode(' ', $value['expires_at']); print_r($d[0]); ?></p>
		</div>
		<div class="transaction-list-item-author">
			<p class="text-header"><a href=""><?=$value['item_number']?></a></p>
		</div>
		<div class="transaction-list-item-item">
			<div class="purchase-item-info col-xs-2 visible-lg" style="padding-top: 24px; width: auto;">
		        <a href=""><p class="category primary"><?=$value['cat3name']?></p></a>
		    <div class="metadata">
		            <!-- META ITEM -->
		            <div class="meta-item" data-toggle="tooltip" data-placement="left" title="Total Bids">
		                <span class="icon-eye"></span>
		                <p><?=$value['bid_count']?></p>
		            </div>
		            <!-- /META ITEM -->

		            <!-- META ITEM -->
		            <div class="meta-item" data-toggle="tooltip" data-placement="right" title="favourites">
		                <span class="icon-heart"></span>
		                <p><?=$value['favourite_count']?></p>
		            </div>
		            <!-- /META ITEM -->
		        </div>
		    </div>
		</div>
		<div class="transaction-list-item-detail">
			<p><?=$value['lowest_bid']?></p>
		</div>
		<div class="transaction-list-item-code">
			<p><span class="light"><?=($value['status'] == 1 ? ucfirst('Active') : 'InActive')?></span></p>
		</div>

	</div>
	<!-- /TRANSACTION LIST ITEM -->
	<?php	} ?>
	<!-- PAGER -->
	<div class="pager-wrap">
		<div class="pager primary">
			<div class="pager-item"><p>1</p></div>
			<div class="pager-item active"><p>2</p></div>
			<div class="pager-item"><p>3</p></div>
			<div class="pager-item"><p>...</p></div>
			<div class="pager-item"><p>17</p></div>
		</div>
	</div>
	<!-- /PAGER -->
</div>
<!-- /TRANSACTION LIST -->
</div>
<!-- DASHBOARD CONTENT -->