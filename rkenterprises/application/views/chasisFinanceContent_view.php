<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<?php 
//
/*
$e=array('executiveid'=>1,'executivename'=>"Kundan");
$executiveList[0]=$e;
$f=array('financerid'=>1,'financername'=>"M&M");
$financerList[0]=$f;
$customername="Anil Kumar";
$chasisno="MBX0003BFWM123456";
$cibil="OK";
$cibildate="2019-01-16";
$agreementdate="2019-01-20";
$agreement="OK";
$document="OK";
$financerid=1;
$executiveid=1;
$do="Released";
$dodate="2019-01-26";
$pdd="Submitted";
$loanamount=205000;
$doamount=202500;
$pdddate="2019-02-05";
$paymentdate="2019-02-15";
$payment="Released";
*/
?>

<div class="small">
    <form role="form" class="form-horizontal" method='post' id="updateFinancefrm">
        <fieldset>  
            
           
            <legend class='text-center '>Update Finance</legend>
            	<div class="form-group">
            	     <div class="row">
            	         <div class="col-sm-3">&nbsp;
            	     <label for="changeContent" class=" control-label small">Select Values to update</label>
            	     </div></div>
            	     <div class="row">
            	         <div class="col-sm-1">&nbsp;</div>
            	     <div class="col-sm-10">
            	     <label class="checkbox-inline"><input type="checkbox" value="cibil" name='cibilcheckbox'  >CIBIL</label>
                    <label class="checkbox-inline"><input type="checkbox" value="cibildate" name='cibildatecheckbox'  >CIBIL Date</label>
                     <label class="checkbox-inline"><input type="checkbox" value="agreement" name='agreementcheckbox'  >Agreement</label>
                     <label class="checkbox-inline"><input type="checkbox" value="agreementdate" name='agreementdatecheckbox'  >Agreement Date</label>
                      <label class="checkbox-inline"><input type="checkbox" value="document" name='documentcheckbox'  >Document</label>
                      <label class="checkbox-inline"><input type="checkbox" value="financer" name='financercheckbox'  >Financer</label>
                      <label class="checkbox-inline"><input type="checkbox" value="executive" name='executivecheckbox'  >Executive</label>
                      <label class="checkbox-inline"><input type="checkbox" value="do" name='docheckbox'  >DO</label>
                     <label class="checkbox-inline"><input type="checkbox" value="dodate" name='dodatecheckbox'  >DO Date</label>
                     <label class="checkbox-inline"><input type="checkbox" value="pdd" name='pddcheckbox'  >PDD</label>
                     <label class="checkbox-inline"><input type="checkbox" value="pdddate" name='pdddatecheckbox'  >PDD Date</label>
                      <label class="checkbox-inline"><input type="checkbox" value="payment" name='paymentcheckbox'  >Payment</label>
                     <label class="checkbox-inline"><input type="checkbox" value="paymentdate" name='paymentdatecheckbox'  >Payment Date</label>
                      <label class="checkbox-inline"><input type="checkbox" value="loanamount" name='loanamountcheckbox'  >Loan Amount</label>
                       <label class="checkbox-inline"><input type="checkbox" value="doamount" name='doamountcheckbox'  >DO Amount</label>
                     
                      </div>
                      <div class="col-sm-1">&nbsp;</div>
                      </div>
                     <div class="row">
            	     <div class="col-sm-12">
            	         &nbsp;<hr/>
            	         </div>
            	         </div>
            	     
            	     
            	     
            	     
            	    </div>
            
            	<div class="form-group">
                <label for="customername" class="col-sm-2 control-label small">Name</label>
                <div class="col-sm-3">

                    <input type="label" class="form-control small" id="customername" name='customername' value='<?php echo $customername;  ?>' disabled>
                </div>
				<label for="chasisno" class="col-sm-3 control-label small">Chasis No</label>
                <div class="col-sm-4">

                    <input type="label" class="form-control small" id="chasisno" name='chasisno'  value='<?php echo $chasisno;  ?>'  readonly>
                </div>
            </div>
            
            
            <div class="form-group small">
                <label for="cibil" class="col-sm-2 control-label">CIBIL</label>
                <div class="col-sm-3">
                     <select class="form-control" name="cibil" disabled='disabled'>
                        <option value="NULL" <?php echo $cibil==="NULL"?"selected":"" ?>>NULL</option>
                        <option value="OK" <?php echo $cibil==="OK"?"selected":"" ?>>OK</option>
                        <option value="NA" <?php echo $cibil==="NA"?"selected":"" ?>>NA</option>
                        <option value="LOW" <?php echo $cibil==="LOW"?"selected":"" ?>>LOW</option>
                         </select>

                    
                </div>
             <label for="cibildate" class="col-sm-3 control-label">CIBIL Date</label>
                <div class="col-sm-4">
