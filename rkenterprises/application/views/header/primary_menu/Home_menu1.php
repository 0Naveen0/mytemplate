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
<li><a href="<?php echo base_url().'index.php/home/gallery';?>" class='<?php echo ($pageid==="gallery")?"selected_menu":"";?>'>Gallery</a></li>
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url().'index.php/member';?>">Products<span class="caret"></span></a>
<ul class="dropdown-menu">

<li class='<?php echo ($pageid==="company1")?"selected_menu":"";?>'><a href="<?php echo base_url().'index.php/home/company1';?>">Piaggio</a></li>
<li><a href="<?php echo base_url().'index.php/home/company2';?>" class='<?php echo ($pageid==="company2")?"selected_menu":"";?>'>John Deere</a></li>
<li><a href="<?php echo base_url().'index.php/home/company3';?>" class='<?php echo ($pageid==="company3")?"selected_menu":"";?>'>Supreme</a></li>

<!--<li><a href="/apoorvatraders/index.php/login" class="<?php //echo ($pageid==="login")?"selected_menu":"";?>">Log In</a></li>-->
</ul></li> 


<li><a  href="<?php echo base_url().'index.php/about';?>" class='<?php echo ($pageid==="about")?"selected_menu":"";?>'>About</a></li>
<li><a  href="about" class='<?php echo ($pageid==="about")?"selected_menu":"";?>'>About</a></li>
<li><a  href="<?php echo base_url().'index.php/contact';?>" class='<?php echo ($pageid==="contact")?"selected_menu":"";?>'>Contact</a></li>
<li><a  href="<?php echo base_url().'index.php/recruitment';?>" class='<?php echo ($pageid==="recruitment")?"selected_menu":"";?>'>Recruitment</a></li>



</ul>
            
			
                           
               </div>