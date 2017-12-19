<?php $this->load->view('include/template/common_header') ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Voucher Entry </h3>
            </div>
            <div class="box-body">
                <form id="addVoucher">
                    <div class="panel panel-info col-md-10 col-md-offset-1">
                        <div class="panel-body">
                            <div class="form-group row">
                                <label class="col-md-2 text-right">Vou No:</label>
                                <div class="col-md-2">
                                    <input type="text" name="VOUNO" id="VOUNO" class="form-control"
                                           value="<?php echo $currentBill; ?>" readonly>
                                </div>
                                <label class="col-md-1 text-right">Date:</label>
                                <div class="col-md-3">
                                    <input type="text" name="VOUDT" id="VOUDT" class="form-control datepicker"
                                           value="<?php echo date('d/m/Y'); ?>">
                                </div>
                                <label class="col-md-1 text-right">Type:</label>
                                <div class="col-md-3">
                                    <select name="VOUTYP" id="VOUTYP" class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="1">Cash Receipt</option>
                                        <option value="2">Cash Payment</option>
                                        <option value="3">Bank Withdraw</option>
                                        <option value="4">Bank Deposit</option>
                                        <option value="5">Journal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-2 text-right">Payment A/C:</label>
                                <div class="col-md-5">
                                    <select name="CRPRCD" id="CRPRCD" class="form-control">
                                        <option value="">Select Account</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-2 text-right">Receipt A/C:</label>
                                <div class="col-md-5">
                                    <select name="DBPRCD" id="DBPRCD" class="form-control">
                                        <option value="">Select Account</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-2 text-right">Amount Rs:</label>
                                <div class="col-md-3">
                                    <input type="number" class="form-control" name="VOUAMT" id="VOUAMT" value="0">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-2 text-right">Chq.No:</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="CHQNO" id="CHQNO">
                                </div>
                                <label class="col-md-1 text-right">Chq.Dt:</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control datepicker" name="CHQDT" id="CHQDT"
                                           value="<?php echo date('d/m/Y'); ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-2 text-right">Narration:</label>
                                <div class="col-md-5">
                                    <textarea class="form-control" name="REMARK" id="REMARK"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-danger col-md-5 col-md-offset-1" id="denomWrap">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3> DENOMINATION RETURNED </h3>
                                    <div class="row">
                                        <label class="col-md-1 text-right dre_amount"> 2000 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="DEM11" class="form-control dre_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" name="DEM11A" class="form-control dre_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dre_amount"> 500 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="DEM2" class="form-control dre_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" name="DEM2A" class="form-control dre_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dre_amount"> 200 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="DEM12" class="form-control dre_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" name="DEM12A" class="form-control dre_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dre_amount"> 100 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="DEM3" class="form-control dre_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" name="DEM3A" class="form-control dre_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dre_amount"> 50 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="DEM4" class="form-control dre_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" name="DEM4A" class="form-control dre_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dre_amount"> 20 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="DEM5" class="form-control dre_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" name="DEM5A" class="form-control dre_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dre_amount"> 10 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="DEM6" class="form-control dre_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" name="DEM6A" class="form-control dre_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dre_amount"> 5 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="DEM7" class="form-control dre_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" name="DEM7A" class="form-control dre_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-5 text-right dr_amount"> MISC. </label>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" name="DEM8A"
                                                   class="form-control dre_misc dre_value"
                                                   value="0">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-6 text-right"> Return to </label>
                                        <div class="col-md-5">
                                            <input type="text" name="DEM9A" id="DEM9A" class="form-control dre_total"
                                                   value="0" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box-footer">
                <a href="<?php echo site_url('voucher/list'); ?>" class="btn btn-default">Cancel</a>
                <button type="button" class="btn btn-primary saveVoucher pull-right">Save</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('include/template/common_footer'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        var parties = [];
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });
        loadParties();
        $(".dre_note").change(function () {
            var p = $(this).parent().parent();
            if ($(this).val() > 0) {
                p.find('.dre_value').val(p.find('.dre_amount').text().trim() * $(this).val());
            } else {
                p.find('.dre_value').val(0);
            }
            dre_total();
        });

        $(".dre_misc").change(function () {
            dre_total();
        });

        $("#VOUTYP").change(function () {
            var type = $(this).val();
            if (type)
                bindAccounts(type)
        });

        $('.saveVoucher').click(function () {
            saveVoucher();
        });

        function dre_total() {
            var t = 0;
            $.each($('.dre_value'), function () {
                t += parseFloat($(this).val());
            });
            $('.dre_total').val(t);
        }

        function loadParties() {
            $.ajax({
                url: site_url + 'purchasereturn/getParties',
                type: 'GET',
                dataType: 'JSON',
                success: function (response) {
                    var html = '<option value="">Select Party</option>';
                    if (response.code) {
                        var data = response.data;
                        parties['all'] = [];
                        $.each(data, function (index, value) {
                            if (value.TRACGRP != 0) {
                                if (parties[value.TRACGRP] === undefined) {
                                    parties[value.TRACGRP] = [];
                                }
                                parties[value.TRACGRP].push(value);
                            }
                            parties['all'].push(value);
                        });
                    }
                }
            })
        }

        function bindAccounts(type) {
            var rec = [];
            var pay = [];
            var deno = "show";
            switch (type) {
                case '1':
                    pay = [1, 4];
                    rec = [2];
                    deno = "show";
                    break;
                case '2':
                    pay = [2];
                    rec = [1, 4];
                    deno = "show";
                    break;
                case '3':
                    pay = [3];
                    rec = [1, 4];
                    deno = "hide";
                    break;
                case '4':
                    pay = [1, 4];
                    rec = [3];
                    deno = "show";
                    break;
                case '5':
                    rec = ['all'];
                    pay = ['all'];
                    deno = "hide";
                    break;
            }

            var recHtml = '<option value="">Select Account</option>';
            var payHtml = '<option value="">Select Account</option>';
            $.each(rec, function (i, v) {
                var recAcc = parties[v];
                $.each(recAcc, function (index, value) {
                    recHtml += '<option value="' + value.TRCODE + '">' + value.TRNAME + '</option>';
                });
            });

            $.each(pay, function (i, v) {
                var payAcc = parties[v];
                $.each(payAcc, function (index, value) {
                    payHtml += '<option value="' + value.TRCODE + '">' + value.TRNAME + '</option>';
                });
            });

            $('#CRPRCD').html(payHtml);
            $('#DBPRCD').html(recHtml);
            $('#denomWrap')[deno]();
        }

        function saveVoucher() {
            var amt = parseFloat($('#VOUAMT').val());
            var denomAmt = parseFloat($('#DEM9A').val());
            var valid = true;
            if ($('#denomWrap').is(":visible")) {
                if (amt != denomAmt) {
                    valid = false;
                    bootbox.alert("Amount and denomination amount is not same");
                }
            }
            if (valid) {
                var formData = $('#addVoucher').serializeObject();
                $.ajax({
                    url: site_url + 'voucher/create',
                    type: 'POST',
                    dataType: 'JSON',
                    data: formData,
                    success: function (response) {
                        if (response.code) {
                            bootbox.alert(response.msg, function () {
                                window.location.href = site_url + 'voucher/list';
                            });
                        }
                        else {
                            bootbox.alert(response.msg);
                        }
                    }
                });
            }
        }
    });
</script>
<?php $this->load->view('include/page_footer.php'); ?>