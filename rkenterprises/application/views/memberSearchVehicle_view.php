<?php
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
           <div class='row'>
               <div class="col-sm-2 small">
                   <button  class="btn btn-default btn-small small" name="addVehicleBtn" data-toggle='modal' data-target='#vehicleAddModal' value='vehicleAdd' >
                       <span class="glyphicon glyphicon-plus" aria-hidden="true" aria-label="Add"></span>Add New
                   </button>
               </div>
               <form role="form" class="form-horizontal small " method='post' id="searchVehicleDatafrm">
                    <fieldset> 
                         <div class="col-sm-3 small">      
                             <select class="form-control" name="criteriaSearchVehicle">
                       
                                <option value="bychassisno" selected>Chassis no.</option>
                                <option value="byengineno">Motor No</option>
                             </select>
                         </div>
                         <div class="col-sm-5 small">

                             <input type="text" class="form-control" id="searchText" name='searchText' placeholder="Enter Last Five Digit" required>
                         </div>
                         <div class="col-sm-2 small">
                             <button type='submit' class="btn btn-default " name="searchForVehicleDataBtn" value='vehicleSearch' >
                                 <span class="glyphicon glyphicon-search" aria-hidden="true" aria-label="Search"></span>
                             </button>
                         </div>
                
            </div>
            <div class="row"><div class="col-sm-5 small"></div><div class="col-sm-5 small error"></div><div class="col-sm-2 small"></div></div>
            
                    </fieldset>
                </form>
    </div>
    
   
</div>


<?php
/*
if(count($vehicledata)){
 echo "<div class='small'><div class='small'><div class='table-responsive small'>";
  echo          "<table class='table table-striped table-bordered small dataTable' id='searchVehicleTable' name='searchVehicleTable'><thead>";
  echo '<tr><th colspan="11" class="text-center">Vehicle List</th></tr>';
  echo '<tr><th>ID</th><th>Chassis No</th>';
 echo '<th>Engine No</th>';
 echo '<th>Color</th><th>Battery</th>';
 echo '<th>Tyre</th>';
 echo '<th>GearBox</th><th>Key</th><th>Action</th>
 </tr></thead><tbody>';
  foreach($vehicledata as $row){
  echo "<tr><td>" .$row['vehicleid'] . "</td><td>" .$row['chasisno'] . "</td>";
  echo "<td>" . $row['engineno'] . "</td>";
  echo "<td>" . $row['color']  . "</td>";
   echo "<td>" . $row['batteryno'] . "</td>";
   echo "<td>" . $row['$reartyreleft']."</td>";
   echo "<td>".$row['gearboxno'] . "</td><td>" . $row['keyno'] ."</td>
                       <td><button type='button' class='btn btn-default btn-xs' name='editVehicleBtn' data-toggle='modal' data-target='#vehicleModifyModal' data-vehicleid=".$row['vehicleid']." value=".$row['vehicleid']."><span class='glyphicon glyphicon-pencil'></span></button>
                       
                       <button type='button' class='btn btn-default btn-xs' name='deleteVehicleBtn' value=".$row['vehicleid']."><span class='glyphicon glyphicon-trash'></span></button>
                        <button type='button' class='btn btn-default btn-xs' name='resetVehicleBtn' value=".$row['vehicleid']."><span class='glyphicon glyphicon-piggy-bank'></span></button>
                       </td></tr>";
 
  }
    echo "</tbody></table></div></div></div>";
}
//$insertdata=array('chasisno'=>$chasisno,'engineno'=>$engineno,'gearboxno'=>$gearboxno, 'keyno'=>$keyno,'fronttyreleft'=>$fronttyreleft,'fronttyreright'=>$fronttyreright,	 'reartyreleft'=>$reartyreleft,'reartyreright'=>$reartyreright,'batteryno'=>$batteryno,'colorid'=>$colorid,'modalid'=>$modalid,'ecu'=>$ecu);
*/
?>
		 

