<?php

namespace App\Controllers;

use App\Models\Formation;

class Formations extends BaseController
{
    protected $helpers = ['url', 'form'];

    public function index()
    {
        $model = new Formation();

        $search = trim($this->request->getGet('q') ?? '');

        $builder = $model;

        if ($search !== '') {
            $builder = $model
                ->groupStart()
                ->like('code', $search)
                ->orLike('nom', $search)
                ->orLike('niveau', $search)
                ->orLike('description', $search)
                ->groupEnd();
        }

        $formations = $builder
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('formations/index', [
            'formations' => $formations,
            'search'     => $search,
        ]);
    }

    public function create()
    {
        return view('formations/create');
    }

    public function store()
    {
        $model = new Formation();

        $rules = [
            'code' => 'required|max_length[50]|is_unique[formations.code]',
            'nom' => 'required|max_length[150]',
            'description' => 'permit_empty',
            'niveau' => 'required|max_length[100]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model->insert([
            'code' => $this->request->getPost('code'),
            'nom' => $this->request->getPost('nom'),
            'description' => $this->request->getPost('description'),
            'niveau' => $this->request->getPost('niveau'),
        ]);

        return redirect()->to('/formations')
            ->with('success', 'Formation ajoutée avec succès.');
    }

    public function edit($id)
    {
        $model = new Formation();

        $formation = $model->find($id);

        if (!$formation) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Formation introuvable.'
            );
        }

        return view('formations/edit', [
            'formation' => $formation,
        ]);
    }

    public function update($id)
    {
        $model = new Formation();

        $formation = $model->find($id);

        if (!$formation) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Formation introuvable.'
            );
        }

        $rules = [
            'code' => "required|max_length[50]|is_unique[formations.code,id,{$id}]",
            'nom' => 'required|max_length[150]',
            'description' => 'permit_empty',
            'niveau' => 'required|max_length[100]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model->update($id, [
            'code' => $this->request->getPost('code'),
            'nom' => $this->request->getPost('nom'),
            'description' => $this->request->getPost('description'),
            'niveau' => $this->request->getPost('niveau'),
        ]);

        return redirect()->to('/formations')
            ->with('success', 'Formation modifiée avec succès.');
    }

    public function delete($id)
    {
        $model = new Formation();

        $formation = $model->find($id);

        if (!$formation) {
            return redirect()->to('/formations')
                ->with('error', 'Formation introuvable.');
        }

        $model->delete($id);

        return redirect()->to('/formations')
            ->with('success', 'Formation supprimée avec succès.');
    }
}