<?php
$currentPage = service('uri')->getSegment(1);
?>

<aside class="sidebar">

    <div class="sidebar-brand">
        <i class="fa-solid fa-graduation-cap"></i>
        <span>Gestion Universitaire</span>
    </div>

    <nav class="sidebar-menu">

        <a href="<?= base_url('dashboard') ?>"
           class="sidebar-item <?= $currentPage === 'dashboard' ? 'active' : '' ?>">
            <i class="fa-solid fa-chart-pie"></i>
            <span>Tableau de bord</span>
        </a>

        <a href="<?= base_url('etudiants') ?>"
           class="sidebar-item <?= $currentPage === 'etudiants' ? 'active' : '' ?>">
            <i class="fa-solid fa-user-graduate"></i>
            <span>Étudiants</span>
        </a>

        <a href="<?= base_url('formations') ?>"
           class="sidebar-item <?= $currentPage === 'formations' ? 'active' : '' ?>">
            <i class="fa-solid fa-book-open"></i>
            <span>Formations</span>
        </a>

        <a href="<?= base_url('inscriptions') ?>"
           class="sidebar-item <?= $currentPage === 'inscriptions' ? 'active' : '' ?>">
            <i class="fa-solid fa-clipboard-list"></i>
            <span>Inscriptions</span>
        </a>

    </nav>

</aside>