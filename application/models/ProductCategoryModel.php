<?php
class ProductCategoryModel extends CI_Model 
{
    private $table = "product_categories";
	
	public function __construct()
	{
        parent::__construct();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row(); // SELECT * FROM TABLE_NAME WHERE KEY = VALUE
    }
    
    function list_category_product()
	{
        $query = $this->db->get($this->table); // SELECT * FROM TABLE_NAME
        if($query->num_rows() > 0)
        {
            $data_category_product = $query->result();
            return $data_category_product;
        }
        else
        {
            return $data_category_product = [];
        }
    }
    
    function create_category_product($name,$description)
	{
		$data = [
            'name' => $name,
            'description' => $description
        ];
		$this->db->insert($this->table,$data); // INSERT INTO table_name (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);
    }
	
    function update_category_product($id, $name,$description)
	{
		$data = [
            'name' => $name,
            'description' => $description
        ];
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    function delete_category_product($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
    }
}