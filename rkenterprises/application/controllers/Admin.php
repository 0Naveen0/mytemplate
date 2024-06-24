<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends MY_Controller {
    public function index() {
        $this->session->set_userdata("pageid", "adminHome");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'admin') && $isLoggedin) {
            $data = ['title' => 'Dashboard'];
            $message = '';
            $this->template->load('home_template', 'adminDashboard_view', 'admin_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        }
    }
    
     public function changePasswordAdmin() {
          $this->session->set_userdata("pageid", "adminChangePassword");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'admin') && $isLoggedin) {
            $message = '';
         
$userlist=array();

 $this->load->model("User_Model");
 $userlist=$this->User_Model->getUserList();
           
              $data = ['title' => 'Change Pasword','userlist'=>$userlist];
            if($this->input->post("newpassword")){
                $newpassword=$this->input->post("newpassword");
                 $retypepassword=$this->input->post("retypepassword");
                 $uid=$this->input->post('selectuser');
                 $changepassword=['uid'=>$uid,'password'=>$newpassword];
                 if(($newpassword===$retypepassword)&&($newpassword!=='')&&($retypepassword!=='')){
                     $message=$this->User_Model->changePassword($changepassword);
                     
                 }else{
                     $message="Password empty or mismatch";
                 }
                
                 $this->template->load('home_template', 'adminChangePassword_view', 'admin_menu', 'dashboard_secondary_menu', $message, $data);  
                
            }else{
           
            
           
            $this->template->load('home_template', 'adminChangePassword_view', 'admin_menu', 'dashboard_secondary_menu', $message, $data);
            }
        } else {

            redirect('/home/logout');
        }
     }
     
     
      public function changeRole() {
          
           $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'admin') && $isLoggedin) {
            $userrole=$this->input->get('userrole');
            $uid=$this->input->get('uid');
            $data=['uid'=>$uid,'role'=>$userrole];
            $this->load->model("User_Model");
            echo $this->User_Model->changeRole($data);
            
        }
          
          
          
      }
      
      
      public function getRole() {
          $role = $this->session->userdata('role');
          $uid=$this->input->get('uid');
          $userrole="other";
            $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'admin') && $isLoggedin) {
              $this->load->model("User_Model");
            $userrole= $this->User_Model->getUserRole($uid);
            
        }
          
         echo $userrole; 
      }
     
     
     
    
    public function createUser() {
        $this->session->set_userdata("pageid", "createUser");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'admin') && $isLoggedin) {
            if ($this->input->post("regBtn")) {
                $this->load->model("User_Model");
                $userName = $this->input->post("uname");
                if ($this->User_Model->checkUserName($userName)) {
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
                        $messageText = 'User Added Successfully';
                        $messageType = "success";
                        $message = $this->createMessage($messageText, $messageType);
                        $this->session->set_userdata('message', $message);
                        $data = ['title' => 'Add User'];
                        $this->template->load('home_template', 'registration_view', 'admin_menu', 'dashboard_secondary_menu', $message, $data);
                    } else {
                        $messageText = 'Registration Failed, Try again';
                        $messageType = "danger";
                        $message = $this->createMessage($messageText, $messageType);
                        $this->session->set_userdata('message', $message);
                        $data = ['title' => 'Add User'];
                        $this->template->load('home_template', 'registration_view', 'admin_menu', 'dashboard_secondary_menu', $message, $data);
                    }
                } else {
                    $messageText = 'User Already Exists, Try another';
                    $messageType = "danger";
                    $message = $this->createMessage($messageText, $messageType);
                    $this->session->set_userdata('message', $message);
                    $data = ['title' => 'Add User'];
                    $this->template->load('home_template', 'registration_view', 'admin_menu', 'dashboard_secondary_menu', $message, $data);
                }
            } else {
                $this->session->unset_userdata("message");
                $data = ['title' => 'Add User'];
                $this->template->load('home_template', 'registration_view', 'admin_menu', 'dashboard_secondary_menu', '', $data);
            }
        } else {
            redirect('/home/logout');
        }
    }
    public function deleteUser() {
        $message="";$messageType="";
        $this->session->set_userdata("pageid", "deleteUser");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Administrator') && $isLoggedin) {
          $this->load->model("User_Model");
         // echo 'Loggedin';
          $uid=$this->input->post("deleteUser");
          //echo 'uid= '.$uid;
          if($uid){
              //echo 'Submitted';
              
              $deleteData=array('uid'=>$uid);
              if($this->User_Model->deleteUser($deleteData)){
                  $messageText=" Deleted User id=".$uid."successfully";
                  $messageType="success";
                 // echo $uid.' '.$messageText;
              }else{
                  $messageType="danger";
                  $messageText="Error Deleting User id=".$uid;
              }
              
          }
          $message=$this->createMessage($message, $messageType);
          //$deleteTable=[];
          $deleteTable=$this->User_Model->getdeleteUserTable();
          $data=['message'=>$message];
          $this->session->set_userdata('message',$message);
        $data = ['title' => 'Delete User','deleteTable'=>$deleteTable];
        $this->template->load('home_template', 'delete_user_view', 'admin_menu', 'dashboard_secondary_menu', '', $data);
   } else {
            redirect('/home/logout');
        }
        
        
        }
    
   public function adminUsersView(){
      $this->session->set_userdata("pageid", "adminUsersView");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Administrator') && $isLoggedin) {
           $order=[];
            if($this->input->post('sortviewasc')){
               switch($this->input->post('sortviewasc')){
                   case 'fname':$field='first_name';break;
                   case 'lname':$field='last_name';break;
                   case 'uname':$field='uname';break;
                   case 'role':$field='role';break;
                   case 'uid':$field='uid';break;
                   default:$field='uid';
               }
                //$field=$this->input->post('sortviewasc');
                $order=['field'=>$field,'order'=>'ASC']; 
            }elseif($this->input->post('sortviewdesc')){
                switch($this->input->post('sortviewdesc')){
                   case 'fname':$field='first_name';break;
                   case 'lname':$field='last_name';break;
                   case 'uname':$field='uname';break;
                   case 'role':$field='role';break;
                   case 'uid':$field='uid';break;
                   default:$field='uid';
               }
             //$field=$this->input->post('sortviewdesc');
                $order=['field'=>$field,'order'=>'DESC'];   
            }else{
                $order=['field'=>'uid','order'=>'ASC'];
            }
            $this->load->model('User_Model');
            
            $usersList=$this->User_Model->adminViewUser($order);
            $data = ['title' => 'User List','userTable'=>$usersList];
            $message = '';
            $this->template->load('home_template', 'admin_user_view', 'admin_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        } 
   }
   public function adminProfileView(){
       $this->session->set_userdata("pageid", "adminProfileView");
        $role = $this->session->userdata('role');
        $uid= $this->session->userdata('uid');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Administrator') && $isLoggedin) {
            $this->load->model('User_Model');
            
            $userProfile=$this->User_Model->viewProfile($uid);
        $data = ['title' => 'User Profile','profile'=>$userProfile];
            $message = '';
            $this->template->load('home_template', 'profile_view', 'admin_menu', 'dashboard_secondary_menu', $message, $data);    
            
       } else {

            redirect('/home/logout');
        } 
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
            'img_url' => '/apoorvatraders/captcha/'
        );
        $cap = create_captcha($vals);
        $captcha['image'] = $cap['image'];
        $this->session->set_flashdata('captchaWord', $cap['word']);
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
   
}