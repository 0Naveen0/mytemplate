<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class question extends CI_Controller {
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
            $examid = $this->session->userdata('examid');
            $qno = $this->input->post('qno');
            $question = $this->input->post('qtext');
            $answer = $this->input->post('answer');
            $optionA = $this->input->post('optionAText');
            $optionB = $this->input->post('optionBText');
            $optionC = $this->input->post('optionCText');
            $optionD = $this->input->post('optionDText');
            $qtype = $this->input->post('qtype');
            $questionData = ['question_no' => $qno, 'question_text' => $question, 'correct_answer' => $answer, 'optionA' => $optionA,
                'optionB' => $optionB, 'optionC' => $optionC, 'optionD' => $optionD, 'question_type' => $qtype, 'examid' => $examid];
            $this->load->model('Exam_Model');
            $questionAdded = $this->Exam_Model->getCurrentQuestionIndex($examid);
            $noq = $this->Exam_Model->getNumberofQuestion($examid);
            $this->load->model('Question_Model');
            if ($questionAdded < $noq) {
                if ($this->Question_Model->addQuestion($questionData)) {
                    $messageText = "Question Added Successfully  ";
                    //. $question."    ".$answer."    ".$optionA."    ".$optionB."    ".$optionC."    ".$optionD."    ".$qtype
                    $messageType = "success";
                    $message = $this->createMessage($messageText, $messageType);
                    //echo $message."++++".$examid;

                    $qadded = $this->Exam_Model->questionAdded($examid);
                    if ($qadded) {
                        $questionAdded = $this->Exam_Model->getCurrentQuestionIndex($examid) + 1;
                    }
                } else {
                    $questionAdded = 0;
                    $noq = 0;
                }
                //$data = ['message' => $message, 'number_of_question' => 0, 'questionAdded' => 0];
            } else {
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
                $data = ['message' => $message, 'number_of_question' => $noq, 'questionAdded' => $questionAdded + 1];
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
        $message = '';
        $messageText = '';
        $messageType = '';
        $this->session->set_userdata("pageid", "deleteQuestion");
        $role = $this->session->userdata('role');
        $isLoggedin = $this->session->userdata('isLoggedin');
        if (($role === 'Faculty') && $isLoggedin) {
            $uid = $this->session->userdata('uid');
            $this->load->model('Exam_Model');
            $this->load->model('Question_Model');
            $examid = 2;
            $questionid = 44;

            if ($this->Question_Model->deleteQuestion($questionid)) {

                if ($this->Question_Model->rearrangeQuestionNumber($examid)) {

                    if ($this->Exam_Model->decreaseQuestionAdded($examid)) {
                        $messageText = 'Question deleted successfully';
                        $messageType = 'success';
                        $message = $this->createMessage($messageText, $messageType);
                    } else {
                        $messageText = 'Question deleted and arranged but total number of question not decreased ';
                        $messageType = 'danger';
                        $message = $this->createMessage($messageText, $messageType);
                    }
                } else {
                    $messageText = 'Question deleted but arrangement failed';
                    $messageType = 'danger';
                    $message = $this->createMessage($messageText, $messageType);
                }
            } else {
                $messageText = 'Question deletion failed';
                $messageType = 'danger';
                $message = $this->createMessage($messageText, $messageType);
            }
            $examList = $this->Exam_Model->getExamList($uid);
            $data = ['title' => 'Delete Question', 'examList' => $examList];

            $this->template->load('home_template', 'select_exam_view', 'faculty_menu', 'dashboard_secondary_menu', $message, $data);
        } else {

            redirect('/home/logout');
        }
    }
    public function showQuestionsOfSelectedExam(){
        
        $examid=$this->input->get_post("examid");
        $this->session->set_userdata("examid", $examid);
        $this->load->model("Question_Model");
        
        $questionTable=$this->Question_Model->getQuestionsByExam($examid);
        $data=['questionTable'=>$questionTable];
        $this->load->view("modify_question_view",$data);
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
        redirect($this->home);
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