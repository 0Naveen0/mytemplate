<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//class Home extends CI_Controller {
    class Home extends MY_Controller {
    public function index() {
        $data = ['title' => 'R K Enterprises'];
        $this->session->set_userdata("pageid","home");
       $this->template->load('home_template', 'home_view', 'Home_menu', 'secondary_menu', '', $data);
      
    }
    
    
    public function about() {
        $data = ['title' => 'About'];
        $this->session->set_userdata("pageid","about");
        $this->template->load('home_template', 'about_view', 'Home_menu', 'secondary_menu', '', $data);
    }
    public function contact() {
        $data = ['title' => 'Contact'];
        $this->session->set_userdata("pageid","contact");
        $this->template->load('home_template', 'contact_view', 'Home_menu', 'secondary_menu', '', $data);
    }
    
    
    public function recruitment() {
        $data = ['title' => 'Recruitment'];
        $this->session->set_userdata("pageid","recruitment");
        $this->template->load('home_template', 'recruitment_view', 'Home_menu', 'secondary_menu', '', $data);
    }
    
    
     public function gallery() {
        $data = ['title' => 'Gallery'];
        $this->session->set_userdata("pageid","gallery");
        $this->template->load('home_template', 'gallery_view', 'Home_menu', 'secondary_menu', '', $data);
    }
    
    
     public function company1() {
        $data = ['title' => 'company1'];
        $this->session->set_userdata("pageid","company1");
        $this->template->load('home_template', 'company1_view', 'Home_menu', 'secondary_menu', '', $data);
    }
    
    
    public function company2() {
        $data = ['title' => 'company2'];
        $this->session->set_userdata("pageid","company2");
        $this->template->load('home_template', 'company2_view', 'Home_menu', 'secondary_menu', '', $data);
    }
    
    
    public function company3() {
        $data = ['title' => 'company3'];
        $this->session->set_userdata("pageid","company3");
        $this->template->load('home_template', 'company3_view', 'Home_menu', 'secondary_menu', '', $data);
    }
    
    
    
    public function reg() {
        $this->session->set_userdata("pageid","registration");
       
        if ($this->input->post("regBtn")) {
            // echo $this->collectRegistrationFormData();
            $this->load->model("User_Model");
            $userName = $this->input->post("uname");
            if($this->User_Model->checkUserName($userName)){
            $firstName = $this->input->post("fname");
            $lastName = $this->input->post("lname");
            $fatherName = $this->input->post("father");
            $gender = $this->input->post("gender");
            $dob = $this->input->post("dob");
            $contact = $this->input->post("contact");
            $email = $this->input->post("email");
            
            $password = $this->input->post("password");
            $rePassword = $this->input->post("repassword");
            $userType = $this->input->post("registerType");
            $addressid = 1;
            $data = array('first_name' => $firstName, 'last_name' => $lastName, 'father' => $fatherName,
                'dob' => $dob, 'gender' => $gender, 'contact' => $contact, 'email' => $email,
                'password' => $password, 'uname' => $userName, 'role' => $userType, 'addressid' => $addressid);
            if ($this->User_Model->register($data)) {
                $messageText = 'Registered Successfully,Please Log in to Continue';
                $messageType = "success";
                $message = $this->createMessage($messageText, $messageType);
                $this->session->set_userdata('message', $message);
                $this->login();
            } else {
                $messageText = 'Registration Failed, Try again or Contact Administrator';
                $messageType = "danger";
                $message = $this->createMessage($messageText, $messageType);
                $this->session->set_userdata('message', $message);
                $data = ['title' => 'Register'];
                $this->template->load('home_template', 'registration_view', 'Home_menu', 'secondary_menu', $message, $data);
            }
          } else {
              $messageText = 'User Already Exists, Try another';
                $messageType = "danger";
                $message = $this->createMessage($messageText, $messageType);
                $this->session->set_userdata('message', $message);
                 $data = ['title' => 'Register'];
                $this->template->load('home_template', 'registration_view', 'Home_menu', 'secondary_menu', $message, $data);
          }  
        } else {
            $this->session->unset_userdata("message");
            $data = ['title' => 'Register'];
            $this->template->load('home_template', 'registration_view', 'Home_menu', 'secondary_menu', '', $data);
        }
    }
    
    
    /*
      public function collectRegistrationFormData(){
      $this->load->model("User_Model");
      $firstName=$this->input->post("fname");
      $lastName=$this->input->post("lname");
      $fatherName=$this->input->post("father");
      $gender=$this->input->post("gender");
      $dob=$this->input->post("dob");
      $contact=$this->input->post("contact");
      $email=$this->input->post("email");
      $userName=$this->input->post("uname");
      $password=$this->input->post("password");
      $rePassword=$this->input->post("repassword");
      $userType=$this->input->post("registerType");
      $addressid=1;
      //$=$this->input->post("");
      //return;
      }
     */
     
     
      public function login() {
      
        $key='pageid';
        $val='login';
        $this->session->set_userdata($key,$val);
       
        if ($this->input->post('loginBtn')) {
            $captcha = $this->input->post("captcha");
            $userName = $this->input->post("uname");
            $password = $this->input->post("password");
            $utype = $this->input->post("loginType");
            //echo $captcha.' '.$userName.'  '.$password.'   '.$utype;
           
            if ($captcha === $this->session->tempdata('captchaWord')) {
                //echo $captcha.' '.$userName.'  '.$password.'   '.$utype;
                $data = array('uname' => $userName, 'password' => $password, 'role' => $utype);
                $this->load->model('User_Model');
                if ($this->User_Model->login($data)) {
                    //load appropriate dashboard 
                    //$first_Name=$this->session->userdata('userName');
                    $role=$this->session->userdata('role');
                   $isLoggedin=$this->session->userdata('isLoggedin');
                // echo $role;
                    switch ($role){
                        case 'branch':redirect('index.php/branch');break;
                        case 'customer':redirect('index.php/customer');break;
                        case 'member':redirect('index.php/member/');break;
                        case 'admin':redirect('index.php/admin');break;
                        case 'dealer':redirect('index.php/dealer');break;
                        default :$this->index();
                    }
                    
                   // echo 'Welcome ' .$first_Name ;
                   // echo 'Logged in='.$isLoggedin;
                   // echo 'Role='.$role;
                } else {
                    $messageText = 'User Name or Password Incorrect.';
                    $messageType = "danger";
                    // load log in view
                    $message = $this->createMessage($messageText, $messageType);
                    $data = [];
                    $data ['title'] = 'Login';
                    $data['mycaptcha'] = $this->createCaptcha();
                    $this->template->load('home_template', 'login_view', 'Home_menu', 'secondary_menu', $message, $data);
                    // echo $messageTest;
                }
            } else {
                $messageText = 'Invalid Captcha';
                $messageType = "danger";
                $message = $this->createMessage($messageText, $messageType);
                // load log in view
                $data = [];
                $data ['title'] = 'Login';
                $data['mycaptcha'] = $this->createCaptcha();
                $this->template->load('home_template', 'login_view', 'Home_menu', 'secondary_menu', $message, $data);
                //echo $messageTest;
            }}
         else {
            $data = [];
            $data ['title'] = 'Login';
            $data['mycaptcha'] = $this->createCaptcha();
            $message = ($this->session->userdata('message')) ? ($this->session->userdata('message')) : '';
            $this->template->load('home_template', 'login_view', 'Home_menu', 'secondary_menu', $message, $data);
        }
    }
    
    
     public function logout() {
        
        session_destroy();
        
        redirect('index.php/home');
       
    }
    
    
    
    public function forgot() {
        $this->session->set_userdata("pageid","forgot");
        $data = [];
        $data ['title'] = 'Reset Password';
        $data['mycaptcha'] = $this->createCaptcha();
        $this->template->load('home_template', 'forgotPassword_view', 'Home_menu', 'secondary_menu', '', $data);
    }
    
    
    public function createCaptcha() {
        $vals = array(
            'word_length' => 5, 'font_size' => 50,
            'img_width' => 150,
            'img_height' => 60,
            'expiration' => 300,
            'colors' => array(
                'background' => array(255, 255, 255),
                'border' => array(0, 0, 0),
                'text' => array(0, 0, 0),
                'grid' => array(155, 140, 140)),
            'img_path' => './captcha/',
            'img_url' => base_url().'captcha/',
            'pool'=>'0123456789'
        );
		echo $vals['img_path'];echo $vals['img_url'];
        $cap = create_captcha($vals);
        $captcha['image'] = $cap['image'];
        $val= $cap['word'];$captchaWord='captchaWord';
		//echo $val;echo $captchaWord;
       $this->session->unset_tempdata($captchaWord);
        $this->session->set_tempdata($captchaWord,$val,90);
		echo $this->session->tempdata('captchaWord');
        $display = $this->input->get('display');
        if ($display === 'y') {
            echo $captcha['image'];
        } else {
            return $captcha['image'];
        }
    }
   
    public function createMessage($message, $messageType) {
        if (!($messageType === 'success' || $messageType === 'warning' || $messageType === 'danger' || $messageType === 'info'))
            $messageType = 'info';
        $messageReady = "<p class='alert alert-" . $messageType . " alert-dismissable center-block'>"
                . " <button type='button' class='close' data-dismiss='alert' "
                . " area-hidden='true'>&times;</button>" . $message . "</p>";
        //echo $messageReady;
        return $messageReady;
    }
    public function changePassword() {
        $this->session->set_userdata("pageid","changePassword");
        $this->session->unset_userdata('message');
        if ($this->input->post('changePasswordBtn') === 'Submit') {
            $messageText = "Password Changed Successfully, Log in to continue.";

            $message = $this->createMessage($messageText, 'success');
            //echo $message;
            $this->session->set_userdata('message', $message);
            $this->login();
        } else {
            $this->session->unset_userdata('id');
            session_destroy();
            $data ['title'] = 'Change Password';
            $data['mycaptcha'] = $this->createCaptcha();
            $this->template->load('home_template', 'changePassword_view', 'Home_menu', 'secondary_menu', '', $data);
        }
    }
}