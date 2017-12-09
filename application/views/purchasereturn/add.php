<?php $this->load->view('include/template/common_header') ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Purchase Return </h3>
            </div>
            <div class="box-body">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <div class="form-group row">
                            <label class="col-md-2 text-right">Name of Party:</label>
                            <div class="col-md-4">
                                <select name="TRPRCD" id="TRPRCD" class="form-control">
                                    <option value="">Select Party</option>
                                </select>
                            </div>
                            <label class="col-md-1">Bill No:</label>
                            <div class="col-md-2">
                                <input type="text" name="TRBLNO" id="TRBLNO" class="form-control"
                                       value="<?php echo $currentBill; ?>" readonly>
                            </div>
                            <label class="col-md-1">Date:</label>
                            <div class="col-md-2">
                                <input type="text" name="TRBLDT" id="TRBLDT" class="form-control datepicker"
                                       value="<?php echo date('d/m/Y'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-offset-2 col-md-4">
                                <textarea name="" id="prtyAdd" resizable="false" class="form-control"
                                          readonly></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-md-1 text-right">Transport:</label>
                            <div class="col-md-3">
                                <input type="text" name="TRDOCTH" id="TRDOCTH" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-1 text-right">LR No:</label>
                            <div class="col-md-2">
                                <input type="text" name="TRGRPPNO" id="TRGRPPNO" class="form-control">
                            </div>
                            <label class="col-md-1">LR Date:</label>
                            <div class="col-md-2">
                                <input type="text" name="TRGRPPDT" id="TRGRPPDT" class="form-control datepicker"
                                       value="<?php echo date('d/m/Y'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button class="btn btn-success pull-right" id="btnBarcode"><i
                                            class="fa fa-barcode"></i> Barcode
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="col-md-2">Name of Item</th>
                                <th class="col-md-1">Color</th>
                                <th class="col-md-1">Size</th>
                                <th class="col-md-2">Qnty</th>
                                <th class="col-md-1">Rate Rs.</th>
                                <th class="col-md-2">Amount Rs.</th>
                                <th class="col-md-3">Desc.</th>
                            </tr>
                            </thead>
                            <tbody class="itemList"></tbody>
                        </table>
                    </div>
                </div>
                <div class="box box-info">
                    <div class="box-body">
                        <div class="panel panel-success col-md-8">
                            <div class="panel-body">
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label class="col-md-1 text-right"> Gross: </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="TRGROSS" id="TRGROSS"
                                                   value="0"
                                                   disabled>
                                        </div>
                                        <label class="col-md-3 text-right"> Other Amount </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="TROTHDS" id="TROTHDS">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" class="form-control" name="TROTHAM" id="TROTHAM"
                                                   value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label class="col-md-3 col-md-offset-4 text-right"> R.Off: </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="TRRNDOF" id="TRRNDOF"
                                                   value="0"
                                                   disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="label-warning col-md-4">
                            <div class="form-group"></div>
                            <div class="col-md-12 form-group">
                                <label class="col-md-6"> Total Qty </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="TRTOTQTY" id="TRTOTQTY" value="0"
                                           disabled>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="col-md-6"> Nett Amount </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="TRNET" id="TRNET" value="0" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a href="<?php echo site_url('purchasereturn'); ?>" class="btn btn-default"
                   data-dismiss="modal">Cancel</a>
                <button type="button" class="btn btn-primary saveRet pull-right">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="barcode-modal">
    <div class="modal-dialog my-modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="searchItem" class="btn btn-info pull-right"><i class="fa fa-search"></i>
                    Search Item
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="row form-group">
                                        <label class="col-md-2 text-right"> Item Code : </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control barCode" name="item_code"
                                                   autocapitalize="characters">
                                        </div>
                                        <span><b>PUT BARCODE OR GUN IN THIS BOX</b></span>
                                    </div>
                                    <p class="col-md-offset-2"><b>TYPE "EXIT" IN THE ABOVE BOX TO FINISH THE BILL</b>
                                    </p>
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <label class="col-md-2 text-right"> Item Name </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="row form-group">
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

                        </div>
                    </div>
                    <div class="row">
                        <table class="col-md-12 table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="col-md-3">Name of Item</th>
                                <th class="col-md-1">Color</th>
                                <th class="col-md-1">Size</th>
                                <th class="col-md-1">Qnty</th>
                                <th class="col-md-1">Rate Rs.</th>
                                <th class="col-md-2">Amount Rs.</th>
                                <th class="col-md-2">BarCode</th>
                                <th class="col-md-1">Action</th>
                            </tr>
                            </thead>
                            <tbody class="items">

                            </tbody>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary saveItems">Save</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('include/template/common_footer'); ?>
