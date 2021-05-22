<?php

class Product extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
        $this->AuthModel->cek_login();
    }
    
    public function index()
    {
        $data['list_product'] = $this->ProductModel->list_product();
        $this->load->view('extended/header');
        $this->load->view('product/index', $data);
        $this->load->view('extended/footer');
    }

    public function create_view()
    {
        $data['list_category'] = $this->ProductCategoryModel->list_category_product();
        $data['product'] = [];
        $this->load->view('extended/header');
        $this->load->view('product/product_create_view', $data);
        $this->load->view('extended/footer');
    }

    public function edit_view($id)
    {
        $data['list_category'] = $this->ProductCategoryModel->list_category_product();
        $data['product'] = $this->ProductModel->getById($id);
        $this->load->view('extended/header');
        $this->load->view('product/product_create_view', $data);
        $this->load->view('extended/footer');
    }

    public function product_create()
    {
        $this->form_validation->set_rules('name', 'name','trim|required|min_length[4]|max_length[24]');
		$this->form_validation->set_rules('description', 'description','trim|required|min_length[1]|max_length[255]');
		if ($this->form_validation->run())
	   	{
            $name = $this->input->post('name');
            $category_id = $this->input->post('category_id');
            $description = $this->input->post('description');
			$this->ProductModel->create_product($name,$category_id,$description);
			$this->session->set_flashdata('success_register','Proses Pendaftaran User Berhasil');
			redirect('product/index');
		}
		else
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('product/create_view');
		}
    }

    public function product_edit()
    {
        $this->form_validation->set_rules('productname', 'productname','trim|required|min_length[1]|max_length[255]|is_unique[products.productname]');
        $this->form_validation->set_rules('email', 'email','trim|required|min_length[1]|max_length[255]|is_unique[products.email]');
		$this->form_validation->set_rules('password', 'password','trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('name', 'name','trim|required|min_length[1]|max_length[255]');
		if ($this->form_validation->run())
	   	{
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $productname = $this->input->post('description');

			$this->ProductModel->update_product($id,$name,$description);
			$this->session->set_flashdata('success_register','Proses Pendaftaran User Berhasil');
			redirect('product/index');
		}
		else
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('product/create_view');
		}
    }

    public function product_delete($id)
    {
        $this->ProductModel->delete_product($id);
        
        redirect('product');
    }
}
