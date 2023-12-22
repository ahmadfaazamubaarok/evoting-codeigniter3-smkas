<?php 
  
 class Admin_model extends CI_Model
 {
 	private $_table = 'tb_admin';

 	public function cari_admin($username, $email, $password)
	{       
	    if (!$username && !$email) {
	        return null; 
	    }
	
	    $admin = $this->db->get_where($this->_table, ['username' => $username, 'email' => $email])->row();
	
	    if (!$admin) {
	        return FALSE;
	    } else {
	    	if (!password_verify($password, $admin->password)) {
	    	    return FALSE;
	    	} else {
	    	    return $admin;
	    	} 
	    }   
	}

	public function cari_admin_dengan_id_admin($id_admin)
	{
		$admin = $this->db->get_where($this->_table, ['id_admin' => $id_admin])->row();
		return $admin;
	}

	public function update($admin)
	{
		if (!$admin) {
		        return null;
		    }
		    
		return $this->db->update($this->_table, $admin, ['id_admin' => $admin['id_admin']]);
	}
 }

?>