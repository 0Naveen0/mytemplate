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
    <form role="form" class="form-horizontal small" method='post' id="customerLedgerfrm">
        <fieldset>  
            
           
            <legend class='text-center '>Customer Ledger</legend>
            
           

 <div class="form-group"> 
                 <label for="branch" class="col-sm-3 control-label">Customer</label>
                <div class="col-sm-9">      
                    <select class="form-control" name="customerSelectForBranch">
                        <option value="select" selected>-Select-</option>
                        <?php
                        $i = 0;
                        $j = 0;
                        foreach ($customerList as $customer) {
                            //echo $subject." </br>";
                           
                                echo '<option value="' . $customer['customerid'] . '">' . $customer['customername'] . '</option>';
                            
                        }
                        ?>
                    </select>
                </div>  

            </div>
            
            
            
            
            
        </fieldset>
    </form>
</div>
<div id=customerLedgerForBranchContent name=customerLedgerForBranchContent>
    
</div>