<script type="text/javascript">

    $(document).ready(function () {
        var items, gTotalAmt = 0, grsTotAmt = 0, totQty = 0;
        var partyData = [], barCodeArray = [], itemsArray = [], itemsData = [];
        loadParties();

        $('.datepicker').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });

        $("#btnBarcode").click(function () {
            $("#barcode-modal").modal();
        });

        $("#TRPRCD").change(function () {
            var party = $(this).val();
            var address = partyData[party];
            $('#prtyAdd').val(address);
        });

        $(".barCode").keyup(function (event) {
            if (event.keyCode == 13) {
                getIteminfo();
            }
        });

        $(".barCode").focusout(function () {
            getIteminfo();

        });

        $('#searchItem').click(function () {
            window.open(site_url + "searchItem", "popupWindow", "width=1200, height=600, scrollbars=yes");
        });

        $(document).on('change', ".qty", function () {
            total_amt();
        });

        $(document).on('change', "#TROTHAM", function () {
            var grsAmt = parseFloat($('#TRGROSS').val());
            grsAmt = parseFloat(grsAmt) + parseFloat($(this).val());
            var netAmt = grsAmt;
            var rndOff = parseFloat(Math.round(netAmt) - parseFloat(netAmt)).toFixed(2);
            netAmt = parseFloat(parseFloat(netAmt) + parseFloat(rndOff)).toFixed(2);
            $('#TRNET').val(netAmt);
            $('#TRRNDOF').val(rndOff);
        });

        $(document).on('click', '.remove', function () {
            $(this).parent().parent().remove();
            index = barCodeArray.indexOf(items.BARCODF);
            if (index > -1) {
                barCodeArray.splice(index, 1);
            }
            total_amt();
        });

        $('.saveItems').click(function () {
            saveItems();
        });

        $('.saveRet').click(function () {
            saveReturn();
        });

        function loadParties() {
            $.ajax({
                url: site_url + 'purchasereturn/getParties',
                type: 'GET',
                dataType: 'JSON',
                success: function (response) {
                    var html = '<option value="">Select Party</option>';
                    if (response.code) {
                        var data = response.data;
                        $.each(data, function (index, value) {
                            partyData[value.TRCODE] = value.address;
                            html += '<option value="' + value.TRCODE + '">' + value.TRNAME + '</option>';
                        });
                    }
                    $("#TRPRCD").html(html);
                }
            })
        }

        function getIteminfo() {
            var barCode = $(".barCode").val().trim();
            if (barCode) {
                $.ajax({
                    url: "<?php echo site_url('sales/getItemInfo'); ?>" + "?barCode=" + barCode,
                    dataType: 'json',
                    success: function (result) {
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
            var qty, amount, total, _gTotalAmt = 0, gTotalQty = 0;

            $.each($('.itemBarCode'), function () {
                qty = parseInt($(this).find('.qty').val());
                amount = qty * parseFloat($(this).find('.nt_amt').text());
                total = amount;
                _gTotalAmt += total;
                gTotalQty += qty;
                $(this).find('.ntt_amt').text(amount);
                $(this).find('.t_amt').text(total);
            });
            $('.t_qty').val(gTotalQty);
            $('.n_amt').val(_gTotalAmt);
            var netAmt = parseFloat(parseFloat(gTotalAmt) + parseFloat($('.oth_amt').val())).toFixed(2);
            var rndOff = parseFloat(Math.round(netAmt) - parseFloat(netAmt)).toFixed(2);
            netAmt = parseFloat(parseFloat(netAmt) + parseFloat(rndOff)).toFixed(2);
            $('.net_amount').val(netAmt);
            $('.rndOff').val(rndOff);
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
            addNewItem();
        }

        function addNewItem() {
            var barCode = $('.barCode').val().trim();
            if (barCode && items && barCodeArray.indexOf(items.BARCODF) !== -1) {
                $('tr.' + items.BARCODF).find('.qty').val(parseInt($('tr.' + items.BARCODF).find('.qty').val()) + 1);
                total_amt();
            } else if (items && barCode) {
                html = '<tr class="itemBarCode ' + items.BARCODF + '">';
                html += '<td class="hide"> <label class="it_cd">' + items.TRITCD1 + ' </label> </td> ';
                html += '<td class="hide"> <label class="it_exrt">' + items.TRPURT + ' </label> </td> ';
                html += '<td> <label class="it_nm">' + items.TRITNM + ' </label> </td> ';
                html += '<td> <label class="it_clr">' + items.TRCOLOR + ' </label> </td> ';
                html += '<td> <label class="it_sz">' + items.TRSZCD + ' </label> </td> ';
                html += '<td> <input type="number" class="form-control qty" min=1 value=1 /> </td> ';
                html += '<td> <label class="nt_amt">' + parseFloat(items.TRMRP1).toFixed(2) + '</label> </td> ';
                html += '<td> <label class="ntt_amt">' + 1 * parseFloat(items.TRMRP1).toFixed(2) + '</label> </td> ';
                html += '<td> <label class="i_salesCode">' + items.BARCODF + ' </label> </td> ';
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

        function clear() {
            $('.barCode').val('');
            $('.item_name').val('');
            $('.size').val('');
            $('.color').val('');
            $('.qtny').val('');
            $('.rate_rs').val('');
            $('.net_amt').val('');
        }

        function saveItems() {
            var qty, amount, total, _gTotalAmt = 0, rate = 0, gTotalQty = 0, itemsList = "", it_nm, it_clr, it_sz;
            var _itemdata = {}, it_cd, it_exrt;
            itemsData = [];
            $.each($('.itemBarCode'), function () {
                qty = parseInt($(this).find('.qty').val());
                it_nm = $(this).find('.it_nm').text();
                it_clr = $(this).find('.it_clr').text();
                it_sz = $(this).find('.it_sz').text();
                it_cd = $(this).find('.it_cd').text();
                it_exrt = $(this).find('.it_exrt').text();
                amount = parseFloat($(this).find('.ntt_amt').text()).toFixed(2);
                rate = parseFloat($(this).find('.nt_amt').text()).toFixed(2);
                _gTotalAmt = parseFloat(_gTotalAmt) + parseFloat(amount);
                gTotalQty += qty;

                _itemdata = {
                    'TRSBL': $('#TRBLNO').val(),
                    'TRSSZ': it_sz,
                    'TRSCLR': it_clr,
                    'TRSQTY': qty,
                    'TRSRAT': rate,
                    'TRSAMT': amount,
                    'TRSITCD': it_cd,
                    'TREXRT': it_exrt,
                    'branch_code': "<?php echo getSessionData('branch_code'); ?>",
                    'fin_year': "<?php echo fin_year(); ?>"
                };

                itemsData.push(_itemdata);

                itemsList += '<tr class="">';
                itemsList += '<td> ' + it_nm + '</td> ';
                itemsList += '<td> ' + it_clr + '</td> ';
                itemsList += '<td> ' + it_sz + '</td> ';
                itemsList += '<td> ' + qty + ' </td> ';
                itemsList += '<td> ' + rate + '</td> ';
                itemsList += '<td> ' + amount + '</td> ';
                itemsList += '<td> </td> ';
                itemsList += '</tr> ';
            });
            grsTotAmt = _gTotalAmt;
            totQty = gTotalQty;
            $(".itemList").html(itemsList);
            $('#TRTOTQTY').val(totQty);
            $('#TRGROSS').val(grsTotAmt);
            $('#TRNET').val(grsTotAmt);
            $('#TROTHAM').trigger('change');
            $("#barcode-modal").modal('hide');
        }

        function saveReturn() {
            var purchaseData = {
                'TRBLNO': $('#TRBLNO').val(),
                'TRPRCD': $('#TRPRCD').val(),
                'TRBLDT': $('#TRBLDT').val(),
                'TRDOCTH': $('#TRDOCTH').val(),
                'TRGRPPNO': $('#TRGRPPNO').val(),
                'TRGRPPDT': $('#TRGRPPDT').val(),
                'TRGROSS': $('#TRGROSS').val(),
                'TROTHDS': $('#TROTHDS').val(),
                'TROTHAM': $('#TROTHAM').val(),
                'TRRNDOF': $('#TRRNDOF').val(),
                'TRNET': $('#TRNET').val(),
                'TRTOTQTY': $('#TRTOTQTY').val()
            };
            var data = {
                'purchaseData': purchaseData,
                'itemsData': itemsData
            };

            $.ajax({
                url: site_url + 'purchasereturn/create',
                type: 'POST',
                dataType: 'JSON',
                data: data,
                success: function (response) {
                    if (response.code) {
                        bootbox.alert(response.msg, function () {
                            window.location.href = site_url + 'purchasereturn';
                        });
                    }
                    else {
                        bootbox.alert(response.msg);
                    }
                }
            });
        }



    });
</script>
