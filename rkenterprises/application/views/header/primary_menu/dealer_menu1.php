<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
$pageid=($this->session->userdata("pageid"))?($this->session->userdata("pageid")):"";
//echo $pageid;
?>
<div>

<ul class="nav nav-pills">
<li><a  href="/exameasy/index.php/faculty" class='<?php echo ($pageid==="facultyHome")?"selected_menu":"";?>'>Home</a></li>

<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="/exameasy/index.php/faculty">Exam <span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a  href="/exameasy/index.php/faculty/createExam" class='<?php echo ($pageid==="createExam")?"selected_menu":"";?>'>Create Exam</a></li>
<li><a href="/exameasy/index.php/faculty/editExam" class='<?php echo ($pageid==="facultyEditExam")?"selected_menu":"";?>'>Edit Exam</a></li>
<li><a  href="/exameasy/index.php/faculty/copyExam" class='<?php echo ($pageid==="facultyCopyExam")?"selected_menu":"";?>'>Copy Exam</a></li>
<li><a  href="/exameasy/index.php/faculty/deleteExam" class='<?php echo ($pageid==="facultyDeleteExam")?"selected_menu":"";?>'>Delete Exam</a></li>
<li><a href="/exameasy/index.php/faculty/addQuestion" class='<?php echo ($pageid==="addQuestion")?"selected_menu":"";?>'>Add Question</a></li>
<li><a href="/exameasy/index.php/faculty/editQuestion" class='<?php echo ($pageid==="editQuestion")?"selected_menu":"";?>'>Edit Question</a></li>
<li><a href="/exameasy/index.php/question/deleteQuestion" class='<?php echo ($pageid==="deleteQuestion")?"selected_menu":"";?>'>Delete Question</a></li>
<li><a href="/exameasy/index.php/faculty/startExam" class='<?php echo ($pageid==="startExam")?"selected_menu":"";?>'>Start/Stop Exam</a></li>
</ul>
</li>

<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="/exameasy/index.php/faculty">Student<span class="caret"></span></a>
<ul class="dropdown-menu">
<li ><a href="/exameasy/index.php/faculty/approveStudent" class='<?php echo ($pageid==="approveStudent")?"selected_menu":"";?>'>Approve</a></li>
<li><a href="/exameasy/index.php/faculty/disapproveStudent" class='<?php echo ($pageid==="disapproveStudent")?"selected_menu":"";?>'>Disapprove</a></li>
</ul></li> 
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="/exameasy/index.php/faculty">Result<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="/exameasy/index.php/faculty/createResult" class='<?php echo ($pageid==="createResult")?"selected_menu":"";?>'>Create Result</a></li>
<li><a href="/exameasy/index.php/faculty/publishResult" class='<?php echo ($pageid==="publishResult")?"selected_menu":"";?>'>Publish Result</a></li>
</ul></li> 

<li><a href="/exameasy/index.php/faculty/gallery" class='<?php echo ($pageid==="facultyGallery")?"selected_menu":"";?>'>Gallery</a></li>
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="/exameasy/index.php/faculty">View<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a  href="/exameasy/index.php/faculty/facultyExamView" class='<?php echo ($pageid==="facultyExamView")?"selected_menu":"";?>'>Exam</a></li>
<li><a  href="/exameasy/index.php/faculty/facultyQuestionView" class='<?php echo ($pageid==="facultyQuestionView")?"selected_menu":"";?>'>Question</a></li>
<li><a href="/exameasy/index.php/faculty/facultyApplicationView" class='<?php echo ($pageid==="facultyApplicationView")?"selected_menu":"";?>'>Application</a></li>
<li><a href="/exameasy/index.php/faculty/facultyResultView" class='<?php echo ($pageid==="facultyResultView")?"selected_menu":"";?>'>Result</a></li>
<li><a  href="/exameasy/index.php/faculty/facultyResponseView" class='<?php echo ($pageid==="facultyResponseView")?"selected_menu":"";?>'>Response</a></li>
<li><a href="/exameasy/index.php/faculty/facultyProfileView" class='<?php echo ($pageid==="facultyProfileView")?"selected_menu":"";?>'>Profile</a></li>
</ul>
</li>




</ul>
</div>