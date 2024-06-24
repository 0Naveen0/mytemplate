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
class InvoiceModel extends CI_Model {
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
    
    
    
     public function addInvoice($data){
         /*
        $invoiceinsertdata=array('vehicleid'=>$vehicleid,'invoicedate'=>$invoicedate,'invoiceno'=>$invoiceno,'customerid'=>$customerid,'hypothecation'=>$hypothecation,'basicprice'=>$basicprice);
         */
         $chasisid=$data['vehicleid'];
       if ( !$this->isChassisExist($chasisid)){
        $query=$this->db->insert('invoice',$data);
        if($query){
       return "Invoice Added Successfully";
       }else{
       return "Data Insertion Failed";
       } 
       }else {
           $invoiceno=$this->getInvoiceNumber($chasisid);
           return "Invoice (".$invoiceno." )Already Generated for this Chassis.";
       }
         
     }
    
    
       
	    
     public function editInvoice($invoiceid,$data){
          $message="Failed";
	     
        $this->db->where('invoiceid',$invoiceid);
       $query=$this->db->update('invoice',$data);
         //echo   var_dump($query);     
                
				 if($query){
      $message= "Data Updated Successfully";
       }else{
       $message="Data Updation Failed";
       }
       return $message;
       }
	   
	   
       //****************** delete invoice***************************
 public function deleteInvoice($data){
        
         $chasisid=$data['vehicleid'];
       if ( $this->isChassisExist($chasisid)){
		   $invoiceno=$this->getInvoiceNumber($chasisid);
		   $this->db->trans_start();
		   $this->db->where('vehicleid',$chasisid);
        $this->db->delete('invoice');
		$this->db->where('vehicleid',$chasisid);
		$this->db->update('vehicle',array('invoiceid'=>0));
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
        return "Error deleting data";
		}else{
			return "Invoice No (".$invoiceno.") Deleted Successfully";
		}

       
       }else {
           
           return "Invoice not Generated for this Chassis Id:-  ".$chasisid;
       }
         
     }
	 
	 
	 
	 //**********************************************************************
       
       
       
       
     //*********************************************************************
       
    public function invoiceOnDate($date,$type){
        $data=array();
        $display=array();
        $i=0;
        
        if($type==="1001"){
             $query=$this->db->select('invoice.invoiceid,invoice.invoiceno,invoice.invoicedate,invoice.hypothecation,invoice.companyid,customer.customername,invoice.basicprice,vehicle.chasisno,vehicle.engineno,vehicle.modalid,customer.customerfathername,customer.customeraddressline1,customer.customeraddressline2,customer.customerdistrict,customer.customerstate,customer.customerpin,customer.customercontact,invoice.sgst,invoice.cgst')->from('invoice')
        ->join('customer','customer.customerid=invoice.customerid','left outer')
        ->join('vehicle','vehicle.vehicleid=invoice.vehicleid','left outer')
        ->where('invoice.companyid',"1001")
        ->where('invoice.invoicedate',$date)
        ->get();
        }else if($type==="1002"){
            $query=$this->db->select('invoice.invoiceid,invoice.invoiceno,invoice.invoicedate,invoice.hypothecation,invoice.companyid,customer.customername,invoice.basicprice,vehicle.chasisno,vehicle.engineno,vehicle.modalid,customer.customerfathername,customer.customeraddressline1,customer.customeraddressline2,customer.customerdistrict,customer.customerstate,customer.customerpin,customer.customercontact,invoice.sgst,invoice.cgst')->from('invoice')
        ->join('customer','customer.customerid=invoice.customerid','left outer')
        ->join('vehicle','vehicle.vehicleid=invoice.vehicleid','left outer')
        ->where('invoice.companyid',"1002")
        ->where('invoice.invoicedate',$date)
        ->get();
        }else{
            $query=$this->db->select('invoice.invoiceid,invoice.invoiceno,invoice.invoicedate,invoice.hypothecation,invoice.companyid,customer.customername,invoice.basicprice,vehicle.chasisno,vehicle.engineno,vehicle.modalid,customer.customerfathername,customer.customeraddressline1,customer.customeraddressline2,customer.customerdistrict,customer.customerstate,customer.customerpin,customer.customercontact,invoice.sgst,invoice.cgst')->from('invoice')
        ->join('customer','customer.customerid=invoice.customerid','left outer')
        ->join('vehicle','vehicle.vehicleid=invoice.vehicleid','left outer')
        //->where('invoice.companyid',"1001")
        ->where('invoice.invoicedate',$date)
        ->get();
        
        //->where('transaction.transactiontype',"credit")
       // ->get();
        }
        
       
        if($query->num_rows()>0){
            foreach ($query->result() as $row){
                //$customername=$this->load->model('CustomerModel')?$this->CustomerModel-> getCustomerName($row->customerid):"NA";
               // $branchname=$this->load->model('CustomerModel')?$this->CustomerModel-> getCustomerBranch($row->customerid):"NA";
                //$chasisno="NA";
                $address=$row->customerfathername.",".$row->customeraddressline1.",".$row->customeraddressline2.",".$row->customerdistrict.",".$row->customerstate.",".$row->customerpin;
              $modal=$this->load->model('ModalModel')?$this->ModalModel->getModalName($row->modalid):"NA";
              $hypothecation=$this->load->model('HypothecationModel')?$this->HypothecationModel->getFinancerName($row->hypothecation):"NA";
              if($row->companyid==="1001"){
               $companyname="Darbhanga";
                  
              }elseif($row->companyid==="1002"){
               $companyname="Jhanjharpur";
                  
              }else{
                 $companyname="NA"; 
              }
               
                $data=array('invoiceid'=>$row->invoiceid,'invoiceno'=>$row->invoiceno,'hypothecation'=>$hypothecation,'customername'=>$row->customername,'chasisno'=>$row->chasisno,'engineno'=>$row->engineno,'invoicedate'=>$row->invoicedate,'companyname'=>$companyname,'invoicevalue'=>$row->basicprice,'vehiclemodel'=>$modal,'address'=>$address
                ,'contact'=>$row->customercontact,'sgst'=>$row->sgst,'cgst'=>$row->cgst);
                $display[$i++]=$data;
            }
        }else{
            $data=array('invoiceid'=>"NA",'invoiceno'=>"NA",'hypothecation'=>"NA",'customername'=>"NA",'chasisno'=>"NA",'engineno'=>"NA",'invoicedate'=>"NA",'companyname'=>"NA",'invoicevalue'=>0,'vehiclemodel'=>"NA",'address'=>"NA"
                ,'contact'=>"NA",'sgst'=>0,'cgst'=>0);
                $display[$i++]=$data;
        }
        
        
        return $display;
        
        
   /*      echo "<tr><td>" .$row['transactionid'] . "</td><td>" .$row['transactiondate'] . "</td><td>" . $row['transactiontype'] . "</td>"
                       . "<td>" . $row['transactionamount'] . "</td><td>" . $row['branchname'] . "</td><td>" . $row['customername'] . "</td><td>" . $row['chasisno'] . "</td>
                       <td>" . $row['remark'] . "</td></tr>";*/
        
    }      
     
     
     
       ///////////////////////////////////////////////////////////////////////////////////////////////////////////
      
      public function invoiceBetweenDate($fromdate,$todate,$type){
         $data=array();
        $display=array();
        $i=0;
        
        if($type==="1001"){
             $query=$this->db->select('invoice.invoiceid,invoice.invoiceno,invoice.invoicedate,invoice.hypothecation,invoice.companyid,customer.customername,invoice.basicprice,vehicle.chasisno,vehicle.engineno,vehicle.modalid,customer.customerfathername,customer.customeraddressline1,customer.customeraddressline2,customer.customerdistrict,customer.customerstate,customer.customerpin,customer.customercontact,invoice.sgst,invoice.cgst')->from('invoice')
        ->join('customer','customer.customerid=invoice.customerid','left outer')
        ->join('vehicle','vehicle.vehicleid=invoice.vehicleid','left outer')
        ->where('invoice.companyid',"1001")
        ->where('invoice.invoicedate >=',$fromdate)
        ->where('invoice.invoicedate <=',$todate)
        ->order_by('invoice.invoicedate ','desc')
        ->get();
        }else if($type==="1002"){
            $query=$this->db->select('invoice.invoiceid,invoice.invoiceno,invoice.invoicedate,invoice.hypothecation,invoice.companyid,customer.customername,invoice.basicprice,vehicle.chasisno,vehicle.engineno,vehicle.modalid,customer.customerfathername,customer.customeraddressline1,customer.customeraddressline2,customer.customerdistrict,customer.customerstate,customer.customerpin,customer.customercontact,invoice.sgst,invoice.cgst')->from('invoice')
        ->join('customer','customer.customerid=invoice.customerid','left outer')
        ->join('vehicle','vehicle.vehicleid=invoice.vehicleid','left outer')
        ->where('invoice.companyid',"1002")
        ->where('invoice.invoicedate >=',$fromdate)
        ->where('invoice.invoicedate <=',$todate)
        ->order_by('invoice.invoicedate ','desc')
        ->get();
        }else{
            $query=$this->db->select('invoice.invoiceid,invoice.invoiceno,invoice.invoicedate,invoice.hypothecation,invoice.companyid,customer.customername,invoice.basicprice,vehicle.chasisno,vehicle.engineno,vehicle.modalid,customer.customerfathername,customer.customeraddressline1,customer.customeraddressline2,customer.customerdistrict,customer.customerstate,customer.customerpin,customer.customercontact,invoice.sgst,invoice.cgst')->from('invoice')
        ->join('customer','customer.customerid=invoice.customerid','left outer')
        ->join('vehicle','vehicle.vehicleid=invoice.vehicleid','left outer')
        //->where('invoice.companyid',"1001")
       ->where('invoice.invoicedate >=',$fromdate)
        ->where('invoice.invoicedate <=',$todate)
        ->order_by('invoice.invoicedate ','desc')
        ->get();
        
        //->where('transaction.transactiontype',"credit")
       // ->get();
        }
        
       
        if($query->num_rows()>0){
            foreach ($query->result() as $row){
                //$customername=$this->load->model('CustomerModel')?$this->CustomerModel-> getCustomerName($row->customerid):"NA";
               // $branchname=$this->load->model('CustomerModel')?$this->CustomerModel-> getCustomerBranch($row->customerid):"NA";
                //$chasisno="NA";
                $address=$row->customerfathername.",".$row->customeraddressline1.",".$row->customeraddressline2.",".$row->customerdistrict.",".$row->customerstate.",".$row->customerpin;
              $modal=$this->load->model('ModalModel')?$this->ModalModel->getModalName($row->modalid):"NA";
              $hypothecation=$this->load->model('HypothecationModel')?$this->HypothecationModel->getFinancerName($row->hypothecation):"NA";
              if($row->companyid==="1001"){
               $companyname="Darbhanga";
                  
              }elseif($row->companyid==="1002"){
               $companyname="Jhanjharpur";
                  
              }else{
                 $companyname="NA"; 
              }
               
                $data=array('invoiceid'=>$row->invoiceid,'invoiceno'=>$row->invoiceno,'hypothecation'=>$hypothecation,'customername'=>$row->customername,'chasisno'=>$row->chasisno,'engineno'=>$row->engineno,'invoicedate'=>$row->invoicedate,'companyname'=>$companyname,'invoicevalue'=>$row->basicprice,'vehiclemodel'=>$modal,'address'=>$address
                ,'contact'=>$row->customercontact,'sgst'=>$row->sgst,'cgst'=>$row->cgst);
                $display[$i++]=$data;
            }
        }else{
            $data=array('invoiceid'=>"NA",'invoiceno'=>"NA",'hypothecation'=>"NA",'customername'=>"NA",'chasisno'=>"NA",'engineno'=>"NA",'invoicedate'=>"NA",'companyname'=>"NA",'invoicevalue'=>0,'vehiclemodel'=>"NA",'address'=>"NA"
                ,'contact'=>"NA",'sgst'=>0,'cgst'=>0);
                $display[$i++]=$data;
        }
        
        
        return $display;
        
        
   /*      echo "<tr><td>" .$row['transactionid'] . "</td><td>" .$row['transactiondate'] . "</td><td>" . $row['transactiontype'] . "</td>"
                       . "<td>" . $row['transactionamount'] . "</td><td>" . $row['branchname'] . "</td><td>" . $row['customername'] . "</td><td>" . $row['chasisno'] . "</td>
                       <td>" . $row['remark'] . "</td></tr>";*/
        
    }     
         
   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
     
     
   
   
   
   
   
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
   
   public function getInvoiceNumber($chasisid){
        $invoiceNo=0;
         $query = $this->db->select('invoiceno')
                ->from('invoice')
                ->where('vehicleid', $chasisid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $invoiceNo= $row->invoiceno;
            }
        }
        return $invoiceNo;
        
    } 
    
    //$invoiceid=$vehicleid?($this->load->model('invoiceModel')?$this->invoiceModel-> getInvoiceNoOfChassisId($vehicleid):FALSE):FALSE;
     public function getInvoiceNoOfChassisId($chasisid){
        $invoiceNo=array();
         $query = $this->db->select('invoiceno,invoiceid')
                ->from('invoice')
                ->where('vehicleid', $chasisid)
                ->get();
                
        
        if ($query->num_rows() >= 1) {
            $i=0;
            foreach ($query->result() as $row) {
               $invoiceNo[$i++]= array('invoiceno'=>$row->invoiceno,'invoiceid'=>$row->invoiceid);
            }
        }else{
            $invoiceNo[0]= array('invoiceno'=>0,'invoiceid'=>0);
        }
        return $invoiceNo;
        
    } 
    
   // getInvoiceId($vehicleid)
    public function getCompanyId($chasisid){
        $companyid=0;
         $query = $this->db->select('companyid')
                ->from('invoice')
                ->where('vehicleid', $chasisid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $companyid= $row->companyid;
            }
        }
        return $companyid;
        
    } 
   
   public function getLastInvoiceNo(){
       $invoiceNo=0;
         $query = $this->db->select('invoiceno')
                ->from('invoice')
                //->where('vehicleid', $chasisid)
                ->order_by('invoiceid','desc')
                ->get();
                
                 if ($query->num_rows()>0) {
           
               $invoiceNo= $query->first_row()->invoiceno;
            
        }
        return $invoiceNo;
                
   }
   
    public function getLastInvoiceOfCompany($companyid){
       $invoiceNo=0;
         $query = $this->db->select_max('invoiceno')
                ->from('invoice')
                ->where('companyid', $companyid)
               // ->order_by('invoiceid','desc')
                ->get();
                
                 if ($query->num_rows()>0) {
           
               $invoiceNo= $query->first_row()->invoiceno;
            
        }
        //echo $invoiceNo;
        return $invoiceNo;
                
   }
   
    public function getInvoiceId($chasisid){
        $invoiceId=0;
         $query = $this->db->select('invoiceid')
                ->from('invoice')
                ->where('vehicleid', $chasisid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $invoiceId= $row->invoiceid;
            }
        }
        return $invoiceId;
        
    } 
    
    
     public function getChassisId($invoiceid){
        $chassisId=0;
         $query = $this->db->select('vehicleid')
                ->from('invoice')
                ->where('invoiceid', $invoiceid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $chassisId= $row->vehicleid;
            }
        }
        return $chassisId;
        
    } 
    
     public function getCustomerId($invoiceid){
        $customerId=0;
         $query = $this->db->select('customerid')
                ->from('invoice')
                ->where('invoiceid', $invoiceid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $customerId= $row->customerid;
            }
        }
        return $customerId;
        
    } 
    
    
      public function getChassisIdOnCustomerId($customerid){
        $chassisId=0;
         $query = $this->db->select('vehicleid')
                ->from('invoice')
                ->where('customerid', $customerid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $chassisId= $row->vehicleid;
            }
        }
        return $chassisId;
        
    } 
   
    public function getInvoiceDate($chasisid){
        $invoicedate=0;
         $query = $this->db->select('invoicedate')
                ->from('invoice')
                ->where('vehicleid', $chasisid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $invoicedate= $row->invoicedate;
            }
        }
        return $invoicedate;
        
    } 
   
   
   
   
   
    
   public function getBasicPrice($chasisid){
        $modalprice=0.0;
         $query = $this->db->select('basicprice')
                ->from('invoice')
                ->where('vehicleid', $chasisid)
                ->get();
                
        
        if ($query->num_rows() === 1) {
            foreach ($query->result() as $row) {
               $modalprice= $row->basicprice;
            }
        }
        return $modalprice;
        
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
	
	      public function searchInvoice($searchtext,$criteria){
             $field = $criteria;
            $order = 'DESC';
               if($field==="chasisno"){ 
				$query = $this->db->select('*')
                ->from('invoice')
              ->join('vehicle','invoice.vehicleid=vehicle.vehicleid','inner')
               ->like($field, $searchtext)
               ->order_by($field, $order)
                ->get();
			   }else{
				   $query = $this->db->select('*')
                ->from('invoice')
				
              
               ->like($field, $searchtext)
               ->order_by($field, $order)
                ->get();
			   }
				
                $data=array();
            $data[0] = array('chasisno'=>'NA','invoiceno'=>'NA','hypothecation'=>'','hypothecationname'=>'NA'
              ,'invoicedate'=>'0000-00-00','basicprice'=>'0','salesmanid'=>'',
                'salesmanname'=>'NA','invoiceid'=>"",'taxid'=>"NA",'companyid'=>"");
                if ($query && $query->num_rows() > 0) {
                     $i=0;
            
             foreach ($query->result() as $row) {
                 $chasisno=$this->load->model('VehicleModel')?$this->VehicleModel->getChasisNo($row->vehicleid):"NA";
                 $hypothecationname=$this->getHypothecation($row->vehicleid)?$this->getHypothecation($row->vehicleid):"NA";
				 $salesmanname=$this->load->model('SalesmanModel')?$this->SalesmanModel->getSalesmanName($row->salesmanid):"NA";
                 
                   //   $chasisDetail[0] = array('modalid'=>'NA','chasisno'=>'NA','engineno'=>'NA','gearboxno'=>'NA','keyno'=>'NA',
             //   'fronttyreleft'=>'NA','fronttyreright'=>'NA','reartyreleft'=>'NA','reartyreright'=>'NA',
             //   'batteryno'=>'NA','location'=>'NA','locationid'=>'NA','challanid'=>'NA','colorid'=>"NA",'customerid'=>"0",'ecu'=>"NA");
             $data[$i++]=array('chasisno'=>$chasisno,'invoiceno'=>$row->invoiceno,'hypothecation'=>$row->hypothecation,'hypothecationname'=>$hypothecationname
              ,'invoicedate'=>$row->invoicedate,'basicprice'=>$row->basicprice,'salesmanid'=>$row->salesmanid,
                'salesmanname'=>$salesmanname,'invoiceid'=>$row->invoiceid,'taxid'=>$row->taxid,'companyid'=>$row->companyid);;
                }
                    
                    
                }else if(!$query && !$query->num_rows() > 0){
                    
                     $data[0] = array('chasisno'=>'NA','invoiceno'=>'NA','hypothecation'=>'','hypothecationname'=>'NA'
              ,'invoicedate'=>'0000-00-00','basicprice'=>'0','salesmanid'=>'',
                'salesmanname'=>'NA','invoiceid'=>"",'taxid'=>"NA",'companyid'=>"");
                    
                    
                }
               // var_dump($data[0]);
                return json_encode($data);
            
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