<?php $this->load->view('include/template/common_header') ?>
<style type="text/css">
</style>
<link rel="stylesheet"
      href="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Branch Edit </h3>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> Branch Name : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control branch_name" name="branch_name">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> Address : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control address1" name="address1">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control address2" name="address2">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control address3" name="address3">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> Telephone 1 : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control telephone1" name="telephone1">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> Subject to Jurisdiction : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control jurisdiction" name="jurisdiction">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> Prefix : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control prefix" name="prefix">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> City : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control city">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> District : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control district">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> State : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control state">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> Telephone 2 : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control telephone2" name="telephone2">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> Branch Code : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control branch_code" name="branch_code">
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <div class="col-md-6">
                    <div class="row form-group">
                        <label class="col-md-5 text-right"> Card Holder No. of Points : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control chnoofpoints" name="chnoofpoints">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-5 text-right"> Reference By No. of Points : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control refnoofpoints" name="refnoofpoints">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-5 text-right"> Redeem After Minimum Points : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control redaftminpoints" name="redaftminpoints">
                        </div>
                        <label class="col-md-3"> On Purchase Of Card Holder </label>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-5 text-right"> Re-deem Per Point : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control redperpoints" name="redperpoints">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row form-group">
                        <label class="col-md-6 text-right"> Card Holder @ Rs. ( Multiple Factor ) : </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control chrs">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-6 text-right"> Reference By @ Rs. ( Multiple Factor ) : </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control refrs">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-6 text-right"> Round Off Limit ( +/- ) : </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control roundofflimit">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-6 text-right"> Re-Deem Value @ Rs. : </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control redvaluers">
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <div class="col-md-6">
                    <div class="row form-group">
                        <label class="col-md-5 text-right"> SMS Code : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control smscode" name="smscode">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-5 text-right"> Negative Stock Alert On Mobile No. : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control mobileno" name="mobileno">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-5 text-right"> Type Of Exp. Petty Cash A/C : </label>
                        <div class="col-md-4">
                            <select class="form-control pettycashtype">
                                <option value="1">CASH</option>
                                <option value="145">PETTY CASH FOR EXPENSE</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row form-group">
                        <label class="col-md-6 text-right"> SMS Last Salutation : </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control smslast">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-6 text-right"> Default Mail ID : </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control defaultemail">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-6 text-right"> GSTIN No : </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control gstinno">
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <div class="col-md-5">
                    <div class="row form-group">
                        <label class="col-md-8 text-right"> Want To Send Card Holder Birthday SMS ? (Y/N) : </label>
                        <div class="col-md-4">
                            <select class="form-control bdaysms">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-8 text-right"> Discount Validity Period Days ? : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control bdaydiscdays" name="bdaydiscdays">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-8 text-right"> Discount(%) : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control bdaydisc" name="bdaydisc">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-8 text-right"> SMS Send Before : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control bdaysendbefore" name="bdaysendbefore">
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row form-group">
                        <label class="col-md-8 text-right"> Want To Send Card Holder Marriage Anniversary SMS ? (Y/N)
                            : </label>
                        <div class="col-md-4">
                            <select class="form-control mrgsms">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-8 text-right"> Discount Validity Period Days ? : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control mrgdiscdays">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-8 text-right"> Discount(%) : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control mrgdisc" name="mrgdisc">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-8 text-right"> SMS Send Before : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control mrgsendbefore" name="mrgsendbefore">
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <button class="btn btn-primary save">Save</button>
    </div>
    <div class="col-md-6">
        <a href="<?php echo site_url('branch/list') ?>" class="btn btn-default pull-right">Cancel</a>
    </div>
