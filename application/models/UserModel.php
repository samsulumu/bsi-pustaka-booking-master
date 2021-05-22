<?php
class UserModel extends CI_Model 
{
    private $table = "users";
	
	public function __construct()
	{
        parent::__construct();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row(); // SELECT * FROM TABLE_NAME WHERE KEY = VALUE
    }
    
    function list_user()
	{
        $query = $this->db->get($this->table); // SELECT * FROM TABLE_NAME
        if($query->num_rows() > 0)
        {
            $data_user = $query->result();
            return $data_user;
        }
        else
        {
            return $data_user = [];
        }
    }
    
    function create_user($name,$email,$username,$password)
	{
		$data = [
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];
		$this->db->insert($this->table,$data); // INSERT INTO table_name (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);
    }
	
    function update_user($id, $name,$email,$username,$password)
	{
		$data = [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];
        $this->db->where('id', $id);
        $update = $this->db->update($this->table, $data);
    }

    function delete_user($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
    }
}