<?php $page = 'admin' ?>
<?php include_once 'app/views/back/layouts/headAdmin.php'; ?>
<?php include_once 'app/views/back/layouts/headerAdmin.php'; ?>
    <main id="admin">

        <section>
            <h2><?= $welcome ?> <?= $infos['pseudo']?></h2>
            <h3>Consulter les derniers articles de la communauté</h3>
        </section>
        
        <section id="lastArticle"> 
            <?php foreach ($lastArticles as $lastArticle): ?>
            <article class="adminArticle">
                <img src="app/public/images/articles/<?= $lastArticle['images'] ?>" alt="<?= $lastArticle['images'] ?>" class="adminImg">
                <h4 class="adminTitle"><?= $lastArticle['title'] ?></h4>
                <p class="adminContent"><?= $lastArticle['extract'] ?></p>
                <div class="buttonAdminArticle">
                    <a href="indexAdmin.php?action=read&id=<?=$lastArticle['id'] ?>" class="articleAdminLink">Read more...</a>
                </div>
            </article>
            <?php endforeach ; ?>
        </section>
        
        <section>
            <h3>Consulter les dernier commentaire de la communautée</h3>
        </section>

        <section id="adminCom"> 
            <?php foreach ($comments as $comment): ?>
            <article class="adminComment">
                <h4 class="adminComTitle">posté par <?= $comment['pseudo'] ?> le <?= $date->dateFormating($comment['created_date'])?></h4>
                <p class="adminComContent"><?= $comment['content']?></p>
                <div class="buttonAdminArticle">
                    <a href="indexAdmin.php?action=deleteComment&id=<?= $comment['id'] ?>" class="articleAdminLink">Supprimer...</a>
                </div>
            </article>
            <?php endforeach ; ?>
        </section>
    </main>


<?php include_once 'app/views/back/layouts/footerAdmin.php'; ?>