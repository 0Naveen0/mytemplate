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

    <form id='modifyQuestionForm' method='post' class='small'>
        <table class='table table-striped table-bordered small'>
            <caption class='text-center'>Questions</caption>
            <thead>
                <tr class=' text-nowrap'>
                    <th>
                        Id
                        <button class='glyphicon glyphicon-arrow-down small' name='sortviewdesc' value='questionid'></button>
                        <button name='sortviewasc' value='questionid' class='small glyphicon glyphicon-arrow-up'></button>
                    </th>
                    <th>
                        Q.No.
                        <button class='glyphicon glyphicon-arrow-down small' name='sortviewdesc' value='questionno'></button>
                        <button name='sortviewasc' value='questionno' class='glyphicon glyphicon-arrow-up small'></button>
                    </th>
                    <th>
                        Type
                        <button class='glyphicon glyphicon-arrow-down small' name='sortviewdesc' value='questiontype'></button>
                        <button name='sortviewasc' value='questiontype' class='glyphicon glyphicon-arrow-up small'></button>
                    </th>
                    <th>
                        Question
                        
                    </th>
                    <th>
                        Answer
                        
                    </th>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                   
                    <?php
                    if ($pageid === 'deleteQuestion' || $pageid === 'editQuestion' || $pageid === 'copyQuestion') {
                        echo '<th>Action</th>';
                    }
                    ?>
                </tr></thead><tbody>
                <?php
                
                foreach ($questionTable as $question) {
                    echo '<tr>'
                    . '<th>' . $question["questionId"] . '</th>'
                    . '<th>' . $question["questionNo"] . '</th>'
                    . '<th>' . $question["questionType"] . '</th>'
                    . '<th>' . $question["questionText"] . '</th>'
                    . '<th>' . $question["questionAnswer"] . '</th>'
                            . '<th>' . $question["optionA"] . '</th>'
                    . '<th>' . $question["optionB"] . '</th>'
                    
                    . '<th>' . $question["optionC"] . '</th>'
                    . '<th>' . $question["optionD"] . '</th>';


                    if ($pageid === 'deleteQuestion') {
                        echo '<th><button class="btn btn-danger btn-small" name="deleteQuestion" value="'.$question["questionId"].'">Delete</button>'
                        . '</th></tr>';
                    } elseif ($pageid === 'editQuestion') {
                        echo '<th><button class="btn btn-small btn-success" name="editQuestion" value="'.$question["questionId"].'">Edit</button>'
                        . '</th></tr>';
                    } elseif ($pageid === 'copyQuestion') {
                        echo '<th><button class="btn btn-default btn-small" name="copyQuestion" value="'.$question["questionId"].'">Copy</button>'
                        . '</th></tr>';
                    } elseif ($pageid === 'facultyQuestionView') {
                        echo '</tr>';
                    }
                }
                ?>
            </tbody></table></form>
</div>