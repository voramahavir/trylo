<?php $this->load->view('include/template/common_header'); ?>
<style type="text/css">
    .search-bill-header {
        padding-bottom: 0;
    }
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
                    <div class="col-md-4 col-md-offset-8">
                        <div class="label-default col-md-12" style="padding: 1% 0;">
                            <label class="col-md-3 lblamt no-padding text-right"> Total Qty </label>
                            <div class="col-md-3">
                                <input type="text" class="form-control t_qty text-center text-bold fs-16" value="0"
                                       disabled>
                            </div>
                            <label class="col-md-3 lblamt no-padding text-right"> Nett Amount </label>
                            <div class="col-md-3">
                                <input type="text" class="form-control n_amt text-center text-bold fs-16" value="0"
                                       disabled>
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
                                    <div class="col-md-1 no-padding">
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
                                    <label class="col-md-1 text-right"> Prefix : </label>
                                    <div class="col-md-1 no-padding">
                                        <input type="text" class="form-control" name="CRDPREF"
                                               value="<?php echo getSessionData('prefix'); ?>" readonly>
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
                                        <div class="row drcrd">
                                            <label class="col-md-2 text-right">Party:</label>
                                            <div class="col-md-10">
                                                <select name="TRPRCD" id="TRPRCD" class="form-control">
                                                    <option value="">Select Party</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Party </label>
                                            <div class="col-md-3 no-pad-right">
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
                                            <div class="col-md-3">
                                                <button type="button" class="btn btn-primary search-bill"><i
                                                            class="fa fa-search"></i>
                                                    Search Party Bill
                                                </button>
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
                                        <div class="row mobpay">
                                            <label class="col-md-2 text-right"> Card Type. </label>
                                            <div class="col-md-5">
                                                <select name="TRPMCTY" id="TRPMCTY" class="form-control">
                                                    <option value="">Select Card Type</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mobpay">
                                            <label class="col-md-2 text-right"> Mobile No </label>
                                            <div class="col-md-5">
                                                <input type="text" name="TRPMMOB" id="TRPMMOB" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mobpay">
                                            <label class="col-md-2 text-right"> Name </label>
                                            <div class="col-md-5">
                                                <input type="text" name="TRPMNAM" id="TRPMNAM" class="form-control">
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
                                            <div class="col-md-4">
                                                <input type="text" name="TROTH1" id="TROTH1" class="form-control">
                                            </div>
                                            <label class="col-md-1 text-right"> Amt </label>
                                            <div class="col-md-5">
                                                <input type="number" value="0" name="TROTH2" id="TROTH2"
                                                       class="form-control oth_amt">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Rnd Off </label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control rndOff" name="TRRND" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <label class="col-md-3 text-right"> C/N-1 NO. </label>
                                            <div class="col-md-3">
                                                <input type="text" name="TRCN1" class="form-control" id="TRCN1"
                                                       value="0">
                                            </div>
                                            <label class="col-md-2 text-right"> Amount </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="TRCN1AM" id="TRCN1AM"
                                                       value="0">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 text-right"> C/N-2 NO. </label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="TRCN2" id="TRCN2"
                                                       value="0">
                                            </div>
                                            <!--</div>
                                            <div class="row">-->
                                            <label class="col-md-2 text-right"> Amount </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="TRCN2AM" id="TRCN2AM"
                                                       value="0">
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
                                        <div class="row hide redpoints">
                                            <div class="col-md-1 col-md-offset-1">
                                                <input type="checkbox" id="redPoints">
                                            </div>
                                            <label class="col-md-7 no-padding"> RE-DEEM THIS POINT</label>
                                            <div class="col-md-12 hide points-div">
                                                <div class="row">
                                                    <label class="col-md-7 text-right"> Re-Deem Point </label>
                                                    <div class="col-md-5">
                                                        <input type="text" name="CRREDPN" id="CRREDPN"
                                                               class="form-control redeem-point" value="0" readonly>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-7 text-right"> Re-Deem Amount </label>
                                                    <div class="col-md-5">
                                                        <input type="text" name="CRREDAM" id="CRREDAM"
                                                               class="form-control redeem-amt" value="0" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row label-default" style="padding: 15px 0;">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <label class="col-md-5 text-right text-danger lblamt"> Nett Amount
                                                Rs. </label>
                                            <div class="col-md-5">
                                                <input type="text" name="TRNET" id="TRNET"
                                                       class="form-control net_amount text-bold text-right"
                                                       readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <label class="col-md-3 text-right text-primary lblamt"> Total Qty </label>
                                            <div class="col-md-5">
                                                <input type="text" name="TRTOTQTY" id="TRTOTQTY"
                                                       class="form-control m_t_qty text-bold text-right"
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
                                            <div class="col-md-4">
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
                                            <div class="col-md-4">
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
                                            <div class="col-md-4">
                                                <input type="text" class="form-control dr_value" value="0" disabled>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" class="btn btn-success set-denom"><i
                                                            class="fa fa-arrow-circle-right fa-lg"></i></button>
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
                                            <div class="col-md-4">
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
                                            <div class="col-md-4">
                                                <input type="text" class="form-control dr_value" value="0" disabled>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" class="btn btn-primary show-denom"><i
                                                            class="fa fa-line-chart fa-lg"></i></button>
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
                                            <div class="col-md-4">
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
                                            <div class="col-md-4">
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
                                            <div class="col-md-4">
                                                <input type="text" class="form-control dr_value" value="0" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-5 text-right"> MISC. </label>
                                            <span class="col-md-1">'=</span>
                                            <div class="col-md-4">
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
                                        <div class="row ret_cus_div label-info text-center" style="margin-top: 15%">
                                            <h2 class="text-bold"> RETURN TO CUSTOMER </h2>
                                            <!--<div class="col-md-8">
                                                <input type="text" class="form-control ret_cus" value="0" readonly>
                                            </div>-->
                                            <label class="ret_cus h2 text-bold">0.00</label>
                                        </div>
                                        <div class="row label-danger text-center"
                                             style="margin-top: 10%;">
                                            <h3 class="text-bold"> Nett Amt Rcvd </h3>
                                            <!--<label class="col-md-4 text-right"> Nett Amt Rcvd </label>-->
                                            <!--<div class="col-md-8">-->
                                            <label class="nett_amt_rcvd_label h3 text-bold">0.00</label>
                                            <input type="hidden" name="TRCRAMT" id="TRCRAMT"
                                                   class="form-control nett_amt_rcvd text-bold"
                                                   value="0" readonly>
                                            <!--</div>-->
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

