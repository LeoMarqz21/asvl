<?php

namespace App\Models;

use CodeIgniter\Model;

class LinkModel extends Model
{
    protected $table      = 'links';
    protected $primaryKey = 'id_link';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_category_link',	'id_user_link',	'title_link', 'url_link'];

    protected $useTimestamps = true;
    protected $createdField  = 'date_created_link';
    protected $updatedField  = 'date_updated_link';
    protected $deletedField  = 'date_deleted_link';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}