<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data = array(
			'page' => 'dashboard',
			'judul' => 'Dashboard'
		);

		$this->load->view('theme/index', $data);
	}
}
