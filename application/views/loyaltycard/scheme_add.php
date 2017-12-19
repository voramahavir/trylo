<?php $this->load->view('include/template/common_header'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Loyalty Card Scheme Type Entry</h3>
                <!-- <button type="button" id="searchItem" class="btn btn-info pull-right"><i class="fa fa-search"></i>
                     Search Item
                 </button>-->
            </div>
            <div class="box-body">
                <form id="schemeAdd">
                    <div class="col-md-11">
                        <div class="panel panel-info">
                            <div class="panel-header">

                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <label class="col-md-2 text-right"> Scheme Type: </label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" value="" name="LOYSCHNM">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right"> Validity Days </label>
                                    <div class="col-md-3">
                                        <input type="number" name="LOYSCHVAL" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right"> Scheme (%) </label>
                                    <div class="col-md-3">
                                        <input type="number" name="LOYSCHPR" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right"> Value Rs </label>
                                    <div class="col-md-3">
                                        <input type="number" name="LOYSCHVL" class="form-control">
                                        <input type="hidden" name="ENTRYDATE" value="<?php echo date('Y-m-d'); ?>">
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

            $(document).on('click', '.save', function () {
                saveScheme();
            });

            function saveScheme() {
                var data = $("#schemeAdd").serializeObject();
                $.ajax({
                    url: site_url + 'scheme/create',
                    type: "POST",
                    dataType: "JSON",
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
<?php $this->load->view('include/page_footer.php'); ?>