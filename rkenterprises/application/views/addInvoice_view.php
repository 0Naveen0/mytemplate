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
    <form role="form" class="form-horizontal small" method='post' id="generateinvoicefrm">
        <fieldset>  
            
           
            <legend class='text-center '>Generate Invoice</legend>
            <div class="form-group"> 
                 <label for="companySelect" class="col-sm-3 control-label">Dealer</label>
                 <div class="col-sm-4">      
                    <select class="form-control" name="companySelect">
                        <option value="1001" selected>Darbhanga</option>
                        <!-- <option value="1002" >Jhanjharpur</option> -->
                        
                         </select>
                </div>
                 <div class="col-sm-5">
                     
                 </div>
                 </div>
			
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
				<label for="invoicedate" class="col-sm-2 control-label">Date</label>
                <div class="col-sm-3">

                    <input type="date" class="form-control" id="invoicedate" name='invoicedate' required="required" value="<?php echo date('Y-m-d');?>">
                </div>
			</div>
            
            
			<div class="form-group">
                <label for="transferlocation" class="col-sm-3 control-label">Transfer To</label>
                <div class="col-sm-3">
					<select class="form-control" name="transferlocation" disabled>
                        <option value="select" selected>-Select-</option>
						<option value="Branch">Branch</option>'
						<option value="Customer" selected>Customer</option>
                    </select>
                 
                </div>
                 <label for="financer" class="col-sm-3 control-label">Financer</label>
                <div class="col-sm-3">
                        <select class="form-control" name="financer" >
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
 <label for="invoiveno" class="col-sm-3 control-label">Invoice No.</label>
                <div class="col-sm-3 ">      
                 	<input type="number" class="form-control" id="invoiceno" name='invoiceno'  max="9999" min="0" required="required" value="<?php echo $currentinvoiceno;?>">
                </div> 
 <label for="price" class="col-sm-3 control-label">Sale Price</label>
                 <div class="col-sm-3 ">      
                 	<input type="number" class="form-control" id="saleprice" name='saleprice' step=.01 min=0 required="required" >
                </div>	
	</div>
			
			

           
            
           
            <div class="form-group">
                <div class="col-sm-9">
                </div>
                <div class="col-sm-3">
                    <input type="reset" class="btn btn-default pull-right" name="resetBtn" value="Clear">
                    <button type='submit' class="btn btn-default " name="addInvoiceBtn" value='addInvoice'>Add</button>&nbsp;
                    
                </div>
            </div>
        </fieldset>
    </form>
</div>
	
	
	