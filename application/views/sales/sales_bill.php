<?php $this->load->view('include/template/common_header'); ?>
<style type="text/css">

</style>
<link rel="stylesheet"
      href="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">

<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Sales Bill Entry</h3>
            </div>
            <div class="box-body">
                <div class="row form-group">
                    <label class="col-md-1 text-left">Fr Date : </label>
                    <div class="col-md-2">
                        <input id="from_date" type="text" value="<?php echo date('d/m/Y', strtotime('first day of this month', time())); ?>">
                    </div>
                    <label class="col-md-1 text-left"> To Date : </label>
                    <div class="col-md-2">
                        <input id="to_date" type="text" value="<?php echo date('d/m/Y'); ?>">
                    </div>

                    <div class="col-md-5 col-md-offset-1">
                        <div class="row radio">
                            <label> <input type="radio" name="payment" value="pending payment"> Pending Payment </label>
                            <label> <input type="radio" name="payment" value="pending rcvd"> Pending Rcvd </label>
                            <label> <input type="radio" name="payment" value="all"> All </label>
                            <label> <input type="radio" name="payment" value="cancelled bill"> Cancelled Bill </label>
                        </div>
                        <div class="row radio">
                            <label> <input type="radio" name="payment_mode" value="all"> All </label>
                            <label> <input type="radio" name="payment_mode" value="cash"> Cash </label>
                            <label> <input type="radio" name="payment_mode" value="debit"> Debit </label>
                            <label> <input type="radio" name="payment_mode" value="cr/dr card"> Cr/Dr Card </label>
                            <label> <input type="radio" name="payment_mode" value="mobile payment"> Mobile Payment </label>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-plus"></span> Add
                </button>
                <div class="box-body">
                    <div id="sales_bill wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="sales_bill_table" class="table table-bordered table-hover dataTable" role="grid">
                                    <thead>
                                    <tr role="row">
                                        <th>Bill No.</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Name of Party</th>
                                        <th>Repeat</th>
                                        <th>Total Quantity</th>
                                        <th>Bill Amount</th>
                                        <th>Rcvd Amt</th>
                                        <th>Salesman</th>
                                        <th>Discount</th>
                                        <th>Other</th>

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
</div>

<?php $this->load->view('include/template/common_footer'); ?>

<script src="<?php echo base_url('assets/theme/bower_components/datatables.net/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>

<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            // $('#sales_bill_table').DataTable();
            //Date picker
            $('#from_date').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
            $('#to_date').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
        });
    }(jQuery));
    function setTable() {
        table = $('#sales_bill_table').DataTable({
            "processing": true,
            "serverSide": true,
            "destroy": true,
            "aoColumnDefs": [
                {
                    "bSortable": false,
                    "aTargets": [0],
                    "data": "billno"
                },
                {
                    "bSortable": false,
                    "aTargets": [1],
                    "data": "date"
                },
                {
                    "bSortable": false,
                    "aTargets": [2],
                    "data": "type"
                },
                {
                    "bSortable": false,
                    "aTargets": [3],
                    "data": "name"
                },
                {
                    "bSortable": false,
                    "aTargets": [4],
                    "data": 'repeat'
                },
                {
                    "bSortable": false,
                    "aTargets": [5],
                    "data": 'qty'
                },
                {
                    "bSortable": false,
                    "aTargets": [6],
                    "data": 'bamount'
                },
                {
                    "bSortable": false,
                    "aTargets": [7],
                    "data": 'ramount'
                },
                {
                    "bSortable": false,
                    "aTargets": [8],
                    "data": 'salesman'
                },
                {
                    "bSortable": false,
                    "aTargets": [9],
                    "data": 'discount'
                },
                {
                    "bSortable": false,
                    "aTargets": [10],
                    "data": 'other'
                }
            ],
            "ajax": {
                url: "<?= site_url('SalesController/getSalesBills') ?>",
                pages: 2, // number of pages to cache
                method: 'POST',
                data : {
                    to_date : $('#to_date').val(),
                    from_date : $('#from_date').val(),
                    payment : $('#payment').val(),
                    payment_mode : $('#payment_mode').val()
                }
            }
        });
    }
    setTable();
</script>

<?php $this->load->view('include/page_footer.php'); ?>
