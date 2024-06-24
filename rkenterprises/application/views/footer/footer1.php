<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/staticvariables.php');

?>
<p class="footer__contact">
    <strong>Contact Us</strong><br/>
<address>
<?php echo $comp_name; ?><br/>
<?php echo $comp_address_l1; ?>&nbsp;
<?php echo $comp_address_l2; ?> <br/><?php echo $comp_district." ".$comp_state." ".$comp_pin; ?><br/>

Call Me -+91-<?php echo $comp_contact1." | ".$comp_contact2; ?><br/>
<email>
Email:-<?php echo $comp_email; ?>
</email>
</address>
</p>
