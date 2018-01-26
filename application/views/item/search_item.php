<?php $this->load->view('include/template/common_header'); ?>
<style type="text/css">

</style>
<link rel="stylesheet"
      href="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">

<!-- Main row -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Search Item</h3>
            </div>
            <div class="box-body">
                <div class="row form-group col-md-12">
                    <div class="col-md-4 no-pad-right">
                        <div class="row radio">
                            <label class=""> <input type="radio" name="filter_type" value="name"
                                                    checked="true"> By Name </label>
                            <label class=""> <input type="radio" name="filter_type" value="barcode"> By
                                Barcode </label>
                            <label class=""> <input type="radio" name="filter_type" value="advance">
                                Advance Search </label>
                        </div>
                    </div>
                    <div class="col-md-6 no-pad-right" id="byname">
                        <label class="col-md-3 text-left" style="margin-top: 1%">Item Name :</label>
                        <div class="col-md-9">
                            <input name="item_name" type="text" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6" id="bybarcode">
                        <label class="col-md-3 text-left" style="margin-top: 1%">Barcode :</label>
                        <div class="col-md-9">
                            <input name="barcode" type="text" class="form-control">
                        </div>
                    </div>
                    <button id="search" type="button" class="btn btn-success" style="margin-left: 20px;">
                        <span class="glyphicon glyphicon-search"></span> Search
                    </button>
                </div>
                <div id="advanced_search" class="col-md-12">
                    <div class="row form-group">
                        <div class="col-md-3">
                            <div class="row radio">
                                <label class=""> <input type="radio" name="group_type" value="all"
                                                        checked="true">All</label>
                                <label class=""> <input type="radio" name="group_type" value="selected">Selected
                                    Group</label>
                            </div>
                        </div>
                        <div class="col-md-5 no-padding" id="groupinput">
                            <label class="col-md-4 no-padding" style="margin-top: 2%;">Product Group :</label>
                            <div class="col-md-8 no-pad-left">
                                <select class="form-control" id="grouplist">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row radio">
                                <label class=""> <input type="radio" name="freeze" value="no"
                                                        checked="true">NotFreezed</label>
                                <label class=""> <input type="radio" name="freeze" value="yes">Freezed
                                    Item</label>
                                <label class=""> <input type="radio" name="freeze"
                                                        value="all">All</label>

                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <div class="row radio">
                                <label class=""> <input type="radio" name="color" value="all"
                                                        checked="true">All</label>
                                <label class=""> <input type="radio" name="color" value="selected">Selected
                                    Color</label>
                            </div>
                        </div>
                        <div class="col-md-3 no-padding" id="colorinput">
                            <label class="col-md-3 no-padding" style="margin-top: 2%;">Color :</label>
                            <div class="col-md-8 no-pad-left">
                                <select class="form-control" id="colorlist">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 no-pad-right">
                            <div class="row radio">
                                <label class=""> <input type="radio" name="size" value="all"
                                                        checked="true">All</label>
                                <label class=""> <input type="radio" name="size" value="selected">Selected
                                    Size</label>
                            </div>
                        </div>
                        <div class="col-md-3 no-pad-right" id="sizeinput">
                            <label class="col-md-3 no-padding" style="margin-top: 2%;">Size :</label>
                            <div class="col-md-9 no-padding">
                                <select class="form-control" id="sizelist">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div id="sales_bill" class="dataTables_wrapper form-inline dt-bootstrap">
                        <table id="item_table" class="table table-bordered table-hover dataTable" role="grid">
                            <thead>
                            <tr role="row">
                                <th data-field="group">Group</th>
                                <th data-field="name">Item Name</th>
                                <th data-field="cup">Cup</th>
                                <th data-field="size">Size</th>
                                <th data-field="color">Color</th>
                                <th data-field="mrp">MRP</th>
                                <th data-field="barcode">BarCode</th>
                                <th data-field="qty">StockQty</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<?php $this->load->view('include/template/common_footer'); ?>

<script src="<?php echo base_url('assets/theme/bower_components/datatables.net/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.js"></script>


