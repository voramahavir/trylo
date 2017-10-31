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
              <h3 class="box-title"> Membership Card Registration </h3>
            </div>
            <div class="box-body">
                <div class="dataTables_wrapper">
                  <div class="row form-group">
                    <div class="col-md-12">
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                        <span class="glyphicon glyphicon-plus"></span> Add
                      </button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table table-bordered table-hover dataTable" id="table_membershipcard">
                        <thead>
                          <tr>
                            <th>Card Holder No</th>
                            <th>Reference Card Holder No</th>
                            <th>Name of Party</th>
                            <th>City</th>
                            <th>Mobile No.</th>
                            <th>Phone No.</th>
                            <th>Bill No.</th>
                            <th>Date and Time</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    <!-- DeleteModal -->
        <div class="modal fade modal-3d-flip-horizontal" id="deleteMembershipCardModal" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title">Are you sure you want to delete the Card ? </h4>
                  <input type="hidden" name="id" value="">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-danger deleteCard">Delete</button>
                </div>
              </div>
            </div>
        </div>
        <!-- End DeleteModal -->
        <!-- RecoverModal -->
        <div class="modal fade modal-3d-flip-horizontal" id="recoverMembershipCardModal" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title">Are you sure you want to recover the Card ?</h4>
                  <input type="hidden" name="id" value="">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default margin-0" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-success recoverCard">Recover</button>
                </div>
              </div>
            </div>
        </div>
        <!-- End RecoverModal -->
<?php $this->load->view('include/template/common_footer'); ?>
<!-- Bootstrap-notify -->
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
    <script type="text/javascript">
        var table = '';
      function DeleteTheRow(id){
        $("#deleteMembershipCardModal").modal("show");
        $("#deleteMembershipCardModal").find("[name=id]").attr("value",id);
      }
      function RecoverTheRow(id){
        $("#recoverMembershipCardModal").modal("show");
        $("#recoverMembershipCardModal").find("[name=id]").attr("value",id);
      }
      $(document).ready(function(){
            setTable();
      });
      function setTable() {
        table = $('#table_membershipcard').DataTable({
          "processing": true,
          "serverSide": true,
          "paging" : true,
          "ajax": {
            "url": "<?php echo site_url('membershipcard/getMemberShipCardList'); ?>",
            "type": "POST"
          },
          "columns": [
              { 
                "data": "CARDHOLDERNO", 
                "bSortable": true
              },
              { 
                "data": "REFCARDHOLDERNO", 
                "bSortable": true
              },
              { 
                "data": "NAME", 
                "bSortable": true
              },
              { 
                "data": "CITY", 
                "bSortable": false
              },
              { 
                "data": "MOBILENO", 
                "bSortable": false
              },
              { 
                "data": "PHONENO", 
                "bSortable": false
              },
              { 
                "data": "BILLNO", 
                "bSortable": false
              },
              { 
                "data": "CREADT", 
                "bSortable": true
              },              
              { 
                "data": null,
                "bSortable": false
              },
          ],
          "rowCallback":function(nRow,aData,iDisplayindex){
                if(aData.ISACTIVE==0){
                    $('td:eq(8)',nRow).html(""
                        +"<button class='btn btn-info' onclick='return EditTheRow("+aData.CRDNO+");'>"
                        +"<i class='fa fa-edit'></i>"
                        +"</button>"
                        +"<button class='btn btn-danger' onclick='return DeleteTheRow("+aData.CRDNO+");'>"
                        +"<i class='fa fa-trash-o'></i>"
                        +"</button>"
                    +"");
                }else{
                    $(nRow).addClass('danger');
                    $('td:eq(8)',nRow).html(""
                        +"<button class='btn btn-info' disabled onclick='return EditTheRow("+aData.CRDNO+");'>"
                        +"<i class='fa fa-edit'></i>"
                        +"</button>"
                        +"<button class='btn btn-success' onclick='return RecoverTheRow("+aData.CRDNO+");'>"
                        +"<i class='fa fa-check'></i>"
                        +"</button>"
                    +"");
                }
          },
        });
        $('.dataTables_filter input').attr("placeholder", "Card No, Name, Mobile No");

      }
    $(".deleteCard").on("click",function(){
        $(".deleteCard").prop("disabled",true);
        var id=-1;
        id=$("#deleteMembershipCardModal").find("[name=id]").val();
        $.post("<?php echo site_url('membershipcard/delete/'); ?>"+id,{})
        .done(function(result){
            result=JSON.parse(result);
            if(result.code==1){
                table.ajax.reload();
            }
            $("#deleteMembershipCardModal").modal("hide");
        });
        $(".deleteCard").prop("disabled",false);
    });
    $(".recoverCard").on("click",function(){
        $(".recoverCard").prop("disabled",true);
        var id=-1;
        id=$("#recoverMembershipCardModal").find("[name=id]").val();
        $.post("<?php echo site_url('membershipcard/recover/'); ?>"+id,{})
        .done(function(result){
            result=JSON.parse(result);
            if(result.code==1){
                table.ajax.reload();
            }
            $("#recoverMembershipCardModal").modal("hide");
        });
        $(".recoverCard").prop("disabled",false);
    });
    </script>
<?php $this->load->view('include/page_footer.php'); ?>
