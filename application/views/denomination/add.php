<?php $this->load->view('include/template/common_header') ?>
<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Denomination Entry</h3>
            </div>
            <div class="box-body">
                <div class="panel panel-success col-md-6 col-md-offset-3">
                    <div class="panel-header"></div>
                    <div class="panel-body">
                        <div class="row form-group">
                            <label class="col-md-2 text-right"> Vou No.: </label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="VOUNO">
                            </div>
                            <label class="col-md-2 text-right"> Date: </label>
                            <div class="col-md-4">
                                <input type="text" class="form-control datepicker" value="<?php echo date('d/m/Y'); ?>"
                                       name="VOUDT">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('include/template/common_footer'); ?>
<!-- Bootstrap-notify -->
<script type="text/javascript">
    $(document).ready(function () {
    });
</script>