<?php $this->load->view('include/template/common_header') ?>
<style type="text/css">

</style>
<link rel="stylesheet"
      href="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
<?php // $this->load->view('include/template/common_header') ?>
<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Voucher Entry </h3>
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
                        <input id="to_date" class="form-control" type="text" value="<?php echo date('d/m/Y'); ?>">
                    </div>
                    <div class="col-md-6">
                        <div class="row radio">
                            <label> <input type="radio" id="payment_mode" name="payment_mode" value="all"
                                           checked="true"> All </label>
                            <label> <input type="radio" id="payment_mode" name="payment_mode" value="1"> Cash Rcpt
                            </label>
                            <label> <input type="radio" id="payment_mode" name="payment_mode" value="2"> Cash Pmnt
                            </label>
                            <label> <input type="radio" id="payment_mode" name="payment_mode" value="3"> Bank Withdraw
                            </label>
                            <label> <input type="radio" id="payment_mode" name="payment_mode" value="4"> Bank Deposited
                            </label>
                            <label> <input type="radio" id="payment_mode" name="payment_mode" value="5"> Journal
                            </label>
                        </div>
                    </div>
                </div>
                <div class="dataTables_wrapper">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-info addvoucher">
                                <span class="glyphicon glyphicon-plus"></span> Add New Voucher
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover dataTable" id="table_voucher">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Payment A/C</th>
                                    <th>Receipt A/C</th>
                                    <th>Amt. Rs.</th>
                                    <th>Narration</th>
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
<div class="modal fade modal-3d-flip-horizontal" id="deleteVoucherModal" aria-hidden="true"
     aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Are you sure you want to delete the Voucher ? </h4>
                <input type="hidden" name="id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger deleteVoucher">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- End DeleteModal -->
<!-- RecoverModal -->
<div class="modal fade modal-3d-flip-horizontal" id="recoverVoucherModal" aria-hidden="true"
     aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Are you sure you want to recover the Voucher ?</h4>
                <input type="hidden" name="id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success recoverVoucher">Recover</button>
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
    var table = {};
    var payment_mode = 'all';
    $(document).ready(function () {
        $('#from_date').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });
        $('#to_date').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });
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
        $(document).on('click', '.addvoucher', function () {
            window.location = "<?php echo site_url('voucher/add'); ?>";
        });
        table = $('#table_voucher').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "responsive": true,
            "autoWidth": false,
            "pageLength": 10,
            "ajax": {
                "url": "<?php echo site_url('voucher/get'); ?>",
                "type": "POST",
                data: function (d) {
                    d.to_date = $('#to_date').val();
                    d.from_date = $('#from_date').val();
                    d.payment_mode = payment_mode;
                }
            },
            "columns": [
                {
                    "data": "VOUNO",
                    "bSortable": true
                },
                {
                    "data": null,
                    "bSortable": true
                },
                {
                    "data": null,
                    "bSortable": false
                },
                {
                    "data": "PAYMENTAC",
                    "bSortable": true
                },
                {
                    "data": "RECIEPTAC",
                    "bSortable": true
                },
                {
                    "data": "VOUAMT",
                    "bSortable": true
                },
                {
                    "data": "REMARK",
                    "bSortable": true
                },
                {
                    "data": null,
                    "bSortable": false
                },
            ],
            "rowCallback": function (nRow, aData, iDisplayindex) {
                branchid = 1;
                var VOUDT = new Date(aData.VOUDT);
                $('td:eq(1)', nRow).html(VOUDT.toString('dd/MM/yyyy'));
                if (aData.VOUTYP == 1) {
                    $('td:eq(2)', nRow).html("CR");
                } else if (aData.VOUTYP == 2) {
                    $('td:eq(2)', nRow).html("CP");
                } else if (aData.VOUTYP == 3) {
                    $('td:eq(2)', nRow).html("BW");
                } else if (aData.VOUTYP == 4) {
                    $('td:eq(2)', nRow).html("BD");
                } else if (aData.VOUTYP == 5) {
                    $('td:eq(2)', nRow).html("JR");
                } else {
                    $('td:eq(2)', nRow).html("CR");
                }
                if (aData.IS_ACTIVE == 1) {
                    if (aData.branch_id == branchid) {
                        $('td:eq(7)', nRow).html(""
                            + "<button class='btn btn-info' onclick='return EditTheRow(" + iDisplayindex + "," + aData.VOUNO + ");'>"
                            + "<i class='fa fa-edit'></i>"
                            + "</button>"
                            + "<button class='btn btn-danger' disabled>"
                            + "<i class='fa fa-trash-o'></i>"
                            + "</button>"
                            + "");
                    }
                    else {
                        $('td:eq(7)', nRow).html(""
                            + "<button class='btn btn-info' onclick='return EditTheRow(" + iDisplayindex + "," + aData.VOUNO + ");'>"
                            + "<i class='fa fa-edit'></i>"
                            + "</button>"
                            + "<button class='btn btn-danger' onclick='return DeleteTheRow(" + iDisplayindex + "," + aData.VOUNO + ");'>"
                            + "<i class='fa fa-trash-o'></i>"
                            + "</button>"
                            + "");
                    }

                } else {
                    $(nRow).addClass('danger');
                    $('td:eq(7)', nRow).html(""
                        + "<button class='btn btn-info' disabled onclick='return EditTheRow(" + iDisplayindex + "," + aData.VOUNO + ");'>"
                        + "<i class='fa fa-edit'></i>"
                        + "</button>"
                        + "<button class='btn btn-success' onclick='return RecoverTheRow(" + iDisplayindex + "," + aData.VOUNO + ");'>"
                        + "<i class='fa fa-check'></i>"
                        + "</button>"
                        + "");
                }
            },
        });
    });

    function DeleteTheRow(index, id) {
        $("#deleteVoucherModal").modal("show");
        $("#deleteVoucherModal").find("[name=id]").attr("value", id);
    }

    function RecoverTheRow(index, id) {
        $("#recoverVoucherModal").modal("show");
        $("#recoverVoucherModal").find("[name=id]").attr("value", id);
    }

    function EditTheRow(index, id) {
        window.location.href = "<?php echo site_url('voucher/edit/'); ?>" + id;
    }

    $(".deleteVoucher").on("click", function () {
        $(".deleteVoucher").prop("disabled", true);
        var id = -1;
        id = $("#deleteVoucherModal").find("[name=id]").val();
        $.post("<?php echo site_url('voucher/delete/'); ?>" + id, {})
            .done(function (result) {
                result = JSON.parse(result);
                if (result.code == 1) {
                    table.ajax.reload();
                }
                $("#deleteVoucherModal").modal("hide");
            });
        $(".deleteVoucher").prop("disabled", false);
    });
    $(".recoverVoucher").on("click", function () {
        $(".recoverVoucher").prop("disabled", true);
        var id = -1;
        id = $("#recoverVoucherModal").find("[name=id]").val();
        $.post("<?php echo site_url('voucher/recover/'); ?>" + id, {})
            .done(function (result) {
                result = JSON.parse(result);
                if (result.code == 1) {
                    table.ajax.reload();
                }
                $("#recoverVoucherModal").modal("hide");
            });
        $(".recoverVoucher").prop("disabled", false);
    });
</script>
<?php $this->load->view('include/page_footer.php'); ?>
