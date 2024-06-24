<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$brandname='John Deere';
$modelname=array('5045 D','5036 D','5055 E');
$imagename=array('1','2','3');
$imagespecification=array('1s','2s','3s');


$n=count($modelname);



?>
<div class="row">
        <div class="col-sm-12 text-center">
            <h2><?php echo $brandname;?></h2>
        </div>
       
</div>


<!-- Accordion Start-->

<div class="panel-group" id="accordion">

<?php 

for($i=0;$i<$n;$i++){

echo '<div class="panel panel-default">';
echo '<div class="panel-heading">';
echo '<h4 class="panel-title">';
echo '<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'">';
echo $modelname[$i];
echo '</a>';
echo '      </h4>
    </div>
    <div id="collapse'.$i.'" class="panel-collapse collapse">
      <div class="panel-body">
         
           <div class="row">
        <div class="col-sm-12 ">';
        
echo '<a href="'. base_url().'assets/images/company2/'.$imagename[$i].'.jpg'.'" target="_blank"> '; 
echo '<img class="img img-responsive" src="'.base_url().'assets/images/company2/'.$imagename[$i].'.jpg'.'" alt="Tractor image"/>';
         
 echo '        </a>
        </div>
        </div>
        
         <div class="row">
        <div class="col-sm-12 text-center">
           &nbsp;
        </div>
        </div>
        
         <div class="row">
        <div class="col-sm-12 ">';
        
   echo '<a href="'. base_url().'assets/images/company2/'.$imagespecification[$i].'.jpg'.'" target="_blank"> ';
   echo '<img class="img img-responsive" src="'.base_url().'assets/images/company2/'.$imagespecification[$i].'.jpg'.'" alt="Tractor specification"/>';
            
            
echo '            </a>
        </div>
    </div>
         
      
      
      </div>
    </div>
  </div>';
  

    
}


?>



</div>

<!-- End of Accordion-->


