<?php

    namespace App\Controllers;

    use App\Models\CategoryModel;
use mysqli;
use mysqli_sql_exception;

    class Category extends BaseController
    {
        private $session;
        private $validation;
        private $categories;
        private $userLogin;


        public function __construct()
        {
            $this->session = \Config\Services::session();
            $this->validation = \Config\Services::validation();
            $this->costEncrypt = ['cost'=>15];
            $this->categories = new CategoryModel();
            $this->userLogin = $this->session->get('active_login');
        }
        public function index()
        {
            // if(is_null($this->session->get('active_login')) == true) return redirect()->to('/user/login');
            
            $myCategories = $this->categories->select(['id_category', 'title_category', 'description_category'])->where('id_user_category', $this->userLogin['id_user'])->findAll();
            $this->response->setStatusCode(200);
            return $this->response->setJSON($myCategories);
        }

        public function create()
        {
            try
            {
                $title = $this->request->getPost('title');
                $description = $this->request->getPost('description');
                if($title && $description)
                {
                    $category = [
                        'id_user_category' =>122,
                        'title_category' =>$title,
                        'description_category' =>$description
                    ];
                    if($this->categories->save($category)){
                        $json = [
                            'status' => 200,
                            'message' => 'successfully created category'
                        ];
                    }else{
                        $json = [
                            'status'=>404,
                            'message' =>'error in the creation of a new category'
                        ];
                    }
                }else
                {
                    $json = [
                        'status'=>404,
                        'message' =>'fill in the form fields'
                    ];
                }
            }catch(mysqli_sql_exception $e)
            {
                $json = [
                    'status'=>404,
                    'message'=>'Ups!!, something went wrong'
                ];
            }
            $this->response->setStatusCode($json['status']);
            return $this->response->setJSON($json);
        }

        public function update()
        {
            //code...
        }

        public function delete()
        {
            //code...
        }

    }