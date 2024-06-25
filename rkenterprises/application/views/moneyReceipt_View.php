<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/staticvariables.php');
$date1="2022-07-01";
//$currentDate=Date('Y-m-d');
/*if( $date >= $date1 ){
$salesofficersignature=base_url().'assets/images/propsig.png';
$contact='9431253247';
}else{
$salesofficersignature=base_url().'assets/images/salesofficer1.png';
$contact='7766909443';	
}
*/
$logourl=base_url().'assets/images/company_logo.jpg';

$head='Money Receipt';
$gstno=$companydetails[0]['companygst'];
$companyname=$companydetails[0]['companyname'];
$companyaddressline1=$companydetails[0]['companyaddressline1'];
$companyaddressline2=$companydetails[0]['companyaddressline2'];
$companydistrict=$companydetails[0]['companydistrict'];
$companystate=$companydetails[0]['companystate'];
$companyaddress=$companyaddressline1.', '.$companyaddressline2.', '.$companydistrict.',('.$companystate.')';
$bankdetails=$companydetails[0]['bankdetails'];
$contact2=$companydetails[0]['companycontact'];
$contact1=$comp_contact2;
//$father = $customerdetails[0]['customerfathername'];
$father = "";
$customerdistrict = "";
$customerstate = "";
?>
<?php 

?>
<div class="d-print-none">
    <form role="form" class="form-horizontal small" method='post' id="moneyReceiptfrm">
        <fieldset>  
            
           
            <legend class='text-center '><?=$head?></legend>
            
           

 <div class="form-group"> 
                 <label for="transactionid" class="col-sm-7 control-label">Transaction No</label>
                <div class="col-sm-3">      
                  <input type="number" min=1 max=12000 class="form-control" id="transactionid" name='transactionid' required="required">
                </div>
                <div class="col-sm-2">
                    
                    <button type='submit' class="btn btn-default " name="searchTransactionBtn" value='searchTransaction'>Search</button>&nbsp;
                    
                </div>

            </div>
           
            
            
            
            
            
        </fieldset>
    </form>
</div>



