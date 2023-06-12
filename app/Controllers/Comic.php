<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComicModel;

class Comic extends BaseController
{
    protected $comicModel;

    public function __construct()
    {
        $this->comicModel = new ComicModel;
    }

    public function CreateComic()
    {
        if (!$this->validate([
            'title'        => 'required|is_unique[comic.title]',
            'author'       => 'required',
            'release_date' => 'required',
            'cover'        => [
                'rules' => 'uploaded[cover]|max_size[cover,2048]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]'
            ]
        ])) {
            return redirect()->to(base_url('admin/comic'))->withInput();
        }

        $fileCover = $this->request->getFile('cover');
        $fileCoverName = $fileCover->getRandomName();
        $fileCover->move('img', $fileCoverName);


        $post = $this->request->getPost();
        $slug = url_title($post['title'], '-', true);

        $data = [
            'title' => $post['title'],
            'slug' => $slug,
            'author' => $post['author'],
            'release_date' => $post['release_date'],
            'cover' => $fileCoverName,
        ];

        $this->comicModel->save($data);
        session()->setFlashdata('msg_c', 'Succesfully Upload New Comic!');
        return redirect()->to(base_url('admin/comic'));
    }
}