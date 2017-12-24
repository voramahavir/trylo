<?php $this->load->view('include/template/common_header') ?>
    <style type="text/css">
        .table-fixed thead {
            width: 97%;
        }

        .table-fixed tbody {
            height: 230px;
            overflow-y: auto;
            width: 100%;
        }

        .table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th {
            display: block;
        }

        .table-fixed tbody td, .table-fixed thead > tr > th {
            float: left;
            border-bottom-width: 0;
        }

        .my-modal {
            margin: 30px 0 30px auto;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"> Purchase Order </h3>
                </div>
                <div class="box-body">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <div class="form-group row">
                                <label class="col-md-1 text-right">No:</label>
                                <div class="col-md-1">
                                    <input type="text" name="TRBLNO" id="TRBLNO" class="form-control"
                                           value="<?php echo $currentBill; ?>" readonly>
                                </div>
                                <label class="col-md-2 text-right">Inward Date:</label>
                                <div class="col-md-2">
                                    <input type="text" name="TRBLDT" id="TRBLDT" class="form-control datepicker"
                                           value="<?php echo date('d/m/Y'); ?>">
                                </div>
                                <label class="col-md-2 text-right">Name of Party:</label>
                                <div class="col-md-4">
                                    <select name="TRPRCD" id="TRPRCD" class="form-control">
                                        <option value="">Select Party</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-offset-8 col-md-4">
                                <textarea name="" id="prtyAdd" resizable="false" class="form-control"
                                          readonly></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-md-1 text-right">Transport:</label>
                                <div class="col-md-5">
                                    <input type="text" name="TRSPINST" id="TRSPINST" class="form-control">
                                </div>
                                <!--</div>
                                <div class="form-group row">-->
                                <div class="col-md-6">
                                    <button class="btn btn-success pull-right" id="btnDetail"><i
                                                class="fa fa-barcode"></i> Detail
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
                                    <th class="col-md-1">Qnty</th>
                                    <th class="col-md-1">Rate Rs.</th>
                                    <th class="col-md-2">Amount Rs.</th>
                                    <th class="col-md-2">Barcode</th>
                                    <th class="col-md-2">Desc.</th>
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
                                        <input type="text" class="form-control" name="TRNET" id="TRNET" value="0"
                                               disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
                <div class="box-footer">
                    <a href="<?php echo site_url('purchaseorder'); ?>" class="btn btn-default">Cancel</a>
                    <button type="button" class="btn btn-primary pull-right savePO">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="grp-modal">
        <div class="modal-dialog my-modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="col-md-2 text-right">Product Group:</label>
                    <div class="col-md-3">
                        <select name="" id="prdGrp" class="form-control">
                            <option value="">Select Group</option>
                        </select>
                    </div>
                    <button type="button" id="selectItem" class="btn btn-info"><i class="fa fa-save"></i>
                        Select Item
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered" id="table-detail">
                                            <thead>
                                            <tr id="thead-detail">
                                                <th>
                                                    Process
                                                </th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="tbody-detail">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="overlay">
                                    <i class="fa fa-refresh fa-spin"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default closeGrp pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary saveItems">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="itemList-modal">
        <div class="modal-dialog my-modal">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table class="table table-fixed" id="table-itemlist">
                                <thead>
                                <tr id="thead-itemlist">
                                    <th class="col-md-10">
                                        Item Name
                                    </th>
                                    <th class="col-md-1">
                                        Sel
                                    </th>
                                    <th class="col-md-1">
                                        Seq
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="tbody-itemlist"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left closeItem" data-dismiss="modal">Close
                    </button>
                    <button type="button" class="btn btn-primary saveItemList" data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="colorList-modal">
        <div class="modal-dialog my-modal modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table class="table table-fixed" id="table-colorlist">
                                <thead>
                                <tr id="thead-colorlist">
                                    <th class="col-md-6">
                                        Color
                                    </th>
                                    <th class="col-md-3">
                                        Sel
                                    </th>
                                    <th class="col-md-3">
                                        Seq
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="tbody-colorlist"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('include/template/common_footer'); ?>
    <script type="text/javascript">

        $(document).ready(function () {
            var items, gTotalAmt = 0, grsTotAmt = 0, totQty = 0;
            var partyData = [], barCodeArray = [], selItemsArray = [], itemsData = [], sizesData = [];
            var finalItems = {}, saveItemsArray = [];
            var clrSeq = 0, itemSeq = 0, currItemSeq;
            loadingStop();
            loadParties();
            loadGroups();
            $('.datepicker').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });

            $("#btnDetail").click(function () {
                $("#grp-modal").modal({
                    backdrop: 'static',
                    keyboard: false
                });

            });

            $('#grp-modal').on('hidden.bs.modal', function () {
                var theadHtml = "<th>Process</th><th></th>";
                $('#thead-detail').html(theadHtml);
                $('#tbody-detail').html("");
                $('#prdGrp').val("");
                $('#selectItem').prop('disabled', false);
                $('#prdGrp').prop('disabled', false);
            });

            $("#TRPRCD").change(function () {
                var party = $(this).val();
                var address = partyData[party];
                $('#prtyAdd').val(address);
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
                var tr = $(this).parent().parent();
                var _barcode = tr.find('.i_salesCode').text().trim();
                tr.remove();
                index = barCodeArray.indexOf(_barcode);
                if (index > -1) {
                    barCodeArray.splice(index, 1);
                }
                total_amt();
            });

            $('.saveItems').click(function () {
                saveItems();
                $('#selectItem').prop('disabled', false);
                $('#prdGrp').prop('disabled', false);
                $('#prdGrp').val("");
                selItemsArray = [];
                clrSeq = itemSeq = currItemSeq = 0;
                $('#tbody-detail').html("");
            });

            $('#selectItem').click(function () {
                setSizes();
                $(this).prop('disabled', true);
                $('#prdGrp').prop('disabled', true);
            });

            $('.closeItem').click(function () {
                selItemsArray = [];
            });

            $('.closeGrp').click(function () {
                selItemsArray = [];
            });

            $('.savePO').click(function () {
                savePO();
            });

            $('.saveItemList').click(function () {
                saveItemList();
            });

            $(document).on('change', '.itemSel', function () {
                if ($(this).is(":checked")) {
                    clrSeq = 0;
                    itemSeq++;
                    currItemSeq = itemSeq;
                    selItemsArray[currItemSeq] = [];
                    $(this).parent().parent().find('.itemSeq').text(itemSeq);
                    var colors = $(this).parent().parent().attr('data-colors');
                    var sizes = $(this).parent().parent().attr('data-sizes');
                    var barcodes = $(this).parent().parent().attr('data-barcodes');
                    var rate = $(this).parent().parent().attr('data-rate');
                    var itemId = $(this).parent().parent().attr('class');
                    var itemName = $(this).parent().parent().find('.itemName').text();
                    if (colors) {
                        colors = colors.split(',');
                        barcodes = barcodes.split('|');
                        var tbodyColorList = "";

                        $.each(colors, function (index, value) {
                            var barcode = "";
                            $.map(barcodes, function (v, k) {
                                var _v = v.split(',');
                                if (_v[1] == value) {
                                    if (barcode)
                                        barcode += "|" + v;
                                    else
                                        barcode = v;
                                }
                            });
                            tbodyColorList += "<tr data-item-name='" + itemName + "' data-item-id='" + itemId + "' data-color='" + value + "' data-sizes='" + sizes + "' data-rate='" + rate + "' data-barcode='" + barcode + "'>";
                            tbodyColorList += "<td class='col-md-6'>";
                            tbodyColorList += value;
                            tbodyColorList += "</td>";
                            tbodyColorList += "<td class='col-md-3'>";
                            tbodyColorList += "<input type='checkbox' class='clrSel' />";
                            tbodyColorList += "</td>";
                            tbodyColorList += "<td class='col-md-3'>";
                            tbodyColorList += "<label class='clrSeq'></label>";
                            tbodyColorList += "</td>";
                            tbodyColorList += "</tr>";
                        });
                        $('#tbody-colorlist').html(tbodyColorList);
                        $('#colorList-modal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                    }
                }
                else {
                    var _itemSeq = $(this).parent().parent().find('.itemSeq').text();
                    delete selItemsArray[_itemSeq];
                    $(this).parent().parent().find('.itemSeq').text(0);
                }
            });

            $(document).on('change', '.clrSel', function () {
                if ($(this).is(":checked")) {
                    clrSeq++;
                    $(this).parent().parent().find('.clrSeq').text(clrSeq);
                    var itemName = $(this).parent().parent().attr('data-item-name');
                    var color = $(this).parent().parent().attr('data-color');
                    var sizes = $(this).parent().parent().attr('data-sizes');
                    var barcodes = $(this).parent().parent().attr('data-barcode');
                    var rate = $(this).parent().parent().attr('data-rate');
                    var itemId = $(this).parent().parent().attr('data-item-id');
                    var selItem = {
                        name: itemName,
                        color: color,
                        itemId: itemId,
                        sizes: sizes,
                        barcodes: barcodes,
                        rate: rate
                    };
                    selItemsArray[currItemSeq][clrSeq] = selItem;
                }
                else {
                    var _clrSeq = $(this).parent().parent().find('.clrSeq').text();
                    delete selItemsArray[currItemSeq][_clrSeq];
                    $(this).parent().parent().find('.clrSeq').text(0);
                }
            });

            $(document).on('change', ".qty", function () {
                var parent = $(this).parent().parent();
                var rateEl = parent.find('.rate');
                var amtEl = parent.find('.amt');
                var rate = parseFloat(rateEl.val());
                var qtyEl = parent.find('.qty');
                var barcode = $(this).parent().attr('data-barcode');
                var totQty = 0;

                $.map(qtyEl, function (v, k) {
                    totQty = parseInt(totQty) + parseInt(v.value);
                });
                var amt = parseFloat(totQty * rate);
                parent.find('.totqty').val(totQty);
                amtEl.val(amt);
                finalItems[barcode].qty = $(this).val();
                finalItems[barcode].rate = rate;
                finalItems[barcode].amount = parseFloat($(this).val() * rate);
            });

            $(document).on('change', ".rate", function () {
                var parent = $(this).parent().parent();
                var amtEl = parent.find('.amt');
                var rate = parseFloat($(this).val());
                var totQty = parent.find('.totqty').val();
                var amt = parseFloat(totQty * rate);
                var qtyEl = parent.find('.qty');
                $.map(qtyEl, function (v, k) {
                    var barcode = $(v).parent().attr('data-barcode');
                    if (barcode) {
                        finalItems[barcode].rate = rate;
                        finalItems[barcode].amount = parseFloat(finalItems[barcode].qty * rate);
                    }
                });
                amtEl.val(amt);
            });

            function loadingStart() {
                $('.overlay').show();
            }

            function loadingStop() {
                $('.overlay').hide();
            }

            function loadParties() {
                $.ajax({
                    url: site_url + 'purchaseorder/getParties',
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

            function loadGroups() {
                $.ajax({
                    url: site_url + 'purchaseorder/getProdGrp',
                    type: 'GET',
                    dataType: 'JSON',
                    success: function (response) {
                        var html = '<option value="">Select Group</option>';
                        if (response.code) {
                            var data = response.data;
                            $.each(data, function (index, value) {
                                /*html += '<option value="' + value.PRDCD + '">' + value.PRDNM + '&nbsp;&nbsp;&nbsp;&nbsp;' + value.PRDCD + '</option>';*/
                                html += '<option value="' + value.PRDCD + '">' + value.PRDNM + '</option>';
                                sizesData[value.PRDCD] = value.sizes.split(',');
                            });
                        }
                        $("#prdGrp").html(html);
                    }
                })
            }

            function total_amt() {
                var qty = 0, rate = 0, amt = 0, totQty = 0, finalQty = 0, finalAmt = 0;
                var qtyEl, rateEl, amtEl, totQtyEl;
                $.each($('#tbody-detail tr'), function () {
                    qtyEl = $(this).find('.qty');
                    qty = parseInt(qtyEl.val());
                    rateEl = $(this).find('.rate');
                    rate = parseFloat(rateEl.val());
                    totQtyEl = $(this).find('.totqty');
                    totQty = parseInt(totQtyEl.val());
                    amt = parseFloat(totQty * rate);
                    totQty = parseInt(totQty) + parseInt(qty);
                    totQtyEl.val(totQty);
                    amtEl = $(this).find('.amt');
                    amtEl.val(amt);
                    finalQty = parseInt(totQty) + parseInt(finalQty);
                    finalAmt = parseInt(amt) + parseInt(finalAmt);
                });
            }

            function saveItems() {
                var itemListHtml = "";
                var totQty = 0;
                var totAmt = 0;
                $.map(finalItems, function (value, key) {
                    if (parseInt(value.qty) > 0) {
                        totQty = parseInt(totQty) + parseInt(value.qty);
                        totAmt = parseInt(totAmt) + parseInt(value.amount);
                        itemListHtml += "<tr>";
                        itemListHtml += "<td class='hide'>";
                        itemListHtml += "<input type='hidden' value='" + value.itemId + "' />";
                        itemListHtml += "</td>";
                        itemListHtml += "<td>";
                        itemListHtml += value.name;
                        itemListHtml += "</td>";
                        itemListHtml += "<td>";
                        itemListHtml += value.color;
                        itemListHtml += "</td>";
                        itemListHtml += "<td>";
                        itemListHtml += value.size;
                        itemListHtml += "</td>";
                        itemListHtml += "<td>";
                        itemListHtml += value.qty;
                        itemListHtml += "</td>";
                        itemListHtml += "<td>";
                        itemListHtml += value.rate;
                        itemListHtml += "</td>";
                        itemListHtml += "<td>";
                        itemListHtml += value.amount;
                        itemListHtml += "</td>";
                        itemListHtml += "<td>";
                        itemListHtml += value.barcode;
                        itemListHtml += "</td>";
                        itemListHtml += "<td>";
                        itemListHtml += "</td>";
                        itemListHtml += "</tr>";

                        var _saveItem = {
                            TRSBL: $('#TRBLNO').val(),
                            TRSITCD: value.itemId,
                            TRSSZ: value.size,
                            TRSCLR: value.color,
                            TRSQTY: value.qty,
                            TRSRAT: value.rate,
                            TRSAMT: value.amount,
                            branch_code: "<?php echo getSessionData('branch_code');?>",
                            fin_year: "<?php echo fin_year();?>"
                        };
                        saveItemsArray.push(_saveItem);
                    }
                });
                $('.itemList').html(itemListHtml);
                $('#TRTOTQTY').val(totQty);
                $('#TRNET').val(totAmt);
                $('#TRGROSS').val(totAmt);
            }

            function setSizes() {
                loadingStart();
                var prdGrp = $('#prdGrp').val();
                if (prdGrp !== "") {
                    var theadDetailSt = "<th class='col-md-2'>PRODUCT NAME</th><th class='col-md-1 text-danger'>COLOR</th>";

                    var theadDetailEnd = "<th class='label-danger col-md-1'>Total Qty</th><th class='col-md-1 label-danger'>Rate Rs.</th><th class='col-md-1 label-danger'>Amount Rs.</th>";
                    var theadDetailSizes = "";
                    var sizes = sizesData[prdGrp];
                    if (sizes) {
                        $.each(sizes, function (index, value) {
                            theadDetailSizes += "<th class='label-primary " + value + "'>" + value + "</th>";
                        });
                    }
                    var theadDetails = theadDetailSt + theadDetailSizes + theadDetailEnd;
                    $('#thead-detail').html(theadDetails);

                    $.ajax({
                        url: site_url + 'item/getItemByPrdGrp/' + prdGrp,
                        type: 'GET',
                        dataType: 'JSON',
                        success: function (response) {
                            if (response.code) {
                                var data = response.data;
                                var tbodyItemList = "";
                                $.each(data, function (index, value) {
                                    tbodyItemList += "<tr class='" + value.TRITCD + "' data-sizes = '" + value.sizes + "' data-colors = '" + value.colors + "' data-rate = '" + value.rate + "' data-barcodes = '" + value.barcodes + "'>";
                                    tbodyItemList += "<td class='col-md-10 itemName'>";
                                    tbodyItemList += value.TRITNM;
                                    tbodyItemList += "</td>";
                                    tbodyItemList += "<td class='col-md-1'>";
                                    tbodyItemList += "<input type='checkbox' class='itemSel' />";
                                    tbodyItemList += "</td>";
                                    tbodyItemList += "<td class='col-md-1'>";
                                    tbodyItemList += "<label class='itemSeq'></label>";
                                    tbodyItemList += "</td>";
                                    tbodyItemList += "</tr>";
                                });
                                $('#tbody-itemlist').html(tbodyItemList);
                                $('#itemList-modal').modal({
                                    backdrop: 'static',
                                    keyboard: false
                                });
                            }
                            loadingStop();
                        }
                    });
                }
            }

            function saveItemList() {
                var _selItemsArray = $.map(selItemsArray, function (value, key) {
                    return value;
                });
                _selItemsArray = _selItemsArray.filter(function (val) {
                    return !!(val);
                });
                var tbodyDetail = "";
                var prdGrp = $('#prdGrp').val();
                var sizes = sizesData[prdGrp];
                $.each(_selItemsArray, function (index, value) {
                    var barcodes = value.barcodes.split('|');
                    tbodyDetail += "<tr>";
                    tbodyDetail += "<td class='hide'>";
                    tbodyDetail += value.itemId;
                    tbodyDetail += "</td>";
                    tbodyDetail += "<td class='col-md-2'>";
                    tbodyDetail += value.name;
                    tbodyDetail += "</td>";
                    tbodyDetail += "<td class='col-md-1'>";
                    tbodyDetail += value.color;
                    tbodyDetail += "</td>";
                    $.map(sizes, function (val, key) {
                        var _sizes = value.sizes.split(',');
                        var barcode = "";
                        $.each(barcodes, function (_i, _v) {
                            var _barcode = _v.split(',');
                            if (_barcode[0] == val) {
                                barcode = _barcode[2];
                            }
                        });
                        var validSize = _sizes.indexOf(val) < 0 ? 'readonly' : '';
                        tbodyDetail += "<td class='" + val + "' data-barcode='" + barcode + "'>";
                        tbodyDetail += "<input type='number' class='qty form-control' value='0' " + validSize + ">";
                        tbodyDetail += "</td>";
                        finalItems[barcode] = {
                            itemId: value.itemId,
                            name: value.name,
                            color: value.color,
                            size: val,
                            qty: 0,
                            rate: value.rate,
                            amount: 0,
                            barcode: barcode,
                            prdGrp: $('#prdGrp').val()
                        };
                        /* tbodyDetail += "<td class='" + val + "'>";
                         tbodyDetail += "<input type='number' class='qty form-control' value='0' " + validSize + ">";
                         tbodyDetail += "</td>";*/
                    });
                    tbodyDetail += "<td class='col-md-1'>";
                    tbodyDetail += "<input type='number' class='totqty form-control' value='0' readonly>";
                    tbodyDetail += "</td>";
                    tbodyDetail += "<td class='col-md-1'>";
                    tbodyDetail += "<input type='number' class='rate form-control' value='" + value.rate + "'>";
                    tbodyDetail += "</td>";
                    tbodyDetail += "<td class='col-md-1'>";
                    tbodyDetail += "<input type='number' class='amt form-control' value='0' readonly>";
                    tbodyDetail += "</td>";
                    tbodyDetail += "</tr>";
                });
                $('#tbody-detail').html(tbodyDetail);
            }

            function savePO() {
                var poData = {
                    TRBLNO: $('#TRBLNO').val(),
                    TRBLDT: $('#TRBLDT').val(),
                    TRPRCD: $('#TRPRCD').val(),
                    TRGROSS: $('#TRGROSS').val(),
                    TROTHDS: $('#TROTHDS').val(),
                    TROTHAM: $('#TROTHAM').val(),
                    TRRNDOF: $('#TRRNDOF').val(),
                    TRNET: $('#TRNET').val(),
                    TRTOTQTY: $('#TRTOTQTY').val(),
                    TRSPINST: $('#TRSPINST').val()
                };
                var data = {
                    poData: poData,
                    itemData: saveItemsArray
                };
                $.ajax({
                    url: site_url + 'purchaseorder/create',
                    type: 'POST',
                    dataType: 'JSON',
                    data: data,
                    success: function (response) {
                        if (response.code) {
                            bootbox.alert(response.msg, function () {
                                window.location.href = site_url + 'purchaseorder';
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
<?php $this->load->view('include/page_footer.php'); ?>