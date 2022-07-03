<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('data_model');

	}


	public function index($type ='Admin')
	{
		if ($type == 'Admin')
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				redirect(base_url().'dashboard/Admin');
			}
			else
			{
				if ($_POST)
				{
					if ($this->data_model->login($_POST))
					{
						// print_r($this->session->userdata('logged_in'));
						redirect(base_url().'dashboard/Admin');
					}
					else
					{
						$this->session->set_flashdata('msg', 'Invalid Credentials');
						redirect(base_url().'admin');
					}
				}
				else
				{
					$data['pagetitle'] = 'Admin Login';
					$this->load->view('pages/login', $data);
				}
			}
		}
		elseif ($type == "User")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				redirect(base_url().'dashboard/User');
			}
			else
			{
				if ($_POST)
				{
					if ($this->data_model->login($_POST))
					{
						// print_r($this->session->userdata('logged_in'));
						redirect(base_url().'dashboard/User');
					}
					else
					{
						$this->session->set_flashdata('msg', 'Invalid Credentials');
						redirect(base_url().'user');
					}
				}
				else
				{
					$data['pagetitle'] = 'User Login';
					$this->load->view('pages/login', $data);
				}
			}
		}
	}

	public function dashboard($type)
	{
		if ($type == "Admin")
		{
			// print_r($this->session->userdata('logged_in'));
			if ($this->session->userdata('logged_in')=='Admin')
			{
				$data['pagetitle'] = "Admin Dashboard";
				// print_r($this->session->userdata('logged_in'));
				$this->load->view('pages/dashboard',$data);
			}
			else
			{
				redirect(base_url().'admin');
			}
		}
		elseif ($type == 'User')
		{
			// print_r($this->session->userdata('logged_in'));
			if ($this->session->userdata('logged_in')=='Admin')
			{
				$data['pagetitle'] = "User Dashboard";
				$this->load->view('pages/dashboard',$data);
			}
			else
			{
				redirect(base_url().'user');
			}
		}
	}

	public function list($type , $page=1)
	{
		if ($type == 'member')
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				$cond = array('type !=' => 'Admin' );
				$tbls = NULL;
				$fields = array('id', 'name', 'email', 'type', 'status');
				$data['Records'] = $this->data_model->get($cond, $tbls, $fields, NULL, 'user');
				$data['cols'] = array('id', 'Name', 'Email', 'User Type', 'Status');
				$data['pagetitle'] = "All Users";
				$data['for'] = "member";
				$data['Actions'] = array('edit', 'delete', 'enable');
				$data['link'] = "";
				$this->load->view('pages/list', $data);
			}
			else
			{
				redirect(base_url().'admin');
			}
		}
		elseif ($type == "publisher")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				$cond = NULL;
				$tbls = NULL;
				$fields = array('id', 'name', 'status');
				$data['Records'] = $this->data_model->get($cond, $tbls, $fields, NULL, 'publisher');
				$data['cols'] = array('id', 'Name', 'Status');
				$data['pagetitle'] = "All Publishers";
				$data['for'] = "publisher";
				$data['link'] = "";
				$data['Actions'] = array('edit', 'delete', 'enable');
				$this->load->view('pages/list', $data);
			}
			else
			{
				redirect(base_url().'admin');
			}
		}

		elseif ($type == "category")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				$cond = NULL;
				$tbls = NULL;
				$fields = array('id', 'name', 'status');
				$data['Records'] = $this->data_model->get($cond, $tbls, $fields, NULL, 'category');
				$data['cols'] = array('id', 'Name', 'Status');
				$data['pagetitle'] = "All Categories";
				$data['for'] = "category";
				$data['Actions'] = array('edit', 'delete', 'enable');
				$data['link'] = "";
				$this->load->view('pages/list', $data);
			}
			else
			{
				redirect(base_url().'admin');
			}
		}

		elseif ($type == "region")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				$cond = NULL;
				$tbls = NULL;
				$fields = array('id', 'name', 'status');
				$data['Records'] = $this->data_model->get($cond, $tbls, $fields, NULL, 'regions');
				$data['cols'] = array('id', 'Name', 'Status');
				$data['pagetitle'] = "All Regions";
				$data['for'] = "region";
				$data['Actions'] = array('edit', 'delete', 'enable');
				$data['link'] = "";
				$this->load->view('pages/list', $data);
			}
			else
			{
				redirect(base_url().'admin');
			}
		}

		elseif ($type == "report")
		{
			if ($this->session->userdata('logged_in') == 'Admin')
			{
				$cond = NULL;
				$per_page = 2000;
				// $per_page = $this->db->select("id")->from('report')->count_all_results();
				$limit = array('limit' => $per_page, 'start'=> ($per_page * $page)-$per_page );
				$tbls[0] = array('name' => 'category', 'condi' => 'report.cat_id = category.id');
				$tbls[1] = array('name' => 'publisher', 'condi' => 'report.publisher_id = publisher.id' );
				$tbls[2] = array('name' => 'user', 'condi' => 'report.added_by = user.id' );
				$fields = array('report.id', 'title', 'category.name as category', 'publisher.name as publisher', 'user.name as added_by', 'report.created_at');
				$data['Records'] = $this->data_model->get($cond, $tbls, $fields, $limit, 'report','desc');
				$data['cols'] = array('Id', 'Title', 'Category', 'Publisher', 'Added By', 'Date');
				$data['pagetitle'] = "All Reports";
				$data['for'] = "report";
				$data['Actions'] = array('edit', 'delete');
				$data['link'] = "";
				// print_r($data['Records'])
				$this->load->view('pages/list', $data);
			}
			else
			{
				redirect(base_url().'user');
			}
		}
		elseif ($type == "press_release")
		{
			if ($this->session->userdata('logged_in') == 'Admin')
			{
				$cond = NULL;
				$tbls[0] = array('name' => 'user', 'condi' => 'press_release.added_by = user.id' );
				$fields = array('press_release.id', 'title', 'user.name as added_by', 'press_release.created_at');
				$data['Records'] = $this->data_model->get($cond, $tbls, $fields, NULL, 'press_release');
				$data['cols'] = array('Id', 'Title', 'Added By', 'Date');
				$data['pagetitle'] = "All Press Release";
				$data['for'] = "press_release";
				$data['Actions'] = array('edit', 'delete');
				$data['link'] = "";
				// print_r($data['Records']);
				$this->load->view('pages/list', $data);
			}
			else
			{
				redirect(base_url().'user');
			}
		}

		elseif ($type == "blog")
		{
			if ($this->session->userdata('logged_in') == 'Admin')
			{
				$cond = NULL;
				$tbls[0] = array('name' => 'user', 'condi' => 'blog.added_by = user.id' );
				$fields = array('blog.id', 'title', 'user.name as added_by', 'blog.created_at');
				$data['Records'] = $this->data_model->get($cond, $tbls, $fields, NULL, 'blog');
				$data['cols'] = array('Id', 'Title', 'Added By', 'Date');
				$data['pagetitle'] = "All Blog Post";
				$data['for'] = "blog";
				$data['Actions'] = array('edit', 'delete');
				$data['link'] = "";
				// print_r($data['Records']);
				$this->load->view('pages/list', $data);
			}
			else
			{
				redirect(base_url().'user');
			}
		}
		elseif ($type == "paylink")
		{
			if ($this->session->userdata('logged_in') == 'Admin')
			{
				$cond = array('report.status' => "3");
				$per_page = 1000;
				$limit = array('limit' => $per_page, 'start'=> ($per_page * $page)-$per_page );
				$tbls[0] = array('name' => 'category', 'condi' => 'report.cat_id = category.id');
				//				$tbls[1] = array('name' => 'publisher', 'condi' => 'report.publisher_id = publisher.id' );
				//				$tbls[2] = array('name' => 'user', 'condi' => 'report.added_by = user.id' );
				$tbls[1] = array('name' => 'report_details', 'condi' => 'report.id = report_details.id' );
				$fields = array('report.id', 'title', 'report_details.single_price as single_price', 'report_details.multi_price as multi_price', 'report_details.ent_price as ent_price');
				$data['Records'] = $this->data_model->get($cond, $tbls, $fields, $limit, 'report','desc');
				$data['cols'] = array('Id', 'Title', 'Single User Price ', 'Multi User Price ', 'Enterprise User Price',"Razorpay Link","Paypal Link");
				$data['pagetitle'] = "All Payment List";
				$data['for'] = "paylink";
				$data['Actions'] = array('edit', 'delete');
				$data['link'] = "yes";
				// print_r($data['Records']);
				$this->load->view('pages/list', $data);
			}
			else
			{
				redirect(base_url().'user');
			}
		}


		else
		{
			show_404();
		}
	}

	public function add($type)
	{
		if ($type == 'member')
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($_POST)
				{
					// print_r($_POST);
					$pass = $_POST['password'];
					$_POST['password'] = hash('sha512', $_POST['password']);
					
					if ($this->data_model->add($_POST, 'user'))
					{
						$this->session->set_flashdata('msg', 'Record Added Successfully');
					}
					else
					{
						$this->session->set_flashdata('msg', 'Error Adding Record');
					}
					
					// $Array['user'] = $_POST['name'];
					// $Array['Email'] = $_POST['email'];
					// $Array['Password'] = $pass;
					// $Array['Link'] = base_url().'siteAdmin';
					
					// $this->data_model->sendMail($Array);
					
					redirect(base_url().'add/member');
				}
				else
				{
					$data['pagetitle'] = "Add User";
					$data['fields'] = array('name' =>'text', 'email' =>'email', 'type' =>'text', 'status' =>'select', 'password' =>'text' );
					$data['for'] = "member";
					$data['statusOpt'] = array('Enabled'=> 1, 'Disabled'=>0);
					$this->load->view('pages/add', $data);
				}
			}
			else
			{
				redirect(base_url().'admin');
			}
		}
		elseif ($type == "publisher")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($_POST)
				{
					$config['upload_path'] = './uploads/publisher';
					$config['allowed_types'] = 'jpeg|jpg|png|gif';
					$config['max_size'] = 2048;
					

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('img'))
					{
						// $data = array('upload_data' => $this->upload->data());
						$_POST['img'] = $this->upload->data()['file_name'];
						// print_r($this->upload->data());
					}
					else
					{
						$_POST['img'] = NULL;
					}
					// print_r($_POST);
					
					if ($this->data_model->add($_POST, 'publisher'))
					{
						$this->session->set_flashdata('msg', 'Record Added Successfully');
					}
					else
					{
						$this->session->set_flashdata('msg', 'Error Adding Record');
					}
					redirect(base_url().'user/add/publisher');
				}
				else
				{
					$data['pagetitle'] = "Add Publisher";
					$data['fields'] = array('name' =>'text', 'img'=> 'file','status' =>'select' );
					$data['for'] = "publisher";
					$data['statusOpt'] = array('Enabled'=> 1, 'Disabled'=>0);
					$this->load->view('pages/add', $data);
				}
			}
			else
			{
				redirect(base_url().'admin');
			}
		}
		elseif ($type == "category")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($_POST)
				{
					$config['upload_path'] = './uploads/category';
					$config['allowed_types'] = 'jpg|png';
					$config['max_size'] = 2048;
					

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('img'))
					{
						// $data = array('upload_data' => $this->upload->data());
						$_POST['img'] = $this->upload->data()['file_name'];
						// print_r($this->upload->data());
					}
					else
					{
						$_POST['img'] = NULL;
					}
					// print_r($_POST);
					
					if ($this->data_model->add($_POST, 'category'))
					{
						$this->session->set_flashdata('msg', 'Record Added Successfully');
					}
					else
					{
						$this->session->set_flashdata('msg', 'Error Adding Record');
					}
					redirect(base_url().'user/add/category');
				}
				else
				{
					$data['pagetitle'] = "Add Category";
					$data['fields'] = array('name' =>'text', 'img'=> 'file','status' =>'select' );
					$data['for'] = "category";
					$data['statusOpt'] = array('Enabled'=> 1, 'Disabled'=>0);
					$this->load->view('pages/add', $data);
				}
			}
			else
			{
				redirect(base_url().'admin');
			}
		}
		elseif ($type == "region")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($_POST)
				{
					if ($this->data_model->add($_POST, 'regions'))
					{
						$this->session->set_flashdata('msg', 'Record Added Successfully');
					}
					else
					{
						$this->session->set_flashdata('msg', 'Error Adding Record');
					}
					redirect(base_url().'user/add/region');
				}
				else
				{
					$data['pagetitle'] = "Add Region";
					$data['fields'] = array('name' =>'text', 'status' =>'select' );
					$data['for'] = "region";
					$data['statusOpt'] = array('Enabled'=> 1, 'Disabled'=>0);
					$this->load->view('pages/add', $data);
				}
			}
			else
			{
				redirect(base_url().'admin');
			}
		}

		elseif ($type == "report")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			// if ($this->session->userdata('logged_in')=='User')
			{
				if ($_POST)
				{
					$Report['title'] = $_POST['title'];
					$Report['report_desc'] = $_POST['report_desc'];
					$Report['cat_id'] = $_POST['cat_id'];
					$Report['publisher_id'] = $_POST['publisher_id'];
					$Report['region_id'] = $_POST['region_id'];
					$Report['added_by'] = $this->session->userdata('userid');
					$Report['status'] = 1;
					

					$ReportDesc['toc'] = $_POST['toc'];
					$ReportDesc['list_tbl_fig'] = $_POST['list_tbl_fig'];
					$ReportDesc['published_date'] =date('Y-m-d', strtotime($_POST['published_date']));
					$ReportDesc['pages'] = $_POST['pages'];
					$ReportDesc['single_price'] = $_POST['single_price'];
					$ReportDesc['multi_price'] = $_POST['multi_price'];
					$ReportDesc['ent_price'] = $_POST['ent_price'];
					$ReportDesc['published_status'] = $_POST['published_status'];
					if ($_POST['meta_title']=="")
					{
						$ReportDesc['meta_title'] = $_POST['title'];
					}
					else
					{
						$ReportDesc['meta_title'] = $_POST['meta_title'];
					}
					if ($_POST['meta_desc'])
					{
						$ReportDesc['meta_desc'] = $_POST['meta_desc'];
					}
					else
					{
						$ReportDesc['meta_desc'] = "paypal has added ".$_POST['title']." to its database of Market Research Reports. This report covers market size by types, applications and major regions. It also focuses on industry trends and developments, future market forecasts and key players of the market.";
					}
					$ReportDesc['meta_keyword'] = $_POST['meta_keyword'];
					$count = count($this->data_model->get(array('title'=> $Report['title'], 'publisher_id'=> $Report['publisher_id']), NULL, array('id'), NULL, 'report'));
					if ($count!=0)
					{
						$res = $this->data_model->add($Report, 'report');
						$ReportDesc['id'] = $res;
						if ($res)
						{
							$res1 =$this->data_model->add($ReportDesc, 'report_details');
							if ($res1)
							{
								$this->session->set_flashdata('msg', 'Record Added Successfully');
							}
							else
							{
								$this->session->set_flashdata('msg', 'Error Adding Record');
							}
						}
						else
						{
							$this->session->set_flashdata('msg', 'Error Adding Record');
						}
					}
					else
					{
						$this->session->set_flashdata('msg', 'Record Already Exist');
					}
					redirect(base_url().'user/add/report');
				}
				else
				{
					$data['pagetitle'] = "Add Report";
					$data['fields'] = array('title' =>'text', 'report_desc' =>'textarea','toc' =>'textarea', 'list_tbl_fig' =>'textarea','cat_id' =>'select', 'publisher_id' =>'select', 'region_id' =>'select','published_date' =>'text', 'pages' =>'text','single_price' =>'text', 'multi_price' =>'text','ent_price' =>'text', 'published_status' =>'select', 'meta_keyword' =>'text' , 'meta_title'=> 'text', 'meta_desc' =>'text');
					$data['for'] = "report";
					// $data['statusOpt'] = array('Enabled'=> 1, 'Disabled'=>0);

					$cat_idOpt = $this->data_model->get(NULL, NULL, array('name', 'id'), NULL, 'category');
					$publisher_idOpt = $this->data_model->get(NULL, NULL, array('name', 'id'), NULL, 'publisher');
					$region_idOpt = $this->data_model->get(NULL, NULL, array('name', 'id'), NULL, 'regions');

					$data['cat_idOpt'] = array();
					foreach ($cat_idOpt as $value)
					{
						if(!isset($data['cat_idOpt'][$value['name']])) 
						{
							$data['cat_idOpt'][$value['name']] = array();
						}
						$data['cat_idOpt'][$value['name']] = $value['id'];
					}

					$data['publisher_idOpt'] = array();
					foreach ($publisher_idOpt as $value)
					{
						if(!isset($data['publisher_idOpt'][$value['name']])) 
						{
							$data['publisher_idOpt'][$value['name']] = array();
						}
						$data['publisher_idOpt'][$value['name']] = $value['id'];
					}

					$data['region_idOpt'] = array();
					foreach ($region_idOpt as $value)
					{
						if(!isset($data['region_idOpt'][$value['name']])) 
						{
							$data['region_idOpt'][$value['name']] = array();
						}
						$data['region_idOpt'][$value['name']] = $value['id'];
					}

					$data['published_statusOpt'] = array('Published'=> 1, 'Upcoming'=>0);
					$this->load->view('pages/add', $data);
				}
			}
			else
			{
				redirect(base_url().'user');
			}
		}

		elseif ($type == "press_release")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($_POST)
				{
					// print_r($_POST);
					$_POST['added_by'] = $this->session->userdata('userid');
					$_POST['status'] = 1;
					if ($this->data_model->add($_POST, 'press_release'))
					{
						$this->session->set_flashdata('msg', 'Record Added Successfully');
					}
					else
					{
						$this->session->set_flashdata('msg', 'Error Adding Record');
					}
					redirect(base_url().'user/add/press_release');
				}
				else
				{
					$data['pagetitle'] = "Add Press Release";
					$data['fields'] = array('title' =>'text', 'desc' =>'textarea', 'meta_keyword' =>'text' , 'meta_title'=> 'text', 'meta_desc' =>'text');
					$data['for'] = "press_release";
					
					$this->load->view('pages/add', $data);
				}
			}
			else
			{
				redirect(base_url().'user');
			}
		}

		elseif ($type == "blog")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($_POST)
				{
					// print_r($_POST);
					$_POST['added_by'] = $this->session->userdata('userid');
					$_POST['status'] = 1;
					if ($this->data_model->add($_POST, 'blog'))
					{
						$this->session->set_flashdata('msg', 'Record Added Successfully');
					}
					else
					{
						$this->session->set_flashdata('msg', 'Error Adding Record');
					}
					redirect(base_url().'user/add/blog');
				}
				else
				{
					$data['pagetitle'] = "Add Press Release";
					$data['fields'] = array('title' =>'text', 'desc' =>'textarea', 'meta_keyword' =>'text' , 'meta_title'=> 'text', 'meta_desc' =>'text');
					$data['for'] = "blog";
					
					$this->load->view('pages/add', $data);
				}
			}
			else
			{
				redirect(base_url().'user');
			}
		}
		elseif ($type == "paylink")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($_POST)
				{
					$Report['title'] = $_POST['title'];
					$Report['report_desc'] = "report_desc";
					$Report['cat_id'] = "1";
					$Report['publisher_id'] = "1";
					$Report['region_id'] = "1";
					$Report['added_by'] = $this->session->userdata('userid');
					$Report['status'] =3;
					

					$ReportDesc['toc'] = "report TOC";
					$ReportDesc['list_tbl_fig'] =  "report tbl Fig";
					$ReportDesc['published_date'] =date('Y-m-d');
					$ReportDesc['pages'] = "100";
					$ReportDesc['single_price'] = $_POST['single_price'];
					$ReportDesc['multi_price'] = $_POST['multi_price'];
					$ReportDesc['ent_price'] = $_POST['ent_price'];
					$ReportDesc['published_status'] = 1;
					$_POST['meta_title']="";
					$_POST['meta_desc']="";
					$_POST['meta_keyword']="";
					if ($_POST['meta_title']=="")
					{
						$ReportDesc['meta_title'] = $_POST['title'];
					}
					else
					{
						$ReportDesc['meta_title'] = $_POST['meta_title'];
					}
					if ($_POST['meta_desc'])
					{
						$ReportDesc['meta_desc'] = $_POST['meta_desc'];
					}
					else
					{
						$ReportDesc['meta_desc'] = "paypal has added ".$_POST['title']." to its database of Market Research Reports. This report covers market size by types, applications and major regions. It also focuses on industry trends and developments, future market forecasts and key players of the market.";
					}
					$ReportDesc['meta_keyword'] = $_POST['meta_keyword'];
					$count = count($this->data_model->get(array('title'=> $Report['title'], 'publisher_id'=> $Report['publisher_id']), NULL, array('id'), NULL, 'report'));
					if ($count!=0)
					{
						$res = $this->data_model->add($Report, 'report');
						$ReportDesc['id'] = $res;
						if ($res)
						{
							$res1 =$this->data_model->add($ReportDesc, 'report_details');
							if ($res1)
							{
								$this->session->set_flashdata('msg', 'Payment Link Added Successfully');
							}
							else
							{
								$this->session->set_flashdata('msg', 'Error Adding Record');
							}
						}
						else
						{
							$this->session->set_flashdata('msg', 'Error Adding Record');
						}
					}
					else
					{
						$this->session->set_flashdata('msg', 'PaymentLink Already Exist');
					}
					redirect(base_url().'user/add/paylink');
				}
				else
				{
					$data['pagetitle'] = "Add Payment Link";
					$data['fields'] = array('title' =>'text', 'single_price' =>'text', 'multi_price' =>'text','ent_price' =>'text');
					$data['for'] = "paylink";
					// $data['statusOpt'] = array('Enabled'=> 1, 'Disabled'=>0);

					$cat_idOpt = $this->data_model->get(NULL, NULL, array('name', 'id'), NULL, 'category');
					$publisher_idOpt = $this->data_model->get(NULL, NULL, array('name', 'id'), NULL, 'publisher');
					$region_idOpt = $this->data_model->get(NULL, NULL, array('name', 'id'), NULL, 'regions');

					$data['cat_idOpt'] = array();
					foreach ($cat_idOpt as $value)
					{
						if(!isset($data['cat_idOpt'][$value['name']])) 
						{
							$data['cat_idOpt'][$value['name']] = array();
						}
						$data['cat_idOpt'][$value['name']] = $value['id'];
					}

					$data['publisher_idOpt'] = array();
					foreach ($publisher_idOpt as $value)
					{
						if(!isset($data['publisher_idOpt'][$value['name']])) 
						{
							$data['publisher_idOpt'][$value['name']] = array();
						}
						$data['publisher_idOpt'][$value['name']] = $value['id'];
					}

					$data['region_idOpt'] = array();
					foreach ($region_idOpt as $value)
					{
						if(!isset($data['region_idOpt'][$value['name']])) 
						{
							$data['region_idOpt'][$value['name']] = array();
						}
						$data['region_idOpt'][$value['name']] = $value['id'];
					}

					$data['published_statusOpt'] = array('Published'=> 1, 'Upcoming'=>0);
					$this->load->view('pages/add', $data);
				}
			}
			else
			{
				redirect(base_url().'user');
			}
		}



		else
		{
			show_404();
		}
	}

	public function edit($type, $id)
	{
		if ($type == 'member')
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($_POST)
				{
					if ($this->data_model->edit($_POST, array('id' =>  $id), 'user'))
					{
						$this->session->set_flashdata('msg', 'Record Edited Successfully');
					}
					else
					{
						$this->session->set_flashdata('msg', 'Error Editing Record');
					}
					redirect(base_url().'edit/member/'.$id);
				}
				else
				{
					$cond = array('id' => $id);
					$tbls = NULL;
					$fields = array('id', 'name', 'email', 'type', 'status');
					$data['Record'] = $this->data_model->get($cond, $tbls, $fields, NULL, 'user')[0];
					$data['pagetitle'] = "Edit User";
					$data['fields'] = array('name' =>'text', 'email' =>'email', 'type' =>'text', 'status' =>'select');
					$data['for'] = "user";
					$data['statusOpt'] = array('Enabled'=> 1, 'Disabled'=>0);
					$this->load->view('pages/edit', $data);
				}
			}
			else
			{
				redirect(base_url().'admin');
			}
		}
		elseif ($type == "publisher")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($_POST)
				{
					$config['upload_path'] = './uploads/publisher';
					$config['allowed_types'] = 'jpeg|jpg|png|gif';
					$config['max_size'] = 2048;
					

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('img'))
					{
						// $data = array('upload_data' => $this->upload->data());
						$_POST['img'] = $this->upload->data()['file_name'];
						// print_r($this->upload->data());
					}
					else
					{
						unset($_POST['img']);
					}
					
					if ($this->data_model->edit($_POST, array('id' =>  $id), 'publisher'))
					{
						$this->session->set_flashdata('msg', 'Record Edited Successfully');
					}
					else
					{
						$this->session->set_flashdata('msg', 'Error Editing Record');
					}
					redirect(base_url().'edit/publisher/'.$id);
				}
				else
				{
					$cond = array('id' => $id);
					$tbls = NULL;
					$fields = array('id', 'name', 'img', 'status');
					$data['Record'] = $this->data_model->get($cond, $tbls, $fields, NULL, 'publisher')[0];
					$data['pagetitle'] = "Edit Publisher";
					$data['fields'] = array('name' =>'text', 'img' =>'file', 'status' =>'select');
					$data['for'] = "publisher";
					$data['statusOpt'] = array('Enabled'=> 1, 'Disabled'=>0);
					$this->load->view('pages/edit', $data);
				}
			}
			else
			{
				redirect(base_url().'admin');
			}
		}

		elseif ($type == "category")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($_POST)
				{
					$config['upload_path'] = './uploads/category';
					$config['allowed_types'] = 'jpg|png';
					$config['max_size'] = 2048;
					

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('img'))
					{
						// $data = array('upload_data' => $this->upload->data());
						$_POST['img'] = $this->upload->data()['file_name'];
						// print_r($this->upload->data());
					}
					else
					{
						unset($_POST['img']);
					}
					
					if ($this->data_model->edit($_POST, array('id' =>  $id), 'category'))
					{
						$this->session->set_flashdata('msg', 'Record Edited Successfully');
					}
					else
					{
						$this->session->set_flashdata('msg', 'Error Editing Record');
					}
					redirect(base_url().'edit/category/'.$id);
				}
				else
				{
					$cond = array('id' => $id);
					$tbls = NULL;
					$fields = array('id', 'name', 'img', 'status');
					$data['Record'] = $this->data_model->get($cond, $tbls, $fields, NULL, 'category')[0];
					$data['pagetitle'] = "Edit Category";
					$data['fields'] = array('name' =>'text', 'img' =>'file', 'status' =>'select');
					$data['for'] = "category";
					$data['statusOpt'] = array('Enabled'=> 1, 'Disabled'=>0);
					$this->load->view('pages/edit', $data);
				}
			}
			else
			{
				redirect(base_url().'admin');
			}
		}
		elseif ($type == "region")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($_POST)
				{
					// print_r($_POST);
					if ($this->data_model->edit($_POST, array('id' =>  $id), 'regions'))
					{
						$this->session->set_flashdata('msg', 'Record Edited Successfully');
					}
					else
					{
						$this->session->set_flashdata('msg', 'Error Editing Record');
					}
					redirect(base_url().'edit/region/'.$id);
				}
				else
				{
					$cond = array('id' => $id);
					$tbls = NULL;
					$fields = array('id', 'name', 'status');
					$data['Record'] = $this->data_model->get($cond, $tbls, $fields, NULL, 'regions')[0];
					$data['pagetitle'] = "Edit Region";
					$data['fields'] = array('name' =>'text', 'status' =>'select');
					$data['for'] = "region";
					$data['statusOpt'] = array('Enabled'=> 1, 'Disabled'=>0);
					$this->load->view('pages/edit', $data);
				}
			}
			else
			{
				redirect(base_url().'admin');
			}
		}

		elseif ($type == "report")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($_POST)
				{
					// print_r($_POST);
					$Report['title'] = $_POST['title'];
					$Report['report_desc'] = $_POST['report_desc'];
					$Report['cat_id'] = $_POST['cat_id'];
					$Report['publisher_id'] = $_POST['publisher_id'];
					$Report['region_id'] = $_POST['region_id'];
					$Report['added_by'] = $this->session->userdata('userid');
					$Report['status'] = 1;
					

					$ReportDesc['id'] = $id;
					$ReportDesc['toc'] = $_POST['toc'];
					$ReportDesc['list_tbl_fig'] = $_POST['list_tbl_fig'];
					$ReportDesc['published_date'] =date('Y-m-d', strtotime($_POST['published_date']));
					$ReportDesc['pages'] = $_POST['pages'];
					$ReportDesc['single_price'] = $_POST['single_price'];
					$ReportDesc['multi_price'] = $_POST['multi_price'];
					$ReportDesc['ent_price'] = $_POST['ent_price'];
					$ReportDesc['published_status'] = $_POST['published_status'];
					if ($_POST['meta_title']=="")
					{
						$ReportDesc['meta_title'] = $_POST['title'];
					}
					else
					{
						$ReportDesc['meta_title'] = $_POST['meta_title'];
					}
					if ($_POST['meta_desc'])
					{
						$ReportDesc['meta_desc'] = $_POST['meta_desc'];
					}
					else
					{
						$ReportDesc['meta_desc'] = substr($_POST['report_desc'], 0, 300);
					}
					$ReportDesc['meta_keyword'] = $_POST['meta_keyword'];

					
					if ($this->data_model->edit($Report, array('id'=>$id), 'report'))
					{
						if ($this->data_model->edit($ReportDesc, array('id'=>$id), 'report_details'))
						{
							$this->session->set_flashdata('msg', 'Record Edited Successfully');
						}
						else
						{
							$this->session->set_flashdata('msg', 'Error Editing Record');
						}
					}
					else
					{
						$this->session->set_flashdata('msg', 'Error Adding Record');
					}
					redirect(base_url().'user/edit/report/'.$id);
				}
				else
				{
					$data['pagetitle'] = "Edit Report";
					$data['fields'] = array('title' =>'text', 'report_desc' =>'textarea','cat_id' =>'select', 'publisher_id' =>'select', 'region_id' =>'select','published_date' =>'text', 'pages' =>'text','single_price' =>'text', 'multi_price' =>'text','ent_price' =>'text', 'published_status' =>'select', 'meta_keyword' =>'text' , 'meta_title'=> 'text', 'meta_desc' =>'text');
					$data['for'] = "report";

					$cond = array('report.id'=> $id);
					
					$tbls[0] = array('name' => 'report_details', 'condi' => 'report.id = report_details.id' );
					$fields = array('report.id','title', 'report_desc', 'cat_id', 'publisher_id', 'region_id', 'toc', 'list_tbl_fig', 'published_date', 'pages', 'single_price', 'multi_price', 'ent_price', 'published_status', 'meta_title', 'meta_desc', 'meta_keyword');
					$data['Record'] = $this->data_model->get($cond, $tbls, $fields, NULL, 'report')[0];
					
					$cat_idOpt = $this->data_model->get(NULL, NULL, array('name', 'id'), NULL, 'category');
					$publisher_idOpt = $this->data_model->get(NULL, NULL, array('name', 'id'), NULL, 'publisher');
					$region_idOpt = $this->data_model->get(NULL, NULL, array('name', 'id'), NULL, 'regions');

					$data['cat_idOpt'] = array();
					foreach ($cat_idOpt as $value)
					{
						if(!isset($data['cat_idOpt'][$value['name']])) 
						{
							$data['cat_idOpt'][$value['name']] = array();
						}
						$data['cat_idOpt'][$value['name']] = $value['id'];
					}

					$data['publisher_idOpt'] = array();
					foreach ($publisher_idOpt as $value)
					{
						if(!isset($data['publisher_idOpt'][$value['name']])) 
						{
							$data['publisher_idOpt'][$value['name']] = array();
						}
						$data['publisher_idOpt'][$value['name']] = $value['id'];
					}

					$data['region_idOpt'] = array();
					foreach ($region_idOpt as $value)
					{
						if(!isset($data['region_idOpt'][$value['name']])) 
						{
							$data['region_idOpt'][$value['name']] = array();
						}
						$data['region_idOpt'][$value['name']] = $value['id'];
					}

					$data['published_statusOpt'] = array('Published'=> 1, 'Upcoming'=>0);
					$this->load->view('pages/edit', $data);
					// print_r($data['Record']);
				}
			}
			else
			{
				redirect(base_url().'user');
			}
		}
		elseif ($type == "paylink")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($_POST)
				{

					$Report['title'] = $_POST['title'];
					$Report['report_desc'] = "report_desc";
					$Report['cat_id'] = "1";
					$Report['publisher_id'] = "1";
					$Report['region_id'] = "1";
					$Report['added_by'] = $this->session->userdata('userid');
					$Report['status'] =3;
					$ReportDesc['toc'] = "report TOC";
					$ReportDesc['list_tbl_fig'] =  "report tbl Fig";
					$ReportDesc['published_date'] =date('Y-m-d');
					$ReportDesc['pages'] = "100";
					$ReportDesc['single_price'] = $_POST['single_price'];
					$ReportDesc['multi_price'] = $_POST['multi_price'];
					$ReportDesc['ent_price'] = $_POST['ent_price'];
					$ReportDesc['published_status'] = 1;
					$_POST['meta_title']="";
					$_POST['meta_desc']="";
					$_POST['meta_keyword']="";
					if ($_POST['meta_title']=="")
					{
						$ReportDesc['meta_title'] = $_POST['title'];
					}
					else
					{
						$ReportDesc['meta_title'] = $_POST['meta_title'];
					}
					if ($_POST['meta_desc'])
					{
						$ReportDesc['meta_desc'] = $_POST['meta_desc'];
					}
					else
					{
						$ReportDesc['meta_desc'] = substr($_POST['report_desc'], 0, 300);
					}
					$ReportDesc['meta_keyword'] = $_POST['meta_keyword'];

					
					if ($this->data_model->edit($Report, array('id'=>$id), 'report'))
					{
						if ($this->data_model->edit($ReportDesc, array('id'=>$id), 'report_details'))
						{
							$this->session->set_flashdata('msg', 'Record Edited Successfully');
						}
						else
						{
							$this->session->set_flashdata('msg', 'Error Editing Record');
						}
					}
					else
					{
						$this->session->set_flashdata('msg', 'Error Adding Record');
					}
					redirect(base_url().'user/edit/paylink/'.$id);
				}
				else
				{
					$data['pagetitle'] = "Edit Payment link";
					$data['fields'] = array('title' =>'text','single_price' =>'text', 'multi_price' =>'text','ent_price' =>'text');
					$data['for'] = "paylink";

					$cond = array('report.id'=> $id);
					
					$tbls[0] = array('name' => 'report_details', 'condi' => 'report.id = report_details.id' );
					$fields = array('report.id','title', 'report_desc', 'cat_id', 'publisher_id', 'region_id', 'toc', 'list_tbl_fig', 'published_date', 'pages', 'single_price', 'multi_price', 'ent_price', 'published_status', 'meta_title', 'meta_desc', 'meta_keyword');
					$data['Record'] = $this->data_model->get($cond, $tbls, $fields, NULL, 'report')[0];
					
					$cat_idOpt = $this->data_model->get(NULL, NULL, array('name', 'id'), NULL, 'category');
					$publisher_idOpt = $this->data_model->get(NULL, NULL, array('name', 'id'), NULL, 'publisher');
					$region_idOpt = $this->data_model->get(NULL, NULL, array('name', 'id'), NULL, 'regions');

					$data['cat_idOpt'] = array();
					foreach ($cat_idOpt as $value)
					{
						if(!isset($data['cat_idOpt'][$value['name']])) 
						{
							$data['cat_idOpt'][$value['name']] = array();
						}
						$data['cat_idOpt'][$value['name']] = $value['id'];
					}

					$data['publisher_idOpt'] = array();
					foreach ($publisher_idOpt as $value)
					{
						if(!isset($data['publisher_idOpt'][$value['name']])) 
						{
							$data['publisher_idOpt'][$value['name']] = array();
						}
						$data['publisher_idOpt'][$value['name']] = $value['id'];
					}

					$data['region_idOpt'] = array();
					foreach ($region_idOpt as $value)
					{
						if(!isset($data['region_idOpt'][$value['name']])) 
						{
							$data['region_idOpt'][$value['name']] = array();
						}
						$data['region_idOpt'][$value['name']] = $value['id'];
					}

					$data['published_statusOpt'] = array('Published'=> 1, 'Upcoming'=>0);
					$this->load->view('pages/edit', $data);
					// print_r($data['Record']);
				}
			}
			else
			{
				redirect(base_url().'user');
			}
		}

		elseif ($type == "press_release")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($_POST)
				{
					// print_r($_POST);
					if ($this->data_model->edit($_POST, array('id' =>  $id), 'press_release'))
					{
						$this->session->set_flashdata('msg', 'Record Edited Successfully');
					}
					else
					{
						$this->session->set_flashdata('msg', 'Error Editing Record');
					}
					redirect(base_url().'edit/press_release/'.$id);
				}
				else
				{
					$cond = array('id' => $id);
					$tbls = NULL;
					$fields = array('id', 'title', 'desc', 'meta_title', 'meta_desc', 'meta_keyword');
					$data['Record'] = $this->data_model->get($cond, $tbls, $fields, NULL, 'press_release')[0];
					$data['pagetitle'] = "Add Press Release";
					$data['fields'] = array('title' =>'text', 'desc' =>'textarea', 'meta_keyword' =>'text' , 'meta_title'=> 'text', 'meta_desc' =>'text');
					$data['for'] = "press_release";
					
					$this->load->view('pages/edit', $data);
				}
			}
			else
			{
				redirect(base_url().'user');
			}
		}

		elseif ($type == "blog")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($_POST)
				{
					// print_r($_POST);
					if ($this->data_model->edit($_POST, array('id' =>  $id), 'blog'))
					{
						$this->session->set_flashdata('msg', 'Record Edited Successfully');
					}
					else
					{
						$this->session->set_flashdata('msg', 'Error Editing Record');
					}
					redirect(base_url().'edit/blog/'.$id);
				}
				else
				{
					$cond = array('id' => $id);
					$tbls = NULL;
					$fields = array('id', 'title', 'desc', 'meta_title', 'meta_desc', 'meta_keyword');
					$data['Record'] = $this->data_model->get($cond, $tbls, $fields, NULL, 'blog')[0];
					$data['pagetitle'] = "Add Press Release";
					$data['fields'] = array('title' =>'text', 'desc' =>'textarea', 'meta_keyword' =>'text' , 'meta_title'=> 'text', 'meta_desc' =>'text');
					$data['for'] = "blog";
					
					$this->load->view('pages/edit', $data);
				}
			}
			else
			{
				redirect(base_url().'user');
			}
		}

		else
		{
			show_404();
		}
	}

	public function delete($type, $id)
	{
		if ($type == 'member')
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($this->data_model->delete(array('id' => $id), 'user'))
				{
					$this->session->set_flashdata('msg', 'Record Deleted Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Deleting Record');
				}
				redirect(base_url().'list/member');
			}
			else
			{
				redirect(base_url().'admin');
			}
		}
		elseif ($type == "publisher")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($this->data_model->delete(array('id' => $id), 'publisher'))
				{
					$this->session->set_flashdata('msg', 'Record Deleted Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Deleting Record');
				}
				redirect(base_url().'list/publisher');
			}
			else
			{
				redirect(base_url().'admin');
			}
		}
		elseif ($type == "category")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($this->data_model->delete(array('id' => $id), 'category'))
				{
					$this->session->set_flashdata('msg', 'Record Deleted Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Deleting Record');
				}
				redirect(base_url().'list/category');
			}
			else
			{
				redirect(base_url().'admin');
			}
		}
		elseif ($type == "region")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($this->data_model->delete(array('id' => $id), 'regions'))
				{
					$this->session->set_flashdata('msg', 'Record Deleted Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Deleting Record');
				}
				redirect(base_url().'list/region');
			}
			else
			{
				redirect(base_url().'admin');
			}
		}
		elseif ($type == "report")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($this->data_model->delete(array('id' => $id), 'report') && $this->data_model->delete(array('id' => $id), 'report_details'))
				{
					$this->session->set_flashdata('msg', 'Record Deleted Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Deleting Record');
				}
				redirect(base_url().'list/report');
			}
			else
			{
				redirect(base_url().'user');
			}
		}elseif ($type == "paylink")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($this->data_model->delete(array('id' => $id), 'report') && $this->data_model->delete(array('id' => $id), 'report_details'))
				{
					$this->session->set_flashdata('msg', 'Payment Deleted Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Deleting Record');
				}
				redirect(base_url().'list/paylink');
			}
			else
			{
				redirect(base_url().'user');
			}
		}

		elseif ($type == "press_release")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($this->data_model->delete(array('id' => $id), 'press_release'))
				{
					$this->session->set_flashdata('msg', 'Record Deleted Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Deleting Record');
				}
				redirect(base_url().'list/press_release');
			}
			else
			{
				redirect(base_url().'user');
			}
		}

		elseif ($type == "blog")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($this->data_model->delete(array('id' => $id), 'blog'))
				{
					$this->session->set_flashdata('msg', 'Record Deleted Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Deleting Record');
				}
				redirect(base_url().'list/blog');
			}
			else
			{
				redirect(base_url().'user');
			}
		}

		else
		{
			show_404();
		}
	}

	public function enable($type, $id)
	{
		if ($type == 'member')
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($this->data_model->edit(array('status' => 1), array('id' => $id), 'user'))
				{
					$this->session->set_flashdata('msg', 'Record Enabled Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Enabling Record');
				}
				redirect(base_url().'list/member');
			}
			else
			{
				redirect(base_url().'admin');
			}
		}
		elseif ($type == "publisher")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($this->data_model->edit(array('status' => 1), array('id' => $id), 'publisher'))
				{
					$this->session->set_flashdata('msg', 'Record Enabled Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Enabling Record');
				}
				redirect(base_url().'list/publisher');
			}
			else
			{
				redirect(base_url().'admin');
			}
		}
		elseif ($type == "category")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($this->data_model->edit(array('status' => 1), array('id' => $id), 'category'))
				{
					$this->session->set_flashdata('msg', 'Record Enabled Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Enabling Record');
				}
				redirect(base_url().'list/category');
			}
			else
			{
				redirect(base_url().'admin');
			}
		}
		elseif ($type == "region")
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($this->data_model->edit(array('status' => 1), array('id' => $id), 'regions'))
				{
					$this->session->set_flashdata('msg', 'Record Enabled Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Enabling Record');
				}
				redirect(base_url().'list/region');
			}
			else
			{
				redirect(base_url().'admin');
			}
		}
		else
		{
			show_404();
		}
	}

	public function disable($type, $id)
	{
		if ($type == 'member')
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($this->data_model->edit(array('status' => 0), array('id' => $id), 'user'))
				{
					$this->session->set_flashdata('msg', 'Record Disabled Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Disabling Record');
				}
				redirect(base_url().'list/member');
			}
			else
			{
				redirect(base_url().'admin');
			}
		}
		elseif ($type == 'publisher')
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($this->data_model->edit(array('status' => 0), array('id' => $id), 'publisher'))
				{
					$this->session->set_flashdata('msg', 'Record Disabled Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Disabling Record');
				}
				redirect(base_url().'list/publisher');
			}
			else
			{
				redirect(base_url().'admin');
			}
		}

		elseif ($type == 'category')
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($this->data_model->edit(array('status' => 0), array('id' => $id), 'category'))
				{
					$this->session->set_flashdata('msg', 'Record Disabled Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Disabling Record');
				}
				redirect(base_url().'list/category');
			}
			else
			{
				redirect(base_url().'admin');
			}
		}

		elseif ($type == 'region')
		{
			if ($this->session->userdata('logged_in')=='Admin')
			{
				if ($this->data_model->edit(array('status' => 0), array('id' => $id), 'regions'))
				{
					$this->session->set_flashdata('msg', 'Record Disabled Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Disabling Record');
				}
				redirect(base_url().'list/region');
			}
			else
			{
				redirect(base_url().'admin');
			}
		}
		else
		{
			show_404();
		}
	}
	
	public function upload($type){
		if ($this->session->userdata('logged_in') == "User"){
			if ($type =="report"){
				if ($_POST) {
					ini_set('memory_limit', '1024M');
					$path  = FCPATH .'uploads/excel';
					$config['upload_path'] = $path;
					$config['allowed_types'] = 'xlsx|xls|csv';
					$config['remove_spaces'] = TRUE;
					$config['max_size'] = 20480;
					
					$this->load->library('excel', $config);
					$this->load->library('upload');
					$this->upload->initialize($config);

					if (!$this->upload->do_upload('excelFile')){
						$error = array('error' => $this->upload->display_errors());
					}
					else{
						$data = array('upload_data' => $this->upload->data());
					}
					
					if (!empty($data['upload_data']['file_name'])) {
						$import_xls_file = $data['upload_data']['file_name'];
					}
					else{
						$import_xls_file = 0;
					}

					$inputFileName = $path .'/'. $import_xls_file;
					try{
						$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
						$objReader = PHPExcel_IOFactory::createReader($inputFileType);
						$objPHPExcel = $objReader->load($inputFileName);
					}
					catch (Exception $e){
						die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME). '": ' . $e->getMessage());
					}
					
					$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
					
					$arrayCount = count($allDataInSheet);
					$flag = 0;
					$co = 0;
					$a=0;
					// print_r($allDataInSheet[1]['A']);
					$createArray = array('ReportTitle', 'Description', 'Category', 'Publisher', 'Region', 'TableOfContent', 'ListOfTablesFigures', 'PublishedDate', 'NumberOfPages', 'SingleUserPrice', 'MultipleUserPrice', 'EnterpriseUserPrice', 'PublishStatus', 'MetaTitle', 'MetaDesctiption', 'MetaKeyword','Slug');

					$makeArray = array('ReportTitle' => 'ReportTitle', 'Description' => 'Description', 'Category' => 'Category', 'Publisher' => 'Publisher', 'Region' => 'Region', 'TableOfContent' => 'TableOfContent', 'ListOfTablesFigures' => 'ListOfTablesFigures', 'PublishedDate' => 'PublishedDate', 'NumberOfPages' => 'NumberOfPages', 'SingleUserPrice' => 'SingleUserPrice', 'MultipleUserPrice' => 'MultipleUserPrice', 'EnterpriseUserPrice' => 'EnterpriseUserPrice', 'PublishStatus' => 'PublishStatus', 'MetaTitle' => 'MetaTitle', 'MetaDesctiption' => 'MetaDesctiption', 'MetaKeyword' => 'MetaKeyword','Slug' => 'Slug');

					$SheetDataKey = array();
					
					foreach ($allDataInSheet as $dataInSheet) {
						foreach ($dataInSheet as $key => $value){
							if (in_array(trim($value), $createArray)){
								$value = preg_replace('/\s+/', '', $value);
								$SheetDataKey[trim($value)] = $key;
							}
						}
					}
					
					$data = array_diff_key($SheetDataKey);
					if (empty($data)){
						$flag = 1;
					}
					if ($flag == 1) {
						for ($i=2; $i <= $arrayCount; $i++){
							$Publisher = filter_var(trim(str_replace('_x000D_', '', $allDataInSheet[$i][$SheetDataKey['Publisher']])), FILTER_SANITIZE_STRING);

							$Category = filter_var(trim(str_replace('_x000D_', '', $allDataInSheet[$i][$SheetDataKey['Category']])), FILTER_SANITIZE_STRING);

							$Region = filter_var(trim(str_replace('_x000D_', '', $allDataInSheet[$i][$SheetDataKey['Region']])), FILTER_SANITIZE_STRING);

							$PublishedDate = filter_var(trim(str_replace('_x000D_', '', $allDataInSheet[$i][$SheetDataKey['PublishedDate']])), FILTER_SANITIZE_STRING);

							$PublishStatus = filter_var(trim(str_replace('_x000D_', '', $allDataInSheet[$i][$SheetDataKey['PublishStatus']])), FILTER_SANITIZE_STRING);

							$MetaTitle = filter_var(trim(str_replace('_x000D_', '', $allDataInSheet[$i][$SheetDataKey['MetaTitle']])), FILTER_SANITIZE_STRING);

							$MetaDesctiption = filter_var(trim(str_replace('_x000D_', '', $allDataInSheet[$i][$SheetDataKey['MetaDesctiption']])), FILTER_SANITIZE_STRING);

							$Report['title'] = filter_var(trim(str_replace('_x000D_', '', $allDataInSheet[$i][$SheetDataKey['ReportTitle']])), FILTER_SANITIZE_STRING);
							if (!$Report['title']) {
								continue;
							}
							$Report['report_desc'] = trim(str_replace('_x000D_', '', $allDataInSheet[$i][$SheetDataKey['Description']]));

							$Report['cat_id'] = $this->data_model->get(array('name' => $Category), Null, array('id'), NULL, 'category')[0]['id'];

							if ($Report['cat_id'] == "") {
								$Report['cat_id'] = 15;
							}
							/*Slug from meta-keyword*/

							$slugdata=filter_var(trim(str_replace('_x000D_', '', $allDataInSheet[$i][$SheetDataKey['Slug']])), FILTER_SANITIZE_STRING);

							$Report['slug'] = strtolower(str_replace(" ","-",$slugdata));
							if ($Publisher) {
								$Report['publisher_id'] = $this->data_model->get(array('name' => $Publisher), Null, array('id'), NULL, 'publisher')[0]['id'];
							}else{
								$Report['publisher_id'] =1;
							}

							$reg = $this->data_model->get(array('name' => $Region), Null, array('id'), NULL, 'regions')[0]['id'];

							if ($reg){
								$Report['region_id'] = $reg;
							}
							else{
								$Report['region_id'] = 1;
							}

							$Report['added_by'] = $this->session->userdata('userid');
							$Report['status'] = 1;


							$ReportDesc['toc'] = filter_var(trim(str_replace('_x000D_', '', $allDataInSheet[$i][$SheetDataKey['TableOfContent']])), FILTER_SANITIZE_STRING);

							$ReportDesc['list_tbl_fig'] = filter_var(trim(str_replace('_x000D_', '', $allDataInSheet[$i][$SheetDataKey['ListOfTablesFigures']])), FILTER_SANITIZE_STRING);

							if ($PublishedDate) {
								$ReportDesc['published_date'] = date('Y-m-d', strtotime($PublishedDate));
							}else{
								$ReportDesc['published_date']= date("Y-m-d");
							}

							$ReportDesc['pages'] = filter_var(trim(str_replace('_x000D_', '', $allDataInSheet[$i][$SheetDataKey['NumberOfPages']])), FILTER_SANITIZE_STRING);

							$ReportDesc['single_price'] = filter_var(trim(str_replace('_x000D_', '', $allDataInSheet[$i][$SheetDataKey['SingleUserPrice']])), FILTER_SANITIZE_STRING);

							$ReportDesc['multi_price'] = filter_var(trim(str_replace('_x000D_', '', $allDataInSheet[$i][$SheetDataKey['MultipleUserPrice']])), FILTER_SANITIZE_STRING);

							$ReportDesc['ent_price'] = filter_var(trim(str_replace('_x000D_', '', $allDataInSheet[$i][$SheetDataKey['EnterpriseUserPrice']])), FILTER_SANITIZE_STRING);

							if ($PublishStatus == "Publish"){
								$ReportDesc['published_status'] = 1;
							}
							else{
								$ReportDesc['published_status'] = 0;
							}

							if ($MetaTitle == ""){
								$ReportDesc['meta_title'] = $Report['title'];
							}
							else{
								$ReportDesc['meta_title'] = $MetaTitle;
							}

							if ($MetaDesctiption != ""){
								$ReportDesc['meta_desc'] = $MetaDesctiption;
							}
							else{
								$ReportDesc['meta_desc'] = "paypal has added ".$Report['title']." to its database of Market Research Reports. This report covers market size by types, applications and major regions. It also focuses on industry trends and developments, future market forecasts and key players of the market.";
							}
							$ReportDesc['meta_keyword'] = filter_var(trim(str_replace('_x000D_', '', $allDataInSheet[$i][$SheetDataKey['MetaKeyword']])), FILTER_SANITIZE_STRING);
							
							
							$isExist = $this->data_model->get(array('slug'=> $Report['slug'], 'publisher_id'=> $Report['publisher_id']), NULL, array('id'), NULL, 'report');
							
							if ($isExist){
								$count = count($isExist);
							}
							else{
								$count = 0;
							}

							if($$isExist){
								$res = $this->data_model->edit($Report, array('title'=> $Report['title'],'publisher_id'=> $Report['publisher_id']),'report');
								$ReportDesc['id'] = $$isExist[0]["id"];
								if ($res){
									$res1 =$this->data_model->edit($ReportDesc,array('id'=> $ReportDesc['id']), 'report_details');
									if ($res1){
										$a++;
									}
								}
							}else{
								$cond = array('report.publisher_id'=> $Report['publisher_id'], 'report_details.single_price'=> $ReportDesc['single_price'],'report_details.multi_price'=> $ReportDesc['multi_price'],'report_details.ent_price'=> $ReportDesc['ent_price'],'report_details.meta_keyword'=> $ReportDesc['meta_keyword']);
								$tbls[0] = array('name' => 'report_details', 'condi' => 'report.id = report_details.id');
								$fields = array('report.id');
								$hasSame = $this->data_model->get($cond, $tbls, $fields, NULL, 'report')[0];
								if ($hasSame) {
									$res = $this->data_model->edit($Report, array('id'=> $hasSame['id']),'report');
									$ReportDesc['id'] = $hasSame['id'];
									if ($res){
										$res1 =$this->data_model->edit($ReportDesc,array('id'=> $ReportDesc['id']), 'report_details');
										if ($res1){
											$a++;
										}
									}
								}else{
									if ($count == 0){
										$res = $this->data_model->add($Report, 'report');
										$ReportDesc['id'] = $res;
										if ($res){
											$res1 =$this->data_model->add($ReportDesc, 'report_details');
											if ($res1){
												$a++;
											}
										}
									}	
								}
							}
						}
						$this->session->set_flashdata('msg', $a .' Of ' .($arrayCount-1).' Reports Uploaded');
					}
					else{
						$this->session->set_flashdata('msg', 'Invalid File Please try Again');
					}
					redirect(base_url().'upload/report');
				}
				else
				{
					$data['for'] = "report";
					$data['pagetitle'] = 'Upload Reports Excel';
					$this->load->view('pages/upload_file', $data);
				}
			}
			if ($type =="press_release"){
				if ($_POST){
					print_r($_POST);
				}
				else{
					$data['for'] = "press_release";
					$data['pagetitle'] = 'Upload Press Release Excel';
					$this->load->view('pages/upload_file', $data);
				}
			}
			if ($type =="blog"){
				if ($_POST){
					print_r($_POST);
				}
				else{
					$data['for'] = "blog";
					$data['pagetitle'] = 'Upload Blog Post Excel';
					$this->load->view('pages/upload_file', $data);
				}
			}
		}
		else{
			redirect(base_url().'user');
		}

	}
	public function pages($title)
	{
		if ($this->session->userdata('logged_in')=='Admin')
		{
			if ($_POST)
			{
				if ($this->data_model->edit($_POST, array('title' => $title), 'pages'))
				{
					$this->session->set_flashdata('msg', 'Page Edited Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Editing Page');
				}
				redirect(base_url().'pages/'.$title);
			}
			else
			{
				$cond = array('title' => $title);
				$tbls = NULL;
				$fields = array('*');
				$data['Record'] = $this->data_model->get($cond, $tbls, $fields, NULL, 'pages')[0];
				$data['pagetitle'] = "Edit ".ucfirst($title) ;
				$data['fields'] = array('title' =>'text', 'page_content' =>'textarea', 'meta_title' =>'text', 'meta_desc' =>'text', 'meta_keyword' =>'text');
				$data['for'] = NULL;
				$this->load->view('pages/edit', $data);
			}
		}
		else
		{
			redirect(base_url().'user');
		}
	}
	public function logout($path ='')
	{
		$this->session->sess_destroy();
		if ($path == 'Admin')
		{
			redirect(base_url());
		}
		else
		{
			redirect(base_url().$path);
		}
	}

	public function createXLS() 
	{
		if ($this->session->userdata('logged_in') == 'Admin')
		{

			$fileName = 'data-' . date('Y-m-d'). '.xlsx';
			$this->load->library('excel');
			$empInfo = $this->data_model->report_list();
	        /* print_r($empInfo);
	        die;*/
	        $objPHPExcel = new PHPExcel();
	        $objPHPExcel->setActiveSheetIndex(0);

	        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ReportTitle');
	        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Description');
	        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Category');
	        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Publisher');
	        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Region');
	        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'PublishedDate');
	        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'MetaKeyword');
	        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Full Report URL');
	        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'ID');

	        $rowCount = 2;
	        foreach ($empInfo as $element) {
	        	$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['title']);
	        	$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['report_desc']);
	        	$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['cat_name']);
	        	$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['publisher_name']);
	        	$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['regions_name']);
	        	$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['published_date']);
	        	$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['meta_keyword']);
	        	$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, base_url().'report/'.$element['id'].'/'.str_replace(' ', '-', $element['meta_keyword']));
	        	$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['id']);
	        	$rowCount++;
	        }
	        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
	        $objWriter->save('export/' . $fileName);
	        header("Content-Type: application/vnd.ms-excel");
	        redirect(base_url().'export/' . $fileName);
	    }
	    else
	    {
	    	redirect(base_url().'user');
	    }
	}
}
