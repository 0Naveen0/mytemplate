<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');


 
///*
//echo $message;
$i=0;
$j=0;
//$currentinvoiceno=925;

//$modalList=array();
//$modalList[$j++]=['modalid'=>1,'modalname'=>'APE AR 3+1'];
//$modalList[$j++]=['modalid'=>2,'modalname'=>'APE LD'];

//$branchList=array();
//$branchList[$i++]=['branchid'=>100109,'branchname'=>'Rakesh'];
//$branchList[$i++]=['branchid'=>100110,'branchname'=>'Showroom'];
//$currentinvoiceno=925;
//$branchList[$j++]=['modalid'=>2,'modalname'=>'APE LD'];
//*/

$i=0;
//$salesmanList=array();
//$salesmanList[$i++]=['salesmanid'=>100101,'salesmanname'=>'Rakesh'];
//$salesmanList[$i++]=['salesmanid'=>100102,'salesmanname'=>'Pramod Yadav'];
?>

<div class="d-print-none">
    
    <div >         
        <div class='row'>
		    <div class="col-sm-2 small">
                <button  class="btn btn-default " name="addInvoiceBtn" data-toggle='modal' data-target='#invoiceAddModal' value='invoiceAdd' >
					<span class="glyphicon glyphicon-plus" aria-hidden="true" aria-label="Add"></span>Add New
				</button>
            </div>
            <form role="form" class="form-horizontal small pull-right" method='post' id="searchInvoicefrm">
                <fieldset> 
                    <div class="col-sm-4 small">      
                        <select class="form-control" name="criteriaSearchInvoice">
                       
                            <option value="byinvoicenumber" selected>Invoice No.</option>
                            <option value="bychasisno">Chassis No.</option>                       
                      
                        </select>
                    </div>
                    <div class="col-sm-4 small">

                        <input type="text" class="form-control" id="searchText" name='searchText'  required>
                    </div>
                    <div class="col-sm-2 small">
                        <button type='submit' class="btn btn-default " name="searchInvoiceBtn" value='invoiceSearch' >
						    <span class="glyphicon glyphicon-search" aria-hidden="true" aria-label="Search">
							</span>
						</button>
                    </div>
                </fieldset>
			</form>
        </div>    
    </div>  
</div>

<div name="invoiceContent">
<?php
$notfound="<div class='error text-danger'>No Record Found</div>";
if(count($invoicedata)&& $invoicedata[0]['invoiceid']!==""){
 echo "<div class='small'><div class='small'><div class='table-responsive small'>";
  echo          "<table class='table table-striped table-bordered small dataTable' id='searchInvoiceTable' name='searchInvoiceTable'><thead>";
  echo '<tr><th colspan="11" class="text-center">Invoice List</th></tr>';
  echo '<tr><th>ID</th><th>Invoice No</th>';
 echo '<th>Chassis</th>';
 echo '<th>Date</th><th>Area</th>';
 echo '<th>Salesman</th>';
 echo '<th>Finance</th><th>Ex-Showroom</th><th>Tax</th><th>Action</th>
 </tr></thead><tbody>';
  foreach($invoicedata as $row){
	  if($row['companyid']==="1001"){$area="Madhubani";}elseif($row['companyid']==="1002"){$area="Jhanjharpur";}else{$area="Madhubani";}
  echo "<tr><td>" .$row['invoiceid'] . "</td><td>" .$row['invoiceno'] . "</td>";
  echo "<td>" . $row['chasisno'] ."</td>";
  echo "<td>" . $row['invoicedate'] .
                       "</td><td>" . $area . "</td>";
   echo "<td>" . $row['salesmanname'] . "&comma;".$row['salesmanid'] ."</td>";
   echo "<td>" . $row['hypothecationname'] . "&comma;".$row['hypothecation'] ."</td>";
   echo "<td>" . $row['basicprice'] ."</td>";
   echo "<td>" .$row['taxid'] ."</td>";
   echo "<td><button type='button' class='btn btn-default btn-xs' name='editInvoiceBtn' data-toggle='modal' data-target='#invoiceModifyModal' data-invoiceid=".$row['invoiceid']." value=".$row['invoiceid']."><span class='glyphicon glyphicon-pencil'></span></button>
                       
                       <button type='button' class='btn btn-default btn-xs' name='deleteInvoiceBtn' value=".$row['invoiceid']."><span class='glyphicon glyphicon-trash'></span></button>
                        
                       </td></tr>";
 
  }
    echo "</tbody></table></div></div></div>";
}else {
    echo $notfound;
}

?>

</div>









<!--  ////////Invoice Add Modal Starts Here/////////////////////////////////////////////////////  -->

