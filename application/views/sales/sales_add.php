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
                <button type="button" id="searchItem" class="btn btn-info pull-right"><i class="fa fa-search"></i>
                    Search Item
                </button>
            </div>
            <div class="box-body">
                <div class="col-md-7">
                    <div class="row form-group">
                        <label class="col-md-2 text-right"> Item Code : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control barCode" name="item_code"
                                   autocapitalize="characters">
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
        <a class="btn btn-primary save">Save</a>
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
                                        <input type="text" class="form-control" name="TRBLNO"
                                               value="<?php echo $currentBill; ?>" readonly>
                                    </div>
                                    <label class="col-md-1 text-right"> Date : </label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="TRBLDT"
                                               value="<?php echo date('d-m-Y'); ?>" readonly>
                                    </div>
                                    <label class="col-md-1 text-right"> Type : </label>
                                    <div class="col-md-2">
                                        <select class="form-control trtype" name="TRTYPE">
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
                                        <input type="text" class="form-control" name="CRDPREF" value="GCHGDM" readonly>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    <label class="col-md-1 text-right"> No : </label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control crdnum" name="CRDNUM">
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
                                                <select class="form-control" name="TRSALUT">
                                                    <option value="Mr."> Mr.</option>
                                                    <option value="Miss"> Miss</option>
                                                    <option value="Mrs."> Mrs.</option>
                                                    <option value="Ms."> Ms.</option>
                                                </select>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control party" name="TRPRNM" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Address </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control address ad1" name="TRPAD1"/>
                                            </div>
                                            <div class="col-md-10 col-md-offset-2">
                                                <input type="text" class="form-control address ad2" name="TRPAD2"/>
                                            </div>
                                            <div class="col-md-10 col-md-offset-2">
                                                <input type="text" class="form-control address ad3" name="TRPAD3"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-right"> City </label>
                                            <div class="col-md-10">
                                                <input type="text" name="TRCITY" class="form-control city">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Phone-1 </label>
                                            <div class="col-md-3">
                                                <input type="number" min="10" max="10" name="TRPH1"
                                                       class="form-control ph1">
                                            </div>
                                            <label class="col-md-1 text-right"> D.O.B </label>
                                            <div class="col-md-3">
                                                <input type="text" name="TRDOB" class="form-control datepicker dob">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Phone-2 </label>
                                            <div class="col-md-3">
                                                <input type="number" min="10" max="10" name="TRPH2"
                                                       class="form-control ph2">
                                            </div>
                                            <label class="col-md-1 text-right"> M.A.D. </label>
                                            <div class="col-md-3">
                                                <input type="text" name="TRMAD" class="form-control datepicker mad">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Email </label>
                                            <div class="col-md-5">
                                                <input type="email" name="TREMAIL" class="form-control email">
                                            </div>
                                        </div>
                                        <div class="row crcrd">
                                            <label class="col-md-2 text-right"> Card No. </label>
                                            <div class="col-md-5">
                                                <input type="text" name="TRCRDNO" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row crcrd">
                                            <label class="col-md-2 text-right"> Exp.Dt </label>
                                            <div class="col-md-5">
                                                <input type="text" name="TRCRDEXP" class="form-control datepicker">
                                            </div>
                                        </div>
                                        <div class="row crcrd">
                                            <label class="col-md-2 text-right"> Card Holder </label>
                                            <div class="col-md-5">
                                                <input type="text" name="TRCRDHOLD" class="form-control">
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
                                                <input type="text" name="TRGROS" class="form-control gross" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Other </label>
                                            <div class="col-md-10">
                                                <input type="text" name="TROTH1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-right"> Other Amt </label>
                                            <div class="col-md-10">
                                                <input type="number" value="0" name="TROTH2"
                                                       class="form-control oth_amt">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <label class="col-md-3 text-right"> C/N-1 NO. </label>
                                            <div class="col-md-9">
                                                <input type="text" name="TRCN1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 text-right"> Amount </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="TRCN1AM">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 text-right"> C/N-2 NO. </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="TRCN2">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 text-right"> Amount </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="TRCN2AM">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 text-right"> Rnd Off </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control rndOff" name="TRRND">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <label class="col-md-7 text-right"> Current Bill Points </label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" style="background: green"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-7 text-right"> Total Balance Point </label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" style="background: red"
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
                                                <input type="text" name="TRNET" class="form-control net_amount"
                                                       readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <label class="col-md-3 text-right"> Total Qty </label>
                                            <div class="col-md-9">
                                                <input type="text" name="TRTOTQTY" class="form-control m_t_qty"
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
                                                <input type="text" name="RC2000" class="form-control dr_note"
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
                                                <input type="text" name="RC500" class="form-control dr_note"
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
                                                <input type="text" name="RC100" class="form-control dr_note"
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
                                                <input type="text" name="RC50" class="form-control dr_note"
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
                                                <input type="text" name="RC20" class="form-control dr_note"
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
                                                <input type="text" name="RC10" class="form-control dr_note"
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
                                                <input type="text" name="RC5" class="form-control dr_note"
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
                                                <input type="text" name="RCMIS"
                                                       class="form-control dr_misc dr_value"
                                                       value="0">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-6 text-right"> Rcvd AMt. </label>
                                            <div class="col-md-5">
                                                <input type="text" name="EXRCVD" class="form-control dr_total"
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
                                                <input type="text" name="PD2000" class="form-control dre_note"
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
                                                <input type="text" name="PD500" class="form-control dre_note"
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
                                                <input type="text" name="PD100" class="form-control dre_note"
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
                                                <input type="text" name="PD50" class="form-control dre_note"
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
                                                <input type="text" name="PD20" class="form-control dre_note"
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
                                                <input type="text" name="PD10" class="form-control dre_note"
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
                                                <input type="text" name="PD5" class="form-control dre_note"
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
                                                <input type="text" name="PDMIS"
                                                       class="form-control dre_misc dre_value"
                                                       value="0">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-6 text-right"> Return to </label>
                                            <div class="col-md-5">
                                                <input type="text" name="EXBACK" class="form-control dre_total"
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
                                                <input type="text" name="TRCRAMT" class="form-control nett_amt_rcvd"
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
            loadingStop();
            var items, itemsData, gTotalAmt = 0;
            var barCodeArray = [], itemsArray = [];

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

            $("input, .address").keyup(function () {
                var val = $(this).val();
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
            $('.crdnum').focusout(function () {
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

            $(document).on('change', ".qty", function () {
                total_amt();
            });

            $(document).on('change', ".d_per", function () {
                total_amt();
            });

            $('#searchItem').click(function () {
                window.open(site_url + "searchItem", "popupWindow", "width=1200, height=600, scrollbars=yes");
            });

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
                        TRBLNO1: "<?php echo $currentBill; ?>",// BillNo
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
                        TRFABV: aboveAmt
                    };
                    _itemsData.push(data);
                });
                return _itemsData;
            }

            function saveBill() {
                var salesData = $("#salesBill").serializeObject();

                $.ajax({
                    url: site_url + "salesCreate",
                    dataType: 'json',
                    type: "POST",
                    data: {
                        "salesData": salesData,
                        "itemsData": itemsData
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
                                window.location.href = site_url + "salesPrint/" + <?php echo $currentBill; ?>;
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
                            loadingStop();
                        }
                    });
                }
            }

        });

    }(jQuery));

</script>

<?php $this->load->view('include/page_footer.php'); ?>
