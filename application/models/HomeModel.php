<?php
class HomeModel extends CI_Model 
{
	
	public function __construct()
	{
        parent::__construct();
	}
 
	function getCountUser()
	{
        $query = $this->db->get('users');
        return $query->num_rows();
    }

    function getCountCategory()
	{
        $query = $this->db->get('product_categories');
        return $query->num_rows();
    }

    function getCountProduct()
	{
        $query = $this->db->get('products');
        return $query->num_rows();
    }

    function getCountBorrowedGoods()
	{
        $query = $this->db->get('borrowed_items');
        return $query->num_rows();
    }
}