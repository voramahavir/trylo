<?php $this->load->view('include/template/common_header') ?>
<link rel="stylesheet"
      href="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Purchase Order Entry</h3>
            </div>
            <div class="box-body">
                <div class="row form-group">
                    <label class="col-md-1 text-left">Fr Date : </label>
                    <div class="col-md-2">
                        <input class="form-control" id="from_date" type="text"
                               value="<?php echo date('d/m/Y', strtotime('first day of this month', time())); ?>">
                    </div>
                    <label class="col-md-1 text-left"> To Date : </label>
                    <div class="col-md-2">
                        <input class="form-control" id="to_date" type="text" value="<?php echo date('d/m/Y'); ?>">
                    </div>
                </div>
                <a href="<?php echo site_url('purchaseorder/add'); ?>" class="btn btn-info">
                    <span class="glyphicon glyphicon-plus"></span> Add
                </a>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover dataTable" id="table_purchase">
                            <thead>
                            <tr>
                                <th>Bill No</th>
                                <th>Date</th>
                                <th>Name of Party</th>
                                <th>City</th>
                                <th>Sp.Instru.</th>
                                <th>Amount Rs.</th>
                                <th>Total Qty.</th>
                                <th>Product</th>
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
<!-- DeleteModal -->
<div class="modal fade modal-3d-flip-horizontal" id="deletePurchaseOrderModal" aria-hidden="true"
     aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Are you sure you want to delete the Purchase Order ? </h4>
                <input type="hidden" name="id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger deletePurchaseOrder">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- End DeleteModal -->
<!-- RecoverModal -->
<div class="modal fade modal-3d-flip-horizontal" id="recoverPurchaseOrderModal" aria-hidden="true"
     aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Are you sure you want to recover the Purchase Order ?</h4>
                <input type="hidden" name="id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success recoverPurchaseOrder">Recover</button>
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
    var type = "1";
    var billData = [];
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
    $(".deletePurchaseOrder").on("click", function () {
        $(".deletePurchaseOrder").prop("disabled", true);
        var id = -1;
        id = $("#deletePurchaseOrderModal").find("[name=id]").val();
        $.post("<?php echo site_url('purchaseorder/delete/'); ?>" + id, {})
            .done(function (result) {
                result = JSON.parse(result);
                if (result.code == 1) {
                    table.ajax.reload();
                }
                $("#deletePurchaseOrderModal").modal("hide");
            });
        $(".deletePurchaseOrder").prop("disabled", false);
    });

    $(".recoverPurchaseOrder").on("click", function () {
        $(".recoverPurchaseOrder").prop("disabled", true);
        var id = -1;
        id = $("#recoverPurchaseOrderModal").find("[name=id]").val();
        $.post("<?php echo site_url('purchaseorder/recover/'); ?>" + id, {})
            .done(function (result) {
                result = JSON.parse(result);
                if (result.code == 1) {
                    table.ajax.reload();
                }
                $("#recoverPurchaseOrderModal").modal("hide");
            });
        $(".recoverPurchaseOrder").prop("disabled", false);
    });

    function setTable() {
        table = $('#table_purchase').DataTable({
            "processing": true,
            "serverSide": true,
            "paging": true,
            "ajax": {
                "url": "<?php echo site_url('purchaseorder/getData'); ?>",
                "type": "POST",
                data: function (d) {
                    d.to_date = $('#to_date').val();
                    d.from_date = $('#from_date').val();
                    d.type = type;
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
                    "data": "NAME",
                    "bSortable": true
                },
                {
                    "data": "CITY",
                    "bSortable": true
                },
                {
                    "data": "TRSPINST",
                    "bSortable": true
                },
                {
                    "data": "TRNET",
                    "bSortable": true
                },
                {
                    "data": "TRTOTQTY",
                    "bSortable": true
                },
                {
                    "data": "product",
                    "bSortable": true
                },
                {
                    "data": null,
                    "bSortable": false
                },
            ],
            "rowCallback": function (nRow, aData, iDisplayindex) {
                // if(aData.ISACTIVE==0){
                billData[iDisplayindex] = aData;
                if (aData.IS_ACTIVE == 1) {
                    $('td:eq(8)', nRow).html(""
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
                    $('td:eq(8)', nRow).html(""
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
        $("#deletePurchaseOrderModal").modal("show");
        $("#deletePurchaseOrderModal").find("[name=id]").attr("value", id);
    }

    function RecoverTheRow(index, id) {
        $("#recoverPurchaseOrderModal").modal("show");
        $("#recoverPurchaseOrderModal").find("[name=id]").attr("value", id);
    }
</script>
<?php $this->load->view('include/page_footer.php'); ?>
