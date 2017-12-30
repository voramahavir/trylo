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
                        <input id="from_date" type="text"
                               value="<?php echo date('d/m/Y', strtotime('first day of this month', time())); ?>"
                               class="form-control">
                    </div>
                    <label class="col-md-1 text-left"> To Date : </label>
                    <div class="col-md-2">
                        <input id="to_date" type="text" value="<?php echo date('d/m/Y'); ?>" class="form-control">
                    </div>

                    <div class="col-md-5 col-md-offset-1">
                        <div class="row radio">
                            <label> <input type="radio" id="payment" name="payment" value="1"
                                           checked="true"> Pending Payment </label>
                            <label> <input type="radio" id="payment" name="payment" value="2"> Payment Rcvd
                            </label>
                            <label> <input type="radio" id="payment" name="payment" value="all"> All (Except Cancelled)
                            </label>
                            <label> <input type="radio" id="payment" name="payment" value="3"> Cancelled
                                Bill </label>
                        </div>
                        <div class="row radio">
                            <label> <input type="radio" id="payment_mode" name="payment_mode" value="all"
                                           checked="true"> All </label>
                            <label> <input type="radio" id="payment_mode" name="payment_mode" value="1"> Cash </label>
                            <label> <input type="radio" id="payment_mode" name="payment_mode" value="2"> Debit </label>
                            <label> <input type="radio" id="payment_mode" name="payment_mode" value="3"> Cr/Dr Card
                            </label>
                            <label> <input type="radio" id="payment_mode" name="payment_mode" value="4"> Mobile Payment
                            </label>
                        </div>
                    </div>
                </div>
                <!-- <button type="button" class="btn btn-default" id="search" visible='false'>
                    <span class="glyphicon glyphicon-search"></span> Search
                </button> -->
                <a href="<?php echo site_url('salesAdd'); ?>" class="btn btn-info">
                    <span class="glyphicon glyphicon-plus"></span> Add
                </a>
                <div class="box-body">
                    <div id="sales_bill wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="sales_bill_table" class="table table-bordered table-hover dataTable"
                                       role="grid">
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
                                        <th class="hide">Salesman</th>
                                        <th>Discount</th>
                                        <th>Other</th>
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
    </div>
</div>

<?php $this->load->view('include/template/common_footer'); ?>

<script src="<?php echo base_url('assets/theme/bower_components/datatables.net/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>

<script type="text/javascript">
    var payment_mode = 'all';
    var payment = 1;
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

    // $("#search").click(function () {
    //     table.ajax.reload();
    // });
    $("#from_date").on('change', function () {
        table.ajax.reload();
    });
    $("#to_date").on('change', function () {
        table.ajax.reload();
    });
    $("input[name=payment_mode]").on('change', function () {
        payment_mode = this.value;
        table.ajax.reload();
    });
    $("input[name=payment]").on('change', function () {
        payment = this.value;
        table.ajax.reload();
    });

    function setTable() {
        table = $('#sales_bill_table').DataTable({
            "processing": true,
            "serverSide": true,
            "destroy": true,
            "lengthChange": false,
            "searching": false,
            "columns": [
                {
                    "bSortable": false,
                    "data": "billno"
                },
                {
                    "bSortable": false,
                    "data": "date"
                },
                {
                    "bSortable": false,
                    "data": "type"
                },
                {
                    "bSortable": false,
                    "data": "name"
                },
                {
                    "bSortable": false,
                    "data": null
                },
                {
                    "bSortable": false,
                    "data": 'qty'
                },
                {
                    "bSortable": false,
                    "data": 'bamount'
                },
                {
                    "bSortable": false,
                    "data": 'ramount'
                },
                {
                    "bSortable": false,
                    "visible": false,
                    "data": null
                },
                {
                    "bSortable": false,
                    "data": null
                },
                {
                    "bSortable": false,
                    "data": null
                },
                {
                    "bSortable": false,
                    "data": null
                }
            ],
            "ajax": {
                url: "<?= site_url('SalesController/getSalesBills') ?>",
                pages: 2, // number of pages to cache
                method: 'POST',
                data: function (d) {
                    d.to_date = $('#to_date').val();
                    d.from_date = $('#from_date').val();
                    d.payment = payment;
                    d.payment_mode = payment_mode;
                }
            },
            "rowCallback": function (nRow, aData, iDisplayindex) {
                if (aData.type == 1) {
                    $('td:eq(2)', nRow).html("Cash Memo");
                } else if (aData.type == 2) {
                    $('td:eq(2)', nRow).html("Debit");
                } else if (aData.type == 3) {
                    $('td:eq(2)', nRow).html("Master/Visa");
                } else if (aData.type == 4) {
                    $('td:eq(2)', nRow).html("PAYTM");
                }
                $('td:eq(4)', nRow).html("");
                $('td:eq(8)', nRow).html("");
                $('td:eq(9)', nRow).html("");
                /*$('td:eq(10)', nRow).html("");*/
                var printStr = "<a href='" + site_url + "salesPrint/" + aData.billno + "' target='_blank' class='btn btn-success'><i class=\"fa fa-print\" aria-hidden=\"true\"></i></a>";
                $('td:eq(10)', nRow).html(printStr);
            }
        });
    }

    setTable();
</script>

<?php $this->load->view('include/page_footer.php'); ?>
