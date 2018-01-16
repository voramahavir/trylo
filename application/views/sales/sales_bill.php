<?php $this->load->view('include/template/common_header'); ?>
<style type="text/css">

</style>
<link rel="stylesheet"
      href="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">

<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="col-md-2">
                    <h2 class="box-title page-title text-primary"> Sales Bill Entry</h2>
                </div>
                <div class="col-md-10">
                    <label class="col-md-2">From Date : </label>
                    <div class="col-md-3">
                        <input id="from_date" type="text"
                               value="<?php echo date('d/m/Y', strtotime('first day of this month', time())); ?>"
                               class="form-control">
                    </div>
                    <label class="col-md-2"> To Date : </label>
                    <div class="col-md-3">
                        <input id="to_date" type="text" value="<?php echo date('d/m/Y'); ?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row form-group">
                    <div class="col-md-6">
                        <div class="col-md-12 label-primary radio no-margin">
                            <label> <input type="radio" class="radio-inline" id="payment" name="payment" value="1"
                                           checked="true"> Pending Payment </label>
                            <label> <input type="radio" class="radio-inline" id="payment" name="payment" value="2">
                                Payment Rcvd
                            </label>
                            <label> <input type="radio" class="radio-inline" id="payment" name="payment" value="all">
                                All (Except Cancelled)
                            </label>
                            <label> <input type="radio" class="radio-inline" id="payment" name="payment" value="3">
                                Cancelled
                                Bill </label>
                        </div>
                        <div class="col-md-12 label-success radio no-margin">
                            <label> <input type="radio" class="radio-inline" id="payment_mode" name="payment_mode"
                                           value="all"
                                           checked="true"> All </label>
                            <label> <input type="radio" class="radio-inline" id="payment_mode" name="payment_mode"
                                           value="1"> Cash </label>
                            <label> <input type="radio" class="radio-inline" id="payment_mode" name="payment_mode"
                                           value="2"> Debit </label>
                            <label> <input type="radio" class="radio-inline" id="payment_mode" name="payment_mode"
                                           value="3"> Cr/Dr Card
                            </label>
                            <label> <input type="radio" class="radio-inline" id="payment_mode" name="payment_mode"
                                           value="4"> Mobile Payment
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 no-padding">
                        <a href="<?php echo site_url('salesAdd'); ?>" class="btn btn-info">
                            <span class="glyphicon glyphicon-plus"></span> Add
                        </a>
                    </div>
                </div>
                <!-- <button type="button" class="btn btn-default" id="search" visible='false'>
                    <span class="glyphicon glyphicon-search"></span> Search
                </button> -->

                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="sales_bill_table" class="table table-bordered table-hover dataTable"
                                   role="grid">
                                <thead>
                                <tr role="row">
                                    <th class="col-md-1 text-center">Bill No.</th>
                                    <th class="col-md-1 text-center">Date</th>
                                    <th class="col-md-1 text-center">Type</th>
                                    <th class="col-md-1 text-center">Name of Party</th>
                                    <th class="col-md-1 text-center">Repeat</th>
                                    <th class="col-md-1 text-center">Total Quantity</th>
                                    <th class="col-md-1 text-center">Bill Amount</th>
                                    <th class="col-md-1 text-center">Rcvd Amt</th>
                                    <th class="col-md-1 text-center">Discount</th>
                                    <th class="col-md-1 text-center">Other</th>
                                    <th class="col-md-2 text-center">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!--<div id="sales_bill wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6"></div>
                        </div>

                    </div>-->
                </div>

            </div>

        </div>
    </div>
</div>
<div class="modal fade modal-3d-flip-horizontal" id="deleteSalesModal" aria-hidden="true"
     aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Are you sure you want to delete this Sales Bill ? </h4>
                <input type="hidden" name="id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger deleteSales">Delete</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-3d-flip-horizontal" id="cancelSalesModal" aria-hidden="true"
     aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Are you sure you want to cancel this Sales Bill ? </h4>
                <input type="hidden" name="id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger cancelSales">Confirm</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('include/template/common_footer'); ?>

<script src="<?php echo base_url('assets/theme/bower_components/datatables.net/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>

