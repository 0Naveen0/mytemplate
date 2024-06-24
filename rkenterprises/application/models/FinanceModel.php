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
class FinanceModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    
      public function addEmptyFile($data){
         
          $financequery=$this->db->insert('finance',$data);
        
            if ($financequery){
               $chasisid=$data['chasisid'];
             $fileid=  $this->getFileId($chasisid);
             $d1=array('fileid'=>$fileid);
               $this->db->where('vehicleid',$chasisid);
               $this->db->update('vehicle',$d1);
                
       return "|File Added Successfully|";
            
       }else{
       return "|Data Insertion Failed|";
       }  
         
     }
     
     
        public function updateFinanceData($financedata,$financeid){
      // $data=array('customerid'=>$customerid);
      $data=array();
      $data=$financedata;
     // echo $data['cibilstatus'];
    //  echo $financeid;
       
       $this->db->where('financeid',$financeid);
      $result= $this->db->update('finance',$data);
      if($result){
          return "Updated Successfully";
      }else{
          return "Update Failed";
      }
       
       
       
   } 
     
     public function  getFileId($chasisid){
         $fileid="";
         $query=$this->db->select('financeid')
         ->from('finance')
         ->where('chasisid',$chasisid)
         ->get();
         
          if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $fileid= $row->financeid;
            }
        }
        return $fileid;
         
         
     }

 public function  getFileIdOfChasisNo($chasisno){
         $fileid="";
         //echo $chasisno;
         $query=$this->db->select('financeid')
         ->from('finance')
         ->join('vehicle','finance.chasisid=vehicle.vehicleid','inner')
         ->where('vehicle.chasisno',$chasisno)
         ->get();
         
          if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $fileid= $row->financeid;
              // echo $fileid;
            }
        }
        return $fileid;
         
         
     }
 public function  getCibilStatus($financeid){
         $cibil=array();
         $cibil=['cibilstatus'=>"NA",'cibildate'=>"0000-00-00"];
         $query=$this->db->select('cibilstatus,cibildate')
         ->from('finance')
         ->where('financeid',$financeid)
         ->get();
         
          if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $cibil=['cibilstatus'=>$row->cibilstatus,'cibildate'=>$row->cibildate];
            }
        }
        return $cibil;
         
         
     }

 public function  getAgreementStatus($financeid){
         $agreement=array();
         $agreement=['agreementstatus'=>"NA",'agreementdate'=>"0000-00-00"];
         $query=$this->db->select('agreementstatus,agreementdate')
         ->from('finance')
         ->where('financeid',$financeid)
         ->get();
         
          if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $agreement=['agreementstatus'=>$row->agreementstatus,'agreementdate'=>$row->agreementdate];
            }
        }
        return $agreement;
         
         
     }



 public function  getDoStatus($financeid){
         $do=array();
         $do=['deliveryorder'=>"NA",'dodate'=>"0000-00-00"];
         $query=$this->db->select('deliveryorder,dodate')
         ->from('finance')
         ->where('financeid',$financeid)
         ->get();
         
          if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $do=['deliveryorder'=>$row->deliveryorder,'dodate'=>$row->dodate];
            }
        }
        return $do;
         
         
     }



 public function  getPddStatus($financeid){
         $pdd=array();
         $pdd=['pddstatus'=>"NA",'pddsubmitiondate'=>"0000-00-00"];
         $query=$this->db->select('pddstatus,pddsubmitiondate')
         ->from('finance')
         ->where('financeid',$financeid)
         ->get();
         
          if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $pdd=['pddstatus'=>$row->pddstatus,'pddsubmitiondate'=>$row->pddsubmitiondate];
            }
        }
        return $pdd;
         
         
     }
     
     
     
     public function  getDocumentStatus($financeid){
         $pdd=array();
         $pdd=['status'=>"NA"];
         $query=$this->db->select('documents')
         ->from('finance')
         ->where('financeid',$financeid)
         ->get();
         
          if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $pdd=['status'=>$row->documents];
            }
        }
        return $pdd['status'];
         
         
     }
     

