<?php  
$page = "";
$title = "Sitemap";
$description = "Consulter le plan du site de JeuxVascript";
?>
<?php require_once 'app/views/front/layouts/head.php'; ?>
<?php include_once 'app/views/front/layouts/header.php'; ?>

    <main id="sitemap">
        <section id="pageSitemap">
            <h3 id="sitemapTitle">Plan du site :</h3>
            <ul id="sitemapList">
                <li class="fromLeft"> - <a href="index.php?action=home">Accueil</a></li>
                <li class="margin1 fromLeft"> - <a href="index.php?action=game">Jeux</a></li>
                <li class="margin2 fromLeft"> - <a href="index.php?action=snake">Snake</a></li>
                <li class="margin2 fromLeft"> - <a href="index.php?action=spaceInvaders">Space Invaders</a></li>
                <li class="margin1 fromLeft"> - <a href="index.php?action=news">News</a></li>
                <li class="margin1 fromLeft"> - <a href="index.php?action=about">A propos</a></li>
                <li class="margin1 fromLeft"> - <a href="index.php?action=contact">Contact</a></li>
                <li class="margin1 fromLeft"> - <a href="index.php?action=register">Inscription</a></li>
            </ul>
        </section>
    </main>

<?php include_once 'app/views/front/layouts/footer.php'; ?>