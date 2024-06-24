<?php

class exam extends CI_Controller{

public function index(){
    $this->session->set_userdata("pageid","examBoard");
    $role=$this->session->userdata('role');
    $isLoggedin=$this->session->userdata('isLoggedin');
    if(($role==='Student')&& $isLoggedin){
     $data = ['title' => 'Dashboard'];
     $message='';
        $this->template->load('home_template', 'studentDashboard_view', 'student_menu', 'dashboard_secondary_menu', $message, $data);
    //$this->load->view('student_view');
    }
    else{
        //$this->home->logout;
        redirect('/home/logout');
    }
}
public function registration(){$this->load->view('registration_view');}
public function signin(){$this->load->view('signin_view');}
public function exam(){$this->load->view('exam_view');}



}




?>