<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login($Array) {
        // echo "in Modal";
        $username = $this->security->xss_clean($Array['Login_id']);
        $password = hash('sha512', $this->security->xss_clean($Array['Password']));
        // echo($username.'<br>'.$password);die();
        // Prep the query
        $this->db->where('email', $username);
        $this->db->where('password', $password);

        // Run the query
        $query = $this->db->get('user');
        // print_r($query->result_array()[0]['id']);die();

        // Let's check if there are any results
        if ($query->num_rows() == 1) {
            $newdata = array(
                'userid' => $query->result_array()[0]['id'],
                'name' => $query->result_array()[0]['name'],
                'logged_in' => $query->result_array()[0]['type']
            );
            $this->session->set_userdata($newdata);
            return true;
        } else {
            return false;
        }
    }

    public function getPosts($tbl, $limit = NULL) {
        $this->db->order_by('id', 'DESC');
        return $this->db->get($tbl, $limit);
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

    public function search($term, $cat_id, $limit) {
        $this->db->select('report.id, title, cat_id, report_desc, meta_keyword,published_date,slug');
        if ($cat_id != 'NULL') {
            $this->db->where('cat_id', $cat_id);
        }
        $this->db->like('title', $term);
        if ($limit != NULL) {
            $this->db->limit($limit['limit'], $limit['start']);
        }
        $this->db->join('report_details', 'report.id = report_details.id');
        $this->db->order_by('id', 'DESC');
        $sql = $this->db->get('report');

        if ($sql->num_rows() > 0) {
            return $sql->result_array();
        } else {
            return false;
        }
    }

    public function letestReports() {
        $this->db->select('report.id, title, meta_keyword, report_desc,slug,report_details.pages');
        $this->db->join('report_details', 'report.id = report_details.id');
        $this->db->where('report.status', '1');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(6);
        $sql = $this->db->get('report');

        if ($sql->num_rows() > 0) {
            return $sql->result_array();
        } else {
            return false;
        }
    }

    public function filtre($cat_id, $regions, $duration, $limit) {
        $this->db->select('report.id, title, cat_id, report_desc, meta_keyword, published_date,slug');
        if ($cat_id != NULL) {
            foreach ($cat_id as $key => $value) {
                if ($key == 0) {
                    $this->db->where('cat_id', $value);
                } else {
                    $this->db->or_where('cat_id', $value);
                }
            }
        }
        if ($regions != NULL) {
            foreach ($regions as $key => $value) {
                if ($key == 0) {
                    $this->db->where('region_id', $value);
                } else {
                    $this->db->or_where('region_id', $value);
                }
            }
        }
        if ($limit != NULL) {
            $this->db->limit($limit['limit'], $limit['start']);
        }
        $this->db->join('report_details', 'report.id = report_details.id');
        $this->db->where('report.status', '1');
        $sql = $this->db->get('report');

        if ($sql->num_rows() > 0) {
            return $sql->result_array();
        } else {
            return false;
        }
    }

    public function getLast($field, $sort, $tbl) {
        $this->db->select($field);
        $this->db->order_by($sort['field'], $sort['type']);
        $this->db->limit(1);

        $sql = $this->db->get($tbl);

        if ($sql->num_rows() > 0) {
            return $sql->result_array()[0];
        } else {
            return false;
        }
    }

    public function add($Array, $tbl) {
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

    public function sendMail($to, $subject, $message) {
        //Load email library
        $this->load->library('email');

        //SMTP & mail configuration
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com', 
            // 'smtp_host' => 'ssl://smtp.zoho.com',
            // 'smtphost'=> 'zsmtp.hybridzimbra',
            'smtp_port' => 465,
            'smtp_user' => 'sales@strabayassociates.com',
            'smtp_pass' => 'pass',
            
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );

        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

        $this->email->to($to);
        $this->email->from('sales@strabayassociates.com', 'request');
        $this->email->subject($subject);
        $this->email->message($message);

        //Send email
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
        }
    }

    public function makePayment($Array) {
        $merchant_data = '';
        $working_key = '0'; //Shared by CCAVENUES
        $access_code = '0'; //Shared by CCAVENUES
        // $working_key = 'jhbj'; //Shared by CCAVENUES

        // $access_code = 'jhjh'; //Shared by CCAVENUES

        foreach ($Array as $key => $value) {
            $merchant_data .= $key . '=' . $value . '&';
        }

        $encrypted_data = $this->encrypt($merchant_data, $working_key); // Method for encrypting the data.

        $data['encRequest'] = $encrypted_data;
        $data['access_code'] = $access_code;

        $this->load->view('web/ccAveForm', $data);
    }

    // Encrypt Function for payment Gateway
    function encrypt($plainText, $key) {
        $secretKey = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $openMode = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', 'cbc', '');
        $blockSize = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, 'cbc');
        $plainPad = $this->pkcs5_pad($plainText, $blockSize);
        if (mcrypt_generic_init($openMode, $secretKey, $initVector) != -1) {
            $encryptedText = mcrypt_generic($openMode, $plainPad);
            mcrypt_generic_deinit($openMode);
        }
        return bin2hex($encryptedText);
    }

    // Decrypt Function for payment Gateway

    function decrypt($encryptedText, $key) {
        $secretKey = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $encryptedText = $this->hextobin($encryptedText);
        $openMode = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', 'cbc', '');
        mcrypt_generic_init($openMode, $secretKey, $initVector);
        $decryptedText = mdecrypt_generic($openMode, $encryptedText);
        $decryptedText = rtrim($decryptedText, "\0");
        mcrypt_generic_deinit($openMode);
        return $decryptedText;
    }

    //*********** Padding Function *********************

    function pkcs5_pad($plainText, $blockSize) {
        $pad = $blockSize - (strlen($plainText) % $blockSize);
        return $plainText . str_repeat(chr($pad), $pad);
    }

    //********** Hexadecimal to Binary function for php 4.0 version ********

    function hextobin($hexString) {
        $length = strlen($hexString);
        $binString = "";
        $count = 0;
        while ($count < $length) {
            $subString = substr($hexString, $count, 2);
            $packedString = pack("H*", $subString);
            if ($count == 0) {
                $binString = $packedString;
            } else {
                $binString .= $packedString;
            }
            $count += 2;
        }
        return $binString;
    }

    public function get_blog() {
        $this->db->order_by('id', 'DESC');
        $sql = $this->db->get('blogs');

        if ($sql->num_rows() > 0) {
            return $sql->result_array();
        } else {
            return false;
        }
    }

    public function get_pagi($limit, $start, $tbl) {
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'DESC');
        $sql = $this->db->get($tbl);

        if ($sql->num_rows() > 0) {
            return $sql->result_array();
        } else {
            return false;
        }
    }

    public function record_count($tbl) {
        return $this->db->count_all($tbl);
    }

    public function getlast_count($limit) {
        $this->db->select('id, title');
        $this->db->order_by('id', 'DESC');
        $this->db->where('report.status', '1');
        $sql = $this->db->get('report');
        $this->db->limit($limit);
        if ($sql->num_rows() > 0) {
            return $sql->result_array();
        } else {
            return false;
        }
    }

    public function report_list() {
        $this->db->select('report.id,report.title,report.report_desc,report.slug,category.name as cat_name,publisher.name as publisher_name,regions.name as regions_name,report_details.published_date,report_details.meta_keyword');
        $this->db->from('report');
        $this->db->join('report_details', 'report.id=report_details.id');
        $this->db->join('category', 'report.cat_id=category.id');
        $this->db->join('publisher', 'report.publisher_id=publisher.id');
        $this->db->join('regions', 'report.region_id= regions.id');
        $this->db->where('report.status', '1');
        $this->db->where('published_date', date('Y-m-d'));
//        $this->db->where('published_date', "2019-08-19");
//        $this->db->limit(0, 500);
        $query = $this->db->get();
//        $query->result_array();
//        echo $this->db->last_query();die();
        return $query->result_array();
    }


    public function reportList($start,$limit) {
        $this->db->select('report.id, title, meta_keyword, report_desc,published_date, slug');
        $this->db->join('report_details', 'report.id = report_details.id');
        $this->db->where('report.status', '1');
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit,$start);
        $sql = $this->db->get('report');

        if ($sql->num_rows() > 0) {
            return $sql->result_array();
        } else {
            return false;
        }
    }
}
