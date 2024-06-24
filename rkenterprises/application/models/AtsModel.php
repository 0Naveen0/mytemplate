<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of User_Model
 *
 * @author Naveen Kamal 
 */
class AtsModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    
    
    
     
     public function showDoPending(){
       
        $atsdata=array();
          
              $atsdata[0]=array('chasisno'=>"NA",'billingdate'=>"NA",'modalname'=>"NA",'hypothecation'=>"NA",'dostatus'=>"NA"
,'doissuedate'=>"NA",'dse'=>"NA",'customername'=>"NA",'customercontact'=>"NA",'customeraddressline1'=>"NA",'customeraddressline2'=>"NA"
,'district'=>"NA",'dues'=>"NA");

$date="07-02-2019";


$viewAts="True";

 $query = $this->db->select('financeid,financerid,deliveryorder,dodate,chasisid,customerid')
                ->from('finance')
               ->where('deliveryorder','Pending')
                ->get(); 
                
 if ($query->num_rows() > 0) {
                $atsdata=array();
                $i=0;
                     foreach ($query->result() as $row) {
                         $financeid=$row->financeid;
                          $dostatus=$row->deliveryorder;
                           $doissuedate=$row->dodate;
                         $financer=$row->financerid;
                        
                        
                        
                         $chasisid=$row->chasisid;
                         $customerid=$row->customerid;
                         if($this->load->model('CustomerModel')){
                             $customername=$this->CustomerModel->getCustomerName($customerid);
                             $customercontact=$this->CustomerModel->getCustomerContact($customerid);
                             $customeraddressline1=$this->CustomerModel->getCustomerAddressline1($customerid);
                             $customeraddressline2=$this->CustomerModel->getCustomerAddressline2($customerid);
                             $district=$this->CustomerModel->getCustomerDistrict($customerid);
                             $dse=$this->CustomerModel->getCustomerBranch($customerid);
                         }else{
                             $customername="b";
                             $customercontact="";
                             $customeraddressline1="";
                             $customeraddressline2="";
                             $district="";
                              $dse="";
                         }
                          if($this->load->model('VehicleModel')){
                              $chasisno=$this->VehicleModel->getChasisNo($chasisid);
                              $modalname=$this->VehicleModel->getModalName($chasisid);
                              $challandate=$this->VehicleModel->getChallanDate($chasisid);
                             
                         }else{
                             $chasisno="NA";
                             $modalname="NA";
                         }
                         if($this->load->model('HypothecationModel')){ 
                             $hypothecation=$this->HypothecationModel->getFinancerName($financer);
                             
                         }else{
                             $hypothecation="NA";
                             
                         }
                          if($this->load->model('DayBookModel')){ 
                             $dues=$this->DayBookModel->getDuesByCustomerId($customerid);
                             
                         }else{
                             $dues="NA";
                             
                         }
                         
                         
                         
                        $atsdata[$i++]=array('fid'=>$financeid,'chasisno'=>$chasisno,'billingdate'=>$challandate,'modalname'=>$modalname,'hypothecation'=>$hypothecation,'dostatus'=>$dostatus
,'doissuedate'=>$doissuedate,'dse'=>$dse,'customername'=>$customername,'customercontact'=>$customercontact,'customeraddressline1'=>$customeraddressline1,'customeraddressline2'=>$customeraddressline2
,'district'=>$district,'dues'=>$dues);
                         
                     }
                    
                }
                else{
                    
                    return "Not Found";
                    
                }                
                
 
   return $atsdata;
       
       
   }
   
    
    
    
    
    
    
    
    
    
    
   public function showAllAts(){
       
        
            $stock=array();

$date="07-02-2019";


$viewAts="True";

 $query = $this->db->select('financeid,financerid,deliveryorder,dodate,chasisid,customerid')
                ->from('finance')
               
                ->get(); 
                
 if ($query->num_rows() > 0) {
                $atsdata=array();
                $i=0;
                     foreach ($query->result() as $row) {
                         $financeid=$row->financeid;
                          $dostatus=$row->deliveryorder;
                           $doissuedate=$row->dodate;
                         $financer=$row->financerid;
                        
                        
                        
                         $chasisid=$row->chasisid;
                         $customerid=$row->customerid;
                         if($this->load->model('CustomerModel')){
                             $customername=$this->CustomerModel->getCustomerName($customerid);
                             $customercontact=$this->CustomerModel->getCustomerContact($customerid);
                             $customeraddressline1=$this->CustomerModel->getCustomerAddressline1($customerid);
                             $customeraddressline2=$this->CustomerModel->getCustomerAddressline2($customerid);
                             $district=$this->CustomerModel->getCustomerDistrict($customerid);
                             $dse=$this->CustomerModel->getCustomerBranch($customerid);
                         }else{
                             $customername="b";
                             $customercontact="";
                             $customeraddressline1="";
                             $customeraddressline2="";
                             $district="";
                              $dse="";
                         }
                          if($this->load->model('VehicleModel')){
                              $chasisno=$this->VehicleModel->getChasisNo($chasisid);
                              $modalname=$this->VehicleModel->getModalName($chasisid);
                              $challandate=$this->VehicleModel->getChallanDate($chasisid);
                             
                         }else{
                             $chasisno="NA";
                             $modalname="NA";
                         }
                         if($this->load->model('HypothecationModel')){ 
                             $hypothecation=$this->HypothecationModel->getFinancerName($financer);
                             
                         }else{
                             $hypothecation="NA";
                             
                         }
                          if($this->load->model('DayBookModel')){ 
                             $dues=$this->DayBookModel->getDuesByCustomerId($customerid);
                             
                         }else{
                             $dues="NA";
                             
                         }
                         
                         
                         
                        $atsdata[$i++]=array('fid'=>$financeid,'chasisno'=>$chasisno,'billingdate'=>$challandate,'modalname'=>$modalname,'hypothecation'=>$hypothecation,'dostatus'=>$dostatus
,'doissuedate'=>$doissuedate,'dse'=>$dse,'customername'=>$customername,'customercontact'=>$customercontact,'customeraddressline1'=>$customeraddressline1,'customeraddressline2'=>$customeraddressline2
,'district'=>$district,'dues'=>$dues);
                         
                     }
                    
                }
                else{
                    
                    return "Not Found";
                    
                }                
                
 
   return $atsdata;
       
       
   }
   
   
     public function showDoReleased(){
       
        
            $stock=array();

$date="07-02-2019";


$viewAts="True";

 $query = $this->db->select('financeid,financerid,deliveryorder,dodate,chasisid,customerid')
                ->from('finance')
               ->where('deliveryorder','Released')
                ->get(); 
                
 if ($query->num_rows() > 0) {
                $atsdata=array();
                $i=0;
                     foreach ($query->result() as $row) {
                         $financeid=$row->financeid;
                          $dostatus=$row->deliveryorder;
                           $doissuedate=$row->dodate;
                         $financer=$row->financerid;
                        
                        
                        
                         $chasisid=$row->chasisid;
                         $customerid=$row->customerid;
                         if($this->load->model('CustomerModel')){
                             $customername=$this->CustomerModel->getCustomerName($customerid);
                             $customercontact=$this->CustomerModel->getCustomerContact($customerid);
                             $customeraddressline1=$this->CustomerModel->getCustomerAddressline1($customerid);
                             $customeraddressline2=$this->CustomerModel->getCustomerAddressline2($customerid);
                             $district=$this->CustomerModel->getCustomerDistrict($customerid);
                             $dse=$this->CustomerModel->getCustomerBranch($customerid);
                         }else{
                             $customername="b";
                             $customercontact="";
                             $customeraddressline1="";
                             $customeraddressline2="";
                             $district="";
                              $dse="";
                         }
                          if($this->load->model('VehicleModel')){
                              $chasisno=$this->VehicleModel->getChasisNo($chasisid);
                              $modalname=$this->VehicleModel->getModalName($chasisid);
                              $challandate=$this->VehicleModel->getChallanDate($chasisid);
                             
                         }else{
                             $chasisno="NA";
                             $modalname="NA";
                         }
                         if($this->load->model('HypothecationModel')){ 
                             $hypothecation=$this->HypothecationModel->getFinancerName($financer);
                             
                         }else{
                             $hypothecation="NA";
                             
                         }
                          if($this->load->model('DayBookModel')){ 
                             $dues=$this->DayBookModel->getDuesByCustomerId($customerid);
                             
                         }else{
                             $dues="NA";
                             
                         }
                         
                         
                         
                        $atsdata[$i++]=array('fid'=>$financeid,'chasisno'=>$chasisno,'billingdate'=>$challandate,'modalname'=>$modalname,'hypothecation'=>$hypothecation,'dostatus'=>$dostatus
,'doissuedate'=>$doissuedate,'dse'=>$dse,'customername'=>$customername,'customercontact'=>$customercontact,'customeraddressline1'=>$customeraddressline1,'customeraddressline2'=>$customeraddressline2
,'district'=>$district,'dues'=>$dues);
                         
                     }
                    
                }
                else{
                    
                    return "Not Found";
                    
                }                
                
 
   return $atsdata;
       
       
   }
   
   
   
   
   
   
   
   
     public function addAts(){}
       public function editBranch(){}
       public function deleteBranch(){}
   
   public function getBranchId($uid){
       $query = $this->db->select('branchid')
                ->from('branch')
                ->where('uid',$uid)
               //->order_by($field, $order)
                ->get(); 
                if ($query->num_rows() === 1) {
                     foreach ($query->result() as $row) {
                         $branchid=$row->branchid;
                         $this->session->set_userdata('branchid',$branchid);
                         return $branchid;
                     }
                    
                }
                else{
                    return "Not Found";
                    
                }
       
   }
   
   
   //This function returns all branch name in ascending order
    public function getAllBranch(){
         $field = 'branchname';
            $order = 'ASC';
        /*
         if ($data === null) {
           
            $field = 'uid';
            $order = 'ASC';
        } else {
            $order = $data['order'];
            $field = $data['field'];
            
        }*/
        $displayUsers = array();
        $query = $this->db->select('branchid,branchname')
                ->from('branch')
                //->where('role !=', 'Administrator')
               ->order_by($field, $order)
                ->get();
        
        if ($query->num_rows() === 0) {
            $displayUsers = array('message'=>"No Record Found");
            //echo $displayUsers;
            return $displayUsers;
        } else {
            $i=0;
            $data=array();
            foreach ($query->result() as $row) {
               // $displayUsers.="<tr><td>" . $row->uid . "</td><td>" . $row->first_name . "</td>"
                //        . "<td>" . $row->last_name . "</td><td>" . $row->uname . "</td><td>" . $row->role . "</td>"
                //        . "<td>" . $row->contact . "</td><td>" . $row->email . "</td></tr>";
                $data=array('branchid'=>$row->branchid,'branchname'=>$row->branchname);
                $displayUsers[$i++]=$data;
              // echo  '  <br/> '.$row->branchid.'   '.$row->branchname;
             // echo  '  <br/> '. $data['branchid'].'   '.$data['branchname'];
                
            }
            foreach($displayUsers as $row){
                
                //echo $row['branchid'].'   '.$row['branchname'];
                
            }
         
            return $displayUsers;
        }
    
    }
    
    //This function returns Ledger of selected customer
    public function viewCustomerDetailByCustomerId($customerid){
      $displayUsers="";
      $debitsum=0;
      $creditsum=0;
      $currentdate=date('d-m-Y');
      $customername="";
      $date=new DateTime();
      
        $field='transaction.customerid';
$condition=$customerid;
$accountquery=$this->db->select('transactiondate as  "date",transaction.transactiontype as  "type",transactionamount as amount,remarkid,transactionid as "id",comment as comment ')
						->from('transaction')

-> where($field,$condition)
->order_by('transactiondate')->get();

      if ($accountquery->num_rows() === 0) {
	 
            $displayCustomerData = array('message'=>"No Record Found");
            $displayUsers="No Record Found";
	
        } else {
            $i=0;
            $balance=0;
            $data=array();
            
             $customerquery=$this->db->select('customername')
                                    ->from('customer')
                                    ->where('customerid',$customerid)
                                    ->get();
             if ($customerquery->num_rows() === 1) { 
                 foreach($customerquery->result() as $row){
                 $customername=$row->customername;
                 }
             }else{
                  $customername="";
                 
             }  
             
             

            $displayUsers.="<div class='table-responsive small'>";
            $displayUsers.="<table class='table table-striped table-bordered'>";
           
              $displayUsers.="<tr><td colspan='6' class=center>Ledger</td></tr>";
            $displayUsers.="<tr><td>" ."Customer Name" . "</td><td>(".$customerid .")". $customername . "</td>"
                       . "<td>" . "" . "</td><td>" . "" . "</td><td>" . "Date" . "</td><td>" . $currentdate . "</td></tr>";
            $displayUsers.="<tr><td>" ." Tid" . "</td><td>" . "Date" . "</td>"
                       . "<td>" . "Debit" . "</td><td>" . "Credit" . "</td><td>" . "Remark" . "</td><td>" . "Comment" . "</td></tr>";
            foreach ($accountquery->result() as $row) {
               $remark="";
            $remark=$this->getRemarkById($row->remarkid);
            $date=new DateTime($row->date);
            $date=$date->format("d-m-Y");
            //echo $remark;
                if($row->type==="debit"){
                    $balance=$balance+($row->amount);
                    $debitsum=$debitsum+($row->amount);
                     $displayUsers.="<tr><td>" . $row->id . "</td><td>" .$date . "</td>". "<td>" .$row->amount  . "</td><td>" ."0"  . "</td><td>" . $remark . "</td><td>" . $row->comment . "</td></tr>";
                }else if($row->type==="credit"){
                    
                   $balance=$balance-($row->amount); 
                    $creditsum=$creditsum+($row->amount);
                     $displayUsers.="<tr><td>" .$row->id  . "</td><td>" .$date  . "</td>". "<td>" . "0"  . "</td><td>" . $row->amount . "</td><td>" . $remark . "</td><td>" . $row->comment . "</td></tr>";
                }
             }
             $displayUsers.="<tr><td>" . "" . "</td><td>" . "Total" . "</td>". "<td>" .  $debitsum  . "</td><td>" . $creditsum . "</td><td>" . "" . "</td><td>" . "" . "</td></tr>";
            
            $displayUsers.="<tr><td>" . "" . "</td><td>" . "Closing Balance" . "</td>"
                       . "<td>" . "" . "</td><td>" .$balance . "</td><td>" . "" . "</td><td>" . "" . "</td></tr>";
                        $displayUsers.="<tr><td>" . "" . "</td><td>" . "" . "</td>"
                       . "<td>" . $debitsum   . "</td><td>" . $debitsum  . "</td><td>" . "" . "</td><td>" . "" . "</td></tr>";
            $displayUsers.="</table></div>";
		
	}	
	return $displayUsers;  
      }
  
    
 //This function returns Customer Account Summary of selected branch   
    	public function viewCustomerSummaryByBranchId($branchid){
			//$branchid=100101;
		$field='customer.branchid';
$condition=$branchid;
$creditquery=$this->db->select('customer.customername as  "name",sum(transaction.transactionamount) as  "credit",customer.customerid as "id" ')
						->from('customer')
->join('transaction',' (customer.customerid=transaction.customerid and transaction.transactiontype="credit")','left outer')
-> where($field,$condition)
->group_by('customer.customername')
->get_compiled_select();

//$creditquery.=" as t1) ";
$creditquery="(".$creditquery.") as t1 ";


$debitquery=$this->db->select('customer.customername as  "name",sum(transaction.transactionamount) as  "debit" ')
	->from('customer')
->join('transaction','(customer.customerid=transaction.customerid and transaction.transactiontype="debit")','left outer')
-> where($field,$condition)
->group_by('customer.customername')
->get_compiled_select();
$debitquery="(".$debitquery.") as t2 ";
//echo $creditquery;
//echo $debitquery;

$mainquery=$this->db->select('t1.name as  "Name",t2.debit as  "Debit" ,t1.credit as  "Credit",(t2.debit-t1.credit) as "Balance" ,t1.id as Cid',FALSE)
->from(''.$creditquery)
->join($debitquery,'t1.name=t2.name','left outer')
->get();
$displayUsers="";
 if ($mainquery->num_rows() === 0) {
	 
            $displayCustomerData = array('message'=>"No Record Found");
            $displayUsers="No Record Found";
		//	echo $displayUsers;
           // return $displayCustomerData;
        } else {
            $i=0;
            $sumDebit=0;
            $sumCredit=0;
            $dues=0;
            $data=array();
            $displayUsers.="<div class='table-responsive small'>";
            $displayUsers.="<table class='table table-striped table-bordered'>";
            $displayUsers.="<tr><td>" ." Cid" . "</td><td>" . "Name" . "</td>"
                       . "<td>" . "Debit" . "</td><td>" . "Credit" . "</td><td>" . "Balance" . "</td></tr>";
            foreach ($mainquery->result() as $row) {
                $sumDebit=$sumDebit+$row->Debit;
                $sumCredit=$sumCredit+$row->Credit;
                $displayUsers.="<tr><td>" .$row->Cid . "</td><td>" . $row->Name . "</td>"
                       . "<td>" . $row->Debit . "</td><td>" . $row->Credit . "</td><td>" . $row->Balance . "</td></tr>";
                
               // $data=array('serial'=>$i+1,'customername'=>$row->Name,'debit'=>$row->Debit,'credit'=>$row->Credit,'balance'=>$row->Balance);
               // $displayCustomerData[$i++]=$data;
                      
            }
            $dues=$sumDebit-$sumCredit;
            $displayUsers.="<tr><td>" . "" . "</td><td>" . "Total" . "</td>"
                       . "<td>" .$sumDebit . "</td><td>" . $sumCredit . "</td><td>" .  $dues . "</td></tr>";
            $displayUsers.="</table></div>";
		//echo $displayUsers;
		// return $displayCustomerData;	
	}	
	return $displayUsers;
	}
    
    
    
    
    
    
    
     public function getBranchLocation($branchid){
          $location="";
        
          $locationquery=$this->db->select('branchlocation')
                                    ->from('branch')
                                    ->where('branchid',$branchid)
                                    ->get();
             if ($locationquery->num_rows() === 1) { 
                // echo "a";
                 foreach($locationquery->result() as $row){
                 $location=$row->branchlocation;
                 }
             }else{
                // echo "b";
                  $location="";
                 
             }  
         return $location;
         
         
         
     }
     public function getBranchContact($branchid){
         $contact="";
        
          $contactquery=$this->db->select('branchcontact')
                                    ->from('branch')
                                    ->where('branchid',$branchid)
                                    ->get();
             if ($contactquery->num_rows() === 1) { 
                // echo "a";
                 foreach($contactquery->result() as $row){
                 $contact=$row->branchcontact;
                 }
             }else{
                // echo "b";
                  $contact="";
                 
             }  
         return $contact;
         
     }
     
     public function getRemarkById($remarkid){
         $remark="";
         //echo $remarkid;
          $remarkquery=$this->db->select('remark')
                                    ->from('remark')
                                    ->where('remarkid',$remarkid)
                                    ->get();
             if ($remarkquery->num_rows() === 1) { 
                // echo "a";
                 foreach($remarkquery->result() as $row){
                 $remark=$row->remark;
                 }
             }else{
                // echo "b";
                  $remark="";
                 
             }  
         return $remark;
         
     }
    
    
    
    
    
    
    
 //legacy data starts from here delete after project completion   
    
    //Add or Register User 
    public function register($data) {
        $password = $data['password'];

        $securePassword = $this->securePassword($password);
        $data['password'] = $securePassword;
        if ($this->db->insert("user", $data)) {
            return true;
        }
    }
    //Check For Duplicate username
    public function checkUserName($userName) {
        $query = $this->db->select('uid')
                ->from('user')
                ->where('uname', $userName)
                ->get();
        if ($query->num_rows() === 0) {
            return true;
        } else {
            return false;
        }
    }
    /*
     *
     *    
     *   */
    public function login($data) {
        $uname = $data['uname'];
        $utype = $data['role'];
        $password = $data['password'];
        $query = $this->db->select('uid,first_name,password,role')
                ->from('user')
                ->where('uname', $uname)
                ->where('role', $utype)
                ->get();
               
        if ($query->num_rows() === 1) {
             //echo 'query ';
            $row = $query->row();
            if (isset($row)) {
                //echo $row->uid;
                //echo $row->first_name;
                //echo $row->password;
                //echo $password.' '.$row->password.' '.$query->num_rows();
                 // echo $password.'----'.$row->password;
                 $hash=$row->password;
                  //$cost = array('cost' => 11);
       // $hash = password_hash($password, PASSWORD_DEFAULT);
                $passwordOk = password_verify($password,$hash );
               //echo $passwordOk;
                if ($passwordOk) {    //password matched allow to log in
                    //$sessiondata = array('isLoggedin' => 'true', 'role' => $utype,
                    //     'userName' => $row->first_name, 'uid' => $row->uid);
                    $_SESSION['isLoggedin']='true';
                    $_SESSION['role']= $row->role;
                    
                    //$this->session->set_userdata("isLoggedin", 'true');
                   // $this->session->set_userdata('role', $row->role);
                    $this->session->set_userdata('userName', $row->first_name);
                    $this->session->set_userdata('uid', $row->uid);
                    //$this->session->set_userdata($sessiondata);
                    //echo  $_SESSION['isLoggedin'];
                    //echo  $_SESSION['role'];
                    return true;
                } else {    //Wrong password entered
                    $flag = 1; //echo 'query2 ';
                }
            } else {   //data reading error
                $flag = 1;
            }
        } else {   //user name not found in database 
            $flag = 1;
        }
        if ($flag === 1) { //return false in case of any error
            $messageText = 'Username or Password not correct.';
            $this->session->set_userdata('message', $messageText);
            return false;
        }
    }
    public function adminViewUser($data = null) {
        if ($data === null) {
           
            $field = 'uid';
            $order = 'ASC';
        } else {
            $order = $data['order'];
            $field = $data['field'];
            
        }
        $displayUsers = "";
        $query = $this->db->select('uid,first_name,last_name,uname,email,contact,role')
                ->from('user')
                ->where('role !=', 'Administrator')
                ->order_by($field, $order)
                ->get();
        
        if ($query->num_rows() === 0) {
            $displayUsers = "<tr><td>No Record Found</td></tr>";
            return $displayUsers;
        } else {
            foreach ($query->result() as $row) {
                $displayUsers.="<tr><td>" . $row->uid . "</td><td>" . $row->first_name . "</td>"
                        . "<td>" . $row->last_name . "</td><td>" . $row->uname . "</td><td>" . $row->role . "</td>"
                        . "<td>" . $row->contact . "</td><td>" . $row->email . "</td></tr>";
            }
            return $displayUsers;
        }
    }
    public function viewProfile($uid) {
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Administrator') && $isLoggedin) {
            $query = $this->db->select('uid,first_name,last_name,father,gender,dob,uname,email,contact,role')
                    ->from('user')
                    ->where('role', 'Administrator')
                    ->where('uid', $uid)
                    ->get();
        } elseif (($role === 'Dealer') && $isLoggedin) {
            $query = $this->db->select('uid,first_name,last_name,father,gender,dob,uname,email,contact,role')
                    ->from('user')
                    ->where('role', 'Dealer')
                    ->where('uid', $uid)
                    ->get();
        } elseif (($role === 'Member') && $isLoggedin) {
            $query = $this->db->select('uid,first_name,last_name,father,gender,dob,uname,email,contact,role')
                    ->from('user')
                    ->where('role', 'Member')
                    ->where('uid', $uid)
                    ->get();
        }
        if ($query->num_rows() === 1) {
            //$count=0;
            foreach ($query->result() as $row) {
                //$count++;
                /*  $profileData.="<tr><td>" . $row->uid . "</td><td>" . $row->first_name . "</td>"
                  . "<td>" . $row->last_name . "</td><td>" . $row->uname . "</td><td>" . $row->role . "</td>"
                  . "<td>" . $row->contact . "</td><td>" . $row->email . "</td></tr>"; */
                $profileData = array('uid' => $row->uid, 'fname' => $row->first_name,
                    'lname' => $row->last_name, 'uname' => $row->uname, 'role' => $row->role,
                    'contact' => $row->contact, 'email' => $row->email,
                    'father'=>$row->father,'gender'=>$row->gender,'dob'=>$row->dob);
            }
        } elseif ($query->num_rows() < 1) {
            $profileData = array('message' => "No Record Found");
        } else {
            $profileData = array('message' => "Data Error in file usermodel");
        }
        return $profileData;
    }
    public function editUser($data) {
        
    }
    public function deleteUser($data) {
        $uid = $data['uid'];
        //$uname = $data['uname'];
        //$role = $data['role'];
        $where = "uid='" . $uid . "'";
        $query = $this->db->select('uid,role')
                ->from('user')
                ->where($where)
                ->get();
        //echo $query;
        if ($query->num_rows() === 1) {
            if ($this->db->delete('user', array('uid' => $uid))) {
                return true;
            }
        } else {
            //echo $query->num_rows();
            return false;
        }
    }
    public function getDeleteUserTable() {
        $query = $this->db->select('uid,role,uname,first_name,last_name')
                ->from('user')
                ->where('uname !=', 'admin')
                ->get();
        $count = $query->num_rows();
        if ($count >= 1) {

            $table = "<form id='deleteUserForm' method='post'><table class='table table-striped table-bordered'><caption class='text-center'>Delete User</caption>"
                    . "<thead><tr><th>Id</th><th>First Name</th><th>Last Name</th><th>User Name</th><th>Role</th><th class='danger'>Action</th></tr></thead>"
                    . "<tbody>";
            foreach ($query->result() as $row) {
                $table.="<tr><td>" . $row->uid . "</td><td>" . $row->first_name . "</td><td>" . $row->last_name . "</td>"
                        . "<td>" . $row->uname . "</td><td>" . $row->role . "</td>"
                        . "<td class='danger'><button class='btn btn-default' name='deleteUser' value='" . $row->uid . "'>Delete</button></td></tr>";
            }

            $table.="</tbody></table></form>";
        } else {
            $table = "No Record Found.";
        }
        return $table;
    }
    public function getUserData($data) {
        
    }
    public function securePassword($password) {
        //$salt=$this->generateSalt();
        //$securedPassword=md5(sha1($password));
        $cost = array('cost' => 11);
        $securedPassword = password_hash($password, PASSWORD_DEFAULT);
        return $securedPassword;
    }
    public function generateSalt() {
        $salt = random_bytes(10);
        return $salt;
    }
}