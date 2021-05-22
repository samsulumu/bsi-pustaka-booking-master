<?php

class Login extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
    }
    
    public function index()
    {
		if ($this->session->userdata('is_login')) {
			redirect('home');
		} else {
			$this->load->view('auth/login_view');
		}
    }

    public function proccess()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($this->AuthModel->login_user($username,$password))
		{
			redirect('home');
		}
		else
		{
			$this->session->set_flashdata('error','Username & Password salah');
			redirect('auth/login');
		}
	}
 
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('is_admin');
		$this->session->unset_userdata('is_login');
		
		redirect('auth/login');
	}
}
