<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Apimodel');
    }

    public function fetchreports() {
        $search = $_POST['search'];
        $publisher=$_POST['publisher'];
        $reports = $this->Apimodel->posts_search_m($search,$publisher);
        if ($reports) {
            $rData = $reports;
        } else {
            $rData = $this->Apimodel->posts_search_mm($search,$publisher);
        }
        echo json_encode($rData);
    }

    public function exportdb($id){
        // print_r($id);die();

       // $url = "https://strabayassociates.com/api/dbfetch/".$id;
       // $postData["search"] = "";
       // $ch = curl_init();
       // curl_setopt($ch, CURLOPT_URL, $url);
       // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
       // curl_setopt($ch, CURLOPT_HEADER, false);
       // curl_setopt($ch, CURLOPT_POST, count($postData));
       // curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
       // $response = curl_exec($ch);
       // $err = curl_error($ch);
       // curl_close($ch);

       if ($err) {
        echo "cURL Error #:" . $err;
    } else {
//            dd($response);
        $data = json_decode($response);
        $this->insertintoReporttable($data);
    }
     // $reportsData = array();

     //  if ($data) {
     //        foreach ($data as $val) {
     //            $reportsData[$val->id]["report_id"] = $val->id;
     //            $reportsData[$val->id]["report_title"] = $val->title;
     //            $reportsData[$val->id]["publisher_id"] = $val->publisher_id;
     //            $reportsData[$val->id]["report_desc"] = $val->report_desc;
     //        }
     //    }
    // echo  "<pre>";
    // print_r($reportsData);
}

public function insertintoReporttable($data){
  //         echo  "<pre>";
  //         print_r($data);
  die();
  foreach ($data as $report) {
    $this->db->insert('report',$report);
}

}

public function getlocalData($offset) {       
    $this->db->where('id >', $offset);
    $this->db->limit(2000);
    $reports = $this->db->get('report');
        //print_r($reports->result_array());die;
    echo json_encode($reports->result());
}

}
