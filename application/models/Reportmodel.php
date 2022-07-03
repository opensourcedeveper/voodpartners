<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reportmodel extends CI_Model {

    public function __construct() {

        parent::__construct();
    }

    function allposts_count() {
        $query = $this
                ->db
                ->where('report.status', '1')
                ->get('report');

        return $query->num_rows();
    }

    function allposts_count_search($search = "") {
        $query = $this
                ->db
                ->where('report.status', '1')
                ->where('report.id', $search)
                ->or_like('report.title', $search)
                ->get('report');

        return $query->num_rows();
    }

    function allposts($limit, $start, $col, $dir) {
        $query = $this
                ->db
                ->select('report.id,report.title,report.created_at,category.name,publisher.name as publisher_name')
                ->from('report')
                ->join('category', 'report.cat_id=category.id')
                ->join('publisher', 'report.publisher_id=publisher.id')
                ->where('report.status', '1')
                ->limit($limit, $start)
                ->order_by($col, $dir)
                ->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function posts_search($limit, $start, $search, $col, $dir) {
//        $query = $this
//                ->db
//                ->select('report.id,report.title,report.created_at,category.name,publisher.name as publisher_name')
//                ->like('id', $search)
//                ->or_like('title', $search)
//                ->where('report.status', '1')
//                ->limit($limit, $start)
//                ->order_by($col, $dir)
//                ->get('report');
        $query = $this
                ->db
                ->select('report.id,report.title,report.created_at,category.name,publisher.name as publisher_name')
                ->from('report')
                ->join('category', 'report.cat_id=category.id')
                ->join('publisher', 'report.publisher_id=publisher.id')
                ->where('report.status', '1')
                ->where('report.id', $search)
                ->or_like('report.title', $search)
                ->limit($limit, $start)
                ->order_by($col, $dir)
                ->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function posts_search_count($search) {
        $query = $this
                ->db
                ->where('report.status', '1')
                ->like('id', $search)
                ->or_like('title', $search)
                ->get('report');

        return $query->num_rows();
    }

}
