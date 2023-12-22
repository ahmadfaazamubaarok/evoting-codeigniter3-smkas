<?php 

class Voting_model extends CI_Model
{
	private $_table = 'tb_voting';

	public function cari_dengan_id_voting($id_voting)
	{
	    if (!$id_voting) {
	        return null;
	    }
	
	    $voting = $this->db->get_where($this->_table, ['id_voting' => $id_voting]);
	
	    return $voting->result();
	}

	public function cari_voting_aktif()
	{
		$voting = $this->db->get_where($this->_table, ['status' => 'aktif']);

		return $voting->row();
	}

	public function cari_voting()
	{
	    $pemilih = $this->db->get($this->_table);
	
	    return $pemilih->row();
	}

	public function cari_dengan_token($token)
	{
	    if (!$token) {
	        return null;
	    }
	
	    $voting = $this->db->get_where($this->_table, ['token' => $token, 'status' => 'aktif'])->row();
	
	    return $voting;
	}	

	public function update($voting)
	{
		if (!$voting) {
		        return null;
		    }
		    
		return $this->db->update($this->_table, $voting, ['id_voting' => $voting['id_voting']]);
	}
}

?>