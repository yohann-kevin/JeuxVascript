<?php 
$page = ""; 
$title = "Account";
$description = "Accèder à votre compte afin de profiter de toute les fonctionnalité de JeuxVascript";
?>
<?php require_once 'app/views/front/layouts/head.php'; ?>
<?php include_once 'app/views/front/layouts/header.php'; ?>
<?php 
$usersInfo = new \Project\controllers\ControllerFront();
$infos = $usersInfo->displayInfo();

$welcomes = new \Project\controllers\ControllerFront();
$welcome = $welcomes->welcome();
?>
    <main id="account">
        <section id="pageAccount">
            <aside id="usersLink">
                <ul id="navBarUsers">
                    <li><a href="index.php?action=usersWrite" class="usersLink">Rédiger</a></li>
                    <li><a href="index.php?action=stats" class="usersLink">Stats</a></li>
                    <li><a href="index.php?action=userSettings" class="usersLink">Settings</a></li>
                </ul>
            </aside>

            <article id="welcomeUsers">
                <h3><?= $welcome ?> <?= $infos['pseudo']?></h3>
            </article>

            <article id="lastArticle">
                <h3>Consulter vos derniers articles :</h3>
            </article>

            <article id="lastComment">
                <h3>Consulter vos dernier Commentaires :</h3>
            </article>
        </section>

    </main>

<?php include_once 'app/views/front/layouts/footer.php'; ?>