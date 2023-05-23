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
        if($this->session->userdata('level') == 1){
        $this->data['jml_admin'] = $this->qry->jml_admin();
        $this->data['jml_pendidik'] = $this->qry->jml_pendidik();
        $this->data['jml_kependidikan'] = $this->qry->jml_kependidikan();
        $this->data['jml_dokumen'] = $this->qry->jml_dokumen();
        $this->data['getDokumen'] = $this->qry->getDokumen();

        $this->template
        ->title('Dashboard')
        ->set_layout('main')
        ->build('index', $this->data);
        } else {
            $this->data['jml_admin'] = $this->qry->jml_admin();
            $this->data['jml_pendidik'] = $this->qry->jml_pendidik();
            $this->data['jml_kependidikan'] = $this->qry->jml_kependidikan();
            $this->data['jml_dokumen'] = $this->qry->jml_dokumen();
            $this->data['getDokumen'] = $this->qry->getDokumen($this->session->userdata('auth_user'));
    
            $this->template
            ->title('Dashboard')
            ->set_layout('main')
            ->build('index2', $this->data);  
        }
    }

 
}
