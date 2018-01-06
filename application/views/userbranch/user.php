<?php $this->load->view('include/template/common_header') ?>
<style type="text/css">

</style>
<link rel="stylesheet"
      href="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Users </h3>
            </div>
            <div class="box-body">
                <div class="dataTables_wrapper">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                                 <span class="glyphicon glyphicon-plus"></span> Add New User
                             </button>-->
                            <a class="btn btn-info" href="<?php echo site_url('users/add'); ?>">
                                <span class="glyphicon glyphicon-plus"></span> Add New User
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover dataTable" id="table_branch">
                                <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>User</th>
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
<div class="modal fade modal-3d-flip-horizontal" id="deleteUserModal" aria-hidden="true"
     aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Are you sure you want to delete the User ? </h4>
                <input type="hidden" name="id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger deleteUser">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- End DeleteModal -->
<!-- RecoverModal -->
<div class="modal fade modal-3d-flip-horizontal" id="recoverUserModal" aria-hidden="true"
     aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Are you sure you want to recover the User ?</h4>
                <input type="hidden" name="id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success recoverUser">Recover</button>
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
    var table = "";

    function DeleteTheRow(id) {
        $("#deleteUserModal").modal("show");
        $("#deleteUserModal").find("[name=id]").attr("value", id);
    }

    function RecoverTheRow(id) {
        $("#recoverUserModal").modal("show");
        $("#recoverUserModal").find("[name=id]").attr("value", id);
    }

    $(document).ready(function () {
        table = $('#table_branch').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "responsive": true,
            "autoWidth": false,
            "pageLength": 10,
            "order": [1, "asc"],
            "ajax": {
                "url": "<?php echo site_url('users/get'); ?>",
                "type": "POST"
            },
            "columns": [
                {
                    "data": null,
                    "bSortable": false
                },
                {
                    "data": "user_name",
                    "bSortable": true
                },
                {
                    "data": null,
                    "bSortable": false
                },
            ],
            "rowCallback": function (nRow, aData, iDisplayindex) {
                userid = <?php echo getSessionData('user_id'); ?>;
                var pageInfo = table.page.info();
                var page = pageInfo.page;
                var length = pageInfo.length;
                var index = (page * length + (iDisplayindex + 1));
                $('td:eq(0)', nRow).html(index).addClass('col-md-1');

                if (aData.is_active == 1) {
                    if (aData.user_id == userid) {
                        $('td:eq(2)', nRow).html(""
                            + "<a class='btn btn-info' href='" + site_url + 'users/edit/' + aData.user_id + "'>"
                            + "<i class='fa fa-edit'></i>"
                            + "</a>"
                            + "");
                    }
                    else {
                        $('td:eq(2)', nRow).html(""
                            + "<a class='btn btn-info' href='" + site_url + 'users/edit/' + aData.user_id + "'>"
                            + "<i class='fa fa-edit'></i>"
                            + "</a>"
                            + "<button class='btn btn-danger' onclick='return DeleteTheRow(" + aData.user_id + ");'>"
                            + "<i class='fa fa-trash-o'></i>"
                            + "</button>"
                            + "");
                    }

                } else {
                    $(nRow).addClass('danger');
                    $('td:eq(2)', nRow).html(""
                        + "<button class='btn btn-info' disabled>"
                        + "<i class='fa fa-edit'></i>"
                        + "</button>"
                        + "<button class='btn btn-success' onclick='return RecoverTheRow(" + aData.user_id + ");'>"
                        + "<i class='fa fa-check'></i>"
                        + "</button>"
                        + "");
                }
            },
        });
        $(".deleteUser").on("click", function () {
            $(".deleteUser").prop("disabled", true);
            var id = -1;
            id = $("#deleteUserModal").find("[name=id]").val();
            $.post("<?php echo site_url('users/delete/'); ?>" + id, {})
                .done(function (result) {
                    result = JSON.parse(result);
                    if (result.code == 1) {
                        table.ajax.reload();
                    }
                    $("#deleteUserModal").modal("hide");
                });
            $(".deleteUser").prop("disabled", false);
        });

        $(".recoverUser").on("click", function () {
            $(".recoverUser").prop("disabled", true);
            var id = -1;
            id = $("#recoverUserModal").find("[name=id]").val();
            $.post("<?php echo site_url('users/recover/'); ?>" + id, {})
                .done(function (result) {
                    result = JSON.parse(result);
                    if (result.code == 1) {
                        table.ajax.reload();
                    }
                    $("#recoverUserModal").modal("hide");
                });
            $(".recoverUser").prop("disabled", false);
        });

    });
</script>
<?php $this->load->view('include/page_footer.php'); ?>
