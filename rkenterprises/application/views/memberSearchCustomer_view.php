<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/staticvariables.php');

?>
<?php 

?>

<div class="d-print-none">
    
    <div >
     
           <!--  <div class="row">
           <div class="col-sm-2">
                <button  class="btn btn-default " name="addCustomerBtn" value='customerAdd' ><span class="glyphicon glyphicon-plus-sign" aria-hidden="true" aria-label="Add"></span></button>
                </div>
                <div class="col-sm-10">&nbsp;</div>
                </div>-->
           <div class='row'><div class="col-sm-2 small">
                <button  class="btn btn-default " name="addCustomerBtn" data-toggle='modal' data-target='#customerAddModal' value='customerAdd' ><span class="glyphicon glyphicon-plus" aria-hidden="true" aria-label="Add"></span>Add New</button>
                </div>
                <form role="form" class="form-horizontal small pull-right" method='post' id="searchCustomerfrm">
        <fieldset> 
                <div class="col-sm-4 small">      
                    <select class="form-control" name="criteriaSearchCustomer">
                       
                        <option value="byname" selected>By Name</option>
                        <option value="bycontact">By Contact</option>
                        
                      
                    </select>
                </div>
                <div class="col-sm-3 small">

                    <input type="text" class="form-control" id="searchText" name='searchText'  required>
                </div>
                <div class="col-sm-2 small">
                <button type='submit' class="btn btn-default " name="searchCustomerBtn" value='customerSearch' ><span class="glyphicon glyphicon-search" aria-hidden="true" aria-label="Search"></span></button>
                </div>
                
                </div>
			
			<div class="form-group"> 
                <!-- <label for="criteriaSearchCustomer" class="col-sm-3 control-label">Search Criteria</label>-->
            <!--    <div class="col-sm-4">      
                    <select class="form-control" name="criteriaSearchCustomer">
                       
                        <option value="byname" selected>By Name</option>
                        <option value="bycontact">By Contact</option>
                        
                      
                    </select>
                </div>
				
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="searchText" name='searchText'  required>
                </div>
                <div class="col-sm-2">
                <button type='submit' class="btn btn-default " name="searchCustomerBtn" value='customerSearch' ><span class="glyphicon glyphicon-search" aria-hidden="true" aria-label="Search"></span></button>
                </div> -->
			</div>
            
           
		
		
            
        </fieldset>
    </form>
</div>
    
   
</div>


<?php
if(count($customerdata)){
 echo "<div class='small'><div class='small'><div class='table-responsive small'>";
  echo          "<table class='table table-striped table-bordered small dataTable' id='searchCustomerTable' name='searchCustomerTable'><thead>";
  echo '<tr><th colspan="11" class="text-center">Customer List</th></tr>';
  echo '<tr><th>ID</th><th>Name</th>';
 echo '<th>Father</th>';
 echo '<th>Address</th><th>Contact</th>';
 echo '<th>Email</th>';
 echo '<th>Branch</th><th>Modal</th><th>Action</th>
 </tr></thead><tbody>';
  foreach($customerdata as $row){
  echo "<tr><td>" .$row['customerid'] . "</td><td>" .$row['customername'] . "</td>";
  echo "<td>" . $row['customerfathername'] . "</td>";
  echo "<td>" . $row['customeraddressline1'] ."&comma;". $row['customeraddressline2']."&comma;".$row['customerdistrict']."&comma;".$row['customerstate']."&comma;".$row['customerpin'].
                       "</td><td>" . $row['customercontact'] . "</td>";
   echo "<td>" . $row['customeremail'] . "</td>";
   echo "<td>" . $row['branchname']."&comma;".$row['branchid'] . "</td><td>" . $row['modalname'] ."&comma;".$row['modalid'] .  "</td>
                       <td><button type='button' class='btn btn-default btn-xs' name='editCustomerBtn' data-toggle='modal' data-target='#customerModifyModal' data-customerid=".$row['customerid']." value=".$row['customerid']."><span class='glyphicon glyphicon-pencil'></span></button>
                       
                       <button type='button' class='btn btn-default btn-xs' name='deleteCustomerBtn' value=".$row['customerid']."><span class='glyphicon glyphicon-trash'></span></button>
                        <button type='button' class='btn btn-default btn-xs' data-toggle='modal' data-target='#addTransactionModal' data-customerid=".$row['customerid']." name='addTransactionBtn' value=".$row['customerid']."><span class='glyphicon glyphicon-piggy-bank'></span></button>
                       </td></tr>";
 
  }
    echo "</tbody></table></div></div></div>";
}
?>

