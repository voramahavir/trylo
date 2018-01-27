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
                <h3 class="box-title"> Branch Add </h3>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> Branch Name : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control branch_name" name="branch_name" id="branch_name"
                                   tabindex="1">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> Address : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control address1" name="address1" tabindex="3">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control address2" name="address2" tabindex="4">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control address3" name="address3" tabindex="5">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> Telephone 1 : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control telephone1" name="telephone1" tabindex="9">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> Subject to Jurisdiction : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control jurisdiction" name="jurisdiction" tabindex="12">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> Prefix : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control prefix" name="prefix" tabindex="2">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> City : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control city" tabindex="6">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> District : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control district" tabindex="7">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> State : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control state" tabindex="8">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> Telephone 2 : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control telephone2" name="telephone2" tabindex="10">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> Branch Code : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control branch_code" name="branch_code" id="branch_code"
                                   tabindex="11">
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
                            <input type="text" class="form-control chnoofpoints" name="chnoofpoints" tabindex="13">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-5 text-right"> Reference By No. of Points : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control refnoofpoints" name="refnoofpoints" tabindex="14">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-5 text-right"> Redeem After Minimum Points : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control redaftminpoints" name="redaftminpoints"
                                   tabindex="15">
                        </div>
                        <label class="col-md-3"> On Purchase Of Card Holder </label>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-5 text-right"> Re-deem Per Point : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control redperpoints" name="redperpoints" tabindex="16">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row form-group">
                        <label class="col-md-6 text-right"> Card Holder @ Rs. ( Multiple Factor ) : </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control chrs" tabindex="17">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-6 text-right"> Reference By @ Rs. ( Multiple Factor ) : </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control refrs" tabindex="18">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-6 text-right"> Round Off Limit ( +/- ) : </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control roundofflimit" tabindex="19">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-6 text-right"> Re-Deem Value @ Rs. : </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control redvaluers" tabindex="20">
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
                            <input type="text" class="form-control smscode" name="smscode" tabindex="21">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-5 text-right"> Negative Stock Alert On Mobile No. : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control mobileno" name="mobileno" tabindex="22">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-5 text-right"> Type Of Exp. Petty Cash A/C : </label>
                        <div class="col-md-4">
                            <select class="form-control pettycashtype" tabindex="23">
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
                            <input type="text" class="form-control smslast" tabindex="24">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-6 text-right"> Default Mail ID : </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control defaultemail" tabindex="25">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-6 text-right"> GSTIN No : </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control gstinno" tabindex="26">
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
                            <select class="form-control bdaysms" tabindex="27">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-8 text-right"> Discount Validity Period Days ? : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control bdaydiscdays" name="bdaydiscdays" tabindex="28">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-8 text-right"> Discount(%) : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control bdaydisc" name="bdaydisc" tabindex="29">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-8 text-right"> SMS Send Before : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control bdaysendbefore" name="bdaysendbefore" tabindex="30">
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row form-group">
                        <label class="col-md-8 text-right"> Want To Send Card Holder Marriage Anniversary SMS ? (Y/N)
                            : </label>
                        <div class="col-md-4">
                            <select class="form-control mrgsms" tabindex="31">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-8 text-right"> Discount Validity Period Days ? : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control mrgdiscdays" tabindex="32">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-8 text-right"> Discount(%) : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control mrgdisc" name="mrgdisc" tabindex="33">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-8 text-right"> SMS Send Before : </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control mrgsendbefore" name="mrgsendbefore" tabindex="34">
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
            <div class="box-header with-border">
                <h3 class="box-title"> User Details </h3>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> User Name : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control user_name" name="user_name" id="user_name"
                                   tabindex="35">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> Password : </label>
                        <div class="col-md-6">
                            <input type="password" class="form-control password" name="password" tabindex="36">
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
    function loadingStart() {
        $('.overlay').show();
    }

    function loadingStop() {
        $('.overlay').hide();
    }

    $(document).ready(function () {
        loadingStop();
        $(".save").click(function () {
            if ($(".branch_name").val() == "") {
                bootbox.alert("Please Enter Branch name");
            }
            else if ($(".branch_code").val() == "") {
                bootbox.alert("Please Enter Branch Code");
            }
            else if ($(".prefix").val() == "") {
                bootbox.alert("Please Enter Branch Prefix");
            } else if ($(".user_name").val() == "") {
                bootbox.alert("Please Enter User Name");
            } else if ($(".password").val() == "") {
                bootbox.alert("Please Enter Password");
            }
            else {
                addBranch();
            }
        });
    });

    function addBranch() {
        loadingStart();
        var branchData = {
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
        var userData = {
            user_name: $(".user_name").val(),
            password: $(".password").val()
        };
        var data = {
            branchData: branchData,
            userData: userData
        };
        $.ajax({
            url: "<?php echo site_url('branch/adddata'); ?>",
            dataType: 'json',
            type: "POST",
            data: data,
            success: function (response) {
                loadingStop();
                if (response.code == 1) {
                    bootbox.alert(response.msg, function () {
                        window.location = "<?php echo site_url('branch/list'); ?>";
                    });
                } else {
                    bootbox.alert(response.msg);
                }
            }
        });
    }
</script>
<?php $this->load->view('include/page_footer.php'); ?>
