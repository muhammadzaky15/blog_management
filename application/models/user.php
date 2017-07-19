<?php
class User extends CI_Model {
		function cek_login($where){
			return $this->db->get_where('user',$where)->num_rows();
		}
	
}