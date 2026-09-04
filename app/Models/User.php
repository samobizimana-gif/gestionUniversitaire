<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nom',
        'email',
        'password',
        'role',
    ];

    protected $useTimestamps = false;

    protected $returnType = 'array';
}