<?php

namespace App\Controllers;

use App\Models\Etudiant;

class Etudiants extends BaseController
{
    protected $helpers = ['url', 'form'];

    public function index()
    {
        $model = new Etudiant();

        $data = [
            'etudiants' => $model->orderBy('id', 'DESC')->findAll(),
        ];

        return view('etudiants/index', $data);
    }

    public function create()
    {
        return view('etudiants/create');
    }

    public function store()
    {
        $model = new Etudiant();

        $rules = [
            'matricule' => 'required|max_length[50]|is_unique[etudiants.matricule]',
            'nom'       => 'required|max_length[100]',
            'prenom'    => 'required|max_length[100]',
            'sexe'      => 'required|max_length[20]',
            'telephone' => 'permit_empty|max_length[30]',
            'email'     => 'permit_empty|valid_email|max_length[150]',
            'adresse'   => 'permit_empty|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model->insert([
            'matricule' => $this->request->getPost('matricule'),
            'nom'       => $this->request->getPost('nom'),
            'prenom'    => $this->request->getPost('prenom'),
            'sexe'      => $this->request->getPost('sexe'),
            'telephone' => $this->request->getPost('telephone'),
            'email'     => $this->request->getPost('email'),
            'adresse'   => $this->request->getPost('adresse'),
        ]);

        return redirect()->to('/etudiants')
            ->with('success', 'Étudiant ajouté avec succès.');
    }

    public function edit($id)
    {
        $model = new Etudiant();

        $etudiant = $model->find($id);

        if (!$etudiant) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Étudiant introuvable.'
            );
        }

        return view('etudiants/edit', [
            'etudiant' => $etudiant,
        ]);
    }

    public function update($id)
    {
        $model = new Etudiant();

        $etudiant = $model->find($id);

        if (!$etudiant) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Étudiant introuvable.'
            );
        }

        $rules = [
            'matricule' => "required|max_length[50]|is_unique[etudiants.matricule,id,{$id}]",
            'nom'       => 'required|max_length[100]',
            'prenom'    => 'required|max_length[100]',
            'sexe'      => 'required|max_length[20]',
            'telephone' => 'permit_empty|max_length[30]',
            'email'     => 'permit_empty|valid_email|max_length[150]',
            'adresse'   => 'permit_empty|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model->update($id, [
            'matricule' => $this->request->getPost('matricule'),
            'nom'       => $this->request->getPost('nom'),
            'prenom'    => $this->request->getPost('prenom'),
            'sexe'      => $this->request->getPost('sexe'),
            'telephone' => $this->request->getPost('telephone'),
            'email'     => $this->request->getPost('email'),
            'adresse'   => $this->request->getPost('adresse'),
        ]);

        return redirect()->to('/etudiants')
            ->with('success', 'Étudiant modifié avec succès.');
    }

    public function delete($id)
    {
        $model = new Etudiant();

        $etudiant = $model->find($id);

        if (!$etudiant) {
            return redirect()->to('/etudiants')
                ->with('error', 'Étudiant introuvable.');
        }

        $model->delete($id);

        return redirect()->to('/etudiants')
            ->with('success', 'Étudiant supprimé avec succès.');
    }
}