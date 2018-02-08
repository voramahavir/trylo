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
                <h3 class="box-title"> Sales Return Entry</h3>
            </div>
            <div class="box-body">
                <div class="row form-group">
                    <label class="col-md-1 no-pad-right">From Date : </label>
                    <div class="col-md-2">
                        <input id="from_date" type="text" class="form-control"
                               value="<?php echo date('d/m/Y', strtotime('first day of this month', time())); ?>">
                    </div>
                    <label class="col-md-1 no-pad-right"> To Date : </label>
                    <div class="col-md-2 no-pad-left">
                        <input id="to_date" type="text" class="form-control" value="<?php echo date('d/m/Y'); ?>">
                    </div>

                    <div class="col-md-5 col-md-offset-1">
                        <div class="row radio">
                            <label> <input type="radio" name="cntype" value="1"
                                           checked="true"> Pending CN </label>
                            <label> <input type="radio" name="cntype" value="2"> Adjusted CN
                            </label>
                            <label> <input type="radio" name="cntype" value="3"> Cancel CN </label>
                            <label> <input type="radio" name="cntype" value="all"> All CN </label>
                        </div>
                    </div>
                </div>
                <!--   <button type="button" class="btn btn-default" id="search">
                      <span class="glyphicon glyphicon-search"></span> Search
                  </button> -->
                <a href="<?php echo site_url('salesreturn/add'); ?>" class="btn btn-info">
                    <span class="glyphicon glyphicon-plus"></span> Add
                </a>
                <div class="box-body">
                    <div id="sales_bill wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="sales_return_table" class="table table-bordered table-hover dataTable"
                                       role="grid">
                                    <thead>
                                    <tr role="row">
                                        <th>CN No.</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Name of Party</th>
                                        <th>City</th>
                                        <th>Total Qty</th>
                                        <th>Amount</th>
                                        <th>Adj.Ag.Bill</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="modal fade modal-3d-flip-horizontal" id="deleteSalesRetModal" aria-hidden="true"
     aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Are you sure you want to delete this Sales Return Bill ? </h4>
                <input type="hidden" name="id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger deleteSalesRet">Delete</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-3d-flip-horizontal" id="cancelSalesRetModal" aria-hidden="true"
     aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Are you sure you want to cancel this Sales Return Bill ? </h4>
                <input type="hidden" name="id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger cancelSalesRet">Confirm</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('include/template/common_footer'); ?>

<script src="<?php echo base_url('assets/theme/bower_components/datatables.net/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>

<script type="text/javascript">
    var cn_type = '1';
    var table = null;
    (function ($) {
        $(document).ready(function () {
            // $('#sales_return_table').DataTable();
            //Date picker
            $('#from_date').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
            $('#to_date').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
            $(".deleteSalesRet").on("click", function () {
                $(".deleteSalesRet").prop("disabled", true);
                var id = -1;
                id = $("#deleteSalesRetModal").find("[name=id]").val();
                $.post("<?php echo site_url('salesreturn/delete/'); ?>" + id, {})
                    .done(function (result) {
                        result = JSON.parse(result);
                        if (result.code == 1) {
                            table.ajax.reload();
                        }
                        $("#deleteSalesRetModal").modal("hide");
                        bootbox.alert(result.response);
                    });
                $(".deleteSalesRet").prop("disabled", false);
            });
            $(".cancelSalesRet").on("click", function () {
                $(".cancelSalesRet").prop("disabled", true);
                var id = -1;
                id = $("#cancelSalesRetModal").find("[name=id]").val();
                $.post("<?php echo site_url('salesreturn/cancel/'); ?>" + id, {})
                    .done(function (result) {
                        result = JSON.parse(result);
                        if (result.code == 1) {
                            table.ajax.reload();
                        }
                        $("#cancelSalesRetModal").modal("hide");
                        bootbox.alert(result.response);
                    });
                $(".cancelSalesRet").prop("disabled", false);
            });
        });
    }(jQuery));
    $("#from_date").on('change', function () {
        table.ajax.reload();
    });
    $("#to_date").on('change', function () {
        table.ajax.reload();
    });
    // $("#search").click(function () {
    //     table.ajax.reload();
    // });
    $("input[name=cntype]").on('change', function () {
        cn_type = this.value;
        table.ajax.reload();
    });

    function setTable() {
        table = $('#sales_return_table').DataTable({
            "processing": true,
            "serverSide": true,
            "destroy": true,
            "lengthChange": false,
            "searching": false,
            "columns": [
                {
                    "bSortable": false,
                    "data": "billno"
                },
                {
                    "bSortable": false,
                    "data": null
                },
                {
                    "bSortable": false,
                    "data": "type"
                },
                {
                    "bSortable": false,
                    "data": "name"
                },
                {
                    "bSortable": false,
                    "data": "city"
                },
                {
                    "bSortable": false,
                    "data": 'qty'
                },
                {
                    "bSortable": false,
                    "data": 'bamount'
                }, {
                    "bSortable": false,
                    "data": null
                },
                {
                    "bSortable": false,
                    "data": null
                }
            ],
            "ajax": {
                url: "<?= site_url('SalesReturnController/getSalesReturns') ?>",
                pages: 2, // number of pages to cache
                method: 'POST',
                data: function (d) {
                    d.to_date = $('#to_date').val();
                    d.from_date = $('#from_date').val();
                    d.cn_type = cn_type;
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
                $('td:eq(7)', nRow).html("");
                if (aData.CANBL == "T") {
                    $('td:eq(7)', nRow).html("Cancelled");
                } else if (aData.adjBill) {
                    $('td:eq(7)', nRow).html(aData.adjBill);
                } else if (aData.TRREF == "Y") {
                    $('td:eq(7)', nRow).html("Refunded");
                }
                $('td:eq(8)', nRow).html("");
                var printStr = "<a href='" + site_url + "salesreturn/print/" + aData.billno + "' target='_blank' class='btn btn-success btn-action'><i class=\"fa fa-print\" aria-hidden=\"true\"></i></a>";
                var editStr = "<a href='" + site_url + "salesreturn/edit/" + aData.billno + "' class='btn btn-info btn-action'><i class=\"fa fa-edit\" aria-hidden=\"true\"></i></a>";
                var deleteStr = "<button class='btn btn-danger btn-action' onclick='return DeleteTheRow(" + aData.billno + ");'>"
                    + "<i class='fa fa-trash-o'></i>"
                    + "</button>";
                var cancelStr = "<button class='btn btn-danger btn-action' onclick='return CancelTheRow(" + aData.billno + ");'>"
                    + "<i class='fa fa-times'></i>"
                    + "</button>";
                if (aData.CANBL == 'T') {
                    $('td:eq(8)', nRow).html(printStr);
                } else if (aData.adjBill) {
                    //$('td:eq(8)', nRow).html(printStr + editStr + deleteStr);
                    $('td:eq(8)', nRow).html(deleteStr);
                } else {
                    //$('td:eq(8)', nRow).html(printStr + editStr + deleteStr + cancelStr);
                    $('td:eq(8)', nRow).html(deleteStr + cancelStr);
                }
            }
        });
    }

    function DeleteTheRow(id) {
        $("#deleteSalesRetModal").modal("show");
        $("#deleteSalesRetModal").find("[name=id]").attr("value", id);
    }

    function CancelTheRow(id) {
        $("#cancelSalesRetModal").modal("show");
        $("#cancelSalesRetModal").find("[name=id]").attr("value", id);
    }
    setTable();
</script>

<?php $this->load->view('include/page_footer.php'); ?>
