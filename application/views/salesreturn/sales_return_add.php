<?php $this->load->view('include/template/common_header'); ?>
<style type="text/css">
    /* Important part */
    /*.modal-dialog{
        overflow-y: initial !important
    }
    .modal-body{
        height: 450px;
        overflow-y: auto;
    }*/
</style>
<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> USER : name / <?php echo date('d/m/Y / H:i'); ?> / New Entry</h3>
                <button type="button" id="searchItem" class="btn btn-info pull-right"><i class="fa fa-search"></i>
                    Search Item
                </button>
            </div>
            <div class="box-body">
                <div class="col-md-7">
                    <div class="row form-group">
                        <label class="col-md-2 text-right"> Item Code : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control barCode" name="item_code"
                                   autocapitalize="characters">
                        </div>
                        <span><b>PUT BARCODE OR GUN IN THIS BOX</b></span>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-2 text-right"> Fin. Year : </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control finyear" name="finyear"
                                   value="<?php echo fin_year(); ?>"
                                   readonly>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-2 text-right"> Return against Bill No : </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control return_bill" name="return_bill">
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <label class="col-md-2 text-right"> Item Name </label>
                        <div class="col-md-10">
                            <input type="text" class="form-control item_name" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 text-right"> Size </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control size" disabled>
                        </div>
                        <label class="col-md-2 text-right"> Color </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control color" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 text-right"> Qnty </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control qtny" disabled>
                        </div>
                        <label class="col-md-2 text-right"> Rate Rs. </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control rate_rs" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 text-right"> Disc(%) </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control disc" disabled>
                        </div>
                        <label class="col-md-2 text-right"> Disc.Amt </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control disc_amt" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 text-right"> Nett.Amt </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control net_amt" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div>
    </div>
</div>
<!-- /.row (main row) -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <table class="col-md-12 table table-bordered table-hover dataTable">
                        <thead>
                        <tr>
                            <th class="col-md-1">Name of Item</th>
                            <th class="col-md-1">Color</th>
                            <th class="col-md-1">Size</th>
                            <th class="col-md-1">Qnty</th>
                            <th class="col-md-1">Rate Rs.</th>
                            <th class="col-md-1">Amount Rs.</th>
                            <th class="col-md-1">Disc(%)</th>
                            <th class="col-md-1">Disc. Amt</th>
                            <th class="col-md-1">Total Amount</th>
                            <th class="col-md-1">BarCode</th>
                            <th class="col-md-1">Bill No</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                        </thead>
                        <tbody class="items"></tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-4">
                        <div class="row">
                            <label class="col-md-2"> Total Qty </label>
                            <div class="col-md-3">
                                <input type="text" class="form-control t_qty" value="0" disabled>
                            </div>
                            <label class="col-md-2"> Nett Amount </label>
                            <div class="col-md-3">
                                <input type="text" class="form-control n_amt" value="0" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Loading (remove the following to stop the loading)-->
            <div class="overlay">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
            <!-- end loading -->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary save">Save</a>
    </div>
</div>

