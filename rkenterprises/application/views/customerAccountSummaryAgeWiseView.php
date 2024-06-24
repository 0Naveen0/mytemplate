<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
//$examSelected = is_null($this->session->userdata('examid')) ? "" : ($this->session->userdata('examid'));
//$questionNo=isset($questionNumber)?$questionNumber:0;
//$questionNo =(is_null($currentQuestionNo)OR(!defined($currentQuestionNo)))?0:$currentQuestionNo;
?>
<?php 
//echo $message;
?>
<div >
    <form role="form" class="form-horizontal small" method='post' id="customerAccountSummaryAgeWisefrm">
        <fieldset>  
            
           
            <legend class='text-center '>Account Summary</legend>
            
            

 <div class="form-group"> 
                 <label for="branch" class="col-sm-3 control-label">Branch</label>
                <div class="col-sm-9">      
                    <select class="form-control" name="branchSelectAccountSummary">
                        <option value="select" selected>-Select-</option>
                        <?php
                        $i = 0;
                        $j = 0;
                        foreach ($branchList as $branch) {
                            
                           
                                echo '<option value="' . $branch['branchid'] . '">' . $branch['branchname'] . '</option>';
                            
                        }
                        ?>
                    </select>
                </div>  

            </div>
           
        </fieldset>
    </form>
</div>

    
                <div id=summaryAgeWiseContent name=summaryAgeWiseContent></div>
    
    


