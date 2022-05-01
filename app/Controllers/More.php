<?php

    namespace App\Controllers;

    use App\Models\UserModel;

    class More extends BaseController
    {
        private $session;
        private $validation;
        private $userLogin;


        public function __construct()
        {
            $this->session = \Config\Services::session();
            $this->validation = \Config\Services::validation();
            $this->costEncrypt = ['cost'=>15];
            $this->users = new UserModel();
            $this->userLogin = $this->session->get('active_login');
        }
        public function index()
        {
            if(is_null($this->session->get('active_login')) != false) return redirect()->to('/user/login');
            $header = [ 
                'active_login'=>$this->userLogin, 
                'title'=>'Herramientas utiles' 
            ];
            
            return view('header', $header) . view('more/tools') . view('footer');
        }

        public function about()
        {
            if(is_null($this->session->get('active_login')) != false) return redirect()->to('/user/login');
            $header = [ 
                'active_login'=>$this->userLogin, 
                'title'=>'Acerca de la Aplicación' 
            ];
            
            return view('header', $header) . view('more/about') . view('footer');
        }

        public function contact()
        {
            if(is_null($this->session->get('active_login')) != false) return redirect()->to('/user/login');
            $header = [ 
                'active_login'=>$this->userLogin, 
                'title'=>'Contactame' 
            ];
            
            return view('header', $header) . view('more/contact') . view('footer');
        }
    }