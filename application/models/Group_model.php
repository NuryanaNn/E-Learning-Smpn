<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Group_model extends CI_Model
{
    // Menampilkan Data Grup kelas
    public function groupClass()
    {
        return $this->db->get('group_class');
    }

    // Manampilkan data guru berdasarkan kondisi dari db
    public function guru()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role_id', '3');
        return $this->db->get()->result_array();
    }

    // Model Untuk Insert Data Grup / Public
    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }


    public function editGroup()
    {
        $data = array(
            "id" => $_POST['id'],
            "kelas" => $_POST['kelas'],
            "semester" => $_POST['semester'],
            "wali_kelas" => $_POST['wali_kelas'],
        );

        $this->db->where('id', $_POST['id']);
        $this->db->update('group_class', $data);
        redirect('admin/groupClass');
    }




    // Model Delete Data Grup
    function deleteGroup($id)
    {
        $hasil = $this->db->query("DELETE FROM group_class WHERE id='$id'");
        return $hasil;
    }
}
