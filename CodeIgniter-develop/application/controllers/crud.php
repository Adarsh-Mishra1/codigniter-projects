<?php
    class Crud extends CI_Controller{
       
        public function __construct() {
            //load database in autoload libraries 
              parent::__construct(); 
             
              $this->load->library('session');
              $this->load->database();
              $this->load->model('crud_model');   
              $this->load->library('form_validation');   
                 
           }

        public function index(){
            $this->load->view('login');
        }   
        public function view(){

            $this->load->model('crud_model');
            $data['product_details'] = $this->crud_model->getAllProducts();
            $this->load->view('crud_view',$data);
           
        }
        
        public function create(){
            $this->load->view('create');
        }


        public function insert()
        {
            $this->load->model('crud_model');
            $this->load->library('form_validation'); 
            $this->load->helper(array('form'));
            $this->load->library(array('form_validation'));  
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('roll_no', 'Roll_No', 'required');
            if ($this->form_validation->run() == FALSE)
                {
                    $crud=new crud_model;
                    $crud->insert();
                    $this->load->view('view');                }
                else
                {    
                    $crud=new crud_model;
                    $crud->insert();
                    $this->view();
                    
                    
                }
        }  
        public function login_auth()
            {
              
                if($this->input->post('submit'))
                {
                $name=$this->input->post('name');
                $password=$this->input->post('password');
                $que=$this->db->query("select * from `crud_table` where name='$name' and password='$password'");
                //echo $this->db->last_query();
                $row = $que->num_rows();
                    if(count($row)>0)
                    {
                        echo "login successfull";
                        $this->view();
                    }
                    else
                    {
                        
                    $data['error']="<h3 style='color:red'>Invalid userid or password !</h3>";
                    $this->load->view('login',@$data);
                    }
                }
               
                       
            }

        public function update($id)
            {
                $products=new crud_model;
                $products->update($id);
                $this->view();
            }

        public function edit($id)
        {
            $product = $this->db->get_where('crud_table', array('sno' => $id))->row();
            $this->load->view('/edit',array('output'=>$product));
            
        }
     
        public function delete($id)
        {
            $this->db->where(['sno' => $id])->delete('crud_table');
            redirect(base_url('crud'));
        }
    
       
    }

?>