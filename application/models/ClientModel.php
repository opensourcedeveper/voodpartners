<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ClientModel extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAll($tbl)
	{
		$this->db->order_by('id', 'DESC');
		$sql = $this->db->get($tbl);
		if ($sql->num_rows()>0)
		{
			return $sql->result_array();
		}
		else
		{
			return false;
		}
	}

	public function getById($table, $id)
	{
		$this->db->where('id', $id);
		
		$sql= $this->db->get($table);
		if ($sql->num_rows() == 1)
		{
			return $sql->result_array()[0];
		}
		else
		{
			return false;
		}
	}

	public function add($Array, $table)
	{
		// print_r($Array);die();
		if ($this->db->insert($table, $Array))
		{
			return $this->db->insert_id();
		}
		else
		{
			return false;
		}
	}

	public function edit($Array, $table, $id)
	{
		$this->db->where('id', $id);
		if ($this->db->update($table, $Array))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function delete($table, $id)
	{
		if ($this->db->delete($table, array('id' => $id)))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function enable($table, $id)
	{
		$this->db->where('id', $id);
		if ($this->db->update($table, array('status' => 1)))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function disable($table, $id)
	{
		$this->db->where('id', $id);
		if ($this->db->update($table, array('status' => 0)))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	private $_batchImport;

	public function setBatchImport($batchImport) {
		$this->_batchImport = $batchImport;
	}

    // save data
	public function importData() {
		$data = $this->_batchImport;
		$this->db->insert_batch('clients', $data);
	}

}