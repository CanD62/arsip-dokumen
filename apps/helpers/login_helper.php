<?php

function is_login()
{
    $ci = get_instance();
    $personid = $ci->session->userdata('personid');
   
    if (!$ci->session->userdata('personid')) {
        redirect('auth');
    } else {
        $str = "Select
        users.personid,
        users.username,
        users.full_name,
        users.email,
        users.role_id,
        users.status,
        users.lock_,
        users.nowa,
        role.role
    From
        users Inner Join
        role On role.role_id = users.role_id
    Where
        users.personid = '$personid'";
        $query = $ci->db->query($str);
        $user = $query->row_array();
        if ($user['status'] == 1) { //aktif
            if ($user['lock_'] == 0) { //tidak terkunci
                // id penjual = 6cd56e8b-ea1d-11ec-a0b3-7085c2aad785
                // id pembeli = 73d8e91f-ea1d-11ec-a0b3-7085c2aad785
                $pembalikan = $user['role_id'] == '6cd56e8b-ea1d-11ec-a0b3-7085c2aad785' ? 'Pembeli' : 'Penjual';
                $menurekber = $user['role_id'] == '6cd56e8b-ea1d-11ec-a0b3-7085c2aad785' ? '                <div class="item">
                <a href="#" data-bs-toggle="modal" data-bs-target="#withdrawActionSheet">
                    <div class="icon-wrapper bg-primary">
                    <i class="fa fa-people-arrows"></i>
                    </div>
                    <strong>Bikin Rekber</strong>
                </a>
            </div>' : '                <div class="item">
            <a href="#" data-bs-toggle="modal" data-bs-target="#JoinRekber">
                <div class="icon-wrapper bg-danger">
                <i class="fa fa-people-arrows"></i>
                </div>
                <strong>Gabung Rekber</strong>
            </a>
        </div>';
                $data = [
                    // 'personid' => $user['personid'],
                    'username' => $user['username'],
                    'full_name' => $user['full_name'],
                    'status' => $user['status'],
                    'email' => $user['email'],
                    'lock_' => $user['lock_'],
                    'role_name' => $user['role'],
                    'nowa' => $user['nowa'],
                    'pembalikan' => $pembalikan,
                    'menu_rekber' => $menurekber,
                    'role_id' => $user['role_id']
                ];

                $ci->session->set_userdata($data);
                $menu = $ci->uri->segment(1);
                if ($menu == 'penjual' and $user['role_id'] == '6cd56e8b-ea1d-11ec-a0b3-7085c2aad785') {
                    //halaman penjual

                } elseif ($menu == 'pembeli' and $user['role_id'] == '73d8e91f-ea1d-11ec-a0b3-7085c2aad785') {
                    //halaman pembeli
                } elseif ($menu == 'dashboard') { // allow all access
                    //halaman penjual&pembeli
                } else {

                    $ci->session->set_flashdata('message', '<script>notification(\'gagal-login-blocked\', 5000)</script>');
                    redirect('dashboard');
                }
            } else {
                $ci->session->set_flashdata('message', '<script>notification(\'gagal-login-lock\', 5000)</script>');
                redirect('auth/lock');
            }
        } elseif ($user['status'] == 2) { //banned

            $ci->session->set_flashdata('message', '<script>notification(\'gagal-login-banned\', 5000)</script>');
            redirect('auth');
        } else {
            $ci->session->set_flashdata('message', '<script>notification(\'gagal-login-status\', 5000)</script>');
            redirect('auth');
        }
    }
}

function reset_format($val)
{
    $char = array('--', '/', '\\', ',', '.', '#', ':', ';', '\'', '"', "'", '[', ']', '{', '}', ')', '(', '|', '`', '~', '!', '@', '%', '$', '^', '&', '*', '=', '?', '+');
    $cleanval = str_replace($char, "", trim($val));
    return $cleanval;
}

if (!function_exists('tanggal_indo')) {
    function tanggal_indo($tanggal)
    {
        $tglawal = $tanggal;
        $tgl = date('j', strtotime($tglawal));
        $bln = date('m', strtotime($tglawal));
        $thn = date('Y', strtotime($tglawal));

        switch ($bln) {
            case 1: {
                    $bln = 'Januari';
                }
                break;
            case 2: {
                    $bln = 'Februari';
                }
                break;
            case 3: {
                    $bln = 'Maret';
                }
                break;
            case 4: {
                    $bln = 'April';
                }
                break;
            case 5: {
                    $bln = 'Mei';
                }
                break;
            case 6: {
                    $bln = "Juni";
                }
                break;
            case 7: {
                    $bln = 'Juli';
                }
                break;
            case 8: {
                    $bln = 'Agustus';
                }
                break;
            case 9: {
                    $bln = 'September';
                }
                break;
            case 10: {
                    $bln = 'Oktober';
                }
                break;
            case 11: {
                    $bln = 'November';
                }
                break;
            case 12: {
                    $bln = 'Desember';
                }
                break;
            default: {
                    $bln = '-';
                }
                break;
        }
        $format = $tgl . " " . $bln . " " . $thn;
        $split = explode(' ', $tanggal);
        return $format . ' ' . substr($split[1], 0, -3) . '  WIB';
    }
    
    function hp($nohp)
    {
        // kadang ada penulisan no hp 0811 239 345
        $nohp = str_replace(' ', '', $nohp);
        // kadang ada penulisan no hp (0274) 778787
        $nohp = str_replace('(', '', $nohp);
        // kadang ada penulisan no hp (0274) 778787
        $nohp = str_replace(')', '', $nohp);
        // kadang ada penulisan no hp 0811.239.345
        $nohp = str_replace('.', '', $nohp);

        // cek apakah no hp mengandung karakter + dan 0-9
        if (!preg_match('/[^+0-9]/', trim($nohp))) {
            // cek apakah no hp karakter 1-3 adalah +62
            if (substr(trim($nohp), 0, 3) == '+62') {
                $hp = trim($nohp);
            }
            // cek apakah no hp karakter 1 adalah 0
            elseif (substr(trim($nohp), 0, 1) == '0') {
                $hp = '62' . substr(trim($nohp), 1);
            }
        }
        return $hp;
    }

    function jumlahjam($tipe)
    {
        $date = date_create(gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7));
        if ($tipe == 1) {
            date_add($date, date_interval_create_from_date_string('1 days'));
        } else {
            date_add($date, date_interval_create_from_date_string('1 hours'));
        }

        return date_format($date, 'Y-m-d H:i:s');
    }

    function formatSize($bytes)
    {
        // $bytes = round($bytes);
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' TB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' GB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' MB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' KB';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}
    // function tanggal_now(){
    //     return  gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7);
    // }
}