<?php
if($viewreceipt==='True'){
    if( $date >= $date1 ){
$salesofficersignature=base_url().'assets/images/salesofficer21.png';
//$contact='9546819714';
}else{
$salesofficersignature=base_url().'assets/images/salesofficer21.png';
//$contact='7766909443';	
}

echo '<div id="moneyReceiptContent1" name="moneyReceiptContent1" class="row printit" style="display:block;">';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12 text-right">Office Copy</div></div>';
echo '<div class="row " >';
echo '<div class="col-xs-3 col-sm-3 col-p-3">';
echo '<img class="img-responsive" src="'.$logourl.'" alt="Company Logo"></img>';
echo '</div>';
echo '<div class="col-xs-9 col-sm-9 col-p-9 ">';
echo  ' <div class="row " >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$companyname.'</div>';
echo   '<div class="row " >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$companyaddress.'</div>';
echo   '<div class="row " >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Money Receipt</div>';
echo   '<div class="row" ><div class="col-xs-6 col-sm-6 col-p-6">&nbsp;</div><div class="col-xs-6 col-sm-6 col-p-6 small">Contact:+91-'.$contact1.'</div></div>';
echo '</div>';
echo '</div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12 ">---------------------------------------------------------------------------------------------------</div></div>';
echo   '<div class="row" >';
echo	'<div class="col-xs-3 col-sm-3 col-p-3">Date</div>';
echo	'	<div class="col-xs-3 col-sm-3 col-p-3 right">'. date("d-m-Y",strtotime($date)).'</div>';
echo '		<div class="col-xs-3 col-sm-3 col-p-3">Receipt No.</div>' ;
echo '		<div class="col-xs-3 col-sm-3 col-p-3">'.$receiptno.'</div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">---------------------------------------------------------------------------------------------------</div></div>';
 
echo ' <div class="row"><div class="col-xs-3 col-sm-3 col-p-4 ">Name</div> <div class="col-xs-9 col-sm-9 col-p-8 text-capitalize">'.$customername.'</div></div>';
echo '   <div class="row "><div class="col-xs-3 col-sm-3 col-p-4">S/O|W/O|D/O&nbsp;:</div> <div class="col-xs-9 col-sm-9 col-p-8 text-capitalize">'.$customerdetails[0]['customerfathername'].'</div></div>';
 
echo  ' <div class="row"> <div class="col-xs-3 col-sm-3 col-p-4">Address</div> <div class="col-xs-9 col-sm-9 col-p-8 text-capitalize">'.$customeraddressline1.'</div></div>';
echo '   <div class="row"><div class="col-xs-3 col-sm-3 col-p-4">&nbsp;</div> <div class="col-xs-9 col-sm-9 col-p-8 text-capitalize">'.$customeraddressline2.','.$customerdetails[0]['customerdistrict'].',('.$customerdetails[0]['customerstate'].')'.'</div></div>';
echo '   <div class="row"><div class="col-xs-3 col-sm-3 col-p-4">Contact</div> <div class="col-xs-9 col-sm-9 col-p-8">'.$customercontact.'</div></div>';
echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-4">Amount Received For</div> <div class="col-xs-9 col-sm-9 col-p-8 text-capitalize">'.$remark.'</div></div>';
echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-4">Amount</div> <div class="col-xs-9 col-sm-9 col-p-8"><i class="fa fa-rupee"></i>&nbsp;'.$amount.'</div></div>';
echo '   <div class="row"><div class="col-xs-3 col-sm-3 col-p-4">Amount(in words)</div> <div class="col-xs-9 col-sm-9 col-p-8 text-capitalize"><i class="fa fa-rupee"></i>&nbsp;'.$amountinwords.'</div></div>';
//echo '<hr/>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">---------------------------------------------------------------------------------------------------</div></div>';
echo '   <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">E&OE</div> <div class="col-xs-4 col-sm-4 col-p-4">&nbsp;</div><div class="col-xs-5 col-sm-5 col-p-5">For '.$companyname.'</div></div>';
echo '<div class="row"><div class="col-xs-3 col-sm-3 col-p-3">&nbsp;</div><div class="col-xs-4 col-sm-4 col-p-4">&nbsp;</div><div class="col-xs-5 col-sm-5 col-p-5">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="img-responsive " src="'.$salesofficersignature.'" alt="Signature"></img></div></div>';
echo' <div class="row"><div class="col-xs-7 col-sm-7 col-p-7">&nbsp;</div> <div class="col-xs-5 col-sm-5 col-p-5">'."Authorised Signatory".'</div></div>';
    $id="'"."moneyReceiptContent1"."'" ; 
	
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12 "><br/></div></div>';		
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12 ">------------------------------------------CUT HERE------------------------------------------</div></div>';	
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12 text-right">Customer Copy</div></div>';
echo '<div class="row " >';
echo '<div class="col-xs-3 col-sm-3 col-p-3">';
echo '<img class="img-responsive" src="'.$logourl.'" alt="Piaggio Logo"></img>';
echo '</div>';
echo '<div class="col-xs-9 col-sm-9 col-p-9 ">';
echo  ' <div class="row " >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$companyname.'</div>';
echo   '<div class="row " >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$companyaddress.'</div>';
echo   '<div class="row " >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Money Receipt</div>';
echo   '<div class="row" ><div class="col-xs-6 col-sm-6 col-p-6">&nbsp;</div><div class="col-xs-6 col-sm-6 col-p-6 small">Contact:+91-'.$contact1.'</div></div>';
echo '</div>';
echo '</div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">---------------------------------------------------------------------------------------------------</div></div>';
echo   '<div class="row" >';
echo	'<div class="col-xs-3 col-sm-3 col-p-3">Date</div>';
echo	'	<div class="col-xs-3 col-sm-3 col-p-3 right">'. $date.'</div>';
echo '		<div class="col-xs-3 col-sm-3 col-p-3">Receipt No.</div>' ;
echo '		<div class="col-xs-3 col-sm-3 col-p-3">'.$receiptno.'</div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">---------------------------------------------------------------------------------------------------</div></div>';
 
echo ' <div class="row"><div class="col-xs-3 col-sm-3 col-p-4 ">Name</div> <div class="col-xs-9 col-sm-9 col-p-8    text-capitalize">'.$customername.'</div></div>';
echo '   <div class="row "><div class="col-xs-3 col-sm-3 col-p-4">S/O|W/O|D/O&nbsp;:</div> <div class="col-xs-9 col-sm-9 col-p-8 text-capitalize">'.$customerdetails[0]['customerfathername'].'</div></div>';
 
echo  ' <div class="row"> <div class="col-xs-3 col-sm-3 col-p-4">Address</div> <div class="col-xs-9 col-sm-9 col-p-8 text-capitalize">'.$customeraddressline1.'</div></div>';
echo '   <div class="row"><div class="col-xs-3 col-sm-3 col-p-4">&nbsp;</div> <div class="col-xs-9 col-sm-9 col-p-8 text-capitalize">'.$customeraddressline2.','.$customerdetails[0]['customerdistrict'].',('.$customerdetails[0]['customerstate'].')'.'</div></div>';
echo '   <div class="row"><div class="col-xs-3 col-sm-3 col-p-4">Contact</div> <div class="col-xs-9 col-sm-9 col-p-8">'.$customercontact.'</div></div>';
echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-4">Amount Received For</div> <div class="col-xs-9 col-sm-9 col-p-8 text-capitalize">'.$remark.'</div></div>';
echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-4">Amount</div> <div class="col-xs-9 col-sm-9 col-p-8"><i class="fa fa-rupee"></i>&nbsp;'.$amount.'</div></div>';
echo '   <div class="row"><div class="col-xs-3 col-sm-3 col-p-4">Amount(in words)</div> <div class="col-xs-9 col-sm-9 col-p-8 text-capitalize"><i class="fa fa-rupee"></i>&nbsp;'.$amountinwords.'</div></div>';
//echo '<hr/>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">---------------------------------------------------------------------------------------------------</div></div>';
echo '   <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">E&OE</div> <div class="col-xs-4 col-sm-4 col-p-4">&nbsp;</div><div class="col-xs-5 col-sm-5 col-p-5">For '.$companyname.'</div></div>';
echo '<div class="row"><div class="col-xs-3 col-sm-3 col-p-3">&nbsp;</div><div class="col-xs-4 col-sm-4 col-p-4">&nbsp;</div><div class="col-xs-5 col-sm-5 col-p-5">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="img-responsive " src="'.$salesofficersignature.'" alt="Signature"></img></div></div>';
echo' <div class="row"><div class="col-xs-7 col-sm-7 col-p-7">&nbsp;</div> <div class="col-xs-5 col-sm-5 col-p-5">'."Authorised Signatory".'</div></div></div>';
    $id="'"."moneyReceiptContent2"."'" ; 	
	
  
  
  
  
  
  
  echo '<div class="col-xs-2 col-sm-2 pull-right ">';
                 
echo '<button  class="btn btn-default noprint" name="printReceiptBtn" value="printReceipt" onclick="printdiv('.$id.');" >Print</button> </div>';
}

