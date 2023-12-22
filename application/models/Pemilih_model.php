<?php 

class Pemilih_model extends CI_Model
{
	private $_table = 'tb_pemilih';

	public function jumlah_pemilih_sudah_voting($id_voting)
	{
		$this->db->where(['status' => 'sudah', 'id_voting' => $id_voting]);
    	return $this->db->count_all_results($this->_table);
	}

	public function jumlah_pemilih_belum_voting($id_voting)
	{
		$this->db->where(['status' => 'belum', 'id_voting' => $id_voting]);
    	return $this->db->count_all_results($this->_table);
	}

	public function cari_pemilih($email, $username)
	{
	    if (!$email && !$username) {
	        return null; 
	    }
	
	    $pemilih = $this->db->get_where($this->_table, ['email' => $email, 'username' => $username]);
		
	    return $pemilih->row();
	}

	public function cek_sudah_voting($id_pemilih)
	{
	    if (!$id_pemilih) {
	        return null;
	    }
	
	    $pemilih = $this->db->get_where($this->_table, ['id_pemilih' => $id_pemilih, 'status' => 'belum']);
	
	    return $pemilih->row();
	}

	public function update($pemilih)
	{
		if (!$pemilih) {
		        return null;
		    }
		    
		return $this->db->update($this->_table, $pemilih, ['id_pemilih' => $pemilih['id_pemilih']]);
	}

	public function pemilih_terdaftar($id_voting)
	{
	    $pemilih = $this->db->get_where($this->_table, ['id_voting' => $id_voting]);
	
	    return $pemilih->result();
	}

	public function tambah_pemilih($pemilih)
	{
		return $this->db->insert($this->_table, $pemilih);
	}

	public function delete($id_pemilih)
	{
		$this->db->where('id_pemilih',$id_pemilih);
		$this->db->delete($this->_table);
	}

	public function cari_pemilih_dengan_id_pemilih($id_pemilih)
	{
	    $pemilih = $this->db->get_where($this->_table, ['id_pemilih' => $id_pemilih]);
	    
	    return $pemilih->row();
	}

	public function import_data($data_pemilih)
    {
        $jumlah = count($data_pemilih);
        if ($jumlah > 0) {
        	$this->db->replace($this->_table, $data_pemilih);
        }
    }

    public function search($keyword)
	{
	    if (!$keyword) {
	        return null;
	    }
	
	    $this->db->group_start();
	    $this->db->like('username', $keyword);
	    $this->db->or_like('email', $keyword);
	    $this->db->or_like('status', $keyword);
	    $this->db->group_end();
	
	    $query = $this->db->get($this->_table);
	    return $query->result();
	}

	public function delete_all() {
        $this->db->empty_table($this->_table); // Menghapus seluruh isi tabel
    }

    public function reset_semua_pemilih()
	{
		$this->db->where('status', 'sudah');
		$this->db->update($this->_table, ['status' => 'belum', 'waktu_memilih' => '0000-00-00 00:00:00']);
	}
}

?>