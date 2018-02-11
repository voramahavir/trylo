<?php
/*echo "<pre>";
print_r($billData);
print_r($itemData);
die;*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <META http-equiv="X-UA-Compatible" content="IE=8">
    <TITLE>Sales Bill Print</TITLE>
    <STYLE type="text/css">
        @media print {
            @page {
                size: auto;   /* auto is the initial value */
                margin: 0mm;  /* this affects the margin in the printer settings */
            }
        }

        body {
            margin-top: 0px;
            margin-left: 0px;
        }

        #page_1 {
            position: relative;
            overflow: hidden;
            margin: 0px 0px 0px 8px;
            padding: 0px;
            border: none;
            width: 736px;
            height: 595px;
        }

        #page_1 #p1dimg1 {
            position: absolute;
            top: 25px;
            left: 0px;
            z-index: -1;
            width: 736px;
            height: 571px;
        }

        #page_1 #p1dimg1 #p1img1 {
            width: 736px;
            height: 571px;
        }

        .ft0 {
            font: bold 15px 'Arial';
            line-height: 18px;
        }

        .ft1 {
            font: 1px 'Arial';
            line-height: 1px;
        }

        .ft2 {
            font: bold 12px 'Arial';
            text-decoration: underline;
            line-height: 15px;
        }

        .ft3 {
            font: bold 32px 'Courier New';
            line-height: 36px;
        }

        .ft4 {
            font: 12px 'Arial';
            line-height: 15px;
        }

        .ft5 {
            font: bold 13px 'Arial Narrow';
            line-height: 16px;
        }

        .ft6 {
            font: bold 12px 'Arial';
            line-height: 15px;
        }

        .ft7 {
            font: 15px 'Arial';
            line-height: 17px;
        }

        .ft8 {
            font: 1px 'Arial';
            line-height: 13px;
        }

        .ft9 {
            font: bold 12px 'Arial';
            line-height: 13px;
        }

        .ft10 {
            font: 12px 'Arial Narrow';
            line-height: 16px;
        }

        .ft11 {
            font: 11px 'Arial';
            line-height: 14px;
        }

        .ft12 {
            font: bold 11px 'Arial';
            line-height: 14px;
        }

        .ft13 {
            font: italic 11px 'Arial';
            line-height: 14px;
        }

        .ft14 {
            font: italic 10px 'Arial';
            line-height: 13px;
        }

        .ft15 {
            font: bold 13px 'Arial Narrow';
            line-height: 13px;
        }

        .ft16 {
            font: 1px 'Arial';
            line-height: 14px;
        }

        .ft17 {
            font: 1px 'Arial';
            line-height: 7px;
        }

        .ft18 {
            font: 1px 'Arial';
            line-height: 6px;
        }

        .ft19 {
            font: bold 13px 'Arial';
            line-height: 16px;
        }

        .ft20 {
            font: italic bold 13px 'Arial';
            line-height: 16px;
        }

        .ft21 {
            font: bold 16px 'Arial';
            line-height: 19px;
        }

        .ft22 {
            font: italic bold 16px 'Arial';
            text-decoration: underline;
            line-height: 18px;
        }

        .ft23 {
            font: italic bold 9px 'Arial';
            text-decoration: underline;
            line-height: 11px;
        }

        .p0 {
            text-align: left;
            padding-left: 4px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p1 {
            text-align: left;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p2 {
            text-align: left;
            padding-left: 7px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p3 {
            text-align: center;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p4 {
            text-align: center;
            padding-left: 21px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p5 {
            text-align: center;
            padding-left: 2px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p6 {
            text-align: left;
            padding-left: 5px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p7 {
            text-align: left;
            padding-left: 2px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p8 {
            text-align: right;
            padding-right: 22px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p9 {
            text-align: left;
            padding-left: 1px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p10 {
            text-align: right;
            padding-right: 12px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p11 {
            text-align: left;
            padding-left: 6px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p12 {
            text-align: center;
            padding-right: 35px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p13 {
            text-align: right;
            padding-right: 8px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p14 {
            text-align: right;
            padding-right: 6px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p15 {
            text-align: left;
            padding-left: 8px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p16 {
            text-align: center;
            padding-right: 2px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p17 {
            text-align: right;
            padding-right: 9px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p18 {
            text-align: right;
            padding-right: 5px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p19 {
            text-align: left;
            padding-left: 9px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p20 {
            text-align: right;
            padding-right: 13px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p21 {
            text-align: right;
            padding-right: 10px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p22 {
            text-align: right;
            padding-right: 19px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p23 {
            text-align: right;
            padding-right: 1px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p24 {
            text-align: right;
            padding-right: 2px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p25 {
            text-align: center;
            padding-right: 74px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p26 {
            text-align: center;
            padding-left: 29px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p27 {
            text-align: center;
            padding-right: 32px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p28 {
            text-align: right;
            padding-right: 15px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p29 {
            text-align: center;
            padding-right: 12px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p30 {
            text-align: center;
            padding-left: 31px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p31 {
            text-align: left;
            padding-left: 3px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p32 {
            text-align: right;
            padding-right: 11px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p33 {
            text-align: left;
            padding-left: 14px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p34 {
            text-align: left;
            padding-left: 17px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p35 {
            text-align: right;
            padding-right: 47px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p36 {
            text-align: right;
            padding-right: 7px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p37 {
            text-align: right;
            padding-right: 26px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p38 {
            text-align: left;
            padding-left: 12px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p39 {
            text-align: right;
            padding-right: 35px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p40 {
            text-align: left;
            padding-left: 7px;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .p41 {
            text-align: left;
            padding-left: 8px;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .p42 {
            text-align: left;
            padding-left: 605px;
            margin-top: 7px;
            margin-bottom: 0px;
        }

        .td0 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 190px;
            vertical-align: bottom;
        }

        .td1 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 43px;
            vertical-align: bottom;
        }

        .td2 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 21px;
            vertical-align: bottom;
        }

        .td3 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 15px;
            vertical-align: bottom;
        }

        .td4 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 4px;
            vertical-align: bottom;
        }

        .td5 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 111px;
            vertical-align: bottom;
        }

        .td6 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 50px;
            vertical-align: bottom;
        }

        .td7 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 9px;
            vertical-align: bottom;
        }

        .td8 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 3px;
            vertical-align: bottom;
        }

        .td9 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 5px;
            vertical-align: bottom;
        }

        .td10 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 19px;
            vertical-align: bottom;
        }

        .td11 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 7px;
            vertical-align: bottom;
        }

        .td12 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 24px;
            vertical-align: bottom;
        }

        .td13 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 20px;
            vertical-align: bottom;
        }

        .td14 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 46px;
            vertical-align: bottom;
        }

        .td15 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 32px;
            vertical-align: bottom;
        }

        .td16 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 13px;
            vertical-align: bottom;
        }

        .td17 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 83px;
            vertical-align: bottom;
        }

        .td18 {
            padding: 0px;
            margin: 0px;
            width: 30px;
            vertical-align: bottom;
        }

        .td19 {
            padding: 0px;
            margin: 0px;
            width: 17px;
            vertical-align: bottom;
        }

        .td20 {
            padding: 0px;
            margin: 0px;
            width: 102px;
            vertical-align: bottom;
        }

        .td21 {
            padding: 0px;
            margin: 0px;
            width: 41px;
            vertical-align: bottom;
        }

        .td22 {
            padding: 0px;
            margin: 0px;
            width: 43px;
            vertical-align: bottom;
        }

        .td23 {
            padding: 0px;
            margin: 0px;
            width: 213px;
            vertical-align: bottom;
        }

        .td24 {
            padding: 0px;
            margin: 0px;
            width: 5px;
            vertical-align: bottom;
        }

        .td25 {
            padding: 0px;
            margin: 0px;
            width: 19px;
            vertical-align: bottom;
        }

        .td26 {
            padding: 0px;
            margin: 0px;
            width: 9px;
            vertical-align: bottom;
        }

        .td27 {
            padding: 0px;
            margin: 0px;
            width: 7px;
            vertical-align: bottom;
        }

        .td28 {
            padding: 0px;
            margin: 0px;
            width: 24px;
            vertical-align: bottom;
        }

        .td29 {
            padding: 0px;
            margin: 0px;
            width: 20px;
            vertical-align: bottom;
        }

        .td30 {
            padding: 0px;
            margin: 0px;
            width: 46px;
            vertical-align: bottom;
        }

        .td31 {
            padding: 0px;
            margin: 0px;
            width: 21px;
            vertical-align: bottom;
        }

        .td32 {
            padding: 0px;
            margin: 0px;
            width: 32px;
            vertical-align: bottom;
        }

        .td33 {
            padding: 0px;
            margin: 0px;
            width: 13px;
            vertical-align: bottom;
        }

        .td34 {
            padding: 0px;
            margin: 0px;
            width: 83px;
            vertical-align: bottom;
        }

        .td35 {
            padding: 0px;
            margin: 0px;
            width: 280px;
            vertical-align: bottom;
        }

        .td36 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 30px;
            vertical-align: bottom;
        }

        .td37 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 17px;
            vertical-align: bottom;
        }

        .td38 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 102px;
            vertical-align: bottom;
        }

        .td39 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 41px;
            vertical-align: bottom;
        }

        .td40 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 213px;
            vertical-align: bottom;
        }

        .td41 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 46px;
            vertical-align: bottom;
        }

        .td42 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 143px;
            vertical-align: bottom;
        }

        .td43 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 20px;
            vertical-align: bottom;
        }

        .td44 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 44px;
            vertical-align: bottom;
        }

        .td45 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 85px;
            vertical-align: bottom;
        }

        .td46 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 49px;
            vertical-align: bottom;
        }

        .td47 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 8px;
            vertical-align: bottom;
        }

        .td48 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 115px;
            vertical-align: bottom;
        }

        .td49 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 38px;
            vertical-align: bottom;
        }

        .td50 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 96px;
            vertical-align: bottom;
        }

        .td51 {
            border-right: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 29px;
            vertical-align: bottom;
        }

        .td52 {
            border-right: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 142px;
            vertical-align: bottom;
        }

        .td53 {
            border-right: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 42px;
            vertical-align: bottom;
        }

        .td54 {
            padding: 0px;
            margin: 0px;
            width: 36px;
            vertical-align: bottom;
        }

        .td55 {
            border-right: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 3px;
            vertical-align: bottom;
        }

        .td56 {
            border-right: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 59px;
            vertical-align: bottom;
        }

        .td57 {
            border-right: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 43px;
            vertical-align: bottom;
        }

        .td58 {
            border-right: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 58px;
            vertical-align: bottom;
        }

        .td59 {
            padding: 0px;
            margin: 0px;
            width: 3px;
            vertical-align: bottom;
        }

        .td60 {
            border-right: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 65px;
            vertical-align: bottom;
        }

        .td61 {
            border-right: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 72px;
            vertical-align: bottom;
        }

        .td62 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 29px;
            vertical-align: bottom;
        }

        .td63 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 40px;
            vertical-align: bottom;
        }

        .td64 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 42px;
            vertical-align: bottom;
        }

        .td65 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 3px;
            vertical-align: bottom;
        }

        .td66 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 59px;
            vertical-align: bottom;
        }

        .td67 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 43px;
            vertical-align: bottom;
        }

        .td68 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 58px;
            vertical-align: bottom;
        }

        .td69 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 65px;
            vertical-align: bottom;
        }

        .td70 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 12px;
            vertical-align: bottom;
        }

        .td71 {
            border-right: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 159px;
            vertical-align: bottom;
        }

        .td72 {
            border-right: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 63px;
            vertical-align: bottom;
        }

        .td73 {
            border-right: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 12px;
            vertical-align: bottom;
        }

        .td74 {
            border-right: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 39px;
            vertical-align: bottom;
        }

        .td75 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 26px;
            vertical-align: bottom;
        }

        .td76 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 33px;
            vertical-align: bottom;
        }

        .td77 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 23px;
            vertical-align: bottom;
        }

        .td78 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 45px;
            vertical-align: bottom;
        }

        .td79 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 36px;
            vertical-align: bottom;
        }

        .td80 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 34px;
            vertical-align: bottom;
        }

        .td81 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 44px;
            vertical-align: bottom;
        }

        .td82 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 4px;
            vertical-align: bottom;
        }

        .td83 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 71px;
            vertical-align: bottom;
        }

        .td84 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 72px;
            vertical-align: bottom;
        }

        .td85 {
            padding: 0px;
            margin: 0px;
            width: 15px;
            vertical-align: bottom;
        }

        .td86 {
            padding: 0px;
            margin: 0px;
            width: 4px;
            vertical-align: bottom;
        }

        .td87 {
            padding: 0px;
            margin: 0px;
            width: 26px;
            vertical-align: bottom;
        }

        .td88 {
            padding: 0px;
            margin: 0px;
            width: 34px;
            vertical-align: bottom;
        }

        .td89 {
            padding: 0px;
            margin: 0px;
            width: 44px;
            vertical-align: bottom;
        }

        .td90 {
            padding: 0px;
            margin: 0px;
            width: 50px;
            vertical-align: bottom;
        }

        .td91 {
            border-right: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 4px;
            vertical-align: bottom;
        }

        .td92 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 34px;
            vertical-align: bottom;
        }

        .td93 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 27px;
            vertical-align: bottom;
        }

        .td94 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 51px;
            vertical-align: bottom;
        }

        .td95 {
            border-right: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 143px;
            vertical-align: bottom;
        }

        .td96 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 101px;
            vertical-align: bottom;
        }

        .td97 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 79px;
            vertical-align: bottom;
        }

        .td98 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 25px;
            vertical-align: bottom;
        }

        .td99 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 147px;
            vertical-align: bottom;
        }

        .td100 {
            border-right: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 101px;
            vertical-align: bottom;
        }

        .td101 {
            padding: 0px;
            margin: 0px;
            width: 79px;
            vertical-align: bottom;
        }

        .td102 {
            border-right: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 25px;
            vertical-align: bottom;
        }

        .td103 {
            padding: 0px;
            margin: 0px;
            width: 147px;
            vertical-align: bottom;
        }

        .td104 {
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 118px;
            vertical-align: bottom;
        }

        .td105 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 64px;
            vertical-align: bottom;
        }

        .td106 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 101px;
            vertical-align: bottom;
        }

        .td107 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 95px;
            vertical-align: bottom;
        }

        .td108 {
            border-bottom: #000000 1px solid;
            padding: 0px;
            margin: 0px;
            width: 45px;
            vertical-align: bottom;
        }

        .td109 {
            padding: 0px;
            margin: 0px;
            width: 190px;
            vertical-align: bottom;
        }

        .td110 {
            padding: 0px;
            margin: 0px;
            width: 64px;
            vertical-align: bottom;
        }

        .td111 {
            padding: 0px;
            margin: 0px;
            width: 115px;
            vertical-align: bottom;
        }

        .td112 {
            padding: 0px;
            margin: 0px;
            width: 86px;
            vertical-align: bottom;
        }

        .td113 {
            padding: 0px;
            margin: 0px;
            width: 95px;
            vertical-align: bottom;
        }

        .tr0 {
            height: 26px;
        }

        .tr1 {
            height: 51px;
        }

        .tr2 {
            height: 15px;
        }

        .tr3 {
            height: 18px;
        }

        .tr4 {
            height: 23px;
        }

        .tr5 {
            height: 13px;
        }

        .tr6 {
            height: 17px;
        }

        .tr7 {
            height: 198px;
        }

        .tr8 {
            height: 16px;
        }

        .tr9 {
            height: 14px;
        }

        .tr10 {
            height: 20px;
        }

        .tr11 {
            height: 7px;
        }

        .tr12 {
            height: 6px;
        }

        .tr13 {
            height: 21px;
        }

        .t0 {
            width: 737px;
            font: bold 12px 'Arial';
        }

    </STYLE>
