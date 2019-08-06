<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 p-md" style="background-color: #004990">
            <img src="<?= base_url("assets_u/images/logo2.png") ?>" class="img-responsive" alt="Responsive image">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12" style="background-color: #004990;">
            <div id="smartwizard">
                <ul>
                    <li><a href="#step-1">Choose<br/><!--<small>This is step description</small>--></a></li>
                    <li><a href="#step-2">Product Details<br/></a></li>
                    <li><a href="#step-3">Confirm<br/></a></li>
                    <!--<li><a href="#step-4">Step 4<br /><small>This is step description</small></a></li>-->
                </ul>

                <div>
                    <div id="step-1" class="bg-goodblue">
                        <h3 style="margin-bottom: 22px;">What Do You Drive?</h3>
                        <form id="bootstrapSelectForm" method="post" class="form-horizontal">
                            <div class="form-group">
                                <!--<label class="col-xs-3 control-label">Year</label>-->
                                <div class="col-xs-8 col-centered selectContainer">
                                    <select name="year" class="selectpicker form-control" data-size="7"
                                            data-live-search="true" data-dropup-auto="false"
                                            title="Year">
                                        <?php foreach ($years AS $key => $item) { ?>
                                            <option value="<?= $item['year'] ?>"> <?= $item['year'] ?> </option>
                                        <?php } ?>
                                        <!--<option data-tokens="ketchup mustard">Year</option>
                                        <option data-tokens="mustard">1987</option>
                                        <option data-tokens="frosting">1988</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-8 col-centered selectContainer">
                                    <select name="make" class="selectpicker form-control" data-size="7"
                                            data-live-search="true" data-dropup-auto="false"
                                            title="Make" disabled></select>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-8 col-centered selectContainer">
                                    <select name="model" class="selectpicker form-control" data-size="7"
                                            data-live-search="true" data-dropup-auto="false"
                                            title="Model" disabled>
                                        <!--<option data-tokens="ketchup mustard">Model</option>
                                        <option data-tokens="ketchup mustard">TL</option>
                                        <option data-tokens="mustard">Integra</option>
                                        <option data-tokens="frosting">CSX</option>-->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-8 col-centered selectContainer">
                                    <select name="submodel" class="selectpicker form-control" data-size="7"
                                            data-live-search="true" data-dropup-auto="false"
                                            title="Submodel" disabled>
                                        <!--<option data-tokens="ketchup mustard">Sub Model</option>
                                        <option data-tokens="ketchup mustard">TL</option>
                                        <option data-tokens="mustard">Integra</option>
                                        <option data-tokens="frosting">CSX</option>-->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-8 col-centered selectContainer">
                                    <select name="body_type" class="selectpicker form-control" data-size="7"
                                            data-live-search="true" data-dropup-auto="false"
                                            title="Body Type" disabled>
                                        <!--<option data-tokens="ketchup mustard">Body Type</option>
                                        <option data-tokens="ketchup mustard">TL</option>
                                        <option data-tokens="mustard">Integra</option>
                                        <option data-tokens="frosting">CSX</option>-->
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-8 col-xs-offset-3">
                                    <!--<button type="submit" class="btn btn-default">Continue</button>-->
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="step-2" class=""></div>
                    <div id="step-3" class="">
                        <div class="panel panel-default" style="border: white 0px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 style="text-align:left;">Confirm Order Details</h3>
                                </div>
                            </div>
                            <div class="order-details">
                                <div class="row pt-md pb-md">
                                    <div class="col-md-2 sbold">
                                        <strong>Vehicle</strong>
                                    </div>
                                    <div class="col-md-10">
                                        <span id="product-detail">2017 Acura NSX Base </span>
                                    </div>
                                </div>
                                <div class="row pt-md pb-md" style="display: flex; align-items: center;">
                                    <div class="col-md-2 align-middle sbold" style=" display:">
                                        <strong>Wiper</strong>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="thumbnail" style="border: solid 0px;">
                                            <img id="product-image" src="" alt="Wiper Blade"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="mt-none" style="">Costco Membership Details</h3>
                                    <p style="font-size:10px;width:100%; margin-top:3px;padding-bottom:8px; color:gray;">
                                        Please make sure the information entered here matches your COSTCO.COM membership
                                        to
                                        and/or billing information at checkout, otherwise your order could be delayed
                                        and/or
                                        cancelled.</p>
                                </div>
                            </div>
                            <div class="row" style="padding-left: 11px;">
                                <div class="col-lg-12">
                                    <form id="member-details" method="post" class="form-horizontal">
                                        <div class="form-group">
                                            <!--<label class="col-xs-3 control-label">Year</label>-->
                                            <div class="col-xs-8 selectContainer">
                                                <input type="text" class="form-control"
                                                       placeholder="Costco Email (abc@example.com)" name="email"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <!--<label class="col-xs-3 control-label">Year</label>-->
                                            <div class="col-xs-8 selectContainer">
                                                <input type="text" class="form-control" placeholder="First Name"
                                                       name="first_name"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <!--<label class="col-xs-3 control-label">Year</label>-->
                                            <div class="col-xs-8 selectContainer">
                                                <input type="text" class="form-control" placeholder="Last Name"
                                                       name="last_name"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <!--<label class="col-xs-3 control-label">Year</label>-->
                                            <div class="col-xs-8 selectContainer">
                                                <input type="text" class="form-control" placeholder="Telephone"
                                                       name="phone"/>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row" style="width:100%; margin: 0 auto; text-align:center;">
                                <div class="col-md-12"
                                     style="font-size:11px; color:#7b7b7b;vertical-align:top!important;padding:0px 10px 0px 10px; text-align:center;">


                                    <span style="font-family:Arial; color:#333;">Note: You are no longer on Costco's website and are subject to savers </span>
                                    <a style="color:#005dab; cursor:pointer;" data-toggle="modal"
                                       data-target="#privacymodal">privacy policy</a>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<form class="form-inline">
    <div class="form-group">
        <label >Choose Theme:</label>
        <select id="theme_selector" class="form-control">
            <option value="default">default</option>
            <option value="arrows">arrows</option>
            <option value="circles">circles</option>
            <option value="dots">dots</option>
        </select>
    </div>

    <label>External Buttons:</label>
    <div class="btn-group navbar-btn" role="group">
        <button class="btn btn-default" id="prev-btn" type="button">Go Previous</button>
        <button class="btn btn-default" id="next-btn" type="button">Go Next</button>
        <button class="btn btn-danger" id="reset-btn" type="button">Reset Wizard</button>
    </div>
</form>-->


<!-- SmartWizard html -->
    