<div class="modal fade" id="bilsearch-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header search-bill-header">
                <div class="row">
                    <div class="col-md-12 radio">
                        <label> <input type="radio" class="radio-inline" id="type" name="type" value="1"
                                       checked> Party Name Wise </label>
                        <label> <input type="radio" class="radio-inline" id="type" name="type" value="2">
                            Mobile No Wise
                        </label>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2 searchtype"> Party Name: </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control searchtypeval"
                               value="">
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="search_bill_table" class="table table-bordered table-hover dataTable"
                               role="grid">
                            <thead>
                            <tr role="row">
                                <th class="col-md-1 text-center">Bill No.</th>
                                <th class="col-md-1 text-center">Date</th>
                                <th class="col-md-2 text-center">Name of Party</th>
                                <th class="col-md-1 text-center">Mobile No</th>
                                <th class="col-md-1 text-center">Amt Rs.</th>
                                <th class="col-md-1 text-center">PntEarn</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="search_bill_item_table" class="table table-bordered table-hover dataTable"
                               role="grid">
                            <thead>
                            <tr role="row">
                                <th class="col-md-2 text-center">Item Name</th>
                                <th class="col-md-1 text-center">Size</th>
                                <th class="col-md-1 text-center">Color</th>
                                <th class="col-md-1 text-center">Qty</th>
                                <th class="col-md-1 text-center">Rate Rs.</th>
                                <th class="col-md-1 text-center">Disc.Rs.</th>
                                <th class="col-md-1 text-center">Amount Rs.</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="red-otp">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header search-bill-header">
                <div class="row">
                    <div class="col-md-12">
                        <label>
                            Please Collect Redeem OTP ID from Customer to Authenticate.
                            An OTP ID message received on customer registered mobile
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <label class="col-md-2">Code:</label>
                        <div class="col-md-8">
                            <input type="text" id="redotp" class="form-control" value="0"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary savePoints">Authenticate</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="show-denom">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-12">
                        <label>
                            View Currency Stock
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    Currency
                                </th>
                                <th>
                                    Qnty
                                </th>
                                <th>
                                    Amount RS.
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Rs. 2000 X</td>
                                <td class="F2000"></td>
                                <td class="F2000A"></td>
                            </tr>
                            <tr>
                                <td>Rs. 500 X</td>
                                <td class="F500"></td>
                                <td class="F500A"></td>
                            </tr>
                            <tr>
                                <td>Rs. 200 X</td>
                                <td class="F200"></td>
                                <td class="F200A"></td>
                            </tr>
                            <tr>
                                <td>Rs. 100 X</td>
                                <td class="F100"></td>
                                <td class="F100A"></td>
                            </tr>
                            <tr>
                                <td>Rs. 50 X</td>
                                <td class="F50"></td>
                                <td class="F50A"></td>
                            </tr>
                            <tr>
                                <td>Rs. 20 X</td>
                                <td class="F20"></td>
                                <td class="F20A"></td>
                            </tr>
                            <tr>
                                <td>Rs. 10 X</td>
                                <td class="F10"></td>
                                <td class="F10A"></td>
                            </tr>
                            <tr>
                                <td>Rs. 5 X</td>
                                <td class="F5"></td>
                                <td class="F5A"></td>
                            </tr>
                            <tr>
                                <td>Rs. MISC X</td>
                                <td class="FMISC"></td>
                                <td class="FMISCA"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-12">
                        <label class="label-danger pull-right totalDenom col-sm-7">
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->

