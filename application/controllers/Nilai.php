<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mahasiswa_model');
		$this->load->model('mata_kuliah_model');
	}

	public function index()
	{
		$this->load->view('nilai/index');
	}

	public function create()
	{
		$data['all_mahasiswa'] = $this->mahasiswa_model->get();
		$data['all_mata_kuliah'] = $this->mata_kuliah_model->get();

		$this->load->view('nilai/create', $data);
	}

	public function show($id)
	{
		//
	}

	public function store()
	{
		$request = $this->input->post(null, true);

		echo json_encode([
			'success' => true,
			'message' => 'Data nilai berhasil ditambahkan!'
		]);
	}

	public function destroy($id)
	{
		//
	}
}
