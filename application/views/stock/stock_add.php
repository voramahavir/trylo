<?php $this->load->view('include/template/common_header'); ?>
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
                <div class="row">
                    <div class="col-md-2">
                        <div class="row">
                            <label class="col-md-7"> No </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value="<?php echo $currentBill; ?>" id="TRBLNO"
                                       name="TRBLNO" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-7"> Date </label>
                            <div class="col-md-10">
                                <input type="text" name="TRBLDT" id="TRBLDT" class="form-control datepicker"
                                       value="<?php echo date('d/m/Y'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="row form-group">
                            <label class="col-md-2 text-right"> Item Code : </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control barCode" name="item_code"
                                       autocapitalize="characters">
                            </div>
                            <span><b>PUT BARCODE OR GUN IN THIS BOX</b></span>
                        </div>
                        <p class="col-md-offset-2"><b>TYPE "EXIT" IN THE ABOVE BOX TO FINISH PHYSICAL VERIFICATION</b>
                        </p>
                        <div class="row">
                            <label class="col-md-2 text-right"> Item Name : </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control item_name" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 text-right"> Size : </label>
                            <div class="col-md-2">
                                <input type="text" class="form-control size" disabled>
                            </div>
                            <label class="col-md-1 text-right"> Color : </label>
                            <div class="col-md-2">
                                <input type="text" class="form-control color" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 text-right"> Qnty : </label>
                            <div class="col-md-2">
                                <input type="text" class="form-control qtny" disabled>
                            </div>
                            <label class="col-md-1 text-right"> MRP : </label>
                            <div class="col-md-2">
                                <input type="text" class="form-control mrp" disabled>
                            </div>
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
                <table class="col-md-12 table table-bordered table-hover dataTable">
                    <thead>
                    <tr>
                        <th class="col-md-3">Name of Item</th>
                        <th class="col-md-1">Color</th>
                        <th class="col-md-1">Size</th>
                        <th class="col-md-1">Qnty</th>
                        <th class="col-md-2">BarCode</th>
                        <th class="col-md-1">MRP</th>
                        <th class="col-md-2">Action</th>
                    </tr>
                    </thead>
                    <tbody class="items">

                    </tbody>
                </table>
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
    <div class="col-md-offset-2">
        <span><b>LAST ENTRY DONE</b></span>
    </div>
</div>

<div class="row form-group"></div>

<div class="row">

    <div class="col-md-6">
        <div>
            <div class="box">
                <div class="row form-group"></div>

                <div class="row form-group">
                    <label class="col-md-3 text-right"> Item Code : </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control item_name_last" disabled>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3 text-right"> Size : </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control size_last" disabled>
                    </div>
                    <label class="col-md-2 text-right"> Color : </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control color_last" disabled>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3 text-right"> Qnty : </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control qtny_last" disabled>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control barCode_last" disabled>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3 text-right"> MRP : </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control mrp_last" disabled>
                    </div>
                </div>

                <div class="row form-group"></div>

                <!-- Loading (remove the following to stop the loading)-->
                <div class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">

        <div class="row form-group"></div>
        <div class="row form-group"></div>
        <div class="row form-group">
            <label class="col-md-3 text-right"> Total Qty : </label>
            <div class="col-md-3">
                <input type="text" class="form-control total_qty" disabled>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <a href="<?php echo site_url('stock'); ?>" class="btn btn-default">Cancel</a>
        <button type="button" class="btn btn-primary pull-right" id="saveStock">Save</button>
    </div>
</div>

