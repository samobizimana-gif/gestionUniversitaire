<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();

        if ($db->connect()) {
            echo "Connexion à la base de données réussie !";
        }
    }
}
