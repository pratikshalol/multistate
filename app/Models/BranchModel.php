<?php

namespace App\Models;

use CodeIgniter\Model;

class BranchModel extends Model
{
    protected $table            = 'branches';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'name',
        'address',
        'phone',
        'email',
        'working_hours',
        'latitude',
        'longitude',
        'is_active',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'name'    => 'required|min_length[3]|max_length[255]',
        'address' => 'required',
        'phone'   => 'required',
    ];

    public function getActiveBranches()
    {
        return $this->where('is_active', 1)->orderBy('id', 'ASC')->findAll();
    }
}
