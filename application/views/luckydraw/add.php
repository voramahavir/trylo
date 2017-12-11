<?php $this->load->view('include/template/common_header') ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Daily Lucky Draw </h3>
            </div>
            <div class="box-body">
                <form id="addDraw">
                    <div class="panel panel-info col-md-10 col-md-offset-1">
                        <div class="panel-body">
                            <div class="form-group row">
                                <label class="col-md-3 text-right">No:</label>
                                <div class="col-md-2">
                                    <input type="text" name="VOUNO" id="VOUNO" class="form-control"
                                           value="<?php echo $currentBill; ?>" readonly>
                                </div>
                                <label class="col-md-1 text-right">Date:</label>
                                <div class="col-md-3">
                                    <input type="text" name="VOUDT" id="VOUDT" class="form-control datepicker"
                                           value="<?php echo date('d/m/Y'); ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-right">Name of Customer:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="CUSNAME" id="CUSNAME" value="">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-right">Mobile No:</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="MOBILENO" id="MOBILENO">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-right">Shopping Done ?</label>
                                <div class="col-md-3">
                                    <label class="col-md-6"> <input type="radio" id="ISSHOP" name="ISSHOP" value="1">
                                        Yes
                                    </label>
                                    <label class="col-md-6"> <input type="radio" id="ISSHOP" name="ISSHOP" value="2"> No
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-right">How did you like your store ?</label>
                                <div class="col-md-5">
                                    <label class="col-md-4"> <input type="checkbox" id="PRICING" name="PRICING"
                                                                    value="T"> Pricing
                                    </label>
                                    <label class="col-md-4"> <input type="checkbox" id="QUALITY" name="QUALITY"
                                                                    value="T"> Quality
                                    </label>
                                    <label class="col-md-4"> <input type="checkbox" id="SERVICE" name="SERVICE"
                                                                    value="T"> Service
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-right">If NO Reason ? Other:</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="OTHER" id="OTHER">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box-footer">
                <a href="<?php echo site_url('luckydraw/list'); ?>" class="btn btn-default">Cancel</a>
                <button type="button" class="btn btn-primary saveLuckydraw pull-right">Save</button>
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

        $('.saveLuckydraw').click(function () {
            saveDraw();
        });

        function saveDraw() {
            var formData = $("#addDraw").serializeObject();
            $.ajax({
                url: site_url + 'luckydraw/create',
                dataType: 'JSON',
                type: 'POST',
                data: formData,
                success: function (response) {
                    if (response.code) {
                        bootbox.alert(response.msg, function () {
                            window.location.href = site_url + 'luckydraw/list';
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