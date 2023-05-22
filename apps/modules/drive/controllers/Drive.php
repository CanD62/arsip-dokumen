<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Drive extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('drive_qry', 'qry');
        $this->data = array(
            'judul_halaman' => 'Arsip Dokumen',
            'msg_detail' => $this->msg_detail,
            'menu_app' => $this->menu_app,
        );
    }

    public function index()
    {
        // $data['tipe'] = '9c0fd4d2-f523-11ed-9d6f-b445068261b6';
        // $data['jenis'] = '801bb453-f527-11ed-9d6f-b445068261b6';
        $this->data['getTipeAll'] = $this->qry->getTipeAll();
        $this->data['getJenisAll'] = $this->qry->getJenisAll();
        $this->data['getDokumen'] = $this->qry->getDokumen();
        // var_dump($this->data['getDokumen']);exit;

        $this->template
            ->title('Arsip Dokumen')
            ->set_layout('main')
            ->build('index', $this->data);
    }

    public  function cariDokumen()
    {
        $data = $this->input->post();

        $this->data['getDokumen'] = $this->qry->getDokumen($data);
        sleep(2);
        $this->load->view('cari', $this->data);
    }

    public  function detail()
    {
        $data = $this->input->post();
        $this->data['getDokumen'] = $this->qry->getDokumen($data)['0'];
        sleep(2);
        $this->load->view('detail', $this->data);
    }

    public  function edit()
    {
        $data['id_dokumen'] = $this->uri->segment(3);
        $this->data['getDokumen'] = $this->qry->getDokumen($data)['0'];
        $this->data['JenisDokumen'] = $this->qry->getJenis();
        $this->template
            ->title('Edit Dokumen')
            ->set_layout('main')
            ->build('edit', $this->data);
    }

    public function upload()
    {
        // $this->data = array(
        //     'judul_halaman' => 'Upload Dokumen',
        //     'msg_detail' => $this->msg_detail,
        //     'menu_app' => $this->menu_app,
        // );
        $this->data['JenisDokumen'] = $this->qry->getJenis();
        $this->template
            ->title('Upload Dokumen')
            ->set_layout('main')
            ->build('upload', $this->data);
    }

    public function save()
    {
        $NamaDokumen = $this->input->post('NamaDokumen');
        $DeskripsiDokumen = $this->input->post('DeskripsiDokumen');
        $JenisDokumen = $this->input->post('JenisDokumen');
        $FileDokumen = $_FILES["FileDokumen"]["name"];

        if (!empty($NamaDokumen) && !empty($DeskripsiDokumen) && !empty($JenisDokumen) && !empty($FileDokumen)) {

            $file_name = md5($this->session->userdata('auth_user') . floor(microtime(true)));
            $config['upload_path']          = FCPATH . '/files/';
            $config['allowed_types']        = 'xls|xlsx|doc|docx|gif|jpg|jpeg|png|pdf';
            $config['file_name']            = $file_name;
            $config['overwrite']            = true;
            $config['max_size']             = 1024; // 1MB
            // $config['max_width']            = 1080;
            // $config['max_height']           = 1080;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('FileDokumen')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $uploaded_data = $this->upload->data();
                $extensi = $uploaded_data['file_ext'];
                // $file_size = $uploaded_data['file_size'];
                $type = $this->qry->getTipe($extensi);

                $new_data = [
                    'user_id' => $this->session->userdata('auth_user'),
                    'id_jenis' => $JenisDokumen,
                    'id_type' => $type['id_type'],
                    'nama_dokumen' => $NamaDokumen,
                    'deskripsi' => $DeskripsiDokumen,
                    'file' => $uploaded_data['file_name'],
                    'size' => $uploaded_data['file_size'],
                ];
                if ($this->qry->save($new_data)) {
                    echo 'Berhasil diuplaod';
                    exit;
                    $this->session->set_flashdata('message', 'Berhasil diupload!');
                    redirect(site_url('drive'));
                }
            }
        } else {

            echo 'masih ada yang kosong';
        }
    }

    public function update()
    {
        $id_dokumen = $this->input->post('id_dokumen');
        $file = $this->input->post('file');
        $NamaDokumen = $this->input->post('NamaDokumen');
        $DeskripsiDokumen = $this->input->post('DeskripsiDokumen');
        $JenisDokumen = $this->input->post('JenisDokumen');
        $FileDokumen = $_FILES["FileDokumen"]["name"];

        if (!empty($NamaDokumen) && !empty($DeskripsiDokumen) && !empty($JenisDokumen)) {

            if(!empty($FileDokumen)){
            $file_name = md5($this->session->userdata('auth_user') . floor(microtime(true)));
            $config['upload_path']          = FCPATH . '/files/';
            $config['allowed_types']        = 'xls|xlsx|doc|docx|gif|jpg|jpeg|png|pdf';
            // $config['allowed_types']        = '*';
            $config['file_name']            = $file_name;
            $config['overwrite']            = true;
            $config['max_size']             = 10000; // 1MB
            // $config['max_width']            = 1080;
            // $config['max_height']           = 1080;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('FileDokumen')) {
                // var_dump($this->upload->data());exit;
                echo $this->upload->display_errors();
            } else {
                $uploaded_data = $this->upload->data();
                $extensi = $uploaded_data['file_ext'];
                // $file_size = $uploaded_data['file_size'];
                $type = $this->qry->getTipe($extensi);
                unlink('files/'.$file);

                $new_data = [
                    'user_id' => $this->session->userdata('auth_user'),
                    'id_jenis' => $JenisDokumen,
                    'id_type' => $type['id_type'],
                    'nama_dokumen' => $NamaDokumen,
                    'deskripsi' => $DeskripsiDokumen,
                    'file' => $uploaded_data['file_name'],
                    'size' => $uploaded_data['file_size'],
                ];
                if ($this->qry->update($new_data, $id_dokumen)) {
                    echo 'Berhasil diuplaod';
                    exit;
                    $this->session->set_flashdata('message', 'Berhasil diupload!');
                    redirect(site_url('drive'));
                }
            }
        } else{

            $new_data = [
                // 'user_id' => $this->session->userdata('auth_user'),
                'id_jenis' => $JenisDokumen,
                // 'id_type' => $type['id_type'],
                'nama_dokumen' => $NamaDokumen,
                'deskripsi' => $DeskripsiDokumen,
                'file' => $file,
                // 'size' => $uploaded_data['file_size'],
            ];
            if ($this->qry->update($new_data, $id_dokumen)) {
                echo 'Berhasil diupdate';
                exit;
                $this->session->set_flashdata('message', 'Berhasil diupload!');
                redirect(site_url('drive'));
            }
        }
        } else {

            echo 'masih ada yang kosong';
        }
    }
}
