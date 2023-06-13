<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicModel extends Model
{
    protected $table            = 'comic';
    protected $allowedFields    = ['title', 'slug', 'author', 'release_date', 'cover'];

    public function getComic($slug)
    {
        return $this->where(['slug' => $slug])->first();
    }

    public function getComicById($id)
    {
        return $this->where(['id' => $id])->first();
    }
}