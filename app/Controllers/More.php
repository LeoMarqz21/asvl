<?php

    namespace App\Controllers;

    use App\Models\UserModel;

    class More extends BaseController
    {
        private $session;
        private $validation;


        public function __construct()
        {
            $this->session = \Config\Services::session();
            $this->validation = \Config\Services::validation();
            $this->costEncrypt = ['cost'=>15];
            $this->users = new UserModel();
        }
        public function index()
        {
            if(is_null($this->session->get('active_login')) == false) return redirect()->to('/');
            
            return view('user/login');
        }
    }