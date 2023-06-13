<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComicModel;

class Guest extends BaseController
{
    protected $comicModel;

    public function __construct()
    {
        $this->comicModel = new ComicModel();
    }

    public function index()
    {
        $data['title'] = 'Comic Page';
        $data['comics'] = $this->comicModel->findAll();

        return view('comic/index', $data);
    }

    public function detail($slug)
    {
        $data['title'] = 'Comic Detail';
        $data['comic'] = $this->comicModel->getComic($slug);

        return view('comic/detail', $data);
    }
}