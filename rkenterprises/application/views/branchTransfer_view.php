<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<?php 

?>
<div >
    <form role="form" class="form-horizontal small" method='post' id="branchTransferfrm">
        <fieldset>  
            
           
            <legend class='text-center '>Branch Transfer</legend>
			
			<div class="form-group"> 
                 <label for="chasisSelect" class="col-sm-3 control-label">Chasis No.</label>
                <div class="col-sm-4">      
                    <select class="form-control" name="chasisSelect">
                        <option value="select" selected>-Select-</option>
                        <?php
                        $i = 0;
                        $j = 0;
                        foreach ($chasisList as $chasis) {
                            
                           
                                echo '<option value="' . $chasis['vehicleid'] . '">' . $chasis['chasisno'] . '</option>';
                            
                        }
                        ?>
                    </select>
                </div>
				<label for="transferdate" class="col-sm-2 control-label">Date</label>
                <div class="col-sm-3">

                    <input type="date" class="form-control" id="transferdate" name='transferdate' required="required" >
                </div>
			</div>
            
            
			<div class="form-group">
                 <label for="branchSelect" class="col-sm-3 control-label">Branch</label>
                <div class="col-sm-3">      
                    <select class="form-control" name="branchSelect">
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
                
                 <label for="mirror" class="col-sm-3 control-label">Mirror</label>
                <div class="col-sm-3">      
                 <select name="mirror" class="form-control">
                     <option value="Select">Select</option>
                     <option value="Issued">Issued</option>
                     <option value="OK" selected>OK</option>
                     <option value="Left Missing/Broken">Left Missing/Broken</option>
                     <option value="Right Missing/Broken">Right Missing/Broken</option>
                     <option value="NA">NA</option>
                 </select>
                </div> 
                
            </div>
			
		
			
			
            
            
            <div class="form-group"> 
 <label for="tools" class="col-sm-3 control-label">Tools</label>
                <div class="col-sm-3 ">      
                 <select name="tools" class="form-control">
                     <option value="Select">Select</option>
                     <option value="Issued" selected>Issued</option>
                     <option value="OK">OK</option>
                      </select>
                </div> 
 <label for="ServiceBook" class="col-sm-3 control-label">Service Book</label>
                 <div class="col-sm-3 ">
                     <input type="text" class="form-control" id="servicebook" name='servicebook'  maxlength="20" required="required" value="Issued">      
              <!--   <select name="servicebook" class="form-control">
                     <option value="Select">Select</option>
                     <option value="Issued" selected>Issued</option>
                     <option value="notissued">Not Issued</option>
                      </select>-->
                </div>	
	</div>
			
			<div class="form-group">
                <label for="purposeoftransfer" class="col-sm-3 control-label">Purpose</label>
                <div class="col-sm-9">
					<input type="text" class="form-control" id="purposeoftransfer" name='purposeoftransfer'  maxlength="100" required="required" value="For Demonstration">
                 
                </div>
            </div>

           
            
           
            <div class="form-group">
                <div class="col-sm-9">
                </div>
                <div class="col-sm-3">
                    <input type="reset" class="btn btn-default pull-right" name="resetBtn" value="Clear">
                    <button type='submit' class="btn btn-default " name="branchTransferBtn" value='branchTransfer'>Save</button>&nbsp;
                    
                </div>
            </div>
        </fieldset>
    </form>
</div>
	
	
	