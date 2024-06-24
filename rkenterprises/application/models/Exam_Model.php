<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of Exam_Model
 *
 * @author Naveen Kamal 
 */
class Exam_Model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    public function getSubjectList() {
        $subject = array();
        $query = $this->db->select('subject')
                ->from('subject')
                ->get();
        if ($query->num_rows() === 0) {
            return $subject;
        } else {
            $i = 0;
            foreach ($query->result() as $row) {
                $subject[$i++] = $row->subject;
            }
            return $subject;
        }
    }
    public function getExamList($institute_id) {
        $examList = array();
        $query = $this->db->select('exam_name,exam_id')
                ->from('exam_master')
                ->where('institute_id', $institute_id)
                ->get();
        if ($query->num_rows() === 0) {
            return $examList;
        } else {
            $i = 0;
            foreach ($query->result() as $row) {
                $examList[$i++] = array('examname' => $row->exam_name, 'examid' => $row->exam_id);
            }
            return $examList;
        }
    }
    public function checkDuplicateExamName($examName) {
        $query = $this->db->select('exam_name')
                ->from('exam_master')
                ->where('exam_name', $examName)
                ->get();
        if ($query->num_rows() === 0) {
            return true;
        } else {
            return false;
        }
    }
    public function getSubjectId($subject) {
        $query = $this->db->select('subject_id')
                ->from('subject')
                ->where('subject', $subject)
                ->get();
        if ($query->num_rows() === 1) {
            $row = $query->row();

            return $row->subject_id;
        } else {
            return 1;
        }
    }
    public function getSubjectName($subjectid) {
        $query = $this->db->select('subject')
                ->from('subject')
                ->where('subject_id', $subjectid)
                ->get();
        if ($query->num_rows() === 1) {
            $row = $query->row();

            return $row->subject;
        } else {
            return "NA";
        }
    }
    public function createExam($data) {
        if ($this->db->insert("exam_master", $data)) {
            return true;
        }
    }
    public function getNumberofQuestion($examid) {
        $query = $this->db->select('number_of_question')
                ->from('exam_master')
                ->where('exam_id', $examid)
                ->get();
        if ($query->num_rows() === 1) {
            $row = $query->row();

            return $row->number_of_question;
        } else {
            return "NA";
        }
    }
    public function getCurrentQuestionIndex($examid) {
        $query = $this->db->select('total_question_added')
                ->from('exam_master')
                ->where('exam_id', $examid)
                ->get();
        if ($query->num_rows() === 1) {
            $row = $query->row();

            return $row->total_question_added;
        } else {
            return "NA";
        }
    }
    public function getExam($userid) {
        $examTable = array();
        $query = $this->db->select('exam_id,exam_name,subject_id,exam_date,exam_duration,'
                        . 'number_of_question,negative_marking,passing_marks,value_of_each_question')
                ->from('exam_master')
                ->where('institute_id', $userid)
                ->get();
        foreach ($query->result() as $row) {
            $subject = $this->getSubjectName($row->subject_id);
            if ($row->negative_marking) {
                $negative = "True";
            } else {
                $negative = "False";
            }
            $examTable[] = array('examid' => $row->exam_id, 'examname' => $row->exam_name, 'examdate' => $row->exam_date,
                'subject' => $subject, 'no_of_question' => $row->number_of_question,
                'duration' => $row->exam_duration, 'negative' => $negative,
                'pass' => $row->passing_marks, 'marks' => $row->value_of_each_question);
        }
        return $examTable;
    }
    public function updateExam($examData) {
        $subjectid = $this->getSubjectId($examData['subject']);
        $negative = ($examData['negative'] === 'True') ? 1 : 0;
        $data = array('exam_name' => $examData['examname'], 'subject_id' => $subjectid,
            'exam_date' => $examData['examdate'], 'exam_duration' => $examData['duration'],
            'number_of_question' => $examData['noq'], 'negative_marking' => $negative,
            'passing_marks' => $examData['pass'], 'value_of_each_question' => $examData['marks']);

        $this->db->where('exam_id', $examData['examid']);
        if ($this->db->update('exam_master', $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function decreaseQuestionAdded($examid) {
        $questionAdded = $this->getCurrentQuestionIndex($examid);
        if ($questionAdded > 0) {
            $questionAdded--;
            $data = array('total_question_added' => $questionAdded);
            $this->db->where('exam_id', $examid);
            if ($this->db->update('exam_master', $data)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function questionAdded($examid) {
        $questionAdded = $this->getCurrentQuestionIndex($examid);
        $noq = $this->getNumberofQuestion($examid);
        if ($questionAdded < $noq) {
            $questionAdded++;
            $data = array('total_question_added' => $questionAdded);
            $this->db->where('exam_id', $examid);
            if ($this->db->update('exam_master', $data)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function getExamById($examid) {
        $examData = array();
        $query = $this->db->select('exam_id,exam_name,subject_id,exam_date,exam_duration,'
                        . 'number_of_question,negative_marking,passing_marks,value_of_each_question')
                ->from('exam_master')
                ->where('exam_id', $examid)
                ->get();
        if ($query->num_rows() === 1) {
            $row = $query->row();
            $subject = $this->getSubjectName($row->subject_id);
            $negative = $row->negative_marking ? "True" : "False";
            $examData = ['examid' => $row->exam_id, 'examname' => $row->exam_name, 'subject' => $subject,
                'date' => $row->exam_date, 'duration' => $row->exam_duration, 'noq' => $row->number_of_question,
                'negative' => $negative, 'pass' => $row->passing_marks, 'marks' => $row->value_of_each_question];
//echo $subject;
            return $examData;
        } else {

            return $examData;
        }
    }
    public function deleteExam($examid) {
        $this->db->where('exam_id', $examid);
        if ($this->db->delete('exam_master')) {
            return true;
        } else {
            return false;
        }
    }
    public function editExam() {
        
    }
    public function duplicateExamName() {
        
    }
}