<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PRController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('PRModel');
		$this->load->library('upload');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			$data['Records'] = $this->PRModel->getAll('press_release'); 
			$data['pagetitle'] = 'Press Releases List';
			$this->load->view('pressrelease/list', $data);
		}else{
			redirect(base_url().'login');
		}
	}
	
	public function add()
	{
		if ($this->session->userdata('logged_in')) {
			if($this->input->post()){
				$config['upload_path'] = FCPATH .'/uploads/pressrelease/';
				$config['allowed_types'] = 'jpeg|jpg|png|gif';
				$config['max_size'] = 4096;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('image'))
				{
					$picture = $this->upload->data()['file_name'];
				}
				else
				{
					$picture = NULL;
				}

				$data = array(
					'title' =>$this->input->post('title') , 
					'category' =>"" , 
					'description' =>$this->input->post('description') , 
					'image' =>$picture , 
					'metatitle' =>$this->input->post('metatitle') , 
					'metadesc' =>$this->input->post('metadesc') , 
					'metakeyword' =>$this->input->post('metakeyword') , 
					'slug' =>$this->input->post('slug') , 
					'schema' =>$this->input->post('schema') , 
					'created_at'=>date("Y-m-d H:i:s"),
					'created_by' => $this->session->userdata('name'), 

				);
				if ($this->PRModel->add($data, 'press_release'))
				{
					$this->session->set_flashdata('msg', 'Record Added Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Adding Record');
				}

				redirect(base_url().'admin/pressrelease/add');

			}else{
				$data['pagetitle'] = 'Add Press Release';
				$this->load->view('pressrelease/add', $data);			
			}
		}else{
			redirect(base_url().'login');
		}
	}


	public function edit($id)
	{
		if ($this->session->userdata('logged_in')) {
			if($this->input->post()){
				$config['upload_path'] = FCPATH .'/uploads/pressrelease/';
				$config['allowed_types'] = 'jpeg|jpg|png|gif';
				$config['max_size'] = 4096;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('image'))
				{
					$picture = $this->upload->data()['file_name'];
					$data = array(
					'title' =>$this->input->post('title') , 
					'category' =>"" , 
					'description' =>$this->input->post('description') ,
					'image' =>$picture , 
					'metatitle' =>$this->input->post('metatitle') , 
					'metadesc' =>$this->input->post('metadesc') , 
					'metakeyword' =>$this->input->post('metakeyword') , 
					'slug' =>$this->input->post('slug') , 
					'schema' =>$this->input->post('schema') , 
					'updated_at'=>date("Y-m-d H:i:s"),
					'updated_by' => $this->session->userdata('name'), 
				);
				}
				else
				{
					$data = array(
					'title' =>$this->input->post('title') , 
					'category' =>"" , 
					'description' =>$this->input->post('description') ,
					'metatitle' =>$this->input->post('metatitle') , 
					'metadesc' =>$this->input->post('metadesc') , 
					'metakeyword' =>$this->input->post('metakeyword') , 
					'slug' =>$this->input->post('slug') , 
					'schema' =>$this->input->post('schema') , 
					'updated_at'=>date("Y-m-d H:i:s"),
					'updated_by' => $this->session->userdata('name'), 

				);
				}
				if ($this->PRModel->edit($data, 'press_release', $id))
				{
					$this->session->set_flashdata('msg', 'Record Edited Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Editing Record');
				}
				redirect(base_url().'admin/pressrelease/list');

			}else{
				$data['pagetitle'] = 'Edit Press Release';
				$data['Record'] = $this->PRModel->getById('press_release', $id);
				$this->load->view('pressrelease/edit', $data);			
			}
		}else{
			redirect(base_url().'login');
		}
	}

	public function delete($id)
	{
		if ($this->session->userdata('logged_in'))
		{
			if ($this->PRModel->delete('press_release', $id))
			{
				$this->session->set_flashdata('msg', 'Record Deleted Successfully');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Error Deleting Record');
			}
			redirect(base_url().'admin/pressrelease/list');
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
			if ($this->PRModel->enable('press_release', $id))
			{
				$this->session->set_flashdata('msg', 'Record Enabled Successfully');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Error Enabling Record');
			}
			redirect(base_url().'admin/pressrelease/list');			
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
			if ($this->PRModel->disable('press_release', $id))
			{
				$this->session->set_flashdata('msg', 'Record Disabled Successfully');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Error Disabling Record');
			}
			redirect(base_url().'admin/pressrelease/list');			
		}
		else
		{
			redirect(base_url());
		}
	}

}
