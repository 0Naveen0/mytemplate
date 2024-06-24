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
// $data = ['title' => 'Show Quotation','modalList'=>$modal,'modal'=>$modalname,'companydetails'=>$companydetails,'customerdetails'=>$customerdetails,'date'=>$date,'quotationno'=>$quotationno,'enquiry'=>$enquiry,'enqdate'=>$enqdate,'gross'=>$gross,'roundoff'=>$roundoff,'amountinwords'=>$amountinwords,'gst'=>$gst,'quote'=>$quote,'logourl'=>$logourl,'salesofficersignature'=>$salesofficersignature,'insurance'=>$insurance,'permit'=>$permit,'access'=>$access,'roadtax'=>$roadtax,'discount'=>$discount,$quotationdetails];
///*

$gstno=$companydetails[0]['companygst'];
$contact1="8540828517";
$contact2="7011373225";
$customername=$customerdetails[0]['customername'];
$father=$customerdetails[0]['customerfathername'];
$customeraddressline1=$customerdetails[0]['customeraddressline1'];
$customeraddressline2=$customerdetails[0]['customeraddressline2'];
$customercontact=$customerdetails[0]['customercontact'];
$pin=$customerdetails[0]['customerpin'];
$viewQuotation="True";
//$hsn="87033199";
$modalname=$quotationdetails[0]['modalname'];
//$total=$quotationdetails[0]['vehicleprice'];

//$basic=round(($total/(1+($gst/100))),2);
//$cgst=round(($basic*14/100),2);
//$sgst=round(($basic*14/100),2);
//$total=$basic+$cgst+$sgst;
$i=1;
$qty=1;

//$gross=$total+$insurance+$roadtax+$permit+$access-$discount;
//$amountinwords=$message_helper->Show_Amount_In_Words($gross);
//$gross=$gross.".00";
//$roundoff="(-".$roundoff.")";
$bankdetails=$companydetails[0]['bankdetails'];



?>
<div class="d-print-none noprint">
<div class='row small'><div class='col-xs-12 col-sm-12 col-p-12 small'>View &gt;&gt; Quotation</div></div>
    <div class='row small'><div class='col-xs-12 col-sm-12 col-p-12 small'><hr></div></div>

    <form  role="form" class="form-horizontal small" method='post' id="quotationSearchfrm">
        <div class="form-group"> 

                 <label for="selectionCriteriaQuotation" class="col-sm-2 control-label">Select</label>
                <div class="col-sm-3">  
                
                <select name='selectionCriteriaQuotation' class="form-control">
                    
                    
                    <option value="quotationno" selected>Quotation No</option>
                    <option value="customerid">CustomerID</option>
                    <option value="quotationid" >QuotationID</option>
                    
                </select>
              
               
                </div>
                <div class="col-sm-5">
                    
                    <input type='text' class="form-control" name="searchQuotationCriteria" maxlength=6 minlength=1 required/>
                    
                </div>
                
                <div class="col-sm-2">
                    
                    <button  type="button" class="btn btn-default " name="searchQuotationBtn" value='searchQuotation'>Search</button>&nbsp;
                    
                </div>

            </div>   
    </form>
    <div class="row small">
     <div class="col-sm-5 "></div>   
    <div class="col-sm-6  text-danger " style="font-size:6px;"><span class="error"></span></div>
    <div class="col-sm-1 "></div>
    </div>
     <hr/>
</div>

<div id="quotationContent" class="noprint"></div>


    
    
    



