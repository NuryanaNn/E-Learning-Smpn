  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submenu extends CI_Controller {
public function index()
	{
		$data['title'] = 'Submenu Management';
		$data['user'] =$this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->model('Menu_Model', 'menu');



		$data['subMenu'] = $this->menu->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');
	

			if($this->form_validation->run() == false){

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('submenu/index', $data);
			$this->load->view('templates/footer');
		}else{
			$data = [
					'title' =>$this->input->post('title'),
					'menu_id' =>$this->input->post('menu_id'),
					'url' =>$this->input->post('url'),
					'icon' =>$this->input->post('icon'),
					'is_active' =>$this->input->post('is_active')
			];
			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added</div>');
				redirect('submenu');
;		}
	}
}