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
<?php $this->load->view('include/template/common_footer'); ?>

<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            $('.datepicker').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
            loadingStop();
            var items;
            var barCodeArray = [], itemsArray = [];

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
                $('.return_bill').val('');
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
//                return;
                var barCode = $('.barCode').val().trim();
                if (barCode && items && barCodeArray.indexOf(items.BARCODF) !== -1) {
                    var _qty = $('tr.' + items.BARCODF).find('.qty');
                    if (parseInt(_qty.val()) < parseInt(items.TRQTY)) {
                        _qty.val(parseInt($('tr.' + items.BARCODF).find('.qty').val()) + 1);
                    }
                    else {
                        bootbox.alert("Return quantity is greater than billing quantity");
                    }
                    total_amt();
                } else if (items && barCode) {
                    html = '<tr class="itemBarCode ' + itemsArray[items.TRITCD].BARCODF + '">';
                    html += '<td class="hide"> ' + items.TRITCD + '</td> ';
                    html += '<td> ' + itemsArray[items.TRITCD].TRITNM + '</td> ';
                    html += '<td> ' + itemsArray[items.TRITCD].TRCOLOR + '</td> ';
                    html += '<td> ' + itemsArray[items.TRITCD].TRSZCD + '</td> ';
                    html += '<td> <input type="number" class="form-control qty" min=1 value=1 /> </td> ';
                    html += '<td> <label class="nt_amt">' + parseFloat(items.TRRATE).toFixed(2) + '</label> </td> ';
                    html += '<td> <label class="ntt_amt">' + 1 * parseFloat(items.TRRATE).toFixed(2) + '</label> </td> ';
                    html += '<td> ' + items.TRDS1 + ' </td> ';
                    html += '<td> <label class="d_amt">' + items.TRDS1 + '</label> </td> ';
                    html += '<td> <label class="t_amt">' + parseFloat(items.TRBLAMT).toFixed(2) + '</label> </td> ';
                    html += '<td> <label class="i_salesCode">' + itemsArray[items.TRITCD].BARCODF + ' </label> </td> ';
                    html += '<td> <label class="i_salesCode">' + items.TRBLNO1 + ' </label> </td>';
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
                return;
                var qty, amount, total, disc_amount, _gTotalAmt = 0, gTotalQty = 0;

                $.each($('.itemBarCode'), function () {
                    qty = parseInt($(this).find('.qty').val());
                    amount = qty * parseFloat($(this).find('.nt_amt').text());
                    disc_amount = parseFloat($(this).find('.d_per').val()) * amount / 100;
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
                                items = response.data;
                                bootbox.prompt("Please enter Authentication code", function (result) {
                                    if(result != null){
                                        addNewItem();
                                    }
                                });
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
        });

    }(jQuery));

</script>

<?php $this->load->view('include/page_footer.php'); ?>
