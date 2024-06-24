<?php
/* 
 * To change this license header, choose License Headers in Project Properties
 * To change this template file, choose Tools | Templates
 * and open the template in the editor
 */
defined('BASEPATH') OR exit('No direct script access allowed');
//echo <p class='label'>Student Dashboard</p>;
?>

<div class='table-responsive small'>
    
   <form id='adminUserListForm' method='post' class='small'>
                    <table class='table table-striped table-bordered'>
                     <caption class='text-center'>Users List</caption>
                     <thead>
                     <tr class=' text-nowrap'>
                     <th><button class='glyphicon glyphicon-arrow-down small' name='sortviewdesc' value='uid'></button>
                     Id<button name='sortviewasc' value='uid' class='small glyphicon glyphicon-arrow-up'></button></th>
                     <th><button class='glyphicon glyphicon-arrow-down small' name='sortviewdesc' value='fname'></button>
                     First Name<button name='sortviewasc' value='fname' class='glyphicon glyphicon-arrow-up small'></button></th>
                     <th><button class='glyphicon glyphicon-arrow-down small' name='sortviewdesc' value='lname'></button>
                     Last Name<button name='sortviewasc' value='lname' class='glyphicon glyphicon-arrow-up small'></button></th>
                     <th><button class='glyphicon glyphicon-arrow-down small' name='sortviewdesc' value='uname'></button>
                     User Name<button name='sortviewasc' value='uname' class='glyphicon glyphicon-arrow-up small'></button></th>
                     <th><button class='glyphicon glyphicon-arrow-down small' name='sortviewdesc' value='role'></button>
                     Role<button name='sortviewasc' value='role' class='glyphicon glyphicon-arrow-up small'></button></th>
                     <th>Contact</th><th>Email</th></tr></thead><tbody>
                         <?php echo $userTable;?>
                         </tbody></table></form>
</div>