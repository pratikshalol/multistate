<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountApplicationModel extends Model
{
    protected $table            = 'account_applications';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'full_name',
        'mobile',
        'email',
        'dob',
        'address',
        'account_type',
        'branch_id',
        'id_proof_type',
        'id_proof_number',
        'id_proof_file',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'full_name'       => 'required|min_length[3]|max_length[255]',
        'mobile'          => 'required|min_length[10]|max_length[15]',
        'address'         => 'required',
        'account_type'    => 'required',
        'id_proof_type'   => 'required',
        'id_proof_number' => 'required',
    ];
}
