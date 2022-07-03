<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class EmailTemplateModel extends CI_Model {

    public function __construct() {

        parent::__construct();
    }
    
    public function get($fields, $tbl, $condi = null) {
        
        
//        $this->db->select($fields);        
        if ($condi != NULL) {
            return $this->db->get_where($tbl, $condi)->row_array();
        }
//        
//        return $this->db->row();

        $this->db->select($fields);        
        if ($condi != NULL) {
            foreach ($condi as $key => $value) {
                $this->db->where($key, $value);
            }
        }        
        $sql = $this->db->get($tbl);

        if ($sql->num_rows() > 0) {
            return $sql->result_array();
        } else {
            return false;
        }
    }
    
    public function create($Array, $tbl) {
        if ($this->db->insert($tbl, $Array)) {
            if ($this->db->insert_id() != 0) {
                return $this->db->insert_id();
            } else {
                return $this->db->affected_rows();
            }
        } else {
            return false;
        }
    }
    
    public function edit($Array, $condi, $table) {
        if ($condi != NULL) {
            foreach ($condi as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        if ($this->db->update($table, $Array)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function delete($condi, $table) {
        if ($condi != NULL) {
            foreach ($condi as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        if ($this->db->delete($table)) {
            return true;
        } else {
            return false;
        }
    }
}
