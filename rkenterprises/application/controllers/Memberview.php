<?php
class Memberview extends MY_Controller {
    public function index() {
        $this->session->set_userdata("pageid", "memberviewHome");
      
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
    
    public function formView() {
        $this->session->set_userdata("pageid", "memberFormView");
      
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            $data = ['title' => 'Forms'];
            $message = '';
            $this->template->load('home_template', 'memberForm_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            
        } else {
           
           redirect('index.php/logout');
        }
    }
    
    
    
    //download database file
    public function downloadDatabase(){
		$this->session->set_userdata("pageid", "memberviewHome");
      
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
			if (($role === 'member') && $isLoggedin) {
				// Load the DB utility class
	$this->load->dbutil();
	$date=date('dmY');
	$fileName='id14562313_apoorvadb_'.$date.'.sql';
	
	$prefs = array(
        'tables'        => array(),   // Array of tables to backup.
        'ignore'        => array(),                     // List of tables to omit from the backup
        'format'        => 'zip',                       // gzip, zip, txt
        'filename'      => $fileName,              // File name - NEEDED ONLY WITH ZIP FILES
        'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
        'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
        'newline'       => "\n"                         // Newline character used in backup file
);


	// Backup your entire database and assign it to a variable
	$backup = $this->dbutil->backup($prefs);

	// Load the file helper and write the file to your server
	$this->load->helper('file');
	write_file('/path/to/apoorvabackup.zip', $backup);

	// Load the download helper and send the file to your desktop
	$this->load->helper('download');
	force_download('apoorvabackup.zip', $backup);
		
            
        } else {
           
           redirect('index.php/logout');
        }
		
	}
    
   public function deleteCustomer(){
       $this->session->set_userdata("pageid", "deleteCustomer");
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
        if($this->input->get()){
            $customerId=$this->input->get('customerid');
            if(is_Numeric($customerId)){
                $message=$this->load->model('CustomerModel')?$this->CustomerModel->deleteCustomer($customerId):"Data loading error";
                
              echo $message."(".$customerId.")";  
            }else{
                echo "Invalid Data";
            }
            
        }else{
            echo "failed".$customerId;
        }
        }else {
           
           redirect('index.php/logout');
        }
   } 
    
    
    
    
    
    
    
    
   public function  SendMessage(){
       $this->session->set_userdata("pageid", "customerSendMessage");
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
       $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
       if (($role === 'member') && $isLoggedin) {
           if($this->input->post()){
               //$data=$this->input->get(message);
               $numbers=$this->input->post('numbers')?$this->input->post('numbers'):"";
               $message=$this->input->post('message')?$this->input->post('message'):"";
               //echo is_array($numbers);
               //$a=var_dump($numbers);
              // $b=var_dump($message);
               
              // echo $b;
               $response=sendMessageHelper($numbers,$message);
               $response=json_decode($response);
               
               echo $response->status==="success"?"Message Delivered Successfully":"Message Not Delivered";
              // echo $response;
           }
       }else {
           
           redirect('index.php/logout');
        }
       
   }
 
