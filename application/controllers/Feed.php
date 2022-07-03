<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Feed extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('xml');
        $this->load->helper('text');


        $this->load->model('data_model');
    }

    function index() {
        $data['report'] = $this->data_model->getPosts('report', 5000);
        header("Content-Type: application/rss+xml");
        $this->load->view('Feed/reportfeed', $data);
    }

    function blogFeed() {
        $data['blog'] = $this->data_model->getPosts('blog', 100);
        header("Content-Type: application/rss+xml");
        $this->load->view('Feed/blogfeed', $data);
    }

    function prFeed() {
        $data['press'] = $this->data_model->getPosts('press_release', 100);
        header("Content-Type: application/rss+xml");
        $this->load->view('Feed/prfeed', $data);
    }

}
