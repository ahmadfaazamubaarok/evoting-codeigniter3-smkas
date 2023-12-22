<?php 

 class Auth extends CI_Controller
 {
 	public function index()
 	{
 		$this->load->model('admin_model');
 		$this->load->model('voting_model');

 		$voting = $this->voting_model->cari_voting();
		$data['tema'] = $voting->tema;
 		$this->load->view('admin/login', $data);

 		if ($this->input->method() === 'post') {

 			$username = $this->input->post('username');
 			$email = $this->input->post('email');
 			$password = $this->input->post('password');

 			$admin = $this->admin_model->cari_admin($username, $email, $password);

 			if ($admin) {
 				$id_admin = $admin->id_admin;
 				$this->session->set_userdata('id_admin', $id_admin);
 				redirect('admin/dashboard');
 			} else {
 				$this->session->set_flashdata('salah', 'Tidak sesuai');
 				redirect('auth');
 			}
 		}
 	}

 	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}
 }

?>