  public function customerSendMessage(){
         $this->session->set_userdata("pageid", "customerSendMessage");
          $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
		
        if (($role === 'member') && $isLoggedin) {
            $recipients=array();
            $recipientid=1001123;$recipientname="Naveen Kamal";$recipientcontact="7004505859";$branchname="Showroom";$branchid="1001110";$type="Customer";
            $recipients[0]=['recipientid'=>$recipientid,'recipientname'=>$recipientname,'recipientcontact'=>$recipientcontact,
            'branchname'=>$branchname,'branchid'=>$branchid,'recipienttype'=>$type];
             $recipients[1]=['recipientid'=>1001124,'recipientname'=>"Anil Kumar",'recipientcontact'=>"7004162177",
            'branchname'=>$branchname,'branchid'=>$branchid,'recipienttype'=>$type];
            
            $data = ['title' => 'Send Message','recipient'=>$recipients];
            $message = '';
            
            
            $this->template->load('home_template', 'memberSendMessage_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            
            
        }else {
           
           redirect('index.php/logout');
        }
    }
    
     //Add Invoice
 public function invoice(){
              
        $this->session->set_userdata("pageid", "invoice");
        
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
		
        if (($role === 'member') && $isLoggedin) {
                      
         $chasis= $this->load->model('vehicleModel')?$this->vehicleModel->getDeliveredChasisList():'Chasis Loading Failed';
		 
        
		// $branch= $this->load->model('branchModel')?$this->branchModel->getAllBranch():'Chasis Loading Failed';
		 $financerList=$this->load->model('hypothecationModel')?$this->hypothecationModel->getAllFinancer():"NA";
		 $currentinvoiceno=$this->load->model('InvoiceModel')?$this->InvoiceModel->getLastInvoiceNo():'000';
		 $salesmanList=$this->load->model('salesmanModel')?$this->salesmanModel->getAllSalesman():'Chasis Loading Failed';
		 $taxtype="active";
		 $taxList=$this->load->model('taxModel')?$this->taxModel->getAllTax($taxtype):'Tax Loading Failed';
		 
		 
	//$currentinvoiceno=397;
		 $data = ['title' => 'Generate Invoice','chasisList'=>$chasis,'financerList'=>$financerList,'taxList'=>$taxList,'salesmanList'=>$salesmanList,'currentinvoiceno'=>$currentinvoiceno+1];
          
            
		if($this->input->post('addInvoiceBtn')){
		$vehicleid=$this->input->post('chasisSelect')?$this->input->post('chasisSelect'):"";
	
		//$customerid=$this->input->post('customerSelect');
		$invoicedate=$this->input->post('invoicedate')?$this->input->post('invoicedate'):"";

		$invoiceno=$this->input->post('invoiceno')?$this->input->post('invoiceno'):"";
		$hypothecation=$this->input->post('financer')?$this->input->post('financer'):"";
		$basicprice=$this->input->post('saleprice')?$this->input->post('saleprice'):"";
		$companyid=$this->input->post('companySelect')?$this->input->post('companySelect'):"";
		$salesmanid=$this->input->post('salesman')?$this->input->post('salesman'):"";
		$orp=$this->input->post('orp')?$this->input->post('orp'):"";
		$processing=$this->input->post('processing')?$this->input->post('processing'):"";
		$loan=$this->input->post('loan')?$this->input->post('loan'):"";
		$taxid=$this->input->post('taxid')?$this->input->post('taxid'):"";
		if($vehicleid==="" || $invoicedate==="" || $invoiceno==="" || $hypothecation==="" || $basicprice==="" || $companyid==="" || $salesmanid==="" || $taxid===""){
		    
		}else{
		    $customerid=$this->load->model('vehicleModel')?$this->vehicleModel->getChasisDetail($vehicleid)[0]['customerid']:'';
		    $invoiceinsertdata=array('vehicleid'=>$vehicleid,'companyid'=>$companyid,'invoicedate'=>$invoicedate,'invoiceno'=>$invoiceno,'customerid'=>$customerid,'hypothecation'=>$hypothecation,'basicprice'=>$basicprice,'salesmanid'=>$salesmanid,'taxid'=>$taxid);
		    
		    $message=$this->load->model('InvoiceModel')?$this->InvoiceModel->addInvoice($invoiceinsertdata):'';
		    if($message!==""){
		        $message="|Invoice :- Saved ";
		 $invoiceid= $this->load->model('InvoiceModel')?$this->InvoiceModel->getInvoiceId($vehicleid):'';
		 $invoiceupdatedata=$invoiceid?array('invoiceid'=>$invoiceid):"";
		 $message.="|Invoice Id :- ";
		 $message.= $this->load->model('vehicleModel')?$this->vehicleModel->editVehicle($invoiceupdatedata,$vehicleid):'Error Adding Invoice ID.';
		 $executerid=$this->session->userdata('uid')?$this->session->userdata('uid'):"";
		 if($orp!==""){
		     //add orp to transaction
		     $insertdata=array('transactiontype'=>"debit",'transactionamount'=>$orp,'remarkid'=>15,'comment'=>"ORP",'executerid'=>$executerid,'transactiondate'=>$invoicedate,'customerId'=>$customerid,);
                    //echo var_dump($insertdata);
                    $message.="| ORP :- ";
                    $message.=$this->load->model('dayBookModel')?$this->dayBookModel->addTransaction($insertdata):"ORP Add Failed";
		     
		 }
		 if($processing!==""){
		     //add processing to transaction
		     $insertdata=array('transactiontype'=>"debit",'transactionamount'=>$processing,'remarkid'=>16,'comment'=>"Finance Charge",'executerid'=>$executerid,'transactiondate'=>$invoicedate,'customerId'=>$customerid,);
                    //echo var_dump($insertdata);
                    $message.="| Processing :- ";
                    $message.=$this->load->model('dayBookModel')?$this->dayBookModel->addTransaction($insertdata):"Processing Add Failed";
		     
		 }
		 if($loan!==""){
		     //add loan to transaction
		      $insertdata=array('transactiontype'=>"credit",'transactionamount'=>$loan,'remarkid'=>14,'comment'=>"Loan",'executerid'=>$executerid,'transactiondate'=>$invoicedate,'customerId'=>$customerid,);
                    //echo var_dump($insertdata);
                    $message.="| Loan :- ";
                    $message.=$this->load->model('dayBookModel')?$this->dayBookModel->addTransaction($insertdata):"Loan Add Failed";
		    
		     
		 }
		 
		 
		    }
		
        $currentinvoiceno=$this->load->model('InvoiceModel')?$this->InvoiceModel->getLastInvoiceNo():'000';
        
		$message=createMessage($message,"Info");
		    $data = ['title' => 'Generate Invoice','chasisList'=>$chasis,'salesmanList'=>$salesmanList,'financerList'=>$financerList,'currentinvoiceno'=>$currentinvoiceno+1];
		$this->template->load('home_template', 'addInvoice_view1', 'member_menu', 'dashboard_secondary_menu', $message, $data);
		}
	    
		 
		 
		
		 	
        
         
         
       
           
		}else{
            //$data = ['title' => 'Vehicle Entry'];
            
            $message = '';
            $this->template->load('home_template', 'addInvoice_view1', 'member_menu', 'dashboard_secondary_menu', $message, $data);  
			}
        } else {
            //$this->home->logout;
           redirect('index.php/logout');
        } 

    }//End of adding Invoice

    
    
    
    
    //*****************************************************************************************************
//*********************************New Vehicle Add to Database***********************************
//*****************************************************************************************************
public function addNewVehicle(){
	
	
	$role = $this->session->userdata('role')?$this->session->userdata('role'):"";
    $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
	 if (($role === 'member') && $isLoggedin) {
		 
		 if($this->input->post()){
			  // echo "posted......SUCCE";
		      // echo var_dump($this->input->post());
		      
		      $modalid=$this->input->post('modalSelect')?$this->input->post('modalSelect'):"";
			  $colorid=$this->input->post('colorSelect')?$this->input->post('colorSelect'):"";
              $chasisno=$this->input->post('chasisno')?$this->input->post('chasisno'):"";
		      $engineno=$this->input->post('engineno')?$this->input->post('engineno'):"";
			  $keyno=$this->input->post('keyno')?$this->input->post('keyno'):"";
			  $fronttyreleft=$this->input->post('fronttyreleft')?$this->input->post('fronttyreleft'):"";
		      $gearboxno=$this->input->post('gearboxno')?$this->input->post('gearboxno'):"";
		            	      
		      $fronttyreright	=$this->input->post('fronttyreright')?$this->input->post('fronttyreright'):"";
		      $reartyreleft=$this->input->post('reartyreleft')?$this->input->post('reartyreleft'):"";
		      $reartyreright=$this->input->post('reartyreright')?$this->input->post('reartyreright'):"";
		      $batteryno=$this->input->post('batteryno')?$this->input->post('batteryno'):"";
		      
		      
		      $ecu=$this->input->post('ecunumber')?$this->input->post('ecunumber'):"";
			  if($chasisno==="" || $engineno==="" || $gearboxno==="" || $keyno==="" || $fronttyreleft==="" || $fronttyreright==="" || $reartyreleft==="" || $reartyreright==="" || $batteryno==="" || $colorid==="" || $modalid==="select" || $ecu==="" || $modalid==="" || $colorid==="select" ){
                   
                    echo "Empty Field or Invalid Data! Try again ";
               }else{
				   $insertdata=array();
                      $insertdata=array('chasisno'=>$chasisno,'engineno'=>$engineno,'gearboxno'=>$gearboxno,
					              'keyno'=>$keyno,'fronttyreleft'=>$fronttyreleft,'fronttyreright'=>$fronttyreright,
								  'reartyreleft'=>$reartyreleft,'reartyreright'=>$reartyreright,'batteryno'=>$batteryno,'colorid'=>$colorid,'modalid'=>$modalid,'ecu'=>$ecu);
                    //echo var_dump($insertdata);
					$message= $this->load->model('vehicleModel')?$this->vehicleModel->addvehicle($insertdata):'Failed';
                     //echo "posted......SUCCE";
					 echo $message;
                   
                    //echo "(Chassis Id :-".$chasisid.")";
               }
			  
		 
		 } 
	 }else{
		 redirect('index.php/logout');
	 }
}
 

//***************************************************************************************************
//**************************************Update Vehicle Details***************************************
//***************************************************************************************************

public function updateVehicleDetail(){
    
    // $this->session->set_userdata("pageid", "updateCustomerDetail");
      
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
       $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
       if (($role === 'member') && $isLoggedin) {
           if($this->input->post()){
               $vehicleid=$this->input->get('vehicleid');
              // $customername=$this->input->post('customername');
              //echo $vehicleid;
               $data=($this->input->post());
              //echo var_dump($data);
              // $editCustomer="Naveen";
               $updatedata=array('modalid'=>$data["modalSelect"],'chasisno'=>$data["chasisno"],'engineno'=>$data["engineno"],'gearboxno'=>$data["gearboxno"],'keyno'=>$data["keyno"],'ecu'=>$data["ecunumber"],
                'fronttyreleft'=>$data["fronttyreleft"],'fronttyreright'=>$data["fronttyreright"],'reartyreleft'=>$data["reartyreleft"],'reartyreright'=>$data["reartyreright"],
               'batteryno'=>$data["batteryno"],'colorid'=>$data["colorSelect"]);
               $editVehicle=$this->load->model('VehicleModel')?$this->VehicleModel->editVehicle($updatedata,$vehicleid):"Failed";
              // echo "id=".$customerid." ".($data['customername'])."\\\\\\\\".json_decode(file_get_contents('php://input'));
          // echo "Success/Fail"."  ".$customerid."   ".$customername;
          echo $editVehicle;
           }
           
       }else{
           redirect('index.php/logout');
       }
    
    
}//End of Update Vehicle

//*************************************************************************************************
//**********************************Display Vehicle Detail Table***********************************
//*************************************************************************************************

public function getVehicleDetailsToDisplay(){
    $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            $searchData='MBX0003BFXK931957';
            $vehicledata=array();
             if($this->input->post()){ 
               
               if(!empty($this->input->post('searchText'))){
                     $searchData= $this->input->post('searchText');
                    // echo $searchData;
                  }
               
             if($this->input->post('criteriaSearchVehicle')==='bychassisno'){ 
                // $searchData="MBX0004KFXH909821";
                 $criteria="chasisno";
                 
                 $vehicledetail=$this->load->model('VehicleModel')?$this->VehicleModel->searchVehicle($searchData,$criteria):"Data loading error";
                 $vehicledata= json_decode($vehicledetail,true);
                  $data = ['vehicledata'=>$vehicledata];
                 //echo var_dump($data);
                  //$data=['vehicleid'=>$vehicleid,'chassisno'=>$chassisno,'invoicedetail'=>$invoicedetail];
                    $display= $this->load->view('memberSearchVehicleTable_view',$data,TRUE) ;
                    $this->output->set_output($display);
           // $message = '';
            //echo $searchData;
            
          //$this->load->view('memberSearchVehicleTable_view', $data);
                  
                 
             }else if($this->input->post('criteriaSearchVehicle')==='byengineno'){
                 $criteria="engineno";
                  $vehicledetail=$this->load->model('VehicleModel')?$this->VehicleModel->searchVehicle($searchData,$criteria):"Data loading error";
                 $vehicledata= json_decode($vehicledetail,true);
                  $data = ['vehicledata'=>$vehicledata];
            $message = '';
                  $display= $this->load->view('memberSearchVehicleTable_view',$data,TRUE) ;
                    $this->output->set_output($display);
             }
               
               // $this->template->load('home_template', 'memberSearchCustomer_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
               
           }
            
        }else{
           redirect('index.php/logout');
       }
    
}//End of display vehicle table
    
    
 ///////////////////////////////////////////////////////Search Vehicle///////////////////////////////////////////////   
 public function vehicleSearchToReset(){
     $this->session->set_userdata("pageid", "vehicleSearchToReset");
      
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            $searchData='MBX0003BFXK931957';
            $vehicledata=array();
            //$branch= $this->load->model('branchModel')?$this->branchModel->getAllBranch():'Branch Loading Failed';
           // $modal= $this->load->model('modalModel')?$this->modalModel->getModalList():'Modal Loading Failed';
           // $remark= $this->load->model('remarkModel')?$this->remarkModel->getAllRemark():'Remark Loading Failed';
          // $data = ['title' => 'Search Customer','customerdata'=>NULL];
           $message = '';
           $modal= $this->load->model('modalModel')?$this->modalModel->getModalList():'Modal Loading Failed';
		   //echo	var_dump($modal);
		 $color= $this->load->model('colorModel')?$this->colorModel->getColorList():'Color Loading Failed';
 $data = ['title' => 'Search Vehicle','vehicledata'=>$vehicledata,'colorList'=>$color,'modalList'=>$modal];
            $message = '';
            $this->template->load('home_template', 'memberSearchVehicle_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
               
       //
       /* 
           if($this->input->post('searchForVehicleDataBtn')){ 
               
               if(!empty($this->input->post('searchText'))){
                     $searchData= $this->input->post('searchText');
                     echo $searchData;
                  }
               
             if($this->input->post('criteriaSearchVehicle')==='bychassisno'){ 
                 $searchData="MBX0004KFXH909821";
                 $criteria="chasisno";
                 $vehicledetail=$this->load->model('VehicleModel')?$this->VehicleModel->searchVehicle($searchData,$criteria):"Data loading error";
                 $vehicledata= json_decode($vehicledetail,true);
                  $data = ['vehicledata'=>$vehicledata];
            $message = '';
            echo $searchData;
            
           // $this->load->view('memberSearchVehicle_view', $message, $data);
                  
                 
             }else if($this->input->post('criteriaSearchVehicle')==='byengineno'){
                 $criteria="engineno";
                  $vehicledetail=$this->load->model('VehicleModel')?$this->VehicleModel->searchVehicle($searchData,$criteria):"Data loading error";
                 $vehicledata= json_decode($vehicledetail,true);
                  $data = ['vehicledata'=>$vehicledata];
            $message = '';
                 $this->load->view( 'memberSearchVehicle_view', $message, $data);
             }
               
               // $this->template->load('home_template', 'memberSearchCustomer_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
               
           }else{
                $data = ['title' => 'Search Vehicle','vehicledata'=>$vehicledata,'colorList'=>$color,'modalList'=>$modal];
            $message = '';
            $this->template->load('home_template', 'memberSearchVehicle_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
               
           }
           
          //
          */
           
           // $customerdetail=$this->load->model('CustomerModel')?$this->CustomerModel->searchCustomer($searchData):"Data loading error";
           // $customerdata= json_decode($customerdetail,true);
             //var_dump($customerdata);
           // foreach($customerdata as $data){
               // var_dump($data);
           // }
           
            
        } else {
           
           redirect('index.php/logout');
        }
 
     
 }/////////End of Search Vehicle////////////////////////////////////////////////      
    
//*****************************************************************************************************
//*********************************New Customer Add to Database***********************************
//*****************************************************************************************************
 public function    addNewCustomer(){
    
      //echo "posted......";exit();
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
       $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
       if (($role === 'member') && $isLoggedin) {
           if($this->input->post()){
              // echo "posted";
              // $insertdata=array();
              // $data=($this->input->post());
              	$customername=$this->input->post('customername')?$this->input->post('customername'):"";
		$customerfathername=$this->input->post('customerfathername')?$this->input->post('customerfathername'):"";
		$customeraddressline1=$this->input->post('customeraddressline1')?$this->input->post('customeraddressline1'):"";
		 $customeraddressline2=$this->input->post('customeraddressline2')?$this->input->post('customeraddressline2'):"";
		 $customerdistrict=$this->input->post('customerdistrict')?$this->input->post('customerdistrict'):"";
		  $customerstate=$this->input->post('customerstate')?$this->input->post('customerstate'):"";
		  $customerpin=$this->input->post('customerpin')?$this->input->post('customerpin'):"";
		  $customercontact=$this->input->post('customercontact')?$this->input->post('customercontact'):"";
		  $customeremail=$this->input->post('customeremail')?$this->input->post('customeremail'):"";
		  $branchid=$this->input->post('branchSelect')?$this->input->post('branchSelect'):"";
		$modalid=$this->input->post('modalSelect')?$this->input->post('modalSelect'):"";
		
               
               if($customername==="" || $customeraddressline1==="" || $customeraddressline2==="" || $customerfathername==="" || $customerdistrict==="" || $customerstate==="" || $customerpin==="" || $customercontact==="" || $customeremail==="" || $branchid==="" || $modalid===""){
                   
                   echo "Invalid Data! Try again ";
               }else{
                     $insertdata=array('customername'=>$customername,'customeraddressline1'=>$customeraddressline1,'customeraddressline2'=>$customeraddressline2,
		 'customerfathername'=>$customerfathername,'customerdistrict'=>$customerdistrict,'customerstate'=>$customerstate,
		 'customerpin'=>$customerpin,'customercontact'=>$customercontact,'customeremail'=>$customeremail,'branchid'=>$branchid,'modalid'=>$modalid);
                    echo var_dump($insertdata);
                     $message= $this->load->model('customerModel')?$this->customerModel->addCustomer($insertdata):'Failed';
                   
                     echo $message;
               }
            }
           
       }else{
           redirect('index.php/logout');
       }
    
}//End of Customer Add  
    
//*****************************************************************************************************addNewCustomer
//*********************************Daily Transaction Add to Database***********************************
//*****************************************************************************************************

public function    updateDayBookTransaction(){
    // $this->session->set_userdata("pageid", "updateDayBookTransaction");
      //echo $this->session->userdata('uid');
      //echo "posted......";
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
       $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
       if (($role === 'member') && $isLoggedin) {
           if($this->input->post()){
              // echo "posted";
               //$customername=$this->input->post('customername');
              // $data=($this->input->post());
               $type=$this->input->post('transactiontype')?$this->input->post('transactiontype'):"";
               $amount=$this->input->post('amount')?$this->input->post('amount'):"";
               $remarkid=$this->input->post('remarkSelect')?$this->input->post('remarkSelect'):"";
               $comment=$this->input->post('comment')?$this->input->post('comment'):"";
                $executerid=$this->session->userdata('uid')?$this->session->userdata('uid'):"";
                $tdate=$this->input->post('addDate')?$this->input->post('addDate'):"";
               $customerid=$this->input->get('customerid')?$this->input->get('customerid'):"";
               
               if($type==="" || $amount==="" || $remarkid==="" || $comment==="" || $tdate==="" || $customerid==="" || $executerid==="" ){
                   //echo var_dump($insertdata);
                   echo "Invalid Data! Try again ";
               }else{
                    $insertdata=array('transactiontype'=>$type,'transactionamount'=>$amount,'remarkid'=>$remarkid,'comment'=>$comment,'executerid'=>$executerid,'transactiondate'=>$tdate,'customerId'=>$customerid,);
                    //echo var_dump($insertdata);
                    $addTransaction=$this->load->model('dayBookModel')?$this->dayBookModel->addTransaction($insertdata):"Failed";
                     echo $addTransaction;
               }
            }
           
       }else{
           redirect('index.php/logout');
       }
    
}


public function updateCustomerDetail(){
    
     $this->session->set_userdata("pageid", "updateCustomerDetail");
      
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
       $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
       if (($role === 'member') && $isLoggedin) {
           if($this->input->post()){
               $customerid=$this->input->get('customerid');
               $customername=$this->input->post('customername');
               $data=($this->input->post());
              // $editCustomer="Naveen";
               $editCustomer=$this->load->model('CustomerModel')?$this->CustomerModel->editCustomer($customerid,$data):"Failed";
              // echo "id=".$customerid." ".($data['customername'])."\\\\\\\\".json_decode(file_get_contents('php://input'));
          // echo "Success/Fail"."  ".$customerid."   ".$customername;
          echo $editCustomer;
           }
           
       }else{
           redirect('index.php/logout');
       }
    
    
}




