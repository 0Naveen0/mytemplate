<?php
//Day Book Search View
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
    <form role="form" class="form-horizontal small" method='post' id="showSaleRegisterfrm">
        <fieldset>  
            
           
            <legend class='text-center '>Sale Register</legend>
			
			<div class="form-group"> 
                 <label for="criteriaSelect" class="col-sm-3 control-label">Search Criteria</label>
                <div class="col-sm-4">      
                    <select class="form-control" name="criteriaSelect">
                        <option value="select" selected>-Select-</option>
                        <option value="bychasis">By Chasis</option>
                        <option value="bydate">By Date</option>
                        <option value="bydaterange">Date Range</option>
                        <option value="bycustomername">Customer Name</option>
                        
                        
                      
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
               <label for="customername" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="customername" name='customername' disabled='true' required >
                </div>
                <label for="invoicearea" class="col-sm-3 control-label">Area</label>
                <div class="col-sm-3">

                   <select class="form-control" name="companyid">
                        
                        <option value="all" selected>All</option>
                        <option value="1001"><?php echo $comp_district;?></option>
                        <!-- <option value="1002">Jhanjharpur</option> -->
                        
                    </select>
                </div>
            </div>
		
            <div class="form-group">
                <div class="col-sm-9">
                </div>
                <div class="col-sm-3">
                    <input type="reset" class="btn btn-default pull-right" name="resetBtn" value="Clear">
                    <button type='submit' class="btn btn-default " name="showSaleRegisterBtn" value='showSaleRegisterBtn' >Show</button>&nbsp;
                    
                </div>
            </div>
        </fieldset>
    </form>
</div>
    
   
</div>
<?php

 echo "<div class='small'><div class='table-responsive small'>";
  echo          "<table class='table table-striped table-bordered small dataTable' id='showSaleRegisterTable'><thead>";
  echo '<tr><th colspan="11" class="text-center">Sale Register</th></tr>';
  echo '<tr><th>ID</th><th>Date</th><th>Model</th><th>Finance</th><th>Name</th><th>Address</th><th>Contact</th><th>Area</th><th>Chasis&nbsp;No</th><th>Engine&nbsp;No</th><th>Invoice&nbsp;No</th><th>Basic</th>
  <th>SGST</th><th>CGST</th><th>Total</th>
 </tr></thead><tbody>';
  foreach($display as $row){
      $price=$row['invoicevalue'];
      $cgst=$row['cgst'];$sgst=$row['sgst'];
                     $totaltax=$cgst+$sgst;
                    
                     $totaltax=$totaltax/100;
                     $totaltax=1+$totaltax;
                      //echo $totaltax;
                      $basic=$price/$totaltax;
                    $basic=round($basic,2);
                     //$basic=round(($price-($price*$totaltax/100)),2);
                     $cgst=round(($basic*$cgst/100),2);
                     $sgst=round(($basic*$sgst/100),2);
                     $total=$basic+$cgst+$sgst;
  echo "<tr><td>" .$row['invoiceid'] . "</td><td>" .$row['invoicedate'] . "</td><td>" . $row['vehiclemodel'] . "</td>"
                       . "<td>" . $row['hypothecation'] . "</td><td>" . $row['customername'] . "</td><td>" . $row['address'] . "</td><td>" . $row['contact'] . "</td><td>" . $row['companyname'] . "</td><td>" . $row['chasisno'] . "</td><td>" . $row['engineno'] . "</td>
                       <td>" . $row['invoiceno'] . "</td><td>" . $basic . "</td><td>" . $sgst . "</td><td>" . $cgst . "</td><td>" . $total . "</td></tr>";
 
  }
    echo "</tbody></table></div></div>";
?>



