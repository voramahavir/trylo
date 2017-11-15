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
                            <input type="text" class="form-control branch_name" name="branch_name">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-right"> Address  : </label>
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
                </div>
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
                        <label class="col-md-5 text-right"> Re-deem Per Point  : </label>
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
                              <option value="1">Hello</option>
                              <option value="2">Hello</option>
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
                        <label class="col-md-8 text-right"> Want To Send Card Holder Marriage Anniversary SMS ? (Y/N) : </label>
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
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary save">Save</a>
        </div>
      </div>
<?php $this->load->view('include/template/common_footer'); ?>
<!-- Bootstrap-notify -->
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".save").click(function(){
            addBranch();
        });
    });
    function addBranch() {
      var data = {
          branch_name : $(".branch_name").val(),
          address1 : $(".address1").val(),
          address2 : $(".address2").val(),
          address3 : $(".address3").val(),
          city : $(".city").val(),
          district : $(".district").val(),
          state : $(".state").val(),
          telephone1 : $(".telephone1").val(),
          telephone2 : $(".telephone2").val(),
          jurisdiction : $(".jurisdiction").val(),
          prefix : $(".prefix").val(),
          chnoofpoints : $(".chnoofpoints").val(),
          refnoofpoints : $(".refnoofpoints").val(),
          chrs : $(".chrs").val(),
          refrs : $(".refrs").val(),
          redaftminpoints : $(".redaftminpoints").val(),
          redperpoints : $(".redperpoints").val(),
          redvaluers : $(".redvaluers").val(),
          roundofflimit : $(".roundofflimit").val(),
          mobileno : $(".mobileno").val(),
          pettycashtype : $(".pettycashtype").val(),
          smscode : $(".smscode").val(),
          smslast : $(".smslast").val(),
          gstinno : $(".gstinno").val(),
          defaultmail : $(".defaultmail").val(),
          bdaysms : $(".bdaysms").val(),
          mrgsms : $(".mrgsms").val(),
          bdaydiscdays : $(".bdaydiscdays").val(),
          mrgdiscdays : $(".mrgdiscdays").val(),
          bdaydisc : $(".bdaydisc").val(),
          mrgdisc : $(".mrgdisc").val(),
          bdaysendbefore : $(".bdaysendbefore").val(),
          mrgsendbefore : $(".mrgsendbefore").val()
      };
      $.ajax({
          url: "<?php echo site_url('branch/adddata'); ?>",
          dataType: 'json',
          type: "POST",
          data : data,
          success: function (response) {
            if(response.code == 1){
                bootbox.alert("Branch added successfully.", function () {
                    window.location = "<?php echo site_url('branch/list'); ?>";
                });
            }else{
              bootbox.alert("Error in adding branch,Try again.");
            }
          }
      });
    }
</script>
<?php $this->load->view('include/page_footer.php'); ?>