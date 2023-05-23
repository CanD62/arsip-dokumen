<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Users extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_qry', 'qry');

        $this->data = array(
            'judul_halaman' => 'Data Pengguna',
            'save' => site_url('users/save'),
            'update' => site_url('users/update'),
        );
    }

    public function index()
    {


        $this->data['getUsers'] = $this->qry->getUsers();

        $this->template
            ->title('Data Pengguna')
            ->set_layout('main')
            ->build('index', $this->data);
    }

    public function add()
    {

        $this->load->view('add',  $this->data);
    }

    public function edit()
    {
        $data['user_id'] = $this->input->post('user_id');
        $this->data['getUsers'] = $this->qry->getUsers($data)['0'];
       
        $this->load->view('edit', $this->data);
    }

    function save()
    {
        $NIP = $this->input->post('NIP');
        $NamaLengkap = $this->input->post('NamaLengkap');
        $Email = $this->input->post('Email');
        $Nama_Pengguna = $this->input->post('Nama_Pengguna');
        $Kata_Sandi = $this->input->post('Kata_Sandi');
        $Jabatan = $this->input->post('Jabatan');

        if (!empty($NIP) && !empty($NamaLengkap) && !empty($Email) && !empty($Nama_Pengguna) && !empty($Kata_Sandi) && !empty($Jabatan)) {
            $new_data = [
                'username' => $Nama_Pengguna,
                'nip' => $NIP,
                'nama_lengkap' => $NamaLengkap,
                'email' => $Email,
                'password' => password_hash($Kata_Sandi, PASSWORD_DEFAULT),
                'registered' => time(),
                'level' => $Jabatan,
            ];
            if ($this->qry->save($new_data)) {
                $msg = array('title' => 'Berhasil', 'message' => 'Pengguna Berhasil Ditambahkan.', 'class' => 'success');
                $this->session->set_flashdata('msg', $msg);
                redirect('users');
            } else {
                $msg = array('title' => 'Gagal', 'message' => 'Pengguna Gagal Ditambahkan.', 'class' => 'error');
                $this->session->set_flashdata('msg', $msg);
                redirect('users');
            }
        }
    }

    function update()
    {
        $user_id = $this->input->post('user_id');
        $NIP = $this->input->post('NIP');
        $NamaLengkap = $this->input->post('NamaLengkap');
        $Email = $this->input->post('Email');
        $Nama_Pengguna = $this->input->post('Nama_Pengguna');
        $Kata_Sandi = $this->input->post('Kata_Sandi');
        $Jabatan = $this->input->post('Jabatan');

        if (!empty($NIP) && !empty($NamaLengkap) && !empty($Email) && !empty($Nama_Pengguna) && !empty($Jabatan)) {
            if(!empty($Kata_Sandi) ){
                $new_data = [
                    'username' => $Nama_Pengguna,
                    'nip' => $NIP,
                    'nama_lengkap' => $NamaLengkap,
                    'email' => $Email,
                    'password' => password_hash($Kata_Sandi, PASSWORD_DEFAULT),
                    'registered' => time(),
                    'level' => $Jabatan,
                ];
            } else {
                $new_data = [
                    'username' => $Nama_Pengguna,
                    'nip' => $NIP,
                    'nama_lengkap' => $NamaLengkap,
                    'email' => $Email,
                    // 'password' => password_hash($Kata_Sandi, PASSWORD_DEFAULT),
                    'registered' => time(),
                    'level' => $Jabatan,
                ];
            }
           
            if ($this->qry->update($new_data, $user_id)) {
                $msg = array('title' => 'Berhasil', 'message' => 'Pengguna Berhasil Diupdate.', 'class' => 'success');
                $this->session->set_flashdata('msg', $msg);
                redirect('users');
            } else {
                $msg = array('title' => 'Gagal', 'message' => 'Pengguna Gagal Diupdate.', 'class' => 'error');
                $this->session->set_flashdata('msg', $msg);
                redirect('users');
            }
        }
    }

    function hapus()
    {
        $user_id = $this->uri->segment(3);
           if(!empty($user_id)){
            if ($this->qry->delete($user_id)) {
                $msg = array('title' => 'Berhasil', 'message' => 'Pengguna Berhasil Dihapus.', 'class' => 'success');
                $this->session->set_flashdata('msg', $msg);
                redirect('users');
            } else {
                $msg = array('title' => 'Gagal', 'message' => 'Pengguna Gagal Dihapus.', 'class' => 'error');
                $this->session->set_flashdata('msg', $msg);
                redirect('users');
            }
        } else {
            $msg = array('title' => 'Gagal', 'message' => 'Pengguna Tidak Tersedia.', 'class' => 'error');
            $this->session->set_flashdata('msg', $msg);
            redirect('users');
        }
    }
}