<div class="modal fade" id="invoiceAddModal" tabindex="-1" role="dialog" aria-labelledby="invoiceAddModalLabel"
  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="invoiceAddModalLabel">Add Invoice</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" class="form-horizontal small " method='post' id="invoiceAddfrm">
	                <fieldset class="small">           
                        <div class="form-group"> 
                            <label for="companySelect" class="col-sm-3 control-label">Dealer</label>
                            <div class="col-sm-3">      
                                <select class="form-control" name="companySelect">
                                    <option value="1001" selected>Madhubani</option>
                                    <!-- <option value="1002" >Jhanjharpur</option> -->                       
                                </select>
                            </div>
                            <label for="invoiveno" class="col-sm-3 control-label">Invoice No.</label>
                            <div class="col-sm-3 ">      
                 	            <input type="number" class="form-control" id="invoiceno" name='invoiceno'  max='9999' min='0' 
								required="required" value="<?php echo $currentinvoiceno;?>" >
                            </div> 
                        </div>
			
			            <div class="form-group"> 
                            <label for="chasisSelect" class="col-sm-3 control-label">Chasis No.</label>
                            <div class="col-sm-4">      
                                <select class="form-control" name="chasisSelect">
                                    <option value="select" selected>-Select-</option>
                                    <?php
                                        $i = 0;
                                        $j = 0;
                                        foreach ($chasisList as $chasis) {
                                        //echo $subject." </br>";
                           
                                            echo '<option value="' . $chasis['vehicleid'] . '">' . $chasis['chasisno'] . '</option>';
                            
                                        }
                                    ?>
                                </select>
                            </div>
				            <label for="invoicedate" class="col-sm-1 control-label small">Date</label>				
                            <div class="col-sm-4">
                            <!--   <input type="date" class="form-control"  name='invoicedate' required="required" value="<?php //echo date('Y-m-d');?>">-->
                                <div id="invoicedate" class="input-group date datepicker"  data-date-format="yyyy-mm-dd" >
                                    <input type="text" class="form-control"  name='invoicedate' required="required" value="<?php echo date('Y-m-d');?>">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
			            </div>            
            
			            <div class="form-group">
                            <label for="salesman" class="col-sm-3 control-label">Salesman</label>
                            <div class="col-sm-3 small">
					            <select class="form-control" name="salesman" >
                                    <option value="select" selected>-Select-</option>
                                    <?php
                                        $i = 0;
                                        $j = 0;
                                        //echo var_dump($salesmanList);
                                        foreach ($salesmanlist as $salesman) {
                                            //echo $subject." </br>";
                                            //echo var_dump($salesman);
                                            echo '<option value="' . $salesman['salesmanid'] . '">' . $salesman['salesmanname'] . '</option>';
                                            $i++;
                            
                                        }
                                    ?>
                                </select>
                 
                            </div>
                            <label for="financer" class="col-sm-3 control-label">Financer</label>
                            <div class="col-sm-3 small">
                                <select class="form-control" name="financer" >
                                    <option value="select" selected>-Select-</option>
                                    <?php
                       
                                        foreach ($financerList as $financer) {
                                            //echo $subject." </br>";
                                            $selected=($financerid===$financer['financerid'] )?"selected":"";
                           
                                            echo '<option value="' . $financer['financerid'] . '" '.$selected.' >' . $financer['financername'] . '</option>';
                            
                                        }
                                    ?>
                                </select>
                   
                            </div>  
               
                        </div>
			           
                        <div class="form-group"> 
                            <label for="orp" class="col-sm-3 control-label">On Road</label>
                            <div class="col-sm-3 ">      
                 	            <input type="number" class="form-control" id="orp" name='orp' step=.01 min=0  >
                            </div> 
 
                            <label for="price" class="col-sm-3 control-label ">Ex-Showroom</label>
                            <div class="col-sm-3 ">      
                 	            <input type="number" class="form-control" id="saleprice" name='saleprice' step=.01 min=0 required="required" >
                            </div>	
	                    </div>
	
	                    <div class="form-group"> 
 
                            <label for="loan" class="col-sm-3 control-label">Loan</label>
                            <div class="col-sm-3 ">      
                 	            <input type="number" class="form-control" id="loan" name='loan' max=999999 min=0  >
                            </div>
                            <label for="processing" class="col-sm-3 control-label">Finance Charge</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="processing" name='processing' max=99999 min=0 >
                            </div>
	                    </div>		
			
             <div class="form-group">
                <label for="taxid" class="col-sm-3 control-label">GST</label>
                <div class="col-sm-3 small">
					<select class="form-control" name="taxid" >
                        
                        <?php
                        $i = 0;
                        $j = 0;
                        //echo var_dump($taxList);
                        foreach ($taxList as $tax) {
                            //echo $subject." </br>";
                           //echo var_dump($salesman);
                           $selection=$tax['taxslab']==="GST28%S"?"selected":"";
                                echo '<option value="' . $tax['taxid'] . '" ' .$selection.'>' . $tax['taxslab'] . '</option>';
                                $i++;
                            
                        }
                        ?>
                    </select>
                 
                </div>
                  
               
            </div>          
            
           
            <div class="form-group">
               
                <div class="col-sm-9"></div>
                <div class="col-sm-3">
                    <input type="reset" class="btn btn-default pull-right" name="resetBtn" value="Clear">
                    <button type='button' class="btn btn-default " name="addInvoiceToDbBtn" value='addInvoice'>Save</button>&nbsp;
                    
                </div>
            </div>
        </fieldset>
    </form>
	</div>
