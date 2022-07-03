<?php

class CheckoutModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get($condi, $tbls, $fields, $limit, $tbl, $ordr = NULL) {
        $this->db->select($fields);
        if ($tbls != NULL) {
            foreach ($tbls as $tb) {
                $this->db->join($tb['name'], $tb['condi']);
            }
        }
        if ($condi != NULL) {
            foreach ($condi as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        if ($limit != '') {
            $this->db->limit($limit['limit'], $limit['start']);
        }

        if ($ordr != '') {
            $this->db->order_by('id', 'DESC');
        }

        $sql = $this->db->get($tbl);

        if ($sql->num_rows() > 0) {
            return $sql->result_array();
        } else {
            return false;
        }
    }

    public function getbyEmail($email) {
        $this->db->where('email', $email);
        $sql = $this->db->get('user_login');
        if ($sql->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getbyId($id) {
        $this->db->where('id', $id);
        $sql = $this->db->get('user_login');
        if ($sql->num_rows() > 0) {
            return $sql->result_array();
        } else {
            return false;
        }
    }

    public function add($Array) {
        if ($this->db->insert('user_login', $Array)) {
            if ($this->db->insert_id() != 0) {
                return $this->db->insert_id();
            } else {
                return $this->db->affected_rows();
            }
        } else {
            return false;
        }
    }

    public function login($id = "") {
        $this->db->where('id', $id);
        $query = $this->db->get('user_login');
        if ($query->num_rows() == 1) {
            $userdata = array(
                'user_id' => $query->result_array()[0]['id'],
                'f_name' => $query->result_array()[0]['f_name'],
                'l_name' => $query->result_array()[0]['l_name'],
                'email' => $query->result_array()[0]['email'],
            );
            $this->session->set_userdata($userdata);
            return true;
        } else {
            return false;
        }
    }

    public function userLogin($data) {
        $username = $this->security->xss_clean($data['email']);
        $password = hash('sha512', $this->security->xss_clean($data['password']));
        $this->db->where('email', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('user_login');
        if ($query->num_rows() == 1) {
            $userdata = array(
                'user_id' => $query->result_array()[0]['id'],
                'f_name' => $query->result_array()[0]['f_name'],
                'l_name' => $query->result_array()[0]['l_name'],
                'email' => $query->result_array()[0]['email'],
            );
            $this->session->set_userdata($userdata);
            return true;
        } else {
            return false;
        }
    }

    public function updateUser($id, $data) {
        if ($id != "") {
            $this->db->where("id", $id);
            if ($this->db->update('user_login', $data)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getMailbyType($type) {
       $this->db->where('template_code', $type);
        $sql = $this->db->get('email_templates');
        if ($sql->num_rows() > 0) {
            return $sql->result_array();
        } else {
            return false;
        }
    }

}
