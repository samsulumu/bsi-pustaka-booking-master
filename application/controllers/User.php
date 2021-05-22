<?php

class User extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
        $this->AuthModel->cek_login();
    }
    
    public function index()
    {
        $data['list_user'] = $this->UserModel->list_user();
        $this->load->view('extended/header');
        $this->load->view('user/index', $data);
        $this->load->view('extended/footer');
    }

    public function create_view()
    {
        $this->load->view('extended/header');
        $this->load->view('user/user_create_view');
        $this->load->view('extended/footer');
    }

    public function edit_view($id)
    {
        $data['user'] = $this->UserModel->getById($id);
        $this->load->view('extended/header');
        $this->load->view('user/user_edit_view', $data);
        $this->load->view('extended/footer');
    }

    public function user_create()
    {
        $this->form_validation->set_rules('username', 'username','trim|required|min_length[4]|max_length[24]|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'email','trim|required|min_length[1]|max_length[255]|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'password','trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('name', 'name','trim|required|min_length[1]|max_length[255]');
		if ($this->form_validation->run())
	   	{
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->UserModel->create_user($name,$email,$username,$password);
			$this->session->set_flashdata('success','Proses Pendaftaran User Berhasil');
			redirect('user/index');
		}
		else
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('user/create_view');
		}
    }

    public function user_edit($id)
    {
        $this->form_validation->set_rules('username', 'username','trim|required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('email', 'email','trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('password', 'password','trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('name', 'name','trim|required|min_length[1]|max_length[255]');
		if ($this->form_validation->run())
	   	{
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

			$this->UserModel->update_user($id,$name,$email,$username,$password);
			$this->session->set_flashdata('success','Proses Pendaftaran User Berhasil');
			redirect('user/index');
		}
		else
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('user/edit_view/'.$id);
		}
    }

    public function user_delete($id)
    {
        $this->UserModel->delete_user($id);
        
        redirect('user');
    }
}
