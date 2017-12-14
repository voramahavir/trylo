<?php $this->load->view('include/template/common_header') ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Customer Experience Entry </h3>
            </div>
            <div class="box-body">
                <form id="addCustFeedback">
                    <div class="form-group row">
                        <label class="col-md-1">No:</label>
                        <div class="col-md-1">
                            <input type="text" name="VOUNO" id="VOUNO" class="form-control"
                                   value="<?php echo $currentBill; ?>" readonly>
                        </div>
                        <label class="col-md-1">Date:</label>
                        <div class="col-md-2">
                            <input type="text" name="VOUDT" id="VOUDT" class="form-control datepicker"
                                   value="<?php echo date('d/m/Y'); ?>">
                        </div>
                        <label class="col-md-2">Name of Customer:</label>
                        <div class="col-md-2">
                            <input type="text" name="NAME" id="NAME" class="form-control"
                                   value="">
                        </div>
                        <label class="col-md-1">City:</label>
                        <div class="col-md-2">
                            <input type="text" name="CITY" id="CITY" class="form-control"
                                   value="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-2">Mobile No:</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="MOBILENO" id="MOBILENO">
                        </div>
                        <label class="col-md-1">e-Mail Id:</label>
                        <div class="col-md-2">
                            <input type="email" class="form-control" name="EMAIL" id="EMAIL">
                        </div>
                        <label class="col-md-1">Bill No:</label>
                        <div class="col-md-1">
                            <input type="text" class="form-control" name="BILLNO" id="BILLNO">
                        </div>
                        <label class="col-md-1">Bill Date:</label>
                        <div class="col-md-2">
                            <input type="text" name="BILLDATE" id="BILLDATE" class="form-control datepicker"
                                   value="<?php echo date('d/m/Y'); ?>">
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <div class="row form-group">
                                <label class="col-md-4">1. How is your shopping Experience ?</label>
                                <div class="col-md-6">
                                    <label class="col-md-3"> <input type="radio" id="QUES1" name="QUES1" value="1">
                                        Excellent
                                    </label>
                                    <label class="col-md-3"> <input type="radio" id="QUES1" name="QUES1" value="2">
                                        Very Good
                                    </label>
                                    <label class="col-md-3"> <input type="radio" id="QUES1" name="QUES1"
                                                                    value="3">
                                        Good
                                    </label>
                                    <label class="col-md-3"> <input type="radio" id="QUES1" name="QUES1"
                                                                    value="4" checked>
                                        Poor
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-4">2. How did you like your store ?</label>
                                <div class="col-md-6">
                                    <label class="col-md-3"> <input type="radio" id="QUES2" name="QUES2" value="1">
                                        Excellent
                                    </label>
                                    <label class="col-md-3"> <input type="radio" id="QUES2" name="QUES2" value="2">
                                        Very Good
                                    </label> <label class="col-md-3"> <input type="radio" id="QUES2" name="QUES2"
                                                                             value="3">
                                        Good
                                    </label> <label class="col-md-3"> <input type="radio" id="QUES2" name="QUES2"
                                                                             value="4" checked>
                                        Poor
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-4">3. How would you rate our staff ?</label>
                                <div class="col-md-6">
                                    <label class="col-md-3"> <input type="radio" id="QUES3" name="QUES3" value="1">
                                        Excellent
                                    </label>
                                    <label class="col-md-3"> <input type="radio" id="QUES3" name="QUES3" value="2">
                                        Very Good
                                    </label> <label class="col-md-3"> <input type="radio" id="QUES3" name="QUES3"
                                                                             value="3">
                                        Good
                                    </label> <label class="col-md-3"> <input type="radio" id="QUES3" name="QUES3"
                                                                             value="4" checked>
                                        Poor
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-4">4. Do you recommand any sales person</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="QUES4" id="QUES4">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-4">5. What would you like to shop more in our store ?</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="QUES5" id="QUES5">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-4">6. Will you recommand our store in your group ?</label>
                                <div class="col-md-6">
                                    <label class="col-md-3"> <input type="radio" id="QUES6" name="QUES6" value="1">
                                        Yes
                                    </label>
                                    <label class="col-md-3"> <input type="radio" id="QUES6" name="QUES6" value="2"
                                                                    checked>
                                        No
                                    </label>
                                </div>
                                <div class="row col-md-offset-1 col-md-8 form-group" id="QUES6A-wrap">
                                    <label class="col-md-4">If no tell why ?</label>
                                    <div class="col-md-4">
                                        <input type="text" name="QUES6A" id="QUES6A" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-4">7. Did you get what you look for ?</label>
                                <div class="col-md-6">
                                    <label class="col-md-3"> <input type="radio" id="QUES7" name="QUES7" value="1">
                                        Yes
                                    </label>
                                    <label class="col-md-3"> <input type="radio" id="QUES7" name="QUES7" value="2"
                                                                    checked>
                                        No
                                    </label>
                                </div>
                                <div class="row col-md-offset-1 col-md-8 form-group" id="QUES7A-wrap">
                                    <label class="col-md-4">If no please tell us ?</label>
                                    <div class="col-md-4">
                                        <input type="text" name="QUES7A" id="QUES7A" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-4">8. Can we contact you in future for more offer / scheme /
                                    discount offer ?</label>
                                <div class="col-md-6">
                                    <label class="col-md-3"> <input type="radio" id="QUES8" name="QUES8" value="1">
                                        Yes
                                    </label>
                                    <label class="col-md-3"> <input type="radio" id="QUES8" name="QUES8" value="2"
                                                                    checked>
                                        No
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-4">9. Suggestion / Complain</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="QUES9" id="QUES9"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box-footer">
                <a href="<?php echo site_url('customerfeedback/list'); ?>" class="btn btn-default">Cancel</a>
                <button type="button" class="btn btn-primary saveCustFeedback pull-right">Save</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('include/template/common_footer'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });

        $('.saveCustFeedback').click(function () {
            saveCustFeedback();
        });

        $('[name=QUES6]').change(function () {
            ($(this).val() == 1) ? $('#QUES6A-wrap').hide() : $('#QUES6A-wrap').show();
        });

        $('[name=QUES7]').change(function () {
            ($(this).val() == 1) ? $('#QUES7A-wrap').hide() : $('#QUES7A-wrap').show();
        });

        function saveCustFeedback() {
            var formData = $("#addCustFeedback").serializeObject();
            $.ajax({
                url: site_url + 'customerfeedback/create',
                dataType: 'JSON',
                type: 'POST',
                data: formData,
                success: function (response) {
                    if (response.code) {
                        bootbox.alert(response.msg, function () {
                            window.location.href = site_url + 'customerfeedback/list';
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