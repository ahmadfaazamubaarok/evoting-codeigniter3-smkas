<?php 

	class Pilihan_voting_model extends CI_Model
	{
		private $_table = 'tb_pilihan_voting';

		public function jumlah_pilihan()
		{
			return $this->db->count_all($this->_table);
		}

		public function ambil_pilihan_berdasarkan_id_voting($id_voting)
		{
		    if (!$id_voting) {
		        return array();
		    }
		
		    $pilihan_voting = $this->db->get_where($this->_table, ['id_voting' => $id_voting]);
		
		    return $pilihan_voting->result();
		}

		public function ambil_pilihan_berdasarkan_id_pilihan_voting($id_pilihan_voting)
		{
		    if (!$id_pilihan_voting) {
		        return array();
		    }
		
		    $pilihan_voting = $this->db->get_where($this->_table, ['id_pilihan_voting' => $id_pilihan_voting]);
		
		    return $pilihan_voting->row();
		}

		// ---------------------------------------------------------------------------------------------------

		public function update($pilihan_voting)
		{
		    if (!$pilihan_voting) {
		        return null;
		    }
		    
		    return $this->db->update($this->_table, $pilihan_voting, ['id_pilihan_voting' => $pilihan_voting['id_pilihan_voting']]);
		}

		public function delete($id_pilihan_voting)
		{
			$this->db->where('id_pilihan_voting',$id_pilihan_voting);
			$this->db->delete($this->_table);
		}

		public function insert($pilihan_voting)
		{
			return $this->db->insert($this->_table, $pilihan_voting);
		}

		//---------------------------------------------------------------------------------------------------
		
		public function reset_suara()
		{
			return $this->db->update($this->_table, ['jumlah_voting' => '0']);
		}
	}

?>