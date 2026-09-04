<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscriptions | Gestion Universitaire</title>

    <link
        rel="stylesheet"
        href="<?= base_url('assets/css/dashboard.css') ?>">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        /* =====================================================
           PAGE
        ===================================================== */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-title {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .page-title-icon {
            width: 48px;
            height: 48px;
            border-radius: 13px;
            background: #fff7ed;
            color: #ea580c;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .page-title h2 {
            font-size: 24px;
            margin: 0;
        }

        .page-title p {
            color: var(--muted);
            font-size: 13px;
            margin-top: 4px;
        }

        /* =====================================================
           BUTTON
        ===================================================== */

        .primary-button {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: var(--primary);
            color: white;
            padding: 12px 17px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s ease;
            border: none;
            cursor: pointer;
        }

        .primary-button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        /* =====================================================
           CARD
        ===================================================== */

        .inscription-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .inscription-header {
            padding: 22px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .inscription-header-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .inscription-header-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: #eff6ff;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .inscription-header h3 {
            font-size: 16px;
            margin: 0;
        }

        .inscription-header p {
            color: var(--muted);
            font-size: 11px;
            margin-top: 4px;
        }

        .inscription-header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        /* =====================================================
           SEARCH
        ===================================================== */

        .search-box {
            position: relative;
            width: 280px;
        }

        .search-box i {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 13px;
            pointer-events: none;
        }

        .search-input {
            width: 100%;
            height: 40px;
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 0 14px 0 37px;
            outline: none;
            font-size: 12px;
            color: var(--text);
            background: #f8fafc;
            transition: .2s ease;
        }

        .search-input:focus {
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .08);
        }

        .inscription-count {
            color: var(--muted);
            font-size: 12px;
            white-space: nowrap;
        }

        /* =====================================================
           TABLE
        ===================================================== */

        .inscription-table-wrapper {
            overflow-x: auto;
        }

        .inscription-table {
            width: 100%;
            border-collapse: collapse;
        }

        .inscription-table th {
            text-align: left;
            padding: 15px 20px;
            background: #f8fafc;
            color: var(--muted);
            font-size: 11px;
            font-weight: 700;
            border-bottom: 1px solid var(--border);
        }

        .inscription-table td {
            padding: 17px 20px;
            border-bottom: 1px solid var(--border);
            font-size: 12px;
        }

        .inscription-table tbody tr {
            transition: .15s ease;
        }

        .inscription-table tbody tr:hover {
            background: #f8fafc;
        }

        .inscription-id {
            color: var(--muted);
        }

        .student-name {
            font-weight: 600;
            color: var(--text);
        }

        .student-matricule {
            display: block;
            color: var(--muted);
            font-size: 11px;
            margin-top: 3px;
        }

        .formation-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #eff6ff;
            color: #2563eb;
            padding: 7px 10px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 600;
        }

        .year-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #f5f3ff;
            color: #7c3aed;
            padding: 7px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .date-inscription {
            color: var(--muted);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-active {
            background: #ecfdf3;
            color: #15803d;
        }

        .status-other {
            background: #f1f5f9;
            color: #475569;
        }

        /* =====================================================
           ACTIONS
        ===================================================== */

        .actions {
            display: flex;
            gap: 7px;
        }

        .action-button {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 10px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s ease;
            border: none;
            cursor: pointer;
        }

        .edit-button {
            background: #eff6ff;
            color: #2563eb;
        }

        .edit-button:hover {
            background: #dbeafe;
        }

        .delete-button {
            background: #fff1f2;
            color: #e11d48;
        }

        .delete-button:hover {
            background: #ffe4e6;
        }

        /* =====================================================
           EMPTY
        ===================================================== */

        .empty-state {
            text-align: center;
            padding: 70px 20px;
            color: var(--muted);
        }

        .empty-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            border-radius: 20px;
            background: #eff6ff;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .empty-state h3 {
            color: var(--text);
            font-size: 17px;
            margin-bottom: 7px;
        }

        .empty-state p {
            font-size: 12px;
            margin-bottom: 20px;
        }

        /* =====================================================
           ALERTS
        ===================================================== */

        .alert-success {
            background: #ecfdf3;
            color: #15803d;
            border: 1px solid #bbf7d0;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
        }

        .alert-error {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
        }

        /* =====================================================
           MODAL
        ===================================================== */

        .delete-modal {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .55);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            padding: 20px;
        }

        .delete-modal.show {
            display: flex;
        }

        .delete-modal-content {
            width: 100%;
            max-width: 420px;
            background: white;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 25px 70px rgba(15, 23, 42, .25);
            text-align: center;
            animation: modalShow .18s ease;
        }

        @keyframes modalShow {

            from {
                opacity: 0;
                transform: translateY(10px) scale(.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }

        }

        .delete-modal-icon {
            width: 58px;
            height: 58px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: #fff1f2;
            color: #e11d48;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .delete-modal h3 {
            font-size: 18px;
            color: var(--text);
            margin-bottom: 9px;
        }

        .delete-modal p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .delete-modal-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 24px;
        }

        .modal-cancel {
            border: none;
            background: #f1f5f9;
            color: #475569;
            padding: 11px 18px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .modal-cancel:hover {
            background: #e2e8f0;
        }

        .modal-delete {
            border: none;
            background: #e11d48;
            color: white;
            padding: 11px 18px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .modal-delete:hover {
            background: #be123c;
        }

        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 950px) {

            .inscription-header {
                align-items: flex-start;
            }

            .inscription-header-right {
                flex-direction: column;
                align-items: flex-end;
                gap: 10px;
            }

            .search-box {
                width: 240px;
            }

        }

        @media (max-width: 800px) {

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .inscription-header {
                flex-direction: column;
                align-items: stretch;
            }

            .inscription-header-right {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }

            .search-box {
                width: 100%;
            }

        }

        @media (max-width: 550px) {

            .inscription-header-right {
                flex-direction: column;
                align-items: stretch;
            }

        }

    </style>

</head>


<body>

<div class="app">

    <!-- =====================================================
         SIDEBAR
    ====================================================== -->

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

                <span>
                    Tableau de bord
                </span>

            </a>


            <a href="<?= base_url('etudiants') ?>" class="menu-item">

                <i class="fa-solid fa-user-graduate"></i>

                <span>
                    Étudiants
                </span>

            </a>


            <a href="<?= base_url('formations') ?>" class="menu-item">

                <i class="fa-solid fa-book-open"></i>

                <span>
                    Formations
                </span>

            </a>


            <a href="<?= base_url('inscriptions') ?>" class="menu-item active">

                <i class="fa-solid fa-clipboard-list"></i>

                <span>
                    Inscriptions
                </span>

            </a>

        </nav>


        <div class="sidebar-bottom">

            <a href="#" class="menu-item">

                <i class="fa-solid fa-gear"></i>

                <span>
                    Paramètres
                </span>

            </a>


            <a
                href="<?= base_url('logout') ?>"
                class="menu-item logout">

                <i class="fa-solid fa-right-from-bracket"></i>

                <span>
                    Déconnexion
                </span>

            </a>

        </div>

    </aside>


    <!-- =====================================================
         MAIN
    ====================================================== -->

    <main class="main">


        <header class="topbar">

            <div>

                <p class="welcome-small">
                    ESPACE ADMINISTRATION
                </p>

                <h1>
                    Inscriptions
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
        ================================================== -->

        <section class="content">


            <div class="page-header">

                <div class="page-title">

                    <div class="page-title-icon">

                        <i class="fa-solid fa-clipboard-list"></i>

                    </div>

                    <div>

                        <h2>
                            Inscriptions
                        </h2>

                        <p>
                            Gestion des inscriptions universitaires
                        </p>

                    </div>

                </div>


                <a
                    href="<?= base_url('inscriptions/create') ?>"
                    class="primary-button">

                    <i class="fa-solid fa-plus"></i>

                    Nouvelle inscription

                </a>

            </div>


            <!-- ALERT SUCCESS -->

            <?php if (session()->getFlashdata('success')): ?>

                <div class="alert-success">

                    <i class="fa-solid fa-circle-check"></i>

                    <?= esc(session()->getFlashdata('success')) ?>

                </div>

            <?php endif; ?>


            <!-- ALERT ERROR -->

            <?php if (session()->getFlashdata('error')): ?>

                <div class="alert-error">

                    <i class="fa-solid fa-circle-exclamation"></i>

                    <?= esc(session()->getFlashdata('error')) ?>

                </div>

            <?php endif; ?>


            <!-- =================================================
                 CARD
            ================================================== -->

            <div class="inscription-card">


                <div class="inscription-header">


                    <div class="inscription-header-left">

                        <div class="inscription-header-icon">

                            <i class="fa-solid fa-clipboard-check"></i>

                        </div>

                        <div>

                            <h3>
                                Liste des inscriptions
                            </h3>

                            <p>
                                Inscriptions enregistrées dans l'établissement
                            </p>

                        </div>

                    </div>


                    <div class="inscription-header-right">


                        <!-- RECHERCHE -->

                        <form
                            action="<?= base_url('inscriptions') ?>"
                            method="get"
                            id="inscriptionSearchForm"
                            class="search-box">

                            <i class="fa-solid fa-magnifying-glass"></i>

                            <input
                                type="text"
                                name="q"
                                id="inscriptionSearch"
                                class="search-input"
                                value="<?= esc($search ?? '') ?>"
                                placeholder="Rechercher une inscription..."
                                autocomplete="off">

                        </form>


                        <!-- COMPTE -->

                        <div class="inscription-count">

                            <i class="fa-solid fa-clipboard-list"></i>

                            <?= count($inscriptions) ?> inscription(s)

                        </div>

                    </div>

                </div>


                <!-- =================================================
                     TABLE
                ================================================== -->

                <div class="inscription-table-wrapper">

                    <table class="inscription-table">

                        <thead>

                        <tr>

                            <th>ID</th>

                            <th>ÉTUDIANT</th>

                            <th>FORMATION</th>

                            <th>ANNÉE ACADÉMIQUE</th>

                            <th>DATE</th>

                            <th>STATUT</th>

                            <th>ACTIONS</th>

                        </tr>

                        </thead>


                        <tbody>


                        <?php if (!empty($inscriptions)): ?>


                            <?php foreach ($inscriptions as $inscription): ?>

                                <tr>


                                    <td>

                                        <span class="inscription-id">

                                            #<?= esc($inscription['id']) ?>

                                        </span>

                                    </td>


                                    <td>

                                        <span class="student-name">

                                            <?= esc(
                                                $inscription['nom']
                                                . ' '
                                                . $inscription['prenom']
                                            ) ?>

                                        </span>

                                        <span class="student-matricule">

                                            <?= esc($inscription['matricule']) ?>

                                        </span>

                                    </td>


                                    <td>

                                        <span class="formation-badge">

                                            <i class="fa-solid fa-book-open"></i>

                                            <?= esc($inscription['code']) ?>

                                            -

                                            <?= esc($inscription['formation_nom']) ?>

                                        </span>

                                    </td>


                                    <td>

                                        <span class="year-badge">

                                            <i class="fa-solid fa-calendar"></i>

                                            <?= esc($inscription['annee_academique']) ?>

                                        </span>

                                    </td>


                                    <td>

                                        <span class="date-inscription">

                                            <?= esc($inscription['date_inscription']) ?>

                                        </span>

                                    </td>


                                    <td>

                                        <?php

                                        $statut = strtolower(
                                            trim($inscription['statut'])
                                        );

                                        $isActive = in_array(
                                            $statut,
                                            ['actif', 'active', 'validée', 'validee']
                                        );

                                        ?>

                                        <span class="status-badge <?= $isActive
                                            ? 'status-active'
                                            : 'status-other'
                                        ?>">

                                            <i class="fa-solid fa-circle"></i>

                                            <?= esc($inscription['statut']) ?>

                                        </span>

                                    </td>


                                    <td>

                                        <div class="actions">


                                            <!-- MODIFIER -->

                                            <a
                                                href="<?= base_url('inscriptions/edit/' . $inscription['id']) ?>"
                                                class="action-button edit-button">

                                                <i class="fa-solid fa-pen"></i>

                                                Modifier

                                            </a>


                                            <!-- SUPPRIMER -->

                                            <button
                                                type="button"
                                                class="action-button delete-button"
                                                onclick="openDeleteModal(
                                                    '<?= base_url('inscriptions/delete/' . $inscription['id']) ?>',
                                                    '<?= esc(
                                                        $inscription['nom']
                                                        . ' '
                                                        . $inscription['prenom'],
                                                        'js'
                                                    ) ?>'
                                                )">

                                                <i class="fa-solid fa-trash"></i>

                                                Supprimer

                                            </button>

                                        </div>

                                    </td>

                                </tr>

                            <?php endforeach; ?>


                        <?php else: ?>


                            <tr>

                                <td colspan="7">

                                    <div class="empty-state">

                                        <div class="empty-icon">

                                            <i class="fa-solid fa-clipboard-list"></i>

                                        </div>


                                        <h3>

                                            <?= !empty($search)
                                                ? 'Aucun résultat'
                                                : 'Aucune inscription'
                                            ?>

                                        </h3>


                                        <p>

                                            <?= !empty($search)
                                                ? 'Aucune inscription ne correspond à votre recherche.'
                                                : 'Aucune inscription n\'est encore enregistrée.'
                                            ?>

                                        </p>


                                        <?php if (!empty($search)): ?>

                                            <a
                                                href="<?= base_url('inscriptions') ?>"
                                                class="primary-button">

                                                <i class="fa-solid fa-rotate-left"></i>

                                                Réinitialiser

                                            </a>

                                        <?php else: ?>

                                            <a
                                                href="<?= base_url('inscriptions/create') ?>"
                                                class="primary-button">

                                                <i class="fa-solid fa-plus"></i>

                                                Nouvelle inscription

                                            </a>

                                        <?php endif; ?>

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
     MODAL SUPPRESSION
