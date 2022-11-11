<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
	protected $table = 'mahasiswa';

	public function get()
	{
		return $this->db->get($this->table)->result_array();
	}
}
