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
                <h3 class="box-title"> USER : <?php echo getSessionData('user_name') . ' / ' . date('d/m/Y / H:i'); ?> /
                    Edit :</h3>
                <button type="button" id="searchItem" class="btn btn-info pull-right"><i class="fa fa-search"></i>
                    Search Item
                </button>
            </div>
            <div class="box-body">
                <div class="col-md-7">
                    <div class="row form-group">
                        <label class="col-md-2 text-right"> Item Code : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control barCode" name="item_code">
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
                            <th class="col-md-1">SICode</th>
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
        <a class="btn btn-primary save pull-right">Save</a>
        <a class="btn btn-default" href="<?php echo site_url('salesBill'); ?>">Cancel</a>
    </div>
</div>

<div class="modal fade" id="save-modal">
    <div class="modal-dialog my-modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <form role="form" id="salesBill">
                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="box-body">
                                <div class="row">
                                    <label class="col-md-1 text-right"> Bill No : </label>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" name="TRBLNO" id="TRBLNO"
                                               value="<?php echo $billNo; ?>" readonly>
                                    </div>
                                    <label class="col-md-1 text-right"> Date : </label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="TRBLDT" id="TRBLDT"
                                               value="<?php echo date('d-m-Y'); ?>" readonly>
                                    </div>
                                    <label class="col-md-1 text-right"> Type : </label>
                                    <div class="col-md-2">
                                        <select class="form-control trtype" name="TRTYPE" id="TRTYPE">
                                            <option value="1"> Cash</option>
                                            <option value="2"> Debit</option>
                                            <option value="3"> Cr.Card-DebitCard</option>
                                            <option value="4"> Mobile Payment</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-1 text-right"> Prefix : </label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="CRDPREF"
                                               value="<?php echo getSessionData('prefix'); ?>" readonly>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    <label class="col-md-1 text-right"> No : </label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control crdnum" name="CRDNUM" id="CRDNUM">
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
                                            <div class="col-md-3">
                                                <select class="form-control" name="TRSALUT" id="TRSALUT">
                                                    <option value="Mr."> Mr.</option>
                                                    <option value="Miss"> Miss</option>
                                                    <option value="Mrs."> Mrs.</option>
                                                    <option value="Ms."> Ms.</option>
                                                </select>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control party" name="TRPRNM" id="TRPRNM"
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Address </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control address ad1" name="TRPAD1"
                                                       id="TRPAD1"/>
                                            </div>
                                            <div class="col-md-10 col-md-offset-2">
                                                <input type="text" class="form-control address ad2" name="TRPAD2"
                                                       id="TRPAD2"/>
                                            </div>
                                            <div class="col-md-10 col-md-offset-2">
                                                <input type="text" class="form-control address ad3" name="TRPAD3"
                                                       id="TRPAD3"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-right"> City </label>
                                            <div class="col-md-10">
                                                <input type="text" name="TRCITY" id="TRCITY" class="form-control city">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Phone-1 </label>
                                            <div class="col-md-3">
                                                <input type="number" min="10" max="10" name="TRPH1" id="TRPH1"
                                                       class="form-control ph1">
                                            </div>
                                            <label class="col-md-1 text-right"> D.O.B </label>
                                            <div class="col-md-3">
                                                <input type="text" name="TRDOB" id="TRDOB"
                                                       class="form-control datepicker dob">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Phone-2 </label>
                                            <div class="col-md-3">
                                                <input type="number" min="10" max="10" name="TRPH2" id="TRPH2"
                                                       class="form-control ph2">
                                            </div>
                                            <label class="col-md-1 text-right"> M.A.D. </label>
                                            <div class="col-md-3">
                                                <input type="text" name="TRMAD" id="TRMAD"
                                                       class="form-control datepicker mad">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Email </label>
                                            <div class="col-md-5">
                                                <input type="email" name="TREMAIL" id="TREMAIL"
                                                       class="form-control email">
                                            </div>
                                        </div>
                                        <div class="row crcrd">
                                            <label class="col-md-2 text-right"> Card No. </label>
                                            <div class="col-md-5">
                                                <input type="text" name="TRCRDNO" id="TRCRDNO" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row crcrd">
                                            <label class="col-md-2 text-right"> Exp.Dt </label>
                                            <div class="col-md-5">
                                                <input type="text" name="TRCRDEXP" id="TRCRDEXP"
                                                       class="form-control datepicker">
                                            </div>
                                        </div>
                                        <div class="row crcrd">
                                            <label class="col-md-2 text-right"> Card Holder </label>
                                            <div class="col-md-5">
                                                <input type="text" name="TRCRDHOLD" id="TRCRDHOLD" class="form-control">
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
                                                <input type="text" name="TRGROS" id="TRGROS" class="form-control gross"
                                                       readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Other </label>
                                            <div class="col-md-10">
                                                <input type="text" name="TROTH1" id="TROTH1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Other Amt </label>
                                            <div class="col-md-10">
                                                <input type="number" value="0" name="TROTH2" id="TROTH2"
                                                       class="form-control oth_amt">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <label class="col-md-3 text-right"> C/N-1 NO. </label>
                                            <div class="col-md-9">
                                                <input type="text" name="TRCN1" id="TRCN1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 text-right"> Amount </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="TRCN1AM" id="TRCN1AM">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 text-right"> C/N-2 NO. </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="TRCN2" id="TRCN2">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 text-right"> Amount </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="TRCN2AM" id="TRCN2AM">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 text-right"> Rnd Off </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control rndOff" name="TRRND" id="TRRND">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <label class="col-md-7 text-right"> Current Bill Points </label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control currBillPoint"
                                                       style="background: green;color: white"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-7 text-right"> Total Balance Point </label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control totBalPoint"
                                                       style="background: red;color: white"
                                                       disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Nett Amount Rs. </label>
                                            <div class="col-md-10">
                                                <input type="text" name="TRNET" id="TRNET"
                                                       class="form-control net_amount"
                                                       readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <label class="col-md-3 text-right"> Total Qty </label>
                                            <div class="col-md-9">
                                                <input type="text" name="TRTOTQTY" id="TRTOTQTY"
                                                       class="form-control m_t_qty"
                                                       readonly>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="box box-danger">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h3> DENOMINATION RECEIVED </h3>
                                        <div class="row">
                                            <label class="col-md-1 text-right dr_amount"> 2000 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="RC2000" id="RC2000"
                                                       class="form-control dr_note"
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
                                                <input type="text" name="RC500" id="RC500" class="form-control dr_note"
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
                                                <input type="text" name="RC200" id="RC200" class="form-control dr_note"
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
                                                <input type="text" name="RC100" id="RC100" class="form-control dr_note"
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
                                                <input type="text" name="RC50" id="RC50" class="form-control dr_note"
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
                                                <input type="text" name="RC20" id="RC20" class="form-control dr_note"
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
                                                <input type="text" name="RC10" id="RC10" class="form-control dr_note"
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
                                                <input type="text" name="RC5" id="RC5" class="form-control dr_note"
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
                                                <input type="text" name="RCMIS" id="RCMIS"
                                                       class="form-control dr_misc dr_value"
                                                       value="0">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-6 text-right"> Rcvd AMt. </label>
                                            <div class="col-md-5">
                                                <input type="text" name="EXRCVD" id="EXRCVD"
                                                       class="form-control dr_total"
                                                       value="0"
                                                       readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h3> DENOMINATION RETURNED </h3>
                                        <div class="row">
                                            <label class="col-md-1 text-right dre_amount"> 2000 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="PD2000" id="PD2000"
                                                       class="form-control dre_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dre_value" value="0"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dre_amount"> 500 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="PD500" id="PD500" class="form-control dre_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dre_value" value="0"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dre_amount"> 200 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="PD200" id="PD200" class="form-control dre_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dre_value" value="0"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dre_amount"> 100 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="PD100" id="PD100" class="form-control dre_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dre_value" value="0"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dre_amount"> 50 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="PD50" id="PD50" class="form-control dre_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dre_value" value="0"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dre_amount"> 20 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="PD20" id="PD20" class="form-control dre_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dre_value" value="0"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dre_amount"> 10 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="PD10" id="PD10" class="form-control dre_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dre_value" value="0"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1 text-right dre_amount"> 5 </label>
                                            <span class="col-md-1 text-right">X</span>
                                            <div class="col-md-3">
                                                <input type="text" name="PD5" id="PD5" class="form-control dre_note"
                                                       value="0">
                                            </div>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control dre_value" value="0"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-5 text-right dr_amount"> MISC. </label>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-5">
                                                <input type="text" name="PDMIS" id="PDMIS"
                                                       class="form-control dre_misc dre_value"
                                                       value="0">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-6 text-right"> Return to </label>
                                            <div class="col-md-5">
                                                <input type="text" name="EXBACK" id="EXBACK"
                                                       class="form-control dre_total"
                                                       value="0" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row ret_cus_div">
                                            <label class="col-md-4 text-right"> RETURN TO CUSTOMER </label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control ret_cus" value="0" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 text-right"> Nett Amt Rcvd </label>
                                            <div class="col-md-8">
                                                <input type="text" name="TRCRAMT" id="TRCRAMT"
                                                       class="form-control nett_amt_rcvd"
                                                       value="0" readonly>
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
            $('body').addClass("sidebar-collapse");
            $('.datepicker').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
            showTypeDetails();
            getSalesData();
            loadingStop();
            var items, itemsData, gTotalAmt = 0;
            var barCodeArray = [], itemsArray = [], cardData = {};

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

            $(".barCode").keyup(function (event) {
                if (event.keyCode == 13) {
                    $('.sales_code').focus();
                }
            });

            $(".barCode").focusout(function () {
                getIteminfo();
            });

            $(".sales_code").keyup(function (event) {
                if (event.keyCode == 13) {
                    addNewItem();
                }
            });

            $(".sales_code").focusout(function () {
                addNewItem();
            });

            $('.crdnum').change(function () {
                getDetailsByCard();
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

            $(document).on('change', '.trtype', function () {
                showTypeDetails();
            });

            $(document).on('change', ".qty", function () {
                total_amt();
            });

            $(document).on('change', ".d_per", function () {
                total_amt();
            });

            $(document).on('change', ".ph1", function () {
                getCardDetailsByMobile();
            });

            $('#searchItem').click(function () {
                window.open(site_url + "searchItem", "popupWindow", "width=1200, height=600, scrollbars=yes");
            });

            function getSalesData() {
                var billNo = "<?php echo $billNo ?>";
                $.ajax({
                    url: site_url + 'sales/getBillData/' + billNo,
                    dataType: 'JSON',
                    success: function (response) {
                        if (response.code) {
                            response = response.data;
                            setSalesData(response.billData);
                            setSalesItemData(response.itemsData);
                        }
                        else {
                            bootbox.alert(response.msg, function () {
                                window.location.href = site_url + 'salesBill';
                            });
                        }
                    }
                });
            }

            function setSalesData(billData) {

                var TRBLDT = new Date(billData.TRBLDT);
                $('#TRBLDT').val(TRBLDT.toString('d/M/yyyy'));
                $('#TRTYPE').val(billData.TRTYPE);
                $('#CRDNUM').val(billData.CRDNUM);
                $('#TRSALUT').val(billData.TRSALUT);
                $('#TRPRNM').val(billData.TRPRNM);
                $('#TRPAD1').val(billData.TRPAD1);
                $('#TRPAD2').val(billData.TRPAD2);
                $('#TRPAD3').val(billData.TRPAD3);
                $('#TRCITY').val(billData.TRCITY);
                $('#TRPH1').val(billData.TRPH1);
                $('#TRPH2').val(billData.TRPH2);
                $('#TREMAIL').val(billData.TREMAIL);
                $('#TRGROS').val(billData.TRGROS);
                $('#TROTH1').val(billData.TROTH1);
                $('#TROTH2').val(billData.TROTH2);
                $('#TRRND').val(billData.TRRND);
                $('#TRNET').val(billData.TRNET);
                $('#TRCRDNO').val(billData.TRCRDNO);
                $('#TRCRDHOLD').val(billData.TRCRDHOLD);
                $('#TRCRAMT').val(billData.TRCRAMT);
                $('#TRTOTQTY').val(billData.TRTOTQTY);
                $('#EXRCVD').val(billData.EXRCVD);
                $('#EXBACK').val(billData.EXBACK);
                $('#PD2000').val(billData.PD2000);
                $('#PD500').val(billData.PD500);
                $('#PD200').val(billData.PD200);
                $('#PD100').val(billData.PD100);
                $('#PD50').val(billData.PD50);
                $('#PD20').val(billData.PD20);
                $('#PD10').val(billData.PD10);
                $('#PD5').val(billData.PD5);
                $('#PDMIS').val(billData.PDMIS);
                $('#RC2000').val(billData.RC2000);
                $('#RC500').val(billData.RC500);
                $('#RC200').val(billData.RC200);
                $('#RC100').val(billData.RC100);
                $('#RC50').val(billData.RC50);
                $('#RC20').val(billData.RC20);
                $('#RC10').val(billData.RC10);
                $('#RC5').val(billData.RC5);
                $('#RCMIS').val(billData.RCMIS);
                $('#TRCN1').val(billData.TRCN1);
                $('#TRCN1AM').val(billData.TRCN1AM);
                $('#TRCN2').val(billData.TRCN2);
                $('#TRCN2AM').val(billData.TRCN2AM);
                var TRDOB = (billData.TRDOB) ? new Date(billData.TRDOB).toString('d/M/yyyy') : '';
                var TRMAD = (billData.TRMAD) ? new Date(billData.TRMAD).toString('d/M/yyyy') : '';
                $('#TRDOB').val(TRDOB);
                $('#TRMAD').val(TRMAD);
            }

            function setSalesItemData(itemsData) {
                var html = "";
                $.map(itemsData, function (items, key) {
                    itemsArray[items.TRITCD1] = items;
                    html += '<tr class="itemBarCode ' + items.BARCODF + '">';
                    html += '<td class="hide"> ' + items.TRITCD1 + '</td> ';
                    html += '<td> ' + items.TRITNM + '</td> ';
                    html += '<td> ' + items.TRCLR + '</td> ';
                    html += '<td> ' + items.TRSZ + '</td> ';
                    html += '<td> <input type="number" class="form-control qty" min=1 value="' + items.TRQTY + '" /> </td> ';
                    html += '<td> <label class="nt_amt">' + parseFloat(items.TRRATE).toFixed(2) + '</label> </td> ';
                    html += '<td> <label class="ntt_amt">' + 1 * parseFloat(items.TRRATE).toFixed(2) + '</label> </td> ';
                    html += '<td> <input type="number" class="form-control d_per" min=0 value="' + items.TRDS1 + '" /> </td> ';
                    html += '<td> <label class="d_amt">' + parseFloat(items.TRDS2).toFixed(2) + '</label> </td> ';
                    html += '<td> <label class="t_amt">' + parseFloat(items.TRRATE).toFixed(2) + '</label> </td> ';
                    html += '<td> <label class="i_salesCode">' + items.BARCODF + ' </label> </td> ';
                    html += '<td> ' + $('.sales_code').val() + ' </td> ';
                    html += '<td> <a class="btn btn-danger remove"> <i class="fa fa-trash-o"> </i> </a> </td> ';
                    html += '</tr> ';
                    barCodeArray.push(items.BARCODF);
                });
                $(".items").append(html);
                $(".dr_note").trigger('change');
                $(".dre_note").trigger('change');
                $(".dr_misc").trigger('change');
                $(".oth_amt").trigger('change');
                $(".dre_misc").trigger('change');
                $(".crdnum").trigger('change');
                showTypeDetails();
                getCardDetailsByMobile();
                total_amt();
            }

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
            }

            function addNewItem() {
                var barCode = $('.barCode').val().trim();
                if (barCode && items && barCodeArray.indexOf(items.BARCODF) !== -1) {
                    if ($('.sales_code').val()) {
                        $('tr.' + items.BARCODF).find('.i_salesCode').text($('.sales_code').val());
                    }
                    $('tr.' + items.BARCODF).find('.qty').val(parseInt($('tr.' + items.BARCODF).find('.qty').val()) + 1);
                    total_amt();
                } else if (items && barCode) {
                    html = '<tr class="itemBarCode ' + items.BARCODF + '">';
                    html += '<td class="hide"> ' + items.TRITCD1 + '</td> ';
                    html += '<td> ' + items.TRITNM + '</td> ';
                    html += '<td> ' + items.TRCOLOR + '</td> ';
                    html += '<td> ' + items.TRSZCD + '</td> ';
                    html += '<td> <input type="number" class="form-control qty" min=1 value=1 /> </td> ';
                    html += '<td> <label class="nt_amt">' + parseFloat(items.TRMRP1).toFixed(2) + '</label> </td> ';
                    html += '<td> <label class="ntt_amt">' + 1 * parseFloat(items.TRMRP1).toFixed(2) + '</label> </td> ';
                    html += '<td> <input type="number" class="form-control d_per" min=0 value="0.00" /> </td> ';
                    html += '<td> <label class="d_amt">' + ((0).toFixed(2)) + '</label> </td> ';
                    html += '<td> <label class="t_amt">' + parseFloat(items.TRMRP1).toFixed(2) + '</label> </td> ';
                    html += '<td> <label class="i_salesCode">' + items.BARCODF + ' </label> </td> ';
                    html += '<td> ' + $('.sales_code').val() + ' </td> ';
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

            function showTypeDetails() {
                var type = $(".trtype").val();
                switch (parseInt(type)) {
                    case 1:
                        $(".crcrd").hide();
                        break;
                    case 2:
                        $(".crcrd").hide();
                        break;
                    case 3:
                        $(".crcrd").show();
                        break;
                    case 4:
                        $(".crcrd").hide();
                        break;
                }
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
                $.each($('.dr_value'), function () {
                    t += parseFloat($(this).val());
                });
                $('.dr_total').val(t);
                nett_amt_rcvd();
            }

            function dre_total() {
                var t = 0;
                $.each($('.dre_value'), function () {
                    t += parseFloat($(this).val());
                });
                $('.dre_total').val(t);
                nett_amt_rcvd();
            }

            function nett_amt_rcvd() {
                $('.nett_amt_rcvd').val(parseFloat($('.dr_total').val()) - parseFloat($('.dre_total').val()));
                var ret_cus = parseFloat($('.dr_total').val()) - parseFloat($('.net_amount').val()) - parseFloat($('.dre_total').val());
                if (ret_cus > 0) {
                    $('.ret_cus_div').show();
                    $('.ret_cus').text(ret_cus);
                } else {
                    $('.ret_cus_div').hide();
                }
                var netAmt = parseFloat(parseFloat(gTotalAmt) + parseFloat($('.oth_amt').val())).toFixed(2);
                var rndOff = parseFloat(Math.round(netAmt) - parseFloat(netAmt)).toFixed(2);
                netAmt = parseFloat(parseFloat(netAmt) + parseFloat(rndOff)).toFixed(2);
                $('.net_amount').val(netAmt);
                $('.rndOff').val(rndOff);
//                $('.net_amount').val(parseFloat($('.gross').val()) + parseFloat($('.oth_amt').val()));
            }

            function setItemsData() {
                var _itemsData = [];
                $("tr.itemBarCode").each(function () {
                    var col = $(this).find("td");
                    var itcd = col.eq(0).text().trim();
                    var qty = parseFloat(col.eq(4).find('.qty').val().trim());
                    var rate = parseFloat(col.eq(5).text().trim());
                    var disamt = parseFloat(col.eq(8).text().trim());
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
                        TRBLNO1: "<?php echo $billNo; ?>",// BillNo
                        TRITCD: itcd,//Item Id
                        TRSZ: col.eq(3).text().trim(),//Size
                        TRCLR: col.eq(2).text().trim(),//Color
//                        TRBRCD: col.eq(10).text().trim(),//Barcode
                        TRQTY: qty,//Qty
                        TRRATE: rate,//Rate
                        TRDS1: col.eq(7).find('.d_per').val().trim(),//Dis. %
                        TRDS2: disamt,//Dis Amt
                        TRBLAMT: netAmt,//Net Amt
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
                        TRFABV: aboveAmt,
                        branchcode1: "<?php echo getSessionData('branch_code') ?>",
                        fin_year1: "<?php echo fin_year() ?>"
                    };
                    _itemsData.push(data);
                });
                return _itemsData;
            }

            function saveBill() {
                var salesData = $("#salesBill").serializeObject();

                $.ajax({
                    url: site_url + "sales/update",
                    dataType: 'json',
                    type: "POST",
                    data: {
                        "salesData": salesData,
                        "itemsData": itemsData,
                        "cardData": cardData
                    },
                    success: function (response) {
                        bootbox.alert(response.msg);
                        $("#save-modal").modal('hide');
                        bootbox.confirm({
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
                                window.location.href = (result) ? site_url + "salesPrint/" + <?php echo $billNo; ?> : site_url + "salesBill";
                            }
                        });
                    }
                });
            }

            function getDetailsByCard() {

                var cardNo = $('.crdnum').val().trim();
                if (cardNo) {
                    loadingStart();
                    var data = {
                        cardNo: cardNo
                    };
                    $.ajax({
                        url: site_url + 'membershipcard/details',
                        type: 'POST',
                        dataType: 'JSON',
                        data: data,
                        success: function (response) {
                            if (response.code) {
                                data = response.data;
                                var dob = new Date(data.DATEOFB);
                                dob = dob.toString("dd/MM/yyyy");
                                var mad = new Date(data.MDATE);
                                mad = mad.toString("dd/MM/yyyy");
                                $('.party').val(data.NAME);
                                $('.ad1').val(data.ADR1);
                                $('.ad2').val(data.ADR2);
                                $('.ad3').val(data.ADR3);
                                $('.city').val(data.CITY);
                                $('.ph1').val(data.MOBILENO);
                                $('.ph2').val(data.PHONENO);
                                $('.email').val(data.EMAIL);
                                $(".dob").datepicker("setDate", dob);
                                $(".mad").datepicker("setDate", mad);
                            }
                            else {
                                bootbox.alert(response.msg, function () {
                                    $('.crdnum').val('');
                                });
                            }
                            setCurrPoints(data.totalPoints);
                            loadingStop();
                        }
                    });
                }
            }

            function getCardDetailsByMobile() {
                var mobileNo = $('.ph1').val();
                if (mobileNo) {
                    var data = {
                        mobileNo: mobileNo
                    };
                    $.ajax({
                        url: site_url + 'sales/getCardByMobile',
                        type: 'POST',
                        dataType: 'JSON',
                        data: data,
                        success: function (response) {
                            if (response.code) {
                                data = response.data;
                                var party = $('.party').val();
                                var ad1 = $('.ad1').val();
                                var ad2 = $('.ad2').val();
                                var ad3 = $('.ad3').val();
                                var city = $('.city').val();

                                party = (party) ? party : data.LONAME;
                                ad1 = (ad1) ? ad1 : data.TRPAD1;
                                ad2 = (ad2) ? ad2 : data.TRPAD2;
                                ad3 = (ad3) ? ad3 : data.TRPAD3;
                                city = (city) ? city : data.TRCITY;

                                var discPer = data.LODISCPR;

                                $('.party').val(party);
                                $('.ad1').val(ad1);
                                $('.ad2').val(ad2);
                                $('.ad3').val(ad3);
                                $('.city').val(city);

                                $(".d_per").each(function () {
                                    $(this).val(discPer);
                                });

                                total_amt();
                                gTotalAmt = 0;
                                itemsData = setItemsData();
                                total_amt();
                            }
                        }
                    });
                }
            }

            function setCurrPoints(totalPoints) {

                var _pointAmt = 0;
                var crdHolPoint = "<?php echo getSessionData('chnoofpoints'); ?>";
                var crdHolVal = "<?php echo getSessionData('chrs'); ?>";
                for (var i = 0; i < itemsData.length; i++) {
                    if (!parseFloat(itemsData[i].TRDS1)) {
                        _pointAmt += parseFloat(itemsData[i].TRBLAMT);
                    }
                }
                var currBillPoint = parseFloat((_pointAmt * crdHolPoint) / crdHolVal).toFixed(2);
                if (currBillPoint) {
                    cardData = {
                        BILLNO: "<?php echo $billNo; ?>",// BillNo
                        BILLDT: "<?php echo date('Y-m-d'); ?>",
                        FINYEAR: "<?php echo fin_year(array("full" => true));?>",
                        BILLVALUE: $('.net_amount').val(),
                        PREFIX1: "<?php echo getSessionData('prefix'); ?>",
                        CARDNO1: $('.crdnum').val(),
                        CREDITCRD1: currBillPoint,
                        APVALUE: $('.n_amt').val(),
                        branch_code: "<?php echo getSessionData('branch_code');?>"
                    };
                }
                totalPoints = parseFloat(totalPoints) + parseFloat(currBillPoint);
                $('.currBillPoint').val(currBillPoint);
                $('.totBalPoint').val(totalPoints);
            }

        });

    }(jQuery));

</script>

<?php $this->load->view('include/page_footer.php'); ?>
