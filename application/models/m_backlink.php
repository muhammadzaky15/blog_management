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

}
