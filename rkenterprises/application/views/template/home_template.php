<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Automobile And Furniture in Madhubani">
        <meta name="keywords" content="Shankar And Sons, Mayuri Dealer Madhubani">
        <meta name="author" content="Naveen Kamal">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>
          
        <!-- 
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		
    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" media="all">
    
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    -->
		<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>" type="text/css" media="all">
		<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-theme.min.css'; ?>" type="text/css" media="all">
       
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/css2.css'; ?>" type="text/css" media="all"> 
         
         <link rel="stylesheet" href=" <?php echo base_url().'assets/css/font-awesome.min.css'; ?>" type="text/css" media="all">
         <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-print.css'; ?>" type="text/css" media="print">
         <link href="<?php echo base_url().'assets/css/datepicker.css'; ?>" rel="stylesheet" type="text/css" />
         <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.css'; ?>" rel="stylesheet" type="text/css" />
         <!--
          <link href="https://cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
      
         <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.css"/>
         
         
        

         
   <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="<?php //echo base_url().'assets/css/bootstrap-datetimepicker.min.css'; ?>" type="text/css" media="all">   
-->
    </head>
    <body>
        <!--  -->
        <div class="container">
            <!---->
            <div class="row ">

                <div class="col-xs-12 col-sm-12 ">
                    <div class="row noprint">
                        <div class="col-sm-12 col-xs-12">
                            <?php
                            //echo "This is for secondary menu.";
                            echo $secondarymenu;
                            ?>
                        </div>
                        
                    </div>
                    <div class="row noprint">
                        <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12 noprint">
                            <?php
                            echo $header;
                            ?>
                        </div>
                    </div>
                    <div class="row noprint">
                        <div class="col-sm-9 col-xs-12">
                            <!-- include menu navigator here -->   
                            <?php
                            echo $primarymenu;
                            ?>
                        </div>
                        <div class="col-sm-3 col-xs-3">
                        </div>
                    </div>
                    <div class="row ">
                        <!--
                        <div class="col-sm-2 col-xs-12 noprint">
                            <div id="aside">               
                                <?php
                             // echo $sidebarleft;
                                //echo "This is for sidebar1.";
                                
                                ?>
                                
                            </div> 
                        </div>-->
                        <div class="col-sm-12 col-xs-12">
                            <div id="main">
                                <?php
                                echo $message;
                                echo $body;
                                ?>
                            </div>
                        </div>
                         <!--
                        <div class="col-sm-2 col-xs-12 noprint">
                            <div id="links">
                                <?php
                                //echo $sidebarright;
                                
//echo "This is for sidebar2.";
                                ?>
                            </div>
                        </div>-->
                    </div>
                    <div class="row noprint" style= "background:cyan;">
                        <div class="col-sm-3 col-xs-3">
                            <?php
                            echo $footer1;
                            ?>
                        </div>
                        <div class="col-sm-3 col-xs-3">
                            <?php
                            echo $footer2;
                            ?>
                        </div>
                        <div class="col-sm-3 col-xs-3">
                            <?php
                            echo $footer3;
                            ?>
                        </div>
                        <div class="col-sm-3 col-xs-3">
                            <?php
                            echo $footer4;
                            ?>
                        </div>
                    </div>
                    <div class="row cyan noprint">
                      <!--  <div class="col-sm-12 col-xs-12">-->
                            
                                <?php
                                echo $copyright;
                                ?>
                           
                       <!-- </div>-->
                    </div>
                </div>
                <div class="col-sm-0 col-xs-0 noprint">
                    <?php
                    // echo "This is for secondary menu.";
                    echo $social;
                    ?>
                </div>
            </div>
        </div>
      <!-- 
       <script
  src="https://code.jquery.com/jquery-3.1.0.min.js"
  integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="
  crossorigin="anonymous"></script> -->
    <script src="<?php echo base_url().'assets/js/jquery.min.js'; ?>"></script>   
        
       <!--   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      --> <script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>
        
     <script src="<?php echo base_url().'assets/js/verification.js'; ?>"></script>
      
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
     
       <script src="https://cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>

<script src="https://cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.js"></script>

         
         
<!--
<script src="<?php //echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>
<script src="<?php //echo base_url().'assets/js/moment.js'; ?>"></script>
        <script src="<?php //echo base_url().'assets/js/datetimepicker.js'; ?>"></script>
<script src="  https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script> 
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.js"></script>

 <script  src="https://code.jquery.com/jquery-3.3.1.min.js"  ></script>
  <script src="<?php //echo base_url().'assets/js/jquery.min.js'; ?>"></script>
 <script src="<?php //echo base_url().'assets/js/bootstrap-datetimepicker.min.js'; ?>"></script>
 
-->        
        
        <script>
            $(document).ready(function () {

/*
                $("#myCarousel").carousel('cycle');



$('[name="createCaptcha"]').on('click', function (e) {


                    e.preventDefault();
                    //var selection = ($('#examlist').val());
                    var url = '/apoorvatraders/index.php/home/createCaptcha?display=y';
                    $.ajax({
                        type: 'GET',
                        url: url,
                        timeout: 2000,
                        success: function (data) {
                            //var image=data[0];
                            $('#captchaImage').html(data);
                        }

                    });
                });



                $('body,input').on('change','[name="salutation"]', function (e) {
                    e.preventDefault();
                    var salutation = $('[name="salutation"]').val();
                    if (salutation === 'daughter') {
                        //alert(salutation);
                        $('#femaleRadio').prop('checked', 'TRUE');
                        //$('#femaleRadio').
                    }
                    else if (salutation === 'son') {
                        // alert(salutation);
                        $('#maleRadio').prop('checked', 'TRUE');
                    }
                    else if (salutation === 'other') {
                        //alert(salutation);
                        $('#otherRadio').prop('checked', 'TRUE');
                    }

                });
   */             
                
                $("#socialNav").affix({
                    offset: {
                        top: 60, bottom: function () {
                            return (this.bottom =
                                    $('.bs-footer').outerHeight(true))
                        }
                    }
                });
                
                /*
                
                 $('#datepicker').datetimepicker({
                 format: 'DD-MM-YYYY',
                 icons: {
                 time: 'fa fa-clock-o',
                 date: 'fa fa-calender',
                 up: 'fa fa-arrow-up',
                 down: 'fa fa-arrow-down'
                 }
                 });
                 */
                 
                 //$('#fathername').val("hello");
                 

            });
        </script> 
		<script src="<?php echo base_url().'assets/js/exam.js'; ?>"></script>
    </body>
</html>