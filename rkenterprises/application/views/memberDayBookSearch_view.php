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
    <form role="form" class="form-horizontal small" method='post' id="searchDailyTransactionfrm">
        <fieldset>  
            
           
            <legend class='text-center '>Transaction</legend>
			
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
                <label for="transactiontype" class="col-sm-3 control-label">Transaction Type</label>
                <div class="col-sm-3">

                   <select class="form-control" name="transactiontype">
                        
                        <option value="all" selected>All</option>
                        <option value="debit">Debit</option>
                        <option value="credit">Credit</option>
                        
                    </select>
                </div>
            </div>
		
            <div class="form-group">
                <div class="col-sm-9">
                </div>
                <div class="col-sm-3">
                    <input type="reset" class="btn btn-default pull-right" name="resetBtn" value="Clear">
                    <button type='submit' class="btn btn-default " name="dailyTransactionSearchBtn" value='dailyTransactionSearch' >Search</button>&nbsp;
                    
                </div>
            </div>
        </fieldset>
    </form>
</div>
    
   
</div>
<?php

 echo "<div class='small'><div class='table-responsive small'>";
  echo          "<table class='table table-striped table-bordered small dataTable' id='dailyTransactionSearchTable'><thead>";
  echo '<tr><th colspan="11" class="text-center">Transaction</th></tr>';
  echo '<tr><th>ID</th><th>Date</th><th>Type</th><th>Amount</th><th>Branch</th><th>Name</th><th>Chasis&nbsp;No</th><th>Remark</th>
 </tr></thead><tbody>';
  foreach($display as $row){
  echo "<tr><td><button class='btn btn-small'>" .$row['transactionid'] . "</button></td><td>" .$row['transactiondate'] . "</td><td>" . $row['transactiontype'] . "</td>"
                       . "<td>" . $row['transactionamount'] . "</td><td>" . $row['branchname'] . "</td><td>" . $row['customername'] . "</td><td>" . $row['chasisno'] . "</td>
                       <td>" . $row['remark'] . "</td></tr>";
 
  }
    echo "</tbody></table></div></div>";
?>



