<?php

namespace App\Models;

use CodeIgniter\Model;

class Formation extends Model
{
    protected $table = 'formations';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'code',
        'nom',
        'description',
        'niveau',
    ];

    protected $useTimestamps = false;
}