<?php
//echo $_SESSION['captchaWord'];
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="forgotfrm">
    <form role="form" class='form-horizontal'>


        <fieldset>
            <legend>Reset Password</legend>
            <div class="form-group">
                <label for="uname" class="col-sm-3 control-label">User Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="uname" required="required"
                           placeholder="Enter User Name">
                </div>
            </div>

            <div class="form-group"> 

                <label for="dob" class="col-sm-3 control-label">D.O.B.</label>

                <div class="col-sm-9 " id="datepicker">
                    <input type="date" class="form-control" id="dob" required="required"/>


                </div>                
            </div>

            <div class="form-group">        
                <label for="contact" class="col-sm-3 control-label">Contact</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="contact" pattern="[0-9]{10}" required="required"
                           placeholder="Enter Contact No.">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email"  required="required"
                           placeholder="Enter Email">
                </div>
            </div>



            <div class="form-group">  
                <label  class="control-label col-sm-3">User Type</label>

                <div class='col-sm-9'>
                    <label class='checkbox-inline'>
                        <input type="radio" class=" " name='loginType' value='member' checked='checked' >Member
                    </label>
                    <label class='checkbox-inline'>
                        <input type="radio" class="" name='loginType' value='dealer' >Dealer
                    </label>

                </div>
            </div> 

            <p ><span id="captchaImage" class=" img img-rounded right"><?php echo $mycaptcha; ?></span>
                &nbsp;&nbsp;<input type="button" class="btn btn-info" name="createCaptcha" value="Refresh">
            </p>
            <p>
                <input type="text" class="form-control" id="captcha" placeholder="Enter the text above" required="required">
            </p>
            <p class="">
                <input type="submit" class="pull-right btn btn-default" name="resetBtn" value="Reset">
            </p>
        </fieldset>

    </form>
    <fieldset>
        <legend></legend>
        <div class="row">
            <div class='col-sm-3'>
                <label  class="btn btn-block"><a href='<?php echo base_url(); ?>index.php/home/reg'>Sign Up</a></label>
            </div>
            <div class="col-sm-3">
                <label  class="btn btn-block"><a href='<?php echo base_url(); ?>index.php/home/login'>Log&nbsp;In</a></label>
            </div>
        </div>
    </fieldset>
</div>