<div class="modal fade" id="save-modal">
    <div class="modal-dialog my-modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <form role="form" id="salesRetBill">
                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="box-body">
                                <div class="row">
                                    <label class="col-md-1 text-right"> C N No : </label>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name="TRBLNO"
                                               value="<?php echo $currentBill; ?>" readonly>
                                    </div>
                                    <label class="col-md-1 text-right"> Date : </label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="TRBLDT"
                                               value="<?php echo date('d-m-Y'); ?>" readonly>
                                    </div>
                                    <label class="col-md-1 text-right"> Type : </label>
                                    <div class="col-md-2">
                                        <select class="form-control trtype" name="TRTYPE">
                                            <option value="1"> Cash</option>
                                            <option value="2"> Debit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-1 text-right"> Prefix : </label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="CRDPREF" value="GCHGDM" readonly>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    <label class="col-md-1 text-right"> No : </label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control crdnum" name="CRDNUM">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="box box-warning">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Party </label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control party" name="TRPRNM" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Address </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control address ad1" name="TRPAD1"/>
                                            </div>
                                            <div class="col-md-10 col-md-offset-2">
                                                <input type="text" class="form-control address ad2" name="TRPAD2"/>
                                            </div>
                                            <div class="col-md-10 col-md-offset-2">
                                                <input type="text" class="form-control address ad3" name="TRPAD3"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-right"> City </label>
                                            <div class="col-md-10">
                                                <input type="text" name="TRCITY" class="form-control city">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Phone-1 </label>
                                            <div class="col-md-3">
                                                <input type="number" min="10" max="10" name="TRPH1"
                                                       class="form-control ph1">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Phone-2 </label>
                                            <div class="col-md-3">
                                                <input type="number" min="10" max="10" name="TRPH2"
                                                       class="form-control ph2">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Email </label>
                                            <div class="col-md-5">
                                                <input type="email" name="TREMAIL" class="form-control email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Gross </label>
                                            <div class="col-md-10">
                                                <input type="text" name="TRGROS" class="form-control gross" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Other </label>
                                            <div class="col-md-10">
                                                <input type="text" name="TROTH1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Other Amt </label>
                                            <div class="col-md-10">
                                                <input type="number" value="0" name="TROTH2"
                                                       class="form-control oth_amt">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <label class="col-md-3 text-right"> Rnd Off </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control rndOff" name="TRRND">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Nett Amount Rs. </label>
                                            <div class="col-md-10">
                                                <input type="text" name="TRNET" class="form-control net_amount"
                                                       readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <label class="col-md-3 text-right"> Total Qty </label>
                                            <div class="col-md-9">
                                                <input type="text" name="TRTOTQTY" class="form-control m_t_qty"
                                                       readonly>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <input type="checkbox" class="chkRfnd">
                                            </div>
                                            <label class="col-md-10">Goods Return Money Refunded</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="box box-danger dnm">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h3> DENOMINATION RETURNED </h3>
                                        <div class="row">
                                            <label class="col-md-1 text-right dr_amount"> 2000 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="RC2000" class="form-control dr_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dr_value" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dr_amount"> 500 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="RC500" class="form-control dr_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dr_value" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dr_amount"> 200 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="RC200" class="form-control dr_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dr_value" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dr_amount"> 100 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="RC100" class="form-control dr_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dr_value" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dr_amount"> 50 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="RC50" class="form-control dr_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dr_value" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dr_amount"> 20 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="RC20" class="form-control dr_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dr_value" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dr_amount"> 10 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="RC10" class="form-control dr_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dr_value" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dr_amount"> 5 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="RC5" class="form-control dr_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dr_value" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-5 text-right"> MISC. </label>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" name="RCMIS"
                                                       class="form-control dr_misc dr_value"
                                                       value="0">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-6 text-right"> Rcvd AMt. </label>
                                            <div class="col-md-5">
                                                <input type="text" name="EXRCVD" class="form-control dr_total"
                                                       value="0"
                                                       readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary saveBill">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php $this->load->view('include/template/common_footer'); ?>

