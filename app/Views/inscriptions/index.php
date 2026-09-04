<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscriptions | Gestion Universitaire</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

    <div class="app">

        <!-- =========================
         SIDEBAR
    ========================== -->

        <aside class="sidebar">

            <div class="brand">

                <div class="brand-icon">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>

                <div>
                    <h2>Gestion</h2>
                    <span>Universitaire</span>
                </div>

            </div>


            <nav class="menu">

                <!-- TABLEAU DE BORD -->
                <a
                    href="<?= base_url('dashboard') ?>"
                    class="menu-item">
                    <i class="fa-solid fa-chart-pie"></i>
                    <span>Tableau de bord</span>
                </a>


                <!-- ETUDIANTS -->
                <a
                    href="<?= base_url('etudiants') ?>"
                    class="menu-item">
                    <i class="fa-solid fa-user-graduate"></i>
                    <span>Étudiants</span>
                </a>


                <!-- FORMATIONS -->
                <a
                    href="<?= base_url('formations') ?>"
                    class="menu-item">
                    <i class="fa-solid fa-book-open"></i>
                    <span>Formations</span>
                </a>


                <!-- INSCRIPTIONS -->
                <a
                    href="<?= base_url('inscriptions') ?>"
                    class="menu-item active">
                    <i class="fa-solid fa-clipboard-list"></i>
                    <span>Inscriptions</span>
                </a>

            </nav>


            <!-- =========================
             SIDEBAR BOTTOM
        ========================== -->

            <div class="sidebar-bottom">

                <a href="#" class="menu-item">

                    <i class="fa-solid fa-gear"></i>

                    <span>Paramètres</span>

                </a>


                <a
                    href="<?= base_url('logout') ?>"
                    class="menu-item logout">

                    <i class="fa-solid fa-right-from-bracket"></i>

                    <span>Déconnexion</span>

                </a>

            </div>

        </aside>



        <!-- =========================
         MAIN
    ========================== -->

        <main class="main">


            <!-- =========================
             TOPBAR
        ========================== -->
            <aside class="sidebar">

                <div class="brand">

                    <div class="brand-icon">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>

                    <div>
                        <h2>Gestion</h2>
                        <span>Universitaire</span>
                    </div>

                </div>

                <nav class="menu">

                    <a href="<?= base_url('dashboard') ?>" class="menu-item">
                        <i class="fa-solid fa-chart-pie"></i>
                        <span>Tableau de bord</span>
                    </a>

                    <a href="<?= base_url('etudiants') ?>" class="menu-item">
                        <i class="fa-solid fa-user-graduate"></i>
                        <span>Étudiants</span>
                    </a>

                    <a href="<?= base_url('formations') ?>" class="menu-item">
                        <i class="fa-solid fa-book-open"></i>
                        <span>Formations</span>
                    </a>

                    <a href="<?= base_url('inscriptions') ?>" class="menu-item active">
                        <i class="fa-solid fa-clipboard-list"></i>
                        <span>Inscriptions</span>
                    </a>

                </nav>

                <div class="sidebar-bottom">

                    <a href="#" class="menu-item">
                        <i class="fa-solid fa-gear"></i>
                        <span>Paramètres</span>
                    </a>

                    <a href="<?= base_url('logout') ?>" class="menu-item logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Déconnexion</span>
                    </a>

                </div>

            </aside>


            <!-- =========================
             CONTENT
        ========================== -->

            <section class="content">


                <!-- =========================
                 HEADER PAGE
            ========================== -->

                <div class="section-title" style="margin-top: 0;">

                    <div>

                        <h2>
                            Gestion des inscriptions
                        </h2>

                        <p>
                            Gestion des inscriptions universitaires
                        </p>

                    </div>


                    <a
                        href="<?= base_url('inscriptions/create') ?>"
                        class="action-card"
                        style="
                        display:inline-flex;
                        width:auto;
                        padding:12px 18px;
                        background:#2563eb;
                        color:white;
                        border:none;
                    ">

                        <i class="fa-solid fa-plus"></i>

                        <span style="font-weight:600;">
                            Nouvelle inscription
                        </span>

                    </a>

                </div>



                <!-- =========================
                 MESSAGE SUCCESS
            ========================== -->

                <?php if (session()->getFlashdata('success')): ?>

                    <div
                        class="alert success"
                        style="
                        background:#ecfdf5;
                        color:#047857;
                        padding:14px 18px;
                        border-radius:10px;
                        margin-bottom:20px;
                    ">

                        <i class="fa-solid fa-circle-check"></i>

                        <?= esc(session()->getFlashdata('success')) ?>

                    </div>

                <?php endif; ?>



                <!-- =========================
                 MESSAGE ERROR
            ========================== -->

                <?php if (session()->getFlashdata('error')): ?>

                    <div
                        class="alert error"
                        style="
                        background:#fef2f2;
                        color:#b91c1c;
                        padding:14px 18px;
                        border-radius:10px;
                        margin-bottom:20px;
                    ">

                        <i class="fa-solid fa-circle-exclamation"></i>

                        <?= esc(session()->getFlashdata('error')) ?>

                    </div>

                <?php endif; ?>



                <!-- =========================
                 TABLE CARD
            ========================== -->

                <div
                    class="info-card"
                    style="
                    padding:0;
                    overflow:hidden;
                ">


                    <!-- =========================
                     CARD HEADER
                ========================== -->

                    <div
                        style="
                        padding:24px;
                        border-bottom:1px solid #e7ebf2;
                        display:flex;
                        justify-content:space-between;
                        align-items:center;
                    ">

                        <div>

                            <h2 style="font-size:18px;">
                                Liste des inscriptions
                            </h2>

                            <p
                                style="
                                color:#718096;
                                font-size:12px;
                                margin-top:5px;
                            ">
                                Inscriptions enregistrées dans le système
                            </p>

                        </div>


                        <div
                            style="
                            width:45px;
                            height:45px;
                            border-radius:12px;
                            background:#fff7ed;
                            color:#ea580c;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                        ">

                            <i class="fa-solid fa-clipboard-check"></i>

                        </div>

                    </div>



                    <!-- =========================
                     TABLE
                ========================== -->

                    <div style="overflow-x:auto;">

                        <table
                            style="
                            width:100%;
                            border-collapse:collapse;
                        ">

                            <thead>

                                <tr>

                                    <th
                                        style="
                                        padding:15px 20px;
                                        text-align:left;
                                        background:#f9fafb;
                                    ">
                                        ID
                                    </th>

                                    <th
                                        style="
                                        padding:15px 20px;
                                        text-align:left;
                                        background:#f9fafb;
                                    ">
                                        Étudiant
                                    </th>

                                    <th
                                        style="
                                        padding:15px 20px;
                                        text-align:left;
                                        background:#f9fafb;
                                    ">
                                        Formation
                                    </th>

                                    <th
                                        style="
                                        padding:15px 20px;
                                        text-align:left;
                                        background:#f9fafb;
                                    ">
                                        Année académique
                                    </th>

                                    <th
                                        style="
                                        padding:15px 20px;
                                        text-align:left;
                                        background:#f9fafb;
                                    ">
                                        Date
                                    </th>

                                    <th
                                        style="
                                        padding:15px 20px;
                                        text-align:left;
                                        background:#f9fafb;
                                    ">
                                        Statut
                                    </th>

                                    <th
                                        style="
                                        padding:15px 20px;
                                        text-align:left;
                                        background:#f9fafb;
                                    ">
                                        Actions
                                    </th>

                                </tr>

                            </thead>



                            <tbody>


                                <?php if (!empty($inscriptions)): ?>


                                    <?php foreach ($inscriptions as $inscription): ?>


                                        <tr
                                            style="
                                        border-bottom:1px solid #f0f0f0;
                                    ">


                                            <!-- ID -->

                                            <td
                                                style="
                                            padding:17px 20px;
                                        ">

                                                <?= esc($inscription['id']) ?>

                                            </td>



                                            <!-- ETUDIANT -->

                                            <td
                                                style="
                                            padding:17px 20px;
                                        ">

                                                <strong>

                                                    <?= esc($inscription['nom']) ?>

                                                    <?= esc($inscription['prenom']) ?>

                                                </strong>

                                                <br>

                                                <small
                                                    style="
                                                color:#718096;
                                            ">

                                                    <?= esc($inscription['matricule']) ?>

                                                </small>

                                            </td>



                                            <!-- FORMATION -->

                                            <td
                                                style="
                                            padding:17px 20px;
                                        ">

                                                <strong>

                                                    <?= esc($inscription['formation_nom']) ?>

                                                </strong>

                                                <br>

                                                <small
                                                    style="
                                                color:#718096;
                                            ">

                                                    <?= esc($inscription['code']) ?>

                                                </small>

                                            </td>



                                            <!-- ANNEE -->

                                            <td
                                                style="
                                            padding:17px 20px;
                                        ">

                                                <?= esc($inscription['annee_academique']) ?>

                                            </td>



                                            <!-- DATE -->

                                            <td
                                                style="
                                            padding:17px 20px;
                                        ">

                                                <?= esc($inscription['date_inscription']) ?>

                                            </td>



                                            <!-- STATUT -->

                                            <td
                                                style="
                                            padding:17px 20px;
                                        ">

                                                <span
                                                    style="
                                                display:inline-block;
                                                padding:6px 10px;
                                                border-radius:20px;
                                                background:#ecfdf5;
                                                color:#047857;
                                                font-size:12px;
                                                font-weight:600;
                                            ">

                                                    <?= esc($inscription['statut']) ?>

                                                </span>

                                            </td>



                                            <!-- ACTIONS -->

                                            <td
                                                style="
                                            padding:17px 20px;
                                        ">

                                                <div
                                                    style="
                                                display:flex;
                                                gap:8px;
                                            ">


                                                    <!-- MODIFIER -->

                                                    <a
                                                        href="<?= base_url('inscriptions/edit/' . $inscription['id']) ?>"
                                                        style="
                                                    display:inline-flex;
                                                    align-items:center;
                                                    gap:6px;
                                                    padding:8px 11px;
                                                    border-radius:7px;
                                                    background:#eff6ff;
                                                    color:#2563eb;
                                                    text-decoration:none;
                                                    font-size:12px;
                                                    font-weight:600;
                                                ">

                                                        <i class="fa-solid fa-pen"></i>

                                                        Modifier

                                                    </a>



                                                    <!-- SUPPRIMER -->

                                                    <a
                                                        href="<?= base_url('inscriptions/delete/' . $inscription['id']) ?>"
                                                        style="
                                                    display:inline-flex;
                                                    align-items:center;
                                                    gap:6px;
                                                    padding:8px 11px;
                                                    border-radius:7px;
                                                    background:#fef2f2;
                                                    color:#dc2626;
                                                    text-decoration:none;
                                                    font-size:12px;
                                                    font-weight:600;
                                                "
                                                        onclick="return confirm('Voulez-vous vraiment supprimer cette inscription ?')">

                                                        <i class="fa-solid fa-trash"></i>

                                                        Supprimer

                                                    </a>

                                                </div>

                                            </td>


                                        </tr>


                                    <?php endforeach; ?>


                                <?php else: ?>


                                    <!-- =========================
                                 AUCUNE INSCRIPTION
                            ========================== -->

                                    <tr>

                                        <td
                                            colspan="7"
                                            style="padding:0;">

                                            <div
                                                style="
                                            text-align:center;
                                            padding:70px 20px;
                                            color:#718096;
                                        ">

                                                <div
                                                    style="
                                                width:70px;
                                                height:70px;
                                                margin:0 auto 20px;
                                                border-radius:18px;
                                                background:#fff7ed;
                                                color:#ea580c;
                                                display:flex;
                                                align-items:center;
                                                justify-content:center;
                                                font-size:28px;
                                            ">

                                                    <i class="fa-solid fa-clipboard-list"></i>

                                                </div>


                                                <h3
                                                    style="
                                                color:#172033;
                                                margin-bottom:8px;
                                            ">
                                                    Aucune inscription
                                                </h3>


                                                <p
                                                    style="
                                                margin-bottom:20px;
                                            ">
                                                    Aucune inscription n'est encore enregistrée.
                                                </p>


                                                <a
                                                    href="<?= base_url('inscriptions/create') ?>"
                                                    style="
                                                display:inline-flex;
                                                align-items:center;
                                                gap:8px;
                                                padding:11px 16px;
                                                border-radius:9px;
                                                background:#2563eb;
                                                color:white;
                                                text-decoration:none;
                                                font-weight:600;
                                                font-size:13px;
                                            ">

                                                    <i class="fa-solid fa-plus"></i>

                                                    Créer une inscription

                                                </a>

                                            </div>

                                        </td>

                                    </tr>


                                <?php endif; ?>


                            </tbody>

                        </table>

                    </div>


            </section>

        </main>

    </div>

</body>

</html>