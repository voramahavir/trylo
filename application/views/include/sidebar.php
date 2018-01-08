<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/theme/dist/img/user2-160x160.jpg'); ?>" class="img-circle"
                     alt="User Image">
            </div>
            <div class="pull-left info">
                <p> <?php echo getSessionData('user_name'); ?> </p>
                <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <?php
            $forms_data = getSessionData('form_data');
            if ($forms_data) {
                foreach ($forms_data as $main_form => $form_data) {
                    $html = "";
                    if (!isset($form_data['forms'][0])) {
                        if ($form_data['view_mode'] == getSessionData('view_mode')) {
                            $_form_data = $form_data['forms'];
                            $cls = isset($page_title) && in_array($page_title, explode(',', $_form_data['active_tabs'])) ? 'active' : '';
                            $redirect_url = site_url($_form_data['redirect_url']);
                            $icon = $_form_data['icon'];
                            $form_name = $_form_data['form_name'];
                            $html .= "<li class='{$cls}'>";
                            $html .= "<a href='{$redirect_url}'>";
                            $html .= "<i class='{$icon}'></i> <span>{$form_name}</span>";
                            $html .= "</a>";
                            $html .= "</li>";
                        }
                    } else {
                        if ($form_data['view_mode'] == getSessionData('view_mode')) {
                            $_form_data = $form_data['forms'];
                            $main_active_tabs = $form_data['main_active_tabs'];
                            $main_cls = isset($page_title) && in_array($page_title, explode(',', $main_active_tabs)) ? 'active' : '';
                            $main_icon = $form_data['main_icon'];//                        $icon = $_form_data['icon'];
                            $html .= "<li class='treeview {$main_cls}'>";
                            $html .= "<a href='#'>";
                            $html .= "<i class='{$main_icon}'></i> <span>{$main_form}</span>";
                            $html .= "<span class='pull-right-container'>";
                            $html .= "<i class='fa fa-angle-left pull-right'></i>";
                            $html .= "</span>";
                            $html .= "</a>";
                            $html .= "<ul class='treeview-menu'>";
                            foreach ($_form_data as $data) {
                                $cls = isset($page_title) && in_array($page_title, explode(',', $data['active_tabs'])) ? 'active' : '';
                                $redirect_url = site_url($data['redirect_url']);
                                $icon = $data['icon'];
                                $form_name = $data['form_name'];
                                $html .= "<li class='{$cls}'>";
                                $html .= "<a href='{$redirect_url}'>";
                                $html .= "<i class='{$icon}'></i> {$form_name}";
                                $html .= "</a>";
                                $html .= "</li>";
                            }
                            $html .= "</ul>";
                            $html .= "</li>";
                        }
//                        print_r($_form_data);
                    }
                    echo $html;
                }
            }
            ?>
            <!--            <li class="<?php /*echo isset($page_title) && $page_title == 'Dashboard' ? ' active' : ''; */ ?>">
                <a href="<?php /*echo site_url('dashboard'); */ ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <?php /*if (getSessionData('role_id') == 1) { */ ?>
                <li class="<?php /*echo isset($page_title) && ($page_title == 'Branch List' || $page_title == 'Add Branch' || $page_title == 'Edit Branch') ? ' active' : ''; */ ?>">
                    <a href="<?php /*echo site_url('branch/list'); */ ?>">
                        <i class="fa fa-dashboard"></i> <span>Branch</span>
                    </a>
                </li>
            <?php /*} */ ?>
            <li class="<?php /*echo isset($page_title) && ($page_title == 'User List' || $page_title == 'Add User') ? ' active' : ''; */ ?>">
                <a href="<?php /*echo site_url('users/list'); */ ?>">
                    <i class="fa fa-users"></i> <span>Users</span>
                </a>
            </li>
            <li class="header">TRANSACTION</li>
            <ul class="treeview-menu"><li class=""><a href="branch/list"><i class="fa fa-circle-o"></i> Branch</a></li><li class=""><a href="users/list"><i class="fa fa-users"></i> Users</a></li></ul>
            <li class="treeview<?php /*echo (isset($page_title) && ($page_title == 'Sales Add' || $page_title == 'Sales Bill' || $page_title == 'Sales Return List' || $page_title == 'Sales Return Add')) ? ' active' : ''; */ ?>">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Sales</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php /*echo isset($page_title) && $page_title == 'Sales Add' ? 'active' : ''; */ ?>"><a
                                href="<?php /*echo site_url('salesAdd'); */ ?>"><i class="fa fa-circle-o"></i> Sales Add</a>
                    </li>
                    <li class="<?php /*echo isset($page_title) && $page_title == 'Sales Bill' ? 'active' : ''; */ ?>"><a
                                href="<?php /*echo site_url('salesBill'); */ ?>"><i class="fa fa-circle-o"></i> Sales
                            Bill</a></li>
                    <li class="<?php /*echo isset($page_title) && ($page_title == 'Sales Return List' || $page_title == 'Sales Return Add') ? 'active' : ''; */ ?>">
                        <a
                                href="<?php /*echo site_url('salesreturn'); */ ?>"><i class="fa fa-circle-o"></i>
                            Sales Return</a></li>
                </ul>
            </li>

            <li class="treeview<?php /*echo (isset($page_title) && ($page_title == 'Purchase Intransit List' || $page_title == 'Verify Purchase List' || $page_title == 'Verify Purchase' || $page_title == 'Purchase Return List' || $page_title == 'Purchase Return Add' || $page_title == 'Purchase Order List' || $page_title == 'Purchase Order Add')) ? ' active' : ''; */ ?>">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Purchase</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php /*echo isset($page_title) && $page_title == 'Purchase Intransit List' ? 'active' : ''; */ ?>">
                        <a href="<?php /*echo site_url('purchase'); */ ?>"><i class="fa fa-circle-o"></i> Purchase Bill
                            [IN
                            TRANSIT]</a></li>
                    <li class="<?php /*echo isset($page_title) && ($page_title == 'Verify Purchase List' || $page_title == 'Verify Purchase') ? 'active' : ''; */ ?>">
                        <a href="<?php /*echo site_url('purchase/verifyList'); */ ?>"><i class="fa fa-circle-o"></i> Verify
                            InTransit Bill</a></li>
                    <li class="<?php /*echo isset($page_title) && ($page_title == 'Purchase Return List' || $page_title == 'Purchase Return Add') ? 'active' : ''; */ ?>">
                        <a href="<?php /*echo site_url('purchasereturn'); */ ?>"><i class="fa fa-circle-o"></i> Purchase
                            Return</a></li>
                    <li class="<?php /*echo isset($page_title) && ($page_title == 'Purchase Order List' || $page_title == 'Purchase Order Add') ? 'active' : ''; */ ?>">
                        <a href="<?php /*echo site_url('purchaseorder'); */ ?>"><i class="fa fa-circle-o"></i> Purchase
                            Order</a></li>
                </ul>
            </li>

            <li class="treeview<?php /*echo (isset($page_title) && ($page_title == 'Stock List' || $page_title == 'Stock Add')) ? ' active' : ''; */ ?>">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Physical Stock</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php /*echo isset($page_title) && $page_title == 'Stock List' ? 'active' : ''; */ ?>"><a
                                href="<?php /*echo site_url('stock'); */ ?>"><i class="fa fa-circle-o"></i> Physical Stock
                            Entry</a></li>
                    <li class="<?php /*echo isset($page_title) && $page_title == 'Stock Add' ? 'active' : ''; */ ?>"><a
                                href="<?php /*echo site_url('stock/add'); */ ?>"><i class="fa fa-circle-o"></i> Add</a></li>
                </ul>
            </li>

            <li class="treeview <?php /*echo (isset($page_title) && ($page_title == 'Membership Card Registration' || $page_title == 'Loyalty Card Issue Entry' || $page_title == 'Add Membership Card')) ? 'active' : ''; */ ?>">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Membership & Loyalty</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php /*echo isset($page_title) && $page_title == 'Membership Card Registration' ? 'active' : ''; */ ?>">
                        <a href="<?php /*echo site_url('membershipcard/cardList'); */ ?>"><i class="fa fa-circle-o"></i>
                            Membership Card Registration</a></li>
                    <li class="<?php /*echo isset($page_title) && $page_title == 'Loyalty Card Issue Entry' ? 'active' : ''; */ ?>">
                        <a href="<?php /*echo site_url('loyaltycard/cardList'); */ ?>"><i class="fa fa-circle-o"></i> Loyalty
                            Card Issue Entry</a></li>
                </ul>
            </li>
            <li class="<?php /*echo (isset($page_title) && ($page_title == 'Denomination List' || $page_title == 'Add Denomination' || $page_title == 'Edit Denomination')) ? 'active' : ''; */ ?>">
                <a href="<?php /*echo site_url('denomination'); */ ?>">
                    <i class="fa fa-dashboard"></i> <span>Denomination Exchange</span>
                </a>
            </li>
            <li><a href="<?php /*echo site_url('searchItem'); */ ?>"><i class="fa fa-dashboard"></i> <span>Search Item</span></a>
            </li>
            <li class="<?php /*echo isset($page_title) && ($page_title == 'Voucher List' || $page_title == 'Add Voucher' || $page_title == 'Edit Voucher') ? 'active' : ''; */ ?>">
                <a href="<?php /*echo site_url('voucher/list'); */ ?>"><i class="fa fa-dashboard"></i>
                    <span>Voucher Entry</span></a>
            </li>
            <li class="<?php /*echo isset($page_title) && ($page_title == 'DND Mobile Entry') ? 'active' : ''; */ ?>">
                <a href="<?php /*echo site_url('dndmobile/list'); */ ?>"><i class="fa fa-dashboard"></i>
                    <span>DND Mobile Number Entry</span></a>
            </li>
            <li class="<?php /*echo isset($page_title) && ($page_title == 'Lucky Draw List' || $page_title == 'Add Lucky Draw' || $page_title == 'Edit Lucky Draw') ? 'active' : ''; */ ?>">
                <a href="<?php /*echo site_url('luckydraw/list'); */ ?>"><i class="fa fa-dashboard"></i>
                    <span>LuckyDraw Feedback Form</span></a>
            </li>
            <li class="<?php /*echo isset($page_title) && ($page_title == 'Customer Experience List' || $page_title == 'Add Customer Experience' || $page_title == 'Edit Customer Experience') ? 'active' : ''; */ ?>">
                <a href="<?php /*echo site_url('customerfeedback/list'); */ ?>"><i class="fa fa-dashboard"></i>
                    <span>Cust. Experience Feedback Form</span></a>
            </li>
            <li class="header">REPORTS</li>

            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Stock Report</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Sales Report</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Purchase Report</span></a></li>-->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