<!--////////Customer Add Modal Starts Here/////////////////////////////////////////////////////-->

<div class="modal fade" id="customerAddModal" tabindex="-1" role="dialog" aria-labelledby="customerAddModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="customerAddModalLabel">Add Customer</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div class="modal-body">

    <form role="form" class="form-horizontal small " method='post' id="customerAddfrm">
	
        <fieldset>  
            
           
            
            
            <div class="form-group form-group-sm">
                <label for="customername" class="col-sm-3 control-label">Customer Name</label>
                <div class="col-sm-9">

                    <input type="text" class="form-control" id="customername" name='customername'   required="required" >
                </div>
            </div>
			<div class="form-group form-group-sm">
                <label for="customerfathername" class="col-sm-3 control-label">S/o|W/o|D/o</label>
                <div class="col-sm-9">

                    <input type="text" class="form-control" id="customerfathername" name='customerfathername'   required="required" value="NA" >
                </div>
            </div>
			<div class="form-group form-group-sm">
                <label for="customeraddressline1" class="col-sm-3 control-label">Address</label>
                <div class="col-sm-9">

                    <input type="text" class="form-control" id="customeraddressline1" name='customeraddressline1'   required="required" >
                </div>
            </div>
			<div class="form-group form-group-sm">
                <label for="customeraddressline2" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">

                    <input type="text" class="form-control" id="customeraddressline2" name='customeraddressline2'   required="required" value="NA">
                </div>
            </div>
			<div class="form-group form-group-sm">
                <label for="customerdistrict" class="col-sm-3 control-label">District</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="customerdistrict" name='customerdistrict'   required="required" value="<?php echo $comp_district;?>">
                </div>
				<label for="customerstate" class="col-sm-3 control-label">State</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="customerstate" name='customerstate'   required="required" value="<?php echo $comp_state;?>">
                </div>
            </div>
			<div class="form-group form-group-sm">
                <label for="customerpin" class="col-sm-3 control-label">PIN</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="customerpin" name='customerpin' maxlength=6 minlength=6  required="required" value="000000">
                </div>
				<label for="customercontact" class="col-sm-3 control-label">Contact</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="customercontact" name='customercontact' minlength=10 maxlength=10  required="required" value="0000000000">
                </div>
            </div>
			
			<div class="form-group form-group-sm">
                <label for="customeremail" class="col-sm-3 control-label">E-mail</label>
                <div class="col-sm-9">

                    <input type="email" class="form-control" id="customeremail" name='customeremail'   required="required" value="abc@gmail.com">
                </div>
            </div>
			
             <div class="form-group form-group-sm"> 
                 <label for="branch" class="col-sm-3 control-label">Branch</label>
                <div class="col-sm-3">      
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
                
                <label for="modalSelect" class="col-sm-3 control-label">Modal</label>
                <div class="col-sm-3">      
                    <select class="form-control" name="modalSelect">
                        <option value="select" selected>-Select-</option>
                        <?php
                        $i = 0;
                        $j = 0;
                        foreach ($modalList as $modal) {
                            //echo $subject." </br>";
                           
                                echo '<option value="' . $modal['modalid'] . '">' . $modal['modalname'] . '</option>';
                            
                        }
                        ?>
                    </select>
                </div>  


            </div>
			
		<div class="form-group form-group-sm"> 
            <button type="submit" class="btn btn-primary btn-sm pull-right" name="addCustomerBtn" value='addCustomer'>Save</button>
         </div>  
          
        </fieldset>
    </form>
	</div>
<div class="modal-footer">
		
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>	
</div>
</div>
</div>

<!--////////Customer Add Modal Ends Here/////////////////////////////////////////////////////-->


<!--////////Customer Update Modal Starts Here/////////////////////////////////////////////////////-->

