<?php $this->load->view('include/template/common_header') ?>
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
                <div class="col-md-12">
                  <label>Branch Name</label>
                  <input type="text" name="">
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
<script src="<?php echo base_url('assets/theme/plugins/bootstrap-notify/bootstrap-notify.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js'); ?>"></script>
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
          { "data": "branch_id" },
          { "data": "branch_name" },
          { "data": "branch_id" },
          ]
        });
    });
    </script>
<?php $this->load->view('include/page_footer.php'); ?>
