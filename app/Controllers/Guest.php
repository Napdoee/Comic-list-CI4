<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Guest extends BaseController
{
    public function index()
    {
        $data['title'] = 'Guest Page';

        return view('comic/index', $data);
    }
}