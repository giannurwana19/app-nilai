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

	public function edit($id)
	{
		$data['mahasiswa'] = $this->mahasiswa_model->findById($id);

		$this->load->view('mahasiswa/edit', $data);
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

	public function update($id)
	{
		$request = $this->input->post(null, true);

		$this->mahasiswa_model->update($id, $request);

		echo json_encode([
			'success' => true,
			'message' => 'Data mahasiswa berhasil diupdate!'
		]);
	}

	public function destroy($id)
	{
		$this->mahasiswa_model->delete($id);

		echo json_encode([
			'success' => true,
			'message' => 'Data mahasiswa berhasil dihapus!'
		]);
	}
}
