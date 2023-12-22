<?php 

defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

	class Pemilih extends CI_Controller
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
			$data['halaman_pemilih'] = 'active';

			$data['voting'] = $this->voting_model->cari_voting();
			$id_voting = $data['voting']->id_voting;
			$data['pemilih_terdaftar'] = $this->pemilih_model->pemilih_terdaftar($id_voting);

			if ($data['pemilih_terdaftar']) {
				$data['jumlah_pemilih_sudah_voting'] = $this->pemilih_model->jumlah_pemilih_sudah_voting($id_voting);
				$data['jumlah_pemilih_belum_voting'] = $this->pemilih_model->jumlah_pemilih_belum_voting($id_voting);
				$data['total_pemilih'] = $data['jumlah_pemilih_belum_voting'] + $data['jumlah_pemilih_sudah_voting'];			
	    		$data['persentase_pemilih_sudah_voting'] = ($data['jumlah_pemilih_sudah_voting'] / $data['total_pemilih']) * 100 . "%";
				$this->load->view('admin/pemilih/list_pemilih',$data);			
			} else {
				$this->load->view('admin/pemilih/kosong_pemilih',$data);			
			}
		}

		public function tambah_pemilih()
		{
			$data['halaman_pemilih'] = 'active';
			$this->load->view('admin/pemilih/tambah_pemilih',$data);

			if ($this->input->method() === 'post') {

				$id_voting = $this->session->userdata('id_voting');
 				$username = $this->input->post('username');
				$email = $this->input->post('email');
				$id_pemilih = uniqid('', true);

				$pemilih = [
					'id_pemilih' => $id_pemilih,
					'username' => $username,
					'email' => $email,
					'status' => 'belum',
					'waktu_memilih' => '0000-00-00 00:00:00',
					'id_voting' => $id_voting
				];
				
				$tambah_pemilih = $this->pemilih_model->tambah_pemilih($pemilih);

				if ($tambah_pemilih) {
        			$this->session->set_flashdata('tambah_berhasil', $username . 'berhasil ditambahkan');
					redirect('admin/pemilih');
				} else {
					echo "gagal tambah pemilih";
				}
			}
		}

		public function reset_pemilih()
		{
			if ($this->input->method() === 'post') {

				$id_pemilih = $this->input->post('reset_pemilih');

				$pemilih = [
					'id_pemilih' => $id_pemilih,
					'waktu_memilih' => '0000-00-00 00:00:00',
					'status' => 'belum'
				];

				$updated = $this->pemilih_model->update($pemilih);
				if ($updated) {
					$this->session->set_flashdata('reset_berhasil', 'Pemilih berhasil direset');
					redirect('admin/pemilih');
				} else {
					echo "gagal reset";
					die();
				}
			}			
		}

		public function hapus_pemilih()
		{
			if ($this->input->method() === 'post') {
				$id_pemilih = $this->input->post('hapus_pemilih');
				$this->pemilih_model->delete($id_pemilih);
	    		$this->session->set_flashdata('hapus_berhasil', 'Pemilih berhasil dihapus');
				redirect('admin/pemilih');
			}
		}

		public function edit_pemilih($id_pemilih = null)
		{
			$data['halaman_pemilih'] = 'active';
			
		    $data['pemilih'] = $this->pemilih_model->cari_pemilih_dengan_id_pemilih($id_pemilih);
		    $this->load->view('admin/pemilih/edit_pemilih', $data);

		    if ($this->input->method() === 'post') {
		    	$username = $this->input->post('username');
		    	$email = $this->input->post('email');

		    	$pemilih = [
		    		'id_pemilih' => $id_pemilih,
		    		'username' => $username,
		    		'email' => $email
		    	];

		    	$terupdate = $this->pemilih_model->update($pemilih);

		    	if ($terupdate) {
        			$this->session->set_flashdata('edit_berhasil', $username . 'berhasil diubah');
		    		redirect('admin/pemilih');
		    	} else {
		    		echo "gagal update pemilih";
		    		die();
		    	}
		    }
		}

		public function search()
		{
			$data['halaman_pemilih'] = 'active';
			$id_voting = $this->session->userdata('id_voting');
			
			if ($this->input->method() === 'post') {
				$keyword = $this->input->post('search');
				$data['pemilih_terdaftar'] = $this->pemilih_model->search($keyword);

				$data['jumlah_pemilih_sudah_voting'] = $this->pemilih_model->jumlah_pemilih_sudah_voting($id_voting);
				$data['jumlah_pemilih_belum_voting'] = $this->pemilih_model->jumlah_pemilih_belum_voting($id_voting);
				$data['total_pemilih'] = $data['jumlah_pemilih_belum_voting'] + $data['jumlah_pemilih_sudah_voting'];			
	    		$data['persentase_pemilih_sudah_voting'] = ($data['jumlah_pemilih_sudah_voting'] / $data['total_pemilih']) * 100 . "%";
	    			

				if ($data['pemilih_terdaftar']) {
					$this->load->view('admin/pemilih/list_pemilih',$data);
				} else {
	    			$this->session->set_flashdata('tidak_ketemu', 'Pemilih tidak ditemukan');
	    			redirect('admin/pemilih');
				}
			}
		}

		public function import()
		{
			$data['halaman_pemilih'] = 'active';

    		$this->load->view('admin/pemilih/import_excel', $data);
		}

		public function import_excel()
    	{   		
			$id_voting = $this->session->userdata('id_voting');

    	    $config['upload_path'] = 'upload/tabel/pemilih';
    	    $config['allowed_types'] = 'xlsx|xls';
    	    $config['file_name'] = 'doc' . time();

    	    $this->load->library('upload', $config);
    	    if ($this->upload->do_upload('importexcel')) {
    	        $file = $this->upload->data();
    	        $reader = ReaderEntityFactory::createXLSXReader();
    	        
    	        $reader->open('upload/tabel/pemilih/' . $file['file_name']);

    	        foreach($reader->getSheetIterator() as $sheet){
    	        	
    	        	$numRow = 1;

    	        	foreach ($sheet->getRowIterator() as $row) {
    	        		if ($numRow > 1) {
    	        			$data_pemilih = array(
    	        				'id_pemilih' => uniqid('', true),
								'username' => $row->getCellAtIndex(0),
								'email' => $row->getCellAtIndex(1),
								'status' => 'belum',
								'waktu_memilih' => '0000-00-00 00:00:00',
								'id_voting' => $id_voting
    	        			);

    	        			$this->pemilih_model->import_data($data_pemilih);
    	        		}
    	        	$numRow++;
    	        	}
    	        	$reader->close();
    	        	unlink('upload/tabel/pemilih/' . $file['file_name']);
    	        	$this->session->set_flashdata('import_berhasil', 'Import data pemilih berhasil');
    	        	redirect('admin/pemilih');
    	        }
    	    } else {
    	        echo "Error :" . $this->upload->display_errors();
    	    };
    	}

    	public function hapus_semua_pemilih() {
    	    $this->pemilih_model->delete_all();
    	    redirect('admin/pemilih');
    	}

    	public function reset_semua_pemilih()
    	{
    		$this->pemilih_model->reset_semua_pemilih();
        	$this->session->set_flashdata('reset_semua_berhasil', 'Semua pemilih berhasil direset');
    		redirect('admin/pemilih');
    	}
	}

?>