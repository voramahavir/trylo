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
              <h3 class="box-title"> Loyalty Card Issue Entry </h3>
            </div>
            <div class="box-body">
                <div class="row form-group">
                    <label class="col-md-1 text-left">Fr Date : </label>
                    <div class="col-md-2">
                        <input id="from_date" type="text" class="form-control"
                               value="<?php echo date('d/m/Y', strtotime('first day of this month', time())); ?>">
                    </div>
                    <label class="col-md-1 text-left"> To Date : </label>
                    <div class="col-md-2">
                        <input id="to_date" type="text" class="form-control" value="<?php echo date('d/m/Y'); ?>">
                    </div>

                </div>
                <!-- <button type="button" class="btn btn-default" id="search">
                    <span class="glyphicon glyphicon-search"></span> Search
                </button> -->
                <a href="<?php echo site_url('loyaltycard/add'); ?>" class="btn btn-info">
                    <span class="glyphicon glyphicon-plus"></span> Add
                </a>
                <div class="dataTables_wrapper">
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table table-bordered table-hover dataTable" id="table_loyaltycard">
                        <thead>
                          <tr>
                            <th>Mobile No</th>
                            <th>Name</th>
                            <th>DoB</th>
                            <th>MrA.Dt</th>
                            <th>Scheme</th>
                            <th>Validity</th>
                            <th>From Dt.</th>
                            <th>To Dt.</th>
                            <th>Disc(%)</th>
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
        <div class="modal fade modal-3d-flip-horizontal" id="deleteLoyaltyCardModal" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
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
        <div class="modal fade modal-3d-flip-horizontal" id="recoverLoyaltyCardModal" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
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
        $("#deleteLoyaltyCardModal").modal("show");
        $("#deleteLoyaltyCardModal").find("[name=id]").attr("value",id);
      }
      function RecoverTheRow(id){
        $("#recoverLoyaltyCardModal").modal("show");
        $("#recoverLoyaltyCardModal").find("[name=id]").attr("value",id);
      }
      $(document).ready(function(){
            $('#from_date').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
            $('#to_date').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
            setTable();
      });
      // $("#search").click(function () {
      //   table.ajax.reload();
      // });
      $("#from_date").on('change', function () {
          table.ajax.reload();
      });
      $("#to_date").on('change', function () {
          table.ajax.reload();
      });
      function setTable() {
        table = $('#table_loyaltycard').DataTable({
          "processing": true,
          "serverSide": true,
          "paging" : true,
          "searching" : false,
          "lengthChange" : false,
          "ajax": {
              url: "<?= site_url('LoyaltyCardController/getLoyaltyCardList') ?>",
              pages: 2, // number of pages to cache
              method: 'POST',
              data: function(d) {
                  d.to_date = $('#to_date').val();
                  d.from_date = $('#from_date').val();
              }
          },
          "columns": [
              { 
                "data": "MOBILEID", 
                "bSortable": false
              },
              { 
                "data": "LONAME", 
                "bSortable": false
              },
              { 
                "data": "LODOB", 
                "bSortable": false
              },
              { 
                "data": "LOMAR", 
                "bSortable": false
              },
              { 
                "data": "LOTYPE", 
                "bSortable": false
              },
              { 
                "data": "LOVAL", 
                "bSortable": false
              },
              { 
                "data": "LOSTDT", 
                "bSortable": false
              },
              { 
                "data": "LOENDT", 
                "bSortable": false
              },
              { 
                "data": "LODISCPR", 
                "bSortable": false
              },              
              { 
                "data": null,
                "bSortable": false
              },
          ],
          "rowCallback":function(nRow,aData,iDisplayindex){
              var LODOB = new Date(aData.LODOB);
              $('td:eq(2)', nRow).html(LODOB.toString('d/M/yyyy'));
              var LOMAR = new Date(aData.LOMAR);
              $('td:eq(3)', nRow).html(LOMAR.toString('d/M/yyyy'));
              var LOSTDT = new Date(aData.LOSTDT);
              $('td:eq(6)', nRow).html(LOSTDT.toString('d/M/yyyy'));
              var LOENDT = new Date(aData.LOENDT);
              $('td:eq(7)', nRow).html(LOENDT.toString('d/M/yyyy'));
              if (aData.ISACTIVE == 1) {
                    $('td:eq(9)',nRow).html(""
                        +"<button class='btn btn-info' onclick='return EditTheRow("+aData.MOBILEID+");'>"
                        +"<i class='fa fa-edit'></i>"
                        +"</button>"
                        +"<button class='btn btn-danger' onclick='return DeleteTheRow("+aData.MOBILEID+");'>"
                        +"<i class='fa fa-trash-o'></i>"
                        +"</button>"
                    +"");
                }else{
                    $(nRow).addClass('danger');
                    $('td:eq(9)',nRow).html(""
                        +"<button class='btn btn-info' disabled onclick='return EditTheRow("+aData.MOBILEID+");'>"
                        +"<i class='fa fa-edit'></i>"
                        +"</button>"
                        +"<button class='btn btn-success' onclick='return RecoverTheRow("+aData.MOBILEID+");'>"
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
        id=$("#deleteLoyaltyCardModal").find("[name=id]").val();
        $.post("<?php echo site_url('loyaltycard/delete/'); ?>"+id,{})
        .done(function(result){
            result=JSON.parse(result);
            if(result.code==1){
                table.ajax.reload();
            }
            $("#deleteLoyaltyCardModal").modal("hide");
        });
        $(".deleteCard").prop("disabled",false);
    });
    $(".recoverCard").on("click",function(){
        $(".recoverCard").prop("disabled",true);
        var id=-1;
        id=$("#recoverLoyaltyCardModal").find("[name=id]").val();
        $.post("<?php echo site_url('loyaltycard/recover/'); ?>"+id,{})
        .done(function(result){
            result=JSON.parse(result);
            if(result.code==1){
                table.ajax.reload();
            }
            $("#recoverLoyaltyCardModal").modal("hide");
        });
        $(".recoverCard").prop("disabled",false);
    });
    </script>
<?php $this->load->view('include/page_footer.php'); ?>
