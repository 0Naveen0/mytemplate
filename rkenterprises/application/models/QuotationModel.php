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
class QuotationModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    
   /* 
    
    if($this->load->model('invoiceModel')){
                       $invoiceno=$this->invoiceModel->getInvoiceNumber($chasisid);
                       $price=$this->invoiceModel->getBasicPrice($chasisid);
                       $hypothecation=$this->invoiceModel->getHypothecation($chasisid);
                   }
    
    
    */
    
    
    
     public function addQuotation($data){
         /*
        $invoiceinsertdata=array('vehicleid'=>$vehicleid,'invoicedate'=>$invoicedate,'invoiceno'=>$invoiceno,'customerid'=>$customerid,'hypothecation'=>$hypothecation,'basicprice'=>$basicprice);
         */
        // $chasisid=$data['vehicleid'];
      // if ( !$this->isChassisExist($chasisid)){
        $query=$this->db->insert('quotation',$data);
        if($query){
       return "Quotation Added Successfully";
       }else{
       return "Data Insertion Failed";
       } 
     //  }else {
     //      $invoiceno=$this->getInvoiceNumber($chasisid);
     //      return "Invoice (".$invoiceno." )Already Generated for this Chassis.";
      // }
         
     }
    
    // public function addCustomer(){}
       public function editQuotation(){}
       public function deleteQuotation(){}
       
       public function getQuotationDetails($search,$column){
          // var_dump($search);var_dump($column);
		   $data=array();
      $data[0]=array(
                     'customerid'=>0,
                     'quotationid'=>"",
                     'quotationno'=>"",
                     'quotationdate'=>"",
                     'enquiryid'=>0,
                     'vehicleprice'=>0,
                     'insurance'=>0,
                     'registration'=>0,
                     'permit' =>0,
                     'accessories'=>0,
                     'others'=>0,
                     'modalid'=>0,
                     'discount'=>0,
                     'modalname'=>""
                     );
	  
       $modal="NA";
            if($column==='quotationid'){
                $field=$column;
            }else if($column==='quotationno'){
               $field=$column;
                
            }else if($column==='customerid'){
               $field=$column;
                
            }else{
                $field='quotationid';
               // $column='customerid';
                $search=5;
                
            }
			
             
            $order = 'ASC';
			
			
			
             $query = $this->db->select('*')
                      ->from('quotation')
             
			  
                      ->like($field, $search)
                      ->order_by($field, $order)
                      ->get();
               //  var_dump($query) ;    
					 
                if ($query->num_rows()>= 1) {
                    
                     $i=0;
            
             foreach ($query->result() as $row) {
                 //var_dump($row->customerid);
                 
             $customerdetail=array();
             if($this->load->model('customerModel')){
                 //var_dump($this -> customerModel ->getCustomerDetails(1,'customerid'));
             }
             
             $customerdetail=$this->load->model('customerModel') ?json_decode( $this -> customerModel ->getCustomerDetails($row->customerid,'customerid'),true):"NA";
             		 
             $modal=$customerdetail[0]['modalname'];
			 $modalid=$customerdetail[0]['modalid'];
	
             //$modal=$this->load->model('modalModel') ? $this -> modalModel -> getModalName($row->modelid):"NA";
           
              
            
                 $data[$i++]=array(
                     'customerid'=>$row->customerid,
                     'quotationid'=>$row->quotationid,
                     'quotationno'=>$row->quotationno,
                     'quotationdate'=>$row->quotationdate,
                     'enquiryid'=>$row->enquiryid,
                     'vehicleprice'=>$row->vehicleprice,
                     'insurance'=>$row->insurance,
                     'registration'=>$row->registration,
                     'permit' =>$row->permit,
                     'accessories'=>$row->accessories,
                     'others'=>$row->others,
                     //'modalid'=>$row->modelid,
                     'modalid'=>$modalid,
                     'discount'=>$row->discount,
                     'modalname'=>$modal
                     );
                }
                   
                    
                }else{
					
                    $data[0]=array(
                     'customerid'=>1,
                     'quotationid'=>"",
                     'quotationno'=>"",
                     'quotationdate'=>"",
                     'enquiryid'=>0,
                     'vehicleprice'=>0,
                     'insurance'=>0,
                     'registration'=>0,
                     'permit' =>0,
                     'accessories'=>0,
                     'others'=>0,
                     'modalid'=>0,
                     'discount'=>0,
                     'modalname'=>""
                     );
					
                }
                //var_dump($data);
                return json_encode($data);
				
				
				
            
        }
   
   
   
   public function getModalList(){
        $field = 'modalname';
            $order = 'ASC';
            $i=0;
            $modalList=array();
             $query = $this->db->select('modalid,modalname')
                ->from('modal')
                ->order_by($field, $order)
                ->get();
                
                 if ($query->num_rows() === 0) {
            $modalList[$i]=['modalid'=>0,'modalname'=>'No Record Found'];
            
        } else {
             foreach ($query->result() as $row) {
                $modalList[$i++] =['modalid'=>$row->modalid,'modalname'=>$row->modalname];
               
             }
        }
   
   return $modalList;
   
   }
   
   
   public function isQuotationExist($quotationid){
       $quotationExist=0;
        $query = $this->db->select('quotationid')
                ->from('quotation')
                ->where('quotationid', $quotationid)
                ->get();
                if ($query->num_rows() === 1) {
           $quotationExist=1;
        }
        return $quotationExist;
       
   }
   
   public function isChassisExist($chasisid){
       $chasisExist=0;
        $query = $this->db->select('invoiceno')
                ->from('invoice')
                ->where('vehicleid', $chasisid)
                ->get();
                if ($query->num_rows() === 1) {
           $chasisExist=1;
        }
        return $chasisExist;
       
   }
   
   public function getInvoiceNumber($customerid){
        $quotationNo=0;
         $query = $this->db->select('quotationno')
                ->from('quotation')
                ->where('customerid', $customerid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $quotationNo= $row->quotationno;
            }
        }
        return $quotationNo;
        
    } 
   // getInvoiceId($vehicleid)
  //$quotationid=$this->load->model('quotationModel')?$this->quotationModel->getLastQuotationId():5; 
  
  public function getLastQuotationId(){
       $quotationId=5;
         $query = $this->db->select('quotationid')
                ->from('quotation')
                //->where('vehicleid', $chasisid)
                ->order_by('quotationid','desc')
                ->get();
                
                 if ($query->num_rows()>0) {
           
               $quotationId= $query->first_row()->quotationid;
            
        }
        return $quotationId;
                
   }
   
   public function getLastQuotationNo(){
       $quotationNo=0;
         $query = $this->db->select('quotationno')
                ->from('quotation')
                //->where('vehicleid', $chasisid)
                ->order_by('quotationid','desc')
                ->get();
                
                 if ($query->num_rows()>0) {
           
               $quotationNo= $query->first_row()->quotationno;
            
        }
        return $quotationNo;
                
   }
   
   
   
    public function getQuotationId($customerid){
        $quotationId=0;
         $query = $this->db->select('quotationid')
                ->from('quotation')
                ->where('customerid', $customerid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $quotationId= $row->quotationid;
            }
        }
        return $quotationId;
        
    } 
   
    public function getquotationDate($customerid){
        $quotationdate=0;
         $query = $this->db->select('quotationdate')
                ->from('quotation')
                ->where('customerid', $customerid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $quotationdate= $row->quotationdate;
            }
        }
        return $quotationdate;
        
    } 
   
   
   
   
   
    
   public function getVehiclePrice($quotationid){
        $modalprice=0.0;
         $query = $this->db->select('vehicleprice')
                ->from('quotation')
                ->where('quotationid', $quotationid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $modalprice= $row->vehicleprice;
            }
        }
        return $modalprice;
        
    } 
    
    public function getQuotationGst($customerid){
        $gst="";
         $query = $this->db->select('gst')
                ->from('quotation')
                ->where('customerid', $customerid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $gst= $row->gst;
            }
        }
        return $gst;
        
    } 
    
    
    public function getHypothecation($chasisid){
       // $hypothecation="Cash";
        $hypothecation="";
         //$query = $this->db->select('hypothecation.hypothecation')
          $query = $this->db->select('hypothecation.hypothecationfullname as hypothecation')
                ->from('hypothecation')
                ->join('invoice','hypothecation.hypothecationid=invoice.hypothecation','inner')
                ->where('invoice.vehicleid', $chasisid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
                $hypothecation= $row->hypothecation;
            }
        }
        return  $hypothecation;
        
    } 
   
   public function getModalCgst($modalid){
        $cgst="";
         $query = $this->db->select('cgst')
                ->from('modal')
                ->where('modalid', $modalid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $cgst= $row->cgst;
            }
        }
        return $cgst;
        
    } 

