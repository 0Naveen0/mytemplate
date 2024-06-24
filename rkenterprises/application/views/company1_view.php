<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$brandname='Piaggio';
$modelname=array('APE AUTO +','APE AUTO DX','APE CITY','APE CITY XTRA','APE XTRA LDX','PORTER 700','PORTER 1000');
$image1=array('1a','2a','3a','4a','5a','6a','7a');
$image2=array('1b','2b','3b','4b','5b','6b','7b');
$image3=array('1c','2c','3c','4c','5c','6c','7c');
$image4=array('1d','2d','3d','4d','5d','6d','7d');


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
        <div class="col-sm-6 ">';
        
echo '<a href="'. base_url().'assets/images/company1/'.$image1[$i].'.jpg'.'" target="_blank"> '; 
echo '<img class="img img-responsive" src="'.base_url().'assets/images/company1/'.$image1[$i].'.jpg'.'" alt="Auto image"/>';
         
 echo '        </a>
        </div>
        <div class="col-sm-6 ">';
        
echo '<a href="'. base_url().'assets/images/company1/'.$image2[$i].'.jpg'.'" target="_blank"> '; 
echo '<img class="img img-responsive" src="'.base_url().'assets/images/company1/'.$image2[$i].'.jpg'.'" alt="Auto image"/>';
         
 echo '        </a>
        </div>
        </div>
        
        
         <div class="row">
        <div class="col-sm-12 text-center">
           &nbsp;
        </div>
        </div>
        
        
        
        
         <div class="row">
        <div class="col-sm-6 ">';
        
echo '<a href="'. base_url().'assets/images/company1/'.$image3[$i].'.jpg'.'" target="_blank"> '; 
echo '<img class="img img-responsive" src="'.base_url().'assets/images/company1/'.$image3[$i].'.jpg'.'" alt="Auto image"/>';
         
 echo '        </a>
        </div>
        <div class="col-sm-6 ">';
        
echo '<a href="'. base_url().'assets/images/company1/'.$image4[$i].'.jpg'.'" target="_blank"> '; 
echo '<img class="img img-responsive" src="'.base_url().'assets/images/company1/'.$image4[$i].'.jpg'.'" alt="Auto image"/>';
         
 echo '        </a>
        </div>
        </div>
        
        
      
      
      </div>
    </div>
  </div>';
  

    
}


?>



</div>

<!-- End of Accordion-->


