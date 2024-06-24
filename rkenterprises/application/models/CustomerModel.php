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
class CustomerModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    
     public function isContactExist($contact){
         $field="customercontact";
         $query = $this->db->select('customercontact')
                ->from('customer')
              
               ->where($field, $contact)
               
                ->get();
                
                 if ($query->num_rows() > 0) {
                     return TRUE;
                 }else{
                     return FALSE;
                 }
     }
    
     public function addCustomer($data){
         /*
         $insertdata=array('customername'=>$customername,'customeraddressline1'=>$customeraddressline1,'customeraddressline2'=>$customeraddressline2,'customerfathername'=>$customerfathername,'customerdistrict'=>$customerdistrict,'customerstate'=>$customerstate,'customerpin'=>$customerpin,'customercontact'=>$customercontact,'customeremail'=>$customeremail,'branchid=>$branchid','modalid'=>$modalid);
         */
         if (!$this->isContactExist($data["customercontact"])){
             
             $query=$this->db->insert('customer',$data);
        if($query){
       return "Customer Added Successfully";
       }else{
       return "Data Insertion Failed";
       }  
        // return "Customer Added Successfully";     
         }else{
             return "Customer Already Exist";
         }
        
         
     }
     
     
    
   
    // public function EDIT Customer(){}
     public function editCustomer($customerid,$data){
          // echo ($customerid."------".var_dump($data));
           $updatedata=array('customername'=>$data["customername"],'customeraddressline1'=>$data["customeraddressline1"],'customeraddressline2'=>$data["customeraddressline2"],'customerfathername'=>$data["customerfathername"],'customerdistrict'=>$data["customerdistrict"],'customerstate'=>$data["customerstate"],'customerpin'=>$data["customerpin"],'customercontact'=>$data["customercontact"],'customeremail'=>$data["customeremail"],'branchid'=>$data["branchSelect"],'modalid'=>$data["modalSelect"]);
         //  echo ($customerid."=======".var_dump($updatedata));
           $this->db->where('customerid',$customerid);
    if ($this->db->update("customer", $updatedata)) {
            return "Success";
        }else{
             return "Failed";
        }
           
       }
       public function deleteCustomer($id){
           $this->db->where('customerid', $id);
          if($this->db->delete('customer')){
              return "Customer Deleted Successfully!";
          }else{
              return "Error in Deleting Customer!";
          }
       }
       
       public function searchCustomer($customername){
             $field = 'customername';
            $order = 'ASC';
             $query = $this->db->select('*')
                ->from('customer')
              
               ->like($field, $customername)
               ->order_by($field, $order)
                ->get();
                if ($query->num_rows() > 0) {
                     $i=0;
            $data=array();
             foreach ($query->result() as $row) {
                 $branch=$this->load->model('branchmodel')?$this->branchmodel->getBranchName($row->branchid):"NA";
                 $modal=$this->load->model('modalmodel')?$this->modalmodel->getModalName($row->modalid):"NA";
                 $data[$i++]=array(
                     'customerid'=>$row->customerid,
                     'customername'=>$row->customername,
                     'customeraddressline1'=>$row->customeraddressline1,
                     'customerfathername'=>$row->customerfathername,
                     'customeraddressline2'=>$row->customeraddressline2,
                     'customerdistrict'=>$row->customerdistrict,
                     'customerstate'=>$row->customerstate,
                     'customerpin'=>$row->customerpin,
                     'customercontact' =>$row->customercontact,
                     'customeremail'=>$row->customeremail,
                     'branchid'=>$row->branchid,'modalid'=>$row->modalid,'branchname'=>$branch,'modalname'=>$modal
                     );
                }
                    
                    
                }else{
                    $data[0]=array(
                     'customerid'=>"",
                     'customername'=>"",
                     'customeraddressline1'=>NULL,
                     'customerfathername'=>"",
                     'customeraddressline2'=>NULL,
                     'customerdistrict'=>NULL,
                     'customerstate'=>NULL,
                     'customerpin'=>NULL,
                     'customercontact' =>"",
                     'customeremail'=>"",
                     'branchid'=>"",'modalid'=>"",'branchname'=>"",'modalname'=>""
                     );
                }
                return json_encode($data);
            
        }
        
        
        
        
     public function searchCustomerByContact($contact){
             $field = 'customercontact';
            $order = 'ASC';
             $query = $this->db->select('*')
                ->from('customer')
              
               ->like($field, $contact)
               ->order_by($field, $order)
                ->get();
                if ($query->num_rows() > 0) {
                     $i=0;
            $data=array();
             foreach ($query->result() as $row) {
              $branch=$this->load->model('branchmodel')?$this->branchmodel->getBranchName($row->branchid):"NA";
              $modal=$this->load->model('modalmodel')?$this->modalmodel->getModalName($row->modalid):"NA";
                 $data[$i++]=array(
                     'customerid'=>$row->customerid,
                     'customername'=>$row->customername,
                     'customeraddressline1'=>$row->customeraddressline1,
                     'customerfathername'=>$row->customerfathername,
                     'customeraddressline2'=>$row->customeraddressline2,
                     'customerdistrict'=>$row->customerdistrict,
                     'customerstate'=>$row->customerstate,
                     'customerpin'=>$row->customerpin,
                     'customercontact' =>$row->customercontact,
                     'customeremail'=>$row->customeremail,
                     'branchid'=>$row->branchid,'modalid'=>$row->modalid,'branchname'=>$branch,'modalname'=>$modal
                     );
                }
                    
                    
                }else{
                    $data[0]=array(
                     'customerid'=>"",
                     'customername'=>"",
                     'customeraddressline1'=>NULL,
                     'customerfathername'=>"",
                     'customeraddressline2'=>NULL,
                     'customerdistrict'=>NULL,
                     'customerstate'=>NULL,
                     'customerpin'=>NULL,
                     'customercontact' =>"",
                     'customeremail'=>"",
                     'branchid'=>"",'modalid'=>"",'branchname'=>"",'modalname'=>""
                     );
                }
                return json_encode($data);
            
        }    
   
   public function getCustomerDetails($search,$column){
       //$this->load->model('modalmodel');
      
       $branch="NA";$modal="NA";
            if($column==='customerid'){
                $field=$column;
                 //var_dump($search);var_dump($field);
            }else if($column==='cutomercontact'){
               $field=$column;
                
            }else{
                $field='customerid';
               // $column='customerid';
                $search=1;
                
            }
             //$field =$column;
            $order = 'ASC';
             $query = $this->db->select('*')
                ->from('customer')
              
               ->where($field, $search)
               ->order_by($field, $order)
                ->get();
                
               //var_dump($query);
                if ($query->num_rows()=== 1) {
                    
                     $i=0;
            $data=array();
             foreach ($query->result() as $row) {
                // var_dump($row);
                 
             // $branch=$this->load->model('Branchmodel')?$this->branchmodel->getBranchName($row->branchid):"NA";
             //echo $row->branchid."   ".$row->modalid;
             $modal=$this->load->model('modalModel') ? $this -> modalModel -> getModalName($row->modalid):"NA";
             $branch=$this->load->model('branchModel') ? $this -> branchModel -> getBranchName($row->branchid):"NA";
              
             
             // $modal=$this->load->model('Modalmodel')?$this->modalmodel->getModalName($row->modalid):"NA";
                 $data[$i++]=array(
                     'customerid'=>$row->customerid,
                     'customername'=>$row->customername,
                     'customeraddressline1'=>$row->customeraddressline1,
                     'customerfathername'=>$row->customerfathername,
                     'customeraddressline2'=>$row->customeraddressline2,
                     'customerdistrict'=>$row->customerdistrict,
                     'customerstate'=>$row->customerstate,
                     'customerpin'=>$row->customerpin,
                     'customercontact' =>$row->customercontact,
                     'customeremail'=>$row->customeremail,
                     'branchid'=>$row->branchid,
                     'modalid'=>$row->modalid,
                     'branchname'=>$branch,
                     'modalname'=>$modal
                     );
                }
                    
                    
                }else{
                    $data[0]=array(
                     'customerid'=>"",
                     'customername'=>"",
                     'customeraddressline1'=>NULL,
                     'customerfathername'=>"",
                     'customeraddressline2'=>NULL,
                     'customerdistrict'=>NULL,
                     'customerstate'=>NULL,
                     'customerpin'=>NULL,
                     'customercontact' =>"",
                     'customeremail'=>"",
                     'branchid'=>"",'modalid'=>"",'branchname'=>"",'modalname'=>""
                     );
                }
                return json_encode($data);
            
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
    
    
    public function getCustomerBranch($customerid){
        $branchid="na";
         $query = $this->db->select('customer.branchid,branch.branchname')
                ->from('customer')
                ->join('branch','customer.branchid=branch.branchid','inner')
                
                ->where('customer.customerid', $customerid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $branchid= $row->branchname;
            }
        }
        return $branchid;
        
    }
    
    
    
     public function getCustomerFather($customerid){
        $father="na";
        
         $query = $this->db->select('customerfathername')
                ->from('customer')
                ->where('customerid', $customerid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $father= $row->customerfathername;
            }
        }
        
        
        return $father;
    }
    
    
    
    
    
 public function getCustomerPin($customerid){
        $pin="na";
        
         $query = $this->db->select('customerpin')
                ->from('customer')
                ->where('customerid', $customerid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $pin= $row->customerpin;
            }
        }
        
        
        return $pin;
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
    
    
    
    
    
    
    
     public function getCustomerDistrict($customerid){
        $district="";
        
         $query = $this->db->select('customerdistrict')
                ->from('customer')
                ->where('customerid', $customerid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $district= $row->customerdistrict;
            }
        }
        
        
        return $district;
    }
    
     public function getCustomerState($customerid){
        $state="";
        
         $query = $this->db->select('customerstate')
                ->from('customer')
                ->where('customerid', $customerid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $state= $row->customerstate;
            }
        }
        
        
        return $state;
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