<?php require_once 'app/views/front/layouts/head.php'; ?>
<?php require_once 'app/views/front/layouts/header.php'; ?>
        <!-- page news -->
        <main id="news">
            <!-- section titre -->
            <section class="pageTitle">
                <h1 class="title">Consulter les derniers <span class="strong">articles</span></h1>
                <h2 class="subtitle">rediger par <span class="strong">la communaute</span></h2>
            </section>
            <!-- section qui affiche les articles posté par la communauté -->
            <section id="articleNews">
                <!-- titre de la section -->
                <header id="newsTitle">
                    <h3>Derniers articles<h3>
                </header>
                <?php foreach ($articles as $article): ?>
                <article class="newsArticle">
                    <img src="app/public/images/articles/<?= $article['images'] ?>" alt="<?= $article['images'] ?>" class="newsImg">
                    <h4 class="newsTitle"><?= $article['title']?><h4>
                    <p class="newsContent"><?=$article['extract']?>...</p>
                    <div class="buttonNews">
                        <a href="index.php?action=article&id=<?=$article['id'] ?>" class="newsLink">Voir plus...</a>
                    </div>
                </article>
                <?php endforeach ?>
            </section>
        </main>
<?php require_once 'app/views/front/layouts/footer.php'; ?>