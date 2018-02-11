<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Log in </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet"
          href="<?php echo base_url('assets/theme/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="<?php echo base_url('assets/theme/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet"
          href="<?php echo base_url('assets/theme/bower_components/Ionicons/css/ionicons.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/theme/dist/css/AdminLTE.min.css'); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('assets/theme/plugins/iCheck/square/blue.css'); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo base_url('dashboard'); ?>"><b>Trylo</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <div class="trans-panel hide">
            <p class="login-box-msg">Please select Branch to continue</p>
            <div class="form-group has-feedback">
                <div class="col-md-4 col-md-offset-4">
                    <select name="branch" id="branchId" class="form-control">
                        <option value="">Select Branch</option>
                    </select>
                </div>
            </div>
            <div class="form-group has-feedback">
                <button type="button" class="btn btn-primary saveBranch">Save</button>
            </div>
        </div>

        <!-- <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
            Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
            Google+</a>
        </div> -->
        <!-- /.social-auth-links -->

        <!-- <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a> -->

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/theme/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/theme/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/theme/plugins/iCheck/icheck.min.js'); ?>"></script>
<script>
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
                        localStorage.setItem("branches", html);
                        localStorage.setItem("branchDatas", JSON.stringify(branchDatas));
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
                            window.location.reload();
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
</body>
</html>
