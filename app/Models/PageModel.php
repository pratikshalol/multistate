<?php

namespace App\Models;

use CodeIgniter\Model;

class PageModel extends Model
{
    protected $table            = 'pages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'slug',
        'title',
        'content',
        'meta_title',
        'meta_description',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = '';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'title' => 'required|min_length[3]|max_length[255]',
        'slug'  => 'required|min_length[2]|max_length[255]',
    ];

    public function getBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }
}
