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
        <div class="login-panel">
            <p class="login-box-msg">Sign in to start your session</p>

            <form method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username" name="user_name">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <!-- <div class="checkbox icheck">
                          <label>
                            <input type="checkbox"> Remember Me
                          </label>
                        </div> -->
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <a class="btn btn-primary btn-block btn-flat submit">Sign In</a>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <div class="trans-panel hide">
            <p class="login-box-msg">Please choose one of the option</p>
            <div class="form-group has-feedback">
                <button class="btn btn-block btn-primary reports">Reports</button>
            </div>
            <div class="form-group has-feedback">
                <button class="btn btn-block btn-primary trans">Transactions</button>
            </div>
        </div>
        <div class="branch-panel hide">
            <p class="login-box-msg">Please select Branch to continue</p>
            <div class="form-group has-feedback">
                <select name="branch" id="branchId" class="form-control">
                    <option value="">Select Branch</option>
                </select>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="button" class="btn btn-primary saveBranch pull-right">Save</button>
                </div>
            </div>
        </div>
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
    $(function () {
        function setViewMode(view_mode) {
            $.ajax({
                url: "<?php echo site_url('LoginController/setViewMode'); ?>",
                method: 'POST',
                data: {view_mode: view_mode},
                dataType: "json",
                success: function (result) {
                    if (view_mode == 1) {
                        var redirect_url = result.redirect_url;
                        window.location.href = "<?php echo site_url(); ?>/" + redirect_url;
                    }
                    else {
                        $('.trans-panel').addClass('hide');
                        $('.branch-panel').removeClass('hide');
                    }
                }
            });
        }

        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });

        $(".submit").click(function () {
            $.ajax({
                url: "<?php echo site_url('LoginController/verify'); ?>",
                method: 'POST',
                data: {user_name: $('[name="user_name"]').val(), password: $('[name="password"]').val()},
                dataType: "json",
                success: function (result) {
                    console.log(result);
                    if (result.code) {
                        var role_id = result.data;
                        if (role_id == 1 || role_id == 2) {
                            $('.login-panel').addClass('hide');
                            $('.trans-panel').removeClass('hide');
                        }
                        else {
                            setViewMode(2);
                        }

                    } else {
                        alert('Invalid credential');
                    }
                }
            });
        });

        $('[name="password"]').keyup(function (event) {
            if (event.keyCode == 13) {
                $('.submit').click();
            }
        });
        if (localStorage.getItem("branchDatas")) {
            localStorage.removeItem("branchDatas");
        }
        if (localStorage.getItem("branches")) {
            localStorage.removeItem("branches");
        }
        $('.reports').click(function () {
            setViewMode(1);
        });
        $('.trans').click(function () {
            setViewMode(2);
            var saveBranchBtn = $('.saveBranch');
            console.log(saveBranchBtn);
            var branchDatas = {};
            if (saveBranchBtn.length) {
                $.ajax({
                    url: "<?php echo site_url('LoginController/getAllBranches'); ?>",
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
                            url: "<?php echo site_url('LoginController/saveBranch'); ?>",
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

    });
</script>
</body>
</html>
