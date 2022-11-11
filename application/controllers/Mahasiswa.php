<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mahasiswa_model');
	}

	public function index()
	{
		$data['all_mahasiswa'] = $this->mahasiswa_model->get();

		$this->load->view('mahasiswa/index', $data);
	}

	public function create()
	{
		$this->load->view('mahasiswa/create');
	}

	public function show($id)
	{
		//
	}

	public function store()
	{
		$request = $this->input->post(null, true);

		$this->mahasiswa_model->create($request);

		echo json_encode([
			'success' => true,
			'message' => 'Data mahasiswa berhasil ditambahkan!'
		]);
	}

	public function destroy($id)
	{
		//
	}
}
