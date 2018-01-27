<?php $this->load->view('include/template/common_header') ?>
<link rel="stylesheet"
      href="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Denomination Entry</h3>
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
                <div class="row form-group">
                    <div class="col-md-12">
                        <a href="<?php echo site_url('denomination/add') ?>" class="btn btn-info">
                            <span class="glyphicon glyphicon-plus"></span> Add
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover dataTable" id="table_denomination">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Type of A/c</th>
                                <th>Note</th>
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
<div class="modal fade modal-3d-flip-horizontal" id="deleteDenominationModal" aria-hidden="true"
     aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Are you sure you want to delete the Denomination ? </h4>
                <input type="hidden" name="id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger deleteDenomination">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- End DeleteModal -->
<!-- RecoverModal -->
<div class="modal fade modal-3d-flip-horizontal" id="recoverDenominationModal" aria-hidden="true"
     aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Are you sure you want to recover the Denomination ?</h4>
                <input type="hidden" name="id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success recoverDenomination">Recover</button>
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
    });
    $("#from_date").on('change', function () {
        table.ajax.reload();
    });
    $("#to_date").on('change', function () {
        table.ajax.reload();
    });

    table = $('#table_denomination').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "responsive": true,
        "autoWidth": false,
        "pageLength": 10,
        "ajax": {
            "url": "<?php echo site_url('denomination/get'); ?>",
            "type": "POST",
            data: function (d) {
                d.to_date = $('#to_date').val();
                d.from_date = $('#from_date').val();
            }
        },
        "columns": [
            {
                "data": "VOUNO",
                "bSortable": true
            }, {
                "data": null,
                "bSortable": true
            }, {
                "data": null,
                "bSortable": true
            }, {
                "data": "TRNAME",
                "bSortable": true
            }, {
                "data": "TRNOTE",
                "bSortable": true
            },
            {
                "data": null,
                "bSortable": false
            }
        ],
        "rowCallback": function (nRow, aData, iDisplayindex) {
            var VOUDT = new Date(aData.VOUDT);
            $('td:eq(1)', nRow).html(VOUDT.toString('dd/MM/yyyy'));
            var type = 'Opening';
            if (aData.TYPE == 2) {
                type = 'Exchange Inw/Outw';
            }
            $('td:eq(2)', nRow).html(type);
            if (aData.IS_ACTIVE == 1) {
                $('td:eq(5)', nRow).html(""
                    + "<button class='btn btn-info' onclick='return EditTheRow(" + iDisplayindex + "," + aData.VOUNO + ");'>"
                    + "<i class='fa fa-edit'></i>"
                    + "</button>"
                    + "<button class='btn btn-danger' onclick='return DeleteTheRow(" + iDisplayindex + "," + aData.VOUNO + ");'>"
                    + "<i class='fa fa-trash-o'></i>"
                    + "</button>"
                    + "");
                // }

            } else {
                $(nRow).addClass('danger');
                $('td:eq(5)', nRow).html(""
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

    $(".deleteDenomination").on("click", function () {
        $(".deleteDenomination").prop("disabled", true);
        var id = -1;
        id = $("#deleteDenominationModal").find("[name=id]").val();
        $.post("<?php echo site_url('denomination/delete/'); ?>" + id, {})
            .done(function (result) {
                result = JSON.parse(result);
                if (result.code == 1) {
                    table.ajax.reload();
                }
                $("#deleteDenominationModal").modal("hide");
            });
        $(".deleteDenomination").prop("disabled", false);
    });

    $(".recoverDenomination").on("click", function () {
        $(".recoverDenomination").prop("disabled", true);
        var id = -1;
        id = $("#recoverDenominationModal").find("[name=id]").val();
        $.post("<?php echo site_url('denomination/recover/'); ?>" + id, {})
            .done(function (result) {
                result = JSON.parse(result);
                if (result.code == 1) {
                    table.ajax.reload();
                }
                $("#recoverDenominationModal").modal("hide");
            });
        $(".recoverDenomination").prop("disabled", false);
    });

    function DeleteTheRow(index, id) {
        $("#deleteDenominationModal").modal("show");
        $("#deleteDenominationModal").find("[name=id]").attr("value", id);
    }

    function RecoverTheRow(index, id) {
        $("#recoverDenominationModal").modal("show");
        $("#recoverDenominationModal").find("[name=id]").attr("value", id);
    }

    function EditTheRow(index, id) {
        window.location.href = "<?php echo site_url('denomination/edit/'); ?>" + id;
    }
</script>
<?php $this->load->view('include/page_footer.php'); ?>