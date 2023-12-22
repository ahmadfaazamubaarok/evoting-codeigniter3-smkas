<?php

	class Riwayat_model extends CI_Model
	{
		private $_table = 'tb_riwayat';

		public function get()
		{
			$riwayat = $this->db->get($this->_table);
			return $riwayat->result();
		}

		public function update($riwayat)
		{
		    if (!$riwayat) {
		        return null;
		    }
		    
		    return $this->db->update($this->_table, $riwayat, ['id_riwyat' => $riwayat['id_riwayat']]);
		}

		public function delete($id_riwayat)
		{
			$this->db->where('id_riwayat',$id_riwayat);
			$this->db->delete($this->_table);
		}

		public function insert($riwayat)
		{
			return $this->db->insert($this->_table, $riwayat);
		}
	}

?>