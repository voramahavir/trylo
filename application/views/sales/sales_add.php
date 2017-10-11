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
            </div>
            <div class="box-body">
              <div class="row form-group">
                <label class="col-md-2 text-right"> Item Code : </label>
                <div class="col-md-6">
                  <input type="text" class="form-control barCode" name="item_code" autocapitalize="characters">
                </div>
                <span><b>PUT BARCODE OR GUN IN THIS BOX</b></span>
              </div>
              <div class="row form-group">
                <label class="col-md-2 text-right"> Sales Code : </label>
                <div class="col-md-3">
                  <input type="text" class="form-control sales_code" name="sales_code">
                </div>
              </div>
              <p class="col-md-offset-2"><b>TYPE "EXIT" IN THE ABOVE BOX TO FINISH THE BILL</b></p>
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
                <label class="col-md-1 text-right"> Rate Rs. : </label>
                <div class="col-md-2">
                  <input type="text" class="form-control rate_rs" disabled>
                </div>
              </div>
              <div class="row">
                <label class="col-md-2 text-right"> Disc(%) : </label>
                <div class="col-md-2">
                  <input type="text" class="form-control disc" disabled>
                </div>
                <label class="col-md-1 text-right"> Disc.Amt : </label>
                <div class="col-md-2">
                  <input type="text" class="form-control disc_amt" disabled>
                </div>
              </div>
              <div class="row">
                <label class="col-md-2 text-right"> Nett.Amt : </label>
                <div class="col-md-2">
                  <input type="text" class="form-control net_amt" disabled>
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
                      <th>Name of Item</th>
                      <th>Color</th>
                      <th>Size</th>
                      <th>Qnty</th>
                      <th>Rate Rs.</th>
                      <th>Amount Rs.</th>
                      <th>Disc(%)</th>
                      <th>Disc. Amt</th>
                      <th>Total Amount</th>
                      <th>BarCode</th>
                      <th>SICode</th>
                      <th>Action</th>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#save-modal">Save</button>
        </div>
      </div>

      <div class="modal fade" id="save-modal">
        <div class="modal-dialog my-modal-lg">
          <div class="modal-content">
            <div class="modal-body">
              <div class="col-md-12">
                <div class="box">
                  <div class="box-body">
                    <div class="row">
                      <label class="col-md-2 text-right"> Date : </label>
                      <div class="col-md-2">
                        <input type="text" class="form-control" name="date" value="<?php echo date('d-m-Y');?>">
                      </div>
                      <label class="col-md-1 text-right"> Type : </label>
                      <div class="col-md-2">
                        <select class="form-control">
                          <option> Cash </option>
                          <option> Debit </option>
                          <option> Cr.Card-DebitCard </option>
                          <option> Mobile Payment </option>
                        </select>
                      </div>
                      <label class="col-md-2 text-right"> Salesman : </label>
                      <div class="col-md-3">
                        <select class="form-control">
                          <option> Salesman 1</option>
                          <option> Salesman 2</option>
                          <option> Salesman 3</option>
                          <option> Salesman 4</option>
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
              </div>
              <div class="col-md-12">
                <div class="box">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="row">
                          <label class="col-md-2 text-right"> Party  </label>
                          <div class="col-md-3">
                            <select class="form-control">
                              <option> Mr. </option>
                              <option> Miss </option>
                              <option> Mrs. </option>
                              <option> Ms. </option>
                            </select>
                          </div>
                          <div class="col-md-7">
                            <input type="text" class="form-control" name="customer_name" value="">
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-2 text-right"> Address  </label>
                          <div class="col-md-10">
                            <textarea class="form-control" name="address"></textarea>
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-2 text-right"> City  </label>
                          <div class="col-md-10">
                            <input type="text" name="city" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="row">
                          <label class="col-md-2 text-right"> Phone-1  </label>
                          <div class="col-md-3">
                            <input type="text" name="phone1" class="form-control">
                          </div>
                          <label class="col-md-1 text-right"> D.O.B </label>
                          <div class="col-md-3">
                            <input type="text" name="dob" class="form-control">
                          </div>
                          
                        </div>
                        <div class="row">
                          <label class="col-md-2 text-right"> Phone-2  </label>
                          <div class="col-md-3">
                            <input type="text" name="phone2" class="form-control">
                          </div>
                          <label class="col-md-1 text-right"> M.A.D.  </label>
                          <div class="col-md-3">
                            <input type="text" name="mad" class="form-control">
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-2 text-right"> Email  </label>
                          <div class="col-md-5">
                            <input type="email" name="email" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="box">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="row">
                          <label class="col-md-2 text-right"> Gross </label>
                          <div class="col-md-10">
                            <input type="text" name="gross" class="form-control" disabled>
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-2 text-right"> Disc(%) </label>
                          <div class="col-md-4">
                            <input type="text" name="disc" class="form-control" disabled>
                          </div>
                          <label class="col-md-1 text-right"> Amt: </label>
                          <div class="col-md-5">
                            <input type="text" name="amt" class="form-control" disabled>
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-2 text-right"> Other </label>
                          <div class="col-md-10">
                            <input type="text" name="oth" class="form-control">
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-3 text-right"> Other Amt </label>
                          <div class="col-md-9">
                            <input type="text" class="form-control oth_amt">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="row">
                          <label class="col-md-3 text-right"> C/N-1 NO. </label>
                          <div class="col-md-9">
                            <input type="text" class="form-control">
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-3 text-right"> Amount </label>
                          <div class="col-md-9">
                            <input type="text" class="form-control">
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-3 text-right"> C/N-2 NO. </label>
                          <div class="col-md-9">
                            <input type="text" class="form-control">
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-3 text-right"> Amount </label>
                          <div class="col-md-9">
                            <input type="text" class="form-control">
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-3 text-right"> Rnd Off </label>
                          <div class="col-md-9">
                            <input type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="row">
                          <label class="col-md-7 text-right"> Current Bill Points </label>
                          <div class="col-md-5">
                            <input type="text" class="form-control" style="background: green" disabled>
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-7 text-right"> Total Balance Point </label>
                          <div class="col-md-5">
                            <input type="text" class="form-control" style="background: red" disabled>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="row">
                          <label class="col-md-3 text-right"> Nett Amount Rs. </label>
                          <div class="col-md-9">
                            <input type="text" class="form-control net_amount" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <label class="col-md-3 text-right"> Total Qty </label>
                          <div class="col-md-9">
                            <input type="text" class="form-control" disabled>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">  
                <div class="box">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-4">
                        <h3> DENOMINATION RECEIVED </h3>
                        <div class="row">
                          <label class="col-md-1 text-right dr_amount"> 2000 </label>
                          <span class="col-md-1 text-right">X</span>
                          <div class="col-md-3">
                            <input type="text" class="form-control dr_note" value="0">
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
                            <input type="text" class="form-control dr_note" value="0">
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
                            <input type="text" class="form-control dr_note" value="0">
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
                            <input type="text" class="form-control dr_note" value="0">
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
                            <input type="text" class="form-control dr_note" value="0">
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
                            <input type="text" class="form-control dr_note" value="0">
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
                            <input type="text" class="form-control dr_note" value="0">
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
                            <input type="text" class="form-control dr_misc dr_value" value="0">
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-6 text-right"> Rcvd AMt. </label>
                          <div class="col-md-5">
                            <input type="text" class="form-control dr_total" value="0">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <h3> DENOMINATION RETURNED </h3>
                        <div class="row">
                          <label class="col-md-1 text-right dre_amount"> 2000 </label>
                          <span class="col-md-1 text-right">X</span>
                          <div class="col-md-3">
                            <input type="text" class="form-control dre_note" value="0">
                          </div>
                          <span class="col-md-1">'=</span>
                          <div class="col-md-5">
                            <input type="text" class="form-control dre_value" value="0" disabled>
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-1 text-right dre_amount"> 500 </label>
                          <span class="col-md-1 text-right">X</span>
                          <div class="col-md-3">
                            <input type="text" class="form-control dre_note" value="0">
                          </div>
                          <span class="col-md-1">'=</span>
                          <div class="col-md-5">
                            <input type="text" class="form-control dre_value" value="0" disabled>
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-1 text-right dre_amount"> 100 </label>
                          <span class="col-md-1 text-right">X</span>
                          <div class="col-md-3">
                            <input type="text" class="form-control dre_note" value="0">
                          </div>
                          <span class="col-md-1">'=</span>
                          <div class="col-md-5">
                            <input type="text" class="form-control dre_value" value="0" disabled>
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-1 text-right dre_amount"> 50 </label>
                          <span class="col-md-1 text-right">X</span>
                          <div class="col-md-3">
                            <input type="text" class="form-control dre_note" value="0">
                          </div>
                          <span class="col-md-1">'=</span>
                          <div class="col-md-5">
                            <input type="text" class="form-control dre_value" value="0" disabled>
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-1 text-right dre_amount"> 20 </label>
                          <span class="col-md-1 text-right">X</span>
                          <div class="col-md-3">
                            <input type="text" class="form-control dre_note" value="0">
                          </div>
                          <span class="col-md-1">'=</span>
                          <div class="col-md-5">
                            <input type="text" class="form-control dre_value" value="0" disabled>
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-1 text-right dre_amount"> 10 </label>
                          <span class="col-md-1 text-right">X</span>
                          <div class="col-md-3">
                            <input type="text" class="form-control dre_note" value="0">
                          </div>
                          <span class="col-md-1">'=</span>
                          <div class="col-md-5">
                            <input type="text" class="form-control dre_value" value="0" disabled>
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-1 text-right dre_amount"> 5 </label>
                          <span class="col-md-1 text-right">X</span>
                          <div class="col-md-3">
                            <input type="text" class="form-control dre_note" value="0">
                          </div>
                          <span class="col-md-1">'=</span>
                          <div class="col-md-5">
                            <input type="text" class="form-control dre_value" value="0" disabled>
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-5 text-right dr_amount"> MISC. </label>
                          <span class="col-md-1">'=</span>
                          <div class="col-md-5">
                            <input type="text" class="form-control dre_misc dre_value" value="0">
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-6 text-right"> Return to </label>
                          <div class="col-md-5">
                            <input type="text" class="form-control dre_total" value="0">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <h3> RETURN TO CUSTOMER </h3>
                        <h3 class="ret_cus">  </h3>
                        <div class="row">
                          <label class="col-md-4 text-right"> Nett Amt Rcvd </label>
                          <div class="col-md-8">
                            <input type="text" class="form-control nett_amt_rcvd" value="0">
                          </div>
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
        (function($){
          $(document).ready(function() {
            loadingStop();
            var items;
            var barCodeArray = [];
            
            $("input, textarea").keyup(function() {
                var val = $(this).val()
                $(this).val(val.toUpperCase());
            });

            $(".dr_note").change(function () {
              var p = $(this).parent().parent();
              if ($(this).val() > 0) {
                p.find('.dr_value').val(p.find('.dr_amount').text().trim() * $(this).val());
              } else {
                p.find('.dr_value').val(0);
              }
              dr_total();
            });

            $(".dre_note").change(function () {
              var p = $(this).parent().parent();
              if ($(this).val() > 0) {
                p.find('.dre_value').val(p.find('.dre_amount').text().trim() * $(this).val());
              } else {
                p.find('.dre_value').val(0);
              }
              dre_total();
            });

            $(".dr_misc").change(function () {
              dr_total();
            });

            $(".oth_amt").change(function () {
              nett_amt_rcvd();
            });

            $(".dre_misc").change(function () {
              dre_total();
            });

            $(".barCode").keyup(function(event) {
                if(event.keyCode == 13) {
                  $('.sales_code').focus();
                }
            });

            $(".barCode").focusout(function() {
                getIteminfo();
            });

            $(".sales_code").keyup(function(event) {
                if(event.keyCode == 13) {
                  addNewItem();
                }
            });

            $(".sales_code").focusout(function() {
                addNewItem();
            });

            $(document).on('click', '.remove', function() {
              $(this).parent().parent().remove();
              index = barCodeArray.indexOf(items.BARCODF);
              if (index > -1) {
                barCodeArray.splice(index, 1);
              }
            });

            function getIteminfo() {
              var barCode = $(".barCode").val().trim();
              if (barCode) {
                loadingStart();
                $.ajax({
                  url: "<?php echo site_url('sales/getItemInfo'); ?>" + "?barCode=" + barCode,
                  dataType: 'json',
                  success: function(result) {
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
              $('.item_name').val(result.TRITNM);
              $('.size').val(result.TRSZCD);
              $('.color').val(result.TRCOLOR);
              $('.qtny').val(1);
              $('.rate_rs').val(parseFloat(result.TRMRP1).toFixed(2));
              $('.disc').val((0).toFixed(2));
              $('.disc_amt').val((0).toFixed(2));
              $('.net_amt').val(parseFloat(result.TRMRP1).toFixed(2));
            }

            function addNewItem() {
              var barCode = $('.barCode').val().trim();
              if (barCode && items && barCodeArray.indexOf(items.BARCODF) !== -1) {
                $('tr.'+items.BARCODF).find('.qty').val(parseInt($('tr.'+ items.BARCODF).find('.qty').val()) + 1);
                clear();
                $('.barCode').focus();
              } else if (items && barCode) {
                html = '<tr class="itemBarCode '+ items.BARCODF + '">';
                html +=   '<td> ' + items.TRITNM + '</td> ';
                html +=   '<td> ' + items.TRCOLOR + '</td> ';
                html +=   '<td> ' + items.TRSZCD + '</td> ';
                html +=   '<td> <input type="number" class="form-control qty" value=1 /> </td> ';
                html +=   '<td> <label class="nt_amt"' + parseFloat(items.TRMRP1).toFixed(2) + '</label> </td> ';
                html +=   '<td> <label class="ntt_amt"' + 1 *  parseFloat(items.TRMRP1).toFixed(2) + '</label> </td> ';
                html +=   '<td> <input type="number" class="form-control d_per" value="0.00" /> </td> ';
                html +=   '<td> <label class="d_amt">' + ((0).toFixed(2)) + '</label> </td> ';
                html +=   '<td> <label class="t_amt">' + parseFloat(items.TRMRP1).toFixed(2) + '</label> </td> ';
                html +=   '<td> ' + items.BARCODF + '</td> ';
                html +=   '<td> ' + $('.sales_code').val() + ' </td> ';
                html +=   '<td> <a class="btn btn-danger remove"> <i class="fa fa-trash-o"> </i> </a> </td> ';
                html += '</tr> ';
                $(".items").append(html);
                barCodeArray.push(items.BARCODF);
                clear();
                $('.barCode').focus();
              } else {
                clear();
              }
              total_amt();
            }

            function total_amt() {
              var amount, total, disc_amount;
              $.each($('.itemBarCode'), function () {
                amount = parseInt($(this).find('.qty').val()) * parseInt($(this).find('.nt_amt').text());
                disc_amount = parseInt($(this).find('.d_per')) * amount / 100;
                total = amount - disc_amount;
                $(this).find('.ntt_amt').text(amount);
                $(this).find('.d_amt').text(disc_amount);
                $(this).find('.t_amt').text(total);
              })
            }

            function dis_per(p, f) {
              return ((p - f) * 100 / p).toFixed(2);
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
              $('.sales_code').val('');
            }

            function loadingStart() {
              $('.overlay').show();
            }

            function loadingStop() {
              $('.overlay').hide();
            }

            function dr_total() {
              var t = 0;
              $.each($('.dr_value'), function() {
                t += parseInt($(this).val());
              });
              $('.dr_total').val(t);
            }

            function dre_total() {
              var t = 0;
              $.each($('.dre_value'), function() {
                t += parseInt($(this).val());
              });
              $('.dre_total').val(t);
            }

            function nett_amt_rcvd() {
              $('.nett_amt_rcvd').val(parseInt($('.dr_total').val()) - parseInt($('.dre_total').val()));  
              $('.ret_cus').text(parseInt($('.dr_total').val()) - parseInt($('.net_amount').val()) -  - parseInt($('.dre_total').val()));
            }

          });

        }(jQuery));

      </script>

<?php $this->load->view('include/page_footer.php'); ?>
