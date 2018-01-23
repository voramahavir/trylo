<?php
/*echo "<pre>";
print_r($billData);
print_r($itemData);
die;*/
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet"
          href="<?php echo base_url('assets/theme/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="<?php echo base_url('assets/theme/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet"
          href="<?php echo base_url('assets/theme/bower_components/Ionicons/css/ionicons.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/theme/dist/css/AdminLTE.min.css'); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/theme/dist/css/skins/_all-skins.min.css'); ?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url('assets/theme/bower_components/morris.js/morris.css'); ?>">
    <!-- jvectormap -->
    <link rel="stylesheet"
          href="<?php echo base_url('assets/theme/bower_components/jvectormap/jquery-jvectormap.css'); ?>">
    <!-- Date Picker -->
    <link rel="stylesheet"
          href="<?php echo base_url('assets/theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet"
          href="<?php echo base_url('assets/theme/bower_components/bootstrap-daterangepicker/daterangepicker.css'); ?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet"
          href="<?php echo base_url('assets/theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/custom/css/custom.css'); ?>">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <title>Sales Bill Print</title>

    <style type="text/css">
        @media print {
            #print_button {
                visibility: hidden;
            }

            /*#spec { display: block; page-break-aftee: always; border-bottom:5px red solid; }*/
            @page {
                size: auto;   /* auto is the initial value */
                margin: 0mm;  /* this affects the margin in the printer settings */
            }

            .container, .row {
                width: 178mm !important;
                /*margin-left: 10mm !important;*/
                margin: 0 !important;
                /*margin-top: 0.1% !important;*/
            }

            /*#footer {
                position: fixed;
                width: 175.5mm;
                bottom: 0;
                border: 1px solid black;

            }

            table {
                height: 235mm;
            }*/
        }

        .container, .row {
            width: 188mm;
            padding: 5px;
        }

        #tab1 {
            margin-bottom: 1px;
            width: 774px;
        }

        td {
            padding: 0 !important;
            padding-left: 5px !important;
            padding-right: 5px !important;
            border: 1px solid black !important;
        }

        th {
            border: 1px solid black !important;
            font-size: 12px;
            line-height: 15px;
        }

        td.no-border-bottom {
            border-bottom: none !important;
        }

        td.no-border-top {
            border-top: none !important;
        }

        td.no-border-left {
            border-left: none !important;
        }

        td.no-border-right {
            border-right: none !important;
        }

        td.no-border {
            border: none !important;
        }

        .fs-12 {
            font-size: 12px;
        }

        .fs-15 {
            font-size: 15px;
        }

        .fs-13 {
            font: bold 13px 'Arial Narrow';
        }

        .branch-name {
            font: bold 32px 'Courier New';
            line-height: 36px;
        }

        .heading {
            font-size: 15px;
            font-weight: bold;
            line-height: 18px;
        }

        .underline {
            text-decoration: underline;
        }

        p {
            font-size: 12px;
            margin: 0;
            line-height: 18px;
        }
    </style>
</head>
<body onload="window.print()">
<a id="print_button" class="pull-right" style="margin-right:36%;cursor: pointer;"><img
            src="<?php echo base_url(); ?>assets/custom/images/print.png" width="60%"/></a>
