<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
error_reporting(E_ALL & ~ E_NOTICE);
$this->load->helper('textlocal.class');
//require ('./apoorvatraders/assets/textlocal.class.php');
//class Otp extends CI_Controller {
    class Otp extends MY_Controller {
    public function index() {
        
       echo "I am in";
       $_SESSION['session_otp'] = $otp;
       exit();
      // $this->processMobileVerification();
    }
    
    
   



    function processMobileVerification()
    {
        switch ($_POST["action"]) {
            case "send_otp":
                
                $mobile_number = $_POST['mobile_number'];
                
                $apiKey = urlencode('2/Tmf0sd9Wc-MdA8glP6yxV3vK57yeGgGMmvROfRgS');
                $Textlocal = new Textlocal(false, false, $apiKey);
                
                $numbers = array(
                    $mobile_number
                );
                $sender = 'Apoorva Traders';
                $otp = rand(10000, 99999);
                $_SESSION['session_otp'] = $otp;
                $message = "Your Five Digit OTP is " . $otp;
                
                try{
                    $response = $Textlocal->sendSms($numbers, $message, $sender);
                    require_once ("verification-form.php");
                    exit();
                }catch(Exception $e){
                    die('Error: '.$e->getMessage());
                }
                break;
                
            case "verify_otp":
                $otp = $_POST['otp'];
                
                if ($otp == $_SESSION['session_otp']) {
                    unset($_SESSION['session_otp']);
                    echo json_encode(array("type"=>"success", "message"=>"Your mobile number is verified!"));
                } else {
                    echo json_encode(array("type"=>"error", "message"=>"Mobile number verification failed"));
                }
                break;
        }
    }
}
$otp = new Otp();

    
    
    
    
