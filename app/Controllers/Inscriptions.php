<?php

namespace App\Controllers;

use App\Models\Inscription;
use App\Models\Etudiant;
use App\Models\Formation;

class Inscriptions extends BaseController
{
    protected $helpers = ['url', 'form'];

    public function index()
    {
        $model = new Inscription();

        $search = trim($this->request->getGet('q') ?? '');

        $builder = $model
            ->select(
                'inscriptions.*,
                etudiants.matricule,
                etudiants.nom,
                etudiants.prenom,
                formations.code,
                formations.nom AS formation_nom'
            )
            ->join(
                'etudiants',
                'etudiants.id = inscriptions.etudiant_id'
            )
            ->join(
                'formations',
                'formations.id = inscriptions.formation_id'
            );

        if ($search !== '') {

            $builder
                ->groupStart()
                ->like('etudiants.matricule', $search)
                ->orLike('etudiants.nom', $search)
                ->orLike('etudiants.prenom', $search)
                ->orLike('formations.code', $search)
                ->orLike('formations.nom', $search)
                ->orLike('inscriptions.annee_academique', $search)
                ->orLike('inscriptions.statut', $search)
                ->groupEnd();
        }

        $inscriptions = $builder
            ->orderBy('inscriptions.id', 'DESC')
            ->findAll();

        return view('inscriptions/index', [
            'inscriptions' => $inscriptions,
            'search'       => $search,
        ]);
    }

    public function create()
    {
        $etudiantModel = new Etudiant();
        $formationModel = new Formation();

        return view('inscriptions/create', [
            'etudiants' => $etudiantModel
                ->orderBy('nom', 'ASC')
                ->findAll(),

            'formations' => $formationModel
                ->orderBy('nom', 'ASC')
                ->findAll(),
        ]);
    }

    public function store()
    {
        $model = new Inscription();

        $rules = [
            'etudiant_id'      => 'required|is_natural_no_zero',
            'formation_id'     => 'required|is_natural_no_zero',
            'annee_academique' => 'required|max_length[20]',
            'date_inscription' => 'required|valid_date[Y-m-d]',
            'statut'           => 'required|max_length[50]',
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model->insert([
            'etudiant_id'      => $this->request->getPost('etudiant_id'),
            'formation_id'     => $this->request->getPost('formation_id'),
            'annee_academique' => $this->request->getPost('annee_academique'),
            'date_inscription' => $this->request->getPost('date_inscription'),
            'statut'           => $this->request->getPost('statut'),
        ]);

        return redirect()->to('/inscriptions')
            ->with('success', 'Inscription ajoutée avec succès.');
    }

    public function edit($id)
    {
        $model = new Inscription();

        $inscription = $model->find($id);

        if (!$inscription) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Inscription introuvable.'
            );
        }

        return view('inscriptions/edit', [
            'inscription' => $inscription,
            'etudiants'   => (new Etudiant())
                ->orderBy('nom', 'ASC')
                ->findAll(),

            'formations'  => (new Formation())
                ->orderBy('nom', 'ASC')
                ->findAll(),
        ]);
    }

    public function update($id)
    {
        $model = new Inscription();

        if (!$model->find($id)) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Inscription introuvable.'
            );
        }

        $rules = [
            'etudiant_id'      => 'required|is_natural_no_zero',
            'formation_id'     => 'required|is_natural_no_zero',
            'annee_academique' => 'required|max_length[20]',
            'date_inscription' => 'required|valid_date[Y-m-d]',
            'statut'           => 'required|max_length[50]',
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model->update($id, [
            'etudiant_id'      => $this->request->getPost('etudiant_id'),
            'formation_id'     => $this->request->getPost('formation_id'),
            'annee_academique' => $this->request->getPost('annee_academique'),
            'date_inscription' => $this->request->getPost('date_inscription'),
            'statut'           => $this->request->getPost('statut'),
        ]);

        return redirect()->to('/inscriptions')
            ->with('success', 'Inscription modifiée avec succès.');
    }

    public function delete($id)
    {
        $model = new Inscription();

        if (!$model->find($id)) {

            return redirect()->to('/inscriptions')
                ->with('error', 'Inscription introuvable.');
        }

        $model->delete($id);

        return redirect()->to('/inscriptions')
            ->with('success', 'Inscription supprimée avec succès.');
    }
}