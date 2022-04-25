<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'categories';
    protected $primaryKey = 'id_category';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_user_category', 'title_category', 'description_category'];

    protected $useTimestamps = true;
    protected $createdField  = 'date_created_category';
    protected $updatedField  = 'date_updated_category';
    protected $deletedField  = 'date_deleted_category';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}