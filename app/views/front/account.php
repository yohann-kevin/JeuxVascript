<?php require_once 'app/views/front/layouts/head.php'; ?>
<?php include_once 'app/views/front/layouts/header.php'; ?>
<?php 
$usersInfo = new \Project\controllers\ControllerFront();
$infos = $usersInfo->displayInfo();
?>
    <main id="account">
        <section id="pageAccount">
            <header id="accountTitle">
                <h3>Bonjour <?= $infos['pseudo']?></h3>
                <h3>Page en production</h3>
            </header>
        </section>
    </main>

<?php include_once 'app/views/front/layouts/footer.php'; ?>