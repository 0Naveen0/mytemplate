<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<header class="noprint">
    <div id="myCarousel" class="carousel slide">
<!-- Carousel indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
<li data-target="#myCarousel" data-slide-to="1"></li>
<li data-target="#myCarousel" data-slide-to="2"></li>
</ol>
<!-- Carousel items -->
<div class="carousel-inner">
<div class="item active">
<img src="<?php echo base_url().'assets/images/banner1.jpg';?>" alt="First slide">
</div>
<div class="item">
<img src="<?php echo base_url().'assets/images/banner2.jpg';?>" alt="Second slide">
</div>
<div class="item">
<img src="<?php echo base_url().'assets/images/banner3.jpg';?>" alt="Third slide">
</div>
</div>
<!-- Carousel nav 

 <img src="<?php echo base_url().'assets/images/banner1.jpg';?>" alt="HomepageBanner" />
-->
<a class="carousel-control left" href="#myCarousel"
data-slide="prev">&lsaquo;</a>
<a class="carousel-control right" href="#myCarousel"
data-slide="next">&rsaquo;</a>
<!--
<div style="text-align:center;">
<input type="button" class="btn start-slide" value="Start">
<input type="button" class="btn pause-slide" value="Pause">
<input type="button" class="btn prev-slide" value="Previous">
<input type="button" class="btn next-slide" value="Next">
    </div>
-->
</div>
   
     
</header> 
