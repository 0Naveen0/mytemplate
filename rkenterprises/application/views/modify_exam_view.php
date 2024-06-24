<?php
/*
 * To change this license header, choose License Headers in Project Properties
 * To change this template file, choose Tools | Templates
 * and open the template in the editor
 */
defined('BASEPATH') OR exit('No direct script access allowed');
//echo <p class='label'>Student Dashboard</p>;
//$this->session->set_userdata("pageid", "facultyExamView");
//$this->session->set_userdata("pageid", "facultyEditExam");
//$this->session->set_userdata("pageid", "facultyCopyExam");
//$this->session->set_userdata("pageid", "facultyDeleteExam");
$pageid = $this->session->userdata('pageid');

?>

<div class='table-responsive small'>

    <form id='modifyExamForm' method='post' class='small'>
        <table class='table table-striped table-bordered small'>
            <caption class='text-center'>Exams</caption>
            <thead>
                <tr class=' text-nowrap'>
                    <th>
                        Id
                        <button class='glyphicon glyphicon-arrow-down small' name='sortviewdesc' value='examid'></button>
                        <button name='sortviewasc' value='examid' class='small glyphicon glyphicon-arrow-up'></button>
                    </th>
                    <th>
                        Exam Name
                        <button class='glyphicon glyphicon-arrow-down small' name='sortviewdesc' value='examname'></button>
                        <button name='sortviewasc' value='examname' class='glyphicon glyphicon-arrow-up small'></button>
                    </th>
                    <th>
                        Exam Date
                        <button class='glyphicon glyphicon-arrow-down small' name='sortviewdesc' value='examdate'></button>
                        <button name='sortviewasc' value='examdate' class='glyphicon glyphicon-arrow-up small'></button>
                    </th>
                    <th>
                        Subject
                        <button class='glyphicon glyphicon-arrow-down small' name='sortviewdesc' value='subject'></button>
                        <button name='sortviewasc' value='subject' class='glyphicon glyphicon-arrow-up small'></button>
                    </th>
                    <th>
                        Number of Question
                        <!--
                        <button class='glyphicon glyphicon-arrow-down small' name='sortviewdesc' value='number_of_question'></button>
                        <button name='sortviewasc' value='number_of_question' class='glyphicon glyphicon-arrow-up small'></button>-->
                    </th>
                    <th>Negative</th>
                    <th>

                        Duration
                        <!-- <button class='glyphicon glyphicon-arrow-down small' name='sortviewdesc' value='duration'></button>
                         <button name='sortviewasc' value='duration' class='glyphicon glyphicon-arrow-up small'></button>-->
                    </th>
                    <th class=''>Passing &percnt;</th>
                    <th>Marks Per Question</th>
                    <?php
                    if ($pageid === 'facultyDeleteExam' || $pageid === 'facultyEditExam' || $pageid === 'facultyCopyExam') {
                        echo '<th>Action</th>';
                    }
                    ?>
                </tr></thead><tbody>
                <?php
                
                foreach ($examTable as $exam) {
                    echo '<tr>'
                    . '<th>' . $exam["examid"] . '</th>'
                    . '<th>' . $exam["examname"] . '</th>'
                    . '<th>' . $exam["examdate"] . '</th>'
                    . '<th>' . $exam["subject"] . '</th>'
                    . '<th>' . $exam["no_of_question"] . '</th>'
                            . '<th>' . $exam["negative"] . '</th>'
                    . '<th>' . $exam["duration"] . '</th>'
                    
                    . '<th>' . $exam["pass"] . '</th>'
                    . '<th>' . $exam["marks"] . '</th>';


                    if ($pageid === 'facultyDeleteExam') {
                        echo '<th><button class="btn btn-danger btn-small" name="deleteExam" value="'.$exam["examid"].'">Delete</button>'
                        . '</th></tr>';
                    } elseif ($pageid === 'facultyEditExam') {
                        echo '<th><button class="btn btn-small btn-success" name="editExam" value="'.$exam["examid"].'">Edit</button>'
                        . '</th></tr>';
                    } elseif ($pageid === 'facultyCopyExam') {
                        echo '<th><button class="btn btn-default btn-small" name="copyExam" value="'.$exam["examid"].'">Copy</button>'
                        . '</th></tr>';
                    } elseif ($pageid === 'facultyExamView') {
                        echo '</tr>';
                    }
                }
                ?>
            </tbody></table></form>
</div>