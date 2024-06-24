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
//$stock=array();
//
/*



$chasisno="MBX00003ABZ12345";
$billingdate="18-01-2019";
$modalname="APE AR 3+1";
$hypothecation="M&M";
$dostatus="Issued";
$doissuedate="25-01-2019";
$dse="Vijay";
$customername="Naveen Kamal";
$customercontact="9934680440";
$customeraddressline1="Near C M Sc. College";
$customeraddressline2="Lalbagh Darbhanga";
$district="Darbhanga";
$dues=2000;
$date="07-02-2019";


$viewAts="True";

$stock[0]=array('chasisno'=>$chasisno,'billingdate'=>$billingdate,'modalname'=>$modalname,'hypothecation'=>$hypothecation,'dostatus'=>$dostatus
,'doissuedate'=>$doissuedate,'dse'=>$dse,'customername'=>$customername,'customercontact'=>$customercontact,'customeraddressline1'=>$customeraddressline1,'customeraddressline2'=>$customeraddressline2
,'district'=>$district,'dues'=>$dues);


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
  echo          "<table class='table table-striped table-bordered small '>";
  echo '<tr><td colspan="13" class="text-center">Finance Tracker</td></tr>';
  echo '<tr><td>Chasis No</td><td>Bill Date</td><td>Model</td><td>Finance</td><td>DO Status</td><td>DO Date</td><td>DSE</td><td>Customer</td><td>Contact</td><td>Address1</td><td>Address2</td><td>District</td>
  <td>Dues</td></tr>';
  foreach($stock as $row){
  echo "<tr><td>" .$row['chasisno'] . "</td><td>" . $row['billingdate'] . "</td>"
                       . "<td>" . $row['modalname'] . "</td><td>" . $row['hypothecation'] . "</td><td>" . $row['dostatus'] . "</td><td>" . $row['doissuedate'] . "</td>
                       <td>" . $row['dse'] . "</td><td>" . $row['customername'] . "</td><td>" . $row['customercontact'] . "</td><td>" . $row['customeraddressline1'] . "</td>
                       <td>" . $row['customeraddressline2'] . "</td><td>" . $row['district'] . "</td><td>" . $row['dues'] . "</td></tr>";
      
      
      
      
  }
  
          
    echo "</table></div></div>";



?>