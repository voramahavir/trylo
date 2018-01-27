<?php $this->load->view('include/template/common_header') ?>
<link rel="stylesheet"
      href="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Physical Stock Entry</h3>
            </div>
            <div class="box-body">
                <div class="row form-group">
                    <label class="col-md-1 no-pad-right">From Date : </label>
                    <div class="col-md-2">
                        <input class="form-control" id="from_date" type="text"
                               value="<?php echo date('d/m/Y', strtotime('first day of this month', time())); ?>">
                    </div>
                    <label class="col-md-1 no-pad-right"> To Date : </label>
                    <div class="col-md-2 no-pad-left">
                        <input class="form-control" id="to_date" type="text" value="<?php echo date('d/m/Y'); ?>">
                    </div>
                </div>
                <a href="<?php echo site_url('stock/add'); ?>" class="btn btn-info">
                    <span class="glyphicon glyphicon-plus"></span> Add
                </a>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover dataTable" id="table_stock">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Total Qty.</th>
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
<!-- DeleteModal -->
<div class="modal fade modal-3d-flip-horizontal" id="deleteStockModal" aria-hidden="true"
     aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Are you sure you want to delete the Stock Entry ? </h4>
                <input type="hidden" name="id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger deleteStock">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- End DeleteModal -->
<!-- RecoverModal -->
<div class="modal fade modal-3d-flip-horizontal" id="recoverStockModal" aria-hidden="true"
     aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Are you sure you want to recover the Stock Entry ?</h4>
                <input type="hidden" name="id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success recoverStock">Recover</button>
            </div>
        </div>
    </div>
</div>
<!-- End RecoverModal -->
<?php $this->load->view('include/template/common_footer'); ?>
<!-- Bootstrap-notify -->
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script type="text/javascript">
    var table = '';
    $(document).ready(function () {
        $('#from_date').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });
        $('#to_date').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });
        $('#bldt').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });
        setTable();
    });
    $("#from_date").on('change', function () {
        table.ajax.reload();
    });
    $("#to_date").on('change', function () {
        table.ajax.reload();
    });
    $("input[name=type]").on('change', function () {
        type = this.value;
        table.ajax.reload();
    });

    $(document).on('click', '.saveBill', function () {
        transferToBill();
    });
    $(".deleteStock").on("click", function () {
        $(".deleteStock").prop("disabled", true);
        var id = -1;
        id = $("#deleteStockModal").find("[name=id]").val();
        $.post("<?php echo site_url('stock/delete/'); ?>" + id, {})
            .done(function (result) {
                result = JSON.parse(result);
                if (result.code == 1) {
                    table.ajax.reload();
                }
                $("#deleteStockModal").modal("hide");
            });
        $(".deleteStock").prop("disabled", false);
    });

    $(".recoverStock").on("click", function () {
        $(".recoverStock").prop("disabled", true);
        var id = -1;
        id = $("#recoverStockModal").find("[name=id]").val();
        $.post("<?php echo site_url('stock/recover/'); ?>" + id, {})
            .done(function (result) {
                result = JSON.parse(result);
                if (result.code == 1) {
                    table.ajax.reload();
                }
                $("#recoverStockModal").modal("hide");
            });
        $(".recoverStock").prop("disabled", false);
    });

    function setTable() {
        table = $('#table_stock').DataTable({
            "processing": true,
            "serverSide": true,
            "paging": true,
            "ajax": {
                "url": "<?php echo site_url('stock/getData'); ?>",
                "type": "POST",
                data: function (d) {
                    d.to_date = $('#to_date').val();
                    d.from_date = $('#from_date').val();
                }
            },
            "columns": [
                {
                    "data": "TRBLNO",
                    "bSortable": true
                },
                {
                    "data": "TRBLDT",
                    "bSortable": true
                },
                {
                    "data": "TRTOTQTY",
                    "bSortable": true
                },
                {
                    "data": null,
                    "bSortable": false
                }
            ],
            "rowCallback": function (nRow, aData, iDisplayindex) {
                var TRBLDT = new Date(aData.TRBLDT);
                $('td:eq(1)', nRow).html(TRBLDT.toString('dd/MM/yyyy'));
                if (aData.IS_ACTIVE == 1) {
                    $('td:eq(3)', nRow).html(""
                        + "<button class='btn btn-info hide' onclick='return EditTheRow(" + iDisplayindex + "," + aData.TRBLNO + ");'>"
                        + "<i class='fa fa-edit'></i>"
                        + "</button>"
                        + "<button class='btn btn-danger' onclick='return DeleteTheRow(" + iDisplayindex + "," + aData.TRBLNO + ");'>"
                        + "<i class='fa fa-trash-o'></i>"
                        + "</button>"
                        + "");
                    // }

                } else {
                    $(nRow).addClass('danger');
                    $('td:eq(3)', nRow).html(""
                        + "<button class='btn btn-info hide' disabled onclick='return EditTheRow(" + iDisplayindex + "," + aData.TRBLNO + ");'>"
                        + "<i class='fa fa-edit'></i>"
                        + "</button>"
                        + "<button class='btn btn-success' onclick='return RecoverTheRow(" + iDisplayindex + "," + aData.TRBLNO + ");'>"
                        + "<i class='fa fa-check'></i>"
                        + "</button>"
                        + "");
                }
            },
        });
        $('.dataTables_filter input').attr("placeholder", "Search by Party Name");

    }

    function DeleteTheRow(index, id) {
        $("#deleteStockModal").modal("show");
        $("#deleteStockModal").find("[name=id]").attr("value", id);
    }

    function RecoverTheRow(index, id) {
        $("#recoverStockModal").modal("show");
        $("#recoverStockModal").find("[name=id]").attr("value", id);
    }
</script>
<?php $this->load->view('include/page_footer.php'); ?>
