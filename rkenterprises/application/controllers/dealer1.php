<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class dealer extends CI_Controller {
    public function index() {
        $this->session->set_userdata("pageid", "dealerHome");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Dealer') && $isLoggedin) {
            $data = ['title' => 'Dashboard'];
            $message = '';
            $this->template->load('home_template', 'dealerDashboard_view', 'dealer_menu', 'dashboard_secondary_menu', $message, $data);
        } else {
            redirect('/home/logout');
        }
    }
    public function addQuestion() {
        $this->session->set_userdata("pageid", "addQuestion");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Faculty') && $isLoggedin) {
            $uid = $this->session->userdata('uid');
            $this->load->model('Exam_Model');
            $examList = $this->Exam_Model->getExamList($uid);
            $data = ['title' => 'Add Question', 'examList' => $examList];
            $message = '';
            $this->template->load('home_template', 'select_exam_view', 'faculty_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        }
    }
    public function addQuestionForm() {
        $message = '';
        $examidSet = 0;
        if (($this->input->post('qtext')) && ($this->input->post('answer'))) {
            $examid=$this->session->userdata('examid');
            $qno= $this->input->post('qno');
            $question = $this->input->post('qtext');
            $answer=$this->input->post('answer');
            $optionA=$this->input->post('optionAText');
            $optionB=$this->input->post('optionBText');
            $optionC=$this->input->post('optionCText');
            $optionD=$this->input->post('optionDText');
            $qtype=$this->input->post('qtype');
            $questionData=['question_no'=>$qno,'question_text'=>$question,'correct_answer'=>$answer,'optionA'=>$optionA,
                'optionB'=>$optionB,'optionC'=>$optionC,'optionD'=>$optionD,'question_type'=>$qtype,'examid'=>$examid];
            $this->load->model('Exam_Model');
            $questionAdded = $this->Exam_Model->getCurrentQuestionIndex($examid);
            $noq = $this->Exam_Model->getNumberofQuestion($examid);
            $this->load->model('Question_Model');
            if($questionAdded<$noq){
            if($this->Question_Model->addQuestion($questionData)){
            $messageText = "Question Added Successfully  ";
             //. $question."    ".$answer."    ".$optionA."    ".$optionB."    ".$optionC."    ".$optionD."    ".$qtype
            $messageType = "success";
            $message = $this->createMessage($messageText, $messageType);
            //echo $message."++++".$examid;
            
            $qadded=$this->Exam_Model->questionAdded($examid);
            if($qadded){
               $questionAdded = $this->Exam_Model->getCurrentQuestionIndex($examid)+1; 
            }
           
            
            }else{
               $questionAdded =0;
               $noq =0;
            }
             //$data = ['message' => $message, 'number_of_question' => 0, 'questionAdded' => 0];
             
            }else{
                $messageText = "All(" . $noq . ") Questions Added";
                    $messageType = "danger";
                    $message = $this->createMessage($messageText, $messageType);
                    
            }
            //$data = ['message' => $message, 'number_of_question' => $noq, 'questionAdded' => $questionAdded];
            $data = ['message' => $message, 'number_of_question' => $noq, 'questionAdded' => $questionAdded];
            $this->load->view('add_question_view', $data);
        } else {
            if ($this->input->get('examid')) {
                $examid = $this->input->get('examid');
                $this->session->set_userdata('examid', $examid);
                $examidSet = 1;
            } else if (!is_null($this->session->userdata('examid'))) {
                $examid = ($this->session->userdata('examid'));
                $examidSet = 1;
            }
            if ($examidSet === 1) {
                $this->load->model('Exam_Model');
                $questionAdded = $this->Exam_Model->getCurrentQuestionIndex($examid);
                $noq = $this->Exam_Model->getNumberofQuestion($examid);
                if ($noq === $questionAdded) {
                    $messageText = "All(" . $noq . ") Questions Added";
                    $messageType = "danger";
                    $message = $this->createMessage($messageText, $messageType);
                } else {
                    $messageText = "Total " . $questionAdded . " of " . $noq . " Questions Added";
                    $messageType = "success";
                    $message = $this->createMessage($messageText, $messageType);
                }
                $data = ['message' => $message, 'number_of_question' => $noq, 'questionAdded' => $questionAdded+1];
            } else {
                $messageText = "Exam Not selected";
                $messageType = "danger";
                $message = $this->createMessage($messageText, $messageType);
                $data = ['message' => $message, 'number_of_question' => 0, 'questionAdded' => 0];
            }
            $this->load->view('add_question_view', $data);
        }
        
        //echo $message;
    }
    public function deleteQuestion() {
        $this->session->set_userdata("pageid", "deleteQuestion");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Faculty') && $isLoggedin) {
            $uid = $this->session->userdata('uid');
            $this->load->model('Exam_Model');
            $examList = $this->Exam_Model->getExamList($uid);
            $data = ['title' => 'Delete Question', 'examList' => $examList];
            $message = '';
            $this->template->load('home_template', 'modify_question_view', 'faculty_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        }
    }
    public function editQuestion() {
        $this->session->set_userdata("pageid", "editQuestion");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Faculty') && $isLoggedin) {
            $uid = $this->session->userdata('uid');
            $this->load->model('Exam_Model');
            $examList = $this->Exam_Model->getExamList($uid);
            $data = ['title' => 'Edit Question', 'examList' => $examList];
            $message = '';
            $this->template->load('home_template', 'modify_question_view', 'faculty_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        }
    }
    public function facultyQuestionView() {
        $this->session->set_userdata("pageid", "facultyQuestionView");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Faculty') && $isLoggedin) {
            $uid = $this->session->userdata('uid');
            $this->load->model('Exam_Model');
            $examList = $this->Exam_Model->getExamList($uid);
            $data = ['title' => 'View Question', 'examList' => $examList];
            $message = '';
            $this->template->load('home_template', 'modify_question_view', 'faculty_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        }
    }
    public function facultyProfileView() {
        $this->session->set_userdata("pageid", "facultyProfileView");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Faculty') && $isLoggedin) {
            $this->load->model('User_Model');
            $uid = $this->session->userdata('uid');
            $userProfile = $this->User_Model->viewProfile($uid);
            $data = ['title' => 'User Profile', 'profile' => $userProfile];
            $message = '';
            $this->template->load('home_template', 'profile_view', 'faculty_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        }
    }
    public function createExam() {
        $this->session->set_userdata("pageid", "createExam");
        $uid = $this->session->userdata('uid');
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Faculty') && $isLoggedin) {
            $this->load->model('Exam_Model');
            $uid = $this->session->userdata('uid');
            $subjectList = $this->Exam_Model->getSubjectList();
            $data = ['title' => 'Create Exam', 'subjectList' => $subjectList];
            $message = '';
            if ($this->input->post('createExamBtn')) {
                $examName = $this->input->post('examname');
                $subject = $this->input->post('subject');
                $edate = $this->input->post('examDate');
                $noq = $this->input->post('number_of_question');
                $duration = $this->input->post('duration');
                $marks = $this->input->post('marks_per_question');
                $pass = $this->input->post('pass');
                $negative = ($this->input->post('negative') === "True") ? 1 : 0;
                if ($this->Exam_Model->checkDuplicateExamName($examName)) {
                    $subjectid = $this->Exam_Model->getSubjectId($subject);
                    $examData = array('exam_name' => $examName, 'subject_id' => $subjectid,
                        'exam_date' => $edate, 'number_of_question' => $noq, 'exam_status' => 'created', 'exam_duration' => $duration,
                        'value_of_each_question' => $marks, 'passing_marks' => $pass, 'negative_marking' => $negative, 'institute_id' => $uid);
                    if ($this->Exam_Model->createExam($examData)) {
                        $messageData = "Exam Created Successfully";
                        $messageType = "success";
                        $message = $this->createMessage($messageData, $messageType);
                        $this->template->load('home_template', 'createExam_view', 'faculty_menu', 'dashboard_secondary_menu', $message, $data);
                    } else {
                        $messageData = "Exam Not Created,Database insertion Error";
                        $messageType = "danger";
                        $message = $this->createMessage($messageData, $messageType);
                        $this->template->load('home_template', 'createExam_view', 'faculty_menu', 'dashboard_secondary_menu', $message, $data);
                    }
                } else {
                    $messageData = "Exam Name Already Taken,Try Another Name";
                    $messageType = "warning";
                    $message = $this->createMessage($messageData, $messageType);
                    $this->template->load('home_template', 'createExam_view', 'faculty_menu', 'dashboard_secondary_menu', $message, $data);
                }
                // $=$this->input->post('');
                // $=$this->input->post('');
            } else {
                $this->template->load('home_template', 'createExam_view', 'faculty_menu', 'dashboard_secondary_menu', $message, $data);
            }
        } else {

            redirect('/home/logout');
        }
    }
    public function deleteExam() {
        $this->session->set_userdata("pageid", "facultyDeleteExam");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Faculty') && $isLoggedin) {
            $message = '';
            $this->load->model('Exam_Model');
            $uid = $this->session->userdata('uid');
            if ($this->input->post_get('deleteExam')) {
                $message = $this->processDeleteExamBtn();
            }
            $examTable = $this->Exam_Model->getExam($uid);
            $data = ['title' => 'Delete Exam', 'examTable' => $examTable];

            $this->template->load('home_template', 'modify_exam_view', 'faculty_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        }
    }
    public function processDeleteExamBtn() {
        $examid = $this->input->post_get('deleteExam');
        if ($this->Exam_Model->deleteExam($examid)) {
            $messageData = "Exam Deleted Successfully(id-" . $examid . ")";
            $messageType = "success";
            $message = $this->createMessage($messageData, $messageType);
        } else {
            $messageData = "Exam Deletion Failed(id-" . $examid . ")";
            $messageType = "danger";
            $message = $this->createMessage($messageData, $messageType);
        }
        return $message;
    }
    public function copyExam() {
        $this->session->set_userdata("pageid", "facultyCopyExam");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Faculty') && $isLoggedin) {
            $message = '';
            $this->load->model('Exam_Model');
            $uid = $this->session->userdata('uid');
            if ($this->input->post_get('copyExam')) {
                $examid = $this->input->post_get('examid');
                if ($this->Exam_Model->copyExam($examid)) {
                    $messageData = "Exam copied Successfully(id-" . $examid . ")";
                    $messageType = "success";
                    $message = $this->createMessage($messageData, $messageType);
                } else {
                    $messageData = "Exam Copy Failed(id-" . $examid . ")";
                    $messageType = "danger";
                    $message = $this->createMessage($messageData, $messageType);
                }
            }
            $examTable = $this->Exam_Model->getExam($uid);
            $data = ['title' => 'Copy Exam', 'examTable' => $examTable];

            $this->template->load('home_template', 'modify_exam_view', 'faculty_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        }
    }
    public function editExam() {
        $this->session->set_userdata("pageid", "facultyEditExam");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Faculty') && $isLoggedin) {
            $message = '';
            $this->load->model('Exam_Model');
            $uid = $this->session->userdata('uid');
            if ($this->input->post_get('updateExamBtn')) {
                $this->processUpdateExamBtn();
            }
            if ($this->input->post_get('editExam')) {
                $this->processEditExamBtn();
            }
            $examTable = $this->Exam_Model->getExam($uid);
            $data = ['title' => 'Edit Exam', 'examTable' => $examTable];

            $this->template->load('home_template', 'modify_exam_view', 'faculty_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        }
    }
    public function processEditExamBtn() {
        $examid = $this->input->post_get('editExam');
        $examData = $this->Exam_Model->getExamById($examid);
        if (isset($examData)) {
            $subjectList = $this->Exam_Model->getSubjectList();
            $data = ['title' => 'Edit Exam', 'examData' => $examData, 'subjectList' => $subjectList];
            $this->template->load('home_template', 'editexam_view', 'faculty_menu', 'dashboard_secondary_menu', $message, $data);
        } else {
            $messageData = "Exam Data Access Failed(id-" . $examid . ")";
            $messageType = "danger";
            $message = $this->createMessage($messageData, $messageType);
        }
        return;
    }
    public function processUpdateExamBtn() {

        $examid = $this->input->post_get('updateExamBtn');
        $examname = $this->input->post('examname');
        $examdate = $this->input->post('examDate');
        $subject = $this->input->post('subject');
        $noq = $this->input->post('number_of_question');
        $duration = $this->input->post('duration');
        $marks = $this->input->post('marks_per_question');
        $pass = $this->input->post('pass');
        $negative = $this->input->post('negative');
        $examData = array('examid' => $examid, 'examname' => $examname, 'examdate' => $examdate,
            'subject' => $subject, 'noq' => $noq, 'duration' => $duration, 'marks' => $marks, 'pass' => $pass, 'negative' => $negative);
        //$=$this->input->post('');
        if ($this->Exam_Model->updateExam($examData)) {
            $messageData = "Exam Modified Successfully(id-" . $examid . ")";
            $messageType = "success";
            $message = $this->createMessage($messageData, $messageType);
        } else {
            $messageData = "Exam Modification Failed(id-" . $examid . ")";
            $messageType = "danger";
            $message = $this->createMessage($messageData, $messageType);
        }
        return;
    }
    public function facultyExamView() {
        $this->session->set_userdata("pageid", "facultyExamView");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Faculty') && $isLoggedin) {
            $message = '';
            $this->load->model('Exam_Model');
            $uid = $this->session->userdata('uid');

            $examTable = $this->Exam_Model->getExam($uid);
            $data = ['title' => 'View Exam', 'examTable' => $examTable];

            $this->template->load('home_template', 'modify_exam_view', 'faculty_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        }
    }
    public function temp() {
        $this->session->set_userdata("pageid", "faculty");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Faculty') && $isLoggedin) {
            $this->load->model('User_Model');
            $uid = $this->session->userdata('uid');

            $data = ['title' => ''];
            $message = '';
            $this->template->load('home_template', '', 'faculty_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        }
    }
    public function reg() {
        if ($this->input->post("regBtn")) {
            // echo $this->collectRegistrationFormData();
            $this->load->model("User_Model");
            $firstName = $this->input->post("fname");
            $lastName = $this->input->post("lname");
            $fatherName = $this->input->post("father");
            $gender = $this->input->post("gender");
            $dob = $this->input->post("dob");
            $contact = $this->input->post("contact");
            $email = $this->input->post("email");
            $userName = $this->input->post("uname");
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
            $this->session->unset_userdata("message");
            $data = ['title' => 'Register'];
            $this->template->load('home_template', 'registration_view', 'Home_menu', 'secondary_menu', '', $data);
        }
    }
   
    public function login() {
        if ($this->input->post('loginBtn')) {
            $captcha = $this->input->post("captcha");
            $userName = $this->input->post("uname");
            $password = $this->input->post("password");
            $utype = $this->input->post("loginType");
            if ($captcha === $this->session->userdata('captchaWord')) {
                $data = array('uname' => $userName, 'password' => $password, 'role' => $utype);
                $this->load->model('User_Model');
                if ($this->User_Model->login($data)) {
                    //load appropriate dashboard 
                    $first_Name = $this->session->userdata('userName');
                    $role = $this->session->userdata('role');
                    $isLoggedin = $this->session->userdata('isLoggedin');

                    echo 'Welcome ' . $first_Name;
                    echo 'Logged in=' . $isLoggedin;
                    echo 'Role=' . $role;
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
            }
        } else {
            $data = [];
            $data ['title'] = 'Login';
            $data['mycaptcha'] = $this->createCaptcha();
            $message = ($this->session->userdata('message')) ? ($this->session->userdata('message')) : '';
            $this->template->load('home_template', 'login_view', 'Home_menu', 'secondary_menu', $message, $data);
        }
    }
    public function forgot() {
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
            'img_url' => '/exameasy/captcha/'
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
    public function logout() {
        $delete_userdata = array('id');
        $this->session->unset_userdata($delete_userdata);
        session_destroy();
        //if($this->input->get('changePassword')==='y'){
        //     ;}
        // else{
        redirect($this->home);
        //}
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