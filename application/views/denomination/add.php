<?php $this->load->view('include/template/common_header') ?>
<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Denomination Entry</h3>
            </div>
            <div class="box-body">
                <form id="addDenom">
                    <div class="panel panel-success col-md-10 col-md-offset-1">
                        <div class="panel-header"></div>
                        <div class="panel-body">
                            <div class="row form-group">
                                <label class="col-md-3 text-right"> Vou No.: </label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="VOUNO"
                                           value="<?php echo $currentBill; ?>"
                                           readonly>
                                </div>
                                <label class="col-md-2 text-right"> Date: </label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control datepicker"
                                           value="<?php echo date('d/m/Y'); ?>"
                                           name="VOUDT">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-right"> Type: </label>
                                <div class="col-md-9">
                                    <label class="col-md-4"> <input type="radio" id="TYPE" name="TYPE" value="1"
                                                                    checked>
                                        Opening
                                    </label>
                                    <label class="col-md-8"> <input type="radio" id="TYPE" name="TYPE" value="2">
                                        Exchange Inward/Outward
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-right">Type of Cash A/C:</label>
                                <div class="col-md-8">
                                    <select name="TRTYPAC" id="TRTYPAC" class="form-control">
                                        <option value="">Select Account</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group ex-hide">
                                <div class="col-md-8 col-md-offset-3 text-center">
                                    <button class="btn btn-primary btn-block"> Import Previous Day Balance as Opening
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-danger col-md-10 col-md-offset-1">
                        <div class="panel-body">
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <h3> DENOMINATION INWARD </h3>
                                    <div class="row">
                                        <label class="col-md-1 text-right dre_amount"> 2000 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="A2000" class="form-control dre_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control dre_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dre_amount"> 500 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="A500" class="form-control dre_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control dre_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dre_amount"> 200 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="A200" class="form-control dre_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control dre_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dre_amount"> 100 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="A100" class="form-control dre_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control dre_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dre_amount"> 50 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="A50" class="form-control dre_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control dre_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dre_amount"> 20 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="A20" class="form-control dre_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control dre_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dre_amount"> 10 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="A10" class="form-control dre_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control dre_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dre_amount"> 5 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="A5" class="form-control dre_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control dre_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-5 text-right dr_amount"> MISC. </label>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" name="AMISC"
                                                   class="form-control dre_misc dre_value"
                                                   value="0">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-6 text-right"> Inward Amt: </label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control dre_total"
                                                   value="0" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 ex-show hide">
                                    <h3> DENOMINATION OUTWARD </h3>
                                    <div class="row">
                                        <label class="col-md-1 text-right dr_amount"> 2000 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="B2000" class="form-control dr_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control dr_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dr_amount"> 500 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="B500" class="form-control dr_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control dr_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dr_amount"> 200 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="B200" class="form-control dr_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control dr_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dr_amount"> 100 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="B100" class="form-control dr_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control dr_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dr_amount"> 50 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="B50" class="form-control dr_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control dr_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dr_amount"> 20 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="B20" class="form-control dr_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control dr_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dr_amount"> 10 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="B10" class="form-control dr_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control dr_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-1 text-right dr_amount"> 5 </label>
                                        <span class="col-md-1 text-right">X</span>
                                        <div class="col-md-3">
                                            <input type="text" name="B5" class="form-control dr_note"
                                                   value="0">
                                        </div>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control dr_value" value="0"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-5 text-right dr_amount"> MISC. </label>
                                        <span class="col-md-1">'=</span>
                                        <div class="col-md-5">
                                            <input type="text" name="BMISC"
                                                   class="form-control dr_misc dr_value"
                                                   value="0">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-6 text-right"> Outward Amt: </label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control dr_total"
                                                   value="0" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-1 text-right"> Notes: </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="TRNOTE"
                                           value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box-footer">
                <a href="<?php echo site_url('denomination'); ?>" class="btn btn-default">Cancel</a>
                <button type="button" class="btn btn-primary saveDenomination pull-right">Save</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('include/template/common_footer'); ?>
<!-- Bootstrap-notify -->
<script type="text/javascript">
    $(document).ready(function () {
        loadParties();

        $('.datepicker').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });

        $(".dr_note").change(function () {
            var p = $(this).parent().parent();
            if ($(this).val() > 0) {
                p.find('.dr_value').val(p.find('.dr_amount').text().trim() * $(this).val());
            } else {
                p.find('.dr_value').val(0);
            }
            dr_total();
        });

        $(".dre_note").change(function () {
            var p = $(this).parent().parent();
            if ($(this).val() > 0) {
                p.find('.dre_value').val(p.find('.dre_amount').text().trim() * $(this).val());
            } else {
                p.find('.dre_value').val(0);
            }
            dre_total();
        });

        $(".dr_misc").change(function () {
            dr_total();
        });

        $(".dre_misc").change(function () {
            dre_total();
        });

        $('[name=TYPE]').change(function () {
            if ($(this).val() == 2) {
                $('.ex-show').removeClass('hide');
                $('.ex-show').show();
                $('.ex-hide').hide();
            } else {

                $('.ex-show').hide();
                $('.ex-hide').show();
            }
        });

        $('.saveDenomination').click(function () {
            saveDenomination();
        });

        function loadParties() {
            $.ajax({
                url: site_url + 'denomination/accs',
                type: 'GET',
                dataType: 'JSON',
                success: function (response) {
                    var html = '<option value="">Select Account</option>';
                    if (response.code) {
                        var data = response.data;
                        $.each(data, function (index, value) {
                            html += '<option value="' + value.TRCODE + '">' + value.TRNAME + '</option>';
                        });
                    }
                    $("#TRTYPAC").html(html);
                }
            })
        }

        function dr_total() {
            var t = 0;
            $.each($('.dr_value'), function () {
                t += parseFloat($(this).val());
            });
            $('.dr_total').val(t);
        }

        function dre_total() {
            var t = 0;
            $.each($('.dre_value'), function () {
                t += parseFloat($(this).val());
            });
            $('.dre_total').val(t);
        }

        function saveDenomination() {
            var formData = $("#addDenom").serializeObject();
            $.ajax({
                url: site_url + 'denomination/create',
                dataType: 'JSON',
                type: 'POST',
                data: formData,
                success: function (response) {
                    if (response.code) {
                        bootbox.alert(response.msg, function () {
                            window.location.href = site_url + 'denomination';
                        });
                    }
                    else {
                        bootbox.alert(response.msg);
                    }
                }
            })
        }
    });
</script>
<?php $this->load->view('include/page_footer.php'); ?>