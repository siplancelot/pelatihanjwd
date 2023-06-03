<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function __construct(){

    parent:: __construct();
	
    $this->load->model(array('petugas_model'));
    
  }

	
	public function index()
	{

		$petugas = $this->petugas_model->read();

		$data = array(
			'page' => 'petugas/index',
			'judul' => 'Petugas',
			'petugas' => $petugas
		);

		$this->load->view('theme/index', $data);
	}

  public function add()
	{
		$this->form_validation->set_rules('nama', 'Nama Petugas', 'required');
		$this->form_validation->set_rules('telpon', 'No. Telpon Petugas', 'required');
		$this->form_validation->set_rules('email', 'Email Petugas', 'required');

		if ($this->form_validation->run() == false) {
			$data = array(
				'page' => 'petugas/add',
				'judul' => 'Tambah Data Petugas'
			);
	
			$this->load->view('theme/index', $data);
		} else {

			$input = array(
				'nama_petugas' => $this->input->post('nama'),
				'telp_petugas' => $this->input->post('telpon'),
				'email_petugas' => $this->input->post('email')
			);

			$this->petugas_model->add($input);

			redirect('petugas');
		}

		
	}

}
