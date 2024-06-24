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
|	$route['default_controller'] = 'Home';
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
$route['default_controller'] = 'home/index';
//$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['home']='home/index';
$route['about']='/home/about';
$route['contact']='home/contact';
$route['registration']='student/registration';
$route['forgot']='home/forgotPassword';
$route['login']='home/login';
$route['exam']='student/exam';
$route['wel']='welcome/index';
$route['member']='member/index';
$route['logout']='home/logout';

$route['dashboard']='member/index';

$route['enquiry-search']='memberview/enquirySearch';
$route['followup']='memberview/customerFollowUpView';
$route['send-message']='memberview/customerSendMessage';
$route['search-customer']='memberview/customerSearch';
$route['followup']='memberview/customerFollowUpView';


$route['daybook-add']='member/dayBookAdd';
$route['search-transaction']='memberview/dayBookSearch';


$route['branch-transfer']='member/branchTransfer';
$route['add-delivery-challan']='member/addDeliveryChallan';
$route['search-vehicle']='memberview/vehicleSearchToReset';
$route['vehicle-movement']='memberview/vehicleMovement';

$route['update-finance']='member/updateFinance';
$route['quotation']='member/generateQuotation';
$route['search-invoice']='memberview/searchinvoice';
$route['money-Receipt']='member/moneyReceipt';


$route['view-invoice']='member/invoiceView1';
$route['delivery-Challan-View']='member/deliveryChallanView';
$route['quotationView']='member/quotationView';
$route['sale-register']='memberview/showSaleRegister';
$route['ledger-customer']='member/customerAccountDetailView';
$route['counter-stock']='memberview/showCounterStock';
$route['show-money-Receipt']='member/moneyReceiptView';
$route['account-summary']='member/customerAccountSummaryView';
$route['formView']='memberview/formView';
$route['dseAccountView']='member/dseAccountView';
$route['stockView']='member/stockView';
$route['dotrackingView']='member/dotrackingView';
$route['atsView']='member/atsView';


$route['isQuotationExist']='member/isQuotationExist';
$route['printQuotation']='member/printQuotation';
$route['isVehicleExist']='member/isVehicleExist';
$route['showInvoice']='member/showInvoiceToPrint';
$route['changePassword']='home/changePassword';
$route['logout']='home/logout';
$route['login']='home/login';
$route['signup']='home/reg';
$route['about']='home/about';
$route['recruitment']='home/recruitment';
$route['contact']='home/contact';
$route['captcha']='home/createCaptcha';
$route['addNewVehicle']='memberview/addNewVehicle';
//$route['home/logout']='index.php/home/logout';