<div class="modal fade" id="save-modal">
    <div class="modal-dialog my-modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <label class="col-md-2 text-right"> Date : </label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="date"
                                       value="<?php echo date('d-m-Y'); ?>">
                            </div>
                            <label class="col-md-1 text-right"> Type : </label>
                            <div class="col-md-2">
                                <select class="form-control">
                                    <option> Cash</option>
                                    <option> Debit</option>
                                    <option> Cr.Card-DebitCard</option>
                                    <option> Mobile Payment</option>
                                </select>
                            </div>
                            <label class="col-md-2 text-right"> Salesman : </label>
                            <div class="col-md-3">
                                <select class="form-control">
                                    <option> Salesman 1</option>
                                    <option> Salesman 2</option>
                                    <option> Salesman 3</option>
                                    <option> Salesman 5</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 text-right"> Prefix : </label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="date" value="GCHGDM">
                            </div>
                            <label class="col-md-1 text-right"> No : </label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="no">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <label class="col-md-2 text-right"> Party </label>
                                    <div class="col-md-3">
                                        <select class="form-control">
                                            <option> Mr.</option>
                                            <option> Miss</option>
                                            <option> Mrs.</option>
                                            <option> Ms.</option>
                                        </select>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="customer_name" value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right"> Address </label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="address"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right"> City </label>
                                    <div class="col-md-10">
                                        <input type="text" name="city" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <label class="col-md-2 text-right"> Phone-1 </label>
                                    <div class="col-md-3">
                                        <input type="text" name="phone1" class="form-control">
                                    </div>
                                    <label class="col-md-1 text-right"> D.O.B </label>
                                    <div class="col-md-3">
                                        <input type="text" name="dob" class="form-control">
                                    </div>

                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right"> Phone-2 </label>
                                    <div class="col-md-3">
                                        <input type="text" name="phone2" class="form-control">
                                    </div>
                                    <label class="col-md-1 text-right"> M.A.D. </label>
                                    <div class="col-md-3">
                                        <input type="text" name="mad" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 text-right"> Email </label>
                                    <div class="col-md-5">
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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
            loadingStop();
            var items, all_qty = 0;
            var barCodeArray = [];
            $('.datepicker').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
            $(".barCode").focusout(function () {
                getIteminfo();
            });

            $("#saveStock").click(function () {
                saveStock();
            });

            $(document).on('click', '.remove', function () {
                $(this).parent().parent().remove();
                index = barCodeArray.indexOf(items.BARCODF);
                if (index !== -1) {
                    barCodeArray.splice(index, 1);
                }
            });

            $('#searchItem').click(function () {
                window.open(site_url + "searchItem", "popupWindow", "width=1200, height=600, scrollbars=yes");
            });

            $(document).on('change', ".qty", function () {
                setTotQty();
            });

            function getIteminfo() {
                var barCode = $(".barCode").val().trim();
                if (barCode) {
                    loadingStart();
                    $.ajax({
                        url: "<?php echo site_url('stock/getItemInfo'); ?>" + "?barCode=" + barCode,
                        dataType: 'json',
                        success: function (result) {
                            loadingStop();
                            if (result.code) {
                                selectItem(result.data);
                            } else {
                                alert(result.message);
                            }
                        }
                    });
                }
            }

            function selectItem(result) {

                items = result;
                all_qty = all_qty + 1;

                $('.item_name').val(result.TRITNM);
                $('.size').val(result.TRSZCD);
                $('.color').val(result.TRCOLOR);
                $('.qtny').val(1);
                $('.mrp').val(parseFloat(result.TRMRP1).toFixed(2));

                $('.item_name_last').val(result.TRITNM);
                $('.size_last').val(result.TRSZCD);
                $('.color_last').val(result.TRCOLOR);
                $('.barCode_last').val(result.BARCODF);
                $('.qtny_last').val(1);
                $('.mrp_last').val(parseFloat(result.TRMRP1).toFixed(2));
                $('.total_qty').val(all_qty);

                addNewItem();
            }

            function addNewItem() {
                var barCode = $('.barCode').val().trim();
                if (barCode && items && barCodeArray.indexOf(items.BARCODF) !== -1) {
                    $('tr.' + items.BARCODF).find('.qty').val(parseInt($('tr.' + items.BARCODF).find('.qty').val()) + 1);
                    $('.total_qty').val(parseInt($('.total_qty').val()) + 1);
                    clear();
                    $('.barCode').focus();
                } else if (items && barCode) {

                    html = '<tr class="itemBarCode ' + items.BARCODF + '">';
                    html += '<td class="hide"> <label class="it_cd">' + items.TRITCD1 + ' </label> </td> ';
                    html += '<td> ' + items.TRITNM + '</td> ';
                    html += '<td> <label class="it_clr">' + items.TRCOLOR + ' </label> </td> ';
                    html += '<td> <label class="it_sz">' + items.TRSZCD + ' </label> </td> ';
                    html += '<td> <input type="number" class="form-control qty" min=1 value=1 /> </td> ';
                    html += '<td> ' + items.BARCODF + '</td> ';
                    html += '<td> <label class="nt_amt">' + parseFloat(items.TRMRP1).toFixed(2) + '</label> </td> ';
                    html += '<td> <a class="btn btn-danger remove"> <i class="fa fa-trash-o"> </i> </a> </td> ';
                    html += '</tr> ';
                    $(".items").append(html);
                    barCodeArray.push(items.BARCODF);
                    clear();
                    $('.barCode').focus();
                } else {
                    clear();
                }
                setTotQty();

            }

            function clear() {
                $('.barCode').val('');
                $('.item_name').val('');
                $('.size').val('');
                $('.color').val('');
                $('.qtny').val('');
                $('.mrp').val('');
            }

            function loadingStart() {
                $('.overlay').show();
            }

            function loadingStop() {
                $('.overlay').hide();
            }

            function saveStock() {
                var itemsData = [];
                $.map($('.itemBarCode'), function (value, key) {
                    var itemData = {
                        TRBLNO1: $('#TRBLNO').val(),
                        TRITCD: $(value).find('.it_cd').text(),
                        TRSZ: $(value).find('.it_sz').text(),
                        TRCLR: $(value).find('.it_clr').text(),
                        TRQTY: $(value).find('.qty').val(),
                        TRRATE: $(value).find('.nt_amt').text(),
                        branch_code: "<?php echo getSessionData('branch_code');?>",
                        fin_year: "<?php echo fin_year();?>"
                    };
                    itemsData.push(itemData);
                });
                var stockData = {
                    TRBLNO: $('#TRBLNO').val(),
                    TRBLDT: $('#TRBLDT').val(),
                    TRTOTQTY: $('.total_qty').val()
                };

                var data = {
                    stockData: stockData,
                    itemData: itemsData
                };
                $.ajax({
                    url: site_url + 'stock/create',
                    type: 'POST',
                    dataType: 'JSON',
                    data: data,
                    success: function (response) {
                        if (response.code) {
                            bootbox.alert(response.msg, function () {
                                window.location.href = site_url + 'stock';
                            });
                        }
                        else {
                            bootbox.alert(response.msg);
                        }
                    }
                });
            }

            function setTotQty() {
                var totQty = 0;
                $.map($('.itemBarCode'), function (value, key) {
                    totQty = parseInt($(value).find('.qty').val()) + parseInt(totQty);
                });
                $('.total_qty').val(totQty);
            }

        });

    }(jQuery));

</script>

<?php $this->load->view('include/page_footer.php'); ?>
