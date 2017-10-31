<?php $this->load->view('include/template/common_header'); ?>
<!-- Main row -->
<div class="row">
    <form id="addCard">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"> MEMBERSHIP CARD ENTRY</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"> CARD HOLDER</h3>
                            </div>
                            <div class="box-body">
                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="col-md-4">Prefix:</label>
                                        <div class="col-md-8">
                                            <input type="text" name="PREFIX" value="GCHGDM" class="form-control"
                                                   readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <label class="col-md-3">Card No.:</label>
                                        <div class="col-md-9">
                                            <input type="number" name="CARDNO" value="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"> DETAILS OF CARD HOLDER</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <label class="col-md-2">Name:</label>
                                    <div class="col-md-10">
                                        <input type="text" name="NAME" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2">Address:</label>
                                    <div class="col-md-10">
                                        <input type="text" name="ADR1" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-2">
                                        <input type="text" name="ADR2" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-2">
                                        <input type="text" name="ADR3" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2">City:</label>
                                    <div class="col-md-10">
                                        <input type="text" name="CITY" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2">Mobile No:</label>
                                    <div class="col-md-10">
                                        <input type="number" name="MOBILENO" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2">Landline No:</label>
                                    <div class="col-md-10">
                                        <input type="number" name="PHONENO" value="" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"> OTHER DETAILS</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <label class="col-md-2">E-mail:</label>
                                    <div class="col-md-10">
                                        <input type="email" name="EMAIL" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2">D.O.B.:</label>
                                    <div class="col-md-3">
                                        <input type="text" name="DATEOFB" value="" class="form-control datepicker">
                                    </div>
                                    <label class="col-md-3">Mrg. Ann.Date:</label>
                                    <div class="col-md-4">
                                        <input type="text" name="MDATE" value="" class="form-control datepicker">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2">Gender:</label>
                                    <div class="col-md-3">
                                        <select name="GENDER" class="form-control">
                                            <option value="M">Man</option>
                                            <option value="W">Woman</option>
                                            <option value="B">Boys</option>
                                            <option value="G">Girls</option>
                                        </select>
                                    </div>
                                    <label class="col-md-3">Bill No.:</label>
                                    <div class="col-md-4">
                                        <input type="number" name="BILLNO" value="" class="form-control billno">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3">Scheme On Call?</label>
                                    <div class="col-md-2">
                                        <select name="PSCHCALL" class="form-control">
                                            <option value="N">NO</option>
                                            <option value="Y">YES</option>
                                        </select>
                                    </div>
                                    <label class="col-md-3">Date:</label>
                                    <div class="col-md-4">
                                        <input type="text" name="BILLDT" value="" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3">Scheme On SMS?</label>
                                    <div class="col-md-2">
                                        <select name="PSCHSMS" class="form-control">
                                            <option value="N">NO</option>
                                            <option value="Y">YES</option>
                                        </select>
                                    </div>
                                    <label class="col-md-3">Amount Rs.:</label>
                                    <div class="col-md-4">
                                        <input type="text" name="BILLAMT" value="" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3">Scheme On Mail?</label>
                                    <div class="col-md-2">
                                        <select name="PSCHMAIL" class="form-control">
                                            <option value="N">NO</option>
                                            <option value="Y">YES</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"> REFERENCE CARD HOLDER</h3>
                            </div>
                            <div class="box-body">
                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="col-md-4">Prefix:</label>
                                        <div class="col-md-8">
                                            <input type="text" name="PREFIX1" value="GCHGDM" class="form-control"
                                                   readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <label class="col-md-3">Card No.:</label>
                                        <div class="col-md-9">
                                            <input type="number" name="CARDNO1" value="" class="form-control ref_card">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"> DETAILS OF CARD HOLDER</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <label class="col-md-2">Name:</label>
                                    <div class="col-md-10">
                                        <input type="text" value="" class="form-control ref_name" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2">Address:</label>
                                    <div class="col-md-10">
                                        <input type="text" value="" class="form-control ref_ad1" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-2">
                                        <input type="text" value="" class="form-control ref_ad2" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-2">
                                        <input type="text" value="" class="form-control ref_ad3" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2">City:</label>
                                    <div class="col-md-10">
                                        <input type="text" value="" class="form-control ref_city" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2">Mobile No:</label>
                                    <div class="col-md-10">
                                        <input type="text" value="" class="form-control ref_mob" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2">Landline No:</label>
                                    <div class="col-md-10">
                                        <input type="text" value="" class="form-control ref_phn" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"> OTHER DETAILS</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <label class="col-md-2">E-mail:</label>
                                    <div class="col-md-10">
                                        <input type="email" value="" class="form-control ref_email" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2">D.O.B.:</label>
                                    <div class="col-md-3">
                                        <input type="text" value="" class="form-control ref_dob" readonly>
                                    </div>
                                    <label class="col-md-3">Mrg. Ann.Date:</label>
                                    <div class="col-md-4">
                                        <input type="text" value="" class="form-control ref_mdate" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2">Gender:</label>
                                    <div class="col-md-3">
                                        <select class="form-control ref_gen" disabled>
                                            <option value="M">Man</option>
                                            <option value="W">Woman</option>
                                            <option value="B">Boys</option>
                                            <option value="G">Girls</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3">Scheme On Call?</label>
                                    <div class="col-md-2">
                                        <select class="form-control ref_sch_call" disabled>
                                            <option value="N">NO</option>
                                            <option value="Y">YES</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3">Scheme On SMS?</label>
                                    <div class="col-md-2">
                                        <select class="form-control ref_sch_sms" disabled>
                                            <option value="N">NO</option>
                                            <option value="Y">YES</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3">Scheme On Mail?</label>
                                    <div class="col-md-2">
                                        <select class="form-control ref_sch_mail" disabled>
                                            <option value="N">NO</option>
                                            <option value="Y">YES</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="button" class="btn btn-success pull-left save"><i class="fa fa-save"></i> Save
                    </button>
                    <div class="col-md-6 col-md-offset-3">
                        <label class="col-md-2"> Entry Date </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="CREADT"
                                   value="<?php echo date('d/m/Y H:i:s'); ?>"
                                   readonly>
                        </div>
                    </div>
                    <a class="btn btn-default pull-right" href="<?php echo site_url('membershipcard/list') ?>"><i
                                class="fa fa-times"></i> Cancel</a>
                </div>
                <div class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>

        </div>
    </form>
