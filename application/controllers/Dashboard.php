<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		

    parent:: __construct();

		if (!$this->session->userdata('email')) {
			redirect('auth/login');
		}
	
    $this->load->model(array('petugas_model'));
    
  }

	public function index()
	{
		$data = array(
			'page' => 'dashboard',
			'judul' => 'Dashboard'
		);

		$this->load->view('theme/index', $data);
	}
}
