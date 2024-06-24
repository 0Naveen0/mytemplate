<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of Modal_Model
 *
 * @author Naveen Kamal 
 */
class ModalModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    
     public function addModal($data){
         /*
         $insertdata=array('customername'=>$customername,'customeraddressline1'=>$customeraddressline1,'customeraddressline2'=>$customeraddressline2,'customerfathername'=>$customerfathername,'customerdistrict'=>$customerdistrict,'customerstate'=>$customerstate,'customerpin'=>$customerpin,'customercontact'=>$customercontact,'customeremail'=>$customeremail,'branchid=>$branchid','modalid'=>$modalid);
         */
        $query=$this->db->insert('modal',$data);
        if($query){
       return "Modal Added Successfully";
       }else{
       return "Data Insertion Failed";
       }  
         
     }
    
    // public function addCustomer(){}
       public function editCustomer(){}
       public function deleteCustomer(){}
   
   
   
   public function getModalList(){
        $field = 'modalname';
            $order = 'ASC';
            $i=0;
            $modalList=array();
             $query = $this->db->select('modalid,modalname')
                ->from('modal')
                //->like('modal.modalname','BSVI')
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
   
   public function getModalName($modalid){
        $modalname="NA";
         $query = $this->db->select('modalname')
                ->from('modal')
                ->where('modalid', $modalid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $modalname= $row->modalname;
            }
        }
        return $modalname;
        
    } 
   public function getModalPrice($modalid){
        $modalprice="";
         $query = $this->db->select('modalprice')
                ->from('modal')
                ->where('modalid', $modalid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $modalprice= $row->modalprice;
            }
        }
        return $modalprice;
        
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