public function  getAmountStatus($financeid){
         $amount=array();
         $amount=['loanamount'=>"NA",'paymentdate'=>"0000-00-00",'doamount'=>0,'paymentstatus'=>"NULL"];
         $query=$this->db->select('doamount,paymentdate,payment,loanamount')
         ->from('finance')
         ->where('financeid',$financeid)
         ->get();
         
          if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $amount=['loanamount'=>$row->loanamount,'paymentdate'=>$row->paymentdate,'doamount'=>$row->doamount,'paymentstatus'=>$row->payment];
            }
        }
        return $amount;
         
         
     }




    
   public function updateCustomerId($customerid,$chasisid){
       $data=array('customerid'=>$customerid);
       
       $this->db->where('chasisid',$chasisid);
      $result= $this->db->update('finance',$data);
      if($result){
          echo "Updated Successfully";
      }else{
          echo "Something Went Wrong";
      }
       
       
       
   } 
    
    
    public function getFinancedVehicleList(){
         $field = 'financeid';
            $order = 'DESC';
       
        $display="";
        $displayUsers = array();
        $query = $this->db->select('finance.financeid,vehicle.chasisno,finance.customerid,finance.chasisid,customer.customername')
                ->from('finance')
                ->join('vehicle','finance.chasisid=vehicle.vehicleid','inner')
                ->join('customer','finance.customerid=customer.customerid','inner')
                //->on('finance.chasisid','vehicle.vehicleid')
                ->where('finance.customerid > ',0)
                ->order_by($field, $order)
                ->get();
                
        
        if ($query->num_rows() === 0) {
           
            $displayUsers = array('message'=>"No Record Found");
          
          
        } else {
            $i=0;
            $data=array();
           
            foreach ($query->result() as $row) {
               
                $data=array('financeid'=>$row->financeid,'chasisid'=>$row->chasisid,'chasisno'=>$row->chasisno,'customerid'=>$row->customerid,'customername'=>$row->customername);
                $displayUsers[$i++]=$data;
          
                
            }
         
            
           
            return $displayUsers;
        }
        
        
        
        
    }  
    
    
    
    
    
    
    
    
    
     public function getFinancerName($financerid){
        $financer="na";
         $query = $this->db->select('')
                ->from('hypothecation')
                ->where('hypothecationid', $financerid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $financer= $row->hypothecation;
            }
        }
        return $financer;
        
    }
    
    public function getCustomerName($financeid){
        $name="na";
         $query = $this->db->select('customer.customername')
                ->from('finance')
                ->join('customer','finance.customerid=customer.customerid','inner')
                ->where('finance.financeid', $financeid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $name= $row->customername;
            }
        }
        return $name;
        
    } 
    
    
     public function getChasisNo($financeid){
        $chasisno="na";
         $query = $this->db->select('vehicle.chasisno')
                ->from('finance')
                ->join('vehicle','finance.chasisid=vehicle.vehicleid','inner')
                ->where('finance.financeid', $financeid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $chasisno= $row->chasisno;
            }
        }
        return $chasisno;
        
    } 
    
    
     public function getFinancersName($financeid){
        $name=['financerid'=>0,'financername'=>"NA"];
         $query = $this->db->select('hypothecation.hypothecation,finance.financerid')
                ->from('finance')
                ->join('hypothecation','finance.financerid=hypothecation.hypothecationid','inner')
                ->where('finance.financeid', $financeid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $name=['financerid'=>$row->financerid,'financername'=>$row->hypothecation];
            }
        }
        return $name;
        
    } 
    
     public function getExecutiveName($financeid){
        $name=['executiveid'=>0,'executivename'=>"NA"];
         $query = $this->db->select('financeexecutive.financeexecutive,finance.financerexecutiveid')
                ->from('finance')
                ->join('financeexecutive','finance.financerexecutiveid=financeexecutive.financeexecutiveid','inner')
                ->where('finance.financeid', $financeid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $name=['executiveid'=>$row->financerexecutiveid,'executivename'=>$row->financeexecutive];
            }
        }
        return $name;
        
    } 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     public function addRemark(){}
       public function editRemark(){}
       public function deleteRemark(){}
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    public function getAllRemark(){
         $field = 'remark';
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
        $query = $this->db->select('remarkid,remark')
                ->from('remark')
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
                $data=array('remarkid'=>$row->remarkid,'remarkname'=>$row->remark);
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
     public function getBranchById(){}
     public function getBranchByName(){}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
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