<script type="text/javascript">
    var payment_mode = 'all';
    var payment = 1;
    (function ($) {
        $(document).ready(function () {
            // $('#sales_bill_table').DataTable();
            //Date picker
            $('#from_date').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
            $('#to_date').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
            $(".deleteSales").on("click", function () {
                $(".deleteSales").prop("disabled", true);
                var id = -1;
                id = $("#deleteSalesModal").find("[name=id]").val();
                $.post("<?php echo site_url('sales/delete/'); ?>" + id, {})
                    .done(function (result) {
                        result = JSON.parse(result);
                        if (result.code == 1) {
                            table.ajax.reload();
                        }
                        $("#deleteSalesModal").modal("hide");
                    });
                $(".deleteSales").prop("disabled", false);
            });
            $(".cancelSales").on("click", function () {
                $(".cancelSales").prop("disabled", true);
                var id = -1;
                id = $("#cancelSalesModal").find("[name=id]").val();
                $.post("<?php echo site_url('sales/cancel/'); ?>" + id, {})
                    .done(function (result) {
                        result = JSON.parse(result);
                        if (result.code == 1) {
                            table.ajax.reload();
                        }
                        $("#cancelSalesModal").modal("hide");
                    });
                $(".cancelSales").prop("disabled", false);
            });
        });
    }(jQuery));

    // $("#search").click(function () {
    //     table.ajax.reload();
    // });
    $("#from_date").on('change', function () {
        table.ajax.reload();
    });
    $("#to_date").on('change', function () {
        table.ajax.reload();
    });
    $("input[name=payment_mode]").on('change', function () {
        payment_mode = this.value;
        table.ajax.reload();
    });
    $("input[name=payment]").on('change', function () {
        payment = this.value;
        table.ajax.reload();
    });

    function setTable() {
        table = $('#sales_bill_table').DataTable({
            "processing": true,
            "serverSide": true,
            "searching": false,
            "autoWidth": false,
            "columns": [
                {
                    "bSortable": false,
                    "data": "billno",
                    "className": "col-md-1 text-center"
                },
                {
                    "bSortable": false,
                    "data": null,
                    "className": "col-md-1 text-center"
                },
                {
                    "bSortable": false,
                    "data": "type",
                    "className": "col-md-1 text-center"
                },
                {
                    "bSortable": false,
                    "data": "name",
                    "className": "col-md-1 text-center"
                },
                {
                    "bSortable": false,
                    "data": null,
                    "className": "col-md-1 text-center"
                },
                {
                    "bSortable": false,
                    "data": 'qty',
                    "className": "col-md-1 text-center"
                },
                {
                    "bSortable": false,
                    "data": 'bamount',
                    "className": "col-md-1 text-center"
                },
                {
                    "bSortable": false,
                    "data": 'ramount',
                    "className": "col-md-1 text-center"
                },
                {
                    "bSortable": false,
                    "data": null,
                    "className": "col-md-1 text-center"
                },
                {
                    "bSortable": false,
                    "data": null,
                    "className": "col-md-1 text-center"
                },
                {
                    "bSortable": false,
                    "data": null,
                    "className": "col-md-2 action-container"
                }
            ],
            "ajax": {
                url: "<?= site_url('SalesController/getSalesBills') ?>",
                pages: 2, // number of pages to cache
                method: 'POST',
                data: function (d) {
                    d.to_date = $('#to_date').val();
                    d.from_date = $('#from_date').val();
                    d.payment = payment;
                    d.payment_mode = payment_mode;
                }
            },
            "rowCallback": function (nRow, aData, iDisplayindex) {
                if (aData.type == 1) {
                    $('td:eq(2)', nRow).html("Cash Memo");
                } else if (aData.type == 2) {
                    $('td:eq(2)', nRow).html("Debit");
                } else if (aData.type == 3) {
                    $('td:eq(2)', nRow).html("Master/Visa");
                } else if (aData.type == 4) {
                    $('td:eq(2)', nRow).html("PAYTM");
                }
                var date = new Date(aData.date);
                $('td:eq(1)', nRow).html(date.toString('d/M/yyyy'));
                $('td:eq(4)', nRow).html("");
                $('td:eq(8)', nRow).html("");
                $('td:eq(9)', nRow).html("");
                /*$('td:eq(10)', nRow).html("");*/
                var printStr = "<a href='" + site_url + "salesPrint/" + aData.billno + "' target='_blank' class='btn btn-success btn-action'><i class=\"fa fa-print\" aria-hidden=\"true\"></i></a>";
                var editStr = "<a href='" + site_url + "sales/edit/" + aData.billno + "' class='btn btn-info btn-action'><i class=\"fa fa-edit\" aria-hidden=\"true\"></i></a>";
                var deleteStr = "<button class='btn btn-danger btn-action' onclick='return DeleteTheRow(" + aData.billno + ");'>"
                    + "<i class='fa fa-trash-o'></i>"
                    + "</button>";
                var cancelStr = "<button class='btn btn-danger btn-action' onclick='return CancelTheRow(" + aData.billno + ");'>"
                    + "<i class='fa fa-times'></i>"
                    + "</button>";
                if (aData.CANBL == 'T') {
                    $('td:eq(10)', nRow).html(printStr);
                } else {
                    $('td:eq(10)', nRow).html(printStr + editStr + deleteStr + cancelStr);
                }
            }
        });
    }

    function DeleteTheRow(id) {
        $("#deleteSalesModal").modal("show");
        $("#deleteSalesModal").find("[name=id]").attr("value", id);
    }

    function CancelTheRow(id) {
        $("#cancelSalesModal").modal("show");
        $("#cancelSalesModal").find("[name=id]").attr("value", id);
    }

    setTable();
</script>

<?php $this->load->view('include/page_footer.php'); ?>
