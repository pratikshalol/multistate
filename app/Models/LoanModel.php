<?php

namespace App\Models;

use CodeIgniter\Model;

class LoanModel extends Model
{
    protected $table            = 'loan_products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'name',
        'slug',
        'short_description',
        'description',
        'max_percentage',
        'interest_rate',
        'tenure',
        'eligibility',
        'documents_required',
        'image',
        'is_active',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'name'          => 'required|min_length[3]|max_length[255]',
        'interest_rate' => 'required',
    ];

    public function getActiveLoans()
    {
        return $this->where('is_active', 1)->orderBy('id', 'ASC')->findAll();
    }
}