</div>
<?php $this->load->view('include/template/common_footer'); ?>
<!-- Bootstrap-notify -->
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".save").click(function () {
            if ($(".branch_name").val() == "") {
                bootbox.alert("Please Enter Branch name");
            }
            else if ($(".branch_code").val() == "") {
                bootbox.alert("Please Enter Branch Code");
            }
            else if ($(".prefix").val() == "") {
                bootbox.alert("Please Enter Branch Prefix");
            }
            else {
                updateBranch();
            }
        });
    });

    function updateBranch() {
        loadingStart();
        var data = {
            branch_name: $(".branch_name").val(),
            address1: $(".address1").val(),
            address2: $(".address2").val(),
            address3: $(".address3").val(),
            city: $(".city").val(),
            district: $(".district").val(),
            state: $(".state").val(),
            telephone1: $(".telephone1").val(),
            telephone2: $(".telephone2").val(),
            jurisdiction: $(".jurisdiction").val(),
            prefix: $(".prefix").val(),
            chnoofpoints: $(".chnoofpoints").val(),
            refnoofpoints: $(".refnoofpoints").val(),
            chrs: $(".chrs").val(),
            refrs: $(".refrs").val(),
            redaftminpoints: $(".redaftminpoints").val(),
            redperpoints: $(".redperpoints").val(),
            redvaluers: $(".redvaluers").val(),
            roundofflimit: $(".roundofflimit").val(),
            mobileno: $(".mobileno").val(),
            pettycashtype: $(".pettycashtype").val(),
            smscode: $(".smscode").val(),
            smslast: $(".smslast").val(),
            gstinno: $(".gstinno").val(),
            defaultmail: $(".defaultmail").val(),
            bdaysms: $(".bdaysms").val(),
            mrgsms: $(".mrgsms").val(),
            bdaydiscdays: $(".bdaydiscdays").val(),
            mrgdiscdays: $(".mrgdiscdays").val(),
            bdaydisc: $(".bdaydisc").val(),
            mrgdisc: $(".mrgdisc").val(),
            bdaysendbefore: $(".bdaysendbefore").val(),
            mrgsendbefore: $(".mrgsendbefore").val(),
            branch_code: $(".branch_code").val()
        };
        $.ajax({
            url: "<?php echo site_url('branch/updatedata/'); echo $id; ?>",
            dataType: 'json',
            type: "POST",
            data: data,
            success: function (response) {
                loadingStop();
                if (response.code == 1) {
                    bootbox.alert("Branch updated successfully.", function () {
                        window.location = "<?php echo site_url('branch/list'); ?>";
                    });
                } else {
                    bootbox.alert("Error in updating branch,Try again.");
                }
            }
        });
    }

    $.ajax({
        url: "<?php echo site_url('branch/branchDetails/'); echo $id; ?>",
        dataType: 'json',
        type: "POST",
        success: function (response) {
            if (response.code == 1) {
                fillData(response.data);
            } else {
                bootbox.alert("Error in fetching breanch details, Try again.");
            }
        }
    });

    function fillData(data) {
        $(".branch_name").val(data.branch_name);
        $(".address1").val(data.address1);
        $(".address2").val(data.address2);
        $(".address3").val(data.address3);
        $(".city").val(data.city);
        $(".district").val(data.district);
        $(".state").val(data.state);
        $(".telephone1").val(data.telephone1);
        $(".telephone2").val(data.telephone2);
        $(".jurisdiction").val(data.jurisdiction);
        $(".prefix").val(data.prefix);
        $(".chnoofpoints").val(data.chnoofpoints);
        $(".refnoofpoints").val(data.refnoofpoints);
        $(".chrs").val(data.chrs);
        $(".refrs").val(data.refrs);
        $(".redaftminpoints").val(data.redaftminpoints);
        $(".redperpoints").val(data.redperpoints);
        $(".redvaluers").val(data.redvaluers);
        $(".roundofflimit").val(data.roundofflimit);
        $(".mobileno").val(data.mobileno);
        $(".pettycashtype").val(data.pettycashtype);
        $(".smscode").val(data.smscode);
        $(".smslast").val(data.smslast);
        $(".gstinno").val(data.gstinno);
        $(".defaultmail").val(data.defaultmail);
        $(".bdaysms").val(data.bdaysms);
        $(".mrgsms").val(data.mrgsms);
        $(".bdaydiscdays").val(data.bdaydiscdays);
        $(".mrgdiscdays").val(data.mrgdiscdays);
        $(".bdaydisc").val(data.bdaydisc);
        $(".mrgdisc").val(data.mrgdisc);
        $(".bdaysendbefore").val(data.bdaysendbefore);
        $(".mrgsendbefore").val(data.mrgsendbefore);
        $(".branch_code").val(data.branch_code);
        loadingStop();
    }

    function loadingStart() {
        $('.overlay').show();
    }

    function loadingStop() {
        $('.overlay').hide();
    }
</script>
<?php $this->load->view('include/page_footer.php'); ?>
