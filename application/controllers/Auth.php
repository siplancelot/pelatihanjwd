<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct(){

    parent:: __construct();
	
    $this->load->model(array('auth_model'));
    
  }

	public function login(){
    $this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

    if($this->form_validation->run() == false){
      $this->load->view('auth/login');

    } else {
      $email = $this->input->post('email');
      $password = md5($this->input->post('password')); 

      $user = $this->db->get_where('user', ['email' => $email, 'password' => $password])->row_array();

      if($user){
        $this->session->set_userdata('nama', $user['nama']);
        $this->session->set_userdata('email', $user['email']);

        redirect('dashboard');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email atau password salah</div>');

        $this->load->view('auth/login');
      }
    }

		
	}

  public function register(){
    $this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
    $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password]');

    if ($this->form_validation->run() == false) {
      $this->load->view('auth/register');
    } else{
      $nama = $this->input->post('nama');
      $email = $this->input->post('email');
      $password = md5($this->input->post('password')); 
      
      $user = $this->db->get_where('user', ['email' => $email])->row_array();

      if ($user) {

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email sudah terpakai!!!</div>');

        $this->load->view('auth/register');


      } else {
        $input = array(
          'nama' => $nama,
          'email' => $email,
          'password' => $password
        );
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil, akun telah dibuat</div>');

        $this->auth_model->addAccount($input);

        redirect('auth/login');

      }
    }
  }

  public function logout(){
    $this->session->unset_userdata('nama', $user['nama']);
    $this->session->unset_userdata('email', $user['email']);

    redirect("auth/login");
  }

}
