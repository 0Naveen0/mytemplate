<?php
//Tax Invoice View
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<?php 

$logourl=base_url().'assets/images/piaggiologo.jpg';
//$salesofficersignature=base_url().'assets/images/salesofficer1.png';

?>

<div class="d-print-none">
    
    <form  role="form" class="form-horizontal small" method='post' id="vehicleSearchfrm">
        <div class="form-group"> 

                 <label for="selectionCriteria" class="col-sm-2 control-label">Select</label>
                <div class="col-sm-3">  
                
                <select name='selectionCriteria' class="form-control">
                    <option value="chassisno" selected>Chassis No</option>
                    <option value="engineno">Engine No</option>
                    
                    
                </select>
              
               
                </div>
                <div class="col-sm-5">
                    
                    <input type='text' class="form-control" name="searchVehicleCriteria" maxlength=17 minlength=1 required/>
                    
                </div>
                
                <div class="col-sm-2">
                    
                    <button  type="button" class="btn btn-default " name="searchVehicleToResetBtn" value='searchVehicle'>Search</button>&nbsp;
                    
                </div>

            </div>   
    </form>
    <div class="row small">
     <div class="col-sm-5 "></div>   
    <div class="col-sm-6  text-danger " style="font-size:6px;"><span class="error"></span></div>
    <div class="col-sm-1 "></div>
    </div>
     <hr/>
</div>

<div id="vehicleContent"></div>
<div id="showResetResultContent"></div>


