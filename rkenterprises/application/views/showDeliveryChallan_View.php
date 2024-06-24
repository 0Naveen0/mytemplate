

<?php
//Delivery Challan View
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

$contact2=$companydetails[0]['companycontact'];
$contact1="8540828517";
//
/*
$challanno=1;
$date="18-01-2019";
$customername="Naveen Kamal";
$customeraddressline1="Near C M Sc. College";
$customeraddressline2="Lalbagh Darbhanga";
$customercontact="9934680440";
//$viewChallan="True";
$modalname="APE AR 3+1";
$colorname="Black Yellow";
//$chasisno="MBX00003ABZ12345";
$engineno="RS000AB123";
$keyno="1234";
$gearboxno="G12345678";
$tyrefrontleft="Z1234";
$tyrefrontright="Z1234";
$tyrerearleft="Z1234";
$tyrerearright="Z1234";
$purposeoftransfer="For Demonstration";
$hypothecation="M&M.F.S.L.";
$productionyear="2019";
$bookno="123456";
$mirror="Issued";
$tools="Issued";
//*/
$logourl=base_url().'assets/images/company_logo.jpg';
//echo $logourl;




//$salesofficersignature=base_url().'assets/images/salesofficer1.png';
//echo $salesofficersignature;
?>
<div class="d-print-none">
    <form role="form" class="form-horizontal small" method='post' id="deliveryChallanfrm">
        <fieldset>  
            
           
            <legend class='text-center '>Delivery Challan</legend>
            
          

 <div class="form-group"> 

                 <label for="chasisno" class="col-sm-2 control-label">Chasis No</label>
                <div class="col-sm-4">  
                
                <select name='chasisno' class="form-control">
                    <option value="NA">Select</option>
                    <?php
                    foreach($chasislist as $chasis){
                        
                        echo '<option value="'.$chasis['vehicleid'].'">'.$chasis['chasisno'].'</option>';
                    }
                    
                    
                    
                    ?>
                    
                    
                </select>
                
                
               <!--   <input type="text" maxlength="18" minlength="18" class="form-control" id="chasisno" name='chasisno' required="required">-->
                </div>
                <div class="col-sm-2">
                    
                    <button type='submit' class="btn btn-default " name="showDeliveryChallanBtn" value='showDeliveryChallan'>View</button>&nbsp;
                    
                </div>

            </div>
     
            
        </fieldset>
    </form>
</div>



<?php
if($viewChallan==='True'){
    if(!isset($father)){
        $father="NA";
    }
    
    $date1="01-07-2022";
//$currentDate=Date('Y-m-d');
if( $date >= $date1 ){
$salesofficersignature=base_url().'assets/images/salesofficer21.png';
//$contact='9546819714';
}else{
$salesofficersignature=base_url().'assets/images/salesofficer1.png';
//$contact='7766909443';	
}

echo '<div id="deliveryChallanContent" name="deliveryChallanContent" class="row printit small" style="display:block;">';
   

echo '<div class="row " >';
echo '<div class="col-xs-3 col-sm-3 col-p-3">';
echo '<img class="img-responsive" src="'.$logourl.'" alt="Comapny Logo"></img>';
echo '</div>';
echo '<div class="col-xs-9 col-sm-9 col-p-9 ">';
echo  ' <div class="row " >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$companyname.'</div>';
if($companyid==='1001'){
echo   '<div class="row small" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$companyaddress.'</div>';
}else if($companyid==='1002'){
echo   '<div class="row small" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$companyaddress.')</div>';
}else{
  echo   '<div class="row small" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$companyaddress.'</div>';  
}
echo   '<div class="row " >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delivery Challan</div>';
echo   '<div class="row" ><div class="col-xs-6 col-sm-6 col-p-6">&nbsp;</div><div class="col-xs-6 col-sm-6 col-p-6 small">Contact:'.$contact1.','.$contact2.'</div></div>';
echo '</div>';
echo '</div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">----------------------------------------------------------------------------------------</div></div>';

echo   '<div class="row" >';
echo	'<div class="col-xs-3 col-sm-3 col-p-3">Date&nbsp;:</div>';
echo	'	<div class="col-xs-3 col-sm-3 col-p-3 right">'. $date.'</div>';

echo '		<div class="col-xs-3 col-sm-3 col-p-3">Challan No.&nbsp;:</div>' ;
echo '		<div class="col-xs-3 col-sm-3 col-p-3">'.$challanno.'</div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">----------------------------------------------------------------------------------------</div></div>';   
echo ' <div class="row"><div class="col-xs-3 col-sm-3 col-p-3 ">Name&nbsp;:</div> <div class="col-xs-9 col-sm-9 col-p-9 ">'.$customername.'</div></div>';
echo ' <div class="row"><div class="col-xs-3 col-sm-3 col-p-3 ">S/O|W/O|D/O&nbsp;:</div> <div class="col-xs-9 col-sm-9 col-p-9 ">'.$father.'</div></div>';
  
