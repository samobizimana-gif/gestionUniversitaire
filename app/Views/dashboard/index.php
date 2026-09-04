<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | GestionUniversitaire</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

    <div class="app">

        <!-- SIDEBAR -->
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

                <a href="<?= base_url('dashboard') ?>" class="menu-item active">
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


        <!-- MAIN -->
        <main class="main">

            <!-- HEADER -->
            <header class="topbar">

                <div>
                    <p class="welcome-small">ESPACE ADMINISTRATION</p>
                    <h1>Tableau de bord</h1>
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
                            <strong>Administrateur</strong>
                            <small>Administrateur</small>
                        </div>

                        <i class="fa-solid fa-chevron-down arrow"></i>

                    </div>

                </div>

            </header>


            <!-- CONTENT -->
            <section class="content">

                <div class="welcome-card">

                    <div>
                        <span class="welcome-label">Bienvenue 👋</span>

                        <h2>
                            Bonjour, Admin
                        </h2>

                        <p>
                            Voici un aperçu de la gestion de votre établissement
                            universitaire.
                        </p>
                    </div>

                    <div class="welcome-icon">
                        <i class="fa-solid fa-building-columns"></i>
                    </div>

                </div>


                <!-- STATISTICS -->
                <div class="section-title">
                    <div>
                        <h2>Vue d'ensemble</h2>
                        <p>Statistiques générales de l'établissement</p>
                    </div>
                </div>


                <div class="statistics">

                    <!-- ETUDIANTS -->
                    <div class="stat-card">

                        <div class="stat-top">
                            <div class="stat-icon students">
                                <i class="fa-solid fa-user-graduate"></i>
                            </div>

                            <span class="stat-status">
                                <i class="fa-solid fa-circle"></i>
                                Actif
                            </span>
                        </div>

                        <div class="stat-content">

                            <span class="stat-label">
                                Étudiants
                            </span>

                            <strong>
                                <?= $nombreEtudiants ?>
                            </strong>

                            <p>
                                Étudiants enregistrés
                            </p>

                        </div>

                    </div>


                    <!-- FORMATIONS -->
                    <div class="stat-card">

                        <div class="stat-top">
                            <div class="stat-icon formations">
                                <i class="fa-solid fa-book-open"></i>
                            </div>

                            <span class="stat-status">
                                <i class="fa-solid fa-circle"></i>
                                Actif
                            </span>
                        </div>

                        <div class="stat-content">

                            <span class="stat-label">
                                Formations
                            </span>

                            <strong>
                                <?= $nombreFormations ?>
                            </strong>

                            <p>
                                Formations disponibles
                            </p>

                        </div>

                    </div>


                    <!-- INSCRIPTIONS -->
                    <div class="stat-card">

                        <div class="stat-top">
                            <div class="stat-icon inscriptions">
                                <i class="fa-solid fa-clipboard-check"></i>
                            </div>

                            <span class="stat-status">
                                <i class="fa-solid fa-circle"></i>
                                Actif
                            </span>
                        </div>

                        <div class="stat-content">

                            <span class="stat-label">
                                Inscriptions
                            </span>

                            <strong>
                                <?= $nombreInscriptions ?>
                            </strong>

                            <p>
                                Inscriptions enregistrées
                            </p>

                        </div>

                    </div>

                </div>


                <!-- QUICK ACTIONS -->
                <div class="section-title actions-title">

                    <div>
                        <h2>Actions rapides</h2>
                        <p>Accédez rapidement aux fonctionnalités principales</p>
                    </div>

                </div>


                <div class="quick-actions">

                    <a href="<?= base_url('etudiants/create') ?>" class="action-card">

                        <div class="action-icon">
                            <i class="fa-solid fa-user-plus"></i>
                        </div>

                        <div>
                            <h3>Ajouter un étudiant</h3>
                            <p>Enregistrer un nouvel étudiant</p>
                        </div>

                        <i class="fa-solid fa-arrow-right action-arrow"></i>

                    </a>


                    <a href="<?= base_url('formations/create') ?>" class="action-card">

                        <div class="action-icon">
                            <i class="fa-solid fa-book-medical"></i>
                        </div>

                        <div>
                            <h3>Ajouter une formation</h3>
                            <p>Créer une nouvelle formation</p>
                        </div>

                        <i class="fa-solid fa-arrow-right action-arrow"></i>

                    </a>


                    <a href="<?= base_url('inscriptions/create') ?>" class="action-card">

                        <div class="action-icon">
                            <i class="fa-solid fa-file-circle-plus"></i>
                        </div>

                        <div>
                            <h3>Nouvelle inscription</h3>
                            <p>Enregistrer une inscription</p>
                        </div>

                        <i class="fa-solid fa-arrow-right action-arrow"></i>

                    </a>

                </div>


                <!-- SYSTEM INFO -->
                <div class="bottom-grid">

                    <div class="info-card">

                        <div class="info-header">
                            <div>
                                <h2>État du système</h2>
                                <p>Informations générales</p>
                            </div>

                            <i class="fa-solid fa-server"></i>
                        </div>

                        <div class="system-row">

                            <div class="system-left">
                                <span class="system-dot"></span>

                                <div>
                                    <strong>Base de données</strong>
                                    <small>Connexion opérationnelle</small>
                                </div>
                            </div>

                            <span class="online">
                                Opérationnelle
                            </span>

                        </div>

                        <div class="system-row">

                            <div class="system-left">
                                <span class="system-dot"></span>

                                <div>
                                    <strong>Application</strong>
                                    <small>CodeIgniter</small>
                                </div>
                            </div>

                            <span class="online">
                                En ligne
                            </span>

                        </div>

                    </div>


                    <div class="info-card">

                        <div class="info-header">
                            <div>
                                <h2>Compte administrateur</h2>
                                <p>Session actuelle</p>
                            </div>

                            <i class="fa-solid fa-shield-halved"></i>
                        </div>

                        <div class="account">

                            <div class="large-avatar">
                                A
                            </div>

                            <div>
                                <strong>Administrateur</strong>
                                <p>Compte administrateur</p>
                            </div>

                        </div>

                        <a href="<?= base_url('logout') ?>" class="logout-button">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Se déconnecter
                        </a>

                    </div>

                </div>

            </section>

        </main>

    </div>

</body>

</html>