</div>
<?php $this->load->view('include/template/common_footer'); ?>
<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            $('.datepicker').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
            loadingStop();

            $('.save').click(function () {
                saveCard();
            });

            $(".ref_card").focusout(function () {
                getDetailsByCard();
            });

            $("input").keyup(function () {
                var val = $(this).val();
                $(this).val(val.toUpperCase());
            });

            function loadingStart() {
                $('.overlay').show();
            }

            function loadingStop() {
                $('.overlay').hide();
            }

            function saveCard() {
                loadingStart();
                var data = $('#addCard').serializeObject();
                $.ajax({
                    url: site_url + 'membershipcard/create',
                    type: 'POST',
                    dataType: 'JSON',
                    data: data,
                    success: function (response) {
                        loadingStop();
                        bootbox.alert(response.msg);
                        $("#addCard")[0].reset();
                    }
                });

            }

            function getDetailsByCard() {

                var cardNo = $('.ref_card').val().trim();
                if (cardNo) {
                    loadingStart();
                    var data = {
                        cardNo: cardNo
                    };
                    $.ajax({
                        url: site_url + 'membershipcard/details',
                        type: 'POST',
                        dataType: 'JSON',
                        data: data,
                        success: function (response) {
                            if (response.code) {
                                data = response.data;
                                $('.ref_name').val(data.NAME);
                                $('.ref_ad1').val(data.ADR1);
                                $('.ref_ad2').val(data.ADR2);
                                $('.ref_ad3').val(data.ADR3);
                                $('.ref_city').val(data.CITY);
                                $('.ref_mob').val(data.MOBILENO);
                                $('.ref_phn').val(data.PHONENO);
                                $('.ref_email').val(data.EMAIL);
                                $('.ref_dob').val(data.DATEOFB);
                                $('.ref_mdate').val(data.MDATE);
                                $('.ref_gen').val(data.GENDER);
                                $('.ref_sch_call').val(data.PSCHCALL);
                                $('.ref_sch_sms').val(data.PSCHMAIL);
                                $('.ref_sch_mail').val(data.PSCHSMS);
                            }
                            else {
                                bootbox.alert(response.msg, function () {
                                    $('.ref_card').val('');
                                });
                            }
                            loadingStop();
                        }
                    });
                }
            }
        });
    }(jQuery));
</script>
