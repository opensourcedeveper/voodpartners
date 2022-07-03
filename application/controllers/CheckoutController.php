<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CheckoutController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('checkoutModel');
        $this->load->model('data_model');
        $this->load->library('parser');
    }

// Add User
    public function addUser()
    {
        if ($this->input->post()) {
            $postdata = $this->input->post();
            $this->load->library('form_validation');
            $this->form_validation->set_rules('f_name', 'First Name', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('l_name', 'Last Name', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('phone', 'Phone', 'numeric|required');
            $this->form_validation->set_rules('email', 'Email', 'valid_emails|required');
            $this->form_validation->set_rules('password', 'Password', 'min_length[6]|required');
            $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[password]');
            $this->form_validation->set_rules('company', 'Company', 'trim|required');
            $this->form_validation->set_rules('job_title', 'Title', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'alpha_numeric_spaces|required');
            $this->form_validation->set_rules('zip_code', 'Zip Code', 'numeric|required');
            $this->form_validation->set_rules('country', 'Country', 'trim|required');
            if ($this->form_validation->run() == false) {
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $exist = $this->checkoutModel->getbyEmail($postdata['email']);
                if ($exist != 1) {
                    unset($postdata['confirmpassword']);
                    $maildata = $postdata;
                    $postdata['password'] = hash('sha512', $postdata['password']);
                    $postdata['created_at'] = date('Y-m-d H:m:s');
                    $userid = $this->checkoutModel->add($postdata);
                    $this->sendMail($maildata, 'user_add', 'admin_new_user');
                    $userdata = $this->checkoutModel->login($userid);
                    redirect($_SERVER['HTTP_REFERER']);
                } elseif ($exist) {
                    return $this->session->set_flashdata('msg', 'You Have already Account Please login and Continue...');
                }
            }
        } else {
            if ($this->session->userdata('f_name')) {
                redirect(base_url());
            } else {
                $data['page'] = 'User Registration';
                $data['page_header'] = "page-header2";
                $this->load->view('userlogin/register', $data);
            }
        }
    }

    public function userLogin()
    {
        if ($this->input->post()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'valid_emails|required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('msg', 'Invalid Credentials');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                if ($this->checkoutModel->userLogin($this->input->post())) {
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $this->session->set_flashdata('msg', 'Invalid Credentials');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
        } else {
            if ($this->session->userdata('f_name')) {
                redirect(base_url());
            } else {
                $data['page'] = 'User Login';
                $data['page_header'] = "page-header2";
                $this->load->view('userlogin/login', $data);
            }
        }
    }

    public function userDashboard()
    {
        if ($this->session->userdata('f_name')) {
            $id = $this->session->userdata('user_id');
            $user = $this->checkoutModel->getbyId($id);
            $data['user'] = $user[0];
            $data['page'] = 'User Login';
            $data['page_header'] = "page-header2";
            $this->load->view('userlogin/dashboard', $data);
        } else {
            redirect(base_url());
        }
    }

    public function editProfile()
    {
        if ($this->session->userdata('f_name')) {
            if ($this->input->post()) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('f_name', 'First Name', 'required|alpha_numeric_spaces');
                $this->form_validation->set_rules('l_name', 'Last Name', 'required|alpha_numeric_spaces');
                $this->form_validation->set_rules('phone', 'Phone', 'numeric|required');
                $this->form_validation->set_rules('email', 'Email', 'valid_emails|required');
                $this->form_validation->set_rules('password', 'Password', 'min_length[6]|required');
                $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[password]');
                $this->form_validation->set_rules('company', 'Company', 'trim|required');
                $this->form_validation->set_rules('job_title', 'Title', 'trim|required');
                $this->form_validation->set_rules('address', 'Address', 'alpha_numeric_spaces|required');
                $this->form_validation->set_rules('zip_code', 'Zip Code', 'numeric|required');
                $this->form_validation->set_rules('country', 'Country', 'trim|required');
                if ($this->form_validation->run() == false) {
                    $this->session->set_flashdata('msg', 'Error Updating... Please Fill values Properly');
                    redirect(base_url() . 'user/dashboard');
                } else {
                    $postdata = $this->input->post();
                    $maildata = $postdata;
                    $id = $this->session->userdata('user_id');
                    $postdata['updated_at'] = date('Y-m-d H:m:s');
                    if ($this->checkoutModel->updateUser($id, $postdata)) {
                        $this->sendMail($maildata, 'user_profile_update');
                        $this->session->set_flashdata('msg', 'Profile Updated SuccessFully...');
                    } else {
                        $this->session->set_flashdata('msg', 'Error Updating...');
                    }
                }
            }
            redirect(base_url() . 'user/dashboard');
        } else {
            redirect(base_url());
        }
    }

    public function changePassword()
    {
        if ($this->session->userdata('f_name')) {
            if ($this->input->post()) {
                $postdata = $this->input->post();
                $this->load->library('form_validation');
                $this->form_validation->set_rules('oldpassword', 'Old Password', 'min_length[6]|required');
                $this->form_validation->set_rules('newpassword', 'Password', 'min_length[6]|required');
                $this->form_validation->set_rules('confirmnewpassword', 'Confirm Password', 'required|matches[newpassword]');
                if ($this->form_validation->run() == false) {
                    $this->session->set_flashdata('msg', 'Error Updating... Please try again');
                    redirect(base_url() . 'user/dashboard');
                } else {
                    if ($postdata['newpassword'] === $postdata['confirmnewpassword']) {
                        $postdata['password'] = $postdata['newpassword'];
                        $postdata['updated_at'] = date('Y-m-d H:m:s');
                        $id = $this->session->userdata('user_id');
                        $user = $this->checkoutModel->getbyId($id)[0];
                        $maildata = $user;
                        $maildata['newpassword'] = $postdata['newpassword'];
                        $postdata['oldpassword'] = hash('sha512', $postdata['oldpassword']);
                        if ($user['password'] === $postdata['oldpassword']) {
                            unset($postdata['confirmnewpassword'], $postdata['oldpassword'], $postdata['newpassword']);
                            $postdata['password'] = hash('sha512', $postdata['password']);
                            if ($this->checkoutModel->updateUser($id, $postdata)) {
                                $this->sendMail($maildata, 'user_password_update');
                                $this->session->set_flashdata('msg', 'Password Changed SuccessFully...');
                            } else {
                                $this->session->set_flashdata('msg', 'Error Updating...');
                            }
                            redirect(base_url() . 'user/dashboard');
                        } else {
                            $this->session->set_flashdata('msg', 'Old Password is Not Correct...');
                            redirect(base_url() . 'user/dashboard');
                        }
                    } else {
                        $this->session->set_flashdata('msg', 'Password Not Match...');
                        redirect(base_url() . 'user/dashboard');
                    }
                }
            } else {
                redirect(base_url() . 'user/dashboard');
            }
        } else {
            redirect(base_url());
        }
    }

    public function userLogout()
    {
        //$this->session->sess_destroy();
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('f_name');
        $this->session->unset_userdata('l_name');
        $this->session->unset_userdata('email');
        redirect($_SERVER['HTTP_REFERER']);
    }

    //Send Mail functions
    public function sendMail($data, $usertemp, $admintemp = "")
    {
        $mailpage = $this->checkoutModel->getMailbyType($usertemp)[0];
        if (isset($mailpage['template_html'])) {
            $message = $this->parser->parse_string($mailpage['template_html'], $data);
            $to = $data['email'];
            $subject = $mailpage['subject'];
            $this->data_model->sendMail($to, $subject, $message);
        }

        if ($admintemp != "") {
            $mailpage1 = $this->checkoutModel->getMailbyType($admintemp)[0];
            if (isset($mailpage1['template_html'])) {
                $to = 'sales@useto.in';
                $subject = $mailpage1['subject'];
                $message1 = $this->parser->parse_string($mailpage1['template_html'], $data);
                $this->data_model->sendMail($to, $subject, $message1);
            }
        }
    }

}
