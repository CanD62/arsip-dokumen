<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * This is an EXAMPLE user model, edit to match your implementation
 * OR use the adapter model for easy integration with an existing model
 */
class Users_qry extends CI_Model
{
    var $table = 'users';

    public function getUsers($data = null)
    {
        $userid = isset($data['user_id']) ? $data['user_id'] : '';
        !empty($data['user_id']) ?  $sqluserid = " Where users.user_id = '$userid'" : $sqluserid = "";

        $str = "Select
        users.user_id,
        users.username,
        users.nip,
        users.nama_lengkap,
        users.email,
        users.level,
        case  when users.level =1 then 'Admin'
              when users.level =2 then 'Tenaga Pendidik'
              when users.level =3 then 'Tenaga Kependidikan'
         end AS status
    From
        users $sqluserid";


        $query = $this->db->query($str);
        return $query->result_array();
    }

    public function save($user)
    {
        $this->db->trans_begin();
        $user['user_id'] = $this->uuid->v4();

        $this->db->insert($this->table, $user);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $return = 0;
        } else {
            $this->db->trans_commit();
            $return = 1;
        }

        return $return;
    }

    public function update($data, $user_id)
    {
        $this->db->trans_begin();
        $this->db->where('user_id', $user_id);
        $this->db->update($this->table, $data);
           

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $return = 0;
        } else {
            $this->db->trans_commit();
            $return = 1;
        }

        return $return;
    }

    public function delete($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('users');
        $query = $this->db->affected_rows();
        return $query;
    }
    
}
