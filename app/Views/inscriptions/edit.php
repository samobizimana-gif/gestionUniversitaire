<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modifier une inscription</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .container {
            max-width: 800px;
            margin: 45px auto;
            padding: 35px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,.06);
        }

        h1 {
            margin-top: 0;
        }

        .subtitle {
            color: #6b7280;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin: 18px 0 8px;
            font-weight: 600;
        }

        select,
        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
        }

        .actions {
            margin-top: 30px;
            display: flex;
            gap: 10px;
        }

        button,
        a {
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            font-weight: 600;
            cursor: pointer;
        }

        button {
            background: #2563eb;
            color: white;
        }

        .back {
            background: #f3f4f6;
            color: #374151;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Modifier l'inscription</h1>

    <div class="subtitle">
        Modifier les informations de l'inscription
    </div>

    <form
        action="<?= base_url('inscriptions/update/' . $inscription['id']) ?>"
        method="post">

        <?= csrf_field() ?>

        <label for="etudiant_id">
            Étudiant
        </label>

        <select name="etudiant_id" id="etudiant_id" required>

            <?php foreach ($etudiants as $etudiant): ?>

                <option
                    value="<?= $etudiant['id'] ?>"
                    <?= old('etudiant_id', $inscription['etudiant_id']) == $etudiant['id'] ? 'selected' : '' ?>
                >
                    <?= esc($etudiant['matricule']) ?>
                    -
                    <?= esc($etudiant['nom']) ?>
                    <?= esc($etudiant['prenom']) ?>
                </option>

            <?php endforeach; ?>

        </select>

        <label for="formation_id">
            Formation
        </label>

        <select name="formation_id" id="formation_id" required>

            <?php foreach ($formations as $formation): ?>

                <option
                    value="<?= $formation['id'] ?>"
                    <?= old('formation_id', $inscription['formation_id']) == $formation['id'] ? 'selected' : '' ?>
                >
                    <?= esc($formation['code']) ?>
                    -
                    <?= esc($formation['nom']) ?>
                </option>

            <?php endforeach; ?>

        </select>

        <label for="annee_academique">
            Année académique
        </label>

        <input
            type="text"
            name="annee_academique"
            id="annee_academique"
            value="<?= old('annee_academique', $inscription['annee_academique']) ?>"
            required
        >

        <label for="date_inscription">
            Date d'inscription
        </label>

        <input
            type="date"
            name="date_inscription"
            id="date_inscription"
            value="<?= old('date_inscription', $inscription['date_inscription']) ?>"
            required
        >

        <label for="statut">
            Statut
        </label>

        <select name="statut" id="statut" required>

            <option
                value="active"
                <?= old('statut', $inscription['statut']) === 'active' ? 'selected' : '' ?>>
                Active
            </option>

            <option
                value="inactive"
                <?= old('statut', $inscription['statut']) === 'inactive' ? 'selected' : '' ?>>
                Inactive
            </option>

            <option
                value="terminee"
                <?= old('statut', $inscription['statut']) === 'terminee' ? 'selected' : '' ?>>
                Terminée
            </option>

        </select>

        <div class="actions">

            <a
                href="<?= base_url('inscriptions') ?>"
                class="back">
                ← Annuler
            </a>

            <button type="submit">
                Enregistrer les modifications
            </button>

        </div>

    </form>

</div>

</body>
</html>