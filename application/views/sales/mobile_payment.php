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
                <div class="col-md-4">
                    <h2 class="box-title page-title text-primary"> Mobile Payment Reference Entry</h2>
                </div>
                <div class="col-md-8">
                    <label class="col-md-2 no-padding">From Date : </label>
                    <div class="col-md-2 no-padding">
                        <input id="from_date" type="text"
                               value="<?php echo date('d/m/Y', strtotime('first day of this month', time())); ?>"
                               class="form-control">
                    </div>
                    <label class="col-md-2 no-pad-right"> To Date : </label>
                    <div class="col-md-2 no-pad-left">
                        <input id="to_date" type="text" value="<?php echo date('d/m/Y'); ?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row form-group">
                    <div class="col-md-4">
                        <div class="col-md-12 label-primary radio no-margin">
                            <label> <input type="radio" class="radio-inline" id="payment" name="ref_type" value="1"
                                           checked> Pending Ref.No. </label>
                            <label> <input type="radio" class="radio-inline" id="payment" name="ref_type" value="2">
                                Entered Ref.No.
                            </label>
                            <label> <input type="radio" class="radio-inline" id="payment" name="ref_type" value="all">
                                All
                            </label>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="mobile_ref_table" class="table table-bordered table-hover dataTable"
                                   role="grid">
                                <thead>
                                <tr role="row">
                                    <th class="col-md-1 text-center">Bill No.</th>
                                    <th class="col-md-1 text-center">Date</th>
                                    <th class="col-md-2 text-center">Payment Type</th>
                                    <th class="col-md-1 text-center">Bill Name</th>
                                    <th class="col-md-1 text-center">Mobile No</th>
                                    <th class="col-md-2 text-center">Reference Name</th>
                                    <th class="col-md-2 text-center">Reference</th>
                                    <th class="col-md-1 text-center">Action</th>
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
<div class="modal fade modal-3d-flip-horizontal" id="editRefModal" aria-hidden="true"
     aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4>Update Mobile Reference</h4>
            </div>
            <div class="modal-body">
                <label class="col-md-2">Reference</label>
                <div class="col-md-5">
                    <input type="text" name="TRPMREF" id="TRPMREF" class="form-control">
                </div>
                <input type="hidden" name="id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success editRef">Update</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('include/template/common_footer'); ?>

<script src="<?php echo base_url('assets/theme/bower_components/datatables.net/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script type="text/javascript">
    var ref_mode = '1';
    (function ($) {
        $(document).ready(function () {
            $('#from_date').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
            $('#to_date').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
            $("#from_date").on('change', function () {
                table.ajax.reload();
            });
            $("#to_date").on('change', function () {
                table.ajax.reload();
            });
            $("input[name=ref_type]").on('change', function () {
                ref_mode = this.value;
                table.ajax.reload();
            });
            $(".editRef").on("click", function () {
                $(".editRef").prop("disabled", true);
                var id = -1;
                id = $("#editRefModal").find("[name=id]").val();
                $.post("<?php echo site_url('sales/updateRef/'); ?>" + id, {"TRPMREF": $("#TRPMREF").val()})
                    .done(function (result) {
                        result = JSON.parse(result);
                        if (result.code == 1) {
                            table.ajax.reload();
                        }
                        $("#editRefModal").modal("hide");
                    });
                $(".editRef").prop("disabled", false);
            });

            function setTable() {
                table = $('#mobile_ref_table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "searching": false,
                    "autoWidth": false,
                    "ordering": false,
                    "columns": [
                        {
                            "bSortable": false,
                            "data": "billno",
                            "className": "col-md-1 text-center"
                        },
                        {
                            "bSortable": false,
                            "data": null,
                            "className": "col-md-1 text-center"
                        },
                        {
                            "bSortable": false,
                            "data": "CARDTYPE",
                            "className": "col-md-2 text-center"
                        },
                        {
                            "bSortable": false,
                            "data": "name",
                            "className": "col-md-1 text-center"
                        },
                        {
                            "bSortable": false,
                            "data": "TRPMMOB",
                            "className": "col-md-1 text-center"
                        },
                        {
                            "bSortable": false,
                            "data": 'TRPMNAM',
                            "className": "col-md-2 text-center"
                        },
                        {
                            "bSortable": false,
                            "data": "TRPMREF",
                            "className": "col-md-2 text-center"
                        },
                        {
                            "bSortable": false,
                            "data": null,
                            "className": "col-md-1 action-container"
                        }
                    ],
                    "ajax": {
                        url: "<?= site_url('SalesController/getMobileRef') ?>",
                        pages: 2, // number of pages to cache
                        method: 'POST',
                        data: function (d) {
                            d.to_date = $('#to_date').val();
                            d.from_date = $('#from_date').val();
                            d.ref_mode = ref_mode;
                        }
                    },
                    "rowCallback": function (nRow, aData, iDisplayindex) {
                        var date = new Date(aData.date);
                        $('td:eq(1)', nRow).html(date.toString('d/M/yyyy'));
                        aData.TRPMREF = aData.TRPMREF ? aData.TRPMREF : "";
                        var editStr = "<button class='btn btn-info btn-action' onclick='EditReference(" + aData.id + ",\"" + aData.TRPMREF + "\")'><i class=\"fa fa-edit\" aria-hidden=\"true\"></i></button>";
                        $('td:eq(7)', nRow).html(editStr);
                    }
                });
            }

            setTable();

        });
    }(jQuery));

    function EditReference(id, TRPMREF) {
        $("#TRPMREF").val(TRPMREF);
        $("#editRefModal").modal("show");
        $("#editRefModal").find("[name=id]").attr("value", id);
    }
</script>