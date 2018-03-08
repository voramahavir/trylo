<?php $this->load->view('include/template/common_header'); ?>
<link rel="stylesheet"
      href="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Stock Report</h3>
            </div>
            <div class="box-body">
                <div class="row form-group">
                    <div class="col-md-6">
                        <div class="col-md-12 radio label-primary">
                            <label> <input type="radio" class="" name="rpt_type" value="1"
                                           checked> Stock </label>
                            <label> <input type="radio" class="" name="rpt_type" value="2"> Sales
                            </label>
                            <label> <input type="radio"
                                           name="rpt_type"
                                           value="3"> Sales Return</label>
                            <label> <input type="radio" name="rpt_type" value="4"> Purchase </label>
                            <label> <input type="radio" name="rpt_type" value="5"> Purchase Return </label>
                        </div>
                        <div class="col-md-11 radio label-success">
                            <label> <input type="radio" class="" name="stk_type" value="1"
                                           checked> Without Nill </label>
                            <label> <input type="radio" class="" name="stk_type" value="2"> With Nill
                            </label>
                            <label> <input type="radio"
                                           name="stk_type"
                                           value="3"> Only Nill</label>
                            <label> <input type="radio" name="stk_type" value="4"> Negative Stock </label>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-1 no-pad-right">From Date : </label>
                    <div class="col-md-2">
                        <input id="from_date" type="text" class="form-control"
                               value="<?php echo date('d/m/Y', strtotime('first day of this month', time())); ?>">
                    </div>
                    <label class="col-md-1 no-pad-right"> To Date : </label>
                    <div class="col-md-2 no-pad-left">
                        <input id="to_date" type="text" class="form-control" value="<?php echo date('d/m/Y'); ?>">
                    </div>
                    <div class="col-md-2">
                        <?php if (getSessionData('role_id') == 1) { ?>
                            <select id="branch_code" class="form-control"></select>
                        <?php } else { ?>
                            <input type="hidden" id="branch_code" value="<?php echo getSessionData("branch_code"); ?>">
                        <?php } ?>
                        <input type="hidden" id="comm_per" value="<?php echo getSessionData("comm_per"); ?>">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary show-rpt"><i class="fa fa-search"> Preview</i>
                        </button>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <label class="col-md-2 no-pad-right">
                                        Product Group
                                    </label>
                                    <div class="col-md-2 radio">
                                        <label> <input type="radio" class="" name="prd_type" value="1"
                                                       checked> All </label>
                                        <label> <input type="radio" class="" name="prd_type" value="2"> Selected
                                        </label>
                                    </div>
                                    <div class="col-md-2 no-pad-left">
                                        <select name="prdGrp" id="prdGrp" class="form-control"></select>
                                    </div>
                                    <label class="col-md-1">
                                        Color
                                    </label>
                                    <div class="col-md-2 radio">
                                        <label> <input type="radio" class="" name="clr_type" value="1"
                                                       checked> All </label>
                                        <label> <input type="radio" class="" name="clr_type" value="2"> Selected
                                        </label>
                                    </div>
                                    <div class="col-md-2 no-padding">
                                        <select name="color" id="color" class="form-control"></select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="col-md-2">
                                        Cup
                                    </label>
                                    <div class="col-md-2 radio">
                                        <label> <input type="radio" class="" name="cup_type" value="1"
                                                       checked> All </label>
                                        <label> <input type="radio" class="" name="cup_type" value="2"> Selected
                                        </label>
                                    </div>
                                    <div class="col-md-2 no-pad-left">
                                        <select name="cup" id="cup" class="form-control"></select>
                                    </div>
                                    <label class="col-md-1">
                                        Brand
                                    </label>
                                    <div class="col-md-2 radio">
                                        <label> <input type="radio" class="" name="brand_type" value="1"
                                                       checked> All </label>
                                        <label> <input type="radio" class="" name="brand_type" value="2"> Selected
                                        </label>
                                    </div>
                                    <div class="col-md-2 no-padding">
                                        <select name="brand" id="brand" class="form-control"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="box rpt-box hide">
            <div class="box-body">
                <div class="row form-group">
                    <div class="stock-info">
                        <div class="col-md-12">
                            <label class="branch-name">

                            </label>
                            <label>
                                <?php echo fin_year(); ?>
                            </label>
                        </div>
                        <div class="col-md-12">
                            <label class="rpt-type-label">
                                STOCK REPORT
                            </label>
                        </div>
                        <div class="col-md-12">
                            <label class="date-label">
                            </label>
                        </div>
                        <div class="col-md-12">
                            <label class="bill-label">
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered" id="stock-table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="text-center">
                                    Particular
                                </th>
                                <th class="text-center">
                                    Color
                                </th>
                                <th class="size text-center">
                                    Size Inch
                                </th>
                                <th class="text-center">
                                    Rate
                                </th>
                                <th class="text-center">
                                    Total
                                </th>
                            </tr>
                            <tr class="hide">
                                <th></th>
                                <th></th>
                                <th class="sizeEmpty"></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="stock-body">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="overlay">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div>

    </div>