<div name="vehicleContent"></div>

<!--////////Purchase Add Modal Starts Here/////////////////////////////////////////////////////-->

<div class="modal fade" id="vehicleAddModal" tabindex="-1" role="dialog" aria-labelledby="vehicleAddModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="vehicleAddModalLabel">Add Vehicle</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div class="modal-body">

    <form role="form" class="form-horizontal small" method='post' id="vehicleAddfrm">
        <fieldset>  
            
           
         <!--   <legend class='text-center '>Vehicle Add</legend>-->
			
			<div class="form-group small"> 
                 <label for="modalSelect" class="col-sm-3 control-label">Modal</label>
                <div class="col-sm-3">      
                    <select class="form-control" name="modalSelect">
                        <option value="select" selected>-Select-</option>
                        <?php
                        $i = 0;
                        $j = 0;
                        foreach ($modalList as $modal) {
                            //echo $subject." </br>";
                           
                                echo '<option value="' . $modal['modalid'] . '">' . $modal['modalname'] . '</option>';
                            
                        }
                        ?>
                    </select>
                </div>
                
                 <label for="colorSelect" class="col-sm-3 control-label">Color</label>
                <div class="col-sm-3">      
                    <select class="form-control" name="colorSelect">
                        <option value="select" selected>-Select-</option>
                        <?php
                        $i = 0;
                        $j = 0;
                        foreach ($colorList as $color) {
                            //echo $subject." </br>";
                           
                                echo '<option value="' . $color['colorid'] . '">' . $color['colorname'] . '</option>';
                            
                        }
                        ?>
                    </select>
                </div> 
                
                
                
			</div>
            
            <div class="form-group small">
                <label for="chasisno" class="col-sm-3 control-label">Chasis No.</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="chasisno" name='chasisno'  maxlength="17" minlength="17" required="required" >
                </div>
                <label for="engineno" class="col-sm-3 control-label">Motor no.</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="engineno" name='engineno' maxlength="25"   required="required" >
                </div>
            </div>
           
			<div class="form-group small">
                <label for="keyno" class="col-sm-3 control-label">Key No.</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="keyno" name='keyno'   value="XXXX">
                </div>
				<label for="fronttyreleft" class="col-sm-3 control-label">Tyre No.</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="fronttyreleft" name='fronttyreleft' value="XXXX" >
                </div>
                
            </div>
               
			<div class="form-group small">
                
				<label for="gearboxno" class="col-sm-3 control-label">Battery 1</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="gearboxno" name='gearboxno'  value="XXXX" >
                </div>
				<label for="fronttyreright" class="col-sm-3 control-label">Battery 2</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="fronttyreright" name='fronttyreright' value="XXXX" >
                </div>
            </div>
			
			
			<div class="form-group small">
                <label for="reartyreleft" class="col-sm-3 control-label">Battery 3</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="reartyreleft" name='reartyreleft' value="XXXX">
                </div>
				<label for="reartyreright" class="col-sm-3 control-label">Battery 4</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="reartyreright" name='reartyreright' value="XXXX">
                </div>
            </div>
			
			<div class="form-group small">
                <label for="batteryno" class="col-sm-3 control-label">Battery</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="batteryno" name='batteryno' value="XXXX" >
                </div>
                <label for="ecunumber" class="col-sm-3 control-label">Controller</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="ecunumber" name='ecunumber' maxlength="24" value="NA" required>
                </div>
            </div>
			
			

          
            
           
            <div class="form-group small">
                <div class="col-sm-9">
                </div>
                <div class="col-sm-3">
                    <input type="reset" class="btn btn-default pull-right" name="resetBtn" value="Clear">
                    <button type='submit' class="btn btn-default btn-small" name="addPurchaseBtn" value='addPurchase'>Add</button>&nbsp;
                    
                </div>
            </div>
        </fieldset>
    </form>
	</div>
