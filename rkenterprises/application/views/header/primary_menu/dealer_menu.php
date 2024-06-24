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
<li><a  href="/apoorvatraders/index.php/member" class='<?php echo ($pageid==="memberHome")?"selected_menu":"";?>'>Home</a></li>

<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="/apoorvatraders/index.php/member">Customer <span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a  href="/apoorvatraders/index.php/member/customerAdd" class='<?php echo ($pageid==="customerAdd")?"selected_menu":"";?>'>New Entry</a></li><!--
<li><a href="/apoorvatraders/index.php/member/customerEdit" class='<?php //echo ($pageid==="customerEdit")?"selected_menu":"";?>'>Modify Entry</a></li>
<li><a href="/apoorvatraders/index.php/member/customerDelete" class='<?php //echo ($pageid==="customerDelete")?"selected_menu":"";?>'>Delete entry</a></li>
--><li><a href="/apoorvatraders/index.php/memberview/customerSearch" class='<?php echo ($pageid==="customerSearch")?"selected_menu":"";?>'>Search Customer</a></li>

</ul>
</li>

<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="/apoorvatraders/index.php/member">Day Book<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="/apoorvatraders/index.php/member/dayBookAdd" class='<?php echo ($pageid==="dayBookAdd")?"selected_menu":"";?>'>New Entry</a></li>
<li><a href="/apoorvatraders/index.php/member/dayBookEdit" class='<?php echo ($pageid==="dayBookEdit")?"selected_menu":"";?>'>Modify Entry</a></li>
<li><a href="/apoorvatraders/index.php/member/dayBookDelete" class='<?php echo ($pageid==="dayBookDelete")?"selected_menu":"";?>'>Delete Entry</a></li>
<li><a href="/apoorvatraders/index.php/memberview/dayBookSearch" class='<?php echo ($pageid==="dayBookSearch")?"selected_menu":"";?>'>Search Transaction</a></li>
</ul>
</li> 






<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="/apoorvatraders/index.php/member">Vehicle<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="/apoorvatraders/index.php/member/addPurchase" class='<?php echo ($pageid==="addPurchase")?"selected_menu":"";?>'>Purchase Add</a></li>
<li><a href="/apoorvatraders/index.php/member/editPurchase" class='<?php echo ($pageid==="editPurchase")?"selected_menu":"";?>'>Modify Purchase</a></li>
<li><a href="/apoorvatraders/index.php/member/deletePurchase" class='<?php echo ($pageid==="deletePurchase")?"selected_menu":"";?>'>Delete Purchase</a></li>
<li><a href="/apoorvatraders/index.php/member/branchTransfer" class='<?php echo ($pageid==="branchTransfer")?"selected_menu":"";?>'>Branch Transfer</a></li>
<li><a href="/apoorvatraders/index.php/member/addDeliveryChallan" class='<?php echo ($pageid==="addDeliveryChallan")?"selected_menu":"";?>'>Delivery Challan</a></li>
<li><a href="/apoorvatraders/index.php/member/editDeliveryChallan" class='<?php echo ($pageid==="editDeliveryChallan")?"selected_menu":"";?>'>Modify Delivery Challan</a></li>
<li><a href="/apoorvatraders/index.php/member/deleteDeliveryChallan" class='<?php echo ($pageid==="deleteDeliveryChallan")?"selected_menu":"";?>'>Delete Delivery Challan</a></li>
<li><a href="/apoorvatraders/index.php/memberview/vehicleMovement" class='<?php echo ($pageid==="vehicleMovement")?"selected_menu":"";?>'>Vehicle Movement</a></li>

</ul>
</li> 



<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="/apoorvatraders/index.php/member">Finance<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="/apoorvatraders/index.php/member/updateFinance" class='<?php echo ($pageid==="updateFinance")?"selected_menu":"";?>'>Update Finance</a></li>
</ul>
</li>



