<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Reportmodel');
    }

    /* List fetch */

    public function viewlist() {
        $data['title'] = "report";
        if ($this->session->userdata('logged_in') == "User") {
            $this->load->view('back/reportlistview', $data);
        } elseif ($this->session->userdata('logged_in') == "Admin") {
            $this->load->view('back/reportlistview', $data);
        } else {
            redirect(base_url() . 'user');
        }
    }

    public function ajaxList() {
        $columns = array(
            0 => 'id',
            1 => 'title',
            2 => 'name',
            3 => 'publisher_name',
            4 => 'created_at',
            5 => 'action'
        );
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];



        if (empty($this->input->post('search')['value'])) {
            $totalData = $this->Reportmodel->allposts_count();
            $totalFiltered = $totalData;
            $posts = $this->Reportmodel->allposts($limit, $start, $order, $dir);
        } else {
            $search = $this->input->post('search')['value'];
            $totalData = $this->Reportmodel->allposts_count_search($search);
            $totalFiltered = $totalData;
//    print_r($search);
            $posts = $this->Reportmodel->posts_search($limit, $start, $search, $order, $dir);

            $totalFiltered = $this->Reportmodel->posts_search_count($search);
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $action = '<a href="' . base_url() . 'edit/report/' . $post->id . '" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                /* $action .= '<a class="" href="' . base_url() . 'delete/report/' . $post->id . '" data-toggle="tooltip" data-placement="top" title="delete"> <i class="fa fa-trash"></i></a>'; */
                $nestedData['id'] = $post->id;
                $nestedData['title'] = $post->title;
                $nestedData['name'] = $post->name;
                $nestedData['publisher_name'] = $post->publisher_name;
                $nestedData['created_at'] = substr($post->created_at, 0, 10);
                $nestedData['action'] = $action;
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }

}