  //*****************************************************************************************************
//*********************************New Invoice Add to Database***********************************
//*****************************************************************************************************
 public function    addNewInvoice(){
    
      //echo "posted......";
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
       $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
       if (($role === 'member') && $isLoggedin) {
           if($this->input->post()){
              // echo "posted";
              // $insertdata=array();
              // $data=($this->input->post());
			  $message="";
             $vehicleid=$this->input->post('chasisSelect')?$this->input->post('chasisSelect'):"";
	
		
		$invoicedate=$this->input->post('invoicedate')?$this->input->post('invoicedate'):"";

		$invoiceno=$this->input->post('invoiceno')?$this->input->post('invoiceno'):"";
		$hypothecation=$this->input->post('financer')?$this->input->post('financer'):"";
		$basicprice=$this->input->post('saleprice')?$this->input->post('saleprice'):"";
		$companyid=$this->input->post('companySelect')?$this->input->post('companySelect'):"";
		$salesmanid=$this->input->post('salesman')?$this->input->post('salesman'):"";
		$orp=$this->input->post('orp')?$this->input->post('orp'):"";
		$processing=$this->input->post('processing')?$this->input->post('processing'):"";
		$loan=$this->input->post('loan')?$this->input->post('loan'):"";
		$taxid=$this->input->post('taxid')?$this->input->post('taxid'):"";
		
		
              if($vehicleid==="" || $invoicedate==="" || $invoiceno==="" || $hypothecation==="" || $basicprice==="" || $companyid==="" || $salesmanid==="" || $taxid===""){
		    
		
                   
                   echo "Empty Field or Invalid Data! Try again ";
               }else{
                     $customerid=$this->load->model('vehicleModel')?$this->vehicleModel->getChasisDetail($vehicleid)[0]['customerid']:'';
		    $invoiceinsertdata=array('vehicleid'=>$vehicleid,'companyid'=>$companyid,'invoicedate'=>$invoicedate,'invoiceno'=>$invoiceno,'customerid'=>$customerid,'hypothecation'=>$hypothecation,'basicprice'=>$basicprice,'salesmanid'=>$salesmanid,'taxid'=>$taxid);
		    //echo var_dump($insertdata);
		    $message=$this->load->model('InvoiceModel')?$this->InvoiceModel->addInvoice($invoiceinsertdata):'';
		 
			   if($message!==""){
		       // $message.="|Invoice :- Saved ";
		 $invoiceid= $this->load->model('InvoiceModel')?$this->InvoiceModel->getInvoiceId($vehicleid):'';
		 $invoiceupdatedata=$invoiceid?array('invoiceid'=>$invoiceid):"";
		 $message.="|Invoice Id :- ".$invoiceid."|";
		 $message.= $this->load->model('vehicleModel')?$this->vehicleModel->editVehicle($invoiceupdatedata,$vehicleid):'Error Adding Invoice ID.';
		 $executerid=$this->session->userdata('uid')?$this->session->userdata('uid'):"";
		 if($orp!==""){
		     //add orp to transaction
		     $insertdata=array('transactiontype'=>"debit",'transactionamount'=>$orp,'remarkid'=>15,'comment'=>"ORP",'executerid'=>$executerid,'transactiondate'=>$invoicedate,'customerId'=>$customerid,);
                    //echo var_dump($insertdata);
                    $message.="| ORP :- ";
                    $message.=$this->load->model('dayBookModel')?$this->dayBookModel->addTransaction($insertdata):"ORP Add Failed";
		     
		 }
		 if($processing!==""){
		     //add processing to transaction
		     $insertdata=array('transactiontype'=>"debit",'transactionamount'=>$processing,'remarkid'=>16,'comment'=>"Finance Charge",'executerid'=>$executerid,'transactiondate'=>$invoicedate,'customerId'=>$customerid,);
                    //echo var_dump($insertdata);
                    $message.="| Processing :- ";
                    $message.=$this->load->model('dayBookModel')?$this->dayBookModel->addTransaction($insertdata):"Processing Add Failed";
		     
		 }
		 if($loan!==""){
		     //add loan to transaction
		      $insertdata=array('transactiontype'=>"credit",'transactionamount'=>$loan,'remarkid'=>14,'comment'=>"Loan",'executerid'=>$executerid,'transactiondate'=>$invoicedate,'customerId'=>$customerid,);
                    //echo var_dump($insertdata);
                    $message.="| Loan :- ";
                    $message.=$this->load->model('dayBookModel')?$this->dayBookModel->addTransaction($insertdata):"Loan Add Failed";
		    
		     
		 }
		 
		 
		    }		   
			   
			   }	 
		 
		 
                    
                     
                   
                     echo $message;
               }
            }else{
           redirect('index.php/logout');
       }
    
}//End of Invoice Add  

//***************************************************************************************************


public function updateInvoiceDetail(){
    
     $this->session->set_userdata("pageid", "updateInvoiceDetail");
      
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
       $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
       if (($role === 'member') && $isLoggedin) {
           if($this->input->post()){
			   
			   
			   
               $invoiceid=$this->input->get('invoiceid');
               //$customername=$this->input->post('customername');
               $data=($this->input->post());
			   
			   $updatedata=array('hypothecation'=>$data["financertochange"],'invoicedate'=>$data["invoicedatetochange"],'basicprice'=>$data["salepricetochange"],'salesmanid'=>$data["salesmantochange"],'taxid'=>$data["taxidtochange"]);
              // $editCustomer="Naveen";
               $editInvoice=$this->load->model('InvoiceModel')?$this->InvoiceModel->editInvoice($invoiceid,$updatedata):"Failed";
              // echo "id=".$customerid." ".($data['customername'])."\\\\\\\\".json_decode(file_get_contents('php://input'));
          // echo "Success/Fail"."  ".$customerid."   ".$customername;
          echo $editInvoice;
           }
           
       }else{
           redirect('index.php/logout');
       }
    
    
}



//*********************************Delete Invoice From Database***********************************
//*****************************************************************************************************
 public function deleteInvoice(){
    
     $this->session->set_userdata("pageid", "deleteInvoice");
      
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
       $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
       if (($role === 'member') && $isLoggedin) {
		   
           if($this->input->get()){
			   		   
               $invoiceid=$this->input->get('invoiceid')?$this->input->get('invoiceid'):"";
			  
			   if($invoiceid!==""){			   
			   $chassisId=$this->load->model('InvoiceModel')?$this->InvoiceModel->getChassisId($invoiceid):"";
			   $deleteData=array('invoiceid'=>$invoiceid,'vehicleid'=>$chassisId);
			   $deleteInvoice=$this->load->model('InvoiceModel')?$this->InvoiceModel->deleteInvoice($deleteData):"Database Error";             
               echo $deleteInvoice;	
			   
			   }else{
			   echo "Input Empty Error.";
			   } 
              
               
           }else{
			   echo "Input Post Error";
		   }
           
       }else{
           redirect('index.php/logout');
       }
    
    
}

//***************************************************************************************************


//*****************************************************************************************************
 public function deleteLastDelivery(){
    
     $this->session->set_userdata("pageid", "deleteLastDelivery");
      
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
       $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
       if (($role === 'member') && $isLoggedin) {
		   //echo $isLoggedin."ffffffffffnnnnnnnn";
           if($this->input->get()){
			   		   
               $chassisId=$this->input->get('chassisId')?$this->input->get('chassisId'):"";
			   //echo $chassisId."ffffffffff";
			    if($chassisId!==""){
				$isInvoiceExist=$this->load->model('InvoiceModel')?$this->InvoiceModel->isChassisExist($chassisId):"Database Error opening Invoice Model";
				//echo "Invoice Status=".$isInvoiceExist;
			   if($isInvoiceExist===1){
			   echo "Invoice already generated for the requested vehicle.";
			   }elseif($isInvoiceExist===0){
			   $lastChallanId=$this->load->model('VehicleTransactionModel')?$this->VehicleTransactionModel->getLastChallanId($chassisId)
			                   :"Database Error opening Vehicle Transaction Model";
							   
				if($lastChallanId==="Database Error opening Vehicle Transaction Model"){
					echo "Database Error opening Vehicle Transaction Model";
				}elseif($lastChallanId==="0"){
					echo "Delivery Not Found.";
				}else{
					
					//echo "Last Challan Id-".$lastChallanId;
					
					$challanDelete=$this->load->model('VehicleTransactionModel')?$this->VehicleTransactionModel->deleteChallan($lastChallanId,$chassisId)
			                   :"Database Error opening Vehicle Transaction Model";	
							   if($challanDelete==="Database Error opening Vehicle Transaction Model"){
				 echo "Database Error opening Vehicle Transaction Model";
				}elseif($challanDelete===TRUE){
				echo "Delivery Deletion Success .";
				}else{
				echo "Delivery Not Deleted-Database Error.";
				}
				}			   
			   
							   
							   
			   
			   }else{
			   echo $isInvoiceExist;
			   }
			   }else{
			   echo "Input Empty Error.";
			   }
			 
               
           }else{
			   echo "Input Post Error";
		   }
           
       }else{
           redirect('index.php/logout');
       }
    
    
}//End of Delete Last Delivery Challan

//***************************************************************************************************




public function dayBookSearch(){
     $this->session->set_userdata("pageid", "dayBookSearch");
      
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            $currentdate=date('Y-m-d');
            $transactiontype="all";
            
             if($this->input->post('dailyTransactionSearchBtn')){ 
                 if($this->input->post('criteriaSelect')==='bydate'){
                 if(!empty($this->input->post('fromdate'))){
                 $fromdate=$this->input->post('fromdate');
                 $transactiontype=$this->input->post('transactiontype');
                 echo $transactiontype;
                     $display=$this->load->model('TransactionModel')?$this->TransactionModel->transactionOnDate($fromdate,$transactiontype):"Data loading error";
                 }
                 }else{
                     $display=$this->load->model('TransactionModel')?$this->TransactionModel->transactionOnDate($currentdate,$transactiontype):"Data loading error";
                 } 
             }else{
                  $display=$this->load->model('TransactionModel')?$this->TransactionModel->transactionOnDate($currentdate,$transactiontype):"Data loading error";
             }
            
            
            $message = '';
           
            $data = ['title' => 'Day Book Search','display'=>$display];
            $this->template->load('home_template', 'memberDayBookSearch_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            
        } else {
           
           redirect('index.php/logout');
        }
 }  




public function vehicleMovement(){
     $this->session->set_userdata("pageid", "vehicleMovement");
      
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            $currentdate=date('Y-m-d');
            $randomdate='2019-07-16';
            //$querydate=$randomdate;
            $fromdate='2019-07-11';
            $todate='2019-08-20';
            $display=array();
            $message = '';
           // $querydate=$currentdate;
             if($this->input->post('vehicleMovementSearchBtn')){ 
                 if($this->input->post('criteriaSelect')==='bychasis'){
                 if(!empty($this->input->post('chasisno'))){
                 $chasisno=$this->input->post('chasisno');
                 $chasisid=$this->load->model('vehicleModel')?$this->vehicleModel->getChasisId($chasisno):"Data loading error"; 
                 if($chasisid && $chasisid!=="Data loading error") {
                  $display=$this->load->model('VehicleTransactionModel')?$this->VehicleTransactionModel->vehicleMovementOfChasis($chasisid):"Data loading error"; 
                 }
                 }
                 }
                if($this->input->post('criteriaSelect')==='bydate'){ 
                 if(!empty($this->input->post('fromdate'))){
                 $fromdate=$this->input->post('fromdate');
                    $display=$this->load->model('VehicleTransactionModel')?$this->VehicleTransactionModel->vehicleTransactionOnDate($fromdate):"Data loading error"; 
                 }
                }
               if($this->input->post('criteriaSelect')==='bydaterange'){  
                 if(!empty($this->input->post('todate')) && !empty($this->input->post('fromdate'))){
                 $todate=$this->input->post('todate');
                 $fromdate=$this->input->post('fromdate');
                  $display=$this->load->model('VehicleTransactionModel')?$this->VehicleTransactionModel->vehicleTransactionBetweenDate($fromdate,$todate):"Data loading error";       
                 }
               }
              
             }else{
            
            $display=$this->load->model('VehicleTransactionModel')?$this->VehicleTransactionModel->vehicleTransactionOnDate($currentdate):"Data loading error";
        }
         $data = ['title' => 'Vehicle Movement','display'=>$display];
        $this->template->load('home_template', 'memberVehicleMovement_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);    
        } else {
           
           redirect('index.php/logout');
        }
 }  



