<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('pageid')==="customerAccountSummaryView")
{
   
    echo '<div class="row"><div class="col-sm-10"></div><div class="col-sm-2">';
    echo '<div class="form-group">';
    echo '<button class="btn btn-info btn-sm pull-right" name="filter">Filter</button>';
    echo'</div></div></div>';
    
    
}
?>


<div class='table-responsive'><table class='table  table-striped table-bordered ' id='dataTableBranchSummary' >
    <thead>
<tr>
    <th>CID</th>
    <th>Name</th>
    <th>Debit</th>
    <th>Credit</th>
    <th>Balance</th>
    </tr>
    </thead>
    <tbody>
<?php 


 $i=0;
 $sumdebit=0;
 $sumcredit=0;
 $dues=0;
 $displayUsers="";
          
            //$displayUsers="<div class='table-responsive'><table class='table  table-striped table-bordered dataTable' id='dataTableBranchSummary' ><thead>";
         //   $displayUsers.="<tr><th>" ." CID" . "</th><th>" . "Name" . "</th>"
          //             . "<th>" . "Debit" . "</th><th>" . "Credit" . "</th><th>" . "Balance" . "</th></tr></thead><tbody>";
            foreach ($branchDuesList as $row) {
                $displayUsers.="<tr><td>" . $row['cid']. "</td><td>" . $row['customername'] . "</td>"
                       . "<td>" . $row['debit']. "</td><td>" . $row['credit'] . "</td><td>" . $row['balance'] . "</td></tr>";
                $sumdebit+=$row['debit'];
                $sumcredit+=$row['credit'];
            
                      
            }
            $dues=$sumdebit-$sumcredit;
            $displayUsers.="</tbody> <tfoot><tr><td></td><td>Total</td><td>".$sumdebit."</td><td>". $sumcredit."</td><td>". $dues."</td></tr>";
           // </tfoot></table></div>";
		echo $displayUsers;








?>
</tfoot>
</table>
</div>