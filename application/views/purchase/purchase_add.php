<?php $this->load->view('include/template/common_header'); ?>
<?php
/*echo "<pre>";
print_r($billData);
print_r($billItems);
die;*/
?>
<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> PHYSICAL VERIFICATION</h3>
                <button type="button" id="searchItem" class="btn btn-info pull-right"><i class="fa fa-search"></i>
                    Search Item
                </button>
            </div>
            <div class="box-body">
                <div class="col-md-2">
                    <div class="row">
                        <label class="col-md-7"> Invoice No </label>
                        <div class="col-md-10">
                            <label class="label-success col-md-7 text-center invNo"></label>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-7"> Date </label>
                        <div class="col-md-10">
                            <label class="label-success text-center invDt"></label>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-7"> Name </label>
                        <div class="col-md-10">
                            <label class="label-success invPrtNm"></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row form-group">
                        <label class="col-md-2 text-right"> Item Code : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control barCode" name="item_code"
                                   autocapitalize="characters">
                        </div>
                        <span><b>PUT BARCODE OR GUN IN THIS BOX</b></span>
                    </div>
                    <p class="col-md-offset-2"><b>TYPE "EXIT" IN THE ABOVE BOX TO FINISH THE BILL</b></p>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-2 text-right"> Item Name </label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 text-right"> Size </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" disabled>
                        </div>
                        <label class="col-md-2 text-right"> Color </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 text-right"> Qnty </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" disabled>
                        </div>
                        <label class="col-md-2 text-right"> Rate Rs. </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 text-right"> Nett.Amt </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" disabled>
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
                <div class="">
                    <table class="col-md-12 table table-bordered table-hover dataTable">
                        <thead>
                        <tr>
                            <th class="col-md-2">Name of Item</th>
                            <th class="col-md-1">Color</th>
                            <th class="col-md-1">Size</th>
                            <th class="col-md-1">Qnty</th>
                            <th class="col-md-1">Rate Rs.</th>
                            <th class="col-md-1">Amount Rs.</th>
                            <th class="col-md-1">BarCode</th>
                            <th class="col-md-1">MRP</th>
                            <th class="col-md-1">PhQty</th>
                            <th class="col-md-1">Diff</th>
                            <th class="col-md-1">Reason</th>
                        </tr>
                        </thead>
                        <tbody class="items">

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="col-md-12 label-info text-center"> Last Entry Done </label>
                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" name="resetPhyVer" id="resetPhyVer" class="col-md-1">
                        <label> ReSet Physical Verification </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
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
                            <label class="col-md-2 text-right"> MRP. </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control rate_rs" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="label-success">
                            <div class="row">
                                <label class="col-md-4 text-right"> Total Qty: </label>
                                <div class="col-md-7">
                                    <input type="text" value="" class="form-control totQty"
                                           disabled>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-4 text-right"> Physical Qty: </label>
                                <div class="col-md-7">
                                    <input type="text" value="" class="form-control totPhyQty"
                                           disabled>
                                </div>
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

<!-- /.modal -->

<?php $this->load->view('include/template/common_footer'); ?>

