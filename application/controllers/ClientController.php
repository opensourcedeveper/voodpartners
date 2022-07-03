<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ClientModel');
		$this->load->library('upload');
		// $this->load->library('excel');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			$data['Records'] = $this->ClientModel->getAll('client'); 
			$data['pagetitle'] = 'Client List';
			$this->load->view('client/list', $data);
		}else{
			redirect(base_url().'login');
		}
	}
	
	public function add()
	{
		if ($this->session->userdata('logged_in')) {

			if($this->input->post()){
				// print_r($this->input->post());die();
				$config['upload_path'] = FCPATH .'/uploads/clients/';
				$config['allowed_types'] = 'jpeg|jpg|png|gif|svg';
				$config['max_size'] = 4096;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('image'))
				{
					$picture = $this->upload->data()['file_name'];
				}
				else
				{
					$error = array('error' => $this->upload->display_errors());
					$picture = NULL;
				}
 

				$data = array(
					'name' =>$this->input->post('name') , 
					'img' =>$picture , 
					'status' =>$this->input->post('status') , 
					'created_at'=>date("Y-m-d H:i:s"),
				);
				if ($this->ClientModel->add($data, 'client'))
				{
					$this->session->set_flashdata('msg', 'Client Added Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Adding Client');
				}

				redirect(base_url().'admin/client/add');

			}else{
				$data['pagetitle'] = 'Add Client';
				$this->load->view('client/add', $data);			
			}
		}else{
			redirect(base_url().'login');
		}
	}


	public function edit($id)
	{
		if ($this->session->userdata('logged_in')) {
			if($this->input->post()){
				$config['upload_path'] = FCPATH .'/uploads/clients/';
				$config['allowed_types'] = 'jpeg|jpg|png|gif';
				$config['max_size'] = 4096;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('image'))
				{
					$picture = $this->upload->data()['file_name'];
					$data = array(
						'name' =>$this->input->post('name') , 
						'img' =>$picture , 
					);
				}
				else
				{
					$data = array(
						'name' =>$this->input->post('name') ,
					);
				}
				if ($this->ClientModel->edit($data, 'client', $id))
				{
					$this->session->set_flashdata('msg', 'Client Edited Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Editing Client');
				}
				redirect(base_url().'admin/client/list');

			}else{
				$data['pagetitle'] = 'Edit Client';
				$data['Record'] = $this->ClientModel->getById('client', $id);
				$this->load->view('client/edit', $data);			
			}
		}else{
			redirect(base_url().'login');
		}
	}

	public function delete($id)
	{
		if ($this->session->userdata('logged_in'))
		{
			if ($this->ClientModel->delete('client', $id))
			{
				$this->session->set_flashdata('msg', 'Client Deleted Successfully');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Error Deleting Client');
			}
			redirect(base_url().'admin/client/list');
		}
		else
		{
			redirect(base_url());
		}
	}

	public function enable($id)
	{
		if ($this->session->userdata('logged_in'))
		{
			if ($this->ClientModel->enable('client', $id))
			{
				$this->session->set_flashdata('msg', 'Client Enabled Successfully');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Error Enabling Client');
			}
			redirect(base_url().'admin/client/list');			
		}
		else
		{
			redirect(base_url());
		}
	}

	public function disable($id)
	{
		if ($this->session->userdata('logged_in'))
		{
			if ($this->ClientModel->disable('client', $id))
			{
				$this->session->set_flashdata('msg', 'Client Disabled Successfully');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Error Disabling Client');
			}
			redirect(base_url().'admin/client/list');			
		}
		else
		{
			redirect(base_url());
		}
	}
}