</HEAD>

<BODY onload="window.print();">
<DIV id="page_1">
    <DIV id="p1dimg1">
        <IMG src="data:image/jpg;base64,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UUAFFFFADSo/u5/GsDxN4M0PxXbiLVLBZJF/1dwnySp9GHb2OR7V0NFAHzx4g+A+rWheXQbqLUIOf3MxEco/H7p/Mdq841PQdV0OQpqelXVmegaWIqvr16Gvs3B45qOWFJY2SRVkVhyrruUj6fjQB8S4R+flbt60bFyTgc9eOtfWmpfDfwhqzFrrQbRXbnfAvlNn6qRXL3vwG8Lzc2l1qNqxz0lDqPwI/rQB86EAjBGR70oGBgcfSvbp/wBnxCf9F8RyKCOBLagkfiGFZ8n7P+sA/utdsW9N0Lj/ABoA8f2JjGxfypQqjoAPwr1n/hQHiEYA1fS8fST/AAp0fwB14n59Z04Dj7qSf4UAeSFVbqAfqKNqkY2jH0r2eD9ny8YD7R4ihX/rnak/zate0/Z/0dGX7ZrWoTDuI1SPP6GgDwEADoAKdGjzyCKFHlc9FjUsfyFfT1h8HPBVg2W0x7ts9bqZn/TgV12naNpmkps07TbW1UcfuYQpPPrgUAfM+hfCfxdrhVhp5sLc/wDLW8Pl/wDjn3j+VeseFvgvoGhtHcalnVLtSCBIu2FTx/B3/H8q9O256/lTqAIo0VECqMDHABwMVieO/wDknniX/sFXX/opq6DtzXP+O/8AknniX/sFXX/opqADwJ/yTzw1/wBgq1/9FLXQVz/gT/knnhr/ALBVr/6KWugoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArn/Hf/JPPEv/AGCrr/0U1dBXP+O/+SeeJf8AsFXX/opqADwJ/wAk88Nf9gq1/wDRS10Fc/4E/wCSeeGv+wVa/wDopa6CgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACuf8d/8AJPPEv/YKuv8A0U1dBXP+O/8AknniX/sFXX/opqADwJ/yTzw1/wBgq1/9FLXQVz/gT/knnhr/ALBVr/6KWugoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArn/Hf/JPPEv/AGCrr/0U1dBXP+O/+SeeJf8AsFXX/opqADwJ/wAk88Nf9gq1/wDRS10Fc/4E/wCSeeGv+wVa/wDopa6CgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACuf8d/8AJPPEv/YKuv8A0U1dBXP+O/8AknniX/sFXX/opqADwJ/yTzw1/wBgq1/9FLXQVz/gT/knnhr/ALBVr/6KWugoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArn/Hf/JPPEv/AGCrr/0U1dBXP+O/+SeeJf8AsFXX/opqADwJ/wAk88Nf9gq1/wDRS10Fc/4E/wCSeeGv+wVa/wDopa6CgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACuf8d/8AJPPEv/YKuv8A0U1dBXP+O/8AknniX/sFXX/opqADwJ/yTzw1/wBgq1/9FLXQVz/gT/knnhr/ALBVr/6KWugoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArn/Hf/JPPEv/AGCrr/0U1dBXP+O/+SeeJf8AsFXX/opqADwJ/wAk88Nf9gq1/wDRS10Fc/4E/wCSeeGv+wVa/wDopa6CgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACuf8d/8AJPPEv/YKuv8A0U1dBXP+O/8AknniX/sFXX/opqADwJ/yTzw1/wBgq1/9FLXQVz/gT/knnhr/ALBVr/6KWugoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArn/Hf/JPPEv/AGCrr/0U1dBXP+O/+SeeJf8AsFXX/opqADwJ/wAk88Nf9gq1/wDRS10Fc/4E/wCSeeGv+wVa/wDopa6CgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACuf8d/8AJPPEv/YKuv8A0U1dBXP+O/8AknniX/sFXX/opqADwJ/yTzw1/wBgq1/9FLXQVz/gT/knnhr/ALBVr/6KWugoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArn/Hf/JPPEv/AGCrr/0U1dBXP+O/+SeeJf8AsFXX/opqADwJ/wAk88Nf9gq1/wDRS10Fc/4E/wCSeeGv+wVa/wDopa6CgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACuf8d/8AJPPEv/YKuv8A0U1dBXP+O/8AknniX/sFXX/opqADwJ/yTzw1/wBgq1/9FLXQVz/gT/knnhr/ALBVr/6KWugoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArn/Hf/JPPEv/AGCrr/0U1dBXP+O/+SeeJf8AsFXX/opqADwJ/wAk88Nf9gq1/wDRS10Fc/4E/wCSeeGv+wVa/wDopa6CgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACuf8d/8AJPPEv/YKuv8A0U1dBXP+O/8AknniX/sFXX/opqADwJ/yTzw1/wBgq1/9FLXQVz/gT/knnhr/ALBVr/6KWugoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArn/Hf/JPPEv/AGCrr/0U1dBXP+O/+SeeJf8AsFXX/opqADwJ/wAk88Nf9gq1/wDRS10Fc/4E/wCSeeGv+wVa/wDopa6CgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACuf8d/8AJPPEv/YKuv8A0U1dBXP+O/8AknniX/sFXX/opqADwJ/yTzw1/wBgq1/9FLXQVz/gT/knnhr/ALBVr/6KWugoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArn/Hf/JPPEv/AGCrr/0U1dBXP+O/+SeeJf8AsFXX/opqADwJ/wAk88Nf9gq1/wDRS10Fc/4E/wCSeeGv+wVa/wDopa6CgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACuf8d/8AJPPEv/YKuv8A0U1dBXP+O/8AknniX/sFXX/opqADwJ/yTzw1/wBgq1/9FLXQVz/gT/knnhr/ALBVr/6KWugoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArn/Hf/JPPEv/AGCrr/0U1dBXP+O/+SeeJf8AsFXX/opqADwJ/wAk88Nf9gq1/wDRS10Fc/4E/wCSeeGv+wVa/wDopa6CgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACuf8d/8AJPPEv/YKuv8A0U1dBXP+O/8AknniX/sFXX/opqADwJ/yTzw1/wBgq1/9FLXQVz/gT/knnhr/ALBVr/6KWugoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArn/Hf/JPPEv/AGCrr/0U1dBXP+O/+SeeJf8AsFXX/opqADwJ/wAk88Nf9gq1/wDRS10Fc/4E/wCSeeGv+wVa/wDopa6CgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACuf8d/8AJPPEv/YKuv8A0U1dBXP+O/8AknniX/sFXX/opqADwJ/yTzw1/wBgq1/9FLXQVz/gT/knnhr/ALBVr/6KWugoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArn/Hf/JPPEv/AGCrr/0U1dBXP+O/+SeeJf8AsFXX/opqADwJ/wAk88Nf9gq1/wDRS10Fc/4E/wCSeeGv+wVa/wDopa6CgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACuf8d/8AJPPEv/YKuv8A0U1dBXP+O/8AknniX/sFXX/opqADwJ/yTzw1/wBgq1/9FLXQVz/gT/knnhr/ALBVr/6KWugoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArn/Hf/JPPEv/AGCrr/0U1dBXP+O/+SeeJf8AsFXX/opqADwJ/wAk88Nf9gq1/wDRS10Fc/4E/wCSeeGv+wVa/wDopa6CgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACuf8d/8AJPPEv/YKuv8A0U1dBXP+O/8AknniX/sFXX/opqADwJ/yTzw1/wBgq1/9FLXQVz/gT/knnhr/ALBVr/6KWugoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArn/Hf/JPPEv/AGCrr/0U1dBXP+O/+SeeJf8AsFXX/opqADwJ/wAk88Nf9gq1/wDRS10Fc/4E/wCSeeGv+wVa/wDopa6CgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACuf8d/8AJPPEv/YKuv8A0U1dBXP+O/8AknniX/sFXX/opqADwJ/yTzw1/wBgq1/9FLXQVz/gT/knnhr/ALBVr/6KWugoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArn/Hf/JPPEv/AGCrr/0U1dBXP+O/+SeeJf8AsFXX/opqADwJ/wAk88Nf9gq1/wDRS10Fc/4E/wCSeeGv+wVa/wDopa6CgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACuf8d/8AJPPEv/YKuv8A0U1dBXP+O/8AknniX/sFXX/opqADwJ/yTzw1/wBgq1/9FLXQVz/gT/knnhr/ALBVr/6KWugoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArn/Hf/JPPEv/AGCrr/0U1dBXP+O/+See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"
             alt=""></DIV>


    <TABLE cellpadding=0 cellspacing=0 class="t0">
        <TR>
            <TD colspan=4 class="tr0 td0"><P class="p0 ft0">Original Copy</P></TD>
            <TD class="tr0 td1"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr0 td2"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr0 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr0 td4"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=4 class="tr0 td5"><P class="p2 ft2">RETAIL INVOICE</P></TD>
            <TD class="tr0 td6"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr0 td7"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr0 td8"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr0 td9"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr0 td10"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr0 td7"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr0 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr0 td12"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr0 td13"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr0 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr0 td9"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr0 td2"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr0 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr0 td15"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr0 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr0 td17"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr1 td18"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td19"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td21"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td22"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=13 class="tr1 td23">
                <P class="p3 ft3"><?php echo getSessionData('branch_name'); ?>
                    <NOBR><?php echo fin_year(array('seperator' => '-')); ?></NOBR>
                </P>
            </TD>
            <TD class="tr1 td24"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td25"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td26"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td27"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td29"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td30"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td24"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td31"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td27"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td32"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td33"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr1 td34"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td18"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td19"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td21"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=13 class="tr2 td35">
                <P class="p4 ft4"><?php echo getSessionData('address1'); ?>
                    Phone: <?php echo getSessionData('telephone1'); ?>
                    <NOBR>E-Mail: <?php echo getSessionData('defaultmail'); ?></NOBR>
                </P>
            </TD>
            <TD class="tr2 td26"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td27"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td29"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td30"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td24"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td31"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td27"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td32"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td33"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr2 td34"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr3 td36"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td37"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td38"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td39"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td1"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=10 class="tr3 td40"><P class="p5 ft0">GST NO : <?php echo getSessionData('gstinno'); ?></P></TD>
            <TD class="tr3 td9"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td10"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td7"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td12"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td13"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td9"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td2"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td15"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td16"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td17"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD colspan=2 class="tr4 td41"><P class="p6 ft4">Name:</P></TD>
            <TD colspan=4 class="tr4 td42" style="border-right: #000000 1px solid;"><P
                        class=" p6 ft5 "><?php echo $billData->party; ?></P></TD>
            <TD colspan=3 class="tr4 td44"><P class="p7 ft4">Mobile:</P></TD>
            <TD colspan=3 class="tr4 td45"><P class="p8 ft5"><?php echo $billData->phoneno; ?></P></TD>
            <TD class="tr4 td46"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr4 td7"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr4 td8"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr4 td12"><P class="p1 ft6">No.:</P></TD>
            <TD class="tr4 td47"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr4 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=6 class="tr4 td48"><P class="p9 ft0"
                                              style="margin-left: -6px;"><?php echo $billData->billno; ?></P></TD>
            <TD colspan=2 class="tr4 td49"><P class="p6 ft4">Date:</P></TD>
            <TD colspan=2 class="tr4 td50"><P class="p10 ft7"><?php echo date("d/m/Y", strtotime($billData->billdate));
                    ?></P></TD>
        </TR>
        <TR>
            <TD class="tr3 td51"><P class="p11 ft6">Sr.</P></TD>
            <TD class="tr3 td19"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr3 td52"><P class="p12 ft6">Particulars</P></TD>
            <TD class="tr3 td53"><P class="p13 ft6">HSN</P></TD>
            <TD colspan=2 class="tr3 td54"><P class="p14 ft6">Qty</P></TD>
            <TD class="tr3 td55"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr3 td56"><P class="p2 ft6">Rate Rs.</P></TD>
            <TD class="tr3 td57"><P class="p15 ft6">Disc.</P></TD>
            <TD class="tr3 td27"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr3 td58"><P class="p14 ft6">Discount</P></TD>
            <TD class="tr3 td59"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td24"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=4 class="tr3 td58"><P class="p1 ft6">Net Rate</P></TD>
            <TD colspan=2 class="tr3 td60"><P class="p16 ft6">Net Rate</P></TD>
            <TD class="tr3 td24"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=4 class="tr3 td61"><P class="p14 ft6">Below <?php echo $billData->lowamt; ?></P></TD>
            <TD class="tr3 td34"><P class="p17 ft6">Above <?php echo $billData->lowamt; ?></P></TD>
        </TR>
        <TR>
            <TD class="tr5 td62"><P class="p1 ft8">&nbsp;</P></TD>
            <TD class="tr5 td37"><P class="p1 ft8">&nbsp;</P></TD>
            <TD class="tr5 td38"><P class="p1 ft8">&nbsp;</P></TD>
            <TD class="tr5 td63"><P class="p1 ft8">&nbsp;</P></TD>
            <TD class="tr5 td64"><P class="p18 ft9">Code</P></TD>
            <TD class="tr5 td2"><P class="p1 ft8">&nbsp;</P></TD>
            <TD class="tr5 td3"><P class="p1 ft8">&nbsp;</P></TD>
            <TD class="tr5 td65"><P class="p1 ft8">&nbsp;</P></TD>
            <TD colspan=2 class="tr5 td66"><P class="p19 ft9">Per Pc</P></TD>
            <TD class="tr5 td67"><P class="p20 ft9">(%)</P></TD>
            <TD class="tr5 td11"><P class="p1 ft8">&nbsp;</P></TD>
            <TD colspan=2 class="tr5 td68"><P class="p17 ft9">Amount</P></TD>
            <TD class="tr5 td8"><P class="p1 ft8">&nbsp;</P></TD>
            <TD class="tr5 td9"><P class="p1 ft8">&nbsp;</P></TD>
            <TD colspan=4 class="tr5 td68"><P class="p0 ft9">Per Pc</P></TD>
            <TD colspan=2 class="tr5 td69"><P class="p16 ft9">Bf Tax</P></TD>
            <TD class="tr5 td9"><P class="p1 ft8">&nbsp;</P></TD>
            <TD class="tr5 td2"><P class="p1 ft8">&nbsp;</P></TD>
            <TD class="tr5 td11"><P class="p1 ft8">&nbsp;</P></TD>
            <TD class="tr5 td15"><P class="p1 ft8">&nbsp;</P></TD>
            <TD class="tr5 td70"><P class="p1 ft8">&nbsp;</P></TD>
            <TD class="tr5 td17"><P class="p1 ft8">&nbsp;</P></TD>
        </TR>
        <?php $i = 0;
        $billData->cgstlper = 0;
        $billData->sgstlper = 0;
        $billData->cgsthper = 0;
        $billData->sgsthper = 0;
        foreach ($itemData as $data) {
            $i++;
            $billData->cgstlper = ($billData->cgstlper) ? $billData->cgstlper : $data->cgstlper;
            $billData->sgstlper = ($billData->sgstlper) ? $billData->sgstlper : $data->sgstlper;
            $billData->cgsthper = ($billData->cgsthper) ? $billData->cgsthper : $data->cgsthper;
            $billData->sgsthper = ($billData->sgsthper) ? $billData->sgsthper : $data->sgsthper;
            ?>
            <TR>
                <TD class="tr6 td51"><P class="p21 ft10"><?php echo $i; ?></P></TD>
                <TD colspan=3 class="tr6 td71">
                    <P class="p9 ft10">
                        <?php echo $data->particular; ?>
                    </P>
                </TD>
                <TD class="tr6 td53"><P class="p22 ft10"><?php echo $data->hsn; ?></P></TD>
                <TD colspan=2 class="tr6 td54"><P class="p20 ft4"><?php echo $data->qty; ?></P></TD>
                <TD class="tr6 td55"><P class="p1 ft1">&nbsp;</P></TD>
                <TD colspan=2 class="tr6 td56"><P class="p21 ft4"><?php echo $data->rate; ?></P></TD>
                <TD class="tr6 td57"><P class="p23 ft4"><?php echo $data->disper; ?></P></TD>
                <TD class="tr6 td27"><P class="p1 ft1">&nbsp;</P></TD>
                <TD colspan=2 class="tr6 td58"><P class="p24 ft4"><?php echo $data->disamt; ?></P></TD>
                <TD class="tr6 td59"><P class="p1 ft1">&nbsp;</P></TD>
                <TD colspan=5 class="tr6 td72"><P class="p24 ft4"><?php echo ($data->netrt) ? $data->netrt : ''; ?></P>
                </TD>
                <TD colspan=2 class="tr6 td60"><P class="p24 ft4"><?php echo ($data->netbt) ? $data->netbt : ''; ?></P>
                </TD>
                <?php if ($data->below) { ?>
                    <TD class="tr6 td24"><P class="p1 ft1">&nbsp;</P></TD>
                    <TD colspan=4 class="tr6 td61"><P class="p26 ft4"><?php echo $data->below ?></P></TD>
                    <TD class="tr6 td34"><P class="p1 ft1">&nbsp;</P></TD>
                <?php } else { ?>
                    <TD class="tr6 td24"><P class="p1 ft1">&nbsp;</P></TD>
                    <TD class="tr6 td31"><P class="p1 ft1">&nbsp;</P></TD>
                    <TD class="tr6 td27"><P class="p1 ft1">&nbsp;</P></TD>
                    <TD class="tr6 td32"><P class="p1 ft1">&nbsp;</P></TD>
                    <TD class="tr6 td73"><P class="p1 ft1">&nbsp;</P></TD>
                    <TD class="tr6 td34"><P class="p18 ft4"><?php echo $data->above; ?></P></TD>
                <?php } ?>
            </TR>
        <?php } ?>

        <TR>
            <TD class="tr7 td62"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td37"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td38"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td63"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td64"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td2"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td65"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td75"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td76"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td67"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td6"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td47"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td8"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td9"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td10"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td7"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td77"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td13"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td78"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td9"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td2"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td15"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td70"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr7 td17"><P class="p1 ft1">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr3 td36"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td37"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr3 td42"><P class="p27 ft6">Total</P></TD>
            <TD class="tr3 td1"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr3 td79"><P class="p28 ft6"><?php echo $billData->totqty; ?></P></TD>
            <TD class="tr3 td4"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td75"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td80"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td81"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td6"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td7"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td8"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td82"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td10"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td7"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td12"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=3 class="tr3 td83"><P class="p29 ft6">Gross:</P></TD>
            <TD colspan=4 class="tr3 td84"><P
                        class="p30 ft6"><?php echo ($billData->netblamt) ? $billData->netblamt : ''; ?></P></TD>
            <TD class="tr3 td17"><P class="p14 ft6"><?php echo ($billData->netabamt) ? $billData->netabamt : ''; ?></P>
            </TD>
        </TR>
        <TR>
            <TD class="tr3 td18"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td19"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td21"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td22"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td31"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td85"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td86"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td87"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td88"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td89"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td27"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td90"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td26"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td59"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td91"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=3 class="tr6 td92"><P class="p31 ft6">CGST</P></TD>
            <TD colspan=2 class="tr6 td67"><P
                        class="p17 ft13"><?php echo ($billData->cgstlper) ? $billData->cgstlper . ' %' : ''; ?> </P>
            </TD>
            <TD class="tr6 td14"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr6 td9"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr6 td93"><P
                        class="p23 ft12"><?php echo ($billData->cgstlamt) ? $billData->cgstlamt : ''; ?></P></TD>
            <TD colspan=2 class="tr6 td44"><P
                        class="p32 ft14"><?php echo ($billData->cgsthper) ? $billData->cgsthper . ' %' : ''; ?></P></TD>
            <TD class="tr6 td17"><P class="p14 ft12"><?php echo ($billData->cgsthamt) ? $billData->cgsthamt : ''; ?></P>
            </TD>
        </TR>
        <TR>
            <TD class="tr3 td18"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td19"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td20"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td21"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td22"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td31"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td85"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td86"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td87"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td88"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td89"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td27"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td90"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td26"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td59"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr3 td91"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=3 class="tr6 td92"><P class="p7 ft6">SGST</P></TD>
            <TD colspan=2 class="tr6 td67"><P
                        class="p7 ft13"><?php echo ($billData->sgstlper) ? $billData->sgstlper . ' %' : ''; ?></P></TD>
            <TD colspan=2 class="tr6 td94"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr6 td93"><P
                        class="p23 ft12"><?php echo ($billData->sgstlamt) ? $billData->sgstlamt : ''; ?></P></TD>
            <TD colspan=2 class="tr6 td44"><P
                        class="p32 ft14"><?php echo ($billData->sgsthper) ? $billData->sgsthper . ' %' : ''; ?></P></TD>
            <TD class="tr6 td17"><P class="p14 ft12"><?php echo ($billData->sgsthamt) ? $billData->sgsthamt : ''; ?></P>
            </TD>
        </TR>
        <TR>
            <TD class="tr8 td36"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr8 td37"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr8 td38"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr8 td39"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr8 td1"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr8 td2"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr8 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr8 td4"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr8 td75"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr8 td80"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr8 td81"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr8 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr8 td6"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr8 td7"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr8 td8"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr8 td82"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr6 td25"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr6 td26"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr6 td27"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr6 td28"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=7 class="tr6 td95"><P class="p14 ft6">Net Inclusive of Taxes :</P></TD>
            <TD class="tr6 td34"><P class="p14 ft6"><?php echo $billData->grsamt; ?></P></TD>
        </TR>
        <TR>
            <TD class="tr5 td36"><P class="p1 ft8">&nbsp;</P></TD>
            <TD class="tr5 td37"><P class="p1 ft8">&nbsp;</P></TD>
            <TD class="tr5 td96"><P class="p0 ft15">Rcvd Rs.</P></TD>
            <TD class="tr5 td39"><P class="p1 ft8">&nbsp;</P></TD>
            <TD colspan=3 class="tr5 td97"><P class="p33 ft15">Return Rs.</P></TD>
            <TD class="tr5 td4"><P class="p1 ft8">&nbsp;</P></TD>
            <TD class="tr5 td98"><P class="p1 ft8">&nbsp;</P></TD>
            <TD colspan=6 class="tr5 td99"><P class="p34 ft15">Nett Paid By Customer</P></TD>
            <TD class="tr5 td82"><P class="p1 ft8">&nbsp;</P></TD>
            <TD class="tr9 td25"><P class="p1 ft16">&nbsp;</P></TD>
            <TD class="tr9 td26"><P class="p1 ft16">&nbsp;</P></TD>
            <TD class="tr9 td27"><P class="p1 ft16">&nbsp;</P></TD>
            <TD class="tr9 td28"><P class="p1 ft16">&nbsp;</P></TD>
            <TD class="tr9 td29"><P class="p1 ft16">&nbsp;</P></TD>
            <TD class="tr9 td30"><P class="p1 ft16">&nbsp;</P></TD>
            <TD class="tr9 td24"><P class="p1 ft16">&nbsp;</P></TD>
            <TD colspan=4 rowspan=2 class="tr10 td84"><P class="p31 ft6">R.Off Rs. :</P></TD>
            <TD rowspan=2 class="tr10 td17">
                <P class="p14 ft6">
                    <NOBR><?php echo $billData->rndoff; ?></NOBR>
                </P>
            </TD>
        </TR>
        <TR>
            <TD class="tr11 td18"><P class="p1 ft17">&nbsp;</P></TD>
            <TD class="tr11 td19"><P class="p1 ft17">&nbsp;</P></TD>
            <TD class="tr11 td100"><P class="p1 ft17">&nbsp;</P></TD>
            <TD class="tr11 td21"><P class="p1 ft17">&nbsp;</P></TD>
            <TD colspan=3 class="tr11 td101"><P class="p1 ft17">&nbsp;</P></TD>
            <TD class="tr11 td86"><P class="p1 ft17">&nbsp;</P></TD>
            <TD class="tr11 td102"><P class="p1 ft17">&nbsp;</P></TD>
            <TD colspan=6 class="tr11 td103"><P class="p1 ft17">&nbsp;</P></TD>
            <TD class="tr11 td91"><P class="p1 ft17">&nbsp;</P></TD>
            <TD class="tr12 td10"><P class="p1 ft18">&nbsp;</P></TD>
            <TD class="tr12 td7"><P class="p1 ft18">&nbsp;</P></TD>
            <TD class="tr12 td11"><P class="p1 ft18">&nbsp;</P></TD>
            <TD class="tr12 td12"><P class="p1 ft18">&nbsp;</P></TD>
            <TD class="tr12 td13"><P class="p1 ft18">&nbsp;</P></TD>
            <TD class="tr12 td14"><P class="p1 ft18">&nbsp;</P></TD>
            <TD class="tr12 td9"><P class="p1 ft18">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr13 td36"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr13 td104"><P class="p35 ft6"><?php echo $billData->rcdamt; ?></P></TD>
            <TD class="tr13 td39"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr13 td105"><P class="p36 ft6"><?php echo $billData->retamt; ?></P></TD>
            <TD class="tr13 td3"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr13 td4"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr13 td98"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr13 td80"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=3 class="tr13 td106"><P class="p37 ft6"><?php echo $billData->custamt; ?></P></TD>
            <TD class="tr13 td7"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr13 td8"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr13 td82"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr13 td10"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr13 td7"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr13 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=4 class="tr13 td107"><P class="p6 ft0">Nett Amount</P></TD>
            <TD class="tr13 td2"><P class="p1 ft1">&nbsp;</P></TD>
            <TD class="tr13 td11"><P class="p1 ft1">&nbsp;</P></TD>
            <TD colspan=2 class="tr13 td108"><P class="p38 ft0">Rs.</P></TD>
            <TD class="tr13 td17"><P class="p39 ft19"><?php echo $billData->netamt; ?></P></TD>
        </TR>
        <?php if ($billData->totdis) { ?>
            <TR>
                <TD colspan=4 class="tr13 td109"><P class="p2 ft20">Your Total Purchase is Rs.</P></TD>
                <TD colspan=2 class="tr13 td110"><P class="p18 ft21"><?php echo $billData->netamt; ?>/-</P></TD>
                <TD class="tr13 td85"><P class="p1 ft1">&nbsp;</P></TD>
                <TD colspan=5 class="tr13 td111"><P class="p1 ft20">and you have got</P></TD>
                <TD colspan=5 class="tr13 td112"><P class="p18 ft21"><?php echo $billData->totdis; ?>/-</P></TD>
                <TD class="tr13 td26"><P class="p1 ft1">&nbsp;</P></TD>
                <TD class="tr13 td27"><P class="p1 ft1">&nbsp;</P></TD>
                <TD colspan=4 class="tr13 td113"><P class="p0 ft20">this purchase.</P></TD>
                <TD class="tr13 td31"><P class="p1 ft1">&nbsp;</P></TD>
                <TD class="tr13 td27"><P class="p1 ft1">&nbsp;</P></TD>
                <TD class="tr13 td32"><P class="p1 ft1">&nbsp;</P></TD>
                <TD class="tr13 td33"><P class="p1 ft1">&nbsp;</P></TD>
                <TD class="tr13 td34"><P class="p1 ft1">&nbsp;</P></TD>
            </TR>
        <?php } ?>
    </TABLE>
    <P class="p40 ft22">THANKING YOU</P>
    <P class="p41 ft23">after 15 days from the date of bill. * Goods Return will not be exchange E. & O.E.</P>
    <P class="p42 ft4">AUTHORIZED SIGN.</P>
</DIV>
</BODY>
</HTML>