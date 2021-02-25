<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Study_model extends CI_Model
{
    public function study()
    {
        return $this->db->get('study');
    }

    // Menampilkan data guru di combobox
    public function guru()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role_id', '3');
        return $this->db->get()->result_array();
    }

    // Manampilkan data pelajaran di combobox
    public function pelajaran()
    {
        return $this->db->get('pelajaran')->result_array();
    }

    // Menampilkan data kelas di combobox
    public function kelas()
    {
        return $this->db->get('group_class')->result_array();
    }


    // Model Untuk Insert Data Study / Public
    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // Edit Study
    public function editStudy()
    {
        $data = array(
            "id" => $_POST['id'],
            "mata_pelajaran" => $_POST['mata_pelajaran'],
            "kelas" => $_POST['kelas'],
            "semester" => $_POST['semester'],
            "guru" => $_POST['guru'],
        );

        $this->db->where('id', $_POST['id']);
        $this->db->update('study', $data);
        redirect('admin/StudyClass');
    }

    // Model Delete Data Grup
    function deleteStudy($id)
    {
        $hasil = $this->db->query("DELETE FROM study WHERE id='$id'");
        return $hasil;
    }
}
