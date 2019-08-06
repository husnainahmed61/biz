<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box light portlet-fit">
            <div class="portlet-title bg-blue-hoki">
                <div class="caption font-white p-none">
                    <i class="fa fa-circle font-white"></i>
                    <span class="caption-subject sbold uppercase">Selected Products</span>
                </div>
                <div class="tools p-none">
                    <a href="" class="collapse"></a>
                    <a href="" class="fullscreen"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <!--<div class="row mb-xl ">
                    <div class="col-md-12">
                        <a href="<?/*= base_url('admin') */?>" class="btn default">Add Dress Category</a>
                    </div>
                </div>-->

                <div class="row pb-md filters" >
                    <div class="col-md-1" >
                        <h4>Filters</h4>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control input-sm filter-model" placeholder="Enter Model" >
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control input-sm filter-submodel" placeholder="Enter Submodel">
                    </div>
                    <div class="col-md-4">
                        <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                            <input type="text" class="form-control input-sm" name="from" placeholder="Selection Date Starts" >
                            <span class="input-group-addon"> to </span>
                            <input type="text" class="form-control input-sm" name="to" placeholder="Selection Date Ends">
                        </div>
                    </div>
                </div>

                <table class="table table-striped table-bordered table-hover dt-responsive " width="100%" id="selected_products_table"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <!--<th class="all"></th>-->
                        <th class="all">Order #</th>
                        <th class="all">Part #</th>
                        <th class="all">Customer Name</th>
                        <th class="all">Email</th>
                        <th class="all">Phone</th>
                        <!--<th class="all">Car Details</th>-->
                        <th class="all">Make</th>
                        <th class="min-phone-l">Model</th>
                        <th class="min-tablet">Submodel</th>
                        <th class="min-tablet">Body Type</th>
                        <th class="all">Selected On</th>
                        <!--<th class="all">Actions</th>-->
                    </tr>
                    </thead>
                </table>
            </div>

            <!-- <div class="dynamic">
                 <a class="btn btn-default delete_btn" id="" >Modal</a>
                 <a class="btn btn-default " id="ajax-demo">Modal2</a>
             </div>-->
            <!-- <a class="btn btn-default " id="growl-demo">Modal2</a>-->
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>