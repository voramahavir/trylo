<?php $this->load->view('include/template/common_header') ?>
<style type="text/css">

</style>
<link rel="stylesheet"
      href="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
<?php // $this->load->view('include/template/common_header') ?>
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Branches </h3>
            </div>
            <div class="box-body">
                <div class="dataTables_wrapper">
                  <div class="row form-group">
                    <div class="col-md-12">
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                        Add New Branch
                      </button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table table-bordered table-hover dataTable" id="table_branch">
                        <thead>
                          <tr>
                            <th>Sr No</th>
                            <th>Branch</th>
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
      <div class="modal" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Add New Branch</h4>
            </div>
            <div class="modal-body">
              <div class="row form-group">
                <div class="col-md-6">
                  <input type="text" name="branch_name" placeholder="Branch name" class="form-control">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-6">
                  <input type="text" name="username" placeholder="User Name" class="form-control">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-6">
                  <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<?php $this->load->view('include/template/common_footer'); ?>
<!-- Bootstrap-notify -->
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
    <script type="text/javascript">
      $(document).ready(function(){

        $('#table_branch').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": false,
          "responsive": true,
          "autoWidth": false,
          "pageLength": 10,
          "ajax": {
            "url": "<?php echo site_url('branch/get'); ?>",
            "type": "POST"
          },
          "columns": [
              { 
                "data": "branch_id", 
                "bSortable": true
              },
              { 
                "data": "branch_name", 
                "bSortable": true
              },              
              { 
                "data": null,
                "bSortable": false
              },
          ],
          "rowCallback":function(nRow,aData,iDisplayindex){
              branchid = 1;
              if(aData.is_active==1){
                  if(aData.branch_id==branchid){
                      $('td:eq(2)',nRow).html(""
                          +"<button class='btn btn-info' onclick='return EditTheRow("+iDisplayindex+","+aData.branch_id+");'>"
                          +"<i class='fa fa-edit'></i>"
                          +"</button>"
                          +"<button class='btn btn-danger' disabled>"
                          +"<i class='fa fa-trash-o'></i>"
                          +"</button>"
                      +"");
                  }
                  else{
                      $('td:eq(2)',nRow).html(""
                          +"<button class='btn btn-info' onclick='return EditTheRow("+iDisplayindex+","+aData.branch_id+");'>"
                          +"<i class='fa fa-edit'></i>"
                          +"</button>"
                          +"<button class='btn btn-danger' onclick='return DeleteTheRow("+iDisplayindex+","+aData.branch_id+");'>"
                          +"<i class='fa fa-trash-o'></i>"
                          +"</button>"
                      +"");
                  }

              }else{
                  $(nRow).addClass('danger');
                  $('td:eq(2)',nRow).html(""
                      +"<button class='btn btn-info' disabled onclick='return EditTheRow("+iDisplayindex+","+aData.branch_id+");'>"
                      +"<i class='fa fa-edit'></i>"
                      +"</button>"
                      +"<button class='btn btn-success' onclick='return RecoverTheRow("+iDisplayindex+","+aData.branch_id+");'>"
                      +"<i class='fa fa-check'></i>"
                      +"</button>"
                  +"");
              }
          },
        });
    });
    </script>
<?php $this->load->view('include/page_footer.php'); ?>
