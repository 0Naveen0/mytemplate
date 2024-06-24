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

<div class="d-print-none">
    
    <div >
    <form role="form" class="form-horizontal small" method='post' id="searchCustomerfrm">
        <fieldset>  
            
           
            <legend class='text-center '>Search Customer</legend>
			
			<div class="form-group"> 
                 <label for="criteriaSearchCustomer" class="col-sm-3 control-label">Search Criteria</label>
                <div class="col-sm-4">      
                    <select class="form-control" name="criteriaSearchCustomer">
                       
                        <option value="byname" selected>By Name</option>
                        <option value="bycontact">By Contact</option>
                        
                      
                    </select>
                </div>
				
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="searchText" name='searchText'  required>
                </div>
                <div class="col-sm-2">
                <button type='submit' class="btn btn-default " name="searchCustomerBtn" value='customerSearch' >Search</button>
                </div>
			</div>
            
            
		
		
            
        </fieldset>
    </form>
</div>
    
   
</div>


<?php

 echo "<div class='small'><div class='table-responsive small'>";
  echo          "<table class='table table-striped table-bordered small dataTable' id='searchCustomerTable' name='searchCustomerTable'><thead>";
  echo '<tr><th colspan="11" class="text-center">Customer List</th></tr>';
  echo '<tr><th>ID</th><th>Name</th><th>Father</th><th>Address</th><th>Contact</th><th>Email</th><th>Branch</th><th>Modal</th><th>Action</th>
 </tr></thead><tbody>';
  foreach($customerdata as $row){
  echo "<tr><td>" .$row['customerid'] . "</td><td>" .$row['customername'] . "</td><td>" . $row['customerfathername'] . "</td>"
                       . "<td>" . $row['customeraddressline1'] ."&comma;". $row['customeraddressline2']."&comma;".$row['customerdistrict']."&comma;".$row['customerstate']."&comma;".$row['customerpin'].
                       "</td><td>" . $row['customercontact'] . "</td><td>" . $row['customeremail'] . "</td><td>" . $row['branchname']."&comma;".$row['branchid'] . "</td><td>" . $row['modalname'] ."&comma;".$row['modalid'] .  "</td>
                       <td><button type='button' class='btn btn-default btn-sm' name='editCustomerBtn' value=".$row['customerid']."><span class='glyphicon glyphicon-pencil'></span></button>
                       
                       <button type='button' class='btn btn-default btn-sm' name='deleteCustomerBtn' value=".$row['customerid']."><span class='glyphicon glyphicon-trash'></span></button>
                       </td></tr>";
 
  }
    echo "</tbody></table></div></div>";
?>




<div >
    <form role="form" class="form-horizontal small" method='post' id="customerSearchfrm">
        <fieldset>  
            
           
            <legend class='text-center '>Search Customer</legend>
            
            <div class="form-group">
                <label for="customername" class="col-sm-3 control-label">Customer Name</label>
                <div class="col-sm-9">

                    <input type="text" class="form-control" id="customername" name='customername'   required="required" >
                </div>
            </div>
			<div class="form-group">
                <label for="customerfathername" class="col-sm-3 control-label">S/o|W/o|D/o</label>
                <div class="col-sm-9">

                    <input type="text" class="form-control" id="customerfathername" name='customerfathername'   required="required" value="NA" >
                </div>
            </div>
			<div class="form-group">
                <label for="customeraddressline1" class="col-sm-3 control-label">Address</label>
                <div class="col-sm-9">

                    <input type="text" class="form-control" id="customeraddressline1" name='customeraddressline1'   required="required" >
                </div>
            </div>
			<div class="form-group">
                <label for="customeraddressline2" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">

                    <input type="text" class="form-control" id="customeraddressline2" name='customeraddressline2'   required="required" value="NA">
                </div>
            </div>
			<div class="form-group">
                <label for="customerdistrict" class="col-sm-3 control-label">District</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="customerdistrict" name='customerdistrict'   required="required" value="Darbhanga">
                </div>
				<label for="customerstate" class="col-sm-3 control-label">State</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="customerstate" name='customerstate'   required="required" value="Bihar">
                </div>
            </div>
			<div class="form-group">
                <label for="customerpin" class="col-sm-3 control-label">PIN</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="customerpin" name='customerpin' maxlength=6 minlength=6  required="required" value="846004">
                </div>
				<label for="customercontact" class="col-sm-3 control-label">Contact</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="customercontact" name='customercontact' minlength=10 maxlength=10  required="required" value="0000000000">
                </div>
            </div>
			
			<div class="form-group">
                <label for="customeremail" class="col-sm-3 control-label">E-mail</label>
                <div class="col-sm-9">

                    <input type="email" class="form-control" id="customeremail" name='customeremail'   required="required" value="apoorva.traders2011@gmail.com">
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
                 <label for="modalSelect" class="col-sm-3 control-label">Modal</label>
                <div class="col-sm-9">      
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
            
           
            <div class="form-group">
                <div class="col-sm-9">
                </div>
                <div class="col-sm-3">
                    <input type="reset" class="btn btn-default pull-right" name="resetBtn" value="Clear">
                    <button type='submit' class="btn btn-default " name="addCustomerBtn" value='addCustomer'>Add</button>&nbsp;
                    
                </div>
            </div>
        </fieldset>
    </form>
</div>



