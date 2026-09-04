<?php

namespace App\Controllers;

use App\Models\Etudiant;
use App\Models\Formation;
use App\Models\Inscription;

class Dashboard extends BaseController
{
    public function index()
    {
        $etudiantModel = new Etudiant();
        $formationModel = new Formation();
        $inscriptionModel = new Inscription();

        $data = [
            'nombreEtudiants'    => $etudiantModel->countAllResults(),
            'nombreFormations'   => $formationModel->countAllResults(),
            'nombreInscriptions' => $inscriptionModel->countAllResults(),
        ];

        return view('dashboard/index', $data);
    }
}