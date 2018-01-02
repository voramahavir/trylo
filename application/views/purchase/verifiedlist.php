<?php $this->load->view('include/template/common_header') ?>
<style type="text/css">

</style>
<link rel="stylesheet"
      href="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Verify InTransit Bill</h3>
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

                    <div class="col-md-5 col-md-offset-1">
                        <div class="row radio">
                            <label> <input type="radio" id="type" name="type" value="1" checked="true"> InTransit
                            </label>
                            <label> <input type="radio" id="type" name="type" value="2"> PhysicalVerified </label>
                        </div>
                    </div>
                </div>
                <div class="dataTables_wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover dataTable" id="table_purchase">
                                <thead>
                                <tr>
                                    <th>Bill No</th>
                                    <th>Date</th>
                                    <th>Name of Party</th>
                                    <th>City</th>
                                    <th>Sp.Instru.</th>
                                    <th>Amount Rs.</th>
                                    <th>Total Qty.</th>
                                    <th>Product</th>
                                    <th>VerifyBy</th>
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
<?php $this->load->view('include/template/common_footer'); ?>
<!-- Bootstrap-notify -->
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script type="text/javascript">
    var table = '';
    var type = "1";
    $(document).ready(function () {
        $('#from_date').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });
        $('#to_date').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });
        setTable();
    });
    $("#from_date").on('change', function () {
        table.ajax.reload();
    });
    $("#to_date").on('change', function () {
        table.ajax.reload();
    });
    $("input[name=type]").on('change', function () {
        type = this.value;
        table.ajax.reload();
    });

    function setTable() {
        table = $('#table_purchase').DataTable({
            "processing": true,
            "serverSide": true,
            "paging": true,
            "ajax": {
                "url": "<?php echo site_url('purchase/getData'); ?>",
                "type": "POST",
                data: function (d) {
                    d.to_date = $('#to_date').val();
                    d.from_date = $('#from_date').val();
                    d.type = type;
                }
            },
            "columns": [
                {
                    "data": "TRPRBL",
                    "bSortable": true
                },
                {
                    "data": null,
                    "bSortable": true
                },
                {
                    "data": "NAME",
                    "bSortable": true
                },
                {
                    "data": "CITY",
                    "bSortable": false
                },
                {
                    "data": "TRSPINST",
                    "bSortable": false
                },
                {
                    "data": "TRNET",
                    "bSortable": true
                },
                {
                    "data": "TRTOTQTY",
                    "bSortable": true
                },
                {
                    "data": "product",
                    "bSortable": true
                },
                {
                    "data": "PHVER1",
                    "bSortable": true
                },
                {
                    "data": null,
                    "bSortable": false
                },
            ],
            "rowCallback": function (nRow, aData, iDisplayindex) {
                // if(aData.ISACTIVE==0){
                var TRBLDT = new Date(aData.TRBLDT);
                $('td:eq(1)', nRow).html(TRBLDT.toString('d/M/yyyy'));
                $('td:eq(9)', nRow).html(""
                    + "<button class='btn btn-info' onclick='return verifyBill(\"" + aData.TRBLNO + "\");'>"
                    + "<i class='fa fa-file-text-o'></i>"
                    + "</button>"
                    + "");
                // }else{
                //     $(nRow).addClass('danger');
                //     $('td:eq(8)',nRow).html(""
                //         +"<button class='btn btn-info' disabled onclick='return EditTheRow("+aData.CRDNO+");'>"
                //         +"<i class='fa fa-edit'></i>"
                //         +"</button>"
                //         +"<button class='btn btn-success' onclick='return RecoverTheRow("+aData.CRDNO+");'>"
                //         +"<i class='fa fa-check'></i>"
                //         +"</button>"
                //     +"");
                // }
            },
        });
        $('.dataTables_filter input').attr("placeholder", "Search by Party Name");

    }

    function verifyBill(billNo) {
        window.location.href = site_url + 'purchase/verify/' + billNo;
    }
</script>
<?php $this->load->view('include/page_footer.php'); ?>
