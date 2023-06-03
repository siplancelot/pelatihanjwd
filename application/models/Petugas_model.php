<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_model extends CI_Model {

	public function read()
	{
    $this->db->select('*');
    $this->db->from('petugas');
    
    $query = $this->db->get();

    return $query->result_array();
  }

  public function add($data){

    return $this->db->insert('petugas', $data);
  }
}
