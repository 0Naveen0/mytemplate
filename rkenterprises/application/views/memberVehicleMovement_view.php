<?php
//Stock View
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
    <form role="form" class="form-horizontal small" method='post' id="searchVehicleMovementfrm">
        <fieldset>  
            
           
            <legend class='text-center '>Vehicle Movement</legend>
			
			<div class="form-group"> 
                 <label for="criteriaSelect" class="col-sm-3 control-label">Search Criteria</label>
                <div class="col-sm-4">      
                    <select class="form-control" name="criteriaSelect">
                        <option value="select" selected>-Select-</option>
                        <option value="bychasis">By Chasis</option>
                        <option value="bydate">By Date</option>
                        <option value="bydaterange">Date Range</option>
                      
                    </select>
                </div>
				<label for="chasisno" class="col-sm-2 control-label">Chasis No.</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="chasisno" name='chasisno' disabled='true' required>
                </div>
			</div>
            
            
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
		
            <div class="form-group">
                <div class="col-sm-9">
                </div>
                <div class="col-sm-3">
                    <input type="reset" class="btn btn-default pull-right" name="resetBtn" value="Clear">
                    <button type='submit' class="btn btn-default " name="vehicleMovementSearchBtn" value='vehicleMovementSearch' disabled='disabled'>Search</button>&nbsp;
                    
                </div>
            </div>
        </fieldset>
    </form>
</div>
    
   
</div>
<?php

 echo "<div class='small'><div class='table-responsive small'>";
  echo          "<table class='table table-striped table-bordered small dataTable' id='vehicleMovementTable'><thead>";
  echo '<tr><th colspan="11" class="text-center">Vehicle Movement</th></tr>';
  echo '<tr><th>ID</th><th>Chasis&nbsp;No</th><th>Model</th><th>Location</th><th>Name</th><th>Date</th><th>purpose</th>
 </tr></thead><tbody>';
  foreach($display as $row){
  echo "<tr><td>" .$row['vehicleid'] . "</td><td>" .$row['chasisno'] . "</td><td>" . $row['modalid'] . "</td>"
                       . "<td>" . $row['location'] . "</td><td>" . $row['locationid'] . "</td><td>" . $row['transferdate'] . "</td>
                       <td>" . $row['purpose'] . "</td></tr>";
 
  }
    echo "</tbody></table></div></div>";
?>

