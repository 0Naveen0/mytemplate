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
    <form role="form" class="form-horizontal small" method='post' id="generatequotationfrm">
        <fieldset>  
            
           
            <legend class='text-center '>Generate Quotation</legend>
			
		
            
            
		
		
			
			
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
				<label for="customerSelect" class="col-sm-3 control-label">Customer</label>
                <div class="col-sm-3">      
                    <select class="form-control" name="customerSelect" id="customerContent">
                        <option value="select" selected>-Select-</option>
                       
                    </select>
                </div> 

            </div>
            <div class="form-group"> 
 <label for="quotationdate" class="col-sm-3 control-label">Date</label>
                <div class="col-sm-3 ">      
                 	<input type="date" class="form-control input-sm" id="quotationdate" name='quotationdate'  required="required" value="<?php echo date('Y-m-d');?>">
                </div> 
                <label for="quotationno" class="col-sm-3 control-label">Quotation No.</label>
                <div class="col-sm-3 ">      
                 	<input type="number" class="form-control" id="quotationno" name='quotationno'  max="9999" min="0" required="required" value="<?php echo $currentquotationno;?>">
                </div> 

	</div>
            
            <div class="form-group"> 
             <label for="vehicleprice" class="col-sm-3 control-label">Vehicle Price</label>
                 <div class="col-sm-3 ">      
                 	<input type="number" class="form-control" id="vehicleprice" name='vehicleprice' step=.01 min=0 required="required" >
                </div>	
           
             <label for="insurance" class="col-sm-3 control-label">Insurance</label>
                 <div class="col-sm-3 ">      
                 	<input type="number" class="form-control" id="insurance" name='insurance' step=.01 min=0 >
                </div>	
 
	
	</div>
			 <div class="form-group">
	
             <label for="registration" class="col-sm-3 control-label">Registration</label>
                 <div class="col-sm-3 ">      
                 	<input type="number" class="form-control" id="registration" name='registration' step=.01 min=0 >
                </div>
 
 <label for="permit" class="col-sm-3 control-label">Hypo.</label>
                 <div class="col-sm-3 ">      
                 	<input type="number" class="form-control" id="permit" name='permit' step=.01 min=0  >
                </div>	
	</div>		

     <div class="form-group">
	
             <label for="accessories" class="col-sm-3 control-label">Accesories</label>
                 <div class="col-sm-3 ">      
                 	<input type="number" class="form-control" id="accessories" name='accessories' step=.01 min=0 >
                </div>
 
 <label for="others" class="col-sm-3 control-label">Others</label>
                 <div class="col-sm-3 ">      
                 	<input type="number" class="form-control" id="others" name='others' step=.01 min=0  >
                </div>	
	</div>		
       <div class="form-group">
	
             <label for="discount" class="col-sm-3 control-label">Discount</label>
                 <div class="col-sm-3 ">      
                 	<input type="number" class="form-control" id="discount" name='discount' step=.01 min=0 >
                </div>
 
 <label for="gst" class="col-sm-3 control-label">GST%</label>
                 <div class="col-sm-3 ">      
                 	<input type="number" class="form-control" id="gst" name='gst' step=.01 min=0  >
                </div>	
	</div>	
            
           
            <div class="form-group">
                <div class="col-sm-9">
                </div>
                <div class="col-sm-3">
                    <input type="reset" class="btn btn-default pull-right" name="resetBtn" value="Clear">
                    <button type='submit' class="btn btn-default " name="addQuotationBtn" value='addQuotation'>Add</button>&nbsp;
                    
                </div>
            </div>
        </fieldset>
    </form>
</div>
	
	
	