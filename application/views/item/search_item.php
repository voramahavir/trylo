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
                <div class="row form-group">
                    <div class="col-md-5">
                        <div class="row radio">
                            <label class="col-md-offset-1"> <input type="radio" name="filter_type" value="name" checked="true"> By Name </label>
                            <label class="col-md-offset-1"> <input type="radio" name="filter_type" value="barcode"> By Barcode </label>
                            <label class="col-md-offset-1"> <input type="radio" name="filter_type" value="advance"> Advance Search </label>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6" id="byname">
                        <label class="col-md-3 text-left" style="margin-left: 8px">Item Name :</label>
                        <div class="col-md-5">
                            <input name="item_name" type="text" value="jhfkd" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6" id="bybarcode">
                        <label class="col-md-3 text-left" style="margin-left: 8px">Barcode :</label>
                        <div class="col-md-5">
                            <input name="barcode" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div id="advanced_search">
                    <div class="row form-group">
                        <div class="col-md-5">
                            <div class="row radio">
                                <label class="col-md-offset-1"> <input type="radio" name="group_type" value="all" checked="true">All</label>
                                <label class="col-md-offset-1"> <input type="radio" name="group_type" value="selected">Selected Group</label>
                            </div>
                        </div>
                        <div class="col-md-7" id="groupinput">
                            <label class="col-md-3 text-left">Product Group :</label>
                            <div class="col-md-5">
                                  <select class="form-control" id="grouplist">
                                        <option></option>
                                  </select>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-5">
                            <div class="row radio">
                                <label class="col-md-offset-1"> <input type="radio" name="freeze" value="no" checked="true">NotFreezed</label>
                                <label class="col-md-offset-1"> <input type="radio" name="freeze" value="yes">Freezed Item</label>
                                <label class="col-md-offset-1"> <input type="radio" name="freeze" value="all">All</label>

                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-5">
                            <div class="row radio">
                                <label class="col-md-offset-1"> <input type="radio" name="color" value="all" checked="true">All</label>
                                <label class="col-md-offset-1"> <input type="radio" name="color" value="selected">Selected Color</label>
                            </div>
                        </div>
                        <div class="col-md-7" id="colorinput">
                            <label class="col-md-3 text-left">Color :</label>
                            <div class="col-md-5">
                                  <select class="form-control" id="colorlist">
                                        <option></option>
                                  </select>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-5">
                            <div class="row radio">
                                <label class="col-md-offset-1"> <input type="radio" name="size" value="all" checked="true">All</label>
                                <label class="col-md-offset-1"> <input type="radio" name="size" value="selected">Selected Size</label>
                            </div>
                        </div>
                        <div class="col-md-7" id="sizeinput">
                            <label class="col-md-3 text-left">Size :</label>
                            <div class="col-md-5">
                                  <select class="form-control" id="sizelist">
                                        <option></option>
                                  </select>
                            </div>
                        </div>
                    </div>
                </div>
                <button id="search" type="button" class="btn btn-default" style="margin-left: 20px;">
                    <span class="glyphicon glyphicon-search"></span> Search
                </button>
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
    var filter_type = "name";
    var color = "all";
    var size = "all";
    var group = "all";
    var freeze = "no";
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
        });
    }(jQuery));

    $("input[name=filter_type]").change(function () {
        filter_type = this.value;
        if(filter_type == "name"){
            $("#byname").show();
            $("#bybarcode").hide();
            $("#advanced_search").hide();
        }else if (filter_type=="barcode"){
            $("#byname").hide();
            $("#bybarcode").show();
            $("#advanced_search").hide();
        } else if (filter_type == "advance"){
            $("#byname").hide();
            $("#bybarcode").hide();
            $("#advanced_search").show();
            $("#colorinput").hide();
            $("#groupinput").hide();
            $("#sizeinput").hide();
        }
    });
    $('#sizelist').on('change', function() {
        size = this.value;
    });
    $('#grouplist').on('change', function() {
        group = this.value;
    });
    $('#colorlist').on('change', function() {
        color = this.value;
    });
    $("input[name=group_type]").change(function () {
        group = this.value;
        if(group == "all"){
            $("#groupinput").hide();
        }else if (group=="selected"){
            $("#groupinput").show();
        } 
    });
    $("input[name=size]").change(function () {
        size = this.value;
        if(size == "all"){
            $("#sizeinput").hide();
        }else if (size=="selected"){
            $("#sizeinput").show();
        } 
    });
    $("input[name=color]").change(function () {
        color = this.value;
        if(color == "all"){
            $("#colorinput").hide();
        }else if (color=="selected"){
            $("#colorinput").show();
        } 
    });
    $("#search").click(function(){
        setItemsTable();
    });

    function setItemsTable(){
        var params = {};
        if(filter_type == "name"){
            params = {
                filter_type:"name",
                name : $("input[name=item_name]").val()
            };
        }else if (filter_type=="barcode"){
            params = {
                filter_type:"barcode",
                barcode : $("input[name=barcode]").val()
            };
        } else {
            params = {
                color : color,
                size : size,
                group : group,
                freeze : $('input[name=freeze]:checked').val(),
                filter_type : "advance"
            };
        }

        table = $('#item_table').DataTable({
            "processing": true,
            "serverSide": true,
            "destroy": true,
            "aoColumnDefs": [
                {
                    "bSortable": false,
                    "aTargets": [0],
                    "data": "group"
                },
                {
                    "bSortable": false,
                    "aTargets": [1],
                    "data": "name"
                },
                {
                    "bSortable": false,
                    "aTargets": [2],
                    "data": "cup"
                },
                {
                    "bSortable": false,
                    "aTargets": [3],
                    "data": "size"
                },
                {
                    "bSortable": false,
                    "aTargets": [4],
                    "data": 'color'
                },
                {
                    "bSortable": false,
                    "aTargets": [5],
                    "data": 'mrp'
                },
                {
                    "bSortable": false,
                    "aTargets": [6],
                    "data": 'barcode'
                },
                {
                    "bSortable": false,
                    "aTargets": [7],
                    "data": 'qty'
                }
            ],
            "ajax": {
                url: "<?= site_url('ItemController/getItems') ?>",
                method: 'POST',
                data : params
            }
        });
    }

    function setDropDownData(){
        $.ajax({
          url: "<?= site_url('ItemController/getDropDownData') ?>",
          dataType: 'json',
          method : 'POST',
          success: function(result) {
            var select = document.getElementById("colorlist");
            for(var i = 0; i < result.color.length; i++) {
                var option = document.createElement('option');
                option.text = option.value = result.color[i].color;
                select.add(option);
            }

            var select = document.getElementById("sizelist");
            for(var i = 0; i < result.size.length; i++) {
                var option = document.createElement('option');
                option.text = option.value = result.size[i].size;
                select.add(option);
            }

            var select = document.getElementById("grouplist");
            for(var i = 0; i < result.group.length; i++) {
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
