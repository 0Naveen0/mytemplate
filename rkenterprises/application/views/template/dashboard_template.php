<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="<?php echo '/exameasy/assets/css/bootstrap.min.css'; ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo '/exameasy/assets/css/bootstrap-theme.min.css'; ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo '/exameasy/assets/css/css2.css'; ?>" type="text/css"> 
    </head>
    <body>
        <!--  -->
        <div class="container">
            <!---->
            <div class="row">

                <div class="col-sm-11">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php
                            //echo "This is for secondary menu.";
                            echo $secondarymenu;
                            ?>
                        </div>
                        <!--
                        <div class="col-sm-3">
                            <div  id="social">
                        <?php
                        //echo $secondarymenu;
                        ?>
                            </div> 
                        </div>
                        -->
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <?php
                            echo $header;
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            <!-- include menu navigator here -->   
                            <?php
                            echo $primarymenu;
                            ?>
                        </div>
                        <div class="col-sm-3">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div id="aside">               
                                <?php
                                //echo $social;
                                echo "This is for sidebar1.";
                                ?>
                            </div> 
                        </div>
                        <div class="col-sm-6">
                            <div id="main">
                                <?php
                                echo $message;
                                echo $body;
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div id="links">
                                <?php
                                echo "This is for sidebar2.";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row" style= "background:cyan;">
                        <div class="col-sm-3">
                            <?php
                            echo $footer1;
                            ?>
                        </div>
                        <div class="col-sm-3">
                            <?php
                            echo $footer2;
                            ?>
                        </div>
                        <div class="col-sm-3">
                            <?php
                            echo $footer3;
                            ?>
                        </div>
                        <div class="col-sm-3">
                            <?php
                            echo $footer4;
                            ?>
                        </div>
                    </div>
                    <div class="row cyan text-center">
                        <div class="col-sm-12">
                            <div class="">
                                <?php
                                echo $copyright;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <?php
                    // echo "This is for secondary menu.";
                    echo $social;
                    ?>
                </div>
            </div>
        </div>
        <script src="<?php echo '/exameasy/assets/js/jquery.min.js'; ?>"></script>
        <script src="<?php echo '/exameasy/assets/js/bootstrap.min.js'; ?>"></script>
        <script src="<?php echo '/exameasy/assets/js/moment.js'; ?>"></script>
        <script src="<?php echo '/exameasy/assets/js/datetimepicker.js'; ?>"></script>
        <script>
            $(document).ready(function () {


                $("#myCarousel").carousel('cycle');



$('[name="createCaptcha"]').on('click', function (e) {


                    e.preventDefault();
                    //var selection = ($('#examlist').val());
                    var url = '/exameasy/index.php/home/createCaptcha?display=y';
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
                
                
                $("#socialNav").affix({
                    offset: {
                        top: 60, bottom: function () {
                            return (this.bottom =
                                    $('.bs-footer').outerHeight(true))
                        }
                    }
                });
                
                 $('#datepicker').datetimepicker({
                 format: 'DD-MM-YYYY',
                 icons: {
                 time: 'fa fa-clock-o',
                 date: 'fa fa-calender',
                 up: 'fa fa-arrow-up',
                 down: 'fa fa-arrow-down'
                 }
                 });
                 
                 //$('#fathername').val("hello");
                 

            });
        </script> 
    </body>
</html>