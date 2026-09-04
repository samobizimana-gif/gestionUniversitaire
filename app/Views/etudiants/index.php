<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Étudiants | Gestion Universitaire</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        /* =====================================================
           SIDEBAR - MÊME ORGANISATION QUE LE DASHBOARD
        ===================================================== */

        .sidebar {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 255px !important;
            height: 100vh !important;
            min-height: 100vh !important;
            background: var(--sidebar) !important;
            color: white !important;
            padding: 28px 16px !important;
            display: flex !important;
            flex-direction: column !important;
            z-index: 1000 !important;
            overflow-y: auto !important;
        }

        .sidebar .brand {
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
            padding: 0 12px 32px !important;
            flex-shrink: 0 !important;
        }

        .sidebar .brand-icon {
            width: 43px !important;
            height: 43px !important;
            border-radius: 12px !important;
            background: var(--primary) !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            font-size: 19px !important;
            flex-shrink: 0 !important;
        }

        .sidebar .brand h2 {
            font-size: 18px !important;
            font-weight: 700 !important;
            margin: 0 !important;
        }

        .sidebar .brand span {
            color: #9ca3af !important;
            font-size: 12px !important;
        }

        .sidebar .menu {
            position: static !important;
            left: auto !important;
            height: auto !important;
            width: 100% !important;
            display: flex !important;
            flex-direction: column !important;
            gap: 7px !important;
            overflow: visible !important;
            flex-shrink: 0 !important;
        }

        .sidebar .menu-item {
            display: flex !important;
            align-items: center !important;
            gap: 14px !important;
            width: 100% !important;
            padding: 13px 14px !important;
            border-radius: 10px !important;
            color: var(--sidebar-text) !important;
            font-size: 14px !important;
            text-decoration: none !important;
            transition: 0.2s ease !important;
        }

        .sidebar .menu-item i {
            width: 20px !important;
            min-width: 20px !important;
            text-align: center !important;
        }

        .sidebar .menu-item:hover {
            background: rgba(255,255,255,0.06) !important;
            color: white !important;
        }

        .sidebar .menu-item.active {
            background: var(--primary) !important;
            color: white !important;
        }

        .sidebar .sidebar-bottom {
            margin-top: auto !important;
            display: flex !important;
            flex-direction: column !important;
            gap: 7px !important;
            flex-shrink: 0 !important;
        }

        .sidebar .logout:hover {
            color: #f87171 !important;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main {
            margin-left: 255px !important;
            width: calc(100% - 255px) !important;
            min-height: 100vh !important;
        }


        /* =====================================================
           TABLE
        ===================================================== */

        table tr:hover {
            background: #f8fafc;
        }


        /* =====================================================
           MODALE DE SUPPRESSION
        ===================================================== */

        .delete-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.55);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 5000;
            padding: 20px;
        }

        .delete-modal-overlay.active {
            display: flex;
        }

        .delete-modal {
            width: 100%;
            max-width: 430px;
            background: white;
            border-radius: 18px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.20);
            padding: 30px;
            animation: modalAppear 0.2s ease;
        }

        @keyframes modalAppear {

            from {
                opacity: 0;
                transform: translateY(-15px) scale(0.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }

        }

        .delete-modal-icon {
            width: 58px;
            height: 58px;
            border-radius: 16px;
            background: #fff1f2;
            color: #e11d48;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin: 0 auto 20px;
        }

        .delete-modal-content {
            text-align: center;
        }

        .delete-modal-content h2 {
            margin: 0 0 10px;
            font-size: 20px;
            color: var(--text);
        }

        .delete-modal-content p {
            margin: 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .delete-modal-content strong {
            color: var(--text);
        }

        .delete-modal-actions {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 25px;
        }

        .delete-modal-button {
            border: none;
            padding: 11px 18px;
            border-radius: 9px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            transition: 0.2s ease;
        }

        .delete-cancel-button {
            background: #f1f5f9;
            color: #475569;
        }

        .delete-cancel-button:hover {
            background: #e2e8f0;
        }

        .delete-confirm-button {
            background: #e11d48;
            color: white;
        }

        .delete-confirm-button:hover {
            background: #be123c;
            transform: translateY(-1px);
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 800px) {

            .sidebar {
                width: 75px !important;
                padding: 20px 10px !important;
            }

            .sidebar .brand {
                justify-content: center !important;
                padding: 0 0 30px !important;
            }

            .sidebar .brand > div:last-child,
            .sidebar .menu-item span {
                display: none !important;
            }

            .sidebar .menu-item {
                justify-content: center !important;
            }

            .main {
                margin-left: 75px !important;
                width: calc(100% - 75px) !important;
            }

            .delete-modal {
                padding: 25px 20px;
            }

            .delete-modal-actions {
                flex-direction: column-reverse;
            }

            .delete-modal-button {
                width: 100%;
            }

        }

    </style>
</head>

<body>

<div class="app">

    <!-- =====================================================
         SIDEBAR
    ===================================================== -->

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

            <a
                href="<?= base_url('dashboard') ?>"
                class="menu-item"
            >
                <i class="fa-solid fa-chart-pie"></i>
                <span>Tableau de bord</span>
            </a>


            <a
                href="<?= base_url('etudiants') ?>"
                class="menu-item active"
            >
                <i class="fa-solid fa-user-graduate"></i>
                <span>Étudiants</span>
            </a>


            <a
                href="<?= base_url('formations') ?>"
                class="menu-item"
            >
                <i class="fa-solid fa-book-open"></i>
                <span>Formations</span>
            </a>


            <a
                href="<?= base_url('inscriptions') ?>"
                class="menu-item"
            >
                <i class="fa-solid fa-clipboard-list"></i>
                <span>Inscriptions</span>
            </a>

        </nav>


        <div class="sidebar-bottom">

            <a href="#" class="menu-item">

                <i class="fa-solid fa-gear"></i>

                <span>Paramètres</span>

            </a>


            <a
                href="<?= base_url('logout') ?>"
                class="menu-item logout"
            >

                <i class="fa-solid fa-right-from-bracket"></i>

                <span>Déconnexion</span>

            </a>

        </div>

    </aside>


    <!-- =====================================================
         MAIN
    ===================================================== -->

    <main class="main">


        <!-- =================================================
             TOPBAR
        ================================================= -->

        <header class="topbar">

            <div>

                <p class="welcome-small">
                    ESPACE ADMINISTRATION
                </p>

                <h1>
                    Étudiants
                </h1>

            </div>


            <div class="admin-area">

                <div class="notification">

                    <i class="fa-regular fa-bell"></i>

                    <span></span>

                </div>


                <div class="admin-profile">

                    <div class="avatar">
                        A
                    </div>

                    <div class="admin-info">

                        <strong>
                            Administrateur
                        </strong>

                        <small>
                            Administrateur
                        </small>

                    </div>

                    <i class="fa-solid fa-chevron-down arrow"></i>

                </div>

            </div>

        </header>


        <!-- =================================================
             CONTENT
        ================================================= -->

        <section class="content">


            <div class="welcome-card">

                <div>

                    <span class="welcome-label">

                        <i class="fa-solid fa-user-graduate"></i>

                        Gestion des étudiants

                    </span>


                    <h2>
                        Étudiants
                    </h2>


                    <p>
                        Gérez les étudiants enregistrés dans votre établissement universitaire.
                    </p>

                </div>


                <div class="welcome-icon">

                    <i class="fa-solid fa-user-graduate"></i>

                </div>

            </div>


            <!-- =================================================
                 TITRE
            ================================================= -->

            <div class="section-title">

                <div>

                    <h2>
                        Liste des étudiants
                    </h2>

                    <p>
                        <?= count($etudiants) ?> étudiant(s) enregistré(s)
                    </p>

                </div>


                <a
                    href="<?= base_url('etudiants/create') ?>"
                    class="action-card"
                    style="display:inline-flex; width:auto; padding:12px 18px;"
                >

                    <div class="action-icon">

                        <i class="fa-solid fa-user-plus"></i>

                    </div>


                    <div>

                        <h3>
                            Ajouter un étudiant
                        </h3>

                    </div>

                </a>

            </div>


            <!-- =================================================
                 ALERTES
            ================================================= -->

            <?php if (session()->getFlashdata('success')): ?>

                <div
                    style="
                        background:#ecfdf3;
                        color:#15803d;
                        border:1px solid #bbf7d0;
                        padding:14px 18px;
                        border-radius:12px;
                        margin-bottom:20px;
                        display:flex;
                        align-items:center;
                        gap:10px;
                    "
                >

                    <i class="fa-solid fa-circle-check"></i>

                    <?= esc(session()->getFlashdata('success')) ?>

                </div>

            <?php endif; ?>


            <?php if (session()->getFlashdata('error')): ?>

                <div
                    style="
                        background:#fef2f2;
                        color:#dc2626;
                        border:1px solid #fecaca;
                        padding:14px 18px;
                        border-radius:12px;
                        margin-bottom:20px;
                        display:flex;
                        align-items:center;
                        gap:10px;
                    "
                >

                    <i class="fa-solid fa-circle-exclamation"></i>

                    <?= esc(session()->getFlashdata('error')) ?>

                </div>

            <?php endif; ?>


            <!-- =================================================
                 TABLE CARD
            ================================================= -->

            <div
                class="info-card"
                style="padding:0; overflow:hidden;"
            >


                <div
                    style="
                        padding:24px;
                        border-bottom:1px solid var(--border);
                        display:flex;
                        justify-content:space-between;
                        align-items:center;
                        gap:20px;
                    "
                >

                    <div>

                        <div
                            style="
                                display:flex;
                                align-items:center;
                                gap:10px;
                            "
                        >

                            <div
                                class="action-icon"
                                style="width:40px;height:40px;"
                            >

                                <i class="fa-solid fa-users"></i>

                            </div>


                            <div>

                                <h2 style="font-size:17px;">
                                    Liste des étudiants
                                </h2>

                                <p
                                    style="
                                        color:var(--muted);
                                        font-size:12px;
                                        margin-top:3px;
                                    "
                                >
                                    Gestion et administration
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- RECHERCHE -->

                    <div
                        style="
                            position:relative;
                            width:280px;
                        "
                    >

                        <i
                            class="fa-solid fa-magnifying-glass"
                            style="
                                position:absolute;
                                left:14px;
                                top:50%;
                                transform:translateY(-50%);
                                color:#94a3b8;
                                font-size:13px;
                            "
                        ></i>


                        <input
                            type="text"
                            id="search"
                            placeholder="Rechercher un étudiant..."
                            style="
                                width:100%;
                                padding:11px 14px 11px 38px;
                                border:1px solid var(--border);
                                border-radius:9px;
                                outline:none;
                                font-family:inherit;
                                font-size:12px;
                            "
                        >

                    </div>

                </div>


                <!-- =================================================
                     TABLE
                ================================================= -->

                <div style="overflow-x:auto;">

                    <table
                        style="
                            width:100%;
                            border-collapse:collapse;
                        "
                    >

                        <thead>

                            <tr>

                                <th style="
                                    text-align:left;
                                    padding:15px 20px;
                                    background:#f8fafc;
                                    color:var(--muted);
                                    font-size:11px;
                                    font-weight:700;
                                    border-bottom:1px solid var(--border);
                                ">
                                    ID
                                </th>


                                <th style="
                                    text-align:left;
                                    padding:15px 20px;
                                    background:#f8fafc;
                                    color:var(--muted);
                                    font-size:11px;
                                    font-weight:700;
                                    border-bottom:1px solid var(--border);
                                ">
                                    MATRICULE
                                </th>


                                <th style="
                                    text-align:left;
                                    padding:15px 20px;
                                    background:#f8fafc;
                                    color:var(--muted);
                                    font-size:11px;
                                    font-weight:700;
                                    border-bottom:1px solid var(--border);
                                ">
                                    NOM COMPLET
                                </th>


                                <th style="
                                    text-align:left;
                                    padding:15px 20px;
                                    background:#f8fafc;
                                    color:var(--muted);
                                    font-size:11px;
                                    font-weight:700;
                                    border-bottom:1px solid var(--border);
                                ">
                                    SEXE
                                </th>


                                <th style="
                                    text-align:left;
                                    padding:15px 20px;
                                    background:#f8fafc;
                                    color:var(--muted);
                                    font-size:11px;
                                    font-weight:700;
                                    border-bottom:1px solid var(--border);
                                ">
                                    TÉLÉPHONE
                                </th>


                                <th style="
                                    text-align:left;
                                    padding:15px 20px;
                                    background:#f8fafc;
                                    color:var(--muted);
                                    font-size:11px;
                                    font-weight:700;
                                    border-bottom:1px solid var(--border);
                                ">
                                    EMAIL
                                </th>


                                <th style="
                                    text-align:left;
                                    padding:15px 20px;
                                    background:#f8fafc;
                                    color:var(--muted);
                                    font-size:11px;
                                    font-weight:700;
                                    border-bottom:1px solid var(--border);
                                ">
                                    ADRESSE
                                </th>


                                <th style="
                                    text-align:left;
                                    padding:15px 20px;
                                    background:#f8fafc;
                                    color:var(--muted);
                                    font-size:11px;
                                    font-weight:700;
                                    border-bottom:1px solid var(--border);
                                ">
                                    ACTIONS
                                </th>

                            </tr>

                        </thead>


                        <tbody id="studentTable">

                        <?php if (!empty($etudiants)): ?>

                            <?php foreach ($etudiants as $etudiant): ?>

                                <tr style="
                                    border-bottom:1px solid var(--border);
                                ">

                                    <td style="
                                        padding:16px 20px;
                                        font-size:12px;
                                    ">
                                        <?= esc($etudiant['id']) ?>
                                    </td>


                                    <td style="padding:16px 20px;">

                                        <span style="
                                            background:#eff6ff;
                                            color:#2563eb;
                                            padding:6px 10px;
                                            border-radius:7px;
                                            font-size:11px;
                                            font-weight:700;
                                        ">
                                            <?= esc($etudiant['matricule']) ?>
                                        </span>

                                    </td>


                                    <td style="
                                        padding:16px 20px;
                                        font-size:13px;
                                    ">

                                        <strong>

                                            <?= esc($etudiant['nom']) ?>

                                            <?= esc($etudiant['prenom']) ?>

                                        </strong>

                                    </td>


                                    <td style="padding:16px 20px;">

                                        <?php if ($etudiant['sexe'] === 'Masculin'): ?>

                                            <span style="
                                                background:#eff6ff;
                                                color:#2563eb;
                                                padding:6px 10px;
                                                border-radius:20px;
                                                font-size:11px;
                                                font-weight:600;
                                            ">

                                                <i class="fa-solid fa-mars"></i>

                                                Masculin

                                            </span>

                                        <?php else: ?>

                                            <span style="
                                                background:#fdf2f8;
                                                color:#db2777;
                                                padding:6px 10px;
                                                border-radius:20px;
                                                font-size:11px;
                                                font-weight:600;
                                            ">

                                                <i class="fa-solid fa-venus"></i>

                                                Féminin

                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <td style="
                                        padding:16px 20px;
                                        font-size:12px;
                                        color:var(--muted);
                                    ">

                                        <?= !empty($etudiant['telephone'])
                                            ? esc($etudiant['telephone'])
                                            : '—'
                                        ?>

                                    </td>


                                    <td style="
                                        padding:16px 20px;
                                        font-size:12px;
                                        color:var(--muted);
                                    ">

                                        <?= !empty($etudiant['email'])
                                            ? esc($etudiant['email'])
                                            : '—'
                                        ?>

                                    </td>


                                    <td style="
                                        padding:16px 20px;
                                        font-size:12px;
                                        color:var(--muted);
                                    ">

                                        <?= !empty($etudiant['adresse'])
                                            ? esc($etudiant['adresse'])
                                            : '—'
                                        ?>

                                    </td>


                                    <td style="padding:16px 20px;">

                                        <div style="
                                            display:flex;
                                            gap:7px;
                                        ">

                                            <!-- MODIFIER -->

                                            <a
                                                href="<?= base_url('etudiants/edit/' . $etudiant['id']) ?>"
                                                style="
                                                    display:inline-flex;
                                                    align-items:center;
                                                    gap:6px;
                                                    padding:7px 10px;
                                                    border-radius:7px;
                                                    background:#eff6ff;
                                                    color:#2563eb;
                                                    font-size:11px;
                                                    font-weight:600;
                                                    text-decoration:none;
                                                "
                                            >

                                                <i class="fa-solid fa-pen"></i>

                                                Modifier

                                            </a>


                                            <!-- SUPPRIMER -->

                                            <a
                                                href="#"
                                                class="delete-student-button"
                                                data-id="<?= esc($etudiant['id']) ?>"
                                                data-name="<?= esc($etudiant['nom'] . ' ' . $etudiant['prenom']) ?>"
                                                style="
                                                    display:inline-flex;
                                                    align-items:center;
                                                    gap:6px;
                                                    padding:7px 10px;
                                                    border-radius:7px;
                                                    background:#fff1f2;
                                                    color:#e11d48;
                                                    font-size:11px;
                                                    font-weight:600;
                                                    text-decoration:none;
                                                "
                                            >

                                                <i class="fa-solid fa-trash"></i>

                                                Supprimer

                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            <?php endforeach; ?>


                        <?php else: ?>

                            <tr>

                                <td
                                    colspan="8"
                                    style="padding:0;"
                                >

                                    <div style="
                                        text-align:center;
                                        padding:70px 20px;
                                        color:var(--muted);
                                    ">

                                        <div style="
                                            width:70px;
                                            height:70px;
                                            margin:0 auto 20px;
                                            border-radius:20px;
                                            background:#eff6ff;
                                            color:var(--primary);
                                            display:flex;
                                            align-items:center;
                                            justify-content:center;
                                            font-size:28px;
                                        ">

                                            <i class="fa-solid fa-user-graduate"></i>

                                        </div>


                                        <h3 style="
                                            color:var(--text);
                                            font-size:17px;
                                            margin-bottom:7px;
                                        ">
                                            Aucun étudiant
                                        </h3>


                                        <p style="
                                            font-size:12px;
                                            margin-bottom:20px;
                                        ">
                                            Aucun étudiant n'est encore enregistré.
                                        </p>


                                        <a
                                            href="<?= base_url('etudiants/create') ?>"
                                            class="action-card"
                                            style="
                                                display:inline-flex;
                                                width:auto;
                                                padding:11px 16px;
                                            "
                                        >

                                            <div class="action-icon">

                                                <i class="fa-solid fa-user-plus"></i>

                                            </div>


                                            <div>

                                                <h3>
                                                    Ajouter un étudiant
                                                </h3>

                                            </div>

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </section>

    </main>

</div>


<!-- =====================================================
     MODALE DE CONFIRMATION DE SUPPRESSION
===================================================== -->

<div
    id="deleteModal"
    class="delete-modal-overlay"
>

    <div class="delete-modal">

        <div class="delete-modal-icon">

            <i class="fa-solid fa-triangle-exclamation"></i>

        </div>


        <div class="delete-modal-content">

            <h2>
                Confirmer la suppression
            </h2>


            <p>
                Voulez-vous vraiment supprimer l'étudiant
                <strong id="deleteStudentName"></strong> ?
                <br>
                Cette action est irréversible.
            </p>

        </div>


        <div class="delete-modal-actions">

            <button
                type="button"
                id="cancelDelete"
                class="delete-modal-button delete-cancel-button"
            >

                <i class="fa-solid fa-xmark"></i>

                Annuler

            </button>


            <a
                href="#"
                id="confirmDelete"
                class="delete-modal-button delete-confirm-button"
            >

                <i class="fa-solid fa-trash"></i>

                Supprimer

            </a>

        </div>

    </div>

</div>


<!-- =====================================================
     RECHERCHE + MODALE
===================================================== -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    /* =====================================================
       RECHERCHE AUTOMATIQUE
    ===================================================== */

    const search = document.getElementById('search');

    if (search) {

        search.addEventListener('keyup', function () {

            const value = this.value.toLowerCase();

            const rows = document.querySelectorAll('#studentTable tr');

            rows.forEach(function (row) {

                const text = row.textContent.toLowerCase();

                row.style.display =
                    text.includes(value) ? '' : 'none';

            });

        });

    }


    /* =====================================================
       MODALE DE SUPPRESSION
    ===================================================== */

    const deleteModal = document.getElementById('deleteModal');

    const deleteStudentName =
        document.getElementById('deleteStudentName');

    const confirmDelete =
        document.getElementById('confirmDelete');

    const cancelDelete =
        document.getElementById('cancelDelete');

    const deleteButtons =
        document.querySelectorAll('.delete-student-button');


    /* OUVRIR LA MODALE */

    deleteButtons.forEach(function (button) {

        button.addEventListener('click', function (event) {

            event.preventDefault();

            const studentId =
                this.getAttribute('data-id');

            const studentName =
                this.getAttribute('data-name');


            deleteStudentName.textContent =
                studentName;


            confirmDelete.href =
                "<?= base_url('etudiants/delete') ?>/" + studentId;


            deleteModal.classList.add('active');

        });

    });


    /* ANNULER */

    cancelDelete.addEventListener('click', function () {

        deleteModal.classList.remove('active');

        confirmDelete.href = '#';

    });


    /* CLIQUER EN DEHORS DE LA FENÊTRE */

    deleteModal.addEventListener('click', function (event) {

        if (event.target === deleteModal) {

            deleteModal.classList.remove('active');

            confirmDelete.href = '#';

        }

    });


    /* TOUCHE ESC */

    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {

            deleteModal.classList.remove('active');

            confirmDelete.href = '#';

        }

    });

});

</script>

</body>

</html>