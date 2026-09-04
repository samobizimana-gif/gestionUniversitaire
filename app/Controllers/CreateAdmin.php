<?php

namespace App\Controllers;

use App\Models\User;

class CreateAdmin extends BaseController
{
    public function index()
    {
        $userModel = new User();

        $email = 'admin@gmail.com';

        // Vérifier si l'administrateur existe déjà
        $existingUser = $userModel
            ->where('email', $email)
            ->first();

        if ($existingUser) {
            return 'L’administrateur existe déjà.';
        }

        // Créer l'administrateur
        $userModel->insert([
            'nom'      => 'Administrateur',
            'email'    => $email,
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'role'     => 'admin',
        ]);

        return 'Administrateur créé avec succès. Email : admin@gmail.com | Mot de passe : admin123';
    }
}