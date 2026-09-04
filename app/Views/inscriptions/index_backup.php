<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscriptions</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .topbar {
            background: #fff;
            padding: 18px 35px;
            border-bottom: 1px solid #e5e7eb;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
            color: #2563eb;
        }

        .container {
            max-width: 1250px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 { margin: 0 0 7px; }

        .subtitle {
            color: #6b7280;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 7px;
            text-decoration: none;
            font-weight: 600;
            border: none;
            cursor: pointer;
        }

        .primary {
            background: #2563eb;
            color: white;
        }

        .edit {
            background: #eff6ff;
            color: #2563eb;
        }

        .delete {
            background: #fef2f2;
            color: #dc2626;
        }

        .card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,.06);
        }

        .card-header {
            padding: 20px 25px;
            border-bottom: 1px solid #eee;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f9fafb;
            text-align: left;
            padding: 15px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .badge {
            padding: 6px 10px;
            border-radius: 20px;
            background: #ecfdf5;
            color: #047857;
            font-size: 13px;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .alert {
            padding: 14px;
            margin-bottom: 20px;
            border-radius: 8px;
            background: #ecfdf5;
            color: #047857;
        }

        .empty {
            text-align: center;
            padding: 60px;
            color: #6b7280;
        }
    </style>
</head>

<body>

<header class="topbar">
    <div class="brand">Gestion Universitaire</div>
</header>

<main class="container">

    <div class="header">
        <div>
            <h1>Inscriptions</h1>
            <div class="subtitle">
                Gestion des inscriptions universitaires
            </div>
        </div>

        <a href="<?= base_url('inscriptions/create') ?>" class="btn primary">
            + Nouvelle inscription
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <div class="card">

        <div class="card-header">
            Liste des inscriptions
        </div>

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Étudiant</th>
                    <th>Formation</th>
                    <th>Année académique</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

            <?php if (!empty($inscriptions)): ?>

                <?php foreach ($inscriptions as $inscription): ?>

                    <tr>
                        <td><?= esc($inscription['id']) ?></td>

                        <td>
                            <strong>
                                <?= esc($inscription['nom']) ?>
                                <?= esc($inscription['prenom']) ?>
                            </strong>
                            <br>
                            <small>
                                <?= esc($inscription['matricule']) ?>
                            </small>
                        </td>

                        <td>
                            <?= esc($inscription['formation_nom']) ?>
                            <br>
                            <small><?= esc($inscription['code']) ?></small>
                        </td>

                        <td>
                            <?= esc($inscription['annee_academique']) ?>
                        </td>

                        <td>
                            <?= esc($inscription['date_inscription']) ?>
                        </td>

                        <td>
                            <span class="badge">
                                <?= esc($inscription['statut']) ?>
                            </span>
                        </td>

                        <td>
                            <div class="actions">

                                <a
                                    href="<?= base_url('inscriptions/edit/' . $inscription['id']) ?>"
                                    class="btn edit">
                                    Modifier
                                </a>

                                <a
                                    href="<?= base_url('inscriptions/delete/' . $inscription['id']) ?>"
                                    class="btn delete"
                                    onclick="return confirm('Voulez-vous vraiment supprimer cette inscription ?')">
                                    Supprimer
                                </a>

                            </div>
                        </td>
                    </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>
                    <td colspan="7">
                        <div class="empty">
                            <h3>Aucune inscription</h3>
                            <p>Aucune inscription n'est encore enregistrée.</p>

                            <a
                                href="<?= base_url('inscriptions/create') ?>"
                                class="btn primary">
                                Créer une inscription
                            </a>
                        </div>
                    </td>
                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</main>

</body>
</html>