<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mata_kuliah_model extends CI_Model
{
	protected $table = 'mata_kuliah';

	public function get()
	{
		return $this->db->get($this->table)->result_array();
	}
}


/* End of file Mata_kuliah_model.php and path \application\models\Mata_kuliah_model.php */