<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="/apoorvatraders/index.php/member">Sale<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="/apoorvatraders/index.php/member/generateQuotation" class='<?php echo ($pageid==="quotation")?"selected_menu":"";?>'>Quotation</a>
<ul class="dropdown-menu">

</ul>
</li>


<li><a href="/apoorvatraders/index.php/member/deliveryChallan" class='<?php echo ($pageid==="deliveryChallan")?"selected_menu":"";?>'>Delivery Challan</a>
<ul class="dropdown-menu">

</ul>


</li>
<li><a href="/apoorvatraders/index.php/member/invoice" class='<?php echo ($pageid==="invoice")?"selected_menu":"";?>'>Invoice</a>

<ul class="dropdown-menu">

</ul>

</li>
<li><a href="/apoorvatraders/index.php/member/formTwentyOne" class='<?php echo ($pageid==="formTwentyOne")?"selected_menu":"";?>'>Form 21</a>

<ul class="dropdown-menu">

</ul>


</li>
<li><a href="/apoorvatraders/index.php/member/moneyReceipt" class='<?php echo ($pageid==="moneyReceipt")?"selected_menu":"";?>'>Money Receipt</a>

<ul class="dropdown-menu">

</ul>

</li>

</ul>
</li> 

<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="/apoorvatraders/index.php/member">View<span class="caret"></span></a>
<ul class="dropdown-menu">
    
    <li><a href="/apoorvatraders/index.php/member/quotationView" class='<?php echo ($pageid==="quotationView")?"selected_menu":"";?>'>Quotation</a></li>
<li><a href="/apoorvatraders/index.php/member/deliveryChallanView" class='<?php echo ($pageid==="deliveryChallanView")?"selected_menu":"";?>'>Delivery Challan</a></li>
<!--<li><a href="/apoorvatraders/index.php/member/invoiceView" class='<?php //echo ($pageid==="invoiceView")?"selected_menu":"";?>'>Invoice</a></li>-->
<li><a href="/apoorvatraders/index.php/member/invoiceView1" class='<?php echo ($pageid==="invoiceView1")?"selected_menu":"";?>'>Invoice</a></li>
<li><a href="/apoorvatraders/index.php/member/formTwentyOneView" class='<?php echo ($pageid==="formTwentyOneView")?"selected_menu":"";?>'>Form 21</a></li>
<li><a href="/apoorvatraders/index.php/member/moneyReceiptView" class='<?php echo ($pageid==="moneyReceiptView")?"selected_menu":"";?>'>Money Receipt</a></li>
    
<li><a  href="/apoorvatraders/index.php/member/customerAccountSummaryView" class='<?php echo ($pageid==="customerAccountSummaryView")?"selected_menu":"";?>'>Summary Branch Account</a></li>
<li><a href="/apoorvatraders/index.php/member/customerAccountDetailView" class='<?php echo ($pageid==="customerAccountDetailView")?"selected_menu":"";?>'>Customer Account Detail</a></li>
<li><a href="/apoorvatraders/index.php/member/dseAccountView" class='<?php echo ($pageid==="dseAccountView")?"selected_menu":"";?>'>Account DSE</a></li>
<li><a href="/apoorvatraders/index.php/member/stockView" class='<?php echo ($pageid==="stockView")?"selected_menu":"";?>'>Stock</a></li>
<li><a  href="/apoorvatraders/index.php/member/dotrackingView" class='<?php echo ($pageid==="dotrackingView")?"selected_menu":"";?>'>DO Tracking</a></li>
<li><a href="/apoorvatraders/index.php/member/atsView" class='<?php echo ($pageid==="atsView")?"selected_menu":"";?>'>ATS</a></li>
<li><a href="/apoorvatraders/index.php/memberview/showSaleRegister" class='<?php echo ($pageid==="showSaleRegister")?"selected_menu":"";?>'>Sale Register</a></li>

</ul>
</li>




</ul>
</div>