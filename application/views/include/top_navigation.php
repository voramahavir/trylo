<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo site_url('dashboard'); ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b><?php echo (getSessionData('role_id') == 1) ? 'SUPER ADMIN' : getSessionData('branch_name'); ?></b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <?php if (getSessionData('role_id') == 1 && getSessionData('view_mode') == 2) { ?>
                <div class="col-md-2" style="padding-top: 8px;">
                    <select name="" id="sessBranch" class="form-control">
                        <option value="">Select Branch</option>
                    </select>
                </div>
            <?php } ?>

            <?php if (getSessionData('role_id') == 1 || getSessionData('role_id') == 2) { ?>
                <div class="col-md-2" style="padding-top: 8px;">
                    <select name="" id="viewMode" class="form-control">
                        <option value="1">Reports</option>
                        <option value="2">Transactions</option>
                    </select>
                </div>
            <?php } ?>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="<?php echo site_url('login/logout'); ?>"><i class="fa fa-sign-out"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>