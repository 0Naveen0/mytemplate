<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
$pageid=($this->session->userdata("pageid"))?($this->session->userdata("pageid")):"";
?>


<div>




<ul class="nav nav-pills">
<li><a  href="<?php echo base_url().'index.php/dashboard';?>" class='<?php echo ($pageid==="memberHome")?"selected_menu":"";?>'>Home</a></li>

<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url().'index.php/dashboard';?>">Customer <span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="<?php echo base_url().'index.php/enquiry-search';?>" class='<?php echo ($pageid==="enquirySearch")?"selected_menu":"";?>'>Enquiry</a></li>
<li><a href="<?php echo base_url().'index.php/followup';?>" class='<?php echo ($pageid==="customerFollowUpView")?"selected_menu":"";?>'>Follow Up</a></li>
<!--<li><a  href="/apoorvatraders/index.php/member/customerAdd" class='<?php //echo ($pageid==="customerAdd")?"selected_menu":"";?>'>New Entry</a></li>-->
<li><a href="<?php echo base_url().'index.php/send-message';?>" class='<?php //echo ($pageid==="customerSendMessage")?"selected_menu":"";?>'>Send Message</a></li><!--
<li><a href="/apoorvatraders/index.php/member/customerDelete" class='<?php //echo ($pageid==="customerDelete")?"selected_menu":"";?>'>Delete entry</a></li>
--><li><a href="<?php echo base_url().'index.php/search-customer';?>" class='<?php echo ($pageid==="customerSearch")?"selected_menu":"";?>'>Search Customer</a></li>

</ul>
</li>

<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url().'index.php/dashboard';?>">Day Book<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="<?php echo base_url().'index.php/daybook-add';?>" class='<?php echo ($pageid==="dayBookAdd")?"selected_menu":"";?>'>New Entry</a></li>
<!--<li><a href="/apoorvatraders/index.php/member/dayBookEdit" class='<?php //echo ($pageid==="dayBookEdit")?"selected_menu":"";?>'>Modify Entry</a></li>
<li><a href="/apoorvatraders/index.php/member/dayBookDelete" class='<?php //echo ($pageid==="dayBookDelete")?"selected_menu":"";?>'>Delete Entry</a></li>-->
<li><a href="<?php echo base_url().'index.php/search-transaction';?>" class='<?php echo ($pageid==="dayBookSearch")?"selected_menu":"";?>'>Search Transaction</a></li>
</ul>
</li> 






<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url().'index.php/dashboard';?>">Vehicle<span class="caret"></span></a>
<ul class="dropdown-menu">
    <li><a href="<?php echo base_url().'index.php/search-vehicle';?>" class='<?php echo ($pageid==="vehicleSearchToReset")?"selected_menu":"";?>'>Vehicle Search</a></li>

<!--<li><a href="/apoorvatraders/index.php/member/editPurchase" class='<?php //echo ($pageid==="editPurchase")?"selected_menu":"";?>'>Modify Purchase</a></li>
<li><a href="/apoorvatraders/index.php/member/deletePurchase" class='<?php //echo ($pageid==="deletePurchase")?"selected_menu":"";?>'>Delete Purchase</a></li>-->
<li><a href="<?php echo base_url().'index.php/branch-transfer';?>" class='<?php echo ($pageid==="branchTransfer")?"selected_menu":"";?>'>Branch Transfer</a></li>
<li><a href="<?php echo base_url().'index.php/add-delivery-challan';?>" class='<?php echo ($pageid==="addDeliveryChallan")?"selected_menu":"";?>'>Delivery Challan</a></li>
<!--
<li><a href="/apoorvatraders/index.php/member/editDeliveryChallan" class='<?php //echo ($pageid==="editDeliveryChallan")?"selected_menu":"";?>'>Modify Delivery Challan</a></li>
<li><a href="/apoorvatraders/index.php/member/deleteDeliveryChallan" class='<?php //echo ($pageid==="deleteDeliveryChallan")?"selected_menu":"";?>'>Delete Delivery Challan</a></li>-->
<li><a href="<?php echo base_url().'index.php/vehicle-movement';?>" class='<?php echo ($pageid==="vehicleMovement")?"selected_menu":"";?>'>Vehicle Movement</a></li>
<!--<li><a href="/apoorvatraders/index.php/member/addPurchase" class='<?php //echo ($pageid==="addPurchase")?"selected_menu":"";?>'>Purchase Add</a></li>-->


</ul>
</li> 



<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url().'index.php/dashboard';?>">Finance<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="<?php echo base_url().'index.php/update-finance';?>" class='<?php echo ($pageid==="updateFinance")?"selected_menu":"";?>'>Update Finance</a></li>
</ul>
</li>



