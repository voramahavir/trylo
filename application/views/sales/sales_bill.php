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
                        <input id="from_date" type="text" value="01/10/2017">
                    </div>
                    <label class="col-md-1 text-left"> To Date : </label>
                    <div class="col-md-2">
                        <input id="to_date" type="text" value="18/10/2017">
                    </div>

                    <div class="col-md-6">
                        <input type="radio" name="payment" value="pending payment"> Pending Payment
                        <input type="radio" name="payment" value="pending rcvd"> Pending Rcvd
                        <input type="radio" name="payment" value="all"> All
                        <input type="radio" name="payment" value="cancelled bill"> Cancelled Bill <br>
                        <input type="radio" name="payment_mode" value="all"> All
                        <input type="radio" name="payment_mode" value="cash"> Cash
                        <input type="radio" name="payment_mode" value="debit"> Debit
                        <input type="radio" name="payment_mode" value="cr/dr card"> Cr/Dr Card
                        <input type="radio" name="payment_mode" value="mobile payment"> Mobile Payment

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
            $('#sales_bill_table').DataTable();
            //Date picker
            $('#from_date').datepicker({
                autoclose: true
            });
            $('#to_date').datepicker({
                autoclose: true
            });
        });
    }(jQuery));
</script>

<?php $this->load->view('include/page_footer.php'); ?>
