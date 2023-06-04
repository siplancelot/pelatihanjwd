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

  public function readByID($id){
    $this->db->select('*');
    $this->db->from('petugas');
    $this->db->where('id_petugas', $id);

    $query = $this->db->get();

    return $query->row_array();
  }

  public function add($data){
    return $this->db->insert('petugas', $data);
  }

  public function update($id, $data){
    $this->db->where('id_petugas', $id);
    return $this->db->update('petugas', $data);
  }

  public function delete($id){
    $this->db->where('id_petugas', $id);
    return $this->db->delete('petugas');
  }
}
