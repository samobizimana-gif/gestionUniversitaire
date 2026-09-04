<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un étudiant</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,.08);
        }

        h1 {
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 7px;
            box-sizing: border-box;
        }

        textarea {
            min-height: 100px;
        }

        .actions {
            margin-top: 25px;
        }

        button {
            background: #0d6efd;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 7px;
            cursor: pointer;
        }

        a {
            margin-right: 15px;
            color: #555;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Ajouter un étudiant</h1>

    <form action="<?= base_url('etudiants/store') ?>" method="post">

        <?= csrf_field() ?>

        <div class="form-group">
            <label>Matricule</label>
            <input
                type="text"
                name="matricule"
                placeholder="Ex : ETU001"
                required
            >
        </div>

        <div class="form-group">
            <label>Nom</label>
            <input
                type="text"
                name="nom"
                required
            >
        </div>

        <div class="form-group">
            <label>Prénom</label>
            <input
                type="text"
                name="prenom"
                required
            >
        </div>

        <div class="form-group">
            <label>Sexe</label>

            <select name="sexe" required>
                <option value="">Sélectionner</option>
                <option value="Masculin">Masculin</option>
                <option value="Féminin">Féminin</option>
            </select>
        </div>

        <div class="form-group">
            <label>Téléphone</label>
            <input
                type="text"
                name="telephone"
            >
        </div>

        <div class="form-group">
            <label>Email</label>
            <input
                type="email"
                name="email"
            >
        </div>

        <div class="form-group">
            <label>Adresse</label>
            <textarea name="adresse"></textarea>
        </div>

        <div class="actions">

            <a href="<?= base_url('etudiants') ?>">
                ← Retour
            </a>

            <button type="submit">
                Enregistrer l'étudiant
            </button>

        </div>

    </form>

</div>

</body>
</html>