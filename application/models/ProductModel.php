<?php
class ProductModel extends CI_Model 
{
    private $table = "products";
	
	public function __construct()
	{
        parent::__construct();
    }
    
    public function getById($id)
    {
        $sql = "SELECT products.name, products.description, product_categories.name as category_name, product_categories.id as category_id FROM products JOIN product_categories ON product_categories.id = products.category_id WHERE products.id = ".$id;
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function getRelationProductCategory()
    {
        $sql = "SELECT products.name, products.description, product_categories.name as category_name, product_categories.id as category_id FROM products JOIN product_categories ON product_categories.id = products.category_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function list_product()
	{
        $sql = "SELECT products.id, products.name, products.description, product_categories.name as category_name FROM products JOIN product_categories ON product_categories.id = products.category_id";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0)
        {
            $data_product = $query->result();
            return $data_product;
        }
        else
        {
            return $data_product = [];
        }
    }
    
    function create_product($name,$category_id,$description)
	{
		$data = [
            'name' => $name,
            'category_id' => $category_id,
            'description' => $description
        ];
		$this->db->insert($this->table,$data); // INSERT INTO table_name (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);
    }
	
    function update_product($name,$category_id,$description)
	{
		$data = [
            'name' => $name,
            'category_id' => $category_id,
            'description' => $description
        ];
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    function delete_product($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
    }
}