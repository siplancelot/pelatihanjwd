<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function __construct(){

    parent:: __construct();

		if (!$this->session->userdata('email')) {
			redirect('auth/login');
		}
	
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

  public function add(){
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

			$config = array (
        'upload_path'    => './upload',
        'allowed_types'  => 'jpg|jpeg|png',
        'max_size'       => 10000 
      );

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('foto')) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Foto wajib diisi!!</div>');

				$data = array(
					'page' => 'petugas/add',
					'judul' => 'Tambah Data Petugas'
				);
		
				$this->load->view('theme/index', $data);
			} else {

				$this->upload->do_upload('foto');
        $file = $this->upload->data('file_name');

				$input = array(
					'nama_petugas' => $this->input->post('nama'),
					'telp_petugas' => $this->input->post('telpon'),
					'email_petugas' => $this->input->post('email'),
					'foto_petugas' => $file
				);

				$this->petugas_model->add($input);

				redirect('petugas');
			}
		
		}
	}

	public function update(){

		$this->form_validation->set_rules('nama', 'Nama Petugas', 'required');
		$this->form_validation->set_rules('telpon', 'No. Telpon Petugas', 'required');
		$this->form_validation->set_rules('email', 'Email Petugas', 'required');

		$id = $this->uri->segment(3);

		if($this->form_validation->run() == false){

			$data_petugas = $this->petugas_model->readByID($id);

			$data = array(
				'page' => 'petugas/update',
				'judul' => 'Update Data Petugas',
				'petugas' => $data_petugas
			);
	
			$this->load->view('theme/index', $data);
		} else {

			$config = array (
        'upload_path'    => './upload',
        'allowed_types'  => 'jpg|jpeg|png',
        'max_size'       => 10000 
      );

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('foto')) {
				$input = array(
					'nama_petugas' => $this->input->post('nama'),
					'telp_petugas' => $this->input->post('telpon'),
					'email_petugas' => $this->input->post('email')
				);
	
				$this->petugas_model->update($id, $input);
	
				redirect('petugas');
			} else {
				$this->upload->do_upload('foto');
        $file = $this->upload->data('file_name');

				$input = array(
					'nama_petugas' => $this->input->post('nama'),
					'telp_petugas' => $this->input->post('telpon'),
					'email_petugas' => $this->input->post('email'),
					'foto_petugas' => $file

				);
	
				$this->petugas_model->update($id, $input);
	
				redirect('petugas');
			}

			
			
		}
		
	}

	public function delete(){
		
		$id = $this->uri->segment(3);

		$this->petugas_model->delete($id);

		redirect('petugas');

	}

}
