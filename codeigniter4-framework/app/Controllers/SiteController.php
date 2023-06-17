<?php
namespace App\Controllers;
use  App\Models\UserModel;

class SiteController extends BaseController{
    
    public function __construct(){
        $this->db=\config\Database::connect();
    }
    
    public function test(){
        echo "Testing Base Controller Function";
       
    }

    // Raw quries;

    public function insert(){
        $query="INSERT INTO `ci4`.`users` ( `name`, `email`, `password`, `phone`) VALUES ( 'adr2', 'abc2', '1232', '10023')";
        if($this->db->query($query)){
            echo "Data Saved";
        }
    }


    public function select(){
        
        
        $query="SELECT * FROM users";

        //getting object here
        // if($result=$this->db->query($query)->getResult()){
        //     echo "<pre>";
        //     print_r($result);
        // }

        //getting array here
        if($result=$this->db->query($query)->getResultArray()){
            echo "<pre>";
            print_r($result);
        }
    }


    // Using Query Builder class
    public function select2(){
        $builder=$this->db->table('users'); // Created instance for bulder to perform tasks
        //$data =$builder->get()->getResultArray();
        // or 
        //$data =$builder->get()->getResult('array');
        
        // get data by where class using builder method
        //$data =$builder->where('id','1')->where('name','adr')->get()->getResult('array');
        
        //or using array method

        $builder=$builder->where(array(
            "id" => 1,
            "name" =>'adr',
        ));
        //$data=$builder->get()->getResultArray();    
        
        // For one row
        $data=$builder->get()->getRow();    
        
        echo $this->db->getLastQuery();
        
        
        echo "<pre>";
            print_r($data);

        //
    
    
    }

    public function insert2(){
        
        $builder=$this->db->table('users');
        // Insert method for single row
        /*
        $data =[
            "name" => "Adarsh",
            "email" => "abcd",
            "password" => "1234",
            "phone" => "987987"
        ];

        if($builder->insert($data)){
            echo "Data saved";
        };
        */
        // For batch insert (mulitple row insert)
        $data =[
            [    
                "name" => "Adarsh1",
                "email" => "abcd1",
                "password" => "12341",
                "phone" => "9879871"
            ],
            [    
                "name" => "Adarsh2",
                "email" => "abcd",
                "password" => "1234",
                "phone" => "987987"
            ],
            [    
                "name" => "Adarsh3",
                "email" => "abcd",
                "password" => "1234",
                "phone" => "987987"
            ],
            ];
            

        if($builder->insertBatch($data)){
            echo "Data saved";
        };
    }

    public function update2(){
        $builder=$this->db->table('users');
        $updated_data=[
            "name" => "Adarsh3",
            "email" => "mail@.com",
            "password" => "786786",
            "phone" => "9009"

        ];
        $builder->update($updated_data,["id"
         => 4
        ]);
        echo $this->db->getLastQuery();
    }

    public function select3(){
        $model= new UserModel;
         $data = $model->findAll();
         print_r($data);
    }

    public function insert3(){
        $model= new UserModel;
        $data=[
            "name" => "Adarsh3",
            "email" => "mail@.com",
            "password" => "786786",
            "phone" => "9009"

        ];
        $return_data=$model->insert($data);
        echo $return_data;
    }

    public function delete(){
        $model= new UserModel; 
        //$result = $model->where('id','10')->delete();
        //or
        $result = $model->delete('9');
        echo $result;
    }
}

?>