<div class="modal fade" id="customerModifyModal" tabindex="-1" role="dialog" aria-labelledby="customerModifyModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="customerModifyModalLabel">Edit Customer</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div class="modal-body">

    <form role="form" class="form-horizontal small " method='post' id="customerSearchfrm">
	
        <fieldset>  
            
           
            
            
            <div class="form-group form-group-sm">
                <label for="customername" class="col-sm-3 control-label">Customer Name</label>
                <div class="col-sm-9">

                    <input type="text" class="form-control" id="customername" name='customername'   required="required" >
                </div>
            </div>
			<div class="form-group form-group-sm">
                <label for="customerfathername" class="col-sm-3 control-label">S/o|W/o|D/o</label>
                <div class="col-sm-9">

                    <input type="text" class="form-control" id="customerfathername" name='customerfathername'   required="required" value="NA" >
                </div>
            </div>
			<div class="form-group form-group-sm">
                <label for="customeraddressline1" class="col-sm-3 control-label">Address</label>
                <div class="col-sm-9">

                    <input type="text" class="form-control" id="customeraddressline1" name='customeraddressline1'   required="required" >
                </div>
            </div>
			<div class="form-group form-group-sm">
                <label for="customeraddressline2" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">

                    <input type="text" class="form-control" id="customeraddressline2" name='customeraddressline2'   required="required" value="NA">
                </div>
            </div>
			<div class="form-group form-group-sm">
                <label for="customerdistrict" class="col-sm-3 control-label">District</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="customerdistrict" name='customerdistrict'   required="required" value="<?php echo $comp_district;?>">
                </div>
				<label for="customerstate" class="col-sm-3 control-label">State</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="customerstate" name='customerstate'   required="required" value="<?php echo $comp_state;?>">
                </div>
            </div>
			<div class="form-group form-group-sm">
                <label for="customerpin" class="col-sm-3 control-label">PIN</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="customerpin" name='customerpin' maxlength=6 minlength=6  required="required" value="000000">
                </div>
				<label for="customercontact" class="col-sm-3 control-label">Contact</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="customercontact" name='customercontact' minlength=10 maxlength=10  required="required" value="0000000000">
                </div>
            </div>
			
			<div class="form-group form-group-sm">
                <label for="customeremail" class="col-sm-3 control-label">E-mail</label>
                <div class="col-sm-9">

                    <input type="email" class="form-control" id="customeremail" name='customeremail'   required="required" value="abc@gmail.com">
                </div>
            </div>
			
             <div class="form-group form-group-sm"> 
                 <label for="branch" class="col-sm-3 control-label">Branch</label>
                <div class="col-sm-3">      
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
                
                <label for="modalSelect" class="col-sm-3 control-label">Modal</label>
                <div class="col-sm-3">      
                    <select class="form-control" name="modalSelect">
                        <option value="select" selected>-Select-</option>
                        <?php
                        $i = 0;
                        $j = 0;
                        foreach ($modalList as $modal) {
                            //echo $subject." </br>";
                           
                                echo '<option value="' . $modal['modalid'] . '">' . $modal['modalname'] . '</option>';
                            
                        }
                        ?>
                    </select>
                </div>  


            </div>
			
		<div class="form-group form-group-sm"> 
            <button type="button" class="btn btn-primary btn-sm pull-right" name="updateCustomerBtn" value='updateCustomer'>Save</button>
         </div>  
          
        </fieldset>
    </form>
	</div>
<div class="modal-footer">
		
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>	
</div>
</div>
</div>

<!--////////Customer Update Modal Ends Here/////////////////////////////////////////////////////-->




<!--////////Transaction Modal Starts Here/////////////////////////////////////////////////////-->

<div class="modal fade" id="addTransactionModal" tabindex="-1" role="dialog" aria-labelledby="addTransactionModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="addTransactionModalLabel">Transaction</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div class="modal-body">

     <form role="form" class="form-horizontal small" method='post' id="addDayBookfrm">
        <fieldset>  
            
           
           
            
            <div class="form-group small">
                <label for="qno" class="col-sm-2 control-label">Date</label>
                <div class="col-sm-4">

                    <input type="date" class="form-control input-sm" id="addDate" name='addDate'   required="required" >
                </div>
                <label  class="control-label col-sm-2">Type</label>
                <div class="col-sm-4">
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
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="amount"  name='amount' required="required">
                </div>
                <label for="remark" class="control-label col-sm-3">Remark</label>
                <div class="col-sm-3 ">
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
                    <textarea class="form-control input-sm" id="comment" name='comment' maxlength="150" required="required" value="NA"></textarea>

                </div>

            </div>
            
           
            
        </fieldset>
    </form>
	</div>
<div class="modal-footer">
		
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="addDailyTransactionBtn" value='addDailyTransaction'>Save</button>
      </div>	
</div>
</div>
</div>

<!--////////Transaction Modal Ends Here/////////////////////////////////////////////////////-->
