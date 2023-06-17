<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ProductsModel;

class Products extends BaseController
{
	
    protected $productsModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->productsModel = new ProductsModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'products',
                'title'     		=> 'Products List'				
			];
		
		return view('products', $data);
			
	}

	public function getAll()
	{
 		$response = array();		
		
	    $data['data'] = array();
 
		$result = $this->productsModel->select('product_id, product_name, product_price, product_category_id')->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '	<button type="button" class="btn btn-sm btn-info" onclick="edit('. $value->product_id .')"><i class="fa fa-edit"></i></button>';
			$ops .= '	<button type="button" class="btn btn-sm btn-danger" onclick="remove('. $value->product_id .')"><i class="fa fa-trash"></i></button>';
			$ops .= '</div>';
			
			$data['data'][$key] = array(
				$value->product_id,
				$value->product_name,
				$value->product_price,
				$value->product_category_id,

				$ops,
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('product_id');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->productsModel->where('product_id' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			
			throw new \CodeIgniter\Exceptions\PageNotFoundException();

		}	
		
	}	
	
	public function add()
	{

        $response = array();

        $fields['product_id'] = $this->request->getPost('productId');
        $fields['product_name'] = $this->request->getPost('productName');
        $fields['product_price'] = $this->request->getPost('productPrice');
        $fields['product_category_id'] = $this->request->getPost('productCategoryId');


        $this->validation->setRules([
            'product_name' => ['label' => 'Product name', 'rules' => 'permit_empty|max_length[100]'],
            'product_price' => ['label' => 'Product price', 'rules' => 'permit_empty|numeric'],
            'product_category_id' => ['label' => 'Product category id', 'rules' => 'required|numeric'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
            $response['messages'] = $this->validation->listErrors();
			
        } else {

            if ($this->productsModel->insert($fields)) {
												
                $response['success'] = true;
                $response['messages'] = 'Data has been inserted successfully';	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = 'Insertion error!';
				
            }
        }
		
        return $this->response->setJSON($response);
	}

	public function edit()
	{

        $response = array();
		
        $fields['product_id'] = $this->request->getPost('productId');
        $fields['product_name'] = $this->request->getPost('productName');
        $fields['product_price'] = $this->request->getPost('productPrice');
        $fields['product_category_id'] = $this->request->getPost('productCategoryId');


        $this->validation->setRules([
            'product_name' => ['label' => 'Product name', 'rules' => 'permit_empty|max_length[100]'],
            'product_price' => ['label' => 'Product price', 'rules' => 'permit_empty|numeric'],
            'product_category_id' => ['label' => 'Product category id', 'rules' => 'required|numeric'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
            $response['messages'] = $this->validation->listErrors();
			
        } else {

            if ($this->productsModel->update($fields['product_id'], $fields)) {
				
                $response['success'] = true;
                $response['messages'] = 'Successfully updated';	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = 'Update error!';
				
            }
        }
		
        return $this->response->setJSON($response);
		
	}
	
	public function remove()
	{
		$response = array();
		
		$id = $this->request->getPost('product_id');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->productsModel->where('product_id', $id)->delete()) {
								
				$response['success'] = true;
				$response['messages'] = 'Deletion succeeded';	
				
			} else {
				
				$response['success'] = false;
				$response['messages'] = 'Deletion error!';
				
			}
		}	
	
        return $this->response->setJSON($response);		
	}	
		
}	