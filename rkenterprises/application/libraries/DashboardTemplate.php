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
class dashboardtemplate {
    //put your code here
    var $ci;
    function __construct() {
        $this->ci = & get_instance();
    }
    function load($tpl_view, $body_view = null,$primarymenu_view
            ,$secondarymenu_view,$message,$data = null) {
     
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
        
        
        
        if(is_null($data)){
                $data=['primarymenu'=>$primarymenu,
                    'secondarymenu'=>$secondarymenu,
                    'message'=>$message];
            }else if(is_array($data)){
                $data['primarymenu']=$primarymenu;
                $data['secondarymenu']=$secondarymenu;
                $data['message']=$message;
                
                
                
            }else if(is_object($data)){
                $data->primarymenu=$primarymenu;
                $data->secondarymenu=$secondarymenu;
                $data->message=$message;
                
                
                
                
            }
        
        $this->ci->load->view('template/'.$tpl_view,$data);
    }
}
?>