<?php

    namespace App\Controllers;

    use App\Models\UserModel;
    use App\Models\CategoryModel;

    class User extends BaseController
    {
        private $session;
        private $validation;
        private $users;
        private $categories;
        private $costEncrypt;
        private $userLogin;



        public function __construct()
        {
            $this->session = \Config\Services::session();
            $this->validation = \Config\Services::validation();
            $this->costEncrypt = ['cost'=>15];
            $this->users = new UserModel();
            $this->categories = new CategoryModel();
            $this->userLogin = $this->session->get('active_login');
        }
        public function index()
        {
            if(is_null($this->session->get('active_login')) == false) return redirect()->to('/');
            
            return view('user/login');
        }
        public function verifyLogin()
        {
            if(is_null($this->session->get('active_login')) == false) return redirect()->to('/');

            $this->validation->reset();
                $this->validation->setRuleGroup('login');
                if($this->validate($this->validation->getRuleGroup('login')))
                {
                    $userDB = $this->users->where('username_user', $this->request->getPost('username'))->first();
                    if(is_null($userDB))
                    {
                        $this->session->setFlashdata('notexists', "<div class='alert alert-danger' role='alert'>this user does not exist</div>");
                        return redirect()->back();
                    }
                    $result = !is_null($userDB)?$userDB->username_user:'';
                    $req = $this->request->getPost('username');
                    if($req == $result)
                    {
                        if(password_verify($this->request->getPost('password'), $userDB->password_user))
                        {
                            $userData = [
                                'id_user'=>$userDB->id_user,
                                'fullname_user'=>$userDB->fullname_user,
                                'username_user'=>$userDB->username_user,
                                'image_user'=>$userDB->image_user
                            ];
                            $this->session->set('active_login', $userData);
                            $exists_category = $this->categories->where('id_user_category', $userData['id_user'])->first();
                            if(is_null($exists_category))
                            {
                                $create_category_default = [
                                    'id_user_category'=>$userData['id_user'],
                                    'title_category'=>'default',
                                    'description_category' => 'categoria default [' . $userData['username_user'] . ']'
                                ];
                                $this->categories->save($create_category_default);
                            }
                            return redirect()->to('/');
                        }else{
                            return redirect()->back()->withInput()->with('errors', ['password' =>'verify your password or username']);
                        }
                    }else
                    {
                        return redirect()->back()->withInput()->with('errors', ['username' =>'This username does not exist']);
                    }
                }else
                {
                    return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
                }
        }

        public function register()
        {
            if(is_null($this->session->get('active_login')) == false) return redirect()->to('/');
            return view('user/register');
        }

        public function verifyRegister()
        {
            if(is_null($this->session->get('active_login')) == false) return redirect()->to('/');
            $this->validation->reset();
            $this->validation->setRuleGroup('register');
            if($this->validate($this->validation->getRuleGroup('register')))
            {
                $userDB = $this->users->where('username_user', $this->request->getPost('username'))->first();
                $result = !is_null($userDB)?$userDB->username_user:'';
                $req = $this->request->getPost('username');
                if(!($req == $result)){
                        $user = [
                            'fullname_user'=>$this->request->getPost('fullname'),
                            'username_user'=>$this->request->getPost('username'),
                            'password_user'=>password_hash(
                                $this->request->getPost('password'),
                                PASSWORD_BCRYPT, 
                                $this->costEncrypt
                            ),
                            'image_user'=>null
                        ];
                        
                        if($this->users->save($user))
                        {
                            
                            $this->session->setFlashdata('register', "<div class='alert alert-primary' role='alert'>successful registration</div>");
                            return redirect()->back();
                        }else{
                            $this->session->setFlashdata(
                                'unsaved', 
                                "<div class='alert alert-danger' role='alert'>something has gone wrong, unregistered user!!!!</div>"
                            );
                            return redirect()->back()->withInput();
                        }
        
                    }else
                    {
                        return redirect()->back()->withInput()->with('errors', ['username'=>'This username already exists']);
                    }
            }else
            {
                return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
            }
        }

        public function editUser()
        {
            if(is_null($this->session->get('active_login')) != false) return redirect()->to('/user/login');
            $header = ['active_login'=>$this->session->get('active_login'),  'title'=>'Mi perfil'];
            $data = ['id_user'=>$this->userLogin['id_user']];
            return view('header', $header) . view('user/edit', $data) . view('footer');
        }
        
        public function editPass()
        {
            if(is_null($this->session->get('active_login')) != false) return redirect()->to('/user/login');
            $this->validation->reset();
            $this->validation->setRuleGroup('editPass');
            if($this->validate($this->validation->getRuleGroup('editPass')))
            {
                if($this->users->set('password_user', password_hash($this->request->getPost('password'),PASSWORD_BCRYPT, $this->costEncrypt ))->where('id_user', $this->userLogin['id_user'])->update())
                {
                    $this->session->setFlashdata('editpass', "<div class='alert alert-primary' role='alert'>password successfully updated</div>");
                    return redirect()->back();
                }else{
                    $this->session->setFlashdata('editpass', "<div class='alert alert-danger' role='alert'>password could not be updated </div>");
                    return redirect()->back();
                }
            }else
            {
                return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
            }
        }
        
        public function editData()
        {
            if(is_null($this->session->get('active_login')) != false) return redirect()->to('/user/login');
            $this->validation->reset();
            $this->validation->setRuleGroup('editData');
            if($this->validate($this->validation->getRuleGroup('editData')))
            {
                $data = [
                    'fullname_user'=>$this->request->getPost('fullname'),
                    'username_user'=>$this->request->getPost('username')
                ];
                if( $this->users->set($data)->where('id_user', $this->userLogin['id_user'])->update() )
                {
                    $UserDB = $this->users->where('id_user', $this->userLogin['id_user'])->first();
                    $UserData = [
                        'id_user'=>$UserDB->id_user,
                        'fullname_user'=>$UserDB->fullname_user,
                        'username_user'=>$UserDB->username_user,
                        'image_user'=>$UserDB->image_user
                    ];
                    $this->session->set('active_login', $UserData);
                    $this->userLogin = 
                    $this->session->setFlashdata('editdata', "<div class='alert alert-primary' role='alert'>password successfully updated</div>");
                    return redirect()->back();
                }else
                {
                    $this->session->setFlashdata('editdata', "<div class='alert alert-primary' role='alert'>password successfully updated</div>");
                    return redirect()->back();
                }
            }else
            {
                return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
            }

        }

        public function deleteUser()
        {
            if(is_null($this->session->get('active_login')) != false) return redirect()->to('/user/login');
            if($this->users->where('id_user', $this->userLogin['id_user'])->delete())
            {
                $this->session->remove('active_login');
                return redirect()->to('/user/login');
            }else
            {
                $this->session->setFlashdata('delete_user', "<div class='alert alert-danger' role='alert'>could not delete this user, try again later</div>");
                return redirect()->back();
            }
        }

        public function logout()
        {
            $this->session->remove('active_login');
            return redirect()->to('user/login');
        }

        


    }

?>