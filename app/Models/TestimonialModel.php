<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimonialModel extends Model
{
    protected $table            = 'testimonials';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'name',
        'message',
        'photo',
        'rating',
        'is_active',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'name'    => 'required|min_length[2]|max_length[255]',
        'message' => 'required',
    ];

    public function getActiveTestimonials()
    {
        return $this->where('is_active', 1)->orderBy('id', 'DESC')->findAll();
    }
}
