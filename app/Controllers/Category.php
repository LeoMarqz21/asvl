<?php

namespace App\Controllers;

use App\Models\CategoryModel;



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
        $this->costEncrypt = ['cost' => 15];
        $this->categories = new CategoryModel();
        $this->userLogin = $this->session->get('active_login');
    }
    public function index()
    {
        if(is_null($this->session->get('active_login')) != false) return redirect()->to('/user/login');
        $header = ['active_login' => $this->userLogin, 'title' => 'Agregar nueva categoria'];
        $categories = $this->categories->where('id_user_category', $this->userLogin['id_user'])->findAll();
        $data = ['categories' => $categories];
        return view('header', $header) . view('category/create', $data) . view('footer');
    }

    public function saveCategory()
    {
        if(is_null($this->session->get('active_login')) != false) return redirect()->to('/user/login');
        $this->validation->reset();
        $this->validation->setRuleGroup('category');
        if($this->validate($this->validation->getRuleGroup('category')))
        {
            $category = [
                'id_user_category'=>$this->userLogin['id_user'],
                'title_category'=>$this->request->getPost('title_category'),
                'description_category'=>$this->request->getPost('description_category'),
            ];
            if($this->categories->save($category))
            {
                $this->session->setFlashdata('save_category', "<div class='alert alert-primary' role='alert'>Save category!!!</div>");
                return redirect()->back();
            }else
            {
                $this->session->setFlashdata('save_category', "<div class='alert alert-danger' role='alert'>the category could not be saved !!!</div>");
                return redirect()->back();
            }
        }else
        {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }
    }

    public function delete($id_delete = null)
    {
        if ($id_delete != null) {
            if ($this->categories->where('id_category', $id_delete)
            ->where('id_user_category', $this->userLogin['id_user'])
            ->delete()
            ) {
                $this->session->setFlashdata('delete_category', "<div class='alert alert-primary' role='alert'>link removed!!</div>");
            }
            else {
                $this->session->setFlashdata('delete_category', "<div class='alert alert-danger' role='alert'>link could not be removed</div>");
            }

        }
        return redirect()->back();
    }

}