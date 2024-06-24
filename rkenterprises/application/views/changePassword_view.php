<?php
//echo $_SESSION['captchaWord'];
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div id="changePasswordfrm">
    <form role="form" method='post' action='<?php echo base_url();?>index.php/home/changePassword'  class="form-horizontal">
       

     <fieldset>
        <legend>Change Password</legend>
        <div class="form-group">
<label for="uname" class="control-label col-sm-3">User Name</label>
<div class='col-sm-9'>
<input type="text" class="form-control" id="uname" name="uname" required="required"
placeholder="Enter User Name">
</div>
        </div>
<div class="form-group">
<label for="oldpwd" class="control-label col-sm-3">Old Password</label>
<div class='col-sm-9'>
<input type="password" class="form-control" id="oldpwd" name="oldpwd" required="required">
</div>
</div>
        <div class="form-group">
            <label for="newpwd" class="control-label col-sm-3">New Password</label>
            <div class='col-sm-9'>
<input type="password" class="form-control col-sm-9" id="newpwd" name="newpwd"required="required">
            </div>
        </div>  
        <div class="form-group">
            <label for="matchnewpwd" class="control-label col-sm-3">Retype New Password</label>
            <div class='col-sm-9'>
<input type="password" class="form-control col-sm-9" id="matchnewpwd" name=="matchnewpwd" required="required">
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
                    <label class='checkbox-inline'>
                    <input type="radio" class=" " name='loginType' value='admin'  >Others
                    </label>
                </div>
              </div> 

<p ><span id="captchaImage" class=" img img-rounded right"><?php echo $mycaptcha; ?></span>
    &nbsp;&nbsp;<input type="button" class="btn btn-info" name="createCaptcha" value="Refresh">
</p>
<p>
    <input type="text" class="form-control" id="captcha" name="captcha"placeholder="Enter the text above" required="required">
</p>
<p class="">
<input type="submit" class="pull-right btn btn-default" name="changePasswordBtn" value="Submit">
</p>
     </fieldset>

    </form>
       <fieldset>
        <legend></legend>
        <div class="row">
            <div class='col-sm-3'>
            <label  class="btn btn-block"><a href='<?php echo base_url();?>index.php/home/reg'>Sign Up</a></label>
            </div>
            <div class="col-sm-3">
                <label  class="btn btn-block"><a href='<?php echo base_url();?>index.php/home/forgot'>Forgot&nbsp;Password</a></label>
            </div>
            <div class="col-sm-3">
                <label  class="btn btn-block pull-right"><a href='<?php echo base_url();?>index.php/home/login'>Log&nbsp;In</a></label>
            </div>
        </div>
    </fieldset>
</div>