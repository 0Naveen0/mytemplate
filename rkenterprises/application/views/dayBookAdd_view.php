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
    <form role="form" class="form-horizontal small" method='post' id="addDayBookfrm">
        <fieldset>  
            
           
            <legend class='text-center '>Day Book Entry</legend>
            
            <div class="form-group">
                <label for="qno" class="col-sm-3 control-label">Date</label>
                <div class="col-sm-9">

                    <input type="date" class="form-control" id="addDate" name='addDate'   required="required" >
                </div>
            </div>

 <div class="form-group"> 
                 <label for="branch" class="col-sm-3 control-label">Branch</label>
                <div class="col-sm-9">      
                    <select class="form-control" name="branchSelect">
                        <option value="select" selected>-Select-</option>
                        <?php
                        $i = 0;
                        $j = 0;
                        foreach ($branchList as $branch) {
                            //echo $subject." </br>";
                           
                                echo '<option value="' . $branch['branchid'] . '">' . $branch['branchname'] . '</option>';
                            
                        }
                        ?>
                    </select>
                </div>  

            </div>
            
            
            
            <div class="form-group"> 
                <div class="">
                    <label for="customerName" class="control-label col-sm-3">Customer Name</label>
                </div>
                <div class="col-sm-9 ">
                    <select class="form-control" name="customerSelect" id="customerContent">
                        <option value="select" selected>-Select-</option>
                       
                  </select>

                </div>

            </div>
            

           
            <div class="form-group"> 

                <label  class="control-label col-sm-3">Type</label>
                <div class="col-sm-9">
                    <label class='checkbox-inline'>
                        <input type="radio" class="" name='transactiontype' id='debitRadio' value='debit' checked >DEBIT
                    </label>
                    <label class='checkbox-inline'>
                        <input type="radio" class=" " name='transactiontype' id='creditRadio' value='credit'  >CREDIT
                    </label>
                </div>
            </div>
            
            <div class="form-group">        
                <label for="amount" class="col-sm-3 control-label">Amount</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control col-sm-9" id="amount"  name='amount' required="required">
                </div>
            </div>
            
             <div class="form-group"> 
                <div class="">
                    <label for="remark" class="control-label col-sm-3">Remark</label>
                </div>
                <div class="col-sm-9 ">
                    <select class="form-control" name="remarkSelect">
                        <option value="select" selected>-Select-</option>
                        <?php
                        
                        foreach ($remarkList as $remark) {
                           
                                echo '<option value="' . $remark['remarkid'] . '">' . $remark['remarkname'] . '</option>';
                           
                        }
                        ?>
                    </select>

                </div>

            </div>
            
            <div class="form-group"> 
                <div class="">
                    <label for="comment" class="control-label col-sm-3">Comment</label>
                </div>
                <div class="col-sm-9 ">
                    <textarea class="form-control" id="comment" name='comment' maxlength="150" required="required" value="NA"></textarea>

                </div>

            </div>
            
           
            <div class="form-group">
                <div class="col-sm-9">
                </div>
                <div class="col-sm-3">
                    <input type="reset" class="btn btn-default pull-right" name="resetBtn" value="Clear">
                    <button type='submit' class="btn btn-default " name="addTransactionBtn" value='addTransaction'>Add</button>&nbsp;
                    
                </div>
            </div>
        </fieldset>
    </form>
</div>