<div id="cibildate" class="input-group date datepicker"  data-date-format="yyyy-mm-dd"  >
                        <input class="form-control" type="text" value='<?Php echo $cibildate;?>' name="cibildate" disabled='disabled' />
                         <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
<!--
                    <input type="date" class="form-control small" id="cibildate" name='cibildate' value='<?Php echo $cibildate;?>'  required="required" >
                    -->
                </div>    
            
                
            </div>
            
            
            
            
            
            <div class="form-group">
                <label for="agreement" class="col-sm-2 control-label">Agreement</label>
                <div class="col-sm-3">
                     <select class="form-control" name="agreement" disabled='disabled'>
                          <option value="NULL" <?php echo $agreement==="NULL"?"selected":"" ?>>NULL</option>
                        <option value="OK" <?php echo $agreement==="OK"?"selected":"" ?>>OK</option>
                        <option value="NA" <?php echo $agreement==="NA"?"selected":"" ?>>NA</option>
                        <option value="Rejected" <?php echo $agreement==="Rejected"?"selected":"" ?>>Rejected</option>
                         </select>


                   
                </div>
             <label for="agreementdate" class="col-sm-3 control-label">Agreement Date</label>
                <div class="col-sm-4">
<div id="agreementdate" class="input-group date datepicker"  data-date-format="yyyy-mm-dd" >
                        <input class="form-control" type="text" value='<?Php echo $agreementdate;?>' disabled='disabled' name="agreementdate" />
                         <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
<!--

                    <input type="date" class="form-control" id="agreementdate" name='agreementdate'  value='<?Php //echo $agreementdate;?>'  required="required" >
                    -->
                </div>    
            
                
            </div> 
            
            
             <div class="form-group">
                <label for="document" class="col-sm-2 control-label">Documents</label>
                <div class="col-sm-3">
                     <select class="form-control" name="document" disabled='disabled'>
                          <option value="NULL" <?php echo $document==="NULL"?"selected":"" ?>>NULL</option>
                        <option value="OK" <?php echo $document==="OK"?"selected":"" ?>>OK</option>
                        <option value="NA" <?php echo $document==="NA"?"selected":"" ?>>NA</option>
                        <option value="Pendency" <?php echo $document==="Pendency"?"selected":"" ?>>Pendency</option>
                         </select>


                   
                </div>
             <label for="financer" class="col-sm-3 control-label">Financer</label>
                <div class="col-sm-4">
<select class="form-control" name="financer" disabled='disabled'>
                        <option value="select" selected>-Select-</option>
                        <?php
                       
                        foreach ($financerList as $financer) {
                            //echo $subject." </br>";
                            $selected=($financerid===$financer['financerid'] )?"selected":"";
                           
                                echo '<option value="' . $financer['financerid'] . '" '.$selected.' >' . $financer['financername'] . '</option>';
                            
                        }
                        ?>
                    </select>
                   
                </div>    
            
                
            </div> 
            
             <div class="form-group small">
                <label for="executive" class="col-sm-2 control-label">Executive</label>
                <div class="col-sm-3">
                   <select class="form-control" name="executive" disabled='disabled'>
                        <option value="select" selected>-Select-</option>
                        <?php
                       
                        foreach ($executiveList as $executive) {
                            //echo $subject." </br>";
                             $selected=($executiveid===$executive['executiveid'] )?"selected":"";
                           
                                echo '<option value="' . $executive['executiveid'] . '" '.$selected.' >' . $executive['executivename'] . '</option>';
                            
                        }
                        ?>
                    </select>  

                    
                </div>
                 </div>
            
            
        <div class="form-group small">
                <label for="do" class="col-sm-2 control-label">DO</label>
                <div class="col-sm-3">
                     <select class="form-control" name="do" disabled='disabled'>
                        <option value="NULL" <?php echo $do==="NULL"?"selected":"" ?>>NULL</option>
                        <option value="Pending" <?php echo $do==="Pending"?"selected":"" ?>>Pending</option>
                        <option value="NA" <?php echo $do==="NA"?"selected":"" ?>>NA</option>
                        <option value="Released" <?php echo $do==="Released"?"selected":"" ?>>Released</option>
                         </select>

                    
                </div>
             <label for="dodate" class="col-sm-3 control-label">DO Date</label>
                <div class="col-sm-4">
                    <div id="dodate" class="input-group date datepicker"  data-date-format="yyyy-mm-dd" >
                        <input class="form-control" type="text" value='<?Php echo $dodate;?>' disabled='disabled' name="dodate"/>
                         <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
