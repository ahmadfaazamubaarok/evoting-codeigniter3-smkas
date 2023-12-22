<?php 

	class Voting extends CI_Controller
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

		}

		public function index()
		{
			$data['voting'] = $this->voting_model->cari_voting();
			if (!$data['voting']) {
				$this->load->view('admin/voting/kosong_voting');
			} else {
				$id_voting = $data['voting']->id_voting;
				$data['halaman_voting'] = 'active';
				$data['pemilih'] = $this->pemilih_model->pemilih_terdaftar($id_voting);
	    		$data['pilihan_voting'] = $this->pilihan_voting_model->ambil_pilihan_berdasarkan_id_voting($id_voting);


				$this->load->view('admin/voting/list_voting',$data);

				if ($this->input->method() === 'post') {

					$judul_voting = $this->input->post('judul_voting');
					$token = $this->input->post('token');
					$batas_waktu = $this->input->post('batas_waktu');

					if (!empty($_FILES['tema']['name'])) {
	
						if (!empty($data['voting']->tema)) {
							$gambar_path = FCPATH . 'upload/tema/' . $data['voting']->tema;
							if (file_exists($gambar_path)) {
								unlink($gambar_path);
							}
						}
		
						// Konfigurasi upload gambar baru
						$config['upload_path'] = FCPATH . 'upload/tema';
						$config['allowed_types'] = 'gif|jpg|jpeg|png';
						$config['file_name'] = $data['voting']->judul_voting . '_' . $_FILES['tema']['name']; // Nama file unik
		
						$this->load->library('upload', $config);
		
						if ($this->upload->do_upload('tema')) {
	
							$upload_data = $this->upload->data();
							$tema = $upload_data['file_name']; // Simpan URL gambar baru
	
						} else {
							$error = array('error' => $this->upload->display_errors());
						}
	
					} else {
						// Jika tidak ada gambar yang diunggah, simpan data tanpa mengubah gambar
						$tema = $data['voting']->tema;
					}	   

	    			$waktu_sekarang = date("Y-m-d H:i:s");
		
	    			if ($waktu_sekarang >= $batas_waktu) {
	    				$status = 'nonaktif';
	    			} else {
	    				$status = 'aktif';
	    			}

					$voting = [
						'id_voting' => $id_voting,
						'judul_voting' => $judul_voting,
						'status' => $status,
						'token' => $token,
						'batas_waktu' => $batas_waktu,
						'tema' => $tema
					];

					$terupdate = $this->voting_model->update($voting);

					if ($terupdate) {
						$this->session->set_flashdata('update', 'Data voting telah diubah');
			    		redirect('admin/voting');
					}
				}
			}
		}
	}

?>