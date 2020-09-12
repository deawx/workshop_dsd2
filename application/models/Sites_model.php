<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sites_model extends MY_Model {

	public $table_name = 'sites';

	public function __construct()
	{
		parent::__construct();
	}

	public function read($site_name = [])
	{
		$sites = [];

		if ( ! empty($site_name))
		{
			foreach ($site_name as $key => $value)
			{
				$this->db->or_where('name', $value);
			}
		}

		$results = $this->db->get($this->table_name);

		if ($results->num_rows())
		{
			$sites = $results->result_array();
		}

		return $sites;
	}

	public function read_by_id($site_id = NULL)
	{
		$site = [];

		if (is_numeric($site_id))
		{
			$this->db->where('id', $site_id);
			$result = $this->db->get($this->table_name);
			if ($result->num_rows())
			{
				$site = $result->row_array();
			}
		}

		return $site;
	}

	public function create($data)
	{
		$this->db->set($data);
		if ($this->db->insert($this->table_name))
		{
			return TRUE;
		}

		return FALSE;
	}

	public function edit($data)
	{
		$this->db->set($data);
		$this->db->where('id', $data['id']);
		if ($this->db->update($this->table_name))
		{
			return TRUE;
		}

		return FALSE;
	}

}
