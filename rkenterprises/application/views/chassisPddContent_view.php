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
//$pdddata;
//$pdddata[0]=['vehicleid'=>326,'chassisno'=>'mbx0003abxl123456','invoiceid'=>396];
if(!empty($invoicedetail)){
 echo "<div class='small'><div class='table-responsive small'>";
  echo          "<table class='table table-striped table-bordered small dataTable' id='showVehiclePresentTable'><thead>";
  echo '<tr><th colspan="11" class="text-center">Click Report to Print</th></tr>';
  echo '<tr><th>ID</th><th>Chasis&nbsp;No</th><th>Invoice&nbsp;No</th><th colspan="3" class="text-center">View</th> </tr></thead><tbody>';
 // foreach($pdddata as $row){
      foreach($invoicedetail as $row){
      
//  echo "<tr><td>" .$row['vehicleid'] . "</td><td>" .$row['chassisno'] . "</td><td>" . $row['invoiceid'] . "</td><td><button class='btn btn-primary btn-small'>Invoice</button></td><td><button class='btn btn-small btn-primary'>Form21</button></td><td><button class='btn btn-small btn-primary'>Challan</button></td>  </tr>";
  echo "<tr><td>" .$vehicleid . "</td><td>" .$chassisno . "</td><td>" . $row['invoiceno'] . "</td><td><button class='btn btn-primary btn-xs' name='showInvoiceBtn' value='".$row['invoiceid']."'>Invoice</button></td><td><button class='btn btn-xs btn-primary' name='showForm21Btn' value='".$row['invoiceid']."'>Form21</button></td><td><button class='btn btn-xs btn-primary' name='showDeliveryChallanBtn' value='".$row['invoiceid']."'>Challan</button></td>  </tr>";
  }
    echo "</tbody></table></div></div>";
}else{
    echo "<span class='text-danger small'>Invoice not created for chassis no.&nbsp;/".$chassisno."</span>";
}
?>



