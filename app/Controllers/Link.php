<?php

namespace App\Controllers;

use App\Models\LinkModel;
use App\Models\CategoryModel;

helper('myFunctions');

class Link extends BaseController
{
    private $session;
    private $validation;
    private $links;
    private $categories;
    private $userLogin;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->links = new LinkModel();
        $this->categories = new CategoryModel();
        $this->links = new LinkModel();
        $this->userLogin = $this->session->get('active_login');
    }
    public function index()
    {

        if(is_null($this->session->get('active_login')) != false) return redirect()->to('/user/login');
        if($this->session->get('selected_category'))
        {
            $id_ct =  $this->session->get('selected_category');
            $links = $this->links->where('id_user_link', $this->userLogin['id_user'])->where('id_category_link',$id_ct)->findAll();
        }else
        {
            $links = $this->links->where('id_user_link', $this->userLogin['id_user'])->findAll();
        }
        $header = [ 'active_login'=>$this->userLogin, 'activateItem'=>activateMenuItem(), 'title'=>'Inicio' ];
        $categories = $this->categories->where('id_user_category', $this->userLogin['id_user'])->findAll();
        $data = ['links'=>$links, 'categories'=>$categories];
        return view('header', $header) . view('link/index', $data) . view('footer');
    }

    public function selectedCategory()
    {
        $id_ct =  $this->request->getPost('selected_category');
        if($id_ct != 'todos')
        {
            $this->session->set('selected_category', $id_ct);
        }else
        {
            $this->session->set('selected_category', null);
        }
        return redirect()->to('/');
    }

    public function create()
    {
        $categories = $this->categories->where('id_user_category', $this->userLogin['id_user'])->findAll();
        $header = ['active_login'=>$this->userLogin, 'activateItem'=>activateMenuItem('create_new_resource'), 'title'=>'Agregar nuevo enlace'];
        $data = ['categories'=>$categories];
        return view('header', $header) . view('link/create', $data) . view('footer');
    }

    public function saveLink()
    {
        $this->validation->reset();
        if($this->validation->setRuleGroup('link'))
        {
            //
        }else{
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }
    }

    public function update()
    {
        //code...
    }

    public function delete($id_delete)
    {
        //
    }

    public function loadCategory()
    {
        
        
    }


    
}