<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            loadingStop();
            getInTrnsBill();
            var items, itemsData, gTotalAmt = 0;
            var barCodeArray = [], itemsArray = [], cardData = {};

            $('.save').click(function () {
                saveBill();
            });

            $(".barCode").keyup(function (event) {
                if (event.keyCode == 13) {
                    getIteminfo();
                }
            });

            $(".barCode").focusout(function () {
                getIteminfo();
                setPhyQty();
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
                                $(".barCode").val('');
                            } else {
                                clear();
                                bootbox.alert(result.message);
                            }
                        }
                    });
                }
            }


            function total_amt() {
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

            $('#searchItem').click(function () {
                window.open(site_url + "searchItem", "popupWindow", "width=1200, height=600, scrollbars=yes");
            });

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
                $('.sales_code').val('');
            }

            function loadingStart() {
                $('.overlay').show();
            }

            function loadingStop() {
                $('.overlay').hide();
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
            }

            function getInTrnsBill() {
                loadingStart();
                var billNo = "<?php echo $billNo; ?>";
                $.ajax({
                    url: site_url + 'purchase/getInTrnsBill',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        billNo: billNo
                    },
                    success: function (response) {
                        showItems(response.billItems);
                        showBillDetails(response.billData);
                        loadingStop();
                    }
                })
            }

            function showItems(data) {
                var html = '';
                var totQty = 0, totPhyQty = 0, diff = 0;
                $.each(data, function (index, items) {
                    html += '<tr class="itemBarCode ' + items.BARCODF + '">';
                    html += '<td class="hide">' + items.TRITCD + ' </td>';
                    html += '<td class="hide">' + items.TRSBL + ' </td>';
                    html += '<td>' + items.TRITNM + ' </td>';
                    html += '<td>' + items.TRSCLR + ' </td>';
                    html += '<td>' + items.TRSSZ + ' </td>';
                    html += '<td class="qty">' + items.TRSQTY + ' </td>';
                    totQty = parseFloat(totQty) + parseFloat(items.TRSQTY);
                    html += '<td>' + items.TRSRAT + ' </td>';
                    html += '<td>' + items.TRSAMT + ' </td>';
                    html += '<td>' + items.BARCODF + ' </td>';
                    html += '<td>' + items.TRMRP1 + ' </td>';
                    html += '<td class="phqty">' + items.PHQTY + ' </td>';
                    totPhyQty = parseFloat(totPhyQty) + parseFloat(items.PHQTY);
                    diff = parseFloat(items.TRSQTY) - parseFloat(items.PHQTY);
                    html += '<td class="diff">' + diff + '</td>';
                    html += '<td></td>';
                    html += '</tr>';
                });
                $('.totQty').val(totQty);
                $('.totPhyQty').val(totPhyQty);
                $('.items').html(html);
            }

            function showBillDetails(data) {
                $('.invNo').text(data.TRPRBL);
                $('.invDt').text(new Date(data.TRBLDT).toString('dd/MM/yyyy'));
            }

            function setPhyQty() {

                var barcd = $('.barCode').val();
                if (barcd) {
                    var tr = $('.items tr.' + barcd);
                    if (tr.length) {
                        var phQtyTd = tr.find('.phqty');
                        var qtyTd = tr.find('.qty');
                        var diffTd = tr.find('.diff');
                        var phQty = parseFloat(phQtyTd.text().trim());
                        var qty = parseFloat(qtyTd.text().trim());
                        phQty = phQty + 1;
                        phQtyTd.text(phQty);
                        var diff = parseFloat(qty) - parseFloat(phQty);
                        diffTd.text(diff);

                        var totPhyQty = parseFloat($('.totPhyQty').val());
                        totPhyQty = totPhyQty + 1;
                        $('.totPhyQty').val(totPhyQty);
                        $(".barCode").focus();
                    }
                }
            }

            function saveBill() {
//                loadingStart();
                var billItemData = [];
                var billNo = "<?php echo $billNo; ?>";
                $("tr.itemBarCode").each(function () {
                    var col = $(this).find("td");
                    var itcd = col.eq(0).text().trim();
                    var trbill = col.eq(1).text().trim();
                    var itclr = col.eq(3).text().trim();
                    var itsz = col.eq(4).text().trim();
                    var phqty = col.eq(10).text().trim();
                    var res = col.eq(12).text().trim();

                    var data = {
                        TRSBL: trbill,
                        TRSITCD: itcd,
                        TRSSZ: itsz,
                        TRSCLR: itclr,
                        PHQTY: phqty,
                        PHRES: res
                    };
                    billItemData.push(data);
                });
//                return;
                $.ajax({
                    url: site_url + 'purchase/verifyBill',
                    dataType: 'json',
                    type: 'POST',
                    data: {
                        "items": billItemData,
                        "billNo": billNo
                    },
                    success: function (response) {
                        loadingStop();
                        if (response.code) {
                            bootbox.alert(response.msg, function () {
                                window.location.href = site_url + 'purchase/verifyList';
                            });
                        }
                        else {
                            bootbox.alert(response.msg);
                        }
                    }
                });
            }
        });

    }(jQuery));

</script>

<?php $this->load->view('include/page_footer.php'); ?>
