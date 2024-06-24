<?php
//Day Book Search View
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/staticvariables.php');
//echo var_dump($quotationdetail);

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
$juridiction=$comp_district;

$customername=$customerdetails[0]['customername'];
$father=$customerdetails[0]['customerfathername'];
$customeraddressline1=$customerdetails[0]['customeraddressline1'];
$customeraddressline2=$customerdetails[0]['customeraddressline2'];
$customercontact=$customerdetails[0]['customercontact'];
$pin=$customerdetails[0]['customerpin'];
$modalname=$quotationdetails[0]['modalname'];
$i=1;
$qty=1;

?>


<div>
<?php
//echo $message;
if($quotationType==='Type_A'){
    
    $date1="01-07-2022";
//$currentDate=Date('Y-m-d');
if( $date >= $date1 ){
$salesofficersignature=base_url().'assets/images/salesofficer21.png';
//$contact='9546819714';
}else{
$salesofficersignature=base_url().'assets/images/salesofficer1.png';
$contact='7766909443';	
}

//echo '<div id="quotationContent" name="quotationContent" class="row printit" style="display:block;">';
 echo '<div class="row " ><div class="col-xs-12 col-sm-12 col-p-12 text-center">QUOTATION</div></div>';  
 echo '<div class="row " ><div class="col-xs-2 col-sm-2 col-p-2">GSTIN</div><div class="col-xs-3 col-sm-3 col-p-3">'.$gstno.'</div>
 <div class="col-xs-2 col-sm-2 col-p-2"></div><div class="col-xs-5 col-sm-5 col-p-5"><i class="fa fa-phone" aria-hidden="true"></i>'.$contact1.','.$contact2.'</div></div>'; 
echo '<div class="row " >';
echo '<div class="col-xs-3 col-sm-3 col-p-3">';
echo '<img class="img-responsive" src="'.$logourl.'" alt="Piaggio Logo"></img>';
echo '</div>';
echo '<div class="col-xs-9 col-sm-9 col-p-9 ">';
echo  ' <div class="row " >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$companyname.'</div>';
echo   '<div class="row " >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$companyaddress.'</div>';
echo '</div>';
echo '</div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
echo   '<div class="row" >';
echo	'<div class="col-xs-7 col-sm-7 col-p-7">';

echo ' <div class="row"><div class="col-xs- col-sm-4 col-p-4 ">Name&nbsp;:</div> <div class="col-xs-8 col-sm-8 col-p-8 ">'.$customername.'</div></div>';
echo '   <div class="row small"><div class="col-xs-4 col-sm-4 col-p-4">S/O|W/O|D/O&nbsp;:</div> <div class="col-xs-8 col-sm-8 col-p-8">'.$father.'</div></div>';
echo  ' <div class="row small"> <div class="col-xs-4 col-sm-4 col-p-4">Address&nbsp;:</div> <div class="col-xs-8 col-sm-8 col-p-8">'.$customeraddressline1.'</div></div>';
echo '   <div class="row small"><div class="col-xs-4 col-sm-4 col-p-4">&nbsp;</div> <div class="col-xs-8 col-sm-8 col-p-8">'.$customeraddressline2.', '.$customerdetails[0]['customerdistrict'].',('.$customerdetails[0]['customerstate'].')'.'</div></div>';
echo '   <div class="row small"><div class="col-xs-4 col-sm-4 col-p-4">PIN&nbsp;:</div> <div class="col-xs-8 col-sm-8 col-p-8">'.$pin.'</div></div>';
echo '   <div class="row small"><div class="col-xs-4 col-sm-4 col-p-4">Contact&nbsp;:</div> <div class="col-xs-8 col-sm-8 col-p-8 ">'.$customercontact.'</div></div>';

echo '</div>';
echo	'	<div class="col-xs-5 col-sm-5 col-p-5 small">';
echo   '<div class="row " ><div class="col-xs-5 col-sm-5 col-p-5 ">No.&nbsp;:</div><div class="col-xs-7 col-sm-7 col-p-7 ">'. $quotationno.'</div></div>';
echo   '<div class="row" ><div class="col-xs-5 col-sm-5 col-p-5">Date&nbsp;:</div><div class="col-xs-7 col-sm-7 col-p-7 ">'. $date.'</div></div>';


echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">&nbsp;</div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">&nbsp;</div></div>';
echo '</div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
echo '<div class="row small"> <div class="col-xs-12 col-sm-12 col-p-12">Dear Sir,With reference to your enquiry number&nbsp;'.$enquiry.'&nbsp;dated&nbsp;'.$enqdate.'&nbsp;, we have pleasure to quote below rates, which is subject to terms and conditions mentioned at bottom of page.</div></div>';


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


echo '<div class="row"> 
         <div class="col-xs-12 col-sm-12 col-p-12">
         <table class="table table-bordered table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Part No</th>
      <th scope="col">HSN</th>
      <th scope="col">Unit Price</th>
      <th scope="col">Qty</th>
      <th scope="col">GST</th>
      <th scope="col">Total</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="col">'.$i++.'</th>
      <th scope="col">'.$modalname.'</th>
      <th scope="col">'.$hsn.'</th>
      <th scope="col">'.$basic.'</th>
      <th scope="col">'.$qty.'</th>
      <th scope="col">'.$gst.'&percnt;</th>
      <th scope="col">'.$total.'</th>
    </tr>
    <tr>
      <th scope="row">'.$i++.'</th>
      <td colspan="5">Insurance</td>
      <td>&nbsp;&nbsp;'.$insurance.'</td>
      
    </tr>
    <tr>
      <th scope="row">'.$i++.'</th>
      <td colspan="5">Registration & Accessories</td>
      <td>&nbsp;&nbsp;'.$roadtax.'</td>
    </tr>
    <tr>
      <th scope="row">'.$i++.'</th>
      <td colspan="5">Hypo.</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;'.$permit.'</td>
    </tr>
    <tr>
      <th scope="row">'.$i++.'</th>
      <td colspan="5">Others</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;'.$access.'</td>
    </tr>
    <tr>
      <th scope="row">'.$i++.'</th>
      <td colspan="5">Discount</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-'.$discount.'</td>
    </tr>
     <tr class="small">
      <th scope="row" colspan="5">Amount(in words)&nbsp;&colon;&nbsp;<i class="fa fa-rupee"></i>&nbsp;'.$amountinwords.'</th>
      <td >Round off</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$roundoff.'</td>
    </tr>
    <tr>
      <th scope="row" colspan="5"></th>
      <td >Total</td>
      <td>'.$gross.'</td>
    </tr>
  </tbody>
</table></div></div>';


echo '   <div class="row small"><div class="col-xs-12 col-sm-12 col-p-12 small">'.$bankdetails.'</div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
echo '   <div class="row small"><div class="col-xs-3 col-sm-3 col-p-3 ">E&OE   </div><div class="col-xs-5 col-sm-5 col-p-5 ">(Subject to '.$juridiction.' Juridiction)  </div><div class="col-xs-4 col-sm-4 col-p-4">For '. $companyname.' </div></div>';
echo '<div class="row small"><div class="col-xs-7 col-sm-7 col-p-7 ">'.$quote.'</div><div class="col-xs-2 col-sm-2 col-p-2">&nbsp;</div><div class="col-xs-3 col-sm-3 col-p-3 ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="img-responsive " src="'.$salesofficersignature.'" alt="Signature"></img></div></div>';
echo' <div class="row small"><div class="col-xs-7 col-sm-7 col-p-7"></div><div class="col-xs-1 col-sm-1 col-p-1">&nbsp;</div> <div class="col-xs-4 col-sm-4 col-p-4">'."Authorised Signatory".'</div></div></div>';
    $id="'"."showQuotationResultContent"."'" ; 
  echo '<div class="col-xs-2 col-sm-2 pull-right ">';
                 
echo '<button  class="btn btn-default noprint" name="printquotationBtn" value="printQuotation" onclick="printdiv('.$id.');" >Print</button> </div>';


}else if($quotationType==='Type_B'){
    
    $date1="01-07-2022";
//$currentDate=Date('Y-m-d');
if( $date >= $date1 ){
$salesofficersignature=base_url().'assets/images/salesofficer21.png';
$contact='9546819714';
}else{
$salesofficersignature=base_url().'assets/images/salesofficer1.png';
$contact='7766909443';	
}

echo '<div class="row " ><div class="col-xs-12 col-sm-12 col-p-12 text-center">QUOTATION</div></div>';  
 echo '<div class="row " ><div class="col-xs-2 col-sm-2 col-p-2">GSTIN</div><div class="col-xs-3 col-sm-3 col-p-3">'.$gstno.'</div>
 <div class="col-xs-2 col-sm-2 col-p-2"></div><div class="col-xs-5 col-sm-5 col-p-5"><i class="fa fa-phone" aria-hidden="true"></i>'.$contact1.','.$contact2.'</div></div>'; 
echo '<div class="row " >';
echo '<div class="col-xs-3 col-sm-3 col-p-3">';
echo '<img class="img-responsive" src="'.$logourl.'" alt="company Logo"></img>';
echo '</div>';
echo '<div class="col-xs-9 col-sm-9 col-p-9 ">';
echo  ' <div class="row " >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$companyname.'</div>';
echo   '<div class="row small" >&nbsp;&nbsp;&nbsp;'.$companyaddress.'</div>';
echo '</div>';
echo '</div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
echo   '<div class="row" >';
echo	'<div class="col-xs-7 col-sm-7 col-p-7">';

echo ' <div class="row"><div class="col-xs- col-sm-4 col-p-4 ">Name&nbsp;:</div> <div class="col-xs-8 col-sm-8 col-p-8 ">'.$customername.'</div></div>';
echo '   <div class="row small"><div class="col-xs-4 col-sm-4 col-p-4">S/O|W/O|D/O&nbsp;:</div> <div class="col-xs-8 col-sm-8 col-p-8">'.$father.'</div></div>';
echo  ' <div class="row small"> <div class="col-xs-4 col-sm-4 col-p-4">Address&nbsp;:</div> <div class="col-xs-8 col-sm-8 col-p-8">'.$customeraddressline1.'</div></div>';
echo '   <div class="row small"><div class="col-xs-4 col-sm-4 col-p-4">&nbsp;</div> <div class="col-xs-8 col-sm-8 col-p-8">'.$customeraddressline2.', '.$customerdetails[0]['customerdistrict'].',('.$customerdetails[0]['customerstate'].')'.'</div></div>';
echo '   <div class="row small"><div class="col-xs-4 col-sm-4 col-p-4">PIN&nbsp;:</div> <div class="col-xs-8 col-sm-8 col-p-8">'.$pin.'</div></div>';
echo '   <div class="row small"><div class="col-xs-4 col-sm-4 col-p-4">Contact&nbsp;:</div> <div class="col-xs-8 col-sm-8 col-p-8 ">'.$customercontact.'</div></div>';

echo '</div>';
echo	'	<div class="col-xs-5 col-sm-5 col-p-5 small">';
echo   '<div class="row " ><div class="col-xs-5 col-sm-5 col-p-5 ">No.&nbsp;:</div><div class="col-xs-7 col-sm-7 col-p-7 ">'. $quotationno.'</div></div>';
echo   '<div class="row" ><div class="col-xs-5 col-sm-5 col-p-5">Date&nbsp;:</div><div class="col-xs-7 col-sm-7 col-p-7 ">'. $date.'</div></div>';


echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">&nbsp;</div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">&nbsp;</div></div>';
echo '</div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
echo '<div class="row small"> <div class="col-xs-12 col-sm-12 col-p-12">Dear Sir,With reference to your enquiry number&nbsp;'.$enquiry.'&nbsp;dated&nbsp;'.$enqdate.'&nbsp;, we have pleasure to quote below rates, which is subject to terms and conditions mentioned at bottom of page.</div></div>';


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($this->load->helper('message_helper')){
$amountinwords1=Show_Amount_In_Words($total);

    
}else{
  $amountinwords="";  
}

echo '<div class="row"> 
         <div class="col-xs-12 col-sm-12 col-p-12">
         <table class="table table-bordered table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Part No</th>
      <th scope="col">HSN</th>
      <th scope="col">Ex Showroom</th>
      <th scope="col">Qty</th>
      <th scope="col">GST</th>
      <th scope="col">Total</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="col">'.$i++.'</th>
      <th scope="col">'.$modalname.'</th>
      <th scope="col">'.$hsn.'</th>
      <th scope="col">'.$total.'</th>
      <th scope="col">'.$qty.'</th>
      <th scope="col">'.$gst.'&percnt;</th>
      <th scope="col">'.$total.'</th>
    </tr>
    
    <tr>
      
      <td colspan="7"></td>
      
    </tr>
	<tr>
      
      <td colspan="7"></td>
      
    </tr>
	<tr>
      
      <td colspan="7"></td>
      
    </tr>
    
    
    
     <tr class="small">
      <th scope="row" colspan="5">Amount(in words)&nbsp;&colon;&nbsp;<i class="fa fa-rupee"></i>&nbsp;'.$amountinwords1.'</th>
      <td >Round off</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$roundoff.'</td>
    </tr>
    <tr>
      <th scope="row" colspan="5"></th>
      <td >Total</td>
      <td>'.$total.'</td>
    </tr>
  </tbody>
</table></div></div>';


echo '   <div class="row small"><div class="col-xs-12 col-sm-12 col-p-12 small">'.$bankdetails.'</div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
echo '   <div class="row small"><div class="col-xs-3 col-sm-3 col-p-3 ">E&OE   </div><div class="col-xs-5 col-sm-5 col-p-5 ">(Subject to '.$juridiction.' Juridiction)  </div><div class="col-xs-4 col-sm-4 col-p-4">For '.$companyname.'</div></div>';
echo '<div class="row small"><div class="col-xs-7 col-sm-7 col-p-7 ">'.$quote.'</div><div class="col-xs-2 col-sm-2 col-p-2">&nbsp;</div><div class="col-xs-3 col-sm-3 col-p-3 ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="img-responsive " src="'.$salesofficersignature.'" alt="Signature"></img></div></div>';
echo' <div class="row small"><div class="col-xs-7 col-sm-7 col-p-7"></div><div class="col-xs-1 col-sm-1 col-p-1">&nbsp;</div> <div class="col-xs-4 col-sm-4 col-p-4">'."Authorised Signatory".'</div></div></div>';
    $id="'"."showQuotationResultContent"."'" ; 
  echo '<div class="col-xs-2 col-sm-2 pull-right ">';
                 
echo '<button  class="btn btn-default noprint " name="printquotationBtn" value="printQuotation" onclick="printdiv('.$id.');" >Print</button> </div>';


	
}

?>
