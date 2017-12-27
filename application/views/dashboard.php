<?php $this->load->view('include/template/common_header') ?>
<?php
/*echo "<pre>";
print_r(getSessionData());
die;*/
?>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>150</h3>
                <p>New Orders</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">


    </section>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable">

    </section>
    <!-- right col -->
</div>
<!-- /.row (main row) -->

<?php if (!getSessionData('branch_id')) { ?>
    <div class="modal fade" id="branch-modal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    Select Branch to continue
                </div>
                <div class="modal-body">
                    <div class="col-md-4 col-md-offset-4">
                        <select name="branch" id="branchId" class="form-control">
                            <option value="">Select Branch</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary saveBranch">Save</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php $this->load->view('include/template/common_footer') ?>
<?php $this->load->view('include/page_footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        var saveBranchBtn = $('.saveBranch');
        var branchModal = $('#branch-modal');
        if (branchModal.length) {
            branchModal.modal({
                backdrop: 'static',
                keyboard: false
            });
        }
        var branchDatas = {};
        if (saveBranchBtn.length) {
            $.ajax({
                url: site_url + 'branch/getAll',
                dataType: 'JSON',
                success: function (response) {
                    if (response.code) {
                        var html = '<option value="">Select Branch</option>';
                        var data = response.data;

                        $.each(data, function (index, value) {
                            html += '<option value="' + value.branch_id + '">' + value.branch_name + '</option>';
                            branchDatas[value.branch_id] = value;
                        });
                        $("#branchId").html(html);
                    }
                }
            });
            saveBranchBtn.on('click', function () {
                var branch_id = $("#branchId").val();
                if (branch_id) {
                    var branchData = branchDatas[branch_id];
                    $.ajax({
                        url: site_url + 'branch/saveBranch',
                        dataType: 'JSON',
                        type: 'POST',
                        data: {
                            branchData: branchData
                        },
                        success: function (response) {
                            if (response.code) {
                                $('#branch-modal').modal('hide');
                            }
                            bootbox.alert(response.msg);
                        }
                    });
                }
                else {
                    bootbox.alert("Please select Branch");
                }
            });
        }
    });
</script>