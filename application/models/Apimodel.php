<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Apimodel extends CI_Model {

    public function __construct() {

        parent::__construct();
    }

    function posts_search_m($search,$publisher="1") {
        $query = $this
        ->db
        ->like('title', $search)
        ->where('publisher_id',$publisher)
        ->where('created_at BETWEEN "' . date('Y-m-d h:i:s', strtotime('-7 days')) . '" and "' . date('Y-m-d h:i:s') . '"')
        ->limit(1)
        ->get('report');
        return $query->result();
    }

    function posts_search_mm($search,$publisher="1") {
        $query = $this
        ->db
        ->like('title', $search)
        ->where('publisher_id',$publisher)
        ->limit(1)
        ->get('report');
        return $query->result();
    }

}
