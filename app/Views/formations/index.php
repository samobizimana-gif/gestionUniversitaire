<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Formations | Gestion Universitaire</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* =====================================================
           FORMATIONS
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
            background: #ecfdf3;
            color: #16a34a;
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
        }

        .primary-button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .formation-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .formation-header {
            padding: 22px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .formation-header-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .formation-header-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: #eff6ff;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .formation-header h3 {
            font-size: 16px;
            margin: 0;
        }

        .formation-header p {
            color: var(--muted);
            font-size: 11px;
            margin-top: 4px;
        }

        .formation-count {
            color: var(--muted);
            font-size: 12px;
        }

        .formation-table-wrapper {
            overflow-x: auto;
        }

        .formation-table {
            width: 100%;
            border-collapse: collapse;
        }

        .formation-table th {
            text-align: left;
            padding: 15px 20px;
            background: #f8fafc;
            color: var(--muted);
            font-size: 11px;
            font-weight: 700;
            border-bottom: 1px solid var(--border);
        }

        .formation-table td {
            padding: 17px 20px;
            border-bottom: 1px solid var(--border);
            font-size: 12px;
        }

        .formation-table tbody tr {
            transition: .15s ease;
        }

        .formation-table tbody tr:hover {
            background: #f8fafc;
        }

        .formation-id {
            color: var(--muted);
            font-size: 12px;
        }

        .code-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #eff6ff;
            color: #2563eb;
            padding: 7px 10px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 700;
        }

        .formation-name {
            font-weight: 600;
            color: var(--text);
            font-size: 13px;
        }

        .level-badge {
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

        .description {
            color: var(--muted);
            max-width: 300px;
            line-height: 1.5;
        }

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

        @media (max-width: 800px) {

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .formation-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

        }
    </style>

</head>


<body>

    <div class="app">


        <!-- =====================================================
         SIDEBAR
         MÊME SIDEBAR QUE ETUDIANTS/INDEX.PHP
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
                    <span>Tableau de bord</span>
                </a>

                <a href="<?= base_url('etudiants') ?>" class="menu-item">
                    <i class="fa-solid fa-user-graduate"></i>
                    <span>Étudiants</span>
                </a>

                <a href="<?= base_url('formations') ?>" class="menu-item active">
                    <i class="fa-solid fa-book-open"></i>
                    <span>Formations</span>
                </a>

                <a href="<?= base_url('inscriptions') ?>" class="menu-item">
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



        <!-- =====================================================
         MAIN
    ====================================================== -->

        <main class="main">


            <!-- =================================================
             TOPBAR
        ================================================== -->

            <header class="topbar">

                <div>

                    <p class="welcome-small">
                        ESPACE ADMINISTRATION
                    </p>

                    <h1>
                        Formations
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


                <!-- PAGE HEADER -->

                <div class="page-header">

                    <div class="page-title">

                        <div class="page-title-icon">

                            <i class="fa-solid fa-book-open"></i>

                        </div>

                        <div>

                            <h2>
                                Formations
                            </h2>

                            <p>
                                Gestion des formations universitaires
                            </p>

                        </div>

                    </div>


                    <a
                        href="<?= base_url('formations/create') ?>"
                        class="primary-button">

                        <i class="fa-solid fa-plus"></i>

                        Ajouter une formation

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
                 TABLE
            ================================================== -->

                <div class="formation-card">


                    <!-- TABLE HEADER -->

                    <div class="formation-header">

                        <div class="formation-header-left">

                            <div class="formation-header-icon">

                                <i class="fa-solid fa-layer-group"></i>

                            </div>

                            <div>

                                <h3>
                                    Liste des formations
                                </h3>

                                <p>
                                    Formations disponibles dans l'établissement
                                </p>

                            </div>

                        </div>


                        <div class="formation-count">

                            <i class="fa-solid fa-book"></i>

                            <?= count($formations) ?> formation(s)

                        </div>

                    </div>



                    <!-- TABLE -->

                    <div class="formation-table-wrapper">

                        <table class="formation-table">

                            <thead>

                                <tr>

                                    <th>
                                        ID
                                    </th>

                                    <th>
                                        CODE
                                    </th>

                                    <th>
                                        NOM
                                    </th>

                                    <th>
                                        NIVEAU
                                    </th>

                                    <th>
                                        DESCRIPTION
                                    </th>

                                    <th>
                                        ACTIONS
                                    </th>

                                </tr>

                            </thead>


                            <tbody>


                                <?php if (!empty($formations)): ?>


                                    <?php foreach ($formations as $formation): ?>

                                        <tr>


                                            <!-- ID -->

                                            <td>

                                                <span class="formation-id">

                                                    #<?= esc($formation['id']) ?>

                                                </span>

                                            </td>



                                            <!-- CODE -->

                                            <td>

                                                <span class="code-badge">

                                                    <i class="fa-solid fa-hashtag"></i>

                                                    <?= esc($formation['code']) ?>

                                                </span>

                                            </td>



                                            <!-- NOM -->

                                            <td>

                                                <span class="formation-name">

                                                    <?= esc($formation['nom']) ?>

                                                </span>

                                            </td>



                                            <!-- NIVEAU -->

                                            <td>

                                                <span class="level-badge">

                                                    <i class="fa-solid fa-graduation-cap"></i>

                                                    <?= esc($formation['niveau']) ?>

                                                </span>

                                            </td>



                                            <!-- DESCRIPTION -->

                                            <td>

                                                <div class="description">

                                                    <?= !empty($formation['description'])
                                                        ? esc($formation['description'])
                                                        : '—'
                                                    ?>

                                                </div>

                                            </td>



                                            <!-- ACTIONS -->

                                            <td>

                                                <div class="actions">

                                                    <!-- MODIFIER -->

                                                    <a
                                                        href="<?= base_url('formations/edit/' . $formation['id']) ?>"
                                                        class="action-button edit-button">

                                                        <i class="fa-solid fa-pen"></i>

                                                        Modifier

                                                    </a>



                                                    <!-- SUPPRIMER -->

                                                    <a
                                                        href="<?= base_url('formations/delete/' . $formation['id']) ?>"
                                                        class="action-button delete-button"
                                                        onclick="return confirm('Voulez-vous vraiment supprimer cette formation ?')">

                                                        <i class="fa-solid fa-trash"></i>

                                                        Supprimer

                                                    </a>

                                                </div>

                                            </td>

                                        </tr>

                                    <?php endforeach; ?>


                                <?php else: ?>


                                    <!-- AUCUNE FORMATION -->

                                    <tr>

                                        <td colspan="6">

                                            <div class="empty-state">

                                                <div class="empty-icon">

                                                    <i class="fa-solid fa-book-open"></i>

                                                </div>


                                                <h3>
                                                    Aucune formation
                                                </h3>


                                                <p>
                                                    Aucune formation n'est encore enregistrée.
                                                </p>


                                                <a
                                                    href="<?= base_url('formations/create') ?>"
                                                    class="primary-button">

                                                    <i class="fa-solid fa-plus"></i>

                                                    Ajouter une formation

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

</body>

</html>