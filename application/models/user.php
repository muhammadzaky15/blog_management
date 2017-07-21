<?php
class User extends CI_Model {
		function cek_login($where){
			return $this->db->get_where('user',$where)->num_rows();
		}

		function get_id($username){
			$where  = array('username' => $username );
			return $this->db->get_where('user',$where)->row()->id;
		}
	
}