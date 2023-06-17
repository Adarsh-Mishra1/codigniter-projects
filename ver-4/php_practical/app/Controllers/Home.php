<?php namespace App\Controllers;
use App\Models\Login_Model;
use CodeIgniter\Controller;
class Home extends Controller
{

	public function __construct()
    {
         $validation =  \Config\Services::validation();
        /*Load Form Validation Library*/
        // $this->load->library('form_validation');
        /*Load MLogin model that we created to fetch data from user table*/      
        $this->db     = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        helper(['form']);
    }

	public function index()
	{
		return view('index');
	}

    

	function getLogin()
    {
        
        /*Data that we receive from ajax*/
        $username = $this->request->getPost('UserName');
        $Password = $this->request->getPost('Password');
       
        if (!isset($username) || $username == '' || $username == 'undefined') {
            /*If Username that we recieved is invalid, go here, and return 2 as output*/
            echo 2;
            exit();
        }
        if (!isset($Password) || $Password == '' || $Password == 'undefined') {
            /*If Password that we recieved is invalid, go here, and return 3 as output*/
            echo 3;
            exit();
        }
        
        
        $rules = [
            // 'username'          =>'required|min_length[1]|max_length[20]',
            // // 'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.user_email]',
            // 'password'      => 'required|min_length[1]|max_length[200]',
            'username'          =>'required',
            // 'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.user_email]',
            'password'      => 'required',
            
        ];
        // $this->form_validation->set_rules('UserName', 'UserName', 'required');
        // $this->form_validation->set_rules('Password', 'Password', 'required');
        if ($this->validate($rules) == FALSE) {
            /*If Both Username &  Password that we recieved is invalid, go here, and return 4 as output*/           
            echo 4;
           
        } else {
            
            /*Create object of model MLogin.php file under models folder*/
            $Login = new Login_Model();
            /*validate($username, $Password) is the function in Mlogin.php*/
            $result = $Login->validate($username, $Password);
            if (count($result) == 1) {
                /*If everything is fine, then go here, and return 1 as output and set session*/
                $data = array(
                    'idUser' => $result[0]->idUser,
                    'username' => $result[0]->username
                );
                $this->session->set_userdata('login', $data);
                echo 1;
            } else {
                /*If Both Username &  Password that we recieved is invalid, go here, and return 5 as output*/
                echo 5;
            }
        }
	}

}	
	//--------------------------------------------------------------------


