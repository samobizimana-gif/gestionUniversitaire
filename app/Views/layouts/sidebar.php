<?php
$currentPage = service('uri')->getSegment(1);
?>

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
            class="menu-item <?= $currentPage === 'dashboard' ? 'active' : '' ?>"
        >
            <i class="fa-solid fa-chart-pie"></i>
            <span>Tableau de bord</span>
        </a>


        <a
            href="<?= base_url('etudiants') ?>"
            class="menu-item <?= $currentPage === 'etudiants' ? 'active' : '' ?>"
        >
            <i class="fa-solid fa-user-graduate"></i>
            <span>Étudiants</span>
        </a>


        <a
            href="<?= base_url('formations') ?>"
            class="menu-item <?= $currentPage === 'formations' ? 'active' : '' ?>"
        >
            <i class="fa-solid fa-book-open"></i>
            <span>Formations</span>
        </a>


        <a
            href="<?= base_url('inscriptions') ?>"
            class="menu-item <?= $currentPage === 'inscriptions' ? 'active' : '' ?>"
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