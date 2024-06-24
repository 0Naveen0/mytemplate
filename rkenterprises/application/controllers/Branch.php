<?php
class Branch extends MY_Controller {
    public function index() {
        $this->session->set_userdata("pageid", "branchHome");
         $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'branch') && $isLoggedin) {
            $userid=$this->session->userdata('uid');
            $branchid= $this->load->model('branchModel')?$this->branchModel->getBranchId($userid):'Branch Loading Failed';
          $this->session->set_userdata("branchid",$branchid);
            //echo  $this->session->userdata('branchid')."    "."zzzzzz";
            $data = ['title' => 'Dashboard'];
            $message = '';
            $this->template->load('home_template', 'branchDashboard_view', 'branch_menu', 'dashboard_secondary_menu', $message, $data);
            //$this->load->view('student_view');
        } else {
            //$this->home->logout;
           redirect('index.php/logout');
        }
    }
    
    //viewCustomerSummaryByBranchId
     public function customerLedgerView() {
        $this->session->set_userdata("pageid", "customerLedgerView");
         $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'branch') && $isLoggedin) {
            $branchid=$this->session->userdata('branchid');
            
            $message = '';
           
                $customerData=$this->load->model('customerModel')?$this->customerModel->getCustomerByBranchId($branchid):"Data Loading Failed";
                 
            $data = ['title' => 'Customer Ledger','customerList'=>$customerData];
            
            
            if($this->input->get('customerid')){
                $customerid=$this->input->get('customerid');
                //echo $customerid;
                $customerAccountData= $this->load->model('branchModel')?$this->branchModel->viewCustomerDetailByCustomerId($customerid):"Data Loading Failed";
                 
                echo $customerAccountData;
            
         }else{
            
                 
                  $this->template->load('home_template', 'customerLedgerForBranch_View', 'branch_menu', 'dashboard_secondary_menu', $message, $data);
            
           
         }
            
         
        // }
        } else {
           
           redirect('index.php/logout');
        }
    }
    
    
    
    
    public function customerAccountDetailView() {
         
         
         
         
         
        $this->session->set_userdata("pageid", "customerAccountDetailView");
        $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            
             $branch=array();
        $branch= $this->load->model('branchModel')?$this->branchModel->getAllBranch():'Branch Loading Failed';
        
            
            $data = ['title' => 'Customer Summary','branchList'=>$branch];
            $message = '';
            if($this->input->get('customerid')){
                $customerid=$this->input->get('customerid');
                //echo $customerid;
                $customerAccountData= $this->load->model('branchModel')?$this->branchModel->viewCustomerDetailByCustomerId($customerid):"Data Loading Failed";
                 //$data=['customerData'=>$customerData];
                // $this->template->load('home_template', 'customerAccountSummaryView', 'member_menu', 'dashboard_secondary_menu', $message, $data);
                echo $customerAccountData;
             //return $customerAccountData;
         }else{
             //$branchid=100101;
           // $customerData= $this->load->model('branchModel')?$this->branchModel->viewCustomerSummaryByBranchId($branchid):"Data Loading Failed";
                 $data=['title' => 'Customer Detail','branchList'=>$branch];
            
            $this->template->load('home_template', 'customerAccountDetail_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            //$this->load->view('student_view');
         }
        } else {
            //$this->home->logout;
            redirect('index.php/logout');
        }
    }
    
    
    
    //viewCustomerSummaryOfBranch
     public function branchAccountSummaryView() {
         
         //customerAccountSummaryForBranchContent
         
         
         
        $this->session->set_userdata("pageid", "branchAccountSummaryView");
        $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'branch') && $isLoggedin) {
            
           
                $branchid=$this->session->userdata('branchid');
              
                $customerData= $this->load->model('branchModel')?$this->branchModel->viewCustomerSummaryByBranchId($branchid):"Data Loading Failed";
                $duesList=array();
                $duesList=$customerData;
             $message="";
                  $data=['title' => 'Customer Summary','branchDuesList'=> $duesList];
                    $this->template->load('home_template', 'summaryContentView', 'branch_menu', 'dashboard_secondary_menu', $message, $data);
              
        } else {
           
            redirect('index.php/logout');
        }
    }
    
    
    
    
    
    
    public function getCustomerList(){
       //echo "abc";
        $branchid=$this->input->get('branchid');
       // echo $branchid;
       //$branchid=100108;
   //echo $branchid;
     $customer="";
          // $customer=array();
          //$this->load->model('CustomerModel');
          //$customer=$this->CustomerModel->getCustomerByBranchId($branchid);
        $customer= $this->load->model('customerModel')?$this->customerModel->getCustomerByBranchId($branchid):"Not Found";
            
           // return $customer;
            //$data="<option value='1'>Rai Saheb Nayak</option>";
           //echo $data;
        echo $customer ;
        }
    
    public function branchAccountView(){
        
        
        $this->session->set_userdata("pageid", "branchAccountView");
        $role = $this->session->userdata('role')?$this->session->userdata('role'):"";
        
        $isLoggedin = $this->session->userdata('isLoggedin')?$this->session->userdata('isLoggedin'):"";
        if (($role === 'member') && $isLoggedin) {
            $data = ['title' => 'Branch Account'];
            $message = '';
            $this->template->load('home_template', 'branchAccount_view', 'member_menu', 'dashboard_secondary_menu', $message, $data);
            //$this->load->view('student_view');
        } else {
            //$this->home->logout;
            redirect('index.php/logout');
        } 
        
        
        
        
        
        
        
    }
    
    
    
    
    
    
    
    
    public function studentTutorial() {
        $subject = $this->input->get("subject");
        switch ($subject) {
            case "dca":
                $this->session->set_userdata("pageid", "studentDcaTutorial");
                $content = "dca_Tutorial_View";
                break;
            case "c":
                $this->session->set_userdata("pageid", "studentCTutorial");
                $content = "c_Tutorial_View";
                break;
            case "html":
                $this->session->set_userdata("pageid", "studentHtmlTutorial");
                $content = "html_Tutorial_View";
                break;
            case "php":
                $this->session->set_userdata("pageid", "studentPhpTutorial");
                $content = "php_Tutorial_View";
                break;
            case "java":
                $this->session->set_userdata("pageid", "studentJavaTutorial");
                $content = "java_Tutorial_View";
                break;
        }
        //echo $subject."   ".$this->session->userdata("pageid");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Student') && $isLoggedin) {
            $data = ['title' => 'Dashboard'];
            $message = '';
            $this->template->load('home_template', $content, 'student_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        }
    }
    public function studentGallery() {
        $this->session->set_userdata("pageid", "studentGallery");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Student') && $isLoggedin) {
            $data = ['title' => 'Student Gallery'];
            $message = '';
            $this->template->load('home_template', 'student_gallery_view', 'student_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        }
    }
    public function studentApplyExam() {
        $this->session->set_userdata("pageid", "studentApplyExam");
    }
    public function studentStartExam() {
        $this->session->set_userdata("pageid", "studentStartExam");
    }
    public function studentExamView() {
        $this->session->set_userdata("pageid", "studentExamView");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Student') && $isLoggedin) {
            $data = ['title' => 'View Exam'];
            $message = '';
            $this->template->load('home_template', 'student_exam_view', 'student_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        }
    }
    public function studentProfileView() {
        $this->session->set_userdata("pageid", "studentProfileView");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Student') && $isLoggedin) {
            $this->load->model('User_Model');
            $uid = $this->session->userdata('uid');
            $userProfile = $this->User_Model->viewProfile($uid);
            $data = ['title' => 'User Profile', 'profile' => $userProfile];
            $message = '';
            $this->template->load('home_template', 'profile_view', 'student_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        }
    }
    public function studentResultView() {
        $this->session->set_userdata("pageid", "studentResultView");
    }
    public function studentResponseView() {
        $this->session->set_userdata("pageid", "studentResponseView");
    }
    public function studentAdmitCardView() {
        $this->session->set_userdata("pageid", "studentAdmitCard");
    }
    public function studentApplicationView() {
        $this->session->set_userdata("pageid", "studentApplicationView");
    }
}
?>