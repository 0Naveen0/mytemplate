<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<?php 
/*
//echo $message;
$i=0;$j=0;

$modalList=array();
$modalList[$j++]=['modalid'=>1,'modalname'=>'APE AR 3+1'];
$modalList[$j++]=['modalid'=>2,'modalname'=>'APE LD'];

$branchList=array();
$branchList[$i++]=['branchid'=>100109,'branchname'=>'Rakesh'];
$branchList[$i++]=['branchid'=>100110,'branchname'=>'Showroom'];

$branchList[$j++]=['modalid'=>2,'modalname'=>'APE LD'];
*/
?>
<div >
    <form role="form" class="form-horizontal small" method='post' id="deliveryChallanAddfrm">
        <fieldset>  
            
           
            <legend class='text-center '>New Delivery Challan</legend>
			
			<div class="form-group"> 
                 <label for="chasisSelect" class="col-sm-3 control-label">Chasis No.</label>
                <div class="col-sm-4">      
                    <select class="form-control" name="chasisSelect">
                        <option value="select" selected>-Select-</option>
                        <?php
                        $i = 0;
                        $j = 0;
                        foreach ($chasisList as $chasis) {
                            //echo $subject." </br>";
                           
                                echo '<option value="' . $chasis['vehicleid'] . '">' . $chasis['chasisno'] . '</option>';
                            
                        }
                        ?>
                    </select>
                </div>
				<label for="transferdate" class="col-sm-2 control-label">Date</label>
                <div class="col-sm-3">

                    <input type="date" class="form-control" id="transferdate" name='transferdate' required="required" value="<?php echo date('Y-m-d');?>">
                </div>
			</div>
            
            
			<div class="form-group">
                <label for="transferlocation" class="col-sm-3 control-label">Transfer To</label>
                <div class="col-sm-3">
					<select class="form-control" name="transferlocation">
                       <!-- <option value="select" selected>-Select-</option>
						<option value="Branch">Branch</option>' -->
						<option value="Customer">Customer</option>
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
               <!--  <select name="servicebook" class="form-control">
                     <option value="Select">Select</option>
                     <option value="Issued">Issued</option>
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
                    <button type='submit' class="btn btn-default " name="addDeliveryChallanBtn" value='addDeliveryChallan'>Add</button>&nbsp;
                    
                </div>
            </div>
        </fieldset>
    </form>
</div>
	
	
	