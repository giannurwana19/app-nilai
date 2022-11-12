<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
	protected $table = 'mahasiswa';

	public function get()
	{
		return $this->db->order_by('id', 'desc')->get($this->table)->result_array();
	}

	public function create($request)
	{
		$this->db->insert($this->table, $request);
	}

	public function delete($id)
	{
		$this->db->delete($this->table, ['id' => $id]);
	}
}
