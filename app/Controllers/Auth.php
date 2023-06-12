<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        helper('form');
        $this->userModel = new UserModel();
    }

    public function register()
    {
        $data['title'] = 'Register Page';

        return view('auth/register', $data);
    }

    public function login()
    {
        $data['title'] = 'Login Page';

        return view('auth/login', $data);
    }

    public function logout()
    {
        $data = ['login', 'username', 'email', 'level', 'foto'];
        session()->remove($data);

        session()->setFlashdata('msg_c', "You're logout now");
        return redirect()->to(base_url('auth/login'));
    }

    public function SaveRegister()
    {
        if (!$this->validate([
            "username" => 'required|is_unique[user.username]',
            "email" => 'required|valid_email|is_unique[user.email]',
            "password" => 'required|min_length[8]',
            "confirmPass" => 'required|matches[password]',
        ])) {
            return redirect()->back()->withInput();
        }

        $data = [
            "username" =>  $this->request->getVar('username'),
            "email" =>  $this->request->getVar('email'),
            "password" =>  $this->request->getVar('password'),
            "level" => "guest"
        ];

        $this->userModel->save($data);
        return redirect()->to(base_url('auth/login'));
    }

    public function SaveLogin()
    {
        if (!$this->validate([
            "email" => 'required|valid_email',
            "password" => 'required',
        ])) {
            return redirect()->back()->withInput();
        }

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $this->userModel->login($email, $password);
        if ($data) {
            $users = [
                'login' => true,
                'username' => $data['username'],
                'email' => $data['email'],
                'level' => $data['level'],
                'avatar' => $data['avatar'],
            ];

            return session()->set($users);
        } else {
            session()->setFlashdata('msg_e', 'Username / Password is wrong!');
            return redirect()->back()->withInput();
        }
    }
}