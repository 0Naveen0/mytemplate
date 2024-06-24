<?php
class Member extends MY_Controller {
    public function index() {
        $this->session->set_userdata("pageid", "memberHome");
      
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            $data = ['title' => 'Dashboard'];
            $message = '';
            $this->template->load('home_template', 'memberDashboard_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            
        } else {
           
           redirect('index.php/logout');
        }
    }
    
    
    //********************************************************************************************************
    //**************************************Quotation  print reports***********************************
    //********************************************************************************************************
     
    public function printQuotation(){
		$display= "";
		if($this->input->get()){ 
		    $quotationType=$this->input->get('quotationType');
            $quotationId=$this->input->get('quotationId');
			$display= $quotationType. "++++	". $quotationId;
			//$this->output->set_output($display);
            //return ;
			
			$isQuotationExist=$this->load->model('quotationModel')?$this->quotationModel->isQuotationExist($quotationId):FALSE;    
			
			if($isQuotationExist){
		$quote="All goods sold are subject to prices and conditions of sale ruling at the time of delivery, irrespective of when payment was made.";

$logourl=base_url().'assets/images/company_logo.jpg';
$salesofficersignature=base_url().'assets/images/salesofficer1.png';		
				$quotationdetails=$this->load->model('quotationModel')?json_decode($this->quotationModel->getQuotationDetails($quotationId,'quotationid'),true):FALSE;

$total=$quotationdetails[0]['vehicleprice'];
$permit=$quotationdetails[0]['permit'];
$discount=$quotationdetails[0]['discount'];
$access=$quotationdetails[0]['accessories'];
$insurance=$quotationdetails[0]['insurance'];
$roadtax=$quotationdetails[0]['registration'];
$date=$quotationdetails[0]['quotationdate'];
$date=date("d-m-Y",strtotime($date));
 
$enquiry=$quotationdetails[0]['enquiryid'];
//$quotationid=$quotationdetails[0]['quotationid'];
$quotationno="Q".$quotationdetails[0]['quotationno'];
$enqdate=$quotationdetails[0]['quotationdate'];
//$date=date_create($enqdate);
$enqdate=date("d-m-Y",strtotime($enqdate));
$modalid=$quotationdetails[0]['modalid'];
//var_dump($quotationdetails);

if($modalid){
$hsn=$this->load->model('modalModel')?$this->modalModel->getModalHsn($modalid):"";
$cgst=$this->load->model('modalModel')?$this->modalModel->getModalCgst($modalid):"0";
$sgst=$this->load->model('modalModel')?$this->modalModel->getModalSgst($modalid):"0";


}else{
  $hsn="";  $cgst=0;$sgst=0;
}
$gst=$cgst+$sgst;
$basic=round(($total/(1+($gst/100))),2);
$gross=$total+$insurance+$roadtax+$permit+$access-$discount;
if ($this->load->helper('message_helper')){
$amountinwords=Show_Amount_In_Words($gross);
    
}else{
  $amountinwords="";  
}
$gross=$gross.".00";
$roundoff=0;
$customerid=$quotationdetails[0]['customerid'];
$enquiry=$customerid;
$companyid="1001";

$companydetails=$this->load->model('companyModel')?$this->companyModel->getCompanyDetail($companyid):FALSE;

$customerdetails=array();
$customerdetails=$this->load->model('customerModel')?json_decode($this->customerModel->getCustomerDetails($customerid,'customerid'),true):FALSE;
 
 if($quotationType==='Ex-Showroom'){
	 
 $data = ['title' => 'Print Quotation','companydetails'=>$companydetails,
 'customerdetails'=>$customerdetails,'date'=>$date,'quotationno'=>$quotationno,'enquiry'=>$enquiry,
 'enqdate'=>$enqdate,'gross'=>$gross,'roundoff'=>$roundoff,'amountinwords'=>$amountinwords,'gst'=>$gst,
 'quote'=>$quote,'logourl'=>$logourl,'salesofficersignature'=>$salesofficersignature,'insurance'=>$insurance,
 'permit'=>$permit,'access'=>$access,'roadtax'=>$roadtax,'discount'=>$discount,
 'quotationdetails'=>$quotationdetails,'total'=>$total,'basic'=>$basic,'hsn'=>$hsn,'quotationType'=>'Type_B'];				
 }else{
	$data = ['title' => 'Print Quotation','companydetails'=>$companydetails,
 'customerdetails'=>$customerdetails,'date'=>$date,'quotationno'=>$quotationno,'enquiry'=>$enquiry,
 'enqdate'=>$enqdate,'gross'=>$gross,'roundoff'=>$roundoff,'amountinwords'=>$amountinwords,'gst'=>$gst,
 'quote'=>$quote,'logourl'=>$logourl,'salesofficersignature'=>$salesofficersignature,'insurance'=>$insurance,
 'permit'=>$permit,'access'=>$access,'roadtax'=>$roadtax,'discount'=>$discount,
 'quotationdetails'=>$quotationdetails,'total'=>$total,'basic'=>$basic,'hsn'=>$hsn,'quotationType'=>'Type_A']; 
	 
 }			
	$display= $this->load->view('quotationPrintContent_view',$data,TRUE) ;
                    $this->output->set_output($display);
					return ;			
				
			}else{
			$display="Incorrect Data or Selection" ;
                    $this->output->set_output($display);
					return;	
			}
			
			
			

            
         }else{
			 $display='FAILURE';
		$this->output->set_output($display);
		return ;
		 }
       
    }//End of Quotation  print reports
	
	
	
	
	
	    //********************************************************************************************************
    //**************************************Quotation Search to print reports***********************************
    //********************************************************************************************************
     
    public function isQuotationExist(){
		$display= "";
		
         if($this->input->post()){ 
		 
		
            $selectionCriteria=$this->input->post('selectionCriteriaQuotation');
            $selectionValue=$this->input->post('searchQuotationCriteria');
            
            if($selectionCriteria==='quotationno' && $selectionValue > 0 && $selectionValue < 10000){
               
				      
$quotationdetails=$this->load->model('quotationModel')?json_decode($this->quotationModel->getQuotationDetails($selectionValue,'quotationno'),true):FALSE;                              
				
				
               $data=['quotationdetail'=>$quotationdetails];
			   
			   $display="";
                    $display= $this->load->view('quotationContent_view',$data,TRUE) ;
                    $this->output->set_output($display);
					return ;
            }else if($selectionCriteria==='quotationid' && $selectionValue > 0 && $selectionValue < 10000){
               
                $quotationdetails=$this->load->model('quotationModel')?json_decode($this->quotationModel->getQuotationDetails($selectionValue,'quotationid'),true):FALSE;                              
              
               $data=['quotationdetail'=>$quotationdetails];
                    $display= $this->load->view('quotationContent_view',$data,TRUE) ;
                    $this->output->set_output($display);
					return ;
            }else if($selectionCriteria==='customerid'&& $selectionValue > 0 && $selectionValue < 10000){
               
              $quotationdetails=$this->load->model('quotationModel')?json_decode($this->quotationModel->getQuotationDetails($selectionValue,'customerid'),true):FALSE;                                  
             $data=['quotationdetail'=>$quotationdetails];
			 $display= $this->load->view('quotationContent_view',$data,TRUE) ;
                    $this->output->set_output($display);
            }else{
                $display="Incorrect Data or Selection" ;
                    $this->output->set_output($display);
					return;
            }
            
         }else{
			 $display='FAILURE';
		$this->output->set_output($display);
		return ;
		 }
       
    }//End of Quotation Search to print reports
	
	
	
	
	
    //********************************************************************************************************
    
    
     ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
    
