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
                <h3 class="box-title"> Sales Return Entry</h3>
            </div>
            <div class="box-body">
                <div class="row form-group">
                    <label class="col-md-1 text-left">Fr Date : </label>
                    <div class="col-md-2">
                        <input id="from_date" type="text"
                               value="<?php echo date('Y-m-d', strtotime('first day of this month', time())); ?>">
                    </div>
                    <label class="col-md-1 text-left"> To Date : </label>
                    <div class="col-md-2">
                        <input id="to_date" type="text" value="<?php echo date('Y-m-d'); ?>">
                    </div>

                    <div class="col-md-5 col-md-offset-1">
                        <div class="row radio">
                            <label> <input type="radio" name="cntype" value="1"
                                           checked="true"> Pending CN </label>
                            <label> <input type="radio" name="cntype" value="2"> Adjusted CN
                            </label>
                            <label> <input type="radio" name="cntype" value="3"> Cancel CN </label>
                            <label> <input type="radio" name="cntype" value="all"> All CN </label>
                        </div>
                    </div>
                </div>
              <!--   <button type="button" class="btn btn-default" id="search">
                    <span class="glyphicon glyphicon-search"></span> Search
                </button> -->
                <a href="<?php echo site_url('salesreturn/add'); ?>" class="btn btn-info">
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
                                <table id="sales_return_table" class="table table-bordered table-hover dataTable"
                                       role="grid">
                                    <thead>
                                    <tr role="row">
                                        <th>CN No.</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Name of Party</th>
                                        <th>City</th>
                                        <th>Total Qty</th>
                                        <th>Amount</th>
                                        <th>Salesman</th>
                                        <th>Adj.Ag.Bill</th>

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
    var cn_type = 'all';
    var table = null;
    (function ($) {
        $(document).ready(function () {
            // $('#sales_return_table').DataTable();
            //Date picker
            $('#from_date').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });
            $('#to_date').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });
        });
    }(jQuery));
    $("#from_date").on('change', function () {
        table.ajax.reload();
    });
    $("#to_date").on('change', function () {
        table.ajax.reload();
    });
    // $("#search").click(function () {
    //     table.ajax.reload();
    // });
    $("input[name=cntype]").on('change', function () {
        cn_type = this.value;
        table.ajax.reload();
    });

    function setTable() {
        table = $('#sales_return_table').DataTable({
            "processing": true,
            "serverSide": true,
            "destroy": true,
            "lengthChange" : false,
            "searching" : false,
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
                    "data": "city"
                },
                {
                    "bSortable": false,
                    "data": 'qty'
                },
                {
                    "bSortable": false,
                    "data": 'bamount'
                },                {
                    "bSortable": false,
                    "data": null
                },
                {
                    "bSortable": false,
                    "data": null
                }
            ],
            "ajax": {
                url: "<?= site_url('SalesReturnController/getSalesReturns') ?>",
                pages: 2, // number of pages to cache
                method: 'POST',
                data: function(d){
                    d.to_date = $('#to_date').val();
                    d.from_date = $('#from_date').val();
                    d.cn_type = cn_type;
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
                $('td:eq(7)', nRow).html("");
                if(aData.CANBL == "T"){
                    $('td:eq(8)', nRow).html("Cancelled");
                } else if (aData.TRREF == "Y") {
                    $('td:eq(8)', nRow).html("Refunded");
                } else {
                    $('td:eq(8)', nRow).html("Pending");
                }
                $('td:eq(8)', nRow).html("");
            }
        });
    }

    setTable();
</script>

<?php $this->load->view('include/page_footer.php'); ?>
