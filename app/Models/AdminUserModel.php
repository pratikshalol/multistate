<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminUserModel extends Model
{
    protected $table            = 'admin_users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'name',
        'email',
        'password',
        'role',
        'created_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = '';

    protected $validationRules = [
        'name'  => 'required|min_length[2]|max_length[255]',
        'email' => 'required|valid_email',
    ];

    public function findByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
