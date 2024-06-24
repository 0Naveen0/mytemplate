<?php
//Day Book Search View
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
//echo var_dump($quotationdetail);

?>


<?php

if(!empty($quotationdetail)){
 echo "<div class='small'><div class='table-responsive small'>";
  echo          "<table class='table table-striped table-bordered small dataTable' id='showQuotationPresentTable'><thead>";
  echo '<tr><th colspan="11" class="text-center">Click Report to Print</th></tr>';
  echo '<tr><th>ID</th><th>Quotation&nbsp;No</th><th>Quotation&nbsp;Date</th><th colspan="3" class="text-center">View</th> </tr></thead><tbody>';
 
	// $i=0;
      foreach($quotationdetail as $row){
      
if(!empty($row['quotationid'])){
  echo "<tr><td>" .$row['quotationid'] . "</td><td>" .$row['quotationno'] . "</td><td>" . $row['quotationdate'] . "</td><td class='text-center'><button class='btn btn-primary btn-xs' id='showQuotationBtnA' name='showQuotationBtn' value='".$row['quotationid']."'>Ex-Showroom</button></td><td class='text-center'><button class='btn btn-primary btn-xs' id='showQuotationBtnB'  name='showQuotationBtn' value='".$row['quotationid']."'>On Road</button></td>  </tr>";
  //$i++;
}else{
echo "<tr ><td colspan=4><span class='text-danger '>Quotation not created for Selection.&nbsp;</span></td>  </tr>";	
}
  }
    echo "</tbody></table></div></div>";
}else{
    echo "<span class='text-danger small'>Quotation not created for Selection.&nbsp;</span>";
}
?>