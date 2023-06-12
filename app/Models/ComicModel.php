<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicModel extends Model
{
    protected $table            = 'comics';
    protected $allowedFields    = ['title', 'slug', 'author', 'release_date', 'cover'];
}