<?php $this->load->view('include/template/common_header'); ?>
<link rel="stylesheet"
      href="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
<style>
    @media print {
        @page {
            margin: 0mm;  /* this affects the margin in the printer settings */
        }
    }

    .no-border {
        border: none !important;
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
                            <tr>
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
                            <tr>
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
            </div>
            <div class="overlay">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('include/template/common_footer'); ?>
<!--<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>-->
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
<script type="text/javascript">
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
                        });
                    }
                    $("#branch_code").html(html);
                }
            })
        }
        loadingStop();
        $('.show-rpt').click(showRpt);

        function showRpt() {
            var type = parseInt($("input[name=rpt_type]:checked").val());
            if (!$("#branch_code").val()) {
                bootbox.alert("Please Select Branch");
                return false;
            }
            $('.rpt-box').removeClass('hide');
            switch (type) {
                case  1:
                    $('.datewise').removeClass('hide');
                    $('.salesret').addClass('hide');
                    dateWiseRpt();
                    break;
                case  2:
                    $('.datewise').addClass('hide');
                    $('.salesret').addClass('hide');
                    salesCommRpt();
                    break;
                case  3:
                    $('.datewise').addClass('hide');
                    $('.salesret').removeClass('hide');
                    salesRetRpt();
                    break;
                case  4:
                    $('.datewise').addClass('hide');
                    $('.salesret').addClass('hide');
                    commRpt();
                    break;
                case  5:
                    $('.datewise').addClass('hide');
                    $('.salesret').addClass('hide');
                    salesSumRpt();
                    break;
                default:
                    $('.datewise').addClass('hide');
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
                            html += "<tr>";
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
                            html += "<tr>";
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

                            html += "<tr>";
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
                        html += "<tr>";
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
                        html += "<tr>";
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
                    html += "<tr>";
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
                    $('tbody.datewise-body').html(html);
                    var info = $('.datewise-info');

                    $('#datewise-table').DataTable({
                        'destroy': true,
                        'ordering': false,
                        'autowidth': false,
                        'searching': false,
                        'info': false,
                        dom: 'B<".rpt-info col-md-12">frtip',
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
                    $('.rpt-info').html(info.html());
                    info.remove();
                },
                complete: function () {
                    loadingStop();
                }
            });
        }

        function salesCommRpt() {

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
                            html += "<tr>";
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
                            html += "<tr>";
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

                            html += "<tr>";
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
                        html += "<tr>";
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
                        html += "<tr>";
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
                    html += "<tr>";
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
                    html += parseFloat(salesTaxAmt - salesRetTaxAmt).toFixed(2);
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

                    $('tbody.salesret-body').html(html);
                    var info = $('.salesret-info');

                    $('#salesret-table').DataTable({
                        'destroy': true,
                        'ordering': false,
                        'autowidth': false,
                        'searching': false,
                        'info': false,
                        dom: 'B<".rpt-info col-md-12">frtip',
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
                    $('.rpt-info').html(info.html());
                    info.remove();
                },
                complete: function () {
                    loadingStop();
                }
            });
        }

        function commRpt() {

        }

        function salesSumRpt() {

        }
    });
</script>