<script type="text/javascript">
    var items = [];
    var itemGrpdata = {};
    var filter_type = "name";
    var color = "all";
    var size = "all";
    var group = "all";
    var freeze = "no";
    var table = null;
    var params = {};
    (function ($) {
        $(document).ready(function () {
            $('#from_date').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
            $('#to_date').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
            $("#byname").show();
            $("#bybarcode").hide();
            $("#advanced_search").hide();
            $('#item_table').bootstrapTable({
                data: items
            });
            $('.fixed-table-loading').remove();
            setDropDownData();
            params = {
                filter_type: "name",
                name: "-1"
            };
            setItemsTable();
        });
    }(jQuery));

    $("input[name=filter_type]").change(function () {
        filter_type = this.value;
        if (filter_type == "name") {
            $("#byname").show();
            $("#bybarcode").hide();
            $("#advanced_search").hide();
        } else if (filter_type == "barcode") {
            $("#byname").hide();
            $("#bybarcode").show();
            $("#advanced_search").hide();
        } else if (filter_type == "advance") {
            $("#byname").hide();
            $("#bybarcode").hide();
            $("#advanced_search").show();
            $("#colorinput").hide();
            $("#groupinput").hide();
            $("#sizeinput").hide();
        }
    });
    $('#sizelist').on('change', function () {
        size = this.value;
    });
    $('#grouplist').on('change', function () {
        group = this.value;
        var sizes = itemGrpdata[group];
        var html = "";
        $.each(sizes, function (index, val) {
            html += "<option value='" + val + "'>" + val + "</option>";
        });
        $('#sizelist').html(html);
    });
    $('#colorlist').on('change', function () {
        color = this.value;
    });
    $("input[name=group_type]").change(function () {
        group = this.value;
        if (group == "all") {
            $("#groupinput").hide();
        } else if (group == "selected") {
            $("#groupinput").show();
        }
    });
    $("input[name=size]").change(function () {
        size = this.value;
        if (size == "all") {
            $("#sizeinput").hide();
        } else if (size == "selected") {
            $("#sizeinput").show();
        }
    });
    $("input[name=color]").change(function () {
        color = this.value;
        if (color == "all") {
            $("#colorinput").hide();
        } else if (color == "selected") {
            $("#colorinput").show();
            color = $('#colorlist').val();
        }
    });
    $("#search").click(function () {
        table.ajax.reload();
    });

    function setItemsTable() {
        table = $('#item_table').DataTable({
            "processing": true,
            "serverSide": true,
            "destroy": true,
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "columns": [
                {
                    "bSortable": false,
                    "data": "group"
                },
                {
                    "bSortable": false,
                    "data": "name"
                },
                {
                    "bSortable": false,
                    "data": "cup"
                },
                {
                    "bSortable": false,
                    "data": "size"
                },
                {
                    "bSortable": false,
                    "data": 'color'
                },
                {
                    "bSortable": false,
                    "data": 'mrp'
                },
                {
                    "bSortable": false,
                    "data": 'barcode'
                },
                {
                    "bSortable": false,
                    "data": 'qty'
                }
            ],
            "ajax": {
                url: "<?= site_url('ItemController/getItems') ?>",
                method: 'POST',
                data: function (d) {
                    if (filter_type == "name") {
                        d.filter_type = "name";
                        d.name = $("input[name=item_name]").val();
                    } else if (filter_type == "barcode") {
                        d.filter_type = "barcode";
                        d.barcode = $("input[name=barcode]").val();
                    } else {
                        d.color = color;
                        d.size = size;
                        d.group = group;
                        d.freeze = $('input[name=freeze]:checked').val();
                        d.filter_type = "advance";
                    }
                }
            }
        });
    }

    function setDropDownData() {

        $.ajax({
            url: "<?= site_url('ItemController/getDropDownData') ?>",
            dataType: 'json',
            method: 'POST',
            success: function (result) {
                var select = document.getElementById("colorlist");
                for (var i = 0; i < result.color.length; i++) {
                    var option = document.createElement('option');
                    option.text = option.value = result.color[i].color;
                    select.add(option);
                }

                select = document.getElementById("sizelist");
                for (var i = 0; i < result.size.length; i++) {
                    var option = document.createElement('option');
                    if (!itemGrpdata[result.size[i].group]) {
                        itemGrpdata[result.size[i].group] = [];
                    }
                    itemGrpdata[result.size[i].group].push(result.size[i].size);
                    option.text = option.value = result.size[i].size;
                    select.add(option);
                }

                select = document.getElementById("grouplist");
                for (var i = 0; i < result.group.length; i++) {
                    var option = document.createElement('option');
                    option.text = result.group[i].name;
                    option.value = result.group[i].code;
                    select.add(option);
                }
            }
        });
    }
</script>

<?php $this->load->view('include/page_footer.php'); ?>
