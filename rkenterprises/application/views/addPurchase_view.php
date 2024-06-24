<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<?php 
/*
//echo $message;
$i=0;$j=0;

$modalList=array();
$modalList[$j++]=['modalid'=>1,'modalname'=>'APE AR 3+1'];
$modalList[$j++]=['modalid'=>2,'modalname'=>'APE LD'];

$branchList=array();
$branchList[$i++]=['branchid'=>100109,'branchname'=>'Rakesh'];
$branchList[$i++]=['branchid'=>100110,'branchname'=>'Showroom'];

$branchList[$j++]=['modalid'=>2,'modalname'=>'APE LD'];
*/
?>
<div >
    <form role="form" class="form-horizontal small" method='post' id="vehicleAddfrm">
        <fieldset>  
            
           
            <legend class='text-center '>Vehicle Add</legend>
			
			<div class="form-group"> 
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
            
            <div class="form-group">
                <label for="chasisno" class="col-sm-3 control-label">Chasis No.</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="chasisno" name='chasisno'  maxlength="27" minlength="17" required="required" >
                </div>
                <label for="engineno" class="col-sm-3 control-label">Engine no.</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="engineno" name='engineno' maxlength="27" minlength="10"  required="required" >
                </div>
            </div>
           
			<div class="form-group">
                <label for="keyno" class="col-sm-3 control-label">Key No.</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="keyno" name='keyno'  maxlength="4" minlength="4" >
                </div>
                <label for="gearboxno" class="col-sm-3 control-label">Gear Box No.</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="gearboxno" name='gearboxno'    >
                </div>
            </div>
           
			<div class="form-group">
                <label for="fronttyreleft" class="col-sm-3 control-label">Tyre(FL)</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="fronttyreleft" name='fronttyreleft' >
                </div>
				<label for="fronttyreright" class="col-sm-3 control-label">Tyre(FR)</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="fronttyreright" name='fronttyreright'  >
                </div>
            </div>
			<div class="form-group">
                <label for="reartyreleft" class="col-sm-3 control-label">Tyre(RL)</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="reartyreleft" name='reartyreleft'>
                </div>
				<label for="reartyreright" class="col-sm-3 control-label">Tyre(RR)</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="reartyreright" name='reartyreright' >
                </div>
            </div>
			
			<div class="form-group">
                <label for="batteryno" class="col-sm-3 control-label">Battery No.</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="batteryno" name='batteryno'  >
                </div>
                <label for="ecunumber" class="col-sm-3 control-label">ECU</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="ecunumber" name='ecunumber' maxlength="24" value="NA">
                </div>
            </div>
			
			

          
            
           
            <div class="form-group">
                <div class="col-sm-9">
                </div>
                <div class="col-sm-3">
                    <input type="reset" class="btn btn-default pull-right" name="resetBtn" value="Clear">
                    <button type='submit' class="btn btn-default " name="addPurchaseBtn" value='addPurchase'>Add</button>&nbsp;
                    
                </div>
            </div>
        </fieldset>
    </form>
</div>
