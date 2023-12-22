<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mulai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('voting_model');
		$this->load->model('pemilih_model');
		$this->load->model('pilihan_voting_model');
	}

	public function index()
	{
		$voting = $this->voting_model->cari_voting();
		$data['tema'] = $voting->tema;
		$data['judul_voting'] = $voting->judul_voting;
		$this->load->view('user/mulai/mulai', $data);
	}

	public function user()
	{		
		$voting = $this->voting_model->cari_voting();
		$data['tema'] = $voting->tema;
		$data['judul_voting'] = $voting->judul_voting;

		$this->load->view('user/mulai/form_user', $data);

		if ($this->input->method() === 'post') {
			$email = $this->input->post('email');
			$username = $this->input->post('username');

			$pemilih = $this->pemilih_model->cari_pemilih($email,$username);

			if ($pemilih) {

				$id_pemilih = $pemilih->id_pemilih;
				$belum_voting = $this->pemilih_model->cek_sudah_voting($id_pemilih);
				
				if ($belum_voting) {

					$id_pemilih_belum_voting = $belum_voting->id_pemilih;

					$this->session->set_userdata('id_pemilih', $id_pemilih_belum_voting);
					$data['username'] = $this->session->set_userdata('username', $username);
					redirect ('mulai/token/',$data);

				} else {
					$data['username'] = $this->session->set_userdata('username', $username);
					redirect ('mulai/sudah_voting/',$data);
				}
			} else {
				$this->session->set_flashdata('pemilih_tidak_ditemukan' , 'Pemilih tidak ditemukan');
				redirect('mulai/user');
			}
		}
	}

	public function token()
	{
		if (!$this->session->userdata('id_pemilih')) {
		    redirect('mulai/user');
		}

		$tema = $this->voting_model->cari_voting();
		$data['tema'] = $tema->tema;
		$data['judul_voting'] = $tema->judul_voting;
		$data['username'] = $this->session->userdata('username');

		$this->load->view('user/mulai/form_token', $data);

		if ($this->input->method() === 'post') {

			$ini = $this->voting_model->cari_voting();
			$batas_waktu = $ini->batas_waktu;
			$waktu_sekarang = date("Y-m-d H:i:s");

			if($waktu_sekarang >= $batas_waktu){
				$this->session->set_flashdata('waktu_habis', 'Waktu voting telah habis');
				redirect('mulai/token',$data);
			}
			
			$token = $this->input->post('token');

				$voting = $this->voting_model->cari_dengan_token($token);

				if ($voting) {

					$id_voting = $voting->id_voting;	
					$this->session->set_userdata('id_voting', $id_voting);
	
					if ($this->session->userdata('id_voting', $id_voting)) {
						redirect('mulai/peraturan',$data);
					}
	
				} else {

					$this->session->set_flashdata('salah','Token salah');
					redirect('mulai/token',$data);
				}
					
		}
	}

	public function peraturan()
	{
		if (!$this->session->userdata('id_voting')) {
		    redirect('mulai/token');
		}
		if (!$this->session->userdata('id_pemilih')) {
		    redirect('mulai/user');
		}

		$voting = $this->voting_model->cari_voting();
		$data['tema'] = $voting->tema;
		$data['judul_voting'] = $voting->judul_voting;
		$data['username'] = $this->session->userdata('username');

		$this->load->view('user/mulai/peraturan', $data);
	}

	public function sudah_voting()
	{
		$voting = $this->voting_model->cari_voting();
		$data['tema'] = $voting->tema;
		$data['judul_voting'] = $voting->judul_voting;
		$data['username'] = $this->session->userdata('username');

		$this->load->view('user/aksi/selesai_pilih', $data);
	}

	public function hasil_voting()
	{	
	    $data['voting'] = $this->voting_model->cari_voting();

	    $id_voting = $data['voting']->id_voting;

		$this->session->set_userdata('id_voting', $id_voting);
	    $data['pilihan_voting'] = $this->pilihan_voting_model->ambil_pilihan_berdasarkan_id_voting($id_voting);
	    
		
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

	    $voting = $this->voting_model->cari_voting();
		$data['tema'] = $voting->tema;
		$data['username'] = $this->session->userdata('username');
	    	
	    $this->load->view('user/aksi/hasil_voting', $data);
	}
}