<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url().'index.php/dashboard';?>">Sale<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="<?php echo base_url().'index.php/quotation';?>" class='<?php echo ($pageid==="quotation")?"selected_menu":"";?>'>Quotation</a>
<ul class="dropdown-menu">

</ul>
</li>


<!--<li><a href="/apoorvatraders/index.php/member/deliveryChallan" class='<?php //echo ($pageid==="deliveryChallan")?"selected_menu":"";?>'>Delivery Challan</a>-->
<ul class="dropdown-menu">

</ul>


</li>
<li><a href="<?php echo base_url().'index.php/search-invoice';?>" class='<?php echo ($pageid==="searchinvoice")?"selected_menu":"";?>'>Invoice</a>
<!--<li><a href="/apoorvatraders/index.php/memberview/invoice" class='<?php //echo ($pageid==="invoice")?"selected_menu":"";?>'>Invoice1</a>

<ul class="dropdown-menu">

</ul>

</li>-->
<!--<li><a href="/apoorvatraders/index.php/member/formTwentyOne" class='<?php //echo ($pageid==="formTwentyOne")?"selected_menu":"";?>'>Form 21</a>-->

<ul class="dropdown-menu">

</ul>


</li>
<li><a href="<?php echo base_url().'index.php/money-Receipt';?>" class='<?php echo ($pageid==="moneyReceipt")?"selected_menu":"";?>'>Money Receipt</a>

<ul class="dropdown-menu">

</ul>

</li>

</ul>
</li> 

<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url().'index.php/dashboard';?>">View<span class="caret"></span></a>
<ul class="dropdown-menu">
    <li><a href="<?php echo base_url().'index.php/view-invoice';?>" class='<?php echo ($pageid==="invoiceView1")?"selected_menu":"";?>'>Invoice</a></li>
    <li><a href="<?php echo base_url().'index.php/delivery-Challan-View';?>" class='<?php echo ($pageid==="deliveryChallanView")?"selected_menu":"";?>'>Delivery Challan</a></li>
    <li><a href="<?php echo base_url().'index.php/quotationView';?>" class='<?php echo ($pageid==="quotationView")?"selected_menu":"";?>'>Quotation</a></li>
    <li><a href="<?php echo base_url().'index.php/sale-register';?>" class='<?php echo ($pageid==="showSaleRegister")?"selected_menu":"";?>'>Sale Register</a></li>
    <li><a href="<?php echo base_url().'index.php/ledger-customer';?>" class='<?php echo ($pageid==="customerAccountDetailView")?"selected_menu":"";?>'>Customer Account Detail</a></li>
<li><a  href="<?php echo base_url().'index.php/counter-stock';?>" class='<?php echo ($pageid==="showCounterStock")?"selected_menu":"";?>'>Counter Stock</a></li>
<!--<li><a href="/apoorvatraders/index.php/member/invoiceView" class='<?php //echo ($pageid==="invoiceView")?"selected_menu":"";?>'>Invoice</a></li>-->

<!--<li><a href="/apoorvatraders/index.php/member/formTwentyOneView" class='<?php //echo ($pageid==="formTwentyOneView")?"selected_menu":"";?>'>Form 21</a></li>-->
<li><a href="<?php echo base_url().'index.php/show-money-Receipt';?>" class='<?php echo ($pageid==="moneyReceiptView")?"selected_menu":"";?>'>Money Receipt</a></li>
    
<li><a  href="<?php echo base_url().'index.php/account-summary';?>" class='<?php echo ($pageid==="customerAccountSummaryView")?"selected_menu":"";?>'>Summary Branch Account</a></li>
<li><a href="<?php echo base_url().'index.php/formView';?>" class='<?php echo ($pageid==="formView")?"selected_menu":"";?>'>Forms</a></li>	
<li><a href="<?php echo base_url().'index.php/dseAccountView';?>" class='<?php echo ($pageid==="dseAccountView")?"selected_menu":"";?>'>Account DSE</a></li>
<li><a href="<?php echo base_url().'index.php/stockView';?>" class='<?php echo ($pageid==="stockView")?"selected_menu":"";?>'>Stock</a></li>
<li><a  href="<?php echo base_url().'index.php/dotrackingView';?>" class='<?php echo ($pageid==="dotrackingView")?"selected_menu":"";?>'>DO Tracking</a></li>
<li><a href="<?php echo base_url().'index.php/atsView';?>" class='<?php echo ($pageid==="atsView")?"selected_menu":"";?>'>ATS</a></li>


</ul>
</li>




</ul>
</div>