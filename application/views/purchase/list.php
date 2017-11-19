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
              <h3 class="box-title"> Purchase Bill (IN TRANSIT)</h3>
            </div>
            <div class="box-body">
              <div class="row form-group">
                    <label class="col-md-1 text-left">Fr Date : </label>
                    <div class="col-md-2">
                        <input class="form-control" id="from_date" type="text"
                               value="<?php echo date('Y-m-d', strtotime('first day of this month', time())); ?>">
                    </div>
                    <label class="col-md-1 text-left"> To Date : </label>
                    <div class="col-md-2">
                        <input class="form-control" id="to_date" type="text" value="<?php echo date('Y-m-d'); ?>">
                    </div>

                    <div class="col-md-5 col-md-offset-1">
                        <div class="row radio">
                            <label> <input type="radio" id="type" name="type" value="1" checked="true"> InTransit </label>
                            <label> <input type="radio" id="type" name="type" value="2"> PhysicalVerified </label>
                        </div>
                    </div>
                </div>
                <div class="dataTables_wrapper">
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table table-bordered table-hover dataTable" id="table_purchase">
                        <thead>
                          <tr>
                            <th>Bill No</th>
                            <th>Date</th>
                            <th>Name of Party</th>
                            <th>City</th>
                            <th>Sp.Instru.</th>
                            <th>Amount Rs.</th>
                            <th>Total Qty.</th>
                            <th>Product</th>
                            <!-- <th>Action</th> -->
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
        <div class="modal fade modal-3d-flip-horizontal" id="deletePurchaseModal" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
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
        <div class="modal fade modal-3d-flip-horizontal" id="recoverPurchaseModal" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
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
      var type = "1";
      function DeleteTheRow(id){
        $("#deletePurchaseModal").modal("show");
        $("#deletePurchaseModal").find("[name=id]").attr("value",id);
      }
      function RecoverTheRow(id){
        $("#recoverPurchaseModal").modal("show");
        $("#recoverPurchaseModal").find("[name=id]").attr("value",id);
      }
      $(document).ready(function(){
            $('#from_date').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });
            $('#to_date').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });
            setTable();
      });
      $("#from_date").on('change', function () {
          table.ajax.reload();
      });
      $("#to_date").on('change', function () {
          table.ajax.reload();
      });
      $("input[name=type]").on('change', function () {
          type = this.value;
          table.ajax.reload();
      });
      function setTable() {
        table = $('#table_purchase').DataTable({
          "processing": true,
          "serverSide": true,
          "paging" : true,
          "ajax": {
            "url": "<?php echo site_url('purchase/getData'); ?>",
            "type": "POST",
            data : function(d){
                d.to_date = $('#to_date').val();
                d.from_date = $('#from_date').val();
                d.type = type;
            }
          },
          "columns": [
              { 
                "data": "TRBLNO", 
                "bSortable": true
              },
              { 
                "data": "TRBLDT", 
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
                "data": "TRSPINST", 
                "bSortable": false
              },
              { 
                "data": "TRNET", 
                "bSortable": true
              },
              { 
                "data": "TRTQTQTY", 
                "bSortable": true
              },
              { 
                "data": "CREADT", 
                "bSortable": true
              },              
              // { 
              //   "data": null,
              //   "bSortable": false
              // },
          ],
          "rowCallback":function(nRow,aData,iDisplayindex){
                // if(aData.ISACTIVE==0){
                //     $('td:eq(8)',nRow).html(""
                //         +"<button class='btn btn-info' onclick='return EditTheRow("+aData.CRDNO+");'>"
                //         +"<i class='fa fa-edit'></i>"
                //         +"</button>"
                //         +"<button class='btn btn-danger' onclick='return DeleteTheRow("+aData.CRDNO+");'>"
                //         +"<i class='fa fa-trash-o'></i>"
                //         +"</button>"
                //     +"");
                // }else{
                //     $(nRow).addClass('danger');
                //     $('td:eq(8)',nRow).html(""
                //         +"<button class='btn btn-info' disabled onclick='return EditTheRow("+aData.CRDNO+");'>"
                //         +"<i class='fa fa-edit'></i>"
                //         +"</button>"
                //         +"<button class='btn btn-success' onclick='return RecoverTheRow("+aData.CRDNO+");'>"
                //         +"<i class='fa fa-check'></i>"
                //         +"</button>"
                //     +"");
                // }
          },
        });
        $('.dataTables_filter input').attr("placeholder", "Search by Party Name");

      }
    $(".deleteCard").on("click",function(){
        $(".deleteCard").prop("disabled",true);
        var id=-1;
        id=$("#deletePurchaseModal").find("[name=id]").val();
        $.post("<?php echo site_url('purchase/delete/'); ?>"+id,{})
        .done(function(result){
            result=JSON.parse(result);
            if(result.code==1){
                table.ajax.reload();
            }
            $("#deletePurchaseModal").modal("hide");
        });
        $(".deleteCard").prop("disabled",false);
    });
    $(".recoverCard").on("click",function(){
        $(".recoverCard").prop("disabled",true);
        var id=-1;
        id=$("#recoverPurchaseModal").find("[name=id]").val();
        $.post("<?php echo site_url('purchase/recover/'); ?>"+id,{})
        .done(function(result){
            result=JSON.parse(result);
            if(result.code==1){
                table.ajax.reload();
            }
            $("#recoverPurchaseModal").modal("hide");
        });
        $(".recoverCard").prop("disabled",false);
    });
    </script>
<?php $this->load->view('include/page_footer.php'); ?>
