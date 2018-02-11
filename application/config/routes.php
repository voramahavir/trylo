<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'MainController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'LoginController';
$route['login/(:any)'] = 'LoginController/$1';
$route['dashboard'] = 'MainController';
$route['branch/(:any)'] = 'MainController/branch/$1';
$route['users/(:any)'] = 'MainController/users/$1';
$route['users/(:any)/(:any)'] = 'MainController/users/$1/$2';
$route['salesAdd'] = 'SalesController/add';
$route['salesBill'] = 'SalesController/salesBill';
$route['sales/(:any)'] = 'SalesController/$1';
$route['sales/(:any)/(:any)'] = 'SalesController/$1/$2';
$route['stock'] = 'StockController';
$route['stock/(:any)'] = 'StockController/$1';
$route['stock/(:any)/(:any)'] = 'StockController/$1/$2';
$route['searchItem'] = 'ItemController/searchIem';
$route['item/(:any)'] = 'ItemController/$1';
$route['item/(:any)/(:any)'] = 'ItemController/$1/$2';
$route['salesBill/(:any)'] = 'SalesController/$1';
$route['salesCreate'] = 'SalesController/create';
$route['salesPrint/(:any)'] = 'SalesController/printBill/$1';
$route['membershipcard/(:any)'] = 'MemberShipCardController/$1';
$route['membershipcard/(:any)/(:any)'] = 'MemberShipCardController/$1/$2';
$route['salesreturn'] = 'SalesReturnController';
$route['salesreturn/(:any)'] = 'SalesReturnController/$1';
$route['salesreturn/(:any)/(:any)'] = 'SalesReturnController/$1/$2';
$route['loyaltycard/(:any)'] = 'LoyaltyCardController/$1';
$route['loyaltycard/(:any)/(:any)'] = 'LoyaltyCardController/$1/$2';
$route['scheme/list'] = 'LoyaltyCardController/schemeList';
$route['scheme/add'] = 'LoyaltyCardController/schemeAdd';
$route['scheme/create'] = 'LoyaltyCardController/schemeCreate';
$route['branch/(:any)/(:any)'] = 'MainController/branch/$1/$2';
$route['purchase'] = 'PurchaseController';
$route['purchase/(:any)'] = 'PurchaseController/$1';
$route['purchase/(:any)/(:any)'] = 'PurchaseController/$1/$2';
$route['denomination'] = 'DenominationController';
$route['denomination/(:any)'] = 'DenominationController/$1';
$route['denomination/(:any)/(:any)'] = 'DenominationController/$1/$2';
$route['purchasereturn'] = 'PurchaseReturnController';
$route['purchasereturn/(:any)'] = 'PurchaseReturnController/$1';
$route['voucher'] = 'VoucherController';
$route['voucher/list'] = 'VoucherController/vouList';
$route['voucher/(:any)'] = 'VoucherController/$1';
$route['voucher/(:any)/(:any)'] = 'VoucherController/$1/$2';
$route['customerfeedback/list'] = 'CustomerFeedbackController/custFeedbackList';
$route['customerfeedback/(:any)'] = 'CustomerFeedbackController/$1';
$route['customerfeedback/(:any)/(:any)'] = 'CustomerFeedbackController/$1/$2';
$route['luckydraw/list'] = 'LuckydrawFeedbackController/luckyDrawList';
$route['luckydraw/(:any)'] = 'LuckydrawFeedbackController/$1';
$route['luckydraw/(:any)/(:any)'] = 'LuckydrawFeedbackController/$1/$2';
$route['dndmobile/list'] = 'DndMobileController/dndList';
$route['dndmobile/(:any)'] = 'DndMobileController/$1';
$route['dndmobile/(:any)/(:any)'] = 'DndMobileController/$1/$2';
$route['purchaseorder'] = 'PurchaseOrderController';
$route['purchaseorder/(:any)'] = 'PurchaseOrderController/$1';
$route['purchaseorder/(:any)/(:any)'] = 'PurchaseOrderController/$1/$2';
$route['mobilePayment'] = 'SalesController/mobilePayment';
$route['report/salesregister'] = 'SalesReportController';
$route['salesreport/(:any)'] = 'SalesReportController/$1';
$route['salesreport/(:any)/(:any)'] = 'SalesReportController/$1/$2';