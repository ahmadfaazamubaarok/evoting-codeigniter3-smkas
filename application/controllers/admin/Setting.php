<?php 

	class Setting extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata('id_admin')) {
			    redirect('auth');
			}

			if (!$this->session->userdata('id_voting')) {
			    redirect('admin/dashboard');
			}
			
			$this->load->model('voting_model');
			$this->load->model('pilihan_voting_model');
			$this->load->model('pemilih_model');
			$this->load->model('Riwayat_model');
			$this->load->model('admin_model');

		}

		public function index()
		{
			$id_admin = $this->session->userdata('id_admin');

			$data['admin'] = $this->admin_model->cari_admin_dengan_id_admin($id_admin);
			$voting = $this->voting_model->cari_voting();
			$data['tema'] = $voting->tema;
			$data['halaman_setting'] = 'active';
			$this->load->view('admin/setting/setting', $data);
		}

		public function edit_password()
		{
			$this->load->view('admin/setting/edit_password');
			if ($this->input->method() === 'post') {

				$password = $this->input->post('password');
				$konfirmasi = $this->input->post('konfirmasi');

				if ($password === $konfirmasi) {

					$admin = [
					'id_admin' => $this->session->userdata('id_admin'),
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'last_edit_password' => date("Y-m-d H:i:s")
					];
	
					$terupdate = $this->admin_model->update($admin);
		
					if($terupdate) {
						$this->session->set_flashdata('password_ganti', 'Password telah diganti');
						redirect(site_url('admin/setting'));
					}
				}				
			}
		}

		public function edit_profil()
		{
			$id_admin = $this->session->userdata('id_admin');
			$data['admin'] = $this->admin_model->cari_admin_dengan_id_admin($id_admin);
			$this->load->view('admin/setting/edit_profil', $data);

			if ($this->input->method() === 'post') {
				$username = $this->input->post('username');
				$email = $this->input->post('email');

				$admin = [
					'id_admin' => $id_admin,
					'username' => $username,
					'email' => $email,
					];
	
					$terupdate = $this->admin_model->update($admin);
		
					if($terupdate) {
						$this->session->set_flashdata('profil_ganti', 'Profil telah diganti');
						redirect(site_url('admin/setting'));
					}
			}
		}
	}

?>