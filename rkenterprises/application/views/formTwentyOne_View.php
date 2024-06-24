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
//
/*
$refno="011912345";
$father="Pradeep Kamal";
$district="Darbhanga";
$pin="846004";
$class="Three Wheeler/BSIV";
$maker="PIAGGIO VEHICLE PVT LTD";
$hp="436 CC";
$fuel="DIESEL";
$cylinder="ONE";
$month="JAN";
$year="2019";
$seat="3+1";
$unladen="420 KG";
$color="Black-Yellow";
$gross="725 KG";
$date="18-01-2019";
$customername="Naveen Kamal";
$customeraddressline1="Near C M Sc. College";
$customeraddressline2="Lalbagh Darbhanga";
$customercontact="9934680440";
$viewForm21="True";
$modalname="APE AR 3+1";
$colorname="Black Yellow";
$chasisno="MBX00003ABZ12345";
$engineno="RS000AB123";
$hypothecation="M&M.Finance Service LTD";
$frontaxle="";
$rearaxle="";
$otheraxle="";
$tandemaxle="";
$bodytype="Passenger";

//*/
$logourl=base_url().'assets/images/piaggiologo.jpg';
//echo $logourl;
$properitorignature=base_url().'assets/images/propsig.png';
//echo $salesofficersignature;
?>
<div class="d-print-none">
    <form role="form" class="form-horizontal small" method='post' id="form21frm">
        <fieldset>  
            
           
            <legend class='text-center '>Form 21</legend>
            
          

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
                
                
             
                </div>
                <div class="col-sm-2">
                    
                    <button type='submit' class="btn btn-default " name="showForm21Btn" value='showForm21'>View</button>&nbsp;
                    
                </div>

            </div>
     
            
        </fieldset>
    </form>
</div>



<?php
if($viewForm21==='True'){

echo '<div id="form21Content" name="form21Content" class="row printit" style="display:block;">';
   
echo '<div class="row " >';
echo '<div class="col-xs-3 col-sm-3 col-p-3">';
echo '<img class="img-responsive" src="'.$logourl.'" alt="Piaggio Logo"></img>';
echo '</div>';
echo '<div class="col-xs-9 col-sm-9 col-p-9 ">';
echo   '<div class="row" ><div class="col-xs-6 col-sm-6 col-p-6">&nbsp;</div><div class="col-xs-6 col-sm-6 col-p-6 small">Contact:+91-7766909443</div></div>';
echo  ' <div class="row " ><div class="col-xs-12 col-sm-12 col-p-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Apoorva Traders</div></div>';
if($companyid==='1001'){
echo   '<div class="row " ><div class="col-xs-12 col-sm-12 col-p-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Mabbi Belauna,Darbhanga</div></div>';
}else if($companyid==='1002'){
echo   '<div class="row " ><div class="col-xs-12 col-sm-12 col-p-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Jhanjharpur,Madhubani</div></div>';
}else{
  echo   '<div class="row " ><div class="col-xs-12 col-sm-12 col-p-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Mabbi Belauna,Darbhanga</div></div>';
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
			<div class="col-xs-1 col-sm-1 col-p-1">4.</div> <div class="col-xs-5 col-sm-5 col-p-5">Engine No.</div>
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


echo '   <div class="row small"><div class="col-xs-7 col-sm-7 col-p-7 small">E&OE</div><div class="col-xs-5 col-sm-5 col-p-5">For Apoorva Traders</div></div>';
echo '<div class="row"><div class="col-xs-7 col-sm-7 col-p-7">&nbsp;</div><div class="col-xs-5 col-sm-5 col-p-5 ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="img-responsive " src="'.$properitorignature.'" alt="Signature"></img></div></div>';
echo' <div class="row small"><div class="col-xs-4 col-sm-4 col-p-4">&nbsp;</div><div class="col-xs-3 col-sm-3 col-p-3">&nbsp;</div> <div class="col-xs-5 col-sm-5 col-p-5">'."Authorised Signatory".'</div></div></div>';
    $id="'"."form21Content"."'" ; 
  echo '<div class="col-xs-2 col-sm-2 pull-right ">';
                 
echo '<button  class="btn btn-default " name="printform21Btn" value="printform21" onclick="printdiv('.$id.');" >Print</button> </div>';
}

?>