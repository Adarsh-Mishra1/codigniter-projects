<?php namespace App\Models;

use CodeIgniter\Model;

class Login_Model extends Model
{
    protected $table='users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'password','email','name'];


    public function __construct()
    {
        parent::__construct();
        
    }

    /*function to use fetch the data from users table*/
    function validate($user, $pass)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('password', $pass);
        $this->db->where('username', $user);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    function find($user){
        $this->db->select('*');
        $this->db->from('users');
        // l$this->db->where('password', $pass);
        $this->db->where('id', $user);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }
  
}

