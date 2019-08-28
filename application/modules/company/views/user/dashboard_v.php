        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline simple primary">
                <h4>Dashboard</h4>
            </div>
            <!-- /HEADLINE -->

			<!-- GRAPH STATS LIST -->
			<div class="graph-stats-list">
				<!-- GRAPH STATS LIST ITEM -->
				<div class="graph-stats-list-item green bars">
					<h2>300</h2>
					<p class="text-header">RFQ raised this month</p>
					<p>Avg 10 per Day</p>
				</div>
				<!-- /GRAPH STATS LIST ITEM -->

				<!-- GRAPH STATS LIST ITEM -->
				<div class="graph-stats-list-item violet line">
					<h2>900</h2>
					<p class="text-header">Quotations Rec. this Month</p>
					<p>Avg 3 per RFQ</p>
				</div>
				<!-- /GRAPH STATS LIST ITEM -->

				<!-- GRAPH STATS LIST ITEM -->
				<div class="graph-stats-list-item blue step">
					<h2>150</h2>
					<p class="text-header">Orders Placed this Month</p>
					<p>Avg 5 per Day</p>
				</div>
				<!-- /GRAPH STATS LIST ITEM -->

				<!-- GRAPH STATS LIST ITEM -->
				<div class="graph-stats-list-item red curve">
					<h2>30</h2>
					<p class="text-header">New Suppliers this Month</p>
					<p>Avg 1 per Day</p>
				</div>
				<!-- /GRAPH STATS LIST ITEM -->
			</div>
			<!-- /GRAPH STATS LIST -->

			<!-- FORM BOX ITEMS -->
			<div class="form-box-items">
				<!-- FORM BOX ITEM -->
				<div class="form-box-item full has-chart-filter">
					<h4>Users' Day wise Activities Chart</h4>
					<hr class="line-separator">
					<canvas class="main-activity-chart"></canvas>
					<!-- CHART FILTERS -->
					<div class="chart-filters">
						<!-- CHART FILTER -->
						<div class="chart-filter">
							<span class="sl-icon icon-user"></span>
							<p class="text-header">Arif</p>
						</div>
						<!-- /CHART FILTER -->

						<!-- CHART FILTER -->
						<div class="chart-filter">
							<span class="sl-icon icon-user"></span>
							<p>Salman</p>
						</div>
						<!-- /CHART FILTER -->

						<!-- CHART FILTER -->
						<div class="chart-filter">
							<span class="sl-icon icon-user"></span>
							<p>Altaf</p>
						</div>
						<!-- /CHART FILTER -->

						<!-- CHART FILTER -->
						<div class="chart-filter">
							<span class="sl-icon icon-user"></span>
							<p>Shahid</p>
						</div>
						<!-- /CHART FILTER -->

						<!-- CHART FILTER -->
						<div class="chart-filter">
							<form>
								<label for="period1" class="select-block">
									<select name="period1" id="period1">
										<option value="0">PR Pending</option>
										<option value="1">PR Approved</option>
										<option value="2">RFQ Pending</option>
										<option value="3">RFQ Active</option>
										<option value="4">PO Pending</option>
										<option value="5">Case Closed</option>
										<option value="6">Cost Saving</option>
										<option value="7">Hours Saved</option>
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
			<!-- /FORM BOX ITEMS -->
			
			<!-- FORM BOX ADDON -->
			<div class="form-box-addon">
				<!-- CHART WRAP -->
				<div style= "display:none" class="chart-wrap">
					<div class="main-activity-pie-chart-wrap">
						<canvas class="main-activity-pie-chart"></canvas>
					</div>
					<!-- CHART LEGEND -->
					<div class="chart-legend">
						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color lightgreen"></div>
							<p>Earnings</p>
						</div>
						<!-- /CHART LEGEND ITEM -->

						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color blue"></div>
							<p>Revenue</p>
						</div>
						<!-- /CHART LEGEND ITEM -->
					</div>
					<!-- /CHART LEGEND -->
				</div>
				<!-- /CHART WRAP -->
				
				<!-- CHART META WRAP -->
				<div class="chart-meta-wrap">
					<!-- CHART META -->
					<div class="chart-meta">
						<!-- CHART META ITEM -->
						<div class="chart-meta-item">
							<p class="price"><span>Rs.</span>1,000,000</p>
							<p class="text-header small">Total Purchase Value</p>
							<p>This Month</p>
						</div>
						<!-- /CHART META ITEM -->

						<!-- CHART META ITEM -->
						<div class="chart-meta-item">
							<p class="price"><span>Rs.</span>100,000</p>
							<p class="text-header small">Total cost saving</p>
							<p>This Month</p>
						</div>
						<!-- /CHART META ITEM -->

						<!-- CHART META ITEM -->
						<div class="chart-meta-item">
							<p class="text-header">4.5</p>
							<p class="text-header small">Daily Case Closed</p>
							<p>Average</p>
						</div>
						<!-- /CHART META ITEM -->

						<!-- CHART META ITEM -->
						<div class="chart-meta-item">
							<p class="text-header">20</p>
							<p class="text-header small">Total Hours Saved</p>
							<p>This Month</p>
						</div>
						<!-- /CHART META ITEM -->

						<!-- CHART META ITEM -->
						<div style= "display:none" class="chart-meta-item">
							<p class="price"><span>$</span>18.06</p>
							<p class="text-header small">Daily Earnings</p>
							<p>Average</p>
						</div>
						<!-- /CHART META ITEM -->
					</div>
					<!-- /CHART META -->
				</div>
				<!-- /CHART META WRAP -->
			</div>
			<!-- /FORM BOX ADDON -->

			<!-- FORM BOX ITEMS -->
			<div class="form-box-items wrap-3-1 left">
				<!-- FORM BOX ITEM -->
				<div class="form-box-item full not-padded not-spaced">
					<h4>Recent Activity</h4>
					<hr class="line-separator">
					<!-- RECENT ACTIVITY -->
					<div class="recent-activity">
						<!-- RECENT ACTIVITY ITEM -->
						<div class="recent-activity-item">
							<span class="sl-icon icon-envelope"></span>
							<div class="recent-activity-item-timestamp">
								<p>2 Hours Ago</p>
							</div>
							<div class="recent-activity-item-info">
								<figure class="user-avatar small">
									<img src="<?=base_url()?>assets_u/images/avatars/avatar_02.jpg" alt="user-image">
								</figure>
								<p><a href=""><span class="bold">Yazaki Corp.</span></a> messaged regarding RFQ of <a href=""><span class="bold">Knuckles</span></a>. Check Inbox</p>
							</div>
							<!-- CLOSE ICON -->
							<img src="<?=base_url()?>assets_u/images/dashboard/notif-close-icon.png" alt="close-icon">
							<!-- /CLOSE ICON -->
						</div>
						<!-- /RECENT ACTIVITY ITEM -->

						<!-- RECENT ACTIVITY ITEM -->
						<div class="recent-activity-item">
							<span class="sl-icon icon-present"></span>
							<div class="recent-activity-item-timestamp">
								<p>10 Hours Ago</p>
							</div>
							<div class="recent-activity-item-info">
								<figure class="user-avatar small">
									<img src="<?=base_url()?>assets_u/images/avatars/avatar_01.jpg" alt="user-image">
								</figure>
								<p>Your RFQ <a href=""><span class="bold">Nut Bolt 4.3mm</span></a> is expired now</p>
							</div>
							<!-- CLOSE ICON -->
							<img src="<?=base_url()?>assets_u/images/dashboard/notif-close-icon.png" alt="close-icon">
							<!-- /CLOSE ICON -->
						</div>
						<!-- /RECENT ACTIVITY ITEM -->

						<!-- RECENT ACTIVITY ITEM -->
						<div class="recent-activity-item">
							<span class="sl-icon icon-tag"></span>
							<div class="recent-activity-item-timestamp">
								<p>18 Hours Ago</p>
							</div>
							<div class="recent-activity-item-info">
								<figure class="user-avatar small">
									<img src="<?=base_url()?>assets_u/images/avatars/avatar_04.jpg" alt="user-image">
								</figure>
								<p><a href=""><span class="bold">Continental AG</span></a> has placed a bid on your RFQ <a href=""><span class="bold">Shoes 7" Required</span></a></p>
							</div>
							<!-- CLOSE ICON -->
							<img src="<?=base_url()?>assets_u/images/dashboard/notif-close-icon.png" alt="close-icon">
							<!-- /CLOSE ICON -->
						</div>
						<!-- /RECENT ACTIVITY ITEM -->

						<!-- RECENT ACTIVITY ITEM -->
						<div class="recent-activity-item">
							<span class="sl-icon icon-bubble"></span>
							<div class="recent-activity-item-timestamp">
								<p>1 Day Ago</p>
							</div>
							<div class="recent-activity-item-info">
								<figure class="user-avatar small">
									<img src="<?=base_url()?>assets_u/images/avatars/avatar_04.jpg" alt="user-image">
								</figure>
								<p><a href=""><span class="bold">Robert Bosch GmbH</span></a> posted a question on your RFQ <a href=""><span class="bold">CNC machining parts</span></a></p>
							</div>
							<!-- CLOSE ICON -->
							<img src="<?=base_url()?>assets_u/images/dashboard/notif-close-icon.png" alt="close-icon">
							<!-- /CLOSE ICON -->
						</div>
						<!-- /RECENT ACTIVITY ITEM -->

						<!-- RECENT ACTIVITY ITEM -->
						<div style="display:none" class="recent-activity-item">
							<span class="sl-icon icon-heart"></span>
							<div class="recent-activity-item-timestamp">
								<p>3 Days Ago</p>
							</div>
							<div class="recent-activity-item-info">
								<figure class="user-avatar small">
									<img src="<?=base_url()?>assets_u/images/avatars/avatar_06.jpg" alt="user-image">
								</figure>
								<p><a href=""><span class="bold">Sarah-Imaginarium</span></a> added <a href=""><span class="bold">City Landscape Icons</span></a> to favourites</p>
							</div>
							<!-- CLOSE ICON -->
							<img src="<?=base_url()?>assets_u/images/dashboard/notif-close-icon.png" alt="close-icon">
							<!-- /CLOSE ICON -->
						</div>
						<!-- /RECENT ACTIVITY ITEM -->

						<!-- RECENT ACTIVITY ITEM -->
						<div class="recent-activity-item">
							<span class="sl-icon icon-wallet"></span>
							<div class="recent-activity-item-timestamp">
								<p>6 Weeks Ago</p>
							</div>
							<div class="recent-activity-item-info">
								<figure class="user-avatar small">
									<img src="<?=base_url()?>assets_u/images/avatars/avatar_01.jpg" alt="user-image">
								</figure>
								<p>Your RFQ <a href=""><span class="bold">Lubricant</span></a> is successfully closed now</p>
							</div>
							<!-- CLOSE ICON -->
							<img src="<?=base_url()?>assets_u/images/dashboard/notif-close-icon.png" alt="close-icon">
							<!-- /CLOSE ICON -->
						</div>
						<!-- /RECENT ACTIVITY ITEM -->
					</div>
					<!-- /RECENT ACTIVITY -->
				</div>
				<!-- /FORM BOX ITEM -->

				<!-- FORM BOX ITEM -->
				<div class="form-box-item full has-chart-filter-full">
					<h4>Supplier Performance</h4>
					<hr class="line-separator">
					<canvas class="lines-graph-chart"></canvas>
					<!-- CHART FILTERS -->
					<div class="chart-filters">
						<!-- CHART FILTER -->
						<div class="chart-filter">
							<form>
								<label for="period5" class="select-block">
									<select name="period5" id="period5">
										<option value="0">Select Criteria</option>
										<option value="1">Response Time</option>
										<option value="1">Negotiation Discount</option>
										<option value="1">Total Order Value</option>
										<option value="1">Bids Awaiting</option>
										<option value="1">Messages Received</option>
										</select>
									<!-- SVG ARROW -->
									<svg class="svg-arrow">
										<use xlink:href="#svg-arrow"></use>
									</svg>
									<!-- /SVG ARROW -->
								</label>
							</form>
						</div>
						<div class="chart-filter">
							<form>
								<label for="period5" class="select-block">
									<select name="period5" id="period5">
										<option value="0">Select Supplier</option>
										<option value="1">Robert Bosch</option>
										<option value="1">Denso Corp</option>
										<option value="1">Magna Inc</option>
									</select>
									<!-- SVG ARROW -->
									<svg class="svg-arrow">
										<use xlink:href="#svg-arrow"></use>
									</svg>
									<!-- /SVG ARROW -->
								</label>
							</form>
						</div>
						<div class="chart-filter">
							<form>
								<label for="period5" class="select-block">
									<select name="period5" id="period5">
										<option value="0">Select Category</option>
										<option value="0">Auto mobile Parts</option>
										<option value="1">Plumbing Tools</option>
										<option value="1">Woodwork Tools</option>
										<option value="1">Electrical Equipments</option>
										<option value="1">Flooring</option>
								
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

				<!-- FORM BOX ITEMS -->
				<div class="form-box-items wrap-3-1 left">
					<!-- FORM BOX ITEM -->
					<div class="form-box-item full not-padded not-spaced">
						<h4>High Valued Items</h4>
						<hr class="line-separator">
						<!-- POPULAR ITEMS -->
						<div class="popular-items">
							<!-- POPULAR ITEM -->
							<div class="popular-item">
								<div class="popular-item-info">
									<figure class="product-preview-image micro liquid">
										<img src="<?=base_url()?>assets_u/images/items/flyers_s.jpg" alt="product-image">
									</figure>
									<p class="text-header small">Nut Bolt 4.3mm</p>
									<p class="category primary">Auto mobile Parts</p>
								</div>
								<div class="popular-item-meta">
									<!-- METADATA -->
									<div class="metadata">
										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-bubble"></span>
											<p>136</p>
										</div>
										<!-- /META ITEM -->

										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-eye"></span>
											<p>3690</p>
										</div>
										<!-- /META ITEM -->

										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-heart"></span>
											<p>2042</p>
										</div>
										<!-- /META ITEM -->
									</div>
									<!-- /METADATA -->
								</div>
							</div>
							<!-- /POPULAR ITEM -->

							<!-- POPULAR ITEM -->
							<div class="popular-item">
								<div class="popular-item-info">
									<figure class="product-preview-image micro liquid">
										<img src="<?=base_url()?>assets_u/images/items/flyers_s.jpg" alt="product-image">
									</figure>
									<p class="text-header small">Shoes 7" Required</p>
									<p class="category primary">Plumbing Tools</p>
								</div>
								<div class="popular-item-meta">
									<!-- METADATA -->
									<div class="metadata">
										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-bubble"></span>
											<p>96</p>
										</div>
										<!-- /META ITEM -->

										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-eye"></span>
											<p>2510</p>
										</div>
										<!-- /META ITEM -->

										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-heart"></span>
											<p>1005</p>
										</div>
										<!-- /META ITEM -->
									</div>
									<!-- /METADATA -->
								</div>
							</div>
							<!-- /POPULAR ITEM -->

							<!-- POPULAR ITEM -->
							<div class="popular-item">
								<div class="popular-item-info">
									<figure class="product-preview-image micro liquid">
										<img src="<?=base_url()?>assets_u/images/items/flyers_s.jpg" alt="product-image">
									</figure>
									<p class="text-header small">CNC machining parts</p>
									<p class="category primary">Woodwork Tools</p>
								</div>
								<div class="popular-item-meta">
									<!-- METADATA -->
									<div class="metadata">
										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-bubble"></span>
											<p>57</p>
										</div>
										<!-- /META ITEM -->

										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-eye"></span>
											<p>1345</p>
										</div>
										<!-- /META ITEM -->

										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-heart"></span>
											<p>963</p>
										</div>
										<!-- /META ITEM -->
									</div>
									<!-- /METADATA -->
								</div>
							</div>
							<!-- /POPULAR ITEM -->

							<!-- POPULAR ITEM -->
							<div class="popular-item">
								<div class="popular-item-info">
									<figure class="product-preview-image micro liquid">
										<img src="<?=base_url()?>assets_u/images/items/flyers_s.jpg" alt="product-image">
									</figure>
									<p class="text-header small">knuckles Required</p>
									<p class="category primary">Electrical Equipments</p>
								</div>
								<div class="popular-item-meta">
									<!-- METADATA -->
									<div class="metadata">
										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-bubble"></span>
											<p>42</p>
										</div>
										<!-- /META ITEM -->

										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-eye"></span>
											<p>988</p>
										</div>
										<!-- /META ITEM -->

										<!-- META ITEM -->
										<div class="meta-item">
											<span class="icon-heart"></span>
											<p>954</p>
										</div>
										<!-- /META ITEM -->
									</div>
									<!-- /METADATA -->
								</div>
							</div>
							<!-- /POPULAR ITEM -->
						</div>
						<!-- /POPULAR ITEMS -->
					</div>
					<!-- /FORM BOX ITEM -->
				</div>
				<!-- /FORM BOX ITEMS -->

				<!-- FORM BOX ITEMS -->
				<div class="form-box-items wrap-1-3 right">
					<!-- FORM BOX ITEM -->
					<div class="form-box-item full graph-bg">
						<h4>Supplier Response Rate</h4>
						<hr class="line-separator">
						<div class="bounce-pie-chart">
							<p class="text-header big bounce-perc-link">68<span>%</span></p>
							<!--<p class="text-header small">Bounce Back Rate</p>-->
							<p>In this Month</p>
						</div>
					</div>
					<!-- /FORM BOX ITEM -->
				</div>
				<!-- /FORM BOX ITEMS -->

				<div class="clearfix"></div>

				<!-- FORM BOX ITEM -->
				<div class="form-box-item full has-chart-filter-full has-chart-legend">
					<h4>My KPIs</h4>
					<hr class="line-separator">
					<canvas class="double-bar-chart"></canvas>
					<!-- CHART FILTERS -->
					<div class="chart-filters">
						<!-- CHART FILTER -->
						<div class="chart-filter">
							<form>
								<label for="period5" class="select-block">
									<select name="period5" id="period5">
										<option value="0">This Month</option>
										<option value="1" selected>This Year</option>
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

					<!-- CHART LEGEND -->
					<div class="chart-legend inline">
						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color blue"></div>
							<p>Value 01</p>
						</div>
						<!-- /CHART LEGEND ITEM -->

						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color lightgreen"></div>
							<p>Value 02</p>
						</div>
						<!-- /CHART LEGEND ITEM -->
					</div>
					<!-- /CHART LEGEND -->
				</div>
				<!-- /FORM BOX ITEM -->

				<!-- FORM BOX ITEM -->
				<div style="display:none" class="form-box-item full has-chart-filter-full has-chart-legend">
					<h4>Waves Graphic</h4>
					<hr class="line-separator">
					<canvas class="waves-chart"></canvas>
					<!-- CHART FILTERS -->
					<div class="chart-filters">
						<!-- CHART FILTER -->
						<div class="chart-filter">
							<form>
								<label for="period6" class="select-block">
									<select name="period6" id="period6">
										<option value="0">This Month</option>
										<option value="1" selected>This Year</option>
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

					<!-- CHART LEGEND -->
					<div class="chart-legend inline">
						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color red"></div>
							<p>Value 01</p>
						</div>
						<!-- /CHART LEGEND ITEM -->

						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color blue"></div>
							<p>Value 02</p>
						</div>
						<!-- /CHART LEGEND ITEM -->
					</div>
					<!-- /CHART LEGEND -->
				</div>
				<!-- /FORM BOX ITEM -->
			</div>
			<!-- /FORM BOX ITEMS -->

			<!-- FORM BOX ITEMS -->
			<div class="form-box-items wrap-1-3 right">
				<!-- FORM BOX ITEM -->
				<div class="form-box-item full">
					<h4>Total Suppliers</h4>
					<hr class="line-separator">
					<div class="colors-pie-chart-wrap">
						<canvas class="colors-pie-chart"></canvas>
						<!-- CHART DESCRIPTION -->
						<div class="chart-description">
							<p class="text-header">995</p>
							<p class="text-header">Suppliers</p>
						</div>
						<!-- /CHART DESCRIPTION -->
					</div>
					<!-- CHART LEGEND -->
					<div class="chart-legend full">
						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color violet"></div>
							<p>My Suppliers</p>
							<p class="text-header">700</p>
						</div>
						<!-- /CHART LEGEND ITEM -->

						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color lightgreen"></div>
							<p>Vayzn Suggested</p>
							<p class="text-header">200</p>
						</div>
						<!-- /CHART LEGEND ITEM -->

						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color blue"></div>
							<p>Suppliers Direct Contact</p>
							<p class="text-header">95</p>
						</div>
						<!-- /CHART LEGEND ITEM -->
					</div>
					<!-- /CHART LEGEND -->
				</div>
				<!-- /FORM BOX ITEM -->

				<!-- FORM BOX ITEM -->
				<div class="form-box-item full">
					<h4>Your Text Box</h4>
					<hr class="line-separator">
					<!-- PLAIN TEXT BOX -->
					<div class="plain-text-box">
						<!-- PLAIN TEXT BOX ITEM -->
						<div class="plain-text-box-item">
							<p class="text-header">Text Box Title:</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ut ut labore. Eiusmod tempor incididunt ut labore et dolore magna aliqua en derum de lorem consectur labore.</p>
						</div>
						<!-- /PLAIN TEXT BOX ITEM -->

						<!-- PLAIN TEXT BOX ITEM -->
						<div class="plain-text-box-item">
							<p class="text-header">Text Box Title:</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ut ut labore.</p>
						</div>
						<!-- /PLAIN TEXT BOX ITEM -->

						<!-- PLAIN TEXT BOX ITEM -->
						<div class="plain-text-box-item">
							<p class="text-header">Title of Link Text:</p>
							<p><a href="#" class="primary">Click here for the link.</a></p>
						</div>
						<!-- /PLAIN TEXT BOX ITEM -->
					</div>
					<!-- /PLAIN TEXT BOX -->
				</div>
				<!-- /FORM BOX ITEM -->

				<!-- FORM BOX ITEM -->
				<div class="form-box-item full">
					<h4>My Target Status</h4>
					<hr class="line-separator">
					<!-- PG BAR LIST -->
					<div class="pg-bar-list">
						<!-- PG BAR LIST ITEM -->
						<div class="pg-bar-list-item">
							<div class="pg-bar-list-item-info">
								<p class="text-header">Items Procured</p>
								<p class="text-header">86%</p>
							</div>
							<!-- BADGE PROGRESS -->
							<div class="pg1"></div>
							<!-- /BADGE PROGRESS -->
						</div>
						<!-- /PG BAR LIST ITEM -->

						<!-- PG BAR LIST ITEM -->
						<div class="pg-bar-list-item">
							<div class="pg-bar-list-item-info">
								<p class="text-header">RFQ Pending</p>
								<p class="text-header">1200/2000</p>
							</div>
							<!-- BADGE PROGRESS -->
							<div class="pg2"></div>
							<!-- /BADGE PROGRESS -->
						</div>
						<!-- /PG BAR LIST ITEM -->

						<!-- PG BAR LIST ITEM -->
						<div class="pg-bar-list-item">
							<div class="pg-bar-list-item-info">
								<p class="text-header">Cost Saving</p>
								<p class="text-header">90%</p>
							</div>
							<!-- BADGE PROGRESS -->
							<div class="pg3"></div>
							<!-- /BADGE PROGRESS -->
						</div>
						<!-- /PG BAR LIST ITEM -->
					</div>
					<!-- /PG BAR LIST -->
				</div>
				<!-- /FORM BOX ITEM -->

				<!-- FORM BOX ITEM -->
				<div style="display:none" class="form-box-item full has-chart-filter-simple">
					<h4>Social Media</h4>
					<hr class="line-separator">
					<canvas class="social-media-chart" height="300"></canvas>
					<!-- CHART FILTERS -->
					<div class="chart-filters">
						<!-- CHART FILTER -->
						<div class="chart-filter">
							<form>
								<label for="period2" class="select-block">
									<select name="period2" id="period2">
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

				<!-- FORM BOX ITEM -->
				<div class="form-box-item full">
					<h4>Numbers Box</h4>
					<hr class="line-separator">
					<!-- SLIDER WRAP -->
					<div class="slider-wrap">
						<!-- NUMBERS SLIDER -->
						<div class="numbers-slider">
							<!-- NUMBERS SLIDER ITEM -->
							<div class="numbers-slider-item">
								<p class="text-header big">522</p>
								<p class="text-header">Profile Views</p>
								<p>In this month</p>
							</div>
							<!-- /NUMBERS SLIDER ITEM -->

							<!-- NUMBERS SLIDER ITEM -->
							<div class="numbers-slider-item">
								<p class="text-header big">982</p>
								<p class="text-header">Reviews Received</p>
								<p>In this month</p>
							</div>
							<!-- /NUMBERS SLIDER ITEM -->

							<!-- NUMBERS SLIDER ITEM -->
							<div class="numbers-slider-item">
								<p class="text-header big">360</p>
								<p class="text-header">Messages Sent</p>
								<p>In this Month</p>
							</div>
							<!-- /NUMBERS SLIDER ITEM -->

							<!-- NUMBERS SLIDER ITEM -->
							<div class="numbers-slider-item">
								<p class="text-header big">634</p>
								<p class="text-header">Messages Received</p>
								<p>In this Month</p>
							</div>
							<!-- /NUMBERS SLIDER ITEM -->

							<!-- NUMBERS SLIDER ITEM -->
							<div class="numbers-slider-item">
								<p class="text-header big">132</p>
								<p class="text-header">Ratings Received</p>
								<p>In this Month</p>
							</div>
							<!-- /NUMBERS SLIDER ITEM -->
						</div>
						<!-- /NUMBERS SLIDER -->

						<!-- SLIDER PAGER -->
						<div class="slider-pager">
							<a data-slide-index="0" href=""></a>
							<a data-slide-index="1" href=""></a>
							<a data-slide-index="2" href=""></a>
							<a data-slide-index="3" href=""></a>
							<a data-slide-index="4" href=""></a>
						</div>
						<!-- /SLIDER PAGER -->
					</div>
					<!-- /SLIDER WRAP -->
				</div>
				<!-- /FORM BOX ITEM -->

				<!-- FORM BOX ITEM -->
				<div style="display:none" class="form-box-item full has-chart-filter-simple has-chart-legend">
					<h4>Single Bar</h4>
					<hr class="line-separator">
					<canvas class="single-bar-chart" height="300"></canvas>
					<!-- CHART FILTERS -->
					<div class="chart-filters">
						<!-- CHART FILTER -->
						<div class="chart-filter">
							<form>
								<label for="period3" class="select-block">
									<select name="period3" id="period3">
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

					<!-- CHART LEGEND -->
					<div class="chart-legend inline">
						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color blue"></div>
							<p>Value 01</p>
						</div>
						<!-- /CHART LEGEND ITEM -->

						<!-- CHART LEGEND ITEM -->
						<div class="chart-legend-item">
							<div class="chart-legend-item-color lightgreen"></div>
							<p>Value 02</p>
						</div>
						<!-- /CHART LEGEND ITEM -->
					</div>
					<!-- /CHART LEGEND -->
				</div>
				<!-- /FORM BOX ITEM -->
			</div>
			<!-- /FORM BOX ITEMS -->

			<div class="clearfix"></div>

			<!-- FORM BOX ITEMS -->
			<div style="display:none" class="form-box-items">
				<!-- FORM BOX ITEM -->
				<div class="form-box-item full has-chart-filter">
					<h4>Two Lines Big Chart</h4>
					<hr class="line-separator">
					<canvas class="two-lines-chart"></canvas>
					<!-- CHART FILTERS -->
					<div class="chart-filters">
						<!-- CHART FILTER -->
						<div class="chart-filter">
							<!-- CHART LEGEND -->
							<div class="chart-legend inline">
								<!-- CHART LEGEND ITEM -->
								<div class="chart-legend-item">
									<div class="chart-legend-item-color blue"></div>
									<p>Value 01</p>
								</div>
								<!-- /CHART LEGEND ITEM -->

								<!-- CHART LEGEND ITEM -->
								<div class="chart-legend-item">
									<div class="chart-legend-item-color yellow"></div>
									<p>Value 02</p>
								</div>
								<!-- /CHART LEGEND ITEM -->
							</div>
							<!-- /CHART LEGEND -->
						</div>
						<!-- /CHART FILTER -->

						<!-- CHART FILTER -->
						<div class="chart-filter">
							<form>
								<label for="period7" class="select-block">
									<select name="period7" id="period7">
										<option value="0">This Month</option>
										<option value="1" selected>This Year</option>
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
			<!-- /FORM BOX ITEMS -->

			<!-- FORM BOX ITEMS -->
			<div style="display:none" class="form-box-items">
				<!-- FORM BOX ITEM -->
				<div class="form-box-item has-chart-filter">
					<h4>Country Statistics</h4>
					<hr class="line-separator">
					<!-- CHART FILTERS -->
					<div class="chart-filters">
						<!-- CHART FILTER -->
						<div class="chart-filter">
							<!-- CHART LEGEND -->
							<div class="chart-legend inline">
								<!-- CHART LEGEND ITEM -->
								<div class="chart-legend-item">
									<div class="chart-legend-item-color violet"></div>
									<p>Visits</p>
								</div>
								<!-- /CHART LEGEND ITEM -->

								<!-- CHART LEGEND ITEM -->
								<div class="chart-legend-item">
									<div class="chart-legend-item-color yellow"></div>
									<p>Sales</p>
								</div>
								<!-- /CHART LEGEND ITEM -->
							</div>
							<!-- /CHART LEGEND -->
						</div>
						<!-- /CHART FILTER -->
					</div>
					<!-- /CHART FILTERS -->

					<!-- PIE CHART LIST -->
					<div class="pie-chart-list">
						<!-- PIE CHART ITEM -->
						<div class="pie-chart-item">
							<div class="country-chart">
								<canvas class="cc1"></canvas>
							</div>
							<img src="<?=base_url()?>assets_u/images/dashboard/dash-flag01.png" alt="country-image">
							<p class="text-header tiny">United States</p>
							<p>Conversions</p>
						</div>
						<!-- PIE CHART ITEM -->

						<!-- PIE CHART ITEM -->
						<div class="pie-chart-item">
							<div class="country-chart">
								<canvas class="cc2"></canvas>
							</div>
							<img src="<?=base_url()?>assets_u/images/dashboard/dash-flag02.png" alt="country-image">
							<p class="text-header tiny">France</p>
							<p>Conversions</p>
						</div>
						<!-- PIE CHART ITEM -->

						<!-- PIE CHART ITEM -->
						<div class="pie-chart-item">
							<div class="country-chart">
								<canvas class="cc3"></canvas>
							</div>
							<img src="<?=base_url()?>assets_u/images/dashboard/dash-flag03.png" alt="country-image">
							<p class="text-header tiny">Canada</p>
							<p>Conversions</p>
						</div>
						<!-- PIE CHART ITEM -->

						<!-- PIE CHART ITEM -->
						<div class="pie-chart-item">
							<div class="country-chart">
								<canvas class="cc4"></canvas>
							</div>
							<img src="<?=base_url()?>assets_u/images/dashboard/dash-flag04.png" alt="country-image">
							<p class="text-header tiny">Ireland</p>
							<p>Conversions</p>
						</div>
						<!-- PIE CHART ITEM -->

						<!-- PIE CHART ITEM -->
						<div class="pie-chart-item">
							<div class="country-chart">
								<canvas class="cc5"></canvas>
							</div>
							<img src="<?=base_url()?>assets_u/images/dashboard/dash-flag05.png" alt="country-image">
							<p class="text-header tiny">Germany</p>
							<p>Conversions</p>
						</div>
						<!-- PIE CHART ITEM -->

						<!-- PIE CHART ITEM -->
						<div class="pie-chart-item">
							<div class="country-chart">
								<canvas class="cc6"></canvas>
							</div>
							<img src="<?=base_url()?>assets_u/images/dashboard/dash-flag06.png" alt="country-image">
							<p class="text-header tiny">Netherlands</p>
							<p>Conversions</p>
						</div>
						<!-- PIE CHART ITEM -->

						<!-- PIE CHART ITEM -->
						<div class="pie-chart-item">
							<div class="country-chart">
								<canvas class="cc7"></canvas>
							</div>
							<img src="<?=base_url()?>assets_u/images/dashboard/dash-flag07.png" alt="country-image">
							<p class="text-header tiny">Mexico</p>
							<p>Conversions</p>
						</div>
						<!-- PIE CHART ITEM -->

						<!-- PIE CHART ITEM -->
						<div class="pie-chart-item">
							<div class="country-chart">
								<canvas class="cc8"></canvas>
							</div>
							<img src="<?=base_url()?>assets_u/images/dashboard/dash-flag08.png" alt="country-image">
							<p class="text-header tiny">Indonesia</p>
							<p>Conversions</p>
						</div>
						<!-- PIE CHART ITEM -->
					</div>
					<!-- /PIE CHART LIST -->
				</div>
				<!-- /FORM BOX ITEM -->

				<!-- FORM BOX ITEM -->
				<div class="form-box-item">
					<h4>Icons With Text</h4>
					<hr class="line-separator">
					<!-- TEXT ICONS -->
					<div class="text-icons">
						<!-- TEXT ICON -->
						<div class="text-icon light">
							<div class="ticon green">
								<span class="sl-icon icon-tag"></span>
							</div>
							<p class="text-header mid">68.107</p>
							<p>Themes Sales</p>
						</div>
						<!-- /TEXT ICON -->

						<!-- TEXT ICON -->
						<div class="text-icon light">
							<div class="ticon blue">
								<span class="sl-icon icon-cup"></span>
							</div>
							<p class="text-header mid">39.512</p>
							<p>New Services</p>
						</div>
						<!-- /TEXT ICON -->

						<!-- TEXT ICON -->
						<div class="text-icon light">
							<div class="ticon red">
								<span class="sl-icon icon-fire"></span>
							</div>
							<p class="text-header mid">14.800</p>
							<p>New Auctions</p>
						</div>
						<!-- /TEXT ICON -->

						<!-- TEXT ICON -->
						<div class="text-icon light">
							<div class="ticon violet">
								<span class="sl-icon icon-present"></span>
							</div>
							<p class="text-header mid">7.324</p>
							<p>New Items</p>
						</div>
						<!-- /TEXT ICON -->

						<!-- TEXT ICON -->
						<div class="text-icon light">
							<div class="ticon violet">
								<span class="sl-icon icon-eye"></span>
							</div>
							<p class="text-header mid">18.006</p>
							<p>New Visits</p>
						</div>
						<!-- /TEXT ICON -->

						<!-- TEXT ICON -->
						<div class="text-icon light">
							<div class="ticon violet">
								<span class="sl-icon icon-heart"></span>
							</div>
							<p class="text-header mid">9.094</p>
							<p>New Likes</p>
						</div>
						<!-- /TEXT ICON -->
					</div>
					<!-- /TEXT ICONS -->

					<!-- TEXT ICON -->
					<div class="text-icon">
						<div class="ticon green">
							<span class="sl-icon icon-bubble"></span>
						</div>
						<p class="text-header mid">Paragraph</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ut ut labore. Eiusmod tempor incididunt ut labore et dolore magna aliqua en derum de lorem consectur labore.</p>
					</div>
					<!-- /TEXT ICON -->
				</div>
				<!-- /FORM BOX ITEM -->
			</div>
			<!-- /FORM BOX ITEMS -->
        </div>
        <!-- DASHBOARD CONTENT -->
 

</body>