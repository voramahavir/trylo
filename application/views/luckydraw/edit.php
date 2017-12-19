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
                                           value="<?php echo $luckyDrawData['VOUNO']; ?>" readonly>
                                </div>
                                <label class="col-md-1 text-right">Date:</label>
                                <div class="col-md-3">
                                    <input type="text" name="VOUDT" id="VOUDT" class="form-control datepicker"
                                           value="<?php echo date("d/m/Y", strtotime($luckyDrawData['VOUDT'])); ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-right">Name of Customer:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="CUSNAME" id="CUSNAME"
                                           value="<?php echo $luckyDrawData['CUSNAME']; ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-right">Mobile No:</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="MOBILENO" id="MOBILENO"
                                           value="<?php echo $luckyDrawData['MOBILENO']; ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-right">Shopping Done ?</label>
                                <div class="col-md-3">
                                    <label class="col-md-6">
                                        <input type="radio" id="ISSHOP" name="ISSHOP"
                                               value="1" <?php echo $luckyDrawData['ISSHOP'] == 1 ? 'checked' : ''; ?>>
                                        Yes
                                    </label>
                                    <label class="col-md-6">
                                        <input type="radio" id="ISSHOP" name="ISSHOP"
                                               value="2" <?php echo $luckyDrawData['ISSHOP'] == 2 ? 'checked' : ''; ?>>
                                        No
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-right">How did you like your store ?</label>
                                <div class="col-md-5">
                                    <label class="col-md-4"> <input type="checkbox" id="PRICING" name="PRICING"
                                                                    value="T" <?php echo $luckyDrawData['PRICING'] == "T" ? 'checked' : ''; ?>>
                                        Pricing
                                    </label>
                                    <label class="col-md-4"> <input type="checkbox" id="QUALITY" name="QUALITY"
                                                                    value="T" <?php echo $luckyDrawData['QUALITY'] == "T" ? 'checked' : ''; ?>>
                                        Quality
                                    </label>
                                    <label class="col-md-4"> <input type="checkbox" id="SERVICE" name="SERVICE"
                                                                    value="T" <?php echo $luckyDrawData['SERVICE'] == "T" ? 'checked' : ''; ?>>
                                        Service
                                    </label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-3 text-right">If NO Reason ? Other:</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="OTHER" id="OTHER"
                                           value="<?php echo $luckyDrawData['OTHER']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box-footer">
                <a href="<?php echo site_url('luckydraw/list'); ?>" class="btn btn-default">Cancel</a>
                <button type="button" class="btn btn-primary saveLuckydraw pull-right">Update</button>
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
                url: site_url + 'luckydraw/update',
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
<?php $this->load->view('include/page_footer.php'); ?>