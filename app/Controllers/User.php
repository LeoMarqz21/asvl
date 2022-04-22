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
            return view('user/login');
        }
        public function verifyLogin()
        {
            // $this->session->set(["username"=> "LeoMarqz"]);
            // $this->response->setStatusCode(200);
            // return $this->response->setJSON(["username"=>$this->session->get('username')]);
        }

        public function register()
        {
            return view('user/register');
        }

        public function verifyRegister()
        {
            $userDB = $this->users->where('username_user', $this->request->getPost('username'))->first();
            $result = !is_null($userDB)?$userDB->username_user:'';
            $req = $this->request->getPost('username');
            if(!($req == $result)){
                $this->validation->reset();
                $this->validation->setRuleGroup('register');
                if($this->validate($this->validation->getRuleGroup('register')))
                {
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
                        return redirect()->to('/user/login');
                    }else{
                        $this->session->setFlashdata(
                            'unsaved', 
                            "<div class='alert alert-danger' role='alert'>something has gone wrong, unregistered user!!!!</div>"
                        );
                        return redirect()->back()->withInput();
                    }
    
                }else
                {
                    return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
                }
            }else
            {
                return redirect()->back()->withInput()->with('errors', ['username'=>'This username already exists']);
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
            //code...
        }

        public function testView()
        {
            return view('test/test');
        }


    }

?>