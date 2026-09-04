<?php

namespace App\Models;

use CodeIgniter\Model;

class Inscription extends Model
{
    protected $table = 'inscriptions';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'etudiant_id',
        'formation_id',
        'annee_academique',
        'date_inscription',
        'statut',
    ];

    protected $useTimestamps = false;
}