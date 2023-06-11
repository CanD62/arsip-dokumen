<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function index() {
        
        // user is already logged in
        if ($this->auth->loggedin()) {
            redirect('home');
        }
        
        $this->data['error'] = '';
        
        // form submitted
        if ($this->input->post('username') && $this->input->post('password')) {
            $remember = $this->input->post('remember') ? TRUE : FALSE;
            
            // get user from database
            $this->load->model('user_model');
            $user = $this->user_model->get('username', $this->input->post('username'));
            
            if ($user) {
                // compare passwords
                if (password_verify($this->input->post('password'), $user['password'])) {
                    // mark user as logged in
                    $this->auth->login($user['user_id'], $remember);
                    redirect('home');
                } else {
                    $this->data['error'] = 'Wrong password';
                }
            } else {
                $this->data['error'] = 'User does not exist';
            }
        }
        
        // show login form
        $this->template
        ->title('Masuk - Arsip Dokumen')
        ->set_layout('home')
        ->build('login', $this->data);
    }
}
