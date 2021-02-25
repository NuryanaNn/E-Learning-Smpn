<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Teacher_model');
		$this->load->model('Student_model');
		$this->load->model('Subject_model');
		$this->load->model('Group_model');
		$this->load->model('Study_model');
		//helper tendang jika belum login
		is_logged_in();
	}


	public function index()
	{
		//ambil dari session
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function role()
	{
		//ambil dari session
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


		$data['role'] = $this->db->get('user_role')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
	}

	public function roleaccess($role_id)
	{
		//ambil dari session
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}


	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed</div>');
	}



	// Kelola Data Guru
	public function manageTeacher()
	{
		$data['title'] = 'Data Guru';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data["manageTeacher"] = $this->Teacher_model->manageTeacher();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/manage_teacher', $data);
		$this->load->view('templates/footer');
	}
	// Tambah Data Guru
	public function tambahguru()
	{
		$nip = $this->input->post('nip');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$handphone = $this->input->post('handphone');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$agama = $this->input->post('agama');
		$jk = $this->input->post('jk');
		$alamat = $this->input->post('alamat');
		$is_active = $this->input->post('is_active');

		$data = array(
			'nip' => $nip,
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'name' => $name,
			'email' => $email,
			'handphone' => $handphone,
			'image' => 'default.jpg',
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'agama' => $agama,
			'jk' => $jk,
			'alamat' => $alamat,
			'role_id' => '3',
			'is_active' => $is_active
		);
		$this->Teacher_model->insert_data($data, 'user');
		redirect('admin/manageTeacher');
	}

	// Edit Data Guru
	function editGuru()
	{
		$id = $this->input->post('id');
		$nip = $this->input->post('nip');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$handphone = $this->input->post('handphone');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$agama = $this->input->post('agama');
		$jk = $this->input->post('jk');
		$alamat = $this->input->post('alamat');
		$role_id = $this->input->post('role_id');
		$is_active = $this->input->post('is_active');

		$data = array(
			'nip' => $nip,
			'name' => $name,
			'email' => $email,
			'handphone' => $handphone,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'agama' => $agama,
			'jk' => $jk,
			'alamat' => $alamat,
			'role_id' => $role_id,
			'is_active' => $is_active
		);

		$where = array(
			'id' => $id
		);

		$this->Teacher_model->editGuru($where, $data, 'user');
		redirect('admin/manageTeacher');
	}

	// Delete Data Pelajaran
	function deleteGuru()
	{
		$id = $this->input->post('id');
		$this->Teacher_model->deleteGuru($id);
		redirect('admin/manageTeacher');
	}


















	// Kelola data Siswa
	public function manageStudent()
	{
		$data['title'] = 'Data Siswa';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data["manageStudent"] = $this->Student_model->manageStudent();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/manage_student', $data);
		$this->load->view('templates/footer');
	}

	// Tambah Data Untuk Siswa
	public function tambahSiswa()
	{
		$nip = $this->input->post('nip');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$handphone = $this->input->post('handphone');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$agama = $this->input->post('agama');
		$jk = $this->input->post('jk');
		$alamat = $this->input->post('alamat');
		$is_active = $this->input->post('is_active');

		$data = array(
			'nip' => $nip,
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'name' => $name,
			'email' => $email,
			'handphone' => $handphone,
			'image' => 'default.jpg',
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'agama' => $agama,
			'jk' => $jk,
			'alamat' => $alamat,
			'role_id' => '2',
			'is_active' => $is_active
		);
		$this->Student_model->insert_data($data, 'user');
		redirect('admin/manageStudent');
	}

	// Edit Data Siswa
	function editSiswa()
	{
		$id = $this->input->post('id');
		$nip = $this->input->post('nip');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$handphone = $this->input->post('handphone');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$agama = $this->input->post('agama');
		$jk = $this->input->post('jk');
		$alamat = $this->input->post('alamat');
		$role_id = $this->input->post('role_id');
		$is_active = $this->input->post('is_active');

		$data = array(
			'nip' => $nip,
			'name' => $name,
			'email' => $email,
			'handphone' => $handphone,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'agama' => $agama,
			'jk' => $jk,
			'alamat' => $alamat,
			'role_id' => $role_id,
			'is_active' => $is_active
		);

		$where = array(
			'id' => $id
		);

		$this->Subject_model->editPelajaran($where, $data, 'pelajaran');
		redirect('admin/manageStudent');
	}











	// Menampilkan Data Dan Manage Data Pelajaran
	public function manageSubject()
	{
		$data['title'] = 'Mata Pelajaran';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data["manageSubject"] = $this->Subject_model->manageSubject()->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/manage_subject', $data);
		$this->load->view('templates/footer');
	}

	// Tambah Data pelajaran
	public function tambahPelajaran()
	{
		$code = $this->input->post('code');
		$nama_pelajaran = $this->input->post('nama_pelajaran');
		$semester = $this->input->post('semester');

		$data = array(
			'code' => $code,
			'nama_pelajaran' => $nama_pelajaran,
			'semester' => $semester,
		);
		$this->Subject_model->insert_data($data, 'pelajaran');
		redirect('admin/manageSubject');
	}

	// Edit Data Pelajaran
	function editPelajaran()
	{
		$id = $this->input->post('id');
		$code = $this->input->post('code');
		$nama_pelajaran = $this->input->post('nama_pelajaran');
		$semester = $this->input->post('semester');

		$data = array(
			'code' => $code,
			'nama_pelajaran' => $nama_pelajaran,
			'semester' => $semester,
		);
		$where = array(
			'id' => $id
		);
		$this->Subject_model->editPelajaran($where, $data, 'pelajaran');
		redirect('admin/manageSubject');
	}

	// Delete Data Pelajaran
	function deleteData()
	{
		$id = $this->input->post('id');
		$this->Subject_model->deleteData($id);
		redirect('admin/manageSubject');
	}





	// Menampilkan dan mnegelola data dari grup kelas
	public function groupClass()
	{
		$data['title'] = 'Group Kelas';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data["groupClass"] = $this->Group_model->groupClass()->result_array();
		$data['guru'] = $this->Group_model->guru();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/group_class', $data);
		$this->load->view('templates/footer');
	}

	// Tambah Data Grup Kelas
	public function tambahGroupKelas()
	{
		$kelas = $this->input->post('kelas');
		$semester = $this->input->post('semester');
		$wali_kelas = $this->input->post('wali_kelas');


		$data = array(
			'kelas' => $kelas,
			'semester' => $semester,
			'wali_kelas' => $wali_kelas
		);

		$this->Group_model->insert_data($data, 'group_class');
		redirect('admin/groupclass');
	}

	// Edit Data Group Kelas
	function editgroup()
	{
		$id = $this->input->post('id');
		$kelas = $this->input->post('kelas');
		$semester = $this->input->post('semester');
		$wali_kelas = $this->input->post('wali_kelas');

		$data = array(
			'kelas' => $kelas,
			'semester' => $semester,
			'wali_kelas' => $wali_kelas,
		);

		$where = array(
			'id' => $id
		);

		$this->Group_model->editGroup($where, $data, 'group_class');
		redirect('admin/groupClass');
	}

	// Delete Data Grup Kelas
	function deleteGroup()
	{
		$id = $this->input->post('id');
		$this->Group_model->deleteGroup($id);
		redirect('admin/groupclass');
	}



	// Kelola data study
	public function studyClass()
	{
		$data['title'] = 'Guru Pengajar';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data["study"] = $this->Study_model->study()->result_array();
		$data['guru'] = $this->Study_model->guru();
		$data['pelajaran'] = $this->Study_model->pelajaran();
		$data['kelas'] = $this->Study_model->kelas();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/study_class', $data);
		$this->load->view('templates/footer');
	}

	// Tambah Data Study
	public function tambahStudy()
	{
		$mata_pelajaran = $this->input->post('mata_pelajaran');
		$kelas = $this->input->post('kelas');
		$semester = $this->input->post('semester');
		$guru = $this->input->post('guru');


		$data = array(
			'mata_pelajaran' => $mata_pelajaran,
			'kelas' => $kelas,
			'semester' => $semester,
			'guru' => $guru
		);

		$this->Study_model->insert_data($data, 'study');
		redirect('admin/studyClass');
	}

	// Delete Data Grup Kelas
	function deleteStudy()
	{
		$id = $this->input->post('id');
		$this->Study_model->deleteStudy($id);
		redirect('admin/studyClass');
	}
}
