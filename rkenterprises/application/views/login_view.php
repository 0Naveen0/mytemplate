<?php
//echo $_SESSION['captchaWord'];
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->library('session');
?>
<div  class="col-sm-6 "></div>
<div id="loginfrm" class="col-sm-6 ">
    <form role="form" method='post'>
       
<div class="form-group">
     <fieldset>
        <legend>Log In</legend>
<label for="uname">User Name</label>
<input type="text" class="form-control" id="uname" name='uname' required="required"
placeholder="Enter User Name">

<label for="pwd">Password</label>
<input type="password" class="form-control" id="pwd" name='password' required="required"><br/>

<div class="form-group">  
                <label  class="control-label col-sm-2">User Type</label>
                
                <div class='col-sm-10'>
                    <input type="radio" class=" " name='loginType' value='branch' checked='checked' >Branch
                    </label>
                    <label class='checkbox-inline'>
                    <input type="radio" class=" " name='loginType' value='member'  >Member
                    </label>
                    <label class='checkbox-inline'>
                    <input type="radio" class="" name='loginType' value='dealer' >Dealer
                    </label>
                    
                    <label class='checkbox-inline'>
                    <input type="radio" class="" name='loginType' value='customer' >Customer
                    </label>
                    <label class='checkbox-inline'>
                    <input type="radio" class=" " name='loginType' value='admin'  >Others
                    </label>
                </div>
              </div> 

<div ><span id="captchaImage" class=" img img-rounded pull-left"><?php echo $mycaptcha; ?></span>
    &nbsp;&nbsp;
    <button class="glyphicon glyphicon-refresh img img-circle" name="createCaptcha" value="Refresh"></button>
</div>
<div>
    <input type="text" class="form-control" id="captcha" name='captcha' placeholder="Enter the text above" required="required">
</div>
<div class="">
<input type="submit" class="pull-right btn btn-default" name="loginBtn" value="Login">
</div>
     </fieldset>
</div>
    </form>
       <fieldset>
        <legend></legend>
        <div class="row">
            <div class='col-sm-3'>
            <label for="pwd" class="btn btn-block"><a href='<?php echo base_url();?>index.php/home/reg'>Sign Up</a></label>
            </div>
            <div class="col-sm-3">
                <label for="pwd" class="btn btn-block"><a href='<?php echo base_url();?>index.php/home/forgot'>Forgot&nbsp;Password</a></label>
            </div>
        </div>
    </fieldset>
</div>