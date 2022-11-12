<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_model extends CI_Model
{
	protected $table = 'nilai_mahasiswa';

	public function create($request)
	{
		$this->db->insert($this->table, $request);
	}
}
