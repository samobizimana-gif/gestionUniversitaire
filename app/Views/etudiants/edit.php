<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modifier un étudiant</title>

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
            max-width: 900px;
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
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,.06);
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 5px;
        }

        .full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #2563eb;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .actions {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            border: none;
            cursor: pointer;
        }

        .btn-secondary {
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

        .errors {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .errors ul {
            margin: 8px 0 0 20px;
        }

        @media (max-width: 700px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }

            .card {
                padding: 20px;
            }
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
        <h1>Modifier un étudiant</h1>
        <p>Modification des informations de l'étudiant</p>
    </div>

    <?php if (session()->getFlashdata('errors')): ?>

        <div class="errors">

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
            action="<?= base_url('etudiants/update/' . $etudiant['id']) ?>"
            method="post"
        >

            <?= csrf_field() ?>

            <div class="form-grid">

                <div class="form-group">

                    <label for="matricule">
                        Matricule
                    </label>

                    <input
                        type="text"
                        id="matricule"
                        name="matricule"
                        value="<?= old('matricule', $etudiant['matricule']) ?>"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="sexe">
                        Sexe
                    </label>

                    <select id="sexe" name="sexe" required>

                        <option value="">
                            Sélectionner
                        </option>

                        <option
                            value="Masculin"
                            <?= old('sexe', $etudiant['sexe']) === 'Masculin' ? 'selected' : '' ?>
                        >
                            Masculin
                        </option>

                        <option
                            value="Féminin"
                            <?= old('sexe', $etudiant['sexe']) === 'Féminin' ? 'selected' : '' ?>
                        >
                            Féminin
                        </option>

                    </select>

                </div>

                <div class="form-group">

                    <label for="nom">
                        Nom
                    </label>

                    <input
                        type="text"
                        id="nom"
                        name="nom"
                        value="<?= old('nom', $etudiant['nom']) ?>"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="prenom">
                        Prénom
                    </label>

                    <input
                        type="text"
                        id="prenom"
                        name="prenom"
                        value="<?= old('prenom', $etudiant['prenom']) ?>"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="telephone">
                        Téléphone
                    </label>

                    <input
                        type="text"
                        id="telephone"
                        name="telephone"
                        value="<?= old('telephone', $etudiant['telephone']) ?>"
                    >

                </div>

                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="<?= old('email', $etudiant['email']) ?>"
                    >

                </div>

                <div class="form-group full">

                    <label for="adresse">
                        Adresse
                    </label>

                    <textarea
                        id="adresse"
                        name="adresse"
                    ><?= old('adresse', $etudiant['adresse']) ?></textarea>

                </div>

            </div>

            <div class="actions">

                <a
                    href="<?= base_url('etudiants') ?>"
                    class="btn btn-secondary"
                >
                    ← Annuler
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Enregistrer les modifications
                </button>

            </div>

        </form>

    </div>

</main>

</body>
</html>