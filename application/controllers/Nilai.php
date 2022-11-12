<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mahasiswa_model');
		$this->load->model('mata_kuliah_model');
		$this->load->model('nilai_model');
	}

	public function index()
	{
		$data['all_nilai'] = $this->nilai_model->get();

		$this->load->view('nilai/index', $data);
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

		$this->nilai_model->create($request);

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
