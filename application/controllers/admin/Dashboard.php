<?php 

	class Dashboard extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata('id_admin')) {
			    redirect('auth');
			}
			
			$this->load->model('voting_model');
			$this->load->model('pilihan_voting_model');
			$this->load->model('pemilih_model');
			$this->load->model('Riwayat_model');

		}
		public function index()
		{
			$data['halaman_dashboard'] = 'active';

			$data['voting'] = $this->voting_model->cari_voting();
			if (!$data['voting']) {
				$this->load->view('admin/dashboard/dashboard_no_voting');
			} else {
				$id_voting = $data['voting']->id_voting;
				$this->session->set_userdata('id_voting', $id_voting);

				$data['jumlah_pilihan'] = $this->pilihan_voting_model->jumlah_pilihan();
				$data['jumlah_pemilih_sudah_voting'] = $this->pemilih_model->jumlah_pemilih_sudah_voting($id_voting);
				$data['jumlah_pemilih_belum_voting'] = $this->pemilih_model->jumlah_pemilih_belum_voting($id_voting);
				$data['total_pemilih'] = $data['jumlah_pemilih_belum_voting'] + $data['jumlah_pemilih_sudah_voting'];
				$data['pemilih'] = $this->pemilih_model->pemilih_terdaftar($id_voting);
	    		$data['pilihan_voting'] = $this->pilihan_voting_model->ambil_pilihan_berdasarkan_id_voting($id_voting);
	
	    	//---------------------------------------------------------------------
	    		if ($data['total_pemilih'] > 0) {
	    			$data['persentase_pemilih_sudah_voting'] = ($data['jumlah_pemilih_sudah_voting'] / $data['total_pemilih']) * 100 . "%";
	    		}	    		
	    	//---------------------------------------------------------------------
	    	
	    	$total_voting = 0;
		
	    	// Hitung total voting
	    	foreach ($data['pilihan_voting'] as $pilihan) {
	    	    $total_voting += $pilihan->jumlah_voting;
	    	}
		
	    	// Hitung persentase dan simpan dalam array
	    	$persentase_pilihan = [];
		
	    	// Periksa apakah total voting tidak sama dengan 0 sebelum melanjutkan
			if ($total_voting !== 0) {
			    foreach ($data['pilihan_voting'] as $pilihan) {
			        $persentase = ($pilihan->jumlah_voting / $total_voting) * 100;
			        $persentase_pilihan[] = [
			            'nama_pilihan' => $pilihan->nama_pilihan,
			            'persentase' => $persentase
			        ];
			    }
			}
	    			
	    	$data['persentase_pilihan'] = $persentase_pilihan;

	    	//---------------------------------------------------------------------

	    	//batas waktu voting
	    	$waktu_sekarang = date("Y-m-d H:i:s");

	    	if ($waktu_sekarang >= $data['voting']->batas_waktu) {
	    		$voting = [
	    			'id_voting' => $data['voting']->id_voting,
	    			'status' => 'nonaktif'
	    		];
	    		$data['waktu_habis'] = $this->voting_model->update($voting);
	    		if ($data['waktu_habis']) {
	    			$data['waktu_habis'] = 'Waktu voting telah habis';
	    		}

	    	} elseif($waktu_sekarang <= $data['voting']->batas_waktu) {
	    		$voting = [
	    			'id_voting' => $data['voting']->id_voting,
	    			'status' => 'aktif'
	    		];
	    		$this->voting_model->update($voting);
	    	}

	    	$this->load->view('admin/dashboard/dashboard', $data);
	    	}			
		}
	}

?>