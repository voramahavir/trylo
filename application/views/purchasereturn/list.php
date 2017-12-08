<?php $this->load->view('include/template/common_header') ?>
<link rel="stylesheet"
      href="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Purchase Return</h3>
            </div>
            <div class="box-body">
                <div class="row form-group">
                    <label class="col-md-1 text-left">Fr Date : </label>
                    <div class="col-md-2">
                        <input class="form-control" id="from_date" type="text"
                               value="<?php echo date('d/m/Y', strtotime('first day of this month', time())); ?>">
                    </div>
                    <label class="col-md-1 text-left"> To Date : </label>
                    <div class="col-md-2">
                        <input class="form-control" id="to_date" type="text" value="<?php echo date('d/m/Y'); ?>">
                    </div>
                </div>
                <a href="<?php echo site_url('purchasereturn/add'); ?>" class="btn btn-info">
                    <span class="glyphicon glyphicon-plus"></span> Add
                </a>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover dataTable" id="table_purchase_return">
                            <thead>
                            <tr>
                                <th>D/N No</th>
                                <th>Date</th>
                                <th>Name of Party</th>
                                <th>City</th>
                                <th>Order By</th>
                                <th>Amount Rs.</th>
                                <th>Total Qty.</th>
                                <th>Product</th>
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
<?php $this->load->view('include/template/common_footer'); ?>
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script type="text/javascript">
</script>
