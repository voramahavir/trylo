<?php $this->load->view('include/template/common_header'); ?>
<link rel="stylesheet"
      href="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
<!--<link rel="stylesheet"
      href="<?php /*echo base_url('assets/custom/css/tableexport.css'); */ ?>">-->
<style>
    @media print {
        @page {
            margin: 0mm;  /* this affects the margin in the printer settings */
        }
    }

    .no-border {
        border: none !important;
    }

    .fs-17, .fs-17 > td {
        font-size: 17px;
        font-weight: 700;
    }

    .fs-16, .fs-16 > td {
        font-size: 16px;
        font-weight: 700;
    }

    .fs-18, .fs-18 > td {
        font-size: 18px;
        font-weight: 700;
    }

    td {
        font-size: 15px;
    }

    /*    table {
            empty-cells: hide;
        }*/
</style>
<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Sales Register</h3>
            </div>
            <div class="box-body">
                <div class="row form-group">
                    <div class="col-md-12 radio">
                        <label> <input type="radio" class="" name="rpt_type" value="1"
                                       checked> Date Wise Summary </label>
                        <label> <input type="radio" class="" name="rpt_type" value="2"> Sales Commission Report
                        </label>
                        <label> <input type="radio"
                                       name="rpt_type"
                                       value="3"> Sales & return Register (GST) </label>
                        <label> <input type="radio" name="rpt_type" value="4"> Commission Report </label>
                        <label> <input type="radio" name="rpt_type" value="5"> Sales Summary </label>
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
            </div>
        </div>
        <div class="box rpt-box hide">
            <div class="box-body">
                <div class="row form-group">
                    <div class="col-md-12">
                        <button id="generate-excel" class="btn btn-danger hide">
                            Generate Excel
                        </button>
                    </div>
                </div>
                <div class="row form-group datewise hide">
                    <div class="datewise-info">
                        <div class="col-md-12">
                            <label class="branch-name">

                            </label>
                            <label>
                                <?php echo fin_year(); ?>
                            </label>
                        </div>
                        <div class="col-md-12">
                            <label>
                                Sales Summary GST
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
                        <table class="table table-hover table-bordered" id="datewise-table">
                            <thead>
                            <tr class="info fs-16">
                                <th class="col-md-1 text-center">
                                    Date
                                </th>
                                <th class="col-md-2 text-center">
                                    Description
                                </th>
                                <th class="col-md-1 text-center">
                                    Amount Bef.Tax
                                </th>
                                <th class="col-md-1 text-center">
                                    CGST
                                </th>
                                <th class="col-md-1 text-center">
                                    SGST
                                </th>
                                <th class="col-md-1 text-center">
                                    Other
                                </th>
                                <th class="col-md-1 text-center">
                                    Total Amount
                                </th>
                            </tr>
                            </thead>
                            <tbody class="datewise-body">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row form-group salescomm hide">
                    <div class="salescomm-info">
                        <div class="col-md-12">
                            <label class="branch-name">

                            </label>
                            <label>
                                <?php echo fin_year(); ?>
                            </label>
                        </div>
                        <div class="col-md-12">
                            <label>
                                Sales Summary GST
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
                        <table class="table table-hover table-bordered" id="salescomm-table">
                            <thead>
                            <tr class="info fs-16">
                                <th class="col-md-2 text-center">
                                    Description
                                </th>
                                <th class="col-md-1 text-center">
                                    Amount Bef.Tax
                                </th>
                                <th class="col-md-1 text-center">
                                    CGST
                                </th>
                                <th class="col-md-1 text-center">
                                    SGST
                                </th>
                                <th class="col-md-1 text-center">
                                    Total Amount
                                </th>
                            </tr>
                            </thead>
                            <tbody class="salescomm-body">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row form-group salesret hide">
                    <div class="salesret-info">
                        <div class="col-md-12">
                            <label class="branch-name">

                            </label>
                            <label>
                                <?php echo fin_year(); ?>
                            </label>
                        </div>
                        <div class="col-md-12">
                            <label>
                                Sales Summary GST
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
                        <table class="table table-hover table-bordered" id="salesret-table">
                            <thead>
                            <tr class="info fs-16">
                                <th class="text-center">
                                    Bill No
                                </th>
                                <th class="text-center">
                                    Date
                                </th>
                                <th class="text-center">
                                    Name Of Customer
                                </th>
                                <th class="text-center">
                                    Type
                                </th>
                                <th class="text-center">
                                    Gross Amount
                                </th>
                                <th class="text-center">
                                    Discount
                                </th>
                                <th class="text-center">
                                    Taxable Amount
                                </th>
                                <th class="text-center">
                                    CGST
                                </th>
                                <th class="text-center">
                                    SGST
                                </th>
                                <th class="text-center">
                                    Total
                                </th>
                                <th class="text-center">
                                    Other Amount
                                </th>
                                <th class="text-center">
                                    Rounded Off
                                </th>
                                <th class="text-center">
                                    Total
                                </th>
                            </tr>
                            </thead>
                            <tbody class="salesret-body">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row form-group comm hide">
                    <div class="comm-info">
                        <div class="col-md-12">
                            <label class="branch-name">

                            </label>
                            <label>
                                <?php echo fin_year(); ?>
                            </label>
                        </div>
                        <div class="col-md-12">
                            <label>
                                Sales Summary GST
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
                        <table class="table table-hover table-bordered" id="comm-table">
                            <thead>
                            <tr class="info fs-16">
                                <th class="text-center">
                                    Bill No
                                </th>
                                <th class="text-center">
                                    Date
                                </th>
                                <th class="text-center">
                                    Name Of Customer
                                </th>
                                <th class="text-center">
                                    Type
                                </th>
                                <th class="text-center">
                                    Gross Amount
                                </th>
                                <th class="text-center">
                                    Discount
                                </th>
                                <th class="text-center">
                                    Taxable Amount
                                </th>
                                <th class="text-center">
                                    CGST
                                </th>
                                <th class="text-center">
                                    SGST
                                </th>
                                <th class="text-center">
                                    Total
                                </th>
                                <th class="text-center">
                                    Other Amount
                                </th>
                                <th class="text-center">
                                    Rounded Off
                                </th>
                                <th class="text-center">
                                    Total
                                </th>
                            </tr>
                            </thead>
                            <tbody class="comm-body">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row form-group salessum hide">
                    <div class="salessum-info">
                        <div class="col-md-12">
                            <label class="branch-name">

                            </label>
                            <label>
                                <?php echo fin_year(); ?>
                            </label>
                        </div>
                        <div class="col-md-12">
                            <label>
                                Sales Summary GST
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
                        <table class="table table-hover table-bordered" id="salessum-table">
                            <thead>
                            <tr class="info fs-16">
                                <th class="text-center">
                                    Group
                                </th>
                                <th class="text-center">
                                    Total Qty
                                </th>
                                <th class="text-center">
                                    Gross Amount
                                </th>
                                <th class="text-center">
                                    Discount
                                </th>
                                <th class="text-center">
                                    Taxable Amount
                                </th>
                                <th class="text-center">
                                    GST Amount
                                </th>
                                <th class="text-center">
                                    Total
                                </th>
                            </tr>
                            </thead>
                            <tbody class="salessum-body">
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
<script type="text/javascript" src="<?php echo base_url('assets/custom/js/dataTables.buttons.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/custom/js/buttons.bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/custom/js/buttons.flash.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/custom/js/jszip.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/custom/js/pdfmake.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/custom/js/vfs_fonts.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/custom/js/buttons.html5.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/custom/js/buttons.print.min.js'); ?>"></script>
<!--<script type="text/javascript" src="--><?php //echo base_url('assets/custom/js/xlsx.full.min.js'); ?><!--"></script>-->
<script type="text/javascript" src="<?php echo base_url('assets/custom/js/jszip.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/custom/js/FileSaver.min.js'); ?>"></script>
<!--<script type="text/javascript" src="--><?php //echo base_url('assets/custom/js/tableexport.min.js'); ?><!--"></script>-->
<script type="text/javascript" src="<?php echo base_url('assets/custom/js/scripts/excel-gen.js'); ?>"></script>
<script type="text/javascript">
    var commData = [], excel = "", table = "";
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
        loadingStop();

        $('.show-rpt').click(showRpt);

        $("#branch_code").change(function () {
            var code = $(this).val();
            $("#comm_per").val(commData[code]);
        });

        function showRpt() {
            var type = parseInt($("input[name=rpt_type]:checked").val());
            if (!$("#branch_code").val()) {
                bootbox.alert("Please Select Branch");
                return false;
            }
            $('.rpt-box').removeClass('hide');
            $('#generate-excel').removeClass('hide');
            switch (type) {
                case  1:
                    $('.datewise').removeClass('hide');
                    $('.salescomm').addClass('hide');
                    $('.salesret').addClass('hide');
                    $('.comm').addClass('hide');
                    $('.salessum').addClass('hide');
                    dateWiseRpt();
                    break;
                case  2:
                    $('.datewise').addClass('hide');
                    $('.salescomm').removeClass('hide');
                    $('.salesret').addClass('hide');
                    $('.comm').addClass('hide');
                    $('.salessum').addClass('hide');
                    salesCommRpt();
                    break;
                case  3:
                    $('.datewise').addClass('hide');
                    $('.salescomm').addClass('hide');
                    $('.salesret').removeClass('hide');
                    $('.comm').addClass('hide');
                    $('.salessum').addClass('hide');
                    salesRetRpt();
                    break;
                case  4:
                    $('.datewise').addClass('hide');
                    $('.salescomm').addClass('hide');
                    $('.salesret').addClass('hide');
                    $('.comm').removeClass('hide');
                    $('.salessum').addClass('hide');
                    commRpt();
                    break;
                case  5:
                    $('.datewise').addClass('hide');
                    $('.salescomm').addClass('hide');
                    $('.salesret').addClass('hide');
                    $('.comm').addClass('hide');
                    $('.salessum').removeClass('hide');
                    salesSumRpt();
                    break;
                default:
                    $('.datewise').addClass('hide');
                    $('.salescomm').addClass('hide');
                    $('.salesret').addClass('hide');
                    $('.comm').addClass('hide');
                    $('.salessum').addClass('hide');
                    bootbox.alert("Please Select Report Type");
                    break;
            }
        }

        function loadingStart() {
            $('.overlay').show();
        }

        function loadingStop() {
            $('.overlay').hide();
        }

        function dateWiseRpt() {

            loadingStart();

            var _fromDate = $('#from_date').val();
            var _toDate = $('#to_date').val();
            var dateLabel = "From Date : " + _fromDate + " - " + _toDate;
            _fromDate = _fromDate.split('/');
            _toDate = _toDate.split('/');
            var fromDate = _fromDate[2] + '-' + _fromDate[1] + '-' + _fromDate[0];
            var toDate = _toDate[2] + '-' + _toDate[1] + '-' + _toDate[0];
            $('.date-label').text(dateLabel);
            var branchname = role_id == 1 ? $("#branch_code option:selected").text() : "<?php echo getSessionData('branch_name')?>";
            $('.branch-name').text(branchname);
            $.ajax({
                url: site_url + 'salesreport/getDateWiseRpt',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    fromDate: fromDate,
                    toDate: toDate,
                    branchCode: $("#branch_code").val()
                },
                success: function (response) {
                    var html = "";
                    var salesAmt = 0;
                    var salesCgstAmt = 0;
                    var salesSgstAmt = 0;
                    var salesOtherAmt = 0;
                    var salesTotAmt = 0;
                    var salesRetAmt = 0;
                    var salesRetCgstAmt = 0;
                    var salesRetSgstAmt = 0;
                    var salesRetOtherAmt = 0;
                    var salesRetTotAmt = 0;
                    var salesCount = 0;
                    var salesRetCount = 0;
                    var salesRetSt = false;
                    $.each(response, function (i, el) {
                        if (el.GROUPS == "sales") {
                            salesCount++;
                            salesAmt += parseFloat(el.AMTBT);
                            salesCgstAmt += parseFloat(el.CGST);
                            salesSgstAmt += parseFloat(el.SGST);
                            salesOtherAmt += parseFloat(el.OTHER);
                            salesTotAmt += parseFloat(el.TOTALAMT);
                        }
                        else if (el.GROUPS == "salesreturn") {
                            salesRetSt = true;
                            salesRetCount++;
                            salesRetAmt += parseFloat(el.AMTBT);
                            salesRetCgstAmt += parseFloat(el.CGST);
                            salesRetSgstAmt += parseFloat(el.SGST);
                            salesRetOtherAmt += parseFloat(el.OTHER);
                            salesRetTotAmt += parseFloat(el.TOTALAMT);
                        }
                        if (salesCount == 1) {
                            html += "<tr class='success fs-16'>";
                            html += "<td colspan='7' class='no-border'>";
                            html += "<strong>SALES(A)<strong>";
                            html += "</td>";
                            html += "<td class='no-border' style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "</tr>";
                        }
                        else if (salesRetSt && salesRetCount == 1) {
                            html += "<tr class=\"danger fs-17\">";
                            html += "<td>";
                            html += "&nbsp;";
                            html += "</td>";
                            html += "<td>";
                            html += "<strong>Group Total : (A)<strong>";
                            html += "</td>";
                            html += "<td>";
                            html += salesAmt.toFixed(2);
                            html += "</td>";
                            html += "<td>";
                            html += salesCgstAmt.toFixed(2);
                            html += "</td>";
                            html += "<td>";
                            html += salesSgstAmt.toFixed(2);
                            html += "</td>";
                            html += "<td>";
                            html += salesOtherAmt.toFixed(2);
                            html += "</td>";
                            html += "<td>";
                            html += salesTotAmt.toFixed(2);
                            html += "</td>";
                            html += "</tr>";

                            html += "<tr class=\"success fs-16\">";
                            html += "<td colspan='7'>";
                            html += "<strong>SALES RETURN(B)<strong>";
                            html += "</td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "</tr>";
                        }


                        html += "<tr>";
                        html += "<td>";
                        var billDt = new Date(el.TRBLDT);
                        html += billDt.toString("dd/MM/yyyy");
                        html += "</td>";

                        html += "<td>";
                        html += el.description;
                        html += "</td>";

                        html += "<td>";
                        html += el.AMTBT;
                        html += "</td>";

                        html += "<td>";
                        html += el.CGST;
                        html += "</td>";

                        html += "<td>";
                        html += el.SGST;
                        html += "</td>";

                        html += "<td>";
                        html += el.OTHER;
                        html += "</td>";

                        html += "<td>";
                        html += el.TOTALAMT;
                        html += "</td>";
                        html += "</tr>";
                    });
                    if (salesRetCount == 0) {
                        html += "<tr class=\"danger fs-17\">";
                        html += "<td>";
                        html += "&nbsp;";
                        html += "</td>";
                        html += "<td>";
                        html += "<strong>Group Total : (A)<strong>";
                        html += "</td>";
                        html += "<td>";
                        html += salesAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesCgstAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesSgstAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesOtherAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesTotAmt.toFixed(2);
                        html += "</td>";
                        html += "</tr>";
                    }
                    else if (salesRetCount > 0) {
                        html += "<tr class=\"danger fs-17\">";
                        html += "<td>";
                        html += "&nbsp;";
                        html += "</td>";
                        html += "<td>";
                        html += "<strong>Group Total : (B)<strong>";
                        html += "</td>";
                        html += "<td>";
                        html += salesRetAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRetCgstAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRetSgstAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRetOtherAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRetTotAmt.toFixed(2);
                        html += "</td>";
                        html += "</tr>";
                    }
                    html += "<tr class=\"warning fs-18\">";
                    html += "<td>";
                    html += "&nbsp;";
                    html += "</td>";
                    html += "<td>";
                    html += "<strong>Total : (A)-(B)<strong>";
                    html += "</td>";
                    html += "<td>";
                    html += salesAmt.toFixed(2) - salesRetAmt.toFixed(2);
                    html += "</td>";
                    html += "<td>";
                    html += parseFloat(salesCgstAmt - salesRetCgstAmt).toFixed(2);
                    html += "</td>";
                    html += "<td>";
                    html += parseFloat(salesSgstAmt - salesRetSgstAmt).toFixed(2);
                    html += "</td>";
                    html += "<td>";
                    html += salesOtherAmt.toFixed(2) - salesRetOtherAmt.toFixed(2);
                    html += "</td>";
                    html += "<td>";
                    html += salesTotAmt.toFixed(2) - salesRetTotAmt.toFixed(2);
                    html += "</td>";
                    html += "</tr>";

                    var info = $('.datewise-info');
                    if (table)
                        table.destroy();
                    $('tbody.datewise-body').html(html);
                    table = $('#datewise-table').DataTable({
                        'destroy': true,
                        'ordering': false,
                        'autowidth': false,
                        'searching': false,
                        'info': false,
                        dom: 'B<".rpt-info col-md-12">lfrtip',
                        buttons: [
                            /*'copy', 'csv', 'excel',
                            {
                                extend: 'pdf',
                                messageTop: function () {
                                    return info.html();
                                }
                            },*/
                            {
                                extend: 'print',
                                autoPrint: true,
                                customize: function (win) {
                                    $(win.document.body)
                                        .prepend(
                                            info.html()
                                        );
                                    $(win.document.body)
                                        .css('margin', '10px');
                                }
                            }
                        ]
                    });
                    table.draw();

                    $('.rpt-info').html(info.html());
                    info.remove();
                    /*$.fn.tableExport.defaultFilename = 'Datewise Summary Report';
                    $('#datewise-table').tableExport({
                        formats: ["xls", "xlsx"],
                        filename: 'Datewise Summary Report',
                        headers: true,
                        footers: true,
                        bootstrap: true,
                        position: "top",
                        trimWhitespace: true
                    });*/
                    excel = new ExcelGen({
                        "src_id": "datewise-table",
                        "show_header": true,
                        "author": "TRYLO",
                        "file_name": "Datewise Summary Report.xlsx",
                        "column_formats": ["19"]
                    });
                },
                complete: function () {
                    loadingStop();
                }
            });
        }

        $("#generate-excel").click(function () {
            excel.generate();
        });

        function salesCommRpt() {
            loadingStart();

            var _fromDate = $('#from_date').val();
            var _toDate = $('#to_date').val();
            var dateLabel = "From Date : " + _fromDate + " - " + _toDate;
            _fromDate = _fromDate.split('/');
            _toDate = _toDate.split('/');
            var fromDate = _fromDate[2] + '-' + _fromDate[1] + '-' + _fromDate[0];
            var toDate = _toDate[2] + '-' + _toDate[1] + '-' + _toDate[0];
            $('.date-label').text(dateLabel);
            var branchname = role_id == 1 ? $("#branch_code option:selected").text() : "<?php echo getSessionData('branch_name')?>";
            $('.branch-name').text(branchname);

            $.ajax({
                url: site_url + 'salesreport/getSalesCommRpt',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    fromDate: fromDate,
                    toDate: toDate,
                    branchCode: $("#branch_code").val()
                },
                success: function (response) {
                    console.log(response);
                    var html = "";
                    var grsAmt = 0;
                    var cgstAmt = 0;
                    var sgstAmt = 0;
                    var netAmt = 0;
                    var pointsRed = 0;
                    $.each(response, function (i, v) {
                        html += "<tr>";

                        html += "<td>";
                        html += v.description;
                        html += "</td>";

                        grsAmt += isNaN(parseFloat(v.AMTBT)) ? 0 : parseFloat(v.AMTBT);
                        html += "<td>";
                        html += (v.AMTBT) ? v.AMTBT : 0;
                        html += "</td>";

                        cgstAmt += isNaN(parseFloat(v.CGST)) ? 0 : parseFloat(v.CGST);
                        html += "<td>";
                        html += v.CGST ? v.CGST : 0;
                        html += "</td>";

                        sgstAmt += isNaN(parseFloat(v.SGST)) ? 0 : parseFloat(v.SGST);
                        html += "<td>";
                        html += v.SGST ? v.SGST : 0;
                        html += "</td>";

                        netAmt += isNaN(parseFloat(v.TOTALAMT)) ? 0 : parseFloat(v.TOTALAMT);
                        html += "<td>";
                        html += v.TOTALAMT ? v.TOTALAMT : 0;
                        html += "</td>";

                        html += "</tr>";
                        if (v.POINTSRED) {
                            pointsRed += isNaN(parseFloat(v.POINTSRED)) ? 0 : parseFloat(v.POINTSRED);
                        }
                    });

                    html += "<tr class='warning fs-18'>";

                    html += "<td>";
                    html += "<label>";
                    html += "Total: (A)-(B)";
                    html += "</label>";
                    html += "</td>";

                    html += "<td>";
                    html += "<label>";
                    html += grsAmt.toFixed(2);
                    html += "</label>";
                    html += "</td>";

                    html += "<td>";
                    html += "<label>";
                    html += cgstAmt.toFixed(2);
                    html += "</label>";
                    html += "</td>";

                    html += "<td>";
                    html += "<label>";
                    html += sgstAmt.toFixed(2);
                    html += "</label>";
                    html += "</td>";

                    html += "<td>";
                    html += "<label>";
                    html += netAmt.toFixed(2);
                    html += "</label>";
                    html += "</td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='4' class='text-right'>";
                    html += "<label>";
                    html += "Nett Amount Before GST : ";
                    html += "</label>";
                    html += "</td>";
                    html += "<td>";
                    html += "<label>";
                    html += grsAmt.toFixed(2);
                    html += "</label>";
                    html += "</td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='4' class='text-right'>";
                    html += "<label>";
                    html += "Less : <br>";
                    html += "Membership Point redeemed";
                    html += "</label>";
                    html += "</td>";
                    html += "<td>";
                    html += "<label>";
                    html += pointsRed.toFixed(2);
                    html += "</label>";
                    html += "</td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='4' class='text-right'>";
                    html += "<label>";
                    html += "Nett Commission eligible sales";
                    html += "</label>";
                    html += "</td>";
                    var netSales = parseFloat(grsAmt - pointsRed);
                    html += "<td>";
                    html += "<label>";
                    html += netSales.toFixed(2);
                    html += "</label>";
                    html += "</td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='4' class='text-right'>";
                    html += "<label>";
                    html += "Less Commission: <br>";
                    var commPer = parseFloat($("#comm_per").val());
                    html += "Commission " + commPer + "% :";
                    html += "</label>";
                    html += "</td>";
                    var comm = parseFloat((netSales * commPer) / 100);
                    html += "<td>";
                    html += "<label>";
                    html += comm.toFixed(2);
                    html += "</label>";
                    html += "</td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='4' class='text-right'>";
                    html += "<label>";
                    html += "Net Commission : ";
                    html += "</label>";
                    html += "</td>";
                    html += "<td>";
                    html += "<label>";
                    html += comm.toFixed(2);
                    html += "</label>";
                    html += "</td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='4' class='text-right'>";
                    html += "<label>";
                    var tdsPer = 5;
                    html += "Less TDS: <br>";
                    html += "TDS @ " + tdsPer + "%:";
                    html += "</label>";
                    html += "</td>";
                    var tds = parseFloat((comm * tdsPer) / 100);
                    html += "<td>";
                    html += "<label>";
                    html += tds.toFixed(2);
                    html += "</label>";
                    html += "</td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='4' class='text-right'>";
                    html += "<label>";
                    html += "Nett Commission Paid : ";
                    html += "</label>";
                    html += "</td>";
                    html += "<td>";
                    html += "<label>";
                    var netComm = comm - tds;
                    html += netComm.toFixed(2);
                    html += "</label>";
                    html += "</td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";
                    html += "<td style=\"display: none;border: none !important;\"></td>";

                    html += "</tr>";
                    if (table)
                        table.destroy();
                    $('.salescomm-body').html(html);
                    var info = $('.salescomm-info');

                    table = $('#salescomm-table').DataTable({
                        'destroy': true,
                        'ordering': false,
                        'autowidth': false,
                        'searching': false,
                        'info': false,
                        dom: 'B<".rpt-info col-md-12">lfrtip',
                        buttons: [
                            /*'copy', 'csv', 'excel',
                            {
                                extend: 'pdf',
                                messageTop: function () {
                                    return info.html();
                                }
                            },*/
                            {
                                extend: 'print',
                                autoPrint: true,
                                customize: function (win) {
                                    $(win.document.body)
                                        .prepend(
                                            info.html()
                                        );
                                    $(win.document.body)
                                        .css('margin', '5px')
                                        .css('margin-bottom', '0');
                                }
                            }
                        ]
                    });
                    table.draw();
                    $('.rpt-info').html(info.html());
                    info.remove();
                    excel = new ExcelGen({
                        "src_id": "salescomm-table",
                        "show_header": true,
                        "author": "TRYLO",
                        "file_name": "Sales Commission Report.xlsx"
                    });
                },
                complete: function () {
                    loadingStop();
                }
            });
        }

        function salesRetRpt() {
            loadingStart();

            var _fromDate = $('#from_date').val();
            var _toDate = $('#to_date').val();
            var dateLabel = "From Date : " + _fromDate + " - " + _toDate;
            _fromDate = _fromDate.split('/');
            _toDate = _toDate.split('/');
            var fromDate = _fromDate[2] + '-' + _fromDate[1] + '-' + _fromDate[0];
            var toDate = _toDate[2] + '-' + _toDate[1] + '-' + _toDate[0];
            $('.date-label').text(dateLabel);
            var branchname = role_id == 1 ? $("#branch_code option:selected").text() : "<?php echo getSessionData('branch_name')?>";
            $('.branch-name').text(branchname);
            $.ajax({
                url: site_url + 'salesreport/getSalesRetRpt',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    fromDate: fromDate,
                    toDate: toDate,
                    branchCode: $("#branch_code").val()
                },
                success: function (response) {
                    var html = "";
                    var salesGrsAmt = 0;
                    var salesDisAmt = 0;
                    var salesTaxAmt = 0;
                    var salesCgstAmt = 0;
                    var salesSgstAmt = 0;
                    var salesTotAmt = 0;
                    var salesRndAmt = 0;
                    var salesOtherAmt = 0;
                    var salesNetAmt = 0;
                    var salesRetGrsAmt = 0;
                    var salesRetDisAmt = 0;
                    var salesRetTaxAmt = 0;
                    var salesRetCgstAmt = 0;
                    var salesRetSgstAmt = 0;
                    var salesRetTotAmt = 0;
                    var salesRetRndAmt = 0;
                    var salesRetOtherAmt = 0;
                    var salesRetNetAmt = 0;
                    var salesCount = 0;
                    var salesRetCount = 0;
                    var salesRetSt = false;

                    $.each(response, function (i, el) {
                        if (el.GROUPS == "sales") {
                            salesCount++;
                            salesGrsAmt += parseFloat(el.GROSS);
                            salesDisAmt += parseFloat(el.DISC);
                            salesTaxAmt += parseFloat(el.AMTBT);
                            salesCgstAmt += parseFloat(el.CGST);
                            salesSgstAmt += parseFloat(el.SGST);
                            salesTotAmt += parseFloat(el.TOTAL);
                            salesOtherAmt += parseFloat(el.OTHER);
                            salesRndAmt += parseFloat(el.ROUNDOFF);
                            salesNetAmt += parseFloat(el.TOTALAMT);
                        }
                        else if (el.GROUPS == "salesreturn") {
                            salesRetSt = true;
                            salesRetCount++;
                            salesRetGrsAmt += parseFloat(el.GROSS);
                            salesRetDisAmt += parseFloat(el.DISC);
                            salesRetTaxAmt += parseFloat(el.AMTBT);
                            salesRetCgstAmt += parseFloat(el.CGST);
                            salesRetSgstAmt += parseFloat(el.SGST);
                            salesRetTotAmt += parseFloat(el.TOTAL);
                            salesRetOtherAmt += parseFloat(el.OTHER);
                            salesRetRndAmt += parseFloat(el.ROUNDOFF);
                            salesRetNetAmt += parseFloat(el.TOTALAMT);
                        }
                        if (salesCount == 1) {
                            html += "<tr class='success fs-16'>";
                            html += "<td colspan='13'>";
                            html += "<strong>SALES(A)<strong>";
                            html += "</td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "</tr>";
                        }
                        else if (salesRetSt && salesRetCount == 1) {
                            html += "<tr class=\"danger fs-17\">";
                            html += "<td>";
                            html += "&nbsp;";
                            html += "</td>";
                            html += "<td>";
                            html += "&nbsp;";
                            html += "</td>";
                            html += "<td>";
                            html += "<strong>Group Total : (A)<strong>";
                            html += "</td>";
                            html += "<td>";
                            html += "</td>";
                            html += "<td>";
                            html += salesGrsAmt.toFixed(2);
                            html += "</td>";
                            html += "<td>";
                            html += salesDisAmt.toFixed(2);
                            html += "</td>";
                            html += "<td>";
                            html += salesTaxAmt.toFixed(2);
                            html += "</td>";
                            html += "<td>";
                            html += salesCgstAmt.toFixed(2);
                            html += "</td>";
                            html += "<td>";
                            html += salesSgstAmt.toFixed(2);
                            html += "</td>";
                            html += "<td>";
                            html += salesTotAmt.toFixed(2);
                            html += "</td>";
                            html += "<td>";
                            html += salesOtherAmt.toFixed(2);
                            html += "</td>";
                            html += "<td>";
                            html += salesRndAmt.toFixed(2);
                            html += "</td>";
                            html += "<td>";
                            html += salesNetAmt.toFixed(2);
                            html += "</td>";
                            html += "</tr>";

                            html += "<tr class=\"success fs-16\">";
                            html += "<td colspan='13'>";
                            html += "<strong>SALES RETURN(B)<strong>";
                            html += "</td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "</tr>";
                        }


                        html += "<tr>";
                        html += "<td>";
                        html += el.TRBLNO;
                        html += "</td>";

                        html += "<td>";
                        var billDt = new Date(el.TRBLDT);
                        html += billDt.toString("dd/MM/yyyy");
                        html += "</td>";

                        html += "<td>";
                        html += el.CUSTOMER;
                        html += "</td>";

                        var type = "";
                        if (el.TYPE == 1) type = "CASH";
                        else if (el.TYPE == 2) type = "CARD";
                        else if (el.TYPE == 3) type = "MOBILE";
                        else if (el.TYPE == 4) type = "";
                        html += "<td>";
                        html += type;
                        html += "</td>";

                        html += "<td>";
                        html += el.GROSS;
                        html += "</td>";

                        html += "<td>";
                        html += el.DISC;
                        html += "</td>";


                        html += "<td>";
                        html += el.AMTBT;
                        html += "</td>";


                        html += "<td>";
                        html += el.CGST;
                        html += "</td>";

                        html += "<td>";
                        html += el.SGST;
                        html += "</td>";

                        html += "<td>";
                        html += el.TOTAL;
                        html += "</td>";

                        html += "<td>";
                        html += el.OTHER;
                        html += "</td>";

                        html += "<td>";
                        html += el.ROUNDOFF;
                        html += "</td>";

                        html += "<td>";
                        html += el.TOTALAMT;
                        html += "</td>";
                        html += "</tr>";
                    });
                    if (salesRetCount == 0) {
                        html += "<tr class=\"danger fs-17\">";
                        html += "<td>";
                        html += "&nbsp;";
                        html += "</td>";
                        html += "<td>";
                        html += "&nbsp;";
                        html += "</td>";
                        html += "<td>";
                        html += "<strong>Group Total : (A)<strong>";
                        html += "</td>";
                        html += "<td>";
                        html += "</td>";
                        html += "<td>";
                        html += salesGrsAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesDisAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesTaxAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesCgstAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesSgstAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesTotAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesOtherAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRndAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesNetAmt.toFixed(2);
                        html += "</td>";
                        html += "</tr>";
                    }
                    else if (salesRetCount > 0) {
                        html += "<tr class=\"danger fs-17\">";
                        html += "<td>";
                        html += "&nbsp;";
                        html += "</td>";
                        html += "<td>";
                        html += "&nbsp;";
                        html += "</td>";
                        html += "<td>";
                        html += "<strong>Group Total : (B)<strong>";
                        html += "</td>";
                        html += "<td>";
                        html += "</td>";
                        html += "<td>";
                        html += salesRetGrsAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRetDisAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRetTaxAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRetCgstAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRetSgstAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRetTotAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRetOtherAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRetRndAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRetNetAmt.toFixed(2);
                        html += "</td>";
                        html += "</tr>";
                    }

                    var netTaxAmt = parseFloat(salesTaxAmt - salesRetTaxAmt);
                    html += "<tr class=\"warning fs-18\">";
                    html += "<td>";
                    html += "&nbsp;";
                    html += "</td>";
                    html += "<td>";
                    html += "&nbsp;";
                    html += "</td>";
                    html += "<td>";
                    html += "<strong>Total : (A)-(B)<strong>";
                    html += "</td>";
                    html += "<td>";
                    html += "</td>";
                    html += "<td>";
                    html += parseFloat(salesGrsAmt - salesRetGrsAmt).toFixed(2);
                    html += "</td>";
                    html += "<td>";
                    html += parseFloat(salesDisAmt - salesRetDisAmt).toFixed(2);
                    html += "</td>";
                    html += "<td>";
                    html += netTaxAmt.toFixed(2);
                    html += "</td>";
                    html += "<td>";
                    html += parseFloat(salesCgstAmt - salesRetCgstAmt).toFixed(2);
                    html += "</td>";
                    html += "<td>";
                    html += parseFloat(salesSgstAmt - salesRetSgstAmt).toFixed(2);
                    html += "</td>";
                    html += "<td>";
                    html += parseFloat(salesTotAmt - salesRetTotAmt).toFixed(2);
                    html += "</td>";
                    html += "<td>";
                    html += parseFloat(salesOtherAmt - salesRetOtherAmt).toFixed(2);
                    html += "</td>";
                    html += "<td>";
                    html += parseFloat(salesRndAmt - salesRetRndAmt).toFixed(2);
                    html += "</td>";
                    html += "<td>";
                    html += parseFloat(salesNetAmt - salesRetNetAmt).toFixed(2);
                    html += "</td>";
                    html += "</tr>";
                    if (table)
                        table.destroy();
                    $('tbody.salesret-body').html(html);
                    var info = $('.salesret-info');

                    table = $('#salesret-table').DataTable({
                        'destroy': true,
                        'ordering': false,
                        'autowidth': false,
                        'searching': false,
                        'info': false,
                        dom: 'B<".rpt-info col-md-12">lfrtip',
                        buttons: [
                            /*'copy', 'csv', 'excel',
                            {
                                extend: 'pdf',
                                messageTop: function () {
                                    return info.html();
                                }
                            },*/
                            {
                                extend: 'print',
                                autoPrint: true,
                                customize: function (win) {
                                    $(win.document.body)
                                        .prepend(
                                            info.html()
                                        );
                                    $(win.document.body)
                                        .css('margin', '10px');
                                }
                            }
                        ]
                    });
                    table.draw();
                    $('.rpt-info').html(info.html());
                    info.remove();
                    excel = new ExcelGen({
                        "src_id": "salesret-table",
                        "show_header": true,
                        "author": "TRYLO",
                        "file_name": "Sales and Return Register Report.xlsx",
                        "column_formats ": ["0", "19"]
                    });
                },
                complete: function () {
                    loadingStop();
                }
            });
        }

        function commRpt() {
            loadingStart();

            var _fromDate = $('#from_date').val();
            var _toDate = $('#to_date').val();
            var dateLabel = "From Date : " + _fromDate + " - " + _toDate;
            _fromDate = _fromDate.split('/');
            _toDate = _toDate.split('/');
            var fromDate = _fromDate[2] + '-' + _fromDate[1] + '-' + _fromDate[0];
            var toDate = _toDate[2] + '-' + _toDate[1] + '-' + _toDate[0];
            $('.date-label').text(dateLabel);
            var branchname = role_id == 1 ? $("#branch_code option:selected").text() : "<?php echo getSessionData('branch_name')?>";
            $('.branch-name').text(branchname);
            $.ajax({
                url: site_url + 'salesreport/getSalesRetRpt',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    fromDate: fromDate,
                    toDate: toDate,
                    branchCode: $("#branch_code").val()
                },
                success: function (response) {
                    var html = "";
                    var salesGrsAmt = 0;
                    var salesDisAmt = 0;
                    var salesTaxAmt = 0;
                    var salesCgstAmt = 0;
                    var salesSgstAmt = 0;
                    var salesTotAmt = 0;
                    var salesRndAmt = 0;
                    var salesOtherAmt = 0;
                    var salesNetAmt = 0;
                    var salesRetGrsAmt = 0;
                    var salesRetDisAmt = 0;
                    var salesRetTaxAmt = 0;
                    var salesRetCgstAmt = 0;
                    var salesRetSgstAmt = 0;
                    var salesRetTotAmt = 0;
                    var salesRetRndAmt = 0;
                    var salesRetOtherAmt = 0;
                    var salesRetNetAmt = 0;
                    var salesCount = 0;
                    var salesRetCount = 0;
                    var salesRetSt = false;

                    var pointsRed = 0;
                    $.each(response, function (i, el) {
                        if (el.GROUPS == "sales") {
                            salesCount++;
                            salesGrsAmt += parseFloat(el.GROSS);
                            salesDisAmt += parseFloat(el.DISC);
                            salesTaxAmt += parseFloat(el.AMTBT);
                            salesCgstAmt += parseFloat(el.CGST);
                            salesSgstAmt += parseFloat(el.SGST);
                            salesTotAmt += parseFloat(el.TOTAL);
                            salesOtherAmt += parseFloat(el.OTHER);
                            salesRndAmt += parseFloat(el.ROUNDOFF);
                            salesNetAmt += parseFloat(el.TOTALAMT);
                            if (el.POINTSRED) pointsRed += parseFloat(el.POINTSRED);
                        }
                        else if (el.GROUPS == "salesreturn") {
                            salesRetSt = true;
                            salesRetCount++;
                            salesRetGrsAmt += parseFloat(el.GROSS);
                            salesRetDisAmt += parseFloat(el.DISC);
                            salesRetTaxAmt += parseFloat(el.AMTBT);
                            salesRetCgstAmt += parseFloat(el.CGST);
                            salesRetSgstAmt += parseFloat(el.SGST);
                            salesRetTotAmt += parseFloat(el.TOTAL);
                            salesRetOtherAmt += parseFloat(el.OTHER);
                            salesRetRndAmt += parseFloat(el.ROUNDOFF);
                            salesRetNetAmt += parseFloat(el.TOTALAMT);
                        }
                        if (salesCount == 1) {
                            html += "<tr class='success fs-16'>";
                            html += "<td colspan='13'>";
                            html += "<strong>SALES(A)<strong>";
                            html += "</td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "</tr>";
                        }
                        else if (salesRetSt && salesRetCount == 1) {
                            html += "<tr class=\"danger fs-17\">";
                            html += "<td>";
                            html += "&nbsp;";
                            html += "</td>";
                            html += "<td>";
                            html += "&nbsp;";
                            html += "</td>";
                            html += "<td>";
                            html += "<strong>Group Total : (A)<strong>";
                            html += "</td>";
                            html += "<td>";
                            html += "</td>";
                            html += "<td>";
                            html += salesGrsAmt.toFixed(2);
                            html += "</td>";
                            html += "<td>";
                            html += salesDisAmt.toFixed(2);
                            html += "</td>";
                            html += "<td>";
                            html += salesTaxAmt.toFixed(2);
                            html += "</td>";
                            html += "<td>";
                            html += salesCgstAmt.toFixed(2);
                            html += "</td>";
                            html += "<td>";
                            html += salesSgstAmt.toFixed(2);
                            html += "</td>";
                            html += "<td>";
                            html += salesTotAmt.toFixed(2);
                            html += "</td>";
                            html += "<td>";
                            html += salesOtherAmt.toFixed(2);
                            html += "</td>";
                            html += "<td>";
                            html += salesRndAmt.toFixed(2);
                            html += "</td>";
                            html += "<td>";
                            html += salesNetAmt.toFixed(2);
                            html += "</td>";
                            html += "</tr>";

                            html += "<tr class=\"success fs-16\">";
                            html += "<td colspan='13'>";
                            html += "<strong>SALES RETURN(B)<strong>";
                            html += "</td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "<td style=\"display: none;border: none !important;\"></td>";
                            html += "</tr>";
                        }


                        html += "<tr>";
                        html += "<td>";
                        html += el.TRBLNO;
                        html += "</td>";

                        html += "<td>";
                        var billDt = new Date(el.TRBLDT);
                        html += billDt.toString("dd/MM/yyyy");
                        html += "</td>";

                        html += "<td>";
                        html += el.CUSTOMER;
                        html += "</td>";

                        var type = "";
                        if (el.TYPE == 1) type = "CASH";
                        else if (el.TYPE == 2) type = "CARD";
                        else if (el.TYPE == 3) type = "MOBILE";
                        else if (el.TYPE == 4) type = "";
                        html += "<td>";
                        html += type;
                        html += "</td>";

                        html += "<td>";
                        html += el.GROSS;
                        html += "</td>";

                        html += "<td>";
                        html += el.DISC;
                        html += "</td>";


                        html += "<td>";
                        html += el.AMTBT;
                        html += "</td>";


                        html += "<td>";
                        html += el.CGST;
                        html += "</td>";

                        html += "<td>";
                        html += el.SGST;
                        html += "</td>";

                        html += "<td>";
                        html += el.TOTAL;
                        html += "</td>";

                        html += "<td>";
                        html += el.OTHER;
                        html += "</td>";

                        html += "<td>";
                        html += el.ROUNDOFF;
                        html += "</td>";

                        html += "<td>";
                        html += el.TOTALAMT;
                        html += "</td>";
                        html += "</tr>";
                    });
                    if (salesRetCount == 0) {
                        html += "<tr class=\"danger fs-17\">";
                        html += "<td>";
                        html += "&nbsp;";
                        html += "</td>";
                        html += "<td>";
                        html += "&nbsp;";
                        html += "</td>";
                        html += "<td>";
                        html += "<strong>Group Total : (A)<strong>";
                        html += "</td>";
                        html += "<td>";
                        html += "</td>";
                        html += "<td>";
                        html += salesGrsAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesDisAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesTaxAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesCgstAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesSgstAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesTotAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesOtherAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRndAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesNetAmt.toFixed(2);
                        html += "</td>";
                        html += "</tr>";
                    }
                    else if (salesRetCount > 0) {
                        html += "<tr class=\"danger fs-17\">";
                        html += "<td>";
                        html += "&nbsp;";
                        html += "</td>";
                        html += "<td>";
                        html += "&nbsp;";
                        html += "</td>";
                        html += "<td>";
                        html += "<strong>Group Total : (B)<strong>";
                        html += "</td>";
                        html += "<td>";
                        html += "</td>";
                        html += "<td>";
                        html += salesRetGrsAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRetDisAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRetTaxAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRetCgstAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRetSgstAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRetTotAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRetOtherAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRetRndAmt.toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        html += salesRetNetAmt.toFixed(2);
                        html += "</td>";
                        html += "</tr>";
                    }

                    var netTaxAmt = parseFloat(salesTaxAmt - salesRetTaxAmt);
                    html += "<tr class=\"warning fs-18\">";
                    html += "<td>";
                    html += "&nbsp;";
                    html += "</td>";
                    html += "<td>";
                    html += "&nbsp;";
                    html += "</td>";
                    html += "<td>";
                    html += "<strong>Total : (A)-(B)<strong>";
                    html += "</td>";
                    html += "<td>";
                    html += "</td>";
                    html += "<td>";
                    html += parseFloat(salesGrsAmt - salesRetGrsAmt).toFixed(2);
                    html += "</td>";
                    html += "<td>";
                    html += parseFloat(salesDisAmt - salesRetDisAmt).toFixed(2);
                    html += "</td>";
                    html += "<td>";
                    html += netTaxAmt.toFixed(2);
                    html += "</td>";
                    html += "<td>";
                    html += parseFloat(salesCgstAmt - salesRetCgstAmt).toFixed(2);
                    html += "</td>";
                    html += "<td>";
                    html += parseFloat(salesSgstAmt - salesRetSgstAmt).toFixed(2);
                    html += "</td>";
                    html += "<td>";
                    html += parseFloat(salesTotAmt - salesRetTotAmt).toFixed(2);
                    html += "</td>";
                    html += "<td>";
                    html += parseFloat(salesOtherAmt - salesRetOtherAmt).toFixed(2);
                    html += "</td>";
                    html += "<td>";
                    html += parseFloat(salesRndAmt - salesRetRndAmt).toFixed(2);
                    html += "</td>";
                    html += "<td>";
                    html += parseFloat(salesNetAmt - salesRetNetAmt).toFixed(2);
                    html += "</td>";
                    html += "</tr>";


                    html += "<tr>";

                    html += "<td colspan='2' class='text-center'>";
                    html += "<label>";
                    html += "Total Sales Value Before Tax";
                    html += "</label>";
                    html += "</td>";

                    html += "<td style=\"display: none;border: none !important;\"></td>";

                    html += "<td colspan='2' class='text-center'>";
                    html += "<label>";
                    html += "Less Redeemed Point";
                    html += "</label>";
                    html += "</td>";

                    html += "<td style=\"display: none;border: none !important;\"></td>";

                    html += "<td colspan='2' class='text-center'>";
                    html += "<label>";
                    html += "Total Sales Value";
                    html += "</label>";
                    html += "</td>";

                    html += "<td style=\"display: none;border: none !important;\"></td>";
                    var commPer = parseFloat($("#comm_per").val());
                    html += "<td colspan='2' class='text-center'>";
                    html += "<label>";
                    html += "Commission Amount @ " + commPer + "%";
                    html += "</label>";
                    html += "</td>";

                    html += "<td style=\"display: none;border: none !important;\"></td>";
                    var tds = 5;
                    html += "<td colspan='2' class='text-center'>";
                    html += "<label>";
                    html += "TDS on Comm Amount @ " + tds + "%";
                    html += "</label>";
                    html += "</td>";

                    html += "<td style=\"display: none;border: none !important;\"></td>";

                    html += "<td colspan='3' class='text-center'>";
                    html += "<label>";
                    html += "Net Commission Payable";
                    html += "</label>";
                    html += "</td>";

                    html += "<td style=\"display: none;border: none !important;\"></td>";

                    html += "<td style=\"display: none;border: none !important;\"></td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='2' class='text-center'>";
                    html += "<label>";
                    html += netTaxAmt.toFixed(2);
                    html += "</label>";
                    html += "</td>";

                    html += "<td style=\"display: none;border: none !important;\"></td>";

                    html += "<td colspan='2' class='text-center'>";
                    html += "<label>";
                    html += pointsRed.toFixed(2);
                    html += "</label>";
                    html += "</td>";

                    html += "<td style=\"display: none;border: none !important;\"></td>";

                    var grsSales = netTaxAmt - pointsRed;
                    html += "<td colspan='2' class='text-center'>";
                    html += "<label>";
                    html += grsSales.toFixed(2);
                    html += "</label>";
                    html += "</td>";

                    html += "<td style=\"display: none;border: none !important;\"></td>";
                    var comm = parseFloat((grsSales * commPer) / 100);
                    html += "<td colspan='2' class='text-center'>";
                    html += "<label>";
                    html += comm.toFixed(2);
                    html += "</label>";
                    html += "</td>";

                    html += "<td style=\"display: none;border: none !important;\"></td>";
                    var tdsAmt = parseFloat((comm * tds) / 100);
                    html += "<td colspan='2' class='text-center'>";
                    html += "<label>";
                    html += tdsAmt.toFixed(2);
                    html += "</label>";
                    html += "</td>";

                    html += "<td style=\"display: none;border: none !important;\"></td>";

                    var netComm = comm - tdsAmt;
                    html += "<td colspan='3' class='text-center'>";
                    html += "<label>";
                    html += netComm.toFixed(2);
                    html += "</label>";
                    html += "</td>";

                    html += "<td style=\"display: none;border: none !important;\"></td>";

                    html += "<td style=\"display: none;border: none !important;\"></td>";

                    html += "</tr>";
                    if (table)
                        table.destroy();
                    $('tbody.comm-body').html(html);

                    var info = $('.comm-info');

                    table = $('#comm-table').DataTable({
                        'destroy': true,
                        'ordering': false,
                        'autowidth': false,
                        'searching': false,
                        'info': false,
                        dom: 'B<".rpt-info col-md-12">lfrtip',
                        buttons: [
                            /*'copy', 'csv', 'excel',
                            {
                                extend: 'pdf',
                                messageTop: function () {
                                    return info.html();
                                }
                            },*/
                            {
                                extend: 'print',
                                autoPrint: true,
                                customize: function (win) {
                                    $(win.document.body)
                                        .prepend(
                                            info.html()
                                        );
                                    $(win.document.body)
                                        .css('margin', '10px');
                                }
                            }
                        ]
                    });
                    table.draw();
                    $('.rpt-info').html(info.html());
                    info.remove();
                    excel = new ExcelGen({
                        "src_id": "comm-table",
                        "show_header": true,
                        "author": "TRYLO",
                        "file_name": "Commission Report.xlsx",
                        "column_formats ": ["0", "19"]
                    });
                },
                complete: function () {
                    loadingStop();
                }
            });
        }

        function salesSumRpt() {
            loadingStart();

            var _fromDate = $('#from_date').val();
            var _toDate = $('#to_date').val();
            var dateLabel = "From Date : " + _fromDate + " - " + _toDate;
            _fromDate = _fromDate.split('/');
            _toDate = _toDate.split('/');
            var fromDate = _fromDate[2] + '-' + _fromDate[1] + '-' + _fromDate[0];
            var toDate = _toDate[2] + '-' + _toDate[1] + '-' + _toDate[0];
            $('.date-label').text(dateLabel);
            var branchname = role_id == 1 ? $("#branch_code option:selected").text() : "<?php echo getSessionData('branch_name')?>";
            $('.branch-name').text(branchname);
            $.ajax({
                url: site_url + 'salesreport/getSalesSumRpt',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    fromDate: fromDate,
                    toDate: toDate,
                    branchCode: $("#branch_code").val()
                },
                success: function (response) {
                    var html = "";
                    var salesGrsAmt = 0;
                    var salesDisAmt = 0;
                    var salesTaxAmt = 0;
                    var salesGstAmt = 0;
                    var salesTotAmt = 0;
                    var cashAmt = 0;
                    var debitAmt = 0;
                    var cardAmt = 0;
                    var mobileAmt = 0;
                    var totQty = 0;
                    var pointsRed = 0;
                    var pointsBill = [];
                    var advance = 0;
                    var salesRetAmt = parseFloat(response.salesRetData.TOTALAMT);
                    var adjCNAmt = parseFloat(response.adjData.ADJCN);
                    salesRetAmt = isNaN(salesRetAmt) ? 0 : salesRetAmt;
                    adjCNAmt = isNaN(adjCNAmt) ? 0 : adjCNAmt;
                    $.each(response.salesData, function (i, v) {
                        html += "<tr>";

                        html += "<td>";
                        html += v.PRDNM;
                        html += "</td>";

                        totQty += parseInt(v.qty);
                        html += "<td>";
                        html += v.qty;
                        html += "</td>";

                        salesGrsAmt += parseFloat(v.GROSS);
                        html += "<td>";
                        html += v.GROSS;
                        html += "</td>";

                        salesDisAmt += parseFloat(v.DISC);
                        html += "<td>";
                        html += v.DISC;
                        html += "</td>";

                        salesTaxAmt += parseFloat(v.AMTBT);
                        html += "<td>";
                        html += v.AMTBT;
                        html += "</td>";

                        salesGstAmt += parseFloat(v.GST);
                        html += "<td>";
                        html += v.GST;
                        html += "</td>";

                        salesTotAmt += parseFloat(v.TOTAL);
                        html += "<td>";
                        html += v.TOTAL;
                        html += "</td>";

                        html += "</tr>";

                        if (v.POINTSRED) {
                            pointsRed += parseFloat(v.POINTSRED);
                            pointsBill.push(v.TRBLNO);
                        }
                        if (v.ADVANCE)
                            advance += parseFloat(v.ADVANCE);
                        if (v.CASH) {
                            cashAmt += parseFloat(v.CASH);
                        }
                        if (v.DEBIT) {
                            debitAmt += parseFloat(v.DEBIT);
                        }
                        if (v.CARD) {
                            cardAmt += parseFloat(v.CARD);
                        }
                        if (v.MOBILE) {
                            mobileAmt += parseFloat(v.MOBILE);
                        }
                    });
                    html += "<tr>";

                    html += "<td>";
                    html += "<label>";
                    html += "Total Item Discount";
                    html += "</label>";
                    html += "</td>";

                    html += "<td>";
                    html += totQty;
                    html += "</td>";

                    html += "<td>";
                    html += salesGrsAmt.toFixed(2);
                    html += "</td>";

                    html += "<td>";
                    html += salesDisAmt.toFixed(2);
                    html += "</td>";

                    html += "<td>";
                    html += salesTaxAmt.toFixed(2);
                    html += "</td>";

                    html += "<td>";
                    html += salesGstAmt.toFixed(2);
                    html += "</td>";

                    html += "<td>";
                    html += salesTotAmt.toFixed(2);
                    html += "</td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='2' class='text-right'>";
                    html += "<label>";
                    html += "Total Gross: ";
                    html += "</label>";
                    html += "</td>";

                    html += "<td class='text-right'>";
                    html += salesGrsAmt.toFixed(2);
                    html += "</td>";

                    html += "<td colspan='4' class='text-center'>";
                    html += "<label>";
                    html += "Credit Note Details: ";
                    html += "</label>";
                    html += "</td>";

                    /*html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";*/

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='2' class='text-right'>";
                    html += "<label>";
                    html += "Less Discount: ";
                    html += "</label>";
                    html += "</td>";

                    html += "<td class='text-right'>";
                    html += salesDisAmt.toFixed(2);
                    html += "</td>";

                    html += "<td colspan='2'>";
                    html += "<label>";
                    html += "Today's CN (Not Refunded): ";
                    html += "</label>";
                    html += "</td>";

                    /*html += "<td>";
                    html += "</td>";*/

                    html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='2' class='text-right'>";
                    html += "<label>";
                    html += "Total: ";
                    html += "</label>";
                    html += "</td>";

                    html += "<td class='text-right'>";
                    html += salesTaxAmt.toFixed(2);
                    html += "</td>";

                    html += "<td colspan='2'>";
                    html += "<label>";
                    html += "Previous CN: ";
                    html += "</label>";
                    html += "</td>";

                    /*html += "<td>";
                    html += "</td>";*/

                    html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='2' class='text-right'>";
                    html += "<label>";
                    html += "Less CN (Not Refunded Adjusted in Next Bill) :";
                    html += "</label>";
                    html += "</td>";

                    html += "<td class='text-right'>";
                    html += (adjCNAmt) ? adjCNAmt.toFixed(2) : "";
                    html += "</td>";

                    html += "<td colspan='2'>";
                    html += "<label>";
                    html += "Today's CN (Refunded): ";
                    html += "</label>";
                    html += "</td>";

                    /*html += "<td>";
                    html += "</td>";*/

                    html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='2' class='text-right'>";
                    html += "<label>";
                    html += "Less CN (Refunded) :";
                    html += "</label>";
                    html += "</td>";

                    html += "<td class='text-right'>";
                    html += salesRetAmt.toFixed(2);
                    html += "</td>";

                    html += "<td colspan='2'>";
                    html += "<label>";
                    html += "Total: ";
                    html += "</label>";
                    html += "</td>";

                    /*html += "<td>";
                    html += "</td>";*/

                    html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='2' class='text-right'>";
                    html += "<label>";
                    html += "Less Card Redeem :";
                    html += "</label>";
                    html += "</td>";

                    html += "<td class='text-right'>";
                    html += pointsRed.toFixed(2);
                    html += "</td>";

                    html += "<td colspan='4' class='text-center'>";
                    html += "<label>";
                    html += "Details of Previous CN [ CN No(CnAmt) ]: ";
                    html += "</label>";
                    html += "</td>";

                    /*html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";*/

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='2' class='text-right'>";
                    html += "<label>";
                    html += "Taxable Amount (Inclusive) :";
                    html += "</label>";
                    html += "</td>";

                    var netTaxAmt = salesTaxAmt - salesRetAmt - pointsRed - adjCNAmt;
                    html += "<td class='text-right'>";
                    html += netTaxAmt.toFixed(2);
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='3' class='text-center'>";
                    html += "<label>";
                    html += "INCLUSIVE TAX BIFURCATION";
                    html += "</label>";
                    html += "</td>";

                    html += "<td colspan='2'>";
                    html += "<label>";
                    html += "Today's CN Not Adjusted: ";
                    html += "</label>";
                    html += "</td>";

                    /*html += "<td>";
                    html += "</td>";*/

                    html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='2' class='text-right'>";
                    html += "<label>";
                    html += "Gross Amount Before Tax :";
                    html += "</label>";
                    html += "</td>";

                    html += "<td class='text-right'>";
                    html += salesTaxAmt.toFixed(2);
                    html += "</td>";

                    html += "<td colspan='4' class='text-center'>";
                    html += "<label>";
                    html += "Details of Not Adjusted CN: ";
                    html += "</label>";
                    html += "</td>";

                    /*html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";*/

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='2' class='text-right'>";
                    html += "<label>";
                    html += "CGST :";
                    html += "</label>";
                    html += "</td>";

                    html += "<td class='text-right'>";
                    html += parseFloat(salesGstAmt / 2).toFixed(2);
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='2' class='text-right'>";
                    html += "<label>";
                    html += "SGST :";
                    html += "</label>";
                    html += "</td>";

                    html += "<td class='text-right'>";
                    html += parseFloat(salesGstAmt / 2).toFixed(2);
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='2' class='text-right'>";
                    html += "<label>";
                    html += "Net Amount After Tax :";
                    html += "</label>";
                    html += "</td>";

                    html += "<td class='text-right'>";
                    html += salesTotAmt.toFixed(2);
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='2' class='text-right'>";
                    html += "<label>";
                    html += "Less Advance :";
                    html += "</label>";
                    html += "</td>";

                    html += "<td class='text-right'>";
                    html += advance.toFixed(2);
                    html += "</td>";

                    html += "<td colspan='2'>";
                    html += "<label>";
                    html += "Total Debit: ";
                    html += "</label>";
                    html += "</td>";

                    /*html += "<td>";
                    html += "</td>";*/

                    html += "<td>";
                    html += debitAmt.toFixed(2);
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td colspan='2' class='text-right'>";
                    html += "<label>";
                    html += "Nett Bill Amount :";
                    html += "</label>";
                    html += "</td>";

                    html += "<td class='text-right'>";
                    var netBillAmt = salesTotAmt + advance;
                    html += netBillAmt.toFixed(2);
                    html += "</td>";

                    html += "<td colspan='2'>";
                    html += "<label>";
                    html += "Total Mobile Payment: ";
                    html += "</label>";
                    html += "</td>";

                    /*html += "<td>";
                    html += "</td>";*/

                    html += "<td>";
                    html += mobileAmt.toFixed(2);
                    html += "</td>";

                    html += "<td>";
                    html += "</td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td class='text-right'>";
                    html += "<label>";
                    html += "Add LoyaltyCard: ";
                    html += "</label>";
                    html += "</td>";

                    html += "<td colspan='2'>";
                    html += "</td>";

                    html += "<td>";
                    html += "<label>";
                    html += "Total Cash: ";
                    html += "</label>";
                    html += "</td>";

                    html += "<td>";
                    html += cashAmt.toFixed(2);
                    html += "</td>";

                    html += "<td>";
                    html += "<label>";
                    html += "Total Card: ";
                    html += "</label>";
                    html += "</td>";

                    html += "<td>";
                    html += cardAmt.toFixed(2);
                    html += "</td>";

                    html += "</tr>";

                    html += "<tr>";

                    html += "<td class='text-right'>";
                    html += "<label>";
                    html += "Redeem Point Bill: ";
                    html += "</label>";
                    html += "</td>";

                    html += "<td colspan='6'>";
                    html += pointsBill.join(',');
                    html += "</td>";
                    html += "</tr>";
                    $('.salessum-body').html(html);
                    console.log(response);
                },
                complete: function () {
                    loadingStop();
                }
            });
        }
    });
</script>
