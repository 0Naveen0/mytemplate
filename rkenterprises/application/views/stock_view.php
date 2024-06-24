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

//*/
//$logourl=base_url().'assets/images/piaggiologo.jpg';
//echo $logourl;
//$properitorignature=base_url().'assets/images/propsig.png';
//echo $salesofficersignature;
?>
<div class="d-print-none">
   
</div>
<?php

 echo "<div class='small'><div class='table-responsive small'>";
  echo          "<table class='table table-striped table-bordered small dataTable' id='stockTable'><thead>";
  echo '<tr><th colspan="11" class="text-center">Stock Detail</th></tr>';
  echo '<tr><th>Chasis&nbsp;No</th><th>Model</th><th>Location</th><th>Branch</th><th>Customer&nbsp;Name</th><th>Challan&nbsp;Date</th><th>Address1</th><th>Address2</th><th>District</th>
 <th>Contact</th> <th>Dues</th></tr></thead><tbody>';
  foreach($stock as $row){
  echo "<tr><td>" .$row['chasisno'] . "</td><td>" . $row['modalname'] . "</td>"
                       . "<td>" . $row['location'] . "</td><td>" . $row['branchname'] . "</td><td>" . $row['customername'] . "</td><td>" . $row['challandate'] . "</td>
                       <td>" . $row['customeraddressline1'] . "</td><td>" . $row['customeraddressline2'] . "</td><td>" .  $row['district']  . "</td><td>" . $row['customercontact'] . "</td>
                       <td>" . $row['dues'] . "</td></tr>";
 
  }
    echo "</tbody></table></div></div>";
?>

