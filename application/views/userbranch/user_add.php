<?php $this->load->view('include/template/common_header'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    Add User
                </div>
                <div class="box-body">
                    <form id="addUser">
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label class="col-md-3 text-right"> User Name : </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control user_name" name="user_name" id="user_name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <label class="col-md-3 text-right"> Password : </label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control password" name="password" id="password">
                                </div>
                            </div>
                        </div>
                        <?php if (getSessionData('role_id') == 1) { ?>
                            <div class="col-md-6">
                                <div class="row form-group">
                                    <label class="col-md-3 text-right"> Branch : </label>
                                    <div class="col-md-6">
                                        <select name="branch_id" id="branch_id" class="form-control">
                                            <option value="">Select Branch</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <?php } else {
                            ?>
                            <input type="hidden" class="form-control" name="branch_id" id="branch_id"
                                   value="<?php echo getSessionData('branch_id'); ?>">
                            <?php
                        } ?>
                        <div class="row form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center">
                                            <input type="checkbox" id="selectAll">
                                        </th>
                                        <th class="text-center">
                                            Form Name
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="form-details">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
                <div class="box-footer">
                    <a href="<?php echo site_url('users/list'); ?>" class="btn btn-default">Cancel</a>
                    <button type="button" class="btn btn-primary pull-right saveUser">Save</button>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('include/template/common_footer'); ?>
    <script type="text/javascript">
        function loadingStart() {
            $('.overlay').show();
        }

        function loadingStop() {
            $('.overlay').hide();
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
            loadingStart();
            var data = $("#addUser").serializeObject();
            $.ajax({
                url: site_url + 'users/create',
                dataType: 'JSON',
                type: 'POST',
                data: data,
                success: function (response) {
                    if (response.code == 1) {
                        bootbox.alert(response.msg, function () {
                            window.location = "<?php echo site_url('users/list'); ?>";
                        });
                    } else {
                        bootbox.alert(response.msg);
                    }
                    loadingStop();
                }
            });
        }

        function getForms() {
            loadingStart();
            $.ajax({
                url: "<?php echo site_url('users/forms'); ?>",
                dataType: 'json',
                type: "GET",
                success: function (response) {
                    if (response.length > 0) {
                        var mainDiv = document.getElementById('roles_div');
                        var html = "";
                        $.each(response, function (index, value) {
                            html += "<tr>";
                            html += "<td class='text-center'>";
                            html += "<input type='checkbox' value='" + value.form_id + "' name='roles[]' class='chkForm'>";
                            html += "</td>";
                            html += "<td class='text-center'>";
                            html += value.form_name;
                            html += "</td>";
                            html += "</tr>";
                        });
                        $('.form-details').html(html);
                        loadingStop();
                    }
                }
            });
        }

        $(document).ready(function () {
            loadingStop();
            var branchIdEle = $("#branch_id");
            if (branchIdEle.is('select')) {
                getBranches();
            }
            getForms();

            $(".saveUser").click(function () {
                if ($("#user_name").val() == "") {
                    bootbox.alert("Please Enter Username");
                }
                else if ($("#password").val() == "") {
                    bootbox.alert("Please Enter Password");
                }
                else if ($("#branch_id").val() == "") {
                    bootbox.alert("Please Select Branch name");
                }
                else if ($('[name="roles[]"]:checked').length == 0) {
                    bootbox.alert("Please Select forms for user");
                }
                else {
                    addUser();
                }
            });

            $('#selectAll').on('change', function () {
                $('.chkForm').prop('checked', $(this).prop('checked'));
            });

            $(document).on('change', $('.chkForm'), function () {
                var chkLen = $('[name="roles[]"]:checked').length;
                var chkBoxLen = $('[name="roles[]"]').length;
                if (chkLen == chkBoxLen) {
                    $('#selectAll').prop('checked', true);
                }
                else {
                    $('#selectAll').prop('checked', false);
                }
            });
        });
    </script>
<?php $this->load->view('include/page_footer.php'); ?>