echo  ' <div class="row"> <div class="col-xs-3 col-sm-3 col-p-3">Address&nbsp;:</div> <div class="col-xs-9 col-sm-9 col-p-9">'.$customeraddressline1.'</div></div>';
echo '   <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">&nbsp;</div> <div class="col-xs-9 col-sm-9 col-p-9">'.$customeraddressline2.', '.$district.', Bihar</div></div>';
echo '   <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Contact&nbsp;:</div> <div class="col-xs-9 col-sm-9 col-p-9 ">'.$customercontact.'</div></div>';
echo '   <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Hypothecation&nbsp;:</div> <div class="col-xs-9 col-sm-9 col-p-9">'.$hypothecation.'</div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">----------------------------------------------------------------------------------------</div></div>';
echo  ' <div class="row " ><div class="col-xs-12 col-sm-12 col-p-12">Received the following in perfect condition after proper checking&nbsp;:</div></div>';
echo  ' <div class="row " ><div class="col-xs-12 col-sm-12 col-p-12">One Erickshaw</div></div>';
echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Model&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$modalname.'</div>
			<div class="col-xs-3 col-sm-3 col-p-3">Color&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$colorname.'</div></div>';
//echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Color</div> <div class="col-xs-9 col-sm-9 col-p-9">'.$colorname.'</div></div>';
echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Chasis No.&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3 small">'.$chasisno.'</div>
			<div class="col-xs-3 col-sm-3 col-p-3">Battery No.&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3 small">'.$batteryno.'</div></div>';
//echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Engine No.</div> <div class="col-xs-9 col-sm-9 col-p-9">'.$engineno.'</div></div>';
echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Engine No.&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$engineno.'</div>
			<div class="col-xs-3 col-sm-3 col-p-3">Battery No&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$gearboxno.'</div></div>';
//echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Gear Box No.</div> <div class="col-xs-9 col-sm-9 col-p-9">'.$gearboxno.'</div></div>';
echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-">Controller No.&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$ecu.'</div>
			<div class="col-xs-3 col-sm-3 col-p-3">Battery No&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$tyrefrontright.'</div></div>';
echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Tyre&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$tyrefrontleft.'</div>
			<div class="col-xs-3 col-sm-3 col-p-3">Battery No&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$tyrerearleft.'</div></div>';
echo '    <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Key No.&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$keyno.'</div>
			<div class="col-xs-3 col-sm-3 col-p-3">Battery No&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$tyrerearright.'</div></div>';
echo '    <div class="row">
			<div class="col-xs-3 col-sm-3 col-p-3">Mirror&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$mirror.'</div>
			<div class="col-xs-3 col-sm-3 col-p-3">Tools&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-3">'.$tools.'</div></div>';			
$ecu=$ecu?$ecu:"NA";
echo '    <div class="row">
			<div class="col-xs-3 col-sm-3 col-p-3">Book&nbsp;:</div> <div class="col-xs-3 col-sm-3 col-p-6">'.$bookno.'</div>
			</div>';
//echo '<hr/>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">----------------------------------------------------------------------------------------</div></div>';
echo '   <div class="row"><div class="col-xs-3 col-sm-3 col-p-3">Purpose&nbsp;:</div> <div class="col-xs-9 col-sm-9 col-p-9">'.$purposeoftransfer.'</div></div>';
//echo '<hr/>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">----------------------------------------------------------------------------------------</div></div>';
echo '   <div class="row"><div class="col-xs-7 col-sm-7 col-p-7 small">नोट :-गाड़ी खरीदते समय आप संतुस्ट हो ले की आपके गाड़ी में कोई कमी ( टूट-फुट ,पार्ट्स की कमी ) न हो अन्यथा हमारी कोई जिम्मेवारी नहीं होगी। </div><div class="col-xs-5 col-sm-5 col-p-5">For '.$companyname.'</div></div>';
echo '<div class="row"><div class="col-xs-7 col-sm-7 col-p-7">&nbsp;</div><div class="col-xs-5 col-sm-5 col-p-5 ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="img-responsive " src="'.$salesofficersignature.'" alt="Signature"></img></div></div>';
echo' <div class="row"><div class="col-xs-4 col-sm-4 col-p-4">Customer&apos;s Signature</div><div class="col-xs-3 col-sm-3 col-p-3">&nbsp;</div> <div class="col-xs-5 col-sm-5 col-p-5">'."Authorised Signatory".'</div></div></div>';
    $id="'"."deliveryChallanContent"."'" ; 
  echo '<div class="col-xs-2 col-sm-2 pull-right ">';
                 
echo '<button  class="btn btn-default noprint " name="printdeliveryChallanBtn" value="printdeliveryChallan" onclick="printdiv('.$id.');" >Print</button> </div>';
}

?>
