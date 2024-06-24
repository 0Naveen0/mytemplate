<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<div name="messageContent">
    <div class="error text-danger"></div>

<?php

if(count($recipient)){
    echo '<form id="sendMessage" role="form" method="post">';
 echo "<div class='small'><div class='small'><div class='table-responsive small'>";
  echo          "<table class='table table-striped table-bordered small dataTable' id='recipientTable' name='recipientTable'><thead>";
  echo '<tr><th colspan="5" class="text-center">Recipients</th></tr>';
  echo '<tr><th>Select</th><th>Name</th>';
// echo '<th>Father</th>';
// echo '<th>Address</th><th>Contact</th>';
// echo '<th>Email</th>';
 echo '<th>Branch</th><th>Type</th><th>Contact</th>
 </tr></thead><tbody>';
  foreach($recipient as $row){
  echo "<tr><td><input type='checkbox' name='recipients' value='".$row['recipientid'] . "'></td><td>" .$row['recipientname'] . "</td>";
 // echo "<td>" . $row['customerfathername'] . "</td>";
//  echo "<td>" . $row['customeraddressline1'] ."&comma;". $row['customeraddressline2']."&comma;".$row['customerdistrict']."&comma;".$row['customerstate']."&comma;".$row['customerpin'].
  //                     "</td><td>" . $row['customercontact'] . "</td>";
 //  echo "<td>" . $row['customeremail'] . "</td>";
   echo "<td>" . $row['branchname']."&comma;".$row['branchid'] . "</td><td>" . $row['recipienttype']."</td>
                       <td>" . $row['recipientcontact'] . "</td></tr>";
 
  }
    echo "</tbody></table></div></div></div>";


 echo '<div class="form-group ">
                <label for="message" class="col-sm-3 control-label">Message</label>
                <div class="col-sm-9">

                    <textarea class="form-control" rows="5"  id="message"></textarea>
                </div>
            </div>
            	<div class="form-group form-group-sm"> 
            <button type="button" class="btn btn-primary btn-sm pull-right" name="sendMessageBtn" value="sendMessage">Send</button>
         </div> 
            
</form>';

}else{
    $message="No Record Found";
    echo createMessage($message,"info");
}


?>


</div>



