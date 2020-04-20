<?php include_once 'app/views/back/layouts/headAdmin.php'; ?>
<?php include_once 'app/views/back/layouts/headerAdmin.php'; ?>
<?php  
$adminInfos = new \Project\controllers\ControllerBack();
$infos = $adminInfos->displayInfo();

$welcomes = new \Project\controllers\ControllerFront();
$welcome = $welcomes->welcome();

$displayLastArticle = new \Project\controllers\ControllerFront();
$lastArticles = $displayLastArticle->getLastArticleHome2(); 
?>
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
                    <a href="#" class="articleAdminLink">Read more...</a>
                </div>
            </article>
            <?php endforeach ; ?>

        <section>
            <h3>Consulter les dernier commentaire de la communautée</h3>
        </section>

        <section id="adminCom"> 
            <article class="adminComment">
                <h4 class="adminComTitle">posté par plop le 24 mars 2020</h4>
                <p class="adminComContent">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, tempora? 
                    Reiciendis omnis cum assumenda hic tempora suscipit fuga provident nihil libero!</p>
                <div class="buttonAdminArticle">
                    <a href="#" class="articleAdminLink">Read more...</a>
                </div>
            </article>
            <article class="adminComment">
                <h4 class="adminComTitle">posté par plop le 24 mars 2020</h4>
                <p class="adminComContent">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, tempora? 
                    Reiciendis omnis cum assumenda hic tempora suscipit fuga provident nihil libero!</p>
                <div class="buttonAdminArticle">
                    <a href="#" class="articleAdminLink">Read more...</a>
                </div>
            </article>
            <article class="adminComment">
                <h4 class="adminComTitle">posté par plop le 24 mars 2020</h4>
                <p class="adminComContent">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, tempora? 
                    Reiciendis omnis cum assumenda hic tempora suscipit fuga provident nihil libero!</p>
                <div class="buttonAdminArticle">
                    <a href="#" class="articleAdminLink">Read more...</a>
                </div>
            </article>
            <article class="adminComment">
                <h4 class="adminComTitle">posté par plop le 24 mars 2020</h4>
                <p class="adminComContent">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, tempora? 
                    Reiciendis omnis cum assumenda hic tempora suscipit fuga provident nihil libero!</p>
                <div class="buttonAdminArticle">
                    <a href="#" class="articleAdminLink">Read more...</a>
                </div>
            </article>
            <article class="adminComment">
                <h4 class="adminComTitle">posté par plop le 24 mars 2020</h4>
                <p class="adminComContent">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, tempora? 
                    Reiciendis omnis cum assumenda hic tempora suscipit fuga provident nihil libero!</p>
                <div class="buttonAdminArticle">
                    <a href="#" class="articleAdminLink">Read more...</a>
                </div>
            </article>
            <article class="adminComment">
                <h4 class="adminComTitle">posté par plop le 24 mars 2020</h4>
                <p class="adminComContent">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, tempora? 
                    Reiciendis omnis cum assumenda hic tempora suscipit fuga provident nihil libero!</p>
                <div class="buttonAdminArticle">
                    <a href="#" class="articleAdminLink">Read more...</a>
                </div>
            </article>
        </section>
    </main>


<?php include_once 'app/views/back/layouts/footerAdmin.php'; ?>