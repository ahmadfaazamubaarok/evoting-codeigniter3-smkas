<?php 

	class Pilihan extends CI_Controller
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
			$data['halaman_pilihan'] = 'active';

			$data['voting'] = $this->voting_model->cari_voting();
			$id_voting = $data['voting']->id_voting;
			$data['pilihan_terdaftar'] = $this->pilihan_voting_model->ambil_pilihan_berdasarkan_id_voting($id_voting);

			if ($data['pilihan_terdaftar']) {

	    		$total_voting = 0;
			
	    		// Hitung total voting
	    		foreach ($data['pilihan_terdaftar'] as $pilihan) {
	    		    $total_voting += $pilihan->jumlah_voting;
	    		}
			
	    		// Hitung persentase dan simpan dalam array
	    		$persentase_pilihan = [];
			
	    		// Periksa apakah total voting tidak sama dengan 0 sebelum melanjutkan
				if ($total_voting !== 0) {
				    foreach ($data['pilihan_terdaftar'] as $pilihan) {
				        $persentase = ($pilihan->jumlah_voting / $total_voting) * 100;
				        $persentase_pilihan[] = [
				            'nama_pilihan' => $pilihan->nama_pilihan,
				            'persentase' => $persentase
				        ];
				    }
				}
	    				
	    		$data['persentase_pilihan'] = $persentase_pilihan;
	
				$this->load->view('admin/pilihan/list_pilihan',$data);

			} else {
				$this->load->view('admin/pilihan/kosong_pilihan',$data);
			}			
		}

		public function hapus_pilihan($id_pilihan_voting = null)
		{
			$data['pilihan_terdaftar'] = $this->pilihan_voting_model->ambil_pilihan_berdasarkan_id_pilihan_voting($id_pilihan_voting);

			if ($data['pilihan_terdaftar']->thumbnail) {

				$gambar_path = FCPATH . 'upload/thumbnail/pilihan/' . $data['pilihan_terdaftar']->thumbnail;
				if (file_exists($gambar_path)) {

					unlink($gambar_path); //hapus gambar

					$this->pilihan_voting_model->delete($id_pilihan_voting);
					$this->session->set_flashdata('hapus', 'Satu pilihan telah dihapus');

					redirect('admin/pilihan');
				}
			}
		}

		public function tambah_pilihan()
		{
		    $data['halaman_pilihan'] = 'active';
		
		    $id_voting = $this->session->userdata('id_voting');
		
		    $this->load->view('admin/pilihan/tambah_pilihan', $data);
		
		    if ($this->input->method() === 'post') {
		
		        $id_pilihan_voting = uniqid('', true);
		
		        // Konfigurasi upload gambar
		        $config['upload_path'] = FCPATH . 'upload\thumbnail\pilihan';
		        $config['allowed_types'] = 'gif|jpg|jpeg|png';
		        $config['max_size'] = 2024;
		        $config['file_name'] = $id_pilihan_voting . '_' . $_FILES['thumbnail']['name']; // nama file unik
		
		        $this->load->library('upload', $config);
		
		        if (!$this->upload->do_upload('thumbnail')) {
		            // Mengatasi kesalahan upload
		            $error = array('error' => $this->upload->display_errors());
		            echo "Error: " . $error['error'];
		            die();
		        } else {
		            $upload_data = $this->upload->data();
		            $thumbnail = $upload_data['file_name']; // Simpan URL gambar baru
		        }
		
		        // Cek ukuran file setelah upload
		        if ($upload_data['file_size'] > 2048) {
		            // Ukuran file melebihi batas
		            // Lakukan sesuatu di sini, seperti menampilkan pesan kesalahan atau menghapus file yang sudah diupload
		            echo "Ukuran file melebihi batas maksimum (2 MB)";
		       
		            die();
		        }
		
		        $pilihan_voting = [
		            'id_pilihan_voting' => $id_pilihan_voting,
		            'id_voting' => $id_voting,
		            'nama_pilihan' => $this->input->post('nama'),
		            'deskripsi' => $this->input->post('deskripsi'),
		            'thumbnail' => $thumbnail,
		        ];
		
		        $ditambahkan = $this->pilihan_voting_model->insert($pilihan_voting);
		
		        if ($ditambahkan) {
					$this->session->set_flashdata('tambah', 'Pilihan telah ditambahkan');
		            redirect('admin/pilihan');
		        } else {
		            echo "gagal menyimpan";
		            die();
		        }
		    }
		}


		public function edit_pilihan($id_pilihan_voting = null)
		{
			$data['halaman_pilihan'] = 'active';
			
			$id_voting = $this->session->userdata('id_voting');
			$data['pilihan'] = $this->pilihan_voting_model->ambil_pilihan_berdasarkan_id_pilihan_voting($id_pilihan_voting);

			$this->load->view('admin/pilihan/edit_pilihan',$data);

			if ($this->input->method() === 'post') {
			
				if (!empty($_FILES['thumbnail']['name'])) {
	
					if (!empty($data['pilihan']->thumbnail)) {
						$gambar_path = FCPATH . 'upload/thumbnail/pilihan/' . $data['pilihan']->thumbnail;
						if (file_exists($gambar_path)) {
							unlink($gambar_path);
						}
					}

					// Konfigurasi upload gambar baru
					$config['upload_path'] = FCPATH . 'upload/thumbnail/pilihan';
					$config['allowed_types'] = 'gif|jpg|jpeg|png';
					$config['max_size'] = 2048; // 1MB
					$config['file_name'] = $data['pilihan']->id_pilihan_voting . '_' . $_FILES['thumbnail']['name']; // Nama file unik
	
					$this->load->library('upload', $config);
	
					if ($this->upload->do_upload('thumbnail')) {

						$upload_data = $this->upload->data();
						$thumbnail = $upload_data['file_name']; // Simpan URL gambar baru

					} else {
						$error = array('error' => $this->upload->display_errors());
					}

				} else {
					// Jika tidak ada gambar yang diunggah, simpan data tanpa mengubah gambar
					$thumbnail = $data['pilihan']->thumbnail;
				}
	
				$pilihan_voting = [
					'id_pilihan_voting' => $id_pilihan_voting,
					'nama_pilihan' => $this->input->post('nama_pilihan'),
					'deskripsi' => $this->input->post('deskripsi'),
					'thumbnail' => $thumbnail
				];
	
				$updated = $this->pilihan_voting_model->update($pilihan_voting);
	
				if ($updated) {
					$this->session->set_flashdata('update', 'Data pilihan telah diubah');
					redirect('admin/pilihan');
				}
			}
		}

		public function detail($id_pilihan_voting)
		{
			$data['halaman_pilihan'] = 'active';
			
			$data['pilihan_voting'] = $this->pilihan_voting_model->ambil_pilihan_berdasarkan_id_pilihan_voting($id_pilihan_voting);

			$this->load->view('admin/pilihan/detail', $data);
		}

		public function reset_suara()
		{
			$reset = $this->pilihan_voting_model->reset_suara();

			if ($reset) {
				$this->session->set_flashdata('reset_suara', 'Semua suara telah direset');
				redirect('admin/pilihan');
			}
		}
	}

?>