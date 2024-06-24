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

//$i=0;
//$salesmanList=array();
//$salesmanList[$i++]=['salesmanid'=>100101,'salesmanname'=>'Rakesh'];
//$salesmanList[$i++]=['salesmanid'=>100102,'salesmanname'=>'Pramod Yadav'];
?>
<div >
    <form role="form" class="form-horizontal small" method='post' id="generateinvoicefrm">
        <fieldset class="small">  
            
           
            <legend class='text-center '>Add Invoice</legend>
            <div class="form-group"> 
                 <label for="companySelect" class="col-sm-3 control-label">Dealer</label>
                 <div class="col-sm-3">      
                    <select class="form-control" name="companySelect">
                        <option value="1001" selected>Darbhanga</option>
                        <!-- <option value="1002" >Jhanjharpur</option> -->
                        
                         </select>
                </div>
                 <label for="invoiveno" class="col-sm-3 control-label">Invoice No.</label>
                <div class="col-sm-3 ">      
                 	<input type="number" class="form-control" id="invoiceno" name='invoiceno'  max="9999" min="0" required="required" value="<?php echo $currentinvoiceno;?>">
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
				<label for="invoicedate" class="col-sm-1 control-label small">Date</label>
				
				
				
				
				
				
                <div class="col-sm-4">
                 <!--   <input type="date" class="form-control"  name='invoicedate' required="required" value="<?php //echo date('Y-m-d');?>">-->
                     <div id="invoicedate" class="input-group date datepicker"  data-date-format="yyyy-mm-dd" >
                    <input type="text" class="form-control"  name='invoicedate' required="required" value="<?php echo date('Y-m-d');?>">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                </div>
			</div>
            
            
			<div class="form-group">
                <label for="salesman" class="col-sm-3 control-label">Salesman</label>
                <div class="col-sm-3 small">
					<select class="form-control" name="salesman" >
                        <option value="select" selected>-Select-</option>
                        <?php
                        $i = 0;
                        $j = 0;
                        //echo var_dump($salesmanList);
                        foreach ($salesmanList as $salesman) {
                            //echo $subject." </br>";
                           //echo var_dump($salesman);
                                echo '<option value="' . $salesman['salesmanid'] . '">' . $salesman['salesmanname'] . '</option>';
                                $i++;
                            
                        }
                        ?>
                    </select>
                 
                </div>
                 <label for="financer" class="col-sm-3 control-label">Financer</label>
                <div class="col-sm-3 small">
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
            <label for="orp" class="col-sm-3 control-label">On Road</label>
                <div class="col-sm-3 ">      
                 	<input type="number" class="form-control" id="orp" name='orp' step=.01 min=0  >
                </div> 
 
 <label for="price" class="col-sm-3 control-label ">Ex-Showroom</label>
                 <div class="col-sm-3 ">      
                 	<input type="number" class="form-control" id="saleprice" name='saleprice' step=.01 min=0 required="required" >
                </div>	
	</div>
	
	<div class="form-group"> 
 
 <label for="loan" class="col-sm-3 control-label">Loan</label>
                 <div class="col-sm-3 ">      
                 	<input type="number" class="form-control" id="loan" name='loan' max=999999 min=0  >
                </div>
                 <label for="processing" class="col-sm-3 control-label">Finance Charge</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="processing" name='processing' max=99999 min=0 >
                </div>
	</div>
			
			
<div class="form-group">
                <label for="taxid" class="col-sm-3 control-label">GST</label>
                <div class="col-sm-3 small">
					<select class="form-control" name="taxid" >
                        
                        <?php
                        $i = 0;
                        $j = 0;
                        //echo var_dump($taxList);
                        foreach ($taxList as $tax) {
                            //echo $subject." </br>";
                           //echo var_dump($salesman);
                           $selection=$tax['taxslab']==="GST28%S"?"selected":"";
                                echo '<option value="' . $tax['taxid'] . '" ' .$selection.'>' . $tax['taxslab'] . '</option>';
                                $i++;
                            
                        }
                        ?>
                    </select>
                 
                </div>
                  
               
            </div>
           
            
           
            <div class="form-group">
               
                <div class="col-sm-9"></div>
                <div class="col-sm-3">
                    <input type="reset" class="btn btn-default pull-right" name="resetBtn" value="Clear">
                    <button type='submit' class="btn btn-default " name="addInvoiceBtn" value='addInvoice'>Save</button>&nbsp;
                    
                </div>
            </div>
        </fieldset>
    </form>
</div>
	
	
	