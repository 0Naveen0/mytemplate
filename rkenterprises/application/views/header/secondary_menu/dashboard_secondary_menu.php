<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.nav-pills
 * 
 */
defined('BASEPATH') OR exit('No direct script access allowed');
$role = ($this->session->userdata('role')) ? ($this->session->userdata('role')) : "anonymous";
$uid = ($this->session->userdata('uid')) ? ($this->session->userdata('uid')) : "";
$first_Name = ($this->session->userdata('userName')) ? ($this->session->userdata('userName')) : "anonymous";
$url = base_url() . "assets/images/usersImage/" . $uid . ".jpg";
//var_dump($url);
$anonymousImage = base_url() . "assets/images/usersImage/anonymous.jpg";
$welcomeUser = "Welcome " . $first_Name;
//$file_headers = get_headers($url,true);
//var_dump($file_headers);
// if (($file_headers[0] == 'HTTP/1.1 404 Not Found')) {
    // $userImage = $anonymousImage;
// } else {
    // $userImage = $url;
// }
 $userImage = $anonymousImage;
?>
<div class="row">
    <div class="col-sm-10"></div>
    <div class="col-sm-1 ">
        <div class="text-center ">
            <img class='img img-circle' width='50' height="50" src="<?php echo $userImage; ?>" alt='UserImage'/>
        </div>
        <div class='caption text-center'><?php echo $welcomeUser; ?></div>
    </div>
    <div class="col-sm-1 pull-right">
        <ul class=" nav nav-pills">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <img src="<?php echo base_url().'assets/images/collapsedmenu.png';?>" alt='menu'/></a>
                <ul class="dropdown-menu">
                    <li><a class="btn btn-block" href="<?php echo base_url().'index.php/changepassword';?>" >
                            Change Password</a></li>
                    <li><a class="btn btn-block pull-left" href="<?php echo base_url().'index.php/logout';?>" >
                            <span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
                </ul>
            </li> 
        </ul>
    </div>
</div>

