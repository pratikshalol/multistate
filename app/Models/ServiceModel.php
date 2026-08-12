<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table            = 'services';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'category',
        'icon',
        'icon_color',
        'title',
        'description',
        'features',
        'link_url',
        'link_text',
        'sort_order',
        'is_active',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'category' => 'required|in_list[account,banking]',
        'title'    => 'required|min_length[3]|max_length[255]',
    ];

    public function getByCategory(string $category)
    {
        return $this->where('category', $category)
            ->orderBy('sort_order', 'ASC')
            ->orderBy('id', 'ASC')
            ->findAll();
    }

    public function getActiveByCategory(string $category)
    {
        return $this->where('category', $category)
            ->where('is_active', 1)
            ->orderBy('sort_order', 'ASC')
            ->orderBy('id', 'ASC')
            ->findAll();
    }
}
