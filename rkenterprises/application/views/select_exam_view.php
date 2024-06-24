<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
//$examSelected = is_null($this->session->userdata('examid')) ? "" : ($this->session->userdata('examid'));
//$questionNo=isset($questionNumber)?$questionNumber:0;
//$questionNo = 0;
?>
<form role="form" class="form-horizontal small" method='post'>
 <fieldset>
     <legend class='text-center '>Select Exam</legend>
    <div class="form-group">  
     
                <label for="subject" class="col-sm-3 control-label">Exam</label>
                <div class="col-sm-9">      
                    <select class="form-control" name="examSelect">
                        <option value="select" selected>-Select-</option>
                        <?php
                        $i = 0;
                        $j = 0;
                        foreach ($examList as $exam) {
                            //echo $subject." </br>";
                            if ($j === 0) {
                                echo '<option value="' . $exam['examid'] . '">' . $exam['examname'] . '</option>';
                                $j = 1;
                            } else {
                                echo '<option value="' . $exam['examid'] . '">' . $exam['examname'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>     

            </div>
</fieldset>
</form>
<?php
$pageid=$this->session->userdata('pageid');
if($pageid==='addQuestion'){
echo "<div id='examContent'></div>";
}elseif($pageid==='deleteQuestion'||$pageid==='editQuestion') {
    echo "<div id='questionContent'></div>";
}  

        ?>