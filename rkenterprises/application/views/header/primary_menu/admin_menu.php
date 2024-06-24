<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
$pageid=($this->session->userdata("pageid"))?($this->session->userdata("pageid")):"";
?>
<div>

<ul class="nav nav-pills">
<li><a  href="/apoorvatraders/index.php/admin" class='<?php echo ($pageid==="adminHome")?"selected_menu":"";?>'>Home</a></li>
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="/apoorvatraders/index.php/admin">User <span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a  href="/apoorvatraders/index.php/admin/createUser" class='<?php echo ($pageid==="createUser")?"selected_menu":"";?>'>Create User</a></li>
<li><a href="/apoorvatraders/index.php/admin/editUser" class='<?php echo ($pageid==="editUser")?"selected_menu":"";?>'>Edit User</a></li>
<li><a  href="/apoorvatraders/index.php/admin/deleteUser" class='<?php echo ($pageid==="deleteUser")?"selected_menu":"";?>'>Delete User</a></li>
<li><a  href="/apoorvatraders/index.php/admin/changePasswordAdmin" class='<?php echo ($pageid==="adminChangePassword")?"selected_menu":"";?>'>Change Password</a></li>
</ul>
</li>

<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="/apoorvatraders/index.php/admin">Exam <span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a  href="/apoorvatraders/index.php/admin/approveExam" class='<?php echo ($pageid==="approveExam")?"selected_menu":"";?>'>Approve Exam</a></li>
<li><a href="/apoorvatraders/index.php/admin/disapproveExam" class='<?php echo ($pageid==="disapproveExam")?"selected_menu":"";?>'>Disapprove Exam</a></li>
<li><a  href="/apoorvatraders/index.php/admin/haltExam" class='<?php echo ($pageid==="haltExam")?"selected_menu":"";?>'>Halt Exam</a></li>

</ul>
</li>



<li><a href="/apoorvatraders/index.php/admin/gallery" class='<?php echo ($pageid==="adminGallery")?"selected_menu":"";?>'>Gallery</a></li>
<li class="dropdown "><a class="dropdown-toggle" data-toggle="dropdown" href="/apoorvatraders/index.php/admin">View<span class="caret"></span></a>
<ul class="dropdown-menu">
    <li><a  href="/apoorvatraders/index.php/admin/adminUsersView" class='<?php echo ($pageid==="adminUsersView")?"selected_menu":"";?>'>Users</a></li>
<li><a  href="/apoorvatraders/index.php/admin/adminExamView" class='<?php echo ($pageid==="adminExamView")?"selected_menu":"";?>'>Exam</a></li>
<li><a href="/apoorvatraders/index.php/admin/adminApplicationView" class='<?php echo ($pageid==="adminApplicationView")?"selected_menu":"";?>'>Application</a></li>
<li><a href="/apoorvatraders/index.php/admin/adminResultView" class='<?php echo ($pageid==="adminResultView")?"selected_menu":"";?>'>Result</a></li>
<li><a  href="/apoorvatraders/index.php/admin/adminResponseView" class='<?php echo ($pageid==="adminResponseView")?"selected_menu":"";?>'>Response</a></li>
<li><a href="/apoorvatraders/index.php/admin/adminProfileView" class='<?php echo ($pageid==="adminProfileView")?"selected_menu":"";?>'>Profile</a></li>
</ul>
</li>




</ul>
</div>