 ///////////////////////////////////////////////////////Search Customer///////////////////////////////////////////////   
 public function customerSearch(){
	 
     $this->session->set_userdata("pageid", "customerSearch");
      
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            $searchData='pasw';
            $customerdata=array();
            $branch= $this->load->model('branchModel')?$this->branchModel->getAllBranch():'Branch Loading Failed';
            $modal= $this->load->model('modalModel')?$this->modalModel->getModalList():'Modal Loading Failed';
            $remark= $this->load->model('remarkModel')?$this->remarkModel->getAllRemark():'Remark Loading Failed';
          // $data = ['title' => 'Search Customer','customerdata'=>NULL];
           $message = '';
           
       //   /* 
           if($this->input->post('searchCustomerBtn')){ 
               if(!empty($this->input->post('searchText'))){
                     $searchData= $this->input->post('searchText');
                  }
               
             if($this->input->post('criteriaSearchCustomer')==='byname'){ 
                 $customerdetail=$this->load->model('CustomerModel')?$this->CustomerModel->searchCustomer($searchData):"Data loading error";
                 $customerdata= json_decode($customerdetail,true);
                  $data = ['title' => 'Search Customer','customerdata'=>$customerdata,'branchList'=>$branch,'modalList'=>$modal,'remarkList'=>$remark];
            $message = '';
            $this->template->load('home_template', 'memberSearchCustomer_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
                  
                 
             }else if($this->input->post('criteriaSearchCustomer')==='bycontact'){
                  $customerdetail=$this->load->model('CustomerModel')?$this->CustomerModel->searchCustomerByContact($searchData):"Data loading error";
                 $customerdata= json_decode($customerdetail,true);
                  $data = ['title' => 'Search Customer','customerdata'=>$customerdata,'branchList'=>$branch,'modalList'=>$modal,'remarkList'=>$remark];
            $message = '';
                 $this->template->load('home_template', 'memberSearchCustomer_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
             }
               
               // $this->template->load('home_template', 'memberSearchCustomer_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
               
           }else{
                $data = ['title' => 'Search Customer','customerdata'=>$customerdata,'branchList'=>$branch,'modalList'=>$modal,'remarkList'=>$remark];
            $message = '';
            $this->template->load('home_template', 'memberSearchCustomer_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
               
           }
           
          // */
           
           // $customerdetail=$this->load->model('CustomerModel')?$this->CustomerModel->searchCustomer($searchData):"Data loading error";
           // $customerdata= json_decode($customerdetail,true);
             //var_dump($customerdata);
           // foreach($customerdata as $data){
               // var_dump($data);
           // }
           
            
        } else {
           
           redirect('index.php/logout');
        }
 
     
 }/////////End of Search Customer//////////////////////////////////////////////// 
 
// ************************************************************************************//
 ///////////////////////////Show Sale Register///////////////////////////////////
 public function showSaleRegister(){
     $this->session->set_userdata("pageid", "showSaleRegister");
      
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            $currentdate=date('Y-m-d');
            $companyid="all";
            
             if($this->input->post('showSaleRegisterBtn')){ 
                 if($this->input->post('criteriaSelect')==='bydate'){
                 if(!empty($this->input->post('fromdate'))){
                 $fromdate=$this->input->post('fromdate');
                 $companyid=$this->input->post('companyid');
                // echo $transactiontype;
                     $display=$this->load->model('InvoiceModel')?$this->InvoiceModel->invoiceOnDate($fromdate,$companyid):"Data loading error";
                 }
                 }else{
                     if($this->input->post('criteriaSelect')==='bydaterange'){  
                 if(!empty($this->input->post('todate')) && !empty($this->input->post('fromdate'))){
                 $todate=$this->input->post('todate');
                 $fromdate=$this->input->post('fromdate');
                 $companyid=$this->input->post('companyid');
                     $display=$this->load->model('InvoiceModel')?$this->InvoiceModel->invoiceBetweenDate($fromdate,$todate,$companyid):"Data loading error";
                 
                 }}
                 }
                         
                     
             }else{
                  $display=$this->load->model('InvoiceModel')?$this->InvoiceModel->invoiceOnDate($currentdate,$companyid):"Data loading error";
                 // $display="";
             }
            
            
            $message = '';
           
            $data = ['title' => 'Sale Register','display'=>$display];
            $this->template->load('home_template', 'memberSaleRegister_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            
        } else {
           
           redirect('index.php/logout');
        }
 }  //////////////////End of Show Sale Register
 
 // ************************************************************************************//
 
 ///////////////////////////Show Counter Stock///////////////////////////////////
 
 public function showCounterStock(){
	 //echo "success";
     $this->session->set_userdata("pageid", "showCounterStock");
      
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            $currentdate=date('Y-m-d');
            $companyid="all";
			//$criteria="All";
			//$criteria="100104";
           
            $message = '';
			if($this->input->post('showCounterStockBtn')){
				$criteria=$this->input->post('branchSelect');
			}else{
				$criteria="All";
			}
			
			$display= $this->load->model('VehicleModel')?$this->VehicleModel->getCounterStock($criteria):'Stock Loading Failed';
			$branch= $this->load->model('branchModel')?$this->branchModel->getAllBranch():'Branch Loading Failed';
           
            $data = ['title' => 'Counter Stock','display'=>$display,'branchList'=>$branch];
            $this->template->load('home_template', 'memberCounterStock_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            
        } else {
           
           redirect('index.php/logout');
        }
 }  //////////////////End of Show Counter Stock
 
 // ************************************************************************************//  
 
 
 
 
 
 
 
///////////////////////////////////////////////////////Search Enquiry///////////////////////////////////////////////   
 public function enquirySearch(){
     $this->session->set_userdata("pageid", "enquirySearch");
      
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member')|| ($role === 'branch') && $isLoggedin) {
            //$searchData='pasw';
            $customerdata=array();
            $branch= $this->load->model('branchModel')?$this->branchModel->getAllBranch():'Branch Loading Failed';
            $modal= $this->load->model('modalModel')?$this->modalModel->getModalList():'Modal Loading Failed';
            //$remark= $this->load->model('remarkModel')?$this->remarkModel->getAllRemark():'Remark Loading Failed';
          // $data = ['title' => 'Search Customer','customerdata'=>NULL];
           $message = '';
           
       //   /* 
           if($this->input->post('searchEnquiryBtn')){ 
               if(!empty($this->input->post('searchTextEnquiry'))){
                     $searchData= $this->input->post('searchTextEnquiry');
                  }
               
             if($this->input->post('criteriaSearchEnquiry')==='byname'){ 
                 $customerdetail=$this->load->model('CustomerModel')?$this->CustomerModel->searchCustomer($searchData):"Data loading error";
                 $customerdata= json_decode($customerdetail,true);
                  $data = ['title' => 'Search Customer','customerdata'=>$customerdata,'branchList'=>$branch,'modalList'=>$modal,'remarkList'=>$remark];
            $message = '';
            $this->template->load('home_template', 'enquirySearch_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
                  
                 
             }else if($this->input->post('criteriaSearchCustomer')==='bycontact'){
                  $customerdetail=$this->load->model('CustomerModel')?$this->CustomerModel->searchCustomerByContact($searchData):"Data loading error";
                 $customerdata= json_decode($customerdetail,true);
                  $data = ['title' => 'Search Customer','customerdata'=>$customerdata,'branchList'=>$branch,'modalList'=>$modal,'remarkList'=>$remark];
            $message = '';
                 $this->template->load('home_template', 'enquirySearch_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
             }
               
               // $this->template->load('home_template', 'memberSearchCustomer_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
               
           }else{
                $data = ['title' => 'Search Customer','customerdata'=>$customerdata,'branchList'=>$branch,'modalList'=>$modal];
            $message = '';
            $this->template->load('home_template', 'enquirySearch_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
               
           }
           
          // */
           
           // $customerdetail=$this->load->model('CustomerModel')?$this->CustomerModel->searchCustomer($searchData):"Data loading error";
           // $customerdata= json_decode($customerdetail,true);
             //var_dump($customerdata);
           // foreach($customerdata as $data){
               // var_dump($data);
           // }
           
            
        } else {
           
           redirect('index.php/logout');
        }
 
     
 }/////////End of Search Customer//////////////////////////////////////////////// 
 
// ************************************************************************************//

 ///////////////////////////////////////////////////////Search Invoice///////////////////////////////////////////////   
 public function searchInvoice(){
     $this->session->set_userdata("pageid", "searchinvoice");
      
       $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            $searchData='pasw';
            $invoicedata=array();
			 $chasis= $this->load->model('vehicleModel')?$this->vehicleModel->getUnInvoicedChasisList():'Chasis Loading Failed';
		 //$currentinvoiceno=$this->load->model('InvoiceModel')?$this->InvoiceModel->getLastInvoiceNo():'000';
		 $currentinvoiceno= $this->load->model('invoiceModel')?$this->invoiceModel->getLastInvoiceOfCompany(1001):"0";
		 $currentinvoiceno=$currentinvoiceno+1;
			$salesmanList=$this->load->model('salesmanModel')?$this->salesmanModel->getAllSalesman():'Chasis Loading Failed';
			$taxtype="active";
		 $taxList=$this->load->model('taxModel')?$this->taxModel->getAllTax($taxtype):'Tax Loading Failed';
		 $financerList=$this->load->model('hypothecationModel')?$this->hypothecationModel->getAllFinancer():"NA";
		 
            //$branch= $this->load->model('branchModel')?$this->branchModel->getAllBranch():'Branch Loading Failed';
            //$modal= $this->load->model('modalModel')?$this->modalModel->getModalList():'Modal Loading Failed';
            //$remark= $this->load->model('remarkModel')?$this->remarkModel->getAllRemark():'Remark Loading Failed';
          // $data = ['title' => 'Search Customer','customerdata'=>NULL];
           $message = '';
           
       //   /* 
           if($this->input->post('searchInvoiceBtn')){ 
               if(!empty($this->input->post('searchText'))){
                     $searchData= $this->input->post('searchText');
					 //echo $searchData;
                  }
               
             if($this->input->post('criteriaSearchInvoice')==='byinvoicenumber'){ 
				//echo $this->input->post('criteriaSearchInvoice');	
				$criteria='invoiceno';
                 $invoicedetail=$this->load->model('InvoiceModel')?$this->InvoiceModel->searchInvoice($searchData,$criteria):"Data loading error";
                 $invoicedata= json_decode($invoicedetail,true);
				 //var_dump($invoicedata);
                  $data = ['title' => 'Search Invoice','invoicedata'=>$invoicedata,'salesmanlist'=>$salesmanList,'financerList'=>$financerList,'taxList'=>$taxList,'chasisList'=>$chasis,'currentinvoiceno'=>$currentinvoiceno];
            $message = '';
            $this->template->load('home_template', 'memberSearchInvoice_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
                  
                 
             }else if($this->input->post('criteriaSearchInvoice')==='bychasisno'){
				 //echo $this->input->post('criteriaSearchInvoice');
                  $criteria='chasisno';
                 $invoicedetail=$this->load->model('InvoiceModel')?$this->InvoiceModel->searchInvoice($searchData,$criteria):"Data loading error";
                 $invoicedata= json_decode($invoicedetail,true);
				 //var_dump($invoicedata);
                  $data = ['title' => 'Search Invoice','invoicedata'=>$invoicedata,'salesmanlist'=>$salesmanList,'financerList'=>$financerList,'taxList'=>$taxList,'chasisList'=>$chasis,'currentinvoiceno'=>$currentinvoiceno];
            $message = '';
            $this->template->load('home_template', 'memberSearchInvoice_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
                  
             }
               
               // $this->template->load('home_template', 'memberSearchCustomer_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
               
           }else{
                $data = ['title' => 'Search Invoice','invoicedata'=>$invoicedata,'salesmanlist'=>$salesmanList,'financerList'=>$financerList,'taxList'=>$taxList,'chasisList'=>$chasis,'currentinvoiceno'=>$currentinvoiceno];
            $message = '';
            $this->template->load('home_template', 'memberSearchInvoice_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
               
           }
           
          // */
           
           // $customerdetail=$this->load->model('CustomerModel')?$this->CustomerModel->searchCustomer($searchData):"Data loading error";
           // $customerdata= json_decode($customerdetail,true);
             //var_dump($customerdata);
           // foreach($customerdata as $data){
               // var_dump($data);
           // }
           
            
        } else {
           
           redirect('index.php/logout');
        }
 
     
 }/////////End of Search Customer//////////////////////////////////////////////// 
 
// ************************************************************************************//


 
 
 
}
?>