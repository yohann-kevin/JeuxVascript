<?php require_once 'app/views/front/layouts/head.php'; ?>
<?php require_once 'app/views/front/layouts/header.php'; ?>
<?php
$allArticles = new \Project\controllers\ControllerFront();
$articles = $allArticles->displayArticles(); 
?>
        <main id="news">

            <section class="pageTitle">
                <h1 class="title">Consulter les derniers <span class="strong">articles</span></h1>
                <h2 class="subtitle">rediger par <span class="strong">la communaute</span></h2>
            </section>

            <section id="articleNews">

                <header id="newsTitle">
                    <h3>Derniers articles<h3>
                </header>

                <?php foreach ($articles as $article): ?>
                <article class="newsArticle">
                    <img src="app/public/images/articles/<?= $article['images'] ?>" alt="<?= $article['images'] ?>" class="newsImg">
                    <h4 class="newsTitle"><?= $article['title']?><h4>
                    <p class="newsContent"><?=$article['extract']?>...</p>
                    <div class="buttonNews">
                        <a href="index.php?action=article&id=<?=$article['id'] ?>" class="newsLink">Read more...</a>
                    </div>
                </article>
                <?php endforeach ?>

                <!-- <article class="newsArticle">
                    <img src="app/public/images/image/space.png" alt="space invaders" class="newsImg">
                    <h4 class="newsTitle">Lorem ipsum dolor sit<h4>
                    <p class="newsContent">Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                        Similique ut nesciunt, dolores odio, 
                        earum quidem praesentium impedit nam 
                        fugiat odit quasi nulla veritatis blanditiis 
                        obcaecati. Recusandae possimus fugiat veniam natus 
                        ipsum, itaque assumenda laborum molestias...</p>
                    <div class="buttonNews">
                        <a href="#" class="newsLink">Read more...</a>
                    </div>
                </article>
                <article class="newsArticle">
                    <img src="app/public/images/image/space.png" alt="space invaders" class="newsImg">
                    <h4 class="newsTitle">Lorem ipsum dolor sit<h4>
                    <p class="newsContent">Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                        Similique ut nesciunt, dolores odio, 
                        earum quidem praesentium impedit nam 
                        fugiat odit quasi nulla veritatis blanditiis 
                        obcaecati. Recusandae possimus fugiat veniam natus 
                        ipsum, itaque assumenda laborum molestias...</p>
                    <div class="buttonNews">
                        <a href="#" class="newsLink">Read more...</a>
                    </div>
                </article>
                <article class="newsArticle">
                    <img src="app/public/images/image/space.png" alt="space invaders" class="newsImg">
                    <h4 class="newsTitle">Lorem ipsum dolor sit<h4>
                    <p class="newsContent">Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                        Similique ut nesciunt, dolores odio, 
                        earum quidem praesentium impedit nam 
                        fugiat odit quasi nulla veritatis blanditiis 
                        obcaecati. Recusandae possimus fugiat veniam natus 
                        ipsum, itaque assumenda laborum molestias...</p>
                    <div class="buttonNews">
                        <a href="#" class="newsLink">Read more...</a>
                    </div>
                </article> -->
            </section>

        </main>


<?php require_once 'app/views/front/layouts/footer.php'; ?>