<?php $this->load->view('include/template/common_footer'); ?>
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script type="text/javascript">
    var search_bill_table = "", type = 1, showInitialRedeem = 0, hasInitialCard = 0, denomData = {};
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
                    nett_amt_rcvd();
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

            $('#TRPMCTY').change(function () {
                $('#TRPMMOB').val($('#TRPH1').val());
                $('#TRPMNAM').val($('#TRPRNM').val());
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
                getLoyalty();
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
                $('#TRPRCD').val(billData.TRPRCD);
                $('#CRDNUM').val(billData.CRDNUM);
                if (billData.CRDNUM) hasInitialCard = 1;
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
                $('#TRPMCTY').val(billData.TRPMCTY);
                $('#TRPMMOB').val(billData.TRPMMOB);
                $('#TRPMNAM').val(billData.TRPMNAM);
                var TRDOB = (billData.TRDOB) ? new Date(billData.TRDOB).toString('d/M/yyyy') : '';
                var TRMAD = (billData.TRMAD) ? new Date(billData.TRMAD).toString('d/M/yyyy') : '';
                var TRCRDEXP = (billData.TRCRDEXP) ? new Date(billData.TRCRDEXP).toString('d/M/yyyy') : '';
                $('#TRDOB').val(TRDOB);
                $('#TRMAD').val(TRMAD);
                $('#TRCRDEXP').val(TRCRDEXP);
                if (billData.CRREDPN) {
                    $("#redPoints").prop("checked", true);
                    showInitialRedeem = 1;
                    $(".points-div").removeClass("hide");
                    $('#CRREDPN').val(billData.CRREDPN);
                    $('#CRREDAM').val(billData.CRREDAM);
                }
            }

            function setSalesItemData(_itemsData) {
                var html = "";
                $.map(_itemsData, function (items, key) {
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
                $("#TRPMCTY").trigger('change');
                showTypeDetails();
                getCardDetailsByMobile();
                total_amt();
                itemsData = setItemsData();
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
                var netAmt = parseFloat(parseFloat(gTotalAmt) + parseFloat($('.oth_amt').val()) - parseFloat($('.redeem-amt').val())).toFixed(2);
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
                        $(".drcrd").hide();
                        $(".mobpay").hide();
                        break;
                    case 2:
                        loadParties();
                        $(".crcrd").hide();
                        $(".drcrd").show();
                        $(".mobpay").hide();
                        break;
                    case 3:
                        $(".crcrd").show();
                        $(".drcrd").hide();
                        $(".mobpay").hide();
                        break;
                    case 4:
                        loadCardTypes();
                        $(".crcrd").hide();
                        $(".drcrd").hide();
                        $(".mobpay").show();
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
                $('.nett_amt_rcvd_label').text($('.nett_amt_rcvd').val());


                /*if (ret_cus > 0) {
                    // $('.ret_cus_div').show();
                    $('.ret_cus').text(ret_cus);
                } else {
                    // $('.ret_cus_div').hide();
                }*/
                var netAmt = parseFloat(parseFloat(gTotalAmt) + parseFloat($('.oth_amt').val()) - parseFloat($('.redeem-amt').val())).toFixed(2);
                var rndOff = parseFloat(Math.round(netAmt) - parseFloat(netAmt)).toFixed(2);
                netAmt = parseFloat(parseFloat(netAmt) + parseFloat(rndOff)).toFixed(2);
                $('.net_amount').val(netAmt);
                $('.rndOff').val(rndOff);
                var ret_cus = parseFloat($('.dr_total').val()) > 0 ? parseFloat($('.dr_total').val()) - parseFloat($('#TRNET').val()) - parseFloat($('.dre_total').val()) : 0.00;
                $('.ret_cus').text(ret_cus);
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
                if ($('.trtype').val() == "2" && $('#TRPRCD').val() == "") {
                    bootbox.alert("Please select party");
                    $('#TRPRCD').focus();
                    return;
                }
                var salesData = $("#salesBill").serializeObject();
                cardData.DBREDPN = $(".redeem-point").val();
                cardData.DBREDVL = $(".redeem-amt").val();
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
                        $("#save-modal").modal('hide');
                        if (response.code) {
                            var box = bootbox.confirm({
                                message: "<h3>Do you want to print the bill now?</h3>",
                                buttons: {
                                    confirm: {
                                        label: 'Yes',
                                        className: 'btn-success'
                                    },
                                    cancel: {
                                        label: 'No',
                                        className: 'btn-danger pull-left'
                                    }
                                },
                                callback: function (result) {
                                    if (result)
                                        window.open(site_url + "salesPrint/" + <?php echo $billNo; ?>);
                                    window.location.href = site_url + "salesBill";
                                    //window.location.href = (result) ? site_url + "salesPrint/" + <?php //echo $currentBill; ?>// : site_url + "salesBill";
                                }
                            });
                            var dialog = box.find('.modal-dialog');
                            box.css('display', 'block');
                            dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
                        } else {
                            bootbox.alert(response.msg);
                        }
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
                                    $('.currBillPoint').val("");
                                    $('.totBalPoint').val("");
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
                                var cardNo = data.CARDNO;
                                $(".crdnum").val(cardNo).trigger("change");
                                /*var party = $('.party').val();
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
                                total_amt();*/
                            }
                        }
                    });
                }
            }

            function setCurrPoints(totalPoints) {

                var _pointAmt = 0;
                var crdHolPoint = "<?php echo getSessionData('chnoofpoints'); ?>";
                var crdHolVal = "<?php echo getSessionData('chrs'); ?>";
                var redeemminpoints = parseFloat("<?php echo getSessionData('redaftminpoints'); ?>");
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
                if (!hasInitialCard)
                    totalPoints = parseFloat(parseFloat(totalPoints) + parseFloat(currBillPoint)).toFixed(2);
                totalPoints = isNaN(totalPoints) ? 0 : totalPoints;
                $('.currBillPoint').val(currBillPoint);
                $('.totBalPoint').val(totalPoints);
                if (totalPoints > redeemminpoints || showInitialRedeem) {
                    $('.redpoints').removeClass("hide");
                    var netAmt = parseFloat($('.net_amount').val());
                    var redAmt = parseFloat($('.redeem-amt').val());
                    netAmt -= redAmt;
                    $('.net_amount').val(netAmt);
                } else {
                    $('.redpoints').addClass("hide");
                }
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
                                html += '<option value="' + value.TRCODE + '">' + value.TRNAME + '</option>';
                            });
                        }
                        $("#TRPRCD").html(html);
                    }
                })
            }

            function loadCardTypes() {
                $.ajax({
                    url: site_url + 'sales/getCardTypes',
                    type: 'GET',
                    dataType: 'JSON',
                    success: function (response) {
                        var html = '<option value="">Select Card Type</option>';
                        if (response.code) {
                            var data = response.data;
                            $.each(data, function (index, value) {
                                html += '<option value="' + value.CARDTYNO + '">' + value.CARDTYPE + '</option>';
                            });
                        }
                        $("#TRPMCTY").html(html);
                    }
                })
            }

            $('#bilsearch-modal').on('shown.bs.modal', function () {
                search_bill_table.columns.adjust();
                loadingStop();
            });

            $('#bilsearch-modal').on('hidden.bs.modal', function () {
                $('body').addClass("modal-open");
            });

            $('#red-otp').on('hidden.bs.modal', function () {
                $('body').addClass("modal-open");
            });

            $('.search-bill').click(function () {
                if (search_bill_table) {
                    search_bill_table.ajax.reload();
                }
                else {
                    setSearchTable();
                }

                $('#bilsearch-modal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });

            $('#search_bill_table').find('tbody').on('click', 'tr', function () {
                var data = search_bill_table.row(this).data();
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                }
                else {
                    search_bill_table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
                var itemData = data.itemData;
                var html = "";
                if (itemData) {
                    itemData = itemData.split("|");
                    $.each(itemData, function (index, val) {
                        val = val.split(',');
                        if (val) {
                            html += "<tr>";
                            html += "<td class=\"col-md-2 text-center\">";
                            html += val[0];
                            html += "</td>";
                            html += "<td class=\"col-md-1 text-center\">";
                            html += val[1];
                            html += "</td>";
                            html += "<td class=\"col-md-1 text-center\">";
                            html += val[2];
                            html += "</td>";
                            html += "<td class=\"col-md-1 text-center\">";
                            html += val[3];
                            html += "</td>";
                            html += "<td class=\"col-md-1 text-center\">";
                            html += val[4];
                            html += "</td>";
                            html += "<td class=\"col-md-1 text-center\">";
                            html += val[5];
                            html += "</td>";
                            html += "<td class=\"col-md-1 text-center\">";
                            html += val[6];
                            html += "</td>";
                            html += "</tr>";
                        }
                    });
                }
                $("#search_bill_item_table").find("tbody").html(html);
            });

            function setSearchTable() {
                loadingStart();
                search_bill_table = $('#search_bill_table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "searching": true,
                    "paging": false,
                    "autoWidth": false,
                    "ordering": false,
                    "info": false,
                    "scrollY": "200px",
                    "scrollCollapse": true,
                    "dom": "" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    "language": {
                        search: "Party Name: ",
                        searchPlaceholder: "Party Name"
                    },
                    "columns": [
                        {
                            "bSortable": false,
                            "data": "TRBLNO",
                            "className": "col-md-1 text-center"
                        },
                        {
                            "bSortable": false,
                            "data": null,
                            "className": "col-md-1 text-center"
                        },
                        {
                            "bSortable": false,
                            "data": "TRPRNM",
                            "className": "col-md-2 text-center"
                        },
                        {
                            "bSortable": false,
                            "data": "TRPH1",
                            "className": "col-md-1 text-center"
                        },
                        {
                            "bSortable": false,
                            "data": "TRNET",
                            "className": "col-md-1 text-center"
                        },
                        {
                            "bSortable": false,
                            "data": 'CREDITCRD1',
                            "className": "col-md-1 text-center"
                        }
                    ],
                    "ajax": {
                        url: "<?= site_url('sales/getSearchedBills') ?>",
                        method: 'POST',
                        data: function (d) {
                            d.type = type;
                        }
                    },
                    "rowCallback": function (nRow, aData, iDisplayindex) {
                        var date = new Date(aData.TRBLDT);
                        $('td:eq(1)', nRow).html(date.toString('d/M/yyyy'));
                    }
                });
            }

            $("input[name=type]").on('change', function () {
                type = this.value;
                var typetext = "Party Name:";
                if (type == 2) {
                    typetext = "Mobile No:";
                }
                $('.searchtype').text(typetext);
            });
            $('.searchtypeval').on('keyup', function () {
                search_bill_table.search(this.value).draw();
            });
            $('#search_bill_table').find('tbody').on('dblclick', 'tr', function () {
                var data = search_bill_table.row(this).data();
                $('.crdnum').val(data.CRDNUM);
                $('#TRSALUT').val(data.TRSALUT);
                $('#TRPRNM').val(data.TRPRNM);
                $('.ad1').val(data.TRPAD1);
                $('.ad2').val(data.TRPAD2);
                $('.ad3').val(data.TRPAD3);
                $('.city').val(data.TRCITY);
                $('#TRPH1').val(data.TRPH1);
                $('.ph2').val(data.TRPH2);
                $('.email').val(data.TREMAIL);
                var TRDOB = data.TRDOB ? new Date(data.TRDOB).toString("dd/mm/yyyy") : null;
                $('.dob').val(TRDOB);
                var TRMAD = data.TRMAD ? new Date(data.TRMAD).toString("dd/mm/yyyy") : null;
                $('.mad').val(TRMAD);
                $('.crdnum').trigger('change');
                $('#TRPH1').trigger('change');
                $('#bilsearch-modal').modal('hide');
                $('.searchtypeval').val("");
                type = 1;
                search_bill_table.destroy();
                search_bill_table = null;
                $("#search_bill_item_table").find("tbody").html("");
            });
            $("#redPoints").on("change", function () {
                if ($(this).is(":checked")) {
                    $("#red-otp").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    showInitialRedeem = 0;
                }
                else {
                    $(".points-div").addClass("hide");
                    $(".redeem-point").val(0);
                    $(".redeem-amt").val(0);
                }
            });
            $(".savePoints").on("click", function () {
                $(".points-div").removeClass("hide");
                var totalPoints = parseFloat($(".totBalPoint").val());
                $(".redeem-point").val(totalPoints);
                var redperpoints = parseFloat("<?php echo getSessionData('redperpoints'); ?>");
                var amtPerPoint = parseFloat("<?php echo getSessionData('redvaluers'); ?>");
                var redeemAmt = parseFloat((totalPoints * amtPerPoint) / redperpoints);
                $(".redeem-amt").val(redeemAmt);
                $("#red-otp").modal("hide");
                var grsAmt = parseFloat($(".gross").val());
                var netAmt = grsAmt - redeemAmt;
                var rndOff = Math.round(netAmt) - netAmt;
                $(".net_amount").val(Math.round(netAmt));
                $(".rndOff").val(rndOff.toFixed(2));
            });

            function getLoyalty() {
                var mobileNo = $("#TRPH1").val();
                $.ajax({
                    url: site_url + 'sales/getLoyalty',
                    type: 'POST',
                    data: {
                        'mobileNo': mobileNo
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        if (response.code) {
                            var discPer = response.data.LODISCPR;
                            $(".d_per").each(function () {
                                var itemDis = parseFloat($(this).val());
                                discPer = itemDis > discPer ? itemDis : discPer;
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

            function getDenominations() {
                $.ajax({
                    url: site_url + 'sales/getDenominations',
                    dataType: 'JSON',
                    success: function (response) {
                        var data = response.finalDenominations;
                        var totalDenom = 0;
                        if (data) {
                            $('.F2000').text(data.F2000);
                            var F2000A = parseFloat(data.F2000 * 2000);
                            $('.F2000A').text(F2000A);

                            $('.F500').text(data.F500);
                            var F500A = parseFloat(data.F500 * 500);
                            $('.F500A').text(F500A);

                            $('.F200').text(data.F200);
                            var F200A = parseFloat(data.F200 * 200);
                            $('.F200A').text(F200A);

                            $('.F100').text(data.F100);
                            var F100A = parseFloat(data.F100 * 100);
                            $('.F100A').text(F100A);

                            $('.F50').text(data.F50);
                            var F50A = parseFloat(data.F50 * 50);
                            $('.F50A').text(F50A);

                            $('.F20').text(data.F20);
                            var F20A = parseFloat(data.F20 * 20);
                            $('.F20A').text(F20A);

                            $('.F10').text(data.F10);
                            var F10A = parseFloat(data.F10 * 10);
                            $('.F10A').text(F10A);

                            $('.F5').text(data.F5);
                            var F5A = parseFloat(data.F5 * 5);
                            $('.F5A').text(F5A);

                            $('.FMISC').text(data.FMISC);
                            var FMISC = data.FMISC;
                            $('.FMISCA').text(FMISC);

                            totalDenom = F2000A + F500A + F200A + F100A + F50A + F20A + F10A + F5A + FMISC;
                            denomData = {
                                F2000A: data.F2000,
                                F500A: data.F500,
                                F200A: data.F200,
                                F100A: data.F100,
                                F50A: data.F50,
                                F20A: data.F20,
                                F10A: data.F10,
                                F5A: data.F5,
                                FMISC: data.FMISC
                            };
                            $('.totalDenom').text("Total Amount: " + totalDenom);
                        }

                    }
                });
            }

            getDenominations();

            $('.show-denom').click(function () {
                getDenominations();
                $('#show-denom').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });

            $('#show-denom').on('hidden.bs.modal', function () {
                $('body').addClass("modal-open");
            });

            function setDenom() {
                var rcdTotal = parseFloat($('.dr_total').val());
                var _netAmt = parseFloat($('.net_amount').val());
                var netAmt = rcdTotal - _netAmt;
                if (rcdTotal <= 0 || rcdTotal < _netAmt) {
                    alert("Please Enter pending amount");
                    return false;
                }
                var F2000 = 0;
                var F500 = 0;
                var F200 = 0;
                var F100 = 0;
                var F50 = 0;
                var F20 = 0;
                var F10 = 0;
                var F5 = 0;
                var FMISC = 0;
                if (denomData.F2000A > 0 && netAmt >= 2000) {
                    F2000 = Math.floor(netAmt / 2000);
                    F2000 = F2000 > denomData.F2000A ? denomData.F2000A : F2000;
                    netAmt -= (F2000 * 2000);
                }
                if (denomData.F500A > 0 && netAmt >= 500) {
                    F500 = Math.floor(netAmt / 500);
                    F500 = F500 > denomData.F500A ? denomData.F500A : F500;
                    netAmt -= (F500 * 500);
                }
                if (denomData.F200A > 0 && netAmt >= 200) {
                    F200 = Math.floor(netAmt / 200);
                    F200 = F200 > denomData.F200A ? denomData.F200A : F200;
                    netAmt -= (F200 * 200);
                }
                if (denomData.F100A > 0 && netAmt >= 100) {
                    F100 = Math.floor(netAmt / 100);
                    F100 = F100 > denomData.F100A ? denomData.F100A : F100;
                    netAmt -= (F100 * 100);
                }
                if (denomData.F50A > 0 && netAmt >= 50) {
                    F50 = Math.floor(netAmt / 50);
                    F50 = F50 > denomData.F50A ? denomData.F50A : F50;
                    netAmt -= (F50 * 50);
                }
                if (denomData.F20A > 0 && netAmt >= 20) {
                    F20 = Math.floor(netAmt / 20);
                    F20 = F20 > denomData.F20A ? denomData.F20A : F20;
                    netAmt -= (F20 * 20);
                }
                if (denomData.F10A > 0 && netAmt >= 10) {
                    F10 = Math.floor(netAmt / 10);
                    F10 = F10 > denomData.F10A ? denomData.F10A : F10;
                    netAmt -= (F10 * 10);
                }
                if (denomData.F5A > 0 && netAmt >= 5) {
                    F5 = Math.floor(netAmt / 5);
                    F5 = F5 > denomData.F5A ? denomData.F5A : F5;
                    netAmt -= (F5 * 5);
                }
                FMISC = netAmt;
                var dre_note = $('.dre_note');
                dre_note[0].value = F2000;
                dre_note[1].value = F500;
                dre_note[2].value = F200;
                dre_note[3].value = F100;
                dre_note[4].value = F50;
                dre_note[5].value = F20;
                dre_note[6].value = F10;
                dre_note[7].value = F5;
                $('.dre_misc').val(FMISC).trigger('change');
                dre_note.trigger('change');
            }

            $('.set-denom').click(function () {
                setDenom();
            });
        });
    }(jQuery));

</script>

<?php $this->load->view('include/page_footer.php'); ?>
