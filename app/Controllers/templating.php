<?php

namespace App\Controllers; 

use App\Controllers\BaseControllers;
use App\Models\UserModel;

class Templating extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel;
    }
	public function index()
	{
        $data = [
            'title' => "Blog - Posts", 
        ];
        //echo view('layouts/header', $data);
        //echo view('layouts/navbar');
		//echo view('v_post');
        
        return view('view_admin');
	}

    public function register()
	{
        $data = [
            'title' => "Blog - Register", 
        ];
        //echo view('layouts/header', $data);
        //echo view('layouts/navbar');
		//echo view('v_post');
        //echo view('layouts/footer');
        return view('view_register', $data);
	}

    public function saveRegister()
	{
      $request = service('request');
      $data = [
          'fullname' => $request->getVar('fullname'),
          'email' => $request->getVar('email'),
          'password' => $request->getVar('password'),
      ];
      $this->userModel->insert($data);
      return redirect()->to('/register');
	}
}