</div>
<?php $this->load->view('include/template/common_footer'); ?>
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/custom/js/jszip.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/custom/js/FileSaver.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/custom/js/scripts/excel-gen.js'); ?>"></script>
<script type="text/javascript">
    var commData = [];
    $(document).ready(function () {
        $('#from_date').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });
        $('#to_date').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });
        var role_id = "<?php echo getSessionData('role_id');?>";
        if (role_id == 1) {
            $.ajax({
                url: site_url + 'branch/getAll',
                dataType: 'JSON',
                success: function (response) {
                    var html = "<option value=''>Select Branch</option>";
                    if (response.code) {
                        var data = response.data;
                        $.each(data, function (i, v) {
                            html += "<option value='" + v.branch_code + "'>" + v.branch_name + "</option>";
                            commData[v.branch_code] = v.comm_per;
                        });
                    }
                    $("#branch_code").html(html);
                }
            })
        }
        getProductGrps();
        getColors();
        getCups();
        getBrands();

        $("#prdGrp").hide();
        $("#color").hide();
        $("#cup").hide();
        $("#brand").hide();

        loadingStop();
        var type = 0;
        $(document).on('change', "input[name=prd_type]", function () {
            type = this.value;
            if (type == 2) $("#prdGrp").show();
            else $("#prdGrp").hide();
        });
        $(document).on('change', "input[name=clr_type]", function () {
            type = this.value;
            if (type == 2) $("#color").show();
            else $("#color").hide();
        });
        $(document).on('change', "input[name=cup_type]", function () {
            type = this.value;
            if (type == 2) $("#cup").show();
            else $("#cup").hide();
        });
        $(document).on('change', "input[name=brand_type]", function () {
            type = this.value;
            if (type == 2) $("#brand").show();
            else $("#brand").hide();
        });
        $('.show-rpt').click(getStockData);

        function loadingStart() {
            $('.overlay').show();
        }

        function loadingStop() {
            $('.overlay').hide();
        }

        function getProductGrps() {
            loadingStart();
            $.ajax({
                url: site_url + 'stockreport/getProductGrps',
                dataType: 'JSON',
                success: function (response) {
                    var html = "<option value=''>Select Product Group</option>";
                    $.each(response, function (i, v) {
                        html += "<option value='" + v.code + "'>" + v.name + "</option>";
                    });
                    $("#prdGrp").html(html);
                },
                complete: function () {
                    loadingStop();
                }
            });
        }

        function getColors() {
            loadingStart();
            $.ajax({
                url: site_url + 'stockreport/getColors',
                dataType: 'JSON',
                success: function (response) {
                    var html = "<option value=''>Select Color</option>";
                    $.each(response, function (i, v) {
                        html += "<option value='" + v.color + "'>" + v.color + "</option>";
                    });
                    $("#color").html(html);
                },
                complete: function () {
                    loadingStop();
                }
            });
        }

        function getCups() {
            loadingStart();
            $.ajax({
                url: site_url + 'stockreport/getCups',
                dataType: 'JSON',
                success: function (response) {
                    var html = "<option value=''>Select Cup</option>";
                    $.each(response, function (i, v) {
                        html += "<option value='" + v.cup + "'>" + v.cup + "</option>";
                    });
                    $("#cup").html(html);
                },
                complete: function () {
                    loadingStop();
                }
            });
        }

        function getBrands() {
            loadingStart();

            $.ajax({
                url: site_url + 'stockreport/getBrands',
                dataType: 'JSON',
                success: function (response) {
                    var html = "<option value=''>Select Brand</option>";
                    $.each(response, function (i, v) {
                        html += "<option value='" + v.TRCODE + "'>" + v.TRNAME + "</option>";
                    });
                    $("#brand").html(html);
                },
                complete: function () {
                    loadingStop();
                }
            });
        }

        function getStockData() {
            loadingStart();
            $('.rpt-box').removeClass('hide');
            var _fromDate = $('#from_date').val();
            var _toDate = $('#to_date').val();
            var dateLabel = "From Date : " + _fromDate + " - " + _toDate;

            $('.date-label').text(dateLabel);
            var branchname = role_id == 1 ? $("#branch_code option:selected").text() : "<?php echo getSessionData('branch_name')?>";
            $('.branch-name').text(branchname);
            var fromDate = $("#from_date").val();
            fromDate = fromDate.split('/');
            fromDate = fromDate.reverse().join('-');

            var toDate = $("#to_date").val();
            toDate = toDate.split('/');
            toDate = toDate.reverse().join('-');
            var data = {
                fromDate: fromDate,
                toDate: toDate,
                branchCode: $("#branch_code").val(),
                nillType: $('input[name="stk_type"]:checked').val()
            };
            if ($("input[name=prd_type]:checked").val() == 2 && $("#prdGrp").val()) {
                data['prdGrp'] = $("#prdGrp").val();
            }
            if ($("input[name=clr_type]:checked").val() == 2 && $("#color").val()) {
                data['color'] = $("#color").val();
            }
            if ($("input[name=cup_type]:checked").val() == 2 && $("#cup").val()) {
                data['cup'] = $("#cup").val();
            }
            if ($("input[name=brand_type]:checked").val() == 2 && $("#brand").val()) {
                data['brand'] = $("#brand").val();
            }
            $.ajax({
                url: site_url + 'stockreport/getStockData',
                type: 'POST',
                data: data,
                dataType: 'JSON',
                success: function (response) {
                    console.log(response);

                    var html = "";
                    var sizeHeaderHtml = "";
                    var itemHtml = "";
                    var brandHeaderHtml = "";
                    var itemsData = {};
                    var grpSizes = [];
                    $('tbody.stock-body').html(html);
                    if (response) {
                        var maxSizeCnt = response.maxSizeCnt;
                        var mainData = response.mainData;
                        html = "";

                        $.each(mainData, function (i, row) {
                            html += "<tr>";
                            $.each(row, function (ic, col) {
                                html += "<td>";
                                html += col;
                                html += "</td>";
                            });
                            html += "</tr>";
                        });
                        $('.size').attr("colspan", maxSizeCnt);
                        var thCounts = parseInt(maxSizeCnt) == 0 ? parseInt(maxSizeCnt) + 2 : parseInt(maxSizeCnt) + 1;
                        for (var i = 0; i < thCounts; i++) {
                            sizeHeaderHtml += "<th></th>";
                        }
                        console.log("html", html);
                    }
                    $('tbody.stock-body').html(html);
                    $('.sizeEmpty').nextAll('th').remove();
                    $('.sizeEmpty').after(sizeHeaderHtml);
                    // $('.sizeEmpty').after(sizeHeaderHtml);
                    $('b.grpHeader').parent().parent("tr").addClass("info  fs-16");
                    $('b.brandHeader').parent().parent("tr").addClass("success fs-16");
                    $('b.brandTotal').parent().parent("tr").addClass("warning fs-16");
                    var table = $('#stock-table').DataTable({
                        'destroy': true,
                        'ordering': false,
                        'searching': false,
                        'info': false
                    });
                    table.columns.adjust().draw();
                    // console.log("grpSizes", grpSizes['A'].indexOf('FS'));
                    // $('#stock-table').DataTable();
                },
                complete: function () {
                    loadingStop();
                }
            });
        }
    });
</script>
