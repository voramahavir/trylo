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
                    <a href="<?php echo site_url('purchaseorder'); ?>" class="btn btn-default"
                       data-dismiss="modal">Cancel</a>
                    <button type="button" class="btn btn-primary pull-right">Save</button>
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
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
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
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
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
                // saveItems();
            });

            $('.saveRet').click(function () {
                // saveReturn();
            });

            $('#selectItem').click(function () {
                setSizes();
            });

            $(document).on('change', '.itemSel', function () {
                if ($(this).is(":checked")) {
                    clrSeq = 0;
                    itemSeq++;
                    currItemSeq = itemSeq;
                    selItemsArray[currItemSeq] = [];
                    $(this).parent().parent().find('.itemSeq').text(itemSeq);
                    var colors = $(this).parent().parent().attr('data-colors');
                    var itemId = $(this).parent().parent().attr('class');
                    // console.log('par', $(this).parent());
                    var itemName = $(this).parent().parent().find('.itemName').text();
                    if (colors) {
                        colors = colors.split(',');
                        var tbodyColorList = "";
                        $.each(colors, function (index, value) {
                            tbodyColorList += "<tr data-item-name='" + itemName + "' data-item-id='" + itemId + "' data-color='" + value + "'>";
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
                    // console.log("selItemsArray i", selItemsArray);
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
                    var itemId = $(this).parent().parent().attr('data-item-id');
                    var selItem = {
                        name: itemName,
                        color: color,
                        itemId: itemId
                    };
                    /*if(selItemsArray[_clrSeq] == undefined){
                        selItemsArray[_clrSeq] = []
                    }*/
                    selItemsArray[currItemSeq][clrSeq] = selItem;
                    // selItemsArray[currItemSeq][_clrSeq] = selItemsArray[_clrSeq];

                }
                else {
                    var _clrSeq = $(this).parent().parent().find('.clrSeq').text();
                    delete selItemsArray[currItemSeq][_clrSeq];
                    $(this).parent().parent().find('.clrSeq').text(0);
                }
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
                $("#grp-modal").modal('hide');
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

            function setSizes() {
                loadingStart();
                var prdGrp = $('#prdGrp').val();
                if (prdGrp !== "") {
                    var theadDetailSt = "<th>PRODUCT NAME</th><th class='text-danger'>COLOR</th>";

                    var theadDetailEnd = "<th class='label-danger'>Total Qty</th><th class='label-danger'>Rate Rs.</th><th class='label-danger'>Amount Rs.</th>";
                    var theadDetailSizes = "";
                    var tbodyDetailSizes = "";
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
                                    tbodyItemList += "<tr class='" + value.TRITCD + "' data-sizes = '" + value.sizes + "' data-colors = '" + value.colors + "'>";
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
        });
    </script>
<?php $this->load->view('include/page_footer.php'); ?>