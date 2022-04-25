<?php

    namespace App\Controllers;

    use App\Models\CategoryModel;

    class More extends BaseController
    {
        private $session;
        private $validation;


        public function __construct()
        {
            $this->session = \Config\Services::session();
            $this->validation = \Config\Services::validation();
            $this->costEncrypt = ['cost'=>15];
            $this->users = new CategoryModel();
        }
        public function index()
        {
            if(is_null($this->session->get('active_login')) == true) return redirect()->to('/user/login');
            
        }
    }