<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formations</title>
<style>
*{box-sizing:border-box}body{margin:0;font-family:Arial;background:#f5f7fb;color:#1f2937}
.topbar{background:#fff;padding:18px 35px;border-bottom:1px solid #e5e7eb}
.brand{font-size:22px;font-weight:bold;color:#2563eb}
.container{max-width:1200px;margin:35px auto;padding:0 20px}
.header{display:flex;justify-content:space-between;align-items:center;margin-bottom:25px}
h1{margin:0 0 7px}.subtitle{color:#6b7280}
.btn{display:inline-block;padding:12px 18px;border-radius:8px;text-decoration:none;font-weight:bold}
.primary{background:#2563eb;color:#fff}.edit{background:#eff6ff;color:#2563eb}
.delete{background:#fef2f2;color:#dc2626}
.card{background:#fff;border-radius:12px;box-shadow:0 4px 15px rgba(0,0,0,.06);overflow:hidden}
.card-header{padding:20px 25px;border-bottom:1px solid #eee}
table{width:100%;border-collapse:collapse}th{background:#f9fafb;text-align:left;padding:15px}
td{padding:16px;border-bottom:1px solid #eee}
.actions{display:flex;gap:8px}.badge{background:#eff6ff;color:#2563eb;padding:6px 10px;border-radius:20px}
.empty{text-align:center;padding:60px;color:#6b7280}
.alert{padding:14px;margin-bottom:20px;border-radius:8px;background:#ecfdf5;color:#047857}
</style>
</head>
<body>

<header class="topbar">
    <div class="brand">Gestion Universitaire</div>
</header>

<main class="container">

<div class="header">
    <div>
        <h1>Formations</h1>
        <div class="subtitle">Gestion des formations universitaires</div>
    </div>

    <a href="<?= base_url('formations/create') ?>" class="btn primary">
        + Ajouter une formation
    </a>
</div>

<?php if (session()->getFlashdata('success')): ?>
<div class="alert">
    <?= esc(session()->getFlashdata('success')) ?>
</div>
<?php endif; ?>

<div class="card">

<div class="card-header">
    <strong>Liste des formations</strong>
</div>

<table>

<thead>
<tr>
    <th>ID</th>
    <th>Code</th>
    <th>Nom</th>
    <th>Niveau</th>
    <th>Description</th>
    <th>Actions</th>
</tr>
</thead>

<tbody>

<?php if (!empty($formations)): ?>

<?php foreach ($formations as $formation): ?>

<tr>
    <td><?= esc($formation['id']) ?></td>

    <td>
        <span class="badge">
            <?= esc($formation['code']) ?>
        </span>
    </td>

    <td>
        <strong><?= esc($formation['nom']) ?></strong>
    </td>

    <td><?= esc($formation['niveau']) ?></td>

    <td><?= esc($formation['description'] ?? '—') ?></td>

    <td>
        <div class="actions">

            <a
                href="<?= base_url('formations/edit/' . $formation['id']) ?>"
                class="btn edit">
                Modifier
            </a>

            <a
                href="<?= base_url('formations/delete/' . $formation['id']) ?>"
                class="btn delete"
                onclick="return confirm('Voulez-vous vraiment supprimer cette formation ?')">
                Supprimer
            </a>

        </div>
    </td>
</tr>

<?php endforeach; ?>

<?php else: ?>

<tr>
<td colspan="6">
<div class="empty">
    <h3>Aucune formation</h3>
    <p>Aucune formation n'est encore enregistrée.</p>

    <a href="<?= base_url('formations/create') ?>" class="btn primary">
        Ajouter une formation
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