<?php $page = 'article' ?>
<?php include_once 'app/views/back/layouts/headAdmin.php'; ?>
<?php include_once 'app/views/back/layouts/headerAdmin.php'; ?>
    <?php if(!empty($article)) : ?>
    <main id="pageArticleAdmin">
        <!-- section article coté admin -->
        <section id="adminArticle">
            <header id="adminArticleSingle">
                <h2><?= $article['title'] ?></h2>
            </header>
            <div id="articleSingle">
            <img src="app/public/images/articles/<?= $article['images'] ?>" alt="<?= $article['images'] ?>" id="articleImg">
                <div id="articleContent">
                    <h4 id="articleTitle">posté par <?= $article['pseudo'] ?> le <?= $date->dateFormating($article['created_date'])?></h4>
                    <p id="articlePara"><?= $article['content'] ?></p>
                </div>
                <!-- boutton permettant de supprimer un article -->
                <div id="buttonArticleDelete">
                    <a href="indexAdmin.php?action=deleteArticle&id=<?=$article['id'] ?>">Supprimer...</a>
                </div>
            </div>
        </section>
    </main>
    <?php endif ; ?>

<?php include_once 'app/views/back/layouts/footerAdmin.php'; ?>