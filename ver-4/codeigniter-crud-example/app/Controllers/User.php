<?php

namespace App\Controllers;

class User extends BaseController
{
	 public function __construct()
    {
        helper(['form', 'url']);
		     
    }
	
    public function index()
    {
        return view('photo_upload');
    }
	
	public function file_upload(){
		 helper(['form', 'url']);
		$db      = \Config\Database::connect();
        $builder = $db->table('images');
		 $validationRule = [
            'image' => [
                'label' => 'Image File',
                'rules' => 'uploaded[image]'
                    . '|is_image[image]'
                    . '|mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    //. '|max_size[userfile,100]'
                    //. '|max_dims[userfile,1024,768]',
            ],
        ];
		
		if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
			return view('photo_upload', $data);
			
        }else{
				$file = $this->request->getFile('image');
				if (! $file->hasMoved()) {
					$filepath = WRITEPATH . 'uploads/' . $file->store();
					$data = ['uploaded_flleinfo' => new User($filepath)];
					$data = [
						'name' =>  $file->getClientName(),
						'type'  => $file->getClientMimeType(),
						'created_at' => 'Uploaded Successfully'
					];
					
					$save = $builder->insert($data);
					$msg = 'Image has been uploaded';
					//return redirect()->to( base_url('photo_upload') )->with('msg', $msg);
					return view('photo_upload', $data);
				}	
		}	
		
	}	
}
