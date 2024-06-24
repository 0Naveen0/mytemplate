<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 */
defined('BASEPATH') OR exit('No direct script access allowed');
$userProfile = $profile;
$uid = ($this->session->userdata('uid')) ? ($this->session->userdata('uid')) : "";
$url = base_url() . "assets/images/usersImage/" . $uid . ".jpg";
$anonymousImage = base_url() . "assets/images/usersImage/anonymous.jpg";
$file_headers = @get_headers($url);
if (($file_headers[0] == 'HTTP/1.1 404 Not Found')) {
    $userImage = $anonymousImage;
} else {
    $userImage = $url;
}
?>
<div class='' style="">
    <div class='row ' style=" border: 1px solid #000;padding: 10px;">
        <div class='col-sm-12 text-center text-danger'>
            User Profile</div>
    </div>
    <div class='row ' style="border: 1px solid #000;padding: 0px;">
        <div class='col-sm-8 '>
            <div class='row ' style="border: 1px solid #000;padding: 10px;">
                <div class='col-sm-4 '>Name</div>
                <div class='col-sm-8  small'><?php echo $userProfile['fname'] . ' ' . $userProfile['lname'] ?></div>
            </div>
            <div class='row ' style="border: 1px solid #000;padding: 10px;">
                <div class='col-sm-4'>Father/Guardian</div>
                <div class='col-sm-8 small'><?php echo $userProfile['father'] ?></div>
            </div>
            <div class='row ' style="border: 1px solid #000;padding: 10px;">
                <div class='col-sm-4'>Gender</div>
                <div class='col-sm-8 small'><?php echo $userProfile['gender'] ?></div>
            </div>
        </div>
        <div class='col-sm-4 text-center' style="border: 0px solid #000;padding: 10px;">
            <img class='img img-rounded img-thumbnail' width='100' height="100" src="<?php echo $userImage; ?>"/>
        </div>
    </div>
    <div class='row ' style="border: 1px solid #000;padding: 10px;">
        <div class='col-sm-4'>DOB
        </div>
        <div class='col-sm-8 small'><?php echo $userProfile['dob']; ?>
        </div>
    </div>
    <div class='row ' style="border: 1px solid #000;padding: 10px;">
        <div class='col-sm-4'>User Name
        </div>
        <div class='col-sm-8 small'><?php echo $userProfile['uname']; ?>
        </div>
    </div>
    <div class='row ' style="border: 1px solid #000;padding: 10px;">
        <div class='col-sm-4'>User Type
        </div>
        <div class='col-sm-8 small'><?php echo $userProfile['role']; ?>
        </div>
    </div>
    <div class='row ' style="border: 1px solid #000;padding: 10px;">
        <div class='col-sm-4'>Contact
        </div>
        <div class='col-sm-8 small'><?php echo $userProfile['contact']; ?>
        </div>
    </div>
    <div class='row ' style="border: 1px solid #000;padding: 10px;">
        <div class='col-sm-4'>Email
        </div>
        <div class='col-sm-8 small'><?php echo $userProfile['email']; ?>
        </div>
    </div>
</div>