<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/theme/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> USER NAME </p>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php echo isset($page_title) && $page_title == 'Dashboard' ? ' active' : ''; ?>">
          <a href="<?php echo site_url('dashboard'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="<?php echo isset($page_title) && $page_title == 'Branch' ? ' active' : ''; ?>">
          <a href="<?php echo site_url('branch/list'); ?>">
            <i class="fa fa-dashboard"></i> <span>Branch</span>
          </a>
        </li>
        <li class="<?php echo isset($page_title) && $page_title == 'Users' ? ' active' : ''; ?>">
          <a href="<?php echo site_url('users/list'); ?>">
            <i class="fa fa-users"></i> <span>Users</span>
          </a>
        </li>
        <li class="header">TRANSACTION</li>
        <li class="treeview<?php echo (isset($page_title) && ($page_title == 'Sales Add' || $page_title == 'Sales Bill')) ? ' active' : ''; ?>">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Sales</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo isset($page_title) && $page_title == 'Sales Add' ? 'active' : ''; ?>"><a href="<?php echo site_url('salesAdd'); ?>"><i class="fa fa-circle-o"></i> Sales Add</a></li>
            <li class="<?php echo isset($page_title) && $page_title == 'Sales Bill' ? 'active' : ''; ?>"><a href="<?php echo site_url('salesBill'); ?>"><i class="fa fa-circle-o"></i> Sales Bill</a></li>
            <li class="<?php echo isset($page_title) && $page_title == 'Sales Return' ? 'active' : ''; ?>"><a href="<?php echo site_url('salesreturn/salesreturnList'); ?>"><i class="fa fa-circle-o"></i> Sales Return</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Purchase</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('purchase/list'); ?>"><i class="fa fa-circle-o"></i> Purchase Bill [IN TRANSIT]</a></li>
            <li><a href="#<?php echo site_url('Purchase/add'); ?>"><i class="fa fa-circle-o"></i> Purchase Add</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Purchase Return</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Physical Stock Entry</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo isset($page_title) && $page_title == 'Stock Add' ? 'active' : ''; ?>"><a href="<?php echo site_url('stock/add'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
          </ul>
        </li>

        <li class="treeview <?php echo (isset($page_title) && ($page_title == 'Membership Card Registration' ||  $page_title == 'Loyalty Card Issue Entry' ||  $page_title == 'Add Membership Card')) ? 'active' : ''; ?>">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Membership & Loyalty</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo isset($page_title) && $page_title == 'Membership Card Registration' ? 'active' : ''; ?>"><a href="<?php echo site_url('membershipcard/cardList'); ?>"><i class="fa fa-circle-o"></i> Membership Card Registration</a></li>
            <li class="<?php echo isset($page_title) && $page_title == 'Loyalty Card Issue Entry' ? 'active' : ''; ?>"><a href="<?php echo site_url('loyaltycard/cardList'); ?>"><i class="fa fa-circle-o"></i> Loyalty Card Issue Entry</a></li>
            <!-- <li class="<?php // echo isset($page_title) && $page_title == 'Loyalty Card Setup' ? 'active' : ''; ?>"><a href="<?php // echo site_url('scheme/list'); ?>"><i class="fa fa-circle-o"></i> Loyalty Card Setup</a></li> -->
          </ul>
        </li>

        <li><a href="<?php echo site_url('searchItem'); ?>"><i class="fa fa-dashboard"></i> <span>Search Item</span></a></li>
        
        <li class="header">REPORTS</li>

        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Stock Report</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Sales Report</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Purchase Report</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
