<?php if (!getSessionData('branch_id')) { ?>
    <div class="modal fade" id="branch-modal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    Select Branch to continue
                </div>
                <div class="modal-body">
                    <div class="col-md-4 col-md-offset-4">
                        <select name="branch" id="branchId" class="form-control">
                            <option value="">Select Branch</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary saveBranch">Save</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php $this->load->view('include/footer.php');
// $this->load->view('include/right_sidebar.php');
$this->load->view('include/scripts.php'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        var saveBranchBtn = $('.saveBranch');
        var branchModal = $('#branch-modal');
        if (branchModal.length) {
            branchModal.modal({
                backdrop: 'static',
                keyboard: false
            });
        }
        var branchDatas = {};
        if (saveBranchBtn.length) {
            $.ajax({
                url: site_url + 'branch/getAll',
                dataType: 'JSON',
                success: function (response) {
                    if (response.code) {
                        var html = '<option value="">Select Branch</option>';
                        var data = response.data;

                        $.each(data, function (index, value) {
                            html += '<option value="' + value.branch_id + '">' + value.branch_name + '</option>';
                            branchDatas[value.branch_id] = value;
                        });
                        $("#branchId").html(html);
                    }
                }
            });
            saveBranchBtn.on('click', function () {
                var branch_id = $("#branchId").val();
                if (branch_id) {
                    var branchData = branchDatas[branch_id];
                    $.ajax({
                        url: site_url + 'branch/saveBranch',
                        dataType: 'JSON',
                        type: 'POST',
                        data: {
                            branchData: branchData
                        },
                        success: function (response) {
                            if (response.code) {
                                $('#branch-modal').modal('hide');
                            }
                            bootbox.alert(response.msg, function () {
                                window.location.reload();
                            });
                        }
                    });
                }
                else {
                    bootbox.alert("Please select Branch");
                }
            });
        }
    });
</script>
