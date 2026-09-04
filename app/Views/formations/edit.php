<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Modifier une formation</title>
<style>
body{margin:0;font-family:Arial;background:#f5f7fb}
.container{max-width:800px;margin:50px auto;background:white;padding:35px;border-radius:12px;box-shadow:0 4px 15px #ddd}
h1{margin-top:0}label{display:block;font-weight:bold;margin:18px 0 7px}
input,textarea{width:100%;padding:12px;border:1px solid #ddd;border-radius:7px;box-sizing:border-box}
textarea{height:120px}.actions{margin-top:25px}
button,a{padding:12px 18px;border-radius:7px;text-decoration:none;border:0;font-weight:bold}
button{background:#2563eb;color:white}a{background:#eee;color:#333}
</style>
</head>
<body>

<div class="container">

<h1>Modifier la formation</h1>

<form action="<?= base_url('formations/update/' . $formation['id']) ?>" method="post">

<?= csrf_field() ?>

<label>Code</label>
<input
    type="text"
    name="code"
    value="<?= old('code', $formation['code']) ?>"
    required
>

<label>Nom de la formation</label>
<input
    type="text"
    name="nom"
    value="<?= old('nom', $formation['nom']) ?>"
    required
>

<label>Niveau</label>
<input
    type="text"
    name="niveau"
    value="<?= old('niveau', $formation['niveau']) ?>"
    required
>

<label>Description</label>
<textarea name="description"><?= old('description', $formation['description']) ?></textarea>

<div class="actions">
<a href="<?= base_url('formations') ?>">← Annuler</a>
<button type="submit">Enregistrer les modifications</button>
</div>

</form>

</div>
</body>
</html>