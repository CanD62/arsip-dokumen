<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends MY_Controller {

    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('home_qry','qry');
        $this->data = array(
            'judul_halaman' => 'Dashboard',
            'msg_detail' => $this->msg_detail,
            'menu_app' => $this->menu_app,
        );
    }

	public function index() {
        
              
        //get current user id
        $id = $this->auth->userid();
        // var_dump($this->session->userdata());
        // get user from database
        $this->load->model('login/user_model');
        $this->data['user'] = $this->user_model->get('user_id', $id);
        
        // echo 'Welcome to the super secret section, ' . $user['username'];
        $this->template
        ->title('Dashboard')
        ->set_layout('main')
        ->build('index', $this->data);
    }

 
}
