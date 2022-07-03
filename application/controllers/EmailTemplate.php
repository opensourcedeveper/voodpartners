<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EmailTemplate extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('EmailTemplateModel');
    }

    public function index() {
        $fields = array('id', 'template_code', 'template_name', 'created_at');
        $data['Records'] = $this->EmailTemplateModel->get($fields, 'email_templates');
        $data['cols'] = array('Id', 'Template Code', 'Template Name', 'Created At');
        $data['pagetitle'] = "Email Templates";
//				$data['for'] = "member";
        $data['Actions'] = array('edit', 'delete');
        $data['link'] = "";
//                                echo '<pre>';print_r($data);
//                                exit;
        $this->load->view('EmailTemplate/index', $data);
    }

    public function add() {
        $this->load->view('EmailTemplate/add');
    }

    public function create() {
        $data = $_POST;
        $data['created_by'] = $this->session->userdata('userid');
        $data['created_at'] = date('Y-m-d H:m:s');
//        print_r($data);exit;
        $res = $this->EmailTemplateModel->create($data, 'email_templates');
        if ($res) {
            $this->session->set_flashdata('msg', 'Email Template Added Successfully');
        } else {
            $this->session->set_flashdata('msg', 'Error Adding Record');
        }
        redirect(base_url() . 'email-template/add');
    }

    public function edit($id) {
        $cond = array('id' => $id);
        $fields = array('id', 'template_code', 'template_name', 'template_html');
        $data['Record'] = $this->EmailTemplateModel->get($fields, 'email_templates', $cond);
//        print_r($data['Record']);exit;
        $data['pagetitle'] = "Edit Email Template";
        $data['fields'] = array('template_code' => 'text', 'template_name' => 'text', 'template_html' => 'textarea');
//        $data['for'] = "user";
//        $data['statusOpt'] = array('Enabled' => 1, 'Disabled' => 0);
//        echo '<pre>';        print_r($data);exit;
        $this->load->view('EmailTemplate/edit', $data);
    }

    public function update($id) {
        $data = $_POST;
        $data['created_by'] = $this->session->userdata('userid');
        $data['updated_at'] = date('Y-m-d H:m:s');
        if ($this->EmailTemplateModel->edit($data, array('id' => $id), 'email_templates')) {
            $this->session->set_flashdata('msg', 'Record Edited Successfully');
        } else {
            $this->session->set_flashdata('msg', 'Error Editing Record');
        }
        redirect(base_url() . 'email-template/edit/' . $id);
    }

    public function delete($id) {
        if ($this->EmailTemplateModel->delete(array('id' => $id), 'email_templates')) {
            $this->session->set_flashdata('msg', 'Record Deleted Successfully');
        } else {
            $this->session->set_flashdata('msg', 'Error Deleting Record');
        }
        redirect(base_url() . 'email-templates');
    }

}
