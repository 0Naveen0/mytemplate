<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<?php 
/*
//echo $message;
$i=0;$j=0;

$modalList=array();
$modalList[$j++]=['modalid'=>1,'modalname'=>'APE AR 3+1'];
$modalList[$j++]=['modalid'=>2,'modalname'=>'APE LD'];

$branchList=array();
$branchList[$i++]=['branchid'=>100109,'branchname'=>'Rakesh'];
$branchList[$i++]=['branchid'=>100110,'branchname'=>'Showroom'];

$branchList[$j++]=['modalid'=>2,'modalname'=>'APE LD'];

$e=array('executiveid'=>1,'executivename'=>"Kundan");
$executiveList[0]=$e;
$f=array('financerid'=>1,'financername'=>"M&M");
$financerList[0]=$f;
$customername="Anil Kumar";
$chasisno="MBX0003BFWM123456";
$cibil="OK";
$cibildate="2019-01-16";
$agreementdate="2019-01-20";
$agreement="OK";
$document="OK";
$financerid=1;
$executiveid=1;
$do="Released";
$dodate="2019-01-26";
$pdd="Submitted";
$loanamount=205000;
$doamount=202500;
$pdddate="2019-02-05";
$paymentdate="2019-02-15";
$payment="Released";
*/
?>
<div class="d-print-none">
    <form role="form" class="form-horizontal small" method='post' id="selectChasisFinancefrm">
        <fieldset>  
            
           
            <legend class='text-center small'>Update Finance Status</legend>
            
            
            
            
            
          

 <div class="form-group small"> 

                 <label for="chasisno" class="col-sm-4 control-label">Chasis No|Customer Name</label>
                <div class="col-sm-6 small">  
                
                <select name='chasisno' class="form-control">
                    <option value="NA">Select</option>
                    <?php
                    foreach($chasisList as $chasis){
                        
                        echo '<option value="'.$chasis['financeid'].'">'.$chasis['chasisno'].'&nbsp;|&nbsp;'.$chasis['customername'].'</option>';
                    }
                    
                    
                    
                    ?>
                    
                    
                </select>
              
               
                </div>
                <div class="col-sm-2">
                    
                    <button  class="btn btn-default " name="searchChasisBtn" value='searchChasis'>Show</button>&nbsp;
                    
                </div>

            </div>
     
            
        </fieldset>
    </form>
    <hr/>
</div>

<div class="d-print-none" name="chasisFinanceContent"></div>





