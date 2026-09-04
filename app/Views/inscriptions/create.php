<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nouvelle inscription - Gestion Universitaire</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .topbar {
            background: #ffffff;
            padding: 18px 35px;
            border-bottom: 1px solid #e5e7eb;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
            color: #2563eb;
        }

        .container {
            max-width: 850px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 30px;
        }

        .header p {
            margin: 0;
            color: #6b7280;
        }

        .card {
            background: #ffffff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        select,
        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
            background: white;
        }

        select:focus,
        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .btn {
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
        }

        .btn-back {
            background: #f3f4f6;
            color: #374151;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .alert {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert ul {
            margin-bottom: 0;
        }
    </style>
</head>

<body>

<header class="topbar">
    <div class="brand">
        Gestion Universitaire
    </div>
</header>

<main class="container">

    <div class="header">
        <h1>Nouvelle inscription</h1>

        <p>
            Enregistrer un étudiant dans une formation
        </p>
    </div>

    <?php if (session()->getFlashdata('errors')): ?>

        <div class="alert">

            <strong>Veuillez corriger les erreurs :</strong>

            <ul>

                <?php foreach (session()->getFlashdata('errors') as $error): ?>

                    <li><?= esc($error) ?></li>

                <?php endforeach; ?>

            </ul>

        </div>

    <?php endif; ?>

    <div class="card">

        <form
            action="<?= base_url('inscriptions/store') ?>"
            method="post">

            <?= csrf_field() ?>

            <div class="form-group">

                <label for="etudiant_id">
                    Étudiant
                </label>

                <select
                    name="etudiant_id"
                    id="etudiant_id"
                    required>

                    <option value="">
                        -- Sélectionner un étudiant --
                    </option>

                    <?php if (!empty($etudiants)): ?>

                        <?php foreach ($etudiants as $etudiant): ?>

                            <option
                                value="<?= esc($etudiant['id']) ?>"
                                <?= old('etudiant_id') == $etudiant['id'] ? 'selected' : '' ?>>

                                <?= esc($etudiant['matricule']) ?>
                                -
                                <?= esc($etudiant['nom']) ?>
                                <?= esc($etudiant['prenom']) ?>

                            </option>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </select>

            </div>


            <div class="form-group">

                <label for="formation_id">
                    Formation
                </label>

                <select
                    name="formation_id"
                    id="formation_id"
                    required>

                    <option value="">
                        -- Sélectionner une formation --
                    </option>

                    <?php if (!empty($formations)): ?>

                        <?php foreach ($formations as $formation): ?>

                            <option
                                value="<?= esc($formation['id']) ?>"
                                <?= old('formation_id') == $formation['id'] ? 'selected' : '' ?>>

                                <?= esc($formation['code']) ?>
                                -
                                <?= esc($formation['nom']) ?>

                            </option>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </select>

            </div>


            <div class="form-group">

                <label for="annee_academique">
                    Année académique
                </label>

                <input
                    type="text"
                    name="annee_academique"
                    id="annee_academique"
                    placeholder="Ex : 2026-2027"
                    value="<?= old('annee_academique') ?>"
                    required>

            </div>


            <div class="form-group">

                <label for="date_inscription">
                    Date d'inscription
                </label>

                <input
                    type="date"
                    name="date_inscription"
                    id="date_inscription"
                    value="<?= old('date_inscription', date('Y-m-d')) ?>"
                    required>

            </div>


            <div class="form-group">

                <label for="statut">
                    Statut
                </label>

                <select
                    name="statut"
                    id="statut"
                    required>

                    <option
                        value="active"
                        <?= old('statut', 'active') === 'active' ? 'selected' : '' ?>>
                        Active
                    </option>

                    <option
                        value="inactive"
                        <?= old('statut') === 'inactive' ? 'selected' : '' ?>>
                        Inactive
                    </option>

                    <option
                        value="terminee"
                        <?= old('statut') === 'terminee' ? 'selected' : '' ?>>
                        Terminée
                    </option>

                </select>

            </div>


            <div class="actions">

                <a
                    href="<?= base_url('inscriptions') ?>"
                    class="btn btn-back">

                    ← Retour

                </a>

                <button
                    type="submit"
                    class="btn btn-primary">

                    Enregistrer l'inscription

                </button>

            </div>

        </form>

    </div>

</main>

</body>
</html>