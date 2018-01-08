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
                <h3 class="box-title"> Branches </h3>
            </div>
            <div class="box-body">
                <div class="dataTables_wrapper">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-info addbranch">
                                <span class="glyphicon glyphicon-plus"></span> Add New Branch
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover dataTable" id="table_branch">
                                <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Branch</th>
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
<div class="modal fade modal-3d-flip-horizontal" id="deleteBranchModal" aria-hidden="true"
     aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Are you sure you want to delete the Branch ? </h4>
                <input type="hidden" name="id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger deleteBranch">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- End DeleteModal -->
<!-- RecoverModal -->
<div class="modal fade modal-3d-flip-horizontal" id="recoverBranchModal" aria-hidden="true"
     aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Are you sure you want to recover the Branch ?</h4>
                <input type="hidden" name="id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success recoverBranch">Recover</button>
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
    $(document).ready(function () {

        $(document).on('click', '.addbranch', function () {
            window.location = "<?php echo site_url('branch/add'); ?>";
        });
        table = $('#table_branch').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "responsive": true,
            "autoWidth": false,
            "pageLength": 10,
            "ajax": {
                "url": "<?php echo site_url('branch/get'); ?>",
                "type": "POST"
            },
            "columns": [
                {
                    "data": "branch_id",
                    "bSortable": true
                },
                {
                    "data": "branch_name",
                    "bSortable": true
                },
                {
                    "data": null,
                    "bSortable": false
                },
            ],
            "rowCallback": function (nRow, aData, iDisplayindex) {
                branchid = <?php echo getSessionData('branch_id') ? getSessionData('branch_id') : 0; ?>;
                if (aData.is_active == 1) {
                    if (aData.branch_id == branchid) {
                        $('td:eq(2)', nRow).html(""
                            + "<button class='btn btn-info' onclick='return EditTheRow(" + iDisplayindex + "," + aData.branch_id + ");'>"
                            + "<i class='fa fa-edit'></i>"
                            + "</button>"
                            + "");
                    }
                    else {
                        $('td:eq(2)', nRow).html(""
                            + "<button class='btn btn-info' onclick='return EditTheRow(" + iDisplayindex + "," + aData.branch_id + ");'>"
                            + "<i class='fa fa-edit'></i>"
                            + "</button>"
                            + "<button class='btn btn-danger' onclick='return DeleteTheRow(" + iDisplayindex + "," + aData.branch_id + ");'>"
                            + "<i class='fa fa-trash-o'></i>"
                            + "</button>"
                            + "");
                    }

                } else {
                    $(nRow).addClass('danger');
                    $('td:eq(2)', nRow).html(""
                        + "<button class='btn btn-info' disabled onclick='return EditTheRow(" + iDisplayindex + "," + aData.branch_id + ");'>"
                        + "<i class='fa fa-edit'></i>"
                        + "</button>"
                        + "<button class='btn btn-success' onclick='return RecoverTheRow(" + iDisplayindex + "," + aData.branch_id + ");'>"
                        + "<i class='fa fa-check'></i>"
                        + "</button>"
                        + "");
                }
            },
        });
    });

    function DeleteTheRow(index, id) {
        $("#deleteBranchModal").modal("show");
        $("#deleteBranchModal").find("[name=id]").attr("value", id);
    }

    function RecoverTheRow(index, id) {
        $("#recoverBranchModal").modal("show");
        $("#recoverBranchModal").find("[name=id]").attr("value", id);
    }

    function EditTheRow(index, id) {
        window.location.href = "<?php echo site_url('branch/edit/'); ?>" + id;
    }

    $(".deleteBranch").on("click", function () {
        $(".deleteBranch").prop("disabled", true);
        var id = -1;
        id = $("#deleteBranchModal").find("[name=id]").val();
        $.post("<?php echo site_url('branch/delete/'); ?>" + id, {})
            .done(function (result) {
                result = JSON.parse(result);
                if (result.code == 1) {
                    table.ajax.reload();
                }
                $("#deleteBranchModal").modal("hide");
            });
        $(".deleteBranch").prop("disabled", false);
    });
    $(".recoverBranch").on("click", function () {
        $(".recoverBranch").prop("disabled", true);
        var id = -1;
        id = $("#recoverBranchModal").find("[name=id]").val();
        $.post("<?php echo site_url('branch/recover/'); ?>" + id, {})
            .done(function (result) {
                result = JSON.parse(result);
                if (result.code == 1) {
                    table.ajax.reload();
                }
                $("#recoverBranchModal").modal("hide");
            });
        $(".recoverBranch").prop("disabled", false);
    });
</script>
<?php $this->load->view('include/page_footer.php'); ?>