<!--

                    <input type="date" class="form-control small" id="dodate" name='dodate'  value='<?Php echo $dodate;?>'  required="required" >
                    -->
                </div>    
            
                
            </div>     
            
              <div class="form-group small">
                <label for="pdd" class="col-sm-2 control-label">PDD</label>
                <div class="col-sm-3">
                     <select class="form-control" name="pdd" disabled='disabled'>
                        <option value="NULL" <?php echo $pdd==="NULL"?"selected":"" ?>>NULL</option>
                        <option value="Pending" <?php echo $pdd==="Pending"?"selected":"" ?>>Pending</option>
                        <option value="NA" <?php echo $pdd==="NA"?"selected":"" ?>>NA</option>
                        <option value="Submitted" <?php echo $pdd==="Submitted"?"selected":"" ?>>Submitted</option>
                         </select>

                    
                </div>
             <label for="pdddate" class="col-sm-3 control-label">PDD Date</label>
                <div class="col-sm-4">
                    
                    
                     <div id="pdddate" class="input-group date datepicker"  data-date-format="yyyy-mm-dd" >
                        <input class="form-control" type="text" value='<?Php echo $pdddate;?>' disabled='disabled' name="pdddate"/>
                         <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
<!--
                    <input type="date" class="form-control small" id="pdddate" name='pdddate' value='<?Php echo $pdddate;?>'  required="required" >
                    -->
                </div>    
            
                
            </div>   
            
            <div class="form-group small">
                <label for="payment" class="col-sm-2 control-label">Payment</label>
                <div class="col-sm-3">
                     <select class="form-control" name="payment" disabled='disabled'>
                        <option value="NULL" <?php echo $payment==="NULL"?"selected":"" ?>>NULL</option>
                        <option value="Pending" <?php echo $payment==="Pending"?"selected":"" ?>>Pending</option>
                        <option value="NA" <?php echo $payment==="NA"?"selected":"" ?>>NA</option>
                        <option value="Released" <?php echo $payment==="Released"?"selected":"" ?>>Released</option>
                         </select>

                    
                </div>
             <label for="paymentdate" class="col-sm-3 control-label">Payment Date</label>
                <div class="col-sm-4">
                    
                    <div id="paymentdate" class="input-group date datepicker"  data-date-format="yyyy-mm-dd" >
                        <input class="form-control" type="text" value='<?Php echo $paymentdate;?>' disabled='disabled' name="paymentdate" />
                         <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                    <!--
                    <input class="form-control small " type="text"  id="paymentdate" name='paymentdate' value='<?Php //echo $paymentdate;?>'  required="required" readonly/ >
                    
                    -->
                </div>    
            
                
            </div>    
            
             <div class="form-group small">
                <label for="loanvalue" class="col-sm-2 control-label">Loan Amount</label>
                <div class="col-sm-3">
                     
<input type="number" class="form-control small" id="loanvalue" name='loanvalue' value='<?Php echo $loanamount;?>'  required="required" disabled='disabled'>
                    
                </div>
             <label for="dovalue" class="col-sm-3 control-label">DO Value</label>
                <div class="col-sm-4">

                    <input type="number" class="form-control small" id="dovalue" name='dovalue' value='<?Php echo $doamount;?>'  required="required"  disabled='disabled'>
                </div>    
            
                
            </div>  
            
             <div class="form-group">
                <div class="col-sm-9">
                </div>
                <div class="col-sm-3">
                    <button  type="button" class="btn btn-default "  name="cancelUpdateFinanceBtn"  value='cancelUpdateFinance'>Abort</button>&nbsp;
                    <button type="button" class="btn btn-default " name="updateFinanceBtn" value='updateFinance'>Update</button>&nbsp;
                    
                </div>
            </div>
   
           
        </fieldset>
    </form>
    
</div>

