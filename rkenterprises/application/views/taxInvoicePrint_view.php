<?php
//Tax Invoice View
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<?php 
$gstno=$companydetails[0]['companygst'];
$companyname=$companydetails[0]['companyname'];
$companyaddressline1=$companydetails[0]['companyaddressline1'];
$companyaddressline2=$companydetails[0]['companyaddressline2'];
$companydistrict=$companydetails[0]['companydistrict'];
$companystate=$companydetails[0]['companystate'];
$companyaddress=$companyaddressline1.', '.$companyaddressline2.', '.$companydistrict.',('.$companystate.')';
$brand="Mayuri";
$contact2=$companydetails[0]['companycontact'];
$contact1="8540828517";

$logourl=base_url().'assets/images/company_logo.jpg';
//$salesofficersignature=base_url().'assets/images/salesofficer1.png';

?>




<?php
//echo $message;
if($viewInvoice==='True'){
    
    $date1="01-07-2022";
//$currentDate=Date('Y-m-d');
if( $date >= $date1 ){
$salesofficersignature=base_url().'assets/images/salesofficer21.png';
//$contact1='9546819714';

}else{
$salesofficersignature=base_url().'assets/images/salesofficer1.png';
//$contact='7766909443';	
}
    
$ecu=$ecu?$ecu:"NA";
echo '<div id="taxInvoiceContent" name="taxInvoiceContent" class="row printit" style="display:block;">';
 echo '<div class="row " ><div class="col-xs-12 col-sm-12 col-p-12 text-center">TAX INVOICE</div></div>';  
 echo '<div class="row small" ><div class="col-xs-2 col-sm-2 col-p-2">GSTIN</div><div class="col-xs-3 col-sm-3 col-p-3">'.$gstno.'</div>
 <div class="col-xs-2 col-sm-2 col-p-2"></div><div class="col-xs-5 col-sm-5 col-p-5"><i class="fa fa-phone" aria-hidden="true"></i>'.$contact1.','.$contact2.'</div></div>'; 
echo '<div class="row " >';
echo '<div class="col-xs-3 col-sm-3 col-p-3">';
echo '<img class="img-responsive" src="'.$logourl.'" alt="Piaggio Logo"></img>';
echo '</div>';
echo '<div class="col-xs-9 col-sm-9 col-p-9 ">';
echo  ' <div class="row " >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$companyname.'</div>';
if($companyid==='1001'){
echo   '<div class="row small" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$companyaddress.'</div>';
}else if($companyid==='1002'){
echo   '<div class="row small" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$companyaddress.'</div>';
}else{
  echo   '<div class="row small" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$companyaddress.'</div>';  
}
echo '</div>';
echo '</div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
echo   '<div class="row" >';
echo	'<div class="col-xs-7 col-sm-7 col-p-7">';

echo ' <div class="row"><div class="col-xs- col-sm-4 col-p-4 ">Name&nbsp;:</div> <div class="col-xs-8 col-sm-8 col-p-8 text-capitalize ">'.$customername.'</div></div>';
echo '   <div class="row small"><div class="col-xs-4 col-sm-4 col-p-4 ">S/O|W/O|D/O&nbsp;:</div> <div class="col-xs-8 col-sm-8 col-p-8 ">'.$father.'</div></div>';
echo  ' <div class="row small"> <div class="col-xs-4 col-sm-4 col-p-4">Address&nbsp;:</div> <div class="col-xs-8 col-sm-8 col-p-8 ">'.$customeraddressline1.'</div></div>';
echo '   <div class="row small"><div class="col-xs-4 col-sm-4 col-p-4">&nbsp;</div> <div class="col-xs-8 col-sm-8 col-p-8 ">'.$customeraddressline2.',&nbsp;'.$district.',&nbsp;'.$state.'</div></div>';
echo '   <div class="row small"><div class="col-xs-4 col-sm-4 col-p-4">PIN&nbsp;:</div> <div class="col-xs-8 col-sm-8 col-p-8 ">'.$pin.'</div></div>';
echo '   <div class="row small"><div class="col-xs-4 col-sm-4 col-p-4">Contact&nbsp;:</div> <div class="col-xs-8 col-sm-8 col-p-8 ">'.$customercontact.'</div></div>';

echo '</div>';
echo	'	<div class="col-xs-5 col-sm-5 col-p-5 ">';
echo   '<div class="row" ><div class="col-xs-5 col-sm-5 col-p-5">Invoice No.&nbsp;:</div><div class="col-xs-7 col-sm-7 col-p-7 ">'. $invoiceno.'</div></div>';
echo   '<div class="row small" ><div class="col-xs-5 col-sm-5 col-p-5">Date&nbsp;:</div><div class="col-xs-7 col-sm-7 col-p-7">'. $date.'</div></div>';
echo '<div class="row small"> <div class="col-xs-12 col-sm-12 col-p-12">Under Hypothecation</div></div>';
echo '<div class="row small"> <div class="col-xs-12 col-sm-12 col-p-12 ">'.$hypothecation.'</div></div>';

echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">&nbsp;</div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">&nbsp;</div></div>';
echo '</div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
echo '    <div class="row small"><div class="col-xs-1 col-sm-1 col-p-1">Color&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3 ">'.$colorname.'</div>
			<div class="col-xs-1 col-sm-1 col-p-1">HSN&nbsp;:</div> <div class="col-xs-2 col-sm-2 col-p-2 ">'.$hsn.'</div>
			<div class="col-xs-3 col-sm-3 col-p-3">Service Book No.&nbsp;:</div> <div class="col-xs-2 col-sm-2 col-p-2 ">'.$servicebookno.'</div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
echo '    <div class="row small"><div class="col-xs-3 col-sm-3 col-p-3">Key No.&nbsp;:</div> <div class="col-xs-2 col-sm-2 col-p-2 ">'.$keyno.'</div>
<div class="col-xs-1 col-sm-1 col-p-1">&nbsp;</div>
			<div class="col-xs-3 col-sm-3 col-p-3">Controller&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3 ">'.$ecu.'</div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';			





echo '<div class="row"><div class="col-xs-8 col-sm-8 col-p-8 text-center">Particulars</div><div class="col-xs-4 col-sm-4 col-p-4 text-center">Amount</div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
echo '<div class="row"><div class="col-xs-8 col-sm-8 col-p-8">&nbsp;</div><div class="col-xs-4 col-sm-4 col-p-4 "><div class="col-xs-6 col-sm-6 col-p-6 ">Rs.</div><div class="col-xs-6 col-sm-6 col-p-6 ">Ps.</div></div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
echo '<div class="row small"><div class="col-xs-8 col-sm-8 col-p-8">One '.$brand.' Erickshaw&nbsp;'.$modalname.'</div><div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6 "></div><div class="col-xs-6 col-sm-6 col-p-6 "></div></div></div>';
echo '<div class="row"><div class="col-xs-8 col-sm-8 col-p-8"></div><div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6 "></div><div class="col-xs-6 col-sm-6 col-p-6 "></div></div></div>';
echo '<div class="row small"><div class="col-xs-8 col-sm-8 col-p-8">Basic Price&nbsp;&colon;&nbsp;<i class="fa fa-rupee"></i>&nbsp;'.$basic.'</div><div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6 text-center">'.$basicrs.'</div><div class="col-xs-6 col-sm-6 col-p-6 text-center">'.$basicpaise.'</div></div></div>';
echo '<div class="row small"><div class="col-xs-8 col-sm-8 col-p-8">Discount&nbsp;&colon;&nbsp;<i class="fa fa-rupee"></i>&nbsp;'.$discount.'</div><div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6 text-center">'.$discountrs.'</div><div class="col-xs-6 col-sm-6 col-p-6 text-center">'.$discountpaise.'</div></div></div>';
echo '<div class="row small"><div class="col-xs-8 col-sm-8 col-p-8">CGST&nbsp;@'.$cgstPercent.'%&nbsp;&colon;&nbsp;<i class="fa fa-rupee"></i>&nbsp;'.$cgst.'</div><div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6 text-center">'.$cgstrs.'</div><div class="col-xs-6 col-sm-6 col-p-6 text-center">'.$cgstpaise.'</div></div></div>';
echo '<div class="row small"><div class="col-xs-8 col-sm-8 col-p-8">SGST&nbsp;@'.$sgstPercent.'%&nbsp;&colon;&nbsp;<i class="fa fa-rupee"></i>&nbsp;'.$sgst.'</div><div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6 text-center">'.$sgstrs.'</div><div class="col-xs-6 col-sm-6 col-p-6 text-center">'.$sgstpaise.'</div></div></div>';


echo '<div class="row small"><div class="col-xs-8 col-sm-8 col-p-8">Insurace Charge&nbsp;&colon;&nbsp;<i class="fa fa-rupee"></i>&nbsp;'.$insurance.' </div><div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6  text-center">'.$insurancers.'</div><div class="col-xs-6 col-sm-6 col-p-6 text-center">'.$insurancepaise.'</div></div></div>';


echo '<div class="row small"><div class="col-xs-8 col-sm-8 col-p-8">Registration & Road Tax&nbsp;&colon;&nbsp;<i class="fa fa-rupee"></i>&nbsp;'.$roadtax.' </div><div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6  text-center">'.$roadtaxrs.'</div><div class="col-xs-6 col-sm-6 col-p-6 text-center">'.$roadtaxpaise.'</div></div></div>';


echo '<div class="row small"><div class="col-xs-8 col-sm-8 col-p-8">Miscellenous Charges&nbsp;&colon;&nbsp;<i class="fa fa-rupee"></i>&nbsp;'.$misc.' </div><div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6 text-center">'.$miscrs.'</div><div class="col-xs-6 col-sm-6 col-p-6 text-center">'.$miscpaise.'</div></div></div>';


echo '<div class="row small"><div class="col-xs-8 col-sm-8 col-p-8">Accessories&nbsp;&colon;&nbsp;<i class="fa fa-rupee"></i>&nbsp;'.$access.' </div><div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6 text-center">'.$accessrs.'</div><div class="col-xs-6 col-sm-6 col-p-6 text-center">'.$accesspaise.'</div></div></div>';


echo '<div class="row small"><div class="col-xs-8 col-sm-8 col-p-8"></div><div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6 "></div><div class="col-xs-6 col-sm-6 col-p-6 "></div></div></div>';


echo '<div class="row small"><div class="col-xs-8 col-sm-8 col-p-8">Chasis No.&nbsp;&colon;&nbsp;'.$chasisno.'</div><div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6 "></div><div class="col-xs-6 col-sm-6 col-p-6 "></div></div></div>';



echo '<div class="row small"><div class="col-xs-8 col-sm-8 col-p-8">Motor No.&nbsp;&colon;&nbsp;'.$engineno.'</div><div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6 "></div><div class="col-xs-6 col-sm-6 col-p-6 "></div></div></div>';


echo '<div class="row small"><div class="col-xs-8 col-sm-8 col-p-8">Tyre No.&nbsp;&colon;&nbsp;'.$tyrefrontleft.'</div><div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6 "></div><div class="col-xs-6 col-sm-6 col-p-6 "></div></div></div>';


echo '    <div class="row small">
			<div class="col-xs-8 col-sm-8 col-p-8">Battery No.&nbsp;&colon;&nbsp;'.$batteryno.'</div> <div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6 "></div><div class="col-xs-6 col-sm-6 col-p-6 "></div></div></div>';

echo '<div class="row small"><div class="col-xs-8 col-sm-8 col-p-8"><div class="col-xs-6 col-sm-6 col-p-6 ">Battery No.&nbsp;&colon;&nbsp;'.$gearboxno.'</div><div class="col-xs-6 col-sm-6 col-p-6 ">Battery No.&nbsp;&colon;&nbsp;'.$tyrerearleft.'</div></div><div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6 "></div><div class="col-xs-6 col-sm-6 col-p-6 "></div></div></div>';

echo '<div class="row small"><div class="col-xs-8 col-sm-8 col-p-8"><div class="col-xs-6 col-sm-6 col-p-6 ">Battery No.&nbsp;&colon;&nbsp;'.$tyrerearright.'</div><div class="col-xs-6 col-sm-6 col-p-6 ">Battery No.&nbsp;&colon;&nbsp;'.$sparetyreno.'</div></div><div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6 "></div><div class="col-xs-6 col-sm-6 col-p-6 "></div></div></div>';

/*





echo '		<div class="col-xs-3 col-sm-3 col-p-3">Challan No.&nbsp;:</div>' ;
echo '		<div class="col-xs-3 col-sm-3 col-p-3">'.$challanno.'</div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">----------------------------------------------------------------------------------------------------------</div></div>';   

  

echo '   <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Hypothecation&nbsp;:</div> <div class="col-xs-9 col-sm-9 col-p-9">'.$hypothecation.'</div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">----------------------------------------------------------------------------------------------------------</div></div>';
echo  ' <div class="row " ><div class="col-xs-12 col-sm-12 col-p-12">Received the following in perfect condition after proper checking&nbsp;:</div></div>';
echo  ' <div class="row " ><div class="col-xs-12 col-sm-12 col-p-12">One Autorickshaw</div></div>';
echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Model&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$modalname.'</div>
			<div class="col-xs-3 col-sm-3 col-p-3">Color&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$colorname.'</div></div>';
//echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Color</div> <div class="col-xs-9 col-sm-9 col-p-9">'.$colorname.'</div></div>';
echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Chasis No.&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3 small">'.$chasisno.'</div>
			<div class="col-xs-3 col-sm-3 col-p-3">Engine No.&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3 small">'.$engineno.'</div></div>';
//echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Engine No.</div> <div class="col-xs-9 col-sm-9 col-p-9">'.$engineno.'</div></div>';
echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Key No.&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$keyno.'</div>
			<div class="col-xs-3 col-sm-3 col-p-3">Gear Box No.&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$gearboxno.'</div></div>';
//echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Gear Box No.</div> <div class="col-xs-9 col-sm-9 col-p-9">'.$gearboxno.'</div></div>';
echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-">Book No.&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$bookno.'</div>
			<div class="col-xs-3 col-sm-3 col-p-3">Battery No.&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$batteryno.'</div></div>';
echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Tyre(FL)&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$tyrefrontleft.'</div>
			<div class="col-xs-3 col-sm-3 col-p-3">Tyre(FR)&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$tyrefrontright.'</div></div>';
echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Tyre(RL)&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$tyrerearleft.'</div>
			<div class="col-xs-3 col-sm-3 col-p-3">Tyre(RR)&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$tyrerearright.'</div></div>';
echo '    <div class="row">
			<div class="col-xs-3 col-sm-3 col-p-3">Mirror&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$mirror.'</div>
			<div class="col-xs-3 col-sm-3 col-p-3">Tools&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$tools.'</div></div>';			

//echo '<hr/>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">----------------------------------------------------------------------------------------------------------</div></div>';
echo '   <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Purpose&nbsp;:</div> <div class="col-xs-9 col-sm-9 col-p-9">'.$purposeoftransfer.'</div></div>';
//echo '<hr/>';
*/
echo '<div class="row small"><div class="col-xs-8 col-sm-8 col-p-8">Amount(in words)&nbsp;&colon;&nbsp;<i class="fa fa-rupee"></i>&nbsp;'.$amountinwords1.'</div><div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6 ">Round Off</div><div class="col-xs-6 col-sm-6 col-p-6 ">'.$roundoff.'</div></div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
echo '<div class="row"><div class="col-xs-8 col-sm-8 col-p-8 text-right">Total</div><div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6 text-center">'.$pricers.'</div><div class="col-xs-6 col-sm-6 col-p-6 text-center">'.$pricepaise.'</div></div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
echo '   <div class="row"><div class="col-xs-3 col-sm-3 col-p-3 small">E&OE   </div><div class="col-xs-5 col-sm-5 col-p-5 small">(Subject to '.$companydistrict.' Juridiction)  </div><div class="col-xs-4 col-sm-4 col-p-4">For '.$companyname.'</div></div>';
echo '<div class="row"><div class="col-xs-8 col-sm-9 col-p-9">&nbsp;</div><div class="col-xs-4 col-sm-3 col-p-3 ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="img-responsive " src="'.$salesofficersignature.'" alt="Signature"></img></div></div>';
echo' <div class="row"><div class="col-xs-4 col-sm-4 col-p-4">Customer&apos;s Signature</div><div class="col-xs-4 col-sm-4 col-p-4">&nbsp;</div> <div class="col-xs-4 col-sm-4 col-p-4">'."Authorised Signatory".'</div></div></div>';
    $id="'"."taxInvoiceContent"."'" ; 
  echo '<div class="col-xs-2 col-sm-2 pull-right ">';
                 
echo '<button  class="btn btn-default noprint" name="printtaxInvoiceBtn" value="printtaxInvoice" onclick="printdiv('.$id.');" >Print</button> </div>';
}

?>
