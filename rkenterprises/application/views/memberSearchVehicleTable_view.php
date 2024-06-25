<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');


?>
<?php
$notfound="<div class='error text-danger'>No Record Found</div>";
$i=0;
//echo var_dump($vehicledata);
if(count($vehicledata) && $vehicledata[0]['vehicleid']!==""){
 echo "<div class='small'><div class='small'><div class='table-responsive small'>";
  echo          "<table class='table table-striped table-bordered small ' id='searchVehicleTable' name='searchVehicleTable'><thead>";
  echo '<tr><th colspan="11" class="text-center">Vehicle List</th></tr>';
  echo '<tr><th>ID</th><th>Chassis No</th>';
 echo '<th>Engine No</th>';
 echo '<th>Color</th><th>Modal</th><th>Battery</th>';
 echo '<th>Tyre</th>';
 echo '<th>GearBox</th><th>Key</th><th>ECU</th><th>Action</th>
 </tr></thead><tbody>';
  foreach($vehicledata as $row){
  echo "<tr><td>" .$row['vehicleid'] . "</td><td>" .$row['chasisno'] . "</td>";
  echo "<td>" . $row['engineno'] . "</td>";
  echo "<td>" . $row['color']  . "</td>";
  echo "<td>" . $row['modal']  . "</td>";
   echo "<td>" . $row['batteryno'] . "</td>";
   echo "<td>" . $row['reartyreleft']."</td>";
   echo "<td>".$row['gearboxno'] . "</td><td>" . $row['keyno'] ."</td><td class='small'>".$row['ecu'] . "</td>
                       <td><button type='button' class='btn btn-default btn-xs' name='editVehicleBtn' data-toggle='modal' data-target='#vehicleModifyModal' data-vehicleid=".$row['vehicleid']." value=".$row['vehicleid']."><span class='glyphicon glyphicon-pencil'></span></button>
                       
                       <button type='button' class='btn btn-default btn-xs' name='deleteVehicleBtn' value=".$row['vehicleid']."><span class='glyphicon glyphicon-trash'></span></button>
                        <button type='button' class='btn btn-default btn-xs' name='resetVehicleBtn' value=".$row['vehicleid']."><span class='glyphicon glyphicon-refresh'></span></button>
                       </td></tr>";
 
  }
    echo "</tbody></table></div></div></div>";
}else {
    echo $notfound;
}
//$insertdata=array('chasisno'=>$chasisno,'engineno'=>$engineno,'gearboxno'=>$gearboxno, 'keyno'=>$keyno,'fronttyreleft'=>$fronttyreleft,'fronttyreright'=>$fronttyreright,	 'reartyreleft'=>$reartyreleft,'reartyreright'=>$reartyreright,'batteryno'=>$batteryno,'colorid'=>$colorid,'modalid'=>$modalid,'ecu'=>$ecu);

?>