<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('nilai/index');
	}

	public function create()
	{
		$this->load->view('nilai/create');
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
