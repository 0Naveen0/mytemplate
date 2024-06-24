<?php defined('BASEPATH') OR exit('No direct script access allowed.');

  function createMessage($message, $messageType) {
        if (!($messageType === 'success' || $messageType === 'warning' || $messageType === 'danger' || $messageType === 'info'))
            $messageType = 'info';
        $messageReady = "<p class='alert alert-" . $messageType . " alert-dismissable center-block'>"
                . " <button type='button' class='close' data-dismiss='alert' "
                . " area-hidden='true'>&times;</button>" . $message . "</p>";
        //echo $messageReady;
        return $messageReady;
    }
//********************************Change Amount in Words**************************************    
     function Show_Amount_In_Words($num) {
  //global $ones, $tens, $triplets;
   $ones =array('',' One',' Two',' Three',' Four',' Five',' Six',' Seven',' Eight',' Nine',' Ten',' Eleven',' Twelve',' Thirteen',' Fourteen',' Fifteen',' Sixteen',' Seventeen',' Eighteen',' Nineteen');
$tens = array('','',' Twenty',' Thirty',' Fourty',' Fifty',' Sixty',' Seventy',' Eighty',' Ninety',);
$triplets = array('',' Thousand',' Lakh',' Crore',' Arab',' Kharab');
$str ="";
//echo $num;

//$num =(int)$num;
$th= (int)($num/1000); 
$x = (int)($num/100) %10;
$fo= explode('.',$num);

if($fo[0] !=null){
$y=(int) substr($fo[0],-2);

}else{
    $y=0;
}

if($x > 0){
    $str =$ones[$x].' Hundred';

}
if($y>0){
if($y<20)
{
 $str .=$ones[$y];

}
else {
    $str .=$tens[(int)($y/10)].$ones[(int)($y%10)];
   }
}
$tri=1;
//echo $str;
while($th!=0){

    $lk = $th%100;
    $th = (int)($th/100);
    $count =$tri;

    if($lk<20){
        if($lk == 0){
        $tri =0;}
        $str = $ones[$lk].$triplets[$tri].$str;
        $tri=$count;
        $tri++;
    }else{
        $str = $tens[(int)($lk/10)].$ones[(int)($lk%10)].$triplets[$tri].$str;
        $tri++;
    }
}
//echo $str;
$num =(float)$num;
if(is_float($num)){
     $fo= (String) $num;
      $fo= explode('.',$fo);
       $fo1= @$fo[1];

}else{
    $fo1 =0;
}
$check = (int) $num;
 if($check !=0){
          return  $str.' And '.forDecimal($fo1).' Only';
    }else{
       return forDecimal($fo1);
    }
}//End function Show_Amount_In_Words


//function for decimal parts
 function forDecimal($num){
   // global $ones,$tens;
    $ones =array('',' One',' Two',' Three',' Four',' Five',' Six',' Seven',' Eight',' Nine',' Ten',' Eleven',' Twelve',' Thirteen',' Fourteen',' Fifteen',' Sixteen',' Seventeen',' Eighteen',' Nineteen');
$tens = array('','',' Twenty',' Thirty',' Fourty',' Fifty',' Sixty',' Seventy',' Eighty',' Ninety',);
    $str="";
    $len =is_null($num)?0:strlen($num);
    if($len==1){
        $num=$num*10;
    }
    $x= $num%100;
    if($x>0){
    if($x<20){
        $str = $ones[$x].' Paise';
    }else{
        $str = $tens[$x/10].$ones[$x%10].' Paise';
    }
    }else{$str='Zero Paise';}
     return $str;
 }  
 
 //******************Send Message***************************
 function sendMessageHelper($numbers,$message){
     $response="";
     if (!is_array($numbers)){
         $response='Invalid $numbers format. Must be an array';
     }else 
		//	throw new Exception('Invalid $numbers format. Must be an array');
		if (empty($message)){
		   $response='Empty message';
		}
		else{
			//throw new Exception('Empty message');
		
     $apiKey = urlencode('2/Tmf0sd9Wc-MdA8glP6yxV3vK57yeGgGMmvROfRgS');
     $sender = urlencode('TXTLCL');
     $message = rawurlencode($message);
     $numbers = implode(',', $numbers);
     $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);
    //$response= var_dump($data);
     // Send the POST request with cURL
      // /*
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
       // */
		}
// Process your response here
     return $response;
     
 }