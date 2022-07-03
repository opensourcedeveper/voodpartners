<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @package Razorpay :  CodeIgniter Razorpay Gateway
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 *   
 * Description of Razorpay Controller
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Razorpay extends CI_Controller {

    // construct
    public function __construct() {
        parent::__construct();
        $this->load->model('data_model');
    }

    // index page
    public function index() {
        $data['title'] = 'Razorpay | TechArise';
        $id = "1";
        $data['productInfo'] = $this->data_model->get(array('id' => $id), NULL, array('id', 'title', 'desc', 'meta_title', 'meta_desc', 'meta_keyword', 'created_at'), NULL, 'press_release')[0];
        $this->load->view('razorpay/index', $data);
    }

    // checkout page
    public function checkout($id) {
        $data['title'] = 'Checkout payment | TechArise';

        $data['itemInfo'] = [
            "key" => RAZOR_KEY_ID,
            "price" => round("10"),
            "name" => "Sammer Thorat",
            "currency" => "USD",
            "description" => "Report Payment",
            "image" => "https://www.strabayassociates.com/web_assets/images/logo.png",
            "prefill" => [
                "name" => "Sammer Thorat",
                "email" => "sammer@strabayassociates.com",
                "contact" => "91 999 999 999",
            ],
            "notes" => [
                "address" => "INIDA",
                "merchant_order_id" => "12312321",
            ],
            "theme" => [
                "color" => "#F37254"
            ],
            "order_id" => "56456456",
        ];
        $data['return_url'] = site_url() . 'razorpay/callback';
        $data['surl'] = site_url() . 'razorpay/success';
        ;
        $data['furl'] = site_url() . 'razorpay/failed';
        ;
        $data['currency_code'] = 'USD';
        $this->load->view('razorpay/checkout', $data);
    }

    // initialized cURL Request
    private function get_curl_handle($payment_id, $amount) {
        $url = 'https://api.razorpay.com/v1/payments/' . $payment_id . '/capture';
        $key_id = RAZOR_KEY_ID_old;
        $key_secret = RAZOR_KEY_SECRET_old;
        $fields_string = "amount=$amount";
        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
        // curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        // curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/ca-bundle.crt');
        // return $ch;
    }

    // callback method
    public function callback() {
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
            $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $merchant_order_id = $this->input->post('merchant_order_id');
            $currency_code = 'USD';
            $amount = $this->input->post('merchant_total');
            $success = false;
            $error = '';
            try {
                $ch = $this->get_curl_handle($razorpay_payment_id, $amount);
                //execute post
                $result = curl_exec($ch);
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: ' . curl_error($ch);
                } else {
                    $response_array = json_decode($result, true);
                    // echo "<pre>";print_r($response_array);exit;
                    //Check success response
                    if ($http_status === 200 and isset($response_array['error']) === false) {
                        $success = true;
                    } else {
                        $success = false;
                        if (!empty($response_array['error']['code'])) {
                            $error = $response_array['error']['code'] . ':' . $response_array['error']['description'];
                        } else {
                            $error = 'RAZORPAY_ERROR:Invalid Response <br/>' . $result;
                        }
                    }
                }
                //close connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'OPENCART_ERROR:Request to Razorpay Failed';
            }
            if ($success === true) {
                if (!empty($this->session->userdata('ci_subscription_keys'))) {
                    $this->session->unset_userdata('ci_subscription_keys');
                }
                if (!$order_info['order_status_id']) {
                    redirect($this->input->post('merchant_surl_id'));
                } else {
                    redirect($this->input->post('merchant_surl_id'));
                }
            } else {
                redirect($this->input->post('merchant_furl_id'));
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
        }
    }

    public function success() {
        $data['title'] = 'Razorpay Success | TechArise';
        $this->load->view('razorpay/success', $data);
    }

    public function failed() {
        $data['title'] = 'Razorpay Failed | Report Monitor';
        $this->load->view('razorpay/failed', $data);
    }

}

?>