public function getModalSgst($modalid){
        $sgst="";
         $query = $this->db->select('sgst')
                ->from('modal')
                ->where('modalid', $modalid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $sgst= $row->sgst;
            }
        }
        return $sgst;
        
    } 
    
    
    public function getModalHsn($modalid){
        $hsn="";
         $query = $this->db->select('hsn')
                ->from('modal')
                ->where('modalid', $modalid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $hsn= $row->hsn;
            }
        }
        return $hsn;
        
    } 

   
    public function getModalClass($modalid){
        $class="";
         $query = $this->db->select('modalclass')
                ->from('modal')
                ->where('modalid', $modalid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $class= $row->modalclass;
            }
        }
        return $class;
        
    } 

   
   public function getModalBodyType($modalid){
        $type="";
         $query = $this->db->select('vehicletype')
                ->from('modal')
                ->where('modalid', $modalid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $type= $row->vehicletype;
            }
        }
        return strtoupper($type);
        
    } 
   
   
   public function getModalFuel($modalid){
        $fuel="";
         $query = $this->db->select('fuel')
                ->from('modal')
                ->where('modalid', $modalid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $fuel= $row->fuel;
            }
        }
        return strtoupper($fuel);
        
    } 
   
   public function getModalGrossWeight($modalid){
        $gross="";
         $query = $this->db->select('grossweight')
                ->from('modal')
                ->where('modalid', $modalid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $gross= $row->grossweight;
            }
        }
        return $gross;
        
    } 
    
    
    public function getModalWeight($modalid){
        $weight="";
         $query = $this->db->select('unladenweight')
                ->from('modal')
                ->where('modalid', $modalid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $weight= $row->unladenweight;
            }
        }
        return $weight;
        
    } 
    
    public function getModalHp($modalid){
        $hp="";
         $query = $this->db->select('cubiccapacity')
                ->from('modal')
                ->where('modalid', $modalid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $hp= $row->cubiccapacity;
            }
        }
        return $hp;
        
    } 
    
    
    
    public function getModalCylinder($modalid){
        $cylinder="";
         $query = $this->db->select('noofcylinder')
                ->from('modal')
                ->where('modalid', $modalid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $cylinder= $row->noofcylinder;
            }
        }
        return strtoupper($cylinder);
        
    } 
    
    public function getModalSeat($modalid){
        $seat="";
         $query = $this->db->select('seatingcapacity')
                ->from('modal')
                ->where('modalid', $modalid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
              $seat= $row->seatingcapacity;
            }
        }
        return $seat;
        
    } 
    
    
   
    public function getCustomerByBranchId($branchid){
         $field = 'customername';
            $order = 'ASC';
        /*
         if ($data === null) {
           
            $field = 'uid';
            $order = 'ASC';
        } else {
            $order = $data['order'];
            $field = $data['field'];
            
        }*/
        $display="";
        $displayUsers = array();
        $query = $this->db->select('customerid,customername')
                ->from('customer')
               // ->where('branchid', '100108')
               ->where('branchid', $branchid)
               ->order_by($field, $order)
                ->get();
        
                
        
        if ($query->num_rows() === 0) {
            $display="<option>No Record Found</option>";
            $displayUsers = array('message'=>"No Record Found");
            echo $display;
            //echo $displayUsers;
           // return $displayUsers;
        } else {
            $i=0;
            $data=array();
           
                        
                       
            foreach ($query->result() as $row) {
                $display.= '<option value="' . $row->customerid . '">' .  $row->customername . '</option>';
                $data[$i++]=array('customerid'=>$row->customerid,'customername'=>$row->customername);
                $displayUsers[$i++]=$data;
              // echo  '  <br/> '.$row->branchid.'   '.$row->branchname;
        // echo  '  <br/> '. $data['customerid'].'   '.$data['customername'];
                
            }
            
            
            if ($this->session->userdata('pageid')==='customerLedgerView'){
                return $data; 
            }else{
             
            echo $display;
            }
          
            //return $displayUsers;
        }
        
        
        
        
    }
     public function getCustomerById(){}
     public function getCustomerByName(){}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
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