<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
$pageid=($this->session->userdata("pageid"))?($this->session->userdata("pageid")):"";
//echo $pageid;
?>
<div>

<ul class="nav nav-pills">
<li><a class='<?php echo ($pageid==="home")?"selected_menu":"";?>' href="<?php echo base_url().'index.php/home';?>" >Home</a></li>




<li><a  href="<?php echo base_url().'index.php/about';?>" class='<?php echo ($pageid==="about")?"selected_menu":"";?>'>About</a></li>

<li><a  href="<?php echo base_url().'index.php/contact';?>" class='<?php echo ($pageid==="contact")?"selected_menu":"";?>'>Contact</a></li>
<li><a  href="<?php //echo base_url().'index.php/home/recruitment';?>" class='<?php //echo ($pageid==="recruitment")?"selected_menu":"";?>'>Recruitment</a></li>



</ul>
            
			
                           
               </div>