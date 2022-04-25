<?php

namespace App\Controllers;

use App\Models\LinkModel;
helper('myFunctions');

class Link extends BaseController
{
    private $session;
    private $validation;
    private $links;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->links = new LinkModel();
        if(is_null($this->session->get('active_login')) == false) return redirect()->to('/');
    }
    public function index($id_category = null)
    {
        activateMenuItem();
        if(is_null($this->session->get('active_login')) != false) return redirect()->to('/user/login');
        $header = [
            'active_login'=>$this->session->get('active_login'),
            'activateItem'=>activateMenuItem()
        ];
        $data = [
            
        ];
        return view('header', $header) . view('link/index', $data) . view('footer');
    }

    public function create()
    {
        //code...
    }

    public function delete()
    {
        //
    }
    

    
}
