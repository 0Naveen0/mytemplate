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
class TaxModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    
     public function addTax($data){
         /*
         $insertdata=array('customername'=>$customername,'customeraddressline1'=>$customeraddressline1,'customeraddressline2'=>$customeraddressline2,'customerfathername'=>$customerfathername,'customerdistrict'=>$customerdistrict,'customerstate'=>$customerstate,'customerpin'=>$customerpin,'customercontact'=>$customercontact,'customeremail'=>$customeremail,'branchid=>$branchid','modalid'=>$modalid);
         */
        $query=$this->db->insert('tax',$data);
        if($query){
       return "Tax Added Successfully";
       }else{
       return "Data Insertion Failed";
       }  
         
     }
    
    // public function addCustomer(){}
       public function editTax(){}
       public function deleteTax(){}
       
       public function getSubTax($taxid){
        $subtax=array();
        $subtax= ['taxsubcategory1'=>0,'taxsubcategory2'=>0];
        // $field = 'salesmanname';
        //    $order = 'ASC';
         $query = $this->db->select('taxsubcategory1,taxsubcategory2')
                ->from('tax')
                ->where('taxid', $taxid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $subtax= ['taxsubcategory1'=>$row->taxsubcategory1,'taxsubcategory2'=>$row->taxsubcategory2];
            }
        }
        return $subtax;
        
    }
   
    public function getSalesmanByBranchId($branchid){
         $field = 'salesmanname';
            $order = 'ASC';
       
        $display="";
        $displayUsers = array();
        $query = $this->db->select('salesmanid,salesmanname')
                ->from('salesman')
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
               // $display.= '<option value="' . $row->customerid . '">' .  $row->customername . '</option>';
                $data=array('salesmanid'=>$row->salesmanid,'salesmanname'=>$row->salesmanname);
                $displayUsers[$i++]=$data;
              
                
            }
            
            
            
          
            //return $displayUsers;
        }
        
        
        
        
    }
    
    public function getAllTax($status){
         $field = 'taxslab';
            $order = 'ASC';
            if($status==="active" || $status==="inactive"){;}else{$status="active";}
       
       // $display="";
        $displayList = array();
        $query = $this->db->select('taxid,taxslab')
                ->from('tax')
                ->where('status',$status )
              // ->where('branchid', $branchid)
               ->order_by($field, $order)
                ->get();
                
        
        if ($query->num_rows() === 0) {
           // $display="<option>No Record Found</option>";
            $displayList = array('taxid'=>"0",'taxslab'=>"NA");
            //echo $display;
            //echo $displayUsers;
           // return $displayUsers;
        } else {
            $i=0;
            $data=array();
           
                        
                       
            foreach ($query->result() as $row) {
               // $display.= '<option value="' . $row->customerid . '">' .  $row->customername . '</option>';
                $data=array('taxid'=>$row->taxid,'taxslab'=>$row->taxslab);
                $displayList[$i++]=$data;
              
                
            }
            
            
            
          
            return $displayList;
        }
        
        
        
        
    }
    
     public function getCustomerById(){}
     public function getCustomerByName(){}
    
    
  
    
    
    
    
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
    
    
    
     public function getSalesmanFather($salesmanid){
        $father="na";
        
         $query = $this->db->select('salesmanfathername')
                ->from('salesman')
                ->where('salesmanid', $salesmanid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $father= $row->salesmanfathername;
            }
        }
        
        
        return $father;
    }
    
    
    
    
    
 public function getSalesmanPin($salesmanid){
        $pin="na";
        
         $query = $this->db->select('salesmanpin')
                ->from('salesman')
                ->where('salesmanid', $salesmanid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $pin= $row->salesmanpin;
            }
        }
        
        
        return $pin;
    }   




    
    public function getSalesmanAddressLine1($salesmanid){
        $addressline1="na";
        
         $query = $this->db->select('salesmanaddressline1')
                ->from('salesman')
                ->where('salesmanid', $salesmanid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $addressline1= $row->salesmanaddressline1;
            }
        }
        
        
        
        return $addressline1;
        
    }
    
    
    
    
    
    
    
    
    public function getSalesmanAddressLine2($salesmanid){
        $addressline2="na";
        
         $query = $this->db->select('salesmanaddressline2')
                ->from('salesman')
                ->where('salesmanid', $salesmanid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $addressline2= $row->salesmanaddressline2;
            }
        }
        
        
        return $addressline2;
    }
    
    
    
    
    
    
    
    
    
    public function getSalesmanContact($salesmanid){
        $contact="0000000000";
        
         $query = $this->db->select('salesmancontact')
                ->from('salesman')
                ->where('salesmanid', $salesmanid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $contact= $row->salesmancontact;
            }
        }
        
        
        return $contact;
    }
    
    
    
    
    
    
    
     public function getSalesmanDistrict($salesmanid){
        $district="";
        
         $query = $this->db->select('salesmandistrict')
                ->from('salesman')
                ->where('salesmanid', $salesmanid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $district= $row->salesmandistrict;
            }
        }
        
        
        return $district;
    }
    
     public function getSalesmanState($salesmanid){
        $state="";
        
         $query = $this->db->select('salesmanstate')
                ->from('salesman')
                ->where('salesmanid', $salesmanid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $state= $row->salesmanstate;
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