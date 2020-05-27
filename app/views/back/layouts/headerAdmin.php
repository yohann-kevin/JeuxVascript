<body>
    <header id="headerAdmin">
        <!-- logo -->
        <div id="logo">
            <a href="indexAdmin.php?action=admin">
                <img src="app/public/images/logo/admin.png" alt="Jeuxvacsript">
            </a>
        </div>
        <nav id="navAdmin">
            <!-- lien de nav -->
            <ul>
                <li class="fromLeft"><a href="indexAdmin.php?action=admin" class="<?= $page === 'admin' ? 'active' : '' ?>">Admin</a></li>
                <li class="fromLeft"><a href="indexAdmin.php?action=settings" class="<?= $page === 'settings' ? 'active' : '' ?>">Settings</a></li>
                <li class="fromLeft"><a href="indexAdmin.php?action=disconnect">déconnexion</a></li>
            </ul>
        </nav>
    </header>