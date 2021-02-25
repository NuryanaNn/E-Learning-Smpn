<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subject_model extends CI_Model
{
    // Model Untuk Menampilkan data dari Pelajaran
    public function manageSubject()
    {
        return $this->db->get('pelajaran');
    }


    // MOdel Untuk Menambahkan data Pelajran
    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // Model Edit Pelajaran
    public function editPelajaran()
    {
        $data = array(
            "id" => $_POST['id'],
            "code" => $_POST['code'],
            "nama_pelajaran" => $_POST['nama_pelajaran'],
            "semester" => $_POST['semester'],
        );
        $this->db->where('id', $_POST['id']);
        $this->db->update('pelajaran', $data);
        redirect('admin/manageSubject');
    }

    // Model Delete Data Pelajaran
    function deleteData($id)
    {
        $hasil = $this->db->query("DELETE FROM pelajaran WHERE id='$id'");
        return $hasil;
    }
}
