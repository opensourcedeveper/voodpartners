<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Sitemap extends CI_Controller {


    /**
     * Index Page for this controller.
     *
     */
    public function index()
    {
        $this->load->database();
        $this->load->helper('url');
        $query = $this->db->get("report");
        $data['items'] = $query->result();
/*
        header("Content-Type: text/xml;charset=iso-8859-1");*/
        $this->load->view('sitemap', $data);
    }
}