<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id_user';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['fullname_user', 'username_user', 'password_user', 'image_user'];

    protected $useTimestamps = true;
    protected $createdField  = 'date_created_user';
    protected $updatedField  = 'date_updated_user';
    protected $deletedField  = 'date_deleted_user';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}