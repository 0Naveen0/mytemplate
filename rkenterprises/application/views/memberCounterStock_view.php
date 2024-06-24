<?php
//Day Book Search View
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
    <form role="form" class="form-horizontal small" method='post' id="showCounterStockfrm">
        <fieldset>  
            
           
            <legend class='text-center '>Counter Stock</legend>
			
			<div class="form-group"> 
                 <label for="criteriaSelect" class="col-sm-3 control-label">Search Criteria</label>
                <div class="col-sm-4">      
                    <select class="form-control" name="criteriaSelect" disabled>
                        <option value="select" selected>-Select-</option>
                        <option value="byAllBranch">All</option>
                        <option value="byCustomBranch">By Branch</option>
                        <option value="byModal">Model</option>
                        
                        
                        
                      
                    </select>
                </div>
				<label for="branchSelect" class="col-sm-2 control-label">Branch</label>
                <div class="col-sm-3">

                                        <select class="form-control" name="branchSelect">
                        <option value="All" selected>All</option>
                        <?php
                        $i = 0;
                        $j = 0;
                        foreach ($branchList as $branch) {
                           
                                echo '<option value="' . $branch['branchid'] . '">' . $branch['branchname'] . '</option>';
                            
                        }
                        ?>
                    </select>
                </div>
			</div>
            
            <!--
			<div class="form-group">
               <label for="fromdate" class="col-sm-3 control-label">Start Date</label>
                <div class="col-sm-3">

                    <input type="date" class="form-control" id="fromdate" name='fromdate' disabled='true' required >
                </div>
                <label for="todate" class="col-sm-3 control-label">End Date</label>
                <div class="col-sm-3">

                    <input type="date" class="form-control" id="todate" name='todate' disabled='true' required>
                </div>
            </div>
            -->
			<!--
            <div class="form-group">
               <label for="modelName" class="col-sm-3 control-label">Model</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="modelName" name='modelName' disabled='true' required >
                </div>
                <label for="invoicearea" class="col-sm-3 control-label">Area</label>
                <div class="col-sm-3">

                   <select class="form-control" name="companyid">
                        
                        <option value="all" selected>All</option>
                        <option value="1001">Darbhanga</option>
                        <option value="1002">Jhanjharpur</option>
                        
                    </select>
                </div>
            </div>-->
		
            <div class="form-group">
                <div class="col-sm-9">
                </div>
                <div class="col-sm-3">
                    <input type="reset" class="btn btn-default pull-right" name="resetBtn" value="Clear">
                    <button type='submit' class="btn btn-default " name="showCounterStockBtn" value='showCounterStockBtn' >Show</button>&nbsp;
                    
                </div>
            </div>
        </fieldset>
    </form>
</div>
    
   
</div>
<?php

 echo "<div class='small'><div class='table-responsive small'>";
  echo          "<table class='table table-striped table-bordered small dataTable' id='showCounterStockTable'><thead>";
  echo '<tr><th colspan="7" class="text-center">Stock</th></tr>';
  echo '<tr><th>Sr.</th><th>Id</th><th>Date</th><th>Model</th><th>Chassis</th><th>Color</th><th>Location</th>
  <th>B_Id</th></tr></thead><tbody>';
 $i=0;
  foreach($display as $row){
      
  echo "<tr><td>" . ++$i . "</td><td>" .$row['chassisid'] . "</td><td>" .$row['deliverydate'] . "</td><td>" . $row['vehiclemodel'] . "</td><td>"
                       . $row['chasisno'] . "</td><td>" . $row['color'] . "</td><td>" . $row['branch'] . "</td><td>" . $row['branchid'] .  "</td></tr>";
 
  }
    echo "</tbody></table></div></div>";
?>



