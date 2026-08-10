<?php

namespace App\Models;

use CodeIgniter\Model;

class NoticeModel extends Model
{
    protected $table            = 'notices';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'title',
        'description',
        'file_path',
        'publish_date',
        'is_active',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'title' => 'required|min_length[3]|max_length[255]',
    ];

    public function getActiveNotices()
    {
        return $this->where('is_active', 1)->orderBy('publish_date', 'DESC')->findAll();
    }
}
