<?php

namespace App\Models;

use CodeIgniter\Model;

class EnquiryModel extends Model
{
    protected $table            = 'enquiries';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'name',
        'phone',
        'email',
        'message',
        'related_product',
        'status',
        'created_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = '';

    protected $validationRules = [
        'name'    => 'required|min_length[2]|max_length[255]',
        'phone'   => 'required|min_length[10]',
        'message' => 'required',
    ];
}
