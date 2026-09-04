<?php

namespace App\Models;

use CodeIgniter\Model;

class Etudiant extends Model
{
    protected $table = 'etudiants';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'matricule',
        'nom',
        'prenom',
        'sexe',
        'telephone',
        'email',
        'adresse',
    ];

    protected $useTimestamps = false;
}