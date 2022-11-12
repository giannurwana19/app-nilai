<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_model extends CI_Model
{
	protected $table = 'nilai_mahasiswa';

	public function get()
	{
		return $this->db->select('mahasiswa.nama, mata_kuliah.nama as matkul, nilai_mahasiswa.*')
			->join('mahasiswa', 'mahasiswa.id = nilai_mahasiswa.id_mahasiswa')
			->join('mata_kuliah', 'mata_kuliah.id = nilai_mahasiswa.id_mata_kuliah')
			->get($this->table)->result_array();
	}

	public function create($request)
	{
		$this->db->insert($this->table, $request);
	}
}
