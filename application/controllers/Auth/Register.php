<?php

class Register extends CI_Controller
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
			$this->load->view('auth/register_view');
		}
    }

    public function proccess()
	{
        $this->form_validation->set_rules('username', 'username','trim|required|min_length[1]|max_length[255]|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'email','trim|required|min_length[1]|max_length[255]|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'password','trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('name', 'name','trim|required|min_length[1]|max_length[255]');
		if ($this->form_validation->run())
	   	{
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->AuthModel->register($name,$email,$username,$password);
			$this->session->set_flashdata('success','Proses Pendaftaran User Berhasil');
			redirect('auth/login');
		}
		else
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('auth/register');
		}
	}
}
