<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<?php 

$role="other";
?>

		
<div class="alert alert-info text-center small" role="alert"><span class="error"></span></div>		


<div class="d-print-none">
    <form role="form" class="form-horizontal small" method='post' id="frm-mobile-verification">
        <fieldset>  
            
           
            <legend class='text-center small'>Change Password</legend>
            
            
             <div class="form-group small"> 

                 <label for="selectuser" class="col-sm-4 control-label">User</label>
                <div class="col-sm-6 small">  
                
              <select name="selectuser" class="form-control">
                  <?php
                  $i=0;
                   foreach ($userlist as $user) {
                 // for($i=0;$i<$noofusers;$i++){
                 echo '<option value="'.$user['userid'].'">'.$user['username'].'</option>';
                  }
                  ?>
                  
              </select>
               
                </div>
              

            </div>
            
            
          

 <div class="form-group small"> 

                 <label for="newpassword" class="col-sm-4 control-label">New Password</label>
                <div class="col-sm-6 small">  
                
               <input type="password" id="newpassword" class="form-control " name="newpassword"
					placeholder="Enter New Password">
              
               
                </div>
              

            </div>
             <div class="form-group small"> 

                 <label for="retypepassword" class="col-sm-4 control-label">Retype Password</label>
                <div class="col-sm-6 small">  
                
               <input type="password" id="retypepassword" class="form-control" name="retypepassword"
					placeholder="Retype Password">
              
               
                </div>
                 <div class="col-sm-2">
                    
                   	<input type="button" class="btn btn-default " value="Change" name="changepassword" id="changepassword"
				>
                    
                </div>
              

            </div>
            <!--
             <div class="form-group small"> 

                 <label for="chasisno" class="col-sm-4 control-label">Mobile Number Verification</label>
                <div class="col-sm-6 small">  
                
               <input type="number" id="mobile" class="form-input"
					placeholder="Enter the 10 digit mobile">
              
               
                </div>
                <div class="col-sm-2">
                    
                   	<input type="button" class="btnSubmit" value="Send OTP" name="sendOtp"
				>
                    
                </div>

            </div>
            
      <div class="form-group small"> 

                 <label for="chasisno" class="col-sm-4 control-label">Mobile Number Verification</label>
                <div class="col-sm-6 small">  
                
               <input type="number" id="mobile" class="form-input"
					placeholder="Enter OTP">
              
               
                </div>
                <div class="col-sm-2">
                    
                   	<input type="button" class="btnSubmit" value="Verify OTP" name="VerifyOtp"
				>
                    
                </div>

            </div>
            -->
            
        </fieldset>
    </form>
   
    <hr/>
</div>
 
<div class="d-print-none">
    <form role="form" class="form-horizontal small" method='post' id="changeRoleFrm">
        <fieldset>  
            
           
            <legend class='text-center small'>Change Role</legend>
            
            
             <div class="form-group small"> 

                 <label for="selectuser" class="col-sm-4 control-label">User</label>
                <div class="col-sm-6 small">  
                
              <select name="selectuser1" class="form-control">
                  <?php
                
                   foreach ($userlist as $user) {
                
                 echo '<option value="'.$user['userid'].'">'.$user['username'].'</option>';
                  }
                  ?>
                  
              </select>
               
                </div>
              

            </div>
            
            
      <div id="roleselect" ></div>   

 <div class="form-group small" > 

                 <label for='role' class="col-sm-4 control-label">Role</label>
                <div class="col-sm-6 small">  
                   <select name="selectrole" id="selectrole" class="form-control" disabled=true>
                     
                     
                     <option value="member"<?php echo $role==='member'?' selected':'';?>>Member</option>;
                     <option value="dealer"<?php echo $role==='dealer'?' selected':'';?>>Dealer</option>;
                     <option value="branch"<?php echo $role==='branch'?' selected':'';?>>Branch</option>;
                     <option value="customer"<?php echo $role==='customer'?' selected':'';?>>Customer</option>;
                     <option value="other"<?php echo $role==='other'?' selected':'';?>>Anonymous</option>;
                     
                     
                     
                     
                      </select>
              
              
               
                </div>
                 <div class="col-sm-2">
                    
                   	<input type="button" class="btn btn-default " value="Change Role" name="changerole" id="changerole" disabled=true
				>
                    
                </div>
              

            </div>
            
           
        </fieldset>
    </form>
    <hr/>
</div>

<div class="d-print-none" name="verifyPasswordContent"></div>





