<?php $this->load->view('include/template/common_header') ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Purchase Return </h3>
            </div>
            <div class="box-body">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <div class="form-group row">
                            <label class="col-md-2 text-right">Name of Party:</label>
                            <div class="col-md-4">
                                <select name="TRPRCD" id="TRPRCD" class="form-control">
                                    <option value="">Select Party</option>
                                </select>
                            </div>
                            <label class="col-md-1">Bill No:</label>
                            <div class="col-md-2">
                                <input type="text" name="TRBLNO" id="TRBLNO" class="form-control"
                                       value="<?php echo $currentBill; ?>" readonly>
                            </div>
                            <label class="col-md-1">Date:</label>
                            <div class="col-md-2">
                                <input type="text" name="TRBLDT" id="TRBLDT" class="form-control datepicker"
                                       value="<?php echo date('d/m/Y'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-offset-2 col-md-4">
                                <textarea name="" id="prtyAdd" resizable="false" class="form-control"
                                          readonly></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-md-1 text-right">Transport:</label>
                            <div class="col-md-3">
                                <input type="text" name="TRDOCTH" id="TRDOCTH" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-1 text-right">LR No:</label>
                            <div class="col-md-2">
                                <input type="text" name="TRGRPPNO" id="TRGRPPNO" class="form-control">
                            </div>
                            <label class="col-md-1">LR Date:</label>
                            <div class="col-md-2">
                                <input type="text" name="TRGRPPDT" id="TRGRPPDT" class="form-control datepicker"
                                       value="<?php echo date('d/m/Y'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button class="btn btn-success pull-right" id="btnBarcode"><i
                                            class="fa fa-barcode"></i> Barcode
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="col-md-2">Name of Item</th>
                                <th class="col-md-1">Color</th>
                                <th class="col-md-1">Size</th>
                                <th class="col-md-2">Qnty</th>
                                <th class="col-md-1">Rate Rs.</th>
                                <th class="col-md-2">Amount Rs.</th>
                                <th class="col-md-3">Desc.</th>
                            </tr>
                            </thead>
                            <tbody class="itemList"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="barcode-modal">
    <div class="modal-dialog my-modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('include/template/common_footer'); ?>
<script type="text/javascript">
    var table = '';
    var type = "1";
    var partyData = [];
    $(document).ready(function () {
        loadParties();
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });

        $("#btnBarcode").click(function () {
            $("#barcode-modal").modal();
        });

        $("#TRPRCD").change(function () {
            var party = $(this).val();
            var address = partyData[party];
            $('#prtyAdd').val(address);
        });

        function loadParties() {
            $.ajax({
                url: site_url + 'purchasereturn/getParties',
                type: 'GET',
                dataType: 'JSON',
                success: function (response) {
                    var html = '<option value="">Select Party</option>';
                    if (response.code) {
                        var data = response.data;
                        $.each(data, function (index, value) {
                            partyData[value.TRCODE] = value.address;
                            html += '<option value="' + value.TRCODE + '">' + value.TRNAME + '</option>';
                        });
                    }
                    $("#TRPRCD").html(html);
                }
            })
        }
    });
</script>