<div id="showQuotationResultContent" name="showQuotationResultContent" class="row printit" style="display:block;">
<div class="printit">
<?php
//echo $message;
if($viewQuotation==='True'){

//echo '<div id="quotationContent" name="quotationContent" class="row printit" style="display:block;">';
 echo '<div class="row " ><div class="col-xs-12 col-sm-12 col-p-12 text-center">QUOTATION</div></div>';  
 echo '<div class="row " ><div class="col-xs-2 col-sm-2 col-p-2">GSTIN</div><div class="col-xs-3 col-sm-3 col-p-3">'.$gstno.'</div>
 <div class="col-xs-2 col-sm-2 col-p-2"></div><div class="col-xs-5 col-sm-5 col-p-5"><i class="fa fa-phone" aria-hidden="true"></i>'.$contact1.','.$contact2.'</div></div>'; 
echo '<div class="row " >';
echo '<div class="col-xs-3 col-sm-3 col-p-3">';
echo '<img class="img-responsive" src="'.$logourl.'" alt="Company Logo"></img>';
echo '</div>';
echo '<div class="col-xs-9 col-sm-9 col-p-9 ">';
echo  ' <div class="row " >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Apoorva Traders</div>';
echo   '<div class="row " >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mabbi Belauna,Darbhanga(Bihar)</div>';
echo '</div>';
echo '</div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
echo   '<div class="row" >';
echo	'<div class="col-xs-7 col-sm-7 col-p-7">';

echo ' <div class="row"><div class="col-xs- col-sm-4 col-p-4 ">Name&nbsp;:</div> <div class="col-xs-8 col-sm-8 col-p-8 ">'.$customername.'</div></div>';
echo '   <div class="row small"><div class="col-xs-4 col-sm-4 col-p-4">S/O|W/O|D/O&nbsp;:</div> <div class="col-xs-8 col-sm-8 col-p-8">'.$father.'</div></div>';
echo  ' <div class="row small"> <div class="col-xs-4 col-sm-4 col-p-4">Address&nbsp;:</div> <div class="col-xs-8 col-sm-8 col-p-8">'.$customeraddressline1.'</div></div>';
echo '   <div class="row small"><div class="col-xs-4 col-sm-4 col-p-4">&nbsp;</div> <div class="col-xs-8 col-sm-8 col-p-8">'.$customeraddressline2.'</div></div>';
echo '   <div class="row small"><div class="col-xs-4 col-sm-4 col-p-4">PIN&nbsp;:</div> <div class="col-xs-8 col-sm-8 col-p-8">'.$pin.'</div></div>';
echo '   <div class="row small"><div class="col-xs-4 col-sm-4 col-p-4">Contact&nbsp;:</div> <div class="col-xs-8 col-sm-8 col-p-8 ">'.$customercontact.'</div></div>';

echo '</div>';
echo	'	<div class="col-xs-5 col-sm-5 col-p-5 small">';
echo   '<div class="row " ><div class="col-xs-5 col-sm-5 col-p-5 ">No.&nbsp;:</div><div class="col-xs-7 col-sm-7 col-p-7 ">'. $quotationno.'</div></div>';
echo   '<div class="row" ><div class="col-xs-5 col-sm-5 col-p-5">Date&nbsp;:</div><div class="col-xs-7 col-sm-7 col-p-7 ">'. $date.'</div></div>';
//echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">Under Hypothecation</div></div>';
//echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12 small">'.$hypothecation.'</div></div>';

echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">&nbsp;</div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">&nbsp;</div></div>';
echo '</div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
echo '<div class="row small"> <div class="col-xs-12 col-sm-12 col-p-12">Dear Sir,With reference to your enquiry number&nbsp;'.$enquiry.'&nbsp;dated&nbsp;'.$enqdate.'&nbsp;, we have pleasure to quote below rates, which is subject to terms and conditions mentioned at bottom of page.</div></div>';
//echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';

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
      <td colspan="5">Registration</td>
      <td>&nbsp;&nbsp;'.$roadtax.'</td>
    </tr>
    <tr>
      <th scope="row">'.$i++.'</th>
      <td colspan="5">Permit</td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;'.$permit.'</td>
    </tr>
    <tr>
      <th scope="row">'.$i++.'</th>
      <td colspan="5">Accessories</td>
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

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//echo '<div class="row"><div class="col-xs-1 col-sm-1 col-p-1">#</div><div class="col-xs-2 col-sm-2 col-p-2">Part No.</div><div class="col-xs-1 col-sm-1 col-p-1">HSN</div><div class="col-xs-1 col-sm-1 col-p-1 small">Unit Price</div><div class="col-xs-1 col-sm-1 col-p-1">Qty.</div><div class="col-xs-1 col-sm-1 col-p-1">GST%</div><div class="col-xs-1 col-sm-1 col-p-1">Total</div></div>';
//echo '<div class="row"><div class="col-xs-12 col-sm-12 col-p-12">#&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Part No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;HSN&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;Unit Price&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Qty&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;GST%&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;Total&nbsp;&nbsp;&nbsp;&nbsp;|</div></div>';

//echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
//echo '<div class="row"><div class="col-xs-12 col-sm-12 col-p-12">'.$i++.'&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$modalname.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;'.$hsn.'&nbsp;&nbsp;|&nbsp;&nbsp;'.$basic.'&nbsp;&nbsp;|&nbsp;'.$qty.'&nbsp;|&nbsp;'.$gst.'&nbsp;|&nbsp;&nbsp;'.$total.'&nbsp;&nbsp;|</div></div>';
//echo '<div class="row"><div class="col-xs-1 col-sm-1 col-p-1">1|</div><div class="col-xs-2 col-sm-2 col-p-2">'.$modalname.'|</div><div class="col-xs-1 col-sm-1 col-p-1">'.$hsn.'|</div><div class="col-xs-1 col-sm-1 col-p-1 small">'.$basic.'|</div><div class="col-xs-1 col-sm-1 col-p-1">1|</div><div class="col-xs-1 col-sm-1 col-p-1">28</div><div class="col-xs-1 col-sm-1 col-p-1">'.$total.'</div></div>';
//echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
//echo '<div class="row"><div class="col-xs-12 col-sm-12 col-p-12">'.$i++.'&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Insurance&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;'.$insurance.'&nbsp;&nbsp;|</div></div>';
//echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
//echo '<div class="row"><div class="col-xs-12 col-sm-12 col-p-12">'.$i++.'&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Registration&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;'.$roadtax.'&nbsp;&nbsp;|</div></div>';
//echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
//echo '<div class="row"><div class="col-xs-12 col-sm-12 col-p-12">'.$i++.'&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Permit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;'.$permit.'&nbsp;&nbsp;|</div></div>';
//echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
//echo '<div class="row"><div class="col-xs-12 col-sm-12 col-p-12">'.$i++.'&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accessories&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;'.$access.'&nbsp;&nbsp;|</div></div>';
//echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
//echo '<div class="row"><div class="col-xs-12 col-sm-12 col-p-12">'.$i++.'&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Discount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;'.$discount.'&nbsp;&nbsp;|</div></div>';
//echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';

//echo '<div class="row small"><div class="col-xs-8 col-sm-8 col-p-8 small">Amount(in words)&nbsp;&colon;&nbsp;<i class="fa fa-rupee"></i>&nbsp;'.$amountinwords.'</div><div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6 "></div><div class="col-xs-6 col-sm-6 col-p-6 "></div></div></div>';
//echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
//echo '<div class="row"><div class="col-xs-12 col-sm-12 col-p-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;'.$gross.'&nbsp;&nbsp;|</div></div>';
//echo '<div class="row"><div class="col-xs-8 col-sm-8 col-p-8 text-right">Total</div><div class="col-xs-4 col-sm-4 col-p-4"><div class="col-xs-6 col-sm-6 col-p-6 text-center">'.$totalrs.'</div><div class="col-xs-6 col-sm-6 col-p-6 text-center">'.$totalpaise.'</div></div></div>';
//echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
echo '   <div class="row small"><div class="col-xs-12 col-sm-12 col-p-12 small">'.$bankdetails.'</div></div>';
echo '<div class="row"> <div class="col-xs-12 col-sm-12 col-p-12">------------------------------------------------------------------------------------------</div></div>';
echo '   <div class="row small"><div class="col-xs-3 col-sm-3 col-p-3 ">E&OE   </div><div class="col-xs-5 col-sm-5 col-p-5 ">(Subject to Madhubani Juridiction)  </div><div class="col-xs-4 col-sm-4 col-p-4">For Apoorva Traders</div></div>';
echo '<div class="row small"><div class="col-xs-7 col-sm-7 col-p-7 ">'.$quote.'</div><div class="col-xs-2 col-sm-2 col-p-2">&nbsp;</div><div class="col-xs-3 col-sm-3 col-p-3 ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="img-responsive " src="'.$salesofficersignature.'" alt="Signature"></img></div></div>';
echo' <div class="row small"><div class="col-xs-7 col-sm-7 col-p-7"></div><div class="col-xs-1 col-sm-1 col-p-1">&nbsp;</div> <div class="col-xs-4 col-sm-4 col-p-4">'."Authorised Signatory".'</div></div></div>';
    $id="'"."quotationContent"."'" ; 
  echo '<div class="col-xs-2 col-sm-2 pull-right ">';
                 
echo '<button  class="btn btn-default " name="printquotationBtn" value="printQuotation" onclick="printdiv('.$id.');" >Print</button> </div>';
}

?>
</div>