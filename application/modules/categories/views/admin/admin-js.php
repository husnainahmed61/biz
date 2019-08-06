<script type="text/javascript">
    $(document).ready(function () {
        console.log("Admin-js: READY !");

        var tableDataUrl = base_url + "admin/categories/getDatatable/categories";
        var selectedProductsDataUrl = '';

        var $categoriesTable = $('#categories_table');
        var $selectedProductsTable = $("#selected_products_table");


        var customFilters = {
            "from" : null,
            "to" : null,
        };


        $categoriesTable.DataTable({
            "processing": true,
            "serverSide": true,
            "paging": true,
            "ajax": {
                "url": tableDataUrl,
                "type": "GET",
                "beforeSend":function(){
                    setTimeout(2000);
                }

            },
            responsive: {
                details: {
                    type: 'column',
                    target: 1
                }
            },
            columnDefs: [ {
                className: 'control',
                orderable: false,
                targets:   1
            } ],

            "columns": [
                {
                    "data": "id",
                    "sortable": false,
                    "defaultContent": '<span class="badge badge-info badge-roundless"> N/A </span>',
                    "render": function(data, type, row){
                        return  ' <label class="mt-checkbox mt-checkbox-outline">' +
                                '     <input type="checkbox">' +
                                '     <span></span>' +
                                ' </label>' ;
                    }
                },
                {
                    "data": "index",
                    "defaultContent": '<span class="badge badge-info badge-roundless"> N/A </span>',
                },
                {
                    "data": "name",
                    "defaultContent": '<span class="badge badge-info badge-roundless"> N/A </span>'
                },
                {
                    "data": "slug",
                    "defaultContent": '<span class="badge badge-info badge-roundless"> N/A </span>'
                },
                {
                    "data": "created_at",
                    "defaultContent": '<span class="badge badge-info badge-roundless"> N/A </span>'
                },
                {
                    "data": "action",
                    "sortable": false,
                    "render": function (data, type, row) {

                        /*console.log("=======Type=======");
                        console.log(type);

                        console.log("=======Row=======");
                        console.log(row);

                        console.log("=======data=======");
                        console.log(data);*/

                        var url = base_url + "admin/products/" + data;

                        return '<div class="btn-group ">'
                            + '   <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown"'
                            + '    aria-expanded="false">Actions <i class="fa fa-angle-down"></i>'
                            + '    </button>'
                            + '    <ul class="dropdown-menu pull-right">'
                            + '        <li>'
                            + '            <a class="edit_product" href="javascript:;" >'
                            + '            <i class="fa fa-pencil"></i> Edit </a>'
                            + '        </li>'
                            + '        <li>'
                            + '           <a href="javascript:;" class="delete_btn"'
                            + '             data-record-id="">'
                            + '             <i class="fa fa-trash"></i> Delete </a>'
                            + '        </li>'
                            + '    </ul>'
                            + '</div>';

                        //return $btn ;
                    }
                }
            ]
        });

        $categoriesTable.on("click", ".edit_product", function () {
            console.log("edit_product CLICKED !");
            console.log($(this));
        });

        var datatable_selectedProducts = $selectedProductsTable.DataTable({
            "processing": true,
            "serverSide": true,
            "paging": true,
            "order": [[1, "desc"]],
            "searchDelay" : 2000,
            "ajax": {
                "url": selectedProductsDataUrl + "selected_products",
                "type": "GET",
                "data": function ( d ){
                    return $.extend({}, d , {
                       "custom_filters":{
                           "selected_on":{
                               "from": $("input[name='from']").val(),
                               "to": $("input[name='to']").val(),
                           },
                           "model": $("input.filter-model").val(),
                           "submodel": $("input.filter-submodel").val(),
                       }
                    });
                },
            },

            "columns": [
                /*{
                    "class": "details-control",
                    /!*"orderable": false,*!/
                    "sortable": false,
                    "data": null,
                    "defaultContent": ""
                },*/
                {
                    "class": "details-control",
                    "sortable": false,
                    "data": "order_id"
                },
                {"data": "part_number"},
                {"data": "customer_name"},
                {"data": "email"},
                {"data": "phone"},
                {"data": "make"},
                {"data": "model"},
                {
                    "data": "submodel",
                    "defaultContent": '<span class="badge badge-info badge-roundless"> N/A </span>'
                },
                {
                    "data": "body_type",
                    "defaultContent": '<span class="badge badge-info badge-roundless"> N/A </span>'
                },
                {"data": "created_at"},
//                {
//                    "data": "action",
//                    "sortable": false,
//                    "render": function (data, type, row) {
//
//                        /*console.log("=======Type=======");
//                        console.log(type);
//
//                        console.log("=======Row=======");
//                        console.log(row);
//
//                        console.log("=======data=======");
//                        console.log(data);*/
//
//                        var url = base_url + "admin/products/" + data;
//
//                        return '<div class="btn-group ">'
//                            + '   <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown"'
//                            + '    aria-expanded="false">Actions <i class="fa fa-angle-down"></i>'
//                            + '    </button>'
//                            + '    <ul class="dropdown-menu pull-right">'
//                            + '        <li>'
//                            + '            <a class="edit_product" href="javascript:;" >'
//                            + '            <i class="fa fa-pencil"></i> Edit </a>'
//                            + '        </li>'
//                            + '        <li>'
//                            + '           <a href="javascript:;" class="delete_btn"'
//                            + '             data-record-id="">'
//                            + '             <i class="fa fa-trash"></i> Delete </a>'
//                            + '        </li>'
//                            + '    </ul>'
//                            + '</div>';
//                        //return $btn ;
//                    }
//                }
            ]
        });

      /*  var filter = $.fn.dataTable.util.throttle(
            function () {
                datatable_selectedProducts.draw();
            },
            2000);*/


        $(".date-picker").on("change", "input[name='from'], input[name='to']", function (e) {

            var $fromInput  = $("input[name='from']");
            var $toInput    = $("input[name='to']");

            var fromVal = $fromInput.val();
            var toVal = $toInput.val();

            console.log(fromVal + " " + toVal);
            //console.log($toInput.attr);
            datatable_selectedProducts.draw();
            /* e.stopImmediatePropagation();
             e.preventDefault();*/
            console.log("Date Range Changed");
        });

        $(".filters").on("input","input.filter-model, input.filter-submodel",function(){
          // alert();
            //$(this).delay(5000);
            /*setTimeout(function(){

            },1000);*/

           // filter();
            datatable_selectedProducts.draw();

        });
    });

</script>