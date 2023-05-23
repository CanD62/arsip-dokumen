<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Jenis extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('jenis_qry', 'qry');

        $this->data = array(
            'judul_halaman' => 'Data Jenis Dokumen',
            'save' => site_url('jenis/save'),
            'update' => site_url('jenis/update'),
        );
    }

    public function index()
    {


        $this->data['getJenis'] = $this->qry->getJenis();

        $this->template
            ->title('Data Jenis Dokumen')
            ->set_layout('main')
            ->build('index', $this->data);
    }

    public function add()
    {

        $this->load->view('add',  $this->data);
    }

    public function edit()
    {
        $data['id_jenis'] = $this->input->post('id_jenis');
        $this->data['getJenis'] = $this->qry->getJenis($data)['0'];
       
        $this->load->view('edit', $this->data);
    }

    function save()
    {
        $jenis = $this->input->post('jenis');

        if (!empty($jenis)) {
            $new_data = [
                'nama_jenis' => $jenis,
                'enabled' => 1,
            ];
            if ($this->qry->save($new_data)) {
                $msg = array('title' => 'Berhasil', 'message' => 'Jenis Berhasil Ditambahkan.', 'class' => 'success');
                $this->session->set_flashdata('msg', $msg);
                redirect('jenis');
            } else {
                $msg = array('title' => 'Gagal', 'message' => 'Jenis Gagal Ditambahkan.', 'class' => 'error');
                $this->session->set_flashdata('msg', $msg);
                redirect('jenis');
            }
        }
    }

    function update()
    {
        $id_jenis = $this->input->post('id_jenis');
        $jenis = $this->input->post('jenis');

        if (!empty($jenis)) {
            $new_data = [
                'nama_jenis' => $jenis,
            ];
            if ($this->qry->update($new_data, $id_jenis)) {
                $msg = array('title' => 'Berhasil', 'message' => 'Jenis Berhasil Diupdate.', 'class' => 'success');
                $this->session->set_flashdata('msg', $msg);
                redirect('jenis');
            } else {
                $msg = array('title' => 'Gagal', 'message' => 'Jenis Gagal Diupdate.', 'class' => 'error');
                $this->session->set_flashdata('msg', $msg);
                redirect('jenis');
            }
        }
    }

    function hapus()
    {
        $id_jenis = $this->uri->segment(3);

        if (!empty($id_jenis)) {
            $new_data = [
                'enabled' => 0,
            ];
            if ($this->qry->update($new_data, $id_jenis)) {
                $msg = array('title' => 'Berhasil', 'message' => 'Jenis Berhasil Dihapus.', 'class' => 'success');
                $this->session->set_flashdata('msg', $msg);
                redirect('jenis');
            } else {
                $msg = array('title' => 'Gagal', 'message' => 'Jenis Gagal Dihapus.', 'class' => 'error');
                $this->session->set_flashdata('msg', $msg);
                redirect('jenis');
            }
        }
    }
}