<div class="modal-footer">
		
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>	
</div>
</div>
</div>


<!-- ////////Invoice Add Modal Ends Here///////////////////////////////////////////////////// -->





<!--////////Invoice Update Modal Starts Here/////////////////////////////////////////////////////-->

<div class="modal fade" id="invoiceModifyModal" tabindex="-1" role="dialog" aria-labelledby="invoiceModifyModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="invoiceModifyModalLabel">Edit Invoice</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div class="modal-body">

    <form role="form" class="form-horizontal small " method='post' id="invoiceEditfrm">
	<fieldset>
	<div class="form-group small">
		<label  class="col-sm-2 control-label">Chasis No.</label>
	    <label  class="col-sm-4 control-label" name="showchassisno"></label>
		<label  class="col-sm-2 control-label">Inv. No.</label>
	    <label  class="col-sm-4 control-label" name="showinvoiceno"></label>
	</div>
	<div class="form-group">
	
	<label for="invoicedatetochange" class="col-sm-2 control-label small">Date</label>				
                            <div class="col-sm-4">
                           
                                <div id="invoicedatetochange" class="input-group date datepicker"  data-date-format="yyyy-mm-dd" >
                                    <input type="text" class="form-control"  name='invoicedatetochange' required="required" >
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
							
							
							<label for="salesmantochange" class="col-sm-2 control-label small">Salesman</label>
                            <div class="col-sm-4 small">
					            <select class="form-control" name="salesmantochange" >
                                    <option value="select" selected>-Select-</option>
                                    <?php
                                        $i = 0;
                                        $j = 0;
                                        //echo var_dump($salesmanList);
                                        foreach ($salesmanlist as $salesman) {
                                            //echo $subject." </br>";
                                            //echo var_dump($salesman);
                                            echo '<option value="' . $salesman['salesmanid'] . '">' . $salesman['salesmanname'] . '</option>';
                                            $i++;
                            
                                        }
                                    ?>
                                </select>
                 
                            </div>
							</div>
							
	
	 <div class="form-group small">
                            
                            <label for="financertochange" class="col-sm-2 control-label">Financer</label>
                            <div class="col-sm-4 small">
                                <select class="form-control" name="financertochange" >
                                    <option value="select" selected>-Select-</option>
                                    <?php
                       
                                        foreach ($financerList as $financer) {
                                            //echo $subject." </br>";
                                           // $selected=($financerid===$financer['financerid'] )?"selected":"";
										   //$selected="";
                           
                                            echo '<option value="' . $financer['financerid'] .'" >' . $financer['financername'] . '</option>';
                            
                                        }
                                    ?>
                                </select>
                   
                            </div>  
							<label for="salepricetochange" class="col-sm-2 control-label ">ExShowroom</label>
                            <div class="col-sm-4 ">      
                 	            <input type="number" class="form-control" id="salepricetochange" name='salepricetochange' step=.01 min=0 required="required" >
                            </div>	
               
                        </div>
			           
	
	
	
	
	
	 <div class="form-group">
                <label for="taxidtochange" class="col-sm-2 control-label small">GST</label>
                <div class="col-sm-4 small">
					<select class="form-control" name="taxidtochange" >
                        
                        <?php
                        $i = 0;
                        $j = 0;
                        //echo var_dump($taxList);
                        foreach ($taxList as $tax) {
                            //echo $subject." </br>";
                           //echo var_dump($salesman);
                           $selection=$tax['taxslab']==="GST28%S"?"selected":"";
                                echo '<option value="' . $tax['taxid'] . '" ' .$selection.'>' . $tax['taxslab'] . '</option>';
                                $i++;
                            
                        }
                        ?>
                    </select>
                 
                </div>
				
				<div class="col-sm-6">
                    
                    <button type='button' class="btn btn-default " name="updateInvoiceDataBtn" value='updateInvoice'>Save</button>&nbsp;
                    
                </div>
                  
               
            </div>  
			
			
			</fieldset>
    </form>
	</div>
<div class="modal-footer">
		
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>	
</div>
</div>
</div>

<!--////////Invoice Update Modal Ends Here/////////////////////////////////////////////////////-->