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
class DayBookModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    
   
     public function addTransaction($data){
        // $insertdata=array('transactionDate'=>$tdate,'branchId'=>$branchid,'customerId'=>$customerid,'transactionType'=>$type,'transactionAmount'=>$amount,'$remarkId'=>$remarkid,'comment'=>$comment);
       // transactiontype,transactionamount,remarkid,comment,executerid,transactiondate,customerid
        
        $query=$this->db->insert('transaction',$data);
        if($query){
			$transactionId = $this->db->insert_id();
       return "Added Successfully (Receipt No-{$transactionId})";
       }else{
       return "Data Insertion Failed";
       }  
         
     }
       public function editBranch(){}
       public function deleteBranch(){}
   
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
     public function getBranchById(){}
     public function getBranchByName(){}
    
    	public function viewCustomerSummaryByBranchId($branchid){
			$branchid=100101;
		$field=customer.branchid;
$condition=$branchid;
$creditquery=$this->db->select('customer.customername as  "name",sum(transaction.transactionamount) as  "credit" ')
						->from('customer')
->join('transaction',' (customer.customerid=transaction.customerid and transaction.transactiontype="credit")','inner')
-> where($field,$condition)
->group_by('customer.name')
->get_compiled_select($reset=FALSE);


$debitquery=$this->db->select('customer.customername as  "name",sum(transaction.transactionamount) as  "debit" ')
	->from('customer')
->join('transaction','(customer.customerid=transaction.customerid and transaction.transactiontype="debit")','inner')
-> where($field,$condition)
->group_by('customer.name')
->get_compiled_select($reset=FALSE);
echo $creditquery;
echo $debitquery;

$mainquery=$this->db->select('t1.name as  "Name",t2.debit as  "Debit" ,t1.credit as  "Credit",(t2.debit-t1.credit) as "Balance" ',FALSE)
->from($creditquery .'as t1')
->join($debitquery .' as t2','t1.name=t2.name','inner')
->get();
$displayUsers="";
 if ($mainquery->num_rows() === 0) {
	 
            $displayCustomerData = array('message'=>"No Record Found");
            $displayUsers="No Record Found";
			echo $displayUsers;
           // return $displayCustomerData;
        } else {
            $i=0;
            $data=array();
            $displayUsers.="<div class='table-responsive'><table class='table  table-striped table-bordered dataTable' id='dataTableBranchSummary'><thead>";
            $displayUsers.="<tr><th>" ." Sr" . "</th><th>" . "Name" . "</th>"
                       . "<th>" . "Debit" . "</th><th>" . "Credit" . "</th><th>" . "Balance" . "</th></tr></thead><tbody>";
            foreach ($mainquery->result() as $row) {
                $displayUsers.="<tr><td>" . ++$i . "</td><td>" . $row->Name . "</td>"
                       . "<td>" . $row->Debit . "</td><td>" . $row->Credit . "</td><td>" . $row->Balance . "</td></tr>";
                
               $data=array('serial'=>$i+1,'customername'=>$row->Name,'debit'=>$row->Debit,'credit'=>$row->Credit,'balance'=>$row->Balance);
               echo $row->Name;
               echo $data[4];
                $displayCustomerData[$i++]=$data;
                      
            }
            $displayUsers.="</tbody></table></div>";
	//	echo $displayUsers;
		 return $displayCustomerData;	
	}	
	
	}
    
    
    public function getDuesByCustomerId($customerid){
        $dues="NA";
        
     $debitquery=$this->db->select('sum(transactionamount) as debit') 
     ->from('transaction')
     ->where('transactiontype','debit')
     ->where('customerid',$customerid)
    ->get();
     //->get_compiled_select();
    // echo  $debitquery;
     
        
       foreach ($debitquery->result() as $row) {  
           $debit=$row->debit;
       }
        
        
        
  $creditquery=$this->db->select('sum(transactionamount) as credit') 
     ->from('transaction')
     ->where('transactiontype','credit')
     ->where('customerid',$customerid)
     ->get();
         foreach ($creditquery->result() as $row) {  
           $credit=$row->credit;
       }
           
       $dues='"'.$debit."-"."'".$credit."'"; 
       $dues=$debit-$credit; 
        
        
        
        return $dues;
        
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