<div class="container no-margin" id="mainCon">
    <table class="table" id="tab1">
        <tr>
            <td colspan="1" class="col-md-2 heading no-border">Original Copy</td>
            <td colspan="9" class="no-border text-center" align="center">
                <label class="underline fs-12">
                    RETAIL INVOICE
                </label>
            </td>
        </tr>
        <tr>
            <td colspan="1" class="col-md-1 no-border-right no-border-bottom" style="vertical-align:middle;">
                <img src="<?php echo base_url() ?>assets/custom/images/Logo.png"/>
            </td>
            <td colspan="9" align="center" class="text-center no-border-bottom no-border-left no-border-right">
                <p class="branch-name">
                    <?php echo getSessionData('branch_name'); ?>
                    <?php echo fin_year(array('seperator' => '-')); ?>
                </p>
            </td>
            <td colspan="1" class="col-md-1 no-border-left no-border-bottom text-right">
                <img src="<?php echo base_url() ?>assets/custom/images/TryloLogo.png" style="margin-top: 1%;"/>
            </td>
        </tr>
        <tr>
            <td colspan="1" class="col-md-1 no-border-right no-border-top no-border-bottom"></td>
            <td colspan="9" class="no-border text-center">
                <p class="fs-12">
                    <?php echo getSessionData('address1'); ?>
                    Phone: <?php echo getSessionData('telephone1'); ?>
                    E-Mail: <?php echo getSessionData('defaultmail'); ?>
                </p>
            </td>
            <td colspan="1" class="col-md-1 no-border-left no-border-top no-border-bottom"></td>
        </tr>
        <tr>
            <td colspan="1" class="no-border-right no-border-top"></td>
            <td colspan="9" class="fs-12 no-border-right no-border-top no-border-left text-center">
                <p class="fs-15 text-bold">
                    GST NO : <?php echo getSessionData('gstinno'); ?>
                </p>
            </td>
            <td colspan="1" class="no-border-left no-border-top"></td>
        </tr>
    </table>
    <table class="table " width="100%">
        <tr>
            <td class="no-border-top">
                <p>Name:</p>
            </td>
            <td colspan="2" class="no-border-top">
                <p class="fs-13">
                    <?php echo $billData->party; ?>
                </p>
            </td>
            <td class="no-border-top">
                <p>Mobile:</p>
            </td>
            <td colspan="2" class="no-border-top">
                <p class="fs-13">
                    <?php echo $billData->phoneno; ?>
                </p>
            </td>
            <td class="no-border-top">
                <p>Bill No:</p>
            </td>
            <td colspan="2" class="no-border-top">
                <p class="fs-13">
                    <?php echo $billData->billno; ?>
                </p>
            </td>
            <td class="no-border-top">
                <p>Date:</p>
            </td>
            <td class="no-border-top">
                <p class="fs-13">
                    <?php echo date("d/m/Y", strtotime($billData->billdate)); ?>
                </p>
            </td>
        </tr>
        <tr>
            <th class="text-center">SR. No.</th>
            <th class="text-center" style="min-width: 158px;">
                Particulars
            </th>
            <th class="text-center">
                HSN Code
            </th>
            <th class="text-center">
                Qty
            </th>
            <th class="text-center" style="min-width: 60px;">
                Rate Rs. Per Pc
            </th>
            <th class="text-center">
                Disc(%)
            </th>
            <th class="text-center">
                Discount Amount
            </th>
            <th class="text-center" style="min-width: 70px;">
                Net Rate Per Pc
            </th>
            <th class="text-center" style="min-width: 66px;">
                Net Rate Bf Tax
            </th>
            <th class="text-center" style="min-width: 79px;">
                Below <?php echo $billData->lowamt; ?>
            </th>
            <th class="text-center" style="min-width: 83px;">
                Above <?php echo $billData->lowamt; ?>
            </th>
        </tr>
        <?php $i = 0;
        $billData->cgstlper = 0;
        $billData->sgstlper = 0;
        $billData->cgsthper = 0;
        $billData->sgsthper = 0;
        foreach ($itemData as $data) {
            $i++;
            $billData->cgstlper = ($billData->cgstlper) ? $billData->cgstlper : $data->cgstlper;
            $billData->sgstlper = ($billData->sgstlper) ? $billData->sgstlper : $data->sgstlper;
            $billData->cgsthper = ($billData->cgsthper) ? $billData->cgsthper : $data->cgsthper;
            $billData->sgsthper = ($billData->sgsthper) ? $billData->sgsthper : $data->sgsthper;
            ?>
            <tr>
                <td class="no-border-bottom no-border-top text-center"><?php echo $i; ?></td>
                <td class="no-border-bottom no-border-top"
                    style="max-width: 158px;word-wrap: break-word;"><?php echo $data->particular; ?></td>
                <td class="no-border-bottom no-border-top"><?php echo $data->hsn; ?></td>
                <td class="no-border-bottom no-border-top text-center"><?php echo $data->qty; ?></td>
                <td class="no-border-bottom no-border-top text-center"><?php echo $data->rate; ?></td>
                <td class="no-border-bottom no-border-top text-right"><?php echo $data->disper; ?></td>
                <td class="no-border-bottom no-border-top text-right"><?php echo $data->disamt; ?></td>
                <td class="no-border-bottom no-border-top text-right"><?php echo ($data->netrt) ? $data->netrt : ''; ?></td>
                <td class="no-border-bottom no-border-top text-right"><?php echo ($data->netbt) ? $data->netbt : ''; ?></td>
                <td class="no-border-bottom no-border-top text-right"><?php echo ($data->below) ? $data->below : ''; ?></td>
                <td class="no-border-bottom no-border-top text-right"><?php echo ($data->above) ? $data->above : ''; ?></td>
            </tr>
        <?php } ?>
        <?php for ($i = 0; $i < (11 - count($itemData)); $i++) { ?>
            <tr>
                <td class="no-border-bottom no-border-top">&nbsp;</td>
                <td class="no-border-bottom no-border-top">&nbsp;</td>
                <td class="no-border-bottom no-border-top">&nbsp;</td>
                <td class="no-border-bottom no-border-top">&nbsp;</td>
                <td class="no-border-bottom no-border-top">&nbsp;</td>
                <td class="no-border-bottom no-border-top">&nbsp;</td>
                <td class="no-border-bottom no-border-top">&nbsp;</td>
                <td class="no-border-bottom no-border-top">&nbsp;</td>
                <td class="no-border-bottom no-border-top">&nbsp;</td>
                <td class="no-border-bottom no-border-top">&nbsp;</td>
                <td class="no-border-bottom no-border-top">&nbsp;</td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="3" class="fs-12 text-bold text-center no-border-right">Total</td>
            <td class="no-border-right no-border-left text-right"><?php echo $billData->totqty; ?></td>
            <td colspan="3" class="no-border-left"></td>
            <td colspan="2" class="fs-12 text-bold text-center no-border-left no-border-right">Gross:</td>
            <td class="fs-12 text-bold text-right no-border-left"><?php echo ($billData->netblamt) ? $billData->netblamt : ''; ?></td>
            <td class="fs-12 text-bold text-right no-border-left"><?php echo ($billData->netabamt) ? $billData->netabamt : ''; ?></td>
        </tr>
        <tr>
            <td colspan="6" class="fs-12 text-bold no-border-bottom">
                <?php echo ($billData->CRDNUM) ? 'Membership Card No. :' : '&nbsp' ?>

            </td>
            <td class="fs-12 text-bold">CGST</td>
            <td class="fs-12"><?php echo ($billData->cgstlper) ? $billData->cgstlper . ' %' : ''; ?></td>
            <td class="fs-12 text-bold text-right"><?php echo ($billData->cgstlamt) ? $billData->cgstlamt : ''; ?></td>
            <td class="fs-12"><?php echo ($billData->cgsthper) ? $billData->cgsthper . ' %' : ''; ?></td>
            <td class="fs-12 text-bold text-right"><?php echo ($billData->cgsthamt) ? $billData->cgsthamt : ''; ?></td>
        </tr>
        <tr>
            <td colspan="2" class="fs-12 text-bold no-border-right no-border-top">
                <?php echo ($billData->CRDNUM) ? $billData->CRDPREF . '-' . $billData->CRDNUM : '&nbsp'; ?>
            </td>
            <td colspan="3" class="fs-12 text-bold no-border-right no-border-left no-border-top">
                <?php echo ($billData->CRREDPN) ? 'Point Redeem ' . $billData->CRREDPN : '&nbsp'; ?>
            </td>
            <td class="fs-12 text-bold text-right no-border-left no-border-top">
                <?php echo ($billData->CRREDAM) ? '-' . $billData->CRREDAM : '&nbsp'; ?>
            </td>
            <td class="fs-12 text-bold">SGST</td>
            <td class="fs-12"><?php echo ($billData->sgstlper) ? $billData->sgstlper . ' %' : ''; ?></td>
            <td class="fs-12 text-bold text-right"><?php echo ($billData->sgstlamt) ? $billData->sgstlamt : ''; ?></td>
            <td class="fs-12"><?php echo ($billData->sgsthper) ? $billData->sgsthper . ' %' : ''; ?></td>
            <td class="fs-12 text-bold text-right"><?php echo ($billData->sgsthamt) ? $billData->sgsthamt : ''; ?></td>
        </tr>
        <tr>
            <td colspan="2" class="fs-12 text-bold text-center">
                <?php echo ($billData->rcdamt) ? 'Rcvd Rs.' : '&nbsp'; ?>
            </td>
            <td colspan="2" class="fs-12 text-bold text-center">
                <?php echo ($billData->retamt) ? 'Return Rs.' : '&nbsp'; ?>
            </td>
            <td colspan="2" class="fs-12 text-bold text-right text-center">
                <?php echo ($billData->custamt) ? 'Nett Paid By Customer' : '&nbsp'; ?>
            </td>
            <td colspan="4" class="fs-12 text-bold text-right">
                Net Inclusive of Taxes :
                <br>
                R.Off Rs. :
            </td>
            <td class="fs-12 text-bold text-right">
                <?php echo $billData->grsamt; ?>
                <br>
                <?php echo $billData->rndoff; ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="fs-12 text-bold text-center">
                <?php echo ($billData->rcdamt) ? $billData->rcdamt : '&nbsp'; ?>
            </td>
            <td colspan="2" class="fs-12 text-bold text-center">
                <?php echo ($billData->retamt) ? $billData->retamt : '&nbsp'; ?>
            </td>
            <td colspan="2" class="fs-12 text-bold text-right text-center">
                <?php echo ($billData->custamt) ? $billData->custamt : '&nbsp'; ?>
            </td>
            <td colspan="4" class="fs-12 text-bold text-right no-border-right">
                Nett Amount Rs
            </td>
            <td class="fs-15 text-bold text-right no-border-left">
                <?php echo $billData->netamt; ?>
            </td>
        </tr>

        <tr>
            <?php if ($billData->totdis != "0") { ?>
                <td colspan="11" class="text-bold fs-13 no-border-bottom">Your Total Purchase is Rs.

                    <span class="fs-15"><?php echo $billData->netamt; ?>/-</span>

                    and you have got

                    <span class="fs-15"><?php echo $billData->totdis; ?>/-</span> this purchase.

                </td>
            <?php } else {
                echo "<td colspan='11' class='no-border-bottom'>&nbsp;</td>";
            } ?>
        </tr>
        <tr>
            <td colspan='11' class="text-bold text-italic fs-15 no-border-top no-border-bottom">
                <span style="text-decoration: underline;font-style: italic;">THANKING YOU</span>
                <br>
                <em style="font-size: 9px;text-decoration: none !important;">
                    after 15 days from the date of bill. * Goods Return will not be exchange E. & O.E.
                </em>
            </td>
        </tr>
        <tr>
            <?php if ($billData->TRTYPE == "3") { ?>
                <td colspan="9" class="text-bold fs-12 no-border-top no-border-right">
                    Card No.: <?php echo $billData->TRCRDNO; ?>
                    Exp.date: <?php echo date("d/m/Y", strtotime($billData->TRCRDEXP)); ?>
                    CardHolder : <?php echo $billData->TRCRDHOLD; ?>
                    <br>
                    <?php if ($billData->CRDNUM) { ?>
                        Membership Card No. :<?php echo $billData->CRDPREF . '-' . $billData->CRDNUM; ?>
                    <?php } ?>
                </td>
            <?php } else if ($billData->TRTYPE == "4") { ?>
                <td colspan="9" class="text-bold fs-12 no-border-top no-border-right">
                    <?php echo $billData->CARDTYPE; ?>
                    Name: <?php echo $billData->TRPMNAM; ?>
                    Mob : <?php echo $billData->TRPMMOB; ?>
                    <br>
                    <?php if ($billData->CRDNUM) { ?>
                        Membership Card No. :<?php echo $billData->CRDPREF . '-' . $billData->CRDNUM; ?>
                    <?php } ?>
                </td>
            <?php } else {
                echo "<td colspan='9' class='no-border-top no-border-right'>&nbsp;</td>";
            } ?>
            <td colspan="2" class="text-bold fs-12 no-border-top no-border-left text-right">
                AUTHORIZED SIGN.
            </td>
        </tr>
    </table>
</div>
<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/theme/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/custom/js/jquery.serializeObject.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/custom/js/bootbox.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/custom/js/date.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/theme/bower_components/jquery-ui/jquery-ui.min.js'); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/theme/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- Morris.js charts -->
<!-- <script src="<?php // echo base_url('assets/theme/bower_components/raphael/raphael.min.js'); ?>"></script>
<script src="<?php // echo base_url('assets/theme/bower_components/morris.js/morris.min.js'); ?>"></script> -->
<!-- Sparkline -->
<script src="<?php echo base_url('assets/theme/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js'); ?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/theme/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/theme/bower_components/jquery-knob/dist/jquery.knob.min.js'); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/theme/bower_components/moment/min/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/theme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/theme/bower_components/fastclick/lib/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/theme/dist/js/adminlte.min.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#print_button").click(function () {
            window.print();
        });

    });
</script>
</body>
</html>

