	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BlogController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('BlogModel');
		$this->load->library('upload');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			$data['Records'] = $this->BlogModel->getAll('blogs'); 
			$data['pagetitle'] = 'Blogs List';
			$this->load->view('blogs/list', $data);
		}else{
			redirect(base_url().'login');
		}
	}
	
	public function add()
	{
		if ($this->session->userdata('logged_in')) {
			if($this->input->post()){
				$config['upload_path'] = FCPATH .'/uploads/blogs/';
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
					'category' =>$this->input->post('category') , 
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
				if ($this->BlogModel->add($data, 'blogs'))
				{
					$this->session->set_flashdata('msg', 'Record Added Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Adding Record');
				}

				redirect(base_url().'admin/blog/add');

			}else{
				$data['pagetitle'] = 'Add Blog';
				$this->load->view('blogs/add', $data);			
			}
		}else{
			redirect(base_url().'login');
		}
	}


	public function edit($id)
	{
		if ($this->session->userdata('logged_in')) {
			if($this->input->post()){
				$config['upload_path'] = FCPATH .'/uploads/blogs/';
				$config['allowed_types'] = 'jpeg|jpg|png|gif';
				$config['max_size'] = 4096;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('image'))
				{
					$picture = $this->upload->data()['file_name'];
					$data = array(
					'title' =>$this->input->post('title') , 
					'category' =>$this->input->post('category') , 
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
					'category' =>$this->input->post('category') , 
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
				if ($this->BlogModel->edit($data, 'blogs', $id))
				{
					$this->session->set_flashdata('msg', 'Record Edited Successfully');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Error Editing Record');
				}
				redirect(base_url().'admin/blog/list');

			}else{
				$data['pagetitle'] = 'Edit Blog';
				$data['Record'] = $this->BlogModel->getById('blogs', $id);
				$this->load->view('blogs/edit', $data);			
			}
		}else{
			redirect(base_url().'login');
		}
	}

	public function delete($id)
	{
		if ($this->session->userdata('logged_in'))
		{
			if ($this->BlogModel->delete('blogs', $id))
			{
				$this->session->set_flashdata('msg', 'Record Deleted Successfully');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Error Deleting Record');
			}
			redirect(base_url().'admin/blog/list');
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
			if ($this->BlogModel->enable('blogs', $id))
			{
				$this->session->set_flashdata('msg', 'Record Enabled Successfully');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Error Enabling Record');
			}
			redirect(base_url().'admin/blog/list');			
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
			if ($this->BlogModel->disable('blogs', $id))
			{
				$this->session->set_flashdata('msg', 'Record Disabled Successfully');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Error Disabling Record');
			}
			redirect(base_url().'admin/blog/list');			
		}
		else
		{
			redirect(base_url());
		}
	}

}
