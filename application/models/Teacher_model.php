<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teacher_model extends CI_Model
{

    // Menampilkan Data Dari guru
    public function manageTeacher()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role_id', '3');
        return $this->db->get()->result_array();
    }


    // Menambah data guru
    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // Edit data guru
    public function editGuru($data)
    {
        $data = array(
            "id" => $_POST['id'],
            "nip" => $_POST['nip'],
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "handphone" => $_POST['handphone'],
            "tempat_lahir" => $_POST['tempat_lahir'],
            "tanggal_lahir" => $_POST['tanggal_lahir'],
            "agama" => $_POST['agama'],
            "jk" => $_POST['jk'],
            "alamat" => $_POST['alamat'],
            "is_active" => $_POST['is_active'],
        );
        $this->db->where('id', $_POST['id']);
        $this->db->update('user', $data);
        redirect('admin/manageTeacher');
    }

    // Model Delete Data Teacher
    function deleteGuru($id)
    {
        $hasil = $this->db->query("DELETE FROM user WHERE id='$id'");
        return $hasil;
    }
}