<div class="modal-footer">
		
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>	
</div>
</div>
</div>

<!--////////Purchase Add Modal Ends Here/////////////////////////////////////////////////////-->


<!--////////Vehicle Update Modal Starts Here/////////////////////////////////////////////////////-->

<div class="modal fade" id="vehicleModifyModal" tabindex="-1" role="dialog" aria-labelledby="vehicleModifyModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="customerModifyModalLabel">Edit Vehicle</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div class="modal-body">

    <form role="form" class="form-horizontal small" method='post' id="vehicleEditfrm">
        <fieldset>  
            
           
         <!--   <legend class='text-center '>Vehicle Add</legend>-->
			
			<div class="form-group small"> 
                 <label for="modalSelect" class="col-sm-3 control-label">Modal</label>
                <div class="col-sm-3">      
                    <select class="form-control" name="modalSelect">
                        <option value="select" selected>-Select-</option>
                        <?php
                        $i = 0;
                        $j = 0;
                        foreach ($modalList as $modal) {
                            //echo $subject." </br>";
                           
                                echo '<option value="' . $modal['modalid'] . '">' . $modal['modalname'] . '</option>';
                            
                        }
                        ?>
                    </select>
                </div>
                
                 <label for="colorSelect" class="col-sm-3 control-label">Color</label>
                <div class="col-sm-3">      
                    <select class="form-control" name="colorSelect">
                        <option value="select" selected>-Select-</option>
                        <?php
                        $i = 0;
                        $j = 0;
                        foreach ($colorList as $color) {
                            //echo $subject." </br>";
                           
                                echo '<option value="' . $color['colorid'] . '">' . $color['colorname'] . '</option>';
                            
                        }
                        ?>
                    </select>
                </div> 
                
                
                
			</div>
            
            <div class="form-group small">
                <label for="chasisno" class="col-sm-3 control-label">Chasis No.</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control"  name='chasisno'  maxlength="17" minlength="17" required="required" >
                </div>
                <label for="engineno" class="col-sm-3 control-label">Motor no.</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control"  name='engineno' maxlength="10" minlength="10"  required="required" >
                </div>
            </div>
           
			<div class="form-group small">
                <label for="keyno" class="col-sm-3 control-label">Key No.</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control"  name='keyno'  maxlength="4" minlength="4" >
                </div>
				<label for="fronttyreleft" class="col-sm-3 control-label">Tyre No.</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="fronttyreleft" name='fronttyreleft' value="XXXX" >
                </div>
                
            </div>
           
			<div class="form-group small">
                <label for="gearboxno" class="col-sm-3 control-label">Battery 1</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control"  name='gearboxno' >
                </div>
				<label for="fronttyreright" class="col-sm-3 control-label">Battery 2</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control"  name='fronttyreright'  >
                </div>
            </div>
			<div class="form-group small">
                <label for="reartyreleft" class="col-sm-3 control-label">Battery 3</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control"  name='reartyreleft'>
                </div>
				<label for="reartyreright" class="col-sm-3 control-label">Battery 4</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control"  name='reartyreright' >
                </div>
            </div>
			
			<div class="form-group small">
                <label for="batteryno" class="col-sm-3 control-label">Battery</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control"  name='batteryno'  >
                </div>
                <label for="ecunumber" class="col-sm-3 control-label">Controller</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control"  name='ecunumber' maxlength="24" value="NA">
                </div>
            </div>
			
			

          
            
           
            <div class="form-group small">
                <div class="col-sm-9">
                </div>
                <div class="col-sm-3">
                    
                    <button type='submit' class="btn btn-default btn-small" name="updateVehicleDataBtn" value='updateVehicleData'>Save</button>&nbsp;
                    
                </div>
            </div>
        </fieldset>
    </form>
	</div>
<div class="modal-footer">
		
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>	
</div>
</div>
</div>

<!--////////Vehicle Update Modal Ends Here/////////////////////////////////////////////////////-->




