<?php  
$page = "";
$title = "Article";
$description = "";
?>
<?php require_once 'app/views/front/layouts/head.php'; ?>
<?php include_once 'app/views/front/layouts/header.php'; ?>
<?php
$singleArticle = new \Project\controllers\ControllerFront();
$article = $singleArticle->article(); 

$date = new \Project\controllers\ControllerFront();

?>
    <?php if(!empty($article)) : ?>
    <main id="pageArticle">
        <section>
            <header id="articleHeader">
                <h2 id="articleTitle"><?= $article['title'] ?><h2>
            </header>
            <div id="article">
                <img src="app/public/images/articles/<?= $article['images'] ?>" alt="<?= $article['images'] ?>" id="articleImg">
                <div id="articleContent">
                    <h4 id="articlePseudo">Rédigé par <?= $article['pseudo'] ?> le <?= $date->dateFormating($article['created_date'])?></h4>
                    <p id="articlePara"><?= $article['content'] ?></p>
                <div>
            </div>
        </section>

        <div id="sectionComment">
            <section id="spaceComment">
                <h2>Commentaires :</h2>
                <article class="comment">
                    <h3>posté par plop le : 04/03/2001</h3>
                    <p>Content</p>
                </article>
            </section>
            

            <section id="postComment">
                <h2>Réagisser à cette article en postant un commentaire</h2>
                <form method="post" action="" id="writeComment">
                    <textarea name="comment" placeholder="Votre commentaire *"></textarea>
                    <input type="submit" value="Commenter">
                </form>
            </section>
        </div>
    </main>
    <?php endif ; ?>

<?php include_once 'app/views/front/layouts/footer.php'; ?>