<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\ProductModel;
 
class UserController extends Controller
{
    public function index()
    {    
         return view('login');
    }
 
    public function registration(){
        return view('registration');
    }

    public function create()
    {  
        helper(['form', 'url']);         
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        // print_r($_POST);
        // die();
        // $validateImage = $this->validate([
        //     'file' => [
        //         'uploaded[file]',
        //         'mime_in[file, image/png, image/jpg,image/jpeg, image/gif]',
        //         'max_size[file, 4096]',
        //     ],
        // ]);

        // if ($validateImage) {
        //     $imageFile = $this->request->getFile('file');
        //     $imageFile->move(WRITEPATH . 'uploads');
        //     $data = [
        //         'image' => $imageFile->getClientName(),
        //         //'file'  => $imageFile->getClientMimeType()
        //     ];
        //     //$save = $builder->insert($data);
        //     //print_r($save);

            
        // }else{
        //     $data = [
        //         'success' => false,                
        //         'msg' => "Image Validation Failed"
        //     ];
            
        // }

        $data = [
 
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
            'password'  => $this->request->getVar('password'),
            'phone'  => $this->request->getVar('phone'),
            // 'image' => $imageFile->getClientName()
        ];
 
        //$save = $builder->insert($data);
        if($save = $builder->insert($data)){
            $data = [
                'success' => true,
                'data' => $save,
                'msg' => "You are Registered"
            ];
        }else{
            $data = [
                'success' => false,
                'data' => $save,
                'msg' => "You are Not Registered"
            ];
        }
       return $this->response->setJSON($data);
    }
   
    public function auth()
    {  
        // echo "working";
        // die();
        helper(['form', 'url']);
         
        $db = \Config\Database::connect();
        $session=\Config\Services::session();
        $builder = $db->table('users');
        $session = session();       

        $builder=$builder->where(array(
            'email'  => $this->request->getVar('email'),
            'password'  => $this->request->getVar('password'),
        ));
        $user_data=$builder->get()->getRowArray();    
        // For one row
        //print_r($user_data);
        
        $data=$builder->get()->getNumRows();    
        if($data>0){
            
            $data = [
                'success' => true,
                'data' => $data,
                'msg' => "Login Success Full"
               ];
               
               $session_data = [
                'user_id'   => $user_data['user_id'],
                'username'  => $user_data['name'],
                'email'     => $user_data['email'],
                'logged_in' => true,
            ];
            //print_r($session_data);
            $session->set("userdata",$session_data);   
        
        }else{
            $data = [
                'success' => false,
                'data' => $data,
                'msg' => "Login Failed"
               ];
        }
        // echo "<pre>";
        // print_r($data);
        // die();
       
       return $this->response->setJSON($data);
    }

   

    public function dashboard()
    {
        /*Load the dashboard screen, if the user is already log in*/
        $session=\Config\Services::session();
        
        if (isset($_SESSION['userdata'])) {                        
            $data['user_profile']=$session->get("userdata");  
            $user_id= $_SESSION['userdata']['user_id'];
            $model = new ProductModel();
            $data['products'] = $model->where('user_id',$user_id)->OrderBy('product_id','ASC')->findAll();
            $db = \Config\Database::connect();
            $builder = $db->table('category');
            $builder1 = $db->table('sub-category');
            $data['category']=$builder->get()->getResultArray();
            $data['sub_category']=$builder1->get()->getResultArray();
            //print_r($data);                      
            return view('product',$data);
        } else {
            return view('login');
        }
    }

    public function logout(){
        $session = session();   
        $session->destroy();
        return view('login');
    }

    public function product_index(){
       
        return view('product');
    }

    public function add_edit(){
        //$data['user_profile']=$session->get("userdata");
        $db = \Config\Database::connect();
        $builder = $db->table('category');
        $builder1 = $db->table('sub-category');
        $data['category']=$builder->get()->getResultArray();
        $data['sub_category']=$builder1->get()->getResultArray();
       // print_r($data);
        return view('addproducts',$data);
    }

    public function sub_category(){
        $db = \Config\Database::connect();
        $builder = $db->table('sub-category');
        $id = $this->request->getVar('category_id');
        $data['sub_category']=$builder->where('category_id',$id)->get()->getResultArray(); 
        return $this->response->setJSON($data);
    }

    public function product_delete($id = null){       
		// echo "inside";
        // die();
        // echo $id;
        // die();
		// load Product model        
		$Products = new ProductModel();
        $data['user'] = $Products->where('product_id', $id)->delete($id);
        return $this->response->redirect(site_url('/dashboard'));
    }

    public function product_create(){
        $Products = new ProductModel();
        $session = session();   
        $user_id= $_SESSION['userdata']['user_id'];
        $data = [
            'user_id' => $user_id,
            'category'  => $this->request->getVar('category'),
            'sub_category'  => $this->request->getVar('sub_category'),
            'title'  => $this->request->getVar('title'),
            'description'  => $this->request->getVar('description'),
            'amount'  => $this->request->getVar('amount'),
            'discount'  => $this->request->getVar('discount'),
            'payable_amount'  => $this->request->getVar('payable_amount'),
        ];

        // print_r($data);
        // die();
        $Products->insert($data);
        return $this->response->redirect(site_url('/dashboard'));
    }

    public function product_update(){
        $Model = new ProductModel();
        $id = $this->request->getVar('id');
        
        $data = [
            'user_id' =>  $this->request->getVar('user_id'),
            'category'  => $this->request->getVar('category'),
            'sub_category'  => $this->request->getVar('sub_category'),
            'title'  => $this->request->getVar('title'),
            'description'  => $this->request->getVar('description'),
            'amount'  => $this->request->getVar('amount'),
            'discount'  => $this->request->getVar('discount'),
            'payable_amount'  => $this->request->getVar('payable_amount'),
        ];
        $Model->update($id, $data);
        return $this->response->redirect(site_url('dashboard'));
    }
    
    public function product_update_form($id = null){
        $Products = new ProductModel();                
        $data['products'] = $Products->where('product_id',$id)->find();
        $db = \Config\Database::connect();
        $builder = $db->table('category');
        $builder1 = $db->table('sub-category');
        $data['category']=$builder->get()->getResultArray();
        $data['sub_category']=$builder1->get()->getResultArray();
        // print_r($data);
        // die();
        return view('product_update_form',$data);
    }
}