====================================================== -->

<div
    class="delete-modal"
    id="deleteModal">

    <div class="delete-modal-content">

        <div class="delete-modal-icon">

            <i class="fa-solid fa-trash"></i>

        </div>


        <h3>
            Confirmer la suppression
        </h3>


        <p>

            Voulez-vous vraiment supprimer cette inscription ?

            <br>

            <strong id="deleteInscriptionName"></strong>

        </p>


        <div class="delete-modal-buttons">

            <button
                type="button"
                class="modal-cancel"
                onclick="closeDeleteModal()">

                Annuler

            </button>


            <button
                type="button"
                class="modal-delete"
                id="confirmDeleteButton">

                <i class="fa-solid fa-trash"></i>

                Supprimer

            </button>

        </div>

    </div>

</div>


<script>

    /* =====================================================
       RECHERCHE AUTOMATIQUE
    ===================================================== */

    const inscriptionSearch =
        document.getElementById('inscriptionSearch');

    const inscriptionSearchForm =
        document.getElementById('inscriptionSearchForm');

    let searchTimer;

    if (inscriptionSearch) {

        inscriptionSearch.addEventListener('input', function () {

            clearTimeout(searchTimer);

            searchTimer = setTimeout(function () {

                inscriptionSearchForm.submit();

            }, 350);

        });

    }


    /* =====================================================
       MODAL SUPPRESSION
    ===================================================== */

    const deleteModal =
        document.getElementById('deleteModal');

    const confirmDeleteButton =
        document.getElementById('confirmDeleteButton');

    const deleteInscriptionName =
        document.getElementById('deleteInscriptionName');

    let deleteUrl = '';


    function openDeleteModal(url, name) {

        deleteUrl = url;

        deleteInscriptionName.textContent = name;

        deleteModal.classList.add('show');

    }


    function closeDeleteModal() {

        deleteModal.classList.remove('show');

        deleteUrl = '';

    }


    confirmDeleteButton.addEventListener('click', function () {

        if (deleteUrl !== '') {

            window.location.href = deleteUrl;

        }

    });


    deleteModal.addEventListener('click', function (event) {

        if (event.target === deleteModal) {

            closeDeleteModal();

        }

    });


    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {

            closeDeleteModal();

        }

    });

</script>

</body>

</html>