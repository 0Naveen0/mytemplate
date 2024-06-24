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
class VehicleTransactionModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    
     public function addVehicleTransaction($data){
         /*
         $insertdata=array('customername'=>$customername,'customeraddressline1'=>$customeraddressline1,'customeraddressline2'=>$customeraddressline2,'customerfathername'=>$customerfathername,'customerdistrict'=>$customerdistrict,'customerstate'=>$customerstate,'customerpin'=>$customerpin,'customercontact'=>$customercontact,'customeremail'=>$customeremail,'branchid=>$branchid','modalid'=>$modalid);
         */
        $query=$this->db->insert('vehicletransaction',$data);
        if($query){
       return "Branch Transferred Successfully";
       }else{
       return "Data Insertion Failed";
       }  
         
     }
     
     
      //public function getChasisList(){
          
          
          
          
    //  }
    
    // public function addCustomer(){}
       public function editCustomer(){}
       
       //**********************************************************************************************
       
             public function deleteChallan($challanId,$chassisId){
		    $result=FALSE;
		   if($this->isChallanExist($challanId)){
			   $this->db->trans_start();
			   $this->db->where('vehicletransactionid',$challanId);
			   $this->db->delete('vehicletransaction');
			   $lastChallanId=$this->getLastChallanId($chassisId);
			   //echo $lastChallanId;
			   if($this->isChallanExist($lastChallanId)){
				   
				   
				   $query=$this->db->select('location,locationid')
				   ->from('vehicletransaction')
				   ->where('vehicletransactionid', $lastChallanId)
				   ->get();
				   if($query->num_rows() >0){
					   foreach($query->result() as $row){
						   $location=$row->location;
						   $locationid=$row->locationid;
					   }
					 $data=array('location'=>$location,'locationid'=>$locationid,'customerid'=>0,'challanid'=>$lastChallanId);  
				   }
				   
				   
			   }else{
				   $data=array('location'=>"Godown",'locationid'=>1001,'customerid'=>0,'challanid'=>0);
				   
			   }
			   $this->db->where('vehicleid',$chassisId);
                   $this->db->update('vehicle',$data);
			    
			   $this->db->trans_complete();
			   if ($this->db->trans_status() === FALSE){
				   $result=FALSE;
		}else{
			$result=TRUE;
			return $result;
		   }
		   }else{
			   return $result;
		   }
		   
	   }
	   
	//*******************************************************************************************   
	
	   public function isChallanExist($challanId){
		   $challanExist=0;
        $query = $this->db->select('vehicletransactionid')
                ->from('vehicletransaction')
                ->where('vehicletransactionid', $challanId)
                ->get();
                if ($query->num_rows() === 1) {
           $challanExist=1;
        }
        return $challanExist;
	   }
	   
	   //****************************************************************************************
       
     public function vehicleTransactionOnDate($date){
        $data=array();
        $display=array();
        $i=0;
        $query=$this->db->select('vehicletransaction.vehicleid,vehicletransaction.vehicletransferdate,vehicletransaction.location,vehicletransaction.locationid,vehicletransaction.vehicletransferpurpose,vehicle.chasisno,vehicle.modalid')->from('vehicletransaction')
        ->join('vehicle','vehicle.vehicleid=vehicletransaction.vehicleid','left outer')
        
        ->where('vehicletransaction.vehicletransferdate',$date)
        ->get();
        if($query->num_rows()>0){
            foreach ($query->result() as $row){
                $modal=$this->load->model('ModalModel')?$this->ModalModel->getModalName($row->modalid):"NA";
                
                if($row->location==='Branch'){
                    $name=$this->load->model('BranchModel')?$this->BranchModel->getBranchName($row->locationid):"NA";
                }elseif($row->location==='Customer'){
                   $name=$this->load->model('CustomerModel')?$this->CustomerModel-> getCustomerName($row->locationid):"NA";
                }else{
                    $name="NA";
                }
                $data=array('vehicleid'=>$row->vehicleid,'location'=>$row->location,'locationid'=>$name,'purpose'=>$row->vehicletransferpurpose,'chasisno'=>$row->chasisno,'modalid'=>$modal,'transferdate'=>$row->vehicletransferdate);
                $display[$i++]=$data;
            }
        }else{
             $data=array('vehicleid'=>'0','location'=>'NA','locationid'=>'0','purpose'=>'NA','chasisno'=>'NA','modalid'=>'0','transferdate'=>'0000-00-00');
                $display[$i++]=$data;
        }
        
        
        return $display;
    }     
     
     
     
       ///////////////////////////////////////////////////////////////////////////////////////////////////////////
      
      public function vehicleTransactionBetweenDate($fromdate,$todate){
        $data=array();
        $display=array();
        $i=0;
        $query=$this->db->select('vehicletransaction.vehicleid,vehicletransaction.vehicletransferdate,vehicletransaction.location,vehicletransaction.locationid,vehicletransaction.vehicletransferpurpose,vehicle.chasisno,vehicle.modalid')->from('vehicletransaction')
        ->join('vehicle','vehicle.vehicleid=vehicletransaction.vehicleid','left outer')
        
        ->where('vehicletransaction.vehicletransferdate >=',$fromdate)
        ->where('vehicletransaction.vehicletransferdate <=',$todate)
        ->order_by('vehicletransaction.vehicletransferdate','desc')
        ->get();
        if($query->num_rows()>0){
            foreach ($query->result() as $row){
                $modal=$this->load->model('ModalModel')?$this->ModalModel->getModalName($row->modalid):"NA";
                
                if($row->location==='Branch'){
                    $name=$this->load->model('BranchModel')?$this->BranchModel->getBranchName($row->locationid):"NA";
                }elseif($row->location==='Customer'){
                   $name=$this->load->model('CustomerModel')?$this->CustomerModel-> getCustomerName($row->locationid):"NA";
                }else{
                    $name="NA";
                }
                $data=array('vehicleid'=>$row->vehicleid,'location'=>$row->location,'locationid'=>$name,'purpose'=>$row->vehicletransferpurpose,'chasisno'=>$row->chasisno,'modalid'=>$modal,'transferdate'=>$row->vehicletransferdate);
                $display[$i++]=$data;
            }
        }else{
             $data=array('vehicleid'=>'0','location'=>'NA','locationid'=>'0','purpose'=>'NA','chasisno'=>'NA','modalid'=>'0','transferdate'=>'0000-00-00');
                $display[$i++]=$data;
        }
        
        
        return $display;
    }     
         
   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
     
     
     
         
     //Get Delivery Challanid Of Particular Vehicle  
     public function  getChallanId($vehicleid){
        // $challanid=0;
          $query = $this->db->select('vehicletransactionid')
                ->from('vehicletransaction')
                ->where('vehicleid',$vehicleid)
                ->order_by('vehicletransactionid','desc')
                
                ->get();
         if ($query->num_rows() === 1) { 
              foreach ($query->result() as $row) {
                  $challanid=$row->vehicletransactionid;
              }
             
         } else {
             $challanid="0";
         }
         return $challanid;
                
     }//End of Vehicle Challan id
   
       
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////     
       
       
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
     
  /*   
     
         
     //Get Delivery Challanid Of Particular Vehicle  
     public function  getChallanId($vehicleid){
        // $challanid=0;
          $query = $this->db->select('vehicletransactionid')
                ->from('vehicletransaction')
                ->where('vehicleid',$vehicleid)
                ->order_by('vehicletransactionid','desc')
                
                ->get();
         if ($query->num_rows() === 1) { 
              foreach ($query->result() as $row) {
                  $challanid=$row->vehicletransactionid;
              }
             
         } else {
             $challanid="0";
         }
         return $challanid;
                
     }//End of Vehicle Challan id
   
       */
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
       
       
   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
     
     
     
         
     //Get Last Delivery Challanid Of Particular Vehicle  
     public function  getLastChallanId($vehicleid){
        // $challanid=0;
          $query = $this->db->select('vehicletransactionid')
                ->from('vehicletransaction')
                ->where('vehicleid',$vehicleid)
                ->order_by('vehicletransactionid','desc')
                
                ->get();
         if ($query->num_rows()>0) { 
             $challanid=$query->first_row()->vehicletransactionid;
            /*  foreach ($query->result() as $row) {
                  $challanid=$row->vehicletransactionid;
              }*/
             
         } else {
             $challanid="0";
         }
         return $challanid;
                
     }//End of Vehicle Challan id
   
       
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////      
       
       
    
     public function  vehicleMovementOfChasis($chasisid){
      $data=array();
        $display=array();
        $i=0;
        $query=$this->db->select('vehicletransaction.vehicleid,vehicletransaction.vehicletransferdate,vehicletransaction.location,vehicletransaction.locationid,vehicletransaction.vehicletransferpurpose,vehicle.chasisno,vehicle.modalid')->from('vehicletransaction')
        ->join('vehicle','vehicle.vehicleid=vehicletransaction.vehicleid','left outer')
        
        ->where('vehicletransaction.vehicleid',$chasisid)
        ->get();
        if($query->num_rows()>0){
            foreach ($query->result() as $row){
                $modal=$this->load->model('ModalModel')?$this->ModalModel->getModalName($row->modalid):"NA";
                
                if($row->location==='Branch'){
                    $name=$this->load->model('BranchModel')?$this->BranchModel->getBranchName($row->locationid):"NA";
                }elseif($row->location==='Customer'){
                   $name=$this->load->model('CustomerModel')?$this->CustomerModel-> getCustomerName($row->locationid):"NA";
                }else{
                    $name="NA";
                }
                $data=array('vehicleid'=>$row->vehicleid,'location'=>$row->location,'locationid'=>$name,'purpose'=>$row->vehicletransferpurpose,'chasisno'=>$row->chasisno,'modalid'=>$modal,'transferdate'=>$row->vehicletransferdate);
                $display[$i++]=$data;
            }
        }else{
             $data=array('vehicleid'=>'0','location'=>'NA','locationid'=>'0','purpose'=>'NA','chasisno'=>'NA','modalid'=>'0','transferdate'=>'0000-00-00');
                $display[$i++]=$data;
        }
        
        
        return $display;   
         
         
         
         
         
     }
   
    public function getChasisList(){
         $field = 'vehicleid';
            $order = 'DESC';
       
        $display="";
        $displayUsers = array();
        $query = $this->db->select('vehicleid,chasisno')
                ->from('vehicle')
                ->order_by($field, $order)
                ->get();
                
        
        if ($query->num_rows() === 0) {
            //$display="<option>No Record Found</option>";
            $displayUsers = array('message'=>"No Record Found");
           // echo $display;
            //echo $displayUsers;
           return $displayUsers;
        } else {
            $i=0;
            $data=array();
           
                        
                       
            foreach ($query->result() as $row) {
                //$display.= '<option value="' . $row->customerid . '">' .  $row->customername . '</option>';
                $data=array('vehicleid'=>$row->vehicleid,'chasisno'=>$row->chasisno);
                $displayUsers[$i++]=$data;
            // echo $row->chasisno;
                
            }
           // echo $displayUsers['chasisno'];
            
           
            return $displayUsers;
        }
        
        
        
        
    }
     public function getCustomerById(){}
     public function getCustomerByName(){}
     
     
     public function getChallanDetail($challanid){
         
           $challanDetail = array();
        $query = $this->db->select('*')
                ->from('vehicletransaction')
                ->where('vehicletransactionid',$challanid)
                //->order_by($field, $order)
                ->get();
                
        
        if ($query->num_rows() === 0) {
            //$display="<option>No Record Found</option>";
            $challanDetail[0] = array('vehicletransferdate'=>'NA','vehicletransferpurpose'=>'NA','mirror'=>'NA','servicebook'=>'NA',
                'tools'=>'NA','vehicleid'=>'NA',''=>'NA','vehicletransactionid'=>'NA');
          
           return  $challanDetail;
        } elseif($query->num_rows() === 1) {
            $i=0;
            $data=array();
           
                        
                       
            foreach ($query->result() as $row) {
                
                $data= array('vehicletransferdate'=>$row->vehicletransferdate,'vehicletransferpurpose'=>$row->vehicletransferpurpose,'mirror'=>$row->mirror,'servicebook'=>$row->servicebook,'tools'=>$row->tools,'vehicleid'=>$row->vehicleid,''=>'NA','vehicletransactionid'=>$row->vehicletransactionid);
          $challanDetail[$i++]=$data;
           
                
            }
          // echo $chasisDetail[0]['chasisno'];
            
           
            return $challanDetail;
        }
        
     
     }
    
    
   /* 
     $customername=$this->customerModel->getCustomerName($customerid);
        $customeraddressline1=$this->customerModel->getCustomerAddressLine1($customerid);
        $customeraddressline2=$this->customerModel->getCustomerAddressLine2($customerid);
        $customercontact=$this->customerModel->getCustomerContact($customerid);
       }else{
    */
    
    public function getCustomerName($customerid){
        $customername="na";
         $query = $this->db->select('customername')
                ->from('customer')
                ->where('customerid', $customerid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $customername= $row->customername;
            }
        }
        return $customername;
        
    }
    
    public function getCustomerAddressLine1($customerid){
        $addressline1="na";
        
         $query = $this->db->select('customeraddressline1')
                ->from('customer')
                ->where('customerid', $customerid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $addressline1= $row->customeraddressline1;
            }
        }
        
        
        
        return $addressline1;
        
    }
    public function getCustomerAddressLine2($customerid){
        $addressline2="na";
        
         $query = $this->db->select('customeraddressline2')
                ->from('customer')
                ->where('customerid', $customerid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $addressline2= $row->customeraddressline2;
            }
        }
        
        
        return $addressline2;
    }
    public function getCustomerContact($customerid){
        $contact="0000000000";
        
         $query = $this->db->select('customercontact')
                ->from('customer')
                ->where('customerid', $customerid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $contact= $row->customercontact;
            }
        }
        
        
        return $contact;
    }
    
    
    
    
    
    
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