  public function  quotationView(){
   $this->session->set_userdata("pageid", "quotation");   
  $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
$contact1="7766909443";
$contact2="9431428926";
$viewQuotation="True";
//$hsn="87033199";
$quote="All goods sold are subject to prices and conditions of sale ruling at the time of delivery, irrespective of when payment was made.";
//*/
$logourl=base_url().'assets/images/piaggiologo.jpg';
$date1="01-07-2022";



//$salesofficersignature=base_url().'assets/images/salesofficer1.png';
$i=1;
$qty=1;
$gst=28;
$companyid=1001;

if($this->input->post('showQuotationBtn')){
//$quotationid=3;	
$quotationid=$this->input->post('quotationid')?$this->input->post('quotationid'):3;

}else{
 $quotationid=$this->load->model('quotationModel')?$this->quotationModel->getLastQuotationId():6;
}
$quotationdetails=$this->load->model('quotationModel')?json_decode($this->quotationModel->getQuotationDetails($quotationid,'quotationid'),true):FALSE;
$total=$quotationdetails[0]['vehicleprice'];
$permit=$quotationdetails[0]['permit'];
$discount=$quotationdetails[0]['discount'];
$access=$quotationdetails[0]['accessories'];
$insurance=$quotationdetails[0]['insurance'];
$roadtax=$quotationdetails[0]['registration'];
$date=$quotationdetails[0]['quotationdate'];
$date=date("d-m-Y",strtotime($date));
if( $date >= $date1 ){
$salesofficersignature=base_url().'assets/images/salesofficer21.png';
$contact='9546819714';
}else{
$salesofficersignature=base_url().'assets/images/salesofficer1.png';
$contact='7766909443';	
}
 $quotationno=$quotationdetails[0]['quotationno'];
$enquiry=$quotationdetails[0]['enquiryid'];
$quotationid=$quotationdetails[0]['quotationid'];
$quotationno="Q".$quotationdetails[0]['quotationno'];
$enqdate=$quotationdetails[0]['quotationdate'];
//$date=date_create($enqdate);
$enqdate=date("d-m-Y",strtotime($enqdate));
$modalid=$quotationdetails[0]['modalid'];
//echo $modalid;
if($modalid){
$hsn=$this->load->model('modalModel')?$this->modalModel->getModalHsn($modalid):"";
}else{
  $hsn="";  
}
$basic=round(($total/(1+($gst/100))),2);
$gross=$total+$insurance+$roadtax+$permit+$access-$discount;
if ($this->load->helper('message_helper')){
$amountinwords=Show_Amount_In_Words($gross);
    
}else{
  $amountinwords="";  
}
$gross=$gross.".00";
$roundoff=0;
$customerid=$quotationdetails[0]['customerid'];
//echo $customerid;
//$customerid=1345;
$companydetails=$this->load->model('companyModel')?$this->companyModel->getCompanyDetail($companyid):FALSE;
$customerdetails=array();
$customerdetails=$this->load->model('customerModel')?json_decode($this->customerModel->getCustomerDetails($customerid,'customerid'),true):FALSE;

            $data = ['title' => 'Quotation'];
            $message = '';
            if($this->input->post('generateQuotationBtn')){
                 $data = ['title' => 'Quotation'];
                 //$this->template->load('home_template', 'quotationForm_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
              $this->template->load('home_template', 'quotationPrint_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);  
            }else{
            $modal= $this->load->model('modalModel')?$this->modalModel->getModalList():'Modal Loading Failed';
           
		 $data = ['title' => 'Show Quotation','modalList'=>$modal,'companydetails'=>$companydetails,'customerdetails'=>$customerdetails,'date'=>$date,'quotationno'=>$quotationno,'enquiry'=>$enquiry,'enqdate'=>$enqdate,'gross'=>$gross,'roundoff'=>$roundoff,'amountinwords'=>$amountinwords,'gst'=>$gst,'quote'=>$quote,'logourl'=>$logourl,'salesofficersignature'=>$salesofficersignature,'insurance'=>$insurance,'permit'=>$permit,'access'=>$access,'roadtax'=>$roadtax,'discount'=>$discount,'quotationdetails'=>$quotationdetails,'total'=>$total,'basic'=>$basic,'hsn'=>$hsn];
		 $this->template->load('home_template', 'quotationPrint_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);  
           // $this->template->load('home_template', 'quotationForm_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            }
        } else {
            
            redirect('index.php/logout');
        }
  
  
  
      
  } //End of Show Quotation
    
    
    
    
    
    
    
    
    
    
    
    
    //********************************************************************************************************
    //**************************************Vehicle Search to print reports***********************************
    //********************************************************************************************************
     
    public function isVehicleExist(){
         if($this->input->post()){ 
            $selectionCriteria=$this->input->post('selectionCriteria');
            $selectionValue=$this->input->post('searchVehicleCriteria');
            
            if($selectionCriteria==='chassisno' && strlen($selectionValue)===17 ){
                $vehicleid=$this->load->model('vehicleModel')?$this->vehicleModel-> getChasisID($selectionValue):FALSE;
                $chassisno=$vehicleid?strtoupper($selectionValue):"Vehicle Not Exist!";
                //$chassisno='MBX0003ABXL964295';
                //$vehicleid=576;
                $invoicedetail=$vehicleid?($this->load->model('invoiceModel')?$this->invoiceModel-> getInvoiceNoOfChassisId($vehicleid):FALSE):FALSE;
                $invoiceid=314;
                $pdddata[0]=array('invoiceid'=>$invoiceid,'vehicleid'=>$vehicleid,'chassisno'=>$chassisno,'invoicedetail'=>$invoicedetail);
               
               //$data=['pdddata'=>$pdddata];
               $data=['vehicleid'=>$vehicleid,'chassisno'=>$chassisno,'invoicedetail'=>$invoicedetail];
                    $display= $this->load->view('chassisPddContent_view',$data,TRUE) ;
                    $this->output->set_output($display);
            }else if($selectionCriteria==='engineno' && strlen($selectionValue)===10){
               
            }else if($selectionCriteria==='invoiceno'&& strlen($selectionValue)>=1 && strlen($selectionValue)<=5){
              
            }else if($selectionCriteria==='customername'&& strlen($selectionValue)>=1 && strlen($selectionValue)<=8){
               
                 $vehicleid=$this->load->model('invoiceModel')?$this->invoiceModel-> getChassisIdOnCustomerId($selectionValue):FALSE;
                  //echo "success  ".$vehicleid."     ".$selectionValue."    ";
                $chassisno=$vehicleid?strtoupper($selectionValue):"Vehicle Not Exist!";
                //$chassisno='MBX0003ABXL964295';
                //$vehicleid=576;
                $invoicedetail=$vehicleid?($this->load->model('invoiceModel')?$this->invoiceModel-> getInvoiceNoOfChassisId($vehicleid):FALSE):FALSE;
               // echo var_dump($invoicedetail);
                $invoiceid=314;
                $pdddata[0]=array('invoiceid'=>$invoiceid,'vehicleid'=>$vehicleid,'chassisno'=>$chassisno,'invoicedetail'=>$invoicedetail);
               
               //$data=['pdddata'=>$pdddata];
               $data=['vehicleid'=>$vehicleid,'chassisno'=>$chassisno,'invoicedetail'=>$invoicedetail];
                    $display= $this->load->view('chassisPddContent_view',$data,TRUE) ;
                    $this->output->set_output($display);
              
            }else{
                $display="Incorrect Data or Selection" ;
                    $this->output->set_output($display);
            }
            
         }
       
    }//End of Vehicle Search to print reports
    
    //*****************************************************************************************************showChallanToPrint
//*********************************Print Delivery Challn For Customer***********************************
//***************************************************************************************************** 
public function showChallanToPrint(){
       if($this->input->get()){ 
           $invoiceid=$this->input->get('invoiceid');
           
           // if($this->input->post('showInvoiceBtn')){
                
               // $chasisid=$this->input->post('chasisno');
                $viewChallan='True';
                $tools="";$mirror="";$purposeoftransfer="";$tyrefrontright="";$challanno="";$bookno="";
               $hypothecation=""; $gst="10AJPPK9206N1ZX"
                  ;$contact1="7766909443"; $contact2="9431428926";
                  if($this->load->model('invoiceModel')){
                       $chasisid=$this->invoiceModel->getChassisId($invoiceid);
                       $invoiceno=$this->invoiceModel->getInvoiceNumber($chasisid);
                       $locationid=$this->invoiceModel->getcustomerId($invoiceid);
                       $hypothecation=$this->invoiceModel->getHypothecation($chasisid);
                       $date=$this->invoiceModel->getInvoiceDate($chasisid);
                       $companyid=$this->invoiceModel->getCompanyId($chasisid);
					   $companydetails=$this->load->model('companyModel')?$this->companyModel->getCompanyDetail($companyid):FALSE;

                        $date=date("d-m-Y",strtotime($date));
                   }
                if($this->load->model('vehicleModel')){
                    $chasisdetail=array();
                   $chasisdetail= $this->vehicleModel->getChasisDetail($chasisid);
                    $chasisno=$chasisdetail[0]['chasisno'];
                   
                    $engineno=$chasisdetail[0]['engineno'];
                    $modalid=$chasisdetail[0]['modalid'];
                    $colorid=$chasisdetail[0]['colorid'];
                    $keyno=$chasisdetail[0]['keyno'];
                    $gearboxno=$chasisdetail[0]['gearboxno'];
                    $tyrefrontleft=$chasisdetail[0]['fronttyreleft'];
                    $tyrefrontright=$chasisdetail[0]['fronttyreright'];
                   $tyrerearleft= $chasisdetail[0]['reartyreleft'];
                    $tyrerearright=$chasisdetail[0]['reartyreright'];
                    $challanid=$chasisdetail[0]['challanid'];
                    $batteryno=$chasisdetail[0]['batteryno'];
                    $location=$chasisdetail[0]['location'];
                    $sparetyreno=$tyrefrontright;
                    $ecu=$chasisdetail[0]['ecu'];
                    
               // $challanid=$chasisdetail[0]['challanid'];
               
                    $challanno=$challanid;
                    //$locationid=$chasisdetail[0]['customerid'];
                    
                    
                    if($this->load->model('customerModel')){
                    $customername=$this->customerModel->getCustomerName($locationid);
                    $customeraddressline1=$this->customerModel->getCustomerAddressLine1($locationid);
                    $customeraddressline2=$this->customerModel->getCustomerAddressLine2($locationid);
                    $customercontact=$this->customerModel->getCustomerContact($locationid);
                    $father=$this->customerModel->getCustomerFather($locationid);
                    $pin=$this->customerModel->getCustomerPin($locationid);
                    $district=$this->customerModel->getCustomerDistrict($locationid);
                    $state=$this->customerModel->getCustomerState($locationid);
                        
                    }
                    
               
                   
                   // $invoiceno=$challanid;
                    $colorname=$this->load->model('colorModel')?$this->colorModel->getColorName($colorid):"NA";
                    if($this->load->model('modalModel')){
                    $modalname=$this->modalModel->getModalName($modalid);
                   
                    
         

                    $hsn=$this->modalModel->getModalHsn($modalid);
                   

                    if($this->load->model('vehicleTransactionModel')){
                        $challandetail= $this->vehicleTransactionModel->getChallanDetail($challanid);
                       // $date=$challandetail[0]['vehicletransferdate'];
                       // $date=date("d-m-Y",strtotime($date));
                       
                        $bookno=$challandetail[0]['servicebook'];
                         $mirror=$challandetail[0]['mirror'];
                        $tools=$challandetail[0]['tools'];
                        $purposeoftransfer=$challandetail[0]['vehicletransferpurpose'];
                       
                    }else{
                        $date="NA";
                        $invoiceno="";
                        $bookno="NA";
                       
                    }
                    
                    
                }else{
                    $invoiceno="NA";
                     $chasisno="xxxxxxxxxxxxxxxxxx";
                    $engineno="xxxxxxxxxx";
$keyno="";
$gearboxno="";
$tyrefrontleft="";
$tyrefrontright="";
$tyrerearleft="";
$tyrerearright="";
 $batteryno="";                   
   $date="";
   $ecu="NA";
                       
                        $bookno="NA";
                       
                        $modalname="";
                         $colorname="";
                    
                }





//$chasislist= $this->load->model('vehicleModel')?$this->vehicleModel->getInvoicedChasisList():'Chasis Loading Failed';


                 $data = ['title'=> 'Delivery Challan','viewChallan'=>$viewChallan,'chasisno'=>$chasisno,'customername'=>$customername,'customeraddressline1'=>$customeraddressline1,
                            'customeraddressline2'=>$customeraddressline2,'customercontact'=>$customercontact,'date'=>$date,'modalname'=>$modalname,'colorname'=>$colorname,
                            'engineno'=>$engineno,'keyno'=>$keyno,'gearboxno'=>$gearboxno,'tyrefrontleft'=>$tyrefrontleft,'tyrefrontright'=>$tyrefrontright,'tyrerearleft'=>$tyrerearleft,
                           'tyrerearright'=>$tyrerearright,'challanno'=>$challanno,'hypothecation'=>$hypothecation,'bookno'=>$bookno,'batteryno'=>$batteryno,'gst'=>$gst,'contact1'=>$contact1,'contact2'=>$contact2,'father'=>$father,'pin'=>$pin,'district'=>$district,'state'=>$state,'companyid'=>$companyid,'purposeoftransfer'=>$purposeoftransfer,'mirror'=>$mirror,'tools'=>$tools,'ecu'=>$ecu,'companydetails'=>$companydetails];
                           
                           
                 // $message = '';
                // $this->template->load('home_template', 'showTaxInvoice_View', 'member_menu', 'dashboard_secondary_menu', $message, $data);
                 $display= $this->load->view('printDeliveryChallan_View',$data,TRUE) ;
                    $this->output->set_output($display);
     //       }
       
       // $data=['vehicleid'=>$vehicleid,'chassisno'=>$chassisno,'invoicedetail'=>$invoicedetail];
                   
           
       }
       }
       
   }//End of Show Delivery Challan To Print

//******************************************************************************************************
    
    
     //******************************************************************************************************************
    //********************************************Show Tax Invoice To Print*************************************************
    //******************************************************************************************************************
    
   public function showInvoiceToPrint(){
       if($this->input->get()){ 
           $invoiceid=$this->input->get('invoiceid');
          
           // if($this->input->post('showInvoiceBtn')){
                
               // $chasisid=$this->input->post('chasisno');
                $viewInvoice='True';
				
               $hypothecation="";
			  // $gst="10AJPPK9206N1ZX";$contact2="9431428926";$contact1="7766909443";
			  $roundoff="" ;
				  
				  $sgstPercent = 0;$cgstPercent = 0;
				  $discount=0;$access=0;$accessrs="";$accesspaise="";$misc=0;$discountrs="";$discountpaise="";$insurancers="";$insurancepaise="";$roadtaxrs="";$roadtaxpaise="";$miscrs="";$miscpaise="";$insurance=0;$roadtax=0;
				  if($this->load->model('invoiceModel')){
                       $chasisid=$this->invoiceModel->getChassisId($invoiceid);
                       $invoiceno=$this->invoiceModel->getInvoiceNumber($chasisid);
                       $locationid=$this->invoiceModel->getcustomerId($invoiceid);
                       
                       $price=$this->invoiceModel->getBasicPrice($chasisid);
               $pricers=""     ;$pricepaise=""  ; 
			   $hypothecation=$this->invoiceModel->getHypothecation($chasisid);
                       $date=$this->invoiceModel->getInvoiceDate($chasisid);
                       $companyid=$this->invoiceModel->getCompanyId($chasisid);
					   $companydetails=$this->load->model('companyModel')?$this->companyModel->getCompanyDetail($companyid):FALSE;
                        $date=date("d-m-Y",strtotime($date));
                        //var_dump('$chassis = '.$locationid); 
                   }
                if($this->load->model('vehicleModel')){
                    $chasisdetail=array();
                   $chasisdetail= $this->vehicleModel->getChasisDetail($chasisid);
                    $chasisno=$chasisdetail[0]['chasisno'];
                   
                    $engineno=$chasisdetail[0]['engineno'];
                    $modalid=$chasisdetail[0]['modalid'];
                    $colorid=$chasisdetail[0]['colorid'];
                    $keyno=$chasisdetail[0]['keyno'];
                    $gearboxno=$chasisdetail[0]['gearboxno'];
                    $tyrefrontleft=$chasisdetail[0]['fronttyreleft'];
                    $tyrefrontright=$chasisdetail[0]['fronttyreright'];
                   $tyrerearleft= $chasisdetail[0]['reartyreleft'];
                    $tyrerearright=$chasisdetail[0]['reartyreright'];
                    $challanid=$chasisdetail[0]['challanid'];
                    $batteryno=$chasisdetail[0]['batteryno'];
                    $location=$chasisdetail[0]['location'];
                    $ecu=$chasisdetail[0]['ecu'];
                    $sparetyreno=$tyrefrontright;
                    //$locationid=$chasisdetail[0]['customerid'];
                    
                    
                    if($this->load->model('customerModel')){
                    $customername=$this->customerModel->getCustomerName($locationid);
                    $customeraddressline1=$this->customerModel->getCustomerAddressLine1($locationid);
                    $customeraddressline2=$this->customerModel->getCustomerAddressLine2($locationid);
                    $customercontact=$this->customerModel->getCustomerContact($locationid);
                    $father=$this->customerModel->getCustomerFather($locationid);
                    $pin=$this->customerModel->getCustomerPin($locationid);
                    $district=$this->customerModel->getCustomerDistrict($locationid);
                    $state=$this->customerModel->getCustomerState($locationid);
                        
                    }
                    
               
                   
                   // $invoiceno=$challanid;
                    $colorname=$this->load->model('colorModel')?$this->colorModel->getColorName($colorid):"NA";
                    if($this->load->model('modalModel')){
                    $modalname=$this->modalModel->getModalName($modalid);
                   // $price=$this->modalModel->getModalPrice($modalid);
                    //echo $price;
                    $cgst=$this->modalModel->getModalCgst($modalid);
                    $sgst=$this->modalModel->getModalSgst($modalid);
					$sgstPercent = $sgst;
					$cgstPercent = $cgst;
                     $totaltax=$cgst+$sgst;
                    //var_dump('cgst = '.$cgst.' sgst ='.$sgst);
                     $totaltax=$totaltax/100;
                     $totaltax=1+$totaltax;
                      //echo $totaltax;
                      $basic=$price/$totaltax;
                    $basic=round($basic,2);
                     //$basic=round(($price-($price*$totaltax/100)),2);
                     $cgst=round(($basic*$cgst/100),2);
                     $sgst=round(($basic*$sgst/100),2);
                     $total=$basic+$cgst+$sgst;
                     $basicrs=explode('.',$basic)[0];
                     //$basicrs=floor($basic);
                    //$basicpaise=(int)((($basic)-$basicrs)*100);
                   // $basicpaise=explode('.',$basic)[1];
                        $cgstrs=floor($cgst);
               $pricers=floor($price) ;//$cgstpaise=(int)((($cgst)-$cgstrs)*100);
                      //  $cgstpaise=explode('.',$cgst)[1];
                        $sgstrs=floor($sgst);
                       // $sgstpaise=(int)(($sgst-$sgstrs)*100);
                      //  $sgstpaise=explode('.',$sgst)[1];
                        $totalrs=floor($total);
                       // $totalpaise=((floor($total)-$totalrs)*100);
                       $basicpaise=isset(explode('.',$basic)[1])?explode('.',$basic)[1]:"00";
                       $cgstpaise=isset(explode('.',$cgst)[1])?explode('.',$cgst)[1]:"00";
                       $sgstpaise=isset(explode('.',$sgst)[1])?explode('.',$sgst)[1]:"00";
                       $totalpaise=isset(explode('.',$total)[1])?explode('.',$total)[1]:"00";
         
$pricepaise=isset(explode('.',$price)[1])?explode('.',$price)[1]:"00";
                 //$totalpaise=explode('.',$total)[1]?explode('.',$total)[1]:"00";
                    $hsn=$this->modalModel->getModalHsn($modalid);
                    $amountinwords="";$amountinwords1="";
                    $amountinwords= $this->load->model('transactionModel')?$this->transactionModel->Show_Amount_In_Words($total):"";
$amountinwords1= $this->load->model('transactionModel')?$this->transactionModel->Show_Amount_In_Words($price):"";
$difference=round(($total-$price),2);
                    if($difference>0){
                        $roundoff="(-".$difference.")";
                    }else if($difference<0){
                         $roundoff="(+".$difference.")";
                    }
 else
                    {
                        $roundoff=0;
                    }
                   // echo $roundoff;   
                    }else{
                        $total="";
                        $totalrs="";
                        $totalpaise="";
                        $basicrs="";
                        $basic="";
                        $basicpaise="";
                         $cgstrs="";
                         $cgstpaise="";
                          $sgstrs="";
                          $sgstpaise="";
                        $cgst="";
                        $sgst="";
                        $modalname="";
                       $price="";
                    $cgst="";
                    $sgst="";
                    $amountinwords="";
                     
                    $hsn="87033199"; 
                    }
                    if($this->load->model('vehicleTransactionModel')){
                        $challandetail= $this->vehicleTransactionModel->getChallanDetail($challanid);
                       // $date=$challandetail[0]['vehicletransferdate'];
                       // $date=date("d-m-Y",strtotime($date));
                       
                        $bookno=$challandetail[0]['servicebook'];
                       
                    }else{
                        $date="NA";
                        $invoiceno="";
                        $bookno="NA";
                       
                    }
                    
                    
                }else{
                    $invoiceno="NA";
                     $chasisno="xxxxxxxxxxxxxxxxxx";
                    $engineno="xxxxxxxxxx";$ecu="NA";
$keyno="";
$gearboxno="";
$tyrefrontleft="";
$tyrefrontright="";
$tyrerearleft="";
$tyrerearright="";
 $batteryno="";                   
   $date="";
                       
                        $bookno="NA";
                       
                        $modalname="";
                         $colorname="";
                    
                }





//$chasislist= $this->load->model('vehicleModel')?$this->vehicleModel->getInvoicedChasisList():'Chasis Loading Failed';


                 $data = ['companydetails'=>$companydetails,'pricers'=>$pricers,'pricepaise'=>$pricepaise,'title'=> 'Tax Invoice','viewInvoice'=>$viewInvoice,'chasisno'=>$chasisno,'customername'=>$customername,'customeraddressline1'=>$customeraddressline1,
                            'customeraddressline2'=>$customeraddressline2,'customercontact'=>$customercontact,'date'=>$date,'modalname'=>$modalname,'colorname'=>$colorname,
                            'engineno'=>$engineno,'keyno'=>$keyno,'gearboxno'=>$gearboxno,'tyrefrontleft'=>$tyrefrontleft,'sparetyreno'=>$tyrefrontright,'tyrerearleft'=>$tyrerearleft,
                           'tyrerearright'=>$tyrerearright,'invoiceno'=>$invoiceno,'hypothecation'=>$hypothecation,'servicebookno'=>$bookno,'batteryno'=>$batteryno,'father'=>$father,'pin'=>$pin,'district'=>$district,'state'=>$state,'basic'=>$basic,'basicrs'=>$basicrs,'basicpaise'=>$basicpaise ,'discount'=>$discount,'discountrs'=>$discountrs,'discountpaise'=>$discountpaise ,'cgst'=>$cgst,'cgstrs'=>$cgstrs,'cgstpaise'=>$cgstpaise ,'sgst'=>$sgst,'sgstrs'=>$sgstrs,'sgstpaise'=>$sgstpaise,'access'=>$access,'accessrs'=>$accessrs,'accesspaise'=>$accesspaise,'insurance'=>$insurance,'insurancers'=>$insurancers,'insurancepaise'=>$insurancepaise,'roadtax'=>$roadtax,'roadtaxrs'=>$roadtaxrs,'roadtaxpaise'=>$roadtaxpaise,'misc'=>$misc ,'miscrs'=>$miscrs,'miscpaise'=>$miscpaise,'total'=>$total,'totalrs'=>$totalrs,'totalpaise'=>$totalpaise,'hsn'=>$hsn,'amountinwords'=>$amountinwords,
        
'amountinwords1'=>$amountinwords1,'roundoff'=>$roundoff,'companyid'=>$companyid,'ecu'=>$ecu,'sgstPercent'=>$sgstPercent,'cgstPercent'=>$cgstPercent];
                     //var_dump($data)  ;    
                 // $message = '';
                // $this->template->load('home_template', 'showTaxInvoice_View', 'member_menu', 'dashboard_secondary_menu', $message, $data);
                 $display= $this->load->view('taxInvoicePrint_view',$data,TRUE) ;
                    $this->output->set_output($display);
     //       }
       
       // $data=['vehicleid'=>$vehicleid,'chassisno'=>$chassisno,'invoicedetail'=>$invoicedetail];
                   
           
       }
       
   }//End of Show Tax Invoice To Print
    
    
     //******************************************************************************************************************
    //******************************************************************************************************************
    //******************************************************************************************************************
    
    
     //******************************************************************************************************************
    //********************************************Show Form 21 To Print*************************************************
    //******************************************************************************************************************
     public function showForm21ToPrint(){
		 
		 //$display = "here";
		  if($this->input->get()){ 
		     
		     $viewForm21='True';
			 
			 $invoiceid=$this->input->get('invoiceid');
			 $maker="";$frontaxle="";$rearaxle="";$otheraxle="";$tandemaxle="";
		     
			 if($this->load->model('invoiceModel')){
				 $chasisid=$this->invoiceModel->getChassisId($invoiceid);
                 $invoiceno=$this->invoiceModel->getInvoiceNumber($chasisid);
                 $locationid=$this->invoiceModel->getcustomerId($invoiceid);
                       
                 $date=$this->invoiceModel->getInvoiceDate($chasisid);
                 $hypothecation=$this->invoiceModel->getHypothecation($chasisid);
                 $companyid=$this->invoiceModel->getCompanyId($chasisid);
			     $companydetails=$this->load->model('companyModel')?$this->companyModel->getCompanyDetail($companyid):FALSE;
                 $date=date("d-m-Y",strtotime($date));
                 $p=explode("-",$date);
                 $y=$p[2];$m=$p[1];
				 
				
				 
			 }
			 if($this->load->model('vehicleModel')){
				 $chasisdetail=array();
                 $chasisdetail= $this->vehicleModel->getChasisDetail($chasisid);
                 $chasisno=$chasisdetail[0]['chasisno'];
                 $manufactureyear=substr($chasisno,9,1);
                 $manufacturemonth=substr($chasisno,10,1);
                
               
               switch($manufactureyear){
                   case 'W':$year=2018;break;
                   case 'X':$year=2019;break;
                   case 'Y':$year=2020;break;
                   case 'Z':$year=2021;break;
                   case '1':$year=2022;break;
                   case '2':$year=2023;break;
                   default:$year=2023;
               }
               switch($manufacturemonth){
                   case 'A':$month='Jan';break;
                   case 'B':$month='Feb';break;
                   case 'C':$month='March';break;
                   case 'D':$month='April';break;
                   case 'E':$month='May';break;
                   case 'F':$month='June';break;
                   case 'G':$month='July';break;
                   case 'H':$month='Aug';break;
                   case 'J':$month='Sep';break;
                   case 'K':$month='Oct';break;
                   case 'L':$month='Nov';break;
                   case 'M':$month='Dec';break;
                   default:$month='July';
                   
               }
                   
                    $engineno=$chasisdetail[0]['engineno'];
                    $modalid=$chasisdetail[0]['modalid'];
                    $colorid=$chasisdetail[0]['colorid'];
                   
                   
                    $challanid=$chasisdetail[0]['challanid'];
                    $batteryno=$chasisdetail[0]['batteryno'];
                    $location=$chasisdetail[0]['location'];
                      
                   
                    
                    if($location==='Customer'){
                    if($this->load->model('customerModel')){
                    $customername=$this->customerModel->getCustomerName($locationid);
                    $customeraddressline1=$this->customerModel->getCustomerAddressLine1($locationid);
                    $customeraddressline2=$this->customerModel->getCustomerAddressLine2($locationid);
                    $father=$this->customerModel->getCustomerFather($locationid);
                    $pin=$this->customerModel->getCustomerPin($locationid);
                    $customercontact=$this->customerModel->getCustomerContact($locationid);
                    $district=$this->customerModel->getCustomerDistrict($locationid);
                       
                    }
                    
                }else{
                    $customername="NA";
                    $father="";
                    $pin="";
                    $customeraddressline1="NA";
                    $customeraddressline2="NA";
                    $customercontact="NA";
                    $district="";
                }
                    
                    $challanno=$challanid;
                    $colorname=$this->load->model('colorModel')?$this->colorModel->getColorName($colorid):"NA";
                     if($this->load->model('modalModel')){
                    $modalname=$this->modalModel->getModalName($modalid);
                    $class=$this->modalModel->getModalClass($modalid);
                    $bodytype=$this->modalModel->getModalBodyType($modalid);
                   
                     $gross=$this->modalModel->getModalGrossWeight($modalid);
                    $unladen=$this->modalModel->getModalWeight($modalid);
                    $hp=$this->modalModel->getModalHp($modalid);
                    $fuel=$this->modalModel->getModalFuel($modalid);
                    $cylinder=$this->modalModel->getModalCylinder($modalid);
                    $seat=$this->modalModel->getModalSeat($modalid);
                    }else{
                        $modalname=""; $gross="";$unladen=""; $hp="";$fuel="";
                         $class="";$cylinder="";$seat="";
                    $bodytype="";
                    }
                    
                    if($this->load->model('vehicleTransactionModel')){
                        $challandetail= $this->vehicleTransactionModel->getChallanDetail($challanid);
                       // $date=$challandetail[0]['vehicletransferdate'];
                       // $p=explode("-",$date);
                       // $y=$p[2];$m=$p[1];
                       
                      $refno=$m.$y.substr($chasisno,11,6);
                        
                    }else{
                        $date="NA";
                       
                    }
				 
				 //var_dump ($data);
			 }else{
				 $challanno="NA";
                 $chasisno="xxxxxxxxxxxxxxxxxx";
                 $engineno="xxxxxxxxxx";
                  
                 $date="NA";
                        
                 $modalname="NA";
                 $colorname="NA";
				 
			 }
			 $data = ['title' => 'Form 21','viewForm21'=>$viewForm21,'chasisno'=>$chasisno,'customername'=>$customername,'customeraddressline1'=>$customeraddressline1,
                            'customeraddressline2'=>$customeraddressline2,'customercontact'=>$customercontact,'date'=>$date,'modalname'=>$modalname,
                            'engineno'=>$engineno,'pin'=>$pin,'father'=>$father,'district'=>$district,'refno'=>$refno,'class'=>$class,
                           'maker'=>$maker,'fuel'=>$fuel,'challanno'=>$challanno,'hypothecation'=>$hypothecation,'hp'=>$hp,'cylinder'=>$cylinder,'month'=>$month,'year'=>$year,'seat'=>$seat,'unladen'=>$unladen,'gross'=>$gross,'bodytype'=>$bodytype,'frontaxle'=>$frontaxle,'rearaxle'=>$rearaxle,'otheraxle'=>$otheraxle,'tandemaxle'=>$tandemaxle,'color'=>$colorname,'companyid'=>$companyid,'companydetails'=>$companydetails];
						  // var_dump($data);
			 $display= $this->load->view('form21Print_view',$data,TRUE) ;
             $this->output->set_output($display);
		  }
		 
		 
	 }//End of Show Form 21 To Print

    
    
     //******************************************************************************************************************
    //******************************************************************************************************************
    //******************************************************************************************************************
    
    
    //******************************************************************************************************************
    //********************************************Handle Update Finance*************************************************
    //******************************************************************************************************************
    
     public function updateFinanceHandler(){
         
         $this->session->set_userdata("pageid", "updateFinanceHandler");
          $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
           $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
            if (($role === 'member') && $isLoggedin) {
                 $chasisList=$this->load->model('financeModel')?$this->financeModel->getFinancedVehicleList():"No Record Found";
               if($this->input->post()){ 
                   
                 
                   
                   $financeid=$this->load->model('financeModel')?$this->financeModel->getFileIdOfChasisNo($this->input->post('chasisno')):"No Record Found";
                  
                   $cibil=$this->input->post('cibilcheckbox');
                    $cibildate=$this->input->post('cibildatecheckbox');
                   
                     $agreement=$this->input->post('agreementcheckbox');
                    $agreementdate=$this->input->post('agreementdatecheckbox');
                     $pdd=$this->input->post('pddcheckbox');
                    $pdddate=$this->input->post('pdddatecheckbox');
                     $payment=$this->input->post('paymentcheckbox');
                    $paymentdate=$this->input->post('paymentdatecheckbox');
                     $document=$this->input->post('documentcheckbox');
                      $financer=$this->input->post('financercheckbox');
                       $executive=$this->input->post('executivecheckbox');
                     $do=$this->input->post('docheckbox');
                    $dodate=$this->input->post('dodatecheckbox');
                    $loanamount=$this->input->post('loanamountcheckbox');
                    $doamount=$this->input->post('doamountcheckbox');
                    $financedata=array();
                    if($cibil !==""){
                     
                      
                      $financedata+=['cibilstatus'=>$this->input->post('cibil')];
                      
                    }
                     if($cibildate !==""){
                         $financedata+=['cibildate'=>$this->input->post('cibildate')]; 
                   
                      //echo "1.".$financedata['cibildate']." 2.".$financedata['cibilstatus'];
                     
                    }
                    
                     if($agreement !==""){
                          $financedata+=['agreementstatus'=>$this->input->post('agreement')]; 
                     // echo  $this->input->post('agreement');
                      
                    }
                     if($agreementdate !==""){
                          $financedata+=['agreementdate'=>$this->input->post('agreementdate')]; 
                     // echo  $this->input->post('agreementdate');
                     
                     
                    }
                    
                     if($pdd !==""){
                          $financedata+=['pddstatus'=>$this->input->post('pdd')]; 
                      //echo  $this->input->post('pdd');
                      
                    }
                     if($pdddate !==""){
                          $financedata+=['pddsubmitiondate'=>$this->input->post('pdddate')]; 
                     // echo  $this->input->post('pdddate');
                     
                     
                    }
                     if($do !==""){
                          $financedata+=['deliveryorder'=>$this->input->post('do')];
                         
                      //echo  $this->input->post('do');
                      
                      
                    }
                     if($dodate !==""){
                          $financedata+=['dodate'=>$this->input->post('dodate')];
                      //echo  $this->input->post('dodate');
                     
                    }
                     if($payment !==""){
                         $financedata+=['payment'=>$this->input->post('payment')];
                     // echo  $this->input->post('payment');
                      
                    }
                     if($paymentdate !==""){
                         $financedata+=['paymentdate'=>$this->input->post('paymentdate')];
                      //echo  $this->input->post('paymentdate');
                     
                    }
                     if($loanamount !==""){
                         $financedata+=['loanamount'=>$this->input->post('loanvalue')];
                     // echo  $this->input->post('loanvalue');
                      
                    }
                     if($doamount !==""){
                         $financedata+=['doamount'=>$this->input->post('dovalue')];
                     // echo  $this->input->post('dovalue');
                     
                    }
                     if($document !==""){
                           $financedata+=['documents'=>$this->input->post('document')];
                     // echo  $this->input->post('document');
                     
                    }
                     if($financer !==""){
                          $financedata+=['financerid'=>$this->input->post('financer')];
                     // echo  $this->input->post('financer');
                      
                    }
                     if($executive !==""){
                         $financedata+=['financerexecutiveid'=>$this->input->post('executive')];
                      //echo  $this->input->post('executive');
                      // echo "1.".$financedata['cibildate']." 2.".$financedata['cibilstatus']." 3.".$financedata['agreementstatus']."4.".$financedata['agreementdate']." ".$financedata['pddsubmitiondate']." ".$financedata['pddstatus']." ".$financedata['dodate']." ".$financedata['deliveryorder']." ".$financedata['payment']." ".$financedata['paymentdate']
                    //   ." ".$financedata['loanamount']." ".$financedata['doamount']." ".$financedata['documents']." ".$financedata['financerid']." ".$financedata['financerexecutiveid'];
                     
                    }
                   
                    
              $message=$this->load->model('financeModel')?$this->financeModel->updateFinanceData($financedata,$financeid):"Error Loading Finance Database!";   
                    
                  
          
                 $message=$this->createMessage($message."<i class='fa fa-smile-o'></i>",'success');
               // $message=$this->createMessage("Data Updated Successfully<i class='fa fa-smile-o'></i>",'success');
                $data = ['title' => 'Finance Update','chasisList'=>$chasisList];
            //$message = '';
            $this->template->load('home_template', 'updateFinance_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
                
                
            }else{
               $message="Data Updation Failed&nbsp;";
               $message.="<i class='fa fa-frown-o'></i>";
                
                 $message=$this->createMessage($message,'danger');
                $data = ['title' => 'Finance Update','chasisList'=>$chasisList];
            //$message = '';
            $this->template->load('home_template', 'updateFinance_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
                
            }
            
         
     }else {
           
           redirect('index.php/logout');
        }    
         
     }
    
    
    
    
    
    
    
    
    //Update Finance
    
    public function updateFinance(){
     $this->session->set_userdata("pageid", "updateFinance");
      
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            $chasisList=$this->load->model('financeModel')?$this->financeModel->getFinancedVehicleList():"No Record Found";
            
            
            
            
            
            if($this->input->get('financeid')){
                
                
              $financeid=$this->input->get('financeid');
              if($this->load->model('financeModel')){
               $customername=$this->financeModel->getCustomerName($financeid);  
               $chasisno=$this->financeModel->getChasisNo($financeid);
               $cibil=$this->financeModel->getCibilStatus($financeid)['cibilstatus'];
               $cibildate=$this->financeModel->getCibilStatus($financeid)['cibildate'];
               $agreementdate=$this->financeModel->getAgreementStatus($financeid)['agreementdate'];
               $agreement=$this->financeModel->getAgreementStatus($financeid)['agreementstatus'];
               $do=$this->financeModel->getDoStatus($financeid)['deliveryorder'];
               $dodate=$this->financeModel->getDoStatus($financeid)['dodate'];
               $pdd=$this->financeModel->getPddStatus($financeid)['pddstatus'];
               $pdddate=$this->financeModel->getPddStatus($financeid)['pddsubmitiondate'];
               $loanamount=$this->financeModel->getAmountStatus($financeid)['loanamount'];
               $doamount=$this->financeModel->getAmountStatus($financeid)['doamount'];
               $paymentdate=$this->financeModel->getAmountStatus($financeid)['paymentdate'];
               $payment=$this->financeModel->getAmountStatus($financeid)['paymentstatus'];
               $document=$this->financeModel->getDocumentStatus($financeid);
                           $financerid=$this->financeModel->getFinancersName($financeid)['financerid'];
$executiveid=$this->financeModel->getExecutiveName($financeid)['executiveid'];
$executiveList=$this->load->model('executiveModel')?$this->executiveModel->getAllExecutive():"NA";
$financerList=$this->load->model('hypothecationModel')?$this->hypothecationModel->getAllFinancer():"NA";


              }else{
                $customername="Not Found";
                $chasisno="Not Found";
                $cibil="Not Found";
                $cibildate="0000-00-00";
                $agreementdate="0000-00-00";
                $agreement="Not Found";
                $do="Not Found";
                $dodate="0000-00-00";
                $pdd="Not Found";
                $pdddate="0000-00-00";
                $loanamount=0;
                $doamount=0;
                $paymentdate="0000-00-00";
                $payment="NULL";
                $document="NULL";
                $financerid="NULL";
$executiveid="NULL";
              }
              
             $financedata=array();
             $e=array('executiveid'=>1,'executivename'=>"Kundan");
$executiveList[0]=$e;
$f=array('financerid'=>1,'financername'=>"M&M");
$financerList[0]=$f;


             
             
             
          $financedata=['payment'=>$payment,'paymentdate'=>$paymentdate,'pdddate'=>$pdddate,'doamount'=>$doamount,'loanamount'=>$loanamount,'pdd'=>$pdd,'do'=>$do,'document'=>$document,'agreement'=>$agreement,'agreementdate'=>$agreementdate,'cibildate'=>$cibildate,'cibil'=>$cibil,'chasisno'=>$chasisno,'customername'=>$customername,'financerList'=>$financerList,'executiveList'=>$executiveList,'financeid'=>$financeid,'dodate'=>$dodate,'financerid'=>$financerid,'executiveid'=>$executiveid] ;  
             
             
           
             $this->load->view('chasisFinanceContent_view',$financedata) ;  
                
                
                
            }else{
            if($this->input->post('updateFinanceBtn')){
                $data = ['title' => 'Finance Update','chasisList'=>$chasisList];
            $message .=$this->createMessage( 'Updated Successfully','success');
            echo $message;
            $this->template->load('home_template', 'updateFinance_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            }else{
            
            
            
            
            $data = ['title' => 'Finance Update','chasisList'=>$chasisList];
            $message = '';
            $this->template->load('home_template', 'updateFinance_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            }
                
            }
            
        } else {
           
           redirect('index.php/logout');
        }    
        
        
        
        
        
    }
    
    
    
 //View Stock Location   
 public function   stockView(){
      $this->session->set_userdata("pageid", "stockView");
       
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            
/*/echo "<tr><td>" .$row['chasisno'] . "</td><td>" . $row['modalname'] . "</td>"
                       . "<td>" . $row['location'] . "</td><td>" . $row['branchname'] . "</td><td>" . $row['customername'] . "</td><td>" . $row['challandate'] . "</td>
                       <td>" . $row['customeraddressline1'] . "</td><td>" . $row['customeraddressline2'] . "</td><td>" .  $row['district']  . "</td><td>" . $row['customercontact'] . "</td>
                       <td>" . $row['dues'] . "</td></tr>";    */        
            
             $stock=array();

$chasisno="MBX00003ABZ12345";
$challandate="00-00-0000";
$modalname="APE AR 3+1";
$location="Godown";
$branchname="NA";
$customername="NA";
$customercontact="9934680440";
$customeraddressline1="NA";
$customeraddressline2="NA";
$district="NA";
$dues=0;

$viewAts="True";

$stock[0]=array('chasisno'=>$chasisno,'challandate'=>$challandate,'modalname'=>$modalname,'location'=>$location,
'customername'=>$customername,'customercontact'=>$customercontact,'customeraddressline1'=>$customeraddressline1,'customeraddressline2'=>$customeraddressline2
,'district'=>$district,'dues'=>$dues,'branchname'=>$branchname);
            
            
            $data = ['title' => 'Stock','stock'=>$stock];
            $message = '';
            $this->template->load('home_template', 'stock_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
           
        } else {
           
           redirect('index.php/logout');
        }
     
     
 }
 
 //View Do Tracking
public function dotrackingView(){
     $this->session->set_userdata("pageid", "dotrackingView");
       
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            
             $stock=array();

$chasisno="MBX00003ABZ12345";
$billingdate="18-01-2019";
$modalname="APE AR 3+1";
$hypothecation="M&M";
$dostatus="Issued";
$doissuedate="25-01-2019";
$dse="Vijay";
$customername="Naveen Kamal";
$customercontact="9934680440";
$customeraddressline1="Near C M Sc. College";
$customeraddressline2="Lalbagh Darbhanga";
$district="Darbhanga";
$dues=2000;
$date="07-02-2019";


$viewAts="True";

$stock[0]=array('chasisno'=>$chasisno,'billingdate'=>$billingdate,'modalname'=>$modalname,'hypothecation'=>$hypothecation,'dostatus'=>$dostatus
,'doissuedate'=>$doissuedate,'dse'=>$dse,'customername'=>$customername,'customercontact'=>$customercontact,'customeraddressline1'=>$customeraddressline1,'customeraddressline2'=>$customeraddressline2
,'district'=>$district,'dues'=>$dues);

     $default[0]=array('chasisno'=>"NA",'billingdate'=>"NA",'modalname'=>"NA",'hypothecation'=>"NA",'dostatus'=>"NA"
,'doissuedate'=>"NA",'dse'=>"NA",'customername'=>"NA",'customercontact'=>"NA",'customeraddressline1'=>"NA",'customeraddressline2'=>"NA"
,'district'=>"NA",'dues'=>"NA");
            $stock=array();
           $stock=$this->load->model('atsModel')?$this->atsModel->showDoPending():$default;        
            
            
            
            
            $data = ['title' => 'DO Tracking','stock'=>$stock];
            $message = '';
            $this->template->load('home_template', 'doTracking_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
           
        } else {
           
           redirect('index.php/logout');
        }
     
    
    
    
    
}


//View ATS
public function atsView(){
     $this->session->set_userdata("pageid", "atsView");
       
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            
           $default[0]=array('chasisno'=>"NA",'billingdate'=>"NA",'modalname'=>"NA",'hypothecation'=>"NA",'dostatus'=>"NA"
,'doissuedate'=>"NA",'dse'=>"NA",'customername'=>"NA",'customercontact'=>"NA",'customeraddressline1'=>"NA",'customeraddressline2'=>"NA"
,'district'=>"NA",'dues'=>"NA");
            $stock=array();
           // $stock=$this->load->model('atsModel')?$this->atsModel->showAllAts():$default;
             $stock=$this->load->model('atsModel')?$this->atsModel->showDoReleased():$default;

            
            
            
            
            $data = ['title' => 'ATS','stock'=>$stock];
            $message = '';
            $this->template->load('home_template', 'ats_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
           
        } else {
           
           redirect('index.php/logout');
        }
     
    
    
}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //Generate Quotation
     //Add Quotation
 public function generateQuotation(){
              
        $this->session->set_userdata("pageid", "quotation");
        
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
		
        if (($role === 'member') && $isLoggedin) {
                      
         //$chasis= $this->load->model('vehicleModel')?$this->vehicleModel->getDeliveredChasisList():'Chasis Loading Failed';
        
		 $branch= $this->load->model('branchModel')?$this->branchModel->getAllBranch():'Chasis Loading Failed';
		// $financerList=$this->load->model('hypothecationModel')?$this->hypothecationModel->getAllFinancer():"NA";
		 $currentquotationno=$this->load->model('QuotationModel')?$this->QuotationModel->getLastQuotationNo():'000';
	//$currentinvoiceno=397;
		 $data = ['title' => 'Generate Quotation','branchList'=>$branch,'currentquotationno'=>$currentquotationno+1];
          
            
		if($this->input->post('addQuotationBtn')){
	//	$vehicleid=$this->input->post('chasisSelect');
	
		$customerid=$this->input->post('customerSelect');
		$quotationdate=$this->input->post('quotationdate');

		$quotationno=$this->input->post('quotationno');
	//	$hypothecation=$this->input->post('financer');
		$vehicleprice=$this->input->post('vehicleprice');
		$insurance=$this->input->post('insurance');
		$registration=$this->input->post('registration');
		$permit=$this->input->post('permit');
		$accessories=$this->input->post('accessories');
		$others=$this->input->post('others');
		$discount=$this->input->post('discount');
	
		 
		  $quotationinsertdata=array('quotationdate'=>$quotationdate,'quotationno'=>$quotationno,'customerid'=>$customerid,'vehicleprice'=>$vehicleprice,'insurance'=>$insurance,
		 'registration'=>$registration,'permit'=>$permit,'accessories'=>$accessories,'others'=>$others,'discount'=>$discount);
		
		 	$message=$this->load->model('QuotationModel')?$this->QuotationModel->addQuotation($quotationinsertdata):'Error Adding Quotation';
		 //$quotationid= $this->load->model('QuotationModel')?$this->QuotationModel->getQuotationId($vehicleid):'Error Getting Invoice Id.';
		// $invoiceupdatedata=array('invoiceid'=>$invoiceid);
		
		
        //$message.= $this->load->model('vehicleModel')?$this->vehicleModel->editVehicle($invoiceupdatedata,$vehicleid):'Error Adding Invoice ID.';
        
         
         $currentquotationno=$this->load->model('QuotationModel')?$this->QuotationModel->getLastQuotationNo():'000';
       
           $data = ['title' => 'Generate Quotation','branchList'=>$branch,'currentquotationno'=>$currentquotationno+1];
		$this->template->load('home_template', 'addQuotation_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
		}else{
            //$data = ['title' => 'Vehicle Entry'];
            $message = '';
            $this->template->load('home_template', 'addQuotation_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);  
			}
        } else {
            //$this->home->logout;
           redirect('index.php/logout');
        } 

    }//End of adding Quotation
  
 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
   
  
  
  
    //Add Invoice
 public function invoice(){
              
        $this->session->set_userdata("pageid", "invoice");
        
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
		
        if (($role === 'member') && $isLoggedin) {
                      
         $chasis= $this->load->model('vehicleModel')?$this->vehicleModel->getDeliveredChasisList():'Chasis Loading Failed';
        
		 $branch= $this->load->model('branchModel')?$this->branchModel->getAllBranch():'Chasis Loading Failed';
		 $financerList=$this->load->model('hypothecationModel')?$this->hypothecationModel->getAllFinancer():"NA";
		 $currentinvoiceno=$this->load->model('InvoiceModel')?$this->InvoiceModel->getLastInvoiceNo():'000';
	//$currentinvoiceno=397;
		 $data = ['title' => 'Generate Invoice','chasisList'=>$chasis,'branchList'=>$branch,'financerList'=>$financerList,'currentinvoiceno'=>$currentinvoiceno+1];
          
            
		if($this->input->post('addInvoiceBtn')){
		$vehicleid=$this->input->post('chasisSelect');
	
		$customerid=$this->input->post('customerSelect');
		$invoicedate=$this->input->post('invoicedate');

		$invoiceno=$this->input->post('invoiceno');
		$hypothecation=$this->input->post('financer');
		$basicprice=$this->input->post('saleprice');
		$companyid=$this->input->post('companySelect');
	
		 
		 $invoiceinsertdata=array('vehicleid'=>$vehicleid,'companyid'=>$companyid,'invoicedate'=>$invoicedate,'invoiceno'=>$invoiceno,'customerid'=>$customerid,'hypothecation'=>$hypothecation,'basicprice'=>$basicprice);
		
		 	$message=$this->load->model('InvoiceModel')?$this->InvoiceModel->addInvoice($invoiceinsertdata):'Error Adding Invoice';
		 $invoiceid= $this->load->model('InvoiceModel')?$this->InvoiceModel->getInvoiceId($vehicleid):'Error Getting Invoice Id.';
		 $invoiceupdatedata=array('invoiceid'=>$invoiceid);
		
		
        $message.= $this->load->model('vehicleModel')?$this->vehicleModel->editVehicle($invoiceupdatedata,$vehicleid):'Error Adding Invoice ID.';
        
         
         
       
           $data = ['title' => 'Generate Invoice','chasisList'=>$chasis,'branchList'=>$branch,'financerList'=>$financerList,'currentinvoiceno'=>$currentinvoiceno];
		$this->template->load('home_template', 'addInvoice_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
		}else{
            //$data = ['title' => 'Vehicle Entry'];
            $message = '';
            $this->template->load('home_template', 'addInvoice_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);  
			}
        } else {
            //$this->home->logout;
           redirect('index.php/logout');
        } 

    }//End of adding Invoice
    
    
    
    
  
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   
 /////////////////////////////////////////////////////////////    //Tax Invoice View1//////////////////////////////////////////////////////////
    public function invoiceView1(){
    $this->session->set_userdata("pageid", "invoiceView1");
        $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        $roundoff="";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
       
        if (($role === 'member') && $isLoggedin) {
            $viewInvoice='False';
            
             $chasislist= $this->load->model('vehicleModel')?$this->vehicleModel->getInvoicedChasisList():'Chasis Loading Failed';
             $message="";
           //           /*
            $invoiceno=1;
$gst="10AJPPK9206N1ZX";
$contact1="7766909443";
$contact2="9431428926";
$date="18-01-2019";
$customername="Naveen Kamal";
$father="Pradeep Kamal";
$customeraddressline1="Near C M Sc. College";
$customeraddressline2="Lalbagh Darbhanga";
$customercontact="9934680440";
$pin="846004";
$hypothecation="Hinduja Leyland Finance Limited	";
//$viewInvoice="True";
$colorname="Black Yellow";
$hsn="87033199";
$servicebookno="123456";
$keyno="1234";
$batteryno="A2G8057034";
$modalname="APE AR 3+1";
$basic=180468.76;
$basicrs=floor($basic);
$basicpaise=floor(($basic-$basicrs)*100);
$discount=0;
$discountrs=floor($discount);
$discountpaise=$discount%100;

$cgst=round(($basic*14/100),2);

$cgstrs=floor($cgst);
$cgstpaise=floor(($cgst-$cgstrs)*100);
$sgst=round(($basic*14/100),2);

$sgstrs=floor($sgst);
$sgstpaise=floor(($sgst-$sgstrs)*100);
$insurance=0;
$reg=0;
$mis=0;
$access=0;
$accessrs=0;
$accesspaise=0;
$insurance=0;
$insurancers=0;
$insurancepaise=0;
$roadtax=0;
$roadtaxrs=0;
$roadtaxpaise=0;
$misc=0;
$miscrs=0;
$miscpaise=0;
$total=$basic-$discount+$cgst+$sgst;
$totalrs=floor($total);
$totalpaise=floor(($total-$totalrs)*100);
$chasisno="MBX00003ABZ12345";
$engineno="RS000AB123";
$gearboxno="G12345678";
$tyrefrontleft="Z1234";
$tyrefrontright="Z1234";
$tyrerearleft="Z1234";
$tyrerearright="Z1234";
$amountinwords="Two Lacs Thirty One Thousand Only";
$sparetyreno="Z1234";
$ditrict="";$state="";
//*/


         
            if($this->input->post('showInvoiceBtn')){
                
                $chasisid=$this->input->post('chasisno');
                $viewInvoice='True';
               
                if($this->load->model('vehicleModel')){
                    $chasisdetail=array();
                   $chasisdetail= $this->vehicleModel->getChasisDetail($chasisid);
                    $chasisno=$chasisdetail[0]['chasisno'];
                   
                    $engineno=$chasisdetail[0]['engineno'];
                    $modalid=$chasisdetail[0]['modalid'];
                    $colorid=$chasisdetail[0]['colorid'];
                    $keyno=$chasisdetail[0]['keyno'];
                    $gearboxno=$chasisdetail[0]['gearboxno'];
                    $tyrefrontleft=$chasisdetail[0]['fronttyreleft'];
                    $tyrefrontright=$chasisdetail[0]['fronttyreright'];
                   $tyrerearleft= $chasisdetail[0]['reartyreleft'];
                    $tyrerearright=$chasisdetail[0]['reartyreright'];
                    $challanid=$chasisdetail[0]['challanid'];
                    $batteryno=$chasisdetail[0]['batteryno'];
                    $location=$chasisdetail[0]['location'];
                    $sparetyreno=$tyrefrontright;
                    $locationid=$chasisdetail[0]['customerid'];
                    
                    
                    if($this->load->model('customerModel')){
                    $customername=$this->customerModel->getCustomerName($locationid);
                    $customeraddressline1=$this->customerModel->getCustomerAddressLine1($locationid);
                    $customeraddressline2=$this->customerModel->getCustomerAddressLine2($locationid);
                    $customercontact=$this->customerModel->getCustomerContact($locationid);
                    $father=$this->customerModel->getCustomerFather($locationid);
                    $pin=$this->customerModel->getCustomerPin($locationid);
                    $district=$this->customerModel->getCustomerDistrict($locationid);
                    $state=$this->customerModel->getCustomerState($locationid);
                        
                    }
                    
               
                   $hypothecation=""; 
                   if($this->load->model('invoiceModel')){
                       $invoiceno=$this->invoiceModel->getInvoiceNumber($chasisid);
                       $price=$this->invoiceModel->getBasicPrice($chasisid);
                       $hypothecation=$this->invoiceModel->getHypothecation($chasisid);
                       $date=$this->invoiceModel->getInvoiceDate($chasisid);
                       $companyid=$this->invoiceModel->getCompanyId($chasisid);
                        $date=date("d-m-Y",strtotime($date));
                   }
                   // $invoiceno=$challanid;
                    $colorname=$this->load->model('colorModel')?$this->colorModel->getColorName($colorid):"NA";
                    if($this->load->model('modalModel')){
                    $modalname=$this->modalModel->getModalName($modalid);
                   // $price=$this->modalModel->getModalPrice($modalid);
                    //echo $price;
                    $cgst=$this->modalModel->getModalCgst($modalid);
                    $sgst=$this->modalModel->getModalSgst($modalid);
                     $totaltax=$cgst+$sgst;
                    
                     $totaltax=$totaltax/100;
                     $totaltax=1+$totaltax;
                      //echo $totaltax;
                      $basic=$price/$totaltax;
                    $basic=round($basic,2);
                     //$basic=round(($price-($price*$totaltax/100)),2);
                     $cgst=round(($basic*$cgst/100),2);
                     $sgst=round(($basic*$sgst/100),2);
                     $total=$basic+$cgst+$sgst;
                     $basicrs=explode('.',$basic)[0];
                     //$basicrs=floor($basic);
                    //$basicpaise=(int)((($basic)-$basicrs)*100);
                   // $basicpaise=explode('.',$basic)[1];
                        $cgstrs=floor($cgst);
                        //$cgstpaise=(int)((($cgst)-$cgstrs)*100);
                      //  $cgstpaise=explode('.',$cgst)[1];
                        $sgstrs=floor($sgst);
                       // $sgstpaise=(int)(($sgst-$sgstrs)*100);
                      //  $sgstpaise=explode('.',$sgst)[1];
                        $totalrs=floor($total);
                       // $totalpaise=((floor($total)-$totalrs)*100);
                       $basicpaise=isset(explode('.',$basic)[1])?explode('.',$basic)[1]:"00";
                       $cgstpaise=isset(explode('.',$cgst)[1])?explode('.',$cgst)[1]:"00";
                       $sgstpaise=isset(explode('.',$sgst)[1])?explode('.',$sgst)[1]:"00";
                       $totalpaise=isset(explode('.',$total)[1])?explode('.',$total)[1]:"00";
                       //$totalpaise=explode('.',$total)[1]?explode('.',$total)[1]:"00";
                    $hsn=$this->modalModel->getModalHsn($modalid);
                    $amountinwords="";
                    $amountinwords= $this->load->model('transactionModel')?$this->transactionModel->Show_Amount_In_Words($total):"";
                    $difference=round(($total-$price),2);
                    if($difference>0){
                        $roundoff="(-".$difference.")";
                    }else if($difference<0){
                         $roundoff="(+".$difference.")";
                    }
                    // echo $roundoff;   
                    }else{
                        $total="";
                        $totalrs="";
                        $totalpaise="";
                        $basicrs="";
                        $basic="";
                        $basicpaise="";
                         $cgstrs="";
                         $cgstpaise="";
                          $sgstrs="";
                          $sgstpaise="";
                        $cgst="";
                        $sgst="";
                        $modalname="";
                       $price="";
                    $cgst="";
                    $sgst="";
                    $amountinwords="";
                     
                    $hsn="87033199"; 
                    }
                    if($this->load->model('vehicleTransactionModel')){
                        $challandetail= $this->vehicleTransactionModel->getChallanDetail($challanid);
                       // $date=$challandetail[0]['vehicletransferdate'];
                       // $date=date("d-m-Y",strtotime($date));
                       
                        $bookno=$challandetail[0]['servicebook'];
                       
                    }else{
                        $date="NA";
                        $invoiceno="";
                        $bookno="NA";
                       
                    }
                    
                    
                }else{
                    $invoiceno="NA";
                     $chasisno="xxxxxxxxxxxxxxxxxx";
                    $engineno="xxxxxxxxxx";
$keyno="";
$gearboxno="";
$tyrefrontleft="";
$tyrefrontright="";
$tyrerearleft="";
$tyrerearright="";
 $batteryno="";                   
   $date="";
                       
                        $bookno="NA";
                       
                        $modalname="";
                         $colorname="";
                    
                }





$chasislist= $this->load->model('vehicleModel')?$this->vehicleModel->getInvoicedChasisList():'Chasis Loading Failed';


                 $data = ['title' => 'Tax Invoice','viewInvoice'=>$viewInvoice,'chasisno'=>$chasisno,'customername'=>$customername,'customeraddressline1'=>$customeraddressline1,
                            'customeraddressline2'=>$customeraddressline2,'customercontact'=>$customercontact,'date'=>$date,'modalname'=>$modalname,'colorname'=>$colorname,
                            'engineno'=>$engineno,'keyno'=>$keyno,'gearboxno'=>$gearboxno,'tyrefrontleft'=>$tyrefrontleft,'sparetyreno'=>$tyrefrontright,'tyrerearleft'=>$tyrerearleft,
                           'tyrerearright'=>$tyrerearright,'invoiceno'=>$invoiceno,'hypothecation'=>$hypothecation,'servicebookno'=>$bookno,'chasislist'=>$chasislist,'batteryno'=>$batteryno,'gst'=>$gst,'contact1'=>$contact1,'contact2'=>$contact2,'father'=>$father,'pin'=>$pin,'district'=>$district,'state'=>$state,'basic'=>$basic,'basicrs'=>$basicrs,'basicpaise'=>$basicpaise ,'discount'=>$discount,'discountrs'=>$discountrs,'discountpaise'=>$discountpaise ,'cgst'=>$cgst,'cgstrs'=>$cgstrs,'cgstpaise'=>$cgstpaise ,'sgst'=>$sgst,'sgstrs'=>$sgstrs,'sgstpaise'=>$sgstpaise,'access'=>$access,'accessrs'=>$accessrs,'accesspaise'=>$accesspaise,'insurance'=>$insurance,'insurancers'=>$insurancers,'insurancepaise'=>$insurancepaise,'roadtax'=>$roadtax,'roadtaxrs'=>$roadtaxrs,'roadtaxpaise'=>$roadtaxpaise,'misc'=>$misc ,'miscrs'=>$miscrs,'miscpaise'=>$miscpaise,'total'=>$total,'totalrs'=>$totalrs,'totalpaise'=>$totalpaise,'hsn'=>$hsn,'amountinwords'=>$amountinwords,'companyid'=>$companyid];
                           
                 // $message = '';
                 $this->template->load('home_template', 'showTaxInvoice_View', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            }else{
                 $data = ['title' => 'Tax Invoice','viewInvoice'=>$viewInvoice,'chasislist'=>$chasislist];
                  $message = '';
            
            $this->template->load('home_template', 'showTaxInvoice_View', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            
            }
        } else {
           
           redirect('index.php/logout');
        }    
        
    }//End of Tax Invoice View
    
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   
    
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //Tax Invoice View
    public function invoiceView(){
    $this->session->set_userdata("pageid", "invoiceView");
        $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        //$role =$_SESSION['role'];
       // $isLoggedin =$_SESSION['isLoggedin'];
       // echo $role.'----'. $isLoggedin ;
        if (($role === 'member') && $isLoggedin) {
            $viewInvoice='False';
            
             $chasislist= $this->load->model('vehicleModel')?$this->vehicleModel->getDeliveredChasisList():'Chasis Loading Failed';
             $message="";
           //           /*
            $invoiceno=1;
$gst="10AJPPK9206N1ZX";
$contact1="7766909443";
$contact2="9431428926";
$date="18-01-2019";
$customername="Naveen Kamal";
$father="Pradeep Kamal";
$customeraddressline1="Near C M Sc. College";
$customeraddressline2="Lalbagh Darbhanga";
$customercontact="9934680440";
$pin="846004";
$hypothecation="Hinduja Leyland Finance Limited	";
//$viewInvoice="True";
$colorname="Black Yellow";
$hsn="87033199";
$servicebookno="123456";
$keyno="1234";
$batteryno="A2G8057034";
$modalname="APE AR 3+1";
$basic=180468.76;
$basicrs=floor($basic);
$basicpaise=floor(($basic-$basicrs)*100);
$discount=0;
$discountrs=floor($discount);
$discountpaise=$discount%100;

$cgst=round(($basic*14/100),2);

$cgstrs=floor($cgst);
$cgstpaise=floor(($cgst-$cgstrs)*100);
$sgst=round(($basic*14/100),2);

$sgstrs=floor($sgst);
$sgstpaise=floor(($sgst-$sgstrs)*100);
$insurance=0;
$reg=0;
$mis=0;
$access=0;
$accessrs=0;
$accesspaise=0;
$insurance=0;
$insurancers=0;
$insurancepaise=0;
$roadtax=0;
$roadtaxrs=0;
$roadtaxpaise=0;
$misc=0;
$miscrs=0;
$miscpaise=0;
$total=$basic-$discount+$cgst+$sgst;
$totalrs=floor($total);
$totalpaise=floor(($total-$totalrs)*100);
$chasisno="MBX00003ABZ12345";
$engineno="RS000AB123";
$gearboxno="G12345678";
$tyrefrontleft="Z1234";
$tyrefrontright="Z1234";
$tyrerearleft="Z1234";
$tyrerearright="Z1234";
$amountinwords="Two Lacs Thirty One Thousand Only";
$sparetyreno="Z1234";
//*/


         
            if($this->input->post('showInvoiceBtn')){
                
                $chasisid=$this->input->post('chasisno');
                $viewInvoice='True';
               
                if($this->load->model('vehicleModel')){
                    $chasisdetail=array();
                   $chasisdetail= $this->vehicleModel->getChasisDetail($chasisid);
                    $chasisno=$chasisdetail[0]['chasisno'];
                   
                    $engineno=$chasisdetail[0]['engineno'];
                    $modalid=$chasisdetail[0]['modalid'];
                    $colorid=$chasisdetail[0]['colorid'];
                    $keyno=$chasisdetail[0]['keyno'];
                    $gearboxno=$chasisdetail[0]['gearboxno'];
                    $tyrefrontleft=$chasisdetail[0]['fronttyreleft'];
                    $tyrefrontright=$chasisdetail[0]['fronttyreright'];
                   $tyrerearleft= $chasisdetail[0]['reartyreleft'];
                    $tyrerearright=$chasisdetail[0]['reartyreright'];
                    $challanid=$chasisdetail[0]['challanid'];
                    $batteryno=$chasisdetail[0]['batteryno'];
                    $location=$chasisdetail[0]['location'];
                    $sparetyreno=$tyrefrontright;
                    $locationid=$chasisdetail[0]['locationid'];
                    
                     if($location==='Branch'){
                         
                         
                        
                         $customername="NA";
                         $customeraddressline1=$this->load->model('branchModel')?$this->branchModel->getBranchLocation($locationid):"NA";
                        if($customeraddressline1==='Jhanjharpur'){
                           $message.='This vehicle is present at '.$customeraddressline1.'. Transfer the vehicle to customer before generating Invoice '; 
                           $customeraddressline2="Madhubani";
                        }else{
                            $message.='This vehicle is present at '.$customeraddressline1.'. Transfer the vehicle to customer before generating Invoice '; 
                            $customeraddressline2="Darbhanga";
                        }
                        $message=$this->createMessage($message,"info"); 
                       
                        $customercontact=$this->load->model('branchModel')?$this->branchModel->getBranchContact($locationid):"NA";
                         $viewInvoice='False';
                         
                    
                }elseif($location==='Customer'){
                    if($this->load->model('customerModel')){
                    $customername=$this->customerModel->getCustomerName($locationid);
                    $customeraddressline1=$this->customerModel->getCustomerAddressLine1($locationid);
                    $customeraddressline2=$this->customerModel->getCustomerAddressLine2($locationid);
                    $customercontact=$this->customerModel->getCustomerContact($locationid);
                    $father=$this->customerModel->getCustomerFather($locationid);
                    $pin=$this->customerModel->getCustomerPin($locationid);
                        
                    }
                    
                }else{
                    $customername="NA";
                     $father="";
                    $pin="";
                    $customeraddressline1="NA";
                    $customeraddressline2="NA";
                    $customercontact="NA";
                }
                    
                    $invoiceno=$challanid;
                    $colorname=$this->load->model('colorModel')?$this->colorModel->getColorName($colorid):"NA";
                    if($this->load->model('modalModel')){
                    $modalname=$this->modalModel->getModalName($modalid);
                    $price=$this->modalModel->getModalPrice($modalid);
                    //echo $price;
                    $cgst=$this->modalModel->getModalCgst($modalid);
                    $sgst=$this->modalModel->getModalSgst($modalid);
                     $totaltax=$cgst+$sgst;
                    
                     $totaltax=$totaltax/100;
                     $totaltax=1+$totaltax;
                      //echo $totaltax;
                      $basic=$price/$totaltax;
                    $basic=round($basic,2);
                     //$basic=round(($price-($price*$totaltax/100)),2);
                     $cgst=round(($basic*$cgst/100),2);
                     $sgst=round(($basic*$sgst/100),2);
                     $total=$basic+$cgst+$sgst;
                     $basicrs=floor($basic);
                    $basicpaise=floor(($basic-$basicrs)*100);
                        $cgstrs=floor($cgst);
                        $cgstpaise=floor(($cgst-$cgstrs)*100);
                        $sgstrs=floor($sgst);
                        $sgstpaise=floor(($sgst-$sgstrs)*100);
                        $totalrs=floor($total);
                        $totalpaise=floor(($total-$totalrs)*100);
                    $hsn=$this->modalModel->getModalHsn($modalid);
                    $amountinwords="";
                    $amountinwords= $this->load->model('transactionModel')?$this->transactionModel->Show_Amount_In_Words($total):"";
                        
                    }else{
                        $total="";
                        $totalrs="";
                        $totalpaise="";
                        $basicrs="";
                        $basic="";
                        $basicpaise="";
                         $cgstrs="";
                         $cgstpaise="";
                          $sgstrs="";
                          $sgstpaise="";
                        $cgst="";
                        $sgst="";
                        $modalname="";
                       $price="";
                    $cgst="";
                    $sgst="";
                    $amountinwords="";
                     
                    $hsn="87033199"; 
                    }
                    if($this->load->model('vehicleTransactionModel')){
                        $challandetail= $this->vehicleTransactionModel->getChallanDetail($challanid);
                        $date=$challandetail[0]['vehicletransferdate'];
                       
                        $bookno=$challandetail[0]['servicebook'];
                       
                    }else{
                        $date="NA";
                        $invoiceno="";
                        $bookno="NA";
                       
                    }
                    
                    
                }else{
                    $invoiceno="NA";
                     $chasisno="xxxxxxxxxxxxxxxxxx";
                    $engineno="xxxxxxxxxx";
$keyno="";
$gearboxno="";
$tyrefrontleft="";
$tyrefrontright="";
$tyrerearleft="";
$tyrerearright="";
 $batteryno="";                   
   $date="";
                       
                        $bookno="NA";
                       
                        $modalname="";
                         $colorname="";
                    
                }


$hypothecation="M&M.Finance Service LTD.";


$chasislist= $this->load->model('vehicleModel')?$this->vehicleModel->getDeliveredChasisList():'Chasis Loading Failed';


                 $data = ['title' => 'Tax Invoice','viewInvoice'=>$viewInvoice,'chasisno'=>$chasisno,'customername'=>$customername,'customeraddressline1'=>$customeraddressline1,
                            'customeraddressline2'=>$customeraddressline2,'customercontact'=>$customercontact,'date'=>$date,'modalname'=>$modalname,'colorname'=>$colorname,
                            'engineno'=>$engineno,'keyno'=>$keyno,'gearboxno'=>$gearboxno,'tyrefrontleft'=>$tyrefrontleft,'sparetyreno'=>$tyrefrontright,'tyrerearleft'=>$tyrerearleft,
                           'tyrerearright'=>$tyrerearright,'invoiceno'=>$invoiceno,'hypothecation'=>$hypothecation,'servicebookno'=>$bookno,'chasislist'=>$chasislist,'batteryno'=>$batteryno,'gst'=>$gst,'contact1'=>$contact1,'contact2'=>$contact2,'father'=>$father,'pin'=>$pin,'basic'=>$basic,'basicrs'=>$basicrs,'basicpaise'=>$basicpaise ,'discount'=>$discount,'discountrs'=>$discountrs,'discountpaise'=>$discountpaise ,'cgst'=>$cgst,'cgstrs'=>$cgstrs,'cgstpaise'=>$cgstpaise ,'sgst'=>$sgst,'sgstrs'=>$sgstrs,'sgstpaise'=>$sgstpaise,'access'=>$access,'accessrs'=>$accessrs,'accesspaise'=>$accesspaise,'insurance'=>$insurance,'insurancers'=>$insurancers,'insurancepaise'=>$insurancepaise,'roadtax'=>$roadtax,'roadtaxrs'=>$roadtaxrs,'roadtaxpaise'=>$roadtaxpaise,'misc'=>$misc ,'miscrs'=>$miscrs,'miscpaise'=>$miscpaise,'total'=>$total,'totalrs'=>$totalrs,'totalpaise'=>$totalpaise,'hsn'=>$hsn,'amountinwords'=>$amountinwords];
                           
                 // $message = '';
                 $this->template->load('home_template', 'showTaxInvoice_View', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            }else{
                 $data = ['title' => 'Tax Invoice','viewInvoice'=>$viewInvoice,'chasislist'=>$chasislist];
                  $message = '';
            
            $this->template->load('home_template', 'showTaxInvoice_View', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            
            }
        } else {
           
           redirect('index.php/logout');
        }    
        
    }//End of Tax Invoice View
    
    
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    //Branch Transfer of Vehicle
     public function branchTransfer(){
              
        $this->session->set_userdata("pageid", "branchTransfer");
        
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
		
        if (($role === 'member') && $isLoggedin) {
                      
         $chasis= $this->load->model('vehicleModel')?$this->vehicleModel->getBranchTransferChasisList():'Chasis Loading Failed';
        
		 $branch= $this->load->model('branchModel')?$this->branchModel->getAllBranch():'Chasis Loading Failed';
	
		 $data = ['title' => 'Branch Transfer','chasisList'=>$chasis,'branchList'=>$branch];
          
            
		if($this->input->post('branchTransferBtn')){
		$vehicleid=$this->input->post('chasisSelect');
		$branchid=$this->input->post('branchSelect');
		
		$transferdate=$this->input->post('transferdate');
		$purposeoftransfer=$this->input->post('purposeoftransfer');
		$transferlocation="Branch";
		$tools=$this->input->post('tools');
		$mirror=$this->input->post('mirror');
		$servicebook=$this->input->post('servicebook');
		$transferlocationid=$branchid;
	
		 
		 $vehicleinsertdata=array('vehicleid'=>$vehicleid,'vehicletransferdate'=>$transferdate,'vehicletransferpurpose'=>$purposeoftransfer,'tools'=>$tools,'mirror'=>$mirror,'servicebook'=>$servicebook,'location'=>"Branch",'locationid'=>$branchid);
		
		 	$message=$this->load->model('vehicleTransactionModel')?$this->vehicleTransactionModel->addVehicleTransaction($vehicleinsertdata):'Error Adding Challan';
		 $challanid= $this->load->model('vehicleTransactionModel')?$this->vehicleTransactionModel->getLastChallanId($vehicleid):'Error Getting Challan';
		 $locationupdatedata=array('location'=>$transferlocation,'locationid'=>$transferlocationid,'challanid'=>$challanid);
		
		
        $message.= $this->load->model('vehicleModel')?$this->vehicleModel->editvehicle($locationupdatedata,$vehicleid):'Error Adding Challan';
         $chasis= $this->load->model('vehicleModel')?$this->vehicleModel->getBranchTransferChasisList():'Chasis Loading Failed';
         
         
       $message=createMessage($message,"Info");
          $data = ['title' => 'Branch Transfer','chasisList'=>$chasis,'branchList'=>$branch];
		$this->template->load('home_template', 'branchTransfer_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
		}else{
            
            $message = '';
            $this->template->load('home_template', 'branchTransfer_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);  
			}
        } else {
            //$this->home->logout;
           redirect('index.php/logout');
        } 

    }    //End of Branch Transfer of Vehicle
    
    
    
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
    //Add Delivery Challan
 public function addDeliveryChallan(){
              
        $this->session->set_userdata("pageid", "addDeliveryChallan");
        
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
		
        if (($role === 'member') && $isLoggedin) {
                      
         //$chasis= $this->load->model('vehicleModel')?$this->vehicleModel->getBranchTransferChasisList():'Chasis Loading Failed';
        
		 $chasis= $this->load->model('vehicleModel')?$this->vehicleModel->getUndeliveredChasisList():'Chasis Loading Failed';
		 $branch= $this->load->model('branchModel')?$this->branchModel->getAllBranch():'Chasis Loading Failed';
		
		 $data = ['title' => 'Generate Delivery Challan','chasisList'=>$chasis,'branchList'=>$branch];
          
            
		if($this->input->post('addDeliveryChallanBtn')){
		$vehicleid=$this->input->post('chasisSelect');
		$branchid=$this->input->post('branchSelect');
		$customerid=$this->input->post('customerSelect');
		$transferdate=$this->input->post('transferdate');
		$purposeoftransfer=$this->input->post('purposeoftransfer');
		$transferlocation="Customer";
		$tools=$this->input->post('tools');
		$mirror=$this->input->post('mirror');
		$servicebook=$this->input->post('servicebook');
		$transferlocationid=$customerid;
	/*	if($transferlocation==="Branch"){
		$transferlocationid=$branchid;
		}elseif($transferlocation==="Customer"){
			$transferlocationid=$customerid;
		}
	*/	 
		 $vehicleinsertdata=array('vehicleid'=>$vehicleid,'vehicletransferdate'=>$transferdate,'vehicletransferpurpose'=>$purposeoftransfer,'tools'=>$tools,'mirror'=>$mirror,'servicebook'=>$servicebook,'location'=>$transferlocation,'locationid'=>$customerid);
		
		 	$message=$this->load->model('vehicleTransactionModel')?$this->vehicleTransactionModel->addVehicleTransaction($vehicleinsertdata):'Error Adding Challan';
		 $challanid= $this->load->model('vehicleTransactionModel')?$this->vehicleTransactionModel->getLastChallanId($vehicleid):'Error Getting Challan';
		 $locationupdatedata=array('location'=>$transferlocation,'customerid'=>$transferlocationid,'challanid'=>$challanid);
		
		
        $message.= $this->load->model('vehicleModel')?$this->vehicleModel->editvehicle($locationupdatedata,$vehicleid):'Error Adding Challan';
         $chasis= $this->load->model('vehicleModel')?$this->vehicleModel->getBranchTransferChasisList():'Chasis Loading Failed';
         
         
        
	//  /*	 if($transferlocation==="Customer"){
		 $financecustomerupdate=$this->load->model('financeModel')?$this->financeModel->updateCustomerId($customerid,$vehicleid):"Error updating finance customer id";
	//	*/	 }
	$message=createMessage($message,"Info");
          $data = ['title' => 'Generate Delivery Challan','chasisList'=>$chasis,'branchList'=>$branch];
		$this->template->load('home_template', 'addDeliveryChallan_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
		}else{
           
            $message = '';
            $this->template->load('home_template', 'addDeliveryChallan_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);  
			}
        } else {
            //$this->home->logout;
           redirect('index.php/logout');
        } 

    }//End of adding Delivery Challan
    
 
 
 
 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 //////////////////////////////////////////////////////////////     //Show Delivery Challan////////////////////////////////////////////////////////////////////////
 
 
    public function deliveryChallanView() {
        $this->session->set_userdata("pageid", "deliveryChallanView");
      
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            
             $chasislist= $this->load->model('vehicleModel')?$this->vehicleModel->getDeliveredChasisList():'Chasis Loading Failed';
			 $companyid="1001";
			 $companydetails=$this->load->model('companyModel')?$this->companyModel->getCompanyDetail($companyid):FALSE;
            
            
            if($this->input->post('showDeliveryChallanBtn')){
                $chasisid=$this->input->post('chasisno');
               $hypothecation="";$companyid="";
                $chasisno=$this->input->post('chasisno');
                
                
               
                if($this->load->model('vehicleModel')){
                    $chasisdetail=array();
                   $chasisdetail= $this->vehicleModel->getChasisDetail($chasisid);
                    $chasisno=$chasisdetail[0]['chasisno'];
                    $y=substr($chasisno,9,1);
                switch($y){
                    case 'W':$productionyear="2018";
                    case 'X':$productionyear="2019";
                    case 'Y':$productionyear="2020";
                    case 'Z':$productionyear="2021";
                    case '1':$productionyear="2022";
                    case '2':$productionyear="2023";
					case '3':$productionyear="2024";
                    default:$productionyear="2024";
                }
                   
                    $engineno=$chasisdetail[0]['engineno'];
                    $modalid=$chasisdetail[0]['modalid'];
                    $colorid=$chasisdetail[0]['colorid'];
                    $keyno=$chasisdetail[0]['keyno'];
                    $gearboxno=$chasisdetail[0]['gearboxno'];
                    $tyrefrontleft=$chasisdetail[0]['fronttyreleft'];
                    $tyrefrontright=$chasisdetail[0]['fronttyreright'];
                   $tyrerearleft= $chasisdetail[0]['reartyreleft'];
                    $tyrerearright=$chasisdetail[0]['reartyreright'];
                    $challanid=$chasisdetail[0]['challanid'];
                    $batteryno=$chasisdetail[0]['batteryno'];
                    $location=$chasisdetail[0]['location'];
                    $ecu=$chasisdetail[0]['ecu'];
                    $locationid=$chasisdetail[0]['locationid'];
                    $customerid=$chasisdetail[0]['customerid'];
                    
                     if($location==='Branch'){
                         $customername="Samrat Automobiles";
                          $father="NA";
                         $customeraddressline1=$this->load->model('branchModel')?$this->branchModel->getBranchLocation($locationid):"NA";
                        if($customeraddressline1==='Jhanjharpur'){
                           $customeraddressline1="GST No.:10AJPPK9206N1ZX"; 
                           $customeraddressline2="Jhanjharpur";
                           $pin="847403";$district="Madhubani";
                        }else{
                            $customeraddressline2="Darbhanga";
                            $pin="846005";$district="Darbhanga";
                        }
                         
                       
                        $customercontact=$this->load->model('branchModel')?$this->branchModel->getBranchContact($locationid):"NA";
                         
                    
                }elseif($location==='Customer'){
                    if($this->load->model('customerModel')){
                        
                    $customername=$this->customerModel->getCustomerName($customerid);
                    $father=$this->customerModel->getCustomerFather($customerid)?$this->customerModel->getCustomerFather($customerid):"NA";
                    $customeraddressline1=$this->customerModel->getCustomerAddressLine1($customerid);
                    $customeraddressline2=$this->customerModel->getCustomerAddressLine2($customerid);
                    $customercontact=$this->customerModel->getCustomerContact($customerid);
                    $district=$this->customerModel->getCustomerDistrict($customerid);
                    $pin=$this->customerModel->getCustomerPin($customerid);
                     if($this->load->model('invoiceModel')){
                      
                       $hypothecation=$this->invoiceModel->getHypothecation($chasisid);
                       $companyid=$this->invoiceModel->getCompanyId($chasisid);
                   }
                        
                    }
                    
                }else{
                    $customername="NA";
                    
                    $customeraddressline1="NA";
                    $customeraddressline2="NA";
                    $customercontact="NA";
                }
                    
                    $challanno=$challanid;
                    $colorname=$this->load->model('colorModel')?$this->colorModel->getColorName($colorid):"NA";
                    $modalname=$this->load->model('modalModel')?$this->modalModel->getModalName($modalid):"NA";
                    if($this->load->model('vehicleTransactionModel')){
                        $challandetail= $this->vehicleTransactionModel->getChallanDetail($challanid);
                        $date=date("d-m-Y",strtotime($challandetail[0]['vehicletransferdate']));
                        $purposeoftransfer=$challandetail[0]['vehicletransferpurpose'];
                        $bookno=$challandetail[0]['servicebook'];
                        $mirror=$challandetail[0]['mirror'];
                        $tools=$challandetail[0]['tools'];
                    }else{
                        $date="NA";
                        $purposeoftransfer="NA";
                        $bookno="NA";
                        $mirror="NA";
                        $tools="NA";
                    }
                    
                    
                }else{
                    $challanno="NA";
                     $chasisno="xxxxxxxxxxxxxxxxxx";
                    $engineno="xxxxxxxxxx";
$keyno="NA";
$gearboxno="NA";
$tyrefrontleft="NA";
$tyrefrontright="NA";
$tyrerearleft="NA";
$tyrerearright="NA";
 $batteryno="NA";                   
   $date="NA";$ecu="NA";
                        $purposeoftransfer="NA";
                        $bookno="NA";
                        $mirror="NA";
                        $tools="NA";  
                        $modalname="NA";
                         $colorname="NA";
                    
                }




$chasislist= $this->load->model('vehicleModel')?$this->vehicleModel->getDeliveredChasisList():'Chasis Loading Failed';

                 $data = ['title' => 'Delivery Challan','companydetails'=>$companydetails,'viewChallan'=>'True','chasisno'=>$chasisno,'customername'=>$customername,'customeraddressline1'=>$customeraddressline1,
                            'customeraddressline2'=>$customeraddressline2,'customercontact'=>$customercontact,'date'=>$date,'modalname'=>$modalname,'colorname'=>$colorname,'ecu'=>$ecu,
                            'engineno'=>$engineno,'keyno'=>$keyno,'gearboxno'=>$gearboxno,'tyrefrontleft'=>$tyrefrontleft,'tyrefrontright'=>$tyrefrontright,'tyrerearleft'=>$tyrerearleft,
                           'tyrerearright'=>$tyrerearright,'purposeoftransfer'=>$purposeoftransfer,'challanno'=>$challanno,'hypothecation'=>$hypothecation,'productionyear'=>$productionyear,'tools'=>$tools,'mirror'=>$mirror,'bookno'=>$bookno,'chasislist'=>$chasislist,'batteryno'=>$batteryno,'district'=>$district,'pin'=>$pin,'companyid'=>$companyid,'father'=>$father ];
                  $message = '';
                 $this->template->load('home_template', 'showDeliveryChallan_View', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            }else{
                 $data = ['title' => 'Delivery Challan','viewChallan'=>'False','chasislist'=>$chasislist,'companydetails'=>$companydetails,];
                  $message = '';
            
            $this->template->load('home_template', 'showDeliveryChallan_View', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            //$this->load->view('student_view');
            }
        } else {
            //$this->home->logout;
           redirect('index.php/logout');
        }
    }//End of show Delivery Challan
     
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
   
    
   //VIEW MONEY RECEIPT
    public function moneyReceiptView() {
        $this->session->set_userdata("pageid", "moneyReceiptView");
       // $role = $this->session->userdata('role');
        //$role =$_SESSION['role'];
        //$isLoggedin = $this->session->userdata('isLoggedin');
       // $isLoggedin =$_SESSION['isLoggedin'];
       // echo $role.'----'. $isLoggedin ;
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
		
        if (($role === 'member') && $isLoggedin) {
            
            if($this->input->post('searchTransactionBtn')){
                $transactionid=$this->input->post('transactionid');
             
            $message = '';
            $data=$this->loadMoneyReceipt($transactionid);
			
             $this->template->load('home_template', 'moneyReceipt_View', 'member_menu', 'dashboard_secondary_menu', '', $data);
                
            }else{
				$companyid="1001";
       $companydetails=$this->load->model('companyModel')?$this->companyModel->getCompanyDetail($companyid):FALSE;
                $data = ['title' => 'View Money Receipt','viewreceipt'=>'False','companydetails'=>$companydetails];
            $message = '';
             $this->template->load('home_template', 'moneyReceipt_View', 'member_menu', 'dashboard_secondary_menu', '', $data);
                
            }
           
           
        } else {
           
            redirect('index.php/logout');
        }
    }
  
     
    public function loadMoneyReceipt($transactionid){
        $data=array();
		
        $companyid="1001";
       $companydetails=$this->load->model('companyModel')?$this->companyModel->getCompanyDetail($companyid):FALSE;
	   //$data=['companydetails'=>$companydetails];
        if($this->load->model('transactionModel')){
           
        $remarkid=$this->transactionModel->getRemarkId($transactionid);
         $remark=$this->load->model('remarkModel')?$this->remarkModel->getRemark($remarkid):"Not Found";
        $customerid=$this->transactionModel->getCustomerId($transactionid);
         $amount=$this->transactionModel->getTransactionAmount($transactionid);
        $amountinwords=$this->transactionModel->getTransactionAmountInWords($transactionid);
        $date=$this->transactionModel->getTransactionDate($transactionid);
        $receiptno=$transactionid;
       if( $this->load->model('customerModel')){
        $customerdetails=$this->load->model('customerModel')?json_decode($this->customerModel->getCustomerDetails($customerid,'customerid'),true):FALSE;   
        $customername=$this->customerModel->getCustomerName($customerid);
        $customeraddressline1=$this->customerModel->getCustomerAddressLine1($customerid);
        $customeraddressline2=$this->customerModel->getCustomerAddressLine2($customerid);
        $customercontact=$this->customerModel->getCustomerContact($customerid);
       }else{
           $customername="No Record Found";
           $customeraddressline1="No Record Found";
           $customeraddressline2="No Record Found";
            $customercontact="0000000000";
       }
        $data = ['load'=>'True','customername'=>$customername,
            'customeraddressline1'=>$customeraddressline1,'customeraddressline2'=> $customeraddressline2,'customercontact'=>$customercontact,'amount'=>$amount,'amountinwords'=>$amountinwords,'remark'=>$remark,'date'=>$date,'receiptno'=>$receiptno,'viewreceipt'=>'True','title' => 'View Money Receipt','companydetails'=>$companydetails,'customerdetails'=>$customerdetails];
        }else{
            $data=['load'=>'False','viewreceipt'=>'True','title' => 'View Money Receipt','companydetails'=>$companydetails];
            
        }
       //$this->load->view('moneyReceipt',$data); 
       //echo '<pre>';print_r($data);
		if($this->input->get('transactionid')){
			//echo '<pre>';print_r($data);
       $this->load->view('viewMoneyReceipt',$data); 
		}else{
       return $data;
		    
		}
      // return $data;
    }
  
    
    
    
    //viewCustomerSummaryByBranchId
     public function customerAccountSummaryView() {
         
         
         
         
         
        $this->session->set_userdata("pageid", "customerAccountSummaryView");
        // $role = $this->session->userdata('role');
        //$role =$_SESSION['role'];
        //$isLoggedin = $this->session->userdata('isLoggedin');
       // $isLoggedin =$_SESSION['isLoggedin'];
       // echo $role.'----'. $isLoggedin ;
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            
             $branch=array();
        $branch= $this->load->model('branchModel')?$this->branchModel->getAllBranch():'Branch Loading Failed';
        
            
            $data = ['title' => 'Customer Summary','branchList'=>$branch];
            $message = '';
            if($this->input->get('branchid')){
                $branchid=$this->input->get('branchid');
                //echo $branchid;
                $customerData= $this->load->model('branchModel')?$this->branchModel->viewCustomerSummaryByBranchId($branchid):"Data Loading Failed";
                 //$data=['customerData'=>$customerData];
                // $this->template->load('home_template', 'customerAccountSummaryView', 'member_menu', 'dashboard_secondary_menu', $message, $data);
                $branchDuesList=array();
                $branchDuesList=['branchDuesList'=>$customerData];
                $this->load->view('summaryContentView',$branchDuesList);
                //echo $customerData;
             //return $customerData;
         }else{
             //$branchid=100101;
           // $customerData= $this->load->model('branchModel')?$this->branchModel->viewCustomerSummaryByBranchId($branchid):"Data Loading Failed";
                 $data=['title' => 'Customer Summary','branchList'=>$branch];
            
            $this->template->load('home_template', 'customerAccountSummaryView', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            //$this->load->view('student_view');
         }
        } else {
          redirect('index.php/logout');
        }
    }
    
   /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
   ///////////////////////////////////////////////////////////////////////  //Show Form 21/////////////////////////////////////////////////////////
    public function formTwentyOneView() {
        $this->session->set_userdata("pageid", "formTwentyOneView");
       
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            $viewForm21='False';
            $refno="";
$father="";

$pin="";

$color="";

$date="";
$customername="";
$customeraddressline1="";
$customeraddressline2="";
$customercontact="";

$modalname="";
$colorname="Black & Yellow";
$chasisno="";
$engineno="";

$frontaxle="";
$rearaxle="";
$otheraxle="";
$tandemaxle="";

$message="";
$class="";
$maker="PIAGGIO VEHICLE PVT LTD";
$hp="";
$fuel="";
$cylinder="";
$month="JAN";
$year="2019";
$seat="";
$unladen="";
$district="";
$gross="";
$hypothecation="";
$bodytype="";
            
             $chasislist= $this->load->model('vehicleModel')?$this->vehicleModel->getDeliveredChasisList():'Chasis Loading Failed';
            
            
            if($this->input->post('showForm21Btn')){
                $chasisid=$this->input->post('chasisno');
               $chasisno=$this->input->post('chasisno');
             
               
               
               
                $viewForm21='True';
                 
                if($this->load->model('invoiceModel')){
                       
                       $date=$this->invoiceModel->getInvoiceDate($chasisid);
                        $hypothecation=$this->invoiceModel->getHypothecation($chasisid);
                        $companyid=$this->invoiceModel->getCompanyId($chasisid);//,'companyid'=>$companyid 
                        $date=date("d-m-Y",strtotime($date));
                         $p=explode("-",$date);
                        $y=$p[2];$m=$p[1];
                        
                       
                      // $refno=$m.$y.substr($chasisno,11,6);
                   }
                
                
              
                if($this->load->model('vehicleModel')){
                    $chasisdetail=array();
                   $chasisdetail= $this->vehicleModel->getChasisDetail($chasisid);
                    $chasisno=$chasisdetail[0]['chasisno'];
                    $manufactureyear=substr($chasisno,9,1);
               $manufacturemonth=substr($chasisno,10,1);
                //echo $chasisno; 
               //echo $manufactureyear+"   "+$manufacturemonth+"  "+$chasisno;
               switch($manufactureyear){
                   case 'W':$year=2018;break;
                   case 'X':$year=2019;break;
                   case 'Y':$year=2020;break;
                   case 'Z':$year=2021;break;
                   case '1':$year=2022;break;
                   case '2':$year=2023;break;
                   default:$year=2022;
               }
               switch($manufacturemonth){
                   case 'A':$month='Jan';break;
                   case 'B':$month='Feb';break;
                   case 'C':$month='March';break;
                   case 'D':$month='April';break;
                   case 'E':$month='May';break;
                   case 'F':$month='June';break;
                   case 'G':$month='July';break;
                   case 'H':$month='Aug';break;
                   case 'J':$month='Sep';break;
                   case 'K':$month='Oct';break;
                   case 'L':$month='Nov';break;
                   case 'M':$month='Dec';break;
                   default:$month='Nov';
                   
               }
                   
                    $engineno=$chasisdetail[0]['engineno'];
                    $modalid=$chasisdetail[0]['modalid'];
                    $colorid=$chasisdetail[0]['colorid'];
                   
                   
                    $challanid=$chasisdetail[0]['challanid'];
                    $batteryno=$chasisdetail[0]['batteryno'];
                    $location=$chasisdetail[0]['location'];
                    
                    $locationid=$chasisdetail[0]['customerid'];
                    
                    if($location==='Customer'){
                    if($this->load->model('customerModel')){
                    $customername=$this->customerModel->getCustomerName($locationid);
                    $customeraddressline1=$this->customerModel->getCustomerAddressLine1($locationid);
                    $customeraddressline2=$this->customerModel->getCustomerAddressLine2($locationid);
                    $father=$this->customerModel->getCustomerFather($locationid);
                    $pin=$this->customerModel->getCustomerPin($locationid);
                    $customercontact=$this->customerModel->getCustomerContact($locationid);
                    $district=$this->customerModel->getCustomerDistrict($locationid);
                        
                    }
                    
                }else{
                    $customername="NA";
                    $father="";
                    $pin="";
                    $customeraddressline1="NA";
                    $customeraddressline2="NA";
                    $customercontact="NA";
                    $district="";
                }
                    
                    $challanno=$challanid;
                    $colorname=$this->load->model('colorModel')?$this->colorModel->getColorName($colorid):"NA";
                     if($this->load->model('modalModel')){
                    $modalname=$this->modalModel->getModalName($modalid);
                    $class=$this->modalModel->getModalClass($modalid);
                    $bodytype=$this->modalModel->getModalBodyType($modalid);
                   
                     $gross=$this->modalModel->getModalGrossWeight($modalid);
                    $unladen=$this->modalModel->getModalWeight($modalid);
                    $hp=$this->modalModel->getModalHp($modalid);
                    $fuel=$this->modalModel->getModalFuel($modalid);
                    $cylinder=$this->modalModel->getModalCylinder($modalid);
                    $seat=$this->modalModel->getModalSeat($modalid);
                    }else{
                        $modalname=""; $gross="";$unladen=""; $hp="";$fuel="";
                         $class="";$cylinder="";$seat="";
                    $bodytype="";
                    }
                    
                    if($this->load->model('vehicleTransactionModel')){
                        $challandetail= $this->vehicleTransactionModel->getChallanDetail($challanid);
                       // $date=$challandetail[0]['vehicletransferdate'];
                       // $p=explode("-",$date);
                       // $y=$p[2];$m=$p[1];
                       
                      $refno=$m.$y.substr($chasisno,11,6);
                        
                    }else{
                        $date="NA";
                       
                    }
                    
                    
                }else{
                    $challanno="NA";
                     $chasisno="xxxxxxxxxxxxxxxxxx";
                    $engineno="xxxxxxxxxx";
                  
   $date="NA";
                        
                        $modalname="NA";
                         $colorname="NA";
                    
                }



$chasislist= $this->load->model('vehicleModel')?$this->vehicleModel->getDeliveredChasisList():'Chasis Loading Failed';
                 $data = ['title' => 'Form 21','viewForm21'=>$viewForm21,'chasisno'=>$chasisno,'customername'=>$customername,'customeraddressline1'=>$customeraddressline1,
                            'customeraddressline2'=>$customeraddressline2,'customercontact'=>$customercontact,'date'=>$date,'modalname'=>$modalname,
                            'engineno'=>$engineno,'pin'=>$pin,'father'=>$father,'district'=>$district,'refno'=>$refno,'class'=>$class,
                           'maker'=>$maker,'fuel'=>$fuel,'challanno'=>$challanno,'hypothecation'=>$hypothecation,'hp'=>$hp,'cylinder'=>$cylinder,'chasislist'=>$chasislist,'month'=>$month,'year'=>$year,'seat'=>$seat,'unladen'=>$unladen,'gross'=>$gross,'bodytype'=>$bodytype,'frontaxle'=>$frontaxle,'rearaxle'=>$rearaxle,'otheraxle'=>$otheraxle,'tandemaxle'=>$tandemaxle,'color'=>$colorname,'companyid'=>$companyid  ];
                 $this->template->load('home_template', 'formTwentyOne_View', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            }else{
                 $data = ['title' => 'Form 21','viewForm21'=>$viewForm21,'chasislist'=>$chasislist];
                  $message = '';
            
            $this->template->load('home_template', 'formTwentyOne_View', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            
            }
        } else {
           
           redirect('index.php/logout');
        }
    }//End of show Form 21
     
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    public function customerAccountDetailView() {
         
         
         
         
         
        $this->session->set_userdata("pageid", "customerAccountDetailView");
       // $role = $this->session->userdata('role');
        //$role =$_SESSION['role'];
        //$isLoggedin = $this->session->userdata('isLoggedin');
       // $isLoggedin =$_SESSION['isLoggedin'];
       // echo $role.'----'. $isLoggedin ;
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            
             $branch=array();
        $branch= $this->load->model('branchModel')?$this->branchModel->getAllBranch():'Branch Loading Failed';
        
            
            $data = ['title' => 'Customer Summary','branchList'=>$branch];
            $message = '';
            if($this->input->get('customerid')){
                $customerid=$this->input->get('customerid');
                //echo $customerid;
                $customerAccountData= $this->load->model('branchModel')?$this->branchModel->viewCustomerDetailByCustomerId($customerid):"Data Loading Failed";
                 //$data=['customerData'=>$customerData];
                // $this->template->load('home_template', 'customerAccountSummaryView', 'member_menu', 'dashboard_secondary_menu', $message, $data);
                echo $customerAccountData;
             //return $customerAccountData;
         }else{
             //$branchid=100101;
           // $customerData= $this->load->model('branchModel')?$this->branchModel->viewCustomerSummaryByBranchId($branchid):"Data Loading Failed";
                 $data=['title' => 'Customer Detail','branchList'=>$branch];
            
            $this->template->load('home_template', 'customerAccountDetail_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            //$this->load->view('student_view');
         }
        } else {
            //$this->home->logout;
            redirect('index.php/logout');
        }
    }
    
     
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function dayBookAdd(){
        
         $this->session->set_userdata("pageid", "dayBookAdd");
       // $role = $this->session->userdata('role');
        //$role =$_SESSION['role'];
        //$isLoggedin = $this->session->userdata('isLoggedin');
       // $isLoggedin =$_SESSION['isLoggedin'];
       // echo $role.'----'. $isLoggedin ;
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
      
        if (($role === 'member') && $isLoggedin) {
         
           if($this->input->post('addTransactionBtn')){
               
               $tdate=$this->input->post('addDate');
                $branchid=$this->input->post('branchSelect');
                 $customerid=$this->input->post('customerSelect');
                  $type=$this->input->post('transactiontype');
                  $amount=$this->input->post('amount');
                   $remarkid=$this->input->post('remarkSelect');
                    $comment=$this->input->post('comment');
                    $executerid=$this->session->userdata('uid');
                   
                    $insertdata=array('transactiontype'=>$type,'transactionamount'=>$amount,'remarkid'=>$remarkid,'comment'=>$comment,'executerid'=>$executerid,'transactiondate'=>$tdate,'customerId'=>$customerid,);
                   $message= $this->load->model('dayBookModel')?$this->dayBookModel->addTransaction($insertdata):'Error Adding Transaction';
                   $message=$this->createMessage($message,"info");
                $branch=array();
           $remark=array();
            $branch= $this->load->model('branchModel')?$this->branchModel->getAllBranch():'Branch Loading Failed';
           
         $remark= $this->load->model('remarkModel')?$this->remarkModel->getAllRemark():'Remark Loading Failed';
            $data = ['title' => 'Day Book Entry','branchList'=>$branch,'remarkList'=>$remark];
           
            $this->template->load('home_template', 'dayBookAdd_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
           
               
               
               
           }else{
           $branch=array();
           $remark=array();
            $branch= $this->load->model('branchModel')?$this->branchModel->getAllBranch():'Branch Loading Failed';
          
         $remark= $this->load->model('remarkModel')?$this->remarkModel->getAllRemark():'Remark Loading Failed';
            $data = ['title' => 'Day Book Entry','branchList'=>$branch,'remarkList'=>$remark];
            $message = '';
            $this->template->load('home_template', 'dayBookAdd_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
           
           }
        } else {
            //$this->home->logout;
            redirect('index.php/logout');
        }
        
        
       
        
        
        
    }
    
    
    /*
    
    public function customerAdd(){
        
        
        $this->session->set_userdata("pageid", "customerAdd");
        $role = $this->session->userdata('role');
        $role =$_SESSION['role'];
        $isLoggedin = $this->session->userdata('isLoggedin');
        $isLoggedin =$_SESSION['isLoggedin'];
       // echo $role.'----'. $isLoggedin ;
        if (($role === 'member') && $isLoggedin) {
            $data = ['title' => 'New Customer Entry'];
            $message = '';
            $this->template->load('home_template', 'addCustomer_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            //$this->load->view('student_view');
        } else {
            //$this->home->logout;
            redirect('index.php/home/logout');
        } 
     
    }
    
    */
    
    
     public function customerAdd(){
        
        
        $this->session->set_userdata("pageid", "customerAdd");
        // $role = $this->session->userdata('role');
        //$role =$_SESSION['role'];
        //$isLoggedin = $this->session->userdata('isLoggedin');
       // $isLoggedin =$_SESSION['isLoggedin'];
       // echo $role.'----'. $isLoggedin ;
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
		
        if (($role === 'member') && $isLoggedin) {
          $branch=array();
		$branch= $this->load->model('branchModel')?$this->branchModel->getAllBranch():'Branch Loading Failed';
		$modal=array();
                    
         $modal= $this->load->model('modalModel')?$this->modalModel->getModalList():'Modal Loading Failed';
		 $data = ['title' => 'New Customer Entry','branchList'=>$branch,'modalList'=>$modal];
     // $data = ['title' => 'New Customer Entry','branchList'=>$branch];  
            
            
		if($this->input->post('addCustomerBtn')){
		$customername=$this->input->post('customername');
		$customerfathername=$this->input->post('customerfathername');
		$customeraddressline1=$this->input->post('customeraddressline1');
		 $customeraddressline2=$this->input->post('customeraddressline2');
		 $customerdistrict=$this->input->post('customerdistrict');
		  $customerstate=$this->input->post('customerstate');
		  $customerpin=$this->input->post('customerpin');
		  $customercontact=$this->input->post('customercontact');
		  $customeremail=$this->input->post('customeremail');
		  $branchid=$this->input->post('branchSelect');
		$modalid=$this->input->post('modalSelect');
		
		 $insertdata=array('customername'=>$customername,'customeraddressline1'=>$customeraddressline1,'customeraddressline2'=>$customeraddressline2,
		 'customerfathername'=>$customerfathername,'customerdistrict'=>$customerdistrict,'customerstate'=>$customerstate,
		 'customerpin'=>$customerpin,'customercontact'=>$customercontact,'customeremail'=>$customeremail,'branchid'=>$branchid,'modalid'=>$modalid);
		                  
  
                   $message= $this->load->model('customerModel')?$this->customerModel->addCustomer($insertdata):'Error Adding Customer';
        		$message=$this->createMessage($message,"info");
		 
            //$message = '';
		$this->template->load('home_template', 'addCustomer_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
		
		}else{
            //$data = ['title' => 'New Customer Entry'];
            $message = '';
            $this->template->load('home_template', 'addCustomer_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
           
			}
        } else {
            redirect('index.php/logout');
        } 
            
        
    }
    
    
     
    public function getLastInvoiceNo(){
       //echo "abc";
        $companyid=$this->input->get('companyid');
       // echo $branchid;
       //$branchid=100108;
   //echo $branchid;
     $invoiceno="";
          // $customer=array();
          //$this->load->model('CustomerModel');
          //$customer=$this->CustomerModel->getCustomerByBranchId($branchid);
        $invoiceno= $this->load->model('invoiceModel')?$this->invoiceModel->getLastInvoiceOfCompany($companyid):"0";
            
           // return $customer;
            //$data="<option value='1'>Rai Saheb Nayak</option>";
           //echo $data;
        echo $invoiceno+1 ;
        }
    
    public function getCustomerList(){
       //echo "abc";
        $branchid=$this->input->get('branchid');
       // echo $branchid;
       //$branchid=100108;
   //echo $branchid;
     $customer="";
          // $customer=array();
          //$this->load->model('CustomerModel');
          //$customer=$this->CustomerModel->getCustomerByBranchId($branchid);
        $customer= $this->load->model('customerModel')?$this->customerModel->getCustomerByBranchId($branchid):"Not Found";
            
           // return $customer;
            //$data="<option value='1'>Rai Saheb Nayak</option>";
           //echo $data;
        echo $customer ;
        }
    
    public function branchAccountView(){
        
        
        $this->session->set_userdata("pageid", "branchAccountView");
       // $role = $this->session->userdata('role');
        //$role =$_SESSION['role'];
        //$isLoggedin = $this->session->userdata('isLoggedin');
       // $isLoggedin =$_SESSION['isLoggedin'];
       // echo $role.'----'. $isLoggedin ;
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            $data = ['title' => 'Branch Account'];
            $message = '';
            $this->template->load('home_template', 'branchAccount_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            //$this->load->view('student_view');
        } else {
            //$this->home->logout;
           redirect('index.php/logout');
        } 
        
        
        
        
        
        
        
    }
    
    
    
    //Add New Vehicle Detail
 public function addPurchase(){
              
        $this->session->set_userdata("pageid", "addPurchase");
        // $role = $this->session->userdata('role');
        //$role =$_SESSION['role'];
        //$isLoggedin = $this->session->userdata('isLoggedin');
       // $isLoggedin =$_SESSION['isLoggedin'];
       // echo $role.'----'. $isLoggedin ;
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
		
        if (($role === 'member') && $isLoggedin) {
                      
         $modal= $this->load->model('modalModel')?$this->modalModel->getModalList():'Modal Loading Failed';
		 $color= $this->load->model('colorModel')?$this->colorModel->getColorList():'Color Loading Failed';
		 $data = ['title' => 'Vehicle Entry','modalList'=>$modal,'colorList'=>$color];
          
            
		if($this->input->post('addPurchaseBtn')){
		$chasisno=$this->input->post('chasisno');
		$engineno=$this->input->post('engineno');
		$gearboxno=$this->input->post('gearboxno');
		 $keyno=$this->input->post('keyno');
		 $ecu=$this->input->post('ecunumber');
		 $fronttyreleft=$this->input->post('fronttyreleft');
		  $fronttyreright	=$this->input->post('fronttyreright	');
		  $reartyreleft=$this->input->post('reartyreleft');
		  $reartyreright=$this->input->post('reartyreright');
		  $batteryno=$this->input->post('batteryno');
		 $modalid=$this->input->post('modalSelect');
		$colorid=$this->input->post('colorSelect');
		 $insertdata=array('chasisno'=>$chasisno,'engineno'=>$engineno,'gearboxno'=>$gearboxno,
		 'keyno'=>$keyno,'fronttyreleft'=>$fronttyreleft,'fronttyreright'=>$fronttyreright	,
		 'reartyreleft'=>$reartyreleft,'reartyreright'=>$reartyreright,'batteryno'=>$batteryno,'colorid'=>$colorid,'modalid'=>$modalid,'ecu'=>$ecu);
		                  
  
        $message= $this->load->model('vehicleModel')?$this->vehicleModel->addvehicle($insertdata):'Error Adding Vehicle';
       
        
           $chasisid=$this->load->model('vehicleModel')?$this->vehicleModel->getChasisId($chasisno):"Error Getting ChasisId";
           //echo $chasisid.'     '.$chasisno;
           
            $finance=array('cibilstatus'=>'NULL','agreementstatus'=>'NULL','agreementdate'=>'0000-00-00','documents'=>'NULL','deliveryorder'=>'NULL','pddstatus'=>'NULL','payment'=>'NULL','dodate'=>'0000-00-00','pddsubmitiondate'=>'0000-00-00','paymentdate'=>'0000-00-00','chasisid'=>$chasisid,'customerid'=>0);
        if($message==="Vehicle Added Successfully"){
        $message.=$this->load->model('financeModel')?$this->financeModel->addEmptyFile($finance):'Error Adding File';
        }
         $message=$this->createMessage($message,"info");
        
        
		$this->template->load('home_template', 'addPurchase_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
		}else{
           // $data = ['title' => 'Vehicle Entry'];
            $message = '';
            $this->template->load('home_template', 'addPurchase_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);  
			}
        } else {
            //$this->home->logout;
            redirect('index.php/logout');
        } 

    }//End of adding new vehicle
    
    
    public function createMessage($message, $messageType) {
        if (!($messageType === 'success' || $messageType === 'warning' || $messageType === 'danger' || $messageType === 'info'))
            $messageType = 'info';
        $messageReady = "<p class='alert alert-" . $messageType . " alert-dismissable center-block'>"
                . " <button type='button' class='close' data-dismiss='alert' "
                . " area-hidden='true'>&times;</button>" . $message . "</p>";
        //echo $messageReady;
        return $messageReady;
    }
    
    public function studentTutorial() {
        $subject = $this->input->get("subject");
        switch ($subject) {
            case "dca":
                $this->session->set_userdata("pageid", "studentDcaTutorial");
                $content = "dca_Tutorial_View";
                break;
            case "c":
                $this->session->set_userdata("pageid", "studentCTutorial");
                $content = "c_Tutorial_View";
                break;
            case "html":
                $this->session->set_userdata("pageid", "studentHtmlTutorial");
                $content = "html_Tutorial_View";
                break;
            case "php":
                $this->session->set_userdata("pageid", "studentPhpTutorial");
                $content = "php_Tutorial_View";
                break;
            case "java":
                $this->session->set_userdata("pageid", "studentJavaTutorial");
                $content = "java_Tutorial_View";
                break;
        }
        //echo $subject."   ".$this->session->userdata("pageid");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Student') && $isLoggedin) {
            $data = ['title' => 'Dashboard'];
            $message = '';
            $this->template->load('home_template', $content, 'student_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        }
    }
    public function studentGallery() {
        $this->session->set_userdata("pageid", "studentGallery");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Student') && $isLoggedin) {
            $data = ['title' => 'Student Gallery'];
            $message = '';
            $this->template->load('home_template', 'student_gallery_view', 'student_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        }
    }
    public function studentApplyExam() {
        $this->session->set_userdata("pageid", "studentApplyExam");
    }
    public function studentStartExam() {
        $this->session->set_userdata("pageid", "studentStartExam");
    }
    public function studentExamView() {
        $this->session->set_userdata("pageid", "studentExamView");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Student') && $isLoggedin) {
            $data = ['title' => 'View Exam'];
            $message = '';
            $this->template->load('home_template', 'student_exam_view', 'student_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        }
    }
    public function studentProfileView() {
        $this->session->set_userdata("pageid", "studentProfileView");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Student') && $isLoggedin) {
            $this->load->model('User_Model');
            $uid = $this->session->userdata('uid');
            $userProfile = $this->User_Model->viewProfile($uid);
            $data = ['title' => 'User Profile', 'profile' => $userProfile];
            $message = '';
            $this->template->load('home_template', 'profile_view', 'student_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        }
    }
    public function studentResultView() {
        $this->session->set_userdata("pageid", "studentResultView");
    }
    public function studentResponseView() {
        $this->session->set_userdata("pageid", "studentResponseView");
    }
    public function studentAdmitCardView() {
        $this->session->set_userdata("pageid", "studentAdmitCard");
    }
    public function studentApplicationView() {
        $this->session->set_userdata("pageid", "studentApplicationView");
    }
}
?>