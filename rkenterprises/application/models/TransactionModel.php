<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of User_Model
 * 
 *  $remark=$this->transactionModal->getRemark($transactionid);
        $customername=$this->transactionModal->getCustomerName($transactionid);
        $customeraddressline1=$this->transactionModal->getCustomerAddressLine1($transactionid);
        $customeraddressline2=$this->transactionModal->getCustomerAddressLine2($transactionid);
        $customercontact=$this->transactionModal->getCustomerContact($transactionid);
        $amount=$this->transactionModal->getTransactionAmount($transactionid);
        $amountinwords=$this->transactionModal->getTransactionAmountInWords($transactionid);
        $date=$this->transactionModal->getTransactionDate($transactionid);
 * 
 * 
 * 
 * 
 * 
 * 
 *
 * @author Naveen Kamal 
 */
 

class TransactionModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
   
   
    public function transactionOnDate($date,$type){
        $data=array();
        $display=array();
        $i=0;
        
        if($type==="credit"){
             $query=$this->db->select('transaction.transactionid,transaction.transactiondate,transaction.transactiontype,transaction.customerid,transaction.comment,customer.customername,transaction.transactionamount')->from('transaction')
        ->join('customer','customer.customerid=transaction.customerid','left outer')
        
        ->where('transaction.transactiontype',"credit")
        ->where('transaction.transactiondate',$date)
        ->get();
        }else if($type==="debit"){
             $query=$this->db->select('transaction.transactionid,transaction.transactiondate,transaction.transactiontype,transaction.customerid,transaction.comment,customer.customername,transaction.transactionamount')->from('transaction')
        ->join('customer','customer.customerid=transaction.customerid','left outer')
        
        ->where('transaction.transactiontype',"debit")
        ->where('transaction.transactiondate',$date)
        ->get();
        }else{
             $query=$this->db->select('transaction.transactionid,transaction.transactiondate,transaction.transactiontype,transaction.customerid,transaction.comment,customer.customername,transaction.transactionamount')->from('transaction')
        ->join('customer','customer.customerid=transaction.customerid','left outer')
        ->where('transaction.transactiondate',$date)
        
        //->where('transaction.transactiontype',"credit")
        ->get();
        }
        
       
        if($query->num_rows()>0){
            foreach ($query->result() as $row){
                $customername=$this->load->model('CustomerModel')?$this->CustomerModel-> getCustomerName($row->customerid):"NA";
                $branchname=$this->load->model('CustomerModel')?$this->CustomerModel-> getCustomerBranch($row->customerid):"NA";
                $chasisno="NA";
                
               
                $data=array('transactionid'=>$row->transactionid,'branchname'=>$branchname,'customername'=>$customername,'remark'=>$row->comment,'chasisno'=>$chasisno,'transactiondate'=>$row->transactiondate,'transactiontype'=>$row->transactiontype,'transactionamount'=>$row->transactionamount);
                $display[$i++]=$data;
            }
        }else{
            $data=array('transactionid'=>"",'branchname'=>"NA",'customername'=>"NA",'remark'=>"NA",'chasisno'=>"NA",'transactiondate'=>"0000-00-00",'transactiontype'=>"NA",'transactionamount'=>0);
                $display[$i++]=$data;
        }
        
        
        return $display;
        
        
   /*      echo "<tr><td>" .$row['transactionid'] . "</td><td>" .$row['transactiondate'] . "</td><td>" . $row['transactiontype'] . "</td>"
                       . "<td>" . $row['transactionamount'] . "</td><td>" . $row['branchname'] . "</td><td>" . $row['customername'] . "</td><td>" . $row['chasisno'] . "</td>
                       <td>" . $row['remark'] . "</td></tr>";*/
        
    }     
     
     
     
       ///////////////////////////////////////////////////////////////////////////////////////////////////////////
      
      public function transactionBetweenDate($fromdate,$todate,$type){
        $data=array();
        $display=array();
        $i=0;
         if($type==="credit"){
            
        }else if($type==="debit"){
            
        }else{
            
        }
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
     
     
   
   
   
   
   
   
   
   
   
   
   
   
    
    public function getCustomerId($transactionid){
        
        $customerid=NULL;
        $query = $this->db->select('customerid')
                ->from('transaction')
                ->where('transactionid',$transactionid)
                ->get();
        if ($query->num_rows() === 1) {
           
           foreach ($query->result() as $row) {
               
                 $customerid=$row->customerid;
            }
           
        } 
        
        return $customerid;
    }
    
    
    
     public function getRemarkId($transactionid){
        $remarkid=NULL;
         $query = $this->db->select('remarkid')
                ->from('transaction')
                ->where('transactionid',$transactionid)
                ->get();
        if ($query->num_rows() === 1) {
           
           foreach ($query->result() as $row) {
               
                 $remarkid=$row->remarkid;
            }
           
        } 
    
        return $remarkid;
    }
    
    
    
    
    public function getTransactionDate($transactionid){
      $transactiondate="0000-00-00";
       $query = $this->db->select('transactiondate')
                ->from('transaction')
                ->where('transactionid',$transactionid)
                ->get();
        if ($query->num_rows() === 1) {
           
           foreach ($query->result() as $row) {
               
                 $transactiondate=$row->transactiondate;
            }
           
        } 
       return  $transactiondate;
    }
    
    public function getTransactionAmount($transactionid){
        $amount=0;
        $query = $this->db->select('transactionamount')
                ->from('transaction')
                ->where('transactionid',$transactionid)
                ->get();
        if ($query->num_rows() === 1) {
           
           foreach ($query->result() as $row) {
               
                 $amount=$row->transactionamount;
            }
           
        } 
        return $amount;
        
    }
    
     public function getTransactionAmountInWords($transactionid){
         $amount=$this->getTransactionAmount($transactionid);
         $amountinwords=$this->Show_Amount_In_Words($amount);
         return $amountinwords;
        
    }
    
//} 





public function Show_Amount_In_Words($num) {
  //global $ones, $tens, $triplets;
   $ones =array('',' One',' Two',' Three',' Four',' Five',' Six',' Seven',' Eight',' Nine',' Ten',' Eleven',' Twelve',' Thirteen',' Fourteen',' Fifteen',' Sixteen',' Seventeen',' Eighteen',' Nineteen');
$tens = array('','',' Twenty',' Thirty',' Fourty',' Fifty',' Sixty',' Seventy',' Eighty',' Ninety',);
$triplets = array('',' Thousand',' Lakh',' Crore',' Arab',' Kharab');
$str ="";
//echo $num;

//$num =(int)$num;
$th= (int)($num/1000); 
$x = (int)($num/100) %10;
$fo= explode('.',$num);

if($fo[0] !=null){
$y=(int) substr($fo[0],-2);

}else{
    $y=0;
}

if($x > 0){
    $str =$ones[$x].' Hundred';

}
if($y>0){
if($y<20)
{
 $str .=$ones[$y];

}
else {
    $str .=$tens[(int)($y/10)].$ones[(int)($y%10)];
   }
}
$tri=1;
//echo $str;
while($th!=0){

    $lk = $th%100;
    $th = (int)($th/100);
    $count =$tri;

    if($lk<20){
        if($lk == 0){
        $tri =0;}
        $str = $ones[$lk].$triplets[$tri].$str;
        $tri=$count;
        $tri++;
    }else{
        $str = $tens[(int)($lk/10)].$ones[(int)($lk%10)].$triplets[$tri].$str;
        $tri++;
    }
}
//echo $str;
$num =(float)$num;
if(is_float($num)){
     $fo= (String) $num;
      $fo= explode('.',$fo);
       $fo1= @$fo[1];

}else{
    $fo1 =0;
}
$check = (int) $num;
 if($check !=0){
          return  $str.' And '.$this->forDecimal($fo1).' Only';
    }else{
       return forDecimal($fo1);
    }
}//End function Show_Amount_In_Words


//function for decimal parts
public function forDecimal($num){
   // global $ones,$tens;
    $ones =array('',' One',' Two',' Three',' Four',' Five',' Six',' Seven',' Eight',' Nine',' Ten',' Eleven',' Twelve',' Thirteen',' Fourteen',' Fifteen',' Sixteen',' Seventeen',' Eighteen',' Nineteen');
$tens = array('','',' Twenty',' Thirty',' Fourty',' Fifty',' Sixty',' Seventy',' Eighty',' Ninety',);
    $str="";
    $len = is_null($num)?0:strlen($num);
    if($len==1){
        $num=$num*10;
    }
    $x= $num%100;
    if($x>0){
    if($x<20){
        $str = $ones[$x].' Paise';
    }else{
        $str = $tens[$x/10].$ones[$x%10].' Paise';
    }
    }else{$str='Zero Paise';}
     return $str;
 }  

}




   /* 
   
     public function addTransaction($data){
        // $insertdata=array('transactionDate'=>$tdate,'branchId'=>$branchid,'customerId'=>$customerid,'transactionType'=>$type,'transactionAmount'=>$amount,'$remarkId'=>$remarkid,'comment'=>$comment);
       // transactiontype,transactionamount,remarkid,comment,executerid,transactiondate,customerid
        
        $query=$this->db->insert('transaction',$data);
        if($query){
       return "Added Successfully";
       }else{
       return "Data Insertion Failed";
       }  
         
     }
       public function editBranch(){}
       public function deleteBranch(){}
   
    public function getAllBranch(){
         $field = 'branchname';
            $order = 'ASC';
       
         if ($data === null) {
           
            $field = 'uid';
            $order = 'ASC';
        } else {
            $order = $data['order'];
            $field = $data['field'];
            

        $displayUsers = array();
        $query = $this->db->select('branchid,branchname')
                ->from('branch')
                //->where('role !=', 'Administrator')
               ->order_by($field, $order)
                ->get();
        
        if ($query->num_rows() === 0) {
            $displayUsers = array('message'=>"No Record Found");
           
            return $displayUsers;
        } else {
            $i=0;
            $data=array();
            foreach ($query->result() as $row) {
               
                $data=array('branchid'=>$row->branchid,'branchname'=>$row->branchname);
                $displayUsers[$i++]=$data;
             
                
            }
            foreach($displayUsers as $row){
                
               
                
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
            $displayUsers.="<table>";
            $displayUsers.="<tr><td>" ." Sr" . "</td><td>" . "Name" . "</td>"
                       . "<td>" . "Debit" . "</td><td>" . "Credit" . "</td><td>" . "Balance" . "</td></tr>";
            foreach ($mainquery->result() as $row) {
                $displayUsers.="<tr><td>" . ++$i . "</td><td>" . $row->Name . "</td>"
                       . "<td>" . $row->Debit . "</td><td>" . $row->Credit . "</td><td>" . $row->Balance . "</td></tr>";
                
               // $data=array('serial'=>$i+1,'customername'=>$row->Name,'debit'=>$row->Debit,'credit'=>$row->Credit,'balance'=>$row->Balance);
               // $displayCustomerData[$i++]=$data;
                      
            }
            $displayUsers.="</table>";
		echo $displayUsers;
		// return $displayCustomerData;	
	}	
	
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
    
    
}*/