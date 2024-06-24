<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of templateClass
 *
 * @author Naveen Kamal 
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class template {
    //put your code here
    var $ci;
    function __construct() {
        $this->ci = & get_instance();
    }
    function load($tpl_view,string $body_view = null,$primarymenu_view
            ,$secondarymenu_view,$message,$data = null) {
      /* 
        echo $body_view.'+'.$tpl_view;
        echo '<br/>'.APPPATH . 'views/' . $tpl_view . '/' . $body_view;
        echo '<br/>'.APPPATH . 'views/' . $tpl_view . '/' . $body_view.'.php';
        echo '<br/>'.APPPATH . 'views/' . $body_view;
        echo '<br/>'.APPPATH . 'views/' . $body_view . '.php';
     */
        if (!is_null($body_view)) {
            if (file_exists(APPPATH . 'views/' . $tpl_view . '/' . $body_view)) {
                $body_view_path = $tpl_view . '/' . $body_view;
            } else if (file_exists(APPPATH . 'views/' . $tpl_view . '/' . $body_view.'.php')) {
                $body_view_path = $tpl_view . '/' . $body_view . '.php';
            } else if (file_exists(APPPATH . 'views/' . $body_view)) {
                $body_view_path = $body_view;
            } else if (file_exists(APPPATH . 'views/' . $body_view . '.php')) {
                $body_view_path = $body_view . '.php';
            } else {
                show_error('Unable to load the requested file:' . $tpl_view.'+'.$body_view);
            }
            $body=$this->ci->load->view($body_view_path,$data,  \TRUE);
            //$primarymenu_view_path=$menu.
            //$menu=
            if(is_null($data)){
                $data=array('body'=>$body);
            }else if(is_array($data)){
                $data['body']=$body;
            }else if(is_object($data)){
                $data->body=$body;
            }
        }
        $primarymenu_view_path='header/primary_menu/'.$primarymenu_view.'.php';
        $primarymenu=$this->ci->load->view($primarymenu_view_path,$data,\TRUE);
        $secondarymenu_view_path='header/secondary_menu/'.$secondarymenu_view.'.php';
        $secondarymenu=$this->ci->load->view($secondarymenu_view_path,$data,\TRUE);
        $header_view_path='header/'.'header.php';
        $header=$this->ci->load->view($header_view_path,$data,\TRUE);
        $copyright_view_path='footer/'.'copyright.php';
        $copyright=$this->ci->load->view($copyright_view_path,$data,\TRUE);
        $footer1_view_path='footer/'.'footer1.php';
        $footer1=$this->ci->load->view($footer1_view_path,$data,\TRUE);
        $footer2_view_path='footer/'.'footer2.php';
        $footer2=$this->ci->load->view($footer2_view_path,$data,\TRUE);
        $footer3_view_path='footer/'.'footer3.php';
        $footer3=$this->ci->load->view($footer3_view_path,$data,\TRUE);
        $footer4_view_path='footer/'.'footer4.php';
        $footer4=$this->ci->load->view($footer4_view_path,$data,\TRUE);
        $social_view_path='social_view.php';
        $social=$this->ci->load->view($social_view_path,$data,\TRUE);
        $sidebarLeft_view_path='body/sidebar_left/sidebarleft_view.php';
        $sidebarLeft=$this->ci->load->view($sidebarLeft_view_path,$data,\TRUE);
        $sidebarRight_view_path='body/sidebar_right/sidebarright_view.php';
        $sidebarRight=$this->ci->load->view($sidebarRight_view_path,$data,\TRUE);        
//$message=$this->session->userdata('message');
        if(is_null($data)){
                $data=['footer1'=>$footer1,'footer2'=>$footer2,'footer3'=>$footer3,
                    'footer4'=>$footer4,'primarymenu'=>$primarymenu,'social'=>$social,
                    'secondarymenu'=>$secondarymenu,'header'=>$header,
                    'copyright'=>$copyright,'message'=>$message,'sidebarleft'=>$sidebarLeft,'sidebarright'=>$sidebarRight];
            }else if(is_array($data)){
                $data['primarymenu']=$primarymenu;
                $data['secondarymenu']=$secondarymenu;
                $data['header']=$header;
                $data['copyright']=$copyright;
                $data['footer1']=$footer1;
                $data['footer2']=$footer2;
                $data['footer3']=$footer3;
                $data['footer4']=$footer4;
                $data['social']=$social;
                $data['message']=$message;
                $data['sidebarleft']=$sidebarLeft;
                $data['sidebarright']=$sidebarRight;
            }else if(is_object($data)){
                $data->primarymenu=$primarymenu;
                $data->secondarymenu=$secondarymenu;
                $data->header=$header;
                $data->copyright=$copyright;
                $data->footer1=$footer1;
                $data->footer2=$footer2;
                $data->footer3=$footer3;
                $data->footer4=$footer4;
                $data->social=$social;
                $data->message=$message;
                $data->sidebarleft=$sidebarLeft;
                $data->sidebarright=$sidebarRight;
                
            }
        
        $this->ci->load->view('template/'.$tpl_view,$data);
    }
}
?>