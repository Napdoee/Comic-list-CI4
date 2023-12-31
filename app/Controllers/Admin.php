<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ComicModel;

class Admin extends BaseController
{
    protected $userModel;
    protected $comicModel;
    protected $uri;

    public function __construct()
    {
        helper('form');
        $this->userModel = new UserModel();
        $this->comicModel = new ComicModel();
        $this->uri = service('uri');
    }

    public function index()
    {
        $data['title'] = 'Admin Page';
        $data['uri'] = $this->uri;

        return view('admin/index', $data);
    }

    public function comic()
    {
        $data['title'] = "Comic Data";
        $data['comics'] = $this->comicModel->findAll();
        $data['uri'] = $this->uri;

        return view('admin/comic', $data);
    }

    public function user()
    {
        $data['title'] = "Users Data";
        $data['users'] = $this->userModel->getAll();
        $data['uri'] = $this->uri;

        return view('admin/user', $data);
    }

    public function update($name)
    {
        $uri = $this->uri->getSegment(2);

        if ($uri == 'user') {
            $data['title'] = 'User Update';
            $data['update'] = 'user';
            $data['user'] = $this->userModel->getUser($name);
            $data['uri'] = $this->uri;

            return view('admin/update', $data);
        } else if ($uri == 'comic') {
            $data['title'] = 'Comic Update';
            $data['update'] = 'comic';
            $data['comic'] = $this->comicModel->getComic($name);
            $data['uri'] = $this->uri;

            return view('admin/update', $data);
        } else {
            return redirect()->to(base_url('admin'));
        }
    }

    public function delete($id)
    {
        $uri = $this->uri->getSegment(2);

        if ($uri == 'user') {

            $this->userModel->delete($id);
            session()->setFlashdata('msg_c', "Succesfully delete user account!");
            return redirect()->to(base_url('admin/user'));
        } else {
            return redirect()->to(base_url('admin'));
        }
    }
}