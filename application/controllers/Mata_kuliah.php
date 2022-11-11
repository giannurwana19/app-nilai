<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mata_kuliah extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('mata-kuliah/index');
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
