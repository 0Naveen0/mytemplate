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
<li><a  href="/apoorvatraders/index.php/branch" class='<?php echo ($pageid==="branchHome")?"selected_menu":"";?>'>Home</a></li>




<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="/apoorvatraders/index.php/branch">View<span class="caret"></span></a>
<ul class="dropdown-menu">
    
   
    
<li><a  href="/apoorvatraders/index.php/branch/branchAccountSummaryView" class='<?php echo ($pageid==="branchAccountSummaryView")?"selected_menu":"";?>'>Branch Summary</a></li>
<li><a href="/apoorvatraders/index.php/branch/customerLedgerView" class='<?php echo ($pageid==="customerLedgerView")?"selected_menu":"";?>'>Customer Ledger</a></li>
<li><a href="/apoorvatraders/index.php/branch/customerEnquiryView" class='<?php echo ($pageid==="customerEnquiryView")?"selected_menu":"";?>'>Enquiry</a></li>
<li><a href="/apoorvatraders/index.php/branch/customerFollowUpView" class='<?php echo ($pageid==="customerFollowUpView")?"selected_menu":"";?>'>Follow Up</a></li>
</ul>
</li>




</ul>
</div>