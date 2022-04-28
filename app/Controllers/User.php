<?php

    namespace App\Controllers;

    use App\Models\UserModel;

    class User extends BaseController
    {
        private $session;
        private $validation;
        private $users;
        private $costEncrypt;


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
        public function verifyLogin()
        {
            if(is_null($this->session->get('active_login')) == false) return redirect()->to('/');

            $this->validation->reset();
                $this->validation->setRuleGroup('login');
                if($this->validate($this->validation->getRuleGroup('login')))
                {
                    $userDB = $this->users->where('username_user', $this->request->getPost('username'))->first();
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
                                'password' =>$userDB->password_user,
                                'image_user'=>$userDB->image_user
                            ];
                            $this->session->set('active_login', $userData);
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

        public function saveUser()
        {
            //code...
        }

        public function deleteUser()
        {
            //code...
        }

        public function logout()
        {
            $this->session->remove('active_login');
            return redirect()->to('user/login');
        }

        


    }

?>