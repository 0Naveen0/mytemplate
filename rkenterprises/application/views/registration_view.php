<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$role = $this->session->userdata('role');
$isLoggedin = $this->session->userdata('isLoggedin');
if (($role === 'Administrator') && $isLoggedin) {
    $content = "";
} else {
    $content = ' <fieldset>
        <legend></legend>
        <div class="row">
            <div class="col-sm-3">
            <label for="pwd" class="btn btn-block"><a href="<?php echo base_url();?>index.php/home/login">Log In</a></label>
            </div>
            <div class="col-sm-3">
                <label for="pwd" class="btn btn-block"><a href="<?php echo base_url();?>index.php/home/forgot">Forgot&nbsp;Password</a></label>
            </div>
        </div>
    </fieldset>';
}
?>
<div id="regfrm">
    <form role="form" class="form-horizontal" method='post'>
        <fieldset>  
            <legend>Registration</legend>
            <div class="form-group row ">
                <label for="fname" class="col-sm-3 control-label">First Name</label>
                <div class="col-sm-9">

                    <input type="text" class="form-control" id="fname" name='fname'
                           placeholder="Enter First Name">
                </div>
            </div>


            <div class="form-group">        
                <label for="lname" class="col-sm-3 control-label">Last Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="lname" name='lname' required="required"
                           placeholder="Enter Last Name">
                </div>
            </div>

            <div class="form-group">       
                <!--  <label for="fathername" class="col-sm-3 control-label">S/O|D/O</label>-->
                <div class="col-sm-3">      
                    <select class="form-control" name="salutation">
                        <option value='son' selected>S/o</option>
                        <option value='daughter'>D/o</option>
                        <option value='other'>NA</option>
                    </select>
                </div>     
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="fathername" name='father' required="required"
                           placeholder="Enter Father's Name">
                </div>
            </div>
            <div class="form-group"> 

                <label  class="control-label col-sm-3">Gender</label>
                <div class="col-sm-9">
                    <label class='checkbox-inline'>
                        <input type="radio" class="" name='gender' id='maleRadio' value='male' checked >Male
                    </label>
                    <label class='checkbox-inline'>
                        <input type="radio" class=" " name='gender' id='femaleRadio' value='female'  >Female
                    </label>
                    <label class='checkbox-inline'>
                        <input type="radio" class=" " name='gender' id='otherRadio' value='other'  >Other
                    </label>
                </div>
            </div>

            <div class="form-group"> 
                <div class="col-sm-3">
                    <label for="dob" class="control-label">D.O.B.</label>
                </div>
                <div class="col-sm-9 input-group datetimepicker" id="datepicker">
                    <input type="date" class="form-control" id="dob" name='dob' required="required"/>


                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>

            </div>
            <div class="form-group">        
                <label for="contact" class="col-sm-3 control-label">Contact</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="contact" name='contact' pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" required="required"
                           placeholder="Enter Contact No.">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name='email' required="required"
                           placeholder="Enter Email">
                </div>
            </div>

            <div class="form-group">
                <label for="uname" class="col-sm-3 control-label">User Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="uname" name='uname' required="required"
                           placeholder="Enter User Name">
                </div>
            </div>
            <div class="form-group">
                <label for="pwd" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control form-control-static" id="pwd" name='password' required="required">
                </div>
            </div>
            <div class="form-group">
                <label for="pwd" class="col-sm-3 control-label align-left">Retype Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control " id="repwd" name='repassword' required="required">
                </div>
            </div>

            <div class="form-group">  
                <label  class="control-label col-sm-3">User Type</label>

                <div class='col-sm-9'>

                    <label class='checkbox-inline'>
                      <!-- 
                      <input type="radio" class=" " name='registerType' value='member' checked='checked' >Member
                    </label>
                    <label class='checkbox-inline'>
                        <input type="radio" class="" name='registerType' value='dealer' >Dealer
                    </label>
                    -->
                    <input type="radio" class=" " name='registerType' value='branch' checked='checked' >Branch
                    </label>
                    <label class='checkbox-inline'>
                        <input type="radio" class="" name='registerType' value='customer' >Customer
                    </label>

                </div>
            </div>     






            <div class="form-group">
                <p class="">

                    <input type="reset" class="btn btn-default pull-right" name="resetBtn" value="Clear">
                    <input type="submit" class="btn btn-default " name="regBtn" value="Register">&nbsp;
                </p>
            </div>

        </fieldset>
    </form>
    <!--
        <fieldset>
            <legend></legend>
            <div class="row">
                <div class='col-sm-3'>
                <label for="pwd" class="btn btn-block"><a href='<?php //echo base_url(); ?>index.php/home/login'>Log In</a></label>
                </div>
                <div class="col-sm-3">
                    <label for="pwd" class="btn btn-block"><a href='<?php //echo base_url(); ?>index.php/home/forgot'>Forgot&nbsp;Password</a></label>
                </div>
            </div>
        </fieldset>
    -->
    <?php echo $content; ?>

</div>
