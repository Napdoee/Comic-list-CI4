<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        helper('form');
        $this->userModel = new UserModel();
    }

    public function CreateUser()
    {
        if (!$this->validate([
            "username" => 'required|is_unique[user.username]',
            "email" => 'required|valid_email|is_unique[user.email]',
            "password" => 'required|min_length[8]',
            "level" => 'required',
        ])) {
            return redirect()->back()->withInput();
        }

        $data = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'level' => $this->request->getVar('level'),
        ];

        $this->userModel->save($data);
        session()->setFlashdata('msg_c', 'Succesfully Created New User!');
        return redirect()->to(base_url('admin/user'));
    }

    public function UpdateUser()
    {
        $post = $this->request->getPost();
        $oldUser = $this->userModel->getUserById($post['id']);

        $oldUser['username'] == $post['username'] ?
            $rule_username = 'required' : $rule_username = 'required|is_unique[user.username]';

        $oldUser['email'] == $post['email'] ?
            $rule_email = 'required' : $rule_email = 'required|is_unique[user.email]';

        $post['password'] == '' ?
            $pass = $oldUser['password'] : $pass = $post['password'];

        if (!$this->validate([
            "username" => $rule_username,
            "email" => $rule_email,
            "level" => 'required',
        ])) {
            return redirect()->back()->withInput();
        }

        $data = [
            'username' => $post['username'], 'email' => $post['email'],
            'password' => $pass, 'level' => $post['level'],
        ];

        $this->userModel->update($post['id'], $data);
        session()->setFlashdata('msg_c', "Succesfully Update $post[username]'s!");
        return redirect()->to(base_url('admin/user'));
    }
}