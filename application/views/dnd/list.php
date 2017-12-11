<?php $this->load->view('include/template/common_header') ?>
<style type="text/css">
    /*.table > tbody > tr > td {
         vertical-align: middle;
         text-align: center;
    }*/
</style>
<link rel="stylesheet"
      href="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> DND Mobile Number Entry </h3>
            </div>
            <div class="box-body">
                <div class="dataTables_wrapper">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <button type="button" onclick="AddTheRow()" class="btn btn-info" data-toggle="modal"
                                    data-target="#modal-default">
                                <span class="glyphicon glyphicon-plus"></span> Add
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover dataTable" id="table_dnd">
                                <thead>
                                <tr>
                                    <th>DND Mobile No.</th>
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
<!-- AddModal -->
<div class="modal fade modal-3d-flip-horizontal" id="addDNDModal" aria-hidden="true" aria-labelledby="exampleModalTitle"
     role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addDND" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Add DND Mobile No</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row form-group">
                                <label class="col-md-3 text-right"> Mobile No : </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control MOBILENO" name="MOBILENO">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger margin-0" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-default addDND">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End AddModal -->
<!-- UpdateModal -->
<div class="modal fade modal-3d-flip-horizontal" id="editDNDModal" aria-hidden="true"
     aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editDND" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Edit DND Mobile No</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row form-group">
                                <label class="col-md-3 text-right"> Mobile No : </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control MOBILENO" name="MOBILENO">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger margin-0" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-default editDND">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End UpdateModal -->
<!-- DeleteModal -->
<div class="modal fade modal-3d-flip-horizontal" id="deleteDNDModal" aria-hidden="true"
     aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Are you sure you want to delete the Mobile No ? </h4>
                <input type="hidden" name="id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger deleteDND">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- End DeleteModal -->
<!-- RecoverModal -->
<div class="modal fade modal-3d-flip-horizontal" id="recoverDNDModal" aria-hidden="true"
     aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Are you sure you want to recover the Mobile No ?</h4>
                <input type="hidden" name="id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success recoverDND">Recover</button>
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
    var table = null;
    var data = [];
    var id = 0;
    $(document).ready(function () {
        table = $('#table_dnd').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "responsive": true,
            "autoWidth": false,
            "pageLength": 10,
            "ajax": {
                "url": "<?php echo site_url('dndmobile/get'); ?>",
                "type": "POST"
            },
            "columns": [
                {
                    "data": "mobileno",
                    "bSortable": true
                },
                {
                    "data": null,
                    "bSortable": false
                }
            ],
            "rowCallback": function (nRow, aData, iDisplayindex) {
                data.push(aData);
                userid = 1;
                if (aData.is_active == 1) {
                    // if(aData.id==userid){
                    //     $('td:eq(5)',nRow).html(""
                    //         +"<button class='btn btn-info' onclick='return EditTheRow("+iDisplayindex+","+aData.id+");'>"
                    //         +"<i class='fa fa-edit'></i>"
                    //         +"</button>"
                    //         +"<button class='btn btn-danger' disabled>"
                    //         +"<i class='fa fa-trash-o'></i>"
                    //         +"</button>"
                    //     +"");
                    // }
                    // else{
                    $('td:eq(1)', nRow).html(""
                        + "<button class='btn btn-info' onclick='return EditTheRow(" + iDisplayindex + "," + aData.mobileno + ");'>"
                        + "<i class='fa fa-edit'></i>"
                        + "</button>"
                        + "<button class='btn btn-danger' onclick='return DeleteTheRow(" + iDisplayindex + "," + aData.mobileno + ");'>"
                        + "<i class='fa fa-trash-o'></i>"
                        + "</button>"
                        + "");
                    // }

                } else {
                    $(nRow).addClass('danger');
                    $('td:eq(1)', nRow).html(""
                        + "<button class='btn btn-info' disabled onclick='return EditTheRow(" + iDisplayindex + "," + aData.mobileno + ");'>"
                        + "<i class='fa fa-edit'></i>"
                        + "</button>"
                        + "<button class='btn btn-success' onclick='return RecoverTheRow(" + iDisplayindex + "," + aData.mobileno + ");'>"
                        + "<i class='fa fa-check'></i>"
                        + "</button>"
                        + "");
                }
            },
        });
    });

    function DeleteTheRow(index, id) {
        $("#deleteDNDModal").modal("show");
        $("#deleteDNDModal").find("[name=id]").attr("value", id);
    }

    function RecoverTheRow(index, id) {
        $("#recoverDNDModal").modal("show");
        $("#recoverDNDModal").find("[name=id]").attr("value", id);
    }

    function EditTheRow(index, aid) {
        $("#editDNDModal").modal("show");
        $("#editDNDModal").find("[name=MOBILENO]").attr("value", aid);
        id = aid;
    }

    function AddTheRow() {
        $("#addDNDModal").modal("show");
    }

    $(".deleteDND").on("click", function () {
        $(".deleteDND").prop("disabled", true);
        var id = -1;
        id = $("#deleteDNDModal").find("[name=id]").val();
        $.post("<?php echo site_url('dndmobile/delete/'); ?>" + id, {})
            .done(function (result) {
                result = JSON.parse(result);
                if (result.code == 1) {
                    table.ajax.reload();
                }
                $("#deleteDNDModal").modal("hide");
            });
        $(".deleteDND").prop("disabled", false);
    });
    $(".recoverDND").on("click", function () {
        $(".recoverDND").prop("disabled", true);
        var id = -1;
        id = $("#recoverDNDModal").find("[name=id]").val();
        $.post("<?php echo site_url('dndmobile/recover/'); ?>" + id, {})
            .done(function (result) {
                result = JSON.parse(result);
                if (result.code == 1) {
                    table.ajax.reload();
                }
                $("#recoverDNDModal").modal("hide");
            });
        $(".recoverDND").prop("disabled", false);
    });
    $("form#addDND").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "<?php echo site_url('dndmobile/add'); ?>",
            type: 'POST',
            data: formData,
            success: function (data) {
                data = JSON.parse(data);
                alert(data.msg);
                if (data.code) {
                    $("#addDNDModal").modal("hide");
                    table.ajax.reload();
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
    $("form#editDND").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "<?php echo site_url('dndmobile/edit/');?>" + id,
            type: 'POST',
            data: formData,
            success: function (data) {
                data = JSON.parse(data);
                alert(data.msg);
                if (data.code) {
                    $("#editDNDModal").modal("hide");
                    table.ajax.reload();
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>
<?php $this->load->view('include/page_footer.php'); ?>
