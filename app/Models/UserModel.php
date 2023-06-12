<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public $table         = 'user';
    public $allowedFields = ['username', 'password', 'email', 'avatar', 'level'];

    public function login($email, $password)
    {
        return $this->where([
            'email' => $email,
            'password' => $password
        ])->get()->getRowArray();
    }

    public function getAll()
    {
        return $this->findAll();
    }

    public function getUser($user)
    {
        return $this->where(['username' => $user])->first();
    }

    public function getUserById($userId)
    {
        return $this->where(['id' => $userId])->first();
    }
}