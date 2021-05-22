<?php
class BorrowedItemModel extends CI_Model 
{
    private $table = "borrowed_items";
	
	public function __construct()
	{
        parent::__construct();
    }

    public function getLastItem()
    {
        $query = $this->db->get($this->table);
        return $query->last_row();
    }
    
    public function create_item($data)
    {
        $sql = "SELECT * FROM ". $this->table ." WHERE ". $this->table .".user_id = ".$data['user_id']." AND ". $this->table .".returned_at IS NULL";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $borrowed_item['data'] = $query->row();
            $borrowed_item['status'] = false;
            return $borrowed_item;
        } else {
            $this->db->insert($this->table,$data);
            $borrowed_item['status'] = true;
            return $borrowed_item;
        }
    }
}