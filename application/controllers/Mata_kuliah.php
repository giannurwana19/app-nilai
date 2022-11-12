<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mata_kuliah extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mata_kuliah_model');
	}

	public function index()
	{
		$data['all_mata_kuliah'] = $this->mata_kuliah_model->get();

		$this->load->view('mata-kuliah/index', $data);
	}

	public function show($id)
	{
		$mata_kuliah = $this->mata_kuliah_model->findById($id);

		echo json_encode([
			'success' => true,
			'data' => $mata_kuliah,
		]);
	}

	public function store()
	{
		$request  = $this->input->post(null, true);

		$this->mata_kuliah_model->create($request);

		echo json_encode([
			'success' => true,
			'message' => 'Data mata kuliah berhasil ditambahkan!'
		]);
	}

	public function update($id)
	{
		$requet = $this->input->post(null, true);

		$this->mata_kuliah_model->update($id, $requet);

		echo json_encode([
			'success' => true,
			'message' => 'Data mata kuliah berhasil diupdate!'
		]);
	}

	public function destroy($id)
	{
		$this->mata_kuliah_model->delete($id);

		echo json_encode([
			'success' => true,
			'message' => 'Data mata kuliah berhasil dihapus!'
		]);
	}
}
