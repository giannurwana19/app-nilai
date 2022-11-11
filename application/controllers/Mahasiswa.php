<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		echo 'daftar mahasiswa';
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
