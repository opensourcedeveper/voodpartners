<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('data_model');
		// $this->load->model('paypalIPN');
	}

	public function index01() {


	}

	public function index() {
		$data['page'] = "Industry Research Report with Global and Regional Analysis and Trends";
		$data['page_header'] = "page-header";
		$data['letestReports'] = $this->data_model->letestReports();
		$data['press_release'] = $this->data_model->get_pagi(1, 0, 'press_release');
		$data['blogs'] = $this->data_model->get_pagi(3, 0, 'blogs');
		//
		$data['Record'] = array(
			'meta_keyword' => "Industry Research Report, Growth Research Report, Future Growth Analysis, paypal, Market Research Company",
			'meta_desc' => "paypal provides industry analysis report of global and regional trends with forecast period."
		);



		$cond = array('status' => 1);
		$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');

		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');

		// print_r($data);
		$this->load->view('web/home', $data);
	}

	public function about() {
		$data['page'] = "About paypal – Market Research Reports Solution";
		$data['page_header'] = "page-header1";
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name'), NULL, 'category');
		$data['Record'] = array(
			'meta_keyword' => " About Us, About paypal, paypal Global Market Research Company, economic reports",
			'meta_desc' => "paypal is a global aggregator and publisher of intelligence research report, industry reports and economic reports."
		);
		$data['Record']['canonical'] = base_url() . 'about-us';
		$cond = array('status' => 1);
		$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
		$this->load->view('web/about', $data);
	}
 
	public function contact() {
		if ($this->input->post()) {
			$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
			$this->form_validation->set_rules('email', 'Email', 'valid_emails|required');
			$this->form_validation->set_rules('phone', 'Phone', 'numeric|required');
			$this->form_validation->set_rules('job_title', 'Company', 'required|alpha_numeric_spaces');
			$this->form_validation->set_rules('company', 'Company', 'required|alpha_numeric_spaces');
			$this->form_validation->set_rules('sub', 'Company', 'required|alpha_numeric_spaces');
			$this->form_validation->set_rules('msg', 'Message', 'trim|required|alpha_numeric_spaces');
			if ($this->form_validation->run() == FALSE) {
				$data['page'] = "Contact Us for Industry Research Report";
				$data['page_header'] = "page-header1";
				$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name'), NULL, 'category');
				$data['Record'] = array('meta_keyword' => "Contact Us, Custom Research Report, Best solution for the research report",
					'meta_desc' => "Contact us for more details regarding market research report and we have the solution for custom reports."
				);
				$cond = array('status' => 1);
				$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
				$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
				$data['Record']['canonical'] = base_url() . 'contact-us';
				$this->load->view('web/contact', $data);
			}else{
				$ip = $this->input->ip_address();
				$to = $_POST['email'];
				$res = file_get_contents('https://www.iplocate.io/api/lookup/' . $ip);
				$res = json_decode($res);
				$Array['name'] = $_POST['name'];
				$Array['mail'] = $_POST['email'];
				$Array['job_title'] = $_POST['job_title'];
				$Array['company'] = $_POST['company'];
				$Array['phone'] = $_POST['phone'];
				$Array['country'] = $res->country;
				$Array['message'] = $_POST['msg'];
				$Array['report'] = $_POST['sub'];
				$Array['region'] = $res->continent;
				$Array['ip'] = $ip;
				$Array['website'] = "strabayassociates.com";
				$Array['source'] = "Contact Us";
				// $url = "https://strabayassociates.com/addLead";
				// $postData = $Array;
				// $ch = curl_init();
				// curl_setopt($ch, CURLOPT_URL, $url);
				// curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				// curl_setopt($ch, CURLOPT_HEADER, false);
				// curl_setopt($ch, CURLOPT_POST, count($postData));
				// curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
				// $output = curl_exec($ch);
				// curl_close($ch);


				$post = [
					'name' => $_POST['name'],
					'mail' => $_POST['email'],
					'job_title' => $_POST['job_title'],
					'company' => $_POST['company'],
					'phone' => $_POST['phone'],
					'country' => $res->country,
					'message' => $_POST['msg'],
					'report' => $_POST['sub'],
					'region' => $res->continent,
					'postal_code' => $res->postal_code,
					'subdivision' => $res->subdivision,
					'city' => $res->city,
					'ip' => $ip,
					'website' => 5,
					'source' => 7,
				];
				// $ch = curl_init('http://localhost//addLead');
				// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				// curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
				// $response = curl_exec($ch);
				// $err = curl_error($ch);
				// curl_close($ch);
				// var_dump($response);

				$data = json_decode($response);
				if ($err) {
					echo "cURL Error #:" . $err;
				} else {
					$data = json_decode($response);
				}

				$subject = 'Thank you for Contacting';
				$message = '<p>Dear ' . ucfirst($_POST['name']) . ',</p>';
				$message .= '<p>Thank you for contacting paypal .</p>';
				$message .= '<p>We have received your message and our representative will reach out to you at the earliest.<br/>Meanwhile, if you have any specific concerns/questions, please drop a line at <br/>sales@strabayassociates.com <br/>Have a good day ahead!</p><br/>';
				$message .= '<p><b>Best Regards,</b><br/>';
				$message .= 'paypal  Team<br/>';
				$message .= 'US: +1 990999999999<br/>';
				$message .= 'E-mail: sales@strabayassociates.com | Web: www.strabayassociates.com</p>';

				$this->data_model->sendMail($to, $subject, $message);

				$to = 'sales@strabayassociates.com';
				$subject = 'Contact Us Form:';
				$message = '<b>Dear Admin,</b><br/>';
				$message .= '<table border = "1">';
				$message .= '<tr><td>Name</td>';
				$message .= '<td>' . $_POST['name'] . '</td></tr>';
				$message .= '<tr><td>Email</td>';
				$message .= '<td>' . $_POST['email'] . '</td></tr>';
				$message .= '<tr><td>Phone</td>';
				$message .= '<td>' . $_POST['phone'] . '</td></tr>';
				$message .= '<tr><td>Job Title</td>';
				$message .= '<td>' . $_POST['job-title'] . '</td></tr>';
				$message .= '<tr><td>Company</td>';
				$message .= '<td>' . $_POST['company'] . '</td></tr>';
				$message .= '<tr><td>Subject</td>';
				$message .= '<td>' . $_POST['sub'] . '</td></tr>';
				$message .= '<tr><td>Message</td>';
				$message .= '<td>' . $_POST['msg'] . '</td></tr>';
				if ($_POST['source']) {
					$message .= '<tr><td>Source</td>';
					$message .= '<td>' . $_POST['source'] . '</td></tr>';
				} else {
					$message .= '<tr><td>Source</td>';
					$message .= '<td>paypal Contact Form</td></tr>';
				}
				$message .= '<tr><td>IP</td>';
				$message .= '<td>' . $ip . '</td></tr>';
				$message .= '</table></p>';

				$this->data_model->sendMail($to, $subject, $message);
				redirect(base_url() . 'thankYou');
			}
		}
		else {
			$data['page'] = "Contact Us for Industry Research Report";
			$data['page_header'] = "page-header1";
			$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name'), NULL, 'category');
			$data['Record'] = array('meta_keyword' => "Contact Us, Custom Research Report, Best solution for the research report",
				'meta_desc' => "Contact us for more details regarding market research report and we have the solution for custom reports."
			);
			$data['Record']['canonical'] = base_url() . 'contact-us';
			$cond = array('status' => 1);
			$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
			$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
			$this->load->view('web/contact', $data);
		}
	}

	public function services() {
		$data['page'] = "Our Services - Syndicated Market Reports, Customized Research Program, Consulting Reports";
		$data['page_header'] = "page-header2";
		$cond = array('title' => 'Services');
		$tbls = NULL;
		$fields = array('page_content');
		$data['Records'] = $this->data_model->get($cond, $tbls, $fields, NULL, 'pages')[0]['page_content'];
		$data['Record'] = array('meta_keyword' => "Our Services, Syndicated Market Reports, Customized Research Program, Consulting Reports",
			'meta_desc' => "paypal provides different services like Syndicated Market Reports, Customized Research Program, Consulting Reports, Domain-specific analytics and Bench-marking study of the market."
		);
		$cond = array('status' => 1);
		$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
		$this->load->view('web/services', $data);
	}

	public function termsConditions() {
		$data['page'] = "Terms and Conditions";
		$data['page_header'] = "page-header2";
		$cond = array('title' => 'terms');
		$tbls = NULL;
		$fields = array('page_content');
		$data['Record'] = $this->data_model->get($cond, $tbls, $fields, NULL, 'pages')[0]['page_content'];$cond = array('status' => 1);

		$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
		$this->load->view('web/terms', $data);
	}

	public function privacyPolicy() {
		$data['page'] = "Privacy Policy";
		$data['page_header'] = "page-header2";
		$cond = array('title' => 'policy');
		$tbls = NULL;
		$fields = array('page_content');
		$data['Record'] = $this->data_model->get($cond, $tbls, $fields, NULL, 'pages')[0]['page_content'];$cond = array('status' => 1);

		$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
		$this->load->view('web/policy', $data);
	}

	public function return_policy() {
		$data['page'] = "Return Policy";
		$data['page_header'] = "page-header2";
		$cond = array('status' => 1);
		$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
		$this->load->view('web/return_policy', $data);
	}

	public function disclaimer() {
		$data['page'] = "Disclaimer";
		$data['page_header'] = "page-header2";
		$cond = array('status' => 1);
		$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
		$this->load->view('web/disclaimer', $data);
	}

	public function format_delivery() {
		$data['page'] = "Format and Delivery";
		$data['page_header'] = "page-header2";
		$cond = array('status' => 1);
		$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
		$this->load->view('web/format_delivery', $data);
	}

	public function how_to_order() {
		$data['page'] = "How To Order";
		$data['page_header'] = "page-header2";
		$cond = array('status' => 1);
		$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
		$this->load->view('web/how_to_order', $data);
	}

	public function categories() {
		$data['page'] = "Global Market Research Reports, Market Survey, and Market Segmentation";
		$data['page_header'] = "page-header1";
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug','img'), NULL, 'category');

		$data['page_name'] = 'Categories';
		$cond = array('status' => 1);
		$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
		$this->load->view('web/category', $data);
	}


	public function categoryDetails($slug = "", $page = 1) {
		$cond = array('slug' => $slug);
		$catid = $this->data_model->get($cond, NULL, array('id'), NULL, 'category')[0];
		if ($catid) {
			$cat_id=$catid['id'];
		} else {
			redirect(base_url(), 'refresh');
		}


		$per_page = 6;
		$tbls[0] = array('name' => 'report_details', 'condi' => 'report.id = report_details.id');

		$data['page'] = "Global Market Research Reports, Market Survey, and Market Segmentation";
		$data['page_header'] = "page-header1";
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug','img'), NULL, 'category');


		$res = $this->db->select("id")->from('report')->where('cat_id',$cat_id)->count_all_results();  
		if ($res) {
			$total =  $res;
		} else {
			$total = 0;
		}

		$limit = array('limit' => $per_page, 'start' => ($per_page * $page) - $per_page);

		if ($cat_id != 0) {
			$Record = $this->data_model->get(array('id' => $cat_id), NULL, array('id', 'name', 'description', 'img', 'meta_keyword', 'meta_desc','slug'), NULL, 'category')[0];
			$data['Records'] = $this->data_model->get(array('cat_id' => $cat_id), $tbls, array('report.id', 'title', 'meta_keyword', 'report_desc', 'published_date','slug'), $limit, 'report', 'desc');
			$data['Record'] = $Record;
			$data['page'] = $data['Record']['meta_keyword'];
			$data['Record']['canonical'] = base_url() . 'categories/' . $Record['id'] . '/' . str_replace(' ', '-', $Record['name']);
		}

		if ($total % $per_page == 0) {
			$data['pages'] = floor(($total / $per_page));
		} else {
			$data['pages'] = floor(($total / $per_page)) + 1;
		}

		if ($total == 0) {
			$data['start'] = 0;
		} else {
			$data['start'] = $limit['start'] + 1;
		}

		if ($total < $limit['start'] + $per_page) {
			$data['end'] = $total;
		} else {
			$data['end'] = $limit['start'] + $per_page;
		}

		$data['total'] = $total;
		$data['current'] = $page;
		$data['page_name'] = 'Categories';
            // print_r($data['Record']);
		$cond = array('status' => 1);
		$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
		$this->load->view('web/category-details', $data);
	}

	public function report($slug) {
		$cond = array('report.slug' => $slug, 'report.status' => "1");
		$tbls[0] = array('name' => 'report_details', 'condi' => 'report.id = report_details.id');
		$fields = array('report.id', 'title', 'report_desc', 'cat_id', 'publisher_id', 'region_id', 'toc', 'list_tbl_fig', 'published_date', 'pages', 'single_price', 'multi_price', 'ent_price', 'published_status', 'meta_title', 'meta_desc', 'meta_keyword','slug');
		$Record = $this->data_model->get($cond, $tbls, $fields, NULL, 'report')[0];
		$data['Record'] = $Record;

		$data['page'] = $Record['meta_title'];
		$data['page_header'] = "page-header6";
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name'), NULL, 'category');

		$tbls[0] = array('name' => 'report_details', 'condi' => 'report.id = report_details.id');

		$limit = array('limit' => 5, 'start' => 0);

		$data['Related'] = $this->data_model->get(array('cat_id' => $Record['cat_id'], 'report.id !=' => $Record['id']), $tbls, array('report.id', 'title', 'report_desc', 'meta_keyword', 'published_date','slug'), $limit, 'report', 'desc');
		/* Added For Canonical Tag */
		$data['Record']['canonical'] = base_url() . 'report/'. strtolower($Record['slug']);
		/* End Canonical Tag */
		$cond = array('status' => 1);
		$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
		if ($Record) {
			$this->load->view('web/single_report', $data);
		} else {
			redirect(base_url(), 'refresh');
		}
	}

	public function thankYou() {
		$data['title'] = "Thank you";
		$data['page'] = "Thank you";
		$data['page_header'] = "page-header2";
		$cond = array('status' => 1);
		$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
		$this->load->view('web/thankYou', $data);
	}


	public function pressRelease() {
		$config = array();
		$config["base_url"] = base_url() . "web/press-releases";
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$config["total_rows"] = $this->data_model->record_count('press_release');
		$this->pagination->initialize($config);
		$data['page'] = "Press Release";
		$data['page_header'] = "page-header1";
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['Records'] = $this->data_model->get_pagi($config["per_page"], $page, 'press_release');
		$data["links"] = $this->pagination->create_links();
		$data['Record'] = array(
			'meta_keyword' => "paypal , Global Market Research Reports, industry analysis reports, consulting services, syndicated research reports, Business Research, Market Size and Forecasts",
			'meta_desc' => "Stay updated with recent press releases from paypal , covering various industries worldwide."
		);
		$data['Record']['canonical'] = base_url() . 'press-releases';
		$data['Recent'] = $this->data_model->letestReports();
		$cond = array('status' => 1);
		$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
		$this->load->view('web/press_releases', $data);
	}

	public function press_release($slug) {
		$Record = $this->data_model->get(array('slug' => $slug), NULL, array('id', 'title', 'description','image','slug', 'metatitle', 'metadesc', 'metakeyword', 'created_at'), NULL, 'press_release')[0];
		if (!$Record) {
			redirect(base_url());
		}
		$data['Record'] = $Record;
		$data['Record']['canonical'] = base_url() . 'press_release/' . strtolower($Record['slug']);
		$data['page'] = $Record['metatitle'];
		$data['page_header'] = "page-header1";
		$limit = array('limit' => 6, 'start' => 0);
		$data['press'] = $this->data_model->get(NULL, NULL, array('id', 'title', 'slug','image'), $limit, 'press_release', 'desc');$cond = array('status' => 1);

		$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
		$this->load->view('web/press_release', $data);
	}

	public function buyNow($slug) {
		if ($_POST) {
			$ip = $this->input->ip_address();
			$res = file_get_contents('https://www.iplocate.io/api/lookup/' . $ip);
			$res = json_decode($res);
			$buynowfield['name'] = $_POST['name'];
			$buynowfield['mail'] = $_POST['email'];
			$buynowfield['job_title'] = $_POST['title'];
			$buynowfield['company'] = $_POST['company'];
			$buynowfield['phone'] = $_POST['contact'];
			$buynowfield['country'] = $_POST['country'];
			$buynowfield['report'] = '<a href="https://www.strabayassociates.com/report/'.$id.'">'.$_POST['reportTitle'].'</a>';
			$buynowfield['region'] = $res->continent;
			$buynowfield['ip'] = $ip;
			$buynowfield['website'] = "strabayassociates.com";
			$buynowfield['source'] = "Buynow";
			$buynowfield['message']= "Payment methord - ".$_POST['optionsRadios']." ,Price - $".$_POST['price'].", Address - ".$_POST['address']." ,City - ".$_POST['city']." ,State - ".$_POST['state']." ,Zip - ".$_POST['zip'];

			// $url = "https://strabayassociates.com/addLead";
			// $postData = $buynowfield;
			// $ch = curl_init();
			// curl_setopt($ch, CURLOPT_URL, $url);
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			// curl_setopt($ch, CURLOPT_HEADER, false);
			// curl_setopt($ch, CURLOPT_POST, count($postData));
			// curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
			// $output = curl_exec($ch);
			// curl_close($ch);


			$post = [
				'name' => $_POST['name'],
				'mail' => $_POST['email'],
				'job_title' => isset($_POST['title']) ? $_POST['title'] : "NA",
				'company' => isset($_POST['company']) ? $_POST['company'] : "NA",
				'phone' => isset($_POST['contact']) ? $_POST['contact'] : $_POST['phone'],
				'country' => $res->country,
				'message' => "Payment methord - ".$_POST['optionsRadios']." ,Price - $".$_POST['price'].", Address - ".$_POST['address']." ,City - ".$_POST['city']." ,State - ".$_POST['state']." ,Zip - ".$_POST['zip'],
				'report' => '<a href="https://www.strabayassociates.com/report/'.$id.'">'.$_POST['reportTitle'].'</a>',
				'region' => $res->continent,
				'postal_code' => $res->postal_code,
				'subdivision' => $res->subdivision,
				'city' => $res->city,
				'ip' => $ip,
				'website' => 5,
				'source' => 8,
			];
			// $ch = curl_init('http://localhost//addLead');
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			// $response = curl_exec($ch);
			// $err = curl_error($ch);
			// curl_close($ch);

			$data = json_decode($response);
			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				$data = json_decode($response);
			}

			if ($_POST['optionsRadios'] == "wireTransfer") {
				$to = $_POST['email'];
				$subject = 'Order_paypal  :' . $_POST['reportTitle'];
				$message = '<p>Thank you for ordering ' . $_POST['reportTitle'] . '<br/>';
				$message .= 'Our sales representative will reach out to you shortly with the Bank Details for wire transfer!</p><br/><br/>';
				$message .= '<p><b>Warm Regards,</b><br/>';
				$message .= 'Nikolai Egger | Corporate Sales Specialist<br/>';
				$message .= 'E-mail: sales@strabayassociates.com | Web: www.strabayassociates.com</p>';
				$to = 'sales@strabayassociates.com';
				$subject = 'Buy Now- Wire Transfer:' . $_POST['reportTitle'];
				$message = '<b>Dear Admin,</b><br/>';
				$message .= '<table border = "1">';
				$message .= '<tr><td>Report ID</td>';
				$message .= '<td>' . $_POST['reportid'] . '</td></tr>';
				$message .= '<tr><td>Report Title</td>';
				$message .= '<td>' . $_POST['reportTitle'] . '</td></tr>';
				$message .= '<tr><td>Report Amount</td>';
				$message .= '<td>' . $_POST['price'] . '</td></tr>';
				$message .= '<tr><td>Name</td>';
				$message .= '<td>' . $_POST['name'] . '</td></tr>';
				$message .= '<tr><td>Email</td>';
				$message .= '<td>' . $_POST['email'] . '</td></tr>';
				$message .= '<tr><td>Phone</td>';
				$message .= '<td>' . $_POST['contact'] . '</td></tr>';
				$message .= '<tr><td>Company</td>';
				$message .= '<td>' . $_POST['company'] . '</td></tr>';
				$message .= '<tr><td>Designation</td>';
				$message .= '<td>' . $_POST['title'] . '</td></tr>';
				$message .= '<tr><td>Address</td>';
				$message .= '<td>' . $_POST['address'] . '</td></tr>';
				$message .= '<tr><td>City</td>';
				$message .= '<td>' . $_POST['city'] . '</td></tr>';
				$message .= '<tr><td>State</td>';
				$message .= '<td>' . $_POST['state'] . '</td></tr>';
				$message .= '<tr><td>Country</td>';
				$message .= '<td>' . $_POST['country'] . '</td></tr>';
				$message .= '<tr><td>Zip</td>';
				$message .= '<td>' . $_POST['zip'] . '</td></tr>';
				$message .= '<tr><td>IP</td>';
				$message .= '<td>' . $ip . '</td></tr>';
				$message .= '</table></p>';
				$this->data_model->sendMail($to, $subject, $message);

				redirect(base_url() . 'thankYou');
			} else {
				$oid = $this->data_model->getLast('order_id', array('field' => 'tid', 'type' => 'desc'), 'transactions')['order_id'];

				if ($oid) {
					$Array['order_id'] = $oid + 1;
				} else {
					$Array['order_id'] = 1201;
				}
				$Array['name'] = $_POST['name'];
				$Array['methord'] = $_POST['optionsRadios'];
				$Array['mail'] = $_POST['email'];
				$Array['contact'] = $_POST['contact'];
				$Array['company'] = $_POST['company'];
				$Array['title'] = $_POST['title'];
				$Array['report'] = $_POST['reportTitle'];
				$Array['address'] = $_POST['address'];
				$Array['city'] = $_POST['city'];
				$Array['state'] = $_POST['state'];
				$Array['country'] = $_POST['country'];
				$Array['zip'] = $_POST['zip'];
				$id = $this->data_model->add($Array, 'transactions');

				$Record = $this->data_model->get(array('tid' => $id), NULL, array('tid', 'order_id', 'methord', 'name', 'mail', 'contact', 'city', 'state', 'address', 'country', 'zip'), NULL, 'transactions')[0];

				if ($_POST['optionsRadios'] == 'ccAvenue') {

					$to = $_POST['email'];
					$subject = 'Order_paypal  :' . $_POST['reportTitle'];
					$message = '<p>Thank you for ordering ' . $_POST['reportTitle'] . '<br/>';
					$message .= 'Our sales representative will reach out to you shortly for further communication.</p><br/><br/>';
					$message .= '<p><b>Warm Regards,</b><br/>';
					$message .= 'Nikolai Egger | Corporate Sales Specialist<br/>';
					$message .= 'E-mail: sales@strabayassociates.com | Web: www.strabayassociates.com</p>';

					$to = 'sales@strabayassociates.com';
					$subject = 'Buy Now- CCAvenue:' . $_POST['reportTitle'];
					$message = '<b>Dear Admin,</b><br/>';
					$message .= '<table border = "1">';
					$message .= '<tr><td>Report ID</td>';
					$message .= '<td>' . $_POST['reportid'] . '</td></tr>';
					$message .= '<tr><td>Report Title</td>';
					$message .= '<td>' . $_POST['reportTitle'] . '</td></tr>';
					$message .= '<tr><td>Report Amount</td>';
					$message .= '<td>' . $_POST['price'] . '</td></tr>';
					$message .= '<tr><td>Name</td>';
					$message .= '<td>' . $_POST['name'] . '</td></tr>';
					$message .= '<tr><td>Email</td>';
					$message .= '<td>' . $_POST['email'] . '</td></tr>';
					$message .= '<tr><td>Phone</td>';
					$message .= '<td>' . $_POST['contact'] . '</td></tr>';
					$message .= '<tr><td>Company</td>';
					$message .= '<td>' . $_POST['company'] . '</td></tr>';
					$message .= '<tr><td>Designation</td>';
					$message .= '<td>' . $_POST['title'] . '</td></tr>';
					$message .= '<tr><td>Address</td>';
					$message .= '<td>' . $_POST['address'] . '</td></tr>';
					$message .= '<tr><td>City</td>';
					$message .= '<td>' . $_POST['city'] . '</td></tr>';
					$message .= '<tr><td>State</td>';
					$message .= '<td>' . $_POST['state'] . '</td></tr>';
					$message .= '<tr><td>Country</td>';
					$message .= '<td>' . $_POST['country'] . '</td></tr>';
					$message .= '<tr><td>Zip</td>';
					$message .= '<td>' . $_POST['zip'] . '</td></tr>';
					$message .= '<tr><td>IP</td>';
					$message .= '<td>' . $ip . '</td></tr>';
					$message .= '</table></p>';
					$this->data_model->sendMail($to, $subject, $message);

					$Array1['tid'] = $Record['tid'];
					$Array1['merchant_id'] = '142405';
					$Array1['order_id'] = $Record['order_id'];
					$Array1['amount'] = $_POST['price'];
					$Array1['currency'] = 'USD';
					$Array1['redirect_url'] = base_url() . 'paymentResponce';
					$Array1['cancel_url'] = base_url() . 'paymentResponce';
					$Array1['language'] = 'EN';
					$Array1['billing_name'] = $Record['name'];
					$Array1['billing_email'] = $Record['mail'];
					$Array1['billing_tel'] = $Record['contact'];
					$Array1['billing_city'] = $Record['city'];
					$Array1['billing_state'] = $Record['state'];
					$Array1['billing_address'] = $Record['address'];
					$Array1['billing_country'] = $Record['country'];
					$Array1['billing_zip'] = $Record['zip'];

					$this->data_model->makePayment($Array1);
				} elseif ($_POST['optionsRadios'] == 'payPal') { 
					$to = $_POST['email'];
					$subject = 'Order_paypal  :' . $_POST['reportTitle'];
					$message = '<p>Thank you for ordering ' . $_POST['reportTitle'] . '<br/>';
					$message .= 'Our sales representative will reach out to you shortly for further communication.</p><br/><br/>';
					$message .= '<p><b>Warm Regards,</b><br/>';
					$message .= 'Nikolai Egger | Corporate Sales Specialist<br/>';
					$message .= 'E-mail:�sales@strabayassociates.com�| Web:�www.strabayassociates.com</p>';

					$to = 'sales@strabayassociates.com';
					$subject = 'Buy Now- PayPal:' . $_POST['reportTitle'];
					$message = '<table border = "1">';
					$message .= '<tr><td>Report ID</td>';
					$message .= '<td>' . $_POST['reportid'] . '</td></tr>';
					$message .= '<tr><td>Report Title</td>';
					$message .= '<td>' . $_POST['reportTitle'] . '</td></tr>';
					$message .= '<tr><td>Report Amount</td>';
					$message .= '<td>' . $_POST['price'] . '</td></tr>';
					$message .= '<tr><td>Name</td>';
					$message .= '<td>' . $_POST['name'] . '</td></tr>';
					$message .= '<tr><td>Email</td>';
					$message .= '<td>' . $_POST['email'] . '</td></tr>';
					$message .= '<tr><td>Phone</td>';
					$message .= '<td>' . $_POST['contact'] . '</td></tr>';
					$message .= '<tr><td>Company</td>';
					$message .= '<td>' . $_POST['company'] . '</td></tr>';
					$message .= '<tr><td>Designation</td>';
					$message .= '<td>' . $_POST['title'] . '</td></tr>';
					$message .= '<tr><td>Address</td>';
					$message .= '<td>' . $_POST['address'] . '</td></tr>';
					$message .= '<tr><td>City</td>';
					$message .= '<td>' . $_POST['city'] . '</td></tr>';
					$message .= '<tr><td>State</td>';
					$message .= '<td>' . $_POST['state'] . '</td></tr>';
					$message .= '<tr><td>Country</td>';
					$message .= '<td>' . $_POST['country'] . '</td></tr>';
					$message .= '<tr><td>Zip</td>';
					$message .= '<td>' . $_POST['zip'] . '</td></tr>';
					$message .= '<tr><td>IP</td>';
					$message .= '<td>' . $ip . '</td></tr>';
					$message .= '</table></p>';
					$this->data_model->sendMail($to, $subject, $message);
					$data['title'] = $_POST['reportTitle'];
					$data['id'] = $_POST['reportid'];
					$data['amount'] = $_POST['price'];
					$data['cancel'] = base_url() . 'paypalResp';
					$data['return'] = base_url() . 'paypalResp';

					$data['page'] = "PayPal Payment";
					$data['page_header'] = "page-header2";

					$this->load->view('web/payPalForm', $data);

				} elseif ($_POST['optionsRadios'] == 'razorPay') {
					$to = $_POST['email'];
					$subject = 'Order_paypal  :' . $_POST['reportTitle'];
					$message = '<p>Thank you for ordering ' . $_POST['reportTitle'] . '<br/>';
					$message .= 'Our sales representative will reach out to you shortly for further communication.</p><br/><br/>';
					$message .= '<p><b>Warm Regards,</b><br/>';
					$message .= 'Nikolai Egger | Corporate Sales Specialist<br/>';
					$message .= 'E-mail:�sales@strabayassociates.com�| Web:�www.strabayassociates.com</p>';

					$to = 'sales@strabayassociates.com';
					$subject = 'Buy Now- razorPay:' . $_POST['reportTitle'];
					$message = '<table border = "1">';
					$message .= '<tr><td>Report ID</td>';
					$message .= '<td>' . $_POST['reportid'] . '</td></tr>';
					$message .= '<tr><td>Report Title</td>';
					$message .= '<td>' . $_POST['reportTitle'] . '</td></tr>';
					$message .= '<tr><td>Report Amount</td>';
					$message .= '<td>' . $_POST['price'] . '</td></tr>';
					$message .= '<tr><td>Name</td>';
					$message .= '<td>' . $_POST['name'] . '</td></tr>';
					$message .= '<tr><td>Email</td>';
					$message .= '<td>' . $_POST['email'] . '</td></tr>';
					$message .= '<tr><td>Phone</td>';
					$message .= '<td>' . $_POST['contact'] . '</td></tr>';
					$message .= '<tr><td>Company</td>';
					$message .= '<td>' . $_POST['company'] . '</td></tr>';
					$message .= '<tr><td>Designation</td>';
					$message .= '<td>' . $_POST['title'] . '</td></tr>';
					$message .= '<tr><td>Address</td>';
					$message .= '<td>' . $_POST['address'] . '</td></tr>';
					$message .= '<tr><td>City</td>';
					$message .= '<td>' . $_POST['city'] . '</td></tr>';
					$message .= '<tr><td>State</td>';
					$message .= '<td>' . $_POST['state'] . '</td></tr>';
					$message .= '<tr><td>Country</td>';
					$message .= '<td>' . $_POST['country'] . '</td></tr>';
					$message .= '<tr><td>Zip</td>';
					$message .= '<td>' . $_POST['zip'] . '</td></tr>';
					$message .= '<tr><td>IP</td>';
					$message .= '<td>' . $ip . '</td></tr>';
					$message .= '</table></p>';
					$this->data_model->sendMail($to, $subject, $message);
					$data['title'] = $_POST['reportTitle'];
					$data['id'] = $_POST['reportid'];
					$data['amount'] = $_POST['price'];
					$data['cancel'] = base_url() . 'paypalResp';
					$data['return'] = base_url() . 'paypalResp';

					$data['page'] = "Razor Pay Payment";
					$data['page_header'] = "page-header2";

					$data['itemInfo'] = [
						"key" => RAZOR_KEY_ID,
						"price" => round($_POST['price']),
						"name" => $_POST['name'],
						"currency" => "USD",
						"description" => $_POST['reportTitle'],
						"image" => "https://www.strabayassociates.com/web_assets/images/logo.png",
						"prefill" => [
							"name" => $_POST['name'],
							"email" => $_POST['email'],
							"contact" => $_POST['contact'],
						],
						"notes" => [
							"address" => "INIDA",
							"merchant_order_id" => $_POST['reportid'],
						],
						"theme" => [
							"color" => "#F37254"
						],
						"order_id" => $_POST['reportid'],
					];
					$data['return_url'] = site_url() . 'razorpay/callback';
					$data['surl'] = site_url();
					;
					$data['furl'] = site_url();
					;
					$data['currency_code'] = 'USD';
					$this->load->view('razorpay/checkout', $data);
				}
			}
		} else {
			$cond = array('report.slug' => $slug);
			$tbls[0] = array('name' => 'report_details', 'condi' => 'report.id = report_details.id');
			$fields = array('report.id', 'title', 'single_price', 'multi_price', 'ent_price', 'meta_title', 'meta_keyword','slug');
			$data['Report'] = $this->data_model->get($cond, $tbls, $fields, NULL, 'report')[0];
			$data['price'] = @$_GET['price'] != "" ? @$_GET['price'] : "single_price";
			$data['mode'] = @$_GET['mode'] != "" ? @$_GET['mode'] : "";
			$data['type'] = @$_GET['type'] != "" ? @$_GET['type'] : "";
			$data['page'] = 'Buy Now';
			$data['page_header'] = "page-header2";
			$cond = array('status' => 1);
			$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
			$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
			$this->load->view('web/buyNow', $data);
		}
	}

	public function paymentResponce($value = '') {
		redirect(base_url() . 'thankYou');
	}

	public function paypalResp($value = '') {
		redirect(base_url() . 'thankYou');
	}

	public function request_sample($slug) {
		if ($_POST) {
			if(substr($_POST['email'],strpos($_POST['email'],"@"))=="@ssemarketing.net"){
				redirect(base_url() . 'thankYou');
			}
			if(substr($_POST['email'],strpos($_POST['email'],"@"))=="@comcast.net"){
				redirect(base_url() . 'thankYou');
			}
			if($_POST['phone']=="+1 213 425 1453"){
				redirect(base_url() . 'thankYou');
			}
			$ip = $this->input->ip_address();

			$res = file_get_contents('https://www.iplocate.io/api/lookup/' . $ip);
			$res = json_decode($res);

            // curl call for CRM
			$Array['name'] = $_POST['name'];
			$Array['mail'] = $_POST['email'];
            //$Array['job_title'] = isset($_POST['job_title']) ? $_POST['job_title'] : "NA";
			$Array['job_title'] = isset($_POST['title']) ? $_POST['title'] : "NA";
			$Array['company'] = isset($_POST['company']) ? $_POST['company'] : "NA";
			$Array['phone'] = isset($_POST['contact']) ? $_POST['contact'] : $_POST['phone'];
			$Array['country'] = isset($_POST['country']) ? $_POST['country'] : $res->country;
			$Array['message'] = isset($_POST['message']) ? $_POST['message'] : "Enquire Before Buying";
			$Array['report'] = isset($_POST['report']) ? $_POST['report'] : "NA";
			$Array['region'] = $res->continent;
            // $Array['region'] = "North America";
			$Array['ip'] = $ip;
			$Array['website'] = "strabayassociates.com";
			$Array['source'] = "Request Sample";

			// $url = "https://strabayassociates.com/addLead";
			// $postData = $Array;
			// $ch = curl_init();
			// curl_setopt($ch, CURLOPT_URL, $url);
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			// curl_setopt($ch, CURLOPT_HEADER, false);
			// curl_setopt($ch, CURLOPT_POST, count($postData));
			// curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
			// $output = curl_exec($ch);
			// curl_close($ch);


			$post = [
				'name' => $_POST['name'],
				'mail' => $_POST['email'],
				'job_title' => isset($_POST['title']) ? $_POST['title'] : "NA",
				'company' => isset($_POST['company']) ? $_POST['company'] : "NA",
				'phone' => isset($_POST['contact']) ? $_POST['contact'] : $_POST['phone'],
				'country' => $res->country,
				'message' => $_POST['message'],
				'report' => $_POST['report'],
				'region' => $res->continent,
				'postal_code' => $res->postal_code,
				'subdivision' => $res->subdivision,
				'city' => $res->city,
				'ip' => $ip,
				'website' => 5,
				'source' => 1,
			];
			// $ch = curl_init('http://localhost//addLead');
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			// $response = curl_exec($ch);
			// $err = curl_error($ch);
			// curl_close($ch);
			// var_dump($response);

			$data = json_decode($response);
			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				$data = json_decode($response);
			}

			$to = $_POST['email'];
			$subject = 'Request Sample:' . $_POST['report'];
			$message = '<p>Hello ' . ucfirst($_POST['name']) . '</p>';
			$message .= '<p>Thanks for showing interest in the research report ' . $_POST['report'] . '</p>';
			$message .= '<p>Our team member will reach out to you in order to understand your requirements and help you better.<br/>We look forward to assist you!</p><br/>';
			$message .= '<p><b>Best Regards,</b><br/>';
			$message .= 'paypal  Team<br/>';
			$message .= 'US: +1 990999999999<br/>';
			$message .= 'E-mail: sales@strabayassociates.com | Web: www.strabayassociates.com</p>';

			$this->data_model->sendMail($to, $subject, $message);

			$to = 'sales@strabayassociates.com';
			$subject = 'Request Sample:' . $_POST['report'];
			$message = '<b>Dear Admin,</b><br/>';
			$message .= '<table border = "1">';
			$message .= '<tr><td>Report Title</td>';
			$message .= '<td>' . $_POST['report'] . '</td></tr>';
			$message .= '<tr><td>Name</td>';
			$message .= '<td>' . $_POST['name'] . '</td></tr>';
			$message .= '<tr><td>Email</td>';
			$message .= '<td>' . $Array['mail'] . '</td></tr>';
			$message .= '<tr><td>Phone</td>';
			$message .= '<td>' . $Array['phone'] . '</td></tr>';
			$message .= '<tr><td>Company</td>';
			$message .= '<td>' . $Array['company'] . '</td></tr>';
			$message .= '<tr><td>Designation</td>';
			$message .= '<td>' . $Array['job_title'] . '</td></tr>';
			$message .= '<tr><td>Country</td>';
			$message .= '<td>' . $Array['country'] . '</td></tr>';
			$message .= '<tr><td>Source</td>';
			$message .= '<td>paypal  Request Sample</td></tr>';
			$message .= '<tr><td>Message</td>';
			$message .= '<td>' . $_POST['message'] . '</td></tr>';
			$message .= '<tr><td>IP</td>';
			$message .= '<td>' . $ip . '</td></tr>';
			$message .= '</table></p>';


			$this->data_model->sendMail($to, $subject, $message);

			redirect(base_url() . 'thankYou');
		} else {
			$cond = array('report.slug' => $slug);
			$tbls[0] = array('name' => 'report_details', 'condi' => 'report.id = report_details.id');
			$fields = array('report.id', 'title', 'report_desc', 'cat_id', 'publisher_id', 'region_id', 'toc', 'list_tbl_fig', 'published_date', 'pages', 'single_price', 'multi_price', 'ent_price', 'published_status', 'meta_title', 'meta_desc', 'meta_keyword','slug');
			$Record = $this->data_model->get($cond, $tbls, $fields, NULL, 'report')[0];
			$data['Record'] = $Record;

			$data['page'] = "Request Sample";
			$data['page_header'] = "page-header3";
			$tbls[0] = array('name' => 'report_details', 'condi' => 'report.id = report_details.id');

			$limit = array('limit' => 5, 'start' => 0);

			$data['Record']['canonical'] = base_url() . 'report/' . strtolower($Record['slug']);

			$data['countries'] = $this->config->item('countries');
			$cond = array('status' => 1);
			$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
			$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
			if ($Record) {
				$this->load->view('web/requestSamplenew', $data);
			} else {
				redirect(base_url());
			}
		}
	}

	public function check_discount($slug) {
		if ($_POST) {
			if(substr($_POST['email'],strpos($_POST['email'],"@"))=="@ssemarketing.net"){
				redirect(base_url() . 'thankYou');
			}
			if(substr($_POST['email'],strpos($_POST['email'],"@"))=="@comcast.net"){
				redirect(base_url() . 'thankYou');
			}
			if($_POST['phone']=="+1 213 425 1453"){
				redirect(base_url() . 'thankYou');
			}
			$ip = $this->input->ip_address();
			$res = file_get_contents('https://www.iplocate.io/api/lookup/' . $ip);
			$res = json_decode($res);

            // curl call for CRM
			$Array['name'] = $_POST['name'];
			$Array['mail'] = $_POST['email'];
			$Array['job_title'] = isset($_POST['title']) ? $_POST['title'] : "NA";
			$Array['company'] = isset($_POST['company']) ? $_POST['company'] : "NA";
			$Array['phone'] = isset($_POST['contact']) ? $_POST['contact'] : $_POST['phone'];
			$Array['country'] = isset($_POST['country']) ? $_POST['country'] : $res->country;
			$Array['message'] = isset($_POST['message']) ? $_POST['message'] : "NA";
			$Array['report'] = $_POST['report'];
			$Array['region'] = $res->continent;
			$Array['ip'] = $ip;
			$Array['website'] = "strabayassociates.com";
			$Array['source'] = "Check Discount";


			// $url = "https://strabayassociates.com/addLead";
			// $postData = $Array;
			// $ch = curl_init();
			// curl_setopt($ch, CURLOPT_URL, $url);
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			// curl_setopt($ch, CURLOPT_HEADER, false);
			// curl_setopt($ch, CURLOPT_POST, count($postData));
			// curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
			// $output = curl_exec($ch);
			// curl_close($ch);


			$post = [
				'name' => $_POST['name'],
				'mail' => $_POST['email'],
				'job_title' => isset($_POST['title']) ? $_POST['title'] : "NA",
				'company' => isset($_POST['company']) ? $_POST['company'] : "NA",
				'phone' => isset($_POST['contact']) ? $_POST['contact'] : $_POST['phone'],
				'country' => $res->country,
				'message' => $_POST['message'],
				'report' => $_POST['report'],
				'region' => $res->continent,
				'postal_code' => $res->postal_code,
				'subdivision' => $res->subdivision,
				'city' => $res->city,
				'ip' => $ip,
				'website' => 5,
				'source' => 2,
			];
			// $ch = curl_init('http://localhost//addLead');
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			// $response = curl_exec($ch);
			// $err = curl_error($ch);
			// curl_close($ch);
			// var_dump($response);

			$data = json_decode($response);
			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				$data = json_decode($response);
			}


			$to = $_POST['email'];
			$subject = 'Thank you for requesting a  Discount on:' . $_POST['report'];
			$message = '<p>Hello ' . ucfirst($_POST['name']) . '</p>';
			$message .= '<p>Thanks for showing interest in the research report ' . $_POST['report'] . '</p>';
			$message .= '<p>Our Sales representative will get in touch with you at the earliest to offer the best possible discount on this report.<br/>We look forward to a long term business relationship with you.</p><br/>';
			$message .= '<p><b>Best Regards,</b><br/>';
			$message .= 'paypal  Team<br/>';
			$message .= 'US: +1 990999999999<br/>';
			$message .= 'E-mail: sales@strabayassociates.com | Web: www.strabayassociates.com</p>';

			$this->data_model->sendMail($to, $subject, $message);
			$to = 'sales@strabayassociates.com';
			$subject = 'Discount Enquiry:' . $_POST['report'];
			$message = '<b>Dear Admin,</b><br/>';
			$message .= '<table border = "1">';
			$message .= '<tr><td>Report Title</td>';
			$message .= '<td>' . $_POST['report'] . '</td></tr>';
			$message .= '<tr><td>Name</td>';
			$message .= '<td>' . $_POST['name'] . '</td></tr>';
			$message .= '<tr><td>Email</td>';
			$message .= '<td>' . $Array['mail'] . '</td></tr>';
			$message .= '<tr><td>Phone</td>';
			$message .= '<td>' . $Array['phone'] . '</td></tr>';
			$message .= '<tr><td>Company</td>';
			$message .= '<td>' . $Array['company'] . '</td></tr>';
			$message .= '<tr><td>Designation</td>';
			$message .= '<td>' . $Array['job_title'] . '</td></tr>';
			$message .= '<tr><td>Country</td>';
			$message .= '<td>' . $Array['country'] . '</td></tr>';
			$message .= '<tr><td>Source</td>';
			$message .= '<td>paypal  Discount Enquiry</td></tr>';
			$message .= '<tr><td>Message</td>';
			$message .= '<td>' . $_POST['message'] . '</td></tr>';
			$message .= '<tr><td>IP</td>';
			$message .= '<td>' . $ip . '</td></tr>';
			$message .= '</table></p>';
			$to = 'sales@strabayassociates.com';
			$this->data_model->sendMail($to, $subject, $message);

			redirect(base_url() . 'thankYou');
		} else {
			$cond = array('report.slug' => $slug);
			$tbls[0] = array('name' => 'report_details', 'condi' => 'report.id = report_details.id');
			$fields = array('report.id', 'title', 'report_desc', 'cat_id', 'publisher_id', 'region_id', 'toc', 'list_tbl_fig', 'published_date', 'pages', 'single_price', 'multi_price', 'ent_price', 'published_status', 'meta_title', 'meta_desc', 'meta_keyword','slug');
			$Record = $this->data_model->get($cond, $tbls, $fields, NULL, 'report')[0];
			$data['Record'] = $Record;

			$data['page'] = "Check Discount";
			$data['page_header'] = "page-header3";
			$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name'), NULL, 'category');

			$tbls[0] = array('name' => 'report_details', 'condi' => 'report.id = report_details.id');

			$limit = array('limit' => 5, 'start' => 0);

			$data['Record']['canonical'] = base_url() . 'report/' . $Record['id'] . '/' . str_replace(' ', '-', $Record['meta_keyword']);
			$data['countries'] = $this->config->item('countries');
			$cond = array('status' => 1);
			$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
			$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
			if ($Record) {
				$this->load->view('web/check_discountnew', $data);
			} else {
				redirect(base_url());
			}
		}
	}

	public function search($page = 1) {
		if ($_POST) {
			$ip = $this->input->ip_address();
			$captcha = $this->input->post('g-recaptcha-response');
			// $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Ld2ziIaAAAAAL_7eu8t-qiF6X-lRwPcuXp9Sdd-&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
			$response = "";
			if (!empty($captcha)) {
				if ($response . 'success' == false) {
					$this->session->set_flashdata('flashSuccess', 'Sorry Google Recaptcha Unsuccessful!!');
				} else {
					$to = $_POST['email'];
					$subject = 'Thank you for Contacting';
					$message = '<p>Dear ' . ucfirst($_POST['name']) . ',</p>';
					$message .= '<p>Thank you for contacting paypal .</p>';
					$message .= '<p>We have received your message and our representative will reach out to you at the earliest.<br/>Meanwhile, if you have any specific concerns/questions, please drop a line at <br/>sales@strabayassociates.com <br/>Have a good day ahead!</p><br/>';
					$message .= '<p><b>Best Regards,</b><br/>';
					$message .= 'paypal  Team<br/>';
					$message .= 'US: +1 990999999999<br/>';
					$message .= 'E-mail: sales@strabayassociates.com | Web: www.strabayassociates.com</p>';

					$this->data_model->sendMail($to, $subject, $message);

					$to = 'sales@strabayassociates.com';
					$subject = 'Search Form:';
					$message = '<b>Dear Admin,</b><br/>';
					$message .= '<table border = "1">';
					$message .= '<tr><td>Name</td>';
					$message .= '<td>' . $_POST['name'] . '</td></tr>';
					$message .= '<tr><td>Email</td>';
					$message .= '<td>' . $_POST['email'] . '</td></tr>';
					$message .= '<tr><td>Phone</td>';
					$message .= '<td>' . $_POST['phone'] . '</td></tr>';
					$message .= '<tr><td>Job Title</td>';
					$message .= '<td>' . $_POST['job-title'] . '</td></tr>';
					$message .= '<tr><td>Company</td>';
					$message .= '<td>' . $_POST['company'] . '</td></tr>';
					$message .= '<tr><td>Subject</td>';
					$message .= '<td>' . $_POST['sub'] . '</td></tr>';
					$message .= '<tr><td>Message</td>';
					$message .= '<td>' . $_POST['msg'] . '</td></tr>';
					$message .= '<tr><td>Source</td>';
					$message .= '<td>paypal Search Form</td></tr>';
					$message .= '<tr><td>IP</td>';
					$message .= '<td>' . $ip . '</td></tr>';
					$message .= '</table></p>';

					$this->data_model->sendMail($to, $subject, $message);
				}
			} else {
				$this->session->set_flashdata('flashSuccess', 'Captcha Failed');
			}
			redirect(base_url() . 'thankYou');
		} elseif ($_GET) {
			$per_page = 20;

			$res = $this->data_model->search(@$_GET['search'], @$_GET['category'], NULL);
			if ($res) {
				$total = count($res);
			} else {
				$total = 0;
			}

			$limit = array('limit' => $per_page, 'start' => ($per_page * $page) - $per_page);

			$data['Records'] = $this->data_model->search(@$_GET['search'], @$_GET['category'], $limit);

			if ($total % $per_page == 0) {
				$data['pages'] = floor(($total / $per_page));
			} else {
				$data['pages'] = floor(($total / $per_page)) + 1;
			}

			if ($total == 0) {
				$data['start'] = 0;
			} else {
				$data['start'] = $limit['start'] + 1;
			}

			if ($total < $limit['start'] + $per_page) {
				$data['end'] = $total;
			} else {
				$data['end'] = $limit['start'] + $per_page;
			}

			$data['total'] = $total;
			$data['current'] = $page;
			$data['searchFor'] = @$_GET['search'];
			$data['cat_id'] = @$_GET['category'];

			$data['page'] = "Search Result";
			$data['page_header'] = "page-header1";
			$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');$cond = array('status' => 1);

			$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
			$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
			$this->load->view('web/search', $data);
		} else {
			redirect(base_url(), 'refresh');
		}
	}

	public function filter($page = 1) {
		$per_page = 50;
		$tbls[0] = array('name' => 'report_details', 'condi' => 'report.id = report_details.id');
		$data['page'] = "Categories";
		$data['page_header'] = "page-header1";
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
		$data['regions'] = $this->data_model->get(NULL, NULL, array('id', 'name'), NULL, 'regions');
		if (isset($_POST['categories'])) {
			$cat = $_POST['categories'];
		} else {
			$cat = NULL;
		}
		if (isset($_POST['regions'])) {
			$reg = $_POST['regions'];
		} else {
			$reg = NULL;
		}

		if (isset($_POST['duration'])) {
			$dur = $_POST['duration'];
		} else {
			$dur = NULL;
		}

		$res = $this->data_model->filtre($cat, $reg, $dur, NULL);
		if ($res) {
			$total = count($res);
		} else {
			$total = 0;
		}

		$limit = array('limit' => $per_page, 'start' => ($per_page * $page) - $per_page);
		$Records = $this->data_model->filtre($cat, $reg, $dur, $limit);

		if ($total % $per_page == 0) {
			$pages = floor(($total / $per_page));
		} else {
			$pages = floor(($total / $per_page)) + 1;
		}

		if ($total == 0) {
			$start = 0;
		} else {
			$start = $limit['start'] + 1;
		}

		if ($total < $limit['start'] + $per_page) {
			$end = $total;
		} else {
			$end = $limit['start'] + $per_page;
		}

		$total = $total;
		$current = $page;

		echo '<h3><strong>List of Reports</strong></h3>';
		if ($Records) {
			foreach ($Records as $Record) {
				echo '<blockquote>
				<div class="row">
				<div class="col-sm-1 col-xs-2 pad05">
				<img src="' . base_url() . 'web_assets/images/pinit.png" class="img-responsive pt-10">
				</div>
				<div class="col-sm-9 col-xs-10">
				<a class="mb-5" style="color: #3C4858 !important" href="' . base_url() . 'report/' . strtolower($Record['slug']) . '"><strong>' . $Record['title'] . '</strong></a>
				<p class="paradesc">
				' . substr($Record['report_desc'], 0, 100) . ' ... <a href="' . base_url() . 'report/' . strtolower($Record['slug']) . '" class="label label-info">read more</a>
				</p>   
				</div>
				<div class="col-sm-2 hidden-xs yrs">
				<h4>' . date('F Y', strtotime($Record['published_date'])) . '</h4>
				</div>
				</div>
				</blockquote>';
			}
		} else {
			echo '<h3 class="text-center">No Records Found</h3>';
		}

	}

	public function pnf() {
		if ($_POST) {
			$ip = $this->input->ip_address();
			$captcha = $this->input->post('g-recaptcha-response');
			// $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Ld2ziIaAAAAAL_7eu8t-qiF6X-lRwPcuXp9Sdd-&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
			$response = "";

			if (!empty($captcha)) {
				if ($response . 'success' == false) {
					$this->session->set_flashdata('flashSuccess', 'Sorry Google Recaptcha Unsuccessful!!');
					$data['page_header'] = "page-header1";
					$this->load->view('templates/404', $data);
				} else {
					$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
					$this->form_validation->set_rules('email', 'Email', 'valid_emails|required');
					$this->form_validation->set_rules('job_title', 'Job Title', 'trim|alpha_numeric_spaces');
					$this->form_validation->set_rules('company', 'Company', 'trim|alpha_numeric_spaces');
					$this->form_validation->set_rules('phone', 'Phone', 'numeric|required');
					$this->form_validation->set_rules('sub', 'Subject', 'trim|alpha_numeric_spaces');
					$this->form_validation->set_rules('msg', 'Message', 'trim|alpha_numeric_spaces');

					if ($this->form_validation->run() == FALSE) {
						$data['page_header'] = "page-header1";
						$cond = array('status' => 1);
						$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
						$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
						$this->load->view('templates/404', $data);
					}else{
						$ip = $this->input->ip_address();
						$to = $_POST['email'];
						$res = file_get_contents('https://www.iplocate.io/api/lookup/' . $ip);
						$res = json_decode($res);
						$Array['name'] = $_POST['name'];
						$Array['mail'] = $_POST['email'];
						$Array['job_title'] = $_POST['job_title'];
						$Array['company'] = $_POST['company'];
						$Array['phone'] = $_POST['phone'];
						$Array['country'] = $res->country;
						$Array['message'] = $_POST['msg'];
						$Array['report'] = $_POST['sub'];
						$Array['region'] = $res->continent;
						$Array['ip'] = $ip;
						$Array['website'] = "strabayassociates.com";
						$Array['source'] = "Page not Found";
						// $url = "https://strabayassociates.com/addLead";
						// $postData = $Array;
						// $ch = curl_init();
						// curl_setopt($ch, CURLOPT_URL, $url);
						// curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
						// curl_setopt($ch, CURLOPT_HEADER, false);
						// curl_setopt($ch, CURLOPT_POST, count($postData));
						// curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
						// $output = curl_exec($ch);
						// curl_close($ch);



						$post = [
							'name' => $_POST['name'],
							'mail' => $_POST['email'],
							'job_title' => isset($_POST['title']) ? $_POST['title'] : "NA",
							'company' => isset($_POST['company']) ? $_POST['company'] : "NA",
							'phone' => isset($_POST['contact']) ? $_POST['contact'] : $_POST['phone'],
							'country' => $res->country,
							'message' => $_POST['message'],
							'report' => $_POST['report'],
							'region' => $res->continent,
							'postal_code' => $res->postal_code,
							'subdivision' => $res->subdivision,
							'city' => $res->city,
							'ip' => $ip,
							'website' => 5,
							'source' => 5,
						];
						// $ch = curl_init('http://localhost//addLead');
						// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						// curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
						// $response = curl_exec($ch);
						// $err = curl_error($ch);
						// curl_close($ch);
						// var_dump($response);

						$data = json_decode($response);
						if ($err) {
							echo "cURL Error #:" . $err;
						} else {
							$data = json_decode($response);
						}



						$subject = 'Thank you for Contacting';
						$message = '<p>Dear ' . ucfirst($_POST['name']) . ',</p>';
						$message .= '<p>Thank you for contacting paypal .</p>';
						$message .= '<p>We have received your message and our representative will reach out to you at the earliest.<br/>Meanwhile, if you have any specific concerns/questions, please drop a line at <br/>sales@strabayassociates.com <br/>Have a good day ahead!</p><br/>';
						$message .= '<p><b>Best Regards,</b><br/>';
						$message .= 'paypal  Team<br/>';
						$message .= 'US: +1 990999999999<br/>';
						$message .= 'E-mail: sales@strabayassociates.com | Web: www.strabayassociates.com</p>';

						$this->data_model->sendMail($to, $subject, $message);

						$to = 'sales@strabayassociates.com';
						$subject = '404 Form:';
						$message = '<b>Dear Admin,</b><br/>';
						$message .= '<table border = "1">';
						$message .= '<tr><td>Name</td>';
						$message .= '<td>' . $_POST['name'] . '</td></tr>';
						$message .= '<tr><td>Email</td>';
						$message .= '<td>' . $_POST['email'] . '</td></tr>';
						$message .= '<tr><td>Phone</td>';
						$message .= '<td>' . $_POST['phone'] . '</td></tr>';
						$message .= '<tr><td>Job Title</td>';
						$message .= '<td>' . $_POST['job_title'] . '</td></tr>';
						$message .= '<tr><td>Company</td>';
						$message .= '<td>' . $_POST['company'] . '</td></tr>';
						$message .= '<tr><td>Subject</td>';
						$message .= '<td>' . $_POST['sub'] . '</td></tr>';
						$message .= '<tr><td>Message</td>';
						$message .= '<td>' . $_POST['msg'] . '</td></tr>';
						$message .= '<tr><td>Source</td>';
						$message .= '<td>paypal 404 Form</td></tr>';
						$message .= '<tr><td>IP</td>';
						$message .= '<td>' . $ip . '</td></tr>';
						$message .= '</table></p>';
						$this->data_model->sendMail($to, $subject, $message);
						redirect(base_url() . 'thankYou');
					}
				} 
			} else {
				$this->session->set_flashdata('flashSuccess', 'Please Select Recaptcha');
				$data['page_header'] = "page-header1";
				$cond = array('status' => 1);
				$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
				$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
				$this->load->view('templates/404', $data);
			}
		}else{
			$data['page_header'] = "page-header1";
			$cond = array('status' => 1);
			$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
			$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
			$this->load->view('templates/404', $data);
		}
	}
	/* Sitemaping Start */

	public function sitemap() {
		$this->db->select('id,name,slug');
		$query = $this->db->get("category");
		$data['items'] = $query->result();
		$this->load->view('sitemap', $data);
	}

	public function sitemap_blog() {
		$this->db->select('slug,created_at');
		$query = $this->db->get("blogs");
		$data['items'] = $query->result();
		$data['title'] = 'blog';
		$this->load->view('pages', $data);
	}

	public function sitemap_pressRelease() {
		$this->db->select('slug,created_at');
		$query = $this->db->get("press_release");
		$data['items'] = $query->result();
		$data['title'] = 'press-release';
		$this->load->view('pages', $data);
	}

	public function main_pages() {
		$this->db->select('id,name,slug');
		$query = $this->db->get("category");
		$data['items'] = $query->result();
		$this->load->view('main_pages',$data);
	}


	public function sitemaps($id, $cat) {
		$cond = array('report.cat_id' => $id);
		$fields = array('slug', 'created_at');
		$Record = $this->data_model->get($cond, NULL, $fields, NULL, 'report', 'desc');
		$data['items'] = $Record;
		$data['title'] = 'report';
		$this->load->view('pages', $data);
	}


	public function catgory_sitemap($id, $count, $cate) {
		$cond = array('report.cat_id' => $id);
		$fields = array('slug','created_at');
		if ($count == 1) {
			$limit = array('limit' => 10000, 'start' => 1);
		}else{
			$limit = array('limit' => 10000, 'start' => (10000 * $count));
		}
		$Record = $this->data_model->get($cond, NULL, $fields, $limit, 'report', 'desc');
		$data['items'] = $Record;
		$data['title'] = 'report';
		$this->load->view('pages', $data);
	}

	/* End  Sitemap */
	/* Blogs Start */

	public function blogs() {
		$config = array();
		$config["base_url"] = base_url() . "web/blogs";
		$config["per_page"] = 3;
		$config["uri_segment"] = 3;
		$config["total_rows"] = $this->data_model->record_count('blogs');
		$this->pagination->initialize($config);
		$data['page'] = "Blogs";
		$data['page_header'] = "page-header2";
		$data['Recent'] = $this->data_model->letestReports();
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['Records'] = $this->data_model->get_pagi($config["per_page"], $page, 'blogs');
		$data["links"] = $this->pagination->create_links();
		$data['Record'] = array(
			'meta_keyword' => "paypal , Global Market Research Reports, industry analysis reports, consulting services, syndicated research reports, Business Research, Market Size and Forecasts",
			'meta_desc' => "Stay updated with recent blogs from paypal , covering various industries worldwide."
		);
		$data['Record']['canonical'] = base_url() . 'blogs';
		$limit = array('limit' => 6, 'start' => 0);
		$data['blogs'] = $this->data_model->get(NULL, NULL, array('id', 'title', 'metakeyword','slug','image'), $limit, 'blogs', 'desc');$cond = array('status' => 1);

		$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
		$this->load->view('web/blogs', $data);
	}

	/* Blogs End */
	/* Blogs Start */

	public function single_blog($slug) {
		$cond = array('blogs.slug' => $slug);
		// print_r($cond);die();
		$tbls = NULL;
		$fields = '';
		$Record = $this->data_model->get($cond, $tbls, $fields, NULL, 'blogs')[0];
		if (!$Record) {
			redirect(base_url());
		}
		$Records = $this->data_model->get_blog();
		$data['Record'] = $Record;
		$data['Records'] = $Records;
		$data['Record']['canonical'] = base_url() . 'single_blog/' . strtolower($Record['slug']);
		$data['page'] = $Record['metatitle'];
		$data['page_header'] = "page-header2";
		$limit = array('limit' => 6, 'start' => 0);
		$data['blogs'] = $this->data_model->get(NULL, NULL, array('id', 'title', 'slug','image'), $limit, 'blogs', 'desc');$cond = array('status' => 1);

		$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
		$this->load->view('web/single_blog', $data);
	}

	private function get_curl_handle($payment_id, $amount) {
		$url = 'https://api.razorpay.com/v1/payments/' . $payment_id . '/capture';
		$key_id = "RAZOR_KEY_ID_old";
		$key_secret = "RAZOR_KEY_SECRET_old";
		$fields_string = "amount=$amount";
		// $ch = curl_init();
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

	public function callback() {
		if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
			// $razorpay_payment_id = $this->input->post('razorpay_payment_id');
			// $merchant_order_id = $this->input->post('merchant_order_id');
			// $currency_code = 'USD';
			// $amount = $this->input->post('merchant_total');
			// $success = false;
			// $error = '';
			// try {
			// 	$ch = $this->get_curl_handle($razorpay_payment_id, $amount);
   //              //execute post
			// 	$result = curl_exec($ch);
			// 	$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			// 	if ($result === false) {
			// 		$success = false;
			// 		$error = 'Curl error: ' . curl_error($ch);
			// 	} else {
			// 		$response_array = json_decode($result, true);
   //                  // echo "<pre>";print_r($response_array);exit;
   //                  //Check success response
			// 		if ($http_status === 200 and isset($response_array['error']) === false) {
			// 			$success = true;
			// 		} else {
			// 			$success = false;
			// 			if (!empty($response_array['error']['code'])) {
			// 				$error = $response_array['error']['code'] . ':' . $response_array['error']['description'];
			// 			} else {
			// 				$error = 'RAZORPAY_ERROR:Invalid Response <br/>' . $result;
			// 			}
			// 		}
			// 	}
			// 	curl_close($ch);
			// } catch (Exception $e) {
			// 	$success = false;
			// 	$error = 'OPENCART_ERROR:Request to Razorpay Failed';
		}
		if ($success === true) {
			// 	if (!empty($this->session->userdata('ci_subscription_keys'))) {
			// 		$this->session->unset_userdata('ci_subscription_keys');
			// 	}
			// 	if (!$order_info['order_status_id']) {
			// 		redirect($this->input->post('merchant_surl_id'));
			// 	} else {
			// 		redirect($this->input->post('merchant_surl_id'));
			// 	}
			// } else {
			// 	redirect($this->input->post('merchant_furl_id'));
			// }
		} else {
			echo 'An error occured. Contact site administrator, please!';
		}
	}

	public function success() {
		$data['title'] = 'Razorpay Success | TechArise';
		$cond = array('status' => 1);
		$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
		$this->load->view('razorpay/success', $data);
	}

	public function failed() {
		$data['title'] = 'Razorpay Failed | paypal';
		$this->load->view('razorpay/failed', $data);
	}

	public function privacypolicyOnEnquiery() {
		$data['page'] = "Privacy";
		$data['page_header'] = "page-header2";
		$cond = array('status' => 1);
		$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
		$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
		$this->load->view('web/privacypolicy', $data);
	}

	/*Find Unique Keywords*/

	public function UniqueKeywords($offset,$limit){
		$this->db->select('id as report_id,meta_keyword,meta_title,toc');
		$this->db->group_by('meta_keyword');
		$this->db->limit($limit);
		$this->db->where('id >', $offset);
		$this->db->order_by('id', 'asc');
		$this->query = $this->db->get('report_details');
		if($this->query->num_rows()>0){
			$keywords = $this->query->result_array();
		}
		echo json_encode($keywords);
	}

	public function callKeywords($offset,$limit){
		$url = "https://www.strabayassociates.com/unique-keywords/".$offset."/".$limit;
		// $ch = curl_init();
		// curl_setopt($ch, CURLOPT_URL, $url);
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		// curl_setopt($ch, CURLOPT_HEADER, false);
		// $result = curl_exec($ch);
		// $err = curl_error($ch);
		// curl_close($ch);
		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$keywords = json_decode($result);
			if (isset($keywords)) {
				$id_arr = 0;
				foreach ($keywords as $keyword) {
					$exist = $this->db->where('meta_keyword', $keyword->meta_keyword)->get('keywords')->row();
					if (empty($exist)) {
						$this->db->insert('keywords', $keyword);
						$id_arr = $this->db->insert_id();
					}
				}
				$this->callKeywords($keyword->report_id,$limit);
			}else{
				print_r('No keywords Found');
			}
		}
	}

	public function reportList(){
		$perPage=10;
		//$count = $this->db->get('report')->num_rows();
		$this->db->select('count(id)');
		$query = $this->db->get('report');
		$cnt = $query->row_array();
		$count = $cnt['count(id)'];
		$pcount=floor($count/10);
		$pmod=$count%10;
		if ($pmod) {
			$pcount++;
		}

		if(!empty($this->input->get("page"))){
			$start = $this->input->get("page") * $perPage;
			$data['reports'] = $this->data_model->reportList($start, $perPage);
			$data['count']=$count;
			$result = $this->load->view('reports/ajax_post', $data);
			echo json_encode($result);
		}else{
			$data['reports'] = $this->data_model->reportList(0,$perPage);
			$data['count']=$pcount;
			$data['page'] = "All Market Research Reports ";
			$data['page_header'] = "page-header2";
			$data['Record'] = array(
				'meta_keyword' => "Global Market Research, paypal, Growth Analysis Reports, Regional Market Reports, Trending Reports online",
				'meta_desc' => "Find out the research report as per the categories on paypal, leading market research company."
			);
			$data['Record']['canonical'] = base_url() . 'reports';
			$cond = array('status' => 1);
			$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
			$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
			$this->load->view('reports/report-list', $data);
		}
	}



	public function cancerPage(){
		$perPage=10;
		//$count = $this->db->get('report')->num_rows();
		$this->db->select('count(id)');
		$query = $this->db->get('report');
		$cnt = $query->row_array();
		$count = $cnt['count(id)'];
		$pcount=floor($count/10);
		$pmod=$count%10;
		if ($pmod) {
			$pcount++;
		}

		if(!empty($this->input->get("page"))){
			$start = $this->input->get("page") * $perPage;
			$data['reports'] = $this->data_model->reportList($start, $perPage);
			$data['count']=$count;
			$result = $this->load->view('cancerPage/ajax_post', $data);
			echo json_encode($result);
		}else{
			$data['reports'] = $this->data_model->reportList(0,$perPage);
			$data['count']=$pcount;
			$data['page'] = "All Market Research Reports ";
			$data['page_header'] = "page-header2";
			$data['Record'] = array(
				'meta_keyword' => "Global Market Research, paypal, Growth Analysis Reports, Regional Market Reports, Trending Reports online",
				'meta_desc' => "Find out the research report as per the categories on paypal, leading market research company."
			);
			$data['Record']['canonical'] = base_url() . 'reports';
			$cond = array('status' => 1);
			$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
			$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
			$this->load->view('cancerPage/page-list', $data);
		}
	}



	public function diabetisPage(){
		$perPage=10;
		//$count = $this->db->get('report')->num_rows();
		$this->db->select('count(id)');
		$query = $this->db->get('report');
		$cnt = $query->row_array();
		$count = $cnt['count(id)'];
		$pcount=floor($count/10);
		$pmod=$count%10;
		if ($pmod) {
			$pcount++;
		}

		if(!empty($this->input->get("page"))){
			$start = $this->input->get("page") * $perPage;
			$data['reports'] = $this->data_model->reportList($start, $perPage);
			$data['count']=$count;
			$result = $this->load->view('diabetisPage/ajax_post', $data);
			echo json_encode($result);
		}else{
			$data['reports'] = $this->data_model->reportList(0,$perPage);
			$data['count']=$pcount;
			$data['page'] = "All Market Research Reports ";
			$data['page_header'] = "page-header2";
			$data['Record'] = array(
				'meta_keyword' => "Global Market Research, paypal, Growth Analysis Reports, Regional Market Reports, Trending Reports online",
				'meta_desc' => "Find out the research report as per the categories on paypal, leading market research company."
			);
			$data['Record']['canonical'] = base_url() . 'reports';
			$cond = array('status' => 1);
			$data['clients'] = $this->data_model->get($cond, NULL, array('id', 'name','img'), NULL, 'client');
			$data['categories'] = $this->data_model->get(NULL, NULL, array('id', 'name', 'slug'), NULL, 'category');
			$this->load->view('diabetisPage/page-list', $data);
		}
	}
	public function Subscribers(){
		if ($this->input->post()) {
			$this->form_validation->set_rules('email', 'Email', 'valid_emails|required');
			if ($this->form_validation->run() == FALSE) {
				redirect(base_url());
			}else{
				$email = $this->input->post('email');
				$exist = $this->data_model->get(NULL, NULL, array('id', 'email'), NULL, 'subscribers');

				if ($exist) {
					redirect(base_url() . 'thankYou');
				} else {
					$data = array(
						'email' => $email,
						'date'  => date('Y-m-d')
					);
					$this->db->insert('subscribers', $data);
					redirect(base_url() . 'thankYou');
				}
			}
		}else{
			redirect(base_url());
		}
	}
}
