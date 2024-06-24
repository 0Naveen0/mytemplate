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
class VehicleModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
     public function isChasisExist($chasisno){
        $chasisid=0;
         $query = $this->db->select('vehicleid')
               ->from('vehicle')
                ->where('chasisno',$chasisno)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
              // $chasisid= $row->vehicleid;
              $chasisid=1;
            }
        }
        return $chasisid;
        
    }
     public function addVehicle($data){
		 
         $chasisno=$data['chasisno'];
		 
         if($this->isChasisExist($chasisno)===0){
       // return var_dump($data['chasisno']);
        $query=$this->db->insert('vehicle',$data);
        
        if($query){
            $chassisId = $this->getChasisID($chasisno);
           
       //return "(".$chassisId.")".$chasisno." Added Successfully";
       return "({$chassisId}) {$chasisno}  Added Successfully.";
         
       }else{
       return "Data Insertion Failed";
       } 
         }else{
             return "Vehicle Already Exist";
         }
         
     }
     
     
      //public function getChasisList(){
          
          
          
          
    //  }
    
    
     //Vehicle Update
	 public function editvehicle($data,$vehicleid){
	     $message="Failed";
	     //$updatedata=array('modalid'=>$data["modalSelect"],'chasisno'=>$data["chasisno"],'engineno'=>$data["engineno"],'gearboxno'=>$data["gearboxno"],'keyno'=>$data["keyno"],'ecu'=>$data["ecunumber"],
                //'fronttyreleft'=>$data["fronttyreleft"],'fronttyreright'=>$data["fronttyreright"],'reartyreleft'=>$data["reartyreleft"],'reartyreright'=>$data["reartyreright"],
               // 'batteryno'=>$data["batteryno"],'colorid'=>$data["colorSelect"]);
                
	     //echo var_dump($data);
	    // echo $vehicleid;
	    // echo $data["ecunumber"];
        $this->db->where('vehicleid',$vehicleid);
       $query=$this->db->update('vehicle',$data);
         //echo   var_dump($query);     
                
				 if($query){
      $message= "Data Updated Successfully";
       }else{
       $message="Data Insertion Failed";
       }
       return $message;
       }//End of vehicle update
    
    // public function addCustomer(){}
         
       
       public function deleteVehicle(){}
       
       public function searchVehicle($searchtext,$criteria){
             $field = $criteria;
            $order = 'DESC';
             $query = $this->db->select('*')
                ->from('vehicle')
              
               ->like($field, $searchtext)
               ->order_by($field, $order)
                ->get();
                
                $data=array();
            $data[0] = array('modal'=>'NA','chasisno'=>'NA','engineno'=>'NA','gearboxno'=>'NA','keyno'=>'NA',
                'fronttyreleft'=>'NA','fronttyreright'=>'NA','reartyreleft'=>'NA','reartyreright'=>'NA',
                'batteryno'=>'NA','vehicleid'=>"",'color'=>"NA",'ecu'=>"NA");
                if ($query && $query->num_rows() > 0) {
                     $i=0;
            
             foreach ($query->result() as $row) {
                 $color=$this->load->model('ColorModel')?$this->ColorModel->getColorName($row->colorid):"NA";
                 $modal=$this->load->model('ModalModel')?$this->ModalModel->getModalName($row->modalid):"NA";
                 
                   //   $chasisDetail[0] = array('modalid'=>'NA','chasisno'=>'NA','engineno'=>'NA','gearboxno'=>'NA','keyno'=>'NA',
             //   'fronttyreleft'=>'NA','fronttyreright'=>'NA','reartyreleft'=>'NA','reartyreright'=>'NA',
             //   'batteryno'=>'NA','location'=>'NA','locationid'=>'NA','challanid'=>'NA','colorid'=>"NA",'customerid'=>"0",'ecu'=>"NA");
             $data[$i++]=array('modal'=>$modal,'chasisno'=>$row->chasisno,'engineno'=>$row->engineno,'gearboxno'=>$row->gearboxno,'keyno'=>$row->keyno,'ecu'=>$row->ecu,
                'fronttyreleft'=>$row->fronttyreleft,'fronttyreright'=>$row->fronttyreright,'reartyreleft'=>$row->reartyreleft,'reartyreright'=>$row->reartyreright,
                'batteryno'=>$row->batteryno,'vehicleid'=>$row->vehicleid,'color'=>$color);
                }
                    
                    
                }else if(!$query && !$query->num_rows() > 0){
                    
                     $data[0] = array('modal'=>'NA','chasisno'=>'NA','engineno'=>'NA','gearboxno'=>'NA','keyno'=>'NA',
                'fronttyreleft'=>'NA','fronttyreright'=>'NA','reartyreleft'=>'NA','reartyreright'=>'NA',
                'batteryno'=>'NA','vehicleid'=>"",'color'=>"NA",'ecu'=>"NA");
                    
                    
                }
               // var_dump($data[0]);
                return json_encode($data);
            
        }  
       
     public function  getChallanId($vehicleid){
         $challanid=0;
          $query = $this->db->select('vehicleid,chasisno')
                ->from('vehicle')
                ->order_by($field, $order)
                ->get();
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
    
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
     public function getBranchTransferChasisList(){
         $field = 'vehicleid';
            $order = 'DESC';
       
        $display="";
        $displayUsers = array();
        $query = $this->db->select('vehicleid,chasisno')
                ->from('vehicle')
                ->where('location !=',"Customer")
                // ->group_start()
                // ->like('vehicle.chasisno','MBX0006')
                // ->or_like('vehicle.chasisno','MBX0007')
                // ->or_like('vehicle.chasisno','MBX0008')
                // ->or_like('vehicle.chasisno','MBX0009')
                // ->or_like('vehicle.chasisno','MBX000A')
                // ->or_like('vehicle.chasisno','MBX000B')
                // ->or_like('vehicle.chasisno','MBX000C')
                // ->group_end()
                ->order_by($field, $order)
                ->get();
                
        
        if ($query->num_rows() === 0) {
           
            $displayUsers[0] = array('vehicleid'=>0,'chasisno'=>"No Record Found");
          
           return $displayUsers;
        } else {
            $i=0;
            $data=array();
           
                        
                       
            foreach ($query->result() as $row) {
                
                $data=array('vehicleid'=>$row->vehicleid,'chasisno'=>$row->chasisno);
                $displayUsers[$i++]=$data;
            
                
            }
          
            
           
            return $displayUsers;
        }
        
        
        
        
    }
    
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
     ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
     public function getUnInvoicedChasisList(){
         $field = 'vehicleid';
            $order = 'DESC';
       
        $display="";
        $displayChasis = array();
        $query = $this->db->select('vehicle.vehicleid,vehicle.chasisno')
                ->from('vehicle')
				->where('vehicle.location',"Customer")
				->where('vehicle.invoiceid','0')
                //->join('invoice','vehicle.vehicleid=invoice.vehicleid','left')
                //->distinct()
				// ->group_start()
                // ->like('vehicle.chasisno','MBX0006')
                // ->or_like('vehicle.chasisno','MBX0007')
                // ->or_like('vehicle.chasisno','MBX0008')
                // ->or_like('vehicle.chasisno','MBX0009')
                // ->or_like('vehicle.chasisno','MBX000A')
                // ->or_like('vehicle.chasisno','MBX000B')
                // ->or_like('vehicle.chasisno','MBX000C')
                
                // ->group_end()
				//->where('invoice.vehicleid',NULL)
                ->order_by($field, $order)
                ->get();
                
        
        if ($query->num_rows() === 0) {
           
            $displayChasis[0] = array('vehicleid'=>0,'chasisno'=>"No Record Found");
          
           return $displayChasis;
        } else {
            $i=0;
            $data=array();
           
                        
                       
            foreach ($query->result() as $row) {
                
                $data=array('vehicleid'=>$row->vehicleid,'chasisno'=>$row->chasisno);
                $displayChasis[$i++]=$data;
            
                
            }
          
            
           
            return $displayChasis;
        }
        
        
        
        
    }
    
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
     public function getInvoicedChasisList(){
         $field = 'vehicleid';
            $order = 'DESC';
       
        $display="";
        $displayChasis = array();
        $query = $this->db->select('vehicle.vehicleid,vehicle.chasisno')
                ->from('vehicle')
                ->join('invoice','invoice.vehicleid=vehicle.vehicleid','inner')
                ->where('vehicle.location',"Customer")
                ->order_by($field, $order)
                ->get();
                
        
        if ($query->num_rows() === 0) {
           
            $displayChasis[0] = array('vehicleid'=>0,'chasisno'=>"No Record Found");
          
           return $displayChasis;
        } else {
            $i=0;
            $data=array();
           
                        
                       
            foreach ($query->result() as $row) {
                
                $data=array('vehicleid'=>$row->vehicleid,'chasisno'=>$row->chasisno);
                $displayChasis[$i++]=$data;
            
                
            }
          
            
           
            return $displayChasis;
        }
        
        
        
        
    }
    
      ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
     public function getUndeliveredChasisList(){
         $field = 'vehicleid';
            $order = 'DESC';
       
        $display="";
        $displayChasis = array();
        $query = $this->db->select('vehicle.vehicleid,vehicle.chasisno')
                ->from('vehicle')
				->where('vehicle.location',"branch")
				->where('vehicle.invoiceid','0')
                
				// ->group_start()
                // ->like('vehicle.chasisno','MBX0006')
                // ->or_like('vehicle.chasisno','MBX0007')
                // ->or_like('vehicle.chasisno','MBX0008')
                // ->or_like('vehicle.chasisno','MBX0009')
                // ->or_like('vehicle.chasisno','MBX000A')
                // ->or_like('vehicle.chasisno','MBX000B')
                // ->or_like('vehicle.chasisno','MBX000C')
                // ->group_end()
				//->where('invoice.vehicleid',NULL)
                ->order_by($field, $order)
                ->get();
                
        
        if ($query->num_rows() === 0) {
           
            $displayChasis[0] = array('vehicleid'=>0,'chasisno'=>"No Record Found");
          
           return $displayChasis;
        } else {
            $i=0;
            $data=array();
           
                        
                       
            foreach ($query->result() as $row) {
                
                $data=array('vehicleid'=>$row->vehicleid,'chasisno'=>$row->chasisno);
                $displayChasis[$i++]=$data;
            
                
            }
          
            
           
            return $displayChasis;
        }
        
        
        
        
    }
    
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
    
     public function getUndeliveredChasisList_old(){
         $field = 'vehicleid';
            $order = 'DESC';
       
        $display="";
        $displayUsers = array();
        $query = $this->db->select('vehicleid,chasisno')
                ->from('vehicle')
                ->where('challanid',NULL)
                ->order_by($field, $order)
                ->get();
                
        
        if ($query->num_rows() === 0) {
            //$display="<option>No Record Found</option>";
            $displayUsers[0] = array('vehicleid'=>0,'chasisno'=>"No Record Found");
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
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
     public function getDeliveredChasisList(){
         $field = 'vehicleid';
            $order = 'DESC';
       
        $display="";
        $displayUsers = array();
        $query = $this->db->select('vehicleid,chasisno')
                ->from('vehicle')
                ->where('challanid != ',NULL)
                ->where('vehicle.invoiceid','0')
                
				// ->group_start()
                // ->like('vehicle.chasisno','MBX0006')
                // ->or_like('vehicle.chasisno','MBX0007')
                // ->or_like('vehicle.chasisno','MBX0008')
                // ->or_like('vehicle.chasisno','MBX0009')
                // ->or_like('vehicle.chasisno','MBX000A')
                // ->or_like('vehicle.chasisno','MBX000B')
                // ->or_like('vehicle.chasisno','MBX000C')
                // ->group_end()
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
    
    
    public function getChasisDetail($chasisid){
       
       $chasisDetail = array();
        $query = $this->db->select('*')
                ->from('vehicle')
                ->where('vehicleid',$chasisid)
                //->order_by($field, $order)
                ->get();
                
        
        if ($query->num_rows() === 0) {
            //$display="<option>No Record Found</option>";
            $chasisDetail[0] = array('modalid'=>'NA','chasisno'=>'NA','engineno'=>'NA','gearboxno'=>'NA','keyno'=>'NA',
                'fronttyreleft'=>'NA','fronttyreright'=>'NA','reartyreleft'=>'NA','reartyreright'=>'NA',
                'batteryno'=>'NA','location'=>'NA','locationid'=>'NA','challanid'=>'NA','colorid'=>"NA",'customerid'=>"0",'ecu'=>"NA");
          
           return  $chasisDetail;
        } elseif($query->num_rows() === 1) {
            $i=0;
            $data=array();
           
                        
                       
            foreach ($query->result() as $row) {
                
                $data=array('modalid'=>$row->modalid,'chasisno'=>$row->chasisno,'engineno'=>$row->engineno,'gearboxno'=>$row->gearboxno,'keyno'=>$row->keyno,'ecu'=>$row->ecu,
                'fronttyreleft'=>$row->fronttyreleft,'fronttyreright'=>$row->fronttyreright,'reartyreleft'=>$row->reartyreleft,'reartyreright'=>$row->reartyreright,
                'batteryno'=>$row->batteryno,'location'=>$row->location,'locationid'=>$row->locationid,'challanid'=>$row->challanid,'colorid'=>$row->colorid,'customerid'=>$row->customerid);
               $chasisDetail[$i]=$data;
           
                
            }
          // echo $chasisDetail[0]['chasisno'];
            
           
            return $chasisDetail;
        }
        
       
       
   }
    
    
    
    
    
    
    
     public function getCustomerById(){}
     public function getCustomerByName(){}
    
    
   /* 
     $customername=$this->customerModel->getCustomerName($customerid);
        $customeraddressline1=$this->customerModel->getCustomerAddressLine1($customerid);
        $customeraddressline2=$this->customerModel->getCustomerAddressLine2($customerid);
        $customercontact=$this->customerModel->getCustomerContact($customerid);
       }else{
    */
    
    public function getChasisNo($chasisid){
        $chasisno="na";
         $query = $this->db->select('chasisno')
               ->from('vehicle')
                ->where('vehicleid',$chasisid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $chasisno= $row->chasisno;
            }
        }
        return $chasisno;
        
    }
    
    
    
    public function getChasisID($chasisno){
        $chasisid=0;
         $query = $this->db->select('vehicleid')
               ->from('vehicle')
                ->where('chasisno',$chasisno)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $chasisid= $row->vehicleid;
            }
        }
        return $chasisid;
        
    }
    
    
    public function getModalName($chasisid){
        $modal="na";
        
         $query = $this->db->select('modal.modalname')
                 ->from('vehicle')
                 ->join('modal','vehicle.modalid=modal.modalid','inner')
                ->where('vehicle.vehicleid', $chasisid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $modal= $row->modalname;
            }
        }
        
        
        
        return $modal;
        
    }
    
    
    
    
      public function getChallanDate($chasisid){
        $challandate="na";
        
         $query = $this->db->select('vehicletransaction.vehicletransferdate as challandate')
                 ->from('vehicle')
                 ->join('vehicletransaction','vehicletransaction.vehicletransactionid=vehicle.challanid','inner')
                ->where('vehicle.vehicleid', $chasisid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $challandate= $row->challandate;
            }
        }
        
        
        
        return $challandate;
        
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
    
   // Show Counter Stock
   
   public function getCounterStock($criteria){
	   $chassisId="1";$deliverydate="09-02-2022";$vehiclemodel="APE XTRA LDX";$branch="KHIRMA";$branchid="100110";$chassisno="MBX0003BFXK931957";$color="WESTERN RED";
	   
	   $display=array();
	   if($criteria==="All"){
	   $query=$this->db->select('vehicle.chasisno,vehicle.locationid,vehicle.locationid,vehicle.modalid,branch.branchname,
	   vehicle.colorid,vehicle.challanid,color.colorname,modal.modalname,vehicletransaction.vehicletransferdate,
	   vehicle.vehicleid')
	          ->from('vehicle')
			  ->where('vehicle.invoiceid',0)
			  ->join('branch','vehicle.locationid=branch.branchid','left outer')
			  ->join('modal','vehicle.modalid=modal.modalid','left outer')
			  ->join('color','vehicle.colorid=color.colorid','left outer')
			  ->join('vehicletransaction','vehicle.challanid=vehicletransaction.vehicletransactionid','left outer')
			 // ->group_start()
    //             ->like('vehicle.chasisno','MBX0006')
    //             ->or_like('vehicle.chasisno','MBX0007')
				// ->or_like('vehicle.chasisno','MBX0008')
				// ->or_like('vehicle.chasisno','MBX0009')
				// ->or_like('vehicle.chasisno','MBX000A')
    //             ->or_like('vehicle.chasisno','MBX000B')
    //             ->or_like('vehicle.chasisno','MBX000C')
    //             ->group_end()
				
			  ->order_by('vehicletransaction.vehicletransferdate', 'desc')
			  ->get();
	   }else {
		   $query=$this->db->select('vehicle.chasisno,vehicle.locationid,vehicle.locationid,vehicle.modalid,branch.branchname,
	   vehicle.colorid,vehicle.challanid,color.colorname,modal.modalname,vehicletransaction.vehicletransferdate,
	   vehicle.vehicleid')
	          ->from('vehicle')
			  ->where('vehicle.invoiceid',0)
			  ->where('vehicle.locationid',$criteria)
			  ->join('branch','vehicle.locationid=branch.branchid','left outer')
			  ->join('modal','vehicle.modalid=modal.modalid','left outer')
			  ->join('color','vehicle.colorid=color.colorid','left outer')
			  ->join('vehicletransaction','vehicle.challanid=vehicletransaction.vehicletransactionid','left outer')
			 // ->group_start()
    //             ->like('vehicle.chasisno','MBX0006')
    //             ->or_like('vehicle.chasisno','MBX0007')
				// ->or_like('vehicle.chasisno','MBX0008')
				// ->or_like('vehicle.chasisno','MBX0009')
				// ->or_like('vehicle.chasisno','MBX000A')
    //             ->or_like('vehicle.chasisno','MBX000B')
    //             ->or_like('vehicle.chasisno','MBX000C')
    //             ->group_end()
				
			  ->order_by('vehicletransaction.vehicletransferdate', 'desc')
			  ->get();
	   }
	   
		    if ($query && $query->num_rows() > 0) {
                     $i=0;
            
             foreach ($query->result() as $row) {
				 $display[$i++]=array("chassisid"=>$row->vehicleid,
				                      "deliverydate"=>$row->vehicletransferdate,
				                      "vehiclemodel"=>$row->modalname,
			                          "branch"=>$row->branchname,
									  "branchid"=>$row->locationid,
			                          "color"=>$row->colorname,
									  "chasisno"=>$row->chasisno);
			 }
		   
			
	   }else if(!$query && !$query->num_rows() > 0){
		   $display[0]=array("chassisid"=>"NA","deliverydate"=>"NA","vehiclemodel"=>"NA",
			"branch"=>"NA","branchid"=>"NA","color"=>"NA","chasisno"=>"NA");
	   }
	   
	   
	   return $display;
   } 
    
     
   
   
   
   
   
   
   ///////////////////////////////////////////
    
    
    
    
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