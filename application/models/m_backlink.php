<?php

class M_backlink extends CI_Model {

    function list_backlink() {
        return $this->db->get('backlink')->result();
    }

    function list_domain() {
        return $this->db->get('domain')->result();
    }
    
    function list_domain_backlink(){
        return $this->db->get('domain_backlink')->result_array();
    }
    
    function list_email(){
        $this->db->select('id, email');
        return $this->db->get('email')->result();
    }
    
    function insert($table, $data){
        $this->db->insert($table, $data);
    }
    
    function get_data_where($table, $data_where){
        $this->db->where($data_where);
        return $this->db->get($table);
    }
}
