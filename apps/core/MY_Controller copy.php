<?php

/*
 * ***************************************************************
 * Script : 
 * Version : 
 * Date :
 * Author : Pudyasto Adi W.
 * Email : mr.pudyasto@gmail.com
 * Description : 
 * ***************************************************************
 */

/**
 * Description of MY_Controller
 *
 * @author pudyasto
 */
class MY_Controller extends CI_Controller{  
    var $menu_app = "";
    var $msg_active = "";
    var $msg_main = "";
    var $msg_detail = "";
    
    public function __construct()
    {
        parent::__construct();  
        if (!$this->auth->loggedin()) {
            redirect('login');
        }
        $this->load->model('login/user_model');
        $userid = $this->session->userdata('auth_user');
        $user = $this->user_model->get($userid);
        $this->session->set_userdata('level',  $user['level']);
        $this->session->set_userdata('username',  $user['username']);
        // $username = $this->session->userdata('username');
        // $personid = $this->session->userdata('personid');

        // if(!$logged_in){
        //     redirect($this->apps->ssoapp . '/access?url=' . $this->apps->curPageURL());
        //     exit;
        // }

//        
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
 
    }
}
