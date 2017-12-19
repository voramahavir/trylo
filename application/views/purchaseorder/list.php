<?php $this->load->view('include/template/common_header') ?>
<link rel="stylesheet"
      href="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Purchase Order Entry</h3>
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
                <a href="<?php echo site_url('purchaseorder/add'); ?>" class="btn btn-info">
                    <span class="glyphicon glyphicon-plus"></span> Add
                </a>
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
<!-- Bootstrap-notify -->
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script type="text/javascript">
    var table = '';
    var type = "1";
    var billData = [];
    $(document).ready(function () {
        $('#from_date').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });
        $('#to_date').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });
        $('#bldt').datepicker({
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

    $(document).on('click', '.saveBill', function () {
        transferToBill();
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
                    "data": "TRBLDT",
                    "bSortable": true
                },
                {
                    "data": "NAME",
                    "bSortable": true
                },
                {
                    "data": "CITY",
                    "bSortable": true
                },
                {
                    "data": "TRSPINST",
                    "bSortable": true
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
                    "data": null,
                    "bSortable": false
                },
            ],
            "rowCallback": function (nRow, aData, iDisplayindex) {
                // if(aData.ISACTIVE==0){
                billData[iDisplayindex] = aData;
                $('td:eq(8)', nRow).html(""
                    /*+ "<button class='btn btn-info' onclick='return showTrnModal(\"" + aData.TRBLNO + "\", \"" + aData.NAME + "\");'>"*/
                    + "<button class='btn btn-info' onclick='return showTrnModal(" + iDisplayindex + ");'>"
                    + "<i class='fa fa-exchange'></i>"
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

    function showTrnModal(index) {
        var billno = billData[index].TRBLNO;
        var party = billData[index].NAME;
        var bldt = billData[index].TRBLDT;
        $("#prtynm").val(party);
        $("#billno").val(billno);
        $('.intrnno').append(billno);
        $('#bldt').datepicker('setDate', new Date(bldt)).datepicker('setStartDate', new Date(bldt));
        $("#save-modal").modal();
    }

    function transferToBill() {
        var billNo = $("#billno").val();
        $.ajax({
            url: site_url + 'purchase/transferBill',
            dataType: 'json',
            type: 'POST',
            data: {
                'billNo': billNo,
                'TRBLDT': $("#bldt").val()
            },
            success: function (response) {
                if (response.code) {
                    bootbox.alert(response.msg, function () {
                        table.ajax.reload();
                    });
                } else {
                    bootbox.alert(response.msg);
                }
                $("#save-modal").modal('hide');
            }

        });
    }
</script>
<?php $this->load->view('include/page_footer.php'); ?>