?>




<!--

<div id=moneyReceiptContent name=moneyReceiptContent>
    
    
          <div class='table-responsive small'>
            <table class='table'>
           <tr><td colspan='5' class=text-center>Apoorva Traders</td></tr>
           <tr><td colspan='5' class=text-center>Mabbi Belauna,Darbhanga</td></tr>
            <tr><td colspan='5' class='text-center small' >Money Receipt</td></tr>
            <tr><td >Date</td><td ><?php //echo $date;?></td><td>&nbsp;</td><td  >Receipt No.</td><td><?php //echo $receiptno;?></td></tr>
           <tr class=small><td >Name</td><td colspan='4'><?php //echo $customername;?></td> </tr>
           <tr class=small><td>Address</td><td colspan='4'><?php //echo $customeraddressline1;?></td></tr>
           
           <tr><td>&nbsp;</td><td colspan='4'><?php //echo $customeraddressline2;?></td></tr>
           <tr><td>Contact</td><td colspan='4'><?php //echo $customercontact;?></td></tr>
           <tr><td>Amount Received For</td><td colspan='4'><?php //echo $remark;?></td></tr>
           <tr><td>Amount</td><td colspan='4'><?php //echo $amount;?></td></tr>
           <tr><td>Amount(in words)</td><td colspan='4'><?php //echo $amountinwords;?></td></tr>
           <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
           <tr><td>E&OE</td><td>&nbsp;</td> <td>&nbsp;</td><td>&nbsp;</td><td>For Apoorva Traders</td></tr>
           </table>
           </div>
    
    
    
</div>
-->
 

