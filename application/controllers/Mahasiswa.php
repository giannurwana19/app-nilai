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

	public function show($id)
	{
		//
	}

	public function store()
	{
		//
	}

	public function destroy($id)
	{
		//
	}
}
