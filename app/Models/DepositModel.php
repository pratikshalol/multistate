<?php

namespace App\Models;

use CodeIgniter\Model;

class DepositModel extends Model
{
    protected $table            = 'deposit_plans';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'name',
        'slug',
        'short_description',
        'description',
        'interest_rate',
        'min_amount',
        'tenure',
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

    public function getActivePlans()
    {
        return $this->where('is_active', 1)->orderBy('id', 'ASC')->findAll();
    }
}
