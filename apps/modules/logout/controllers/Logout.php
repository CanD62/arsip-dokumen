<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Logout extends CI_Controller {
    
    public function index() {
        
        $this->auth->logout();
        redirect('login');
    }

}

/* End of file logout.php */
/* Location: ./application/controllers/logout.php */