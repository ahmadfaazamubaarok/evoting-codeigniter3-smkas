<?php 

class Aksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_voting')) {
		    redirect('mulai/token');
		}
		if (!$this->session->userdata('id_pemilih')) {
		    redirect('mulai/user');
		}
		$this->load->model('voting_model');
		$this->load->model('pilihan_voting_model');
		$this->load->model('pemilih_model');
	}

	public function index()
	{
		$id_voting = $this->session->userdata('id_voting');
		$id_pemilih = $this->session->userdata('id_pemilih');

	    $belum_voting = $this->pemilih_model->cek_sudah_voting($id_pemilih);
	    if(!$belum_voting) {
	    	redirect('mulai/sudah_voting');
	    }

		$data['voting'] = $this->voting_model->cari_dengan_id_voting($id_voting);
		$data['pilihan_voting'] = $this->pilihan_voting_model->ambil_pilihan_berdasarkan_id_voting($id_voting);

		if (!$data['pilihan_voting']) {
			echo "gak ada pilihan voting";
		}

		$voting = $this->voting_model->cari_voting();
		$data['tema'] = $voting->tema;
		$data['username'] = $this->session->userdata('username');


		$this->load->view('user/aksi/pilihan', $data);
	}

	public function detail($id_pilihan_voting)
	{
		$data['pilihan_voting'] = $this->pilihan_voting_model->ambil_pilihan_berdasarkan_id_pilihan_voting($id_pilihan_voting);

		$voting = $this->voting_model->cari_voting();
		$data['tema'] = $voting->tema;
		$data['username'] = $this->session->userdata('username');


		$this->load->view('user/aksi/detail', $data);
	}

	public function tambah_suara()
	{
	    $id_voting = $this->session->userdata('id_voting');
	    $id_pemilih = $this->session->userdata('id_pemilih');

	    $belum_voting = $this->pemilih_model->cek_sudah_voting($id_pemilih);
	    if(!$belum_voting) {
	    	redirect('mulai/sudah_voting');
	    }
	
	    if ($this->input->method() === 'post') {
	        $id_pilihan_voting = $this->input->post('suara');

	        if ($id_pilihan_voting) {

	            $pilihan_voting = $this->pilihan_voting_model->ambil_pilihan_berdasarkan_id_pilihan_voting($id_pilihan_voting);
	    		$semua_pilihan_voting = $this->pilihan_voting_model->ambil_pilihan_berdasarkan_id_voting($id_voting);
	            
	            if ($pilihan_voting) {
	
	                $jumlah_suara = $pilihan_voting->jumlah_voting;
	                $hasil_jumlah_suara = $jumlah_suara + 1;
	
	                // Update jumlah suara pada id_pilihan_voting
	                $update_pilihan = [
	                    'id_pilihan_voting' => $id_pilihan_voting,
	                    'jumlah_voting' => $hasil_jumlah_suara
	                ];
	                $this->pilihan_voting_model->update($update_pilihan);
	                
	    			$waktu_memilih = date("Y-m-d H:i:s");
	
	                // Update status pemilih
	                $pemilih = [
	                    'id_pemilih' => $id_pemilih,
	                    'status' => 'sudah',
	                    'waktu_memilih' => $waktu_memilih
	                ];
	                // var_dump($pemilih);
	                // die();
	                $sudah_voting = $this->pemilih_model->update($pemilih);
	
	                if ($sudah_voting == true) {
	                    redirect('aksi/selesai_voting');
	                } else {
	                    echo "gagal mengupdate status pemilih";
	                }
	            } else {
	                echo "Pilihan voting tidak ditemukan";
	            }
	        } else {
	            echo "Suara tidak valid";
	        }
	    }
	}


	public function selesai_voting()
	{
		$voting = $this->voting_model->cari_voting();
		$data['tema'] = $voting->tema;
		$data['username'] = $this->session->userdata('username');


		$this->load->view('user/aksi/selesai_pilih', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('mulai');
	}
}

?>