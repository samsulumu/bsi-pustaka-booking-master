<?php

class ProductCategory extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
        $this->AuthModel->cek_login();
    }
    
    public function index()
    {
        $data['list_product'] = $this->ProductCategoryModel->list_category_product();
        $this->load->view('extended/header');
        $this->load->view('product_category/index', $data);
        $this->load->view('extended/footer');
    }

    public function create_view()
    {
        $data['product'] = [];
        $this->load->view('extended/header');
        $this->load->view('product_category/product_create_view', $data);
        $this->load->view('extended/footer');
    }

    public function edit_view($id)
    {
        $data['product'] = $this->ProductCategoryModel->getById($id);
        $this->load->view('extended/header');
        $this->load->view('product_category/product_create_view', $data);
        $this->load->view('extended/footer');
    }

    public function category_create()
    {
        $this->form_validation->set_rules('name', 'name','trim|required|min_length[4]|max_length[24]|is_unique[products.name]');
		$this->form_validation->set_rules('description', 'description','trim|required|min_length[1]|max_length[255]');
		if ($this->form_validation->run())
	   	{
            $name = $this->input->post('name');
            $description = $this->input->post('description');
			$this->ProductCategoryModel->create_category_product($name,$description);
			$this->session->set_flashdata('success_register','Proses Penambahan Data Berhasil');
			redirect('productcategory/index');
		}
		else
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('productcategory/create_view');
		}
    }

    public function category_edit($id)
    {
        $this->form_validation->set_rules('name', 'name','trim|required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('description', 'description','trim|required|min_length[1]|max_length[255]');
		if ($this->form_validation->run())
	   	{
            $name = $this->input->post('name');
            $description = $this->input->post('description');

			$this->ProductCategoryModel->update_category_product($id,$name,$description);
			$this->session->set_flashdata('success_register','Proses Pendaftaran User Berhasil');
			redirect('productcategory/index');
		}
		else
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('productcategory/create_view');
		}
    }

    public function category_delete($id)
    {
        $this->ProductCategoryModel->delete_category_product($id);
        
        redirect('productcategory');
    }
}
