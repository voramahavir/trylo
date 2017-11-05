<?php $this->load->view('include/template/common_header'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Loyalty Card Issue Entry</h3>
                <!-- <button type="button" id="searchItem" class="btn btn-info pull-right"><i class="fa fa-search"></i>
                     Search Item
                 </button>-->
            </div>
            <div class="box-body">
                <form id="lyltCard">
                    <div class="col-md-11">
                        <div class="panel panel-info">
                            <div class="panel-header">

                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <label class="col-md-2 text-right"> Mobile No.: </label>
                                    <div class="col-md-3">
                                        <input type="number" class="form-control" value="" name="MOBILEID">
                                    </div>
                                    <label class="col-md-2 text-right"> Name: </label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" value="" name="LONAME">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right"> Birth Date </label>
                                    <div class="col-md-3">
                                        <input type="text" name="LODOB" class="form-control datepicker dob">
                                    </div>
                                    <label class="col-md-2 text-right"> Marriage Ann.Date </label>
                                    <div class="col-md-3">
                                        <input type="text" name="LOMAR" class="form-control datepicker dob">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right"> Scheme Type </label>
                                    <div class="col-md-6">
                                        <select name="LOTYPE" id="LOTYPE" class="form-control">
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right"> Validity Period: </label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control valPrd" value="" name="LOVAL" readonly>
                                    </div>
                                    <label class="col-md-2 text-right"> Validity From Date: </label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control frmDt" value="" name="LOSTDT" readonly>
                                    </div>
                                    <label class="col-md-2 text-right"> To Date: </label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control toDt" value="" name="LOENDT" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right"> Card Value Rs.: </label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control crdVal" value="" name="LOCARDAMT"
                                               readonly>
                                    </div>
                                    <label class="col-md-2 text-right"> Discount(%): </label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control disPer" value="" name="LODISCPR"
                                               readonly>
                                    </div>
                                </div>
                                <div class="row col-md-offset-1">
                                    <div class="col-md-6">
                                        <h3> DENOMINATION RECEIVED </h3>
                                        <div class="row">
                                            <label class="col-md-1 text-right dr_amount"> 2000 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="LOR2000" class="form-control dr_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dr_value" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dr_amount"> 500 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="LOR500" class="form-control dr_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dr_value" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dr_amount"> 200 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="LOR200" class="form-control dr_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dr_value" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dr_amount"> 100 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="LOR100" class="form-control dr_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dr_value" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dr_amount"> 50 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="LOR50" class="form-control dr_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dr_value" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dr_amount"> 20 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="LOR20" class="form-control dr_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dr_value" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dr_amount"> 10 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="LOR10" class="form-control dr_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dr_value" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dr_amount"> 5 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="LOR5" class="form-control dr_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dr_value" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-5 text-right"> MISC. </label>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" name="LOROTH"
                                                       class="form-control dr_misc dr_value"
                                                       value="0">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-6 text-right"> Rcvd AMt. </label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dr_total"
                                                       value="0"
                                                       readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3> DENOMINATION RETURNED </h3>
                                        <div class="row">
                                            <label class="col-md-1 text-right dre_amount"> 2000 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="LOP2000" class="form-control dre_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dre_value" value="0"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dre_amount"> 500 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="LOP500" class="form-control dre_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dre_value" value="0"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dre_amount"> 200 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="LOP200" class="form-control dre_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dre_value" value="0"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dre_amount"> 100 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="LOP100" class="form-control dre_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dre_value" value="0"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dre_amount"> 50 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="LOP50" class="form-control dre_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dre_value" value="0"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dre_amount"> 20 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="LOP20" class="form-control dre_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dre_value" value="0"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dre_amount"> 10 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="LOP10" class="form-control dre_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dre_value" value="0"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dre_amount"> 5 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="LOP5" class="form-control dre_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dre_value" value="0"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-5 text-right dr_amount"> MISC. </label>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" name="LOPOTH"
                                                       class="form-control dre_misc dre_value"
                                                       value="0">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-6 text-right"> Return to </label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dre_total"
                                                       value="0" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box-footer">
                <input type="button" value="Save" class="btn btn-success save">
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('include/template/common_footer'); ?>

<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            var schemes = [];
            getSchemes();
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

            $("#LOTYPE").change(function () {
                var schId = $(this).val();
                var scheme = schemes[schId];
                setSchemeValues(scheme);
            });

            $(document).on('click', '.save', function () {
                saveCard();
            });

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

            function getSchemes() {
                var html = '<option value="">Select Scheme Type</option>';
                $.ajax({
                    url: site_url + 'loyaltycard/schemeListCard',
                    type: 'POST',
                    dataType: 'JSON',
                    success: function (response) {
                        if (response.code) {
                            var data = response.data;

                            var length = data.length;
                            for (var i = 0; i < length; i++) {
                                schemes[data[i].LOYSCHNO] = data[i];
                                html += '<option value="' + data[i].LOYSCHNO + '">' + data[i].LOYSCHNM + '</option>';
                            }
                        }
                        $("#LOTYPE").html(html);
                    }
                });
            }

            function setSchemeValues(scheme) {
                if (scheme) {
                    $(".valPrd").val(scheme.LOYSCHVAL);
                    $(".frmDt").val(new Date().toString("dd/MM/yyyy"));
                    $(".toDt").val(parseInt(scheme.LOYSCHVAL).days().fromNow().toString("dd/MM/yyyy"));
                    $(".crdVal").val(scheme.LOYSCHVL);
                    $(".disPer").val(scheme.LOYSCHPR);
                }
                else {
                    $(".valPrd").val("");
                    $(".frmDt").val("");
                    $(".toDt").val("");
                    $(".crdVal").val("");
                    $(".disPer").val("");
                }
            }

            function saveCard() {
                var data = $("#lyltCard").serializeObject();
                $.ajax({
                    url: site_url + 'loyaltycard/create',
                    type: 'POST',
                    dataType: 'JSON',
                    data: data,
                    success: function (response) {
                        if (response.code) {
                            bootbox.alert(response.msg);
                        }
                        else {
                            bootbox.alert(response.msg);
                        }
                    }
                });
            }

        });

    }(jQuery));
</script>