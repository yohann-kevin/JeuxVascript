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

$lastArticleUsers = new \Project\controllers\ControllerFront();
$usersLastArticles = $lastArticleUsers->displayLastUsersArticle();

$lastCommentUsers = new \Project\controllers\ControllerFront();
$usersLastComments = $lastCommentUsers->displayLastCom();

$date = new \Project\controllers\ControllerFront();
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

                <?php foreach ($usersLastArticles as $usersLastArticle): ?>
                <div class="lastArticle">
                    <div class="usersLastArticle">
                        <h4><?= $usersLastArticle['title']?></h4>
                        <p><?= $usersLastArticle['extract']?></p>
                    </div>
                    <div class="usersLastArticleOption">
                        <a href="index.php?action=article&id=<?=$usersLastArticle['id'] ?>">Voir plus...</a>
                        <a href="index.php?action=usersModify&id=<?=$usersLastArticle['id'] ?>">Modifier...</a>
                        <a href="index.php?action=deleteArticle&id=<?=$usersLastArticle['id'] ?>">Supprimer...</a>
                    </div>
                </div>
                <?php endforeach ; ?>


            </article>

            <article id="lastComment">
                <h3>Consulter vos dernier Commentaires :</h3>
                <?php foreach ($usersLastComments as $usersLastComment): ?>
                <div class="lastComment">
                    <div class="usersLastComment">
                        <h4>posté le <?= $date->dateFormating($usersLastComment['created_date'])?></h4>
                        <p><?= $usersLastComment['content']?></p>
                    </div>
                    <div class="usersLastCommentOption">
                        <a href="#">Supprimer...</a>
                    </div>
                </div>
                <?php endforeach ; ?>
            </article>
        </section>

    </main>

<?php include_once 'app/views/front/layouts/footer.php'; ?>