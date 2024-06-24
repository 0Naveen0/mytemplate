<?php
//Form 21 View
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
$brand="Mayuri|Sunehri";

$maker="Saera Electric Auto Pvt Ltd";
$logourl=base_url().'assets/images/company_logo.jpg';

$properitorignature=base_url().'assets/images/propsig.png';

?>




<?php
if($viewForm21==='True'){
    
    $date1="01-07-2022";
//$currentDate=Date('Y-m-d');
if( $date >= $date1 ){
//$salesofficersignature=base_url().'assets/images/salesofficer21.png';
$contact='7903989741';
}else{
//$salesofficersignature=base_url().'assets/images/salesofficer1.png';
$contact='7903989741';	
}

echo '<div id="form21Content" name="form21Content" class="row printit" style="display:block;">';
   
echo '<div class="row " >';
echo '<div class="col-xs-3 col-sm-3 col-p-3">';
echo '<img class="img-responsive" src="'.$logourl.'" alt="Company Logo"></img>';
echo '</div>';
echo '<div class="col-xs-9 col-sm-9 col-p-9 ">';
echo   '<div class="row" ><div class="col-xs-6 col-sm-6 col-p-6">&nbsp;</div><div class="col-xs-6 col-sm-6 col-p-6 small">Contact:+91-'.$contact.'</div></div>';
echo  ' <div class="row " ><div class="col-xs-12 col-sm-12 col-p-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$companyname.'</div></div>';
if($companyid==='1001'){
echo   '<div class="row " ><div class="col-xs-12 col-sm-12 col-p-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
'.$companyaddress.'</div></div>';
}else if($companyid==='1002'){
echo   '<div class="row " ><div class="col-xs-12 col-sm-12 col-p-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
'.$companyaddress.'</div></div>';
}else{
  echo   '<div class="row " ><div class="col-xs-12 col-sm-12 col-p-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
'.$companyaddress.'</div></div>';
}

echo   '<div class="row " ><div class="col-xs-12 col-sm-12 col-p-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Form 21</div></div>';
echo   '<div class="row small" ><div class="col-xs-12 col-sm-12 col-p-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#91;See Rule 47 &#40;a&#41; and &#40;b&#41; &#93;</div></div>';



echo '</div>';

echo '</div>';
echo   '<div class="row " ><div class="col-xs-12 col-sm-12 col-p-12 text-center">&nbsp;&nbsp;&nbsp;Sale Certificate</div></div>';

echo '------------------------------------------------------------------------------------------';
echo   '<div class="row small" >';
echo '		<div class="col-xs-3 col-sm-3 col-p-3">Ref. No.&nbsp;:</div>' ;
echo '		<div class="col-xs-3 col-sm-3 col-p-3">'.$refno.'</div>';
echo	'<div class="col-xs-3 col-sm-3 col-p-3">Date&nbsp;:</div>';
echo	'	<div class="col-xs-3 col-sm-3 col-p-3 right">'. $date.'</div></div>';
//echo '<hr/>';	

echo '------------------------------------------------------------------------------------------'; 
echo ' <div class="row small"><div class="col-xs-12 col-sm-12 col-p-12">Certified that '.$modalname.'</div></div>';
echo ' <div class="row small"><div class="col-xs-12 col-sm-12 col-p-12">has been delivered by us to&nbsp;'.$customername.'</div></div>'; 
echo ' <div class="row small"><div class="col-xs-12 col-sm-12 col-p-12">On&nbsp;'.$date.'</div></div>';
 
echo ' <div class="row small"><div class="col-xs-3 col-sm-3 col-p-3 ">Name of the buyer&nbsp;:</div> <div class="col-xs-9 col-sm-9 col-p-9 ">'.$customername.'</div></div>';
  
echo  ' <div class="row small"> <div class="col-xs-3 col-sm-3 col-p-3">Address(Permanent)&nbsp;:</div> <div class="col-xs-9 col-sm-9 col-p-9">S/O|W/O|D/O&nbsp;-'.$father.'</div></div>';
echo '   <div class="row small"><div class="col-xs-3 col-sm-3 col-p-3">&nbsp;</div> <div class="col-xs-9 col-sm-9 col-p-9">'.$customeraddressline1.','.$customeraddressline2.'</div></div>';
echo '   <div class="row small"><div class="col-xs-3 col-sm-3 col-p-3">&nbsp;</div> <div class="col-xs-9 col-sm-9 col-p-9">Dist.&nbsp;-'.$district.'</div></div>';
echo '   <div class="row small"><div class="col-xs-3 col-sm-3 col-p-3">&nbsp;</div> <div class="col-xs-9 col-sm-9 col-p-9">PIN&nbsp;'.$pin.'</div></div>';
echo '   <div class="row small"><div class="col-xs-3 col-sm-3 col-p-3">Contact&nbsp;:</div> <div class="col-xs-9 col-sm-9 col-p-9 ">'.$customercontact.'</div></div>';
echo '------------------------------------------------------------------------------------------';
echo ' <div class="row small"><div class="col-xs-12 col-sm-12 col-p-12">This vehicle is held under agreement of Hire Purchase/Lease/Hypothecation </div></div>';
echo ' <div class="row small"><div class="col-xs-12 col-sm-12 col-p-12">With&nbsp;'.$hypothecation.'</div></div>';
echo ' <div class="row small"><div class="col-xs-12 col-sm-12 col-p-12">The details of vehicle are given below:</div></div>';

echo '    <div class="row small">
			<div class="col-xs-1 col-sm-1 col-p-1">1.</div> <div class="col-xs-5 col-sm-5 col-p-5">Class of Vehicle</div>
			<div class="col-xs-1 col-sm-1 col-p-1">&colon;</div> <div class="col-xs-5 col-sm-5 col-p-5">'.$class.'</div></div>';
echo '    <div class="row small">
			<div class="col-xs-1 col-sm-1 col-p-1">2.</div> <div class="col-xs-5 col-sm-5 col-p-5">Maker&apos;s Name</div>
			<div class="col-xs-1 col-sm-1 col-p-1">&colon;</div> <div class="col-xs-5 col-sm-5 col-p-5">'.$maker.'</div></div>';
echo '    <div class="row small">
			<div class="col-xs-1 col-sm-1 col-p-1">3.</div> <div class="col-xs-5 col-sm-5 col-p-5">Chasis No.</div>
			<div class="col-xs-1 col-sm-1 col-p-1">&colon;</div> <div class="col-xs-5 col-sm-5 col-p-5">'.$chasisno.'</div></div>';
echo '    <div class="row small">
			<div class="col-xs-1 col-sm-1 col-p-1">4.</div> <div class="col-xs-5 col-sm-5 col-p-5">Motor No.</div>
			<div class="col-xs-1 col-sm-1 col-p-1">&colon;</div> <div class="col-xs-5 col-sm-5 col-p-5">'.$engineno.'</div></div>';
echo '    <div class="row small">
			<div class="col-xs-1 col-sm-1 col-p-1">5.</div> <div class="col-xs-5 col-sm-5 col-p-5">Horse Power/Cubic Capacity</div>
			<div class="col-xs-1 col-sm-1 col-p-1">&colon;</div> <div class="col-xs-5 col-sm-5 col-p-5">'.$hp.'&nbsp;CC</div></div>';
echo '    <div class="row small">
			<div class="col-xs-1 col-sm-1 col-p-1">6.</div> <div class="col-xs-5 col-sm-5 col-p-5">Fuel Type</div>
			<div class="col-xs-1 col-sm-1 col-p-1">&colon;</div> <div class="col-xs-5 col-sm-5 col-p-5">'.$fuel.'</div></div>';
echo '    <div class="row small">
			<div class="col-xs-1 col-sm-1 col-p-1">7.</div> <div class="col-xs-5 col-sm-5 col-p-5">No. of Cylinders</div>
			<div class="col-xs-1 col-sm-1 col-p-1">&colon;</div> <div class="col-xs-5 col-sm-5 col-p-5">'.$cylinder.'</div></div>';
echo '    <div class="row small">
			<div class="col-xs-1 col-sm-1 col-p-1">8.</div> <div class="col-xs-5 col-sm-5 col-p-5">Month & Year of Manufacture</div>
			<div class="col-xs-1 col-sm-1 col-p-1">&colon;</div> <div class="col-xs-5 col-sm-5 col-p-5">'.$month.','.$year.'</div></div>';
echo '    <div class="row small">
			<div class="col-xs-1 col-sm-1 col-p-1">9.</div> <div class="col-xs-5 col-sm-5 col-p-5">Seating Capacity(Including Driver)</div>
			<div class="col-xs-1 col-sm-1 col-p-1">&colon;</div> <div class="col-xs-5 col-sm-5 col-p-5">'.$seat.'</div></div>';
echo '    <div class="row small">
			<div class="col-xs-1 col-sm-1 col-p-1">10.</div> <div class="col-xs-5 col-sm-5 col-p-5">Unladen Weight</div>
			<div class="col-xs-1 col-sm-1 col-p-1">&colon;</div> <div class="col-xs-5 col-sm-5 col-p-5">'.$unladen.'&nbsp;KG</div></div>';
echo '    <div class="row small">
			<div class="col-xs-1 col-sm-1 col-p-1">11.</div> <div class="col-xs-5 col-sm-5 col-p-5">Maximum axle weight and number     
      and description of Tyres
      (in case of Transport vehicle)</div>
			<div class="col-xs-1 col-sm-1 col-p-1">&colon;</div> <div class="col-xs-5 col-sm-5 col-p-5">&nbsp;</div></div>';
			echo '    <div class="row small">
			<div class="col-xs-1 col-sm-1 col-p-1">&nbsp;&nbsp;&nbsp;</div> <div class="col-xs-5 col-sm-5 col-p-5">
		<div class="row small">	<div class="col-xs-2 col-sm-2 col-p-2">(a)</div><div class="col-xs-10 col-sm-10 col-p-10">Front axle</div></div></div>
			<div class="col-xs-1 col-sm-1 col-p-1">&colon;</div> <div class="col-xs-5 col-sm-5 col-p-5">'.$frontaxle.'</div></div>';
			echo '    <div class="row small">
			<div class="col-xs-1 col-sm-1 col-p-1">&nbsp;&nbsp;&nbsp;</div> <div class="col-xs-5 col-sm-5 col-p-5">
			<div class="row small">	<div class="col-xs-2 col-sm-2 col-p-2">(b)</div><div class="col-xs-10 col-sm-10 col-p-10">Rear axle</div></div></div>
			<div class="col-xs-1 col-sm-1 col-p-1">&colon;</div> <div class="col-xs-5 col-sm-5 col-p-5">'.$rearaxle.'</div></div>';
			echo '    <div class="row small">
			<div class="col-xs-1 col-sm-1 col-p-1">&nbsp;&nbsp;&nbsp;</div> <div class="col-xs-5 col-sm-5 col-p-5">
			<div class="row small">	<div class="col-xs-2 col-sm-2 col-p-2">(c)</div><div class="col-xs-10 col-sm-10 col-p-10">Any other axle</div>
			</div></div>
			<div class="col-xs-1 col-sm-1 col-p-1">&colon;</div> <div class="col-xs-5 col-sm-5 col-p-5">'.$otheraxle.'</div></div>';
			echo '    <div class="row small">
			<div class="col-xs-1 col-sm-1 col-p-1">&nbsp;&nbsp;&nbsp;</div> <div class="col-xs-5 col-sm-5 col-p-5">
			<div class="row small">	<div class="col-xs-2 col-sm-2 col-p-2">(d)</div><div class="col-xs-10 col-sm-10 col-p-10">Tandem axle</div>
			</div></div>
			<div class="col-xs-1 col-sm-1 col-p-1">&colon;</div> <div class="col-xs-5 col-sm-5 col-p-5">'.$tandemaxle.'</div></div>';
		
		
echo '    <div class="row small">
			<div class="col-xs-1 col-sm-1 col-p-1">12.</div> <div class="col-xs-5 col-sm-5 col-p-5">Colour/Colours of the body</div>
			<div class="col-xs-1 col-sm-1 col-p-1">&colon;</div> <div class="col-xs-5 col-sm-5 col-p-5">'.$color.'</div></div>';
echo '    <div class="row small">
			<div class="col-xs-1 col-sm-1 col-p-1">13.</div> <div class="col-xs-5 col-sm-5 col-p-5">Gross vehicle weight</div>
			<div class="col-xs-1 col-sm-1 col-p-1">&colon;</div> <div class="col-xs-5 col-sm-5 col-p-5">'.$gross.'&nbsp;KG</div></div>';
echo '    <div class="row small">
			<div class="col-xs-1 col-sm-1 col-p-1">14.</div> <div class="col-xs-5 col-sm-5 col-p-5">Type of body</div>
			<div class="col-xs-1 col-sm-1 col-p-1">&colon;</div> <div class="col-xs-5 col-sm-5 col-p-5">'.$bodytype.'</div></div>';			



			


echo '------------------------------------------------------------------------------------------';


echo '   <div class="row small"><div class="col-xs-7 col-sm-7 col-p-7 small">E&OE</div><div class="col-xs-5 col-sm-5 col-p-5">For '.$companyname.'</div></div>';
echo '<div class="row"><div class="col-xs-7 col-sm-7 col-p-7">&nbsp;</div><div class="col-xs-5 col-sm-5 col-p-5 ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="img-responsive " src="'.$properitorignature.'" alt="Signature"></img></div></div>';
echo' <div class="row small"><div class="col-xs-4 col-sm-4 col-p-4">&nbsp;</div><div class="col-xs-3 col-sm-3 col-p-3">&nbsp;</div> <div class="col-xs-5 col-sm-5 col-p-5">'."Authorised Signatory".'</div></div></div>';
    $id="'"."form21Content"."'" ; 
  echo '<div class="col-xs-2 col-sm-2 pull-right ">';
                 
echo '<button  class="btn btn-default noprint" name="printform21Btn" value="printform21" onclick="printdiv('.$id.');" >Print</button> </div>';
}

?>