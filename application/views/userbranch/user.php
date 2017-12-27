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
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                                <span class="glyphicon glyphicon-plus"></span> Add New User
                            </button>
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
<div class="modal" id="modal-default">
    <div class="modal-dialog my-modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add New User</h4>
            </div>
            <div class="modal-body">
                <form id="addUser">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <input type="text" name="user_name" placeholder="User Name" class="form-control" value="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <select name="branch_id" id="branch_id" class="form-control">
                                <option value="">Select Branch</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12" id="roles_div" name="roles_div">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save">Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php $this->load->view('include/template/common_footer'); ?>
<!-- Bootstrap-notify -->
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script type="text/javascript">
    var table = "";
    $(document).ready(function () {
        getForms();
        getBranches();
        table = $('#table_branch').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "responsive": true,
            "autoWidth": false,
            "pageLength": 10,
            "ajax": {
                "url": "<?php echo site_url('users/get'); ?>",
                "type": "POST"
            },
            "columns": [
                {
                    "data": "user_id",
                    "bSortable": true
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
                if (aData.is_active == 1) {
                    if (aData.user_id == userid) {
                        $('td:eq(2)', nRow).html(""
                            + "<button class='btn btn-info' onclick='return EditTheRow(" + iDisplayindex + "," + aData.user_id + ");'>"
                            + "<i class='fa fa-edit'></i>"
                            + "</button>"
                            + "");
                    }
                    else {
                        $('td:eq(2)', nRow).html(""
                            + "<button class='btn btn-info' onclick='return EditTheRow(" + iDisplayindex + "," + aData.user_id + ");'>"
                            + "<i class='fa fa-edit'></i>"
                            + "</button>"
                            + "<button class='btn btn-danger' onclick='return DeleteTheRow(" + iDisplayindex + "," + aData.user_id + ");'>"
                            + "<i class='fa fa-trash-o'></i>"
                            + "</button>"
                            + "");
                    }

                } else {
                    $(nRow).addClass('danger');
                    $('td:eq(2)', nRow).html(""
                        + "<button class='btn btn-info' disabled onclick='return EditTheRow(" + iDisplayindex + "," + aData.user_id + ");'>"
                        + "<i class='fa fa-edit'></i>"
                        + "</button>"
                        + "<button class='btn btn-success' onclick='return RecoverTheRow(" + iDisplayindex + "," + aData.user_id + ");'>"
                        + "<i class='fa fa-check'></i>"
                        + "</button>"
                        + "");
                }
            },
        });
        $(".save").click(function () {
            addUser();
        });
    });

    function getForms() {
        $.ajax({
            url: "<?php echo site_url('users/forms'); ?>",
            dataType: 'json',
            type: "GET",
            success: function (response) {
                if (response.length > 0) {
                    var mainDiv = document.getElementById('roles_div');
                    var html = "";
                    /*for (var i = 0; i < response.length; i++) {
                        var div = document.createElement('div');
                        div.className = "col-md-3";
                        var checkbox = document.createElement('input');
                        checkbox.type = "checkbox";
                        checkbox.name = "roles[]";
                        checkbox.value = response[i].form_id;
                        checkbox.id = "roles" + response[i].form_id;
                        div.appendChild(checkbox);
                        var newlabel = document.createElement("Label");
                        newlabel.setAttribute("for",checkbox.id);
                        newlabel.innerHTML = response[i].form_name;
                        div.appendChild(newlabel);
                        mainDiv.appendChild(div);
                    }*/
                }
            }
        });
    }

    function getBranches() {
        $.ajax({
            url: site_url + 'branch/getAll',
            dataType: 'JSON',
            success: function (response) {
                if (response.code) {
                    var html = '<option value="">Select Branch</option>';
                    var data = response.data;
                    $.each(data, function (index, value) {
                        html += '<option value="' + value.branch_id + '">' + value.branch_name + '</option>';
                    });
                    $("#branch_id").html(html);
                }
            }
        });
    }

    function addUser() {
        var data = $("#addUser").serializeObject();
        $.ajax({
            url: site_url + 'users/create',
            dataType: 'JSON',
            type: 'POST',
            data: data,
            success: function (response) {
                bootbox.alert(response.msg, function () {
                    $('#modal-default').modal('hide');
                });
                table.ajax.reload();
            }
        });
    }
</script>
<?php $this->load->view('include/page_footer.php'); ?>
