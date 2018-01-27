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
                        <label class="col-md-1 no-pad-right">From Date : </label>
                        <div class="col-md-2">
                            <input class="form-control" id="from_date" type="text"
                                   value="<?php echo date('d/m/Y', strtotime('first day of this month', time())); ?>">
                        </div>
                        <label class="col-md-1 no-pad-right"> To Date : </label>
                        <div class="col-md-2 no-pad-left">
                            <input class="form-control" id="to_date" type="text" value="<?php echo date('d/m/Y'); ?>">
                        </div>
                    </div>
                    <a href="<?php echo site_url('purchasereturn/add'); ?>" class="btn btn-info">
                        <span class="glyphicon glyphicon-plus"></span> Add
                    </a>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-hover dataTable" id="purchase_return">
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
    </div>
<?php $this->load->view('include/template/common_footer'); ?>
    <script src="<?php echo base_url('assets/theme/bower_components/datatables.net/js/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
    <script type="text/javascript">
        var table = '';
        var billData = [];
        $(document).ready(function () {
            setTable();
            $("#from_date").on('change', function () {
                table.ajax.reload();
            });
            $("#to_date").on('change', function () {
                table.ajax.reload();
            });

            function setTable() {
                table = $('#purchase_return').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "paging": true,
                    "ajax": {
                        "url": "<?php echo site_url('purchasereturn/getData'); ?>",
                        "type": "POST",
                        data: function (d) {
                            d.to_date = $('#to_date').val();
                            d.from_date = $('#from_date').val();
                        }
                    },
                    "columns": [
                        {
                            "data": "TRBLNO",
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
                            "bSortable": true
                        },
                        {
                            "data": "TRORBY",
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
                            "visible": false,
                            "bSortable": false
                        },
                    ],
                    "rowCallback": function (nRow, aData, iDisplayindex) {
                        // if(aData.ISACTIVE==0){
                        var TRBLDT = new Date(aData.TRBLDT);
                        $('td:eq(1)', nRow).html(TRBLDT.toString('d/M/yyyy'));
                        billData[iDisplayindex] = aData;
                        $('td:eq(8)', nRow).html(""
                            /*+ "<button class='btn btn-info' onclick='return showTrnModal(\"" + aData.TRBLNO + "\", \"" + aData.NAME + "\");'>"*/
                            /*+ "<button class='btn btn-info' onclick='return showTrnModal(" + iDisplayindex + ");'>"
                            + "<i class='fa fa-exchange'></i>"
                            + "</button>"*/
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
                $('.dataTables_filter input').attr("placeholder", "Search");

            }
        });
    </script>
<?php $this->load->view('include/page_footer.php'); ?>