<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            $('.datepicker').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
            loadingStop();

            var items, billItems, gTotalAmt = 0, itemsData;
            var barCodeArray = [], itemsArray = [], billItemsArray = [];

            $('.save').click(function () {
                if (barCodeArray.length > 0) {
                    $("#save-modal").modal();
                    gTotalAmt = 0;
                    itemsData = setItemsData();
                    total_amt();
                } else {
                    alert("Required to add items");
                }
            });
            $(".barCode").keyup(function (event) {
                if (event.keyCode == 13) {
                    $('.return_bill').focus();
                }
            });

            $(".barCode").focusout(function () {
                getIteminfo();
            });

            $(".return_bill").focusout(function () {
                validateBillNo();
            });

            $(document).on('click', '.remove', function () {
                $(this).parent().parent().remove();
                index = barCodeArray.indexOf(items.BARCODF);
                if (index > -1) {
                    barCodeArray.splice(index, 1);
                }
            });
            $(document).on('click', '.saveBill', function () {
                saveBill();
            });
            $(document).on('focusin', ".qty", function () {
                $(this).data('val', $(this).val());
            }).on('change', ".qty", function () {
                var prevQty = $(this).data('val');
                var _qty = parseFloat($(this).val());
                if (parseFloat(billItemsArray[billItems.subid].TRQTY) < _qty) {
                    bootbox.alert("Enter quantity is greater than billing quantity");
                    $(this).val(prevQty);
                    $(this).trigger("change");
                }
                else {
                    total_amt();
                }
            });

            $(document).on('change', ".d_per", function () {
                total_amt();
            });
            $(document).on('change', ".chkRfnd", function () {
                if($(this).is(":checked")){
                    $(".dnm").show();
                }
                else{
                    $(".dnm").hide();
                }
            });
            $(".chkRfnd").trigger("change");
            function getIteminfo() {
                var barCode = $(".barCode").val().trim();
                if (barCode) {
                    loadingStart();
                    $.ajax({
                        url: "<?php echo site_url('sales/getItemInfo'); ?>" + "?barCode=" + barCode,
                        dataType: 'json',
                        success: function (result) {
                            loadingStop();
                            if (result.code) {
                                selectItem(result.data);
                            } else {
                                clear();
                                alert(result.message);
                            }
                        }
                    });
                }
            }

            function selectItem(result) {
                items = result;
                itemsArray[items.TRITCD1] = items;
                $('.item_name').val(result.TRITNM);
                $('.size').val(result.TRSZCD);
                $('.color').val(result.TRCOLOR);
                $('.qtny').val(1);
                $('.rate_rs').val(parseFloat(result.TRMRP1).toFixed(2));
                $('.disc').val((0).toFixed(2));
                $('.disc_amt').val((0).toFixed(2));
                $('.net_amt').val(parseFloat(result.TRMRP1).toFixed(2));
                $('.return_bill').focus();
            }

            function clear() {
                $('.barCode').val('');
                $('.item_name').val('');
                $('.size').val('');
                $('.color').val('');
                $('.qtny').val('');
                $('.rate_rs').val('');
                $('.disc').val('');
                $('.disc_amt').val('');
                $('.net_amt').val('');
//                $('.return_bill').val('');
            }

            function loadingStart() {
                $('.overlay').show();
            }

            function loadingStop() {
                $('.overlay').hide();
            }

            function addNewItem() {
                console.log("items", items);
                console.log("itemsArray", itemsArray);
                console.log("billItems", billItems);
                console.log("billItemsArray", billItemsArray);
                var barCode = $('.barCode').val().trim();
                if (barCode && items && barCodeArray.indexOf(items.BARCODF) !== -1) {
                    $('tr.' + (itemsArray[billItems.TRITCD].BARCODF).replace("/", "-")).find('.qty').val(parseInt($('tr.' + (itemsArray[billItems.TRITCD].BARCODF).replace("/", "-")).find('.qty').val()) + 1);
                    $(this).trigger("change");
                    $('tr.' + (itemsArray[billItems.TRITCD].BARCODF).replace("/", "-")).find('.qty').val(parseInt($('tr.' + (itemsArray[billItems.TRITCD].BARCODF).replace("/", "-")).find('.qty').val()) - 1);
                    total_amt();
                } else if (items && barCode) {
                    var _totQty = parseInt(billItems.TRQTY);
                    var _disAmt = parseFloat(billItems.TRDS2);
                    var _perQtyDis = parseFloat(_disAmt / _totQty).toFixed(2);
                    var _finDisAmt = Math.round(_perQtyDis);
                    var ntAmt = Math.round(billItems.TRNETRT);
                    html = '<tr class="itemBarCode ' + (itemsArray[billItems.TRITCD].BARCODF).replace("/", "-") + '">';
                    html += '<td class="hide"> ' + billItems.TRITCD + '</td> ';
                    html += '<td> ' + itemsArray[billItems.TRITCD].TRITNM + '</td> ';
                    html += '<td> ' + itemsArray[billItems.TRITCD].TRCOLOR + '</td> ';
                    html += '<td> ' + itemsArray[billItems.TRITCD].TRSZCD + '</td> ';
                    html += '<td> <input type="number" class="form-control qty" min=1 value=1 /> </td> ';
                    html += '<td> <label class="nt_amt">' + parseFloat(billItems.TRRATE).toFixed(2) + '</label> </td> ';
                    html += '<td> <label class="ntt_amt">' + 1 * parseFloat(billItems.TRRATE).toFixed(2) + '</label> </td> ';
                    html += '<td> <input type="number" class="form-control d_per" min=0 value="' + billItems.TRDS1 + '" /> </td> ';
                    html += '<td> <label class="d_amt">' + _finDisAmt + '</label> </td> ';
                    html += '<td> <label class="t_amt">' + ntAmt + '</label> </td> ';
                    html += '<td> <label class="i_salesCode">' + itemsArray[billItems.TRITCD].BARCODF + ' </label> </td> ';
                    html += '<td> <label class="i_salesCode">' + billItems.TRBLNO1 + ' </label> </td>';
                    html += '<td> <a class="btn btn-danger remove"> <i class="fa fa-trash-o"> </i> </a> </td> ';
                    html += '</tr> ';
                    if ($(".items tr:first").length) {
                        $(".items tr:first").before(html);
                    } else {
                        $(".items").append(html);
                    }
                    barCodeArray.push(items.BARCODF);
                    total_amt();
                }
                clear();
                $('.barCode').focus();
            }

            function total_amt() {
                var qty, amount, total, disc_amount, _gTotalAmt = 0, gTotalQty = 0;

                $.each($('.itemBarCode'), function () {
                    qty = parseInt($(this).find('.qty').val());
                    amount = qty * parseFloat($(this).find('.nt_amt').text());
                    disc_amount = Math.round(parseFloat($(this).find('.d_per').val()) * amount / 100);
                    total = amount - disc_amount;
                    _gTotalAmt += total;
                    gTotalQty += qty;
                    $(this).find('.ntt_amt').text(amount);
                    $(this).find('.d_amt').text(disc_amount);
                    $(this).find('.t_amt').text(total);
                });
                $('.t_qty').val(gTotalQty);
                $('.n_amt').val(_gTotalAmt);
                $('.m_t_qty').val(gTotalQty);
                $('.gross').val(gTotalAmt);
                var netAmt = parseFloat(parseFloat(gTotalAmt) + parseFloat($('.oth_amt').val())).toFixed(2);
                var rndOff = parseFloat(Math.round(netAmt) - parseFloat(netAmt)).toFixed(2);
                netAmt = parseFloat(parseFloat(netAmt) + parseFloat(rndOff)).toFixed(2);
                $('.net_amount').val(netAmt);
                $('.rndOff').val(rndOff);
            }

            function validateBillNo() {
                var billNo = $(".return_bill").val();
                if (billNo) {
                    var data = {
                        billNo: billNo,
                        itemId: items.TRITCD1,
                        itemClr: items.TRCOLOR,
                        itemSz: items.TRSZCD
                    };
                    $.ajax({
                        url: site_url + "salesreturn/validateBillNo",
                        type: "POST",
                        dataType: "JSON",
                        data: data,
                        success: function (response) {
                            if (response.code) {
                                billItems = response.data;
                                if (!billItemsArray[billItems.subid]) {
                                    billItemsArray[billItems.subid] = billItems;
                                    billItemsArray[billItems.subid].TRFQTY = billItemsArray[billItems.subid].TRQTY;
                                    bootbox.prompt("Please enter Authentication code", function (result) {
                                        if (result != null) {
                                            addNewItem();
                                            billItemsArray[billItems.subid].TRFQTY -= 1;
                                        }
                                    });
                                }
                                else if (billItemsArray[billItems.subid].TRFQTY) {
                                    addNewItem();
                                    billItemsArray[billItems.subid].TRFQTY -= 1;
                                }
                                else {
                                    bootbox.alert("Enter quantity is greater than billing quantity");
                                    $(".return_bill").val("");
                                }
                            }
                            else {
                                bootbox.alert(response.msg, function () {
                                    $(".return_bill").val("");
                                    clear();
                                    $('.barCode').focus();
                                });
                            }
                        }
                    });
                }
            }

            function setItemsData() {
                var _itemsData = [];
                $("tr.itemBarCode").each(function () {
                    var col = $(this).find("td");
                    var itcd = col.eq(0).text().trim();
                    var qty = parseFloat(col.eq(4).find('.qty').val().trim());
                    var rate = parseFloat(col.eq(5).text().trim());
                    var disamt = parseFloat(col.eq(8).text().trim());
                    var retBillNo = col.eq(11).text().trim();
                    var sgstl = parseFloat(itemsArray[itcd].TRSGSTL);//Low SGST per
                    var cgstl = parseFloat(itemsArray[itcd].TRCGSTL);//Low CGST per
                    var sgsth = parseFloat(itemsArray[itcd].TRSGSTH);//High SGST per
                    var cgsth = parseFloat(itemsArray[itcd].TRCGSTH);//High CGST per
                    var lowAmt = parseFloat(itemsArray[itcd].TRLOW);//Low amount
                    var totLowTax = sgstl + cgstl;
                    var totHighTax = sgsth + cgsth;

                    var netrt = parseFloat(rate - (disamt / qty)).toFixed(2);//Net Rate per pc

                    var netbt = parseFloat((netrt * 100) / (100 + totLowTax)).toFixed(2);//Net Rate before tax
                    var netAmt = col.eq(9).text().trim();//Net amt of item
                    var belowAmt = netbt * qty;
                    var aboveAmt = 0;

                    if (netbt > lowAmt) {
                        netbt = parseFloat((netrt * 100) / (100 + totHighTax)).toFixed(2);
                        aboveAmt = netbt * qty;
                        belowAmt = 0;
                        sgstl = 0;
                        cgstl = 0;
                    }
                    else {
                        sgsth = 0;
                        cgsth = 0;
                    }
                    var sgstla = parseFloat(((netbt * sgstl) / 100) * qty).toFixed(2);//Low SGST amt
                    var cgstla = parseFloat(((netbt * cgstl) / 100) * qty).toFixed(2);//Low CGST amt
                    var sgstha = parseFloat(((netbt * sgsth) / 100) * qty).toFixed(2);//High SGST amt
                    var cgstha = parseFloat(((netbt * cgsth) / 100) * qty).toFixed(2);//High CGST amtw
                    gTotalAmt = parseFloat(parseFloat(gTotalAmt) + parseFloat(belowAmt) + parseFloat(aboveAmt) + parseFloat(sgstla) + parseFloat(cgstla) + parseFloat(sgstha) + parseFloat(cgstha)).toFixed(2);

                    var data = {
                        TRBLNO1: "<?php echo $currentBill; ?>",// BillNo
                        TRITCD: itcd,//Item Id
                        TRSZ: col.eq(3).text().trim(),//Size
                        TRCLR: col.eq(2).text().trim(),//Color
//                        TRBRCD: col.eq(10).text().trim(),//Barcode
                        TRQTY: qty,//Qty
                        TRRATE: rate,//Rate
                        TRDS1: col.eq(7).find('.d_per').val().trim(),//Dis. %
                        TRDS2: disamt,//Dis Amt
                        TRBLAMT: netAmt,//Net Amt
                        RETBILLNO: retBillNo,//Return Bill NO
                        TRNETRT: netrt,//Net Rate
                        TRNETBT: netbt,//Net Rate before tax
                        TRLSGST: sgstl,
                        TRLSGSTA: sgstla,
                        TRLCGST: cgstl,
                        TRLCGSTA: cgstla,
                        TRHSGST: sgsth,
                        TRHSGSTA: sgstha,
                        TRHCGST: cgsth,
                        TRHCGSTA: cgstha,
                        TRFBEL: belowAmt,
                        TRFABV: aboveAmt
                    };
                    $(".party").val(billItems.TRPRNM);
                    $(".ad1").val(billItems.TRPAD1);
                    $(".ad2").val(billItems.TRPAD2);
                    $(".ad3").val(billItems.TRPAD3);
                    $(".city").val(billItems.TRCITY);
                    $(".ph1").val(billItems.TRPH1);
                    $(".ph2").val(billItems.TRPH2);
                    $(".email").val(billItems.TREMAIL);
                    _itemsData.push(data);
                });
                return _itemsData;
            }

            function saveBill() {
                var salesData = $("#salesRetBill").serializeObject();

                $.ajax({
                    url: site_url + "salesreturn/create",
                    dataType: 'json',
                    type: "POST",
                    data: {
                        "salesData": salesData,
                        "itemsData": itemsData
                    },
                    success: function (response) {
                        bootbox.alert(response.msg,function(){
                            window.location.href = site_url + "salesreturn/salesreturnList";
                        });
                        $("#save-modal").modal('hide');
                        /*bootbox.confirm({
                            message: "Do you want to print the bill now?",
                            buttons: {
                                confirm: {
                                    label: 'Yes',
                                    className: 'btn-success'
                                },
                                cancel: {
                                    label: 'No',
                                    className: 'btn-danger'
                                }
                            },
                            callback: function (result) {
                                window.location.href = site_url + "salesPrint/" + <?php //echo $currentBill; ?>;
                            }
                        });*/
                    }
                });
            }
        });

    }(jQuery));

</script>

<?php $this->load->view('include/page_footer.php'); ?>
