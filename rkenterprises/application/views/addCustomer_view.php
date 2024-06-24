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
    <form role="form" class="form-horizontal small" method='post' id="customerAddfrm">
        <fieldset>  
            
           
            <legend class='text-center '>Add Customer</legend>
            
            <div class="form-group">
                <label for="customername" class="col-sm-3 control-label">Customer Name</label>
                <div class="col-sm-9">

                    <input type="text" class="form-control" id="customername" name='customername'   required="required" >
                </div>
            </div>
			<div class="form-group">
                <label for="customerfathername" class="col-sm-3 control-label">S/o|W/o|D/o</label>
                <div class="col-sm-9">

                    <input type="text" class="form-control" id="customerfathername" name='customerfathername'   required="required" value="NA" >
                </div>
            </div>
			<div class="form-group">
                <label for="customeraddressline1" class="col-sm-3 control-label">Address</label>
                <div class="col-sm-9">

                    <input type="text" class="form-control" id="customeraddressline1" name='customeraddressline1'   required="required" >
                </div>
            </div>
			<div class="form-group">
                <label for="customeraddressline2" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">

                    <input type="text" class="form-control" id="customeraddressline2" name='customeraddressline2'   required="required" value="NA">
                </div>
            </div>
			<div class="form-group">
                <label for="customerdistrict" class="col-sm-3 control-label">District</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="customerdistrict" name='customerdistrict'   required="required" value="Darbhanga">
                </div>
				<label for="customerstate" class="col-sm-3 control-label">State</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="customerstate" name='customerstate'   required="required" value="Bihar">
                </div>
            </div>
			<div class="form-group">
                <label for="customerpin" class="col-sm-3 control-label">PIN</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="customerpin" name='customerpin' maxlength=6 minlength=6  required="required" value="847233">
                </div>
				<label for="customercontact" class="col-sm-3 control-label">Contact</label>
                <div class="col-sm-3">

                    <input type="text" class="form-control" id="customercontact" name='customercontact' minlength=10 maxlength=10  required="required" value="0000000000">
                </div>
            </div>
			
			<div class="form-group">
                <label for="customeremail" class="col-sm-3 control-label">E-mail</label>
                <div class="col-sm-9">

                    <input type="email" class="form-control" id="customeremail" name='customeremail'   required="required" value="ranjeetjibatho@gmail.com">
                </div>
            </div>
			
             <div class="form-group"> 
                 <label for="branch" class="col-sm-3 control-label">Branch</label>
                <div class="col-sm-9">      
                    <select class="form-control" name="branchSelect">
                        <option value="select" selected>-Select-</option>
                        <?php
                        $i = 0;
                        $j = 0;
                        foreach ($branchList as $branch) {
                            //echo $subject." </br>";
                           
                                echo '<option value="' . $branch['branchid'] . '">' . $branch['branchname'] . '</option>';
                            
                        }
                        ?>
                    </select>
                </div>  

            </div>
			
			<div class="form-group"> 
                 <label for="modalSelect" class="col-sm-3 control-label">Modal</label>
                <div class="col-sm-9">      
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

            </div>
            
           
            <div class="form-group">
                <div class="col-sm-9">
                </div>
                <div class="col-sm-3">
                    <input type="reset" class="btn btn-default pull-right" name="resetBtn" value="Clear">
                    <button type='submit' class="btn btn-default " name="addCustomerBtn" value='addCustomer'>Add</button>&nbsp;
                    
                </div>
            </div>
        </fieldset>
    </form>
</div>

