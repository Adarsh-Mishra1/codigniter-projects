<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class test extends Controller{
    
    
    
    public function test(){
        echo "Testing";
    }

    public function insert(){
        $query="INSERT INTO `ci4`.`users` ( `name`, `email`, `password`, `phone`) VALUES ( 'adr2', 'abc2', '1232', '10023')";
        if($this->db->query($query)){
            echo "Data Saved";
        }
    }

}

?>